<?php
    require_once('processimage.class.php');
/**
 * @package moreGallery
 */
class ContentBlocksImageUploadProcessor extends ContentBlocksImageProcessor {

    /**
     * @return bool|string
     */
    public function initialize() {
        if(parent::initialize()) {
            /**
             * Make sure the upload path exists. We unset errors to prevent issues if it already exists.
             */
            $this->source->createContainer($this->path, '/');
            $this->source->errors = array();

            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function process() {
        if (!$this->source->checkPolicy('create')) {
            return $this->failure($this->modx->lexicon('permission_denied'));
        }
        
        $file = $_FILES['file'];
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileExtension = strtolower($fileExtension);

        $fileTypes = $this->getAllowedFileTypes();
        if (!in_array($fileExtension, $fileTypes, true)) {
            return $this->failure($this->modx->lexicon('contentblocks.file_types.disallowed'));
        }

        $_FILES['file']['name'] = $this->cleanFilename($fileName, $fileExtension);

        /**
         * Do the upload
         */
        $this->contentBlocks->renames = array();
        $uploaded = $this->source->uploadObjectsToContainer($this->path, $_FILES);
        if (!$uploaded) {
            $errors = $this->source->getErrors();
            $errors = implode('<br />', $errors);
            return $this->failure($errors);
        }

        /**
         * Check if the file has been renamed by a plugin like FileSluggy
         */
        $newFileName = reset($this->contentBlocks->renames);
        if (!empty($newFileName)) {
            $baseMediaPath = $this->source->getBasePath() . $this->path;
            $baseMediaPath = str_replace('://', '__:_/_/', $baseMediaPath);
            $baseMediaPath = str_replace('//', '/', $baseMediaPath);
            $baseMediaPath = str_replace('__:_/_/', '://', $baseMediaPath);

            $newFileName = substr($newFileName, strlen($baseMediaPath));
            $_FILES['file']['name'] = $newFileName;
        }
        
        // Make sure the connection closes for sites with keep-alive enabled
        header("Connection: close");

        // clean up any double-slashes
        $url = $this->source->getObjectUrl($this->path . $_FILES['file']['name']);
        $url = str_replace('://', '__:_/_/', $url);
        $url = str_replace('//', '/', $url);
        $url = str_replace('__:_/_/', '://', $url);
        $this->url = $url;

        $size = false;

        if (in_array($fileExtension, array('png','gif','jpg','jpeg','bmp','tiff', true))) {
            $image = $this->source->getObjectContents($this->path . $_FILES['file']['name']);
            $size = @getimagesizefromstring($image['content']);
        }

        $success = array(
            'url' => $url,
            'filename' => $_FILES['file']['name'],
            'size' => $_FILES['file']['size'],
            'upload_date' => strtotime('now'),
            'extension' => $fileExtension,
            'width' => $size ? $size[0] : 0,
            'height' => $size ? $size[1] : 0,
        );

        return $this->success('', $success);
    }
}

return 'ContentBlocksImageUploadProcessor';
