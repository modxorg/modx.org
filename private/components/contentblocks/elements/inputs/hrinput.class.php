<?php
/**
 * Class HrInput
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class HrInput extends cbBaseInput {
    public $defaultIcon = 'horizontalrule';
    public $defaultTpl = '<hr>';
    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('hr');
        return $tpls;
    }

}
