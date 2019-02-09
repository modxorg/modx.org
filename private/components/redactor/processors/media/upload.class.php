<?php
require_once dirname(__FILE__) . '/base.class.php';

/**
 * Handles uploading of an image
 *
 * Class RedactorUploadMediaProcessor
 */
class RedactorUploadMediaProcessor extends RedactorBaseProcessor
{
    /**
     * Only allow uploads when the user has the file_upload permission. (#159)
     *
     * @return boolean
     */
    public function checkPermissions()
    {
        return $this->modx->hasPermission('file_upload');
    }

    /**
     * Process the request by loading all directories within the configured limit in the media source
     *
     * @return string
     */
    public function process()
    {
        $path = $this->getPath();

        // Create the path if it doesn't exist yet
        // Prevent errors from being logged later; most errors here are "folder already exists" errors.
        $this->source->createContainer($path, '/');
        $this->source->errors = array();

        $files = array();

        // Loop over the uploads (though typically, it's just one) to prepare filenames
        foreach ($_FILES as $key => $upload) {
            // Make sure the upload was successful
            if ($upload['error'] == 0) {
                $filename = $this->getFilename($upload['name']);
                $originalFilename = $upload['name'];
                $_FILES[$key]['name'] = $filename;

                // This is how we'll return this file
                $files[] = array(
                    'filelink' => $this->source->getObjectUrl($path . $filename),
                    'filename' => $originalFilename,
                );
            }
        }

        if (!empty($files)) {
            $this->redactor->renames = array();
            $success = $this->source->uploadObjectsToContainer($path, $_FILES);
            if ($success) {
                $newFileName = reset($this->redactor->renames);
                if (!empty($newFileName)) {
                    $baseMediaPath = $this->source->getBasePath() . $path;
                    $newFileName = substr($newFileName, strlen($baseMediaPath));
                    $newLink = $this->source->getObjectUrl($path . $newFileName);
                    $files[0]['filelink'] = $newLink;
                }
                return $this->modx->toJSON($files);
            }

            $errors = $this->source->getErrors();
            $errors = implode('<br />', $errors);
            return $this->failure($errors);
        }

        return $this->failure($this->modx->lexicon('file_err_upload'));
    }

    /**
     * Grabs and prepares the upload path.
     *
     * @return mixed
     */
    protected function getPath()
    {
        $path = $this->getProperty('dir');
        if (empty($path)) {
            $path = $this->getConfiguredPath();
        }
        else {
            $path = str_replace(array('..', '.', '//', '\\'), DIRECTORY_SEPARATOR, $path);
            $path = trim($path, '/') . '/';
        }

        return $this->redactor->parsePathVariables($path);
    }

    /**
     * Gets the configured upload path for the specified type (image or file).
     *
     * @return string
     */
    protected function getConfiguredPath()
    {
        $type = $this->getUploadType();
        return $this->redactor->getOption('redactor.' . $type . '_upload_path', null, 'assets/uploads/');
    }

    /**
     * Sanitises and prepares the file name
     *
     * @param $name
     * @return string
     */
    protected function getFilename($name)
    {
        $filename = pathinfo($name, PATHINFO_FILENAME);

        // Cleaning up the file name from weird characters and stuff
        $cleanFileNames = $this->redactor->getBooleanOption('redactor.cleanFileNames', null, true);
        if ($cleanFileNames) {
            $filename = $this->sanitizeFileName($filename);
        }

        // Check if we need to prefix a full timestamp
        $dateSetting = $this->getUploadType() === 'image' ? 'redactor.date_images' : 'redactor.date_files';
        $hashFilename = $this->redactor->getBooleanOption($dateSetting, null, false);
        if ($hashFilename) {
            $filename = date('Y-m-d-H.i.s') . '-' . $filename;
        }

        // Preventing overwriting existing images by adding an incremental number to the filename until it is unique
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $increment = $this->redactor->getBooleanOption('redactor.increment_file_names', null, true);
        if ($increment && $this->source instanceof modFileMediaSource) {
            $bases = $this->source->getBases($this->getPath());

            $i = 0;
            $incrementedFilename = $filename;
            while (file_exists($bases['pathAbsoluteWithPath'] . $incrementedFilename . '.' . $ext)) {
                $i++;
                $incrementedFilename = $filename . '_' . $i;
            }
            $filename = $incrementedFilename;
        }

        // Return the file name
        return $filename . '.' . $ext;
    }

    /**
     * Sanitizes the provided file name.
     *
     * @param $name
     *
     * @return string
     */
    protected function sanitizeFileName($name)
    {
        $replace = $this->redactor->getOption('redactor.sanitizeReplace', null, '_');
        $pattern = $this->redactor->getOption('redactor.sanitizePattern', null, "/([[:alnum:]_\.-]*)/");
        $name = str_replace(str_split(preg_replace($pattern, $replace, $name)), $replace, $name);

        return $name;
    }

    /**
     * On top of the "s" query string and TV-based media sources, this will grab the source from the redactor setting.
     *
     * @return bool|null|string
     */
    protected function getSource() {
        $result = parent::getSource();
        if ($result !== true && !$this->source) {
            $sourceId = false;

            // If we're uploading a file, grab the file media source
            if ($this->getUploadType() === 'file') {
                $sourceId = $this->redactor->getOption('redactor.file_mediasource', null, false, true);
            }
            // Not a file, or file media source is not configured? Use the media source value
            if (!$sourceId) {
                $sourceId = $this->redactor->getOption('redactor.mediasource', null, false, true);
            }
            // Still nothing? Then we use the MODX default media source.
            if (!$sourceId) {
                $sourceId = $this->redactor->getOption('default_media_source', null, 1);
            }
            $this->source = $this->modx->getObject('sources.modMediaSource', $sourceId);
            return $this->validateSource();
        }

        return $result;
    }

    /**
     * Returns wether this is a file or image upload.
     *
     * @return string
     */
    protected function getUploadType()
    {
        $type = $this->getProperty('type', false);
        if (!$type || !in_array($type, array('file', 'image'))) {
            $type = 'image';
        }

        return $type;
    }
}

return 'RedactorUploadMediaProcessor';
