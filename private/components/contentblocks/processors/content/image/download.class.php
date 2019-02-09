<?php
require_once('processimage.class.php');
/**
 * @package moreGallery
 */
class ContentBlocksImageDownloadProcessor extends ContentBlocksImageProcessor {

    /**
     * @return bool
     */
    public function process() {
        if (!$this->source->checkPolicy('create')) {
            return $this->failure($this->modx->lexicon('permission_denied'));
        }

        $url = (string)$this->getProperty('url');
        
        $fileName = pathinfo($url, PATHINFO_FILENAME);
        $fileExtension = pathinfo($url, PATHINFO_EXTENSION);
        $fileExtension = strtolower($fileExtension);

        $fileTypes = $this->getAllowedFileTypes();
        if (!in_array($fileExtension, $fileTypes, true)) {
            return $this->failure($this->modx->lexicon('contentblocks.file_types.disallowed'));
        }

        $cleanFileName = $this->cleanFilename($fileName, $fileExtension);

        if (substr($url, 0, 4) !== 'http') {
            $url = $this->modx->getOption('base_path') . $url;
            $url = str_replace('//', '/', $url);
        }
        if (!$fileContent = file_get_contents($url)) {
            return $this->failure($this->modx->lexicon('contentblocks.from_url_notfound'));
        }

        /**
         * Create the local file
         */
        $this->contentBlocks->renames = array();
        $created = $this->source->createObject($this->path, $cleanFileName, $fileContent);
        if (!$created) {
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
            $cleanFileName = $newFileName;
        }
        
        // Make sure the connection closes for sites with keep-alive enabled
        header("Connection: close");

        // clean up any double-slashes
        $url = $this->source->getObjectUrl($this->path . $cleanFileName);
        $url = str_replace('://', '__:_/_/', $url);
        $url = str_replace('//', '/', $url);
        $url = str_replace('__:_/_/', '://', $url);
        $this->url = $url;

        $size = false;
        $fileSize = false;
        if (in_array($fileExtension, array('png','gif','jpg','jpeg','bmp','tiff', true))) {
            $image = $this->source->getObjectContents($this->path . $cleanFileName);
            $size = @getimagesizefromstring($image['content']);
            $fileSize = $image['size'];
        }

        $success = array(
            'url' => $url,
            'filename' => $cleanFileName,
            'size' => $fileSize,
            'upload_date' => strtotime('now'),
            'extension' => $fileExtension,
            'width' => $size ? $size[0] : 0,
            'height' => $size ? $size[1] : 0,
        );

        return $this->success('', $success);
    }
}

return 'ContentBlocksImageDownloadProcessor';
