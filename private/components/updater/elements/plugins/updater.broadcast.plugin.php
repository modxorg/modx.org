<?php
/* attention: this does not work in anon web context !!! */
if (!$modx->user->get('sudo') && !$modx->hasPermission('system_perform_maintenance_tasks')) {
    return;
}

$eventName = $modx->event->name;
switch($eventName) {

    case 'OnManagerPageBeforeRender':
        if ($modx->getOption('updater.show_broadcast_messages', null, false)) {




            /* try to get a fresh Updater */
            if (!$modx->loadClass('Updater', MODX_CORE_PATH . 'components/updater/model/', true, true)) {
                $modx->log(modX::LOG_LEVEL_ERROR, '[Updater] Could not load  class.');
                return;
            }

            $updater = new Updater($modx, array());
            
            /* check if there is anything set as broadcast message */
            $msg = array();

            $script = MODX_ASSETS_URL."components/updater/js/updater.broadcast.js";
            

            /* check in cache if there is an update detected */
            $cacheOptions = array( xPDO::OPT_CACHE_KEY => 'updater' );
            $cachedVersion = $modx->cacheManager->get('latestCoreVersion', $cacheOptions);
            $currentVersion = "v".$modx->getOption("settings_version");
            
            //$modx->log(modX::LOG_LEVEL_DEBUG, "[broadcast] checking updater version: ".$cachedVersion);
            
            if ($cachedVersion && $cachedVersion!==null) {
                if ($cachedVersion!=$currentVersion) {
                    $msg = array( "text" => "System update available to MODX  " . $cachedVersion,
                                    "link" => "",
                                    "type" => "warn",
                                    "icon" => "icon-gears",
                                    "icon-label" => "Core"
                    );
                    $modx->log(modX::LOG_LEVEL_DEBUG, "[broadcast] broadcast message: " . $msg['text']);
                    
                    /* inject javascript to handle display */
                    $modx->regClientStartupHTMLBlock('<script type="text/javascript">var updaterMsg=' . json_encode($msg) . ';</script>');
                    $modx->regClientStartupHTMLBlock('<style type="text/css">'.file_get_contents(MODX_ASSETS_PATH.'components/updater/css/updater.broadcast.css').'</style>');
                    $modx->regClientStartupScript($script);
                } else {
                    $msg = array( "text" => "Your MODX system core version is up-to-date (".$currentVersion.")",
                        "link" => "",
                        "type" => "info",
                        "icon" => "icon-info-circle",
                        "icon-label" => "Core" );
                }
                
            } else {
                //$modx->log(modX::LOG_LEVEL_DEBUG, "[broadcast] no update information available.");
            }
            break;
        }
}
return;