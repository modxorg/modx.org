<?php
/**
 * Prefetches a bunch of modResources that are most likely to get picked.
 */
class RedactorResourcePrefetchProcessor extends modObjectGetListProcessor {
    public $classKey = 'modResource';
    public $languageTopics = array('resource');
    public $defaultSortField = 'pagetitle';
    public $includeIntrotext = true;

    /**
     * Adjust the query prior to the COUNT statement to only get top contenders.
     *
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $this->includeIntrotext = $this->modx->redactor->getOption('redactor.typeahead.include_introtext', null, true);

        $c->where(array(
            'parent' => 0,
            'published' => true,
            'deleted' => false,
        ));

        /**
        * Preview and Workflow stores additional copies of resources under specific resources. This block of code
        * ensures that those revision copies don't show up in the link search.
        */
        $previewContainers = $this->modx->getOption('preview.resourceHolder');
        if (!empty($previewContainers)) {
           $pcs = $this->modx->fromJSON($previewContainers);
           $containerIds = array_values($pcs);
           if (!empty($containerIds)) {
               $c->andCondition(array(
                   'id:NOT IN' => $containerIds,
               ));
           }
        }

        $c->select($this->modx->getSelectColumns('modResource', 'modResource', '', array(
            'id',
            'pagetitle',
            ($this->includeIntrotext) ? 'introtext' : null,
            'context_key'
        )));

        return $c;
    }

    /**
     * Prepare the row into an array.
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object) {
        $charset = $this->modx->redactor->getOption('modx_charset', null, 'UTF-8');
        $objectArray = $object->toArray('', false, true);
        $objectArray['pagetitle'] = htmlentities($objectArray['pagetitle'], ENT_COMPAT, $charset);
        $objectArray['tokens'] = array(
            (string)$objectArray['id'],
            $objectArray['pagetitle'],
            $objectArray['introtext']
        );
        if (!$this->includeIntrotext) unset($objectArray['introtext']);
        return $objectArray;
    }

    /**
     * Return arrays of objects (with count) converted to JSON.
     *
     * The JSON result includes two main elements, total and results. This format is used for list
     * results.
     *
     * @access public
     * @param array $array An array of data objects.
     * @param mixed $count The total number of objects. Used for pagination.
     * @return string The JSON output.
     */
    public function outputArray(array $array,$count = false) {
        return $this->modx->toJSON($array);
    }
}
return 'RedactorResourcePrefetchProcessor';
