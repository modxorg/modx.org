<?php
/**
 * Default Language file for Redactor
 *
 * @package redactor
 * @subpackage lexicon
 */

$_lang['setting_redactor'] = 'Redactor';

$_lang['setting_area_general'] = 'Algemeen';

$_lang['setting_redactor.air'] = 'Air Modus';
$_lang['setting_redactor.air_desc'] = 'Als deze optie ingeschakeld is zal Redactor de standaard toolbar verborgen worden en zal in plaats daarvan een simpelere toolbar getoond worden wanneer tekst geselecteerd wordt. Om de buttons in de air modus toolbar aan te passen is de <code>airButtons</code> configuratie optie beschikbaar.';

$_lang['setting_redactor.autoresize'] = 'Automatisch grootte aanpassen';
$_lang['setting_redactor.autoresize_desc'] = 'Wanneer ingeschakeld zal de editor groter worden  naarmate er meer tekst inkomt, zodat er niet gescrolled hoeft te worden binnen het frame.';

$_lang['setting_redactor.linkAnchor'] = 'Ankor Links';
$_lang['setting_redactor.linkAnchor_desc'] = 'Indien ingeschakeld zal de <em>insert link</em> modal een tab bevatten voor anchor links.';

$_lang['setting_redactor.linkEmail'] = 'Email Links';
$_lang['setting_redactor.linkEmail_desc'] = 'Indien ingeschakeld zal de <em>insert link</em> modal een tab bevatten voor mailto: links.';

$_lang['setting_redactor.linkResource'] = 'Document Links';
$_lang['setting_redactor.linkResource_desc'] = 'Indien ingeschakeld zal de <em>insert link</em> modal een tab bevatten voor links naar andere resources binnen de site.';

$_lang['setting_redactor.minHeight'] = 'Minimale Hoogte';
$_lang['setting_redactor.minHeight_desc'] = 'Werkt samen met de <code>Autoresize</code> optie. De minimale hoogte wordt in pixels ingevoerd.';

$_lang['setting_redactor.modalOverlay'] = 'Overlay';
$_lang['setting_redactor.modalOverlay_desc'] = 'Indien ingeschakeld zullen modal windows een overlay krijgen voor de rest van de pagina. ';

$_lang['setting_redactor.placeholder'] = 'Placeholder';
$_lang['setting_redactor.placeholder_desc'] = 'Indien deze instelling een waarde anders dan 0 heeft, zal deze tekst als placeholder gebruikt worden in de editor wanneer er nog niks is ingevuld.';

$_lang['setting_redactor.shortcuts'] = 'Snelkoppelingen';
$_lang['setting_redactor.shortcuts_desc'] = 'Indien ingeschakeld zijn de volgende shortcuts beschikbaar:</p>
    <ul>
        <li><b>ctrl + z</b> Undo typing/action</li>
        <li><b>ctrl + shift + z</b> Redo typing/action</li>
        <li><b>ctrl + m</b> Formatting verwijderen </li>
        <li><b>ctrl + b</b> Bold text</li>
        <li><b>ctrl + i</b> Italicize text</li>
        <li><b>ctrl + j</b> Insert unordered list</li>
        <li><b>ctrl + k</b> Insert ordered list</li>
        <li><b>ctrl + l</b> Superscript</li>
        <li><b>ctrl + h</b> Subscript</li>
        <li><b>tab</b> Indent text</li>
        <li><b>shift + tab</b> Outdent text</li>
    </ul>
    <p>De standaard MODX shortcuts als ctrl + s om op te slaan werken uiteraard ook.';

$_lang['setting_redactor.tabindex'] = 'Tab Index';
$_lang['setting_redactor.tabindex_desc'] = 'De tab index voor de editor. ';

$_lang['setting_redactor.visual'] = 'Visueel';
$_lang['setting_redactor.visual_desc'] = 'Indien ingeschakeld opent de editor in visuele modus, oftewel als WYSIWYG editor. Door dit uit te schakelen is de HTML code view de standaard modus waarin de editor geopend wordt.';

$_lang['setting_redactor.wym'] = 'WYM (Visuele Structuur)';
$_lang['setting_redactor.wym_desc'] = 'In de WYM ("What you mean", aka Visual Structure) modus worden block-level elements weergegeven in een gekleurd blokje met de juiste indentatie. Dit toont dan dus de visuele structuur van de markup. <a href="http://imperavi.com/redactor/examples/wym/">Bekijk een voorbeeld.</a>';

$_lang['setting_redactor.direction'] = 'Tekstrichting';
$_lang['setting_redactor.direction_desc'] = 'De tekstrichting. Standaard <code>ltr</code> (left-to-right) maar kan ook <code>rtl</code> (right-to-left) zijn.';

$_lang['setting_redactor.lang'] = 'Taal';
$_lang['setting_redactor.lang_desc'] = 'Stelt de taal voor de editor in. Standaard wordt de waarde van manager_language gebruikt, maar de volgende talen zijn beschikbaar:
    <ul>
        <li>ar (Arabic)</li>
        <li>bg (Bulgarian)</li>
        <li>by (Belarusian Belarus)</li>
        <li>cs (Czech)</li>
        <li>da (Danish)</li>
        <li>de (German)</li>
        <li>en (English)</li>
        <li>es (Spanish)</li>
        <li>fi (Finnish)</li>
        <li>fr (French)</li>
        <li>he (Hebrew)</li>
        <li>id (Indonesian)</li>
        <li>it (Italian)</li>
        <li>ja (Japanese)</li>
        <li>nl (Dutch)</li>
        <li>no_NB (Norwegian Bokmal)</li>
        <li>pl (Polish)</li>
        <li>ru (Russian)</li>
        <li>sv (Swedish)</li>
        <li>ua (Ukrainian)</li>
        <li>zh_cn (Chinese)</li>
        <li>az (Azerbaijani)</li>
        <li>ba (Bosnian)</li>
        <li>ca (Catalan)</li>
        <li>el (Greek)</li>
        <li>eo (Esperanto)</li>
        <li>es_ar (Argentinian Spanish)</li>
        <li>fa (Persian)</li>
        <li>ge (Georgian)</li>
        <li>hr (Croatian)</li>
        <li>hu (Hungarian)</li>
        <li>ko (Korean)</li>
        <li>lt (Lithuanian)</li>
        <li>lv (Latvian)</li>
        <li>mk (Macedonian)</li>
        <li>pt_br (Brazilian Portuguese)</li>
        <li>pt_pt (Portuguese)</li>
        <li>ro (Romanian)</li>
        <li>sk (Slovak)</li>
        <li>sl (Slovenian)</li>
        <li>sq (Albanian)</li>
        <li>sr-cir (Serbian (Cyrillic))</li>
        <li>sr-lat (Serbian (Latin))</li>
        <li>th (Thai)</li>
        <li>tr (Turkish)</li>
        <li>vi (Vietnamese)</li>
        <li>zh_tw (Chinese Traditional)</li>
    </ul>
    Verdere talen zijn beschikbaar vanaf de <a href="http://imperavi.com/redactor/docs/languages/">Imperavi website</a> en kunnen geupload worden naar de <code>assets/components/redactor/lang/</code> map op de server.';

$_lang['setting_redactor.allowedTags'] = 'Toegestane Tags';
$_lang['setting_redactor.allowedTags_desc'] = 'Gebruik of de Allowed Tags instelling, of de Denied Tags instelling - niet beide! Met de Allowed Tags instelling kun je een white list instellen van toegestane tags in de markup, waarbij de rest gestript zal worden.';

$_lang['setting_redactor.boldTag'] = 'Vetgedrukte Tag';
$_lang['setting_redactor.boldTag_desc'] = 'De HTML tag voor dikgedrukte stukken tekst. Dit kan <code>b</code> or <code>strong</code> zijn.';

$_lang['setting_redactor.cleanup'] = 'Schoonmaken';
$_lang['setting_redactor.cleanup_desc'] = 'Indien ingeschakeld zal Redactor geplakte tekst automatisch opschonen.';

$_lang['setting_redactor.convertDivs'] = 'Div-elementen converteren';
$_lang['setting_redactor.convertDivs_desc'] = 'Met Convert Divs ingeschakeld zal Redactor automatisch <code>&lt;div></code> tags vervangen door <code>&ltp></code> tags.';

$_lang['setting_redactor.convertLinks'] = 'Links Converteren';
$_lang['setting_redactor.convertLinks_desc'] = 'Wanneer Convert Links is ingeschakeld zullen links in de content automatisch omgezet worden in <code>&lt;a href=""></code> tags.';

$_lang['setting_redactor.deniedTags'] = 'Niet toegestane tags';
$_lang['setting_redactor.deniedTags_desc'] = 'Gebruik of de Allowed Tags instelling, of de Denied Tags instelling - niet beide! Met de Denied Tags instelling kan je een black list bij houden van tags die niet zijn toegestaan.';

$_lang['setting_redactor.formattingPre'] = 'Opmaak toestaan in pre tags';
$_lang['setting_redactor.formattingPre_desc'] = 'Met deze instelling ingeschakeld wordt het mogelijk om formatting (bold, italics, etc) in <code>&lt;pre&gt;</code> tags te gebruiken.';

$_lang['setting_redactor.italicTag'] = 'Cursieve Tag';
$_lang['setting_redactor.italicTag_desc'] = 'De HTML tag voor schuingedrukte tekst. Dit kan <code>i</code> of <code>em</code> zijn.';

$_lang['setting_redactor.linebreaks'] = 'Linebreaks';
$_lang['setting_redactor.linebreaks_desc'] = 'Met deze instelling ingeschakeld worden linebreaks ingevoegd als <code>&lt;br&gt;</code> tags in plaats van nieuwe paragrafen. Deze instelling zorgt ervoor dat de <code>Paragraphy</code> modus wordt uitgeschakeld.';

$_lang['setting_redactor.marginFloatLeft'] = 'Linker Float Marge';
$_lang['setting_redactor.marginFloatLeft_desc'] = 'Wanneer afbeelding links of rechts worden gepositioneerd kan Redactor een <em>CSS Class</em> of <em>margins</em> toevoegen om te zorgen dat de afbeelding niet tegen de tekst aan zit. Zet in deze instelling een margin als volgt: <code>0 10px 10px 0</code> of geef een class mee door de waarde met een punt te prefixen: <code>.imageFloatLeftInContent</code>. Meerdere classes zijn mogelijk, specifieer daarvoor alleen een punt in de eerste class.';

$_lang['setting_redactor.marginFloatRight'] = 'Rechter Float Marge';
$_lang['setting_redactor.marginFloatRight_desc'] = 'Wanneer afbeelding links of rechts worden gepositioneerd kan Redactor een <em>CSS Class</em> of <em>margins</em> toevoegen om te zorgen dat de afbeelding niet tegen de tekst aan zit. Zet in deze instelling een margin als volgt: <code>0 0 10px 10px</code> of geef een class mee door de waarde met een punt te prefixen: <code>.imageFloatLeftInContent</code>. Meerdere classes zijn mogelijk, specifieer daarvoor alleen een punt in de eerste class.';

$_lang['setting_redactor.paragraphy'] = 'Paragrafen';
$_lang['setting_redactor.paragraphy_desc'] = 'Wanneer Paragraphy is ingeschakeld zal alles in <code>&lt;p&gt;</code> tags (paragraphs) worden gezet. Let op dat de <code>Linebreaks</code> instelling deze instelling uitzet.';

$_lang['setting_redactor.css'] = 'Iframe CSS';
$_lang['setting_redactor.css_desc'] = 'Geef een volledige URL in naar een CSS betand om te gebruiken wanneer de <code>Iframe</code> modus is ingeschakeld. (TinyMCE noemt dit "Editor CSS".)';

$_lang['setting_redactor.iframe'] = 'Iframe Modus';
$_lang['setting_redactor.iframe_desc'] = 'Gebruik een iframe voor de editor. Dit maakt het mogelijk om eigen css met de <code>Iframe CSS</code> setting te gebruiken.';

$_lang['setting_redactor.linkProtocol'] = 'Protocol';
$_lang['setting_redactor.linkProtocol_desc'] = 'Het protocol (<code>http://</code>, <code>https://</code> of laat leeg) om links mee in te voegen.';

$_lang['setting_redactor.mobile'] = 'Mobiel';
$_lang['setting_redactor.mobile_desc'] = 'Als de gebruiker op een telefoon of tablet (volgens een eenvoudige user agent sniff) de pagina bezoekt zal Redactor een sterk versimpelde versie van de editor tonen.';

$_lang['setting_redactor.imageEditable'] = 'Observe Images';
$_lang['setting_redactor.imageEditable_desc'] = 'When enabled, clicking an image in the edit area will open up a modal window letting users change the alignment and add alt/title attributes.';

$_lang['setting_redactor.browse_recursive'] = 'Recursive Bladeren';
$_lang['setting_redactor.browse_recursive_desc'] = 'When enabled, adds a dropdown to select subfolders when browsing for files.';

$_lang['setting_redactor.date_files'] = 'Bestanden Dateren';
$_lang['setting_redactor.date_files_desc'] = 'Schakel deze instelling in om geuploade bestanden te prefixen met een tijdstempel om te zorgen dat ze uniek zijn.';

$_lang['setting_redactor.date_images'] = 'Afbeeldingen Dateren';
$_lang['setting_redactor.date_images_desc'] = 'Schakel deze instelling in om geuploade afbeeldingen te prefixen met een tijdstempel om te zorgen dat ze uniek zijn.';

$_lang['setting_redactor.file_upload_path'] = 'Bestand Upload Pad';
$_lang['setting_redactor.file_upload_path_desc'] = 'The path, relative to the root of the media source as defined by the <code>Media Source</code> setting, in which file uploads should be placed. You can use the following placeholders (no output filters, please):
    <ul>
        <li><code>&#91;&#91;+year&#93;&#93;</code> numeric representation (4 digits) of the current year.</li>
        <li><code>&#91;&#91;+month&#93;&#93;</code> numeric representation (2 digits) of the current month with leading zero</em></li>
        <li><code>&#91;&#91;+day&#93;&#93;</code> numeric representation (2 digits) of the current day in the month</li>
        <li><code>&#91;&#91;+user&#93;&#93;</code> the ID of the currently logged in user.</li>
        <li><code>&#91;&#91;+username&#93;&#93;</code> the username of the currently logged in user.</li>
        <li><code>&#91;&#91;+pagetitle&#93;&#93;</code> the pagetitle of the current resource.</li>
        <li><code>&#91;&#91;+id&#93;&#93;</code> the id of the currently resource.</li>
        <li><code>&#91;&#91;+alias&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+parent&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+parent_alias&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+ultimate_parent&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+ultimate_parent_alias&#93;&#93;</code> the alias of the current resource.</li>
    </ul>
    Also see <code>Image Upload Path</code>, <code>Media Source</code> and <a href="https://www.modmore.com/extras/redactor/documentation/media-sources/">Using Media Sources with Redactor</a>';

$_lang['setting_redactor.image_upload_path'] = 'Afbeelding Upload Pad';
$_lang['setting_redactor.image_upload_path_desc'] = 'The path, relative to the root of the media source as defined by the <code>Media Source</code> setting, in which image uploads should be placed. You can use the following placeholders (no output filters, please):
    <ul>
        <li><code>&#91;&#91;+year&#93;&#93;</code> numeric representation (4 digits) of the current year.</li>
        <li><code>&#91;&#91;+month&#93;&#93;</code> numeric representation (2 digits) of the current month with leading zero</em></li>
        <li><code>&#91;&#91;+day&#93;&#93;</code> numeric representation (2 digits) of the current day in the month</li>
        <li><code>&#91;&#91;+user&#93;&#93;</code> the ID of the currently logged in user.</li>
        <li><code>&#91;&#91;+username&#93;&#93;</code> the username of the currently logged in user.</li>
        <li><code>&#91;&#91;+pagetitle&#93;&#93;</code> the pagetitle of the current resource.</li>
        <li><code>&#91;&#91;+id&#93;&#93;</code> the id of the currently resource.</li>
        <li><code>&#91;&#91;+alias&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+parent&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+parent_alias&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+ultimate_parent&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+ultimate_parent_alias&#93;&#93;</code> the alias of the current resource.</li>
    </ul>
    Also see <code>Image Upload Path</code>, <code>Media Source</code> and <a href="https://www.modmore.com/extras/redactor/documentation/media-sources/">Using Media Sources with Redactor</a>';
    
$_lang['setting_redactor.file_upload_path'] = 'Bestand Upload Pad';
$_lang['setting_redactor.file_upload_path_desc'] = 'The path, relative to the root of the media source as defined by the <code>Media Source</code> setting, in which file uploads should be placed. You can use the following placeholders (no output filters, please):
    <ul>
        <li><code>&#91;&#91;+year&#93;&#93;</code> numeric representation (4 digits) of the current year.</li>
        <li><code>&#91;&#91;+month&#93;&#93;</code> numeric representation (2 digits) of the current month with leading zero</em></li>
        <li><code>&#91;&#91;+day&#93;&#93;</code> numeric representation (2 digits) of the current day in the month</li>
        <li><code>&#91;&#91;+user&#93;&#93;</code> the ID of the currently logged in user.</li>
        <li><code>&#91;&#91;+username&#93;&#93;</code> the username of the currently logged in user.</li>
        <li><code>&#91;&#91;+pagetitle&#93;&#93;</code> the pagetitle of the current resource.</li>
        <li><code>&#91;&#91;+id&#93;&#93;</code> the id of the currently resource.</li>
        <li><code>&#91;&#91;+alias&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+parent&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+parent_alias&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+ultimate_parent&#93;&#93;</code> the alias of the current resource.</li>
        <li><code>&#91;&#91;+ultimate_parent_alias&#93;&#93;</code> the alias of the current resource.</li>
    </ul>
    Also see <code>Image Upload Path</code>, <code>Media Source</code> and <a href="https://www.modmore.com/extras/redactor/documentation/media-sources/">Using Media Sources with Redactor</a>';

$_lang['setting_redactor.mediasource'] = 'Media Source';
$_lang['setting_redactor.mediasource_desc'] = '<p>Choose (or provide the ID of) a Media Source to use for uploading and browsing images and files. This can be any type of Media Source that implements uploading and browsing of images. </p>
    <p>Also see <code>File Upload Path</code>, <code>Image Upload Path</code> and <a href="https://www.modmore.com/redactor/documentation/managing-media/">Managing Media with Redactor</a>';
$_lang['setting_redactor.file_mediasource'] = 'Media Source for Files';
$_lang['setting_redactor.file_mediasource_desc'] = '<p>Choose (or provide the ID of) a Media Source to use for uploading and browsing files. This can be any type of Media Source that implements uploading and browsing of images. </p>
    <p>Also see <code>File Upload Path</code>, and <a href="https://www.modmore.com/redactor/documentation/managing-media/">Managing Media with Redactor</a>';

$_lang['setting_redactor.prefetch_ttl'] = 'Prefetch TTL';
$_lang['setting_redactor.prefetch_ttl_desc'] = 'In de document zoekbox wordt een prefetch uitgevoerd waarin gepubliceerde top-level documenten worden ingeladen. Deze data is van te voren geladen en is dus direct beschikbaar in de zoekbox. Uiteraard wordt bij het tikken in de zoekbox nog verder gezocht binnen de documenten in de site. De Prefetch TTL geeft aan hoe lang (in microseconden) de prefetch data bewaard moet blijven in de LocalStorage van de gebruiker. ';

$_lang['setting_redactor.typeahead.include_introtext'] = 'Toon Introtekst';
$_lang['setting_redactor.typeahead.include_introtext_desc'] = 'Wanneer deze instelling is ingeschakeld zal de zoekbox ook de introtekst van documenten tonen, waarbij je meer informatie over de gevonden documenten te zien krijgt.';

$_lang['setting_redactor.airButtons'] = 'Air Modus Knoppen';
$_lang['setting_redactor.airButtons_desc'] = 'De knoppen, gescheiden door komma\'s, die moeten worden gebruikt in de toolbar welke zichtbaar is wanneer Air Modus ingeschakeld is en de tekst is geselecteerd. Zie <code>Knoppen</code> voor de mogelijkheden. Gebruik een <code>|</code> (pipe symbool) om een scheidingsteken toe te voegen. Standaard: <code>formatting, |, bold, italic, deleted, |, unorderedlist, orderedlist, outdent, indent, |, fontcolor, backcolor</code>';

$_lang['setting_redactor.buttonSource'] = 'Source Knop';
$_lang['setting_redactor.buttonSource_desc'] = 'Indien uitgeschakeld zal de source knop (<code>html</code> in de knoppen configuratie) niet getoond worden.';

$_lang['setting_redactor.activeButtons'] = 'Active Buttons';
$_lang['setting_redactor.activeButtons_desc'] = 'This setting allows to set which buttons will become active if the cursor is positioned inside of a respectively formatted text.';

$_lang['setting_redactor.activeButtonsStates'] = 'Active Buttons States';
$_lang['setting_redactor.activeButtonsStates_desc'] = 'This setting allows to set which tags make buttons active. activeButtonsStates should always be used with activeButtons.';

$_lang['setting_redactor.buttons'] = 'Knoppen';
$_lang['setting_redactor.buttons_desc'] = 'De knoppen die getoond worden in de Redactor toolbar. Let op dat wanneer <code>Air Modus</code> gebruikt wordt je de <code>Air Knoppen</code> moet configureren. Gebruik een <code>|</code> (pipe symbool) om een scheidingsteken in te voegen. Standaard: <code>html, |, formatting, |, bold, italic,
deleted, |, unorderedlist, orderedlist, outdent,
indent, |, image, video, file, table, link, |,
fontcolor, backcolor, |, alignment, |, horizontalrule </code> Overige beschikbare knoppen: <code>underline, alignleft, aligncenter, alignright, justify</code>';

$_lang['setting_redactor.colors'] = 'Kleuren';
$_lang['setting_redactor.colors_desc'] = 'De kleuren (hexcodes) die beschikbaar zijn met de <code>fontcolor</code> en <code>backcolor</code> toolbar knoppen. Standaard: <code>#ffffff, #000000, #eeece1, #1f497d, #4f81bd, #c0504d, #9bbb59, #8064a2, #4bacc6, #f79646, #ffff00, #f2f2f2, #7f7f7f, #ddd9c3, #c6d9f0, #dbe5f1, #f2dcdb, #ebf1dd, #e5e0ec, #dbeef3, #fdeada, #fff2ca, #d8d8d8, #595959, #c4bd97, #8db3e2, #b8cce4, #e5b9b7, #d7e3bc, #ccc1d9, #b7dde8, #fbd5b5, #ffe694, #bfbfbf, #3f3f3f, #938953, #548dd4, #95b3d7, #d99694, #c3d69b, #b2a2c7, #b7dde8, #fac08f, #f2c314, #a5a5a5, #262626, #494429, #17365d, #366092, #953734, #76923c, #5f497a, #92cddc, #e36c09, #c09100, #7f7f7f, #0c0c0c, #1d1b10, #0f243e, #244061, #632423, #4f6128, #3f3151, #31859b, #974806, #7f6000</code>';

$_lang['setting_redactor.formattingTags'] = 'Opmaak Tags';
$_lang['setting_redactor.formattingTags_desc'] = 'The options you get when clicking the <code>formatting</code> button in the Redactor toolbar. Defaults to: <code>p, blockquote, pre, h1, h2, h3, h4</code> which are the only currently supported formatting tags. (Need more? <a href="mailto:support@modmore.com?subject=I+need+more+formatting+tags+for+Redactor+because">Let us know!</a>)';

$_lang['setting_redactor.browse_recursive'] = 'Recursive Bladeren';
$_lang['setting_redactor.browse_recursive_desc'] = 'When enabled, adds a dropdown to select subfolders when browsing for files.';

$_lang['setting_redactor.image_browse_path'] = 'File Browse Path';
$_lang['setting_redactor.image_browse_path_desc'] = 'The path to browse when choosing files, relative to the root of the media source as defined by the <code>Media Source</code> setting, in which file uploads should be placed.';

$_lang['setting_redactor.buttonFullScreen'] = 'Fullscreen knop';
$_lang['setting_redactor.buttonFullScreen_desc'] = 'When enabled, a fullscreen button will be located in the right of the toolbar.';

$_lang['setting_redactor.dynamicThumbs'] = 'Dynamische Miniaturen';
$_lang['setting_redactor.dynamicThumbs_desc'] = 'When enabled, dynamic thumbnails will be generated for previewing images.';

$_lang['setting_redactor.cleanFileNames'] = 'Bestandsnamen opschonen';
$_lang['setting_redactor.cleanFileNames_desc'] = 'When enabled, special characters will be removed from files on upload.';

$_lang['setting_redactor.file_browse_path'] = 'File Browse Path';
$_lang['setting_redactor.file_browse_path_desc'] = 'The path to browse when choosing images, relative to the root of the media source as defined by the <code>Media Source</code> setting, in which files should be available through the insert file modal window.';

$_lang['setting_redactor.browse_files'] = 'Browse Files';
$_lang['setting_redactor.browse_files_desc'] = 'When enabled, allows uploaded files to be selected.';

$_lang['redactor.browse_warning'] = "Uh oh, there aren't any images here. Change your image_browse_path setting to browse another location or upload some images to [[+path]].";
$_lang['redactor.browse_files_warning'] = "Uh oh, there aren't any files here. Change your file_browse_path setting to browse another location or upload some images to [[+path]].";

$_lang['setting_redactor.searchImages'] = "Search Images";
$_lang['setting_redactor.searchImages_desc'] = "When enabled, a search bar can be used to filter images in the choose image modal window.";

$_lang['setting_redactor.clipsJson'] = 'Clips JSON';
$_lang['setting_redactor.clipsJson_desc'] = 'If set and a <a href="http://jsonlint.com" target="_blank">valid JSON String</a>, adds the Redactor Clips plugin to the toolbar.';

$_lang['setting_redactor.stylesJson'] = 'Styles JSON';
$_lang['setting_redactor.stylesJson_desc'] = 'If set and a valid JSON String, adds the Redactor Styles plugin to the toolbar.';

$_lang['setting_redactor.additionalPlugins'] = 'Additional Plugins';
$_lang['setting_redactor.additionalPlugins_desc'] = 'Define as a comma separated list of "pluginname:pluginfile" to load additional Redactor plugins. ';

$_lang['setting_redactor.fullpage'] = 'Fullpage';
$_lang['setting_redactor.fullpage_desc'] = 'Allows editing of a complete HTML-page (including html, head, body and other tags) in iframe and fullpage mode.';

$_lang['setting_redactor.dragUpload'] = 'Drag Upload';
$_lang['setting_redactor.dragUpload_desc'] = 'This setting allows users to drag and drop images from their computers into Redactor and upload these images to server. This feature works in all latest browsers, except for IE.';

$_lang['setting_redactor.convertImageLinks'] = 'Convert Image Links';
$_lang['setting_redactor.convertImageLinks_desc'] = 'Converts links like http://site.com/image.jpg into img tags upon pressing Return key.';

$_lang['setting_redactor.convertVideoLinks'] = 'Convert Video Links';
$_lang['setting_redactor.convertVideoLinks_desc'] = 'Converts links like https://www.youtube.com/watch?v=DcRp9V5GbqQ into Youtube embedded player upon pressing Return key.';

$_lang['setting_redactor.tidyHtml'] = 'Tidy HTML';
$_lang['setting_redactor.tidyHtml_desc'] = 'Set to false to turn off nice output code formatting.';

$_lang['setting_redactor.linkTooltip'] = 'Observe Links';
$_lang['setting_redactor.linkTooltip_desc'] = 'Set to true to allow follow/edit links by putting cursor to the link right in Redactor.';

//$_lang['setting_redactor.imageFloatMargin'] = 'Image Float Margin';
//$_lang['setting_redactor.imageFloatMargin_desc'] = 'Custom margin for images setting.';

$_lang['setting_redactor.tabSpaces'] = 'Tab Spaces';
$_lang['setting_redactor.tabSpaces_desc'] = 'Set to true to use space instead of margins for Chinese language.';

$_lang['setting_redactor.tabAsSpaces'] = 'Tab as Spaces';
$_lang['setting_redactor.tabAsSpaces_desc'] = 'This setting allows to apply spaces instead of tabulation on Tab key. To turn this setting on, set number of spaces.';

$_lang['setting_redactor.removeEmptyTags'] = 'Remove Empty Tags';
$_lang['setting_redactor.removeEmptyTags_desc'] = 'This setting allows to turn on and off removing of empty tags.';

$_lang['setting_redactor.sanitizeReplace'] = 'Sanitize Replace';
$_lang['setting_redactor.sanitizeReplace_desc'] = 'The replacement character used when sanitizing names of uploaded files.';

$_lang['setting_redactor.sanitizePattern'] = 'Sanitize Pattern';
$_lang['setting_redactor.sanitizePattern_desc'] = 'A RegEx pattern applied when sanitizing names of uploaded files.';

$_lang['setting_redactor.linkSize'] = 'Link Size';
$_lang['setting_redactor.linkSize_desc'] = 'Maximum number of characters when displaying a URL.';

$_lang['setting_redactor.advAttrib'] = 'Advanced Attributes';
$_lang['setting_redactor.advAttrib_desc'] = 'If Enabled attributes such as class, id, and title will be available when editing links and images.';

$_lang['setting_redactor.linkNofollow'] = 'Link No-Follow';
$_lang['setting_redactor.linkNofollow_desc'] = 'This setting will add nofollow attribute to the links added via Redactor.';

$_lang['setting_redactor.typewriter'] = 'Typewriter';
$_lang['setting_redactor.typewriter_desc'] = 'Stress-free typewriter mode. http://imperavi.com/redactor/examples/typewriter/';

$_lang['setting_redactor.buttonsHideOnMobile'] = 'Hidden Mobile Buttons';
$_lang['setting_redactor.buttonsHideOnMobile_desc'] = 'With this option, you can specify which buttons of the toolbar can be hidden on mobile devices.';

$_lang['setting_redactor.toolbarOverflow'] = 'Toolbar Overflow';
$_lang['setting_redactor.toolbarOverflow_desc'] = 'With this option, you can specify a toolbar button to build only one row on mobile devices.';

$_lang['setting_redactor.imageTabLink'] = 'Image Tab Link';
$_lang['setting_redactor.imageTabLink_desc'] = 'With this option you can enable/disabled a tab with insert image as link.';

$_lang['setting_redactor.cleanSpaces'] = 'Clean Spaces';
$_lang['setting_redactor.cleanSpaces_desc'] = 'Removes extra space in pasted text when true and leave extra spaces when \'false\'.';

$_lang['setting_redactor.predefinedLinks'] = 'Predefined Links';
$_lang['setting_redactor.predefinedLinks_desc'] = 'This setting allowing to add a list of predefined links in "Add link" modal. http://imperavi.com/redactor/docs/settings/#set-predefinedLinks';

$_lang['setting_redactor.shortcutsAdd'] = 'Additional Shortcuts';
$_lang['setting_redactor.shortcutsAdd_desc'] = 'This setting add your custom shortcuts to Redactor. http://imperavi.com/redactor/docs/settings/#set-shortcutsAdd';

$_lang['setting_redactor.commemorateRebecca'] = 'Commemorate Rebecca';
$_lang['setting_redactor.commemorateRebecca_desc'] = 'Commemorates <a href="http://www.zeldman.com/2014/06/10/the-color-purple/" target="_blank">Rebecca Meyer</a> by setting the Redactor toolbar to <strong style="color:#663399;color:rebeccapurple;">her favorite color</strong> the seventh of each June.';

$_lang['setting_redactor.toolbarFixed'] = 'Toolbar Fixed';
$_lang['setting_redactor.toolbarFixed_desc'] = 'If this option is turned on, Redactor\'s toolbar will remain in view at all times, by sticking to the top of the window when scrolling down.';

$_lang['setting_redactor.focus'] = 'Focus';
$_lang['setting_redactor.focus_desc'] = 'By default, Redactor doesn\'t receive focus on load, because there may be other input fields on a page. However, to set focus to Redactor, you can use this setting.';

$_lang['setting_redactor.focusEnd'] = 'Focus End';
$_lang['setting_redactor.focusEnd_desc'] = 'This setting allows focus to be set after the last character in Redactor.';

$_lang['setting_redactor.scrollTarget'] = 'Scroll Target';
$_lang['setting_redactor.scrollTarget_desc'] = 'This setting allows to set a parent layer when Redactor is placed inside of layer with scrolling. When this is set, scroll will return to correct position when a user pastes some text.';

$_lang['setting_redactor.enterKey'] = 'Enter Key';
$_lang['setting_redactor.enterKey_desc'] = 'This setting allows to prevent use of Return key.';

$_lang['setting_redactor.cleanStyleOnEnter'] = 'Clean Style on Enter';
$_lang['setting_redactor.cleanStyleOnEnter_desc'] = 'When enabled this setting will prevent new paragraph from inheriting styles, classes and attributes form a previous paragraph.';

$_lang['setting_redactor.linkTooltip'] = 'Observe Links';
$_lang['setting_redactor.linkTooltip_desc'] = 'Set to true to allow follow/edit links by putting cursor to the link right in Redactor.';

$_lang['setting_redactor.imageEditable'] = 'Observe Images';
$_lang['setting_redactor.imageEditable_desc'] = 'When enabled, clicking an image in the edit area will open up a modal window letting users change the alignment and add alt/title attributes.';

$_lang['setting_redactor.imageResizable'] = 'Image Resizable';
$_lang['setting_redactor.imageResizable_desc'] = 'Turns on visual manual image resizing.';

$_lang['setting_redactor.imageLink'] = 'Image Link';
$_lang['setting_redactor.imageLink_desc'] = 'Turns on the ability to add a link to an image via edit modal window.';

$_lang['setting_redactor.imagePosition'] = 'Image Position';
$_lang['setting_redactor.imagePosition_desc'] = 'This setting allows to set image position (float alignment) in relation to the text.';

$_lang['setting_redactor.buttonsHide'] = 'Hidden Buttons';
$_lang['setting_redactor.buttonsHide_desc'] = 'This setting allows Redactor to hide certain buttons on launch.';

$_lang['setting_redactor.buttonsHideOnMobile'] = 'Hidden Mobile Buttons';
$_lang['setting_redactor.buttonsHideOnMobile_desc'] = 'With this option, you can specify which buttons of the toolbar can be hidden on mobile devices.';

$_lang['setting_redactor.formattingAdd'] = 'Formatting Add';
$_lang['setting_redactor.formattingAdd_desc'] = 'This setting allows to select tags and styles for the formatting dropdown. formattingAdd can only be applied to p, pre, blockquote and header tags. Each formatting tag gets a CSS class that allows to customize style of each element. See more here: https://www.modmore.com/redactor/documentation/custom-formats/';
    
$_lang['setting_redactor.tabifier'] = 'Tabifier';
$_lang['setting_redactor.tabifier_desc'] = 'Sets indent for code when using code.toggle or code.get.';

$_lang['setting_redactor.textexpander'] = 'Text Expander';
$_lang['setting_redactor.textexpander_desc'] = 'Enter a short snippet of text or a word and this plugin will replace it to a frequently used predefined text. For example, enter "addrr" to have it replaced with your mailing address. <a href="http://imperavi.com/redactor/plugins/text-expander/" target="_blank">See more</a>.';

$_lang['setting_redactor.replaceStyles'] = 'Replace Styles';
$_lang['setting_redactor.replaceStyles_desc'] = 'This setting allows to set which span styles will be replaced by tags. See more at http://imperavi.com/redactor/docs/settings/clean/#setting-replaceStyles';

$_lang['setting_redactor.replaceStyles'] = 'Replace Styles';
$_lang['setting_redactor.replaceStyles_desc'] = 'This setting allows to set which span styles will be replaced by tags. See more at http://imperavi.com/redactor/docs/settings/clean/#setting-replaceStyles';

$_lang['setting_redactor.removeDataAttr'] = 'Remove Data Attribute';
$_lang['setting_redactor.removeDataAttr_desc'] = 'When enabled, Redactor will remove all data attributes in the code.';

$_lang['setting_redactor.removeAttr'] = 'Remove Attribute';
$_lang['setting_redactor.removeAttr_desc'] = 'This setting allows to set attributes that will be removed from the code.';

$_lang['setting_redactor.allowedAttr'] = 'Allowed Attribute';
$_lang['setting_redactor.allowedAttr_desc'] = 'This setting allows to set attributes that will not be removed from the code.';

$_lang['setting_redactor.dragImageUpload'] = 'Drag Image Upload';
$_lang['setting_redactor.dragImageUpload_desc'] = 'When disabled, turns off drag and drop image uploads.';

$_lang['setting_redactor.dragFileUpload'] = 'Drag File Upload';
$_lang['setting_redactor.dragFileUpload_desc'] = 'When disabled, turns off the ability to upload files using drag and drop.';

$_lang['setting_redactor.replaceDivs'] = 'Replace Divs';
$_lang['setting_redactor.replaceDivs_desc'] = "This setting makes Redactor to convert all divs in a text into paragraphs. With 'linebreaks' set to 'true', all div tags will be removed, and text will be marked up with tag.";

$_lang['setting_redactor.preSpaces'] = 'Pre Spaces';
$_lang['setting_redactor.preSpaces_desc'] = "This setting allows to set the number of spaces that will be applied when a user presses Tab key inside of preformatted blocks. If set to 'false', Tab key will apply tabulation instead of spaces inside of preformatted blocks.";


$_lang['setting_redactor.plugin_counter'] = 'Counter';
$_lang['setting_redactor.plugin_counter_desc'] = "Adds a character counter.";

$_lang['setting_redactor.plugin_fontcolor'] = 'Font Color';
$_lang['setting_redactor.plugin_fontcolor_desc'] = "Adds the ability to set the text color and/or text backgroud color.";

$_lang['setting_redactor.plugin_fontfamily'] = 'Font Family';
$_lang['setting_redactor.plugin_fontfamily_desc'] = "Choose a font family for selected text.";

$_lang['setting_redactor.plugin_fontsize'] = 'Font Size';
$_lang['setting_redactor.plugin_fontsize_desc'] = "Change the font size specified in pixels. Bigger sometimes is better.";

//$_lang['setting_redactor.plugin_imagemanager'] = 'Image Manager';
//$_lang['setting_redactor.plugin_imagemanager_desc'] = "Upload or choose and insert images, align pictures and tell a more visual story.";

//$_lang['setting_redactor.plugin_filemanager'] = 'File Manager';
//$_lang['setting_redactor.plugin_filemanager_desc'] = "Manage, upload, select files and place them anywhere in Redactor.";

$_lang['setting_redactor.plugin_limiter'] = 'Limiter';
$_lang['setting_redactor.plugin_limiter_desc'] = "Limit the number of characters a user can enter.";

$_lang['setting_redactor.plugin_table'] = 'Table';
$_lang['setting_redactor.plugin_table_desc'] = "Insert and format tables with ease.";

$_lang['setting_redactor.plugin_textdirection'] = 'Text Direction';
$_lang['setting_redactor.plugin_textdirection_desc'] = "Easily change the direction of the text in a block element (paragraph, header, blockquote etc.).";

$_lang['setting_redactor.plugin_video'] = 'Video';
$_lang['setting_redactor.plugin_video_desc'] = "Enrich text with embedded video.";

$_lang['setting_redactor.parse_parent_path'] = 'Parse Parent Path';
$_lang['setting_redactor.parse_parent_path_desc'] = "When enabled, parses path variables for [[++parent]], [[++parent_alias]], [[++ultimate_parent]], [[++ultimate_parent_alias]] placeholders.";

$_lang['setting_redactor.parse_parent_path_height'] = 'Parse Parent Path Height';
$_lang['setting_redactor.parse_parent_path_height_desc'] = "Depth to search for a resource's ultimate parent.";

$_lang['setting_redactor.plugin_replacer'] = 'Replace Text';
$_lang['setting_redactor.plugin_replacer_desc'] = "When enabled use CTRL+F to trigger a simple Find and Replace tool.";

$_lang['setting_redactor.plugin_eureka'] = 'Eureka Plugin';
$_lang['setting_redactor.plugin_eureka_desc'] = "When enabled uses the Eureka media browser to choose images.";

$_lang['setting_redactor.plugin_eureka_shivie9'] = 'Eureka Plugin Shiv IE 9';
$_lang['setting_redactor.plugin_eureka_shivie9_desc'] = "When enabled includes polyfills to hack IE9 support.";

$_lang['setting_redactor.plugin_zoom'] = 'Zoom Plugin';
$_lang['setting_redactor.plugin_zoom_desc'] = "When enabled adds a keyboard shortcut to enlarge and decrease font size in content area. Use CTRL + and CTRL -.";

$_lang['setting_redactor.plugin_speek'] = 'Listen Plugin';
$_lang['setting_redactor.plugin_speek_desc'] = "When enabled and in supported browsers adds a toolbar button which reads editor content aloud.";

$_lang['setting_redactor.plugin_speechVoice'] = 'Speech Voice';
$_lang['setting_redactor.plugin_speechVoice_desc'] = "Voice to be used by Speek Plugin when reading aloud.";

$_lang['setting_redactor.plugin_speechRate'] = 'Speech Rate';
$_lang['setting_redactor.plugin_speechRate_desc'] = "Rate at which voice should be spoken by Speek Plugin when reading aloud.";

$_lang['setting_redactor.plugin_speechPitch'] = 'Speech Pitch';
$_lang['setting_redactor.plugin_speechPitch_desc'] = "Pitch at which voice should be spoken by Speek Plugin when reading aloud.";

$_lang['setting_redactor.plugin_speechVolume'] = 'Speech Volume';
$_lang['setting_redactor.plugin_speechVolume_desc'] = "Volume at which voice should be spoken by Speek Plugin when reading aloud.";

$_lang['setting_redactor.plugin_contrast'] = 'Contrast Plugin';
$_lang['setting_redactor.plugin_contrast_desc'] = "When enabled hit F5 to invert eidtor screen contrast.";

$_lang['setting_redactor.plugin_download'] = 'Download Plugin';
$_lang['setting_redactor.plugin_download_desc'] = "When enabled adds a toolbar button to download editor code.";

$_lang['setting_redactor.plugin_syntax'] = 'Syntax Highlighter Plugin';
$_lang['setting_redactor.plugin_syntax_desc'] = "When enabled adds Ace syntax highlighter to Redactor souce mode.";

$_lang['setting_redactor.plugin_norphan'] = 'Norphan Plugin';
$_lang['setting_redactor.plugin_norphan_desc'] = "When enabled attempts to prevent orphans by replacing the last space between words of block elements with a non-breaking space.";

$_lang['setting_redactor.plugin_imagepx'] = 'Image Edit Dimensions Plugin';
$_lang['setting_redactor.plugin_imagepx_desc'] = "When enabled adds options to set and preview image dimensions in the Image Edit modal window.";

$_lang['setting_redactor.plugin_breadcrumb'] = 'Breadcrumb Plugin';
$_lang['setting_redactor.plugin_breadcrumb_desc'] = "When enabled visually displays a breadcrumb navigation of the DOM node or nodes being edited.";

$_lang['setting_redactor.counterWPM'] = 'Counter Words Per Minute';
$_lang['setting_redactor.counterWPM_desc'] = "Words per minute used by counter plugin to estimate reading time.";

$_lang['setting_redactor.increment_file_names'] = 'Increment File Names';
$_lang['setting_redactor.increment_file_names_desc'] = "When enabled and with Filesystem Media sources, will prevent duplicate file names more intuitevly by appending a numeric index rather than a date stamp.";

$_lang['setting_redactor.pastePlainText'] = 'Paste Plain Text';
$_lang['setting_redactor.pastePlainText_desc'] = "This setting turns on pasting as plain text. The pasted text will be stripped of any tags, line breaks will be marked with 
tag. With this set to 'true' and 'enterKey' set to 'false', line breaks will be replaced by spaces.";

$_lang['setting_redactor.paragraphize'] = 'Paragraphize';
$_lang['setting_redactor.paragraphize_desc'] = "When linebreaks setting is not set, new and pasted text will be processed by a paragraph markup function. All pasted text and all newly entered text will be marked up with paragraphs to preserve proper text formatting.";

$_lang['setting_redactor.removeComments'] = 'Remove Comments';
$_lang['setting_redactor.removeComments_desc'] = "If set to 'true', all HTML comment will be removed from code.";

$_lang['setting_redactor.codemirror'] = 'CodeMirror';
$_lang['setting_redactor.codemirror_desc'] = "If set to 'true', CodeMirror will be used for syntax highlighting in source mode, regardless of plugin_syntax setting.";

$_lang['setting_redactor.plugin_uploadcare'] = 'Uploadcare Plugin';
$_lang['setting_redactor.plugin_uploadcare_desc'] = "When enabled adds a Uploadcare to the toolbar.";

$_lang['setting_redactor.plugin_uploadcare_pub_key'] = 'Uploadcare Public Key';
$_lang['setting_redactor.plugin_uploadcare_pub_key_desc'] = "Public Key to use when authenticating with the Uploadcare API.";

$_lang['setting_redactor.uploadcare_locale'] = 'Uploadcare Locale';
$_lang['setting_redactor.uploadcare_locale_desc'] = "Localisation language for Uploadcare widget.";

$_lang['setting_redactor.uploadcare_crop'] = 'Uploadcare Crop';
$_lang['setting_redactor.uploadcare_crop_desc'] = "You can enable custom crop in the widget. <a href='https://github.com/uploadcare/uploadcare-redactor/#crop' target='_blank'>More info</a>.";

$_lang['setting_redactor.uploadcare_tabs'] = 'Uploadcare Tabs';
$_lang['setting_redactor.uploadcare_tabs_desc'] = "Space separated list of services to use in Uploadcare Upload Panel. <a href='https://github.com/uploadcare/uploadcare-redactor/#tabs-upload-sources' target='_blank'>More info</a>.";

$_lang['setting_redactor.loadIntrotext'] = 'Load Introtext';
$_lang['setting_redactor.loadIntrotext_desc'] = "When enabled, adds Redactor to the introtext editor.";

$_lang['setting_redactor.limiter'] = 'Limiter Character Count';
$_lang['setting_redactor.limiter_desc'] = "With the plugin_limiter setting enabled, this setting controls how many characters the user is allowed to enter into the editor.";

$_lang['setting_redactor.eurekaUpload'] = 'Eureka Upload';
$_lang['setting_redactor.eurekaUpload_desc'] = "When enabled, files can be uploaded to current directory within the Insert Image Choose Tab.";

$_lang['setting_redactor.syntax_aceMode'] = 'Syntax Ace Mode';
$_lang['setting_redactor.syntax_aceMode_desc'] = "Mode to set Ace Editor to.";

$_lang['setting_redactor.syntax_aceTheme'] = 'Syntax Ace Theme';
$_lang['setting_redactor.syntax_aceTheme_desc'] = "Theme to set Ace Editor to.";

$_lang['setting_redactor.plugin_baseurls'] = 'Base URLS Plugins';
$_lang['setting_redactor.plugin_baseurls_desc'] = "Plugin used to correct image paths in the MODX Manager.";

$_lang['setting_redactor.showDimensionsOnResize'] = 'Show Dimensions on Resize';
$_lang['setting_redactor.showDimensionsOnResize_desc'] = "When enabled image dimensions will be displayed beneath images as they are resized.";