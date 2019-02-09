<?php
require_once dirname(dirname(__FILE__)) . '/export.class.php';
/**
 * Class cbCategoryExportProcessor
 */
class cbCategoryExportProcessor extends ContentBlocksExportProcessor
{
    public $classKey = 'cbCategory';
    /**
     * Checks if the user has sufficient permissions to perform this action.
     *
     * @return bool
     */
    public function checkPermissions()
    {
        return $this->modx->context->checkPolicy('contentblocks_categories_export');
    }
}

return 'cbCategoryExportProcessor';
