id: 4
name: cbHasField
description: 'Conditionally do stuff depending on the usage of a specific field on a resource. (Part of ContentBlocks)'
category: ContentBlocks
properties: null

-----

/**
 * Use the cbHasField snippet for conditional logic depending on whether a certain field
 * is in use on a resource or not.
 *
 * For example, this can be useful if you need to initialise a certain javascript library
 * in your site's footer, but only when you have a Gallery on the page.
 *
 * Example usage:
 *
 * [[cbHasField?
 *      &field=`13`
 *      &then=`Has a Gallery!`
 *      &else=`Doesn't have a gallery!`
 * ]]
 *
 * An optional &resource param allows checking for fields on other resources.
 *
 * Note that if the resource does not use ContentBlocks for the content, it will default to the &else value.
 *
 * @var modX $modx
 * @var array $scriptProperties
 */

// Use the current resource if it's available
$resource = isset($modx->resource) ? $modx->resource : false;

// If we have a requested resource...
if (array_key_exists('resource', $scriptProperties) && !empty($scriptProperties['resource'])) {
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

$flds = $modx->getOption('field', $scriptProperties, '0');
$flds = array_map('intval', explode(',', $flds));
$then = $modx->getOption('then', $scriptProperties, '1');
$else = $modx->getOption('else', $scriptProperties, '');

// Make sure this is a contentblocks-enabled resource
$enabled = $resource->getProperty('_isContentBlocks', 'contentblocks');
if ($enabled !== true) return $else;

// Get the field counts
$counts = $resource->getProperty('fieldcounts', 'contentblocks');
if (is_array($counts)) {
    foreach ($flds as $fld) {
        if (!empty($fld) && isset($counts[$fld])) {
            return $then;
        }
    }
}
else {
    $modx->log(modX::LOG_LEVEL_ERROR, '[ContentBlocks.cbHasField] Resource ' . $resource->get('id') . ' does not contain field count data. This feature was added in ContentBlocks 0.9.2. Any resources not saved since the update to 0.9.2 need to be saved in order for the field counts to be calculated and stored.');
}
return $else;