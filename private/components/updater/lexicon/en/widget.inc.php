<?php


/**
 * Widget Language file for Updater
 *
 * @package updater
 * @subpackage lexicon
 */

$ns = 'updater.';

/* ************ Common section ****************/
$_lang[$ns.'release_notes'] = 'Release Notes';
$_lang[$ns.'changelog']     = 'changelog';
$_lang[$ns.'changelog_text']     = 'Read the';

$_lang[$ns.'widget_button_installer']               = 'Installer';
$_lang[$ns.'package_tooltip_button_installer']      = 'You can update or install your packages with the installer.';

$_lang[$ns.'widget_button_refresh']                 = 'Refresh';
$_lang[$ns.'widget_tooltip_button_refresh']         = 'Click here to refresh the data';

$_lang[$ns.'widget_button_download']                = 'Download';
$_lang[$ns.'widget_button_setup']                   = 'Setup';

$_lang[$ns.'widget_button_retry']                   = 'Retry';
$_lang[$ns.'widget_tooltip_button_retry']           = 'Click here to retry refreshing the data';

/* ************* Packages section *************/
$_lang[$ns.'package_area']                          = 'Extras';

$_lang[$ns.'package_msg_update_default']            = '[[+count]] packages can be updated.';

$_lang[$ns.'package_title_install']                 = 'Extras awaiting installation';
$_lang[$ns.'package_tooltip_install']               = 'You have packages that are downloaded but not installed.';
$_lang[$ns.'package_msg_install.single']            = 'Package to install:';
$_lang[$ns.'package_msg_install.multi']             = '[[+count]] packages to install:';

$_lang[$ns.'package_title_update_and_install']      = 'Updates available';
$_lang[$ns.'package_title_update_and_noinstall']    = 'Updates available';
$_lang[$ns.'package_title_noupdate_and_noinstall']  = 'All <strong>[[+count]]</strong> installed extra packages are up to date.';
$_lang[$ns.'package_title_noupdate_and_install']    = 'Extras ready to install';
$_lang[$ns.'package_tooltip_update']                = 'Updates available';

$_lang[$ns.'package_title_uptodate']                = 'Extras';
$_lang[$ns.'package_msg_uptodate.single']           = 'You have <strong>1</strong> package installed.<br/>This package is up to date.';
$_lang[$ns.'package_msg_uptodate.multi']            = 'You have <strong>[[+count]]</strong> packages installed.<br/>All of them are up to date.';
$_lang[$ns.'package_tooltip_uptodate']              = 'You are fine. Everything is up to date here.';

$_lang[$ns.'package_stale_title']                   = "Update information outdated";
$_lang[$ns.'package_stale_msg']                     = "Update state is outdated and needs a refresh.";

$_lang[$ns.'package_dev_message'] = 'No packages are installed.';

/* *********** Core section ***************/
$_lang[$ns.'core_area'] = 'Core';

$_lang[$ns.'core_update_title'] = 'System update[[+multiple]] available!';
$_lang[$ns.'core_update_tooltip'] = 'You should update your system immediately. Instructions can be found on modx.com.';

$_lang[$ns.'core_update_title_security'] = 'Security update available!';
$_lang[$ns.'core_update_notes_security'] = 'Your system misses critical security fixes! <i class="icon icon-info-circle" title="Managed Update Information (MUI): [[+updater.tooltip]]"></i><br/> Read the <a href="[[+updater.changelog]]">changelog</a> and update as soon as possible!';
$_lang[$ns.'core_update_tooltip_security'] = '[[+comments]] ([[+cves]])';
$_lang[$ns.'core_update_latest_secure'] = 'Secure version:';
$_lang[$ns.'core_update_latest_secure_available'] = 'Secure and newest version:';
$_lang[$ns.'core_update_latest_available'] = 'Newest version:';
$_lang[$ns.'core_update_notes_fixes'] = 'Also, [[+updater.security.issues]] issues have been fixed by the MODX community in the newest version compared to your version [[+updater.current]].';

$_lang[$ns.'core_uptodate_title'] = 'System';
$_lang[$ns.'core_uptodate_msg'] = 'Your system is up to date ([[+version]]).';

$_lang[$ns.'core_dev_title'] = 'Development build';
$_lang[$ns.'core_dev_msg'] = 'You are running a dev build ([[+version]]). Please update via git.';

$_lang[$ns.'core_error_title'] = "Problems with update check";
$_lang[$ns.'core_error_msg'] = "Can not determine latest version on github.<br/>Nevertheless, your current version is <strong>[[+version]]</strong>";

$_lang[$ns.'core_stale_title'] = "Update information outdated";
$_lang[$ns.'core_stale_msg'] = "Update state is outdated and needs a refresh.<br/>This version is: <strong>[[+version]]</strong>.";

/* ************* error and network ***********/
$_lang[$ns.'github_error_tooltip'] = "Github did not respond in time. Adjust the timeout system settings according to your connection.";
