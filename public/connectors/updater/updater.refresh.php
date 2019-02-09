<?php

/* this small script refreshes the updater data whenever it is called */

define('MODX_CONNECTOR_INCLUDED', 1);
require_once dirname(dirname(__FILE__)) . '/index.php';

/* try to get the Updater object */
if (!$modx->loadClass('Updater', MODX_CORE_PATH . 'components/updater/model/', true, true)) {
    exit;
}

$updater = new Updater($modx, array());

$_TRANSFER = array_merge( $_GET, $_POST );
if (isset($_TRANSFER['return'])) {
    switch ($_TRANSFER['return']) {
        case 'widget_core':
            $result = $updater->refreshCoreVersion();
            $result = $updater->refreshCoreDownload();
            $result = $updater->refreshMUIFromURL();
            $response = array( 'html' => $updater->generateWidget('core') );
            break;
        case 'widget_packages':
            $result = $updater->refreshPackageData();
            $response = array( 'html' => $updater->generateWidget('packages') );
            break;
        default:
            exit;
        // noop: did the update and return;
    }
    header("Content-Type: text/json");
    header_remove("X-Powered-By");
    echo json_encode($response);
}

exit;