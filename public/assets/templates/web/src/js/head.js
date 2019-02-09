/**
 * head.js
 *
 * @version 1.0.0
 * @copyright 2018 SEDA.digital GmbH & Co. KG
 */

/*
 * Please note that jQuery/$ is not available in head.js!
 */

import lazySizes from 'lazysizes';
lazySizes.cfg.addClasses = true;
lazySizes.cfg.preloadAfterLoad = true;
lazySizes.cfg.lazyClass = 'u-lazyload';
lazySizes.cfg.preloadClass = 'u-lazypreload';
lazySizes.cfg.loadingClass = 'is-lazyloading';
lazySizes.cfg.loadedClass = 'is-lazyloaded';

//import fontloader from '../../vendor/fontloader/fontloader.js';
//fontloader('webfonts_hierbleiben_v2', '/assets/templates/web/dist/fonts-woff.css', '/assets/templates/web/dist/fonts-woff2.css');
