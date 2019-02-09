<?php


/**
 * German Language file for Updater
 *
 * @package updater
 * @subpackage lexicon
 */

$_lang['setting_updater.debug'] = "Debug-Modus";
$_lang['setting_updater.debug_desc'] = "Schaltet den Debug-Modus an. Achtung: diese Einstellung sorgt für sehr viele Logmeldungen von Updater. Aktivieren Sie das Debugging nur, wenn Sie Probleme mit Updater haben und genauere Daten zur Fehlerkorrektur erhalten wollen. Vergessen Sie nicht, den Modus wieder zu deaktivieren, wenn die Fehlersuche abgeschlossen ist, oder Ihr Logfile wird sehr schnell anwachsen.";

/* Area widget */
$_lang['updater.widget'] = 'Update Status';
$_lang['updater.widget.desc'] = '<strong>Versionsanzeige im Dashboard</strong> Zeigt Ihnen verfügbare Updates für Ihr MODX-System und verfügbare Updates für installierte Extras an.';


/* Area Broadcast */
$_lang['setting_updater.show_broadcast_messages'] = "Zeigt Nachrichten über Updates im Manager an";
$_lang['setting_updater.show_broadcast_messages_desc'] = "Aktivieren Sie diese Option, wenn Sie auf <em>jeder</em> Manager-Seite über verfügbare Updates informiert werden wollen. Achtung: in der aktuellen Version ist das dauerhafte Deaktivieren einer solchen Nachricht noch nicht möglich!";


/* Area cache */
$_lang['setting_updater.cache_expires_core'] = "Cache-Ablaufzeit für Core Updates";
$_lang['setting_updater.cache_expires_core_desc'] = "Die Cache-Ablaufzeit in Sekunden. Standardmäßig sucht Updater nur einmal am Tag nach neuen Core-Updates. Bitte beachten: Werte kleiner als 86400 werden nicht aktzeptiert und durch den Default-Wert ersetzt, um die Abfragefrequenz auf Github zu schonen.<br/>Das Leeren des Caches reicht zum Zurücksetzen nicht aus, da Updater eine eigene Cache-Partition benutzt. Zum Zurücksetzen muss der Cache-Folder der Partition gelöscht werden.";

$_lang['setting_updater.github_timeout'] = "Github Netzwerk-Timout";
$_lang['setting_updater.github_timeout_desc'] = "Ein Timeoutwert für die Github-Abfragen in Millisekunden. Passen Sie diesen Wert ggf. an Ihre Netzwerkanbindung an.";

$_lang['setting_updater.modxcom_timeout'] = "MODX.com Netzwerk-Timeout";
$_lang['setting_updater.modxcom_timeout_desc'] = "Ein Timeoutwert für Anfragen bei MODX.com für die Suche nach ZIP-Paketen neuer Versionen. <em>Wird in dieser Version nicht genutzt.</em>";

$_lang['setting_updater.last_version_crosschecked'] = "Letzte getestete Systemversion";
$_lang['setting_updater.last_version_crosschecked_desc'] = "Dieser Wert hilft beim entdecken eines kürzlich erfolgten Updates. Wenn er sich von der aktuellen System-Version unterscheidet, dann leert Updater seinen Cache, um seine Benachrichtigungen aktualisieren zu können. <strong>Diesen Wert nicht manuell ändern!</strong>";


/* Area Core Notifications */
$_lang['setting_updater.core_notifications_mail'] = "SysAdmin E-Mail Adresse für Core-Nachrichten";
$_lang['setting_updater.core_notifications_mail_desc'] = "Geben Sie hier SysAdmin E-Mail-Adresse ein, an die Benachrichtigungen über Core-Updates geschickt werden sollen.";

$_lang['setting_updater.send_core_notifications'] = "Nachrichten über Core-Updates per E-Mail versenden?";
$_lang['setting_updater.send_core_notifications_desc'] = "Sollen Nachrichten über Core-Updates per E-Mail versendet werden?";

$_lang['setting_updater.send_core_notifications_user'] = "Nachrichten über Core-Updates an berechtigte Nutzer senden?";
$_lang['setting_updater.send_core_notifications_user_desc'] = "Geben Sie hier an, ob Nachrichten über Core-Updates auch an Nutzer mit der Berechtigung<em>receive_core_notifications</em> versendet werden sollen.";


/* Area Package Notifications */
$_lang['setting_updater.package_notifications_mail'] = "PackageAdmin E-Mail-Adresse für Package-Nachrichten";
$_lang['setting_updater.package_notifications_mail_desc'] = "Geben Sie hier die PackageAdmin E-Mail-Adresse an, an die Benachrichtigungen über Package-Updates geschickt werden sollen.";

$_lang['setting_updater.send_package_notifications'] = "Nachrichten über Package-Updates per E-Mail versenden?";
$_lang['setting_updater.send_package_notifications_desc'] = "Sollen Nachrichten über Package-Updates per E-Mail versendet werden?";

$_lang['setting_updater.send_package_notifications_user'] = "Nachrichten über Package-Updates an berechtigte Nutzer senden?";
$_lang['setting_updater.send_package_notifications_user_desc'] = "Geben Sie hier an, ob Nachrichten über Package-Updates auch an Nutzer mit der Berechtigung <em>receive_package_notifications</em> versendet werden sollen.";


/* Area Digest Notifications */
$_lang['setting_updater.send_version_digest_user'] = "Nachrichten mit Versionszusammenfassung per E-Mail versenden?";
$_lang['setting_updater.send_version_digest_user_desc'] = "Geben Sie hier an, ob Nachrichten mit den aktuellen Versionsständen an Nutzer mit der Berechtigung <em>receive_digest</em> gesendet werden sollen.";

$_lang['setting_updater.send_version_digest_hours'] = "Zeitspanne zwischen Versionszusammenfassungen";
$_lang['setting_updater.send_version_digest_hours_desc'] = "Die Mindestanzahl an Stunden, die zwischen zwei Versionszusammenfassungen liegen soll. Default ist 720 (entspricht 1 Monat).";


/* Area General Notifications */
$_lang['setting_updater.mail_format_html'] = "Nutze HTML als E-Mail-Format";
$_lang['setting_updater.mail_format_html_desc'] = "Ob die E-Mails im HTML-Format verschickt werden sollen. Standard ist <em>Nein</em> (text/plain).
<strong>Achtung: </strong>wenn Sie HTML Format wählen, dann stellen Sie sicher, dass die E-Mails nicht in Ihrem Spam-Filter landen. Die verwendete MODX Mailfunktion erlaubt leider keine multipart Nachrichten, so dass reine HTML-E-Mails von Spamfiltern wie spamassassin kritisch bewertet werden.";

$_lang['setting_updater.send_notification_hours'] = "Minimale Stundenzahl zwischen Update-Benachrichtigungen";
$_lang['setting_updater.send_notification_hours_desc'] = "Die minimale Stundenzahl zwischen zwei Benachrichtigungen desselben Typs. Hinweis: Typ heißt hier entweder <em>core</em> oder <em>package</em>.";


/* Area Persistance */
$_lang['setting_updater.last_send_core_notification'] = "Zeitpunkt letzte Core-Nachricht";
$_lang['setting_updater.last_send_core_notification_desc'] = "<strong>NICHT ÄNDERN!</strong> Einstellung wird automatisch vom System verwaltet.";

$_lang['setting_updater.last_send_package_notification'] = "Zeitpunkt letzte Package-Nachricht";
$_lang['setting_updater.last_send_package_notification_desc'] = "<strong>NICHT ÄNDERN!</strong> Einstellung wird automatisch vom System verwaltet.";

$_lang['setting_updater.last_send_version_digest'] = "Zeitpunkt letzte Zusammenfassung";
$_lang['setting_updater.last_send_version_digest_desc'] = "<strong>NICHT ÄNDERN!</strong> Einstellung wird automatisch vom System verwaltet.";

$_lang['setting_updater.last_send_core'] = "Zuletzt gesendete Core-Daten";
$_lang['setting_updater.last_send_core_desc'] = "<strong>NICHT ÄNDERN!</strong> Einstellung wird automatisch vom System verwaltet.";

$_lang['setting_updater.last_send_packages'] = "Zuletzt gesendete Package-Daten";
$_lang['setting_updater.last_send_packages_desc'] = "<strong>NICHT ÄNDERN!</strong> Einstellung wird automatisch vom System verwaltet.";


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

$_lang['setting_updater.check_core_release_level'] = "Release level für Core-Prüfung";
$_lang['setting_updater.check_core_release_level_desc'] = "<p>Der Release-Level, der angezeigt werden soll. Beeinflusst sowohl das Widget als auch die Benachrichtigungen.
Die folgenden Einstellungen sind möglich::</p>
     <ul>
        <li>0 - alle Release Levels, inkl. Dev/Git- und Alpha-Versionenincluding (empfohlen für Git-Umgebungen)</li>
        <li>1 - nur Beta-Versionen oder besser</li>
        <li>2 - nur Release Candidates (RC) oder besser (keine Alpha/Beta-Versionen)</li>
        <li>3 - nur stabilde Versionen (production level, PL)</li>
     </ul>
    <p>Standard ist <strong>3</strong>, wodurch nur stabile Versionen angezeigt werden. Dies ist empfohlen für Produktivsysteme.
    Setzen Sie die Einstellung auf einen kleineren Wert, wenn Sie auch nicht-stabile Versionen oder frühe Veröffentlichungen mit möglichen Fehlern angezeigt bekommen wollen. Installieren Sie diese Versionen nur wenn Sie wissen was Sie tun!
    </p>";

$_lang['setting_updater.check_core_version_level'] = "Versions-Level für Core-Prüfung";
$_lang['setting_updater.check_core_version_level_desc'] = "<p>Das anzuzeigende Versions-Level. Beeinflusst sowohl die Widget-Darstellung als auch Benachrichtigungen. Sie haben folgende Möglichkeiten:
</p>
    <ul>
        <li>0 - zeige alle Versionslevel (inkl. Hauptversionen)</li>
        <li>1 - zeige Nebenversionen und kleiner (keine neuen Hauptversionen, nur kompatible)</li>
        <li>2 - zeige nur Revisionsversionen (keine Neben- und keine Hauptversionen, nur Fehlerbehebung/Sicherheitsupdates)</li>
    </ul>
    <p>Standard ist <strong>1</strong>, d.h. es werden alle Versionen angezeigt, die Fehler beheben und neue Funktionalitäten hinzufügen, aber
     keine neuen Hauptversionen, die evtl. inkompatibel zu Ihrer Installation sind. Nebenversionen können normalerweise
     ohne größere Probleme als Update installiert werden. Neu hinzukommende Funktionen können jedoch auch neue Fehler mit sich bringen.
    <br/>
    <em>Achtung: die Entwicklung neuer Revisionsversionen kann stillschweigend eingestellt werden, wenn z.B. eine neue Nebenversion
    existiert, die fortan weiterentwickelt wird. Wenn Sie den Wert auf 2 setzen, kann es passieren, dass Sie durch Updater
     nie darüber informiert werden, dass es im nächsthöheren Nebenversionslevel neue Versionen gibt, die evtl. auch
     Fehler in Ihrem aktuellen System beheben. Stellen Sie dann sicher, dass Sie durch andere Kanäle wie slack (modxcommunity.slack.com), das MODX-Forum oder RSS-Feeds
     über neue Versionen informiert werden!</em></p>";




/*
$_lang['setting_updater.'] = "";
$_lang['setting_updater._desc'] = "";
*/
