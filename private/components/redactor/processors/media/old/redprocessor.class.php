<?php
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
 

abstract class redProcessor extends modProcessor {
    /** @var Redactor */
	public $redactor;
    /** @var modMediaSource */
	public $source;
    /** @var modTemplateVar|null */
    public $tv;
    
    protected $sourceSetting = 'redactor.mediasource';

    /**
     * Loads the {@see Redactor} class.
     *
     * @return bool
     */
    public function initialize() {
    	$corePath = $this->modx->getOption('redactor.core_path', null, $this->modx->getOption('core_path').'components/redactor/');
		$this->redactor = $this->modx->getService('redactor', 'Redactor', $corePath . 'model/redactor/');
		if (!($this->redactor instanceof Redactor)) {
		    $this->modx->log(modX::LOG_LEVEL_ERROR, '[Redactor] Error loading Redactor service class.');
            return false;
		}

        $resource = $this->getProperty('resource', 0);
        if ($resource > 0) {
            $this->redactor->setResource((int)$resource);
        }

	    return parent::initialize();
    }

    /**
     * @return array
     */
    public function getLanguageTopics() {
        return array('file'); // not sure if this or another language topic is needed?
    }

    /**
     * @return boolean|string
     */
    public function getSource() {
        $this->modx->loadClass('sources.modMediaSource');
        $mediaSourceId = $this->redactor->getOption($this->sourceSetting, null, $this->redactor->getOption('default_media_source', null, 1), true);

        $tvId = (int)$this->getProperty('tv');
        if ($tvId > 0) {
            $tv = $this->modx->getObject('modTemplateVar', $tvId);
            if ($tv instanceof modTemplateVar && ($tv->get('type') == 'redactor')) {
                $this->tv =& $tv;
                $properties = $tv->get('input_properties');
                if (is_array($properties) && isset($properties['mediasource']) && $properties['mediasource'] > 0) {
                    $mediaSourceId = $properties['mediasource'];
                }
            }
        }

        /** @var modMediaSource $source */
        $this->source = modMediaSource::getDefaultSource($this->modx, $mediaSourceId);
        if (!$this->source->getWorkingContext()) {
            return $this->modx->lexicon('permission_denied');
        }
        $this->source->setRequestProperties($this->getProperties());
        return $this->source->initialize();
    }

    /**
     * Sanitizes the provided file name.
     *
     * @param $fname
     *
     * @return string
     */
    public function sanitizeFileName($fname) {
        $replace=$this->redactor->getOption('redactor.sanitizeReplace', null, '_');
        $pattern=$this->redactor->getOption('redactor.sanitizePattern', null, "/([[:alnum:]_\.-]*)/");
        $fname=str_replace(str_split(preg_replace($pattern,$replace,$fname)),$replace,$fname);
        return $fname;
    }

    /**
     * Encodes data as JSON for Redactor.
     *
     * @param array $array
     * @param bool $count
     *
     * @return string
     */
    public function outputArray(array $array,$count = false) {
        return $this->modx->toJSON($array);
    }
}
return 'redProcessor';
