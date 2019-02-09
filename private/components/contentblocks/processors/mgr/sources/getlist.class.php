<?php
/**
 * Gets a list of sources.modMediaSource objects.
 */
class ContentBlocksMediaSourceGetListProcessor extends modProcessor {
    public function process()
    {
        $this->setProperty('showNone', 1);
        $response = $this->modx->runProcessor('source/getlist', $this->getProperties());

        return $response->getResponse();
    }
}
return 'ContentBlocksMediaSourceGetListProcessor';
