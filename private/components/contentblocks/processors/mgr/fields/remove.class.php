<?php
/**
 * Removes a cbField object.
 */
class cbFieldRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'cbField';
    public $objectType = 'cbField';
    public $permission = 'contentblocks_fields_delete';

    public function beforeRemove()
    {
        if ($this->modx->getOption('contentblocks.default_field') == $this->object->get('id')) {
            return $this->modx->lexicon('contentblocks.delete_field.is_default');
        }
        return parent::beforeRemove();
    }
}
return 'cbFieldRemoveProcessor';
