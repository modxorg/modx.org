<?php
/**
 * Removes a cbDefault object.
 */
class cbDefaultRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'cbDefault';
    public $objectType = 'cbDefault';
    public $permission = 'contentblocks_defaults_delete';
}
return 'cbDefaultRemoveProcessor';
