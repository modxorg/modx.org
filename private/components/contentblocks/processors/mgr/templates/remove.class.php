<?php
/**
 * Removes a cbTemplate object.
 */
class cbTemplateRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'cbTemplate';
    public $objectType = 'cbTemplate';
    public $permission = 'contentblocks_templates_delete';
}
return 'cbTemplateRemoveProcessor';
