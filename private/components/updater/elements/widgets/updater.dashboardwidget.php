<?php

/* immediately return if the user does not have sudo rights
   or the right to perform maintenance tasks. Results in showing no widget */
if (!$modx->user->get('sudo') && !$modx->hasPermission('system_perform_maintenance_tasks')) {
    return;
}

/* try to get a fresh Updater */
if (!$modx->loadClass('Updater', MODX_CORE_PATH . 'components/updater/model/', true, true)) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[Updater] Could not load  class.');
    return;
}

//$time = microtime(true);
$updater = new Updater($modx, array());
//$modx->log(4,"[Updater Widget] class time:\t ".round(microtime(true)-$time,2));

//$time = microtime(true);
$output = $updater->generateWidget();
//$modx->log(4,"[Updater Widget] widget time:\t ".round(microtime(true)-$time,2));

// register scripts
// $modx->regClientStartupScript(MODX_ASSETS_URL.'components/updater/js/spin.min.js');  // spinner no longer needed
$modx->regClientStartupScript(MODX_ASSETS_URL.'components/updater/js/jquery.min.js');
$modx->regClientStartupScript(MODX_ASSETS_URL.'components/updater/js/updater.widget.js');

return $output;
