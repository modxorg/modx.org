<?php
/**
 * Redactor custom Template Variable
 *
 * Class RedactorInputRender
 */
class RedactorInputRender extends modTemplateVarInputRender {
    /** @var Redactor */
    public $redactor;

    /**
     * Get lexicon topics for this TV.
     * @return array
     */
    public function getLexiconTopics() {
        return array('redactor:default');
    }
    /**
     * @param string $value
     * @param array $params
     * @return void|mixed
     */
    public function render($value, array $params = array()) {
        /**
         * Get the Redactor service class.
         */
        $corePath = $this->modx->getOption('redactor.core_path', null, $this->modx->getOption('core_path').'components/redactor/');
        $this->redactor = $this->modx->getService('redactor', 'Redactor', $corePath . 'model/redactor/');
        if (!($this->redactor instanceof Redactor)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[Redactor] Error loading Redactor service class.');
            return parent::render($value, $params);
        }

        if ($this->modx->resource) {
            $this->redactor->setResource($this->modx->resource);
        }

        /**
         * Fix some param names that changed from 1.x to 2.x or were wrong before 2.0.5
         */
        if (isset($params['formattingTags'])) {
            $params['formatting'] = $params['formattingTags'];
            unset($params['formattingTags']);
        }

        /**
         * Get the Redactor configuration on system level, and cleverly merge it with
         * the TV configuration for inheritance and default values.
         */
        $systemOptions = $this->redactor->getGlobalOptions();
        foreach ($params as $key => $value) {
            if (($value == 'inherit' || $value == '') && isset($systemOptions[$key])) {
                $params[$key] = $systemOptions[$key];
            }

            $systemValue = (isset($systemOptions[$key])) ? $systemOptions[$key] : null;
            $params[$key] = $this->_fixValueType($params[$key], $systemValue);
        }
        $params = array_merge($systemOptions, $params);
        //$params['imageGetJson'] = $params['imageGetJson'].'&tv=' . $this->tv->get('id');
        $params['fileGetJson'] = $params['fileGetJson'].'&tv=' . $this->tv->get('id');
        $params['imageUpload'] = $params['imageUpload'].'&tv=' . $this->tv->get('id');
        if(isset($params['clipboardUploadUrl'])) $params['clipboardUploadUrl'] = $params['clipboardUploadUrl'].'&tv=' . $this->tv->get('id');
        $params['fileUpload'] = $params['fileUpload'].'&tv=' . $this->tv->get('id');
        $params['plugins'] = array(); // wipe it clean and read
		if(isset($params['clipsJson']) && !empty($params['clipsJson'])) $params['plugins'][] = "clips";
		if(isset($params['stylesJson']) && !empty($params['stylesJson'])) $params['plugins'][] = "styles";
        ($params['buttonFullScreen']) ? $params['plugins'][] = "fullscreen" : $params['plugins'] = array_diff($params['plugins'],array('fullscreen'));

        $ps = array('breadcrumb','contrast','counter','download','eureka','fontcolor','fontfamily','imagepx','limiter','norphan','replacer','speek','syntax','table','textdirection','textexpander','video','fontsize');
        foreach($ps as $p) {
            // If we have a value for this plugin, check what to do
            if (isset($params[$p])) {
                // If it's enabled, we add it to the list
                if ($params[$p] == '1') {
                    $params['plugins'][] = $p;
                }
                // If it's set to inherit, we only add it of it's enabled on the context/system level
                // Otherwise we remove it from the list
                elseif ($params[$p] == 'inherit') {
                    $usePlugin = (bool)$this->redactor->getOption('redactor.plugin_' . $p, null, true);
                    if ($usePlugin) {
                        $params['plugins'][] = $p;
                    }
                    elseif (($key = array_search($p, $params['plugins'])) !== false) {
                        unset($params['plugins'][$key]);
                    }
                }
                // Not enabled or set to inherit? Make sure it's disabled
                else {
                    if (($key = array_search($p, $params['plugins'])) !== false) {
                        unset($params['plugins'][$key]);
                    }
                }
            }
            // No value for the option? Then use the system default
            else {
                $usePlugin = (bool)$this->redactor->getOption('redactor.plugin_' . $p, null, true);
                if ($usePlugin) {
                    $params['plugins'][] = $p;
                }
            }
        }

        if((bool)$this->redactor->getOption('redactor.plugin_baseurls', null, true)) {
            $params['plugins'][] = 'baseurls';
        }
        $up = $params['use_uploadcare']; // uploadcare is an array so we use use_uploadcare
        if($params['use_uploadcare'] !== '0' && ($params['use_uploadcare'] == '1' || (bool)$this->redactor->getOption('redactor.plugin_uploadcare', null, true))) {
            $params['plugins'][] = 'uploadcare';
        }

        if($params['eureka'] == '1' && !(bool)$this->redactor->getOption('redactor.plugin_eureka', null, true)) {
            if(!$this->greedyPlugins) $pluginFiles[] = $this->assetsUrl . "lib/eureka.js";
            $params['plugins'][] = 'eureka';
            $this->modx->controller->addCSS($this->redactor->assetsUrl . 'lib/eureka/css/eureka.1.2.0.min.css');
            $this->modx->controller->addJavascript($this->redactor->assetsUrl . 'lib/eureka/js/vendor/modernizr-2.8.3.min.js');
            if((bool)$this->redactor->getOption('redactor.plugin_eureka_shivie9', null, true)) {
                $this->modx->controller->addJavascript($this->redactor->assetsUrl . 'lib/eureka/js/eureka.dom4.1.2.0.min.js');
                $this->modx->controller->addJavascript($this->redactor->assetsUrl . 'lib/eureka/js/eureka.no-flexbox.1.2.0.min.js');
            }
            $this->modx->controller->addJavascript($this->redactor->assetsUrl . 'lib/eureka/js/muckboot.eureka.1.2.0.min.js');
            $this->modx->controller->addJavascript($this->redactor->assetsUrl . 'lib/eureka/js/eureka.1.2.0.min.js');
        }

        if($params['eureka'] == '0' || ($params['eureka'] !== '1' && !(bool)$this->redactor->getOption('redactor.plugin_eureka', null, true))) {
            $params['plugins'][] = 'imagemanager';
            $params['plugins'][] = 'filemanager';
        }

        if($params['syntax'] == '1') {
$script = <<<HERE
<script>try {ace} catch(e) { document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.1.9/ace.js"><\/script>') }</script>
HERE;
            $this->modx->regClientStartupHTMLBlock($script);

            $params['plugins'][] = 'syntax';
            if(!$this->redactor->greedyPlugins) $this->modx->controller->addJavascript($this->redactor->assetsUrl . 'lib/syntax.min.js');
            $params['aceTheme'] = 'ace/theme/' . ($this->redactor->getOption('ace.theme', null, 'chrome'));
            $params['aceFontSize'] = ($this->redactor->getOption('ace.font_size', null, '13px'));
            $params['aceUseSoftTabs'] = ($this->redactor->getBooleanOption('ace.soft_tabs', null, true));
            $params['aceUseWrapMode'] = ($this->redactor->getBooleanOption('ace.word_wrap', null, false));
            $params['aceHighlightActiveLine'] = ($this->redactor->getBooleanOption('redactor.syntax_highlightActiveLine', null, true));
            $params['aceMode'] = ($this->redactor->getOption('redactor.syntax_aceMode', null, 'ace/mode/html'));
            $params['aceReadOnly'] = ($this->redactor->getBooleanOption('redactor.syntax_readOnly', null, false));
            $params['aceTabSize'] = ($this->redactor->getOption('ace.tab_size', null, 4));
            $params['aceOfflineSource'] = $this->redactor->assetsUrl . 'lib/ace/ace.js';
        }

        if($params['codemirror'] == '0') $params['codemirror'] = false;

        /**
         * Set placeholders and register CSS/JS files.
         */
        if (!empty($params['lang']) && ($params['lang'] != 'en')) {
            $this->setPlaceholder('langFile', '<script type="text/javascript" src="' . $this->redactor->config['assetsUrl'] . 'lang/' . $params['lang'] . '.js"></script>');
        }

        if(!empty($params['plugin_files'])) {
            $this->setPlaceholder('pluginFiles',$params['plugin_files']);
        }

        $this->setPlaceholder('assetsUrl', $this->redactor->config['assetsUrl']);
        $this->setPlaceholder('params', $params);
        $this->setPlaceholder('params_json', $this->modx->toJSON($params));
        $this->registerStuff();

        return parent::render($value, $params);
    }

    /**
     * Returns the template path to load.
     * @return string
     */
    public function getTemplate() {
        $corePath = $this->redactor->getOption('redactor.core_path', null, $this->redactor->getOption('core_path').'components/redactor/');
        return $corePath . 'elements/tvs/tpl/input.tpl';
    }

    /**
     * Makes sure boolean values are boolean, and that array values are exploded properly.
     *
     * @param $value
     * @param $systemValue
     *
     * @return array|bool
     */
    protected function _fixValueType($value, $systemValue) {
        switch (gettype($systemValue)) {
            case 'boolean':
                $value = (bool)$value;
                break;
            case 'array':
                if (!is_array($value)) {
                    $value = $this->redactor->explode($value);
                }
                break;
        }
        return $value;
    }

    protected function registerStuff() {
        $this->modx->controller->addCSS($this->redactor->config['assetsUrl'].'redactor-2.3.1.min.css');
        if($this->redactor->degradeUI) $this->modx->controller->addCSS($this->redactor->config['assetsUrl'].'buttons-legacy.min.css');
        if($this->redactor->rebeccaDay) $this->modx->controller->addCSS($this->redactor->config['assetsUrl'].'rebecca.min.css');
        $this->modx->controller->addJavascript($this->redactor->config['assetsUrl'].'redactor-2.3.1.min.js');
$script = <<<HERE
<script>try {ace} catch(e) { document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.1.9/ace.js"><\/script>') }</script>
HERE;
        if($this->redactor->loadAce) $this->modx->regClientStartupHTMLBlock($script);
    }
}
return 'RedactorInputRender';
