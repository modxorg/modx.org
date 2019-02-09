id: 23
source: 2
name: pdfPreview
description: 'Checks if a given path is a PDF file and generates a preview image and then returns the path.'
category: 'Snippets and Output-Filters'
properties: 'a:0:{}'

-----

/*
 * pdfPreview
 *
 * Usage examples:
 * as output filter:               [[*image:pdfPreview:pthumb]]
 * as snippet with page selection: [[pdfPreview:pthumb? &src=`[[*image]]` &page=`0`]]
 * as snippet with pthumb after:   [[pdfPreview:pthumb=`w=300`? &src=`[[*image]]`]]
 *
 * Notices:
 * - selecting a non-existing page will produce an error
 * - no path/url processing takes places, can only be produced with pthumb processing!!!
 *
 * @author Jens Külzer <jk@seda.digital>
 */

$pfx = "[pdfPreview] ";

$file = $modx->getOption('src', $scriptProperties, '');
$modx->log(4,$pfx."called with file: ".$file);
if (empty($file)) {
    if ($input!='') {
        $file = $input;
    } else {
        $modx->log(2, $pfx."Empty file name given for pdf preview");
        return $file;
    }
}

if (!file_exists($file)) {
    $modx->log(1,$pfx."File does not exist: ".$file);
    return $file;
}

$gray = $modx->getOption('gray', $scriptProperties, 0);

$page = $modx->getOption('page', $scriptProperties, 1);
$modx->log(1,$pfx."using page: ".$page);

$pathinfo = pathinfo($file);
if ($pathinfo['extension'] != 'pdf') {
    $modx->log(4, $pfx."File is not a pdf: ".$file);
}

// $tmpDir = MODX_CORE_PATH."cache/modx/pdfpreview/";  // does not work with pthumb if core is outside root???
$tmpDir = MODX_BASE_PATH . trim($modx->getOption('pthumb.ptcache_location', null, 'assets/components/pdfpreview/'), '/') . '/pdf/';
if (!file_exists($tmpDir)) {
    $modx->log(3, $pfx."Creating temporary cache dir: ".$tmpDir);
    mkdir($tmpDir);
}

$inputMD5 = md5($file.$gray.$page.filemtime($file));
$outfile = 'pdfthumb_'.$inputMD5.".jpg";

$outFullPath = $tmpDir.$outfile;

if (file_exists($outFullPath)) {
    $modx->log(4, "Returning cached preview: ".$outFullPath);
    return $outFullPath;
}
$modx->log(4,$pfx."generating thumbnail for file: ".$file);
$modx->log(4,$pfx."   writing temp image file to: ".$outfile);

$time = microtime(true);
$image = new Imagick( $file.'['.($page - 1).']');

// we can automatically make a nice grayscale image out of it
if (isset($gray) && $gray=="1") {
    $image->modulateImage(100,0,100);
}

// we write the image to a temporary assets folder
$image->writeImage($tmpDir.$outfile );
$image->destroy();

$time = microtime(true) - $time;
if ($time > 0.25) {
    $modx->log(2, $pfx."Long imagick processing time detected: ".round($time, 3));
}

return $tmpDir.$outfile;