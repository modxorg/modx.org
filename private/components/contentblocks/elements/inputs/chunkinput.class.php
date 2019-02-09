<?php
/**
 * Class ChunkInput
 *
 * Inserts a predefined Chunk
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class ChunkInput extends cbBaseInput {
    public $defaultIcon = 'chunk_B';
    public $defaultTpl = '[[+value]]';

    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'chunk',
                'fieldLabel' => $this->modx->lexicon('contentblocks.chunk.choose_chunk'),
                'xtype' => 'contentblocks-combo-chunks',
                'default' => '',
                'description' => $this->modx->lexicon('contentblocks.chunk.choose_chunk.description')
            ),
            array(
                'key' => 'custom_preview',
                'fieldLabel' => $this->modx->lexicon('contentblocks.chunk.custom_preview'),
                'xtype' => 'code',
                'default' => '',
                'description' => $this->modx->lexicon('contentblocks.chunk.custom_preview.description')
            ),
        );
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('chunk');
        $tpls[] = $this->contentBlocks->getCoreTpl('inputs/partials/chunk_property', 'contentblocks-field-chunk-property');
        return $tpls;
    }

    /**
     * Generate the snippet call
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */
    public function process(cbField $field, array $data = array())
    {
        $chunkId = $field->get('chunk');
        $chunk = $this->modx->getObject('modChunk', $chunkId);

        $name = $chunkId;
        if($chunk instanceof modChunk) {
            $name = $chunk->get('name');
            $tag = '[[$';
            $tag .= $name;
            $properties = array();

            if (isset($data['chunk_properties']) && is_array($data['chunk_properties'])) {
                foreach ($data['chunk_properties'] as $key => $val) {
                    $properties[] = "&$key=`$val`";
                }
            }
            
            foreach($data as $key => $val) {
                if (!is_array($val)
                    && (!isset($data['chunk_properties']) || !in_array($key, $data['chunk_properties']))
                    && $key !== 'idx'
                    && $key !== 'field') {
                    $properties[] = "&$key=`$val`";
                }
            }
            
            if(!empty($properties)) {
                $tag .= "? \n\t";
                $properties = implode("\n\t", $properties);
                $tag .= $properties;                
            }
            $tag .= "\n\t]]\n";
        }
        else {
            $tag = 'Chunk ' . $chunkId . ' not found :(';
        }
        
        $data['tag'] = $data['value'] = $tag;
        $data['chunk_name'] = $name;

        $tpl = $field->get('template');
        if (empty($tpl)) $tpl = '[[+tag]]';
        return $this->contentBlocks->parse($tpl, $data);
    }
}
