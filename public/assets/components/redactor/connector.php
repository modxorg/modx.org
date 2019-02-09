<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH . 'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('redactor.core_path', null, $modx->getOption('core_path') . 'components/redactor/');
$redactor = $modx->getService('redactor', 'Redactor' , $corePath . 'model/redactor/');
if (!($redactor instanceof Redactor)) {
    return 'Error loading Redactor class from ' . $corePath;
}

$modx->lexicon->load('redactor:default');

/* handle request */
$modx->request->handleRequest(array(
    'processors_path' => $corePath.'processors/',
    'location' => '',
));
