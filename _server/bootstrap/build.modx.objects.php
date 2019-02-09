<?php
// require spyc for yaml
require_once "/vagrant/_server/bootstrap/lib/spyc.php";
$instance = new MODXConfigLoader();
$instance->build();

class MODXConfigLoader {

    public $data_filename = '/vagrant/_serverconfig/vagrant.config.yaml';

    public $modx = null;

    public $primaries = array(
        'modContextSetting' => array(
            'key', 'context_key'
        ),
        'modSystemSetting' => array(
            'key'
        )
    );

    public function build(){
        // load YAML file
        $yaml = file_get_contents($this->data_filename);
        if (!$yaml) {
            logMsg('Error: Could not load YAML file!');
            die();
        }
        // parse YAML
        $data = spyc_load($yaml);
        if (!$data) {
            logMsg('Error: Could not parse YAML!');
            die();
        }

        // use the correct configuration
        $data = $data['configuration'];
        $data = $data[$data['use']];

        if (isset($data['modx_objects']) === false) {
            die('Error: No modx_objects config key set');
        }

        if (empty($data['modx_objects'])) {
            die('Empty modx_objects config - nothing to build');
        }

        $this->loadMODX();
        $this->buildObjects($data['modx_objects']);
    }

    public function loadMODX() {
        if ($this->modx) {
            return $this->modx;
        }
        if (!file_exists('/vagrant/config.core.php')) {
            $this->logMsg('Error: No MODX config file found!');
            die();
        }
        require_once('/vagrant/config.core.php');
        require_once(MODX_CORE_PATH . 'model/modx/modx.class.php');
        $modx = new \modX();
        $modx->initialize('mgr');
        $modx->getService('error', 'error.modError', '', '');
        $modx->setLogTarget('ECHO');
        $this->modx = $modx;
        return $modx;
    }

    public function logMsg($msg) {
        echo $msg;
    }

    public function buildObjects($data){
        foreach ($data as $classKey => $objects) {
            foreach ($objects as $obj) {
                $this->buildSingleObject($classKey, $obj);
            }
        }
    }

    public function getPrimaryKey($class, $data) {
        $primaries = $this->primaries[$class];
        $primary = array();
        foreach ($primaries as $pkey) {
            $primary[$pkey] = $data[$pkey];
        }
        return $primary;
    }

    public function buildSingleObject($class, $data) {
        $this->logMsg('Building '.$class.': '.print_r($data,true));

        $primary = $this->getPrimaryKey($class, $data);
        $new = false;
        $object = $this->modx->getObject($class, $primary);
        if (!($object instanceof \xPDOObject)) {
            $new = true;
            $object = $this->modx->newObject($class);
        }
        $object->fromArray($data, '', true, true);
        if (!$object->save()) {
            $this->logMsg('Could not save '.$class);
        }

        $this->logMsg('Saved '.($new ? 'new ' : '').$class);
    }
}
