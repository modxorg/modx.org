<?php
/**
 * Class HeadingInput
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class HeadingInput extends cbBaseInput {
    public $defaultIcon = 'heading';
    public $defaultTpl = '<[[+level]]>[[+value]]</[[+level]]>';

    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'default_level',
                'fieldLabel' => $this->modx->lexicon('contentblocks.default_level'),
                'xtype' => 'textfield',
                'default' => 'h2',
                'description' => $this->modx->lexicon('contentblocks.heading_default_level.description')
            ),
            array(
                'key' => 'available_levels',
                'fieldLabel' => $this->modx->lexicon('contentblocks.available_levels'),
                'xtype' => 'textfield',
                'default' => 'h1=heading_1,h2=heading_2,h3=heading_3,h4=heading_4,h5=heading_5',
                'description' => $this->modx->lexicon('contentblocks.heading_available_levels.description')
            ),
            array(
                'key' => 'use_tinyrte',
                'fieldLabel' => $this->modx->lexicon('contentblocks.use_tinyrte'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
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
        $tpls[] = $this->contentBlocks->getCoreInputTpl('heading');
        return $tpls;
    }

}
