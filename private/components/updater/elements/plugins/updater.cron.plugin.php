<?php
/*
    This plugin implements a simple but effective cron mechanism to refresh updaters data.

    How does it work?
        - cronlike schedule is triggered by a web page request
        - on the init of the request the plugin is triggered
        - the file modification time of an (empty) file is checked
            (this is done way faster than to check a modx option object, which is generally not intended to change frequently,
             measurement on the same machine: get system setting ~0.01s, filemtime ~0.0005s !!!)
        - if the last saved time compared to the current time is greater than a preset interval,
            the plugin injects a tiny javascript to the webpage
        - the javascript is called async and finally triggers the refresh of the (sometimes time-consuming) updater refresh

    Benefits:
        This way there is no measureable time gap for your webpage to be delivered (instead of directly refreshing the
        updater data), so visitors and your websites performance will not be affected, even if the updater task runs a long time
        or runs into a timeout.
        There is no need to setup a cronjob for this (which may not be possible due to the environment or the client using updater).

    Drawbacks:
        This only works if enough visitors with js enabled browser frequently visit your webpage. If you only have 1 hit per month,
        the updaters cache will be refreshed once per month as well, regardless of the interval. In this case
        it is a better idea to call the script /connectors/updater.cron.php with a cronjob instead.
*/

$eventName = $modx->event->name;
switch($eventName) {
    case "OnManagerPageInit":
    case "OnWebPageInit":
        $key = 'updater.lastcroninject';

        //$t = microtime(true);
        $lastInjectTime = "";
        if (file_exists(MODX_CORE_PATH.'cache/UPDATER_CRON')) {
            $lastInjectTime = filemtime(MODX_CORE_PATH.'cache/UPDATER_CRON');
        }

        $currentTime = time();
        if (is_null($lastInjectTime) || $lastInjectTime == '') {
            $lastInjectTime = 0;
        }

        /*
         * Check if time interval is reached. The interval is hardcoded to prevent unneccessary option lookups again.
         * Current Interval: 3600 = 1 hour
         *
         * That does not necessarily mean, that every interval an update lookup is done. This only triggers
         * following up events, the event handlers themselves have cache times to stick to.
         * This interval only ensures, that at least every hour the followups are checked.
         */

        if (($currentTime - $lastInjectTime) >= 3600) {
            //$modx->log(modX::LOG_LEVEL_DEBUG, "[updater cron-plugin] elapsed seconds since last core refresh: " . ($currentTime - $lastInjectTime) ." - we need to refresh!");

            /* adjust the last saved time stamp */
            touch(MODX_CORE_PATH.'cache/UPDATER_CRON');

            /* inject javascript into web page */
            //$modx->log(4, "[updater cron-plugin] injecting cron script at time ".$currentTime);
            //$modx->regClientScript(MODX_ASSETS_URL . 'components/updater/js/updater.croninject.js');

            /*
                using regClientScript is not the favoured way here: it adds a roundtrip and does not give the
                chance to call the script async!
                Instead we will inject our tiny script code here direcly!
                    - the code could be inlined here, but is not for future development
            */
            $script  = "<script type='text/javascript'>";
            $script .= "var U='".MODX_CONNECTORS_URL."updater/updater.cron.php';\n";
            $script .= file_get_contents( MODX_ASSETS_PATH . 'components/updater/js/updater.croninject.js');
            $script .= "</script>";

            $modx->regClientHTMLBlock($script);
        }
}
return;