<?php

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

/**
 * Class SiteDashClient
 */
class SiteDashClient
{
    const VERSION = '1.0.0-pl';
    /**
     * @var modX|null $modx
     */
    public $modx = null;
    /**
     * @var array
     */
    public $config = array();

    /**
     * @param \modX $modx
     * @param array $config
     */
    public function __construct(modX &$modx, array $config = array())
    {
        $this->modx =& $modx;
        $corePath = $this->modx->getOption('sitedashclient.core_path', $config, $this->modx->getOption('core_path') . 'components/sitedashclient/');
        $assetsUrl = $this->modx->getOption('sitedashclient.assets_url', $config, $this->modx->getOption('assets_url') . 'components/sitedashclient/');
        $assetsPath = $this->modx->getOption('sitedashclient.assets_path', $config, $this->modx->getOption('assets_path') . 'components/sitedashclient/');
        $this->config = array_merge([
            'basePath' => $corePath,
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',
            'elementsPath' => $corePath . 'elements/',
            'chunksPath' => $corePath . 'elements/chunks/',
            'templatesPath' => $corePath . 'templates/',
            'assetsPath' => $assetsPath,
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'assetsUrl' => $assetsUrl,
            'connectorUrl' => $assetsUrl . 'connector.php',
        ], $config);

//        $modelPath = $this->config['modelPath'];
//        $this->modx->addPackage('sitedashclient', $modelPath);
        $this->modx->lexicon->load('sitedashclient:default');
    }

    public function isValidRequest($siteKey, $signature, $data)
    {
        // Verify the site key, stored in a file
        if ($this->_getSiteKey() !== $siteKey) {
            return false;
        }

        // Re-create the signature data
        $sigData = 'SIG-V1||';
        $sigData .= !empty($data['request']) ? $data['request'] : 'REQUEST-NOT-PROVIDED';
        $sigData .= '||';
        $sigData .= !empty($data['params']) ? $this->_stringifyParams($data['params']) : 'PARAMS-NOT-PROVIDED';
        $sigData .= '||';
        $sigData .= !empty($siteKey) ? $siteKey : 'SITEKEY-NOT-PROVIDED';

        // Grab the pubkey, stored in a file
        $pubKey = $this->_getPublicKey();

        // Check if we have OpenSSL
        if (!function_exists('openssl_verify')) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[SiteDashClient] Unable to verify SiteDash request signature; OpenSSL is not installed.');
            return false;
        }

        // Decode the signature, as we transmit it encoded as base64 instead of binary
        $signature = base64_decode($signature);

        // Verify the signature is correct for the specified data using the public key, matching the private key on the SiteDash server
        $result = openssl_verify($sigData, $signature, $pubKey, OPENSSL_ALGO_SHA1);
        return $result === 1;
    }

    protected function _getSiteKey() {
        $actualSiteKeyFile = $this->config['corePath'] . '.sdc_site_key';
        if (file_exists($actualSiteKeyFile)) {
            return @file_get_contents($actualSiteKeyFile);
        }
        return false;
    }

    protected function _getPublicKey() {
        $actualSiteKeyFile = $this->config['corePath'] . '.sdc_public_key';
        if (file_exists($actualSiteKeyFile)) {
            return @file_get_contents($actualSiteKeyFile);
        }
        return false;
    }

    protected function _stringifyParams(array $params)
    {
        $stringParams = [];
        foreach ($params as $key => $value) {
            $stringParams[] = $key . ':' . $value;
        }
        $stringParams = implode(',', $stringParams);
        return $stringParams;
    }
}
