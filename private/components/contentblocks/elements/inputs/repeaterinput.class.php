<?php
/**
 * Class RepeaterInput
 * 
 * Repeats groups of fields in different rows. Nifty stuff.
 */
class RepeaterInput extends cbBaseInput {
    public $defaultIcon = 'chunk_A';
    public $defaultTpl = ' ';
    public $defaultWrapperTpl = '[[+rows]]';
    
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
                'description' => $this->modx->lexicon('contentblocks.repeater.wrapper_template.description')
            ),
            array(
                'key' => 'group',
                'fieldLabel' => $this->modx->lexicon('contentblocks.repeater.group'),
                'xtype' => 'fieldgroup', // special type which creates a grid of fields under the current field
                'description' => $this->modx->lexicon('contentblocks.repeater.group.description')
            ),
            array(
                'key' => 'row_separator',
                'fieldLabel' => $this->modx->lexicon('contentblocks.repeater.row_separator'),
                'xtype' => 'textfield',
                'description' => $this->modx->lexicon('contentblocks.repeater.row_separator.description'),
                'default' => "\n\n"
            ),
            array(
                'key' => 'max_items',
                'fieldLabel' => $this->modx->lexicon('contentblocks.repeater.max_items'),
                'xtype' => 'numberfield',
                'description' => $this->modx->lexicon('contentblocks.repeater.max_items.description'),
                'default' => 0,
                'minValue' => 0
            ),
            array(
              'key' => 'min_items',
              'fieldLabel' => $this->modx->lexicon('contentblocks.repeater.min_items'),
              'xtype' => 'numberfield',
              'description' => $this->modx->lexicon('contentblocks.repeater.min_items.description'),
              'default' => 0,
              'minValue' => 0
            ),
            array(
              'key' => 'add_first_item',
              'fieldLabel' => $this->modx->lexicon('contentblocks.repeater.add_first_item'),
              'xtype' => 'contentblocks-combo-boolean',
              'description' => $this->modx->lexicon('contentblocks.repeater.add_first_item.description'),
              'default' => true,
            ),
            array(
                'key' => 'manager_columns',
                'fieldLabel' => $this->modx->lexicon('contentblocks.repeater.manager_columns'),
                'xtype' => 'numberfield',
                'minValue' => 1,
                'maxValue' => 4,
                'allowBlank' => false,
                'description' => $this->modx->lexicon('contentblocks.repeater.manager_columns.description'),
                'default' => 1,
            ),
            array(
                'key' => 'layout_style',
                'fieldLabel' => $this->modx->lexicon('contentblocks.repeater.layout_style'),
                'xtype' => 'contentblocks-combo-repeater-layout-style',
                'description' => $this->modx->lexicon('contentblocks.repeater.layout_style.description'),
                'default' => 'default'
            )
        );
    }

    /**
     * Similar to {@see self::getFieldProperties}, except this is used when creating subfields to modify the edit panel.
     *
     * @return array
     */
    public function getParentProperties()
    {
        return array(
            array(
                'key' => 'key',
                'fieldLabel' => $this->modx->lexicon('contentblocks.repeater.key'),
                'xtype' => 'textfield',
                'default' => '',
                'description' => $this->modx->lexicon('contentblocks.repeater.key.description'),
                'allowBlank' => false
            ),
            array(
                'key' => 'width',
                'fieldLabel' => $this->modx->lexicon('contentblocks.width'),
                'xtype' => 'numberfield',
                'description' => $this->modx->lexicon('contentblocks.width.description'),
                'allowBlank' => false
            ),
        );
    }

    /**
     * Returns an array of javascript files to load.
     *
     * @return array
     */
    public function getJavaScripts()
    {
        if ($this->contentBlocks->debug) {
            return array(
                $this->contentBlocks->config['assetsUrl'] . 'js/inputs/repeater.js',
            );
        }
        return array(
            $this->contentBlocks->config['assetsUrl'] . 'dist/inputs/repeater-min.js',
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
        $tpls[] = $this->contentBlocks->getCoreInputTpl('repeater');
        $tpls[] = $this->contentBlocks->getCoreTpl('inputs/partials/repeater_item', 'contentblocks-repeater-item');
        return $tpls;
    }
    
    /**
     * Generate the HTML for the repeater
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */
    public function process(cbField $field, array $data = array())
    {
        // Ensure inputs are loaded
        //$this->contentBlocks->loadInputs();

        // Grab the group fields and template
        $group = $this->getGroup($field);
        $tpl = $field->get('template');

        // Array to store the output in
        $rowsOutput = array();

        $data['total'] = count($data['rows']);

        // Loop over each row
        $idx = 0;
        foreach ($data['rows'] as $row) {
            $idx++;
            $data['idx'] = $idx;
            $rowsOutput[] = $this->processRow($row, $group, $data, $tpl);
        }

        // Glue individual rows together
        $separator = $field->get('row_separator');
        if (empty($separator)) $separator = "\n\n";
        $rowsOutput = implode($separator, $rowsOutput);

        // Throw it in a wrapper template with [[+rows]]
        $wrapperTpl = $field->get('wrapper_template');
        if (empty($wrapperTpl)) $wrapperTpl = '[[+rows]]';
        $data['rows'] = $rowsOutput;

        // Return the final output. Whew.
        return $this->contentBlocks->parse($wrapperTpl, $data);
    }

    /**
     * Processes a single row of the repeater
     *
     * @param array $row
     * @param cbField[] $group
     * @param array $data
     * @param string $tpl
     * @return mixed
     */
    public function processRow($row, $group, $data, $tpl = '') {
        // For each row, we store placeholders in the $rowFields array
        $rowFields = array();
        // Loop over each key in the row and its value (array)
        foreach ($row as $key => $value) {
            $field = array_key_exists($key, $group) ? $group[$key] : false;
            if ($field instanceof cbField) {
                $inputType = $field->get('input');

                // If it's a known input, we try to parse it
                if (isset($this->contentBlocks->inputs[$inputType])) {
                    /** @var cbBaseInput $input */
                    $input = $this->contentBlocks->inputs[$inputType];

                    // Attempt to parse the data through that input type
                    try {
                        $parseData = array_merge($data, $field->toArray(), $value);
                        $value = $input->process($field, $parseData);
                    } catch (Exception $e) {
                        $value = 'Error parsing ' . $inputType . ': ' . $e->getMessage();
                    }
                } else {
                    $value = 'Input ' . htmlentities($inputType, ENT_QUOTES, 'UTF-8') . ' not found.';
                }
            }
            else {
                $value = 'Could not find subfield with key "' . $key . '" in the group"';
            }

            // Set the value as placeholder in $rowFields
            $rowFields[$key] = $value;
        }

        // Grab the $data and the $rowFields together so we have settings and everything
        $phs = array_merge($data, $rowFields);

        // Parse this row of fields
        return $this->contentBlocks->parse($tpl, $phs);
    }

    /**
     * Gets the repeater sub fields as key => cbField array
     *
     * @param cbField $field
     * @return cbField[]
     */
    public function getGroup(cbField $field)
    {
        $group = array();
        $fields = $field->getSubfields();
        foreach ($fields as $fld) {
            $key = $fld->getParentProperty('key');
            if (!empty($key)) {
                $group[$key] = $fld;
            }
        }
        return $group;
    }

    /**
     * Return an array of input keys that need to be loaded whenever
     * this input is being used.
     *
     * Contains a reference to the field it is being used on in case
     * it depends on configuration.
     *
     * @param cbField $field
     * @return array
     */
    public function getDependantInputs(cbField $field) {
        $group = $this->getGroup($field);

        $dependencies = array();
        foreach ($group as $subField) {
            $dependencies[] = $subField->get('input');

            if ($subField->get('input') === 'repeater') {
                $nestedGroup = $this->getGroup($subField);
                foreach ($nestedGroup as $nestedField) {
                    $dependencies[] = $nestedField->get('input');
                }
            }
        }
        return $dependencies;
    }
}
