<?php

namespace modmore\SiteDashClient;

class LoadSystemData implements LoadDataInterface {
    protected $modx;
    protected $params = array();

    public function __construct(\modX $modx, array $params)
    {
        $this->modx = $modx;
        $this->params = $params;
    }

    public function run()
    {
        $data = [];
        $data['client'] = \SiteDashClient::VERSION;
        $data['modx'] = $this->getMODXData();
        $data['server'] = $this->getServerInformation();
        $data['packages'] = $this->getPackages();
        $data['health'] = $this->getHealth();
        return $data;
    }

    protected function getMODXData()
    {
        $data = [];
        $data['version'] = include MODX_CORE_PATH . 'docs/version.inc.php';
        $data['client_url'] = $this->modx->getOption('sitedashclient.assets_url', null, $this->modx->getOption('assets_url') . 'components/sitedashclient/') . 'pull.php';
        $data['manager_url'] = $this->modx->getOption('manager_url');
        $data['core_outside_root'] = strpos(MODX_CORE_PATH, MODX_BASE_PATH) === false;
        $data['core_folder'] = $data['core_outside_root'] ? false : substr(MODX_CORE_PATH, strlen(MODX_BASE_PATH));
        $data['core_path'] = MODX_CORE_PATH;
        $data['base_path'] = MODX_BASE_PATH;
        $data['base_url'] = MODX_BASE_URL;
        $data['assets_url'] = MODX_ASSETS_URL;
        $data['connectors_path'] = MODX_CONNECTORS_PATH;
        $data['connectors_url'] = MODX_CONNECTORS_URL;
        $data['manager_language'] = $this->modx->getOption('manager_language');
        $data['which_editor'] = $this->modx->getOption('which_editor');
        $errorFile = $this->modx->getOption('cache_path') . 'logs/error.log';
        $data['error_log_size'] = file_exists($errorFile) ? filesize($errorFile) : 0;
        $data['users'] = $this->modx->getCount('modUser');
        $data['users_sudo'] = $this->modx->getCount('modUser', ['sudo' => true]);
        $data['users_sudo_usernames'] = [];
        $c = $this->modx->newQuery('modUser');
        $c->select($this->modx->getSelectColumns('modUser', 'modUser', '', ['id', 'username']));
        $c->where(['sudo' => true]);
        foreach ($this->modx->getIterator('modUser', $c) as $sudoUser) {
            $data['users_sudo_usernames'][] = $sudoUser->get('username');
        }
        return $data;
    }

    protected function getServerInformation()
    {
        $data = [];
        $data['php_version'] = PHP_VERSION;

        $connection =& $this->modx->getConnection();
        if ($connection) {
            $pdoInstance = $connection->pdo;
            $data['pdo_driver'] = $pdoInstance->getAttribute(\PDO::ATTR_DRIVER_NAME);
            $data['pdo_client_version'] = $pdoInstance->getAttribute(\PDO::ATTR_CLIENT_VERSION);
            $data['pdo_server_version'] = $pdoInstance->getAttribute(\PDO::ATTR_SERVER_VERSION);
        }

        $data['disk_free_space'] = @disk_free_space(MODX_BASE_PATH);
        $data['disk_total_space'] = @disk_total_space(MODX_BASE_PATH);
        $data['memory_limit'] = ini_get('memory_limit');
        $data['max_execution_time'] = ini_get('max_execution_time');
        
        $data['server_addr'] = array_key_exists('SERVER_ADDR', $_SERVER) ? $_SERVER['SERVER_ADDR'] : null;
        $data['server_name'] = array_key_exists('SERVER_NAME', $_SERVER) ? $_SERVER['SERVER_NAME'] : null;
        $data['server_software'] = array_key_exists('SERVER_SOFTWARE', $_SERVER) ? $_SERVER['SERVER_SOFTWARE'] : null;
        $data['server_protocol'] = array_key_exists('SERVER_PROTOCOL', $_SERVER) ? $_SERVER['SERVER_PRO'] : null;

        $data['https'] = array_key_exists('HTTPS', $_SERVER) ? $_SERVER['HTTPS'] : null;

        return $data;
    }

    protected function getPackages()
    {
        $data = [
            'providers' => [],
            'packages' => [],
        ];

        /** @var \modTransportProvider $provider */
        foreach ($this->modx->getIterator('transport.modTransportProvider') as $provider) {
            $data['providers'][] = [
                'id' => $provider->get('id'),
                'name' => $provider->get('name'),
                'service_url' => $provider->get('service_url'),
                'username' => $provider->get('username'),
            ];
        }

        /** @var \modTransportPackage $package */
        foreach ($this->modx->getIterator('transport.modTransportPackage') as $package) {
            $name = $package->get('package_name');
            $name = strtolower($name);
            if (!array_key_exists($name, $data['packages'])) {
                $data['packages'][$name] = [];
            }
            $data['packages'][$name][] = $package->get([
                'signature',
                'created',
                'updated',
                'installed',
                'state',
                'provider',
                'package_name',
                'version_major',
                'version_minor',
                'version_patch',
                'release',
                'release_index',
            ]);
        }

        return $data;
    }

    protected function getHealth()
    {
        $health = [];

        $name = $this->modx->getTableName('modSession');
        if ($statusQuery = $this->modx->query('CHECK TABLE ' . $name)) {
            $status = $statusQuery->fetchAll(\PDO::FETCH_ASSOC);
            $i = [];
            foreach ($status as $s) {
                $i[$s['Msg_type']] = $s['Msg_text'];
            }
            $health['session_table'] = json_encode($i);
        }

        return $health;
    }
}