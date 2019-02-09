<?php
/**
 * Class TableInput
 *
 * @author Mark Hamstra
 * @package contentblocks
 *
 */
class TableInput extends cbBaseInput {
    public $defaultIcon = 'table';
    public $defaultTpl = '<td>[[+cell]]</td>';
    public $defaultRowTpl = '<tr>[[+row]]</tr>';
    public $defaultWrapperTpl = '<table><tbody>[[+body]]</tbody></table>';
    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('table');
        return $tpls;
    }

    /**
     * @return array
     */
    public function getJavaScripts()
    {
        return array(
            $this->contentBlocks->config['assetsUrl'] . 'js/vendor/warpech/jquery-handsontable/jquery.handsontable.full-min.js',
        );
    }

    /**
     * @return array
     */
    public function getCss()
    {
        return array(
            $this->contentBlocks->config['assetsUrl'] . 'js/vendor/warpech/jquery-handsontable/jquery.handsontable.full.css'
        );
    }


    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'row_template',
                'fieldLabel' => $this->modx->lexicon('contentblocks.table.row_template'),
                'xtype' => 'code',
                'default' => $this->defaultRowTpl,
                'description' => $this->modx->lexicon('contentblocks.table.row_template.description')
            ),
            array(
                'key' => 'wrapper_template',
                'fieldLabel' => $this->modx->lexicon('contentblocks.wrapper_template'),
                'xtype' => 'code',
                'default' => $this->defaultWrapperTpl,
                'description' => $this->modx->lexicon('contentblocks.table.wrapper_template.description')
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
        $cellTpl = $field->get('template');
        $rowTpl = $field->get('row_template');
        $wrapperTpl = $field->get('wrapper_template');
        
        $data['value'] = $this->cleanRows($data['value']);

        $body = array();
        $rows = array();
        $idx = 1;
        $total = count($data['value']);
        $data['total'] = $total;
        
        foreach ($data['value'] as $row) {
            $rowData = $data;
            $rowData['idx'] = $idx;
            
            $cells = $this->parseCells($cellTpl, $row, $rowData);
            $rowData['row'] = $cells;
            
            $rowOutput = $this->contentBlocks->parse($rowTpl, $rowData);
            $rows[] = $rowData;
            $body[] = $rowOutput;
            $idx++;
        }
        $body = implode('', $body);

        $data['body'] = $body;
        $output = $this->contentBlocks->parse($wrapperTpl, $data);
        return $output;
    }

    public function parseCells($tpl, $row, $rowData) {
        $output = array();
        $colIdx = 1;
        $colTotal = count($row);
        foreach ($row as $cell) {
            $cellData = $rowData;
            $cellData['cell'] = $cell;
            $cellData['colIdx'] = $colIdx;
            $cellData['colTotal'] = $colTotal;
            $output[] = $this->contentBlocks->parse($tpl, $cellData);
            $colIdx++;
        }
        $output = implode('', $output);
        return $output;
    }
    
    public function cleanRows($rows) {
        // get rid of last row, because it's (probably) always empty. Test that first.
        $lastRow = end($rows);
        $lastRow = implode('', $lastRow);
        if(empty($lastRow)) {
            array_pop($rows);
        }
        
        // if we knew for sure that the last col was always empty, we could just foreach
        // and array_pop. but I'm not 100% sure that the data hasn't changed, so we'll 
        // rotate the array, do our same test, array_pop, and rotate it back.
        if (count($rows) > 1) {
            $rotated = call_user_func_array(
                'array_map',
                array(-1 => null) + $rows
            );

            $lastRow = end($rotated);
            if (!is_array($lastRow)) {
                $lastRow = array();
            }

            $lastRow = implode('', $lastRow);
            if (empty($lastRow)) {
                array_pop($rotated);
                if (empty($rotated)) {
                    return $rows;
                }

                // we only need to re-rotate if we had to remove the last row. If not, then
                // $rows holds the correct values already. Saves a small amount of computation.
                $rows = call_user_func_array(
                    'array_map',
                    array(-1 => null) + $rotated
                );
            }
        }
        else {
            $row = $rows[0];
            if (end($row) == '') {
                array_pop($row);
                $rows = array($row);
            }
        }
        return $rows;
    }    
}
