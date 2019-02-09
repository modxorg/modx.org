<?php
/**
 * Class CodeInput
 *
 * Allows selecting a snippet and saving properties with it.
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class SnippetInput extends cbBaseInput {
    public $defaultIcon = 'snippet_A';
    public $defaultTpl = '[[+value]]';

    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'available_snippets',
                'fieldLabel' => $this->modx->lexicon('contentblocks.snippet.available_snippets'),
                'xtype' => 'textfield',
                'default' => '',
                'description' => $this->modx->lexicon('contentblocks.snippet.available_snippets.description')
            ),
            array(
                'key' => 'categories',
                'fieldLabel' => $this->modx->lexicon('contentblocks.snippet.categories'),
                'xtype' => 'textfield',
                'default' => '',
                'description' => $this->modx->lexicon('contentblocks.snippet.categories.description')
            ),
            array(
                'key' => 'allow_uncached',
                'fieldLabel' => $this->modx->lexicon('contentblocks.snippet.allow_uncached'),
                'xtype' => 'contentblocks-combo-boolean',
                'default' => '1',
                'description' => $this->modx->lexicon('contentblocks.snippet.allow_uncached.description')
            )
        );
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('snippet');
        $tpls[] = $this->contentBlocks->getCoreTpl('inputs/partials/snippet_property', 'contentblocks-field-snippet-property');
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
        $name = isset($data['snippet']) ? $data['snippet'] : '';
        $tag = '[[';
        $other = '';
        $properties = array();
        
        if (isset($data['uncached']) && intval($data['uncached'])) {
            $tag .= '!';
        }

        $tag .= $name;

        if(isset($data['snippet_properties']) && is_array($data['snippet_properties'])) {
            foreach ($data['snippet_properties'] as $key => $val) {
                if ($key == '__other__') {
                    $other = $val;
                    continue;
                }
                $properties[] = "&$key=`$val`";
            }
        }
        
        $strip_properties = array('idx', 'field', 'snippet', 'snippet_properties', 'uncached');
            
        foreach($data as $key => $val) {
            if(!is_array($val) && $val != '' && (isset($data['snippet_properties']) && !in_array($val, $data['snippet_properties'])) && !in_array($key, $strip_properties)) {
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
        
        $data['tag'] = $data['value'] = $tag;
        $data['snippet_name'] = $name;

        $tpl = $field->get('template');
        if (empty($tpl)) $tpl = '[[+tag]]';
        return $this->contentBlocks->parse($tpl, $data);
    }
}
