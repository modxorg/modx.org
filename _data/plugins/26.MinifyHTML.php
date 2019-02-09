id: 26
source: 2
name: MinifyHTML
properties: 'a:0:{}'

-----

$output = $modx->resource->_output;
$output= preg_replace('|\s+|', ' ', $output);
$modx->resource->_output = $output;