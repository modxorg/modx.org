<?php
/**
 * ContentBlocks
 *
 * Copyright 2013 by Mark Hamstra <hello@markhamstra.com>
 *
 * @package contentblocks
 * @var modX $modx
 */

require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('contentblocks.core_path',null,$modx->getOption('core_path').'components/contentblocks/');
$modx->getService('contentblocks', 'ContentBlocks', $corePath . 'model/contentblocks/');
$modx->lexicon->load('contentblocks:default');


/* handle request */
$path = $modx->getOption('processorsPath',$modx->contentblocks->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));
