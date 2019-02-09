<?php
require_once dirname(dirname(__FILE__)) . '/export.class.php';
/**
 * Class cbFieldExportProcessor
 */
class cbFieldExportProcessor extends ContentBlocksExportProcessor
{
    public $classKey = 'cbField';
    /**
     * Checks if the user has sufficient permissions to perform this action.
     *
     * @return bool
     */
    public function checkPermissions()
    {
        return $this->modx->context->checkPolicy('contentblocks_fields_export');
    }

}

return 'cbFieldExportProcessor';
