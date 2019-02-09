<?php

class Updater {

    private $currentCoreVersion = "";

    private $downloadUrls = array(
        "traditional" => "https://modx.com/download/direct/",
        "advanced" => "https://modx.com/download/direct/",
        "git" => "https://api.github.com/repos/modxcms/revolution/",
        "tags" => "https://api.github.com/repos/modxcms/revolution/tags",
        "changelog" => "https://github.com/modxcms/revolution/blob/2.x/core/docs/changelog.txt",
    );

    private $outputCSS = "";
    private $outputHtmlHeader = "";
    private $outputInnerChunk = "";
    private $outputInnerChunkCore = "";

    /* the raw response data from the getlist processor */
    private $packagesResponse;

    /* enriched data with updates and versions */
    private $extrasData = array();

    /* create a separate cache partition for our updater */
    private $cacheCoreOptions = array( xPDO::OPT_CACHE_KEY => 'updater-core' );
    private $cachePackageOptions = array( xPDO::OPT_CACHE_KEY => 'updater-packages' );
    private $cacheMUIOptions = array( xPDO::OPT_CACHE_KEY => 'updater-core' );

    private $cacheCoreExpires = 86400;
    private $cachePackagesExpires = 43200;

    /* preset timeouts */
    private $githubTimeout = 1500; // Github can be slow sometimes
    private $modxcomTimeout = 1000; // only check for file existence needed
    private $dnsTimeout = 1000; // DNS lookup should not take more time

    private $latestCoreVersionExists;
    private $coreData = array();
    private $coreDownload = array();

    /* debug= true sets additional messages. Only useful during development. Can
        also be set with system setting updater.debug=1
    */
    private $debug = false;
    private $pfx = "[Updater] ";
    private $ns = 'updater.';

    /* if set to true, always assumes core update data as stale and makes a refresh */
    private $alwaysRefreshCore = false;

    /* store any MUI (managed update information */
    private $mui = array();

    /**
     * @param modX $modx
     */
    function __construct( modX &$modx ) {
        $this->modx =& $modx;

        $this->debug = $this->modx->getOption( 'updater.debug', null, true );

        $this->modx->getService( 'lexicon', 'modLexicon' );
        $this->modx->lexicon->load( 'updater:widget' );

        $this->outputCSS = file_get_contents( MODX_ASSETS_PATH . '/components/updater/css/updater.widget.min.css' );
        if ( $this->debug ) $this->outputCSS = file_get_contents( MODX_ASSETS_PATH . '/components/updater/css/updater.widget.css' );
        $this->outputInnerChunk = file_get_contents( MODX_CORE_PATH . '/components/updater/elements/widgets/updater.widget.container.tpl' );
        $this->outputInnerChunkCore = file_get_contents( MODX_CORE_PATH . '/components/updater/elements/widgets/updater.widget.container_core.tpl' );

        $this->outputHtmlHeader = "<style type='text/css'>" . $this->outputCSS . "</style>";
        $this->currentCoreVersionSignature = $this->modx->getOption( 'settings_version' );
        $this->currentCoreVersion = 'v' . $this->currentCoreVersionSignature;

        $this->cacheCoreExpires = $this->modx->getOption( 'updater.cache_expires_core', null, $this->cacheCoreExpires );

        /* do not accept values less than one day to save api calls to github. Add random amount
         * to distribute api queries */
        if ( $this->cacheCoreExpires < 86400 && !$this->debug ) {
            $this->cacheCoreExpires = 86400 + rand( 0, 2000 );
        }

        $this->cachePackagesExpires = $this->modx->getOption( 'updater.cache_expires_packages', null, $this->cachePackagesExpires );
        /* do not accept values less than 2 hours */
        if ( $this->cachePackagesExpires < 7200 && !$this->debug ) {
            $this->cachePackagesExpires = 7200 + rand( 0, 500 );
        }

        $this->githubTimeout = $this->modx->getOption( 'updater.github_timeout', null, $this->githubTimeout );
        $this->modxcomTimeout = $this->modx->getOption( 'updater.modxcom_timeout', null, $this->modxcomTimeout );

        if ( $this->debug ) {
            $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " Timeouts: github = " . $this->githubTimeout . ", modx.com = " . $this->modxcomTimeout );
        }


        /* init last checked core values from cache */
        $this->getCoreVersion();
        $this->coreDownload = $this->modx->cacheManager->get( 'coreDownload', $this->cacheCoreOptions );

        /* init last checked package values from cache */
        $this->getPackageData();

        //$this->getPackageVersions();

        /* get MUI (Managed Update Information) data */
        $this->initMUI();

    }

    /**
     * Initializes the MUI array with detailed information about updates.
     * Main data file is delivered with this package, updates will be downloaded
     * from SEDA.digital if configured. Downloaded updates are cached along with
     * the core data.
     *
     * @return bool returns true if valid update information was retrieved
     */
    private function initMUI() {
        $muiFile = MODX_CORE_PATH . 'components/updater/mui/modx.mui.json';
        if ( file_exists( $muiFile ) ) {
            $mui = json_decode( file_get_contents( $muiFile ), true );
            if ( is_array( $mui ) ) {
                $this->mui = $mui;
                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . "Loaded MUI data from package for " . sizeof( $this->mui[ 'updates' ][ 'core' ] ) . " core versions from " . $this->mui[ 'date' ] );

                //$this->modx->log(3,$this->pfx."State of this version: ".print_r($this->securityUpdatesForVersion(),true));

                $this->refreshMUIFromURL();
                return true;
            }
            $this->modx->log( modX::LOG_LEVEL_WARN, $this->pfx . "MUI file is not a valid json file." );

        } else {
            // do nothing, we don't wont to poison the log file with this
        }
        return false;
    }

    public function refreshMUIFromURL() {
        /* if mui download is enabled, now try to get newer version */
        if ( $this->modx->getOption( 'updater.mui_enable', null, false ) ) {
            $url = $this->modx->getOption( 'updater.mui_url', null, '' );
            if ( $url && filter_var( $url, FILTER_VALIDATE_URL ) ) {
                // get the data from cache
                $dmui = $this->modx->cacheManager->get( 'muidata', $this->cacheMUIOptions );
                if ( !$dmui || is_null($dmui) || !is_array($dmui)) {
                    /* no need to configure timeouts for this, as we want a static json file here. */
                    $curl = curl_init( $url );
                    curl_setopt( $curl, CURLOPT_NOBODY, false );
                    curl_setopt( $curl, CURLOPT_CONNECTTIMEOUT_MS, 300 );
                    curl_setopt( $curl, CURLOPT_TIMEOUT_MS, 250 );
                    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );

                    $result = curl_exec( $curl );

                    if ( $this->debug ) $this->modx->log( MODx::LOG_LEVEL_DEBUG, $this->pfx . "Downloading MUI data from: " . $url );

                    if ( $result !== false ) {
                        if ( $this->debug ) {
                            $this->modx->log( MODx::LOG_LEVEL_DEBUG, $this->pfx . "downloaded MUI file in " . curl_getinfo( $curl, CURLINFO_TOTAL_TIME ) . "s" );
                        }
                        $statusCode = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
                        if ( $statusCode == 200 || $statusCode == 301 || $statusCode == 302 ) {
                            $dmui = json_decode( $result, true );
                            if ( is_array( $dmui ) ) {
                                // verify some fields to somehow ensure the right data
                                if (isset($dmui['mui_version']) &&
                                    isset($dmui['date']) &&
                                    isset($dmui['flavour']) && $dmui['flavour']=='modx' &&
                                    isset($dmui['changelog']) &&
                                    isset($dmui['updates']['core']) && sizeof($dmui['updates']['core'])>0
                                ) {
                                    $dmui['validOn'] = time();
                                    $dmui['origin'] = $url;
                                    $this->modx->cacheManager->set( 'muidata', $dmui, $this->cacheCoreExpires, $this->cacheMUIOptions );
                                    $this->mui = $dmui;

                                    if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . "Loaded valid MUI data from URL for " . sizeof( $this->mui[ 'updates' ][ 'core' ] ) . " core versions from " . $this->mui[ 'date' ] );
                                    return true;
                                } else {
                                    $this->modx->log(modX::LOG_LEVEL_WARN, $this->pfx."downloaded MUI file is invalid.");
                                }
                            }
                            $this->modx->log( modX::LOG_LEVEL_WARN, $this->pfx . "MUI file from download URL is not a valid json file." );
                        } else {
                            if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_WARN, $this->pfx . " downloading MUI status code: " . $statusCode );
                        }
                    } else {
                        if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_WARN, $this->pfx . " downloading MUI failed: " . curl_getinfo( $curl, CURLINFO_HTTP_CODE ) );
                    }
                    curl_close( $curl );
                } else {
                    if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . "Loaded MUI data from cache for " . sizeof( $this->mui[ 'updates' ][ 'core' ] ) . " core versions from " . $this->mui[ 'date' ] );

                    $this->mui = $dmui;
                }
            } else {
                $this->modx->log( MODx::LOG_LEVEL_INFO, $this->pfx . "MUI download URL not valid: " . $url );
            }

        }
        return true;
    }

    /**
     * This function determines from MUI data, if there are known security updates for this version available.
     *
     * @param $version
     *
     * @return array An array with security related information.
     */
    private
    function securityUpdatesForVersion( $version = "" ) {
        if ( $version == "" ) {
            $version = $this->currentCoreVersionSignature;
        }

        // we store the latest version with has a security update included as least recommendation
        $latestSecurityVersion = $this->currentCoreVersionSignature;

        // we count the issues fixed in the meantime
        $issues = 0;

        // we collect the comments for security updates
        $comments = array();
        $cves = array();

        // walk through all available update data
        foreach ( $this->mui[ 'updates' ][ 'core' ] as $v => $data ) {
            // only use released versions
            if ( version_compare( $v, $this->constructSignature( $this->getLatestCoreVersion() ) ) < 1 ) {
                // only use newer versions
                if ( version_compare( $v, $this->currentCoreVersionSignature ) == 1 ) {
                    //$this->modx->log(4,$this->pfx." new version ".$v." ");

                    // there is a newer version than this version
                    if ( isset( $data[ 'security' ] ) && $data[ 'security' ][ 'state' ] ) {

                        // security update contained in version
                        //$this->modx->log(3,$this->pfx." \t contains a security update!");

                        if ( isset( $data[ 'security' ][ 'comment' ] ) ) $comments[] = implode( ',', $data[ 'security' ][ 'comment' ] );
                        if ( isset( $data[ 'security' ][ 'cve' ] ) ) $cves[] = implode( ',', $data[ 'security' ][ 'cve' ] );

                        if ( version_compare( $v, $latestSecurityVersion ) == 1 ) {
                            $latestSecurityVersion = $v;
                        }
                    }
                    if ( isset( $data[ 'issues' ] ) ) {
                        $issues += (int) $data[ 'issues' ];
                    }
                }
            }
        }
        if ( $this->debug ) $this->modx->log( 3, $this->pfx . " You should update at least to version " . $latestSecurityVersion );
        if ( $this->debug ) $this->modx->log( 3, $this->pfx . " Total number of fixed issues up to the newest documented version: " . $issues );

        return array(
            'available' => ( $this->currentCoreVersionSignature != $latestSecurityVersion ),
            'latestSecure' => $latestSecurityVersion,
            'issues' => $issues,
            'comments' => implode( '\n', $comments ),
            'cves' => implode( ',', $cves )
        );

    }

    /* returns true if the version is a dev build */
    public
    function is_dev_build( $v ) {
        return $this->is_release_level( $v, 'dev' );
    }

    /* returns true if the version is a stable build */
    private
    function is_pl_build( $v ) {
        return $this->is_release_level( $v, 'pl' );
    }

    /* returns true if the version is release candidate */
    private
    function is_rc_build( $v ) {
        return $this->is_release_level( $v, 'rc' );
    }

    /**
     * Checks if the given version is of release level.
     *
     * @param string $v     The version signature to check.
     * @param string $level The level to check for, e.g. 'alpha', 'beta', 'rc', 'pl'.
     *
     * @return bool True if the release matches the requested level.
     */
    private
    function is_release_level( $v, $level = 'pl' ) {
        $release = $this->versionSlice( $v, 'release' );
        if ( preg_match( "/" . $level . "[0-9]*/i", $release ) ) {
            return true;
        }
        return false;
    }

    /**
     * Returns true if the given version is of level relative against the current version
     *
     * @param string $v     The version signature to check for.
     * @param string $level The version level to check for
     *
     * @return bool True if the signature is an update of the the given level
     */
    private
    function is_version_level( $v, $level = 'patch' ) {
        $vs = $this->versionSlice( $v );
        //list($vMajor, $vMinor, $vPatch, $vRelease) = $this->versionSlice($v);

        $cs = $this->versionSlice( $this->currentCoreVersion );
        //list($cMajor, $cMinor, $cPatch, $cRelease) = $this->versionSlice($this->currentCoreVersion);

        $result = false;
        switch ( $level ) {
            case 'release':
                if ( $vs[ 'major' ] == $cs[ 'major' ] && $vs[ 'minor' ] == $vs[ 'minor' ] && $vs[ 'minor' ] == $cs[ 'patch' ] && $vs[ 'release' ] >= $cs[ 'release' ] ) {
                    $result = true;
                }
                break;
            case 'patch':
                // this will include same patch versions. no patch level check here
                // is a.b.c.rc2 > a.b.c.rc1
                if ( $vs[ 'major' ] == $cs[ 'major' ] && $vs[ 'minor' ] == $vs[ 'minor' ] && $vs[ 'minor' ] >= $cs[ 'patch' ] ) {
                    $result = true;
                }
                break;
            case 'minor':
                if ( $vs[ 'major' ] == $cs[ 'major' ] && $vs[ 'minor' ] > $vs[ 'minor' ] ) {
                    $result = true;
                }
                break;
            case 'major':
                if ( $vs[ 'major' ] > $cs[ 'major' ] ) {
                    $result = true;
                }
                break;
            default:
                $result = false;
        }
        //$this->modx->log(4,"\t v = ${vMajor}-${vMinor}-${vPatch}-${vRelease}, c = ${cMajor}-${cMinor}-${cPatch}-${cRelease}, level=${level} == ${result}");
        return $result;
    }

    private
    function is_patch_build( $v ) {
        return $this->is_version_level( $v, 'patch' );
    }


    /**
     * Initializes internal object data with cached extras data.
     *
     * @return bool True if cached package data is available, false if not.
     */
    private
    function getPackageData() {
        $cachedPackagesResponse = $this->modx->cacheManager->get( 'packageResponse', $this->cachePackageOptions );
        if ( isset( $cachedPackagesResponse ) ) {
            $this->packagesResponse = $cachedPackagesResponse;
            $cachedExtrasData = $this->modx->cacheManager->get( 'extrasData', $this->cachePackageOptions );
            if ( !is_null( $cachedExtrasData ) ) {
                $this->extrasData = $cachedExtrasData;
            } else {
                $this->packagesResponse = null;
                return false;
            }
            return true;
        }
        $this->packagesResponse = null;
        return false;
    }

    public
    function isPackageRefreshNeeded() {
        return $this->getPackageData();
    }

    public
    function refreshPackageData() {

        $time = microtime( true );

        /* force lookup of package updats */
        $setting_autoCheckPkgUpdates = $this->modx->getOption( 'auto_check_pkg_updates', null, false );
        $setting_autoCheckPkgUpdatesExpires = $this->modx->getOption( 'auto_check_pkg_updates_cache_expire', null, 0 );
        $this->modx->setOption( 'auto_check_pkg_updates', true );
        $this->modx->setOption( 'auto_check_pkg_updates_cache_expire', 0 );

        $scriptProperties = array( "limit" => 999 );   /* TODO: is it possible to NOT limit the results? -1? */
        $response = $this->modx->runProcessor( 'workspace/packages/getlist', $scriptProperties );

        $time = round( microtime( true ) - $time, 2 );
        if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " time for looking up package updates data: " . $time );

        if ( $response->isError() ) {
            $this->modx->log( modX::LOG_LEVEL_WARN, $this->pfx . " problems retrieving list of packages: " . $response->getMessage() );
            $this->packagesResponse = null;
            $this->modx->cacheManager->set( 'packageResponse', $this->packagesResponse, $this->cachePackagesExpires, $this->cachePackageOptions );

        } else {
            $this->packagesResponse = json_decode( $response->getResponse(), true );
            $this->modx->cacheManager->set( 'packageResponse', $this->packagesResponse, $this->cachePackagesExpires, $this->cachePackageOptions );

            /* now also refresh the packages versions and enriched data */
            $this->refreshPackageVersions();
        }

        /* restore original settings */
        $this->modx->setOption( 'auto_check_pkg_updates', $setting_autoCheckPkgUpdates );
        $this->modx->setOption( 'auto_check_pkg_updates_cache_expire', $setting_autoCheckPkgUpdatesExpires );
    }

    /**
     * Get package versions of updateable packages
     * this is not necessary to check if there are updates at all, but we need to run this to find the version signatures
     * of possible updates and - in the near future - to find out if a package includes a security fix.
     */
    private
    function refreshPackageVersions() {
        $time = microtime( true );

        /* check the results */

        if ( !is_null( $this->packagesResponse ) ) {
            $res = $this->packagesResponse;
            $results = $res[ 'results' ];

            if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " * package auto cache " . $this->modx->getOption( 'auto_check_pkg_updates_cache_expire', null, 0 ) . " seconds." );

            $this->extrasData[ 'data' ] = $res[ 'results' ];

            if ( sizeof( $results ) > 0 ) {
                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " no cached package updates. refreshing..." );

                $updates = array();

                $installsCounter = 0;
                foreach ( $res[ 'results' ] as $i => $p ) {
                    if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " * package: " . $p[ 'name' ] . " u: " . $p[ 'updateable' ] . " i: " . $p[ 'installed' ] );

                    if ( $p[ 'updateable' ] == true ) {
                        $updateResponse = $this->modx->runProcessor( 'workspace/packages/update-remote', array( 'signature' => $p[ 'signature' ] ) );
                        if ( $updateResponse->isError() ) {
                            $this->modx->log( modX::LOG_LEVEL_WARN, $this->pfx . " problems updating remote " . $p[ 'signature' ] . ": " . $updateResponse->getMessage() );
                        }
                        $updateObject = $updateResponse->getObject();

                        if ( !is_null( $updateObject ) && sizeof( $updateObject ) > 0 ) {
                            $updateObject[ 0 ][ 'installed' ] = $p[ 'signature' ];
                            $updateObject[ 0 ][ 'name' ] = $p[ 'name' ];
                            $updates[ $p[ 'signature' ] ] = $updateObject;

                        } else {
                            $updates[ $p[ 'signature' ] ] = "";

                        }
                    }
                    //}
                    if ( $p[ 'installed' ] == "" ) {
                        $installsCounter++;
                    }

                    /* we don't need the readmes here */
                    $res[ 'results' ][ $i ][ 'readme' ] = "";
                }

                $updatesCounter = sizeof( $updates );

                $this->extrasData[ 'countInstallable' ] = $installsCounter;
                $this->extrasData[ 'countUpdateable' ] = $updatesCounter;
                $this->extrasData[ 'updates' ] = $updates;
                $this->extrasData[ 'data' ] = $res[ 'results' ];

                $this->modx->cacheManager->set( 'extrasData', $this->extrasData, $this->cachePackagesExpires, $this->cachePackageOptions );

            } else {
                $this->extrasData[ 'countInstallable' ] = 0;
                $this->extrasData[ 'countUpdateable' ] = 0;
                $this->extrasData[ 'updates' ] = null;
                $this->extrasData[ 'data' ] = null;
            }

            $time = round( microtime( true ) - $time, 2 );
            if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " time for looking up packages version data: " . $time );


            if ( $this->debug ) {
                $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " total number of packages: " . sizeof( $this->extrasData[ 'data' ] ) );
                $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " total number of installable packages: " . $this->extrasData[ 'countInstallable' ] );
                $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " total number of updateable packages: " . $this->extrasData[ 'countUpdateable' ] );
            }

        } else {
            // TODO: what do do here? when does this happen?
        }

        //$this->modx->log(4,"************************* ".print_r($this->extrasData,true));
    }

    /**
     * Checks if the detected core download can be downloaded at modx.com
     *
     * @param   $type - the type of core zipball in question. can be advanced or traditional.
     *
     * @return  mixed - true if the download zipball exists
     */
    public
    function refreshCoreDownload( $type = 'traditional' ) {
        $time = microtime( true );
        if ( $this->coreData[ 'coreLatest' ] != -1 ) {
            $cachedCoreDownload = $this->modx->cacheManager->get( 'coreDownload', $this->cacheCoreOptions );
            if ( !is_null( $cachedCoreDownload ) ) {
                $this->latestCoreVersionExists = $cachedCoreDownload;
                $this->coreDownload = $cachedCoreDownload;
            } else {
                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, "Constructing download url for refresh with: " . $this->coreData[ 'coreLatest' ] );
                $this->latestCoreVersionExists = $this->remote_file_exists( $this->constructCoreDownloadUrl( $type ) );
                $this->coreDownload[ $this->coreData[ 'coreLatest' ] ][ $type ] = array(
                    'url' => $this->constructCoreDownloadUrl( $type ),
                    'downloadable' => $this->latestCoreVersionExists,
                    'responseTime' => 0,
                    'fileSize' => 0,
                    'md5' => '',  // TODO: add some more information here
                );

                $this->modx->cacheManager->set( 'coreDownload', $this->coreDownload, $this->cacheCoreExpires, $this->cacheCoreOptions );
            }
            $time = round( microtime( true ) - $time, 2 );
            if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " time for download check: " . $time );
        } else {
            return array();
        }
        return $this->coreDownload;
    }

    public
    function isCoreDownloadable() {
        return $this->latestCoreVersionExists;
    }

    public
    function constructCoreDownloadUrl( $type = 'traditional' ) {
        // do not construct an url if no version is given to avoid problems
        if ( is_int( $this->coreData[ 'coreLatest' ] ) ) {
            return '';
        }
        $v = str_replace( 'v', '', $this->coreData[ 'coreLatest' ] );
        if ( $type == 'traditional' || $type == '' ) {
            $url = $this->downloadUrls[ 'traditional' ] . "modx-${v}.zip";
        } else if ( $type == 'advanced' ) {
            $url = $this->downloadUrls[ 'advanced' ] . "modx-${v}-advanced.zip";
        }
        //$v = $this->constructSignature($this->versionSlice($this->coreData['coreLatest'],null));
        return $url;
    }

    /**
     * Checks if the remote file exists at the destination. This is needed because a new
     * github tag will not always ensure that the corresponding build has been uploaded
     * to modx.com.
     *
     * @param   $url
     *
     * @return  bool
     */
    private
    function remote_file_exists( $url ) {
        if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " checking zipball at: " . $url );

        $curl = curl_init( $url );
        curl_setopt( $curl, CURLOPT_NOBODY, true );
        curl_setopt( $curl, CURLOPT_CONNECTTIMEOUT_MS, $this->modxcomTimeout );
        curl_setopt( $curl, CURLOPT_TIMEOUT, 3 );

        $result = curl_exec( $curl );
        $ret = false;
        if ( $result !== false ) {
            $statusCode = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
            if ( $statusCode == 200 || $statusCode == 301 || $statusCode == 302 ) {
                $ret = true;
            } else {
                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_WARN, $this->pfx . " checking zipball statusCode: " . $statusCode );
            }
        } else {
            if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_WARN, $this->pfx . " checking zipball request failed: " . curl_getinfo( $curl, CURLINFO_HTTP_CODE ) );
        }

        curl_close( $curl );
        return $ret;
    }

    /**
     * Returns true if information about core version is available aka cached.
     * If not, a refresh needs to be triggered. Cache is not automatically refreshed.
     *
     * @return boolean - true if version information is cached
     */
    protected
    function getCoreVersion() {
        $cachedVersionArray = $this->modx->cacheManager->get( 'coreData', $this->cacheCoreOptions );

        if ( isset( $cachedVersionArray ) && !$this->alwaysRefreshCore ) {
            if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " using latest core version from cache: " . json_encode( $cachedVersionArray ) );
            $this->coreData = $cachedVersionArray;
            return true;
        }

        /* there is no cached core version, a refresh may be needed */
        if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " no cached core version available. Refresh needed." );

        $this->coreData = array(
            'coreLatest' => -1,
            'coreErrorCode' => -1,
            'coreErrorMessage' => "Refresh needed.",
            'coreLookupTime' => -1,
        );

        return false;
    }

    public
    function isCoreRefreshNeeded() {
        return !$this->getCoreVersion();
    }

    /**
     * Sets the internal object core data and the cache data for persistence.
     *
     * @param array $cd
     */
    private
    function setCoreVersion( array $cd ) {
        $this->coreData = $cd;
        $this->modx->cacheManager->set(
            'coreData',
            $cd,
            $this->cacheCoreExpires,
            $this->cacheCoreOptions
        );
    }

    /**
     * Filters an array of version signatures according to the system settings.
     *
     * @param array $versions The version signatures array to filter.
     *
     * @return array An array with all versions left after filtering according to the check levels.
     */
    private
    function filterCoreVersions( array $versions = null ) {
        /*
         * check_core_release_level: (include levels)
         *  0 - all release levels, including dev-versions and alpha-versions (recommended in dev/git)
         *  1 - only beta versions or better
         *  2 - only release candidates or better (no alpha, no beta)
         *  3 - only stable versions
         *
         * check_core_version_level: (exclude levels)
         *  0 - show all version levels (include major versions)
         *  1 - show minor versions and below (prevent major versions [BC])
         *  2 - show patch versions only (prevent minor and major versions [BC, functionality])
         *
         * Example: only show stable patches to prevent errors due to new functionality:
         *  release_level = 3;
         *  version_level = 2;
         *
         * Example: show only stable versions without breaking backwards compatibility:
         *  release_level = 3;
         *  version_level = 1;
         */

        $check_release_level = $this->modx->getOption( 'updater.check_core_release_level', null, 3, true );
        $check_version_level = $this->modx->getOption( 'updater.check_core_version_level', null, 1, true );

        if ( $this->debug ) $this->modx->log( 4, "Check levels: release=" . $check_release_level . ", version: " . $check_version_level );
        $filteredCandidates = array();
        foreach ( $versions as $u ) {
            $remove = false;
            if ( $this->is_release_level( $u, 'dev' ) && $check_release_level >= 1 ) {
                $remove = true;
            }
            if ( $this->is_release_level( $u, 'alpha' ) && $check_release_level >= 1 ) {
                $remove = true;
            }
            if ( $this->is_release_level( $u, 'beta' ) && $check_release_level >= 2 ) {
                $remove = true;
            }
            if ( $this->is_release_level( $u, 'rc' ) && $check_release_level >= 3 ) {
                $remove = true;
            }
            if ( $this->is_version_level( $u, 'major' ) && $check_version_level >= 1 ) {
                $remove = true;
            }
            if ( $this->is_version_level( $u, 'minor' ) && $check_version_level >= 2 ) {
                $remove = true;
            }
            if ( !$remove ) {
                $filteredCandidates[] = $u;
            }
        }
        return $filteredCandidates;
    }

    /**
     * Reduces an array of version signatures to the versions which are updates to the current version.
     *
     * @param $versions array The array of version signatures to reduce.
     * @param $compare  string The version signature to compare to. If not set, the current core version is used.
     *
     * @return array Array with all versions which are an update to the given compare version.
     */
    private
    function getUpdateableCoreVersions( array $versions, $compare = '' ) {
        if ( $compare == "" ) {
            $compare = $this->getCurrentCoreVersion();
        }
        $updateCandidates = array();
        foreach ( $versions as $v ) {
            //if ($this->debug) $this->modx->log(4,$this->pfx." github version: ".$v->name." = ".version_compare($v->name,$this->getCurrentCoreVersion()));
            if ( version_compare( $v->name, $compare ) === 1 ) {
                $updateCandidates[] = $v->name;
            }
        }
        return $updateCandidates;
    }


    /**
     * Gets the latest core version from github tags and refreshes modxcom zipball state.
     *
     * @return boolean - true if the latest available version could be determined at gitub. False if
     *  something went wrong during lookup. The retrieved version data is stored in cache.
     */
    public
    function refreshCoreVersion() {
        if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " retrieving latest core version from github" );

        $time = microtime( true );

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $this->downloadUrls[ 'tags' ] );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLOPT_USERAGENT, "revolution" );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT_MS, $this->githubTimeout );
        $content = curl_exec( $ch );

        $time = round( microtime( true ) - $time, 2 );

        if ( $this->debug ) {
            $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " curl executed in ${time}s with result: " . curl_errno( $ch ) );
        }

        if ( curl_errno( $ch ) == 0 ) {
            curl_close( $ch );

            $curl_return = json_decode( $content, true );

            if ( isset( $curl_return[ 'message' ] ) ) {
                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " curl return message: " . ( $curl_return[ 'message' ] ) );

                $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " " . $this->coreData[ 'coreErrorMessage' ] );

                $cachedVersionArray = array(
                    'coreLatest' => -1,
                    'coreVersions' => array(),
                    'coreErrorCode' => 9999,
                    'coreErrorMessage' => "Github server replied with message: " . $curl_return[ 'message' ],
                    'coreLookupTime' => $time,
                );
                $this->setCoreVersion( $cachedVersionArray );

                return false;
            } else {

                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " github reply ok." );

                $versionArr = json_decode( $content );

                /* check if the latest version on github differs from current Version */
                // TODO: this won't work with github checkouts!!! Need a more sophisticated comparison

                usort( $versionArr, function ( $a, $b ) {
                    if ( $a->name == $b->name ) {
                        return 0;
                    }
                    return -version_compare( $a->name, $b->name );
                } );

                // reduce all the versions to the versions which are updates to this version
                $updateCandidates = $this->getUpdateableCoreVersions( $versionArr );

                // now cleanup the found update candidates according to check level from system settings
                $filteredCandidates = $this->filterCoreVersions( $updateCandidates );

                // The latest version is the first version in the filtered list, candidates are sorted
                $latest = $this->getCurrentCoreVersion();
                if ( sizeof( $filteredCandidates ) > 0 ) {
                    $latest = $filteredCandidates[ 0 ];
                }

                if ( $this->debug ) {
                    // $this->modx->log( 4, "filtered: " . print_r( $filteredCandidates, true ) );
                    // $this->modx->log( 4, "update: " . print_r( $updateCandidates, true ) );
                    // $this->modx->log( 4, print_r( $latest, true ) );
                }

                /*
                    $latest = $versionArr[0]->name;
                    if ($latest != $this->currentCoreVersion) {
                        if($this->debug) $this->modx->log(modX::LOG_LEVEL_DEBUG, $this->pfx." new version on github: " . $latest);
                    }
                 */

                $cachedVersionArray = array(
                    'coreLatest' => $latest,
                    'coreVersions' => $filteredCandidates,
                    'coreUpdates' => $updateCandidates,
                    'coreErrorCode' => 0,
                    'coreErrorMessage' => "",
                    'coreLookupTime' => $time,
                );
                $this->setCoreVersion( $cachedVersionArray );

                /* check if there is a zipball to download at modxcom */
                //$this->checkCoreDownload();

                return true;
            }
        } else {
            $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " Curl error retrieving latest version from github tags: " . curl_error( $ch ) );

            $cachedVersionArray = array(
                'coreLatest' => -1,
                'coreVersions' => array(),
                'coreErrorCode' => curl_errno( $ch ),
                'coreErrorMessage' => "Curl error with github: " . curl_error( $ch ),
                'coreLookupTime' => $time,
            );

            $this->setCoreVersion( $cachedVersionArray );
            curl_close( $ch );

            return false;
        }
    }

    /**
     * @return string Returns the latest core version which could be looked up.
     */
    public
    function getLatestCoreVersion() {
        return ( isset( $this->coreData[ 'coreLatest' ] ) ) ? $this->coreData[ 'coreLatest' ] : null;
    }

    /**
     * @return string Returns all versions which are update candidates.
     */
    public
    function getUpdateCandidates() {
        return ( isset( $this->coreData[ 'coreVersions' ] ) ) ? $this->coreData[ 'coreVersions' ] : null;
    }

    /**
     * @return string Returns the current version of the system.
     */
    public
    function getCurrentCoreVersion() {
        return $this->currentCoreVersion;
    }

    /**
     * @return bool|int Returns true if the version is updateable, false if not
     *                  and -1 if the current version is a github build (which should be
     *                  updated via github pull).
     */
    public
    function isCoreUpdateable() {
        $latest = ( isset( $this->coreData[ 'coreLatest' ] ) ) ? $this->coreData[ 'coreLatest' ] : null;
        if ( $this->is_dev_build( $this->currentCoreVersion ) ) {
            return -1;
        }
        // TODO: make real comparison here, not only negation
        return ( !is_null( $latest ) && $this->currentCoreVersion !== $latest );
    }

    /**
     * @area    string - the subwidget to generate or all if nothing given
     * @return string - HTML output for the widget
     */
    public
    function generateWidget( $area = "" ) {
        $output = $this->outputHtmlHeader;
        $output .= "<div class='updater-container'>";

        /* make a dry run to initialize lexicons?
         * this seems to be necessary to initialize the lexicon... must be a BUG
         * TODO verify this lexicon behaviour
         */

        // load lexicon
        //$this->modx->lexicon->load('updater:widget');

        switch ( $area ) {
            case 'core':
                $output .= $this->generateWidgetCore();
                break;
            case 'packages':
                $output .= $this->generateWidgetPackages();
                break;
            default:
                $output .= $this->generateWidgetCore();
                $output .= $this->generateWidgetPackages();
        }

        $output .= "</div>";

        return $output;
    }

    private
    function generateWidgetPackages() {
        $void = $this->outputInnerChunk;
        $this->modx->getParser()->processElementTags( '', $void, true );

        $importance = "";
        $message = "";
        $installableMsg = "";
        $updateableMsg = "";
        $state = "";
        $tooltip = "";
        $button_href = '?a=workspaces';
        $buttontext = ( $state != "up-to-date" ) ? $this->modx->lexicon( $this->ns . "widget_button_installer" ) : "";
        $button_tooltip = $this->modx->lexicon( $this->ns . "package_tooltip_button_installer" );
        $button_id = "";
        $errno = 0;

        if ( is_null( $this->packagesResponse ) || is_null( $this->extrasData ) ) {
            /* data is stale and needs a refresh */
            $title = $this->modx->lexicon( $this->ns . "package_stale_title" );
            $message = $this->modx->lexicon( $this->ns . "package_stale_msg" );
            $buttontext = $this->modx->lexicon( $this->ns . "widget_button_refresh" );
            $button_tooltip = $this->modx->lexicon( $this->ns . "widget_tooltip_button_refresh" );
            $button_href = "#";
            $state = "stale";
            $button_id = "refresh_packages";
            $errno = -1;
        } else {

            $permissionsNeeded = 'workspaces';
            if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " checking permission '${permissionsNeeded}': " . $this->modx->hasPermission( $permissionsNeeded ) );

            if ( !$this->modx->hasPermission( $permissionsNeeded ) ) {
                $buttontext = "Not allowed";
                $button_href = "#";
            }

            if ( sizeof( $this->getPackagesList() ) == 0 ) {
                /* weird: this can only happen in the updater development environment,
                    in all other cases at least the updater package itself is installed!
                */
                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " You are running the development environment of updater!" );
                $title = $this->modx->lexicon( $this->ns . "core_dev_title" );
                $message = $this->modx->lexicon( $this->ns . "package_dev_message" );
                $state = 'dev';

            } else {
                $message = "<table>";
                if ( $this->extrasData[ 'countInstallable' ] > 0 ) {
                    /* create list of not installed extras */
                    $installableMsg = "";
                    foreach ( $this->extrasData[ 'data' ] as $extra ) {
                        if ( !isset( $extra[ 'installed' ] ) || $extra[ 'installed' ] == "" ) {
                            $installableMsg .= "<tr><td><i class='icon icon-caret-right icon-fw'></i></td><td class='name'>" . $extra[ 'name' ] . "</td>";
                            $installableMsg .= "<td>" . $extra[ 'version' ] . "-" . $extra[ 'release' ] . "</td></tr>";
                        }
                    }
                    $installableMsg .= "";
                }
                if ( $this->extrasData[ 'countUpdateable' ] > 0 ) {
                    $updateableMsg = "";
                    foreach ( $this->extrasData[ 'updates' ] as $oldVersion => $newVersionData ) {
                        $name = $newVersionData[ 0 ][ 'name' ];
                        $newVersion = $newVersionData[ 0 ][ 'version' ];
                        $newVersionRelease = $newVersionData[ 0 ][ 'release' ];

                        $updateableMsg .= "<tr><td><i class='icon icon-download icon-fw'></i></td><td class='name'>${name}</td><td>${newVersion}-${newVersionRelease}</td></tr>";
                        // TODO link to extras page
                        // TODO can we get the changelog out of the provider data (not only the readme)
                    }
                    $updateableMsg .= "";
                }

                if ( $this->extrasData[ 'countUpdateable' ] > 0 ) {
                    $tooltip = $this->modx->lexicon( $this->ns . "package_tooltip_update" );
                    $message .= "" . $updateableMsg;
                    if ( $this->extrasData[ 'countInstallable' ] = 0 ) {
                        $title = $this->modx->lexicon( $this->ns . "package_title_update_and_noinstall" );
                    } else {
                        $title = $this->modx->lexicon( $this->ns . "package_title_update_and_install" );
                        $tooltip .= "\n" . $this->modx->lexicon( $this->ns . "package_tooltip_install" );
                        $message .= "" . $installableMsg;
                    }
                    $message .= "</table>";

                } else {
                    if ( $this->extrasData[ 'countInstallable' ] > 0 ) {
                        $tooltip = $this->modx->lexicon( $this->ns . "package_tooltip_install" );
                        $title = $this->modx->lexicon( $this->ns . "package_title_install" );


                        $message .= "<p>" . $this->modx->lexicon( $this->ns . "package_msg_install." . ( ( $this->extrasData[ 'countInstallable' ] > 1 ) ? 'multi' : 'single' ),
                                array( 'count' => $this->extrasData[ 'countInstallable' ] )
                            );
                        $message .= "</p>" . $installableMsg;
                        $message .= "</table>";

                        $tooltip = $this->modx->lexicon( $this->ns . "package_tooltip_install" );
                    } else {
                        /* nothing to update, nothing to install */
                        $title = $this->modx->lexicon( $this->ns . "package_title_uptodate" );
                        $message = $this->modx->lexicon( $this->ns . "package_msg_uptodate." . ( ( sizeof( $this->packagesResponse[ 'results' ] ) > 1 ) ? 'multi' : 'single' ),
                            array( 'count' => sizeof( $this->packagesResponse[ 'results' ] ) )
                        );
                        $tooltip = $this->modx->lexicon( $this->ns . "package_tooltip_uptodate" );
                    }
                }

                if ( $this->extrasData[ 'countUpdateable' ] == 0 && $this->extrasData[ 'countInstallable' ] == 0 ) {
                    $state = "up-to-date";
                } else if ( $this->extrasData[ 'countUpdateable' ] != 0 ) {
                    $state = "updateable";
                }
            }
        }

        $placeholders[ 'updater' ] = array(
            "area" => $this->modx->lexicon( $this->ns . "package_area" ),
            "title" => $title,
            "tooltip" => $tooltip,
            "current" => "",
            "icon" => 'cubes',
            "url" => '?a=workspaces',
            "notes" => '',
            "button_href" => $button_href,
            "buttontext" => $buttontext,
            "button_tooltip" => $button_tooltip,
            "message" => $message,
            "showButtons" => ( $state != "up-to-date" ) ? "1" : "0",
            "isImportant" => $importance,
            "button_id" => $button_id,
            "id" => 'package_container',
            "error" => '',
            "errno" => $errno,
            "state" => $state,
            "lookupTime" => 0
        );

        //return $this->modx->getChunk( 'updater.widget.tpl', $placeholders );
        //$this->modx->log(2,"PH: ".print_r($placeholders,true));

        $this->modx->setPlaceholders( $placeholders );

        $chunk = $this->outputInnerChunk;

        $c = $this->modx->newObject( 'modChunk', array( 'name' => "{tmp}-" . uniqid() ) );
        $c->setCacheable( false );
        $chunk = $c->process( $placeholders, $chunk );
        $this->modx->unsetPlaceholders( $placeholders );
        return $chunk;
    }

    /**
     * @return string Returns HTML data for the dashboard widget (core section).
     */
    private
    function generateWidgetCore() {

        $void = $this->outputInnerChunkCore;
        $this->modx->getParser()->processElementTags( '', $void, true );

        if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " core version: " . $this->getLatestCoreVersion() );
        if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " core error CODE: " . $this->coreData[ 'coreErrorCode' ] );

        $placeholders = array();

        $ec = -1;
        if ( isset( $this->coreData[ 'coreErrorCode' ] ) ) {
            $ec = $this->coreData[ 'coreErrorCode' ];
        }
        if ( $ec == 0 ) {
            $placeholders[ 'updater' ] = array(
                "area" => $this->modx->lexicon( $this->ns . "core_area" ),
                "current" => $this->getCurrentCoreVersion(),
                "update" => $this->getLatestCoreVersion(),
                "icon" => 'gears',
                "message" => "",
                "state" => ( $this->isCoreUpdateable() ) ? 'updateable' : 'up-to-date',
                "notes" => $this->downloadUrls[ 'changelog' ],
                "changelog" => $this->downloadUrls[ 'changelog' ],
                "error" => $this->coreData[ 'coreErrorMessage' ],
                "errno" => 0,
                "showButtons" => 0,
                "buttonscript" => "",
                "button_href" => "#",
                "id" => 'core_container',
                "meta" => time(),
                "isImportant" => "",
                "lookupTime" => $this->coreData[ 'coreLookupTime' ],
            );

            if ( $this->isCoreUpdateable() == true ) {
                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " this version (" . $this->getCurrentCoreVersion() . ") is updateable" );

                $multipleUpdates = array( 'multiple' => ( sizeof( $this->coreData[ 'coreVersions' ] ) > 1 ) ? "s" : "" );
                $placeholders[ 'updater' ] = array_merge( $placeholders[ 'updater' ], array(
                    "title" => $this->modx->lexicon( $this->ns . "core_update_title", $multipleUpdates ),
                    "tooltip" => $this->modx->lexicon( $this->ns . "core_update_tooltip" ),
                    "buttontext" => "",
                    "isImportant" => 'important',
                    "url" => $this->constructCoreDownloadUrl(),
                ) );

                $security = $this->securityUpdatesForVersion();
                $placeholders[ 'updater' ][ 'security' ] = $security;
                if ($this->debug) $this->modx->log( 4, "ADD security note: " . print_r( $security, true ) );

                if ( $security[ 'available' ] == 1 ) {
                    $placeholders[ 'updater' ][ 'title' ] = $this->modx->lexicon( $this->ns . "core_update_title_security" );
                    $placeholders[ 'updater' ][ 'notes' ] = $this->modx->lexicon( $this->ns . "core_update_notes_security", $security );
                    $placeholders[ 'updater' ][ 'tooltip' ] = $this->modx->lexicon( $this->ns . "core_update_tooltip_security", $security );

                    $updateCandidatesOutput = "<table class='versionlist'>";

                    if ( $security[ 'latestSecure' ] != $this->constructSignature( $this->getLatestCoreVersion() ) ) {
                        $updateCandidatesOutput .= "<tr class='recommended'><td>" . $this->modx->lexicon( $this->ns . "core_update_latest_secure" ) . "</td>";
                        $updateCandidatesOutput .= "<td>" . $security[ 'latestSecure' ] . "</td></tr>";
                        $updateCandidatesOutput .= "<tr class='latest'><td>" . $this->modx->lexicon( $this->ns . "core_update_latest_available" ) . "</td>";
                        $updateCandidatesOutput .= "<td>" . $this->constructSignature( $this->getLatestCoreVersion() ) . "</td></tr>";
                    } else {
                        $updateCandidatesOutput .= "<tr class='recommended'><td>" . $this->modx->lexicon( $this->ns . "core_update_latest_secure_available" ) . "</td>";
                        $updateCandidatesOutput .= "<td>" . $security[ 'latestSecure' ] . "</td></tr>";
                    }

                    $updateCandidatesOutput .= "</table>";

                    $placeholders[ 'updater' ][ 'message' ] = $updateCandidatesOutput;
                    $placeholders[ 'updater' ][ 'message' ] .= "<p class='hint'>" . $this->modx->lexicon( $this->ns . "core_update_notes_security", $security ) . "</p>";
                    $placeholders[ 'updater' ][ 'message' ] .= "<p class='hint fixes'>" . $this->modx->lexicon( $this->ns . "core_update_notes_fixes", $security ) . "</p>";
                } else {

                    // walk through the list of update candidates here
                    $updateCandidatesOutput = "<table class='versionlist'>";

                    if ( sizeof( $this->coreData[ 'coreVersions' ] ) <= 2 ) {
                        foreach ( $this->coreData[ 'coreVersions' ] as $i => $v ) {
                            $add = "";
                            if ( $i == 0 ) {
                                $add .= "<tr class='latest'><td>" . $this->currentCoreVersion . "</td><td><i class='icon icon-long-arrow-right icon-fw'></i></td><td>${v}</td>";
                            } else {
                                $add .= "<tr><td>&nbsp;</td></td><td><i class='icon icon-long-arrow-right icon-fw'></i></td><td>${v}</td>";
                            }
                            $tmp = "";
                            if ( $this->is_rc_build( $v ) ) {
                                $tmp .= "Unstable ";
                            } else {
                                $tmp .= "Stable ";
                            }
                            if ( $this->is_patch_build( $v ) ) {
                                $tmp .= "patch release";
                            } else if ( $this->is_version_level( $v, 'minor' ) ) {
                                $tmp .= "new minor version";
                            }
                            if ( $tmp != '' ) {
                                $add .= "<td><i class='help icon icon-info-circle' title='${tmp}'></i> </td>";
                            } else {
                                $add .= "<td>&nbsp;</td>";
                            }
                            $updateCandidatesOutput .= $add . "</tr>";
                        }
                    } else {
                        /* no need to show more than 3 versions */
                        $v = $this->coreData[ 'coreVersions' ][ 0 ];    // the first available version
                        $updateCandidatesOutput .= "<tr class='latest'><td>" . $this->currentCoreVersion . "</td><td><i class='icon icon-long-arrow-right icon-fw'></i></td><td>${v}</td>";

                        $updateCandidatesOutput .= "<tr class='issues'><td>&nbsp;</td></td><td><i class='icon icon-ellipsis-v icon-fw'></i></td><td><em class='fixes'>... " . $security[ 'issues' ] . " fixes ...</em></td>";

                        $v = end( $this->coreData[ 'coreVersions' ] );    // the latest available version
                        $updateCandidatesOutput .= "<tr class='first'><td></td><td><i class='icon icon-long-arrow-right icon-fw'></i></td><td>${v}</td>";

                    }
                    $updateCandidatesOutput .= "</table>";

                    $placeholders[ 'updater' ][ 'updateCandidates' ] = $updateCandidatesOutput;
                }

                $type = "traditional";
                /* if a download check was ok, add the download button */
                $dl = $this->coreDownload[ $this->coreData[ 'coreLatest' ] ][ $type ];
                if ( $dl[ 'downloadable' ] === true ) {
                    if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " add download button to widget" );

                    // TODO: mark the not downloadable cores here

                    /* add the setup magic button */
                    /* currently not supported, but prepared! :-) */
                    /*
                    $placeholders['updater'] = array_merge($placeholders['updater'], array(
                        "buttontext"    => "Setup",
                        "button_href"   => '', //$this->constructCoreDownloadUrl($type),
                        "showButtons"   => 1,
                        "button_tooltip"=> "Opens an installation window.\nHere you can setup options and\nstart the download and install of the new version."
                    ));
                    */
                }

            } else if ( $this->isCoreUpdateable() === false ) {
                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " this version is NOT updateable" );

                $placeholders[ 'updater' ] = array_merge( $placeholders[ 'updater' ], array(
                    "title" => $this->modx->lexicon( $this->ns . "core_uptodate_title" ),
                    "message" => $this->modx->lexicon( $this->ns . "core_uptodate_msg", array( 'version' => $this->getCurrentCoreVersion() ) ),
                    "buttontext" => "",
                    "isImportant" => "",
                ) );
            } else {
                // -1: dev build
                if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " this version is a dev build" );

                $placeholders[ 'updater' ] = array_merge( $placeholders[ 'updater' ], array(
                    "title" => $this->modx->lexicon( $this->ns . "core_dev_title" ),
                    "message" => $this->modx->lexicon( $this->ns . "core_dev_msg", array( 'version' => $this->getCurrentCoreVersion() ) ),
                    "buttontext" => "",
                    "isImportant" => "",
                    "state" => 'dev',
                ) );
            }
        } else {
            if ( $this->debug ) $this->modx->log( modX::LOG_LEVEL_DEBUG, $this->pfx . " show update error on widget: " . $this->coreData[ 'coreErrorMessage' ] );
            /* check the error cause:
                0: no error, data is up to date
                -1: no error, but data is outdated
                >=1: an error occured.
            */
            $placeholders[ 'updater' ] = array(
                "area" => $this->modx->lexicon( $this->ns . "core_area" ),
                "current" => $this->getCurrentCoreVersion(),
                "update" => "",
                "icon" => 'gears',
                "tooltip" => $this->coreData[ 'coreErrorMessage' ],
                "id" => "core_container",
                "meta" => time(),
                "buttonscript" => '', //file_get_contents( MODX_ASSETS_PATH."components/updater/elements/js/updater.refresh.js"),
                "buttonscriptUrl" => MODX_ASSETS_URL . "components/updater/js/updater.widget.js",
                "button_href" => "#",
                "button_id" => "refresh_core",
                "button_tooltip" => $this->modx->lexicon( $this->ns . "widget_tooltip_button_refresh" ),
                "showButtons" => 1,
                "errno" => $ec,
                "error" => $this->coreData[ 'coreErrorMessage' ],
                "isImportant" => "",
            );
            if ( $ec < 0 ) {
                /* data is stale */
                $placeholders[ 'updater' ] = array_merge( $placeholders[ 'updater' ], array(
                    "url" => MODX_CONNECTORS_URL . "/updater/updater.refresh.php",
                    "title" => $this->modx->lexicon( $this->ns . "core_stale_title" ),
                    "message" => $this->modx->lexicon( $this->ns . "core_stale_msg", array( 'version' => $this->getCurrentCoreVersion() ) ),
                    "state" => 'stale',
                    "buttontext" => $this->modx->lexicon( $this->ns . "widget_button_refresh" ),
                    "notes" => '',
                    "error" => $this->modx->lexicon( $this->ns . "core_stale_title" ),
                ) );
            } else if ( $ec > 0 ) {
                /* an error occured */
                $placeholders[ 'updater' ] = array_merge( $placeholders[ 'updater' ], array(
                    "url" => "",
                    "title" => $this->modx->lexicon( $this->ns . "core_error_title" ),
                    "message" => $this->modx->lexicon( $this->ns . "core_error_msg", array( 'version' => $this->getCurrentCoreVersion() ) ),
                    "state" => 'error',
                    "buttontext" => $this->modx->lexicon( $this->ns . "widget_button_retry" ),
                    "button_tooltip" => $this->modx->lexicon( $this->ns . "widget_tooltip_button_retry" ),
                ) );
            }
        }

        $this->modx->setPlaceholders( $placeholders );

        $chunk = $this->outputInnerChunkCore;

        $c = $this->modx->newObject( 'modChunk', array( 'name' => "{tmp}-" . uniqid() ) );
        $c->setCacheable( false );
        $chunk = $c->process( $placeholders, $chunk );
        $this->modx->unsetPlaceholders( $placeholders );
        return $chunk;
    }

    /* slice the version and give back a full array or just the part */
    private
    function versionSlice( $version, $part = "" ) {
        if ( is_int( $version ) ) {
            return $version;
        }
        $matches = array();
        preg_match_all( '/(?<prefix>v)?(?<major>\d*)\.(?<minor>\d*)\.(?<patch>\d*)\-(?<release>[\w\d]*)?/s', $version, $matches, PREG_SET_ORDER );
        $v = $matches[ 0 ];
        //$this->modx->log(2,json_encode($matches,true));
        if ( is_null( $part ) ) {
            return $matches[ 0 ];
        }
        if ( $part == "" ) {
            return array( 'major' => $v[ 'major' ], 'minor' => $v[ 'minor' ], 'patch' => $v[ 'patch' ], 'release' => $v[ 'release' ] );
        }
        return $v[ $part ];
    }

    /**
     * Reconstruct the full signature from version array.
     *
     * @param mixed $v
     *
     * @return string
     */
    private
    function constructSignature( $v = null ) {
        if ( is_int( $v ) ) {
            return array();
        }
        if ( is_string( $v ) ) {
            $v = $this->versionSlice( $v );
        }
        return $v[ 'major' ] . "." . $v[ 'minor' ] . "." . $v[ 'patch' ] . "-" . $v[ 'release' ];
    }

    /*
     * returns packages
     */
    public
    function getPackagesList() {
        if ( isset( $this->extrasData[ 'data' ] ) ) {
            return $this->extrasData[ 'data' ];
        }
        return array();
    }

    public
    function getPackagesUpdateList() {
        if ( isset( $this->extrasData[ 'updates' ] ) ) {
            return $this->extrasData[ 'updates' ];
        }
        return array();
    }

}
