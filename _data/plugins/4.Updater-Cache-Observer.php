id: 4
name: 'Updater Cache Observer'
description: 'This plugin observes package changes and refreshes Updaters caches accordingly.'
category: Updater
properties: null

-----

$eventName = $modx->event->name;
switch($eventName) {

    case 'OnCacheUpdate':

        /* only trigger a refresh if packages or system settings are changed */
        $packageKey = $modx->getOption('cache_packages_key', null, 'packages');
        $settingsKey = $modx->getOption('cache_system_settings_key', null, 'system_settings');

        if ( isset($results[ $settingsKey ]) && $results[$settingsKey]) {
            //$modx->log(modX::LOG_LEVEL_DEBUG, "[Updater] clearing internal caches.");
            //$modx->log(modX::LOG_LEVEL_WARN, "[Updater] " . print_r($results, true));

            //$modx->log(modX::LOG_LEVEL_DEBUG, "[Updater]  clear packages cache");
            $result1 = $modx->cacheManager->clean(array(xPDO::OPT_CACHE_KEY => 'updater-packages'));

            //$modx->log(modX::LOG_LEVEL_DEBUG, "[Updater]  clear core cache");
            $result2 = $modx->cacheManager->clean(array(xPDO::OPT_CACHE_KEY => 'updater-core'));

            if ($result1 && $result2) {
                //$modx->log(modX::LOG_LEVEL_INFO, "[Updater] successfully cleared Updaters' internal caches due to changed system settings/cache clear");
            } else {
                //$modx->log(modX::LOG_LEVEL_WARN, "[Updater] There was an error clearing Updaters' internal caches.");
            }
            break;
        }

        if ( isset($results[ $packageKey ]) && $results[$packageKey]) {
            $modx->log(modX::LOG_LEVEL_INFO, "[Updater] packages have been changed, clearing updater cache.");
            $cacheOptions = array( xPDO::OPT_CACHE_KEY => 'updater-packages' );
            $result = $modx->cacheManager->clean($cacheOptions);
            //$modx->log(modX::LOG_LEVEL_INFO, "[Updater] clean result: ".$result);
            //$modx->log(modX::LOG_LEVEL_INFO, "[Updater] Successfully cleared updater cache after package change.");
        }

        break;

    default:
        break;
}
return;