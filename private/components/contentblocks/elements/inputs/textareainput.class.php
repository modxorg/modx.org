<?php
/**
 * Class TextareaInput
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class TextareaInput extends cbBaseInput {
    public $defaultIcon = 'paragraph';
    public $defaultTpl = '<p>[[+value]]</p>';

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
        $tpls[] = $this->contentBlocks->getCoreInputTpl('textarea');
        return $tpls;
    }

}
