<?php
require_once dirname(dirname(__FILE__)) . '/import.class.php';
/**
 * Class cbCategoryImportProcessor
 */
class cbCategoryImportProcessor extends ContentBlocksImportProcessor
{
    public $classKey = 'cbCategory';
    /**
     * Checks if the user has sufficient permissions to perform this action.
     *
     * @return bool
     */
    public function checkPermissions()
    {
        return $this->modx->context->checkPolicy('contentblocks_categories_import');
    }

    public function backup()
    {
        $this->modx->runProcessor('mgr/categories/export', array(
            'save' => true,
        ), array(
            'processors_path' => $this->contentBlocks->config['processors_path']
        ));
    }
}

return 'cbCategoryImportProcessor';
