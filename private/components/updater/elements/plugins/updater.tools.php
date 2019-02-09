<?php
/**
 * Created by PhpStorm.
 * User: jens
 * Date: 26.02.15
 * Time: 16:27
 */


/* set the keyed system setting to current time */
function resetTimedSetting( $key, &$modx ) {
    $digestSetting = $modx->getObject( 'modSystemSetting', $key);
    $digestSetting->set('value', strtotime('now'));
    $digestSetting->save();
    $cacheRefreshOptions =  array( 'system_settings' => array() );
    $modx->cacheManager-> refresh($cacheRefreshOptions);
    $modx->log(modX::LOG_LEVEL_DEBUG, "[cron] set time key '".$key."': " . $modx->getOption($key, null, '???'));
    return;
}

function versionSlice($version, $part) {
    $matches = array();
    preg_match_all( '/(?<prefix>v)?(?<major>\d*)\.(?<minor>\d*)\.(?<patch>\d*)\-(?<release>[\w\d]*)/s', $version, $matches,PREG_SET_ORDER);
    $v = $matches[0];
    //$this->modx->log(modX::LOG_LEVEL_DEBUG, "[Updater] found: ".$v['major'].",".$v['minor'].",".$v['patch'].",".$v['release']);
    if ($part == "") {
        return array($v['major'],$v['minor'],$v['patch'],$v['release']);
    }
    return $v[$part];
}