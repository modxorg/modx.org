<?php

/**
 * Updater
 *
 * Copyright 2017 SEDA.digital <modx.updater@seda.digital>
 * Author: Jens Külzer
 *
 * Updater is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Updater is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Updater; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 */

/**
 * Widget Language file for Updater
 *
 * @package updater
 * @subpackage lexicon
 */

$ns = 'updater.';

/* ************ Common section ****************/
$_lang[$ns.'release_notes']                         = 'Release Notes';
$_lang[$ns.'changelog']     = 'Changelog';
$_lang[$ns.'changelog_text']     = 'Lesen Sie das';

$_lang[$ns.'widget_button_installer']               = 'Installer';  // The german "Package Verwaltung" is a bad word and too long
$_lang[$ns.'package_tooltip_button_installer']      = 'Installieren oder aktualisieren Sie Ihre Extras mit dem Paket-Manager.';

$_lang[$ns.'widget_button_refresh']                 = 'Aktualisieren';
$_lang[$ns.'widget_tooltip_button_refresh']         = 'Klicken Sie hier um die Update-Daten zu erneuern.';

$_lang[$ns.'widget_button_download']                = 'Download';
$_lang[$ns.'widget_button_setup']                   = 'Setup';

$_lang[$ns.'widget_button_retry']                   = 'Retry';
$_lang[$ns.'widget_tooltip_button_retry']           = 'Klicken Sie hier, um einen erneuten Aktualisierungsversuch zu starten.';

/* ************* Packages section *************/
$_lang[$ns.'package_area']                          = 'Extras';

$_lang[$ns.'package_msg_update_default']            = '[[+count]] Extras können aktualisiert werden.';

$_lang[$ns.'package_title_install']                 = 'Extras zum Installieren';
$_lang[$ns.'package_tooltip_install']               = 'Sie haben Extras im System, die heruntergeladen\naber noch nicht installiert wurden.';
$_lang[$ns.'package_msg_install.single']            = 'Extra zum Installieren:';
$_lang[$ns.'package_msg_install.multi']             = '[[+count]] Extras zum Installieren:';

$_lang[$ns.'package_title_update_and_install']      = 'Aktualisierungen verfügbar!';
$_lang[$ns.'package_title_update_and_noinstall']    = 'Aktualisierungen verfügbar!';
$_lang[$ns.'package_title_noupdate_and_noinstall']  = 'Alle [[+count]] installierten Extras sind aktuell.';
$_lang[$ns.'package_title_noupdate_and_install']    = 'Extras bereit zum installieren';
$_lang[$ns.'package_tooltip_update']                = 'Extras sind bereit zum installieren/erneuern.';

$_lang[$ns.'package_title_uptodate']                = 'Extras';
$_lang[$ns.'package_msg_uptodate.single']           = 'Sie haben <strong>[[+count]]</strong> Extra installiert.<br/>Dieses ist aktuell.';
$_lang[$ns.'package_msg_uptodate.multi']            = 'Sie haben <strong>[[+count]]</strong> Extras installiert.<br/>Alle sind aktuell.';
$_lang[$ns.'package_tooltip_uptodate']              = 'Alles bestens. Extras sind alle aktuell.';

$_lang[$ns.'package_stale_title']                   = "Update information veraltet";
$_lang[$ns.'package_stale_msg']                     = "Der Update-Status ist veraltet und muss aktualisiert werden.";

$_lang[$ns.'package_dev_message'] = 'Es sind keine Pakete/Extras installiert.';

/* *********** Core section ***************/
$_lang[$ns.'core_area']             = 'Core';

$_lang[$ns.'core_update_title']     = 'System-Update[[+multiple]] verfügbar!';
$_lang[$ns.'core_update_tooltip']   = 'Aktualisieren Sie Ihr System jetzt! Hinweise und Hilfe finden Sie auf modx.com.';

$_lang[$ns.'core_update_title_security'] = 'Sicherheitsupdate verfügbar!';
$_lang[$ns.'core_update_notes_security'] = 'Ihrem System fehlen kritische Sicherheitsupdates! <i class="icon icon-info-circle" title="Managed Update Information (MUI): [[+updater.tooltip]]"></i><br/> Lesen Sie das <a href="[[+updater.changelog]]">Changelog</a> und führen Sie so schnell wie möglich ein Update durch!';
$_lang[$ns.'core_update_tooltip_security'] = '[[+comments]] ([[+cves]])';
$_lang[$ns.'core_update_latest_secure'] = 'Sichere Version:';
$_lang[$ns.'core_update_latest_secure_available'] = 'Sichere und neueste Version:';
$_lang[$ns.'core_update_latest_available'] = 'Neueste Version:';
$_lang[$ns.'core_update_notes_fixes'] = 'Zusätzlich wurden, verglichen mit Ihrer Version [[+updater.current]], in der neuesten Version [[+updater.security.issues]] Fehler von der MODX-Community behoben.';

$_lang[$ns.'core_uptodate_title']   = 'System';
$_lang[$ns.'core_uptodate_msg']     = 'Installation ist aktuell ([[+version]]).';

$_lang[$ns.'core_error_title']      = "Probleme beim Prüfen der Updates";
$_lang[$ns.'core_error_msg']        = "Die Versionen konnten nicht auf GitHub ermittelt werden.<br/>Ihre aktuelle Version ist [[+version]].";

$_lang[$ns.'core_dev_title']        = "Entwicklungsumgebung";
$_lang[$ns.'core_dev_msg']          = "Es läuft ein Dev-System ([[+version]]).<br/>Bitte über git aktualisieren!";

$_lang[$ns.'core_stale_title']      = "Update information veraltet";
$_lang[$ns.'core_stale_msg']        = "Der Update-Status ist veraltet und muss aktualisiert werden.<br/>Diese Version ist: <strong>[[+version]]</strong>.";

/* ************* error and network ***********/
$_lang[$ns.'github_error_tooltip'] = "Github antwortet nicht. Passen Sie ggf. die Timeout-Einstellungen bei den Systemeinstellungen an Ihre Verbindung an.";