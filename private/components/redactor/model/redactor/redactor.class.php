<?php
@include 'versionobject.class.php';
/**
 * The base class for Redactor.
 *
 * @package redactor
 */
class Redactor {
    /**
     * @var modX A reference to the modX object.
     */
    public $modx = null;
    /**
     * @var modContext A reference to the current working context object.
     */
    public $wctx = null;
    /**
     * @var array An array of configuration options
     */
    public $config = array();
    /**
     * @var array An array of version data
     */
    public $version;
    /**
     * @var array An array of variables to use in path resolving.
     */
    public $pathVariables = array();
    /**
     * @var modResource|false The current resource object
     */
    public $resource = false;
    /**
     * @var array An array of configuration options
     */
    public $chunks = array();
    /**
     * This array keeps track of renamed file uploads in order to make sure image links don't break when something
     * like FileSluggy is active on the site.
     *
     * @var array
     */
    public $renames = array();
    /**
     * @var bool A flag to prevent double script registering
     */
    public $assetsLoaded = false;
    /**
     * @var string Redactors asset url
     */
    public $assetsUrl = false;
    /**
     * @var bool True in MODX version is less than 2.3.0-pl
     */
    public $degradeUI = false;
    /**
     * @var bool Whether or not it's Rebecca Meyer's Birthday #rebeccapurple
     */
    public $rebeccaDay = false;
    /**
     * @var bool Whether or not to load ace javascript code editor
     */
    public $loadAce = true;
    /**
     * @var bool Whether or not to load CodeMirror javascript code editor
     */
    public $loadCodeMirror = true;
    /**
    * @var bool If enabled always loads plugin source files
    */
    public $greedyPlugins = true;
    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;

        $corePath = $this->modx->getOption('redactor.core_path',$config,$this->modx->getOption('core_path').'components/redactor/');
        $this->assetsUrl = $this->modx->getOption('redactor.assets_url',$config,$this->modx->getOption('assets_url').'components/redactor/');

        $this->config = array_merge(array(
            'corePath' => $corePath,
            'templatePath' => $corePath.'templates/',
            'assetsUrl' => $this->assetsUrl,
            'connectorUrl' => $this->assetsUrl . 'connector.php'
        ),$config);

        $this->version = new VersionObject(2, 3, 2, 'pl');

        $this->modx->lexicon->load('redactor:default');

        $vd = $this->modx->getVersionData();
        $this->degradeUI = (bool)(version_compare($vd['full_version'],'2.3.0-pl') === -1);
        $this->rebeccaDay = (bool)((bool)($this->getOption('redactor.commemorateRebecca', null, false)) && date('m') == '06' && (date('d') == '07'));
        $this->loadAce = $this->getBooleanOption('redactor.plugin_syntax', null,false);
        $this->loadCodeMirror = $this->getBooleanOption('redactor.codemirror', null,true);
        if($this->loadCodeMirror) $this->loadAce = false;
    }

    /**
    * Ensures boolean values are properly returned. See https://github.com/modmore/Redactor/issues/266
    * @param string $name
    * @param array $options
    * @param bool $default
    * @return bool
    */
    public function getBooleanOption($name, array $options = null, $default = null) {
        $option = $this->getOption($name, $options, $default);
        return $this->_castValueToBool($option);
    }

    /**
     * Turns a value into a boolean.
     *
     * @param $value
     * @return bool
     */
    public function _castValueToBool($value)
    {
        if (in_array(strtolower($value), array('false', 'no'))) {
            return false;
        }
        return (bool)$value;
    }

    /**
     * Gets all the options as an array as they are defined by settings.
     *
     * @return array
     */
    public function getGlobalOptions() {
        $options = array('assetsUrl' => $this->assetsUrl);

        /**
         * Options related to the display of Redactor
         */
        $options['direction'] = $this->getOption('redactor.direction', null, 'ltr');
        $options['lang'] = $this->getOption('redactor.lang', null, $this->getOption('manager_language', $_SESSION), true);
        $options['lang'] = str_replace(array('../','//','./','.'), '', $options['lang']);

        $options['minHeight'] = (int)$this->getOption('redactor.minHeight', null, 200);
        $options['linkAnchor'] = $this->getBooleanOption('redactor.linkAnchor', null, false);
        $options['linkEmail'] = $this->getBooleanOption('redactor.linkEmail', null, false);
        $options['placeholder'] = $this->getBooleanOption('redactor.placeholder', null, false, true);
        $options['visual'] = $this->getBooleanOption('redactor.visual', null, true);

        $buttons = $this->getOption('redactor.buttons', null, 'html,formatting,bold,italic,deleted,unorderedactorlist,orderedactorlist,outdent,indent,image,video,file,table,link,alignment,horizontalrule');
        $buttons = str_replace('fontcolor','',$buttons);
        $buttons = str_replace('backcolor','',$buttons);
        $options['buttons'] = $this->explode($buttons);

        $options['buttonSource'] = $this->getBooleanOption('redactor.buttonSource', null,true);
        $options['linkNofollow'] = $this->getBooleanOption('redactor.linkNofollow', null,false);

        $options['formatting'] = $this->explode($this->getOption('redactor.formattingTags', null, 'p,blockquote,pre,h1,h2,h3,h4'));
        $options['colors'] = $this->explode($this->processColor($this->getOption('redactor.colors', null, '#ffffff,#000000,#eeece1,#1f497d,#4f81bd,#c0504d,#9bbb59,#8064a2,#4bacc6,#f79646,#ffff00,#f2f2f2,#7f7f7f,#ddd9c3,#c6d9f0,#dbe5f1,#f2dcdb,#ebf1dd,#e5e0ec,#dbeef3,#fdeada,#fff2ca,#d8d8d8,#595959,#c4bd97,#8db3e2,#b8cce4,#e5b9b7,#d7e3bc,#ccc1d9,#b7dde8,#fbd5b5,#ffe694,#bfbfbf,#3f3f3f,#938953,#548dd4,#95b3d7,#d99694,#c3d69b,#b2a2c7,#b7dde8,#fac08f,#f2c314,#a5a5a5,#262626,#494429,#17365d,#366092,#953734,#76923c,#5f497a,#92cddc,#e36c09,#c09100,#7f7f7f,#0c0c0c,#1d1b10,#0f243e,#244061,#632423,#4f6128,#3f3151,#31859b,#974806,#7f6000')));

        $options['typewriter'] = $this->getBooleanOption('redactor.typewriter', null,false);
        $options['buttonsHideOnMobile'] = $this->getOption('redactor.buttonsHideOnMobile', null,'');
        $options['toolbarOverflow'] = $this->getBooleanOption('redactor.toolbarOverflow', null,false);
        $options['toolbarFixed'] = $this->getBooleanOption('redactor.toolbarFixed', null, true);
        $options['toolbarFixedTarget'] = '#modx-content > .x-panel-bwrap > .x-panel-body';
        $options['toolbarFixedTopOffset'] = 55;

        $options['activeButtons'] = $this->explode($this->getOption('redactor.activeButtons', null, 'deleted,italic,bold,underline,unorderedlist,orderedlist,alignleft,aligncenter,alignright,justify'));

        $options['focus'] = $this->getBooleanOption('redactor.focus', null,false);
        $options['focusEnd'] = $this->getBooleanOption('redactor.focusEnd', null,false);
        $options['scrollTarget'] = $this->getOption('redactor.scrollTarget', null,'');
        $options['enterKey'] = $this->getBooleanOption('redactor.enterKey', null,true);
        $options['cleanStyleOnEnter'] = $this->getBooleanOption('redactor.cleanStyleOnEnter', null,false);
        $options['linkTooltip'] = $this->getBooleanOption('redactor.linkTooltip', null,true);
        $options['imageLink'] = $this->getBooleanOption('redactor.imageLink', null,true);
        $options['imagePosition'] = $this->getBooleanOption('redactor.imagePosition', null,true);
        $options['buttonsHide'] = $this->getOption('redactor.buttonsHide', null,'');
        $options['buttonsHideOnMobile'] = $this->getOption('redactor.buttonsHideOnMobile', null,'');
        $options['showDimensionsOnResize'] = $this->getOption('redactor.showDimensionsOnResize', null,true);


        /**
         * Options related to underlying display stuff
         */
        $options['tabindex'] = (int)$this->getOption('redactor.tabindex', null, '');
        if($this->getBooleanOption('redactor.shortcuts', null,true) === false )$options['shortcuts'] = false;
        $options['linkProtocol'] = str_replace('://','',$this->getOption('redactor.linkProtocol', null, 'http'));
        if (empty($options['linkProtocol'])) $options['linkProtocol'] = '';
        $options['prefetch_ttl'] = $this->getOption('redactor.prefetch_ttl', null, '86400000');
        //$options['imageFloatMargin'] = $this->getOption('redactor.imageFloatMargin', null, '10px');
        if((int)$this->getOption('redactor.tabAsSpaces', null, '') > 1) $options['tabAsSpaces'] = $this->getOption('redactor.tabAsSpaces', null, '');


        if($this->loadAce || $this->loadCodeMirror) {
            $options['tabifier'] = true;
        } else {
            $options['tabifier'] = $this->getBooleanOption('redactor.tabifier', null,false);
        }

        /**
         * Options related to processing the inputs
         */
        $options['allowedTags'] = $this->explode($this->getOption('redactor.allowedTags', null, false, true));
        $options['cleanOnPaste'] = $this->getBooleanOption('redactor.cleanup', null, true);
        $options['replaceDivs'] = $this->getBooleanOption('redactor.convertDivs', null, true);
        $options['convertUrlLinks'] = $options['convertLinks'] = $this->getBooleanOption('redactor.convertLinks', null, true);
        $options['deniedTags'] = $this->explode($this->getOption('redactor.deniedTags', null, false, true));
        $options['linebreaks'] = $this->getBooleanOption('redactor.linebreaks', null, false);
        $options['linkSize'] = $this->getOption('redactor.linkSize', null, 50);
        $options['advAttrib'] = $this->getBooleanOption('redactor.advAttrib', null, false);
        $options['cleanSpaces'] = $this->getBooleanOption('redactor.cleanSpaces', null, true);
        $options['pastePlainText'] = $this->getBooleanOption('redactor.pastePlainText', null, true);
        $options['paragraphize'] = $this->getBooleanOption('redactor.paragraphize', null, true);
        $options['removeComments'] = $this->getBooleanOption('redactor.removeComments', null, false);


        $options['definedLinks'] = $this->parsePathVariables($this->getOption('redactor.predefinedLinks', null, '')); // #predefinedLinks

        $removeEmptyTags = $this->getOption('redactor.removeEmptyTags', null, false);
        if (!empty($removeEmptyTags)) {
            $removeEmptyTags = $this->explode($removeEmptyTags);
            $options['removeEmpty'] = $removeEmptyTags;
        }

        $replaceTags = $this->getOption('redactor.replaceTags', null,'');
        if(!empty($replaceTags)) $options['replaceTags'] = $replaceTags;

        $replaceStyles = $this->getOption('redactor.replaceStyles', null,'');
        if(!empty($replaceStyles)) $options['replaceStyles'] = $replaceStyles;

        $options['removeDataAttr'] = $this->getBooleanOption('redactor.removeDataAttr', null,false);

        $removeAttr = $this->getOption('redactor.removeAttr', null,'');
        if(!empty($removeAttr)) $options['removeAttr'] = $this->modx->fromJSON($removeAttr);

        $allowedAttr = $this->getOption('redactor.allowedAttr', null,'');
        if(!empty($allowedAttr)) $options['allowedAttr'] = $this->modx->fromJSON($allowedAttr);

        $options['replaceDivs'] = $this->getBooleanOption('redactor.replaceDivs', null,true);
        $options['preSpaces'] = is_numeric($this->getOption('redactor.preSpaces', null,'4')) ? $this->getOption('redactor.preSpaces', null,'4') : false;

        /**
         * File/image uploads and handling
         */
        $options['uploadFields'] = $this->getOption('redactor.uploadFields', null, '');
        $options['autosave'] = $this->getBooleanOption('redactor.autosave', null, false);
        $options['interval'] = (int)$this->getOption('redactor.interval', null, 60);

        $connectorUrl = $this->config['connectorUrl'];
        $userToken = '&HTTP_MODAUTH=' . $this->modx->user->getUserToken('mgr');
        $resource = ($this->resource) ? '&resource=' . $this->resource->get('id') : '';

        $options['resourceID'] = ($this->resource) ? $this->resource->get('id') : 0;
        $options['fileManagerJson'] = $connectorUrl . '?action=media/old/browsefiles' . $userToken . $resource;
        $options['imageManagerJson'] = $connectorUrl . '?action=media/old/browse' . $userToken . $resource;
        $options['imageUpload'] = $connectorUrl . '?action=media/upload' . $userToken . $resource;
        $options['fileUpload']  = $connectorUrl . '?action=media/upload&type=file' . $userToken . $resource;

        // Eureka Options
        $options['eurekaUpload'] = $this->getBooleanOption('redactor.eurekaUpload', null, false);
        $options['eurekaUploadUrl'] = $connectorUrl . '?action=media/upload' . $userToken . $resource;
        $options['eurekaDirectoryUrl'] = $connectorUrl . '?action=media/files' . $userToken . $resource;
        $options['eurekaDirectoryChildrenUrl'] = $connectorUrl . '?dc=1' . '&action=media/files' . $userToken . $resource;
        $options['eurekaSourcesUrl'] = $connectorUrl . '?action=media/sources' . $userToken . $resource;
        $options['eurekaSourceDirectoryUrl'] = $connectorUrl . '?action=media/directories' . $userToken . $resource;
        $options['storagePrefix'] = $this->parsePathVariables($this->getOption('redactor.storagePrefix', null, 'redactor-media-browser_id_'));
        $options['file_browse_path'] = $this->getOption('file_browse_path', null, 'assets/uploads/');
        $options['image_browse_path'] = $this->getOption('image_browse_path', null, 'assets/uploads/');
        $options['eureka_file_browse_path'] = $this->parsePathVariables($this->getOption('eureka_file_browse_path', null, $options['file_browse_path']));
        $options['eureka_image_browse_path'] = $this->parsePathVariables($this->getOption('eureka_image_browse_path', null, $options['file_browse_path']));
        $options['eurekaHideImagesOnListView'] = $this->getBooleanOption('eurekaHideImagesOnListView', null, true);
        $options['enlargeFocusRows'] = $this->getBooleanOption('eurekaEnlargeFocusRows', null, true);


        $options['clipboardUploadUrl'] = $options['imageUpload'];

        $options['marginFloatLeft'] = $this->getOption('redactor.marginFloatLeft', null, '0 10px 10px 0');
        $options['marginFloatRight'] = $this->getOption('redactor.marginFloatRight', null, '0 0 10px 10px');

        $options['linkResource'] = $this->getBooleanOption('redactor.linkResource', null, true);
        $options['browseFiles'] = $this->getBooleanOption('redactor.browse_files', null, false);
        $options['searchImages'] = $this->getBooleanOption('redactor.searchImages', null, false);

        $options['dragUpload'] = $this->getBooleanOption('redactor.dragUpload', null, false);
        $options['convertImageLinks'] = $this->getBooleanOption('redactor.convertImageLinks', null, false);
        $options['convertVideoLinks'] = $this->getBooleanOption('redactor.convertVideoLinks', null, false);

        $options['dragImageUpload'] = $this->getBooleanOption('redactor.dragImageUpload', null,true);
        $options['dragFileUpload'] = $this->getBooleanOption('redactor.dragFileUpload', null,true);

        $options['imageEditable'] = $this->getBooleanOption('redactor.imageEditable', null,true);
        $options['imageResizable'] = $this->getBooleanOption('redactor.imageResizable', null,true);
		$options['imageTabLink'] = (bool)$this->modx->getOption('redactor.imageTabLink', null,true);

        $options['limiter'] = (int)$this->getOption('redactor.limiter', null, 150);

        $options['textexpander'] = ($this->getOption('redactor.textexpander', null, ''));

        $options['speechVoice'] = ($this->getOption('redactor.speechVoice', null, 'Vicki'));
        $options['speechRate'] = ($this->getOption('redactor.speechRate', null, 1));
        $options['speechPitch'] = ($this->getOption('redactor.speechPitch', null, 1));
        $options['speechVolume'] = ($this->getOption('redactor.speechVolume', null, 1));
        $options['counterWPM'] = ($this->getOption('redactor.counterWPM', null, 275));

        // make it picky and not breaky
        $activeButtonsStatesJson = $this->getOption('redactor.activeButtonsStates', null, '');
        $activeButtonsStates = $this->modx->fromJSON($activeButtonsStatesJson);
        if($activeButtonsStates) {
            $options['activeButtonsStates'] = $activeButtonsStates;
        }

        $clipsJson = $this->getOption('redactor.clipsJson', null, '');
        $clips = $this->modx->fromJSON($clipsJson);
        if($clips) {
            $options['clipsJson'] = $clips;
        }

        $formattingAddJson = $this->getOption('redactor.formattingAdd', null, '');
        $formattingAdd = $this->modx->fromJSON($formattingAddJson);
        if($formattingAdd) {
            $options['formattingAdd'] = $formattingAdd;
        }

        $shortcutsAddJson = $this->getOption('redactor.shortcutsAdd', null, '');
        $shortcutsAdd = $this->modx->fromJSON($shortcutsAddJson);
        if($shortcutsAdd) {
            $options['shortcutsAdd'] = $shortcutsAdd;
        }

        $plugins = array();
        $pluginFiles = array();

        if($this->getOption('redactor.buttonFullScreen',null, true)) {
            $plugins[] = 'fullscreen';
            if(!$this->greedyPlugins) $pluginFiles[] = $this->assetsUrl . 'lib/fullscreen.js';
        }

        $predefinedLinks = $this->getOption('redactor.predefinedLinks',null, '');
        if(!empty($predefinedLinks)) {
            $plugins[] = 'definedlinks';
            if(!$this->greedyPlugins) $pluginFiles[] = $this->assetsUrl . 'lib/definedlinks.js';
        }

        $textexpander = $this->getOption('redactor.textexpander',null, '');
        if(!empty($textexpander)) {
            $plugins[] = 'textexpander';
            if(!$this->greedyPlugins) $pluginFiles[] = $this->assetsUrl . 'lib/textexpander.js';
        }

        if($this->getBooleanOption('redactor.wym', null,false)) {
            $plugins[] = 'wym';
            if(!$this->greedyPlugins) $pluginFiles[] = $this->assetsUrl . 'lib/wym.min.js';
        }

        $options['plugin_files'] = '';

        if(isset($options['clipsJson'])) {
            $plugins[] = 'clips';
            if(!$this->greedyPlugins) $pluginFiles[] = $this->assetsUrl . 'lib/clips.min.js';
        }

        if($this->loadCodeMirror) {
            $options['codemirror'] = true;
            $options['codemirrorJSON'] = $this->modx->toJSON($this->getCodeMirrorOptions());
            $options['plugin_files'] .= '<link rel="stylesheet" type="text/css" href="' . $this->assetsUrl . 'lib/codemirror/codemirror.imperavi.css' . '" />';
            $codemirrorTheme = $this->getOption('codemirror.theme', null, 'default');
            if(!empty($codemirrorTheme) && $codemirrorTheme !== 'default') $options['plugin_files'] .= '<link rel="stylesheet" type="text/css" href="' . $this->assetsUrl . "lib/codemirror/theme/$codemirrorTheme.css" . '" />';
            $pluginFiles[] = $this->assetsUrl . 'lib/codemirror/codemirror.imperavi.min.js'; // imperavi uses some sort of custom build or something
        }
        elseif($this->loadAce) {
            $plugins[] = 'syntax';
$script = <<<HERE
<script>try {ace} catch(e) { document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.1.9/ace.js"><\/script>') }</script>
HERE;
            $this->modx->regClientStartupHTMLBlock($script);
            if(!$this->greedyPlugins) $pluginFiles[] = $this->assetsUrl . 'lib/syntax.min.js';
            $options['aceTheme'] = 'ace/theme/' . ($this->getOption('ace.theme', null, 'chrome'));
            $options['aceFontSize'] = ($this->getOption('ace.font_size', null, '13px'));
            $options['aceUseSoftTabs'] = ($this->getBooleanOption('ace.soft_tabs', null, true));
            $options['aceUseWrapMode'] = ($this->getBooleanOption('ace.word_wrap', null, false));
            $options['aceHighlightActiveLine'] = ($this->getBooleanOption('redactor.syntax_highlightActiveLine', null, true));
            $options['aceMode'] = ($this->getOption('redactor.syntax_aceMode', null, 'ace/mode/html'));
            $options['aceReadOnly'] = ($this->getBooleanOption('redactor.syntax_readOnly', null, false));
            $options['aceTabSize'] = ($this->getOption('ace.tab_size', null, 4));
            $options['aceOfflineSource'] = $this->assetsUrl . 'lib/ace/ace.min.js';
        }

        // Imperavi plugins we allow to be easily included via system settings
        $ps = array('filemanager','fontcolor','fontfamily','fontsize','table','textdirection','video','limiter');
        if($this->getBooleanOption('redactor.plugin_uploadcare', null, true)) { //$this->getBooleanOption("redactor.plugin_uploadcare", null, true)
            $uploadcare_api_key = $this->getOption('redactor.uploadcare_pub_key',null,'demopublickey');
            $uploadcare_locale = $this->getOption('redactor.uploadcare_locale',null,'en');
            $options['uploadcare'] = array(
                'publicKey' => $uploadcare_api_key,
                'crop' => $this->getOption('redactor.uploadcare_crop',null,'free'),
                'tabs' => $this->getOption('redactor.uploadcare_tabs',null,'all')
            );
            $this->modx->regClientStartupHTMLBlock("<script>UPLOADCARE_LOCALE = '$uploadcare_locale';</script>");

            $ps[] = 'uploadcare';
        }

        // Register plugins
        foreach($ps as $p) {
            if($this->getBooleanOption("redactor.plugin_$p", null, false)) {
                //$pluginFiles[] = $this->assetsUrl . "lib/$p.js";
                $plugins[] = $p;
            }
        }

        // our own modmore-redactor-plugins minified and managed via grunt bower all included together with source
        $ps = array('breadcrumb','clips','contrast','counter','download','imagepx','imageurl','norphan','replacer','speek','wym','zoom');
        foreach($ps as $p) {
            if($this->getBooleanOption("redactor.plugin_$p", null, false)) {
                if(!$this->greedyPlugins) $pluginFiles[] = $this->assetsUrl . "lib/$p.min.js";
                $plugins[] = $p;
            }
        }

        if($this->getBooleanOption('redactor.plugin_baseurls', null, true)) {
            $plugins[] = 'baseurls';
            $pluginFiles[] = $this->assetsUrl . 'modmore.redactor.baseurls.js';
            $options['baseurlsMode'] = $this->getOption('redactor.baseurls_mode', null, 'relative');
        }

        if((bool)$this->getOption('redactor.plugin_eureka', null, true)) {
            //$pluginFiles[] = $this->assetsUrl . "lib/eureka.js";
            $plugins[] = 'eureka';
            $options['eurekaAllowFullScreen'] = $this->getBooleanOption('eurekaAllowFullScreen', null, true);
            $this->modx->controller->addCSS($this->assetsUrl . 'lib/eureka/css/eureka.1.2.0.min.css');
            $this->modx->controller->addJavascript($this->assetsUrl . 'lib/eureka/js/vendor/modernizr-2.8.3.min.js');
            if((bool)$this->getOption('redactor.plugin_eureka_shivie9', null, true)) {
                $this->modx->controller->addJavascript($this->assetsUrl . 'lib/eureka/js/eureka.dom4.1.2.0.min.js');
                $this->modx->controller->addJavascript($this->assetsUrl . 'lib/eureka/js/eureka.no-flexbox.1.2.0.min.js');
            }
            $this->modx->controller->addJavascript($this->assetsUrl . 'lib/eureka/js/muckboot.eureka.1.2.0.min.js');
            $this->modx->controller->addJavascript($this->assetsUrl . 'lib/eureka/js/eureka.1.2.0.min.js');
        } else {
            if(!$this->greedyPlugins) $this->modx->controller->addJavascript($this->assetsUrl . 'lib/filemanager.js');
            if(!$this->greedyPlugins) $this->modx->controller->addJavascript($this->assetsUrl . 'lib/imagemanager.js');
            $plugins[] = 'filemanager';
            $plugins[] = 'imagemanager';
        }

        $additionalPlugins = $this->explode($this->getOption('redactor.additionalPlugins', null, ''));
        if (!empty($additionalPlugins)) {
            foreach ($additionalPlugins as $pluginDefinition) {
                $pluginDefinition = explode(':', $pluginDefinition);
                if (isset($pluginDefinition[0])) $plugins[] = $pluginDefinition[0];
                if (isset($pluginDefinition[1])) $pluginFiles[] = implode(':', array_slice($pluginDefinition,1 ));
            }
        }

        $plugins = array_unique($plugins);
        $plugins = array_filter(array_map('trim',$plugins));

        if (!empty($pluginFiles)) {
            foreach ($pluginFiles as $file) {
                $options['plugin_files'] .= '<script type="text/javascript" src="'.$file.'"></script>'."\n";
            }
        }

        //if($this->greedyPlugins) $this->modx->regClientHTMLBlock('<script type="text/javascript" src="' . $this->assetsUrl . '/lib/redactor-plugins.all.min.js' . '"></script>');
        //$options['toolbarFixedTopOffset'] = ($this->degradeUI) ? 78 : 55;
        $plugins[] = 'modmore';
        if(count($plugins) > 0) $options['plugins'] = $plugins;

        if ($this->getBooleanOption('redactor.loadIntrotext', null,true)) {
            $this->modx->regClientStartupHTMLBlock('<script>
Ext.onReady(function() {
    if (MODx.loadRTE) {
        MODx.loadRTE("modx-resource-introtext");
    }
    else {
        setTimeout(function() { MODx.loadRTE("modx-resource-introtext"); }, 1500);
    }
});
</script>');
        }

        $this->r();

        return $options;
    }

    /**
     * Loads the various required assets into the controller.
     */
    public function initialize() {
        if (!$this->assetsLoaded) {
            $this->modx->controller->addLexiconTopic('redactor:default');
            $this->modx->controller->addCSS($this->config['assetsUrl'].'redactor-2.3.1.min.css');
            if($this->degradeUI) $this->modx->controller->addCSS($this->config['assetsUrl'].'buttons-legacy.min.css');
            if($this->rebeccaDay) $this->modx->controller->addCSS($this->config['assetsUrl'].'rebecca.min.css');
            $this->modx->controller->addJavascript($this->config['assetsUrl'].'redactor-2.3.1.min.js');
            //if($this->loadAce) $this->modx->controller->addJavascript('https://cdnjs.cloudflare.com/ajax/libs/ace/1.1.9/ace.js');
        }
        $this->assetsLoaded = true;
    }

    /**
     * Parses a path by replacing placeholders with dynamic values. This supports the following placeholders:
     * - [[+year]]
     * - [[+month]]
     * - [[+date]]
     * - [[+day]]
     * - [[+user]]
     * - [[+username]]
     * - [[++assets_url]]
     * - [[++site_url]]
     * - [[++base_url]]
     * - [[+<any resource field>]]
     * - [[+tv.<any template variable name>]]
     *
     * In $this->setResource, support is also added for the following through $this->setPathVariables:
     * - [[+parent_alias]]
     * - [[+ultimate_parent]]
     * - [[+ultimate_parent_alias]]
     *
     * @param $path
     * @return mixed
     */
    public function parsePathVariables($path) {
        $path = str_replace('[[+year]]', date('Y'), $path);
        $path = str_replace('[[+month]]', date('m'), $path);
        $path = str_replace('[[+date]]', date('d'), $path);
        $path = str_replace('[[+day]]', date('d'), $path);
        $path = str_replace('[[+user]]', $this->modx->getUser()->get('id'), $path);
        $path = str_replace('[[+username]]', $this->modx->getUser()->get('username'), $path);
        $path = str_replace('[[++assets_url]]', $this->getOption('assets_url', null, 'assets/'), $path);
        $path = str_replace('[[++site_url]]', $this->getOption('site_url', null, ''), $path);
        $path = str_replace('[[++base_url]]', $this->getOption('base_url', null, ''), $path);

        foreach ($this->pathVariables as $key => $value) {
            $path = str_replace('[[+'.$key.']]', $value, $path);
        }

        if ($this->resource) {
            // Match all placeholders in the string so we can replace it with the proper values.
            if (preg_match_all('/\[\[\+(.*?)\]\]/', $path, $matches) && !empty($matches[1])) {
                foreach ($matches[1] as $key) {
                    $ph = '[[+'.$key.']]';
                    if (substr($key, 0, 3) == 'tv.') {
                        $tvName = substr($key, 3);
                        $tvValue = $this->resource->getTVValue($tvName);
                        $path = str_replace($ph, $tvValue, $path);
                    }
                    elseif (array_key_exists($key, $this->resource->_fieldMeta)) {
                        $path = str_replace($ph, $this->resource->get($key), $path);
                    }
                    else {
                        $this->modx->log(modX::LOG_LEVEL_WARN, "Unknown placeholder '{$key}' in redactor path {$path}", '', __METHOD__, __FILE__, __LINE__);
                    }
                }
            }
        }

        $path = str_replace('://', '__:_/_/__', $path);
        $path = str_replace('//', '/', $path);
        $path = str_replace('__:_/_/__', '://', $path);
        return $path;
    }

    /**
    * Gets CodeMirror defaults based off System Settings
    */
    public function getCodeMirrorOptions() {
        return array(
            'autoClearEmptyLines' => $this->getBooleanOption('codemirror.autoClearEmptyLines', null, false),
            'autoCloseTags' => $this->getBooleanOption('codemirror.autoCloseTags', null, true),
            'electricChars' => $this->getBooleanOption('codemirror.electricChars', null, true),
            'firstLineNumber' => $this->getOption('codemirror.firstLineNumber', null, 1),
            'fontSize' => $this->getOption('codemirror.fontSize', null, '13px'),
            'highlightLine' => $this->getBooleanOption('codemirror.highlightLine', null, true),
            'indentUnit' => $this->getOption('codemirror.indentUnit', null, 2),
            'indentWithTabs' => $this->getBooleanOption('codemirror.indentWithTabs', null, true),
            'lineNumbers' => $this->getBooleanOption('codemirror.lineNumbers', null, true),
            'lineWrapping' => $this->getBooleanOption('codemirror.lineWrapping', null, true),
            'matchBrackets' => $this->getBooleanOption('codemirror.matchBrackets', null, true),
            'mode' => $this->getOption('codemirror.mode', null, 'text/html'),
            'showSearchForm' => $this->getBooleanOption('codemirror.showSearchForm', null, true),
            'smartIndent' => $this->getBooleanOption('codemirror.smartIndent', null, false),
            'tabSize' => $this->getOption('codemirror.tabSize', null, 4),
            'theme' => $this->getOption('codemirror.theme', null, 'default'),
            'undoDepth' => $this->getOption('codemirror.undoDepth', null, 40)
        );
    }

    /**
     * Parses supported CSS 4 color shortcuts, such as rebeccapurple
     * @param $color
     * @return mixed
     */
    public function processColor($color) {
        $color = str_replace('rebeccapurple','#663399',$color);
        return $color;
    }

    /**
     * Explodes a string into an array based on the $separator, trimming the array as well.
     *
     * @param string $string The string to split up.
     * @param string $separator The separator between items. Defaults to a comma.
     *
     * @return array
     */
    public function explode($string, $separator = ',') {
        if ($string === false) return $string;
        $array = explode($separator, $string);
        return array_map('trim', $array);
    }

    /**
    * Gets a file-based template.
    *
    * @author Shaun McCormick
    * @access public
    * @param string $name The name of the Chunk
    * @param array $properties The properties for the Chunk
    * @return string The processed content of the Chunk
    */
    public function getTpl($name,$properties = array()) {
        $chunk = null;
        if (!isset($this->chunks[$name])) {
            $chunk = $this->_getTplChunk($name);
            if (empty($chunk)) {
                $chunk = $this->modx->getObject('modChunk',array('name' => $name),true);
                if ($chunk == false) return false;
            }
            $this->chunks[$name] = $chunk->getContent();
        } else {
            $o = $this->chunks[$name];
            $chunk = $this->modx->newObject('modChunk');
            $chunk->setContent($o);
        }
        $chunk->setCacheable(false);
        return $chunk->process($properties);
    }

    /**
     * Returns a <style> tag for the custom styles.
     *
     * @return bool|string
     */
    public function getCustomStyles() {
        $stylesJson = $this->getOption('redactor.formattingAdd',null,'');
        $styles = $this->modx->fromJSON($stylesJson);
        if(!$styles || (count($styles) < 1))  return false;

        $inlineStyle = '<style type="text/css">';
        foreach($styles as $style) {
            $className = '.redactor-dropdown-' . $style['tag'] . '-' . $style['class'];
            $cssProps = $style['style'];
            $inlineStyle .= ".redactor-dropdown $className { $cssProps }";
        }
        $inlineStyle .= '</style>';

        return $inlineStyle;
    }

    /**
    * Returns a modChunk object from a template file.
    *
    * @author Shaun McCormick
    * @access private
    * @param string $name The name of the Chunk. Will parse to name.chunk.tpl
    * @param string $postFix The postfix to append to the name
    * @return modChunk/boolean Returns the modChunk object if found, otherwise
    * false.
    */
    private function _getTplChunk($name,$postFix = '.tpl') {
        $chunk = false;
        $f = $this->config['templatePath'].strtolower($name).$postFix;
        if (file_exists($f)) {
            $o = file_get_contents($f);
            /* @var modChunk $chunk */
            $chunk = $this->modx->newObject('modChunk');
            $chunk->set('name',$name);
            $chunk->setContent($o);
        }
        return $chunk;
    }

    /**
     * Gets the HTML that needs to be injected into the page for instantiating Redactor.
     *
     * @param array $options
     *
     * @return string
     */
    public function getHtml(array $options = array())
    {
        $options = array_merge($this->config, $this->getGlobalOptions(), $options);
        $cleanOptions = $options;
        unset($cleanOptions['plugin_files']);
        $options['optionsJson'] = $this->modx->toJSON($cleanOptions);

        /**
         * Inject stuff in to the head to call Redactor.
         */
        $this->modx->controller->addLexiconTopic('redactor:default');

        if (!empty($options['lang']) && ($options['lang'] != 'en')) {
            $options['langFile'] = $this->config['assetsUrl'] . 'lang/' . $options['lang'] . '.js';
        } else { $options['langFile'] = ''; }

        $html = $this->getTpl('editor', $options);
        $styles = $this->getCustomStyles();
        return $html.$styles;
    }

    /**
     * @param int|modResource $resource
     */
    public function setResource($resource)
    {
        if (is_numeric($resource)) {
            $resource = $this->modx->getObject('modResource', $resource);
        }

        if ($resource instanceof modResource) {
            $this->resource = $resource;
            $this->setWorkingContext($resource->get('context_key'));

            // Make sure the resource is also added to $modx->resource if there's nothing set there
            // This provides compatibility for dynamic media source paths using snippets relying on $modx->resource
            if (!$this->modx->resource) {
                $this->modx->resource =& $resource;
            }

            if($this->getBooleanOption('redactor.parse_parent_path',null,true) && $parent = $resource->getOne('Parent')) {
                $this->setPathVariables(array(
                    'parent_alias' => $parent->get('alias'),
                ));
                $pids = $this->modx->getParentIds($resource->get('id'), (int)$this->getOption('redactor.parse_parent_path_height', null,10), array('context' => $resource->get('context_key')));
                $pidx = count($pids) - 2;
                if ($pidx >= 0 && $ultimateParent = $this->modx->getObject('modResource', $pids[$pidx])) {
                    $this->setPathVariables(array(
                        'ultimate_parent' => $ultimateParent->get('id'),
                        'ultimate_parent_alias' => $ultimateParent->get('alias'),
                        'ultimate_alias' => $ultimateParent->get('alias'),
                    ));
                } else {
                    $this->setPathVariables(array(
                        'ultimate_parent' => '',
                        'ultimate_parent_alias' => '',
                        'ultimate_alias' => ''
                    ));
                }
            } else {
                $this->setPathVariables(array(
                    'parent_alias' => '',
                    'ultimate_parent' => '',
                    'ultimate_parent_alias' => '',
                    'ultimate_alias' => ''
                ));
            }
        }
    }

    /**
     * Sets path variables which are processed in the upload/browse paths.
     * @param array $array
     */
    public function setPathVariables(array $array = array())
    {
        $this->pathVariables = array_merge($this->pathVariables, $array);
    }

    /**
     * Grabs the setting by its key, looking at the current working context (see setWorkingContext) first.
     *
     * @param $key
     * @param null $options
     * @param null $default
     * @param bool $skipEmpty
     * @return mixed
     */
    public function getOption($key, $options = null, $default = null, $skipEmpty = false)
    {
        if ($this->wctx) {
            $value = $this->wctx->getOption($key, $default, $options);
            if ($skipEmpty && $value == '') {
                return $default;
            }
            else {
                return $value;
            }
        }
        return $this->modx->getOption($key, $options, $default, $skipEmpty);
    }

    /**
     * Set the internal working context for grabbing context-specific options.
     *
     * @param $key
     * @return bool|modContext
     */
    public function setWorkingContext($key)
    {
        if ($key instanceof modResource)
        {
            $key = $key->get('context_key');
        }

        if (empty($key))
        {
            return false;
        }

        $this->wctx = $this->modx->getContext($key);
        if (!$this->wctx) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, 'Error loading working context ' . $key, '', __METHOD__, __FILE__, __LINE__);
            return false;
        }

        return $this->wctx;
    }

    public function r()
    {
        // Only run if we're in the manager
        if (!$this->modx->context || $this->modx->context->get('key') !== 'mgr') {
            return;
        }
        // Get the public key from the .pubkey file contained in the package directory
        $pubKeyFile = $this->config['corePath'] . '.pubkey';
        $key = file_exists($pubKeyFile) ? file_get_contents($pubKeyFile) : '';
        $domain = $this->modx->getOption('http_host');
        if (strpos($key, '@@') !== false) {
            $pos = strpos($key, '@@');
            $domain = substr($key, 0, $pos);
            $key = substr($key, $pos + 2);
        }
        $check = false;
        // No key? That's a really good reason to check :)
        if (empty($key)) {
            $check = true;
        }
        // Doesn't the domain in the key file match the current host? Then we should get that sorted out.
        if ($domain !== $this->modx->getOption('http_host')) {
            $check = true;
        }
        // the .pubkey_c file contains a unix timestamp saying when the pubkey was last checked
        $modified = file_exists($pubKeyFile . '_c') ? file_get_contents($pubKeyFile . '_c') : false;
        if (!$modified ||
            $modified < (time() - (60 * 60 * 24 * 7)) ||
            $modified > time()) {
            $check = true;
        }
        if ($check) {
            $provider = false;
            $c = $this->modx->newQuery('transport.modTransportPackage');
            $c->where(array(
                'signature:LIKE' => 'redactor-%',
            ));
            $c->sortby('installed', 'DESC');
            $c->limit(1);
            $package = $this->modx->getObject('transport.modTransportPackage', $c);
            if ($package instanceof modTransportPackage) {
                $provider = $package->getOne('Provider');
            }
            if (!$provider) {
                $provider = $this->modx->getObject('transport.modTransportProvider', array(
                    'service_url' => 'https://rest.modmore.com/'
                ));
            }
            if ($provider instanceof modTransportProvider) {
                $this->modx->setOption('contentType', 'default');
                // The params that get sent to the provider for verification
                $params = array(
                    'key' => $key,
                    'package' => 'redactor',
                );
                // Fire it off and see what it gets back from the XML..
                $response = $provider->request('license', 'GET', $params);
                $xml = $response->toXml();
                $valid = (int)$xml->valid;
                // If the key is found to be valid, set the status to true
                if ($valid) {
                    // It's possible we've been given a new public key (typically for dev licenses or when user has unlimited)
                    // which we will want to update in the pubkey file.
                    $updatePublicKey = (bool)$xml->update_pubkey;
                    if ($updatePublicKey > 0) {
                        file_put_contents($pubKeyFile,
                            $this->modx->getOption('http_host') . '@@' . (string)$xml->pubkey);
                    }
                    file_put_contents($pubKeyFile . '_c', time());
                    return;
                }
                // If the key is not valid, we have some more work to do.
                $message = (string)$xml->message;
                $age = (int)$xml->case_age;
                $url = (string)$xml->case_url;
                $warning = false;
                if ($age >= 7) {
                    $warning = <<<HTML
    var warning = '<div style="width: 100%;border: 1px solid #dd0000;background-color: #F9E3E3;padding: 1em; font-weight: bold; box-sizing: border-box;">';
    warning += '<a href="$url" style="float:right; margin-left: 1em;" target="_blank">Fix the license</a>The Redactor license on this site is invalid. Please click the button on the right to correct the problem. Error: {$message}';
    warning += '</div>';
HTML;
                } elseif ($age >= 2) {
                    $warning = <<<HTML
    var warning = '<div style="width: 100%;border: 1px solid #dd0000;background-color: #F9E3E3;padding: 1em; box-sizing: border-box;">';
    warning += '<a href="$url" style="float:right; margin-left: 1em;" target="_blank">Fix the license</a>Oops, there is an issue with the Redactor license. Perhaps your site recently moved to a new domain, or the license was reset? Either way, please click the button on the right or contact your development team to correct the problem.';
    warning += '</div>';
HTML;
                }
                if ($warning) {
                    $output = <<<HTML
    <script type="text/javascript">
    {$warning}
    function showRedactorWarning() {
        setTimeout(function() {
            if (typeof window.\$red != 'undefined' && \$red('.redactor-toolbar').length) {
                \$red('.redactor-toolbar').append(warning);
            }
            else {
                setTimeout(showRedactorWarning, 300);
            }
        }, 300);
    }
    showRedactorWarning();
    </script>
HTML;
                    if ($this->modx->controller instanceof modManagerController) {
                        $this->modx->controller->addHtml($output);
                    } else {
                        $this->modx->regClientHTMLBlock($output);
                    }
                }
            }
            else {
                $this->modx->log(modX::LOG_LEVEL_ERROR, 'UNABLE TO VERIFY MODMORE LICENSE - PROVIDER NOT FOUND!');
            }
        }
    }

}
