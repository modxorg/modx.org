<?php
/**
 * Class RichtextInput
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class RichtextInput extends cbBaseInput {
    public $defaultIcon = 'richtext';
    public $defaultTpl = '[[+value]]';
    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('richtext');
        return $tpls;
    }

}
