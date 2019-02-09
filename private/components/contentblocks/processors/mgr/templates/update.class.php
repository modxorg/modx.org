<?php
/**
 * Updates a cbTemplate object
 */
class cbTemplateUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'cbTemplate';
    public $languageTopics = array('contentblocks:default');
    public $permission = array('contentblocks_templates_edit' => true, 'contentblocks_templates_save' => true);

    /**
     * @return bool
     */
    public function beforeSet() {
        return parent::beforeSet();
    }
}
return 'cbTemplateUpdateProcessor';
