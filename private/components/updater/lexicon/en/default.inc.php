<?php

/**
 * Default Language file for Updater
 *
 * @package updater
 * @subpackage lexicon
 */

/* ********************* */
/*          MUI          */
/* ********************* */
$_lang['setting_updater.mui_enable'] = "Download Managed Update Information";
$_lang['setting_updater.mui_enable_desc'] = "If set to yes/true, Updater will try to download newest MUI-data (Managed Update Information) from the given URL. <br/><em>NOTE: the mui feature itself cannot be deactivated, as the Updater packages ships with a default MUI-datafile. Only the download of a new version can be disabled here if you don't want your system to contact the given URL.</em>";

$_lang['setting_updater.mui_url'] = "Managed Update Information URL";
$_lang['setting_updater.mui_url_desc'] = "The URL to the newest MUI-datafile. Leave that unchanged to get the latest update data from SEDA.digital.";


/* ********************* */
/*         Debug         */
/* ********************* */

$_lang['setting_updater.debug'] = "Debug mode";
$_lang['setting_updater.debug_desc'] = "Turns on debug mode. Caution: this setting makes updater very verbose in the logs. You should only set this setting if you experience problems with Updater to provide enough information for bugfix. Don't forget to disable the setting when you have finished debugging, or your logfile will grow large.";

/* Area widget */
$_lang['updater.widget'] = 'Update status';
$_lang['updater.widget.desc'] = '<strong>Versions information widget for your dashboard!</strong> This widget shows you if there is an update for the MODX core available <em>and</em> if there are package updates available for download or install.';


/* Area Broadcast */
$_lang['setting_updater.show_broadcast_messages'] = "Show the updater broadcast messages";
$_lang['setting_updater.show_broadcast_messages_desc'] = "Enable if you want to be warned on every manager page and not only by the dashboard. Warning: Deletion of the message bar does not work persistently at the moment.";


/* Area cache */
$_lang['setting_updater.cache_expires_core'] = "Core update cache expiration time";
$_lang['setting_updater.cache_expires_core_desc'] = "Cache expiration time in seconds. Per default only search once a day for new core updates. Updater uses its own cache partition, clearing the cache in the manager has no effect. Please be aware that values less than one day aka 86400 seconds will not be accepted to safe github from massive api calls.";

$_lang['setting_updater.github_timeout'] = "Github tag lookup timeout";
$_lang['setting_updater.github_timeout_desc'] = "A timeout for looking up new version tags at github. You can adjust this according to your servers connection - keep as low as possible.";

$_lang['setting_updater.modxcom_timeout'] = "MODX.com lookup timeout";
$_lang['setting_updater.modxcom_timeout_desc'] = "Timeout in seconds for the lookup of the zipball of a new version at MODX.com. <em> Currently not used. This will enable automatic download to the server later.</em>";

$_lang['setting_updater.last_version_crosschecked'] = "Last crosschecked version";
$_lang['setting_updater.last_version_crosschecked_desc'] = "This value helps to detect that your system has been updated recently. If it differs from the system version setting, the updater will refresh its own cache partition. <strong>Do not change this value manually!</strong>";


/* Area Core Notifications */
$_lang['setting_updater.core_notifications_mail'] = "SysAdmin e-mail address for core notifications";
$_lang['setting_updater.core_notifications_mail_desc'] = "E-mail address to send notifications of core updates to.";

$_lang['setting_updater.send_core_notifications'] = "Send core notifications to SysAdmin";
$_lang['setting_updater.send_core_notifications_desc'] = "Should notification emails be send to the given email address?";

$_lang['setting_updater.send_core_notifications_user'] = "Send core notifications to users?";
$_lang['setting_updater.send_core_notifications_user_desc'] = "<strong>NOT IMPLEMENTED YET!</strong> Whether to send users with the permission <em>'receive_core_notifications'</em>, the core update mails.";


/* Area Package Notifications */
$_lang['setting_updater.package_notifications_mail'] = "PackageAdmin e-mail address for package notifications";
$_lang['setting_updater.package_notifications_mail_desc'] = "E-mail address to send notifications of package updates to.";

$_lang['setting_updater.send_package_notifications'] = "Send package notifications to PackageAdmin";
$_lang['setting_updater.send_package_notifications_desc'] = "Should notification emails be send to the given email address?";

$_lang['setting_updater.send_package_notifications_user'] = "Send package notifications to users?";
$_lang['setting_updater.send_package_notifications_user_desc'] = "<strong>NOT IMPLEMENTED YET!</strong> Whether to send users with the permission <em>'receive_package_notifications'</em> the package update mails.";


/* Area Digest Notifications */
$_lang['setting_updater.send_version_digest_user'] = "Send a version digest notification";
$_lang['setting_updater.send_version_digest_user_desc'] = "<strong>PARTIALLY IMPLEMENTED!</strong> Whether to send users with the permission <em>'receive_digests'</em> a version details email.";

$_lang['setting_updater.send_version_digest_hours'] = "Version digest notification time span";
$_lang['setting_updater.send_version_digest_hours_desc'] = "Minimum number of hours between version digest notifications. Default is 720 (one month).";


/* Area General Notifications */
$_lang['setting_updater.mail_format_html'] = "Use HTML as mail format";
$_lang['setting_updater.mail_format_html_desc'] = "Whether to use HTML in notifications. Default is No (text/plain). Attention: if you choose HTML you have a good chance that notifications are filtered out by spam filters like SpamAssasin (modx does not provide core mail functions to send a multipart message).";

$_lang['setting_updater.send_notification_hours'] = "Minimum hours between update notifications";
$_lang['setting_updater.send_notification_hours_desc'] = "The minimum hours between two notifications of the same type. <em>Note: type means (core||package) here.</em>.";

/* not implemented yet */
//$_lang['setting_updater.repeat_notifications_hours'] = "Repeat notification time";
//$_lang['setting_updater.repeat_notifications_hours_desc'] = "Time in hours until a notification will be resend. Use this e.g. to get constantly remindend of pending updates.";

/* Area Persistance */
$_lang['setting_updater.last_send_core_notification'] = "Time of last send core notification";
$_lang['setting_updater.last_send_core_notification_desc'] = "<strong>DO NOT CHANGE!</strong> Settings is used automatically.";

$_lang['setting_updater.last_send_package_notification'] = "Time of last send package notification";
$_lang['setting_updater.last_send_package_notification_desc'] = "<strong>DO NOT CHANGE!</strong> Settings is used automatically.";

$_lang['setting_updater.last_send_version_digest'] = "Time of last send version digest";
$_lang['setting_updater.last_send_version_digest_desc'] = "<strong>DO NOT CHANGE!</strong> Settings is used automatically.";

$_lang['setting_updater.last_send_core'] = "Last send core data";
$_lang['setting_updater.last_send_core_desc'] = "<strong>DO NOT CHANGE!</strong> Settings is used automatically.";

$_lang['setting_updater.last_send_packages'] = "Last send packages data";
$_lang['setting_updater.last_send_packages_desc'] = "<strong>DO NOT CHANGE!</strong> Settings is used automatically.";

/*
 * don't check for:
 *  0 no restriction (default)
 *  1 patch release candidates or pre-releases, _._.x-rcN
 *  2 patch releases at all
 *  3 minor version release candidates
 *  4 minor versions at all
 *
 * The higher the value, the less notifications you get.
 */

$_lang['setting_updater.check_core_release_level'] = "Release level for core check";
$_lang['setting_updater.check_core_release_level_desc'] = "<p>The release level to check for. Affects both widget and notifications. You have
    the following options:</p>
     <ul>
        <li>0 - all release levels, including dev-versions and alpha-versions (recommended in dev/git)</li>
        <li>1 - only beta versions or better</li>
        <li>2 - only release candidates or better (no alpha, no beta)</li>
        <li>3 - only stable versions</li>
     </ul>
    <p>The default is <strong>3</strong>, which will only show stable versions. This is recommended for production environments.
    If you don't care, you can set it to a lower level which will show you unstable and early releases with potential bugs also.</p>";

$_lang['setting_updater.check_core_version_level'] = "Version level for core check";
$_lang['setting_updater.check_core_version_level_desc'] = "<p>The version level to check for. Affects both widget and notifications. You have
    the following options:</p>
    <ul>
        <li>0 - show all version levels (include major versions)</li>
        <li>1 - show minor versions and below (prevent major versions [BC])</li>
        <li>2 - show patch versions only (prevent minor and major versions [BC, functionality])</li>
    </ul>
    <p>The default is <strong>1</strong> here, which means showing all new version without versions breaking backwards compatibility. Normally
    these versions (minor and patches) can be updated to without problems. Be aware that minor versions include new
    functionality which may also introduce new bugs. <br/>
    <em>Attention: patch version development may be discontinued silently for your current version. If you set this value to 2, you may never
    get notifications about updates in this case! In that case, make sure that you are informed via other channels about possible
    updates like slack (modxcommunity.slack.com), the MODX forum or RSS-feeds.</em></p>";

/*
$_lang['setting_updater.'] = "";
$_lang['setting_updater._desc'] = "";
*/
