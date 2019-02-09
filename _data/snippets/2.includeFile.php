id: 2
source: 2
name: includeFile
description: 'Include any file from a public location within the MODX base path.'
category: 'Snippets and Output-Filters'
properties: 'a:0:{}'

-----

/*
* includeFile
*
* Include any file from a public location within the MODX base path.
*
* Usage examples:
* [[!includeFile? &file=`assets/sample.txt`]]
* [[!includeFile? &includeBasePath=`0` &file=`/home/www/public/assets/sample.txt`]]
*
* @author Christian Seel <cs@seda.digital>
*/

$includeBasePath = $modx->getOption('includeBasePath', $scriptProperties, true);
$file = $modx->getOption('file', $scriptProperties, '');
if ($includeBasePath) $file = $modx->getOption('base_path') . ltrim($file, '/');
// fix directory separators
$file = str_replace(array('/', '\\'), '/', $file);
$file = realpath("$file");
$file = str_replace(array('/', '\\'), '/', $file);

// security, make sure we're somewhere at a public place…
// you might add other allowed locations to this array
// remember that bad people could use this snippet to get anywhere…
$allowed_locations = array(
MODX_BASE_PATH
);

$allowed = false;
foreach ($allowed_locations as $location){
if (strpos($file, $location) === 0) {
$allowed = true;
break;
}
}

if ($allowed === false) {
$modx->log(1, "[includeFile]: ${file} is not allowed in locations: ".json_encode($allowed_locations));
return '';
}
if (file_exists($file)) {
return file_get_contents($file);
}

return '';