<?php
$_lang['contentblocks'] = "Content Blocks";
$_lang['contentblocks.menu'] = "Content Blocks";
$_lang['contentblocks.menu_desc'] = "Správa Content Blocks polí a rozvržení.";
$_lang['contentblocks.mgr.home'] = "Content Blocks";

$_lang['contentblocks.general'] = "Obecné";
$_lang['contentblocks.properties'] = "Vlastnosti";
$_lang['contentblocks.clear_filters'] = "Clear filters";
$_lang['contentblocks.search'] = "Search";

$_lang['contentblocks.link'] = "Odkaz";
$_lang['contentblocks.link.description'] = "Pole pro vytváření odkazů. Dokumenty, e-mailové adresy a URL jsou podporovány.";
$_lang['contentblocks.link_template.description'] = "Šablona pro odkaz. Dostupné placeholdery: <code>[[+link]]</code>, <code>[[+link_raw]]</code>, <code>[[+linkType]]</code>";
$_lang['contentblocks.link.resource'] = "Dokument";
$_lang['contentblocks.link.url'] = "URL";
$_lang['contentblocks.link.email'] = "E-mailová adresa";
$_lang['contentblocks.link.link_new_tab'] = "Otevřít v nové kartě";
$_lang['contentblocks.link.add'] = "Přidat odkaz";
$_lang['contentblocks.link.remove'] = "Odstranit odkaz";
$_lang['contentblocks.link.placeholder'] = "Začněte psát jméno dokumentu, URL nebo e-mailové adresy";
$_lang['contentblocks.link.link_detection_pattern_override'] = 'Link detection pattern override';
$_lang['contentblocks.link.link_detection_pattern_override.description'] = 'Regex pro jištění, že je odkaz platný. Pokud tomu tak nebude, přidá se přípona http://.';
$_lang['contentblocks.link.limit_to_current_context'] = 'Omezit výsledky dokumentů k aktuálnímu kontextu';
$_lang['contentblocks.link.limit_to_current_context.description'] = 'Omezení Typeahead výsledků pro dokumenty, které se nacházejí ve stejném kontextu jako stránka, která je zrovna upravována';

$_lang['setting_contentblocks.link.link_detection_pattern'] = 'Link detection pattern';
$_lang['setting_contentblocks.link.link_detection_pattern_desc'] = 'Regex pro jištění, že je odkaz platný. Pokud tomu tak nebude, přidá se přípona http://.';

$_lang['setting_contentblocks.typeahead.include_introtext'] = 'Zahrnout introtext v Typeahead';
$_lang['setting_contentblocks.typeahead.include_introtext_desc'] = 'Pokud povoleno, tak Typeahead bude obsahovat introtext každého dokumentu. Toto slouží pro více informací o daném dokumentu.';

$_lang['contentblocks.error.not_an_export'] = "Soubor se nezdá být ContentBlocks export";
$_lang['contentblocks.error.importing_row'] = "Chyba při importu řádku: ";
$_lang['contentblocks.error.no_valid_field'] = "No valid field found for request.";
$_lang['contentblocks.error.no_valid_input'] = "No valid input found for request.";
$_lang['contentblocks.error.no_snippets'] = "Žádný snippet k použití";
$_lang['contentblocks.error.missing_id'] = "Chybějící ID";
$_lang['contentblocks.error.input_not_found'] = "Vstup nebyl nalezen";
$_lang['contentblocks.error.input_not_found.message'] = "Ups. Pole s typem “[[+input]]” bylo nahráno, ale bohužel tento typ neexistuje.";
$_lang['contentblocks.error.field_not_found'] = "Pole nebylo nalezeno";
$_lang['contentblocks.error.category_not_found'] = "Category not found";
$_lang['contentblocks.error.layout_not_found'] = "Rozvržení nebylo nalezeno";
$_lang['contentblocks.error.error_saving_object'] = "Chyba při ukládání objektu";
$_lang['contentblocks.error.xml_not_loaded'] = "Nelze načíst soubor XML";
$_lang['contentblocks.error.no_icons'] = "Nelze otevřít adresář s ikonami pro čtení";
$_lang['contentblocks.error.no_json'] = "Váš prohlížeč nepodporuje JSON, který je nutný pro ContentBlocks. Aktualizujte váš prohlížeč.";

$_lang['contentblocks.availability'] = "Dostupnost";
$_lang['contentblocks.availability.layout_description'] = "Ve výchozím nastavení jsou rozvržení vždy k dispozici. Pokud přidáte níže uvedené podmínky, tak budou k dispozici jen když je splněna jedna z podmínek. Více platných hodnot oddělte čárkou.";
$_lang['contentblocks.availability.field_description'] = "Ve výchozím nastavení jsou pole vždy k dispozici. Pokud přidáte níže uvedené podmínky, tak budou k dispozici jen když je splněna jedna z podmínek. Více platných hodnot oddělte čárkou.";
$_lang['contentblocks.availability.template_description'] = "Ve výchozím nastavení jsou šablony vždy k dispozici. Pokud přidáte níže uvedené podmínky, tak budou k dispozici jen když je splněna jedna z podmínek. Více platných hodnot oddělte čárkou.";
$_lang['contentblocks.add_condition'] = "Přidat podmínku";
$_lang['contentblocks.edit_condition'] = "Upravit podmínku";
$_lang['contentblocks.delete_condition'] = "Odstranit podmínku";
$_lang['contentblocks.delete_condition.confirm'] = "Jste si jisti, že chcete odstranit tuto podmínku?";
$_lang['contentblocks.condition_field'] = "Pole";
$_lang['contentblocks.condition_field.resource'] = "Dokument ID";
$_lang['contentblocks.condition_field.parent'] = "Rodič ID";
$_lang['contentblocks.condition_field.ultimateparent'] = "Ultimate Parent ID";
$_lang['contentblocks.condition_field.class_key'] = "Class Key";
$_lang['contentblocks.condition_field.context'] = "Kontext";
$_lang['contentblocks.condition_field.template'] = "Šablona (ID)";
$_lang['contentblocks.condition_field.usergroup'] = "Skupina uživatelů (jméno)";
$_lang['contentblocks.condition_value'] = "Hodnoty";
$_lang['contentblocks.availibility.layouts'] = "Rozvržení";
$_lang['contentblocks.availibility.layouts.description'] = "Omezte použití tohoto pole v jednom nebo více rozvržení (oddělené čárkou). Pokud pole ponecháte prázdné, toto pole je k dispozici u všech rozvržení. Jinak je omezen na ty, které zadáte.";
$_lang['contentblocks.availibility.times_per_page'] = "Počet na stránku";
$_lang['contentblocks.availibility.times_per_page.description'] = "Omezte počet využití, kolikrát se může zobrazit na stránce. Ponechte prázdné pro žádné omezení.";
$_lang['contentblocks.availibility.times_per_layout'] = "Počet na rozvržení";
$_lang['contentblocks.availibility.times_per_layout.description'] = "Omezte počet využití, kolikrát se může zobrazit na rozvržení. Ponechte prázdné pro žádné omezení.";
$_lang['contentblocks.availibility.only_nested'] = "Povolit pouze jako vnořené rozvržení";
$_lang['contentblocks.availibility.only_nested.description'] = "Zakázat rozvržení užívat mimo pole rozvržení.";


$_lang['contentblocks.field_desc'] = "Pole jsou páteří ContentBlocks - určují, kolik <em>Creative Feedom</em> dáte editorům v řízení jejich obsahu. Každé pole obsahuje vstup a šablonu, která určuje, jak je zobrazen na front-endu. Pro další informace o použití polí, zmáčkněte tlačítko Nápověda v horní pravé straně obrazovky.";
$_lang['contentblocks.add_field'] = "Přidat pole";
$_lang['contentblocks.edit_field'] = "Upravit pole";
$_lang['contentblocks.duplicate_field'] = "Duplikovat pole";
$_lang['contentblocks.delete_field'] = "Odstranit pole";
$_lang['contentblocks.delete_field.confirm'] = "Jste si jisti, že chcete odstranit toto pole? Jakýkoli obsah, který používá toto pole může být ovlivněn.";
$_lang['contentblocks.delete_field.confirm.js'] = "Jste si jisti, že chcete odstranit toto pole?";
$_lang['contentblocks.delete_field.is_default'] = "This field cannot be removed because it is configured as the default field. This is set up with the <code>contentblocks.default_field</code> system setting. For more information on setting up default content, see the <a href=\"https://docs.modmore.com/en/ContentBlocks/v1.x/Default_Templates.html\" target=\"_blank\">Default Templates documentation</a>.";
$_lang['contentblocks.export_field'] = "Exportovat pole";
$_lang['contentblocks.export_fields'] = "Exportovat";
$_lang['contentblocks.export_fields.confirm'] = "Po klepnutí na tlačítko Ano, připravíme XML export všech polí. Slouží k pozdějšímu importu polí nebo k použití v jiné instalaci. Generování XML může trvat několik sekund v závislosti na počtu polí, které jste si nakonfigurovali.";
$_lang['contentblocks.import_fields'] = "Importovat";
$_lang['contentblocks.import_fields.title'] = "Importovat pole";
$_lang['contentblocks.import_fields.intro'] = "Nahráním souboru XML a výběrem správného importního módu, můžete importovat pole, které jste exportovali z této nebo jiné stránky. <b>Opatrně</b> s importem polí, pokud máte obsah vytvořený pomocí aktuálních polí. Pokud si nejste jisti jaký režim použít v importu, kontaktujte prosím support@modmore.com.";

$_lang['contentblocks.layout_desc'] = "Každé rozvržení je v podstatě vodorovný řádek, skládající se z jednoho nebo více sloupců. Při úpravách dokumentů, všechny sloupce jsou prázdné s tlačítkem přidat obsah (pomocí polí). Pro další informace o používání rozvržení správně, zmáčkněte tlačítko Nápověda v horní pravé straně obrazovky.";
$_lang['contentblocks.add_layout'] = "Přidat rozvržení";
$_lang['contentblocks.repeat_layout'] = "Opakovat rozložení";
$_lang['contentblocks.switch_layout'] = "Switch Layout";
$_lang['contentblocks.switch_layout.chooser.introduction'] = "Choose the Layout to switch to. After selecting a layout, you'll be able to assign fields to the new layout's columns.";
$_lang['contentblocks.switch_layout.introduction'] = "Drag and drop the fields below to assign them to desired columns in the new layout. All fields must be assigned to a column before saving.";
$_lang['contentblocks.cb_unassigned_fields'] = "Unassigned Fields";
$_lang['contentblocks.unassigned_layout_settings'] = "Unassigned Layout Settings";
$_lang['contentblocks.unassigned_layout_settings.introduction'] = "These settings do not exist in the new layout, and their values will not be retained.";
$_lang['contentblocks.edit_layout'] = "Upravit rozložení";
$_lang['contentblocks.duplicate_layout'] = "Duplikovat rozložení";
$_lang['contentblocks.export_layout'] = "Exportovat rozvržení";
$_lang['contentblocks.delete_layout'] = "Odstranit rozložení";
$_lang['contentblocks.delete_layout.confirm'] = "Jste si jisti, že chcete odstranit toto rozvržení? Jakýkoli obsah, který používá toto rozvržení může být ovlivněn.";
$_lang['contentblocks.delete_layout.confirm.js'] = "Opravdu chcete odstranit toto [[+layoutName]] rozvržení? budete-li pokračovat, veškerý její obsah bude s ním odstraněn.";
$_lang['contentblocks.delete_layout.is_default'] = "This layout cannot be removed because it is configured as the default layout. This is set up with the <code>contentblocks.default_layout</code> system setting. For more information on setting up default content, see the <a href=\"https://docs.modmore.com/en/ContentBlocks/v1.x/Default_Templates.html\" target=\"_blank\">Default Templates documentation</a>.";
$_lang['contentblocks.export_layouts'] = "Exportovat";
$_lang['contentblocks.export_layouts.confirm'] = "Po klepnutí na tlačítko Ano, připravíme XML export všechny rozvržení. Slouží k pozdějšímu importu rozvržení nebo k použití v jiné instalaci. Generování XML může trvat několik sekund v závislosti na počtu rozvržení, které jste si nakonfigurovali.";
$_lang['contentblocks.import_layouts'] = "Importovat";
$_lang['contentblocks.import_layouts.title'] = "Importovat rozložení";
$_lang['contentblocks.import_layouts.intro'] = "Nahráním souboru XML a výběrem správného importního módu, můžete importovat rozvržení, které jste exportovali z této nebo jiné stránky. <b>Opatrně</b> s importem rozvržení, pokud máte obsah vytvořený pomocí aktuálních rozvržení. Pokud si nejste jisti jaký režim použít v importu, kontaktujte prosím support@modmore.com.";

$_lang['contentblocks.layout_settings'] = "Nastavení rozložení";
$_lang['contentblocks.layout_settings.modal_header'] = "[[+jméno]] Nastavení";

$_lang['contentblocks.field_settings'] = "Nastavení obsahu";
$_lang['contentblocks.field_settings.modal_header'] = "[[+jméno]] Nastavení";

$_lang['contentblocks.add_layoutcolumn'] = "Přidat sloupec";
$_lang['contentblocks.edit_layoutcolumn'] = "Upravit sloupec";
$_lang['contentblocks.delete_layoutcolumn'] = "Odstranit sloupec";
$_lang['contentblocks.delete_layoutcolumn.confirm'] = "Jste si jisti, že chcete odstranit tento sloupec? Jakýkoli obsah, který používá tento sloupec může být ovlivněn.";
$_lang['contentblocks.add_setting'] = "Přidat nastavení";
$_lang['contentblocks.edit_setting'] = "Upravit nastavení";
$_lang['contentblocks.duplicate_setting'] = "Duplicate Setting";
$_lang['contentblocks.delete_setting'] = "Odstranit nastavení";
$_lang['contentblocks.delete_setting.confirm'] = "Jste si jisti, že chcete odstranit toto nastavení?";

$_lang['contentblocks.defaults'] = 'Výchozí hodnoty';
$_lang['contentblocks.defaults.intro'] = 'S výchozím nastavením můžete nakonfigurovat, jak se spravují dokumenty, které dosud nebyly upraveny s ContentBlocks (například nové dokumenty, nebo stránky, které existovaly před instalací ContentBlocks). To funguje tak, že při analýze definovaných výchozích pravidel, které jsou definovaná níže. Ty jsou vyhodnoceny od shora dolů, pokud je nalezena shoda, tak se vloží definovaná šablona.';
$_lang['contentblocks.constraint_field'] = 'Omezení pole';
$_lang['contentblocks.constraint_value'] = 'Hodnota omezení';
$_lang['contentblocks.default_template'] = 'Výchozí šablona';
$_lang['contentblocks.target_layout'] = 'Cílové rozvržení';
$_lang['contentblocks.target_field'] = 'Cílové pole';
$_lang['contentblocks.target_column'] = 'Cílový sloupec';
$_lang['contentblocks.add_default'] = 'Přidat výchozí pravidlo';
$_lang['contentblocks.edit_default'] = 'Upravit výchozí pravidlo';
$_lang['contentblocks.delete_default'] = 'Odstranit výchozí pravidlo';
$_lang['contentblocks.delete_default.confirm'] = 'Jste si jisti, že chcete odstranit toto výchozí pravidlo?';


$_lang['contentblocks.start_import'] = "Spustit Import";
$_lang['contentblocks.import_file'] = "Soubor";
$_lang['contentblocks.import_mode'] = "Importní režim";
$_lang['contentblocks.import_mode.insert'] = "Vloženo: ponechat stávající [[+what]] a přidat importované data";
$_lang['contentblocks.import_mode.overwrite'] = "Přepsat: nechat stávající [[+what]], ale přepsat je, pokud mají stejné ID";
$_lang['contentblocks.import_mode.replace'] = "Nahradit: nejprve odebrat všechny aktuální [[+what]] a poté importovat nové řádky.";

$_lang['contentblocks.id'] = "ID";
$_lang['contentblocks.field'] = "Pole";
$_lang['contentblocks.fields'] = "Pole";
$_lang['contentblocks.layout'] = "Rozložení";
$_lang['contentblocks.layout.description'] = "Wrapper pro pole";
$_lang['contentblocks.layouts'] = "Rozvržení";
$_lang['contentblocks.layoutcolumn'] = "Sloupec";
$_lang['contentblocks.layoutcolumns'] = "Sloupce";
$_lang['contentblocks.setting'] = "Nastavení";
$_lang['contentblocks.settings'] = "Nastavení";
$_lang['contentblocks.settings.layout_description'] = "Nastavení jsou uživatelské vlastnosti, které mohou být vylepšení když rozvržení bylo přidáno do obsahu. Hodnoty nastavení jsou pak v šabloně k dispozici jako placeholdery, například [[+třída]] pro nastavení s odkazem \"třída\".";
$_lang['contentblocks.settings.field_description'] = "Nastavení jsou uživatelské vlastnosti, které mohou být vylepšeny, když pole byla přidána do obsahu klepnutím na ikonu zubaté kolečko v horní vpravo od pole. Hodnoty nastavení jsou pak v šabloně k dispozici jako zástupné symboly, například [[+třída]] pro nastavení s odkazem \"třída\".";
$_lang['contentblocks.input'] = "Typ pole";
$_lang['contentblocks.inputs'] = "Typy pole";
$_lang['contentblocks.name'] = "Název";
$_lang['contentblocks.columns'] = "Sloupce";
$_lang['contentblocks.columns.description'] = "Sloupce definují zobrazení rozvržení v manažeru, kde šířka je definována jako procentuální podíl. Reference se používá pro placeholder, který můžete použít v šabloně.";
$_lang['contentblocks.sortorder'] = "Pořadí řazení";
$_lang['contentblocks.icon'] = "Ikona";
$_lang['contentblocks.description'] = "Popis";
$_lang['contentblocks.template'] = "Šablona";
$_lang['contentblocks.template.description'] = "Šablona pro rozvržení má několik dostupných placeholderů, podle sloupců a nastavení, které definujete pomocí karet na levé straně.";
$_lang['contentblocks.width'] = "Šířka";
$_lang['contentblocks.width.description'] = "Šířka pole (v procentech), které v tomto poli dostane. Pole jsou zarovnány vlevo, takže si můžete vytvořit některá základní rozvržení s touto možností.";
$_lang['contentblocks.save'] = "Uložit";
$_lang['contentblocks.reference'] = "Reference";
$_lang['contentblocks.default_value'] = "Výchozí hodnota";
$_lang['contentblocks.fieldtype'] = "Typ pole";
$_lang['contentblocks.fieldtype.select'] = "Select";
$_lang['contentblocks.fieldtype.radio'] = "Radio možnosti";
$_lang['contentblocks.fieldtype.checkbox'] = "Checkbox možnosti";
$_lang['contentblocks.fieldtype.textfield'] = "Text";
$_lang['contentblocks.fieldtype.link'] = "Odkaz";
$_lang['contentblocks.fieldtype.textarea'] = "Textarea";
$_lang['contentblocks.fieldtype.richtext'] = "Rich text";
$_lang['contentblocks.fieldtype.image'] = "Image";
$_lang['contentblocks.fieldoptions'] = "Možnosti pole";
$_lang['contentblocks.fieldoptions.description'] = "Used for Select field types only. Define available values as \"placeholder_value==Displayed Value\" (\"Displayed Value=placeholder_value\" is also supported, but will be removed in 2.0), one per line. If you only pass a single value per line (such as \"foo\"), that will be used as both displayed and placeholder value.";
$_lang['contentblocks.field_is_exposed'] = "Zobrazit pole";
$_lang['contentblocks.field_is_exposed.description'] = "Zobrazit pole na rozvržení místo až po klepnutí na ikonu nastavení";
$_lang['contentblocks.field_is_exposed.modal'] = "Zobrazit nastavení pole v modálním okně";
$_lang['contentblocks.field_is_exposed.exposedassetting'] = "Zobrazit pole na rozvržení jako nastavení";
$_lang['contentblocks.field_is_exposed.exposedasfield'] = "Zobrazit pole na rozvržení jako běžné pole";
$_lang['contentblocks.process_tags'] = "Process tags";
$_lang['contentblocks.process_tags.description'] = "When enabled, tags in the input options will be processed with the MODX parser before being used.";

$_lang['contentblocks.directory'] = 'Adresář';
$_lang['contentblocks.directory.description'] = 'A subfolder within the media source (whether overridden or using the ContentBlocks system setting) where files should be uploaded to.';
$_lang['contentblocks.crops'] = 'Crops';
$_lang['contentblocks.crops.description'] = 'A definition of crops to allow for the image. Each unique crop is separated by a pipe symbol (|) and contains a name, followed by a colon (:), and then comma-separated options. Each option has a name and a value. For example, this is a valid crops definition with some options: <code>small:width=200,height=200,aspect=1|medium:width=500,aspect=0.7|large:height=750</code>';
$_lang['contentblocks.crop_directory'] = 'Crops Directory';
$_lang['contentblocks.crop_directory.description'] = 'A subfolder within the media source (whether overridden or using the ContentBlocks system setting) that will contain crops created for images.';
$_lang['contentblocks.open_crops_automatically'] = 'Open cropper automatically';
$_lang['contentblocks.open_crops_automatically.description'] = 'When enabled, the cropper will be immediately opened after adding an image to the field.';
$_lang['contentblocks.file_types'] = 'Povolené přípony souborů';
$_lang['contentblocks.file_types.description'] = 'Bude možné odeslat soubory s těmito příponami (oddělené čárkami). Pro žádné omezení ponechte pole prázdné.';
$_lang['contentblocks.file_types.disallowed'] = 'Tento typ souboru není povolen v tomto poli';

// Categories
$_lang['contentblocks.category'] = "Category";
$_lang['contentblocks.categories'] = "Categories";
$_lang['contentblocks.categories.intro'] = "Use Categories to better organise your Fields, Layouts and Templates. When assigned to an element, the Add Content and Add Layout modals will show categorized items first, followed by an \"Uncategorized\" category.";
$_lang['contentblocks.uncategorized'] = "Uncategorized";
$_lang['contentblocks.add_category'] = "Add Category";
$_lang['contentblocks.edit_category'] = "Edit Category";
$_lang['contentblocks.duplicate_category'] = "Duplicate Category";
$_lang['contentblocks.delete_category'] = "Delete Category";
$_lang['contentblocks.delete_category.confirm'] = "Are you sure you want to delete this Category? Any elements that currently use the category will be set to uncategorized instead.";
$_lang['contentblocks.delete_category.confirm.js'] = "Are you sure you want to delete this Category?";
$_lang['contentblocks.export_category'] = "Export Category";
$_lang['contentblocks.export_categories'] = "Export";
$_lang['contentblocks.export_categories.confirm'] = "After clicking Yes below, we will prepare an XML export of all Categories. This can be used to import the Categories later or in a different installation. Generating the XML should only take a few seconds.";
$_lang['contentblocks.import_categories'] = "Import";
$_lang['contentblocks.import_categories.title'] = "Import Categories";
$_lang['contentblocks.import_categories.intro'] = "By uploading an XML file and choosing the right import mode, you can import Categories you exported before or from a different site. <b>Be careful</b> with importing Categories if you have content using the current fields already. Please contact support@modmore.com if you are unsure about what mode to use in the import.";


// Templates
$_lang['contentblocks.templates'] = 'Šablony';
$_lang['contentblocks.templates_desc'] = 'Šablony jsou předdefinované sady rozvržení a polí, která lze použít jako zástupce pro přidávání obsahu. ';
$_lang['contentblocks.add_template'] = 'Přidat šablonu';
$_lang['contentblocks.edit_template'] = 'Upravit šablonu';
$_lang['contentblocks.duplicate_template'] = 'Duplikovat šablonu';
$_lang['contentblocks.export_template'] = 'Exportovat šablonu';
$_lang['contentblocks.export_templates'] = 'Exportovat šablony';
$_lang['contentblocks.import_templates'] = 'Importovat šablony';
$_lang['contentblocks.import_templates.title'] = 'Importovat šablony';
$_lang['contentblocks.import_templates.intro'] = 'Nahráním XML souboru a volba správného importního módu, můžete importovat šablony, které byly exportovány z této nebo jiné stránky. <b>Poznámka:</b> Šablony obsahují odkazy na pole a ID rozvržení; Při importu šablony, budete pravděpodobně potřebovat importovat rozvržení a pole.';
$_lang['contentblocks.delete_template'] = 'Odstranit šablonu';
$_lang['contentblocks.delete_template.confirm'] = 'Jste si jisti, že chcete odstranit tuto šablonu?';


// Input types
$_lang['contentblocks.chunk'] = "Chunk";
$_lang['contentblocks.chunk.description'] = "Definujte chunk, který má být vložen do obsahu.";
$_lang['contentblocks.chunk.choose_chunk'] = "Vyber chunk";
$_lang['contentblocks.chunk.choose_chunk.description'] = "Vyberte chunk, který má být vložen.";
$_lang['contentblocks.chunk_template.description'] = "Šablona pro chunk. Dostupné znaky: <code>[[+tag]]</code>, <code>[[+chunk_name]]</code>";
$_lang['contentblocks.chunk.custom_preview'] = "Vlastní náhled";
$_lang['contentblocks.chunk.custom_preview.description'] = "Ve výchozím nastavení toto pole zůstane prázdné, vstup chunku načte skutečný chunk a to zobrazit jako náhled. Pokud chcete, můžete přepsat tento náhled zadáním kódu HTML pro náhled zde.";
$_lang['contentblocks.chunk.no_chunk_set'] = "Ups. Chunk nebyl definován pro toto pole.";

$_lang['contentblocks.chunkselector'] = 'Vybrat chunk';
$_lang['contentblocks.chunk_selector_template.description'] = 'Šablona pro chunk. Dostupné znaky: <code>[[+value]]</code> (obsahuje úplný chunk tag), <code>[[+chunk_name]]</code> (obsahuje jméno vybraného chunku)';
$_lang['contentblocks.chunkselector.description'] = 'Vyberte Chunk k zobrazení';
$_lang['contentblocks.chunkselector.available_chunks'] = "Jméno nebo ID povolených chunků (volitelné)";
$_lang['contentblocks.chunkselector.available_chunks.description'] = "Chcete-li omezit dostupné chunky pro editory, zadejte seznam jmen nebo ID chunků, které jsou oddělené čárkami. Chunky v tomto seznamu budou vždy k dispozici, bez ohledu na jiné vlastnosti, které jsou definovány níže.";
$_lang['contentblocks.chunkselector.available_categories'] = "Kategorie";
$_lang['contentblocks.chunkselector.available_categories.description'] = "Zadejte seznam názvů kategorií nebo ID k omezení dostupných chunků.";

$_lang['contentblocks.code'] = "Kód";
$_lang['contentblocks.code.description'] = "Zobrazí textarea s zvýrazňováním kódu.";
$_lang['contentblocks.code_template.description'] = "Hodnota kódu je uložen v placeholderu <code>[[+hodnota]]</code>. Podle předpokládaného používání tohoto pole, by jen přidat placeholder do šablony, nebo by byl enkódován pro zobrazení namísto spuštění (např. tím, že dělá <code>&lt;pre&gt;&lt;code&gt; [[+hodnota:htmlent]]&lt;/code&gt;&lt;/pre&gt;). Zástupný symbol <code>[[+lang]]</code> obsahuje vybraný jazyk v rozevíracím seznamu.";
$_lang['contentblocks.code.available_languages'] = "Dostupné jazyky";
$_lang['contentblocks.code.available_languages.description'] = "Zadejte čárkami oddělený seznam <code>hodnota=zobrazit</code> položek s dostupnými jazyky pro zvýrazňování syntaxe. Pokud je zadán pouze jeden jazyk, bude rovnou vybrán a rozevírací seznam jazyků se skryje.";
$_lang['contentblocks.code.default_language'] = "Výchozí jazyk";
$_lang['contentblocks.code.default_language.description'] = "Výchozí jazyk.";
$_lang['contentblocks.code.language'] = "Jazyk";
$_lang['contentblocks.code.entities'] = "Kódovat entity?";
$_lang['contentblocks.code.entities.description'] = "Když povoleno, tak zadaný kód bude mít entity a MODX tagy enkódovat pro zobrazení kódu.";

$_lang['contentblocks.file'] = 'Soubor';
$_lang['contentblocks.file.description'] = 'Přidejte soubory pro propojení';
$_lang['contentblocks.file_template.description'] = 'Platné placeholdery jsou <code>[[+url]]</code>, <code>[[+title]]</code>, <code>[[+size]]</code> (v bajtech), <code>[[+upload_date]]</code> a <code>[[+extension]]</code>';
$_lang['contentblocks.file.remove_file'] = 'Odstranit soubor';
$_lang['contentblocks.file.file.or_drop_files'] = 'nebo sem přetáhněte soubory';
$_lang['contentblocks.file.max_files'] = 'Maximální počet souborů';
$_lang['contentblocks.file.max_files.description'] = 'Definuje maximální počet povolených souborů pro jedno nahrávací pole. Další soubory nad limit budou odmítnuty.';
$_lang['contentblocks.file.max_files.reached'] = 'Lituji, nemůžete použít více než [[+max]] souborů v této sekci.';
$_lang['contentblocks.file.directory'] = 'Adresář';
$_lang['contentblocks.file.directory.description'] = 'Podsložka ve zdroji médií (ať už přepsána nebo pomocí nastavení ContentBlocks systému)';
$_lang['contentblocks.file.file_types'] = 'Povolené přípony souborů';
$_lang['contentblocks.file.file_types.description'] = 'Bude možné odeslat soubory s těmito příponami (oddělené čárkami). Pokud nechcete žádná omezení ponechte pole prázdné.';
$_lang['contentblocks.file.file_types.disallowed'] = 'Typ souboru není povolen v tomto poli';
$_lang['contentblocks.file.choose_file'] = 'Zvolte soubor';
$_lang['contentblocks.file.wrapper_template.description'] = "Outer most template for link lists. This should probably contain a <code>&lt;ul&gt;</code> tag. Available placeholder: <code>[[+files]]</code> (list items templated with the other template).";


$_lang['contentblocks.gallery'] = "Galerie";
$_lang['contentblocks.gallery.description'] = "Jednoduchá galerie představuje snadné odesílání více obrázků přetažením, řazení a přidávání názvů.";
$_lang['contentblocks.gallery_template.description'] = "Slouží k obalení jednotlivých obrázků. Dostupné znaky: <code>[[+url]]</code> (úplný odkaz na obrázek), <code>[[+title]]</code> (zadaný název obrázku), <code>[[+size]]</code>, <code>[[+extension]]</code>";
$_lang['contentblocks.gallery_wrapper_template.description'] = "Používá se pro obalení všech obrázků (jako kontejner). Dostupný placeholder: <code>[[+images]]</code>";
$_lang['contentblocks.gallery_max_images.description'] = "Definuje maximální počet povolených obrázků na galerii. Další obrázky nad limit budou odmítnuty.";
$_lang['contentblocks.gallery.thumb_size'] = "Velikost Thumbnailu";
$_lang['contentblocks.gallery.thumb_size.description'] = "Vyberte si jednu z možností, jak malé/velké miniatury budou zobrazeny v obsahu.";
$_lang['contentblocks.gallery.thumb_size.small'] = "Malé";
$_lang['contentblocks.gallery.thumb_size.medium'] = "Střední";
$_lang['contentblocks.gallery.thumb_size.large'] = "Velký";
$_lang['contentblocks.gallery.show_description'] = "Zobrazit popis";
$_lang['contentblocks.gallery.show_description.description'] = "Zobrazením popisu umožníte editorům přidávat delší popisy ke každému obrázku.";
$_lang['contentblocks.gallery.show_link_field'] = "Zobrazit pole Odkaz";
$_lang['contentblocks.gallery.show_link_field.description'] = "Zobrazit odkaz pole, aby mohly být obrázky odkazovány na dokument nebo externí stránku.";

$_lang['contentblocks.heading'] = "Nadpis";
$_lang['contentblocks.heading.description'] = "Kombinace select pole pro úroveň nadpisu a textfield.";
$_lang['contentblocks.heading_template.description'] = "Šablona pro pole nadpisů. Dostupné placeholdery jsou <code>[[+level]]</code> (hodnota úrovně nadpisu) a <code>[[+value]]</code> (text).";
$_lang['contentblocks.default_level'] = "Výchozí úroveň";
$_lang['contentblocks.available_levels'] = "Dostupné úrovně";
$_lang['contentblocks.heading_default_level.description'] = "Hodnota, která by měla být vybrána ve výchozím nastavení nového nadpisu.";
$_lang['contentblocks.heading_available_levels.description'] = "Seznam položek, oddělených čárkami, <code>hodnota=zobrazit</code> dostupných úrovní. Pro zobrazenou hodnotu lexikonu předpona <code>contentblocks.</code> je kontrolována a pokud je k dispozici. Příklad: <code>h1=heading_1, h2=druhá úrovň,h3=heading_3</code>";
$_lang['contentblocks.heading_1'] = "Nadpis 1";
$_lang['contentblocks.heading_2'] = "Nadpis 2";
$_lang['contentblocks.heading_3'] = "Nadpis 3";
$_lang['contentblocks.heading_4'] = "Nadpis 4";
$_lang['contentblocks.heading_5'] = "Nadpis 5";
$_lang['contentblocks.heading_6'] = "Nadpis 6";

$_lang['contentblocks.hr'] = "Vodorovná linka";
$_lang['contentblocks.hr.description'] = "Jednoduchý placeholder pro <hr> tag, vloží vodorovnou čáru.";
$_lang['contentblocks.hr_template.description'] = "Jak zobrazit vodorovný řádek. Žádné placeholdery nejsou k dispozici, ale je doporučeno používat značku <code>&lt;hr&gt;</code>.";

$_lang['contentblocks.image'] = "Obrázek";
$_lang['contentblocks.image.description'] = "Typ pole pro nahrání nebo výběru obrázku.";
$_lang['contentblocks.image.source'] = "Přepsání zdroje médií";
$_lang['contentblocks.image.source.description'] = "Můžete používat základní nastavení zdrojů médií, nebo zvolte konkrétní zdroj médií pro přepsání tohoto pole.";
$_lang['contentblocks.image_template.description'] = "Šablona pro obrázek. Měl pravděpodobně obsahovat značku <code>&lt;img&gt;</code>. Dostupné placeholdery: <code>[[+url]]</code>, <code>[[+size]]</code>, <code>[[+width]]</code>, <code>[[+height]]</code>, <code>[[+extension]]</code>";
$_lang['contentblocks.imagewithtitle'] = "Obrázek s nadpisem";
$_lang['contentblocks.imagewithtitle.description'] = "Stejně jako obrázek, ale tentokrát s textfield pro přidání atributu alt nebo title.";
$_lang['contentblocks.image_with_title'] = "Image with Title";
$_lang['contentblocks.image_with_title_template.description'] = "Šablona pro obrázek. Měl pravděpodobně obsahovat značku <code>&lt;img&gt;</code>. Dostupné placeholdery: <code>[[+url]]</code>, <code>[[+title]]</code>, <code>[[+size]]</code>, <code>[[+width]]</code>, <code>[[+height]]</code>, <code>[[+extension]]</code>";

$_lang['contentblocks.list'] = "Seznam";
$_lang['contentblocks.condensed_list'] = 'Condensed List';
$_lang['contentblocks.list.description'] = "Typ pole pro snadnou stavbu (vnořených) neuspořádaných seznamů.";
$_lang['contentblocks.list_template.description'] = "Template for individual list items. This should probably contain a <code>&lt;li&gt;</code> tag. Available placeholders: <code>[[+value]]</code> (the list item text), <code>[[+idx]]</code> (an incrementing item number, starting at 1 on each level) and <code>[[+items]]</code> (sub-lists, templated with the other templates).";
$_lang['contentblocks.list_wrapper_template.description'] = "Outer most template for lists. This should probably contain a <code>&lt;ul&gt;</code> tag. Available placeholder: <code>[[+items]]</code> (list items templated with the other templates).";
$_lang['contentblocks.list_nested_template.description'] = "Inner template for indented sub-lists. This should probably contain a <code>&lt;ul&gt;</code> tag. Available placeholder: <code>[[+items]]</code> (list items templated with the other templates).";

$_lang['contentblocks.orderedlist'] = "Seřazený seznam";
$_lang['contentblocks.orderedlist.description'] = "Same as the List type, except with an ordered list instead.";
$_lang['contentblocks.ordered_list'] = "Ordered List";
$_lang['contentblocks.ordered_list_template.description'] = "Template for individual list items. This should probably contain a <code>&lt;li&gt;</code> tag. Available placeholders: <code>[[+value]]</code> (the list item text), <code>[[+idx]]</code> (an incrementing item number, starting at 1 on each level) and <code>[[+items]]</code> (sub-lists, templated with the other templates).";
$_lang['contentblocks.ordered_list_wrapper_template.description'] = "Outer most template for ordered lists. This should probably contain a <code>&lt;ol&gt;</code> tag. Available placeholder: <code>[[+items]]</code> (list items templated with the other templates).";
$_lang['contentblocks.ordered_list_nested_template.description'] = "Inner template for indented sub-lists. This should probably contain a <code>&lt;ol&gt;</code> tag. Available placeholder: <code>[[+items]]</code> (list items templated with the other templates).";

$_lang['contentblocks.quote'] = "Citát";
$_lang['contentblocks.quote.description'] = "Textarea field combined with a small textfield for quote citations.";
$_lang['contentblocks.quote_template.description'] = "Template for the quote, should probably included a <code>&lt;blockquote&gt;</code> and <code>&lt;cite&gt;</code> tag. Available placeholders: <code>[[+value]]</code> (the quote input) and <code>[[+cite]]</code> (the small author input).";
$_lang['contentblocks.quote.author'] = "Autor";

$_lang['contentblocks.repeater'] = "Repeater";
$_lang['contentblocks.repeater.description'] = "Allows you to define a group of fields, that the editor can then repeat as a group.";
$_lang['contentblocks.repeater_template.description'] = "The template for each individual row in the repeater. There is no default as it completely depends on your groups configuration! For each of the Fields you define, you also need to set a key. The repeater will first parse all of the defined fields through their own processor (so an image field is first parsed as if it were a standalone image field), and the result of that is set into the placeholder based on the key. Please consult the documentation at modmore.com for a more in-depth instruction of how the repeater field works. Also supports a <code>[[+idx]]</code> placeholder.";
$_lang['contentblocks.repeater.width'] = "Šířka (v %)";
$_lang['contentblocks.repeater.key'] = "Klíč";
$_lang['contentblocks.repeater.key.description'] = "The key by which the value of this field are available in the Repeater template. ";
$_lang['contentblocks.repeater.group'] = "Skupina";
$_lang['contentblocks.repeater.group.description'] = "The Repeater field lets you repeat a group of fields. This is where you define the fields that are repeated.";
$_lang['contentblocks.repeater.max_items'] = "Maximální počet položek";
$_lang['contentblocks.repeater.max_items.description'] = "Když je nastaveno číslo větší než 0, nad tuto hranici nelze přidat další řádky.";
$_lang['contentblocks.repeater.max_items_reached'] = "Promiňte, nejste oprávněni přidat více než [[+max]] položek.";
$_lang['contentblocks.repeater.min_items'] = "Maximální počet položek";
$_lang['contentblocks.repeater.min_items.description'] = "Když nastaveno číslo větší než 0, řádky nelze odstranit nad tento limit.";
$_lang['contentblocks.repeater.add_first_item'] = "Automatically add first item";
$_lang['contentblocks.repeater.add_first_item.description'] = "When enabled the Repeater will automatically get a first item added if there are none added yet.";
$_lang['contentblocks.repeater.add_item'] = "Přidat položku";
$_lang['contentblocks.repeater.delete_item'] = "Odstranit položku";
$_lang['contentblocks.repeater.wrapper_template.description'] = "Outer template to wrap all other parsed rows in. Should contain the <code>[[+rows]]</code> placeholder, can also contain <code>[[+total]]</code>, .";
$_lang['contentblocks.repeater.row_separator'] = "Oddělovač řádků";
$_lang['contentblocks.repeater.row_separator.description'] = "A string to glue together individual rows. This could just be some line breaks, like in the default, or it could be a bunch of html you want in between rows.";
$_lang['contentblocks.repeater.manager_columns'] = "Manager Columns";
$_lang['contentblocks.repeater.manager_columns.description'] = "Number of columns a repeater should display as in manager. Possible values are 1-4";
$_lang['contentblocks.repeater.layout_style'] = "Layout style";
$_lang['contentblocks.repeater.layout_style.description'] = "Format for laying out a repeater (mini is similar to a table view)";
$_lang['contentblocks.repeater.condensed'] = "Condensed";
$_lang['contentblocks.repeater.mini'] = "Mini";
$_lang['contentblocks.repeater.default'] = "Default";

$_lang['contentblocks.richtext'] = "RTE";
$_lang['contentblocks.richtext.description'] = "Jednoduché textové pole s formátováním. Podporuje TinyMCE a Redactor.";
$_lang['contentblocks.richtext_template.description'] = "As rich text fields typically handle their own markup generation, the template for a rich text input is typically just the <code>[[+value]]</code> placeholder, though you could wrap it in a container or something.";

$_lang['contentblocks.table'] = "Tabulka";
$_lang['contentblocks.table.description'] = "Interaktivní widget pro tabulková data.";
$_lang['contentblocks.table_template.description'] = "Template for each of the table cells. Should probably include a &lt;td&gt; tag. Available placeholder: <code>[[+cell]]</code>, <code>[[+colIdx]]</code>, <code>[[+colTotal]]</code>";
$_lang['contentblocks.table.row_template'] = "Šablona řádku";
$_lang['contentblocks.table.row_template.description'] = "The template for each of the rows in the table, probably contains a <code>&lt;tr&gt;</code> tag. Available placeholder: <code>[[+row]]</code> (contains each of the cells in this row), <code>[[+idx]]</code>";
$_lang['contentblocks.table.wrapper_template.description'] = "The wrapper template for the entire table. Available placeholder: <code>[[+body]]</code>, <code>[[+total]]</code>.";

$_lang['contentblocks.textarea'] = "Text Area";
$_lang['contentblocks.textarea.description'] = "Jednoduché víceřádkové textové pole.";

$_lang['contentblocks.textfield'] = "Textové pole";
$_lang['contentblocks.textfield.description'] = "Jednoduché jednořádkové textové pole.";
$_lang['contentblocks.textfield_template.description'] = "For the textfield simply use the <code>[[+value]]</code> placeholder with a container of choice (a paragraph, heading etc).";
$_lang['contentblocks.textarea_template.description'] = "For the text area you can use the <code>[[+value]]</code> placeholder with a container of choice (a paragraph, heading etc). If you want to support line breaks without adding markup to the field, try applying the <code>nl2br</code> output filter.";

$_lang['contentblocks.video'] = "Video";
$_lang['contentblocks.video.description'] = "YouTube integration allowing keyword search and pasting in YouTube links to insert videos easily.";
$_lang['contentblocks.video_template.description'] = "When using a Video input, the YouTube Video ID is stored in the <code>[[+value]]</code> placeholder. This can be used to generate the embed code in this template.";
$_lang['contentblocks.video.search'] = "Hledat!";
$_lang['contentblocks.video.search_introduction'] = "Use the search box below to search YouTube for videos.";
$_lang['contentblocks.video.enter_keywords'] = "Zadejte jedno nebo více klíčových slov.";
$_lang['contentblocks.video.load_more_results'] = "Načíst další výsledky";
$_lang['contentblocks.video.search_youtube'] = "Vyhledávání na YouTube";
$_lang['contentblocks.video.paste_link'] = "Vložit odkaz zde";
$_lang['contentblocks.video.youtube_not_loaded'] = "The YouTube API has not been loaded. Please try again in a few seconds. If the problem persists, the API might not be available currently.";
$_lang['contentblocks.video.api_error'] = "Uh oh, an error occured: [[+message]] (Code [[+code]])";

// Select
$_lang['contentblocks.dropdown'] = "Dropdown";
$_lang['contentblocks.dropdown.description'] = "A simple dropdown field, allowing the editor to choose one item from a number of predefined options.";
$_lang['contentblocks.dropdown_template.description'] = "Template for the dropdown field. Available placeholders are <code>[[+value]]</code> (the value option for the chosen item), <code>[[+display]]</code> (the displayed value in the dropdown).";
$_lang['contentblocks.dropdown.options'] = "Drop-down Options";
$_lang['contentblocks.dropdown.options.description'] = "Define available values as 'value==Displayed Value', with one option per line. If you only pass a single value per line (such as 'foo'), that will be used as both displayed and placeholder value. Prefixing a single value with # will make it a disabled option. You can also use @SNIPPET bindings to dynamically provide option values. For detailed information on specifying options consult the Dropdown documentation at modmo.re/cb.";
$_lang['contentblocks.dropdown.default_value'] = "Default Value";
$_lang['contentblocks.dropdown.default_value.description'] = "The default value to choose when the dropdown is inserted, or nothing is selected.";

// Snippet
$_lang['contentblocks.snippet'] = "Snippet";
$_lang['contentblocks.snippet.description'] = "Allow the user to choose a snippet and enter properties for it.";
$_lang['contentblocks.snippet.available_snippets'] = "Jméno nebo ID povolených snippetů (volitelné)";
$_lang['contentblocks.snippet.available_snippets.description'] = "To limit the available snippets for the editor, specify a comma separated list of snippet names or IDs. Snippets in this list will always be available, irrespective of the other properties below.";
$_lang['contentblocks.snippet.categories'] = "Kategorie";
$_lang['contentblocks.snippet.categories.description'] = "Specify a list of category names or IDs to limit the available snippets to.";
$_lang['contentblocks.snippet.add_property'] = "Přidat vlastnost";
$_lang['contentblocks.snippet.choose_snippet'] = "Zvolte snippet";
$_lang['contentblocks.snippet.other_property'] = "Ostatní (ruční vstup)";
$_lang['contentblocks.snippet.other_property.desc'] = "Any properties to add to the end of the snippet call can be specified here. Make sure to use the proper tag syntax, like this: &property=`value`";
$_lang['contentblocks.snippet.allow_uncached'] = "Povolit bez cache?";
$_lang['contentblocks.snippet.allow_uncached.description'] = "When enabled, an \"Uncached?\" option will be available for snippets. If disabled all snippets will be called cached.";
$_lang['contentblocks.snippet.uncached'] = "Cache?";
$_lang['contentblocks.snippet.uncached_0'] = "Ano";
$_lang['contentblocks.snippet.uncached_1'] = "Ne, neukládat do cache tento snippet";
$_lang['contentblocks.snippet.none_available'] = "Pro toto pole nejsou dostupné žádné snippety.";
$_lang['contentblocks.snippet_template.description'] = "The snippet field creates a full MODX Snippet tag for you, which is available in <code>[[+value]]</code>, and the snippet name is in <code>[[+snippet_name]]</code>";

$_lang['contentblocks.layout_template.description'] = 'The template for this nested layout field. Keep in mind that any layouts contained within will also have their templates parsed. Available placeholder: <code>[[+value]]</code> (the fully parsed HTML from the contained layouts)';
$_lang['contentblocks.layoutfield.available_layouts'] = "Dostupné rozvržení";
$_lang['contentblocks.layoutfield.available_layouts.description'] = "Comma-separated list of layouts which should be allowed. To not allow any layouts, for example to only allow templates to be inserted, specify -1.";
$_lang['contentblocks.layoutfield.available_templates'] = "Dostupné šablony";
$_lang['contentblocks.layoutfield.available_templates.description'] = "Čárkami oddělený seznam šablon, které budou povoleny. K nepovolení žádné šablony, zadejte -1.";

// Image related
$_lang['contentblocks.choose_image'] = "Zvolit obrázek";
$_lang['contentblocks.wrapper_template'] = "Wrapper šablony";
$_lang['contentblocks.nested_template'] = "Vnořená šablona";
$_lang['contentblocks.max_images'] = "Maximální počet obrázků";
$_lang['contentblocks.max_images_reached'] = "Lituji, nemůžete použít více než [[+max]] obrázků v této galerii.";
$_lang['contentblocks.upload_error'] = "Ups, něco se stalo při nahrávání [[+file]]: [[+message]]";
$_lang['contentblocks.upload_error.file_too_big'] = "“\n\nTento soubor může být příliš velký.";
$_lang['contentblocks.image.thumbnail_size'] = "Manažer velikostí thumbů";
$_lang['contentblocks.image.thumbnail_size.description'] = "Dimensions for manager thumbnails. Leave blank for none, one numeric value for square images, and dimensions in wxh for rectangular images. Example: 100 or 100x50";
$_lang['contentblocks.image.thumbnail_crop'] = 'Use crop for thumbnail';
$_lang['contentblocks.image.thumbnail_crop.description'] = 'Set to the key of a crop to use that crop for the manager thumbnail, instead of an dynamic thumbnail. When the crop has not yet been created, it will fallback to the dynamic thumbnail.';

$_lang['contentblocks.cropper.save_crop'] = 'Save';
$_lang['contentblocks.cropper.saved_crop'] = 'Saved!';
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
$_lang['contentblocks.use_contentblocks'] = "Použít ContentBlocks?";
$_lang['contentblocks.use_contentblocks.description'] = "When enabled, the content area will be replaced with a ContentBlocks canvas for creating multi-column, structured content.";
$_lang['contentblocks.or'] = "nebo";
$_lang['contentblocks.title'] = "Název";
$_lang['contentblocks.delete'] = "Odstranit";
$_lang['contentblocks.delete_video'] = "Odstranit video";
$_lang['contentblocks.move_layout_up'] = "Přesunout nahoru";
$_lang['contentblocks.move_layout_down'] = "Přesunout dolů";
$_lang['contentblocks.delete_image'] = "Odstranit obrázek";
$_lang['contentblocks.crop_image'] = 'Crop Image';
$_lang['contentblocks.crop_image.introduction'] = 'Create alternative sizes for your image. Select the crop to adjust below the preview, and use the drag tools to select the region and size.';
$_lang['contentblocks.crop_image.preview'] = 'Preview of the image to crop.';
$_lang['contentblocks.search_fields'] = "Search fields";
$_lang['contentblocks.search_layouts_templates'] = "Search layouts and templates";
$_lang['contentblocks.add_content'] = "Přidat obsah";
$_lang['contentblocks.add_content.introduction'] = "Please select the type of content to insert into the layout. Hover over the name to check a longer description.";
$_lang['contentblocks.add_layout'] = "Add Layout";
$_lang['contentblocks.add_layout.introduction'] = "Zvolte rozvržení, které chcete přidat do obsahu.";
$_lang['contentblocks.upload'] = "Nahrát";
$_lang['contentblocks.choose'] = "Zvolte";
$_lang['contentblocks.from_url'] = "From URL";
$_lang['contentblocks.from_url_title'] = "Insert image from URL";
$_lang['contentblocks.from_url_prompt'] = "Enter an URL to an image to insert. This should be either a full URL to the image on a different website, or the relative url from the root of the website. The file will be saved on the server.";
$_lang['contentblocks.from_url_notfound'] = "The requested image could not be downloaded. ";
$_lang['contentblocks.image.or_drop_images'] = "nebo sem přetáhněte obrázky";
$_lang['contentblocks.image.or_drop_image'] = "nebo sem přetáněte obrázek";
$_lang['contentblocks.use_tinyrte'] = "Použít Tiny RTE?";
$_lang['contentblocks.use_tinyrte.description'] = "When enabled, the input will be enhanced with a tiny rich text editor allowing for simple formatting (bold, italics and links).";
$_lang['contentblocks.use_tinyrte.description.image'] = "When enabled, the title input will be enhanced with a tiny rich text editor allowing for simple formatting (bold, italics and links). If you use the title input for alt text or a title attribute, you may need to do some extra processing (i.e. htmlentities) to prevent the added markup from breaking your img tag. ";

$_lang['contentblocks.rebuild_content'] = "Znovu sestavit obsah";
$_lang['contentblocks.rebuild_content.confirm'] = "Znovu sestavením obsahu, bude znovu vygenerován obsah všech dokumentů na základě jeho strukturovaných hodnot. Podle velikosti webu toto může trvat od několika sekund do několika minut. Chcete-li spustit tento proces, prosím klikněte na tlačítko Ano.";
$_lang['contentblocks.rebuild_content.initialising'] = "Inicializuji...";
$_lang['contentblocks.rebuild_content.resources_found'] = "Nalezeno celkem [[+total]] dokumentů. Sestavení bude trvat ~ [[+estimate]] minut.";
$_lang['contentblocks.rebuild_content.loading_dependencies'] = "Načítání závislostí pro analýzu obsahu...";
$_lang['contentblocks.rebuild_content.loaded_dependencies'] = "Závislosti načteny, začíná sestavování obsahu…";
$_lang['contentblocks.rebuild_content.skipping_not_allowed'] = "Přeskakuji #[[+id]] ([[+pagetitle]]), ContentBlocks je pověřen nic nedělat v tomto dokumentu (typ: [[+class_key]])";
$_lang['contentblocks.rebuild_content.skipping_not_used'] = "Přeskakuji #[[+id]] ([[+pagetitle]]), dosud nepoužívá ContentBlocks.";
$_lang['contentblocks.rebuild_content.skipping_corrupt'] = "Přeskakuji #[[+ id]] ([[+ pagetitle]]), obsah chybí nebo je neplatný.";
$_lang['contentblocks.rebuild_content.done'] = "Znovu sestavení obsahu je hotové! Celkem bylo zpracováno [[+total_rebuild]] dokumentů, [[+total_skipped]] dokumentů bylo vynecháno a [[+total_skipped_broken]] bylo vynechány z důvodu neplatného obsahu.";
$_lang['contentblocks.rebuild_content.clear_cache'] = "Vymazání cache pro kontext(y): [[+ kontexty]]";
$_lang['contentblocks.rebuild_content.clear_cache_complete'] = "Cache vyčištěna. Vše je hotovo!";
$_lang['contentblocks.generating_canvas'] = "Generování obsahu… toto by mělo zabrat jenom chvilku.";
$_lang['contentblocks.content'] = "Obsah šablony";
$_lang['contentblocks.open_template_builder'] = "Vytvořit šablonu";
$_lang['contentblocks.template_builder'] = "Sestavovatel šablony";
$_lang['contentblocks.close_modal'] = "Close Modal";


/**
 * Settings. Oh boy.
 */

$_lang['setting_contentblocks.accepted_resource_types'] = "Typy přijatelných dokumentů";
$_lang['setting_contentblocks.accepted_resource_types_desc'] = "Čárkou oddělený seznam třídy dokumentů (Class Keys), které se Content Blocks pokusí vylepšit. ";

$_lang['setting_contentblocks.clear_cache_after_rebuild'] = "Vymazat cache po sestavení";
$_lang['setting_contentblocks.clear_cache_after_rebuild_desc'] = "Je-li aktivní, pak se automaticky provede vymazaní cache poté co je dokončeno Znovu sestavení obsahu.";

$_lang['setting_contentblocks.default_modal_view'] = "Default modal view";
$_lang['setting_contentblocks.default_modal_view_desc'] = "How fields, layouts, and templates should be viewed in the modal when adding to the canvas. Possible values are default, condensed, and expanded.";

$_lang['setting_contentblocks.debug'] = "Debug";
$_lang['setting_contentblocks.debug_desc'] = "Když povolené, tak ContentBlocks v manageru použijí neminifikované JS, toto nastavení zjednodušuje debugování případných problémů.";

$_lang['setting_contentblocks.disabled'] = "Zakázáno";
$_lang['setting_contentblocks.disabled_desc'] = "Toto nastavte na hodnotu 1 pokud chcete zcela zakázat ContentBlocks na tomto webu. Toto může být přepsáno na kontextové úrovni pokud je chcete používat pouze v konkrétních kontextech. ";

$_lang['setting_contentblocks.show_resource_option'] = "Show Resource Option";
$_lang['setting_contentblocks.show_resource_option_desc'] = "When enabled you will have the option to enable or disable ContentBlocks on specific resources, with the 'Use ContentBlocks' option on the resource settings.";

$_lang['setting_contentblocks.canvas_position'] = "Canvas Position";
$_lang['setting_contentblocks.canvas_position_desc'] = 'Where to place the content canvas. When set to "inherit", the canvas will replace the content field in the same location. This is the recommended mode for Revolution 2.x. When set to "block", the content will be placed in a separate block below the resource tabs panel. When set to "tab1" or "tab2", the content will be placed in a Content tab at either the first or second place. If a Content tab already exists (e.g., from MoreGallery), it will place it in that tab instead of a new one.';

$_lang['setting_contentblocks.implode_string'] = "Spojit řetězec";
$_lang['setting_contentblocks.implode_string_desc'] = "Spojující řetěz mezi jednotlivými poli výstupy šablony, když je zpracován obsah. ";

$_lang['setting_contentblocks.default_layout'] = "Výchozí rozvržení";
$_lang['setting_contentblocks.default_layout_desc'] = "Zadejte ID výchozího rozložení pro nové dokumenty nebo dokumenty, které ještě nebyly s Content Blocks použity. Pro verzi 1.2 toto platí pouze pokud není nalezena výchozí šablona.";

$_lang['setting_contentblocks.default_layout_part'] = "Výchozí sloupec";
$_lang['setting_contentblocks.default_layout_part_desc'] = "Specify the reference of a column in the Default Layout you specified. On new resources or resources that have not yet been used with ContentBlocks, a field (defined with the Default Field setting) will be inserted into this column with the content. As of 1.2, this only applies when no Default Template is found.";

$_lang['setting_contentblocks.default_field'] = "Výchozí pole";
$_lang['setting_contentblocks.default_field_desc'] = "Specify the ID of a field to insert into the default column of the default layout you specified. When set to 0, a simple rich text or textarea field will be used. As of 1.2, this only applies when no Default Template is found.";

$_lang['setting_contentblocks.defaults_allowed_inputs'] = "Allowed Inputs in Default Templates";
$_lang['setting_contentblocks.defaults_allowed_inputs_desc'] = "A comma separated list of input types (names) that are available in the \"Target Field\" dropdown when creating or editing default templates.";

$_lang['setting_contentblocks.code.theme'] = "Téma kód editoru";
$_lang['setting_contentblocks.code.theme_desc'] = "Téma, které chcete použít pro zadání kódu. Možnosti naleznete v dokumentaci Ace.";

$_lang['setting_contentblocks.image.hash_name'] = "Název hashe";
$_lang['setting_contentblocks.image.hash_name_desc'] = "Pokud povoleno, tak nahrané soubory budou zahashovány, aby nebyly známy původní názvy souborů.";

$_lang['setting_contentblocks.image.prefix_time'] = "Předpona času";
$_lang['setting_contentblocks.image.prefix_time_desc'] = "Pokud povoleno, tak nahrané soubory budou začínat unix timestamp.";

$_lang['setting_contentblocks.image.sanitize'] = "Sanitize";
$_lang['setting_contentblocks.image.sanitize_desc'] = "Je-li povoleno, pak budou názvy nahrávaných souborů sanitizovány před vlastním nahráním, tak aby neobsahovaly nepovolené znaky. Sanitizace také podporuje transliteraci pomocí knihovny iconv nebo pomocí přepisů třetích stran.";

$_lang['setting_contentblocks.image.source'] = "Zdroj";
$_lang['setting_contentblocks.image.source_desc'] = "Zvolte výchozí zdroj médií pro pole typy obrázek a galerie. Toto může být přepsáno na úrovni samotné definice pole.";

$_lang['setting_contentblocks.image.upload_path'] = "Cesta k nahrání";
$_lang['setting_contentblocks.image.upload_path_desc'] = "The path, within the chosen media source, to which the images should be uploaded. This supports [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] and [[+resource]] placeholders. Resource fields are also available, like [[+pagetitle]] or [[+alias]], and template variables with [[+tv.name_of_tv]]. This value can be overridden per field by editing its properties.";
$_lang['setting_contentblocks.image.crop_path'] = "Cropped Images Path";
$_lang['setting_contentblocks.image.crop_path_desc'] = "The path, within the chosen media source, where cropped images should be saved. This supports [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] and [[+resource]] placeholders. Resource fields are also available, like [[+pagetitle]] or [[+alias]], and template variables with [[+tv.name_of_tv]]. This value can be overridden per image field by editing its properties.";

$_lang['setting_contentblocks.file.upload_path'] = "Upload Path";
$_lang['setting_contentblocks.file.upload_path_desc'] = "The path, within the chosen media source, to which the files should be uploaded. This supports [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] and [[+resource]] placeholders. Resource fields are also available, like [[+pagetitle]] or [[+alias]], and template variables with [[+tv.name_of_tv]]. This value can be overridden per field by editing its properties.";

$_lang['setting_contentblocks.sanitize_pattern'] = "Sanitize vzor";
$_lang['setting_contentblocks.sanitize_pattern_desc'] = "RegEx řetězec, který má být použit pro sanitizaci názvů souborů.";

$_lang['setting_contentblocks.sanitize_replace'] = "Sanitize náhradu";
$_lang['setting_contentblocks.sanitize_replace_desc'] = "RegEx řetězec, který má být použit pro sanitizaci.";

$_lang['setting_contentblocks.custom_icon_path'] = "Cesta k vlastní ikoně";
$_lang['setting_contentblocks.custom_icon_path_desc'] = "Cesta k vlastním ikonám. {assets_path} je povoleno.";

$_lang['setting_contentblocks.custom_icon_url'] = "URL k vlastní ikoně";
$_lang['setting_contentblocks.custom_icon_url_desc'] = "Adresa URL vlastní ikonám. {assets_url} je povoleno.";

$_lang['setting_contentblocks.translit'] = "Transliterace";
$_lang['setting_contentblocks.translit_desc'] = "Je-li nastavena nějaká hodnota, pak toto upřednostní transliteraci před procesem sanitace, umožňující převod neplatných znaků na platné. Pokud je tato hodnota prázdná, bude poděděno dle nastavení \"friendly_alias_translit\".";

$_lang['setting_contentblocks.hide_logo'] = "Schovat logo";
$_lang['setting_contentblocks.hide_logo_desc'] = "Ve výchozím nastavení přidáváme modmore logo v pravém dolním rohu ContentBlocks komponenty. Pokud z nějakého důvodu nechcete, aby ji tam, jednoduše povolte toto nastavení a zmizí.";

$_lang['setting_contentblocks.translit_class'] = "Translit Class";
$_lang['setting_contentblocks.translit_class_desc'] = "Název třídy pro přepis. Je-li tato hodnota prázdná, bude dědit z nastavení \"friendly_alias_translit_class\".";
$_lang['setting_contentblocks.translit_class_path'] = "Translit Class Path";
$_lang['setting_contentblocks.translit_class_path_desc'] = "Cesta k třídy pro přepis. Je-li tato hodnota prázdná, bude dědit z nastavení “friendly_alias_translit_class_path”.";

$_lang['setting_contentblocks.base_url_mode'] = "Base URL Mode";
$_lang['setting_contentblocks.base_url_mode_desc'] = "When uploading images, the URLs are automatically normalised in a way relative to the base url to ensure they show up in the front and back-end. Depending on your MODX setup, especially in multi-context sites, you might need to change this mode for images to show in the front-end. The accepted values are: <code>relative</code> (default: images are relative to the MODX base url), <code>absolute</code> (image urls contain the MODX base url) or <code>full</code> (images contain the full MODX site url)";

$_lang['setting_contentblocks.remove_content_dom'] = "Remove Content DOM";
$_lang['setting_contentblocks.remove_content_dom_desc'] = "When enabled, the previously existing content field (potentially including an enabled rich text editor) will be completely removed from the page when ContentBlocks is initialised. In some cases where the rich text editor remaining in a hidden state can cause conflicts with ContentBlocks, and enabling this option can help with that.";
