<?php
/**
 * Removes a cbLayout object.
 */
class cbLayoutRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'cbLayout';
    public $objectType = 'cbLayout';
    public $permission = 'contentblocks_layouts_delete';

    public function beforeRemove()
    {
        if ($this->modx->getOption('contentblocks.default_layout') == $this->object->get('id')) {
            return $this->modx->lexicon('contentblocks.delete_layout.is_default');
        }
        return parent::beforeRemove();
    }
}
return 'cbLayoutRemoveProcessor';
