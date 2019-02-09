<?php
/**
 * Class LinkInput
 *
 * @author Isaac Niebeling
 * @package contentblocks
 */
class LinkInput extends cbBaseInput {
    public $defaultIcon = 'link';
    public $defaultTpl = '<a href="[[+link]]" data-type="[[+linkType]]">[[+link]]</a>';
    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('link');
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
        $data['link_raw'] = $data['link'];

        if($data['link'] != '') {
            if($data['linkType'] == 'email') {
                $data['link'] = 'mailto:' . $data['link'];
            }
            if($data['linkType'] == 'resource') {
                $data['link'] = '[[~' . $data['link'] . ']]';
            }
        }
        
        $tpl = $field->get('template');
        return $this->contentBlocks->parse($tpl, $data);
    }

    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'link_detection_pattern_override',
                'fieldLabel' => $this->modx->lexicon('contentblocks.link.link_detection_pattern_override'),
                'xtype' => 'textfield',
                'default' => '',
                'description' => $this->modx->lexicon('contentblocks.link.link_detection_pattern_override.description')
            ),
            array(
              'key' => 'limit_to_current_context',
              'fieldLabel' => $this->modx->lexicon('contentblocks.link.limit_to_current_context'),
              'xtype' => 'contentblocks-combo-boolean',
              'default' => '1',
              'description' => $this->modx->lexicon('contentblocks.link.limit_to_current_context.description')
            ),
        );
    }

}
