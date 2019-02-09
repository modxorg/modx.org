<?php
/**
 * Removes a cbCategory object.
 */
class cbCategoryRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'cbCategory';
    public $objectType = 'cbCategory';
    public $permission = 'contentblocks_categories_delete';
}
return 'cbCategoryRemoveProcessor';
