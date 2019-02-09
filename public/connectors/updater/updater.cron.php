<?php
/**
 * This script is called by the updater cron JS from a web page request.
 * It does not return anything.
 *
 * User: jens
 * Date: 21.12.15
 * Time: 14:14
 */

define('MODX_API_INCLUDED', 1);
#require_once dirname(dirname(__FILE__)) . '/index.php';

require_once dirname(dirname(__FILE__)) . '/config.core.php';
require_once MODX_CORE_PATH.'model/modx/modx.class.php';

$modx = new modX();
$modx->initialize('web');

/*
    do we need to secure this script somehow?
    What happens if a bad guy is frequently calling it?
    - apparently the same if he calls any other modx page
    - could be secured by a secret hash which is only valid for one call
*/

$modx->invokeEvent('OnUpdaterNotify');
$modx->invokeEvent('OnUpdaterCoreRefresh');
$modx->invokeEvent('OnUpdaterPackagesRefresh');


exit;