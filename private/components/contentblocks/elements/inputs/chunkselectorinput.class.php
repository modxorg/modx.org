<?php
/**
 * Class fileInput
 * 
 * sweet! now you can upload files!.
 */
class ChunkSelectorInput extends cbBaseInput {
    public $defaultIcon = 'chunk_B';
    
    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'available_chunks',
                'fieldLabel' => $this->modx->lexicon('contentblocks.chunkselector.available_chunks'),
                'xtype' => 'textfield',
                'description' => $this->modx->lexicon('contentblocks.chunkselector.available_chunks.description')
            ),            
            array(
                'key' => 'available_categories',
                'fieldLabel' => $this->modx->lexicon('contentblocks.chunkselector.available_categories'),
                'xtype' => 'textfield',
                'description' => $this->modx->lexicon('contentblocks.chunkselector.available_categories.description')
            ),
        );
    }

    /**
     * Load the template for the input, and also set a JS variable so the JS can find the connector.
     *
     * @return array
     */
    public function getTemplates()
    {    
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('chunk_selector');
        $tpls[] = $this->contentBlocks->getCoreTpl('inputs/partials/chunk_property', 'contentblocks-field-chunk_selector-property');
        return $tpls;
    }
    /**
     * Process this field based on a row and a wrapper tpl
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */
    public function process(cbField $field, array $data = array())
    {
        $name = $data['chunk_selector'];
        $tag = '[[$';
        $tag .= $name;
        $other = '';
        $properties = array();
        
        if(isset($data['chunk_selector_properties']) && is_array($data['chunk_selector_properties'])) {
            foreach ($data['chunk_selector_properties'] as $key => $val) {
                if ($key == '__other__') {
                    $other = $val;
                    continue;
                }
                $properties[] = "&$key=`$val`";
            }
        }
            
        foreach($data as $key => $val) {
            if(!is_array($val) && $val != '' && !in_array($val, $data['chunk_selector_properties']) && $key != 'idx' && $key != 'field') {
                $properties[] = "&$key=`$val`";
            }
        }
                
        if(!empty($properties) || $other != '') {
            $tag .= "? \n\t";
            $properties = implode("\n\t", $properties);
            $tag .= $properties;                
        }
        
        $tag .= "\n\t" . $other;

        $tag .= "\n\t]]\n";
        $data['value'] = $tag;
        $data['chunk_name'] = $name;

        $tpl = $field->get('template');
        if (empty($tpl)) $tpl = '[[+value]]';
        return $this->contentBlocks->parse($tpl, $data);
    }
}
