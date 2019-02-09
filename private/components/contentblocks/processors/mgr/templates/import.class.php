<?php
require_once dirname(dirname(__FILE__)) . '/import.class.php';
/**
 * Class cbTemplateImportProcessor
 */
class cbTemplateImportProcessor extends ContentBlocksImportProcessor
{
    public $classKey = 'cbTemplate';
    /**
     * Checks if the user has sufficient permissions to perform this action.
     *
     * @return bool
     */
    public function checkPermissions()
    {
        return $this->modx->context->checkPolicy('contentblocks_templates_import');
    }

    public function backup()
    {
        $this->modx->runProcessor('mgr/templates/export', array(
            'save' => true,
        ), array(
            'processors_path' => $this->contentBlocks->config['processors_path']
        ));
    }
}

return 'cbTemplateImportProcessor';
