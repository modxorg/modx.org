<?php
/**
 * Creates a cbTemplate object.
 */
class cbTemplateCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'cbTemplate';
    public $languageTopics = array('contentblocks:default');
    public $permission = array('contentblocks_templates_new' => true, 'contentblocks_templates_save' => true);

    public function beforeSet() {
        return parent::beforeSet();
    }
}
return 'cbTemplateCreateProcessor';
