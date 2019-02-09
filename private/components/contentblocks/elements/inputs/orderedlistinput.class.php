<?php
require_once(dirname(__FILE__).'/listinput.class.php');
/**
 * Class OrderedListInput
 *
 * Visual list input type
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class OrderedListInput extends ListInput {
    public $defaultIcon = 'ordered_list';
    public $defaultWrapperTpl = '<ol>[[+items]]</ol>';
    public $defaultNestedTpl = '<ol class="sub">[[+items]]</ol>';

    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('ordered_list');
        $tpls[] = $this->contentBlocks->getCoreTpl('inputs/partials/list_item', 'contentblocks-field-list-item');
        return $tpls;
    }

    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'wrapper_template',
                'fieldLabel' => $this->modx->lexicon('contentblocks.wrapper_template'),
                'xtype' => 'code',
                'default' => $this->defaultWrapperTpl,
                'description' => $this->modx->lexicon('contentblocks.ordered_list_wrapper_template.description')
            ),
            array(
                'key' => 'nested_template',
                'fieldLabel' => $this->modx->lexicon('contentblocks.nested_template'),
                'xtype' => 'code',
                'default' => $this->defaultNestedTpl,
                'description' => $this->modx->lexicon('contentblocks.ordered_list_nested_template.description')
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
}
