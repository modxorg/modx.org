<?php
/**
 * Class LayoutInput
 * 
 * Holy crap! Nested fields?!?
 */
class LayoutInput extends cbBaseInput {
    public $defaultIcon = 'chunk_A';
    
    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'available_layouts',
                'fieldLabel' => $this->modx->lexicon('contentblocks.layoutfield.available_layouts'),
                'xtype' => 'textfield',
                'description' => $this->modx->lexicon('contentblocks.layoutfield.available_layouts.description')
            ),
            array(
                'key' => 'available_templates',
                'fieldLabel' => $this->modx->lexicon('contentblocks.layoutfield.available_templates'),
                'xtype' => 'textfield',
                'description' => $this->modx->lexicon('contentblocks.layoutfield.available_templates.description')
            ),
        );
    }

    /**
     * Load the template for the input
     *
     * @return array
     */
    public function getTemplates()
    {    
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('layout');
        return $tpls;
    }
    
    /**
     * Generate the HTML for the layout
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */
    public function process(cbField $field, array $data = array())
    {
        $content = $this->contentBlocks->generateHtml($data['child_layouts'], array('parent_field_id' => $field->get('id')));
        $data['value'] = $content;
        $tpl = $field->get('template');
        if (empty($tpl)) $tpl = '[[+value]]';
        return $this->contentBlocks->parse($tpl, $data);
    }    
}
