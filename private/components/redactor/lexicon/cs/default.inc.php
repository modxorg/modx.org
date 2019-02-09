<?php
/**
 * Default Language file for Redactor
 *
 * @package redactor
 * @subpackage lexicon
 */

$_lang['setting_redactor'] = 'Redaktor';

$_lang['setting_area_general'] = 'Obecné nastavení';

$_lang['setting_redactor.air'] = 'Air-Mode';
$_lang['setting_redactor.air_desc'] = 'Pokud je povoleno, Redaktor skryje běžnou lištu nástrojů a místo ní se při označení textu zobrazí menší lištu nástrojů. Pro změnu tlačítek, které se objevují na této liště nástrojů upravte nastavení <code>airButtons</code>.';

$_lang['setting_redactor.autoresize'] = 'Automatické zvětšení';
$_lang['setting_redactor.autoresize_desc'] = 'Pokud je povoleno, editor se výškou přizpůsobuje textu tak, aby nebylo potřeba scrollovat.';

$_lang['setting_redactor.linkAnchor'] = 'Kotvy';
$_lang['setting_redactor.linkAnchor_desc'] = 'Pokud je povoleno, okno <em>vložit odkaz</em> bude navíc obsahovat záložku pro vložení kotvy.';

$_lang['setting_redactor.linkEmail'] = 'Email odkazy';
$_lang['setting_redactor.linkEmail_desc'] = 'Pokud je povoleno, okno <em>vložit odkaz</em> bude navíc obsahovat záložku pro vložení odkazu <code>mailto:</code>.';

$_lang['setting_redactor.linkResource'] = 'Resource Links';
$_lang['setting_redactor.linkResource_desc'] = 'Pokud je povoleno, okno <em>vložit odkaz</em> bude navíc obsahovat záložku pro vložení MODx Dokumentu.';

$_lang['setting_redactor.minHeight'] = 'Minimální výška';
$_lang['setting_redactor.minHeight_desc'] = 'Použito dohromady s nastavením <code>Automatické zvětšení</code>, umožní nastavit minimální (pokud je automatické zvětšení povoleno) nebo pevnou (pokud je automatické zvětšení vypnuto) výšku pro textové pole. Výška je v pixelech a zadává se pouze celočíselná hodnota.';

$_lang['setting_redactor.modalOverlay'] = 'Překrytí';
$_lang['setting_redactor.modalOverlay_desc'] = 'Pokud je povoleno, překrytí zabrání kliknutí na ostatní prvky, když Redaktor otevře modální okno (pro odkazy, upload, apod.).';

$_lang['setting_redactor.placeholder'] = 'Placeholder';
$_lang['setting_redactor.placeholder_desc'] = 'Pokud není 0, toto Vám umožní nastavit text placeholderu pro editor, pokud není dostupný obsah.';

$_lang['setting_redactor.shortcuts'] = 'Zkratky';
$_lang['setting_redactor.shortcuts_desc'] = 'Pokud je povoleno, můžete používat nísledující klávesové zkratky při upravování s Redaktorem:</p>
    <ul>
        <li><b>ctrl + z</b> Zpět psaní/akce</li>
        <li><b>ctrl + shift + z</b> Vpřed psaní/akce</li>
        <li><b>ctrl + m</b> Odstanit formátování</li>
        <li><b>ctrl + b</b> Tučně</li>
        <li><b>ctrl + i</b> Kurziva</li>
        <li><b>ctrl + j</b> Vložit nečíslovaný seznam</li>
        <li><b>ctrl + k</b> Vložit číslovaný seznam</li>
        <li><b>ctrl + l</b> Horní index</li>
        <li><b>ctrl + h</b> Dolní index</li>
        <li><b>tab</b> Odsadit text</li>
        <li><b>shift + tab</b> Předsadit text</li>
    </ul>
    <p>Samozřejmě, že MODX klávesové zkratky jako <b>ctrl + s</b> pro uložení fungují i při používání Redaktoru.';

$_lang['setting_redactor.tabindex'] = 'Pořadí průchodu';
$_lang['setting_redactor.tabindex_desc'] = 'Pořadí průchodu určuje pořadí, v němž jsou pole formuláře upravována při opakovaném stisku klávesy TAB.';

$_lang['setting_redactor.visual'] = 'Vizuální';
$_lang['setting_redactor.visual_desc'] = 'Pokud je povoleno, editor startuje ve vizuálním módu (s nástrojovou lištou a se vším dobrým), ale pokud je vypnuto, je výchozí pohled na kód (HTML). Velmi užitečné jako uživatelské nastavení!';

$_lang['setting_redactor.wym'] = 'WYM (Vizuální struktura)';
$_lang['setting_redactor.wym_desc'] = 'WYM ("What you mean") mód je speciální mód, ve kterém pomocí barvy pozadí a odsazení je viditelná HTML struktura. Pokud chcete naučit vaše editory psát čistě, toto je výborná volba. <a href="http://imperavi.com/redactor/examples/wym/">Zobrazit ukázku.</a>';

$_lang['setting_redactor.direction'] = 'Směr';
$_lang['setting_redactor.direction_desc'] = 'Nastaví směr psaní textu, <code>ltr</code> (zleva do prava) nebo <code>rtl</code> (zprava do leva).';

$_lang['setting_redactor.lang'] = 'Jazyk';
$_lang['setting_redactor.lang_desc'] = 'Nastaví jazyk Redaktoru. Následující jazyky jsou obsaženy v balíčku:
    <ul>
        <li>ar (Arabština)</li>
        <li>bg (Bulharština)</li>
        <li>by (Běloruština)</li>
        <li>cs (Čeština)</li>
        <li>da (Dánština)</li>
        <li>de (Němčina)</li>
        <li>en (Angličtina)</li>
        <li>es (Španělština)</li>
        <li>fi (Finština)</li>
        <li>fr (Francouzština)</li>
        <li>he (Hebrejština)</li>
        <li>id (Indonéština)</li>
        <li>it (Italština)</li>
        <li>ja (Japonština)</li>
        <li>nl (Holandština)</li>
        <li>no_NB (Norština)</li>
        <li>pl (Polština)</li>
        <li>ru (Ruština)</li>
        <li>sv (Švédština)</li>
        <li>ua (Ukrajinština)</li>
        <li>zh_cn (Čínština)</li>
    </ul>
    Přídavné jazyky jsou <a href="http://imperavi.com/redactor/docs/languages/">dostupné ke stáhnutí ze stránek Imperavi</a> a mohou být nahrány do složky <code>assets/components/redactor/lang/</code>.';

$_lang['setting_redactor.allowedTags'] = 'Povolené tagy';
$_lang['setting_redactor.allowedTags_desc'] = 'Buď použijte Povolené tagy, nebo Zakázané tagy - ne oboje! Pokud používáte Povolené tagy, můžete definovat tagy, které jsou povoleny v obsahu - ostatní budou odstraněny.';

$_lang['setting_redactor.boldTag'] = 'Tučně';
$_lang['setting_redactor.boldTag_desc'] = 'HTML tag, který se použije pro tučný text. Buď <code>b</code> nebo <code>strong</code>.';

$_lang['setting_redactor.cleanup'] = 'Pročištění';
$_lang['setting_redactor.cleanup_desc'] = 'Pokud je povoleno, pokaždé když je text zkopírován ze schránky do editoru, editor ho pročistí a zanechá pouze důležité tagy.';

$_lang['setting_redactor.convertDivs'] = 'Převést DIVy';
$_lang['setting_redactor.convertDivs_desc'] = 'Pokud je povoleno, Redaktor automaticky nahradí <code>&lt;div></code> tagy za tagy <code>&ltp></code>.';

$_lang['setting_redactor.convertLinks'] = 'Převést odkazy';
$_lang['setting_redactor.convertLinks_desc'] = 'Pokud je povoleno, Redaktor automaticky zpracuje vložené odkazy a obalí je tagy <code>&lt;a href=""></code>.';

$_lang['setting_redactor.deniedTags'] = 'Zakázané tagy';
$_lang['setting_redactor.deniedTags_desc'] = 'Buď použijte Povolené tagy, nebo Zakázané tagy - ne oboje! Pokud používáte Zakázané tagy, můžete definovat tagy, které budou odstraněny.';

$_lang['setting_redactor.formattingPre'] = 'Formátování v tagu Pre';
$_lang['setting_redactor.formattingPre_desc'] = 'Pokud je povoleno, můžete formátovat text (např. tučně, kurziva) v tagu <code>&lt;pre&gt;</code>.';

$_lang['setting_redactor.italicTag'] = 'Tag kurzivy';
$_lang['setting_redactor.italicTag_desc'] = 'HTML tag, který se použije pro kurzivu. Buď <code>i</code> nebo <code>em</code>.';

$_lang['setting_redactor.linebreaks'] = 'Nové řádky';
$_lang['setting_redactor.linebreaks_desc'] = 'Pokud je povoleno, nové řádky jsou zapisovány jako tagem <code>&lt;br&gt;</code> místo nového odstavce. Povolení tohoto nastavení automaticky vypne <code>Paragraphy</code> mód.';

$_lang['setting_redactor.marginFloatLeft'] = 'Levé odsazení';
$_lang['setting_redactor.marginFloatLeft_desc'] = 'Pokud umísťujete obrázky vlevo nebo vpravom Redaktor Vás nechá vložit <em>CSS třídu</em> nebo <em>odsazení</em> kvůli předejití kolize obrázku s obtékaným textem. V tomto nastavení můžete definovat odsazení nebo CSS třídu pro zarovnání vlevo. Buď uveďte odsazení jako v CSS: <code>0 10px 10px 0</code>, nebo uveďte název třídy s tečkou jako prefix <code>.imageFloatLeftInContent</code>. Pokud chcete vložit více tříd, pouze první bude mít prefix tečku.';

$_lang['setting_redactor.marginFloatRight'] = 'Pravé odsazení';
$_lang['setting_redactor.marginFloatRight_desc'] = 'Pokud umísťujete obrázky vlevo nebo vpravom Redaktor Vás nechá vložit <em>CSS třídu</em> nebo <em>odsazení</em> kvůli předejití kolize obrázku s obtékaným textem. V tomto nastavení můžete definovat odsazení nebo CSS třídu pro zarovnání vpravo. Buď uveďte odsazení jako v CSS: <code>0 0 10px 10px</code>, nebo uveďte název třídy s tečkou jako prefix <code>.imageFloatRightInContent</code>. Pokud chcete vložit více tříd, pouze první bude mít prefix tečku.';

$_lang['setting_redactor.paragraphy'] = 'Odstavce';
$_lang['setting_redactor.paragraphy_desc'] = 'Pokud je povoleno, všechny věci se umísťují do tagu <code>&lt;p&gt;</code> (odstavec). Pokud povolíte nastavení Nové řádky, toto nastavení bude vypnuto.';

$_lang['setting_redactor.css'] = 'CSS pro rám';
$_lang['setting_redactor.css_desc'] = 'Vložte celou URL k CSS souboru, pro použití vlastního stylu pro formátování.';

$_lang['setting_redactor.iframe'] = 'Rám';
$_lang['setting_redactor.iframe_desc'] = 'Pokud je povoleno, editor bude umístěn do rámu, což Vám umožní použít nastavení <code>CSS pro rám</code> a použít tak vlastní CSS pro editor.';

$_lang['setting_redactor.linkProtocol'] = 'Protokol';
$_lang['setting_redactor.linkProtocol_desc'] = 'Protokol (<code>http://</code>, <code>https://</code> nebo nechte prázdný) pro konstrukci odkazů.';

$_lang['setting_redactor.mobile'] = 'Mobilní';
$_lang['setting_redactor.mobile_desc'] = 'Pokud je povoleno a uživatel bude identifikován jako telefon nebo tablet (používá se barebones UA), Redaktor zobrazí zjednodušenou verzi editoru ve formě obyčejného textového pole místo polí upravujících obsah.';

$_lang['setting_redactor.imageEditable'] = 'Observe Images';
$_lang['setting_redactor.imageEditable_desc'] = 'When enabled, clicking an image in the edit area will open up a modal window letting users change the alignment and add alt/title attributes.';

$_lang['setting_redactor.browse_recursive'] = 'Procházev rekurzivně';
$_lang['setting_redactor.browse_recursive_desc'] = 'Pokud je povoleno, prohlížeč obrázků bude rekurzivně zobrazovat podsložky pro image_upload_path ve zdrojích médií. Tuto volbu budete možná chtít vypnout pokud máte velké množství podsložek, které nejsou používány k procházení.';

$_lang['setting_redactor.date_files'] = 'Datovat soubory';
$_lang['setting_redactor.date_files_desc'] = 'Pokud je povoleno, nahrané soubory budou prefixovány časovým razítkem aby se zaručila unikátnost.';

$_lang['setting_redactor.date_images'] = 'Datovat obrázky';
$_lang['setting_redactor.date_images_desc'] = 'Pokud je povoleno, nahrané obrázky budou prefixovány časovým razítkem aby se zaručila unikátnost.';

$_lang['setting_redactor.file_upload_path'] = 'Cesta pro nahrání souboru';
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

$_lang['setting_redactor.image_upload_path'] = 'Cesta pro nahrání obrázků';
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
    
$_lang['setting_redactor.file_upload_path'] = 'Cesta pro nahrání souboru';
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

$_lang['setting_redactor.mediasource'] = 'Zdroj médií';
$_lang['setting_redactor.mediasource_desc'] = '<p>Choose (or provide the ID of) a Media Source to use for uploading and browsing images and files. This can be any type of Media Source that implements uploading and browsing of images. </p>
    <p>Also see <code>File Upload Path</code>, <code>Image Upload Path</code> and <a href="https://www.modmore.com/redactor/documentation/managing-media/">Managing Media with Redactor</a>';
$_lang['setting_redactor.file_mediasource'] = 'Media Source for Files';
$_lang['setting_redactor.file_mediasource_desc'] = '<p>Choose (or provide the ID of) a Media Source to use for uploading and browsing files. This can be any type of Media Source that implements uploading and browsing of images. </p>
    <p>Also see <code>File Upload Path</code>, and <a href="https://www.modmore.com/redactor/documentation/managing-media/">Managing Media with Redactor</a>';

$_lang['setting_redactor.prefetch_ttl'] = 'Přednačteno TTL';
$_lang['setting_redactor.prefetch_ttl_desc'] = 'Použito při vyhledávání dokumentů, přednačte dokumenty v nejvyšší úrovni, které jsou publikované a nejsou smazané. Tyto data jsou přednačtena když je vytvořena instance vyhledávacího pole, což umožňuje rychlý přístup k důležitým dokumentům, které mohou být požadovány. Vyhledávací pole však pokračuje v hledání nižších dokumentů ve stromě dokumentů jakmile uživatel začne psát. Přednačteno TTL udává, jak dlouho (v mikrosekundách) budou přednačtená data považována za platné a budou uloženy v uživatelově lokálním úložišti.';

$_lang['setting_redactor.typeahead.include_introtext'] = 'Vložit perex';
$_lang['setting_redactor.typeahead.include_introtext_desc'] = 'Pokud je povoleno, When enabled, the typeahead will include the introtext for each of the resources, providing you with more information about the resource.';

$_lang['setting_redactor.airButtons'] = 'Air tlačítka';
$_lang['setting_redactor.airButtons_desc'] = 'Tlačítka, oddělená čárkou, která budou zobrazena na liště nástrojů, která se ukazuje když je povolený Ait mód a je označen text. Pro zjištění možností se podívejte na nastavení <code>Tlačítka</code>. Použijte <code>|</code> (roura) pro přidání oddělovače. Výchozí hodnota: <code>formatting, |, bold, italic, deleted, |, unorderedlist, orderedlist, outdent, indent, |, fontcolor, backcolor</code>';

$_lang['setting_redactor.buttonSource'] = 'Tlačítko pro zdroj';
$_lang['setting_redactor.buttonSource_desc'] = 'Pokud je vypnuto, tlačítko pro HTML zdroj bude skryto.';

$_lang['setting_redactor.activeButtons'] = 'Active Buttons';
$_lang['setting_redactor.activeButtons_desc'] = 'This setting allows to set which buttons will become active if the cursor is positioned inside of a respectively formatted text.';

$_lang['setting_redactor.activeButtonsStates'] = 'Active Buttons States';
$_lang['setting_redactor.activeButtonsStates_desc'] = 'This setting allows to set which tags make buttons active. activeButtonsStates should always be used with activeButtons.';

$_lang['setting_redactor.buttons'] = 'Tlačítka';
$_lang['setting_redactor.buttons_desc'] = 'Tlačítka, která se zobrazí na liště nástrojů Redaktoru. Pokud používáte <code>Air mód</code> měly byste místo tohoto nastavit <code>Air tlačítka</code>. Použijte <code>|</code> (roura) jako oddělovač. Výchozí hodnota: <code>html, |, formatting, |, bold, italic,
    deleted, |, unorderedlist, orderedlist, outdent,
    indent, |, image, video, file, table, link, |,
    fontcolor, backcolor, |, alignment, |, horizontalrule </code> Additional buttons that are available: <code>underline, alignleft, aligncenter, alignright, justify</code>';

$_lang['setting_redactor.colors'] = 'Barvy';
$_lang['setting_redactor.colors_desc'] = 'Barvy (hexadecimálně), které jsou dostupné v <code>barvě písma</code> a <code>barvě pozadí</code>. Výchozí hodnota: <code>#ffffff, #000000, #eeece1, #1f497d, #4f81bd, #c0504d, #9bbb59, #8064a2, #4bacc6, #f79646, #ffff00, #f2f2f2, #7f7f7f, #ddd9c3, #c6d9f0, #dbe5f1, #f2dcdb, #ebf1dd, #e5e0ec, #dbeef3, #fdeada, #fff2ca, #d8d8d8, #595959, #c4bd97, #8db3e2, #b8cce4, #e5b9b7, #d7e3bc, #ccc1d9, #b7dde8, #fbd5b5, #ffe694, #bfbfbf, #3f3f3f, #938953, #548dd4, #95b3d7, #d99694, #c3d69b, #b2a2c7, #b7dde8, #fac08f, #f2c314, #a5a5a5, #262626, #494429, #17365d, #366092, #953734, #76923c, #5f497a, #92cddc, #e36c09, #c09100, #7f7f7f, #0c0c0c, #1d1b10, #0f243e, #244061, #632423, #4f6128, #3f3151, #31859b, #974806, #7f6000</code>';

$_lang['setting_redactor.formattingTags'] = 'Formátovací tagy';
$_lang['setting_redactor.formattingTags_desc'] = 'Položky, které dostanete při kliknutí na tlačítko <code>formátování</code> v nástrojové liště Redaktoru. Výchozí hodnota: <code>p, blockquote, pre, h1, h2, h3, h4</code> což jsou momentálně všechny dostupné formátovací tagy. (Potřebujete nějaké další? <a href="mailto:support@modmore.com?subject=I+need+more+formatting+tags+for+Redactor+because">Dejte nám vědět!</a>)';

$_lang['setting_redactor.browse_recursive'] = 'Procházev rekurzivně';
$_lang['setting_redactor.browse_recursive_desc'] = 'Pokud je povoleno, prohlížeč obrázků bude rekurzivně zobrazovat podsložky pro image_upload_path ve zdrojích médií. Tuto volbu budete možná chtít vypnout pokud máte velké množství podsložek, které nejsou používány k procházení.';

$_lang['setting_redactor.image_browse_path'] = 'Cesta k prohlížení obrázků';
$_lang['setting_redactor.image_browse_path_desc'] = 'Cesta, která se bude procházet při vybírání obrázku, relativní ke kořenu zdoje médií, které je definován v nastavení <code>Zdroj médií</code>.';

$_lang['setting_redactor.buttonFullScreen'] = 'Tlačítko Na celou obrazovku';
$_lang['setting_redactor.buttonFullScreen_desc'] = 'Pokud je povoleno, tlačítko Na celou obrazovku bude zobrazeno v pravé části nástrojové lišty.';

$_lang['setting_redactor.dynamicThumbs'] = 'Dynamický náhled';
$_lang['setting_redactor.dynamicThumbs_desc'] = 'Pokud je povoleno, dynamické náhledy budou vygenerovány pro náhled obrázků.';

$_lang['setting_redactor.cleanFileNames'] = 'Vyčistit názvy souborů';
$_lang['setting_redactor.cleanFileNames_desc'] = 'Pokud je povoleno, speciální znaky budou odstraněny z názvů souborů při nahrávání.';

$_lang['setting_redactor.file_browse_path'] = 'Cesta k prohlížení souborů';
$_lang['setting_redactor.file_browse_path_desc'] = 'Cesta, která se bude procházet při vybírání souboru, relativní ke kořenu zdoje médií, které je definován v nastavení <code>Zdroj médií</code>.';

$_lang['setting_redactor.browse_files'] = 'Procházet soubory';
$_lang['setting_redactor.browse_files_desc'] = 'Pokud je povoleno, umožní vybrat nahrané soubory.';

$_lang['redactor.browse_warning'] = "A jé, tady nejsou žádné obrázky. Změňte nastavení image_browse_path pro procházení jíné složky, nebo nahrajte nějaké obrázky do [[+path]].";
$_lang['redactor.browse_files_warning'] = "A jé, tady nejsou žádné soubory. Změňte nastavení file_browse_path pro procházení jíné složky, nebo nahrajte nějaké soubory do [[+path]].";

$_lang['setting_redactor.searchImages'] = "Hledat obrázky";
$_lang['setting_redactor.searchImages_desc'] = "Pokud je povoleno, vyhledávací panel může být použit pro filtrování obrázků v modálním okně pro výběr obrázku.";

$_lang['setting_redactor.clipsJson'] = 'Clips JSON';
$_lang['setting_redactor.clipsJson_desc'] = 'If set and a <a href="http://jsonlint.com" target="_blank">valid JSON String</a>, adds the Redactor Clips plugin to the toolbar.';

$_lang['setting_redactor.stylesJson'] = 'Styles JSON';
$_lang['setting_redactor.stylesJson_desc'] = 'If set and a valid JSON String, adds the Redactor Styles plugin to the toolbar.';

$_lang['setting_redactor.additionalPlugins'] = 'Additional Plugins';
$_lang['setting_redactor.additionalPlugins_desc'] = 'Define as a comma separated list of "pluginname:pluginfile" to load additional Redactor plugins. ';

$_lang['setting_redactor.fullpage'] = 'Celá stránka';
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