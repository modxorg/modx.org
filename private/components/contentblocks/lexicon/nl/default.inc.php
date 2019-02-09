<?php
$_lang['contentblocks'] = "Content Blocks";
$_lang['contentblocks.menu'] = "Content Blocks Beheer";
$_lang['contentblocks.menu_desc'] = "Beheer de Content Blocks velden en layouts.";
$_lang['contentblocks.mgr.home'] = "Content Blocks Beheer";

$_lang['contentblocks.general'] = "Algemeen";
$_lang['contentblocks.properties'] = "Eigenschappen";
$_lang['contentblocks.clear_filters'] = "Filters legen";
$_lang['contentblocks.search'] = "Zoeken";

$_lang['contentblocks.link'] = "Koppeling";
$_lang['contentblocks.link.description'] = "Een veld waarmee koppelingen aangemaakt kunnen worden. Dit ondersteund documenten, email en URL's.";
$_lang['contentblocks.link_template.description'] = "Een template voor de koppeling. Beschikbare placeholders: <code>[[+link]]</code>, <code>[[+link_raw]]</code>, <code>[[+linkType]]</code>";
$_lang['contentblocks.link.resource'] = "Document";
$_lang['contentblocks.link.url'] = "URL";
$_lang['contentblocks.link.email'] = "E-mailadres";
$_lang['contentblocks.link.link_new_tab'] = "Open in nieuw tabblad";
$_lang['contentblocks.link.add'] = "Link toevoegen";
$_lang['contentblocks.link.remove'] = "Link verwijderen";
$_lang['contentblocks.link.placeholder'] = "Typ de naam van een document, externe link of e-mailadres";
$_lang['contentblocks.link.link_detection_pattern_override'] = 'Link detectie patroon override';
$_lang['contentblocks.link.link_detection_pattern_override.description'] = 'RegEx om te detecteren of een link geldig is; mocht dat niet het geval zijn dan wordt http:// voor de koppeling geplaatst.';
$_lang['contentblocks.link.limit_to_current_context'] = 'Beperk resultaten tot resources in de huidige context';
$_lang['contentblocks.link.limit_to_current_context.description'] = 'De resultaten voor de resource typeahead zullen gelimiteerd worden tot resources die zich in dezelfde context bevinden als de pagina die bewerkt wordt.';

$_lang['setting_contentblocks.link.link_detection_pattern'] = 'Link detectie patroon';
$_lang['setting_contentblocks.link.link_detection_pattern_desc'] = 'RegEx om te detecteren of een link geldig is; mocht dat niet het geval zijn dan wordt http:// voor de koppeling geplaatst.';

$_lang['setting_contentblocks.typeahead.include_introtext'] = 'Samenvatting opnemen in typeahead functionaliteit';
$_lang['setting_contentblocks.typeahead.include_introtext_desc'] = 'Wanneer deze instelling is ingeschakeld zal de zoekbox ook de introtekst van documenten tonen, waarbij je meer informatie over de gevonden documenten te zien krijgt.';

$_lang['contentblocks.error.not_an_export'] = "Het bestand lijkt geen ContentBlocks export te zijn.";
$_lang['contentblocks.error.importing_row'] = "Fout tijdens importeren:";
$_lang['contentblocks.error.no_valid_field'] = "Geen geldig veld gevonden voor de aanvraag.";
$_lang['contentblocks.error.no_valid_input'] = "Geen geldig input type gevonden voor aanvraag.";
$_lang['contentblocks.error.no_snippets'] = "Er zijn geen snippets beschikbaar.";
$_lang['contentblocks.error.missing_id'] = "ID waarde niet gevonden";
$_lang['contentblocks.error.input_not_found'] = "Input type niet gevonden";
$_lang['contentblocks.error.input_not_found.message'] = "Oeps. Een veld met input type \"[[+input]]\" werd geladen, maar dat input type bestaat niet.";
$_lang['contentblocks.error.field_not_found'] = "Veld niet gevonden.";
$_lang['contentblocks.error.category_not_found'] = "Categorie niet gevonden";
$_lang['contentblocks.error.layout_not_found'] = "Layout niet gevonden";
$_lang['contentblocks.error.error_saving_object'] = "Fout tijdens opslaan van het object";
$_lang['contentblocks.error.xml_not_loaded'] = "Kon het XML bestand niet laden";
$_lang['contentblocks.error.no_icons'] = "Kon de icons map niet openen";
$_lang['contentblocks.error.no_json'] = "Uw browser ondersteund geen JSON, wat voor ContentBlocks noodzakelijk is. Update alstublieft uw browser.";

$_lang['contentblocks.availability'] = "Beschikbaarheid";
$_lang['contentblocks.availability.layout_description'] = "Standaard zijn alle layouts altijd beschikbaar. Als je hieronder voorwaarden toevoegt dient tenminste één daarvan waar te zijn om deze Layout te kunnen gebruiken. Meerdere waardes kunnen gescheiden worden met een komma. ";
$_lang['contentblocks.availability.field_description'] = "Standaard zijn alle velden altijd beschikbaar. Als je hieronder voorwaarden toevoegt dient tenminste één daarvan waar te zijn om dit veld te kunnen gebruiken. Meerdere waardes kunnen gescheiden worden met een komma.";
$_lang['contentblocks.availability.template_description'] = "Standaard zijn alle templates altijd beschikbaar. Als je hieronder voorwaarden toevoegt dient tenminste één daarvan waar te zijn om deze Template te kunnen gebruiken. Meerdere waardes kunnen gescheiden worden met een komma.";
$_lang['contentblocks.add_condition'] = "Voorwaarde Toevoegen";
$_lang['contentblocks.edit_condition'] = "Voorwaarde Bewerken";
$_lang['contentblocks.delete_condition'] = "Verwijder Voorwaarde";
$_lang['contentblocks.delete_condition.confirm'] = "Weet je zeker dat je deze voorwaarde wilt verwijderen?";
$_lang['contentblocks.condition_field'] = "Veld";
$_lang['contentblocks.condition_field.resource'] = "Document ID";
$_lang['contentblocks.condition_field.parent'] = "Bovenliggend ID";
$_lang['contentblocks.condition_field.ultimateparent'] = "Uiterst Bovenliggend ID";
$_lang['contentblocks.condition_field.class_key'] = "Document Type";
$_lang['contentblocks.condition_field.context'] = "Context";
$_lang['contentblocks.condition_field.template'] = "Template (ID)";
$_lang['contentblocks.condition_field.usergroup'] = "Gebruikersgroep (naam)";
$_lang['contentblocks.condition_value'] = "Waarde(s)";
$_lang['contentblocks.availibility.layouts'] = "Layout(s)";
$_lang['contentblocks.availibility.layouts.description'] = "Beperk het gebruik van dit Veld tot één of meer (komma gescheiden) Layouts. Indien leeg zal dit veld beschikbaar zijn voor alle Layouts, anders wordt deze beperkt tot degene die je specificeerd. ";
$_lang['contentblocks.availibility.times_per_page'] = "Aantal keer per pagina";
$_lang['contentblocks.availibility.times_per_page.description'] = "Limiteer het gebruik van dit veld tot een bepaald aantal. Laat leeg om geen limiet in te stellen.";
$_lang['contentblocks.availibility.times_per_layout'] = "Aantal keer per layout";
$_lang['contentblocks.availibility.times_per_layout.description'] = "Limiteer het gebruik van dit veld tot een bepaald aantal per layout. Laat leeg om geen limiet in te stellen.";
$_lang['contentblocks.availibility.only_nested'] = "Alleen toestaan als geneste layout";
$_lang['contentblocks.availibility.only_nested.description'] = "Sta niet toe dat deze layout buiten een layout veld wordt gebruikt.";


$_lang['contentblocks.field_desc'] = "Velden zijn de grondlegging van ContentBlocks - zij definiëren precies hoeveel <em>Creative Freedom</em> editors zullen hebben in het beheer van hun content. Elk veld bestaat voornamelijk uit een input type en een template dat bepaalt hoe het wordt geparsed aan de front-end. Voor meer informatie over het correct gebruiken van Velden, klik op de Help knop rechtsboven in het scherm.";
$_lang['contentblocks.add_field'] = "Veld toevoegen";
$_lang['contentblocks.edit_field'] = "Veld bewerken";
$_lang['contentblocks.duplicate_field'] = "Veld dupliceren";
$_lang['contentblocks.delete_field'] = "Verwijder veld";
$_lang['contentblocks.delete_field.confirm'] = "Weet je zeker dat je dit veld wilt verwijderen? Potentieel rampzalige dingen kunnen gebeuren met alle content die dit Veld gebruiken.";
$_lang['contentblocks.delete_field.confirm.js'] = "Weet je zeker dat je dit veld wilt verwijderen?";
$_lang['contentblocks.delete_field.is_default'] = "Dit veld kan niet worden verwijderd, omdat deze is ingesteld als standaard. Dit is ingesteld met de <code>contentblocks.default_field</code> instelling. Voor meer informatie over het opzetten van standaard inhoud, zie de <a href=\"https://docs.modmore.com/en/ContentBlocks/v1.x/Default_Templates.html\" target=\"_blank\">Default Templates documentatie</a>.";
$_lang['contentblocks.export_field'] = "Exporteer veld";
$_lang['contentblocks.export_fields'] = "Exporteer";
$_lang['contentblocks.export_fields.confirm'] = "Na het klikken op Ja hieronder, zullen wij een XML export voorbereiden van alle Velden. Deze kan gebruikt worden om Velden te importeren in een andere installatie. Het genereren van deze XML kan enkele seconden duren, afhankelijk van het aantal Velden dat je hebt geconfigureerd.";
$_lang['contentblocks.import_fields'] = "Importeer";
$_lang['contentblocks.import_fields.title'] = "Importer Velden";
$_lang['contentblocks.import_fields.intro'] = "Door een XML bestand te uploaden en het kiezen van de juiste mode, kun je eerder geëxporteerde Velden van een andere site importeren. <b>Wees voorzichtig</b> met het importeren van Velden indien je al content hebt welke de huidige Velden gebruiken. Neem contact op met support@modmore.com als je niet zeker weet welke mode je moet kiezen bij het importeren.";

$_lang['contentblocks.layout_desc'] = "Ieder Layout is in essentie een horizontale rij, bestaande uit één of meer kolommen. Wanneer je een Resource bewerkt is elke kolom een lege content houder met een knop om content toe te voegen (middels Velden). Voor meer informatie over het correct gebruiken van Layouts, klik op  de Help knop rechts boven in het scherm.";
$_lang['contentblocks.add_layout'] = "Layout toevoegen";
$_lang['contentblocks.repeat_layout'] = "Herhaal Layout";
$_lang['contentblocks.switch_layout'] = "Verander layout";
$_lang['contentblocks.switch_layout.chooser.introduction'] = "Kies de layout die je wilt gebruiken. Na het kiezen van de layout kun je de bestaande velden aan nieuwe kolommen toewijzen.";
$_lang['contentblocks.switch_layout.introduction'] = "Sleep de velden hieronder om ze aan de gewenste kolom in de nieuwe layout toe te voegen. Voor je verder kunt gaan moeten alle velden toegewezen zijn aan een kolom.";
$_lang['contentblocks.cb_unassigned_fields'] = "Niet-toegewezen velden";
$_lang['contentblocks.unassigned_layout_settings'] = "Niet-toegewezen layout instellingen";
$_lang['contentblocks.unassigned_layout_settings.introduction'] = "Deze instellingen bestaan niet in de nieuwe layout, en hun waarden zullen verloren gaan.";
$_lang['contentblocks.edit_layout'] = "Layout bewerken";
$_lang['contentblocks.duplicate_layout'] = "Layout dupliceren";
$_lang['contentblocks.export_layout'] = "Exporteer layout";
$_lang['contentblocks.delete_layout'] = "Verwijder Layout";
$_lang['contentblocks.delete_layout.confirm'] = "Weet je zeker dat je dit Layout wilt verwijderen? Potentieel rampzalige dingen kunnen gebeuren met alle content die dit Veld gebruiken.";
$_lang['contentblocks.delete_layout.confirm.js'] = "Weet je zeker dat je de [[+layoutName]] layout wilt verwijderen? Alle inhoud zal worden verwijderd als je doorgaat.";
$_lang['contentblocks.delete_layout.is_default'] = "Deze layout kan niet worden verwijderd, omdat het is ingesteld als standaard layout. Dit is ingesteld met de <code>contentblocks.default_layout</code> instelling. Voor meer informatie over het instellen van standaard inhoud, zie de <a href=\"https://docs.modmore.com/en/ContentBlocks/v1.x/Default_Templates.html\" target=\"_blank\">Default Templates documentatie</a>.";
$_lang['contentblocks.export_layouts'] = "Exporteer";
$_lang['contentblocks.export_layouts.confirm'] = "Na het klikken op Ja hieronder, zullen wij een XML export voorbereiden van alle Layouts. Deze kan gebruikt worden om Layouts te importeren in een andere installatie. Het genereren van deze XML kan enkele seconden duren, afhankelijk van het aantal Layouts dat je hebt geconfigureerd.";
$_lang['contentblocks.import_layouts'] = "Importeer";
$_lang['contentblocks.import_layouts.title'] = "Importeer Layouts";
$_lang['contentblocks.import_layouts.intro'] = "Door een XML bestand te uploaden en het kiezen van de juiste mode, kun je eerder geëxporteerde Layouts van een andere site importeren. <b>Wees voorzichtig</b> met het importeren van Layouts indien je al content hebt welke de huidige Layouts gebruiken. Neem contact op met support@modmore.com als je niet zeker weet welke mode je moet kiezen bij het importeren.";

$_lang['contentblocks.layout_settings'] = "Layout Instellingen";
$_lang['contentblocks.layout_settings.modal_header'] = "[[+name]] Instellingen";

$_lang['contentblocks.field_settings'] = "Content Instellingen";
$_lang['contentblocks.field_settings.modal_header'] = "[[+name]] Instellingen";

$_lang['contentblocks.add_layoutcolumn'] = "Kolom toevoegen";
$_lang['contentblocks.edit_layoutcolumn'] = "Kolom bewerken";
$_lang['contentblocks.delete_layoutcolumn'] = "Verwijder kolom";
$_lang['contentblocks.delete_layoutcolumn.confirm'] = "Weet je zeker dat je deze kolom wilt verwijderen? Potentieel rampzalige dingen kunnen gebeuren met alle content die dit Veld gebruiken.";
$_lang['contentblocks.add_setting'] = "Instelling toevoegen";
$_lang['contentblocks.edit_setting'] = "Instelling bewerken";
$_lang['contentblocks.duplicate_setting'] = "Dupliceer instelling";
$_lang['contentblocks.delete_setting'] = "Verwijder instelling";
$_lang['contentblocks.delete_setting.confirm'] = "Weet je zeker dat je deze instelling wilt verwijderen?";

$_lang['contentblocks.defaults'] = 'Standaard Templates';
$_lang['contentblocks.defaults.intro'] = 'Met Standaard Templates kun je instellen hoe documenten die nog niet eerder met ContentBlocks zijn bewerkt (zoals nieuwe documenten, maar ook documenten die al bestonden voordat ContentBlocks is geïnstalleerd) worden getoond. Hiervoor worden de onderstaande regels uit te voeren, van boven naar beneden, tot een match is gevonden. Hierna wordt de gekozen template standaard ingevoegd op de pagina.';
$_lang['contentblocks.constraint_field'] = 'Beperkingsveld';
$_lang['contentblocks.constraint_value'] = 'Beperkingswaarde';
$_lang['contentblocks.default_template'] = 'Standaard Template';
$_lang['contentblocks.target_layout'] = 'Doel Layout';
$_lang['contentblocks.target_field'] = 'Doel Veld';
$_lang['contentblocks.target_column'] = 'Doel Kolom';
$_lang['contentblocks.add_default'] = 'Toevoegen Standaard Regel';
$_lang['contentblocks.edit_default'] = 'Bewerk Standaard Regel';
$_lang['contentblocks.delete_default'] = 'Verwijder Standaard Regel';
$_lang['contentblocks.delete_default.confirm'] = 'Weet je zeker dat je deze standaard regel wilt verwijderen?';


$_lang['contentblocks.start_import'] = "Start Importeren";
$_lang['contentblocks.import_file'] = "Bestand";
$_lang['contentblocks.import_mode'] = "Importeer Mode";
$_lang['contentblocks.import_mode.insert'] = "Invoegen: bestaande [[+what]] laten staan en voeg geïmporteerde data toe";
$_lang['contentblocks.import_mode.overwrite'] = "Overschrijven: bestaande [[+what]] laten staan, maar overschrijf ze dezelfde ID hebben";
$_lang['contentblocks.import_mode.replace'] = "Vervangen: eerst worden alle [[+what]] verwijderd, en daarna worden nieuwe rijen geïmporteerd.";

$_lang['contentblocks.id'] = "ID";
$_lang['contentblocks.field'] = "Veld";
$_lang['contentblocks.fields'] = "Velden";
$_lang['contentblocks.layout'] = "Layout";
$_lang['contentblocks.layout.description'] = "Een wrapper voor velden met verschillende kolommen";
$_lang['contentblocks.layouts'] = "Layouts";
$_lang['contentblocks.layoutcolumn'] = "Kolom";
$_lang['contentblocks.layoutcolumns'] = "Kolommen";
$_lang['contentblocks.setting'] = "Instelling";
$_lang['contentblocks.settings'] = "Instellingen";
$_lang['contentblocks.settings.layout_description'] = "Instellingen zijn gebruiker-gedefinieerde eigenschappen welke aangepast kunnen worden wanneer een Layout toegevoegd wordt aan de content. De waarde van de instelling is in de template beschikbaar als placeholder, ter voorbeeld [[+class]] voor de instellign met referentie \"class\".";
$_lang['contentblocks.settings.field_description'] = "Instellingen zijn gebruiker-gedefinieerde eigenschappen welke aangepast kunnen worden wanneer een Veld toegevoegd wordt aan de content, door te klikken op het tandwiel icoontje. De waarde van de instelling is in de template beschikbaar als placeholder, ter voorbeeld [[+class]] voor de instellign met referentie \"class\".";
$_lang['contentblocks.input'] = "Invoer Type";
$_lang['contentblocks.inputs'] = "Invoer Types";
$_lang['contentblocks.name'] = "Naam";
$_lang['contentblocks.columns'] = "Kolommen";
$_lang['contentblocks.columns.description'] = "Kolommen definieren hoe de Layouts weergegeven worden in de manager, waar de breedte is gedefinieerd als percentage. De referentie kan je gebruiken als placeholder in de Template.";
$_lang['contentblocks.sortorder'] = "Sorteervolgorde";
$_lang['contentblocks.icon'] = "Icoon";
$_lang['contentblocks.description'] = "Omschrijving";
$_lang['contentblocks.template'] = "Template";
$_lang['contentblocks.template.description'] = "De template voor het Layout heeft verschillende beschikbare placeholders, afhankelijk van de Kolommen en Instellingen die je definieert in de tabs aan de linkerkant.";
$_lang['contentblocks.width'] = "Breedte";
$_lang['contentblocks.width.description'] = "De breedte van het veld (in procenten) dat dit veld in het canvas zal innemen. Velden worden door middel van een float: left getoond, dus je kunt hiermee simpele layouts samenstellen.";
$_lang['contentblocks.save'] = "Opslaan";
$_lang['contentblocks.reference'] = "Referentie";
$_lang['contentblocks.default_value'] = "Standaard waarde";
$_lang['contentblocks.fieldtype'] = "Veld Type";
$_lang['contentblocks.fieldtype.select'] = "Selecteer";
$_lang['contentblocks.fieldtype.radio'] = "Radio opties";
$_lang['contentblocks.fieldtype.checkbox'] = "Checkbox opties";
$_lang['contentblocks.fieldtype.textfield'] = "Tekstveld";
$_lang['contentblocks.fieldtype.link'] = "Koppeling";
$_lang['contentblocks.fieldtype.textarea'] = "Tekstvak";
$_lang['contentblocks.fieldtype.richtext'] = "Richtext";
$_lang['contentblocks.fieldtype.image'] = "Afbeelding";
$_lang['contentblocks.fieldoptions'] = "Veld Opties";
$_lang['contentblocks.fieldoptions.description'] = "Alleen voor Selectie, radio en checkbox veld types te gebruiken. Definieer beschikbare waarden als \"placeholder_waarde==Getoonde Waarde\", één per regel. (Het formaat \"Getoonde Waarde=placeholder_waarde\" is ook ondersteund, maar zal in 2.0 worden verwijderd.) Indien je alleen een enkele waarde per regel invoert (zoiets als \"foo\"), dan zal dit zowel als getoonde en placeholder waarde gebruikt worden.";
$_lang['contentblocks.field_is_exposed'] = "Toon Veld";
$_lang['contentblocks.field_is_exposed.description'] = "Toon veld in het canvas";
$_lang['contentblocks.field_is_exposed.modal'] = "Toon instelling in een popup scherm";
$_lang['contentblocks.field_is_exposed.exposedassetting'] = "Toon instelling in het canvas als een instelling";
$_lang['contentblocks.field_is_exposed.exposedasfield'] = "Toon instelling in het canvas als een normaal veld";
$_lang['contentblocks.process_tags'] = "Verwerk MODX tags";
$_lang['contentblocks.process_tags.description'] = "Als deze optie is ingeschakeld zullen input opties door de MODX parser verwerkt worden voordat deze worden gebruikt.";

$_lang['contentblocks.directory'] = 'Map';
$_lang['contentblocks.directory.description'] = 'Een map binnen de media source (danwel overgenomen van de ContentBlocks systeem instellingen of op veld niveau overschreven) waar bestanden naar toe worden geüpload.';
$_lang['contentblocks.crops'] = 'Uitsnede';
$_lang['contentblocks.crops.description'] = 'Een definitie van uitsneden om bij de afbeelding toe te staan. Elke uitsnede is gescheiden door een pipe (|) symbool, en heeft een naam, gevolgd door een dubbele punt (:), en dan kommagescheiden opties. Elke optie heeft een naam en een waarde. Dit is bijvoorbeeld een geldige definitie met diverse gespecificeerde opties: <code>small:width=200,height=200,aspect=1|medium:width=500,aspect=0.7|large:height=750</code>';
$_lang['contentblocks.crop_directory'] = 'Uitsnede map';
$_lang['contentblocks.crop_directory.description'] = 'Een map binnen de media source (danwel overgenomen van de ContentBlocks systeem instellingen of op veld niveau overschreven) waar de uitsneden zullen worden bewaard.';
$_lang['contentblocks.open_crops_automatically'] = 'Open de cropper automatisch';
$_lang['contentblocks.open_crops_automatically.description'] = 'Als dit is ingeschakeld zal na het toevoegen van een afbeelding direct de cropper worden geopend.';
$_lang['contentblocks.file_types'] = 'Toegestane Extensies';
$_lang['contentblocks.file_types.description'] = 'Bestanden met deze extensies (kommagescheiden) mogen geupload worden. Laat leeg om alle extensies toe te staan.';
$_lang['contentblocks.file_types.disallowed'] = 'Bestandstype is niet toegestaan in dit veld.';

// Categories
$_lang['contentblocks.category'] = "Categorie";
$_lang['contentblocks.categories'] = "Categorieën";
$_lang['contentblocks.categories.intro'] = "Gebruik Categorieën om je velden, layouts en templates beter te organiseren. Zodra elementen aan een categorie zijn toegewezen zul je in de vensters om velden en layouts toe te voegen eerst de gecategoriseerde elementen zien, gevolgd door de ongecategoriseerde elementen.";
$_lang['contentblocks.uncategorized'] = "Ongecategoriseerd";
$_lang['contentblocks.add_category'] = "Categorie toevoegen";
$_lang['contentblocks.edit_category'] = "Bewerk categorie";
$_lang['contentblocks.duplicate_category'] = "Dupliceer categorie";
$_lang['contentblocks.delete_category'] = "Verwijder categorie";
$_lang['contentblocks.delete_category.confirm'] = "Weet je zeker dat je deze categorie wilt verwijderen? Elementen die op dit moment gebruik maken van de categorie zullen eerst uit de categorie worden verwijderd.";
$_lang['contentblocks.delete_category.confirm.js'] = "Weet je zeker dat je deze categorie wilt verwijderen?";
$_lang['contentblocks.export_category'] = "Exporteer categorie";
$_lang['contentblocks.export_categories'] = "Exporteer";
$_lang['contentblocks.export_categories.confirm'] = "Na het bevestigen zal een XML export gemaakt worden met alle categorieeën. Dit bestand kan gebruikt worden om categorieën later weer te importeren of in een andere MODX installatie. Het genereren van het XML bestand kan enkele seconden duren.";
$_lang['contentblocks.import_categories'] = "Importeer";
$_lang['contentblocks.import_categories.title'] = "Categorieën Importeren";
$_lang['contentblocks.import_categories.intro'] = "Door een XML bestand te uploaden en het kiezen van de juiste mode, kun je eerder geëxporteerde Categorieën van een andere site importeren. <b>Wees voorzichtig</b> met het importeren van Categorieën indien je al eerder categorieën hebt toegewezen. Neem contact op met support@modmore.com als je niet zeker weet welke mode je moet kiezen bij het importeren.";


// Templates
$_lang['contentblocks.templates'] = 'Templates';
$_lang['contentblocks.templates_desc'] = 'Templates zijn vooraf gedefinieerde sets van layouts en velden welke in een keer aan het canvas toegevoegd kunnen worden. ';
$_lang['contentblocks.add_template'] = 'Template toevoegen';
$_lang['contentblocks.edit_template'] = 'Template bewerken';
$_lang['contentblocks.duplicate_template'] = 'Template dupliceren';
$_lang['contentblocks.export_template'] = 'Exporteer template';
$_lang['contentblocks.export_templates'] = 'Templates Exporteren';
$_lang['contentblocks.import_templates'] = 'Templates Importeren';
$_lang['contentblocks.import_templates.title'] = 'Templates Importeren';
$_lang['contentblocks.import_templates.intro'] = 'Door een XML bestand te uploaden een de juiste import modus te kiezen is het mogelijk om templates te importeren die je eerder van een andere site hebt geëxporteerd. <b>Let op:</b> Templates bevatten referenties naar velden en layouts. Bij het importeren van Templates dien je dus ook deze Layouts en Velden te importeren van dezelfde lokatie. ';
$_lang['contentblocks.delete_template'] = 'Template Verwijderen';
$_lang['contentblocks.delete_template.confirm'] = 'Weet je zeker dat je deze template wilt verwijderen?';


// Input types
$_lang['contentblocks.chunk'] = "Chunk";
$_lang['contentblocks.chunk.description'] = "Definieer een chunk welke toegevoegd wordt aan de content.";
$_lang['contentblocks.chunk.choose_chunk'] = "Kies Chunk";
$_lang['contentblocks.chunk.choose_chunk.description'] = "Kies een chunk dat toegevoegd dient te worden.";
$_lang['contentblocks.chunk_template.description'] = "Een template voor de chunk. Beschikbare placeholders: <code>[[+tag]]</code>, <code>[[+chunk_name]]</code>";
$_lang['contentblocks.chunk.custom_preview'] = "Custom Voorbeeld";
$_lang['contentblocks.chunk.custom_preview.description'] = "Indien dit veld leeg gelaten wordt, zal de eigenlijke Chunk geladen worden en worden weergegeven als voorbeeld. Als je wilt, kun je het voorbeeld overschrijven door hier HTML in te voeren voor het voorbeeld.";
$_lang['contentblocks.chunk.no_chunk_set'] = "Oeps... Er is geen Chunk gedefinieerd voor dit veld.";

$_lang['contentblocks.chunkselector'] = 'Chunk Kiezer';
$_lang['contentblocks.chunk_selector_template.description'] = 'Het template voor de geselecteerde chunk. Beschikbare placeholders: <code>[[+value]]</code> (bevat de volledige chunk tag), <code>[[+chunk_name]]</code> (bevat de naam van de geselecteerde chunk)';
$_lang['contentblocks.chunkselector.description'] = 'Kies een chunk om te tonen';
$_lang['contentblocks.chunkselector.available_chunks'] = "Naam of ID's voor toegestane Chunks (Optioneel)";
$_lang['contentblocks.chunkselector.available_chunks.description'] = "Om de beschikbare chunks te limiteren kun je hier een kommagescheiden lijst van chunk namen of IDs invullen. Chunks in deze lijst zullen altijd beschikbaar zijn, onafhankelijk van overige properties.";
$_lang['contentblocks.chunkselector.available_categories'] = "Categorieën";
$_lang['contentblocks.chunkselector.available_categories.description'] = "Specificeer een lijst met categorienamen of IDs om de beschikbare chunks te limiteren.";

$_lang['contentblocks.code'] = "Code";
$_lang['contentblocks.code.description'] = "Toont een tekstvak met code highlighting.";
$_lang['contentblocks.code_template.description'] = "De waarde van de code is opgeslagen in de <code>[[+value]]</code> placeholder. Afhankelijk hoe je dit veld wilt gebruiken, voeg je gewoon deze placeholder toe aan de template, of je wilt het encoderen (b.v. door <code>&lt;pre&gt;&lt;code&gt;[[+value:htmlent]]&lt;/code&gt;&lt;/pre&gt; te doen) om het weer te geven in plaats van uit te voeren. De <code>[[+lang]]</code> placeholder bevat de geselecteerde taal in een dropdown.";
$_lang['contentblocks.code.available_languages'] = "Beschikbare talen";
$_lang['contentblocks.code.available_languages.description'] = "Specificeer een komma gescheiden lijst van <code>waarde=weergave</code> entries voor de beschikbare syntax highlighting talen. Als er maar één taal gespecificeerd is, dan zal deze geselecteerd worden en de dropdown verborgen zijn.";
$_lang['contentblocks.code.default_language'] = "Standaard taal";
$_lang['contentblocks.code.default_language.description'] = "De taal om standaard te selecteren.";
$_lang['contentblocks.code.language'] = "Taal";
$_lang['contentblocks.code.entities'] = "Codeer Entiteiten?";
$_lang['contentblocks.code.entities.description'] = "Wanneer ingeschakeld, zal de ingevoerde code entiteiten bevatten en MODX-tags gecodeerd worden voor het weergeven van code.";

$_lang['contentblocks.file'] = 'Bestand';
$_lang['contentblocks.file.description'] = 'Voeg bestanden toe aan het canvas';
$_lang['contentblocks.file_template.description'] = 'Geldige placeholders zijn <code>[[+url]]</code>, <code>[[+title]]</code>, <code>[[+size]]</code> (in bytes), <code>[[+upload_date]]</code>, and <code>[[+extension]]</code>';
$_lang['contentblocks.file.remove_file'] = 'Verwijder bestand';
$_lang['contentblocks.file.file.or_drop_files'] = 'of sleep bestanden hierheen';
$_lang['contentblocks.file.max_files'] = 'Maximum aantal bestanden';
$_lang['contentblocks.file.max_files.description'] = 'Definieert het maximaal aantal toegestane bestanden dat is toegestaan per veld. Extra bestanden boven dit limiet worden geweigerd.';
$_lang['contentblocks.file.max_files.reached'] = 'Sorry, u mag niet meer dan [[+max]] bestanden gebruiken.';
$_lang['contentblocks.file.directory'] = 'Map';
$_lang['contentblocks.file.directory.description'] = 'Een map binnen de media source (danwel overgenomen van de ContentBlocks systeem instellingen of op veld niveau overschreven)';
$_lang['contentblocks.file.file_types'] = 'Toegestane Extensies';
$_lang['contentblocks.file.file_types.description'] = 'Bestanden met deze extensies (kommagescheiden) mogen geupload worden. Laat leeg om alle extensies toe te staan.';
$_lang['contentblocks.file.file_types.disallowed'] = 'Bestandstype is niet toegestaan in dit veld';
$_lang['contentblocks.file.choose_file'] = 'Kies bestand';
$_lang['contentblocks.file.wrapper_template.description'] = "Buitenste template voor lijsten met links. Zal waarschijnlijk een <code>&lt;ul&gt;</code> tag bevatten. Beschikbare placeholder: <code>[[+files]]</code> (links, opgebouwd middels de andere templates).";


$_lang['contentblocks.gallery'] = "Gallerij";
$_lang['contentblocks.gallery.description'] = "Een eenvoudige gallerij invoer, gekenmerkt met een eenvoudige multi-afbeelding uploads, drag/drop sorteren en title attribuut.";
$_lang['contentblocks.gallery_template.description'] = "Gebruikt om individuele afbeeldingen wikkelen. Beschikbare placeholders: <code>[[+url]]</code> (de volledige link naar de afbeelding), <code>[[+title]]</code> (de ingevulde titel voor de afbeelding), <code>[[+size]]</code>, <code>[[+extension]]</code>";
$_lang['contentblocks.gallery_wrapper_template.description'] = "Gebruikt om alle afbeeldingen te wikkelen. Beschikbare placeholders: <code>[[+images]]</code>";
$_lang['contentblocks.gallery_max_images.description'] = "Definieer het maximale aantal afbeeldingen dat toegestaan is per gallerij. Extra afbeeldingen, meer dan dit limiet, worden geweigerd.";
$_lang['contentblocks.gallery.thumb_size'] = "Miniatuurformaat";
$_lang['contentblocks.gallery.thumb_size.description'] = "Kies een van de opties om de definiëren hoe klein of groot de miniaturen getoond moeten worden op het canvas.";
$_lang['contentblocks.gallery.thumb_size.small'] = "Klein";
$_lang['contentblocks.gallery.thumb_size.medium'] = "Normaal";
$_lang['contentblocks.gallery.thumb_size.large'] = "Groot";
$_lang['contentblocks.gallery.show_description'] = "Toon Omschrijving";
$_lang['contentblocks.gallery.show_description.description'] = "Laat een extra Omschrijving veld zien om de gebruiker een langere omschrijving te kunnen laten invullen bij elke afbeelding.";
$_lang['contentblocks.gallery.show_link_field'] = "Toon link veld";
$_lang['contentblocks.gallery.show_link_field.description'] = "Toont een link veld zodat een afbeelding naar een bepaalde resource of externe website gekoppeld kan worden.";

$_lang['contentblocks.heading'] = "Kop";
$_lang['contentblocks.heading.description'] = "Een combinatie van een selectieveld voor het niveau en een tekstveld.";
$_lang['contentblocks.heading_template.description'] = "Template voor het kop veld. Beschikbare placeholders: <code>[[+level]]</code> (de waarde van het geselecteerde niveau) en <code>[[+value]]</code> (de waarde van het tekstveld).";
$_lang['contentblocks.default_level'] = "Standaard niveau";
$_lang['contentblocks.available_levels'] = "Beschikbare niveaus";
$_lang['contentblocks.heading_default_level.description'] = "De waarde die standaard geselecteerd wordt bij nieuwe Kop velden.";
$_lang['contentblocks.heading_available_levels.description'] = "Een lijst, komma gescheiden, van <code>waarde=weergave</code> items voor de weergave van beschikbare niveaus. Voor de weergave, een lexicon voorvoegsel als <code>contentblocks.</code> wordt gecontroleerd en gebruikt indien beschikbaar. Voorbeeld: <code>h1=heading_1,h2=Tweede niveau,h3=heading_3</code>";
$_lang['contentblocks.heading_1'] = "Kop 1";
$_lang['contentblocks.heading_2'] = "Kop 2";
$_lang['contentblocks.heading_3'] = "Kop 3";
$_lang['contentblocks.heading_4'] = "Kop 4";
$_lang['contentblocks.heading_5'] = "Kop 5";
$_lang['contentblocks.heading_6'] = "Kop 6";

$_lang['contentblocks.hr'] = "Horizontale lijn";
$_lang['contentblocks.hr.description'] = "Een simpele placeholder voor een <hr> tag, voor een horizontale lijn.";
$_lang['contentblocks.hr_template.description'] = "Hoe een horizontale lijn weer te geven. Geen placeholders beschikbaar, maar het gebruik van de <code>&lt;hr&gt;</code> tag is aanbevolen.";

$_lang['contentblocks.image'] = "Afbeelding";
$_lang['contentblocks.image.description'] = "Invoer type met een eenvoudige afbeelding upload of selectie.";
$_lang['contentblocks.image.source'] = "Overschrijf Media Source";
$_lang['contentblocks.image.source.description'] = "Laat deze op (geen) om de standaard media source van het systeem te gebruiken voor afbeeldingen, of kies een specifieke media source om deze instelling te overschrijven voor dit veld.";
$_lang['contentblocks.image_template.description'] = "Template voor de afbeelding. Hier wil je waarschijnlijk een <code>&lt;img&gt;</code> tag gebruiken. Beschikbare placeholders: <code>[[+url]]</code>, <code>[[+size]]</code>, <code>[[+width]]</code>, <code>[[+height]]</code>, <code>[[+extension]]</code>";
$_lang['contentblocks.imagewithtitle'] = "Afbeelding met Titel";
$_lang['contentblocks.imagewithtitle.description'] = "Hetzelfde als Afbeelding, maar deze keer met een tekstveld om een alt of titel attribuut toe te voegen.";
$_lang['contentblocks.image_with_title'] = "Afbeelding met Titel";
$_lang['contentblocks.image_with_title_template.description'] = "Template voor de afbeelding met titel. Hier wil je waarschijnlijk een <code>&lt;img&gt;</code> tag gebruiken. Beschikbare placeholders: <code>[[+url]]</code>, <code>[[+title]]</code>, <code>[[+size]]</code>, <code>[[+width]]</code>, <code>[[+height]]</code>, <code>[[+extension]]</code>";

$_lang['contentblocks.list'] = "Lijst";
$_lang['contentblocks.condensed_list'] = 'Bondige lijst';
$_lang['contentblocks.list.description'] = "Invoer type voor, gemakkelijk te maken, ongesoorteerde (geneste) lijsten.";
$_lang['contentblocks.list_template.description'] = "Template voor individuele lijst items. Zal waarschijnlijk een <code>&lt;li&gt;</code> tag bevatten. Beschikbare placeholders: <code>[[+value]]</code> (de lijst item tekst), <code>[[+idx]]</code> (een verhogend nummer, start op 1 voor elk niveau) en <code>[[+items]]</code> (sub-lijsten, gebruikt dezelfde templates).";
$_lang['contentblocks.list_wrapper_template.description'] = "Buitenste template voor lijsten. Zal waarschijnlijk een <code>&lt;ul&gt;</code> tag bevatten. Beschikbare placeholder: <code>[[+items]]</code> (lijst items, opgebouwd middels de andere templates).";
$_lang['contentblocks.list_nested_template.description'] = "Binnenste template voor ingesprongen sub-lijsten. Zal waarschijnlijk een <code>&lt;ul&gt;</code> tag bevatten. Beschikbare placeholder: <code>[[+items]]</code> (lijst items, opgebouwd middels de andere templates).";

$_lang['contentblocks.orderedlist'] = "Geordende lijst";
$_lang['contentblocks.orderedlist.description'] = "Hetzelfde als de Lijst type, behalve dat deze geordende lijst heeft.";
$_lang['contentblocks.ordered_list'] = "Geordende lijst";
$_lang['contentblocks.ordered_list_template.description'] = "Template voor individuele lijst items. Zal waarschijnlijk een <code>&lt;li&gt;</code> tag bevatten. Beschikbare placeholders: <code>[[+value]]</code> (de lijst item tekst), <code>[[+idx]]</code> (een verhogend nummer, start op 1 voor elk niveau) en <code>[[+items]]</code> (sub-lijsten, gebruikt dezelfde templates).";
$_lang['contentblocks.ordered_list_wrapper_template.description'] = "Buitenste template voor lijsten. Zal waarschijnlijk een <code>&lt;ol&gt;</code> tag bevatten. Beschikbare placeholder: <code>[[+items]]</code> (lijst items, opgebouwd middels de andere templates).";
$_lang['contentblocks.ordered_list_nested_template.description'] = "Binnenste template voor ingesprongen sub-lijsten. Zal waarschijnlijk een <code>&lt;ol&gt;</code> tag bevatten. Beschikbare placeholder: <code>[[+items]]</code> (lijst items, opgebouwd middels de andere templates).";

$_lang['contentblocks.quote'] = "Citaat";
$_lang['contentblocks.quote.description'] = "Tekstvak veld gecombineerd met een kleiner tekstveld voor citaten.";
$_lang['contentblocks.quote_template.description'] = "Template voor het citaat. Zal waarschijnlijk een <code>&lt;blockquote&gt;</code> en <code>&lt;cite&gt;</code> tag bevtten. Beschikbare placeholders: <code>[[+value]]</code> (de citaat invoer) en <code>[[+cite]]</code> (de kleinere auteur invoer).";
$_lang['contentblocks.quote.author'] = "Auteur";

$_lang['contentblocks.repeater'] = "Repeater";
$_lang['contentblocks.repeater.description'] = "Maakt het mogelijk om een groep van velden te definiëren, welke vervolgens door de gebruiker als groep herhaalt kan worden.";
$_lang['contentblocks.repeater_template.description'] = "Template voor individuele rijen in de repeater. Er is geen standaard template beschikbaar aangezien dit compleet afhangt van je repeater configuratie. Voor elk veld definieer je een key. De repeater zal elk ondergeschikt veld eerst normaal verwerken (alsof het een losstaand veld is), en het resultaat daarvan wordt beschikbaar in een placeholder met de key die je per veld hebt geconfigureerd. Op modmore.com is uitgebreide documentatie te vinden over hoe de repeater werkt en wat je ermee kunt bereiken. Er is standaard een <code>[[+idx]]</code> placeholder beschikbaar.";
$_lang['contentblocks.repeater.width'] = "Breedte (in %)";
$_lang['contentblocks.repeater.key'] = "Key";
$_lang['contentblocks.repeater.key.description'] = "De key waarmee je de waarde van het veld in de repeater template kunt aanroepen. ";
$_lang['contentblocks.repeater.group'] = "Groep";
$_lang['contentblocks.repeater.group.description'] = "De repeater maakt het mogelijk om een groep van velden in te stellen. Deze grid is waar je deze veld configureert.";
$_lang['contentblocks.repeater.max_items'] = "Maximum aantal items";
$_lang['contentblocks.repeater.max_items.description'] = "Indien ingesteld op een getal groter dan 0, dan zullen extra rijen boven dat aantal niet toegestaan worden.";
$_lang['contentblocks.repeater.max_items_reached'] = "Sorry, je kunt maximaal [[+max]] items toevoegen.";
$_lang['contentblocks.repeater.min_items'] = "Minimum aantal items";
$_lang['contentblocks.repeater.min_items.description'] = "Als dit een nummer groter dan 0 is, dan zal het niet mogelijk zijn om rijen onder dit limiet te verwijderen.";
$_lang['contentblocks.repeater.add_first_item'] = "Eerste item automatisch toevoegen";
$_lang['contentblocks.repeater.add_first_item.description'] = "Als je dit inschakelt zal er automatisch een eerste item worden toegevoegd aan een lege repeater.";
$_lang['contentblocks.repeater.add_item'] = "Item toevoegen";
$_lang['contentblocks.repeater.delete_item'] = "Item verwijderen";
$_lang['contentblocks.repeater.wrapper_template.description'] = "Buitenste template waarin het resultaat van de rijen wordt getoond. Hierin moet de <code>[[+rows]]</code> placeholder gebruikt worden om de resultaten te zien. Er is ook een <code>[[+total]]</code> placeholder beschikbaar.";
$_lang['contentblocks.repeater.row_separator'] = "Rijscheidingsteken";
$_lang['contentblocks.repeater.row_separator.description'] = "Een tekenreeks waarmee de afzonderlijke rijen aan elkaar worden gelijmd. Dit kan zoals de standaard een regeleinde zijn, maar het is ook mogelijk om uitgebreidere HTML te gebruiken.";
$_lang['contentblocks.repeater.manager_columns'] = "Aantal kolommen in manager";
$_lang['contentblocks.repeater.manager_columns.description'] = "Het aantal kolommen dat de repeater moet gebruiken in de manager. Mogelijke waarden zitten tussen de 1 en 4";
$_lang['contentblocks.repeater.layout_style'] = "Indeling";
$_lang['contentblocks.repeater.layout_style.description'] = "Indeling voor de repeater. Mini is vergelijkbaar met een tabelweergave.";
$_lang['contentblocks.repeater.condensed'] = "Bondig";
$_lang['contentblocks.repeater.mini'] = "Mini";
$_lang['contentblocks.repeater.default'] = "Standaard";

$_lang['contentblocks.richtext'] = "Richtext";
$_lang['contentblocks.richtext.description'] = "Simpel Rich Text veld. Ondersteund zowel TinyMCE als Redactor.";
$_lang['contentblocks.richtext_template.description'] = "Aangezien rich text velden doorgaans hun eigen markup hanteren, bestaat de template voor een rich text veld uit slechts de <code>[[+value]]</code> placeholder, zou je deze toch in een andere tag of iets dergelijks kunnen wikkelen.";

$_lang['contentblocks.table'] = "Tabel";
$_lang['contentblocks.table.description'] = "Interactieve widget voor gegevens in tabelvorm.";
$_lang['contentblocks.table_template.description'] = "Template voor elk van de tabel cellen. Heeft waarschijnlijk een &lt;td&gt; tag. Beschikbare placeholders:  <code>[[+cell]]</code>, <code>[[+colIdx]]</code>, <code>[[+colTotal]]</code>";
$_lang['contentblocks.table.row_template'] = "Rij Template";
$_lang['contentblocks.table.row_template.description'] = "De template voor elk van de rijen in de tabel, waarschijnlijk met een <code>&lt;tr&gt;</code> tag. Beschikbare placeholders: <code>[[+row]]</code> (bevat elke cel in deze rij), <code>[[+idx]]</code>";
$_lang['contentblocks.table.wrapper_template.description'] = "De wrapper template voor de gehele tabel. Beschikbare placeholders: <code>[[+body]]</code>, <code>[[+total]]</code>.";

$_lang['contentblocks.textarea'] = "Tekst Vak";
$_lang['contentblocks.textarea.description'] = "Simpele multi-regel tekstveld.";

$_lang['contentblocks.textfield'] = "Tekst Veld";
$_lang['contentblocks.textfield.description'] = "Simpele enkele regel tekstveld.";
$_lang['contentblocks.textfield_template.description'] = "Voor de tekstveld gebruik slechts de <code>[[+value]]</code> placeholder in een tag naar keuze (een paragraaf, kop etc).";
$_lang['contentblocks.textarea_template.description'] = "Voor het tekstveld kun je de <code>[[+value]]</code> placeholder gebruiken met een container naar keuze (paragraaf, heading, etc). Als je regeleinden zou willen ondersteunen zonder html in het veld te moeten invoeren, probeer dan de <code>nl2br</code> output modifier toe te passen.";

$_lang['contentblocks.video'] = "Video";
$_lang['contentblocks.video.description'] = "YouTube integratie, met zoeken en plakken van YouTube links om video's eenvoudig toe te voegen.";
$_lang['contentblocks.video_template.description'] = "Wanneer u de Video invoer gebruikt, de YouTube Video ID wordt opgeslagen in de <code>[[+value]]</code> placeholder. Deze kan gebruikt worden om de code voor insluiten te genereren, in de template.";
$_lang['contentblocks.video.search'] = "Zoeken!";
$_lang['contentblocks.video.search_introduction'] = "Gebruik het zoekveld hieronder om YouTube te doorzoeken naar video's.";
$_lang['contentblocks.video.enter_keywords'] = "Vul één of meerdere woorden in..";
$_lang['contentblocks.video.load_more_results'] = "Meer resultaten laden";
$_lang['contentblocks.video.search_youtube'] = "Zoek YouTube";
$_lang['contentblocks.video.paste_link'] = "Plak hier een link";
$_lang['contentblocks.video.youtube_not_loaded'] = "De YouTube API is niet geladen. Probeer het nog eens in enkele seconden. Als het probleem blijft bestaan, kan het zijn dat de API niet beschikbaar is op dit moment.";
$_lang['contentblocks.video.api_error'] = "Oeps, er trad een fout op: [[+message]] (Code [[+code]])";

// Select
$_lang['contentblocks.dropdown'] = "Dropdown";
$_lang['contentblocks.dropdown.description'] = "Een eenvoudig dropdown veld waarmee de editor een item uit een voorgeprogrammeerde lijst kan kiezen.";
$_lang['contentblocks.dropdown_template.description'] = "Template voor het dropdown veld. Beschikbaar placeholders zijn <code>[[+value]]</code> (de waarde voor het gekozen item), en <code>[[+display]]</code> (de getoonde waarde in de dropdown).";
$_lang['contentblocks.dropdown.options'] = "Dropdown Opties";
$_lang['contentblocks.dropdown.options.description'] = "Definieer de beschikbare waardes in het formaat \"waarde==Getoonde Waarde\", met één optie per regel. Als je een enkele waarde per regel opgeeft (bijvoorbeeld \"test\"), dan zal die waarde zowel voor de getoonde als placeholder waarde gebruikt worden. Om een optie te blokkeren kun je de regel beginnen met #. Het is ook mogelijk om de @SNIPPET binding te gebruiken om dynamisch opties in te voeren. Bekijk voor gedetailleerde informatie de documentatie op modmo.re/cb.";
$_lang['contentblocks.dropdown.default_value'] = "Standaard waarde";
$_lang['contentblocks.dropdown.default_value.description'] = "De standaard waarde die gekozen moet worden als de dropdown aan de content wordt toegevoegd of er is niets is geselecteerd.";

// Snippet
$_lang['contentblocks.snippet'] = "Snippet";
$_lang['contentblocks.snippet.description'] = "Stelt de gebruiker in staat een snippet te kiezen en eigenschappen in te vullen.";
$_lang['contentblocks.snippet.available_snippets'] = "Naam of ID's voor toegestane Snippets (Optioneel)";
$_lang['contentblocks.snippet.available_snippets.description'] = "Om de beschikbare snippets voor gebruikers te limiteren, specificeer een komma gescheiden lijst van snippet namen of ID's. Snippets in deze lijst zijn altijd beschikbaar, onafhankelijk van andere eigenschappen hieronder.";
$_lang['contentblocks.snippet.categories'] = "Categorieën";
$_lang['contentblocks.snippet.categories.description'] = "Specificeer een lijst van categorie namen of ID's, om de beschikbare snippets hierop te limiteren.";
$_lang['contentblocks.snippet.add_property'] = "Eigenschap toevoegen";
$_lang['contentblocks.snippet.choose_snippet'] = "Kies Snippet";
$_lang['contentblocks.snippet.other_property'] = "Anders (handmatige invoer)";
$_lang['contentblocks.snippet.other_property.desc'] = "Elke eigenschap die toegevoegd moet worden aan de snippet call, kan hier gespecificeerd worden. Zorg voor de juiste syntax, als: &eigenschap=`waarde`";
$_lang['contentblocks.snippet.allow_uncached'] = "Niet Cachen toestaan?";
$_lang['contentblocks.snippet.allow_uncached.description'] = "Indien ingeschakeld, een \"Niet Cachen?\" optie is beschikbaar voor de Snippets. Indien uitgeschakeld worden alle Snippets cached aangeroepen.";
$_lang['contentblocks.snippet.uncached'] = "Cache?";
$_lang['contentblocks.snippet.uncached_0'] = "Ja";
$_lang['contentblocks.snippet.uncached_1'] = "Nee, deze Snippet niet cachen";
$_lang['contentblocks.snippet.none_available'] = "Er zijn geen snippets beschikbaar voor dit Veld.";
$_lang['contentblocks.snippet_template.description'] = "Het snippet veld maakt een complete MODX snippet tag automatisch aan, welke beschikbaar is in <code>[[+value]]</code>, en de snippet naam is beschikbaar in <code>[[+snippet_name]]</code>.";

$_lang['contentblocks.layout_template.description'] = 'Template voor dit layout veld. Hou er rekening mee dat de layouts binnen dit veld al volledig geparsed zijn voordat ze in deze template worden geplaatst. Beschikbare placeholder: <code>[[+value]]</code> (de volledige HTML van de layouts)';
$_lang['contentblocks.layoutfield.available_layouts'] = "Beschikbare Layout(s)";
$_lang['contentblocks.layoutfield.available_layouts.description'] = "Een kommagescheiden lijst van layouts welke toegestaan zijn. Om geen layouts toe te staan, bijvoorbeeld zodat alleen Templates ingevoegd kunnen worden, voer je hier -1 in.";
$_lang['contentblocks.layoutfield.available_templates'] = "Beschikbare Template(s)";
$_lang['contentblocks.layoutfield.available_templates.description'] = "Kommagescheiden lijst van beschikbare templates. Om geen Templates toe te staan, geef -1 op.";

// Image related
$_lang['contentblocks.choose_image'] = "Kies Afbeelding";
$_lang['contentblocks.wrapper_template'] = "Buitenste Template";
$_lang['contentblocks.nested_template'] = "Geneste Template";
$_lang['contentblocks.max_images'] = "Maximaal aantal Afbeeldingen";
$_lang['contentblocks.max_images_reached'] = "Sorry, je kunt niet meer dan [[+max]] afbeeldingen gebruiken.";
$_lang['contentblocks.upload_error'] = "Oeps, er ging iets mis met uploaden van [[+file]]: [[+message]]";
$_lang['contentblocks.upload_error.file_too_big'] = "\n\nHet bestand zal mogelijk te groot zijn geweest.";
$_lang['contentblocks.image.thumbnail_size'] = "Thumbnailgrootte in de manager";
$_lang['contentblocks.image.thumbnail_size.description'] = "Dimensies voor thumbnails die in de manager voor je worden aangemaakt. Laat leeg voor geen thumbnails, geef een enkele numerieke waarde voor vierkante thumbnails of specifieer dimensies als bxh voor rechthoekige thumbnails. Bijvoorbeeld 100 of 100x50. ";
$_lang['contentblocks.image.thumbnail_crop'] = 'Gebruik uitsnede als thumbnail';
$_lang['contentblocks.image.thumbnail_crop.description'] = 'Voer de key in van de uitsnede die gebruikt moet worden als thumbnail in de manager, in plaats van een dynamische thumbnail op basis van het origineel. Als de uitsnede nog niet is aangemaakt zal de dynamische thumbnail worden getoond.';

$_lang['contentblocks.cropper.save_crop'] = 'Opslaan';
$_lang['contentblocks.cropper.saved_crop'] = 'Opgeslagen!';
$_lang['contentblocks.cropper.unsaved_crop'] = 'Er zijn niet-opgeslagen wijzigingen voor de [[+cropKey]] uitsnede. Wilt u deze wijzigingen opslaan?';
$_lang['contentblocks.cropper.resize_opts'] = 'Vergroten/verkleinen';
$_lang['contentblocks.cropper.resize_original'] = 'Origineel';
$_lang['contentblocks.cropper.resize_width'] = 'Verander de breedte van de gegenereerde afbeelding. Dit kan door het aspect ratio van de uitsnede worden beïnvloed.';
$_lang['contentblocks.cropper.resize_height'] = 'Verander de hoogte van de gegenereerde afbeelding. Dit kan door het aspect ratio van de uitsnede worden beïnvloed.';
$_lang['contentblocks.cropper.aspect_ratio'] = 'Hoogte-breedteverhouding';
$_lang['contentblocks.cropper.aspect_ratio.free'] = 'Vrij'; // free aspect ratio means no restriction on the aspect
$_lang['contentblocks.cropper.aspect_ratio.original'] = 'Origineel'; // Same aspect ratio as the original file
$_lang['contentblocks.cropper.aspect_ratio.1_1'] = '1:1'; // square
$_lang['contentblocks.cropper.aspect_ratio.4_3'] = '4:3';
$_lang['contentblocks.cropper.aspect_ratio.3_2'] = '3:2';
$_lang['contentblocks.cropper.aspect_ratio.16_9'] = '16:9';
$_lang['contentblocks.cropper.aspect_ratio.3_4'] = '3:4';
$_lang['contentblocks.cropper.aspect_ratio.2_3'] = '2:3';
$_lang['contentblocks.cropper.aspect_ratio.9_16'] = '9:16';
$_lang['contentblocks.cropper.advanced'] = 'Geavanceerd'; //advanced, or manual, crop options
$_lang['contentblocks.cropper.advanced.x'] = 'Linksboven X';
$_lang['contentblocks.cropper.advanced.y'] = 'Linksboven Y';
$_lang['contentblocks.cropper.advanced.width'] = 'Breedte';
$_lang['contentblocks.cropper.advanced.height'] = 'Hoogte';


// Misc
$_lang['contentblocks.use_contentblocks'] = "Gebruik ContentBlocks?";
$_lang['contentblocks.use_contentblocks.description'] = "Indien ingeschakeld, zal het content gedeelte vervangen worden met een ContentBlocks canvas voor het maken van multi-kolom en gestructureerde content.";
$_lang['contentblocks.or'] = "of";
$_lang['contentblocks.title'] = "Titel";
$_lang['contentblocks.delete'] = "Verwijder";
$_lang['contentblocks.delete_video'] = "Verwijder Video";
$_lang['contentblocks.move_layout_up'] = "Verplaats Omhoog";
$_lang['contentblocks.move_layout_down'] = "Verplaats Omlaag";
$_lang['contentblocks.delete_image'] = "Verwijder Afbeelding";
$_lang['contentblocks.crop_image'] = 'Maak uitsnede';
$_lang['contentblocks.crop_image.introduction'] = 'Maak alternatieve formaten van een afbeelding aan. Kies een uitsnede om aan te passen in de preview, en gebruik de tool om het gebied en de grootte van de afbeelding te bepalen.';
$_lang['contentblocks.crop_image.preview'] = 'Voorbeeld van de afbeelding waar een uitsnede van wordt gemaakt.';
$_lang['contentblocks.search_fields'] = "Zoek velden";
$_lang['contentblocks.search_layouts_templates'] = "Zoek layouts en templates";
$_lang['contentblocks.add_content'] = "Content Toevoegen";
$_lang['contentblocks.add_content.introduction'] = "Selecteer de in het layout in te voegen type content. Beweeg uw muis over de naam voor een betere beschrijving.";
$_lang['contentblocks.add_layout'] = "Layout toevoegen";
$_lang['contentblocks.add_layout.introduction'] = "Kies het layout om toe te voegen aan de Content.";
$_lang['contentblocks.upload'] = "Upload";
$_lang['contentblocks.choose'] = "Kies";
$_lang['contentblocks.from_url'] = "Van URL";
$_lang['contentblocks.from_url_title'] = "Afbeelding invoegen van URL";
$_lang['contentblocks.from_url_prompt'] = "Geef de URL op naar een afbeelding om in te voegen. Dit moet een volledige link zijn naar een afbeelding die ergens anders is opgeslagen, of een relatieve link als de afbeelding lokaal staat. Het bestand wordt op de locale server opgeslagen.";
$_lang['contentblocks.from_url_notfound'] = "De opgegeven afbeelding kon niet worden gedownload. ";
$_lang['contentblocks.image.or_drop_images'] = "of drop afbeeldingen hier";
$_lang['contentblocks.image.or_drop_image'] = "of drop een afbeelding hier";
$_lang['contentblocks.use_tinyrte'] = "Gebruik Tiny RTE?";
$_lang['contentblocks.use_tinyrte.description'] = "Indien ingeschakeld zal de input een kleine rich text editor krijgen waarmee simpele markup toegevoegd kan worden (bold, italics en links).";
$_lang['contentblocks.use_tinyrte.description.image'] = "Indien ingeschakeld zal het titel veld geupdate worden met een kleine rich text editor voor simpele formatting (dikgedrukt, italics en links). Wanneer je de titel tekst gebruikt als alt of title tekst zul je deze mogelijk nog moeten encoden (b.v. met htmlentities) om te voorkomen dat de html je img tag breekt.";

$_lang['contentblocks.rebuild_content'] = "Herbouwen Content";
$_lang['contentblocks.rebuild_content.confirm'] = "Met het herbouwen van de content, worden alle resources, door hun gestructureerde content, opnieuw gegenereerd. Dit betekent dat alle vorige gebruikte layouts en velden opnieuw geparsed worden en de oude content wordt overschreven. Afhankelijk van de grootte van de website, kan dit enkele seconden tot enkele minuten duren. Om dit process te starten, klik op Ja hieronder.";
$_lang['contentblocks.rebuild_content.initialising'] = "Initialiseren...";
$_lang['contentblocks.rebuild_content.resources_found'] = "Een totaal van [[+total]] resources gevonden. Het herbouwen zal ongeveer ~ [[+estimate]] minuten duren.";
$_lang['contentblocks.rebuild_content.loading_dependencies'] = "Afhankelijkheden laden voor parsen van de content...";
$_lang['contentblocks.rebuild_content.loaded_dependencies'] = "Afhankelijkheden geladen, start met de rebuild van content...";
$_lang['contentblocks.rebuild_content.skipping_not_allowed'] = "Skipping #[[+id]] ([[+pagetitle]]), ContentBlocks is geïnstrueerd om niet te handelen op deze resource (Type: [[+class_key]])";
$_lang['contentblocks.rebuild_content.skipping_not_used'] = "Skipping #[[+id]] ([[+pagetitle]]), maakt nog geen gebruik van ContentBlocks.";
$_lang['contentblocks.rebuild_content.skipping_corrupt'] = "Skipping #[[+id]] ([[+pagetitle]]), de content is niet geldig of ontbreekt.";
$_lang['contentblocks.rebuild_content.done'] = "Klaar met herbouwen van de content! [[+total_rebuild]] documenten zijn opnieuw opgebouwd, [[+total_skipped]] zijn overgeslagen en [[+total_skipped_broken]] zijn overgeslagen vanwege ongeldige inhoud.";
$_lang['contentblocks.rebuild_content.clear_cache'] = "Cache legen voor context(s): [[+contexts]]";
$_lang['contentblocks.rebuild_content.clear_cache_complete'] = "Cache geleegd. Helemaal klaar!";
$_lang['contentblocks.generating_canvas'] = "Je Content Canvas wordt gegenereerd... een ogenblik geduld.";
$_lang['contentblocks.content'] = "Template Content";
$_lang['contentblocks.open_template_builder'] = "Bouw Template";
$_lang['contentblocks.template_builder'] = "Template Bouwer";
$_lang['contentblocks.close_modal'] = "Sluit popupvenster";


/**
 * Settings. Oh boy.
 */

$_lang['setting_contentblocks.accepted_resource_types'] = "Geaccepteerde Resource Types";
$_lang['setting_contentblocks.accepted_resource_types_desc'] = "Een kommagescheiden lijst van resource class keys waarop ContentBlocks geinitialiseerd zal worden. ";

$_lang['setting_contentblocks.clear_cache_after_rebuild'] = "Cache Legen na een Rebuild";
$_lang['setting_contentblocks.clear_cache_after_rebuild_desc'] = "Indien ingeschakeld zal de Content Herbouwen functionaliteit automatisch de resource cache legen wanneer het klaar is.";

$_lang['setting_contentblocks.default_modal_view'] = "Standaard popup weergave";
$_lang['setting_contentblocks.default_modal_view_desc'] = "De manier waarop velden, layouts, en templates getoond moeten worden in het popupvenster bij het toevoegen van content aan de pagina. Mogelijke waarden zijn \"default\" (standaard), \"condensed\" (simpelere/kleinere weergave), of \"expanded\" (uitgebreidere weergave).";

$_lang['setting_contentblocks.debug'] = "Debug Modus";
$_lang['setting_contentblocks.debug_desc'] = "Indien ingeschakeld zal ContentBlocks non-minified javascript in de manager gebruiken om het makkelijker te maken om problemen te debuggen.";

$_lang['setting_contentblocks.disabled'] = "Uitgeschakeld";
$_lang['setting_contentblocks.disabled_desc'] = "Zet deze setting op 1 om ContentBlocks compleet uit te schakelen op deze site. Dit kan op context niveau worden overschreven om het alleen op specifieke contexts te gebruiken.";

$_lang['setting_contentblocks.show_resource_option'] = "Per resource aan/uitzetten";
$_lang['setting_contentblocks.show_resource_option_desc'] = "Als deze instelling is ingeschakeld zal er op elke resource de optie worden getoond om ContentBlocks aan of uit te zetten. Dit is te vinden in het instellingen tabje.";

$_lang['setting_contentblocks.canvas_position'] = "Canvas positie";
$_lang['setting_contentblocks.canvas_position_desc'] = 'Waar het canvas geplaatst moet worden. Als dit op "inherit" is ingesteld, dan zal het canvas het standaard content veld vervangen op dezelfde plek. Dit is de aanbevolen modus voor MODX Revolution 2.x. Stel in op "block" om de content in een aparte sectie onder het resource tabs paneel te plaatsen. Stel in op "tab1" of "tab2" om de content in een nieuwe Content tab te plaatsen op de eerste of tweede positie. Als een Content tab al bestaat (bijvoorbeeld door MoreGallery), dan zal dat bestaande tabblad worden gebruikt.';

$_lang['setting_contentblocks.implode_string'] = "Implodeer String";
$_lang['setting_contentblocks.implode_string_desc'] = "De tekst of markup om tussen individuele velden en layouts te plaatsen wanneer de content wordt geparsed.";

$_lang['setting_contentblocks.default_layout'] = "Standaard Layout";
$_lang['setting_contentblocks.default_layout_desc'] = "Geef het ID op van de standaard layout om op nieuwe documenten te gebruiken, of voor documenten die nog niet met ContentBlocks zijn beheerd. Sinds versie 1.2 is dit alleen nog van toepassing wanneer er geen Standard Templates zijn gevonden.";

$_lang['setting_contentblocks.default_layout_part'] = "Standaard kolom";
$_lang['setting_contentblocks.default_layout_part_desc'] = "Geef de verwijzing van een kolom op die in de standaard layout voorkomt. Op nieuwe documenten, of documenten die nog niet eerder met ContentBlocks zijn bewerkt, zal een veld (zoals gedefineerd met de Standaard Veld setting) ingevoegd worden met de content. Vanaf versie 1.2 is dit alleen van toepassing als er geen standaard Template is gevonden.";

$_lang['setting_contentblocks.default_field'] = "Standaard veld";
$_lang['setting_contentblocks.default_field_desc'] = "Geef het ID op van een veld welke standaard gebruikt moet worden in de standaard layout die je hebt opgegeven. Bij een waarde van 0 zal een simpel rich text of txt veld worden gebruikt. Sinds versie 1.2 is dit alleen nog van toepassing als er geen standaard template is gevonden.";

$_lang['setting_contentblocks.defaults_allowed_inputs'] = "Toegestane input types in standaard templates";
$_lang['setting_contentblocks.defaults_allowed_inputs_desc'] = "Kommagescheiden lijst van input types (namen) die beschikbaar zijn als doelveld bij het maken of bewerken van default templates.";

$_lang['setting_contentblocks.code.theme'] = "Code Thema";
$_lang['setting_contentblocks.code.theme_desc'] = "Het thema om te gebruiken voor de code input. Zie de Ace documentatie voor de mogelijke waarden.";

$_lang['setting_contentblocks.image.hash_name'] = "Naam Hashen";
$_lang['setting_contentblocks.image.hash_name_desc'] = "Indien ingeschakeld zal de naam van een geupload bestand gehashed worden om de originele naam te verbergen.";

$_lang['setting_contentblocks.image.prefix_time'] = "Tijdsprefix";
$_lang['setting_contentblocks.image.prefix_time_desc'] = "Indien ingeschakeld zullen geuploade bestanden een unix timestamp voor de naam krijgen. ";

$_lang['setting_contentblocks.image.sanitize'] = "Opschonen";
$_lang['setting_contentblocks.image.sanitize_desc'] = "Indien ingeschakeld zullen de namen van bestanden voor de upload opgeschoond worden. Dit ondersteund ook transliteration met iconv of third party translit bibliotheken.";

$_lang['setting_contentblocks.image.source'] = "Source";
$_lang['setting_contentblocks.image.source_desc'] = "Kies de standaard media source om te gebruiken voor afbeeldingen en gallerij input types. Dit kan per veld overschreven worden.";

$_lang['setting_contentblocks.image.upload_path'] = "Upload Pad";
$_lang['setting_contentblocks.image.upload_path_desc'] = "Het pad, binnen de gekozen media source, waar afbeeldingen naar geupload moeten worden. Dit ondersteunt placeholders als [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] en [[+resource]]. Document velden zijn ook beschikbaar, zoals [[+pagetitle]] of [[+alias]], en template variabelen zijn beschikbaar als [[+tv.name_of_tv]]. Deze waarde kan per veld worden ingesteld door de veld eigenschappen te bewerken.";
$_lang['setting_contentblocks.image.crop_path'] = "Pad naar uitsneden";
$_lang['setting_contentblocks.image.crop_path_desc'] = "Het pad, binnen de gekozen media source, waar de uitsneden worden opgeslagen. Dit ondersteunt placeholders als [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] en [[+resource]]. Document velden zijn ook beschikbaar, zoals [[+pagetitle]] of [[+alias]], en template variabelen zijn beschikbaar als [[+tv.name_of_tv]]. Deze waarde kan per veld worden ingesteld door de veld eigenschappen te bewerken.";

$_lang['setting_contentblocks.file.upload_path'] = "Upload Pad";
$_lang['setting_contentblocks.file.upload_path_desc'] = "Het pad, binnen de gekozen media source, waar bestanden naar geupload moeten worden. Dit ondersteunt placeholders als [[+year]], [[+month]], [[+day]], [[+user]], [[+username]] en [[+resource]]. Document velden zijn ook beschikbaar, zoals [[+pagetitle]] of [[+alias]], en template variabelen zijn beschikbaar als [[+tv.name_of_tv]]. Deze waarde kan per veld worden ingesteld door de veld eigenschappen te bewerken.";

$_lang['setting_contentblocks.sanitize_pattern'] = "Opschoon Patroon";
$_lang['setting_contentblocks.sanitize_pattern_desc'] = "Een RegEx patroon met tekens die opgeschoond moeten worden bij bestandsnamen.";

$_lang['setting_contentblocks.sanitize_replace'] = "Opschoon Vervanging";
$_lang['setting_contentblocks.sanitize_replace_desc'] = "Een string om matches op het Opschoon Patroon mee te vervangen. ";

$_lang['setting_contentblocks.custom_icon_path'] = "Custom icon pad";
$_lang['setting_contentblocks.custom_icon_path_desc'] = "Pad naar de aangepaste iconen. {assets_path} is toegestaan.";

$_lang['setting_contentblocks.custom_icon_url'] = "Aangepaste URL naar de iconen";
$_lang['setting_contentblocks.custom_icon_url_desc'] = "URL naar de aangepaste iconen. {assets_url} is toegestaan.";

$_lang['setting_contentblocks.translit'] = "Transliteratie";
$_lang['setting_contentblocks.translit_desc'] = "Indien je hier geen lege waarde of \"none\" opgeeft zal transliteratie worden ingeschakeld voordat bestandsnamen worden opgeschoond, waarmee ongeschikte karakters omgezet kunnen worden naar geschikte karakters. Als deze setting leeg is zal de core \"friendly_alias_translit\" setting gebruikt worden.";

$_lang['setting_contentblocks.hide_logo'] = "Verberg Logo";
$_lang['setting_contentblocks.hide_logo_desc'] = "Standaard tonen we een klein modmore logo in de rechterbenedenhoek van het ContentBlocks component. Mocht je deze om wat voor reden dan ook niet willen zien, schakel deze instelling dan in en  het logo wordt verborgen.";

$_lang['setting_contentblocks.translit_class'] = "Transliteratie Class";
$_lang['setting_contentblocks.translit_class_desc'] = "De naam van de class om te gebruiken voor transliteratie. Indien deze setting leeg is zal de core \"friendly_alias_translit_class\" setting worden gebruikt.";
$_lang['setting_contentblocks.translit_class_path'] = "Transliteratie Class Pad";
$_lang['setting_contentblocks.translit_class_path_desc'] = "Het pad naar de class om te gebruiken voor transliteratie. Indien deze setting leeg is zal de core \"friendly_alias_translit_class_path\" setting worden gebruikt.";

$_lang['setting_contentblocks.base_url_mode'] = "Basis URL Modus";
$_lang['setting_contentblocks.base_url_mode_desc'] = "Wanneer een afbeeldingen geupload wordt zal de URL automatisch genormaliseerd worden zodat de link relatief is naar de basis url van de MODX site. Afhankelijk van de configuratie, en met name in het geval van multi-context sites, zul je deze modus moeten aanpassen om afbeeldingen juist te kunnen tonen. De geaccepteerde waarden zijn: <code>relative</code> (standaard: afbeeldingen zijn relatief tot de MODX basis url), <code>absolute</code> (afbeelding urls beginnen met de basis URL) of <code>full</code> (afbeeldingen bevatten de complete site url).";

$_lang['setting_contentblocks.remove_content_dom'] = "Verwijder content uit de DOM";
$_lang['setting_contentblocks.remove_content_dom_desc'] = "Als dit is ingeschakeld zal het bestaande content veld (mogelijk met daarbij een geinitialiseerde rich text editor) compleet verwijderd worden uit de pagina op het moment dat ContentBlocks wordt geïnitialiseerd. In sommige gevallen waar een rich text editor verborgen blijft maar wel een conflict met ContentBlocks oplevert, kan het inschakelen van deze optie helpen om dat op te lossen.";
