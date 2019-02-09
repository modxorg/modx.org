/**
 * main.js
 *
 * @version 1.0.0
 * @copyright 2018 SEDA.digital GmbH & Co. KG
 */

// Dispatch a global event when the main js has been loaded
// this can be used by inlined scripts to know when jQuery is available
window.dispatchEvent(new CustomEvent('jsloaded'));

/**
 * Foundation Framework JS
 *
 * when using any of these, `foundation.core` always needs to be enabled
 * and you need to initialize Foundation (see code below imports)
 */
import { Foundation } from 'foundation-sites/js/foundation.core';
//import { MediaQuery } from 'foundation-sites/js/foundation.util.mediaQuery'; Foundation.plugin(MediaQuery, 'MediaQuery');
//import { Keyboard } from 'foundation-sites/js/foundation.util.keyboard'; Foundation.plugin(Keyboard, 'Keyboard');
//import { Abide } from 'foundation-sites/js/foundation.abide'; Foundation.plugin(Abide, 'Abide');
//import { Accordion } from 'foundation-sites/js/foundation.accordion'; Foundation.plugin(Accordion, 'Accordion');
//import { AccordionMenu } from 'foundation-sites/js/foundation.accordionMenu'; Foundation.plugin(AccordionMenu, 'AccordionMenu');
//import { Drilldown } from 'foundation-sites/js/foundation.drilldown'; Foundation.plugin(Drilldown, 'Drilldown');
//import { Dropdown } from 'foundation-sites/js/foundation.dropdown'; Foundation.plugin(Dropdown, 'Dropdown');
//import { DropdownMenu } from 'foundation-sites/js/foundation.dropdownMenu'; Foundation.plugin(DropdownMenu, 'DropdownMenu');
//import { Equalizer } from 'foundation-sites/js/foundation.equalizer'; Foundation.plugin(Equalizer, 'Equalizer');
//import { Interchange } from 'foundation-sites/js/foundation.interchange'; Foundation.plugin(Interchange, 'Interchange');
//import { Magellan } from 'foundation-sites/js/foundation.magellan'; Foundation.plugin(Magellan, 'Magellan');
//import { OffCanvas } from 'foundation-sites/js/foundation.offcanvas'; Foundation.plugin(OffCanvas, 'OffCanvas');
//import { Orbit } from 'foundation-sites/js/foundation.orbit'; Foundation.plugin(Orbit, 'Orbit');
//import { ResponsiveMenu } from 'foundation-sites/js/foundation.responsiveMenu'; Foundation.plugin(ResponsiveMenu, 'ResponsiveMenu');
//import { ResponsiveToggle } from 'foundation-sites/js/foundation.responsiveToggle'; Foundation.plugin(ResponsiveToggle, 'ResponsiveToggle');
//import { Reveal } from 'foundation-sites/js/foundation.reveal'; Foundation.plugin(Reveal, 'Reveal');
//import { Slider } from 'foundation-sites/js/foundation.slider'; Foundation.plugin(Slider, 'Slider');
//import { SmoothScroll } from 'foundation-sites/js/foundation.smoothScroll'; Foundation.plugin(SmoothScroll, 'SmoothScroll');
//import { Sticky } from 'foundation-sites/js/foundation.sticky'; Foundation.plugin(Sticky, 'Sticky');
//import { Tabs } from 'foundation-sites/js/foundation.tabs'; Foundation.plugin(Tabs, 'Tabs');
//import { Toggler } from 'foundation-sites/js/foundation.toggler'; Foundation.plugin(Toggler, 'Toggler');
//import { Tooltip } from 'foundation-sites/js/foundation.tooltip'; Foundation.plugin(Tooltip, 'Tooltip');
//import { ResponsiveAccordionTabs } from 'foundation-sites/js/foundation.responsiveAccordionTabs'; Foundation.plugin(ResponsiveAccordionTabs, 'ResponsiveAccordionTabs');

// Init Foundation
Foundation.addToJquery(jQuery); // this and the next line need to be enabled when using foundation JS
$(document).foundation();

// Import Components
import Example from './components/example.js';
new Example();
