<?php
/**
 * Updates a cbLayout object
 */
class cbLayoutUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'cbLayout';
    public $languageTopics = array('contentblocks:default');
    public $permission = array('contentblocks_layouts_edit' => true, 'contentblocks_layouts_save' => true);

    /**
     * @return bool
     */
    public function beforeSet() {
        $this->setCheckbox('layout_only_nested', true);
        return parent::beforeSet();
    }
}
return 'cbLayoutUpdateProcessor';
