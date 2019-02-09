<?php
require_once dirname(__FILE__) . '/browsefiles.class.php';
/**
 * Choose Redactor Images.
 *
 * @param string $file The absolute path of the file
 * @param string $name Will rename the file if different
 * @param string $content The new content of the file
 *
 * @package modx
 * @subpackage processors.browser.file
 */
class RedactorMediaBrowserProcessor extends RedactorFileBrowserProcessor {
    public $dynamicThumbs = true;
    public $displayImageNames = false;
    public $browsePath = 'image_browse_path';
    public $uploadPath = 'image_upload_path';
    public $browseWarn = 'redactor.browse_warning';
    
    public function initialize() {
        $success = parent::initialize();
        $this->dynamicThumbs     = (bool)$this->redactor->getOption('redactor.dynamicThumbs', null, true);
        $this->displayImageNames = (bool)$this->redactor->getOption('redactor.displayImageNames', null, false);
	    return $success;
    }
    
    
    protected function handleFile($image,&$files = array()) {
        $modAuth = $this->modx->user->getUserToken('mgr');
        $imageUrl = $image['url'];
        if ($this->patch_11291) $imageUrl = $this->removeDuplicatePaths($image,$imageUrl);
        $thumbQuery = http_build_query(array(
            'src' => $imageUrl,
            'w' => 360,
            'h' => 270,
            'HTTP_MODAUTH' => $modAuth,
            //'f' => $thumbnailType,
            'q' => 80,
            'wctx' => 'mgr',
            'zc' => 1
            //'source' => $this->get('id'),
        ));

        // Add the base url to make sure the image shows up properly when not using thumbs
        // In the editor with the baseurl plugin this will be stripped out from the markup again
        if (substr($imageUrl, 0, 1) !== '/' && substr($imageUrl, 0, 4) !== 'http') {
            $imageUrl = MODX_BASE_URL . $imageUrl;
        }
        
        if($this->browseRecursive && $image['type'] == 'dir') { /* back to the end of the line buddy */
            $files = $this->addFiles($image['pathRelative'],$files);  
        }
        elseif($image['type'] == 'file') {
            $thumb = $this->modx->getOption('connectors_url') . 'system/phpthumb.php?'.urldecode($thumbQuery);
            $extension = pathinfo($imageUrl, PATHINFO_EXTENSION);
            $json = array(
                'thumb' => ($this->dynamicThumbs && (empty($extension) || in_array($extension, array('jpg','jpeg','png','gif')))) ? $thumb : $imageUrl,
                'image' => $imageUrl,
                'title' => $image['id'],
                'extension' => $extension,
                'figcaption' => ($this->displayImageNames) ? true : null,
                'filename' => pathinfo($imageUrl, PATHINFO_FILENAME) . '.' . $extension
            );
            if ($this->browseRecursive) $json['folder'] = dirname($image['pathRelative']);
            $files[] = $json;
        }
    }
    

}
return 'RedactorMediaBrowserProcessor';
