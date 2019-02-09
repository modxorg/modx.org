<?php
require_once('processimage.class.php');
/**
 * @package moreGallery
 */
class ContentBlocksImageCropProcessor extends ContentBlocksImageProcessor {
    public $pathSetting = 'contentblocks.image.crop_path';
    public $pathFieldProperty = 'crop_directory';
    private $_imagine;

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

        if (!($this->field instanceof cbField)) {
            return $this->failure('Field not provided.');
        }
        if (!in_array($this->field->get('input'), ['image', 'image_with_title', 'gallery'], true)) {
            return $this->failure('Invalid field type, must be of type image or gallery.');
        }

        $filename = (string)$this->getProperty('file');

        // Remove site url
        $siteUrl = $this->modx->getOption('site_url');
        if (strpos($filename, $siteUrl) === 0) {
            $filename = substr($filename, strlen($siteUrl));
        }

        // Remove source-specific base url
        $baseUrl = $this->source->getBaseUrl();
        $baseUrl = ltrim($baseUrl, '/');
        $filename = ltrim($filename, '/');
        if (strpos($filename, $baseUrl) === 0) {
            $filename = substr($filename, strlen($baseUrl));
        }

        // Try to load the image
        $file = $this->source->getObjectContents($filename);
        $file = $file['content'];
        if (empty($file)) {
            return $this->failure('File ' . $filename . ' not found in source ' . $this->source->get('id'));
        }

        $imagine = $this->getImagine();
        if (!$imagine) {
            return $this->failure('Unable of instantiating cropping library.');
        }
        try {
            // Load the image with imagine and create a resized version
            $img = $imagine->load($file);
        } catch (Exception $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, 'Exception ' . get_class($e) . ' while loading ' . $filename . '  for crop into imagine: ' . $e->getMessage());
            return $this->failure('Received ' . get_class($e) . ' while loading file into memory.');
        }

        $cropKey = (string)$this->getProperty('crop');
        $crops = $this->getCropInfo();
        if (!array_key_exists($cropKey, $crops)) {
            return $this->failure('Invalid crop specified');
        }
        $cropInfo = $crops[$cropKey];


        // Grab the aspect ratio
        $aspect = false;
        if (isset($cropInfo['aspect'])) {
            $aspect = $cropInfo['aspect'];
        }

        // Prepare all variables we'll calculate with
        $size = $img->getSize();
        $originalWidth = $size->getWidth();
        $originalHeight = $size->getHeight();

        $x = (int)$this->getProperty('x');
        $y = (int)$this->getProperty('y');
        $width = (int)$this->getProperty('width');
        $height = (int)$this->getProperty('height');
        $x2 = $x + $width;
        $y2 = $y + $height;
        $targetWidth = (int)$this->getProperty('target_width');
        $targetHeight = (int)$this->getProperty('target_height');

        if ($width < 1 || $height < 1) {

            // If we have an aspect ratio, we use that to calculate the proper size
            if ($aspect !== false) {
                // Calculate the height based on the width, and the width based on the height, using the crop defined aspect ratio
                $heightBasedWidth = floor($originalHeight * $aspect);
                $widthBasedHeight = floor($originalWidth / $aspect);

                // If the height, derived from the width * aspect, is within the image height we assume the width
                // stays the same, and we only crop from the height.
                if ($widthBasedHeight <= $originalHeight) {
                    $width = $originalWidth;
                    $height = $widthBasedHeight;
                    // As the height changes, we take the difference in height, divide it by 2, and set y to that
                    $y = floor(($originalHeight - $widthBasedHeight) / 2);
                    $y2 = $originalHeight - $y;
                    $x2 = $originalWidth;
                }
                // Otherwise, we assume the height stays the same and we crop from the width instead.
                else {
                    $height = $originalHeight;
                    $width = $heightBasedWidth;
                    // As we're changing the width, we take the difference divided by 2 to set x
                    $x = floor(($originalWidth - $heightBasedWidth) / 2);
                    $x2 = $originalWidth - $x;
                    $y2 = $originalHeight;
                }
            }
            // If we don't have an aspect ratio, we just set the x2, y2, width and height values to the full image
            // in the next step of processing, that will be resized to a defined width or height if necessary.
            else
            {
                $x2 = $originalWidth;
                $y2 = $originalHeight;
                $width = $originalWidth;
                $height = $originalHeight;
            }
        }

        try {
            $img->crop(new Imagine\Image\Point($x, $y), new \Imagine\Image\Box($x2 - $x, $y2 - $y));
        } catch (Exception $e) {
            return $this->failure('Received ' . get_class($e) . ' attempting to crop the image: ' . $e->getMessage());
        }


        /**
         * Grab the crop properties on the crop and see if it includes a width or a height.
         * If it does, we'll want to resize the image to that particular width or height (or both)
         */
        $resizeHeight = 0;
        $resizeWidth = 0;
        foreach ($cropInfo as $key => $val) {
            if ($key === 'width') {
                $resizeWidth = (int)$val;
            }
            if ($key === 'height') {
                $resizeHeight = (int)$val;
            }
        }

        // If we're not using a forced size, accept the resize size from the cropper
        if ($targetWidth > 0 && $resizeWidth === 0) {
            $resizeWidth = $targetWidth;
        }
        if ($targetHeight > 0 && $resizeHeight === 0) {
            $resizeHeight = $targetHeight;
        }

        // If we only have a height or a width, calculate the other based on the actual aspect ratio
        if ($resizeHeight > 0 && $resizeWidth == 0) {
            $resizeWidth = (int)round(($resizeHeight / $originalHeight) * $originalWidth);
        }
        elseif ($resizeWidth > 0 && $resizeHeight == 0) {
            $resizeHeight = (int)round(($resizeWidth / $originalWidth) * $originalHeight);
        }


        // Do the resizing. This is done after the cropping so we're working with the cropped version and not the original.
        if ($resizeWidth > 0 || $resizeHeight > 0) {
            try {
                $img->resize(new \Imagine\Image\Box($resizeWidth, $resizeHeight));
            } catch (Exception $e) {
                return $this->failure('Received ' . get_class($e) . ' attempting to resize the cropped image: ' . $e->getMessage());
            }
        }



        // Output the thumbnail as a string
        $options = array(
            'jpeg_quality' => (int)$this->contentBlocks->getOption('contentblocks.crop_jpeg_quality', null, '90'),
            'png_compression_level' => (int)$this->contentBlocks->getOption('contentblocks.crop_png_compression', null, '9'),
        );

        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        try {
            $thumbnail = $img->get($extension, $options);
        } catch (Exception $e) {
            return $this->failure('Received ' . get_class($e) . ' attempting to return the cropped image: ' . $e->getMessage());
        }

        $resultOpts = [
            'x' => $x,
            'x2' => $x2,
            'y' => $y,
            'y2' => $y2,
            'width' => $width,
            'height' => $height,
            'originalWidth' => $originalWidth,
            'originalHeight' => $originalHeight,
            'resizeWidth' => $resizeWidth,
            'resizeHeight' => $resizeHeight,
            'targetWidth' => $targetWidth,
            'targetHeight' => $targetHeight,
            'extension' => $extension,
        ];
        $filenameOnly = strtolower(pathinfo($filename, PATHINFO_FILENAME));
        $hash = hash('crc32', json_encode($resultOpts));
        $thumbName = $cropKey . '.' . $hash . '.' . $this->cleanFilename($filenameOnly, $extension);


        if ($this->source->createObject($this->path, $thumbName, $thumbnail)) {
            $url = $this->source->getObjectUrl($this->path . $thumbName);
            return $this->success('', [
                'url' => $url,
                'options' => $resultOpts
            ]);
        }

        return $this->failure('Error creating crop file');
    }


    /**
     * Loads the Imagick or GD based Imagine service.
     *
     * @return bool|\Imagine\Gd\Imagine|\Imagine\Imagick\Imagine|null
     */
    private function getImagine()
    {
        if ($this->_imagine) {
            return $this->_imagine;
        }

        $classes = array('\Imagine\Imagick\Imagine', 'Imagine\Gd\Imagine');
        if ($this->modx->getOption('contentblocks.imagine_prefer_gd', null, false)) {
            $classes = array_reverse($classes);
        }

        $imagine = false;
        foreach ($classes as $class) {
            try {
                $imagine = new $class();
            } catch (\Imagine\Exception\RuntimeException $e) {
                $this->modx->log(modX::LOG_LEVEL_WARN, '[ContentBlocks] Unable of instantiating ' . $class . ' Imagine driver ' . $e->getMessage() . '.');
            }
            if ($imagine instanceof \Imagine\Image\ImagineInterface) {
                break;
            }
        }

        if ($imagine) {
            $this->_imagine =& $imagine;
            return $this->_imagine;
        }

        $this->modx->log(modX::LOG_LEVEL_ERROR, '[ContentBlocks] Unable of loading an Imagine instance for handling thumbnails, neither Imagick or GD extensions are available in the proper versions.');
        return false;
    }

    private function getCropInfo()
    {
        $crops = [];
        $properties = $this->field->get('properties');
        $properties = json_decode($properties, true);
        if (array_key_exists('crops', $properties) && !empty($properties['crops'])) {
            $def = $properties['crops'];

            $cropDefs = explode('|', $def);
            foreach ($cropDefs as $cropDef) {
                list($key, $opts) = explode(':', $cropDef);
                $opts = explode(',', $opts);
                foreach ($opts as $opt) {
                    list ($optKey, $optValue) = explode('=', $opt);
                    $crops[$key][$optKey] = $optValue;
                }
            }
        }
        return $crops;
    }

}

return 'ContentBlocksImageCropProcessor';
