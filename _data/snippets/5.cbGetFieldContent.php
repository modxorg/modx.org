id: 5
name: cbGetFieldContent
description: 'Get the content of a particular ContentBlocks field. (Part of ContentBlocks)'
category: ContentBlocks
properties: null

-----

/**
 * Use the cbGetFieldContent snippet to get the content of a particular field.
 *
 * For example, this can be useful if you need to get a bit of content 
 * in a getResources call
 *
 * Example usage:
 *
 * [[cbGetFieldContent?
 *      &field=`13`
 *      &tpl=`fieldTpl`
 * ]]
 * 
 * [[cbGetFieldContent?
 *      &field=`13`
 *      &fieldSettingFilter=`class==keyImage`
 *      &tpl=`fieldTpl`
 * ]]
 * 
 * An optional &resource param allows checking for fields on other resources.
 * An option &fieldSettingFilter allows filtering by == or != of a field setting. Only items matching the filter will be returned.
 * An optional &limit param allows limiting the number of matched fields
 * An optional &offset param allows skipping the first n matched fields 
 * An optional &tpl param is a chunk name defining a template to use for your field. If not set,
 *   the ContentBlocks template for the field will be used.
 * An optional &wrapTpl param is a chunk name defining a template to use for your field wrapper.
 *   If not set, the ContentBlocks wrapper template for the field will be used. Applies only to
 *   multi-value inputs (galleries, files, etc.)
 * An optional &returnAsJSON parameter will return all values of the selected field as JSON.
 *
 * @var modX $modx
 * @var array $scriptProperties
 */
 

// Use the current resource if it's available
$resource = isset($modx->resource) ? $modx->resource : false;

// If we have a requested resource...
if ($scriptProperties['resource']) {
    // ... check if it is the same one as the current, and only load the requested resource if it isn't
    if ($resource instanceof modResource) {
        if ($scriptProperties['resource'] != $resource->get('id')) {
            $resource = $modx->getObject('modResource', (int)$scriptProperties['resource']);
        }
    }
    // ... or grab the requested resource anyway
    else {
        $resource = $modx->getObject('modResource', (int)$scriptProperties['resource']);
    }
}

// Make sure we have a resource or end here
if (!$resource) {
    return '';
}

$fld = $modx->getOption('field', $scriptProperties, 0, true);
$fieldSettingFilter = $modx->getOption('fieldSettingFilter', $scriptProperties, false, true); 
$limit = $modx->getOption('limit', $scriptProperties, 0, true);
$offset = $modx->getOption('offset', $scriptProperties, 0, true);
$innerLimit = $modx->getOption('innerLimit', $scriptProperties, 0, true);
$innerOffset = $modx->getOption('innerOffset', $scriptProperties, 0, true);
$tpl = $modx->getOption('tpl', $scriptProperties, false, true);
$wrapTpl = $modx->getOption('wrapTpl', $scriptProperties, false, true);
$showDebug = $modx->getOption('showDebug', $scriptProperties, false, true);
$returnAsJSON = $modx->getOption('returnAsJSON', $scriptProperties, false, true);

/** @var array $debug */
$debug = array('scriptProperties' => $scriptProperties);
$output = '';

if(!$fld) {
    $showDebug = true;
}

else {
    // Make sure this is a contentblocks-enabled resource
    $enabled = $resource->getProperty('_isContentBlocks', 'contentblocks');
    $debug['enabled'] = (bool)$enabled;
    if ($enabled !== true) return;
    
    // Get the field counts
    $counts = $resource->getProperty('fieldcounts', 'contentblocks');
    $debug['counts'] = $counts;
    if (is_array($counts) && isset($counts[$fld])) {
        $fieldsData = $resource->getProperty('linear', 'contentblocks');
        $fieldsTypeData = array();
        $cbCorePath = $modx->getOption('contentblocks.core_path', null, $modx->getOption('core_path').'components/contentblocks/'); 
        $ContentBlocks = $modx->getService('contentblocks','ContentBlocks', $cbCorePath.'model/contentblocks/');
        $ContentBlocks->loadInputs();
        $field = $modx->getObject('cbField', $fld);

        if(!($field instanceof cbField)) {
            $modx->log(modX::LOG_LEVEL_ERROR, '[cbGetFieldContent] Error loading field ' . $fld);
            return;
        }
        
        if($tpl) {
            $chunk = $modx->getObject('modChunk', array('name' => $tpl));
            if ($chunk instanceof modChunk) {
                $field->set('template', $chunk->get('content'));
            }
        }
        
        if($wrapTpl) {
            $chunk = $modx->getObject('modChunk', array('name' => $wrapTpl));
            if ($chunk instanceof modChunk) {
                $field->set('wrapper_template', $chunk->get('content'));
            }
        }
    
        $debug['fieldsData'] = $fieldsData;
        
        foreach($fieldsData as $fieldData) {
          	if($fieldData['field'] == $fld) {
                $fieldsTypeData[] = $fieldData;
          	}
        }
        
        $debug['fieldsTypeData'] = $fieldsTypeData;
      
        if($fieldSettingFilter) {
            $operators = array(
                '!=' => '!=',
                '==' => '==',
            );
            $filters = explode(',', $fieldSettingFilter);
            $debug['filters'] = array('original' => $filters);
            foreach($filters as $i => $filter) {
                foreach($operators as $op => $symbol) {
                    if (strpos($filter, $op, 1) !== false) {
                        $operator = $op;
                        break;
                    }
                }
                
                $filter = explode($operator, $filter);
                $debug[$i]['filter'] = $filter;
                $setting = array_shift($filter);
                $value = array_shift($filter);
                $debug[$i]['setting'] = $setting;
                $debug[$i]['value'] = $value;
                $debug[$i]['operator'] = $operator;
                
                foreach($fieldsTypeData as $idx => $fieldData) {
                    if($fieldData['settings'] && array_key_exists($setting, $fieldData['settings'])) {
                        switch($operator) {
                            case '==' :
                                if($fieldData['settings'][$setting] != $value) {
                                    unset($fieldsTypeData[$idx]);
                                }
                            break;
                            case '!=' :
                                if($fieldData['settings'][$setting] == $value) {
                                    unset($fieldsTypeData[$idx]);
                                }
                            break;
                        }
                    }
                }
            }
        }
        
        if($offset) {
            $fieldsTypeData = array_splice($fieldsTypeData, (int)$offset);
            $debug['offset'] = $offset;
        }
        if($limit) {
            $fieldsTypeData = array_splice($fieldsTypeData, 0, $limit);
            $debug['limit'] = $limit;
        }
        
        $debug['result'] = $fieldsTypeData;

        if ($innerLimit || $innerOffset) {
            switch ($field->get('input')) {
                case 'repeater':
                    $keyname = 'rows';
                    break;
                case 'gallery':
                    $keyname = 'images';
                    break;
                default:
                    $keyname = '';
            }
            if (!empty($keyname)) {
                $debug['innerLimit'] = $innerLimit;
                $debug['innerOffset'] = $innerOffset;

                foreach ($fieldsTypeData as &$fieldsTypeInner) {
                    if ($innerOffset) {
                        $fieldsTypeInner[$keyname] = array_splice($fieldsTypeInner[$keyname], (int)$innerOffset);
                    }
                    if ($innerLimit) {
                        $fieldsTypeInner[$keyname] = array_splice($fieldsTypeInner[$keyname], 0, $innerLimit);
                    }
                }
            }
        }

        if(!$returnAsJSON && count($fieldsTypeData)) {
            $i = 0;
            foreach($fieldsTypeData as $fieldData) {
                $i++;
                $output .= $ContentBlocks->generateFieldHtml($fieldData, $field, $i);
            }
        }

        if($returnAsJSON) {
            if($showDebug) {
                $output = $modx->toJSON(array('output' => $fieldsTypeData, 'debug' => $debug));
            }
            else {
                $output = $modx->toJSON($fieldsTypeData);
            }
        }
    }
}

if(!$returnAsJSON && $showDebug) {
    $output .= '<pre>' . print_r($debug, true) . '</pre>';
}


return $output;