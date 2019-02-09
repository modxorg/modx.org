id: 31
source: 2
name: checksumFile
category: Template
properties: 'a:0:{}'

-----

$file = $modx->getOption('file', $scriptProperties, '');
if (empty($file)) return '';

// calculate checksum
$checksum = hash_file('adler32', MODX_BASE_PATH.$file);
if (empty($checksum)) return $file;
// shorten checksum https://stackoverflow.com/a/28602439
$checksum = substr(base_convert(md5($checksum), 16,32), 0, 12);

// add checksum to file url
return substr_replace($file, '.'.$checksum.'.', strrpos($file, '.'), 1);