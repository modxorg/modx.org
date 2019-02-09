<?php
/**
 * Class QuoteInput
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class QuoteInput extends cbBaseInput {
    public $defaultIcon = 'quote';
    public $defaultTpl = '<blockquote>[[+value]]
    <cite>[[+cite]]</cite>
</blockquote>';


    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'use_tinyrte',
                'fieldLabel' => $this->modx->lexicon('contentblocks.use_tinyrte'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => false,
                'description' => $this->modx->lexicon('contentblocks.use_tinyrte.description')
            ),
        );
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('quote');
        return $tpls;
    }

}
