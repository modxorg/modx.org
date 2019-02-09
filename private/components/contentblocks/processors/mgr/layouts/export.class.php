<?php
require_once dirname(dirname(__FILE__)) . '/export.class.php';
/**
 * Class cbLayoutExportProcessor
 */
class cbLayoutExportProcessor extends ContentBlocksExportProcessor
{
    public $classKey = 'cbLayout';
    /**
     * Checks if the user has sufficient permissions to perform this action.
     *
     * @return bool
     */
    public function checkPermissions()
    {
        return $this->modx->context->checkPolicy('contentblocks_layouts_export');
    }
}

return 'cbLayoutExportProcessor';
