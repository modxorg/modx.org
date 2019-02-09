<?php

/**
 * Class RedactorBaseProcessor
 *
 * Handles getting a Redactor instance and loading up the right media source
 */
abstract class RedactorBaseProcessor extends modProcessor {
    /** @var Redactor */
    public $redactor;

    /** @var modMediaSource */
    public $source;

    /**
     * Prepare the processor by loading the media source
     *
     * @return boolean
     */
    public function initialize()
    {
        header('Content-Type: application/json');
        $corePath = $this->modx->getOption('redactor.core_path', null, $this->modx->getOption('core_path').'components/redactor/');
        /**
         * Attempt to load the Redactor service class. Log error and halt processing if it fails.
         */
        $this->redactor = $this->modx->getService('redactor', 'Redactor', $corePath . 'model/redactor/');
        if (!($this->redactor instanceof Redactor)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[Redactor] Error loading Redactor service class.');
            return false;
        }

        $resource = (int)$this->getProperty('resource');
        if ($resource > 0) {
            $this->redactor->setResource($resource);
        }

        return $this->getSource();
    }

    /**
     * @return bool|null|string
     */
    protected function getSource()
    {
        $tvId = (int)$this->getProperty('tv');
        if (!$this->source && $tvId > 0) {
            $tv = $this->modx->getObject('modTemplateVar', $tvId);
            if ($tv instanceof modTemplateVar && ($tv->get('type') == 'redactor')) {
                $properties = $tv->get('input_properties');
                if (is_array($properties) && isset($properties['mediasource']) && $properties['mediasource'] > 0) {
                    $this->source = $this->modx->getObject('sources.modMediaSource', $properties['mediasource']);
                }
            }
        }

        $id = (int)$this->getProperty('s', 0);
        if (!$this->source && $id > 0) {
            $this->source = $this->modx->getObject('sources.modMediaSource', $id);
        }

        return $this->validateSource();
    }

    /**
     * Checks if we have a valid source and initialises it if so.
     *
     * @return bool|null|string
     */
    protected function validateSource()
    {
        if (!$this->source || !$this->source->getWorkingContext()) {
            return $this->modx->lexicon('permission_denied');
        }
        $this->source->setRequestProperties($this->getProperties());
        if ($this->source && $this->source->initialize()) {
            return true;
        }
        return 'Could not load requested Media Source';
    }
}