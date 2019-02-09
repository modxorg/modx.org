<?php
require_once dirname(dirname(__FILE__)) . '/import.class.php';
/**
 * Class cbLayoutImportProcessor
 */
class cbLayoutImportProcessor extends ContentBlocksImportProcessor
{
    public $classKey = 'cbLayout';
    /**
     * Checks if the user has sufficient permissions to perform this action.
     *
     * @return bool
     */
    public function checkPermissions()
    {
        return $this->modx->context->checkPolicy('contentblocks_layouts_import');
    }

    public function backup()
    {
        $this->modx->runProcessor('mgr/layouts/export', array(
            'save' => true,
        ), array(
            'processors_path' => $this->contentBlocks->config['processors_path']
        ));
    }
}

return 'cbLayoutImportProcessor';
