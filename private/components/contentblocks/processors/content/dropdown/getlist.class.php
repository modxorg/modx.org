<?php
/**
 * Gets a list of available options for the dropdown input (or derivatives)
 */
class ContentSelectGetListProcessor extends modProcessor {
    /** @var ContentBlocks */
    public $contentblocks;
    public function initialize()
    {
        $corePath = $this->modx->getOption('contentblocks.core_path', null, $this->modx->getOption('core_path').'components/contentblocks/');
        $this->contentblocks = $this->modx->getService('contentblocks', 'ContentBlocks', $corePath . 'model/contentblocks/');
        return $this->contentblocks instanceof ContentBlocks;
    }
    /**
     * @return array|string
     */
    public function process()
    {
        $resourceId = (int)$this->getProperty('resource', 0);
        $resource = $this->modx->getObject('modResource', array('id' => $resourceId));
        if ($resource instanceof modResource) {
            $this->contentblocks->setResource($resource);
        }

        $fieldId = (int)$this->getProperty('field', 0);

        /** @var cbField|null $field */
        $field = $this->modx->getObject('cbField', array('input' => 'dropdown', 'id' => $fieldId));
        if (!$field) {
            return $this->failure($this->modx->lexicon('contentblocks.error.no_valid_field'));
        }

        $this->contentblocks->loadInputs();
        $input = array_key_exists('dropdown', $this->contentblocks->inputs) ? $this->contentblocks->inputs['dropdown'] : false;
        if (!($input instanceof DropdownInput)) {
            return $this->failure($this->modx->lexicon('contentblocks.error.no_valid_input'));
        }

        $options = $input->getSelectOptions($field);

        return $this->outputArray($options);
    }
}
return 'ContentSelectGetListProcessor';
