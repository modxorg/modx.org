<?php
$eventName = $modx->event->name;

switch($eventName) {
    case 'OnUpdaterCoreRefresh':
    case 'OnUpdaterPackagesRefresh':
        /* just get the updater object and refresh core and extras */
        /* flag to only refresh if caches are invalid! */

        $debug = $modx->getOption('updater.debug', null, false);

        if ($debug) $modx->log(modX::LOG_LEVEL_DEBUG, "[Updater] refresh plugin was triggered.");

        /* try to get the Updater object */
        if (!$modx->loadClass('Updater', MODX_CORE_PATH . 'components/updater/model/', true, true)) {
            return;
        }

        /*
            instead of handling these events we can also add js triggers to our pages which
            call the refresh connector directly.
        */

        $updater = new Updater($modx, array());

        if ($eventName=="OnUpdaterCoreRefresh") {
            if ($updater->isCoreRefreshNeeded()) {
                $updater->refreshCoreVersion();
                $updater->refreshCoreDownload();
                $updater->refreshMUIFromURL();
            }
        }
        if ($eventName=="OnUpdaterPackagesRefresh") {
            if ($updater->isPackageRefreshNeeded()) {
                $updater->refreshPackageData();
            }
        }
}

return;