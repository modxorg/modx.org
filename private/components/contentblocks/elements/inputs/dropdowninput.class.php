<?php
/**
 * Class DropdownInput
 *
 * Adds a dropdown/select input type. 
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class DropdownInput extends cbBaseInput {
    public $defaultIcon = 'paragraph';
    public $defaultTpl = '[[+value]]';

    /**
     * Return an array of field properties. Properties are used in the component for defining
     * additional templates or other settings the site admin can define for the field.
     *
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'options',
                'fieldLabel' => $this->modx->lexicon('contentblocks.dropdown.options'),
                'xtype' => 'textarea',
                'default' => '',
                'description' => $this->modx->lexicon('contentblocks.dropdown.options.description')
            ),
            array(
                'key' => 'default_value',
                'fieldLabel' => $this->modx->lexicon('contentblocks.dropdown.default_value'),
                'xtype' => 'textfield',
                'default' => '',
                'description' => $this->modx->lexicon('contentblocks.dropdown.default_value.description')
            ),
        );
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('dropdown');
        return $tpls;
    }

    /**
     * Based on the field properties, this method determines the available options in the actual select.
     *
     * @param cbField $field
     * @return array
     */
    public function getSelectOptions(cbField $field)
    {
        $processed = array();
        $options = $field->get('options');
        $options = explode("\n", $options);

        foreach ($options as $optionString) {
            switch (true) {

                // @SELECT binding to retrieve data from the database; requires a valid query to be provided.
                // This is a potentially quite serious security risk, so taking this out until another day
                // when we might have a way to prevent said security risk.
                /*case strpos($optionString, '@SELECT ') === 0:
                    $sql = 'SELECT ' . substr($optionString, strlen('@SELECT '));
                    $query = $this->modx->query($sql);
                    if ($query instanceof PDOStatement) {
                        while ($row = $query->fetch(PDO::FETCH_NUM)) {
                            $opt = implode('==',array_values($row));
                            $processed[] = $this->processSimpleOption($opt);
                        }
                    }
                    else {
                        $this->modx->log(modX::LOG_LEVEL_ERROR, 'Unable to process @SELECT binding for field ' . $field->get('id') . ', did not return a valid PDOStatement: ' . $sql);
                    }

                    break;*/

                // @SNIPPET binding to run a snippet
                case strpos($optionString, '@SNIPPET ') === 0:
                    $snippet = substr($optionString, strlen('@SNIPPET '));
                    $properties = array(
                        'field' => $field,
                        'input' => $this,
                    );
                    $result = $this->modx->runSnippet($snippet, $properties);
                    $json = json_decode($result, true);
                    if (is_array($json)) {
                        foreach ($json as $opt) {
                            $processed[] = $opt;
                        }
                    }
                    else {
                        $opts = explode("\n", $result);
                        foreach ($opts as $opt) {
                            $processed[] = $this->processSimpleOption($opt);
                        }
                    }

                    break;

                // Process it as a simple option string
                default:
                    $processed[] = $this->processSimpleOption($optionString);
                    break;
            }
        }

        return $processed;
    }

    /**
     * Processes a simple option string (i.e. no snippets or select bindings) into the proper array format.
     *
     * @param $optionString
     * @return array
     */
    public function processSimpleOption($optionString)
    {
        $value = '';
        $display = '';
        $disabled = false;
        switch (true) {
            // Nice little separator for large result sets
            case $optionString === '-':
                $display = '-----';
                $disabled = true;
                break;

            // "Comment", basically a disabled separator option
            case strpos($optionString, '#') === 0:
                $display = substr($optionString, 1);
                $disabled = true;
                break;

            // Your basic value=Some Really Great Display Title option
            case strpos($optionString, '==') !== false:
                $boom = explode('==', $optionString);
                $value = array_shift($boom);
                $display = implode('==', $boom);
                break;

            // Your basic Display Title=value option
            // @deprecated will be removed in 2.0
            case strpos($optionString, '=') !== false:
                $boom = explode('=', $optionString);
                $display = array_shift($boom);
                $value = implode('=', $boom);
                break;

            // The option is both the value and the display
            default:
                $value = $optionString;
                $display = $optionString;
                break;
        }

        $lexDisplay = $this->modx->lexicon($display);
        if (!empty($lexDisplay)) {
            $display = $lexDisplay;
        }

        $processed = array(
            'value' => $value,
            'display' => $display,
        );
        if ($disabled) {
            $processed['disabled'] = true;
        }
        return $processed;
    }

}
