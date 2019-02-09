<?php

/**
 * Class ContentBlocksGetVariablesProcessor
 */
class ContentBlocksGetVariablesProcessor extends modProcessor {
    /**
     * Get fields and layouts for use in the manager
     *
     * @return array|string
     */
    public function process()
    {
        $fieldsAndLayouts = $this->modx->contentblocks->getObjectsForCanvas(null);
        // this works, but maybe there's a better way
        $fieldsAndLayoutsObj = json_decode(json_encode($fieldsAndLayouts), FALSE);
        return $this->success('', $fieldsAndLayoutsObj);
    }
}

return 'ContentBlocksGetVariablesProcessor';
