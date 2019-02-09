<?php
require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
/**
 * ContentBlocks
 *
 * Copyright 2013 by Mark Hamstra <hello@markhamstra.com>
 *
 * This file is part of ContentBlocks.
 *
 * @package contentblocks
*/

use modmore\Alpacka\Alpacka;

/**
 * Class ContentBlocks
 *
 * Main Service Class for ContentBlocks.
 */
class ContentBlocks extends Alpacka {
    protected $namespace = 'contentblocks';

    /**
     * @var int
     */
    public $uniqueIdx = 0;
    /**
     * @var null|array
     */
    public $fields;
    /**
     * @var bool
     */
    public $debug = false;
    /**
     * @var array
     */
    public $inputs = array();
    /**
     * @var bool
     */
    public $inputsLoaded = false;
    /**
     * @var array
     */
    public $coreInputs = array(
        'chunk',
        'chunk_selector',
        'code',
        'dropdown',
        'gallery',
        'file',
        'heading',
        'hr',
        'image',
        'image_with_title',
        'layout',
        'link',
        'list',
        'ordered_list',
        'quote',
        'repeater',
        'richtext',
        'snippet',
        'table',
        'textarea',
        'textfield',
        'video',
    );
    /**
     * @var array
     */
    public $cacheOptions = array(
        xPDO::OPT_CACHE_KEY => 'contentblocks',
    );

    /** @var modParser $normalParser */
    public $normalParser;

    /**
     * This array keeps track of renamed file uploads in order to make sure image links don't break when
     * something like FileSluggy is active on the site as well.
     *
     * @var array
     */
    public $renames = array();
    protected $coreIconUrl;
    protected $customIconUrl;

    /**
     * The main constructor for ContentBlocks. This doesn't hardcode the instance to the modX class as that might change in
     * the future, and we don't want to manually update all derivative service classes when that happens. 
     *
     * @param \modX $instance
     * @param array $config
     */
    public function __construct($instance, array $config = array())
    {
        parent::__construct($instance, $config);
        $this->setVersion(1, 8, 5, 'pl');

        /**
         * @deprecated
         *
         * The config loading below is from the pre-Alpacka era. Leaving it in for backwards compatibility, but
         * these should be removed in a future iteration (2.0). Use the snake_case_format where possible.
         */
        $corePath = $this->modx->getOption('contentblocks.core_path',$config,$this->modx->getOption('core_path').'components/contentblocks/');
        $assetsUrl = $this->modx->getOption('contentblocks.assets_url',$config,$this->modx->getOption('assets_url').'components/contentblocks/');
        $assetsPath = $this->modx->getOption('contentblocks.assets_path',$config,$this->modx->getOption('assets_path').'components/contentblocks/');
        $customIconPath = $this->getOption('contentblocks.custom_icon_path',$config,false);
        $customIconUrl = $this->getOption('contentblocks.custom_icon_url',$config,false);
        $this->config = array_merge($this->config, array(
            'basePath' => $corePath,
            'corePath' => $corePath,
            'modelPath' => $corePath.'model/',
            'processorsPath' => $corePath.'processors/',
            'controllersPath' => $corePath.'controllers/',
            'elementsPath' => $corePath.'elements/',
            'templatesPath' => $corePath.'templates/',
            'assetsPath' => $assetsPath,
            'customIconPath' => $customIconPath,
            'customIconUrl' => $customIconUrl,
            'jsUrl' => $assetsUrl.'js/',
            'cssUrl' => $assetsUrl.'css/',
            'assetsUrl' => $assetsUrl,
            'connectorUrl' => $assetsUrl.'connector.php',
            'linkDetectionPattern' => $this->getOption('contentblocks.link_detection_pattern'),
            'hideLogo' => (bool)$this->getOption('contentblocks.hide_logo', null, false),
            'modx_base_url' => $this->modx->getOption('base_url'),
            'modx_site_url' => $this->modx->getOption('site_url'),
            'defaultModalView' => $this->getOption('contentblocks.default_modal_view', null, 'default'),
            'tinyrte_lazy_init' => $this->getBooleanOption('contentblocks.tinyrte_lazy_init', null, false),
            'canvas_position' => $this->getOption('contentblocks.canvas_position', null, 'block', true),
            'permissions' => array(),
        ),$config);
        /**
         * /end @deprecated
         */

        // Grab all the ContentBlocks permissions and store 'm in the config for easy access
        $permissions = array(
            'component', 'rebuild_content',
            'fields', 'fields_new', 'fields_edit', 'fields_save', 'fields_delete', 'fields_import', 'fields_export',
            'layouts', 'layouts_new', 'layouts_edit', 'layouts_save', 'layouts_delete', 'layouts_import', 'layouts_export',
            'templates', 'templates_new', 'templates_edit', 'templates_save', 'templates_delete', 'templates_import', 'templates_export',
            'categories', 'categories_new', 'categories_edit', 'categories_save', 'categories_delete', 'categories_import', 'categories_export',
            'defaults', 'defaults_new', 'defaults_edit', 'defaults_save', 'defaults_delete',
        );
        foreach ($permissions as $key) {
            $this->config['permissions'][$key] = $this->modx->context->checkPolicy('contentblocks_' . $key);
        }

        $this->debug = (bool)$this->getOption('contentblocks.debug',null,false);

        $this->coreIconUrl = $this->config['assetsUrl'].'img/icons/';
        $this->customIconUrl = $this->config['customIconUrl'];
    }

    /**
     * @param modResource $resource
     * @return bool
     */
    public function useContentBlocks(modResource $resource)
    {
        // Default settings
        $disabled = (int)$this->getOption('contentblocks.disabled', null, false);
        $acceptedResourceTypes = $this->getOption('contentblocks.accepted_resource_types', null, 'modDocument,mgResource');

        $acceptedType = false;
        $acceptedResourceTypes = explode(',', $acceptedResourceTypes);
        foreach ($acceptedResourceTypes as $type) {
            if ($resource instanceof $type) $acceptedType = true;
        }

        // If contentblocks is disabled or this is not an accepted resource, we can stop here.
        if ($disabled || !$acceptedType) return false;
        return true;
    }

    /**
     * Gets fields and layouts ready to be used in the manager javascript
     *
     * @param modResource|null $resource
     * @return array
     */
    public function getObjectsForCanvas($resource = null) {
        // Load input classes
        $this->loadInputs();
        // make sure the parser is available, so we can process tags later on if needed
        $this->modx->getParser();

        $categories = array(); ;
        $c = $this->modx->newQuery('cbCategory');
        $c->sortby('sortorder', 'ASC');
        foreach ($this->modx->getIterator('cbCategory') as $category) {
            /** @var cbField $field */
            $key = '_' . $category->get('id');
            $categories[$key] = $category->get(array('id', 'name', 'description', 'sortorder'));

            // TODO: Lexiconable?
//            if (array_key_exists($input, $this->inputs) && $this->inputs[$input] instanceof cbBaseInput) {
//                $topics = $this->inputs[$input]->getLexiconTopics();
//                foreach ($topics as $topic) $this->modx->controller->addLexiconTopic($topic);
//            }
        }

        $fields = array(); ;
        $c = $this->modx->newQuery('cbField');
        $c->where(array(
            'parent' => 0
        ));
        $c->sortby('sortorder', 'ASC');
        foreach ($this->modx->getIterator('cbField') as $field) {
            /** @var cbField $field */
            $key = '_' . $field->get('id');
            $input = $field->get('input');
            $fields[$key] = $this->_prepareFieldForCanvas($field, $resource);

            if (array_key_exists($input, $this->inputs) && $this->inputs[$input] instanceof cbBaseInput) {
                $topics = $this->inputs[$input]->getLexiconTopics();
                foreach ($topics as $topic) {
                    if ($this->modx->controller instanceof modManagerController) {
                        $this->modx->controller->addLexiconTopic($topic);
                    }
                    else {
                        $this->modx->lexicon->load($topic);
                    }
                }
            }
        }

        $c = $this->modx->newQuery('cbLayout');
        $c->sortby('sortorder', 'ASC');
        $layouts = array(); ;
        foreach ($this->modx->getIterator('cbLayout', $c) as $layout) {
            /** @var cbLayout $layout */
            $key = '_' . $layout->get('id');
            $icon_type = $layout->get('icon_type');
            $icon_base_url = ($icon_type === 'core' || $icon_type === '') ? $this->coreIconUrl : $this->customIconUrl;
            $layouts[$key] = $layout->get(array('id', 'name', 'description', 'sortorder', 'icon', 'columns', 'availability', 'settings', 'times_per_page', 'layout_only_nested', 'category'));
            $layouts[$key]['icon'] =  $icon_base_url . $layout->get('icon') . '--DPR--.png';
            $layouts[$key]['available'] = $resource ? $this->isAvailable($layouts[$key]['availability'], $resource) : true;
            $layouts[$key]['settings'] = $this->modx->fromJSON($layouts[$key]['settings']);
            if (is_array($layouts[$key]['settings'])) {
                foreach ($layouts[$key]['settings'] as $idx => $setting) {
                    if (array_key_exists('process_tags', $setting) && $setting['process_tags']) {
                        $this->modx->parser->processElementTags('', $setting['fieldoptions']);
                    }
                    $layouts[$key]['settings'][$idx]['fieldoptions'] = explode("\n", $setting['fieldoptions']);
                }
            }
        }

        $c = $this->modx->newQuery('cbTemplate');
        $c->sortby('sortorder', 'ASC');
        $templates = array();
        foreach ($this->modx->getIterator('cbTemplate', $c) as $template) {
            /** @var cbTemplate $template */
            $key = '_' . $template->get('id');
            $icon_type = $template->get('icon_type');
            $icon_base_url = ($icon_type === 'core' || $icon_type === '') ? $this->coreIconUrl : $this->customIconUrl;
            $templates[$key] = $template->get(array('id', 'name', 'description', 'sortorder', 'icon', 'content', 'availability', 'category'));
            $templates[$key]['icon'] =  $icon_base_url . $template->get('icon') . '--DPR--.png';
            $templates[$key]['available'] = ($resource) ? $this->isAvailable($templates[$key]['availability'], $resource) : true;
            $templates[$key]['content'] = $this->modx->fromJSON($templates[$key]['content']);
        }

        return array(
            'categories' => $categories,
            'fields' => $fields,
            'layouts' => $layouts,
            'templates' => $templates,
        );
    }

    /**
     * Turns a cbField object into something the frontend canvas can use. This for example prepares icon urls,
     * decodes json objects into php arrays and adds subfields to the return value.
     *
     * @param cbField $field
     * @param null|modResource $resource
     * @return mixed
     */
    protected function _prepareFieldForCanvas(cbField $field, $resource = null)
    {
        $icon_type = $field->get('icon_type');
        $icon_base_url = ($icon_type === 'core' || $icon_type === '') ? $this->coreIconUrl : $this->customIconUrl;

        $tmpField = $field->get(array('id', 'input', 'parent', 'parent_properties', 'name', 'description', 'sortorder', 'icon', 'icon_type', 'properties', 'availability', 'layouts', 'settings', 'times_per_layout', 'times_per_page', 'process_tags', 'category'));
        $tmpField['icon'] =  $icon_base_url . $field->get('icon') . '--DPR--.png';
        $tmpField['properties'] = $this->modx->fromJSON($tmpField['properties']);
        $tmpField['parent_properties'] = $this->modx->fromJSON($tmpField['parent_properties']);
        $tmpField['available'] = $resource ? $this->isAvailable($tmpField['availability'], $resource) : true;
        $tmpField['layouts'] = (!empty($tmpField['layouts'])) ? array_map('intval', explode(',', $tmpField['layouts'])) : array();
        $tmpField['settings'] = $this->modx->fromJSON($tmpField['settings']);
        if (is_array($tmpField['settings'])) {
            foreach ($tmpField['settings'] as $idx => $setting) {
                if(isset($setting['process_tags']) && $setting['process_tags']) {
                    $this->modx->parser->processElementTags('', $setting['fieldoptions']);
                }
                $tmpField['settings'][$idx]['fieldoptions'] = explode("\n", $setting['fieldoptions']);
            }
        }
        $tmpField['subfields'] = array();
        $subfields = $field->getSubfields();
        foreach ($subfields as $subf) {
            $tmpField['subfields'][] = $this->_prepareFieldForCanvas($subf, $resource);
        }
        return $tmpField;
    }

    /**
     * Returns the required assets to load ContentBlocks
     *
     * @return array|string
     */
    public function getAssets()
    {
        $cbv = $this->version;
        $version = '?cbv=' . $cbv;
        $assetsUrl = $this->config['assetsUrl'];
        $js = array();
        if (!$this->debug) {
            $js[] = $assetsUrl . 'dist/contentblocks-min.js'.$version;
        }
        else {
            $js[] = $assetsUrl . 'js/bower_components/jquery/dist/jquery.min.js'.$version;
            $js[] = $assetsUrl . 'js/vendor/tinyrte/tinyrte.js'.$version;
            $js[] = $assetsUrl . 'js/vendor/jquery.autogrowtextarea.js'.$version;
            $js[] = $assetsUrl . 'js/vendor/jquery.powertip-1.2.0/jquery.powertip.js'.$version;
            $js[] = $assetsUrl . 'js/vendor/jqueryui/jquery-ui-1.12.1.custom.min.js'.$version;
            $js[] = $assetsUrl . 'js/bower_components/blueimp-file-upload/js/jquery.iframe-transport.js'.$version;
            $js[] = $assetsUrl . 'js/bower_components/blueimp-file-upload/js/jquery.fileupload.js'.$version;
            $js[] = $assetsUrl . 'js/bower_components/blueimp-tmpl/js/tmpl.js'.$version;
            $js[] = $assetsUrl . 'js/bower_components/typeahead.js/dist/bloodhound.min.js'.$version;
            $js[] = $assetsUrl . 'js/vendor/hogan-2.0.0.js'.$version;
            $js[] = $assetsUrl . 'js/bower_components/typeahead.js/dist/typeahead.bundle.js'.$version;
            $js[] = $assetsUrl . 'js/vendor/cropper.js/cropper.min.js'.$version;
            $js[] = $assetsUrl . 'js/contentblocks.js'.$version;
            $js[] = $assetsUrl . 'js/cropper.js'.$version;
        }
        $assets = $this->getAssetsForInputs();
        $assets['css'][] = $assetsUrl . 'dist/contentblocks.css';

        foreach ($assets['js'] as $file) {
            $file .= ((strpos($file, '?')) ? '&' : '?') . 'cbv=' . $cbv;
            $js[] = $file;
        }
        $js = array_unique($js);

        $output = array();
        foreach ($js as $jsFile) {
            $output[] = '<script type="text/javascript" src="' . $jsFile . '"></script>';
        }
        $output = implode("\n", $output);

        // Add tpl
        $output .= $assets['tpl'];

        // Add CSS
        $css = array();
        foreach ($assets['css'] as $file) {
            $css[] = '<link href="' . $file . '" rel="stylesheet" type="text/css" />';
        }
        $css = implode("\n", $css);
        $output = $css . "\n\n" . $output;


        $newContentField = $this->modx->newObject('modChunk', array(
            'content' => file_get_contents($this->config['core_path'] . 'templates/prerender.tpl'),
        ));
        $replacement = $newContentField->process(array(
            'assetsUrl' => $assetsUrl
        ));

        $output = $replacement . "\n\n" . $output;
        return $output;
    }

    /**
     * @param array $vcContent
     * @param array $globalPhs
     * @return string
     * @throws Exception
     */
    public function generateHtml(array $vcContent = array(), $globalPhs = array())
    {
        if (!($this->modx->parser instanceof cbParser)) {
            throw new Exception('$modx->parser is an instance of ' . get_class($this->modx->parser) . ', expected cbParser.');
        }
        try {
            $this->loadInputs();
            $allFields = $this->getFields();
            $layouts = $this->getLayouts();
            $layoutTemplates = array();
            foreach ($layouts as $id => $layout) {
                $layoutTemplates[$id] = $layout['template'];
            }

            // All parsed content will go into the $content variable
            $content = array();

            // Some options for clean output
            $implosion = ($this->getOption('contentblocks.implode_string', null, "\n\n"));

            $layoutIdx = 0;
            foreach ($vcContent as $layout) {
                $columns = $globalPhs;
                $layoutSettings = [];

                // Process layout settings
                $tmpLayout = isset($layouts[$layout['layout']]) ? $layouts[$layout['layout']] : array();
                if (isset($tmpLayout['settings']) && !empty($tmpLayout['settings'])) {
                    $settings = $this->modx->fromJSON($tmpLayout['settings']);
                    foreach ($settings as $set) {
                        $columns[$set['reference']] = $set['default_value'];
                        $layoutSettings[$set['reference']] = $set['default_value'];
                    }
                }
                if (isset($layout['settings']) && is_array($layout['settings'])) {
                    foreach ($layout['settings'] as $id => $value) {
                        $columns[$id] = $value;
                        $layoutSettings[$id] = $value;
                    }
                }

                // Add the title if set
                if (array_key_exists('title', $layout)) {
                    $columns['title'] = $layout['title'];
                }

                foreach ($layout['content'] as $column => $fields) {
                    $columns[$column] = array();
                    $fieldIdx = 0;
                    foreach ($fields as $fieldData) {
                        // add idx placeholder
                        $fieldData['idx'] = ++$fieldIdx;
                        $fieldData['unique_idx'] = ++$this->uniqueIdx;

                        // add placeholders for layout and column
                        $fieldData['layout_id'] = $layout['layout'];
                        $fieldData['layout_column'] = $column;
                        $fieldData['layout_idx'] = $layoutIdx;
                        $fieldData['layout_settings'] = $layoutSettings;

                        /** @var cbField|false $field */
                        $field = (isset($allFields[$fieldData['field']])) ? $allFields[$fieldData['field']] : false;

                        $columns[$column][] = $this->generateFieldHtml($fieldData, $field, $fieldIdx);
                    }
                    $columns[$column] = implode($implosion, $columns[$column]);
                }



                // Add layout idx placeholder
                $columns['idx'] = ++$layoutIdx;
                $columns['unique_idx'] = ++$this->uniqueIdx;

                $tpl = isset($layoutTemplates[$layout['layout']]) ? $layoutTemplates[$layout['layout']] : 'Template not found for Layout.';
                $content[] = $this->parse($tpl, $columns);
            }
            $content = implode($implosion, $content);
            return $content;
        } catch (Exception $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[ContentBlocks.generateHtml] Exception while attempting to generate html. vcContent Data: ' . $vcContent);
            return '<p class="error">Uh oh, something went wrong generating the page content. </p>';
        }
    }

    /**
     * @param array $fieldData
     * @param bool|\cbField $field
     * @param int $idx
     * @return string
     */
    public function generateFieldHtml($fieldData, $field = false, $idx = 0) {
        if (!isset($fieldData['idx'])) {
            $fieldData['idx'] = $idx;
        }
        // Load the default settings as placeholders
        $settingTypes = array();
        if ($field) {
            $defSettings = $field->get('settings');
            $defSettings = $this->modx->fromJSON($defSettings);
            if (is_array($defSettings) && count($defSettings) > 0) {
                foreach ($defSettings as $defSet) {
                    $settingTypes[$defSet['reference']] = $defSet['fieldtype'];
                    $fieldData[$defSet['reference']] = $defSet['default_value'];
                }
            }
        }

        // Load defined settings as placeholders
        $settings = (isset($fieldData['settings']) && is_array($fieldData['settings'])) ? $fieldData['settings'] : false;
        if (is_array($settings)) {
            foreach ($settings as $key => $value) {
                if (isset($settingTypes[$key]) && $settingTypes[$key] == 'link' && $value != '') {
                    $fieldData[$key . '_raw'] = $value;

                    // if it's numeric, it's a resource
                    if(preg_replace("/\D/", "", $value) == $value) {
                        $value = "[[~$value]]";
                        $fieldData[$key . '_linkType'] = 'resource';
                    }

                    // maybe it's an email address
                    else if(preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\\.[A-Z]{2,4}$/i', $value)) {
                        $value = "mailto:$value";
                        $fieldData[$key . '_linkType'] = 'email';
                    }
                }
                $fieldData[$key] = $value;
            }
        }

        /** @var string|false $it */
        $it = $field ? $field->get('input') : false;
        if ($it && isset($this->inputs[$it])) {
            /** @var cbInput $input */
            $input = $this->inputs[$it];
            $output = $input->process($field, $fieldData);
        }
        else if($fieldData['field'] == '') {
            // the dummy content field is in play. it has no fieldname.
            $output = $fieldData['value'];
        }
        else {
            $output = $fieldData['value'];
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[ContentBlocks] Could not find input ' . $fieldData['field'] . ' for parsing.');
        }
        return $output;
    }

    /**
     * @param $tpl
     * @param $phs
     * @return mixed
     */
    public function parse ($tpl, $phs) {
        // Support for chunks is implemented by returning a formatted chunk tag with all placeholders added as properties.
        if (strpos(trim($tpl), '@CHUNK ') === 0) {
            $chunk = '[[$' . substr($tpl, strlen('@CHUNK ')) . '?';
            foreach ($phs as $key => $value) {
                if (is_scalar($value)) {
                    $chunk .= "\n &{$key}=`{$value}`";
                }
                if (is_array($value)) {
                    $chunk .= $this->_arrayToParameters($key, $value);
                }
            }
            $chunk .= ']]';

            return $chunk;
        }
        // First do a simple search/replace. This will catch nested tags that may be left off
        // in other situations, while it will also typically be faster than parsing simple
        // placeholders (without output modifiers) compared to the actual parser.
        foreach ($phs as $key => $value) {
            if (is_scalar($value)) {
                $tpl = str_replace('[[+' . $key . ']]', $value, $tpl);
            }
        }

        // If we have more placeholders, run it through the parser
        if (strpos($tpl, '[[+') !== false) {
            $oldphs = $this->modx->placeholders;
            // Prevent settings from being parsed, for using system settings w/ context overrides
            foreach ($this->modx->placeholders as $key => $value) {
                if (substr($key, 0, 1) === '+') {
                    unset($this->modx->placeholders[$key]);
                }
            }
            $this->modx->toPlaceholders($phs, '', '.', true);
            $this->modx->parser->processElementTags('', $tpl, false, false, '[[', ']]', array('+'), 1);
            $this->modx->placeholders = $oldphs;
        }
        return $tpl;
    }

    private function _arrayToParameters($key, array $value)
    {
        $params = '';
        foreach ($value as $subKey => $subVal) {
            if (is_array($subVal)) {
                $params .= $this->_arrayToParameters($key . '.' . $subKey, $subVal);
            }
            else {
                $params .= "\n &{$key}.{$subKey}=`{$subVal}`";
            }
        }
        return $params;
    }

    /**
     * As of 0.9.2, this method is no longer necessary to prepare placeholders/templates for parsing.
     *
     * It's temporarily left in (will be removed around ContentBlocks 1.1) to prevent custom inputs breaking
     * if they call it.
     *
     * @param $value
     * @return array|mixed
     * @deprecated
     */
    public function prepareSafeParse($value)
    {
        return $value;
    }

    /**
     * Get the fields
     *
     * @return array|null
     */
    public function getFields() {
        if (!$this->fields) {
            $this->fields = $this->modx->getCollection('cbField');
        }
        return $this->fields;
    }

    /**
     * @return array
     */
    public function getLayouts()
    {
        $layouts = array(
            0 => array('template' => '[[+main]]')
        );
        /** @var cbLayout $layout */
        foreach ($this->modx->getIterator('cbLayout') as $layout) {
            $layouts[$layout->get('id')] = $layout->toArray();
        }
        return $layouts;
    }

    /**
     * @return bool
     */
    public function loadInputs() {
        if (!$this->inputsLoaded) {
            $this->cb();
            $this->modx->loadClass('cbInput', $this->config['modelPath'].'contentblocks/', true, true);
            $core = $this->coreInputs;
            foreach ($core as $name) {
                $cn = implode('', array_map('ucfirst', explode('_', $name))) . 'Input';
                $path = $this->config['elementsPath'] . '/inputs/';
                if (!$this->modx->loadClass($cn, $path, true, true)) {
                    $this->modx->log(modX::LOG_LEVEL_ERROR, 'Loading failed for ' . $cn . ' in ' . $path);
                }
                else {
                    $this->inputs[$name] = new $cn($this);
                }
            }

            $erp = $this->modx->invokeEvent('ContentBlocks_RegisterInputs', array(
                'contentBlocks' => $this
            ));
            if (is_array($erp)) {
                foreach ($erp as $msg) {
                    if (is_array($msg)) {
                        foreach ($msg as $key => $input) {
                            if ($input instanceof cbBaseInput) {
                                $this->inputs[$key] = $input;

                                $topics = $input->getLexiconTopics();
                                if (!empty($topics)) {
                                    foreach ($topics as $topic) {
                                        $this->modx->lexicon->load($topic);
                                    }
                                }
                            }
                        }
                    }
                    else {
                        $this->modx->log(modX::LOG_LEVEL_ERROR,'[ContentBlocks] Expecting an array event output, got ' . gettype($msg) . ': ' . print_r($msg, true));
                    }
                }
            }
            // Prevent output from ContentBlocks_RegisterInputs plugins bubbling through to OnDocFormRender
            if ($this->modx->event) {
                $this->modx->event->_output = null;
            }
            $this->inputsLoaded = true;
        }

        return true;
    }

    public function cb()
    {
        // Only run if we're in the manager
        if (!$this->modx->context || $this->modx->context->get('key') !== 'mgr') {
            return;
        }
        // Get the public key from the .pubkey file contained in the package directory
        $pubKeyFile = $this->config['core_path'] . '.pubkey';
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
              'signature:LIKE' => 'contentblocks-%',
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
                  'package' => 'contentblocks',
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
    var warning = '<div style="width: 100%;border: 1px solid #dd0000;background-color: #F9E3E3;padding: 1em;margin-top: 1em; font-weight: bold; line-height:30px; box-sizing: border-box;">';
    warning += '<a href="$url" style="float:right; margin-left: 1em;" target="_blank" class="contentblocks-field-button big">Fix the license</a>The ContentBlocks license on this site is invalid. Please click the button on the right to correct the problem. Error: {$message}';
    warning += '</div>';
HTML;
                } elseif ($age >= 2) {
                    $warning = <<<HTML
    var warning = '<div style="width: 100%;border: 1px solid #dd0000;background-color: #F9E3E3;padding: 1em;margin-top: 1em; line-height:30px; box-sizing: border-box;">';
    warning += '<a href="$url" style="float:right; margin-left: 1em;" target="_blank" class="contentblocks-field-button big">Fix the license</a>Oops, there is an issue with the ContentBlocks license. Perhaps your site recently moved to a new domain, or the license was reset? Either way, please click the button on the right or contact your development team to correct the problem.';
    warning += '</div>';
HTML;
                }
                if ($warning) {
                    $output = <<<HTML
    <script type="text/javascript">
    {$warning}
    function showWarning() {
        setTimeout(function() {
            var cbAdded = false;
            if (typeof window.vcJquery != 'undefined') {
              if(vcJquery('#contentblocks').length) {
                cbAdded = true;
                vcJquery('#contentblocks').prepend(vcJquery(warning).css('margin-bottom', '2px'));
              }
              else if(vcJquery('#modx-contentblocks-header').length) {
                cbAdded = true;
                vcJquery('#modx-contentblocks-header').after(vcJquery(warning).css('margin-bottom', '1em'));
              }
            }
            if(!cbAdded) {
                setTimeout(showWarning, 300);
                }
        }, 300);
    }
    showWarning();
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

    /**
     * @return array
     */
    public function getAssetsForInputs() {
        $this->loadInputs();

        $inputs = array();
        foreach ($this->getFields() as $field) {
            /** @var cbField $field */
            $inputs[] = $field->get('input');
            $dependencies = $field->getDependantInputs();
            if (!empty($dependencies) && is_array($dependencies)) {
                $inputs = array_merge($inputs, $dependencies);
            }
        }
        $inputs = array_unique($inputs);
        $js = array();
        $css = array();
        $tpl = array();

        /**
         * Load minimum required stuff
         */
        if ($this->debug) {
            $js[] = $this->config['assetsUrl'] . 'js/inputs/text.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/link.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/table.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/misc.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/image.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/file.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/chunk.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/dropdown.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/snippet.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/chunk-selector.js';
            $js[] = $this->config['assetsUrl'] . 'js/inputs/layout.js';
        }
        else {
            $js[] = $this->config['assetsUrl'] . 'dist/inputs/all-min.js';
        }
        $tpl[] = $this->getCoreInputTpl('textarea');
        $tpl[] = $this->getCoreInputTpl('richtext');

        foreach ($inputs as $key) {
            if (isset($this->inputs[$key]) && ($this->inputs[$key] instanceof cbBaseInput)) {
                $tjs = $this->inputs[$key]->getJavaScripts();
                if (!empty($tjs)) $js = array_merge($js, $tjs);

                $tpls = $this->inputs[$key]->getTemplates();
                if (!empty($tpls)) $tpl = array_merge($tpl, $tpls);

                $tcss = $this->inputs[$key]->getCss();
                if (!empty($tcss)) $css = array_merge($css, $tcss);
            }
            else {
                $this->modx->log(modX::LOG_LEVEL_ERROR, '[ContentBlocks] Input type ' . $key . ' not found. ');
            }
        }

        $js = array_unique($js);
        $css = array_unique($css);
        $tpl = implode("\n", $tpl);

        return array(
            'js' => $js,
            'css' => $css,
            'tpl' => $tpl
        );
    }

    /**
     * @param $input
     * @return bool|string
     */
    public function getCoreInputTpl($input)
    {
        $file = $this->config['templatesPath'] . 'inputs/' . $input . '.tpl';
        if (file_exists($file)) {
            return $this->wrapInputTpl($input, file_get_contents($file));
        }
        return '<p>Template for input ' . $input . ' not found.</p>';
    }

    /**
     * Wrap an input type template with a list item and the proper script
     * tag for the tmpl library.
     *
     * @param $input
     * @param $content
     * @return string
     */
    public function wrapInputTpl($input, $content) {
        $label = htmlentities($this->modx->lexicon('contentblocks.add_content'), ENT_QUOTES, 'utf-8');
        $content = '<li data-field="{%=o.field%}" id="{%=o.generated_id%}" class="contentblocks-field-outer"><div class="contentblocks-field-wrap">
        ' . $content
        . '</div><div class="contentblocks-add-content-here"><a href="javascript:void(0);" class="contentblocks-add-content-here-link" aria-label="' . $label . '" title="' . $label . '">+</a></div>
        </li>';
        return $this->wrapTpl('contentblocks-field-' . $input, $content);
    }

    /**
     * Wrap the template content into a script tag for the tmpl library
     *
     * @param $id
     * @param $content
     * @return string
     */
    public function wrapTpl($id, $content) {
        return '<script type="text/x-tmpl" id="' . $id . '">
' . $content
. '</script>';
    }

    /**
     * @param string $name
     * @param string $id
     * @return bool|string
     */
    public function getCoreTpl($name, $id)
    {
        $file = $this->config['templatesPath'] . $name . '.tpl';
        if (file_exists($file)) {
            return $this->wrapTpl($id, file_get_contents($file));
        }
        return $this->wrapTpl($id, '<p>Template ' . $name . ' not found.</p>');
    }

    /**
     * Parses through availability conditions to see if a field should be available or not.
     *
     * @param $availability
     * @param modResource $resource
     * @return bool
     */
    public function isAvailable($availability, modResource $resource)
    {
        $availability = $this->modx->fromJSON($availability);

        if (empty($availability)) {
            return true;
        }

        $available = false;
        foreach ($availability as $av) {
            $av['value'] = explode(',', $av['value']);
            switch ($av['field']) {
                case 'resource':
                    if (in_array($resource->get('id'), $av['value'])) {
                        $available = true;
                    }
                    break;

                case 'parent':
                    if (in_array($resource->get('parent'), $av['value'])) {
                        $available = true;
                    }
                    break;

                case 'template':
                    if (in_array($resource->get('template'), $av['value'])) {
                        $available = true;
                    }
                    break;

                case 'ultimateparent':
                    if (in_array($this->getUltimateParent($resource->get('id'), $resource->get('context_key')), $av['value'])) {
                        $available = true;
                    }
                    break;

                case 'class_key':
                    if (in_array($resource->get('class_key'), $av['value'])) {
                        $available = true;
                    }
                    break;

                case 'context':
                    if (in_array($resource->get('context_key'), $av['value'])) {
                        $available = true;
                    }
                    break;

                case 'usergroup':
                    if ($this->modx->user->isMember($av['value'])) {
                        $available = true;
                    }
                    break;
            }
        }
        return $available;
    }

    /**
     * @return cbParser|null|object
     */
    public function loadParser()
    {
        if ($this->modx->parser && (get_class($this->modx->parser) != 'cbParser')) {
            $this->normalParser = $this->modx->parser;
        }
        $this->modx->parser = $this->modx->getService('cbparser', 'cbParser', $this->config['modelPath'].'contentblocks/');
    }

    public function restoreParser()
    {
        $this->modx->parser = $this->normalParser;
    }

    /**
     * @param $vc
     * @return array
     */
    public function summarizeContent($vc, &$linear = array(), &$counts = array())
    {
        foreach ($vc as $layout) {
            foreach ($layout['content'] as $column => $content) {
                foreach ($content as $field) {
                    $id = $field['field'];
                    $linear[] = $field;
                    $counts[$id] = (isset($counts[$id])) ? $counts[$id] + 1 : 1;

                    if(isset($field['child_layouts'])) {
                        $this->summarizeContent($field['child_layouts'], $linear, $counts);
                    }
                }
            }
        }
        return array('linear' => $linear, 'fieldcounts' => $counts, 'summaryVersion' => '1.2');
    }

    /**
     * @param bool $resource
     * @param string $content
     * @return array|mixed
     */
    public function getDefaultCanvas($resource = false, $content = '') {
        $default = $this->getDefaultTemplate($resource);
        $defaultLayout = $this->getOption('contentblocks.default_layout', null, 1);
        $defaultLayoutPart = $this->getOption('contentblocks.default_layout_part', null, 'main');
        $defaultField = $this->getOption('contentblocks.default_field', null, 0);

        if ($default['template'] === 0 ||
            !$template = $this->modx->getObject('cbTemplate', $default['template'])
        ) {
            return array(
                array(
                    'layout' => $defaultLayout,
                    'content' => array(
                        $defaultLayoutPart => array(
                            array(
                                'field' => $defaultField,
                                'value' => $content,
                                'properties' => array(),
                            )
                        )
                    )
                )
            );
        }

        // Get the template definition with layouts/fields
        $templateContent = $template->get('content');
        $templateContent = $this->modx->fromJSON($templateContent);

        // This could really do with a more cleaner implementation..
        // Loop over the template until the requested field is found, and insert existing content
        if ($default['field'] > 0) {
            foreach ($templateContent as $layoutKey => $layout) {
                if($layout['layout'] == $default['layout']) {
                    foreach ($layout['content'] as $columnKey => $fields) {
                        if (empty($default['column']) || $columnKey == $default['column']) {
                            foreach ($fields as $fldKey => $fld) {
                                if ($fld['field'] == $default['field']) {
                                    $templateContent[$layoutKey]['content'][$columnKey][$fldKey]['value'] = $content;
                                    break 3;
                                }
                            }
                        }
                    }
                }
            }
        }

        return $templateContent;
    }


    /**
     * @param bool|int|\modResource $resource
     * @return array
     */
    public function getDefaultTemplate($resource = false) {
        if (is_numeric($resource)) {
            $resource = $this->modx->getObject('modResource', $resource);
        }

        if (!$resource) {
            $resource = $this->resource;
        }

        $c = $this->modx->newQuery('cbDefault');
        $c->sortby('sortorder', 'ASC');
        $rules = $this->modx->getCollection('cbDefault', $c);

        /** @var cbDefault $rule */
        foreach ($rules as $rule) {
            if ($rule->get('constraint_field') == '' ||
                $this->doesRuleApply($resource, $rule->get('constraint_field'), $rule->get('constraint_value'))) {
                return array(
                    'template' => $rule->get('default_template'),
                    'layout' => $rule->get('target_layout'),
                    'field' => $rule->get('target_field'),
                    'column' => $rule->get('target_column')
                );
            }
        }

        return array(
            'template' => 0,
            'layout' => 0,
            'field' => 0,
            'column' => ''
        );
    }

    /**
     * @param modResource $resource
     * @param $constraintField
     * @param $constraintValue
     * @return bool
     */
    public function doesRuleApply(modResource $resource, $constraintField, $constraintValue) {
        $constraintValue = explode(',', $constraintValue);

        $value = false;

        switch (true) {
            case (array_key_exists($constraintField, $resource->_fieldMeta)):
                $value = $resource->get($constraintField);
                break;

            case $constraintField === 'context':
                $value = $resource->get('context_key');
                break;

            case $constraintField === 'ultimateparent':
                $value = $this->getUltimateParent($resource->get('id'), $resource->get('context_key'));
                if ($value < 1) {
                    $value = $this->getUltimateParent($resource->get('parent'), $resource->get('context_key'));
                }
                break;

            case $constraintField === 'usergroup':
                $groupIds = $this->modx->user->getUserGroups();
                $groupNames = $this->modx->user->getUserGroupNames();

                foreach ($constraintValue as $cv) {
                    if (is_numeric($cv) && in_array($cv, $groupIds)) {
                        return true;
                    }
                    elseif (in_array($cv, $groupNames)) {
                        return true;
                    }
                }

                break;
        }

        if (in_array($value, $constraintValue)) {
            return true;
        }
        return false;
    }

    /**
     * @param $bytes
     * @param int $decimals
     * @return string
     */
    public function formatBytes($bytes, $decimals = 2)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, $decimals) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, $decimals) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, $decimals) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}

