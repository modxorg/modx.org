id: 23
source: 2
name: cbHandleElementVisibility
category: ContentBlocks
properties: 'a:0:{}'

-----

/*
 * prevent inactive fields from the rendering [[+element_visible]]
 */

$corePath = $modx->getOption('contentblocks.core_path', null, $modx->getOption('core_path').'components/contentblocks/');
$ContentBlocks = $modx->getService('contentblocks','ContentBlocks', $corePath.'model/contentblocks/');

if (!function_exists("loopLayoutsForScheduling")) {
    function loopLayoutsForScheduling($cbContent, $nested = false) {
        if (!is_array($cbContent)) return 'no array!';
        foreach ($cbContent as $layout_idx => &$layout) {
            
            if (isset($layout['settings']['element_visible']) && $layout['settings']['element_visible'] == '0') {
                // remove layout from rendering
                unset($cbContent[$layout_idx]);
                
            } else {
                
                foreach ($layout['content'] as $col => &$content) {
                    
                    // check for child layouts
                    foreach($content as $fieldId => &$field) {
                        
                        if (isset($field['settings']['element_visible']) && $field['settings']['element_visible'] == '0') {
                            // remove field from rendering
                            unset($cbContent[$layout_idx]['content'][$col][$fieldId]);
                            
                        } else if (isset($field['child_layouts'])) {
                            // loop through nested layouts
                            $field['child_layouts'] = loopLayoutsForScheduling($field['child_layouts'],true);
                            
                        } else if (array_key_exists('rows', $field) && !empty($field['rows'])) {
                            // loop over repeater fields
                            foreach ($field['rows'] as $rowId => &$row) {
                                if (isset($row['element_visible']['value']) && $row['element_visible']['value'] == 0) {
                                    // remove row for rendering if it's not active
                                    unset($cbContent[$layout_idx]['content'][$col][$fieldId]['rows'][$rowId]);
                                }
                            }
                        }
                    }
                }
            }
            
        }
        if ($nested === true) return $cbContent;
        return array('cbContent' => $cbContent);
    }
}


$result = loopLayoutsForScheduling($cbContent);

if (is_array($result)) {
    $cbContent = $result['cbContent'];
    //$cbJson = $modx->toJSON($cbContent);
}

/*
 * retun data back to event
 */

$modx->event->output(array('cbContent' => $cbContent, 'cbJson' => $cbJson));
return "";