<?php
/**
 * Updates a cbField object
 */
class cbFieldUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'cbField';
    public $languageTopics = array('contentblocks:default');
    public $permission = array('contentblocks_fields_edit' => true, 'contentblocks_fields_save' => true);

    /**
     * @return bool
     */
    public function beforeSet() {
        $prop = $this->getProperty('properties');
        if (!empty($prop)) {
            $prop = $this->modx->toJSON($prop);
            $this->setProperty('properties', $prop);
        }
        else {
            $this->setProperty('properties', $this->object->get('properties'));
        }

        $parentProps = $this->getProperty('parent_properties');
        if (!empty($parentProps)) {
            $parentProps = $this->modx->toJSON($parentProps);
            $this->setProperty('parent_properties', $parentProps);
        }
        else {
            $this->setProperty('parent_properties', $this->object->get('parent_properties'));
        }
        return parent::beforeSet();
    }
}
return 'cbFieldUpdateProcessor';
