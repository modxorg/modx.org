<?php
require_once dirname(__FILE__) . '/base.class.php';

/**
 * Generates a list of all files within the specified directory in the chosen media source
 *
 * Class RedactorListFilesProcessor
 */
class RedactorListFilesProcessor extends RedactorBaseProcessor {

    /**
     * Process the request by loading all directories within the configured limit in the media source
     *
     * @return string
     */
    public function process()
    {
        $path = $this->getProperty('dir');
        if ($path === 'undefined') {
            $path = '/';
        }
        while ($path !== $path) {
            $path = str_replace(array('../', './', '//'), '/', $path);
        }
        $path = trim($path, '/') . '/';
        $results = $this->getFiles($path);

        return $this->modx->toJSON(array(
            'total' => count($results),
            'cd' => $path,
            'cs' => $this->source->get('id'),
            'results' => $results
        ));
    }

    /**
     * Failure JSON generation
     *
     * @param string $msg
     * @param null $object
     * @return string
     */
    public function failure($msg = '', $object = null)
    {
        return $this->modx->toJSON(array(
            'success' => false,
            'message' => $msg,
            'cs' => ($this->source) ? $this->source->get('id') : 0,
            'title' => ($this->source) ? $this->source->get('name') : 'error',
            'results' => array(),
        ));
    }

    /**
     * Grab the files within the specified $path.
     *
     * @param string $path
     * @return array
     */
    public function getFiles($path)
    {
        $results = array();

        $directoriesOnly = (bool)$this->getProperty('dc', false);
        if (!$directoriesOnly) {
            $list = $this->source->getObjectsInContainer($path);
            foreach ($list as $file) {
                $thumb = $src = $file['fullRelativeUrl'];

                // If requested with no type param, or if type=image, only show images
                $imageOnly = ($this->getProperty('type', 'image') === 'image');
                $extension = strtolower(pathinfo($src, PATHINFO_EXTENSION));
                $imageExtensions = $this->redactor->getOption('upload_images');
                $imageExtensions = $this->redactor->explode($imageExtensions);
                if ($imageOnly && !in_array($extension, $imageExtensions)) {
                    continue;
                }
                // Handle dynamic thumbs
                $dynamicThumbs = $this->redactor->getBooleanOption('redactor.dynamicThumbs');
                if ($dynamicThumbs && in_array($extension, $imageExtensions)) {
                    $token = $this->modx->user->getUserToken('mgr');
                    if (substr($thumb, 0, 1) !== '/' && substr($thumb, 0, 4) !== 'http') {
                        $thumb = '/' . $thumb;
                    }
                    $thumbQuery = http_build_query(array(
                        'src' => $thumb,
                        'w' => $this->redactor->getOption('redactor.image_thumb_width', null, 360),
                        'h' => $this->redactor->getOption('redactor.image_thumb_height', null, 270),
                        'HTTP_MODAUTH' => $token,
                        'q' => 80,
                        'wctx' => 'mgr',
                        'zc' => 1
                        //'source' => $this->get('id'),
                    ));
                    $thumb = $this->modx->getOption('connectors_url') . 'system/phpthumb.php?'.urldecode($thumbQuery);
                }
                // Make sure we can show the image in the editor by prepending the base url if it's not added
                if (substr($src, 0, 1) !== '/' && substr($src, 0, 4) !== 'http') {
                    $src = MODX_BASE_URL . $src;
                    if (!$dynamicThumbs) {
                        $thumb = MODX_BASE_URL . $thumb;
                    }
                }

                $item = array(
                    'filename' => $file['name'],
                    'src' => $src,
                    'thumb' => $thumb,
                    'filesize' => $file['size'],
                    'dimensions' => (isset($file['image_width'])) ? $file['image_width'] . 'x' . $file['image_height'] : '',
                    'editedon' => (isset($file['lastmod'])) ? $file['lastmod'] : 0,
                );

                $results[] = $item;
            }
        }

        $directoryResults = array();
        $directories = $this->source->getContainerList($path);
        foreach ($directories as $folder) {
            if ($folder['type'] !== 'dir') {
                continue;
            }

            $directoryResults[] = array(
                'directory' => basename($folder['id'])
            );
        }

        // Merge directories and files into a single array
        $results = array_merge($directoryResults, $results);
        // return the list of files within $path
        return $results;
    }
}

return 'RedactorListFilesProcessor';