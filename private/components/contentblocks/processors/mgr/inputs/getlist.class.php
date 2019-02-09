<?php

/**
 * Class ContentBlocksInputsGetListProcessor
 */
class ContentBlocksInputsGetListProcessor extends modProcessor {
    /**
     * @return array
     */
    public function getLanguageTopics () {
        return array('contentblocks:default');
    }
    /**
     * @return mixed
     */
    public function process()
    {
        $this->modx->contentblocks->loadInputs();

        $inputs = array();
        foreach ($this->modx->contentblocks->inputs as $name => $input) {
            /** @var cbBaseInput $input */
            $inputs[] = array(
                'id' => $name,
                'value' => $name,
                'display' => $input->getName(),
                'description' => $input->getDescription(),
                'properties' => $input->getFieldProperties(),
                'parent_properties' => $input->getParentProperties(),
                'defaultIcon' => $input->defaultIcon,
                'defaultTpl' => $input->defaultTpl,
            );
        }

        return $this->modx->toJSON(array(
            'total' => count($inputs),
            'results' => $inputs
        ));
    }
}
return 'ContentBlocksInputsGetListProcessor';
