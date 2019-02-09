/**
 * Created by jens on 02.09.15.
 */

/* set custom namespace to avoid conflicts with other libraries (e.g. jquery 1.6) */
var $ju = jQuery.noConflict();

var UPDATER_REFRESH_CORE_URL = MODx.config.connectors_url + 'updater/updater.refresh.php';
//var UPDATER_REFRESH_EXTRAS_URL = MODx.config.connectors_url + 'updater/updater.refresh.php';

var button_refresh_core,
    button_refresh_extras,
    core_container,
    package_container,
    core_blind, package_blind;

$ju(document).ready(function () {

    function bindEvents() {

        core_container = $ju('#core_container');
        package_container = $ju('#package_container');

        core_blind = $ju('#core_container .text');
        package_blind = $ju('#package_container .text');

        button_refresh_core = document.getElementById('updater-button-refresh_core');
        if (button_refresh_core) {
            button_refresh_core.addEventListener('click', function () {
                $ju(document).trigger('updater.refreshCoreEvent');
            });
        }

        button_refresh_extras = document.getElementById('updater-button-refresh_packages');
        if (button_refresh_extras) {
            button_refresh_extras.addEventListener('click', function () {
                $ju(document).trigger('updater.refreshExtrasEvent');
            });
        }
    }

    window.onload = function (e) {
        bindEvents();

        $ju(document).on('updater.refreshExtrasEvent', function () {
            var symbol = $ju('#updater-package-symbol');
            symbol.addClass('faa-passing animated faa-slow');
            package_blind.css({
                opacity: 0.3
            });
            $ju.get(UPDATER_REFRESH_CORE_URL, {
                    'refresh': ['packages'],
                    'return': 'widget_packages'
                }
            ).done(function (response) {
                if (response.html) {
                    html = response.html;
                    dom = $ju(html).find('#package_container');
                    $ju('#package_container').replaceWith(dom);
                    bindEvents();
                } else {
                    package_container.find('.message').replaceWith("<div class='error'>There was an error during refresh.<br/>Please try again later..</div>");
                }
            }).fail(function () {
                console.log("[Updater] There was an error refreshing the package data.");
            }).always(function () {
                package_container.css({
                    opacity: 1
                });
//                spin.stop();
                symbol.removeClass('animated');
            });
        });

        $ju(document).on('updater.refreshCoreEvent', function () {
            var symbol = $ju('#updater-core-symbol');
            symbol.addClass('faa-passing animated faa-slow');
            core_blind.css({
                opacity: 0.3
            });

            $ju.get(UPDATER_REFRESH_CORE_URL, {
                'return': 'widget_core'
            }).done(function (response) {
                var html = response.html;
                var dom = $ju(html).find('#core_container');
                $ju('#core_container').replaceWith(dom);
                bindEvents();
                //     console.log("[Updater] Core version lookup time on github: " + core_container.data('lookuptime'));
            }).fail(function () {
                console.log("[Updater] There was an error refreshing the core update data.");
            }).always(function () {
                core_container.css({
                    opacity: 1,
                });
                //                spin.stop();
                symbol.removeClass('animated');
            });
        });


        /* only add automatic refresh via timeout if the data is stale */
        /* if an error occured during last refresh, do not automatically refresh! */
        if (core_container.data('errno') === -1) {
            window.setTimeout(function () {
                $ju(document).trigger('updater.refreshCoreEvent');
            }, 1500);
        }

        //if (package_container.data('errno') === -1) {
        /*
         always do a refresh here because otherwise we cannot detect if a package has been
         down- or uploaded recently (there is no event for that!)
         */
        window.setTimeout(function () {
            $ju(document).trigger('updater.refreshExtrasEvent');
        }, 1000);
        //}
    };

});