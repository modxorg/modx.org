<?php
/**
 * Updates a cbDefault object
 */
class cbDefaultUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'cbDefault';
    public $languageTopics = array('contentblocks:default');
    public $permission = array('contentblocks_defaults_edit' => true, 'contentblocks_defaults_save' => true);
}
return 'cbDefaultUpdateProcessor';
