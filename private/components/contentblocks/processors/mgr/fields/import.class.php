<?php
require_once dirname(dirname(__FILE__)) . '/import.class.php';
/**
 * Class cbFieldImportProcessor
 */
class cbFieldImportProcessor extends ContentBlocksImportProcessor
{
    public $classKey = 'cbField';

    /**
     * Checks if the user has sufficient permissions to perform this action.
     * 
     * @return bool
     */
    public function checkPermissions()
    {
        return $this->modx->context->checkPolicy('contentblocks_fields_import');
    }

    /**
     * Removes existing records in "replace" mode, limited to the current parentc
     */
    public function removeCollection()
    {
        $c = array();
        $parent = (int)$this->getProperty('parent', 0);
        if ($parent > 0) {
            $c['parent'] = $parent;
        }

        $this->modx->removeCollection($this->classKey, $c);
    }

    public function backup()
    {
        $this->modx->runProcessor('mgr/fields/export', array(
            'save' => true,
        ), array(
            'processors_path' => $this->contentBlocks->config['processors_path']
        ));
    }
}

return 'cbFieldImportProcessor';
