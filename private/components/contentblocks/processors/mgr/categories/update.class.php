<?php
/**
 * Updates a cbCategory object
 */
class cbCategoryUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'cbCategory';
    public $languageTopics = array('contentblocks:default');
    public $permission = array('contentblocks_categories_edit' => true, 'contentblocks_categories_save' => true);
}
return 'cbCategoryUpdateProcessor';
