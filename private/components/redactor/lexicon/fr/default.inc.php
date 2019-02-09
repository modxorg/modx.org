<?php
/**
 * Default Language file for Redactor
 *
 * @package redactor
 * @subpackage lexicon
 */

$_lang['setting_redactor'] = 'Redactor';

$_lang['setting_area_general'] = 'Paramètres généraux';

$_lang['setting_redactor.air'] = 'Air-Mode';
$_lang['setting_redactor.air_desc'] = 'Activer le mode "air"';

$_lang['setting_redactor.autoresize'] = 'Agrandissement automatique';
$_lang['setting_redactor.autoresize_desc'] = 'Cette option active l\'agrandisssement automatique, en fonction de la quantité de texe inséré';

$_lang['setting_redactor.linkAnchor'] = 'Ancres (liens)';
$_lang['setting_redactor.linkAnchor_desc'] = 'Activez cette option pour que la modale <em>insérer un lien</em> ai un onglet permettant d\'ajouter des ancres.';

$_lang['setting_redactor.linkEmail'] = 'Emails (liens)';
$_lang['setting_redactor.linkEmail_desc'] = 'Activez cette option pour la modale <em>insérer un lien</em> ai un onglet permattant d\'ajouter des liens <code>mailto:</code>.';

$_lang['setting_redactor.linkResource'] = 'Ressources (liens)';
$_lang['setting_redactor.linkResource_desc'] = 'Activez cette option pour la modale <em>insérer un lien</em> ai un onglet permattant d\'ajouter des liens vers des ressources MODX.';

$_lang['setting_redactor.minHeight'] = 'Hauteur minimale';
$_lang['setting_redactor.minHeight_desc'] = 'La hauteur minimale (ie pixels)';

$_lang['setting_redactor.modalOverlay'] = 'Superposition';
$_lang['setting_redactor.modalOverlay_desc'] = 'Activez cette option pour qu\'un "overlay" empêche les clics sur les éléments autres que ceux de Redactor, lorsqu\'une modale est ouverte (liens, uploads, etc.)';

$_lang['setting_redactor.placeholder'] = 'Placeholder';
$_lang['setting_redactor.placeholder_desc'] = 'Lorsque la valeur de cette option est différente de 0, cette valeur sera affichée si le contenu de l\'éditeur est vide.';

$_lang['setting_redactor.shortcuts'] = 'Raccourcis';
$_lang['setting_redactor.shortcuts_desc'] = 'Activez-désactivez les raccourcis clavier haut/bas';

$_lang['setting_redactor.tabindex'] = 'Index de tabulation';
$_lang['setting_redactor.tabindex_desc'] = 'Optional tab index';

$_lang['setting_redactor.visual'] = 'Visuel';
$_lang['setting_redactor.visual_desc'] = 'Activez cette option pour que l\'éditeur démarre en mode "visual" (avec la barre d\'outils). Désactivez cette option pour démarrer avec le code HTML (très utile en tant que paramètre utilisateur!)';

$_lang['setting_redactor.wym'] = 'WYM';
$_lang['setting_redactor.wym_desc'] = 'Activer la structure visuelle';

$_lang['setting_redactor.direction'] = 'Direction';
$_lang['setting_redactor.direction_desc'] = 'Indiquez le sens du texte (ltr pour gauche à droite ou rtl droite à gauche)';

$_lang['setting_redactor.lang'] = 'Langue';
$_lang['setting_redactor.lang_desc'] = 'Paramètre de langue de Redactor';

$_lang['setting_redactor.allowedTags'] = 'Tags autorisés';
$_lang['setting_redactor.allowedTags_desc'] = 'Liste de tags, séparés par des virgules, de tags HTML autorisés';

$_lang['setting_redactor.boldTag'] = 'Tag Bold (gras)';
$_lang['setting_redactor.boldTag_desc'] = 'Le tag HTML à utiliser pour les éléments en gras. Soit <code>b</code> ou <code>strong</code>.';

$_lang['setting_redactor.cleanup'] = 'Nettoyage';
$_lang['setting_redactor.cleanup_desc'] = 'Active/désactive le "nettoyage" du texte lors d\'un copier-coller';

$_lang['setting_redactor.convertDivs'] = 'Convertir les divs';
$_lang['setting_redactor.convertDivs_desc'] = 'Activez cette option pour que Redactor convertisse les divs en paragraphes';

$_lang['setting_redactor.convertLinks'] = 'Convertir les liens';
$_lang['setting_redactor.convertLinks_desc'] = 'Activez cette option pour que Redactor convertisse les URLs par des liens hypertextes';

$_lang['setting_redactor.deniedTags'] = 'Tags interdits';
$_lang['setting_redactor.deniedTags_desc'] = 'Vous pouvez utiliser le paramètre "Tags autorisés" ou les "Tags interdits", mais pas les deux simultanément! En utilisant cette option, vous pouvez définir les tags non autorisés dans le code source.';

$_lang['setting_redactor.formattingPre'] = 'Mise en forme dans les balises "pre"';
$_lang['setting_redactor.formattingPre_desc'] = 'Activez ce paramètre pour pouvoir utiliser les options de formatage (tels que gras, italique, etc.) à l\'intérieur des balises <code>&lt;pre&gt;</code>.';

$_lang['setting_redactor.italicTag'] = 'Tag italique';
$_lang['setting_redactor.italicTag_desc'] = 'Le tag HTML à utiliser pour les éléments en italique. Soit <code>i</code> ou <code>em</code>.';

$_lang['setting_redactor.linebreaks'] = 'Retour à la ligne';
$_lang['setting_redactor.linebreaks_desc'] = 'Activez cette option pour que les retours à la ligne soient <code>&lt;br&gt;</code> au lieu de nouveaux paragraphes. Notez qu\'activer cette option désactivera le mode <code>Paragraphe</code>.';

$_lang['setting_redactor.marginFloatLeft'] = 'Float Left Margin';
$_lang['setting_redactor.marginFloatLeft_desc'] = 'Marge (margin) ou classe CSS à utiliser sur les images flottantes à gauche (float left)';

$_lang['setting_redactor.marginFloatRight'] = 'Float Right Margin';
$_lang['setting_redactor.marginFloatRight_desc'] = 'Marge (margin) ou classe CSS à utiliser sur les images flottantes à droite (float right)';

$_lang['setting_redactor.paragraphy'] = 'Paragraphe';
$_lang['setting_redactor.paragraphy_desc'] = 'Activez cette option pour chaque nouvel élément soit inséré à l\'intérieur de tags <code>&lt;p&gt;</code> (paragraphes). Notez que si vous activez le mode <code>Retour à la ligne</code>, cette option sera désactivée.';

$_lang['setting_redactor.css'] = 'CSS iframe';
$_lang['setting_redactor.css_desc'] = 'URL du fichier CSS à utiliser avec l\'iframe';

$_lang['setting_redactor.iframe'] = 'iframe';
$_lang['setting_redactor.iframe_desc'] = 'Option pour utiliser l\'éditeur dans une iframe avec des styles personnalisés';

$_lang['setting_redactor.linkProtocol'] = 'Protocole';
$_lang['setting_redactor.linkProtocol_desc'] = 'Cette option permet d\'indiquer le protocale à ajouter aux liens (http://,https://). Laissez vide pour ne pas ajouter de protocole';

$_lang['setting_redactor.mobile'] = 'Mobile';
$_lang['setting_redactor.mobile_desc'] = 'Cette option active/désactive l\'éditeur pour mobile';

$_lang['setting_redactor.imageEditable'] = 'Observe Images';
$_lang['setting_redactor.imageEditable_desc'] = 'When enabled, clicking an image in the edit area will open up a modal window letting users change the alignment and add alt/title attributes.';

$_lang['setting_redactor.browse_recursive'] = 'Navigation récursive';
$_lang['setting_redactor.browse_recursive_desc'] = 'Activez cette option pour ajouter un dropdown (menu déroulant) pour sélectionner les sous répertoires lors de la navigation au sein des fichiers.';

$_lang['setting_redactor.date_files'] = 'Dates de fichiers';
$_lang['setting_redactor.date_files_desc'] = 'Activez cette option pour que les fichiers uploadés soient préfixés avec le timestamp complet, afin de garantir des noms de fichiers uniques.';

$_lang['setting_redactor.date_images'] = 'Dater les images';
$_lang['setting_redactor.date_images_desc'] = 'Activez cette option pour vous assurer que les fichiers d\'images uploadées seront uniques';

$_lang['setting_redactor.file_upload_path'] = 'Chemin des uploads';
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

$_lang['setting_redactor.image_upload_path'] = 'Chemin d\'upload des images';
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
    
$_lang['setting_redactor.file_upload_path'] = 'Chemin des uploads';
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

$_lang['setting_redactor.prefetch_ttl'] = 'TTL de prefetch';
$_lang['setting_redactor.prefetch_ttl_desc'] = 'Durée (en millisecondes) durant laquelle les données récupérer de la pré-saisie (typeadead) doivent être mises en cache (localStorage)';

$_lang['setting_redactor.typeahead.include_introtext'] = 'Inclure Introtext';
$_lang['setting_redactor.typeahead.include_introtext_desc'] = 'Activez cette option pour le "typeahead" conienne également les champs "introtext" de chaque ressource, vous donnant plus d\'informations concernant les ressources.';

$_lang['setting_redactor.airButtons'] = 'Buttons du mode "air"';
$_lang['setting_redactor.airButtons_desc'] = 'Liste de boutons, séparés par des virgules, à afficher en mode "air"';

$_lang['setting_redactor.buttonSource'] = 'Bouton Source';
$_lang['setting_redactor.buttonSource_desc'] = 'Désactivez cette option pour que le bouton de code source (<code>html</code> dans la configuration des boutons) soit supprimé.';

$_lang['setting_redactor.activeButtons'] = 'Active Buttons';
$_lang['setting_redactor.activeButtons_desc'] = 'This setting allows to set which buttons will become active if the cursor is positioned inside of a respectively formatted text.';

$_lang['setting_redactor.activeButtonsStates'] = 'Active Buttons States';
$_lang['setting_redactor.activeButtonsStates_desc'] = 'This setting allows to set which tags make buttons active. activeButtonsStates should always be used with activeButtons.';

$_lang['setting_redactor.buttons'] = 'Bouttons';
$_lang['setting_redactor.buttons_desc'] = 'Liste de boutons, séparés par des virgules, à afficher dans la barre d\'outils';

$_lang['setting_redactor.colors'] = 'Couleurs';
$_lang['setting_redactor.colors_desc'] = 'Liste de couleurs, séparées par des virgules';

$_lang['setting_redactor.formattingTags'] = 'Tags de style';
$_lang['setting_redactor.formattingTags_desc'] = 'Configurez les éléments affichés dans le menu de style';

$_lang['setting_redactor.browse_recursive'] = 'Navigation récursive';
$_lang['setting_redactor.browse_recursive_desc'] = 'Activez cette option pour ajouter un dropdown (menu déroulant) pour sélectionner les sous répertoires lors de la navigation au sein des fichiers.';

$_lang['setting_redactor.image_browse_path'] = 'Chemin de navigation au sein des images';
$_lang['setting_redactor.image_browse_path_desc'] = 'Le chemin à utiliser lors de la navigation/choix des images, relatif à la racine du media source défini dans le paramètre <code>Media Source</code> (utilisé dans la modale d\'insertion d\'image).';

$_lang['setting_redactor.buttonFullScreen'] = 'Bouton plein écran (fullscreen)';
$_lang['setting_redactor.buttonFullScreen_desc'] = 'Activez cette option pour afficher un bouton "plein écran" sur la droite de la barre d\'outils.';

$_lang['setting_redactor.dynamicThumbs'] = 'Thumbs (vignettes) dynamiques';
$_lang['setting_redactor.dynamicThumbs_desc'] = 'Désactivez cette option pour que les images originales soient affichées lors de la navigation au sein des images (au lieu des miniatures).';

$_lang['setting_redactor.cleanFileNames'] = 'Nettoyage des noms de fichiers';
$_lang['setting_redactor.cleanFileNames_desc'] = 'Activez cette option pour que les caractères spéciaux soient supprimés lors de l\'upload des fichiers.';

$_lang['setting_redactor.file_browse_path'] = 'Chemin de navigation au sein des fichiers';
$_lang['setting_redactor.file_browse_path_desc'] = 'Le chemin à utiliser lors de la navigation/choix des fichiers, relatif à la racine du media source défini dans le paramètre <code>Media Source</code>.';

$_lang['setting_redactor.browse_files'] = 'Navigation au sein des fichiers';
$_lang['setting_redactor.browse_files_desc'] = 'Activez cette option pour autoriser la sélection/navigation des fichiers uploadés.';

$_lang['redactor.browse_warning'] = "Uh oh, il n'y a pas d'images ici. Modifier les paramètres de browse_image_path pour parcourir un autre emplacement ou télécharger des images à [[+path]].";
$_lang['redactor.browse_files_warning'] = "Uh oh, il n'y a pas de fichiers ici. Modifier les paramètres de file_browse_path pour parcourir un autre emplacement ou télécharger des images à[[+path]].";

$_lang['setting_redactor.searchImages'] = "Rechercher des images";
$_lang['setting_redactor.searchImages_desc'] = "Activez ce paramètre pour utiliser une zone de recherche afin de filtrer les images dans la fenêtre modale de sélection d'image.";

$_lang['setting_redactor.clipsJson'] = 'Clips JSON';
$_lang['setting_redactor.clipsJson_desc'] = 'If set and a <a href="http://jsonlint.com" target="_blank">valid JSON String</a>, adds the Redactor Clips plugin to the toolbar.';

$_lang['setting_redactor.stylesJson'] = 'Styles JSON';
$_lang['setting_redactor.stylesJson_desc'] = 'Si défini à une chaîne de caractères JSON valide, le plugin Redactor "Styles" sera ajouté à la barre d\'outils.';

$_lang['setting_redactor.additionalPlugins'] = 'Plugins supplémentaires';
$_lang['setting_redactor.additionalPlugins_desc'] = 'Indiquez une liste de plugins Redactor au format  "nomduplugin:fichier" et séparée par des virgules, afin de les activer.';

$_lang['setting_redactor.fullpage'] = 'Plein-écran';
$_lang['setting_redactor.fullpage_desc'] = 'Permet l\'édition d\'une page HTML complète (y compris html, head, body et autres balises) en mode iframe et plein-écran.';

$_lang['setting_redactor.dragUpload'] = 'Upload par glisser/déposer';
$_lang['setting_redactor.dragUpload_desc'] = 'Ce paramètre permet aux utilisateurs de faire glisser/déposer des images dans Redactor, depuis leur ordinateur, pour les uploader vers le serveur. Cette fonctionnalité est opérationnelle dans tous les navigateurs récents, à l\'exception d\'IE.';

$_lang['setting_redactor.convertImageLinks'] = 'Convertir les liens d\'images';
$_lang['setting_redactor.convertImageLinks_desc'] = 'Convertit les liens tels que "http://site.com/image.jpg" en balises img en pressant la touche entré.';

$_lang['setting_redactor.convertVideoLinks'] = 'Convertir les liens de vidéo';
$_lang['setting_redactor.convertVideoLinks_desc'] = 'Convertit les liens tels que https://www.youtube.com/watch?v=DcRp9V5GbqQ dans le lecteur intégré YouTube en pressant la touche entré.';

$_lang['setting_redactor.tidyHtml'] = 'Nettoyer le code HTML';
$_lang['setting_redactor.tidyHtml_desc'] = 'Utilisez la valeur false pour désactiver le formatage de code.';

$_lang['setting_redactor.linkTooltip'] = 'Observe Links';
$_lang['setting_redactor.linkTooltip_desc'] = 'Set to true to allow follow/edit links by putting cursor to the link right in Redactor.';

//$_lang['setting_redactor.imageFloatMargin'] = 'Image Float Margin';
//$_lang['setting_redactor.imageFloatMargin_desc'] = 'Custom margin for images setting.';

$_lang['setting_redactor.tabSpaces'] = 'Espaces de tabulation';
$_lang['setting_redactor.tabSpaces_desc'] = 'Utilisez la valeur true pour utiliser des espaces pour les marges de la langue chinoise.';

$_lang['setting_redactor.tabAsSpaces'] = 'Tab as Spaces';
$_lang['setting_redactor.tabAsSpaces_desc'] = 'This setting allows to apply spaces instead of tabulation on Tab key. To turn this setting on, set number of spaces.';

$_lang['setting_redactor.removeEmptyTags'] = 'Supprimer les balises vides';
$_lang['setting_redactor.removeEmptyTags_desc'] = 'Ce paramètre permet d\'activer/désactiver le suppression des balises vides.';

$_lang['setting_redactor.sanitizeReplace'] = 'Assainir le remplacement';
$_lang['setting_redactor.sanitizeReplace_desc'] = 'Le caractère de remplacement utilisé lors de "l\'assainissement" des noms de fichiers uploadés.';

$_lang['setting_redactor.sanitizePattern'] = 'Modèle "d\'assainissement"';
$_lang['setting_redactor.sanitizePattern_desc'] = 'Le modèle RegEx à appliquer lors de "l\'assainissement" des noms des fichiers uploadés.';

$_lang['setting_redactor.linkSize'] = 'Taille du lien';
$_lang['setting_redactor.linkSize_desc'] = 'Nombre de caractères maximum pour l\'affichage d\'une URL.';

$_lang['setting_redactor.advAttrib'] = 'Attributs avancés';
$_lang['setting_redactor.advAttrib_desc'] = 'Activez cette option pour que les attributs (tels que class, id et title) soient disponibles dans l\'édition des liens et images.';

$_lang['setting_redactor.linkNofollow'] = 'Lien "No-Follow"';
$_lang['setting_redactor.linkNofollow_desc'] = 'Ce paramètre ajout l\'attribut "nofollow" aux liens ajoutés depuis Redactor.';

$_lang['setting_redactor.typewriter'] = 'Mode machine à écrire';
$_lang['setting_redactor.typewriter_desc'] = 'Mode machine à écrire sans stress. http://imperavi.com/Redactor/examples/Typewriter/';

$_lang['setting_redactor.buttonsHideOnMobile'] = 'Boutons cachés sur mobiles';
$_lang['setting_redactor.buttonsHideOnMobile_desc'] = 'Avec cette option, vous pouvez spécifier quels boutons de la barre d\'outils peuvent être cachées sur les appareils mobiles.';

$_lang['setting_redactor.toolbarOverflow'] = 'Toolbar Overflow';
$_lang['setting_redactor.toolbarOverflow_desc'] = 'With this option, you can specify a toolbar button to build only one row on mobile devices.';

$_lang['setting_redactor.imageTabLink'] = 'Image Tab Link';
$_lang['setting_redactor.imageTabLink_desc'] = 'With this option you can enable/disabled a tab with insert image as link.';

$_lang['setting_redactor.cleanSpaces'] = 'Nettoyer les espaces';
$_lang['setting_redactor.cleanSpaces_desc'] = 'Supprimes les espaces supplémentaires des textes collés lorsque la valeur est "oui", les laisse lorsque la valeur est "non".';

$_lang['setting_redactor.predefinedLinks'] = 'Liens prédéfinis';
$_lang['setting_redactor.predefinedLinks_desc'] = 'Ce paramètre permet de définir une liste de liens disponibles dans la fenêtre "Ajouter un lien". http://imperavi.com/redactor/docs/settings/#set-predefinedLinks';

$_lang['setting_redactor.shortcutsAdd'] = 'Raccourcis supplémentaires';
$_lang['setting_redactor.shortcutsAdd_desc'] = 'Ce paramètre ajoute vos raccourcis à Redactor. http://imperavi.com/redactor/docs/settings/#set-shortcutsAdd';

$_lang['setting_redactor.commemorateRebecca'] = 'Commémorer Rebecca';
$_lang['setting_redactor.commemorateRebecca_desc'] = 'Commemorates <a href="http://www.zeldman.com/2014/06/10/the-color-purple/" target="_blank">Rebecca Meyer</a> by setting the Redactor toolbar to <strong style="color:#663399;color:rebeccapurple;">her favorite color</strong> the seventh of each June.';

$_lang['setting_redactor.toolbarFixed'] = 'Barre d\'outils fixe';
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

$_lang['setting_redactor.buttonsHideOnMobile'] = 'Boutons cachés sur mobiles';
$_lang['setting_redactor.buttonsHideOnMobile_desc'] = 'Avec cette option, vous pouvez spécifier quels boutons de la barre d\'outils peuvent être cachées sur les appareils mobiles.';

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

$_lang['setting_redactor.replaceDivs'] = 'Remplacer les Divs';
$_lang['setting_redactor.replaceDivs_desc'] = "This setting makes Redactor to convert all divs in a text into paragraphs. With 'linebreaks' set to 'true', all div tags will be removed, and text will be marked up with tag.";

$_lang['setting_redactor.preSpaces'] = 'Pre Spaces';
$_lang['setting_redactor.preSpaces_desc'] = "This setting allows to set the number of spaces that will be applied when a user presses Tab key inside of preformatted blocks. If set to 'false', Tab key will apply tabulation instead of spaces inside of preformatted blocks.";


$_lang['setting_redactor.plugin_counter'] = 'Compteur';
$_lang['setting_redactor.plugin_counter_desc'] = "Ajoute un compteur de caractères.";

$_lang['setting_redactor.plugin_fontcolor'] = 'Couleur de police';
$_lang['setting_redactor.plugin_fontcolor_desc'] = "Ajoute la possibilité de définir la couleur du texte et/ou de la couleur de fond du texte.";

$_lang['setting_redactor.plugin_fontfamily'] = 'Famille de polices';
$_lang['setting_redactor.plugin_fontfamily_desc'] = "Choisissez une famille de polices pour le texte sélectionné.";

$_lang['setting_redactor.plugin_fontsize'] = 'Font Size';
$_lang['setting_redactor.plugin_fontsize_desc'] = "Change the font size specified in pixels. Bigger sometimes is better.";

//$_lang['setting_redactor.plugin_imagemanager'] = 'Image Manager';
//$_lang['setting_redactor.plugin_imagemanager_desc'] = "Upload or choose and insert images, align pictures and tell a more visual story.";

//$_lang['setting_redactor.plugin_filemanager'] = 'File Manager';
//$_lang['setting_redactor.plugin_filemanager_desc'] = "Manage, upload, select files and place them anywhere in Redactor.";

$_lang['setting_redactor.plugin_limiter'] = 'Limiter';
$_lang['setting_redactor.plugin_limiter_desc'] = "Limit the number of characters a user can enter.";

$_lang['setting_redactor.plugin_table'] = 'Tableau';
$_lang['setting_redactor.plugin_table_desc'] = "Insérer et formater des tableaux en toute simplicité.";

$_lang['setting_redactor.plugin_textdirection'] = 'Orientation du texte';
$_lang['setting_redactor.plugin_textdirection_desc'] = "Facilement changer l'orientation du texte dans un élément block (paragraphe, en-tête, blockquote, etc..).";

$_lang['setting_redactor.plugin_video'] = 'Vidéo';
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

$_lang['setting_redactor.plugin_download'] = 'Télécharger le Plugin';
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