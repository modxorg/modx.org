<?php
/**
 * Class ListInput
 *
 * Visual list input type
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class ListInput extends cbBaseInput {
    public $defaultIcon = 'unorderedlist';
    public $defaultTpl = '<li>[[+value]] [[+items]]</li>';
    public $defaultWrapperTpl = '<ul>[[+items]]</ul>';
    public $defaultNestedTpl = '<ul class="sub">[[+items]]</ul>';
    /**
     * @return array
     */
    public function getJavaScripts() {
        if ($this->contentBlocks->debug) {
            return array(
                $this->contentBlocks->config['assetsUrl'] . 'js/inputs/list.js',
            );
        }
        return array(
            $this->contentBlocks->config['assetsUrl'] . 'dist/inputs/list-min.js',
        );
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('list');
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
                'description' => $this->modx->lexicon('contentblocks.list_wrapper_template.description')
            ),
            array(
                'key' => 'nested_template',
                'fieldLabel' => $this->modx->lexicon('contentblocks.nested_template'),
                'xtype' => 'code',
                'default' => $this->defaultNestedTpl,
                'description' => $this->modx->lexicon('contentblocks.list_nested_template.description')
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
     * Process this field based on a row and a wrapper tpl
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */
    public function process(cbField $field, array $data = array())
    {
        $settings = $data;
        unset($settings['images']);

        $itemTpl = $field->get('template');
        $wrapperTpl = $field->get('wrapper_template');

        $output = array();
        $idx = 1;
        foreach ($data['items'] as $item) {
            if (!empty($item['items'])) {
                $item['items'] = $this->processSubs($field, $item['items'], $settings);
            }
            else {
                $item['items'] = '';
            }

            if($item['value'] != '' || !empty($item['items'])) {
                $item['idx'] = $idx;
                $item = array_merge($settings, $item);
                $output[] = $this->contentBlocks->parse($itemTpl, $item);
                $idx++;
            }
        }
        $output = implode('', $output);
        $settings['items'] = $output;
        return $this->contentBlocks->parse($wrapperTpl, $settings);
    }

    /**
     * @param \cbField $field
     * @param $items
     * @param array $settings
     * @return mixed
     */
    public function processSubs(cbField $field, $items, array $settings = array()) {
        $nestedTpl = $field->get('nested_template');
        if (empty($nestedTpl)) $nestedTpl = $field->get('wrapper_template');
        $itemTpl = $field->get('template');

        $output = array();
        $idx = 0;
        foreach ($items as $item) {
            if (!empty($item['items'])) {
                $item['items'] = $this->processSubs($field, $item['items'], $settings);
            }
            else {
                $item['items'] = '';
            }

            if($item['value'] != '' || !empty($item['items'])) {
                $item['idx'] = $idx;

                $item = array_merge($settings, $item);
                $output[] = $this->contentBlocks->parse($itemTpl, $item);
                $idx++;
            }
        }
        $output = implode('', $output);
        $settings['items'] = $output;
        $settings['total'] = count($items);
        return $this->contentBlocks->parse($nestedTpl, $settings);

    }

}
