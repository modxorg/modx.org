<?php
/**
 * Creates a cbField object.
 */
class cbFieldCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'cbField';
    public $languageTopics = array('contentblocks:default');
    public $permission = array('contentblocks_fields_new' => true, 'contentblocks_fields_save' => true);

    /**
     * @return bool
     */
    public function beforeSet() {
        $prop = $this->getProperty('properties');
        if (empty($prop)) {
            $this->modx->contentblocks->loadInputs();
            if (isset($this->modx->contentblocks->inputs[$this->getProperty('input')])) {
                /** @var cbBaseInput $input */
                $input = $this->modx->contentblocks->inputs[$this->getProperty('input')];
                $fieldProps = $input->getFieldProperties();

                $prop = array();
                foreach ($fieldProps as $oneProp) {
                    $prop[$oneProp['key']] = $oneProp['default'];
                }
            }
        }
        $prop = $this->modx->toJSON($prop);
        $this->setProperty('properties', $prop);

        $parentProps = $this->getProperty('parent_properties');
        if (!empty($parentProps)) {
            $parentProps = $this->modx->toJSON($parentProps);
            $this->setProperty('parent_properties', $parentProps);
        }

        $av = $this->getProperty('availability');
        $av = $this->modx->toJSON($av);
        $this->setProperty('availability', $av);

        $sort = (int)$this->getProperty('sortorder', 0);
        if ($sort < 1) {
            $sort = $this->modx->getCount($this->classKey) + 1;
            $this->setProperty('sortorder', $sort);
        }
        return parent::beforeSet();
    }
}
return 'cbFieldCreateProcessor';
