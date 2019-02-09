<?php
require_once dirname(dirname(__FILE__)) . '/export.class.php';
/**
 * Class cbTemplateExportProcessor
 */
class cbTemplateExportProcessor extends ContentBlocksExportProcessor
{
    public $classKey = 'cbTemplate';
    /**
     * Checks if the user has sufficient permissions to perform this action.
     *
     * @return bool
     */
    public function checkPermissions()
    {
        return $this->modx->context->checkPolicy('contentblocks_templates_export');
    }
}

return 'cbTemplateExportProcessor';
