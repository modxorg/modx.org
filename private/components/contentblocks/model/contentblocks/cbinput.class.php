<?php

/**
 * Interface bcInput
 */
interface cbInput {
    /**
     * @return array
     */
    public function getLexiconTopics();
    /**
     * @return array
     */
    public function getTemplates();
    /**
     * @return array
     */
    public function getJavaScripts();
    /**
     * @return array
     */
    public function getCss();

    /**
     * @return array
     */
    public function getFieldProperties();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * Process this input.
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */
    public function process(cbField $field, array $data = array());
}

/**
 * Class cbBaseInput
 */
class cbBaseInput implements cbInput {
    /** @var modX $modx */
    public $modx;
    /** @var ContentBlocks $contentBlocks */
    public $contentBlocks;
    /** @var array $options */
    public $settings = array();

    public $defaultIcon = 'paragraph';
    public $defaultTpl = '[[+value]]';

    /**
     * @param ContentBlocks $contentBlocks
     * @param array $options
     */
    public function __construct(ContentBlocks $contentBlocks, array $options = array())
    {
        $this->modx =& $contentBlocks->modx;
        $this->contentBlocks =& $contentBlocks;
    }

    /**
     * Gets the field name based on the class name.
     *
     * @return string
     */
    public function getFieldName () {
        $class = get_class($this);
        $name = strtolower(substr($class, 0, strpos($class, 'Input')));
        return $name;
    }

    /**
     * Gets the displayed name for the Input for showing in the Input Type dropdown and other places.
     *
     * @return string
     */
    public function getName() {
        return $this->modx->lexicon('contentblocks.' . $this->getFieldName());
    }

    /**
     * Gets the description for the Input, which is shown in the Input Type dropdown.
     *
     * @return string
     */
    public function getDescription() {
        return $this->modx->lexicon('contentblocks.' . $this->getFieldName() . '.description');
    }


    /**
     * Returns an array with lexicon topics to load when this input type is used.
     *
     * @return array
     */
    public function getLexiconTopics() {
        return array();
    }

    /**
     * Return an array of html templates to insert into the page.
     *
     * @return array
     */
    public function getTemplates()
    {
        return array();
    }

    /**
     * Returns an array of javascript files to load.
     *
     * @return array
     */
    public function getJavaScripts()
    {
        return array();
    }

    /**
     * Return an array of field properties. Properties are used in the component for defining
     * additional templates or other settings the site admin can define for the field.
     *
     * @return array
     */
    public function getFieldProperties()
    {
        return array();
    }

    /**
     * Similar to {@see self::getFieldProperties}, except this is used when creating subfields to modify the edit panel.
     *
     * @return array
     */
    public function getParentProperties()
    {
        return array();
    }

    /**
     * Get an array of CSS files to load for this input.
     *
     * @return array
     */
    public function getCss()
    {
        return array();
    }


    /**
     * Process this field based on its template and the received data.
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */
    public function process(cbField $field, array $data = array())
    {
        $tpl = $field->get('template');
        return $this->contentBlocks->parse($tpl, $data);
    }

    /**
     * @param $key
     * @param null $default
     * @param bool $allowEmpty
     * @return mixed
     */
    public function getSetting($key, $default = null, $allowEmpty = true)
    {
        if (isset($this->settings[$key])) {
            if (!empty($this->settings[$key])) return $this->settings[$key];
            if ($allowEmpty) return $this->settings[$key];
        }
        return $default;
    }

    /**
     * Return an array of input keys that need to be loaded whenever
     * this input is being used.
     *
     * Contains a reference to the field it is being used on in case
     * it depends on configuration.
     *
     * @param cbField $field
     * @return array
     */
    public function getDependantInputs(cbField $field) {
        return array();
    }
}
