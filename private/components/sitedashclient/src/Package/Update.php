<?php

namespace modmore\SiteDashClient\Package;

use modmore\SiteDashClient\LoadDataInterface;

class Update implements LoadDataInterface
{
    protected $modx;
    protected $packageSignature = '';
    protected $log = [];
    /** @var \modTransportPackage */
    protected $package;
    /** @var \modTransportProvider */
    protected $provider;
    protected $_signature;
    protected $_location;
    /** @var \modTransportPackage */
    protected $_newPackage;

    public function __construct(\modX $modx, $signature = '')
    {
        $this->modx = $modx;
        $this->packageSignature = $signature;
    }

    public function run()
    {
        $logs = [];
        $this->modx->setLogLevel(\modX::LOG_LEVEL_INFO);
        $this->modx->setLogTarget([
            'target' => 'ARRAY_EXTENDED',
            'options' => [
                'var' => &$logs,
            ]
        ]);
        try {
            $this->getUpdate();
            $this->download();
            $this->install();
        } catch (\Exception $e) {
            $this->_copyLogs($logs);
            $this->log('[ERROR] ' . $e->getMessage());
            http_response_code(503);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage(),
                'log' => $this->log,
            ]);
            exit();
        }

        $this->_copyLogs($logs);
        $return = [
            'success' => true,
            'signature' => $this->_signature,
            'log' => $this->log,
        ];

        http_response_code(200);
        echo json_encode($return, JSON_PRETTY_PRINT);
    }

    protected function getUpdate() {
        if ($this->packageSignature === '') {
            throw new \RuntimeException('Empty package name');
        }

        $this->package = $this->modx->getObject('transport.modTransportPackage', [
            'signature' => $this->packageSignature,
        ]);

        if (!$this->package instanceof \modTransportPackage) {
            throw new \RuntimeException('Package does not seem to be installed; can only update packages that are already installed.');
        }
        $this->log('Found package ' . $this->package->get('signature'));

        $this->provider =& $this->package->getOne('Provider');
        if (!$this->provider instanceof \modTransportProvider) {
            throw new \RuntimeException('Package does not have an associated package provider; can\'t update.');
        }
        $un = $this->provider->get('username');
        if ($un !== '') {
            $un = ' as ' . $un;
        }
        $this->log('Checking provider ' . $this->provider->get('name') . $un . ' for available updates');

        $packages = $this->provider->latest($this->packageSignature);
        if (is_string($packages)) {
            throw new \RuntimeException('Received error when checking for updates: ' . htmlentities($packages));
        }

        if (count($packages) < 1) {
            throw new \RuntimeException('No updates available from chosen package provider. Perhaps an update is available from another provider, or there is a license problem?');
        }

        $options = array();
        /** @var \SimpleXMLElement $package */
        foreach ($packages as $package) {
            $options[(string)$package['signature']] = [
                'location' => (string)$package['location'],
                'signature' => (string)$package['signature']
            ];
            $this->log('Available version: ' . (string)$package['signature']);
        }

//        if (count($options) !== 1) {
//             @todo support preferred versions to upgrade to
//        }

        $opt = reset($options);
        if (count($options) > 1) {
            $this->log('Updating to: ' . $opt['signature']);
        }
        $this->_signature = $opt['signature'];
        $this->_location = $opt['location'];
    }

    protected function download() {
        $this->log('Downloading ' . $this->_signature . '...');
        $this->_newPackage = $this->provider->transfer($this->_signature, null, array('location' => $this->_location));
        if (!$this->_newPackage) {
            throw new \RuntimeException('Failed to download package ' . $this->_signature);
        }
        $this->log('Download of ' . $this->_newPackage->get('signature') . ' complete.');
    }

    protected function install()
    {
        $this->log('Installing ' . $this->_newPackage->get('signature') . '...');
        $installed = $this->_newPackage->install([]);
        $this->modx->cacheManager->refresh(array($this->modx->getOption('cache_packages_key', null, 'packages') => array()));
        $this->modx->cacheManager->refresh();

        if (!$installed) {
            throw new \RuntimeException('Failed to install package ' . $this->_signature);
        }

        $this->log('Installation successful!');

        $this->modx->invokeEvent('OnPackageInstall', array(
            'package' => $this->_newPackage,
            'action' => $this->_newPackage->previousVersionInstalled() ? \xPDOTransport::ACTION_UPGRADE : \xPDOTransport::ACTION_INSTALL
        ));
    }

    protected function log($msg) {
        $this->log[] = [
            'timestamp' => time(),
            'message' => $msg,
        ];
    }

    /**
     * Copies logs received from the MODX log handler into the log format the server expects
     *
     * @param $logs
     */
    private function _copyLogs(array $logs)
    {
        foreach ($logs as $log) {
            $msg = $log['msg'];
            $msg = str_replace([MODX_CORE_PATH, MODX_BASE_PATH], ['{core_path}', '{base_path}'], $msg);
            $this->log("[{$log['level']}] {$msg}");
        }
    }
}