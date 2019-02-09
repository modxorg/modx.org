<?php
$_lang['contentblocks'] = "Indholdsblokke";
$_lang['contentblocks.menu'] = "Indholdsblokke";
$_lang['contentblocks.menu_desc'] = "Administrér indholdsblokfelter- og layout.";
$_lang['contentblocks.mgr.home'] = "Indholdsblokke";

$_lang['contentblocks.general'] = "Generelle";
$_lang['contentblocks.properties'] = "Egenskaber";
$_lang['contentblocks.clear_filters'] = "Clear filters";
$_lang['contentblocks.search'] = "Search";

$_lang['contentblocks.link'] = "Link";
$_lang['contentblocks.link.description'] = "Et felt til at oprette links. Ressourcer, e-mail og webadresser er understøttet.";
$_lang['contentblocks.link_template.description'] = "En skabelon til linket. Mulige pladsholdere: <code>[[+ link]]</code>, <code>[[+ link_raw]]</code>, <code>[[+ linkType]]</code>";
$_lang['contentblocks.link.resource'] = "Ressource";
$_lang['contentblocks.link.url'] = "URL";
$_lang['contentblocks.link.email'] = "E-mailadresse";
$_lang['contentblocks.link.link_new_tab'] = "Åbn i nyt faneblad";
$_lang['contentblocks.link.add'] = "Tilføj Link";
$_lang['contentblocks.link.remove'] = "Fjern Link";
$_lang['contentblocks.link.placeholder'] = "Begynd at skrive navnet på en ressource, eksternt link eller en e-mailadresse";
$_lang['contentblocks.link.link_detection_pattern_override'] = 'Tilsidesæt link-genkendelsesmønster';
$_lang['contentblocks.link.link_detection_pattern_override.description'] = 'REgex for at afsløre om et link er gyldigt. Ugyldige links får foransat "http://".';
$_lang['contentblocks.link.limit_to_current_context'] = 'Begræns ressourceresultater til den nuværende kontekst';
$_lang['contentblocks.link.limit_to_current_context.description'] = 'Begræns forslags-resultater til ressourcer der hører under samme kontekst som siden der bliver redigeret';

$_lang['setting_contentblocks.link.link_detection_pattern'] = 'Link-genkendelsesmønster';
$_lang['setting_contentblocks.link.link_detection_pattern_desc'] = 'REgex for at afsløre om et link er gyldigt. Ugyldige links får foransat "http://".';

$_lang['setting_contentblocks.typeahead.include_introtext'] = 'Medtag Introtekst i Typeahead';
$_lang['setting_contentblocks.typeahead.include_introtext_desc'] = 'Når aktiveret, vil typeahead inkludere introteksten for hver af de ressourcer, for at give dig flere oplysninger om ressourcen.';

$_lang['contentblocks.error.not_an_export'] = "Filen synes ikke at være en indholdsblok eksportfil";
$_lang['contentblocks.error.importing_row'] = "Fejl ved import af række: ";
$_lang['contentblocks.error.no_valid_field'] = "No valid field found for request.";
$_lang['contentblocks.error.no_valid_input'] = "No valid input found for request.";
$_lang['contentblocks.error.no_snippets'] = "Der er ikke nogen kodestumper tilgængelige";
$_lang['contentblocks.error.missing_id'] = "Mangler id-egenskaben";
$_lang['contentblocks.error.input_not_found'] = "Input blev ikke fundet";
$_lang['contentblocks.error.input_not_found.message'] = "Uh oh. Et felt  af typen \"[[+ input]]\" blev indlæst, men den input type findes ikke.";
$_lang['contentblocks.error.field_not_found'] = "Feltet blev ikke fundet";
$_lang['contentblocks.error.category_not_found'] = "Category not found";
$_lang['contentblocks.error.layout_not_found'] = "Layoutet blev ikke fundet";
$_lang['contentblocks.error.error_saving_object'] = "Fejl under forsøg på at gemme objektet";
$_lang['contentblocks.error.xml_not_loaded'] = "Kunne ikke indlæse XML-filen";
$_lang['contentblocks.error.no_icons'] = "Kunne ikke åbne ikonbiblioteket til læsning";
$_lang['contentblocks.error.no_json'] = "Din browser understøtter ikke JSON, som er nødvendig for ContentBlocks. Opdater venligst din browser.";

$_lang['contentblocks.availability'] = "Tilgængelighed";
$_lang['contentblocks.availability.layout_description'] = "Som standard er layouts altid tilgængelige. Hvis du tilføjer betingelser nedenfor, vil de kun være tilgængelige når en af betingelserne er sande. Adskil flere gyldige værdier med et komma.";
$_lang['contentblocks.availability.field_description'] = "Som standard er felter altid tilgængelige. Hvis du tilføjer betingelser nedenfor, vil de kun være tilgængelige når en af betingelserne er sande. Adskil flere gyldige værdier med et komma.";
$_lang['contentblocks.availability.template_description'] = "Som standard er skabeloner altid tilgængelige. Hvis du tilføjer betingelser nedenfor, vil de kun være tilgængelige når en af betingelserne er sande. Adskil flere gyldige værdier med et komma.";
$_lang['contentblocks.add_condition'] = "Tilføj betingelse";
$_lang['contentblocks.edit_condition'] = "Rediger betingelse";
$_lang['contentblocks.delete_condition'] = "Slet betingelse";
$_lang['contentblocks.delete_condition.confirm'] = "Er du sikker på du vil slette denne betingelse?";
$_lang['contentblocks.condition_field'] = "Felt";
$_lang['contentblocks.condition_field.resource'] = "Ressource-ID";
$_lang['contentblocks.condition_field.parent'] = "Forældre-ID";
$_lang['contentblocks.condition_field.ultimateparent'] = "Højeste forældre-ID";
$_lang['contentblocks.condition_field.class_key'] = "Class Key";
$_lang['contentblocks.condition_field.context'] = "Kontekst";
$_lang['contentblocks.condition_field.template'] = "Skabelon (ID)";
$_lang['contentblocks.condition_field.usergroup'] = "Brugergruppe (navn)";
$_lang['contentblocks.condition_value'] = "Værdi(er)";
$_lang['contentblocks.availibility.layouts'] = "Layout(s)";
$_lang['contentblocks.availibility.layouts.description'] = "Begrænse brugen af feltet til en eller flere (kommasepareret) layouts. Hvis dette felt ikke bliver udfyldt vil det være tilgængeligt på alle layout ellers er det begrænset til dem du angiver.";
$_lang['contentblocks.availibility.times_per_page'] = "Gange pr. side";
$_lang['contentblocks.availibility.times_per_page.description'] = "Begrænse brugen til dette antal gange pr side. Efterlad feltet tomt for ikke at have nogen begrænsning.";
$_lang['contentblocks.availibility.times_per_layout'] = "Gange pr. layout";
$_lang['contentblocks.availibility.times_per_layout.description'] = "Begrænse brugen til dette antal gange pr. layout. Efterlad feltet tomt for ikke at have nogen begrænsning.";
$_lang['contentblocks.availibility.only_nested'] = "Tillad kun som indlejrede layout";
$_lang['contentblocks.availibility.only_nested.description'] = "Tillad ikke layout må bruges uden for layoutfeltet.";


$_lang['contentblocks.field_desc'] = "Felter er rygraden i ContentBlocks - de definerer præcist hvor meget <em>Kreative frihed</em> redaktører får i forvaltningen af deres indhold. Hvert felt består hovedsageligt af en input type og en skabelon, der dikterer, hvordan det er sammensat på frontenden. Brug hjælp knappen i øverste højre hjørne for flere oplysninger om korrekt brug af felter.";
$_lang['contentblocks.add_field'] = "Tilføj felt";
$_lang['contentblocks.edit_field'] = "Rediger feltet";
$_lang['contentblocks.duplicate_field'] = "Kopier felt";
$_lang['contentblocks.delete_field'] = "Slet felt";
$_lang['contentblocks.delete_field.confirm'] = "Er du sikker på du vil slette feltet? Potentielt katastrofale ting kan ske med indhold der bruger dette felt.";
$_lang['contentblocks.delete_field.confirm.js'] = "Er du sikker på du vil slette feltet?";
$_lang['contentblocks.delete_field.is_default'] = "This field cannot be removed because it is configured as the default field. This is set up with the <code>contentblocks.default_field</code> system setting. For more information on setting up default content, see the <a href=\"https://docs.modmore.com/en/ContentBlocks/v1.x/Default_Templates.html\" target=\"_blank\">Default Templates documentation</a>.";
$_lang['contentblocks.export_field'] = "Eksportfelt";
$_lang['contentblocks.export_fields'] = "Eksporter";
$_lang['contentblocks.export_fields.confirm'] = "Efter at du har klikket ja nedenfor, vil vi udarbejde en XML-eksport af alle felter. Dette kan bruges til at importere felterne senere eller i en anden installation. XML genereringen kan tage nogle sekunder, afhængigt af antallet felter du har konfigureret.";
$_lang['contentblocks.import_fields'] = "Importer";
$_lang['contentblocks.import_fields.title'] = "Importer felter";
$_lang['contentblocks.import_fields.intro'] = "Ved uploade en XML-fil og vælge den rigtige importtilstand, kan du importere felter du eksporteret før eller fra et andet websted. <b>Vær forsigtig</b> med importere felter, hvis du har indhold der bruger de aktuelle felter allerede. Kontakt support@modmore.com, hvis du er usikker på hvilken tilstand du skal bruge i importen.";

$_lang['contentblocks.layout_desc'] = "Hver Layout er grundlæggende en vandret række, bestående af en eller flere kolonner. Når du redigerer en ressource er hver kolonne en tom pladsholder med en knap til at tilføje indhold (ved hjælp af felter). Tryk på knappen Hjælp i øverste højre hjørne for at få flere oplysninger om korrekt brug af Layouts.";
$_lang['contentblocks.add_layout'] = "Tilføj layout";
$_lang['contentblocks.repeat_layout'] = "Gentag Layout";
$_lang['contentblocks.switch_layout'] = "Switch Layout";
$_lang['contentblocks.switch_layout.chooser.introduction'] = "Choose the Layout to switch to. After selecting a layout, you'll be able to assign fields to the new layout's columns.";
$_lang['contentblocks.switch_layout.introduction'] = "Drag and drop the fields below to assign them to desired columns in the new layout. All fields must be assigned to a column before saving.";
$_lang['contentblocks.cb_unassigned_fields'] = "Unassigned Fields";
$_lang['contentblocks.unassigned_layout_settings'] = "Unassigned Layout Settings";
$_lang['contentblocks.unassigned_layout_settings.introduction'] = "These settings do not exist in the new layout, and their values will not be retained.";
$_lang['contentblocks.edit_layout'] = "Rediger Layout";
$_lang['contentblocks.duplicate_layout'] = "Kopier Layout";
$_lang['contentblocks.export_layout'] = "Eksportlayout";
$_lang['contentblocks.delete_layout'] = "Slet Layout";
$_lang['contentblocks.delete_layout.confirm'] = "Er du sikker på du vil slette dette Layout? Potentielt katastrofale ting kan ske med indhold der bruger dette Layout.";
$_lang['contentblocks.delete_layout.confirm.js'] = "Er du sikker på du vil slette [[+ layoutName]] layoutet? Alt indhold vil samtidig blive slettet hvis du fortsætter.";
$_lang['contentblocks.delete_layout.is_default'] = "This layout cannot be removed because it is configured as the default layout. This is set up with the <code>contentblocks.default_layout</code> system setting. For more information on setting up default content, see the <a href=\"https://docs.modmore.com/en/ContentBlocks/v1.x/Default_Templates.html\" target=\"_blank\">Default Templates documentation</a>.";
$_lang['contentblocks.export_layouts'] = "Eksporter";
$_lang['contentblocks.export_layouts.confirm'] = "Efter at du har klikket ja nedenfor, vil vi udarbejde en XML-eksport af alle Layouts. Dette kan bruges til at importere Layouts senere eller i en anden installation. XML genereringen kan tage nogle sekunder, afhængigt af antallet Layouts du har konfigureret.";
$_lang['contentblocks.import_layouts'] = "Importer";
$_lang['contentblocks.import_layouts.title'] = "Importer Layouts";
$_lang['contentblocks.import_layouts.intro'] = "Ved uploade en XML-fil og vælge den rigtige importtilstand, kan du importere Layouts du eksporteret før eller fra et andet websted. <b>Vær forsigtig</b> med importere Layouts, hvis du har indhold der bruger de aktuelle Layouts allerede. Kontakt support@modmore.com, hvis du er usikker på hvilken tilstand du skal bruge i importen.";

$_lang['contentblocks.layout_settings'] = "Layoutindstillinger";
$_lang['contentblocks.layout_settings.modal_header'] = "[[+ navn]]indstillinger";

$_lang['contentblocks.field_settings'] = "Indholdsindstillinger";
$_lang['contentblocks.field_settings.modal_header'] = "[[+ navn]]indstillinger";

$_lang['contentblocks.add_layoutcolumn'] = "Tilføj kolonne";
$_lang['contentblocks.edit_layoutcolumn'] = "Rediger kolonne";
$_lang['contentblocks.delete_layoutcolumn'] = "Slet kolonne";
$_lang['contentblocks.delete_layoutcolumn.confirm'] = "Er du sikker på du vil slette dette kolonne? Potentielt katastrofale ting kan ske med indhold der bruger denne kolonne.";
$_lang['contentblocks.add_setting'] = "Tilføj indstilling";
$_lang['contentblocks.edit_setting'] = "Rediger indstillingen";
$_lang['contentblocks.duplicate_setting'] = "Duplicate Setting";
$_lang['contentblocks.delete_setting'] = "Slet indstilling";
$_lang['contentblocks.delete_setting.confirm'] = "Er du sikker på du vil slette denne indstilling?";

$_lang['contentblocks.defaults'] = 'Standard';
$_lang['contentblocks.defaults.intro'] = 'Med standardindstillinger kan du konfigurere hvordan ressourcer som ikke er blevet redigeret med ContentBlocks (f.eks. nye ressourcer eller sider, der eksisterede før du installererede ContentBlocks) endnu administreres. Dette virker ved at standardreglerne defineret nedenfor køres fra top til bund, indtil der findes et match og den definerede skabelon indsættes.';
$_lang['contentblocks.constraint_field'] = 'Begrænsningsfelt';
$_lang['contentblocks.constraint_value'] = 'Værdi der skal begrænses efter';
$_lang['contentblocks.default_template'] = 'Standardskabelon';
$_lang['contentblocks.target_layout'] = 'Mållayout';
$_lang['contentblocks.target_field'] = 'Målfelt';
$_lang['contentblocks.target_column'] = 'Målkolonne';
$_lang['contentblocks.add_default'] = 'Tilføje standardregel';
$_lang['contentblocks.edit_default'] = 'Rediger standardreglen';
$_lang['contentblocks.delete_default'] = 'Slet standardreglen';
$_lang['contentblocks.delete_default.confirm'] = 'Er du sikker på du vil slette denne standardregel?';


$_lang['contentblocks.start_import'] = "Start import";
$_lang['contentblocks.import_file'] = "Fil";
$_lang['contentblocks.import_mode'] = "Importtilstand";
$_lang['contentblocks.import_mode.insert'] = "Insert: leave existing [[+what]] and add the imported data";
$_lang['contentblocks.import_mode.overwrite'] = "Overwrite: leave existing [[+what]], but overwrite them if they have the same ID";
$_lang['contentblocks.import_mode.replace'] = "Replace: first remove all current [[+what]], and then import the new rows.";

$_lang['contentblocks.id'] = "ID";
$_lang['contentblocks.field'] = "Felt";
$_lang['contentblocks.fields'] = "Felter";
$_lang['contentblocks.layout'] = "Layout";
$_lang['contentblocks.layout.description'] = "En wrapper til felter";
$_lang['contentblocks.layouts'] = "Layouts";
$_lang['contentblocks.layoutcolumn'] = "Kolonne";
$_lang['contentblocks.layoutcolumns'] = "Kolonner";
$_lang['contentblocks.setting'] = "Indstilling";
$_lang['contentblocks.settings'] = "Indstillinger";
$_lang['contentblocks.settings.layout_description'] = "Settings are user-defined properties that can be tweaked when a layout has been added to the content. The setting values are then available in the template as placeholders, for example [[+class]] for a setting with reference \"class\".";
$_lang['contentblocks.settings.field_description'] = "Settings are user-defined properties that can be tweaked when a field has been added to the content by clicking the cog icon in the top right of the field. The setting values are then available in the template as placeholders, for example [[+class]] for a setting with reference \"class\".";
$_lang['contentblocks.input'] = "Inputtype";
$_lang['contentblocks.inputs'] = "Inputtyper";
$_lang['contentblocks.name'] = "Navn";
$_lang['contentblocks.columns'] = "Kolonner";
$_lang['contentblocks.columns.description'] = "Columns define how the layout is displayed in the manager, where the width is defined as a percentage. The reference is used for a placeholder which you can use in the Template.";
$_lang['contentblocks.sortorder'] = "Sorteringsrækkefølge";
$_lang['contentblocks.icon'] = "Ikon";
$_lang['contentblocks.description'] = "Beskrivelse";
$_lang['contentblocks.template'] = "Skabelon";
$_lang['contentblocks.template.description'] = "The template for the layout has several available placeholders, depending on the Columns and Settings you define in the tabs on the left.";
$_lang['contentblocks.width'] = "Bredde";
$_lang['contentblocks.width.description'] = "The width of the field (in percentages) that this field will take up in the canvas. Fields are floated left so you can create some basic layouts with this option.";
$_lang['contentblocks.save'] = "Gem";
$_lang['contentblocks.reference'] = "Reference";
$_lang['contentblocks.default_value'] = "Standardværdi";
$_lang['contentblocks.fieldtype'] = "Felttype";
$_lang['contentblocks.fieldtype.select'] = "Vælg";
$_lang['contentblocks.fieldtype.radio'] = "Radio indstillinger";
$_lang['contentblocks.fieldtype.checkbox'] = "Afkrydsningsfelt muligheder";
$_lang['contentblocks.fieldtype.textfield'] = "Tekst";
$_lang['contentblocks.fieldtype.link'] = "Link";
$_lang['contentblocks.fieldtype.textarea'] = "Textarea";
$_lang['contentblocks.fieldtype.richtext'] = "Rich text";
$_lang['contentblocks.fieldtype.image'] = "Image";
$_lang['contentblocks.fieldoptions'] = "Field Options";
$_lang['contentblocks.fieldoptions.description'] = "Used for Select field types only. Define available values as \"placeholder_value==Displayed Value\" (\"Displayed Value=placeholder_value\" is also supported, but will be removed in 2.0), one per line. If you only pass a single value per line (such as \"foo\"), that will be used as both displayed and placeholder value.";
$_lang['contentblocks.field_is_exposed'] = "Expose field";
$_lang['contentblocks.field_is_exposed.description'] = "Show field on canvas instead of only after clicking settings icon";
$_lang['contentblocks.field_is_exposed.modal'] = "Show field setting in modal window";
$_lang['contentblocks.field_is_exposed.exposedassetting'] = "Expose field on canvas as a setting";
$_lang['contentblocks.field_is_exposed.exposedasfield'] = "Expose field on canvas as a regular field";
$_lang['contentblocks.process_tags'] = "Process tags";
$_lang['contentblocks.process_tags.description'] = "When enabled, tags in the input options will be processed with the MODX parser before being used.";

$_lang['contentblocks.directory'] = 'Directory';
$_lang['contentblocks.directory.description'] = 'A subfolder within the media source (whether overridden or using the ContentBlocks system setting) where files should be uploaded to.';
$_lang['contentblocks.crops'] = 'Crops';
$_lang['contentblocks.crops.description'] = 'A definition of crops to allow for the image. Each unique crop is separated by a pipe symbol (|) and contains a name, followed by a colon (:), and then comma-separated options. Each option has a name and a value. For example, this is a valid crops definition with some options: <code>small:width=200,height=200,aspect=1|medium:width=500,aspect=0.7|large:height=750</code>';
$_lang['contentblocks.crop_directory'] = 'Crops Directory';
$_lang['contentblocks.crop_directory.description'] = 'A subfolder within the media source (whether overridden or using the ContentBlocks system setting) that will contain crops created for images.';
$_lang['contentblocks.open_crops_automatically'] = 'Open cropper automatically';
$_lang['contentblocks.open_crops_automatically.description'] = 'When enabled, the cropper will be immediately opened after adding an image to the field.';
$_lang['contentblocks.file_types'] = 'Allowed File Extensions';
$_lang['contentblocks.file_types.description'] = 'Files with these extensions (comma-separated) will be uploaded. For no restriction, leave blank.';
$_lang['contentblocks.file_types.disallowed'] = 'File type not allowed in this field';

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
$_lang['contentblocks.templates'] = 'Templates';
$_lang['contentblocks.templates_desc'] = 'Templates are predefined sets of Layouts and Fields that can be used as shortcut for adding content to the canvas. ';
$_lang['contentblocks.add_template'] = 'Add Template';
$_lang['contentblocks.edit_template'] = 'Edit Template';
$_lang['contentblocks.duplicate_template'] = 'Duplicate Template';
$_lang['contentblocks.export_template'] = 'Export Template';
$_lang['contentblocks.export_templates'] = 'Export Templates';
$_lang['contentblocks.import_templates'] = 'Import Templates';
$_lang['contentblocks.import_templates.title'] = 'Import Templates';
$_lang['contentblocks.import_templates.intro'] = 'By uploading an XML file and choosing the right import mode, you can import Templates you exported before or from a different site. <b>Note:</b> Templates contain references to Field and Layout IDs; if you are importing Templates, you will probably need to import Layouts and Fields from the same place as well.';
$_lang['contentblocks.delete_template'] = 'Delete Template';
$_lang['contentblocks.delete_template.confirm'] = 'Are you sure you want to delete this Template?';


// Input types
$_lang['contentblocks.chunk'] = "Chunk";
$_lang['contentblocks.chunk.description'] = "Define a chunk to be inserted into the content.";
$_lang['contentblocks.chunk.choose_chunk'] = "Choose Chunk";
$_lang['contentblocks.chunk.choose_chunk.description'] = "Choose the chunk that needs to be inserted.";
$_lang['contentblocks.chunk_template.description'] = "A template for the chunk. Available placeholders: <code>[[+tag]]</code>, <code>[[+chunk_name]]</code>";
$_lang['contentblocks.chunk.custom_preview'] = "Custom Preview";
$_lang['contentblocks.chunk.custom_preview.description'] = "By default if this field is left empty, the Chunk Input will load the actual chunk and display that as preview. If you want, you can override that preview by entering the HTML for the preview here.";
$_lang['contentblocks.chunk.no_chunk_set'] = "Uh oh.. there is no chunk defined for this field.";

$_lang['contentblocks.chunkselector'] = 'Chunk Selector';
$_lang['contentblocks.chunk_selector_template.description'] = 'The template for the selected chunk. Available placeholders: <code>[[+value]]</code> (contains the full chunk tag), <code>[[+chunk_name]]</code> (contains the name of the selected chunk)';
$_lang['contentblocks.chunkselector.description'] = 'Choose a chunk to display';
$_lang['contentblocks.chunkselector.available_chunks'] = "Name or IDs of allowed chunks (Optional)";
$_lang['contentblocks.chunkselector.available_chunks.description'] = "To limit the available chunks for the editor, specify a comma separated list of chunks names or IDs. Chunks in this list will always be available, irrespective of the other properties below.";
$_lang['contentblocks.chunkselector.available_categories'] = "Categories";
$_lang['contentblocks.chunkselector.available_categories.description'] = "Specify a list of category names or IDs to limit the available chunks to.";

$_lang['contentblocks.code'] = "Code";
$_lang['contentblocks.code.description'] = "Shows a textarea with code highlighting.";
$_lang['contentblocks.code_template.description'] = "The value of the code input is stored in the <code>[[+value]]</code> placeholder. Depending on your anticipated usage of this field, you would just add the placeholder to the template, or you would encode it (e.g. by doing <code>&lt;pre&gt;&lt;code&gt;[[+value:htmlent]]&lt;/code&gt;&lt;/pre&gt;) for display instead of execution. The <code>[[+lang]]</code> placeholder contains the selected language in the dropdown.";
$_lang['contentblocks.code.available_languages'] = "Available Languages";
$_lang['contentblocks.code.available_languages.description'] = "Specify a comma-separated list of <code>value=display</code> entries for the available languages with syntax highlighting. If there is only one language specified, it will be selected and the language dropdown hidden.";
$_lang['contentblocks.code.default_language'] = "Standardsprog";
$_lang['contentblocks.code.default_language.description'] = "The language to select by default.";
$_lang['contentblocks.code.language'] = "Sprog";
$_lang['contentblocks.code.entities'] = "Encode Entities?";
$_lang['contentblocks.code.entities.description'] = "When enabled, the entered code will have entities and MODX tags encoded for displaying code.";

$_lang['contentblocks.file'] = 'Filinput';
$_lang['contentblocks.file.description'] = 'Tilføj filer til link';
$_lang['contentblocks.file_template.description'] = 'Valid placeholders are <code>[[+url]]</code>, <code>[[+title]]</code>, <code>[[+size]]</code> (in bytes), <code>[[+upload_date]]</code>, and <code>[[+extension]]</code>';
$_lang['contentblocks.file.remove_file'] = 'Fjern fil';
$_lang['contentblocks.file.file.or_drop_files'] = 'or drop files here';
$_lang['contentblocks.file.max_files'] = 'Maximum number of files';
$_lang['contentblocks.file.max_files.description'] = 'Defines the maximum number of files allowed per upload field. Additional files over the limit will be refused.';
$_lang['contentblocks.file.max_files.reached'] = 'Sorry, you cannot use more than [[+max]] files in this section.';
$_lang['contentblocks.file.directory'] = 'Mappe';
$_lang['contentblocks.file.directory.description'] = 'A subfolder within the media source (whether overridden or using the ContentBlocks system setting)';
$_lang['contentblocks.file.file_types'] = 'Allowed File Extensions';
$_lang['contentblocks.file.file_types.description'] = 'Files with these extensions (comma-separated) will be uploaded. For no restriction, leave blank.';
$_lang['contentblocks.file.file_types.disallowed'] = 'File type not allowed in this field';
$_lang['contentblocks.file.choose_file'] = 'Vælg fil';
$_lang['contentblocks.file.wrapper_template.description'] = "Outer most template for link lists. This should probably contain a <code>&lt;ul&gt;</code> tag. Available placeholder: <code>[[+files]]</code> (list items templated with the other template).";


$_lang['contentblocks.gallery'] = "Galleri";
$_lang['contentblocks.gallery.description'] = "A simple gallery input featuring easy multi-image uploads, drag/drop sorting and title attributes.";
$_lang['contentblocks.gallery_template.description'] = "Used to wrap individual images. Available placeholders:  <code>[[+url]]</code> (the full link to the image), <code>[[+title]]</code> (the entered title for the image), <code>[[+size]]</code>, <code>[[+extension]]</code>";
$_lang['contentblocks.gallery_wrapper_template.description'] = "Used for wrapping all images in (as container). Available placeholders: <code>[[+images]]</code>";
$_lang['contentblocks.gallery_max_images.description'] = "Defines the maximum number of images allowed per gallery. Additional images over the limit will be refused.";
$_lang['contentblocks.gallery.thumb_size'] = "Thumbnail Size";
$_lang['contentblocks.gallery.thumb_size.description'] = "Choose one of the options to define how small/big the thumbnails are displayed in the canvas.";
$_lang['contentblocks.gallery.thumb_size.small'] = "Lille";
$_lang['contentblocks.gallery.thumb_size.medium'] = "Mellem";
$_lang['contentblocks.gallery.thumb_size.large'] = "Stor";
$_lang['contentblocks.gallery.show_description'] = "Vis beskrivelse";
$_lang['contentblocks.gallery.show_description.description'] = "Show a Description box to allow the editor to add a longer description to each of the images.";
$_lang['contentblocks.gallery.show_link_field'] = "Show Link field";
$_lang['contentblocks.gallery.show_link_field.description'] = "Show a link field so images can be linked to resources or external websites.";

$_lang['contentblocks.heading'] = "Overskrift";
$_lang['contentblocks.heading.description'] = "A combination of a select field for the heading level, and a textfield.";
$_lang['contentblocks.heading_template.description'] = "Template for the heading field. Available placeholders are <code>[[+level]]</code> (the value of the level dropdown) and <code>[[+value]]</code>(the value of the text input).";
$_lang['contentblocks.default_level'] = "Default Level";
$_lang['contentblocks.available_levels'] = "Available Levels";
$_lang['contentblocks.heading_default_level.description'] = "The value that should be selected by default on new instances of the Heading input.";
$_lang['contentblocks.heading_available_levels.description'] = "A list, separated by commas, of <code>value=display</code> items for available levels in the dropdown. For the display value, a lexicon prefix of <code>contentblocks.</code> is checked and used if available. Example: <code>h1=heading_1, h2=Second Level,h3=heading_3</code>";
$_lang['contentblocks.heading_1'] = "Overskrift 1";
$_lang['contentblocks.heading_2'] = "Overskrift 2";
$_lang['contentblocks.heading_3'] = "Overskrift 3";
$_lang['contentblocks.heading_4'] = "Overskrift 4";
$_lang['contentblocks.heading_5'] = "Overskrift 5";
$_lang['contentblocks.heading_6'] = "Overskrift 6";

$_lang['contentblocks.hr'] = "Vandret streg";
$_lang['contentblocks.hr.description'] = "Simple placeholder for a <hr> tag to insert a horizontal line.";
$_lang['contentblocks.hr_template.description'] = "How to display the horizontal row. No placeholders are available, but using the <code>&lt;hr&gt;</code> tag here is recommended.";

$_lang['contentblocks.image'] = "Image";
$_lang['contentblocks.image.description'] = "Input type with easy image upload or selection.";
$_lang['contentblocks.image.source'] = "Media Source Override";
$_lang['contentblocks.image.source.description'] = "Leave this at (none) to use the system default media source for images, or choose a specific media source to override that setting for this specific field.";
$_lang['contentblocks.image_template.description'] = "Template for the image input type. Should probably include an <code>&lt;img&gt;</code> tag. Available Placeholders: <code>[[+url]]</code>, <code>[[+size]]</code>, <code>[[+width]]</code>, <code>[[+height]]</code>, <code>[[+extension]]</code>";
$_lang['contentblocks.imagewithtitle'] = "Image with Title";
$_lang['contentblocks.imagewithtitle.description'] = "Same as image, but this time with a textfield to add an alt or title attribute.";
$_lang['contentblocks.image_with_title'] = "Image with Title";
$_lang['contentblocks.image_with_title_template.description'] = "Template for the image input type. Should probably include an <code>&lt;img&gt;</code> tag. Available placeholders: <code>[[+url]]</code>, <code>[[+title]]</code>, <code>[[+size]]</code>, <code>[[+width]]</code>, <code>[[+height]]</code>, <code>[[+extension]]</code>";

$_lang['contentblocks.list'] = "List";
$_lang['contentblocks.condensed_list'] = 'Condensed List';
$_lang['contentblocks.list.description'] = "Input type for easily building (nested) unordered lists.";
$_lang['contentblocks.list_template.description'] = "Template for individual list items. This should probably contain a <code>&lt;li&gt;</code> tag. Available placeholders: <code>[[+value]]</code> (the list item text), <code>[[+idx]]</code> (an incrementing item number, starting at 1 on each level) and <code>[[+items]]</code> (sub-lists, templated with the other templates).";
$_lang['contentblocks.list_wrapper_template.description'] = "Outer most template for lists. This should probably contain a <code>&lt;ul&gt;</code> tag. Available placeholder: <code>[[+items]]</code> (list items templated with the other templates).";
$_lang['contentblocks.list_nested_template.description'] = "Inner template for indented sub-lists. This should probably contain a <code>&lt;ul&gt;</code> tag. Available placeholder: <code>[[+items]]</code> (list items templated with the other templates).";

$_lang['contentblocks.orderedlist'] = "Ordered List";
$_lang['contentblocks.orderedlist.description'] = "Same as the List type, except with an ordered list instead.";
$_lang['contentblocks.ordered_list'] = "Ordered List";
$_lang['contentblocks.ordered_list_template.description'] = "Template for individual list items. This should probably contain a <code>&lt;li&gt;</code> tag. Available placeholders: <code>[[+value]]</code> (the list item text), <code>[[+idx]]</code> (an incrementing item number, starting at 1 on each level) and <code>[[+items]]</code> (sub-lists, templated with the other templates).";
$_lang['contentblocks.ordered_list_wrapper_template.description'] = "Outer most template for ordered lists. This should probably contain a <code>&lt;ol&gt;</code> tag. Available placeholder: <code>[[+items]]</code> (list items templated with the other templates).";
$_lang['contentblocks.ordered_list_nested_template.description'] = "Inner template for indented sub-lists. This should probably contain a <code>&lt;ol&gt;</code> tag. Available placeholder: <code>[[+items]]</code> (list items templated with the other templates).";

$_lang['contentblocks.quote'] = "Citat";
$_lang['contentblocks.quote.description'] = "Textarea field combined with a small textfield for quote citations.";
$_lang['contentblocks.quote_template.description'] = "Template for the quote, should probably included a <code>&lt;blockquote&gt;</code> and <code>&lt;cite&gt;</code> tag. Available placeholders: <code>[[+value]]</code> (the quote input) and <code>[[+cite]]</code> (the small author input).";
$_lang['contentblocks.quote.author'] = "Forfatter";

$_lang['contentblocks.repeater'] = "Gentager";
$_lang['contentblocks.repeater.description'] = "Allows you to define a group of fields, that the editor can then repeat as a group.";
$_lang['contentblocks.repeater_template.description'] = "The template for each individual row in the repeater. There is no default as it completely depends on your groups configuration! For each of the Fields you define, you also need to set a key. The repeater will first parse all of the defined fields through their own processor (so an image field is first parsed as if it were a standalone image field), and the result of that is set into the placeholder based on the key. Please consult the documentation at modmore.com for a more in-depth instruction of how the repeater field works. Also supports a <code>[[+idx]]</code> placeholder.";
$_lang['contentblocks.repeater.width'] = "Width (in %)";
$_lang['contentblocks.repeater.key'] = "Nøgle";
$_lang['contentblocks.repeater.key.description'] = "The key by which the value of this field are available in the Repeater template. ";
$_lang['contentblocks.repeater.group'] = "Group";
$_lang['contentblocks.repeater.group.description'] = "The Repeater field lets you repeat a group of fields. This is where you define the fields that are repeated.";
$_lang['contentblocks.repeater.max_items'] = "Maximum number of Items";
$_lang['contentblocks.repeater.max_items.description'] = "When set to a number larger than 0, additional rows cannot be added beyond this limit.";
$_lang['contentblocks.repeater.max_items_reached'] = "Sorry, you are not allowed to add more than [[+max]] items.";
$_lang['contentblocks.repeater.min_items'] = "Minimum number of Items";
$_lang['contentblocks.repeater.min_items.description'] = "When set to a number larger than 0, rows cannot be removed beyond this limit.";
$_lang['contentblocks.repeater.add_first_item'] = "Automatically add first item";
$_lang['contentblocks.repeater.add_first_item.description'] = "When enabled the Repeater will automatically get a first item added if there are none added yet.";
$_lang['contentblocks.repeater.add_item'] = "Tilføj element";
$_lang['contentblocks.repeater.delete_item'] = "Slet element";
$_lang['contentblocks.repeater.wrapper_template.description'] = "Outer template to wrap all other parsed rows in. Should contain the <code>[[+rows]]</code> placeholder, can also contain <code>[[+total]]</code>, .";
$_lang['contentblocks.repeater.row_separator'] = "Rækkeseparator";
$_lang['contentblocks.repeater.row_separator.description'] = "A string to glue together individual rows. This could just be some line breaks, like in the default, or it could be a bunch of html you want in between rows.";
$_lang['contentblocks.repeater.manager_columns'] = "Manager Columns";
$_lang['contentblocks.repeater.manager_columns.description'] = "Number of columns a repeater should display as in manager. Possible values are 1-4";
$_lang['contentblocks.repeater.layout_style'] = "Layout style";
$_lang['contentblocks.repeater.layout_style.description'] = "Format for laying out a repeater (mini is similar to a table view)";
$_lang['contentblocks.repeater.condensed'] = "Condensed";
$_lang['contentblocks.repeater.mini'] = "Mini";
$_lang['contentblocks.repeater.default'] = "Default";

$_lang['contentblocks.richtext'] = "Rich Text";
$_lang['contentblocks.richtext.description'] = "Simple Rich Text field. Supports both TinyMCE and Redactor.";
$_lang['contentblocks.richtext_template.description'] = "As rich text fields typically handle their own markup generation, the template for a rich text input is typically just the <code>[[+value]]</code> placeholder, though you could wrap it in a container or something.";

$_lang['contentblocks.table'] = "Tabel";
$_lang['contentblocks.table.description'] = "Interactive widget for tabular data.";
$_lang['contentblocks.table_template.description'] = "Template for each of the table cells. Should probably include a &lt;td&gt; tag. Available placeholder: <code>[[+cell]]</code>, <code>[[+colIdx]]</code>, <code>[[+colTotal]]</code>";
$_lang['contentblocks.table.row_template'] = "Row Template";
$_lang['contentblocks.table.row_template.description'] = "The template for each of the rows in the table, probably contains a <code>&lt;tr&gt;</code> tag. Available placeholder: <code>[[+row]]</code> (contains each of the cells in this row), <code>[[+idx]]</code>";
$_lang['contentblocks.table.wrapper_template.description'] = "The wrapper template for the entire table. Available placeholder: <code>[[+body]]</code>, <code>[[+total]]</code>.";

$_lang['contentblocks.textarea'] = "Tekstområde";
$_lang['contentblocks.textarea.description'] = "Simple multi-line text field.";

$_lang['contentblocks.textfield'] = "Tekstfelt";
$_lang['contentblocks.textfield.description'] = "Simple single-line text field.";
$_lang['contentblocks.textfield_template.description'] = "For the textfield simply use the <code>[[+value]]</code> placeholder with a container of choice (a paragraph, heading etc).";
$_lang['contentblocks.textarea_template.description'] = "For the text area you can use the <code>[[+value]]</code> placeholder with a container of choice (a paragraph, heading etc). If you want to support line breaks without adding markup to the field, try applying the <code>nl2br</code> output filter.";

$_lang['contentblocks.video'] = "Video";
$_lang['contentblocks.video.description'] = "YouTube integration allowing keyword search and pasting in YouTube links to insert videos easily.";
$_lang['contentblocks.video_template.description'] = "When using a Video input, the YouTube Video ID is stored in the <code>[[+value]]</code> placeholder. This can be used to generate the embed code in this template.";
$_lang['contentblocks.video.search'] = "Søg!";
$_lang['contentblocks.video.search_introduction'] = "Use the search box below to search YouTube for videos.";
$_lang['contentblocks.video.enter_keywords'] = "Enter one or more keywords..";
$_lang['contentblocks.video.load_more_results'] = "Indlæs flere resultater";
$_lang['contentblocks.video.search_youtube'] = "Search YouTube";
$_lang['contentblocks.video.paste_link'] = "Paste a link here";
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
$_lang['contentblocks.snippet'] = "Kodestump (snippet)";
$_lang['contentblocks.snippet.description'] = "Allow the user to choose a snippet and enter properties for it.";
$_lang['contentblocks.snippet.available_snippets'] = "Name or IDs of allowed Snippets (Optional)";
$_lang['contentblocks.snippet.available_snippets.description'] = "To limit the available snippets for the editor, specify a comma separated list of snippet names or IDs. Snippets in this list will always be available, irrespective of the other properties below.";
$_lang['contentblocks.snippet.categories'] = "Categories";
$_lang['contentblocks.snippet.categories.description'] = "Specify a list of category names or IDs to limit the available snippets to.";
$_lang['contentblocks.snippet.add_property'] = "Add Property";
$_lang['contentblocks.snippet.choose_snippet'] = "Choose Snippet";
$_lang['contentblocks.snippet.other_property'] = "Other (manual input)";
$_lang['contentblocks.snippet.other_property.desc'] = "Any properties to add to the end of the snippet call can be specified here. Make sure to use the proper tag syntax, like this: &property=`value`";
$_lang['contentblocks.snippet.allow_uncached'] = "Allow Uncached?";
$_lang['contentblocks.snippet.allow_uncached.description'] = "When enabled, an \"Uncached?\" option will be available for snippets. If disabled all snippets will be called cached.";
$_lang['contentblocks.snippet.uncached'] = "Cache?";
$_lang['contentblocks.snippet.uncached_0'] = "Yes";
$_lang['contentblocks.snippet.uncached_1'] = "No, do not cache this snippet";
$_lang['contentblocks.snippet.none_available'] = "There are no snippets available for this Field.";
$_lang['contentblocks.snippet_template.description'] = "The snippet field creates a full MODX Snippet tag for you, which is available in <code>[[+value]]</code>, and the snippet name is in <code>[[+snippet_name]]</code>";

$_lang['contentblocks.layout_template.description'] = 'The template for this nested layout field. Keep in mind that any layouts contained within will also have their templates parsed. Available placeholder: <code>[[+value]]</code> (the fully parsed HTML from the contained layouts)';
$_lang['contentblocks.layoutfield.available_layouts'] = "Available Layout(s)";
$_lang['contentblocks.layoutfield.available_layouts.description'] = "Comma-separated list of layouts which should be allowed. To not allow any layouts, for example to only allow templates to be inserted, specify -1.";
$_lang['contentblocks.layoutfield.available_templates'] = "Available Template(s)";
$_lang['contentblocks.layoutfield.available_templates.description'] = "Comma-separated list of templates which should be allowed. To not allow any templates, specify -1.";

// Image related
$_lang['contentblocks.choose_image'] = "Choose Image";
$_lang['contentblocks.wrapper_template'] = "Wrapper Template";
$_lang['contentblocks.nested_template'] = "Nested Template";
$_lang['contentblocks.max_images'] = "Maximum amount of Images";
$_lang['contentblocks.max_images_reached'] = "Sorry, you cannot use more than [[+max]] images in this Gallery.";
$_lang['contentblocks.upload_error'] = "Uh oh, something went wrong uploading [[+file]]: [[+message]]";
$_lang['contentblocks.upload_error.file_too_big'] = "\"\n\nThe file may have been too big.";
$_lang['contentblocks.image.thumbnail_size'] = "Manager Thumbnail Size";
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
$_lang['contentblocks.use_contentblocks'] = "Use ContentBlocks?";
$_lang['contentblocks.use_contentblocks.description'] = "When enabled, the content area will be replaced with a ContentBlocks canvas for creating multi-column, structured content.";
$_lang['contentblocks.or'] = "eller";
$_lang['contentblocks.title'] = "Titel";
$_lang['contentblocks.delete'] = "Slet";
$_lang['contentblocks.delete_video'] = "Slet video";
$_lang['contentblocks.move_layout_up'] = "Flyt op";
$_lang['contentblocks.move_layout_down'] = "Flyt ned";
$_lang['contentblocks.delete_image'] = "Slet billede";
$_lang['contentblocks.crop_image'] = 'Crop Image';
$_lang['contentblocks.crop_image.introduction'] = 'Create alternative sizes for your image. Select the crop to adjust below the preview, and use the drag tools to select the region and size.';
$_lang['contentblocks.crop_image.preview'] = 'Preview of the image to crop.';
$_lang['contentblocks.search_fields'] = "Search fields";
$_lang['contentblocks.search_layouts_templates'] = "Search layouts and templates";
$_lang['contentblocks.add_content'] = "Tilføj indhold";
$_lang['contentblocks.add_content.introduction'] = "Please select the type of content to insert into the layout. Hover over the name to check a longer description.";
$_lang['contentblocks.add_layout'] = "Add Layout";
$_lang['contentblocks.add_layout.introduction'] = "Choose the Layout to add to the Content.";
$_lang['contentblocks.upload'] = "Upload";
$_lang['contentblocks.choose'] = "Vælg";
$_lang['contentblocks.from_url'] = "From URL";
$_lang['contentblocks.from_url_title'] = "Insert image from URL";
$_lang['contentblocks.from_url_prompt'] = "Enter an URL to an image to insert. This should be either a full URL to the image on a different website, or the relative url from the root of the website. The file will be saved on the server.";
$_lang['contentblocks.from_url_notfound'] = "The requested image could not be downloaded. ";
$_lang['contentblocks.image.or_drop_images'] = "or drop images here";
$_lang['contentblocks.image.or_drop_image'] = "or drop an image here";
$_lang['contentblocks.use_tinyrte'] = "Use Tiny RTE?";
$_lang['contentblocks.use_tinyrte.description'] = "When enabled, the input will be enhanced with a tiny rich text editor allowing for simple formatting (bold, italics and links).";
$_lang['contentblocks.use_tinyrte.description.image'] = "When enabled, the title input will be enhanced with a tiny rich text editor allowing for simple formatting (bold, italics and links). If you use the title input for alt text or a title attribute, you may need to do some extra processing (i.e. htmlentities) to prevent the added markup from breaking your img tag. ";

$_lang['contentblocks.rebuild_content'] = "Rebuild Content";
$_lang['contentblocks.rebuild_content.confirm'] = "By rebuilding the content, all resources will be regenerated from their structured content. This means all layouts and fields previously used will be parsed again and the old content overwritten. Depending on the size of the website, this can take between several seconds and several minutes. To start this process, please click Yes below.";
$_lang['contentblocks.rebuild_content.initialising'] = "Initialising...";
$_lang['contentblocks.rebuild_content.resources_found'] = "Found a total of [[+total]] resources. Rebuild will take ~ [[+estimate]] minutes.";
$_lang['contentblocks.rebuild_content.loading_dependencies'] = "Loading dependencies for parsing content...";
$_lang['contentblocks.rebuild_content.loaded_dependencies'] = "Dependencies load, starting to rebuild content...";
$_lang['contentblocks.rebuild_content.skipping_not_allowed'] = "Skipping #[[+id]] ([[+pagetitle]]), ContentBlocks is instructed to not act on this resource (Type: [[+class_key]])";
$_lang['contentblocks.rebuild_content.skipping_not_used'] = "Skipping #[[+id]] ([[+pagetitle]]), does not yet use ContentBlocks.";
$_lang['contentblocks.rebuild_content.skipping_corrupt'] = "Skipping #[[+id]] ([[+pagetitle]]), the content is invalid or missing.";
$_lang['contentblocks.rebuild_content.done'] = "Done rebuilding content! [[+total_rebuild]] resources were rebuilt, [[+total_skipped]] were skipped and [[+total_skipped_broken]] were skipped because of invalid content.";
$_lang['contentblocks.rebuild_content.clear_cache'] = "Clearing the cache for context(s): [[+contexts]]";
$_lang['contentblocks.rebuild_content.clear_cache_complete'] = "Cache cleared. All done!";
$_lang['contentblocks.generating_canvas'] = "Generating your Content Canvas... this should only take a moment.";
$_lang['contentblocks.content'] = "Template Contents";
$_lang['contentblocks.open_template_builder'] = "Build Template";
$_lang['contentblocks.template_builder'] = "Template Builder";
$_lang['contentblocks.close_modal'] = "Close Modal";


/**
 * Settings. Oh boy.
 */

$_lang['setting_contentblocks.accepted_resource_types'] = "Accepted Resource Types";
$_lang['setting_contentblocks.accepted_resource_types_desc'] = "A comma separated list of resource Class Keys that ContentBlocks will attempt to enhance. ";

$_lang['setting_contentblocks.clear_cache_after_rebuild'] = "Clear Cache after Rebuild";
$_lang['setting_contentblocks.clear_cache_after_rebuild_desc'] = "When enabled the Rebuild Content feature in the component will automatically clear the resource cache when it is complete.";

$_lang['setting_contentblocks.default_modal_view'] = "Default modal view";
$_lang['setting_contentblocks.default_modal_view_desc'] = "How fields, layouts, and templates should be viewed in the modal when adding to the canvas. Possible values are default, condensed, and expanded.";

$_lang['setting_contentblocks.debug'] = "Debug";
$_lang['setting_contentblocks.debug_desc'] = "When enabled ContentBlocks will use non-minified javascript in the manager to make it easier to debug issues.";

$_lang['setting_contentblocks.disabled'] = "Disabled";
$_lang['setting_contentblocks.disabled_desc'] = "Set this setting to 1 to completely disable ContentBlocks on this site. This can be overridden on the context level to only use it on specific contexts. ";

$_lang['setting_contentblocks.show_resource_option'] = "Show Resource Option";
$_lang['setting_contentblocks.show_resource_option_desc'] = "When enabled you will have the option to enable or disable ContentBlocks on specific resources, with the 'Use ContentBlocks' option on the resource settings.";

$_lang['setting_contentblocks.canvas_position'] = "Canvas Position";
$_lang['setting_contentblocks.canvas_position_desc'] = 'Where to place the content canvas. When set to "inherit", the canvas will replace the content field in the same location. This is the recommended mode for Revolution 2.x. When set to "block", the content will be placed in a separate block below the resource tabs panel. When set to "tab1" or "tab2", the content will be placed in a Content tab at either the first or second place. If a Content tab already exists (e.g., from MoreGallery), it will place it in that tab instead of a new one.';

$_lang['setting_contentblocks.implode_string'] = "Implode String";
$_lang['setting_contentblocks.implode_string_desc'] = "The glue between individual field and layout outputs when parsing the content. ";

$_lang['setting_contentblocks.default_layout'] = "Default Layout";
$_lang['setting_contentblocks.default_layout_desc'] = "Specify the ID of the default layout to use on new resources, or resources that have not yet been used with ContentBlocks. As of 1.2, this only applies when no Default Template is found.";

$_lang['setting_contentblocks.default_layout_part'] = "Default Column";
$_lang['setting_contentblocks.default_layout_part_desc'] = "Specify the reference of a column in the Default Layout you specified. On new resources or resources that have not yet been used with ContentBlocks, a field (defined with the Default Field setting) will be inserted into this column with the content. As of 1.2, this only applies when no Default Template is found.";

$_lang['setting_contentblocks.default_field'] = "Default Field";
$_lang['setting_contentblocks.default_field_desc'] = "Specify the ID of a field to insert into the default column of the default layout you specified. When set to 0, a simple rich text or textarea field will be used. As of 1.2, this only applies when no Default Template is found.";

$_lang['setting_contentblocks.defaults_allowed_inputs'] = "Allowed Inputs in Default Templates";
$_lang['setting_contentblocks.defaults_allowed_inputs_desc'] = "A comma separated list of input types (names) that are available in the \"Target Field\" dropdown when creating or editing default templates.";

$_lang['setting_contentblocks.code.theme'] = "Code Theme";
$_lang['setting_contentblocks.code.theme_desc'] = "The theme to use for the Code Input. Refer to the Ace documentation to find the possibilities.";

$_lang['setting_contentblocks.image.hash_name'] = "Hash Name";
$_lang['setting_contentblocks.image.hash_name_desc'] = "When enabled uploaded files will be hashed to obfuscate the original file names.";

$_lang['setting_contentblocks.image.prefix_time'] = "Prefix Time";
$_lang['setting_contentblocks.image.prefix_time_desc'] = "When enabled uploaded files will have their name prepended with a unix timestamp.";

$_lang['setting_contentblocks.image.sanitize'] = "Sanitize";
$_lang['setting_contentblocks.image.sanitize_desc'] = "When enabled uploaded file names will be sanitized before upload to make sure there are no funky characters. Sanitization also supports using transliteration with iconv or third party translit libraries.";

$_lang['setting_contentblocks.image.source'] = "Source";
$_lang['setting_contentblocks.image.source_desc'] = "Choose the default media source to use for image and gallery input types. This can be overriden on the Field level.";

$_lang['setting_contentblocks.image.upload_path'] = "Upload Path";
$_lang['setting_contentblocks.image.upload_path_desc'] = "The path, within the chosen media source, to which the images should be uploaded. This supports [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] and [[+resource]] placeholders. Resource fields are also available, like [[+pagetitle]] or [[+alias]], and template variables with [[+tv.name_of_tv]]. This value can be overridden per field by editing its properties.";
$_lang['setting_contentblocks.image.crop_path'] = "Cropped Images Path";
$_lang['setting_contentblocks.image.crop_path_desc'] = "The path, within the chosen media source, where cropped images should be saved. This supports [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] and [[+resource]] placeholders. Resource fields are also available, like [[+pagetitle]] or [[+alias]], and template variables with [[+tv.name_of_tv]]. This value can be overridden per image field by editing its properties.";

$_lang['setting_contentblocks.file.upload_path'] = "Upload Path";
$_lang['setting_contentblocks.file.upload_path_desc'] = "The path, within the chosen media source, to which the files should be uploaded. This supports [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] and [[+resource]] placeholders. Resource fields are also available, like [[+pagetitle]] or [[+alias]], and template variables with [[+tv.name_of_tv]]. This value can be overridden per field by editing its properties.";

$_lang['setting_contentblocks.sanitize_pattern'] = "Sanitize Pattern";
$_lang['setting_contentblocks.sanitize_pattern_desc'] = "A RegEx pattern to use in sanitizing file names that need to be sanitized.";

$_lang['setting_contentblocks.sanitize_replace'] = "Sanitize Replacement";
$_lang['setting_contentblocks.sanitize_replace_desc'] = "A string to replace occurrences of the RegEx pattern for sanitization with.";

$_lang['setting_contentblocks.custom_icon_path'] = "Custom icon path";
$_lang['setting_contentblocks.custom_icon_path_desc'] = "Path to custom icons. {assets_path} is allowed.";

$_lang['setting_contentblocks.custom_icon_url'] = "Custom icon URL";
$_lang['setting_contentblocks.custom_icon_url_desc'] = "URL to custom icons. {assets_url} is allowed.";

$_lang['setting_contentblocks.translit'] = "Transliteration";
$_lang['setting_contentblocks.translit_desc'] = "When set to a value that is not \"none\" or empty, this will enable transliteration prior to the sanitization process, enabling translating of invalid characters to valid ones. If this value is empty, it will inherit from the core \"friendly_alias_translit\" setting.";

$_lang['setting_contentblocks.hide_logo'] = "Hide Logo";
$_lang['setting_contentblocks.hide_logo_desc'] = "By default we show a small modmore logo in the bottom right of the ContentBlocks component. If for whatever reason you don't want it there, simply enable this setting and it will disappear.";

$_lang['setting_contentblocks.translit_class'] = "Translit Class";
$_lang['setting_contentblocks.translit_class_desc'] = "The name of the class to use for transliteration. If this value is empty, it will inherit from the core \"friendly_alias_translit_class\" setting.";
$_lang['setting_contentblocks.translit_class_path'] = "Translit Class Path";
$_lang['setting_contentblocks.translit_class_path_desc'] = "The path to the class to use for transliteration. If this value is empty, it will inherit from the core \"friendly_alias_translit_class_path\" setting.";

$_lang['setting_contentblocks.base_url_mode'] = "Base URL Mode";
$_lang['setting_contentblocks.base_url_mode_desc'] = "When uploading images, the URLs are automatically normalised in a way relative to the base url to ensure they show up in the front and back-end. Depending on your MODX setup, especially in multi-context sites, you might need to change this mode for images to show in the front-end. The accepted values are: <code>relative</code> (default: images are relative to the MODX base url), <code>absolute</code> (image urls contain the MODX base url) or <code>full</code> (images contain the full MODX site url)";

$_lang['setting_contentblocks.remove_content_dom'] = "Remove Content DOM";
$_lang['setting_contentblocks.remove_content_dom_desc'] = "When enabled, the previously existing content field (potentially including an enabled rich text editor) will be completely removed from the page when ContentBlocks is initialised. In some cases where the rich text editor remaining in a hidden state can cause conflicts with ContentBlocks, and enabling this option can help with that.";
