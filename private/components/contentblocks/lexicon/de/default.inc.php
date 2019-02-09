<?php
$_lang['contentblocks'] = "ContentBlocks";
$_lang['contentblocks.menu'] = "ContentBlocks";
$_lang['contentblocks.menu_desc'] = "Verwalten Sie die ContentBlocks-Felder und -Layouts.";
$_lang['contentblocks.mgr.home'] = "ContentBlocks";

$_lang['contentblocks.general'] = "Allgemein";
$_lang['contentblocks.properties'] = "Eigenschaften";
$_lang['contentblocks.clear_filters'] = "Filter zurücksetzen";
$_lang['contentblocks.search'] = "Suche";

$_lang['contentblocks.link'] = "Link";
$_lang['contentblocks.link.description'] = "Ein Feld, um Links zu erstellen. Ressourcen, E-Mail-Adressen und URLs werden unterstützt.";
$_lang['contentblocks.link_template.description'] = "Ein Template für den Link. Verfügbare Platzhalter: <code>[[+link]]</code>, <code>[[+link_raw]]</code>, <code>[[+linkType]]</code>";
$_lang['contentblocks.link.resource'] = "Ressource";
$_lang['contentblocks.link.url'] = "URL";
$_lang['contentblocks.link.email'] = "E-Mail-Adresse";
$_lang['contentblocks.link.link_new_tab'] = "In neuem Tab öffnen";
$_lang['contentblocks.link.add'] = "Link hinzufügen";
$_lang['contentblocks.link.remove'] = "Link entfernen";
$_lang['contentblocks.link.placeholder'] = "Beginnen Sie, den Namen einer Ressource, eines externen Links oder einer E-Mail-Adresse einzugeben";
$_lang['contentblocks.link.link_detection_pattern_override'] = 'Abweichendes Link-Erkennungsmuster';
$_lang['contentblocks.link.link_detection_pattern_override.description'] = 'Regulärer Ausdruck, um festzustellen, ob ein Link gültig ist; falls nicht, wird http:// vorangestellt.';
$_lang['contentblocks.link.limit_to_current_context'] = 'Ressourcen-Ergebnisse auf den aktuellen Kontext limitieren';
$_lang['contentblocks.link.limit_to_current_context.description'] = 'Beschränkt die Typeahead-Ergebnisse auf Ressourcen, die sich im selben Kontext befinden';

$_lang['setting_contentblocks.link.link_detection_pattern'] = 'Link-Erkennungs-Muster';
$_lang['setting_contentblocks.link.link_detection_pattern_desc'] = 'Regulärer Ausdruck, um festzustellen, ob ein Link gültig ist; falls nicht, wird http:// vorangestellt.';

$_lang['setting_contentblocks.typeahead.include_introtext'] = 'Intro-Text in Typeahead aufnehmen';
$_lang['setting_contentblocks.typeahead.include_introtext_desc'] = 'Wenn diese Einstellung aktiviert ist, wird Typeahead den Intro-Text für jede der Ressourcen einbeziehen, um Ihnen mehr Informationen zu der Ressource bereitzustellen.';

$_lang['contentblocks.error.not_an_export'] = "Diese Datei scheint kein ContentBlocks-Export zu sein";
$_lang['contentblocks.error.importing_row'] = "Fehler beim Import der Zeile: ";
$_lang['contentblocks.error.no_valid_field'] = "Kein gültiges Feld für die Anfrage gefunden.";
$_lang['contentblocks.error.no_valid_input'] = "Keine gültige Eingabe für die Anfrage gefunden.";
$_lang['contentblocks.error.no_snippets'] = "Keine Snippets zur Verwendung verfügbar";
$_lang['contentblocks.error.missing_id'] = "ID-Eigenschaft fehlt";
$_lang['contentblocks.error.input_not_found'] = "Eingabe nicht gefunden";
$_lang['contentblocks.error.input_not_found.message'] = "Hoppla, ein Feld mit dem Eingabetyp \"[[+input]]\" wurde geladen, dieser Eingabetyp existiert jedoch nicht.";
$_lang['contentblocks.error.field_not_found'] = "Feld nicht gefunden";
$_lang['contentblocks.error.category_not_found'] = "Kategorie nicht gefunden";
$_lang['contentblocks.error.layout_not_found'] = "Layout nicht gefunden";
$_lang['contentblocks.error.error_saving_object'] = "Fehler beim Speichern des Objekts";
$_lang['contentblocks.error.xml_not_loaded'] = "Die XML-Datei konnte nicht geladen werden";
$_lang['contentblocks.error.no_icons'] = "Konnte Icon-Ordner nicht zum Lesen öffnen";
$_lang['contentblocks.error.no_json'] = "Ihr Browser unterstützt kein JSON, das für ContentBlocks erforderlich ist. Bitte aktualisieren Sie Ihren Browser.";

$_lang['contentblocks.availability'] = "Verfügbarkeit";
$_lang['contentblocks.availability.layout_description'] = "Standardmäßig sind Layouts immer verfügbar. Wenn Sie nachfolgend Bedingungen hinzufügen, wird dieses Layout nur verfügbar sein, wenn eine der Bedingungen erfüllt ist. Trennen Sie mehrere gültige Werte mit einem Komma!";
$_lang['contentblocks.availability.field_description'] = "Standardmäßig sind Felder immer verfügbar. Wenn Sie nachfolgende Bedingungen hinzufügen, wird dieses Feld nur verfügbar sein, wenn eine der Bedingungen erfüllt ist. Trennen Sie mehrere gültige Werte mit einem Komma!";
$_lang['contentblocks.availability.template_description'] = "Standardmäßig sind Templates immer verfügbar. Wenn Sie nachfolgend Bedingungen hinzufügen, wird dieses Template nur verfügbar sein, wenn eine der Bedingungen erfüllt ist. Trennen Sie mehrere gültige Werte mit einem Komma!";
$_lang['contentblocks.add_condition'] = "Bedingung hinzufügen";
$_lang['contentblocks.edit_condition'] = "Bedingung bearbeiten";
$_lang['contentblocks.delete_condition'] = "Bedingung löschen";
$_lang['contentblocks.delete_condition.confirm'] = "Sind Sie sicher, dass Sie diese Bedingung löschen möchten?";
$_lang['contentblocks.condition_field'] = "Feld";
$_lang['contentblocks.condition_field.resource'] = "Ressourcen-ID";
$_lang['contentblocks.condition_field.parent'] = "ID der Eltern-Ressource";
$_lang['contentblocks.condition_field.ultimateparent'] = "ID der obersten Eltern-Ressource";
$_lang['contentblocks.condition_field.class_key'] = "Klassen-Schlüssel";
$_lang['contentblocks.condition_field.context'] = "Kontext";
$_lang['contentblocks.condition_field.template'] = "Template (ID)";
$_lang['contentblocks.condition_field.usergroup'] = "Benutzergruppe (Name)";
$_lang['contentblocks.condition_value'] = "Wert(e)";
$_lang['contentblocks.availibility.layouts'] = "Layout(s)";
$_lang['contentblocks.availibility.layouts.description'] = "Beschränken Sie die Verwendung dieses Felds auf ein oder mehrere (kommaseparierte) Layouts. Wenn Sie diese Einstellung leer lassen, kann dieses Feld in allen Layouts verwendet werden, ansonsten nur innerhalb der von Ihnen angegebenen Layouts.";
$_lang['contentblocks.availibility.times_per_page'] = "Maximal so oft pro Seite verwenden (0 oder leer = beliebig oft)";
$_lang['contentblocks.availibility.times_per_page.description'] = "Beschränken Sie die Verwendung auf diese Anzahl pro Seite. Wird das Feld leer gelassen, gibt es keine Beschränkung.";
$_lang['contentblocks.availibility.times_per_layout'] = "Maximal so oft pro Layout verwenden (0 oder leer = beliebig oft)";
$_lang['contentblocks.availibility.times_per_layout.description'] = "Beschränken Sie die Verwendung auf diese Anzahl pro Layout. Wird das Feld leer gelassen, gibt es keine Beschränkung.";
$_lang['contentblocks.availibility.only_nested'] = "Nur als verschachteltes Layout erlauben";
$_lang['contentblocks.availibility.only_nested.description'] = "Das Layout nicht außerhalb des Layout-Feldes erlauben.";


$_lang['contentblocks.field_desc'] = "Felder sind das Grundgerüst von ContentBlocks - sie definieren exakt, wie viel <em>kreative Freiheit</em> Redakteure beim Bearbeiten von Inhalten erhalten. Jedes Feld besteht hauptsächlich aus einem Eingabetyp und einem Template, das vorgibt, wie der Inhalt im Frontend ausgegeben werden soll. Mehr Informationen, wie Sie Felder richtig einsetzen, erhalten Sie über den Hilfe-Button oben rechts.";
$_lang['contentblocks.add_field'] = "Feld hinzufügen";
$_lang['contentblocks.edit_field'] = "Feld bearbeiten";
$_lang['contentblocks.duplicate_field'] = "Feld duplizieren";
$_lang['contentblocks.delete_field'] = "Feld löschen";
$_lang['contentblocks.delete_field.confirm'] = "Sind Sie sicher, dass Sie dieses Feld löschen möchten? Dies kann fatale Folgen für Inhalte haben, die dieses Feld verwenden!";
$_lang['contentblocks.delete_field.confirm.js'] = "Sind Sie sicher, dass Sie dieses Feld löschen möchten?";
$_lang['contentblocks.delete_field.is_default'] = "Dieses Feld kann nicht entfernt werden, weil es als standardmäßig verwendetes Feld definiert wurde. Festgelegt wird dies mit der Systemeinstellung <code>contentblocks.default_field</code>. Weitere Informationen darüber, wie man Standard-Inhalte festlegt, erhalten Sie in der <a href=\"https://docs.modmore.com/en/ContentBlocks/v1.x/Default_Templates.html\" target=\"_blank\">Dokumentation zu Standard-Templates</a>.";
$_lang['contentblocks.export_field'] = "Feld exportieren";
$_lang['contentblocks.export_fields'] = "Exportieren";
$_lang['contentblocks.export_fields.confirm'] = "Wenn Sie unten auf \"Ja\" klicken, wird ein XML-Export aller Felder erzeugt. Dieser kann dazu genutzt werden, die Felder später oder in einer anderen Installation wieder zu importieren. Die XML-Generierung kann je nach Anzahl der konfigurierten Felder ein paar Sekunden in Anspruch nehmen.";
$_lang['contentblocks.import_fields'] = "Importieren";
$_lang['contentblocks.import_fields.title'] = "Felder importieren";
$_lang['contentblocks.import_fields.intro'] = "Wenn Sie eine XML-Datei hochladen und den richtigen Importmodus wählen, können Sie zuvor oder aus einer anderen Installation exportierte Felder hier importieren. <b>Seien Sie vorsichtig</b> beim Importieren von Feldern, wenn Sie Inhalte haben, die die aktuellen Felder bereits verwenden! Bitte wenden Sie sich an support@modmore.com, wenn Sie sich unsicher sind, welchen Import-Modus Sie verwenden sollen.";

$_lang['contentblocks.layout_desc'] = "Jedes Layout ist im wesentlichen eine horizontale Zeile, die aus einer oder mehreren Spalten besteht. Wenn Sie eine Ressource bearbeiten, sind alle Spalten leere Bereiche, denen Inhalt (über Felder) mittels eines Buttons hinzugefügt werden kann. Mehr Informationen darüber, wie Sie Layouts korrekt verwenden, erhalten Sie über den Hilfe-Button oben rechts!";
$_lang['contentblocks.add_layout'] = "Layout hinzufügen";
$_lang['contentblocks.repeat_layout'] = "Layout wiederholen";
$_lang['contentblocks.switch_layout'] = "Layout wechseln";
$_lang['contentblocks.switch_layout.chooser.introduction'] = "Wählen Sie das Layout, zu dem gewechselt werden soll. Nach der Wahl eines Layouts können Sie den Spalten des neuen Layouts Felder zuordnen.";
$_lang['contentblocks.switch_layout.introduction'] = "Ordnen Sie die unten aufgeführten Felder per Drag & Drop den gewünschten Spalten im neuen Layout zu. Vor dem Speichern müssen alle Felder Spalten zugeordnet werden.";
$_lang['contentblocks.cb_unassigned_fields'] = "Nicht zugeordnete Felder";
$_lang['contentblocks.unassigned_layout_settings'] = "Nicht zugeordnete Layout-Einstellungen";
$_lang['contentblocks.unassigned_layout_settings.introduction'] = "Diese Einstellungen existieren nicht im neuen Layout und ihre Werte bleiben nicht erhalten.";
$_lang['contentblocks.edit_layout'] = "Layout bearbeiten";
$_lang['contentblocks.duplicate_layout'] = "Layout duplizieren";
$_lang['contentblocks.export_layout'] = "Layout exportieren";
$_lang['contentblocks.delete_layout'] = "Layout löschen";
$_lang['contentblocks.delete_layout.confirm'] = "Sind Sie sicher, dass Sie dieses Layout löschen möchten? Dies kann fatale Folgen für Inhalte haben, die dieses Layout verwenden!";
$_lang['contentblocks.delete_layout.confirm.js'] = "Sind Sie sicher, dass Sie das Layout [[+layoutName]] löschen möchten? Alle zugehörigen Inhalte werden gelöscht, wenn Sie fortfahren.";
$_lang['contentblocks.delete_layout.is_default'] = "Dieses Layout kann nicht entfernt werden, weil es als standardmäßig verwendetes Layout definiert wurde. Festgelegt wird dies mit der Systemeinstellung <code>contentblocks.default_layout</code>. Weitere Informationen darüber, wie man Standard-Inhalte festlegt, erhalten Sie in der <a href=\"https://docs.modmore.com/en/ContentBlocks/v1.x/Default_Templates.html\" target=\"_blank\">Dokumentation zu Standard-Templates</a>.";
$_lang['contentblocks.export_layouts'] = "Exportieren";
$_lang['contentblocks.export_layouts.confirm'] = "Wenn Sie unten auf \"Ja\" klicken, wird ein XML-Export aller Layouts erzeugt. Dieser kann dazu genutzt werden, die Layouts später oder in einer anderen Installation wieder zu importieren. Die XML-Generierung kann je nach Anzahl der konfigurierten Layouts ein paar Sekunden in Anspruch nehmen.";
$_lang['contentblocks.import_layouts'] = "Importieren";
$_lang['contentblocks.import_layouts.title'] = "Layouts importieren";
$_lang['contentblocks.import_layouts.intro'] = "Wenn Sie eine XML-Datei hochladen und den richtigen Importmodus wählen, können Sie zuvor oder aus einer anderen Installation exportierte Layouts hier importieren. <b>Seien Sie vorsichtig</b> beim Importieren von Layouts, wenn Sie Inhalte haben, die die aktuellen Layouts bereits verwenden! Bitte wenden Sie sich an support@modmore.com, wenn Sie sich unsicher sind, welchen Import-Modus Sie verwenden sollen.";

$_lang['contentblocks.layout_settings'] = "Layout-Einstellungen";
$_lang['contentblocks.layout_settings.modal_header'] = "[[+name]]-Einstellungen";

$_lang['contentblocks.field_settings'] = "Inhalts-Einstellungen";
$_lang['contentblocks.field_settings.modal_header'] = "[[+name]]-Einstellungen";

$_lang['contentblocks.add_layoutcolumn'] = "Spalte hinzufügen";
$_lang['contentblocks.edit_layoutcolumn'] = "Spalte bearbeiten";
$_lang['contentblocks.delete_layoutcolumn'] = "Spalte löschen";
$_lang['contentblocks.delete_layoutcolumn.confirm'] = "Sind Sie sicher, dass Sie diese Spalte löschen möchten? Dies kann fatale Folgen für Inhalte haben, die diese Spalte verwenden!";
$_lang['contentblocks.add_setting'] = "Einstellung hinzufügen";
$_lang['contentblocks.edit_setting'] = "Einstellung bearbeiten";
$_lang['contentblocks.duplicate_setting'] = "Einstellung duplizieren";
$_lang['contentblocks.delete_setting'] = "Einstellung löschen";
$_lang['contentblocks.delete_setting.confirm'] = "Sind Sie sicher, dass Sie diese Einstellung löschen möchten?";

$_lang['contentblocks.defaults'] = 'Standard-Regeln';
$_lang['contentblocks.defaults.intro'] = 'Mit Standard-Regeln können Sie festlegen, wie die Ressourcen, die noch nicht mit ContentBlocks bearbeitet wurden (wie beispielsweise neue Ressourcen oder Seiten, die bereits vor der Installation von ContentBlocks vorhanden waren), verwaltet werden. Dies funktioniert, indem die unten definierten Standard-Regeln von oben nach unten durchlaufen werden, bis eine Übereinstimmung gefunden wird und das definierte Template einfügt wird.';
$_lang['contentblocks.constraint_field'] = 'Einschränkungsfeld';
$_lang['contentblocks.constraint_value'] = 'Einschränkungswert';
$_lang['contentblocks.default_template'] = 'Standard-Template';
$_lang['contentblocks.target_layout'] = 'Ziel-Layout';
$_lang['contentblocks.target_field'] = 'Ziel-Feld';
$_lang['contentblocks.target_column'] = 'Ziel-Spalte';
$_lang['contentblocks.add_default'] = 'Standard-Regel hinzufügen';
$_lang['contentblocks.edit_default'] = 'Standard-Regel bearbeiten';
$_lang['contentblocks.delete_default'] = 'Standard-Regel löschen';
$_lang['contentblocks.delete_default.confirm'] = 'Sind Sie sicher, dass Sie diese Standard-Regel löschen möchten?';


$_lang['contentblocks.start_import'] = "Import starten";
$_lang['contentblocks.import_file'] = "Datei";
$_lang['contentblocks.import_mode'] = "Import-Modus";
$_lang['contentblocks.import_mode.insert'] = "Einfügen: bestehende [[+what]] beibehalten und neue Daten hinzufügen";
$_lang['contentblocks.import_mode.overwrite'] = "Überschreiben: bestehende [[+what]] beibehalten, aber überschreiben, wenn sie dieselbe ID haben";
$_lang['contentblocks.import_mode.replace'] = "Ersetzen: zunächst alle bestehenden [[+what]] löschen, dann die neuen Daten importieren.";

$_lang['contentblocks.id'] = "ID";
$_lang['contentblocks.field'] = "Feld";
$_lang['contentblocks.fields'] = "Felder";
$_lang['contentblocks.layout'] = "Layout";
$_lang['contentblocks.layout.description'] = "Ein Wrapper für Felder";
$_lang['contentblocks.layouts'] = "Layouts";
$_lang['contentblocks.layoutcolumn'] = "Spalte";
$_lang['contentblocks.layoutcolumns'] = "Spalten";
$_lang['contentblocks.setting'] = "Einstellung";
$_lang['contentblocks.settings'] = "Einstellungen";
$_lang['contentblocks.settings.layout_description'] = "Einstellungen sind benutzerdefinierte Eigenschaften, die konfiguriert werden können, wenn ein Layout dem Inhalt hinzugefügt wurde. Die Werte der Einstellungen sind dann im Template als Platzhalter verfügbar, zum Beispiel [[+class]] für eine Einstellung mit der Referenz \"class\".";
$_lang['contentblocks.settings.field_description'] = "Einstellungen sind benutzerdefinierte Eigenschaften, die konfiguriert werden können, wenn ein Feld dem Inhalt hinzugefügt wurde. Je nach Einstellung (\"Feld anzeigen\") muss dazu das Zahnrad-Icon oben rechts im Feld angeklickt werden. Die Werte der Einstellungen sind dann im Template als Platzhalter verfügbar, zum Beispiel [[+class]] für eine Einstellung mit der Referenz \"class\".";
$_lang['contentblocks.input'] = "Eingabetyp";
$_lang['contentblocks.inputs'] = "Eingabetypen";
$_lang['contentblocks.name'] = "Name";
$_lang['contentblocks.columns'] = "Spalten";
$_lang['contentblocks.columns.description'] = "Spalten legen fest, wie das Layout im Manager dargestellt wird, wobei die Breite in Prozent angegeben wird. Als Referenz geben Sie den Namen eines Platzhalters an, den Sie im Template verwenden können.";
$_lang['contentblocks.sortorder'] = "Sortier-Reihenfolge";
$_lang['contentblocks.icon'] = "Icon";
$_lang['contentblocks.description'] = "Beschreibung";
$_lang['contentblocks.template'] = "Template";
$_lang['contentblocks.template.description'] = "Im Layout-Template können verschiedene Platzhalter genutzt werden, abhängig von den Spalten und Einstellungen, die Sie in den Tabs auf der linken Seite definieren.";
$_lang['contentblocks.width'] = "Breite";
$_lang['contentblocks.width.description'] = "Die Breite des Feldes (in Prozent), die dieses Feld auf der Seite einnehmen wird. Felder sind \"links-gefloatet\", sodass Sie einige grundlegende Layouts mit dieser Option erstellen können.";
$_lang['contentblocks.save'] = "Speichern";
$_lang['contentblocks.reference'] = "Referenz";
$_lang['contentblocks.default_value'] = "Standardwert";
$_lang['contentblocks.fieldtype'] = "Feldtyp";
$_lang['contentblocks.fieldtype.select'] = "Auswahlfeld";
$_lang['contentblocks.fieldtype.radio'] = "Radiobutton-Optionen";
$_lang['contentblocks.fieldtype.checkbox'] = "Checkbox-Optionen";
$_lang['contentblocks.fieldtype.textfield'] = "Textfeld";
$_lang['contentblocks.fieldtype.link'] = "Link";
$_lang['contentblocks.fieldtype.textarea'] = "Mehrzeiliges Textfeld";
$_lang['contentblocks.fieldtype.richtext'] = "Rich text";
$_lang['contentblocks.fieldtype.image'] = "Bild";
$_lang['contentblocks.fieldoptions'] = "Feld-Optionen";
$_lang['contentblocks.fieldoptions.description'] = "Wird nur für Auswahlfeldtypen verwendet. Definieren Sie verfügbare Werte nach dem Schema \"platzhalter_wert==Angezeigter Wert\", einen pro Zeile (\"Angezeigter Wert=platzhalter_wert\" wird ebenfalls unterstützt, wird aber in Version 2.0 entfernt). Wenn Sie ausschließlich einen Wert pro Zeile übergeben (wie z.B. \"foo\"), wird dieser sowohl zur Anzeige als auch als Wert des Platzhalters verwendet.";
$_lang['contentblocks.field_is_exposed'] = "Feld anzeigen";
$_lang['contentblocks.field_is_exposed.description'] = "Zeige Feld im Eingabebereich, anstatt erst nach Klick auf das Einstellungen-Icon";
$_lang['contentblocks.field_is_exposed.modal'] = "Zeige Feld-Einstellungen in einem modalen Fenster";
$_lang['contentblocks.field_is_exposed.exposedassetting'] = "Zeige Feld als Einstellmöglichkeit im Eingabebereich";
$_lang['contentblocks.field_is_exposed.exposedasfield'] = "Zeige Feld als normales Feld im Eingabebereich";
$_lang['contentblocks.process_tags'] = "Process tags";
$_lang['contentblocks.process_tags.description'] = "When enabled, tags in the input options will be processed with the MODX parser before being used.";

$_lang['contentblocks.directory'] = 'Verzeichnis';
$_lang['contentblocks.directory.description'] = 'A subfolder within the media source (whether overridden or using the ContentBlocks system setting) where files should be uploaded to.';
$_lang['contentblocks.crops'] = 'Crops';
$_lang['contentblocks.crops.description'] = 'A definition of crops to allow for the image. Each unique crop is separated by a pipe symbol (|) and contains a name, followed by a colon (:), and then comma-separated options. Each option has a name and a value. For example, this is a valid crops definition with some options: <code>small:width=200,height=200,aspect=1|medium:width=500,aspect=0.7|large:height=750</code>';
$_lang['contentblocks.crop_directory'] = 'Crops Directory';
$_lang['contentblocks.crop_directory.description'] = 'A subfolder within the media source (whether overridden or using the ContentBlocks system setting) that will contain crops created for images.';
$_lang['contentblocks.open_crops_automatically'] = 'Open cropper automatically';
$_lang['contentblocks.open_crops_automatically.description'] = 'When enabled, the cropper will be immediately opened after adding an image to the field.';
$_lang['contentblocks.file_types'] = 'Erlaubte Dateiendungen';
$_lang['contentblocks.file_types.description'] = 'Dateien mit diesen (kommaseparierten) Dateiendungen werden hochgeladen. Frei lassen für keine Beschränkung.';
$_lang['contentblocks.file_types.disallowed'] = 'Dateityp in diesem Feld nicht erlaubt';

// Categories
$_lang['contentblocks.category'] = "Kategorie";
$_lang['contentblocks.categories'] = "Kategorien";
$_lang['contentblocks.categories.intro'] = "Verwenden Sie Kategorien, um Ihre Felder, Layouts und Templates besser zu organisieren. In den modalen Fenstern \"Inhalt hinzufügen\" und \"Layout hinzufügen\" werden Elemente, die Kategorien zugeordnet sind, zuerst angezeigt, gefolgt von einer mit \"Unkategorisiert\" bezeichneten Kategorie.";
$_lang['contentblocks.uncategorized'] = "Unkategorisiert";
$_lang['contentblocks.add_category'] = "Kategorie hinzufügen";
$_lang['contentblocks.edit_category'] = "Kategorie bearbeiten";
$_lang['contentblocks.duplicate_category'] = "Kategorie duplizieren";
$_lang['contentblocks.delete_category'] = "Kategorie löschen";
$_lang['contentblocks.delete_category.confirm'] = "Sind Sie sicher, dass Sie diese Kategorie löschen möchten? Alle Elemente, die derzeit die Kategorie verwenden, werden danach unkategorisiert sein.";
$_lang['contentblocks.delete_category.confirm.js'] = "Sind Sie sicher, dass Sie diese Kategorie löschen möchten?";
$_lang['contentblocks.export_category'] = "Kategorie exportieren";
$_lang['contentblocks.export_categories'] = "Exportieren";
$_lang['contentblocks.export_categories.confirm'] = "Wenn Sie unten auf \"Ja\" klicken, wird ein XML-Export aller Kategorien erzeugt. Dieser kann dazu genutzt werden, die Kategorien später oder in einer anderen Installation wieder zu importieren. Die XML-Generierung sollte nur ein paar Sekunden in Anspruch nehmen.";
$_lang['contentblocks.import_categories'] = "Importieren";
$_lang['contentblocks.import_categories.title'] = "Kategorien importieren";
$_lang['contentblocks.import_categories.intro'] = "Wenn Sie eine XML-Datei hochladen und den richtigen Importmodus wählen, können Sie zuvor oder aus einer anderen Installation exportierte Kategorien hier importieren. <b>Seien Sie vorsichtig</b> beim Importieren von Kategorien, wenn Sie Inhalte haben, die die aktuellen Felder bereits verwenden! Bitte wenden Sie sich an support@modmore.com, wenn Sie sich unsicher sind, welchen Import-Modus Sie verwenden sollen.";


// Templates
$_lang['contentblocks.templates'] = 'Templates';
$_lang['contentblocks.templates_desc'] = 'Templates sind vordefinierte Sets von Layouts und Feldern, mit deren Hilfe Inhalte schneller zur Seite hinzugefügt werden können. ';
$_lang['contentblocks.add_template'] = 'Template hinzufügen';
$_lang['contentblocks.edit_template'] = 'Template bearbeiten';
$_lang['contentblocks.duplicate_template'] = 'Template duplizieren';
$_lang['contentblocks.export_template'] = 'Template exportieren';
$_lang['contentblocks.export_templates'] = 'Templates exportieren';
$_lang['contentblocks.import_templates'] = 'Templates importieren';
$_lang['contentblocks.import_templates.title'] = 'Templates importieren';
$_lang['contentblocks.import_templates.intro'] = 'Wenn Sie eine XML-Datei hochladen und den richtigen Importmodus wählen, können Sie zuvor oder aus einer anderen Installation exportierte Templates hier importieren. <b>Hinweis:</b> Templates enthalten Verweise auf Feld- und Layout-IDs; falls Sie Templates importieren, müssen Sie wahrscheinlich auch Layouts und Felder von der selben Quelle importieren.';
$_lang['contentblocks.delete_template'] = 'Template löschen';
$_lang['contentblocks.delete_template.confirm'] = 'Sind Sie sicher, dass Sie dieses Template löschen möchten?';


// Input types
$_lang['contentblocks.chunk'] = "Chunk";
$_lang['contentblocks.chunk.description'] = "Wählen Sie einen Chunk, der dem Inhalt hinzugefügt werden soll.";
$_lang['contentblocks.chunk.choose_chunk'] = "Chunk wählen";
$_lang['contentblocks.chunk.choose_chunk.description'] = "Wählen Sie den Chunk, der hinzugefügt werden soll.";
$_lang['contentblocks.chunk_template.description'] = "Template für einen Chunk. Verfügbare Platzhalter: <code>[[+tag]]</code>, <code>[[+chunk_name]]</code>";
$_lang['contentblocks.chunk.custom_preview'] = "Angepasste Vorschau";
$_lang['contentblocks.chunk.custom_preview.description'] = "Wenn dieses Feld leer ist, wird der eigentliche Chunk als Vorschau im Manager angezeigt. Alternativ können Sie hier auch eigenen HTML-Code angeben, der zur Vorschau im Manager verwendet werden soll.";
$_lang['contentblocks.chunk.no_chunk_set'] = "Hoppla... Für dieses Feld wurde kein Chunk angegeben.";

$_lang['contentblocks.chunkselector'] = 'Chunk-Auswahl';
$_lang['contentblocks.chunk_selector_template.description'] = 'Template für den ausgewählten Chunk. Verfügbare Platzhalter: <code>[[+value]]</code> (beinhaltet das vollständige Chunk-Tag), <code>[[+chunk_name]]</code> (beinhaltet nur den Namen des gewählten Chunks)';
$_lang['contentblocks.chunkselector.description'] = 'Wählen Sie einen Chunk, der angezeigt werden soll';
$_lang['contentblocks.chunkselector.available_chunks'] = "Namen oder IDs der zulässigen Chunks (optional)";
$_lang['contentblocks.chunkselector.available_chunks.description'] = "Um die verfügbaren Chunks für den Redakteur einzugrenzen, geben Sie bitte eine kommaseparierte Liste von Chunk-Namen oder -IDs an. Chunks in dieser Liste werden immer verfügbar sein, unabhängig von den anderen, unten aufgeführten Einstellungen.";
$_lang['contentblocks.chunkselector.available_categories'] = "Kategorien";
$_lang['contentblocks.chunkselector.available_categories.description'] = "Geben Sie eine Liste von Kategorie-Namen oder -IDs an, um die Auswahl der Chunks einzuschränken.";

$_lang['contentblocks.code'] = "Code";
$_lang['contentblocks.code.description'] = "Zeigt ein mehrzeiliges Textfeld mit Syntax-Hervorhebung an.";
$_lang['contentblocks.code_template.description'] = "Der Wert dieses Code-Eingabefeldes wird in dem Platzhalter <code>[[+value]]</code> gespeichert. Je nachdem, wie Sie dieses Feld verwenden möchten, fügen Sie diesen Platzhalter einfach dem Template hinzu, oder codieren ihn vorher (z.B. über <code>&lt;pre&gt;&lt;code&gt;[[+value:htmlent]]&lt;/code&gt;&lt;/pre&gt;</code>), damit er angezeigt und nicht ausgeführt wird. Der Platzhalter <code>[[+lang]]</code> enthält die mittels Auswahlfeld gewählte Programmiersprache.";
$_lang['contentblocks.code.available_languages'] = "Verfügbare Programmiersprachen";
$_lang['contentblocks.code.available_languages.description'] = "Geben Sie eine kommaseparierte Liste von Einträgen nach dem Schema <code>wert=Angezeigter Wert</code> für die verfügbaren Sprachen mit Syntax-Hervorhebung an. Wenn nur eine Sprache angegeben wird, wird diese automatisch gewählt und das Auswahlfeld wird ausgeblendet.";
$_lang['contentblocks.code.default_language'] = "Standard-Sprache";
$_lang['contentblocks.code.default_language.description'] = "Die Programmiersprache, die standardmäßig gewählt werden soll.";
$_lang['contentblocks.code.language'] = "Sprache";
$_lang['contentblocks.code.entities'] = "Entities codieren?";
$_lang['contentblocks.code.entities.description'] = "Wenn diese Einstellung aktiviert ist, werden die Entities und MODX-Tags des eingegebene Codes für das Anzeigen von Code modifiziert (sonst würden sie interpretiert / ausgeführt).";

$_lang['contentblocks.file'] = 'Datei-Eingabe';
$_lang['contentblocks.file.description'] = 'Hinzufügen von Dateien zur Verlinkung';
$_lang['contentblocks.file_template.description'] = 'Gültige Platzhalter sind <code>[[+url]]</code>, <code>[[+title]]</code>, <code>[[+size]]</code> (in Bytes), <code>[[+upload_date]]</code> und <code>[[+extension]]</code>';
$_lang['contentblocks.file.remove_file'] = 'Datei entfernen';
$_lang['contentblocks.file.file.or_drop_files'] = 'oder Dateien per Drag & Drop hierhin ziehen';
$_lang['contentblocks.file.max_files'] = 'Maximale Anzahl an Dateien';
$_lang['contentblocks.file.max_files.description'] = 'Definiert die maximale Anzahl der pro Upload-Feld zulässigen Dateien. Ist das Limit ausgeschöpft, werden weitere Dateien zurückgewiesen.';
$_lang['contentblocks.file.max_files.reached'] = 'Entschuldigung, Sie können nicht mehr als [[+max]] Dateien in diesem Bereich nutzen.';
$_lang['contentblocks.file.directory'] = 'Verzeichnis';
$_lang['contentblocks.file.directory.description'] = 'Ein Unterordner in der Medienquelle (entweder in der oben ausgewählten oder, wenn keine ausgewählt wurde, in der, die in der ContentBlocks-Systemeinstellung "contentblocks.image.source" festgelegt wurde)';
$_lang['contentblocks.file.file_types'] = 'Erlaubte Dateiendungen';
$_lang['contentblocks.file.file_types.description'] = 'Dateien mit diesen (kommaseparierten) Dateiendungen werden hochgeladen. Frei lassen für keine Beschränkung.';
$_lang['contentblocks.file.file_types.disallowed'] = 'Dateityp in diesem Feld nicht erlaubt';
$_lang['contentblocks.file.choose_file'] = 'Datei auswählen';
$_lang['contentblocks.file.wrapper_template.description'] = "Das Template zum Umschließen der Liste auf oberster Ebene. Sollte ein <code>&lt;ul&gt;</code>-Tag enthalten. Verfügbarer Platzhalter: <code>[[+files]]</code> (Listeneinträge werden über das andere Template ausgegeben).";


$_lang['contentblocks.gallery'] = "Galerie";
$_lang['contentblocks.gallery.description'] = "Ein einfacher Eingabetyp für eine Galerie, inkl. einfachem Upload mehrerer Bilder, Sortierung per Drag & Drop und Titel-Attributen.";
$_lang['contentblocks.gallery_template.description'] = "Wird verwendet, um einzelne Bilder zu umschließen. Verfügbare Platzhalter: <code>[[+url]]</code> (der vollständige Link zum Bild), <code>[[+title]]</code> (der für das jeweilige Bild angegebene Titel), <code>[[+size]]</code> und <code>[[+extension]]</code>";
$_lang['contentblocks.gallery_wrapper_template.description'] = "Wird als Container verwendet, der alle Bilder enthält. Verfügbarer Platzhalter: <code>[[+images]]</code>";
$_lang['contentblocks.gallery_max_images.description'] = "Legt die maximale Anzahl an Bildern fest, die pro Galerie erlaubt sein sollen. Ist das Limit ausgeschöpft, werden weitere Bilder zurückgewiesen.";
$_lang['contentblocks.gallery.thumb_size'] = "Thumbnail-Größe";
$_lang['contentblocks.gallery.thumb_size.description'] = "Wählen Sie eine der Optionen, um festzulegen, wie groß/klein die Thumbnails auf der Seite angezeigt werden.";
$_lang['contentblocks.gallery.thumb_size.small'] = "Klein";
$_lang['contentblocks.gallery.thumb_size.medium'] = "Mittel";
$_lang['contentblocks.gallery.thumb_size.large'] = "Groß";
$_lang['contentblocks.gallery.show_description'] = "Beschreibung anzeigen";
$_lang['contentblocks.gallery.show_description.description'] = "Beschreibungsfeld anzeigen, um dem Redakteur für jedes Bild das Eintragen einer längeren Beschreibung zu ermöglichen.";
$_lang['contentblocks.gallery.show_link_field'] = "Link-Feld anzeigen";
$_lang['contentblocks.gallery.show_link_field.description'] = "Link-Feld anzeigen, damit Bilder mit Ressourcen oder externen Websites verlinkt werden können.";

$_lang['contentblocks.heading'] = "Überschrift";
$_lang['contentblocks.heading.description'] = "Eine Kombination aus einem Auswahlfeld für die Überschrift-Ebene und einem Textfeld.";
$_lang['contentblocks.heading_template.description'] = "Template für das Überschriften-Feld. Verfügbare Platzhalter sind: <code>[[+level]]</code> (die gewählte Überschrift-Ebene) und <code>[[+value]]</code> (der Inhalt des Textfeldes).";
$_lang['contentblocks.default_level'] = "Standard-Überschrift-Ebene";
$_lang['contentblocks.available_levels'] = "Mögliche Überschrift-Ebenen";
$_lang['contentblocks.heading_default_level.description'] = "Der Wert, der standardmäßig bei neuen Instanzen des Überschriften-Eingabefelds vorausgewählt sein soll.";
$_lang['contentblocks.heading_available_levels.description'] = "Eine kommaseparierte Liste mit Einträgen nach dem Schema <code>wert=Angezeigter Wert</code> für verfügbare Überschrift-Ebenen, die im Auswahlfeld angezeigt werden. Was den \"angezeigten Wert\" angeht, wird im MODX-Lexikon nach einem gleichnamigen Eintrag mit dem Präfix <code>contentblocks.</code> gesucht. Wird ein Eintrag gefunden, so wird er verwendet, anderenfalls wird der eingetragene Wert direkt genutzt. Beispiel: <code>h1=heading_1, h2=Zweite Ebene, h3=heading_3</code>";
$_lang['contentblocks.heading_1'] = "Überschrift 1";
$_lang['contentblocks.heading_2'] = "Überschrift 2";
$_lang['contentblocks.heading_3'] = "Überschrift 3";
$_lang['contentblocks.heading_4'] = "Überschrift 4";
$_lang['contentblocks.heading_5'] = "Überschrift 5";
$_lang['contentblocks.heading_6'] = "Überschrift 6";

$_lang['contentblocks.hr'] = "Horizontale Linie";
$_lang['contentblocks.hr.description'] = "Ein einfacher Platzhalter für ein <hr>-Tag, um eine horizontale Linie einzufügen.";
$_lang['contentblocks.hr_template.description'] = "Das Template, um die horizontale Linie auszugeben. Es gibt hierfür keine Platzhalter, aber es wird empfohlen, das <code>&lt;hr&gt;</code>-Tag zu verwenden.";

$_lang['contentblocks.image'] = "Bild";
$_lang['contentblocks.image.description'] = "Ein Eingabetyp zum einfachen Upload oder zur Auswahl eines Bildes.";
$_lang['contentblocks.image.source'] = "Abweichende Medienquelle";
$_lang['contentblocks.image.source.description'] = "Belassen Sie diese Einstellung auf \"(Keine)\", um die Standard-Medienquelle des Systems für Bilder zu verwenden, oder wählen Sie eine bestimmte Medienquelle, um eine abweichende Medienquelle für dieses spezielle Feld festzulegen.";
$_lang['contentblocks.image_template.description'] = "Template für den Bild-Eingabetyp. Sollte ein <code>&lt;img&gt;</code>-Tag enthalten. Verfügbare Platzhalter: <code>[[+url]]</code>, <code>[[+size]]</code>, <code>[[+width]]</code>, <code>[[+height]]</code>, <code>[[+extension]]</code>";
$_lang['contentblocks.imagewithtitle'] = "Bild mit Titel";
$_lang['contentblocks.imagewithtitle.description'] = "Dasselbe wie der Bild-Eingabetyp, aber zusätzlich mit einem Textfeld, über das ein alt- oder title-Attribut angegeben werden kann.";
$_lang['contentblocks.image_with_title'] = "Bild mit Titel";
$_lang['contentblocks.image_with_title_template.description'] = "Template für den Bild-Eingabetyp. Sollte ein <code>&lt;img&gt;</code>-Tag enthalten. Verfügbare Platzhalter: <code>[[+url]]</code>, <code>[[+title]]</code>, <code>[[+size]]</code>, <code>[[+width]]</code>, <code>[[+height]]</code>, <code>[[+extension]]</code>";

$_lang['contentblocks.list'] = "Liste";
$_lang['contentblocks.condensed_list'] = 'Condensed List';
$_lang['contentblocks.list.description'] = "Eingabetyp zur einfachen Erstellung (beliebig verschachtelbarer) ungeordneter Aufzählungslisten.";
$_lang['contentblocks.list_template.description'] = "Template für einzelne Listen-Einträge. Sollte ein <code>&lt;li&gt;</code>-Tag enthalten. Verfügbare Platzhalter: <code>[[+value]]</code> (der Text des Listeneintrags), <code>[[+idx]]</code> (eine automatisch hochgezählte Eintragsnummer, beginnend mit 1 auf jedem Level) und <code>[[+items]]</code> (untergeordnete/verschachtelte Listen, diese werden über die anderen Templates ausgegeben).";
$_lang['contentblocks.list_wrapper_template.description'] = "Das Template zum Umschließen der Liste auf oberster Ebene. Sollte ein <code>&lt;ul&gt;</code>-Tag enthalten. Verfügbarer Platzhalter: <code>[[+items]]</code> (Listeneinträge werden über die anderen Templates ausgegeben).";
$_lang['contentblocks.list_nested_template.description'] = "Das Template zum Umschließen untergeordneter/verschachtelter Listen. Sollte ein <code>&lt;ul&gt;</code>-Tag enthalten. Verfügbare Platzhalter: <code>[[+items]]</code> (Listeneinträge, diese werden über die anderen Templates ausgegeben).";

$_lang['contentblocks.orderedlist'] = "Geordnete Liste";
$_lang['contentblocks.orderedlist.description'] = "Eingabetyp zur einfachen Erstellung (beliebig verschachtelbarer) geordneter - also nummerierter - Aufzählungslisten.";
$_lang['contentblocks.ordered_list'] = "Geordnete Liste";
$_lang['contentblocks.ordered_list_template.description'] = "Template für einzelne Listen-Einträge. Sollte ein <code>&lt;li&gt;</code>-Tag enthalten. Verfügbare Platzhalter: <code>[[+value]]</code> (der Text des Listeneintrags), <code>[[+idx]]</code> (eine automatisch hochgezählte Eintragsnummer, auf jeder Verschachtelungs-Ebene mit 1 beginnend) und <code>[[+items]]</code> (untergeordnete/verschachtelte Listen, diese werden über die anderen Templates ausgegeben).";
$_lang['contentblocks.ordered_list_wrapper_template.description'] = "Das Template zum Umschließen der Liste auf oberster Ebene. Sollte ein <code>&lt;ul&gt;</code>-Tag enthalten. Verfügbarer Platzhalter: <code>[[+items]]</code> (Listeneinträge werden über die anderen Templates ausgegeben).";
$_lang['contentblocks.ordered_list_nested_template.description'] = "Das Template zum Umschließen untergeordneter/verschachtelter Listen. Sollte ein <code>&lt;ul&gt;</code>-Tag enthalten. Verfügbarer Platzhalter: <code>[[+items]]</code> (Listeneinträge, diese werden über die anderen Templates ausgegeben).";

$_lang['contentblocks.quote'] = "Zitat";
$_lang['contentblocks.quote.description'] = "Ein mehrzeiliges Texteingabefeld, kombiniert mit einem kleinen Textfeld für Urheber-/Autoren-Angaben zum Zitat";
$_lang['contentblocks.quote_template.description'] = "Template für das Zitat. Sollte ein <code>&lt;blockquote&gt;</code>- und ein <code>&lt;cite&gt;</code>-Tag enthalten. Verfügbare Platzhalter: <code>[[+value]]</code> (das Zitat) und <code>[[+cite]]</code> (der angegebene Urheber/Autor des Zitats).";
$_lang['contentblocks.quote.author'] = "Autor";

$_lang['contentblocks.repeater'] = "Repeater";
$_lang['contentblocks.repeater.description'] = "Erlaubt es, eine Gruppe von Feldern zu definieren, die der Redakteur dann als Einheit mehrfach einfügen kann. Anwendungsbespiel: Vorstellung des Teams, wobei es für jeden Mitarbeiter z.B. ein Namensfeld, eine kurze Beschreibung und ein Foto gibt.";
$_lang['contentblocks.repeater_template.description'] = "Template für jede einzelne Zeile in dem Repeater-Feld. Es gibt keine Standardwerte, da das Repeater-Feld ausschließlich von Ihrer Gruppen-Konfiguration abhängig ist! Für jedes der Felder, das Sie festlegen, müssen Sie auch einen Schlüssel festlegen. Der Repeater wird zuerst alle definierten Felder separat verarbeiten (z.B. wird ein Bildfeld zunächst so geparst, als ob es ein eigenständiges Bildfeld wäre), und das Ergebnis wird im Platzhalter mit dem Namen des Schlüssels gespeichert. Bitte lesen Sie die Dokumentation auf modmore.com; dort finden Sie eine ausführlichere Anleitung dafür, wie das Repeater-Feld funktioniert. Unterstützt auch einen <code>[[+idx]]</code>-Platzhalter.";
$_lang['contentblocks.repeater.width'] = "Breite (in %)";
$_lang['contentblocks.repeater.key'] = "Schlüssel";
$_lang['contentblocks.repeater.key.description'] = "Der Schlüssel, mittels dessen der Wert dieses Feldes im Repeater-Template zur Verfügung steht.";
$_lang['contentblocks.repeater.group'] = "Gruppe";
$_lang['contentblocks.repeater.group.description'] = "Mit dem Repeater-Feld können Sie eine Gruppe von Feldern mehrfach einfügen. Hier können Sie die Felder definieren, die als Gruppe mehrfach eingefügt werden sollen.";
$_lang['contentblocks.repeater.max_items'] = "Maximale Anzahl an Elementen";
$_lang['contentblocks.repeater.max_items.description'] = "Wenn Sie eine Zahl größer als 0 wählen, können keine zusätzlichen Zeilen über diese Grenze hinaus hinzugefügt werden.";
$_lang['contentblocks.repeater.max_items_reached'] = "Entschuldigung, Sie dürfen dieses Element nicht mehr als [[+max]]-mal hinzufügen.";
$_lang['contentblocks.repeater.min_items'] = "Minimale Anzahl an Elementen";
$_lang['contentblocks.repeater.min_items.description'] = "Wenn der Wert auf eine Zahl größer als 0 gesetzt wird, können Zeilen über diese Grenze hinaus nicht entfernt werden.";
$_lang['contentblocks.repeater.add_first_item'] = "Erstes Element automatisch hinzufügen";
$_lang['contentblocks.repeater.add_first_item.description'] = "Wenn diese Einstellung aktiviert ist, wird ein erstes Repeater-Element automatisch hinzugefügt, wenn noch keines eingefügt wurde.";
$_lang['contentblocks.repeater.add_item'] = "Eintrag hinzufügen";
$_lang['contentblocks.repeater.delete_item'] = "Eintrag löschen";
$_lang['contentblocks.repeater.wrapper_template.description'] = "Das äußere Template, das alle anderen geparsten Zeilen umschließt. Sollte den Platzhalter <code>[[+rows]]</code> enthalten, kann auch <code>[[+total]]</code> enthalten.";
$_lang['contentblocks.repeater.row_separator'] = "Zeilen-Trennzeichen";
$_lang['contentblocks.repeater.row_separator.description'] = "Eine Zeichenkette zum Zusammenfügen einzelner Zeilen. Dies könnten einfach ein paar Zeilenumbrüche sein, wie in der Standardvorgabe, oder es könnte HTML-Code sein, den Sie zwischen den Zeilen einfügen möchten.";
$_lang['contentblocks.repeater.manager_columns'] = "Manager-Spalten";
$_lang['contentblocks.repeater.manager_columns.description'] = "Gibt an, wie viele Repeater-Instanzen im Manager nebeneinander in Spalten angezeigt werden. Mögliche Werte sind 1 bis 4.";
$_lang['contentblocks.repeater.layout_style'] = "Layout-Stil";
$_lang['contentblocks.repeater.layout_style.description'] = "Format for laying out a repeater (mini is similar to a table view)";
$_lang['contentblocks.repeater.condensed'] = "Condensed";
$_lang['contentblocks.repeater.mini'] = "Mini";
$_lang['contentblocks.repeater.default'] = "Default";

$_lang['contentblocks.richtext'] = "Formatierter Text (Rich Text)";
$_lang['contentblocks.richtext.description'] = "Ein einfaches Rich-Text-Feld. Unterstützt sowohl TinyMCE als auch Redactor.";
$_lang['contentblocks.richtext_template.description'] = "Da Rich-Text-Felder üblicherweise ihr eigenes Markup generieren, wird als Template normalerweise nur der Platzhalter <code>[[+value]]</code> verwendet, wobei Sie diesen natürlich auch mit einem Container oder Ähnlichem umschließen können.";

$_lang['contentblocks.table'] = "Tabelle";
$_lang['contentblocks.table.description'] = "Interaktives Widget für Tabellendaten.";
$_lang['contentblocks.table_template.description'] = "Template für jede der Tabellenzellen. Sollte ein &lt;td&gt;-Tag enthalten. Verfügbare Platzhalter: <code>[[+cell]]</code>, <code>[[+colIdx]]</code>, <code>[[+colTotal]]</code>";
$_lang['contentblocks.table.row_template'] = "Zeilen-Template";
$_lang['contentblocks.table.row_template.description'] = "Das Template für jede der Zeilen der Tabelle, sollte ein <code>&lt;tr&gt;</code>-Tag enthalten. Verfügbare Platzhalter: <code>[[+row]]</code> (enthält jede der Zellen in dieser Zeile), <code>[[+idx]]</code>";
$_lang['contentblocks.table.wrapper_template.description'] = "Das umschließende Template für die gesamte Tabelle. Verfügbare Platzhalter: <code>[[+body]]</code>, <code>[[+total]]</code>.";

$_lang['contentblocks.textarea'] = "Mehrzeiliges Textfeld";
$_lang['contentblocks.textarea.description'] = "Ein einfaches mehrzeiliges Textfeld.";

$_lang['contentblocks.textfield'] = "Textfeld";
$_lang['contentblocks.textfield.description'] = "Ein einfaches einzeiliges Textfeld.";
$_lang['contentblocks.textfield_template.description'] = "Um den Wert des Textfeldes auszugeben, verwenden Sie einfach den Platzhalter <code>[[+value]]</code> mit einem umschließenden Container Ihrer Wahl (einem Absatz, einer Überschrift etc.).";
$_lang['contentblocks.textarea_template.description'] = "For the text area you can use the <code>[[+value]]</code> placeholder with a container of choice (a paragraph, heading etc). If you want to support line breaks without adding markup to the field, try applying the <code>nl2br</code> output filter.";

$_lang['contentblocks.video'] = "Video";
$_lang['contentblocks.video.description'] = "Die YouTube-Integration erlaubt Ihnen, nach Schlüsselbegriffen zu suchen und Videos einfach über YouTube-Links einzufügen.";
$_lang['contentblocks.video_template.description'] = "Wenn Sie das Video-Eingabefeld verwenden, wird die YouTube-Video-ID im Platzhalter <code>[[+value]]</code> gespeichert. Dieser kann verwendet werden, um den Code zum Einbetten in diesem Template zu generieren.";
$_lang['contentblocks.video.search'] = "Suchen!";
$_lang['contentblocks.video.search_introduction'] = "Verwenden Sie das Suchfeld unten, um bei YouTube nach Videos zu suchen!";
$_lang['contentblocks.video.enter_keywords'] = "Geben Sie einen oder mehrere Schlüsselbegriffe ein...";
$_lang['contentblocks.video.load_more_results'] = "Weitere Ergebnisse laden";
$_lang['contentblocks.video.search_youtube'] = "YouTube durchsuchen";
$_lang['contentblocks.video.paste_link'] = "Link hier einfügen";
$_lang['contentblocks.video.youtube_not_loaded'] = "Die YouTube-API wure nicht geladen. Bitte versuchen Sie es erneut in wenigen Sekunden. Bleibt das Problem bestehen, ist die API zurzeit nicht verfügbar.";
$_lang['contentblocks.video.api_error'] = "Hoppla, es ist ein Fehler aufgetreten: [[+message]] (Code [[+code]])";

// Select
$_lang['contentblocks.dropdown'] = "Auswahlfeld";
$_lang['contentblocks.dropdown.description'] = "Ein einfaches Ausklapp-Auswahlfeld, das es dem Redakteur erlaubt, ein Element aus einer Liste vordefinierter Optionen auszuwählen.";
$_lang['contentblocks.dropdown_template.description'] = "Template für das Auswahlfeld. Verfügbare Platzhalter sind <code>[[+value]]</code> (der übergebene Wert des ausgewählten Elements), <code>[[+display]]</code> (der im Auswahlfeld angezeigte Wert).";
$_lang['contentblocks.dropdown.options'] = "Auswahlfeld-Optionen";
$_lang['contentblocks.dropdown.options.description'] = "Definieren Sie die verfügbaren Werte nach dem Schema 'wert==Angezeigter Wert', eine Option pro Zeile. Wenn Sie ausschließlich einen Wert pro Zeile übergeben (wie z.B. \"foo\"), wird dieser sowohl zur Anzeige als auch als Wert des Platzhalters verwendet. Stellen Sie einem einzelnen Wert eine Raute (#) voran, so wird daraus eine deaktivierte Option. Sie können auch @SNIPPET-Bindungen verwenden, um Optionswerte dynamisch einzufügen. Detaillierte Informationen über das Definieren von Optionen können Sie der <a href=\"https://docs.modmore.com/en/ContentBlocks/v1.x/Input_Types/Dropdown.html\" target=\"_blank\">Auswahlfeld-Dokumentation auf modmo.re/cb</a> entnehmen.";
$_lang['contentblocks.dropdown.default_value'] = "Standardwert";
$_lang['contentblocks.dropdown.default_value.description'] = "Der Standardwert, der ausgewählt werden soll, wenn das Auswahlfeld gerade eingefügt wurde oder nichts ausgewählt wurde.";

// Snippet
$_lang['contentblocks.snippet'] = "Snippet";
$_lang['contentblocks.snippet.description'] = "Dieser Eingabetyp erlaubt Redakteuren, ein Snippet auszuwählen und Parameter dafür einzugeben.";
$_lang['contentblocks.snippet.available_snippets'] = "Namen oder IDs erlaubter Snippets (optional)";
$_lang['contentblocks.snippet.available_snippets.description'] = "Um die vom Redakteur auswählbaren Snippets einzuschränken, geben Sie eine kommaseparierte Liste von Snippet-Namen oder Snippet-IDs an. Snippets in dieser Liste stehen immer zur Verfügung, unabhängig von den anderen Einstellungen unten.";
$_lang['contentblocks.snippet.categories'] = "Kategorien";
$_lang['contentblocks.snippet.categories.description'] = "Geben Sie eine Liste von Kategorie-Namen oder -IDs an, um die verfügbaren Snippets auf diejenigen zu beschränken, die diesen Kategorien zugeordnet sind.";
$_lang['contentblocks.snippet.add_property'] = "Parameter hinzufügen";
$_lang['contentblocks.snippet.choose_snippet'] = "Snippet auswählen";
$_lang['contentblocks.snippet.other_property'] = "Andere (freie Eingabe)";
$_lang['contentblocks.snippet.other_property.desc'] = "Beliebige weitere Parameter, die beim Aufruf des Snippets übergeben werden sollen, können hier angegeben werden. Stellen Sie sicher, dass Sie die korrekte Tag-Syntax verwenden (z.B. &parameter=`wert`)";
$_lang['contentblocks.snippet.allow_uncached'] = "Ungecachten Aufruf erlauben?";
$_lang['contentblocks.snippet.allow_uncached.description'] = "Wenn diese Einstellung aktiviert ist, steht die Option \"Cache verwenden?\" für Snippets zur Verfügung. Wenn sie deaktiviert ist, werden alle Snippets gecacht ausgeführt.";
$_lang['contentblocks.snippet.uncached'] = "Cache verwenden?";
$_lang['contentblocks.snippet.uncached_0'] = "Ja";
$_lang['contentblocks.snippet.uncached_1'] = "Nein, dieses Snippet nicht cachen";
$_lang['contentblocks.snippet.none_available'] = "Für dieses Feld sind keine Snippets verfügbar.";
$_lang['contentblocks.snippet_template.description'] = "The snippet field creates a full MODX Snippet tag for you, which is available in <code>[[+value]]</code>, and the snippet name is in <code>[[+snippet_name]]</code>";

$_lang['contentblocks.layout_template.description'] = 'Das Template für dieses Feld, das verschachtelte Layouts ermöglicht. Denken Sie daran, dass die Templates aller darin enthaltenen Layouts ebenfalls geparst werden. Verfügbarer Platzhalter: <code>[[+value]] </code> (der voll geparste HTML-Code der enthaltenen Layouts)';
$_lang['contentblocks.layoutfield.available_layouts'] = "Verfügbare Layouts";
$_lang['contentblocks.layoutfield.available_layouts.description'] = "Kommaseparierte Liste von erlaubten Layouts. Um keine Layouts zu erlauben, beispielsweise um nur das Einfügen von Templates zuzulassen, geben Sie hier den Wert -1 ein.";
$_lang['contentblocks.layoutfield.available_templates'] = "Verfügbare Templates";
$_lang['contentblocks.layoutfield.available_templates.description'] = "Kommaseparierte Liste von erlaubten Templates. Um keine Templates zu erlauben, geben Sie hier den Wert -1 ein.";

// Image related
$_lang['contentblocks.choose_image'] = "Bild auswählen";
$_lang['contentblocks.wrapper_template'] = "Umschließendes Template";
$_lang['contentblocks.nested_template'] = "Inneres Template";
$_lang['contentblocks.max_images'] = "Maximale Anzahl an Bildern";
$_lang['contentblocks.max_images_reached'] = "Entschuldigung, Sie können nicht mehr als [[+max]] Bilder in dieser Galerie platzieren.";
$_lang['contentblocks.upload_error'] = "Hoppla, beim Upload der Datei [[+file]] ist etwas schiefgelaufen: [[+message]]";
$_lang['contentblocks.upload_error.file_too_big'] = "\"\n\nDie Datei war möglicherweise zu groß.";
$_lang['contentblocks.image.thumbnail_size'] = "Manager-Thumbnail-Größe";
$_lang['contentblocks.image.thumbnail_size.description'] = "Abmessungen für Manager-Tumbnails. Freilassen, um keine Abmessungen anzugeben; geben Sie einen numerischen Wert für quadratische Bilder und Abmessungen nach dem Schema BxH für rechteckige Bilder ein. Beispiel: 100 oder 100x50";
$_lang['contentblocks.image.thumbnail_crop'] = 'Use crop for thumbnail';
$_lang['contentblocks.image.thumbnail_crop.description'] = 'Set to the key of a crop to use that crop for the manager thumbnail, instead of an dynamic thumbnail. When the crop has not yet been created, it will fallback to the dynamic thumbnail.';

$_lang['contentblocks.cropper.save_crop'] = 'Speichern';
$_lang['contentblocks.cropper.saved_crop'] = 'Gespeichert!';
$_lang['contentblocks.cropper.unsaved_crop'] = 'There are unsaved changes to the [[+cropKey]] crop. Do you want to save your changes?';
$_lang['contentblocks.cropper.resize_opts'] = 'Resize';
$_lang['contentblocks.cropper.resize_original'] = 'Original';
$_lang['contentblocks.cropper.resize_width'] = 'Change the output width of the cropped image. This may be restricted by the aspect ratio for the crop.';
$_lang['contentblocks.cropper.resize_height'] = 'Change the output height of the cropped image. This may be restricted by the aspect ratio for the crop.';
$_lang['contentblocks.cropper.aspect_ratio'] = 'Aspect Ratio';
$_lang['contentblocks.cropper.aspect_ratio.free'] = 'Free'; // free aspect ratio means no restriction on the aspect
$_lang['contentblocks.cropper.aspect_ratio.original'] = 'Original'; // Same aspect ratio as the original file
$_lang['contentblocks.cropper.aspect_ratio.1_1'] = '1:1'; // square
$_lang['contentblocks.cropper.aspect_ratio.4_3'] = '4:3';
$_lang['contentblocks.cropper.aspect_ratio.3_2'] = '3:2';
$_lang['contentblocks.cropper.aspect_ratio.16_9'] = '16:9';
$_lang['contentblocks.cropper.aspect_ratio.3_4'] = '3:4';
$_lang['contentblocks.cropper.aspect_ratio.2_3'] = '2:3';
$_lang['contentblocks.cropper.aspect_ratio.9_16'] = '9:16';
$_lang['contentblocks.cropper.advanced'] = 'Advanced'; //advanced, or manual, crop options
$_lang['contentblocks.cropper.advanced.x'] = 'Top left X';
$_lang['contentblocks.cropper.advanced.y'] = 'Top left Y';
$_lang['contentblocks.cropper.advanced.width'] = 'Width';
$_lang['contentblocks.cropper.advanced.height'] = 'Height';


// Misc
$_lang['contentblocks.use_contentblocks'] = "ContentBlocks verwenden?";
$_lang['contentblocks.use_contentblocks.description'] = "Wenn diese Einstellung aktiviert ist, wird das Inhalt-Feld von ContentBlocks ersetzt, um mehrspaltige, strukturierte Inhalte erstellen zu können.";
$_lang['contentblocks.or'] = "oder";
$_lang['contentblocks.title'] = "Titel";
$_lang['contentblocks.delete'] = "Löschen";
$_lang['contentblocks.delete_video'] = "Video löschen";
$_lang['contentblocks.move_layout_up'] = "Nach oben verschieben";
$_lang['contentblocks.move_layout_down'] = "Nach unten verschieben";
$_lang['contentblocks.delete_image'] = "Bild löschen";
$_lang['contentblocks.crop_image'] = 'Crop Image';
$_lang['contentblocks.crop_image.introduction'] = 'Create alternative sizes for your image. Select the crop to adjust below the preview, and use the drag tools to select the region and size.';
$_lang['contentblocks.crop_image.preview'] = 'Preview of the image to crop.';
$_lang['contentblocks.search_fields'] = "Felder suchen";
$_lang['contentblocks.search_layouts_templates'] = "Layouts und Templates durchsuchen";
$_lang['contentblocks.add_content'] = "Inhalt hinzufügen";
$_lang['contentblocks.add_content.introduction'] = "Bitte wählen Sie den Typ des in das Layout einzufügenden Inhalts. Bewegen Sie die Maus über den Namen, um eine ausführlichere Beschreibung anzuzeigen.";
$_lang['contentblocks.add_layout'] = "Layout hinzufügen";
$_lang['contentblocks.add_layout.introduction'] = "Bitte wählen Sie das einzufügende Layout:";
$_lang['contentblocks.upload'] = "Hochladen";
$_lang['contentblocks.choose'] = "Auswählen";
$_lang['contentblocks.from_url'] = "URL eingeben";
$_lang['contentblocks.from_url_title'] = "Bild durch Eingabe der URL einfügen";
$_lang['contentblocks.from_url_prompt'] = "Bitte geben Sie eine URL zu einem Bild ein, um es einzufügen. Dabei kann es sich entweder um die vollständige URL des Bildes auf einer anderen Website handeln oder um die relative URL ausgehend vom Document Root der Website, die Sie gerade bearbeiten. Die Datei wird auf dem Server gespeichert.";
$_lang['contentblocks.from_url_notfound'] = "Das angeforderte Bild konnte nicht heruntergeladen werden.";
$_lang['contentblocks.image.or_drop_images'] = "oder Bilder in diesen Bereich ziehen (Drag & Drop)";
$_lang['contentblocks.image.or_drop_image'] = "oder ein Bild in diesen Bereich ziehen (Drag & Drop)";
$_lang['contentblocks.use_tinyrte'] = "Soll TinyRTE verwendet werden?";
$_lang['contentblocks.use_tinyrte.description'] = "Wenn diese Einstellung aktiviert ist, wird das Eingabefeld um einen kleinen Rich-Text-Editor erweitert, der einfache Formatierungen ermöglicht (fett, kursiv und Links).";
$_lang['contentblocks.use_tinyrte.description.image'] = "Wenn diese Einstellung aktiviert ist, wird das Titel-Eingabefeld um einen kleinen Rich-Text-Editor erweitert, der einfache Formatierungen ermöglicht (fett, kursiv und Links). Falls Sie das Titel-Feld für den alt-Text oder das title-Attribut nutzen, müssen Sie den Text möglicherweise zusätzlich verarbeiten (z.B. mit htmlentities()), um zu verhindern, dass die zusätzlichen Formatierungen das img-Tag ungültig machen.";

$_lang['contentblocks.rebuild_content'] = "Inhalte neu aufbauen";
$_lang['contentblocks.rebuild_content.confirm'] = "Beim Neuaufbauen der Inhalte werden sämtliche Ressourcen aus ihren strukturierten Inhalten neu generiert. Das bedeutet, dass alle bereits genutzten Layouts und Felder neu geparst werden und der alte Inhalt überschrieben wird. Je nach der Größe Ihrer Website kann dieser Vorgang mehrere Sekunden oder mehrere Minuten in Anspruch nehmen. Um diesen Prozess zu starten, klicken Sie bitte unten auf \"Ja\".";
$_lang['contentblocks.rebuild_content.initialising'] = "Initialisierung...";
$_lang['contentblocks.rebuild_content.resources_found'] = "Es wurden insgesamt [[+total]] Ressourcen gefunden. Der Neuaufbau wird voraussichtlich [[+estimate]] Minuten dauern.";
$_lang['contentblocks.rebuild_content.loading_dependencies'] = "Lade Abhängigkeiten zum Parsen von Inhalten...";
$_lang['contentblocks.rebuild_content.loaded_dependencies'] = "Abhängigkeiten geladen, beginne mit dem Neuaufbau der Inhalte...";
$_lang['contentblocks.rebuild_content.skipping_not_allowed'] = "Überspringe #[[+id]] ([[+pagetitle]]); ContentBlocks wurde für diese Ressource deaktiviert (Typ: [[+class_key]])";
$_lang['contentblocks.rebuild_content.skipping_not_used'] = "Überspringe #[[+id]] ([[+pagetitle]]); diese Ressource verwendet ContentBlocks aktuell nicht.";
$_lang['contentblocks.rebuild_content.skipping_corrupt'] = "Überspringe #[[+id]] ([[+pagetitle]]); der Inhalt ist ungültig oder fehlt.";
$_lang['contentblocks.rebuild_content.done'] = "Fertig mit dem Neuaufbau des Contents! [[+total_rebuild]] Ressourcen wurden neu aufgebaut, [[+total_skipped]] wurden übersprungen und [[+total_skipped_broken]] wurden wegen ungültigen Inhalts übersprungen.";
$_lang['contentblocks.rebuild_content.clear_cache'] = "Löschen des Caches für die Kontext(e) [[+contexts]]";
$_lang['contentblocks.rebuild_content.clear_cache_complete'] = "Cache gelöscht. Alles erledigt!";
$_lang['contentblocks.generating_canvas'] = "Erzeuge Ihren Inhaltsbereich... Das sollte nur einen Moment dauern.";
$_lang['contentblocks.content'] = "Template-Inhalte";
$_lang['contentblocks.open_template_builder'] = "Template erstellen";
$_lang['contentblocks.template_builder'] = "Template-Generator";
$_lang['contentblocks.close_modal'] = "Modales Fenster schließen";


/**
 * Settings. Oh boy.
 */

$_lang['setting_contentblocks.accepted_resource_types'] = "Erlaubte Ressourcentypen";
$_lang['setting_contentblocks.accepted_resource_types_desc'] = "Eine kommaseparierte Liste von Schlüsseln von Ressourcen-Klassen, die ContentBlocks zu erweitern versucht.";

$_lang['setting_contentblocks.clear_cache_after_rebuild'] = "Cache nach Neuaufbau leeren";
$_lang['setting_contentblocks.clear_cache_after_rebuild_desc'] = "Wenn diese Einstellung aktiviert ist, löscht das Feature in der Komponente, das für den Neuaufbau der Inhalte zuständig ist, nach Abschluss seiner Arbeiten automatisch den Ressourcen-Cache.";

$_lang['setting_contentblocks.default_modal_view'] = "Standardansicht des modalen Fensters";
$_lang['setting_contentblocks.default_modal_view_desc'] = "Gibt an, wie Felder, Layouts und Templates im modalen Fenster angezeigt werden sollen, wenn sie zum Inhalt hinzugefügt werden. Mögliche Werte sind \"default\" (Standard), \"condensed\" (komprimiert) und \"expanded\" (erweitert).";

$_lang['setting_contentblocks.debug'] = "Debug";
$_lang['setting_contentblocks.debug_desc'] = "Wenn diese Einstellung aktiviert ist, wird ContentBlocks nicht-minifiziertes JavaScript im Manager verwenden, um das Debuggen zu erleichtern.";

$_lang['setting_contentblocks.disabled'] = "Deaktiviert";
$_lang['setting_contentblocks.disabled_desc'] = "Setzen Sie diese Einstellung auf \"Ja\", um ContentBlocks für diese Site komplett zu deaktivieren. Dies kann auf Kontext-Ebene überschrieben werden, um ContentBlocks nur in bestimmten Kontexten zu verwenden.";

$_lang['setting_contentblocks.show_resource_option'] = "Ressourcen-Option anzeigen";
$_lang['setting_contentblocks.show_resource_option_desc'] = "Wenn diese Einstellung aktiviert ist, haben Sie die Möglichkeit, ContentBlocks für einzelne Ressourcen zu aktivieren oder zu deaktivieren, und zwar mittels der zusätzlich eingeblendeten Ressourcen-Einstellung \"ContentBlocks verwenden\".";

$_lang['setting_contentblocks.canvas_position'] = "Canvas Position";
$_lang['setting_contentblocks.canvas_position_desc'] = 'Where to place the content canvas. When set to "inherit", the canvas will replace the content field in the same location. This is the recommended mode for Revolution 2.x. When set to "block", the content will be placed in a separate block below the resource tabs panel. When set to "tab1" or "tab2", the content will be placed in a Content tab at either the first or second place. If a Content tab already exists (e.g., from MoreGallery), it will place it in that tab instead of a new one.';

$_lang['setting_contentblocks.implode_string'] = "Zeichenkette, die beim Zusammenfügen eingefügt wird";
$_lang['setting_contentblocks.implode_string_desc'] = "Die Zeichen zwischen einzelnen Feld- und Layout-Ausgaben, wenn der Inhalt geparst wird (bezieht sich auf den ersten Parameter der PHP-Funktion implode()).";

$_lang['setting_contentblocks.default_layout'] = "Standard-Layout";
$_lang['setting_contentblocks.default_layout_desc'] = "Geben Sie die ID des Standard-Layouts an, das für neue Ressourcen oder solche, in denen ContentBlocks noch nicht genutzt wurde, verwendet werden soll. Ab Version 1.2 wird diese Einstellung nur verwendet, wenn kein Standard-Template gefunden wird.";

$_lang['setting_contentblocks.default_layout_part'] = "Standard-Spalte";
$_lang['setting_contentblocks.default_layout_part_desc'] = "Geben Sie die Referenz einer Spalte in dem von Ihnen festgelegten Standard-Layout an. Bei neuen Ressourcen oder solchen, in denen ContentBlocks noch nicht verwendet wurde, wird ein Feld (welches durch die Standard-Feld-Einstellung definiert wird) mit dem Inhalt in diese Spalte eingefügt. Ab Version 1.2 wird diese Einstellung nur verwendet, wenn kein Standard-Template gefunden wird.";

$_lang['setting_contentblocks.default_field'] = "Standard-Feld";
$_lang['setting_contentblocks.default_field_desc'] = "Geben Sie die ID eines Feldes an, das in die Standard-Spalte des von Ihnen definierten Standard-Layouts eingefügt werden soll. Wenn die ID auf 0 gesetzt wird, wird ein einfaches Rich-Text- oder Textarea-Feld verwendet. Ab Version 1.2 wird diese Einstellung nur verwendet, wenn kein Standard-Template gefunden wird.";

$_lang['setting_contentblocks.defaults_allowed_inputs'] = "Erlaubte Eingabetypen in Standard-Templates";
$_lang['setting_contentblocks.defaults_allowed_inputs_desc'] = "Eine kommaseparierte Liste von (Namen von) Eingabetypen, die beim Erstellen oder Bearbeiten von Standard-Templates im \"Ziel-Feld\"-Auswahlfeld verfügbar sind.";

$_lang['setting_contentblocks.code.theme'] = "Editor-Theme für Code-Eingabe";
$_lang['setting_contentblocks.code.theme_desc'] = "Das Theme, das für die Code-Eingabe in Code-Felder genutzt werden soll. In der <a href=\"https://docs.c9.io/docs/syntax-highlighting-themes\" target=\"_blank\">Ace-Dokumentation</a> erfahren Sie mehr über die möglichen Eingabewerte.";

$_lang['setting_contentblocks.image.hash_name'] = "Hash-Name";
$_lang['setting_contentblocks.image.hash_name_desc'] = "Wenn diese Einstellung aktiviert ist, werden die Namen hochgeladener Dateien gehasht, um die ursprünglichen Dateinamen zu verschleiern.";

$_lang['setting_contentblocks.image.prefix_time'] = "Zeit-Präfix";
$_lang['setting_contentblocks.image.prefix_time_desc'] = "Wenn diese Einstellung aktiviert ist, wird den Namen hochgeladener Dateien ein Unix-Zeitstempel vorangestellt.";

$_lang['setting_contentblocks.image.sanitize'] = "Dateinamen bereinigen";
$_lang['setting_contentblocks.image.sanitize_desc'] = "Wenn diese Einstellung aktiviert ist, werden die Namen hochgeladener Dateien vor dem Upload bereinigt, um sicherzustellen, dass keine problematischen Zeichen enthalten sind. Die Bereinigung unterstützt auch die Transliteration mit iconv oder mit Transliterationsbibliotheken von Fremdherstellern.";

$_lang['setting_contentblocks.image.source'] = "Medienquelle";
$_lang['setting_contentblocks.image.source_desc'] = "Wählen Sie die Medienquelle, die standardmäßig für Bild- und Galerie-Eingabetypen verwendet werden soll. Dies kann auf Feld-Ebene überschieben werden.";

$_lang['setting_contentblocks.image.upload_path'] = "Bilder-Upload-Pfad";
$_lang['setting_contentblocks.image.upload_path_desc'] = "Der Pfad innerhalb der gewählten Medienquelle, in den die Bilder hochgeladen werden sollen. Unterstützte Platzhalter sind [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] und [[+resource]]. Ressourcenfelder sind ebenfalls verfügbar, wie z.B. [[+pagetitle]] oder [[+alias]], ebenso Template-Variablen über Platzhalter nach dem Muster [[+tv.name_der_tv]]. Der hier angegebene Wert kann pro Feld überschrieben werden, indem man seine Einstellungen bearbeitet.";
$_lang['setting_contentblocks.image.crop_path'] = "Cropped Images Path";
$_lang['setting_contentblocks.image.crop_path_desc'] = "The path, within the chosen media source, where cropped images should be saved. This supports [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] and [[+resource]] placeholders. Resource fields are also available, like [[+pagetitle]] or [[+alias]], and template variables with [[+tv.name_of_tv]]. This value can be overridden per image field by editing its properties.";

$_lang['setting_contentblocks.file.upload_path'] = "Datei-Upload-Pfad";
$_lang['setting_contentblocks.file.upload_path_desc'] = "Der Pfad innerhalb der gewählten Medienquelle, in den die Dateien hochgeladen werden sollen. Unterstützte Platzhalter sind [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] und [[+resource]]. Ressourcenfelder sind ebenfalls verfügbar, wie z.B. [[+pagetitle]] oder [[+alias]], ebenso Template-Variablen über Platzhalter nach dem Muster [[+tv.name_der_tv]]. Der hier angegebene Wert kann pro Feld überschrieben werden, indem man seine Einstellungen bearbeitet.";

$_lang['setting_contentblocks.sanitize_pattern'] = "Regulärer Ausdruck zum Bereinigen";
$_lang['setting_contentblocks.sanitize_pattern_desc'] = "Ein regulärer Ausdruck, der, wenn nötig, zum Bereinigen von Dateinamen verwendet wird.";

$_lang['setting_contentblocks.sanitize_replace'] = "Ersatz-String für Bereinigung";
$_lang['setting_contentblocks.sanitize_replace_desc'] = "Eine Zeichenkette, mit der Vorkommen des RegEx-Musters bei der Bereinigung ersetzt werden.";

$_lang['setting_contentblocks.custom_icon_path'] = "Pfad für eigene Icons";
$_lang['setting_contentblocks.custom_icon_path_desc'] = "Pfad zu eigenen Icons. {assets_path} ist erlaubt.";

$_lang['setting_contentblocks.custom_icon_url'] = "URL für eigene Icons";
$_lang['setting_contentblocks.custom_icon_url_desc'] = "URL zu eigenen Icons. {assets_url} ist erlaubt.";

$_lang['setting_contentblocks.translit'] = "Transliteration";
$_lang['setting_contentblocks.translit_desc'] = "Wenn diese Einstellung auf einen Wert gesetzt wird, der nicht \"none\" oder leer ist, wird die Transliteration vor der Bereinigung der Dateinamen aktiviert, wodurch ungültige Zeichen durch erlaubte ersetzt werden. Falls dieser Wert leer ist, wird der in der Core-Systemeinstellung \"friendly_alias_translit\" festgelegte Wert übernommen.";

$_lang['setting_contentblocks.hide_logo'] = "Logo verbergen";
$_lang['setting_contentblocks.hide_logo_desc'] = "Standardmäßig zeigen wir ein kleines modmore-Logo unten rechts in der ContentBlocks-Komponente. Wenn Sie das aus irgendwelchen Gründen nicht möchten, aktivieren Sie einfach diese Einstellung und es wird ausgeblendet.";

$_lang['setting_contentblocks.translit_class'] = "Translit-Klasse";
$_lang['setting_contentblocks.translit_class_desc'] = "Der Name der Klasse, die für die Transliteration verwendet werden soll. Falls dieser Wert leer ist, wird der in der Core-Systemeinstellung \"friendly_alias_translit_class\" festgelegte Wert übernommen.";
$_lang['setting_contentblocks.translit_class_path'] = "Pfad der Translit-Klasse";
$_lang['setting_contentblocks.translit_class_path_desc'] = "Der Pfad zu der Klasse, die für die Transliteration verwendet werden soll. Falls dieser Wert leer ist, wird der in der Core-Systemeinstellung \"friendly_alias_translit_class_path\" festgelegte Wert übernommen.";

$_lang['setting_contentblocks.base_url_mode'] = "Basis-URL-Modus";
$_lang['setting_contentblocks.base_url_mode_desc'] = "Wenn Bilder hochgeladen werden, werden die URLs automatisch so normalisiert, dass sie relativ zur Basis-URL sind, um sicherzustellen, dass die Bilder sowohl im Frontend als auch im Backend angezeigt werden. Abhängig von Ihrem MODX-Setup, besonders in Multi-Kontext-Sites, müssen Sie diesen Modus möglicherweise ändern, damit Bilder im Frontend angezeigt werden. Mögliche Werte sind: <code>relative</code> (Standard: Bilder-URLs sind relativ zur MODX-Basis-URL), <code>absolute</code> (Bilder-URLs enthalten die MODX-Basis-URL) oder <code>full</code> (Bilder-URLs enthalten die komplette MODX-Site-URL)";

$_lang['setting_contentblocks.remove_content_dom'] = "Remove Content DOM";
$_lang['setting_contentblocks.remove_content_dom_desc'] = "When enabled, the previously existing content field (potentially including an enabled rich text editor) will be completely removed from the page when ContentBlocks is initialised. In some cases where the rich text editor remaining in a hidden state can cause conflicts with ContentBlocks, and enabling this option can help with that.";
