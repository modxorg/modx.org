<?php
/**
 * Searches modResources.
 */
class ContentBlocksResourceSearchProcessor extends modObjectGetListProcessor {
    public $classKey = 'modResource';
    public $languageTopics = array('resource');
    public $defaultSortField = 'pagetitle';
    public $includeIntrotext = true;
    public $context;
    protected $_resourceNames = array();
    protected $_contextNames = array();
    protected $limitToContext = false;


    public function initialize() {
        $this->context = $this->getProperty('context');
        $this->limitToContext = $this->getProperty('limitToContext', false);
        return parent::initialize();
    }

    /**
     * Adjust the query prior to the COUNT statement to only get top contenders.
     *
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');

        $c->where(array(
            'deleted' => false,
        ));
        $c->andCondition(array(
            'pagetitle:LIKE' => "%$query%",
            'OR:longtitle:LIKE' => "%$query%",
            'OR:menutitle:LIKE' => "%$query%",
            'OR:introtext:LIKE' => "%$query%",
        ));
        if($this->limitToContext && $this->context) {
            $c->andCondition(array(
               'context_key' => $this->context
            ));
        }
        if (is_numeric($query)) {
            $c->orCondition(array(
                'id' => (int)$query
            ));
        }

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
                    'parent:NOT IN' => $containerIds,
                    'and:id:NOT IN' => $containerIds
                ));
            }
        }

        $c->select($this->modx->getSelectColumns('modResource', 'modResource', '', array(
            'id',
            'pagetitle',
            'context_key',
            'introtext'
        )));

        $this->includeIntrotext = $this->modx->contentblocks->getOption('contentblocks.typeahead.include_introtext', null, true);

        return $c;
    }

    /**
     * Prepare the row into an array.
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object) {
        $charset = $this->modx->contentblocks->getOption('modx_charset', null, 'UTF-8');
        $objectArray = $object->toArray('', false, true);
        $objectArray['pagetitle'] = htmlentities($objectArray['pagetitle'], ENT_COMPAT, $charset);
        $objectArray['id'] = (string)$objectArray['id'];
        $objectArray['label'] = $objectArray['pagetitle'];
        $objectArray['tokens'] = array(
            (string)$objectArray['id'],
        );
        $objectArray['tokens'] += explode(' ', $objectArray['pagetitle']);
        $objectArray['tokens'] = array_unique($objectArray['tokens']);
        if (!$this->includeIntrotext) {
            $objectArray['introtext'] = '';
        }

        $crumbs = array();
        if (!$this->limitToContext) {
            $crumbs[] = $this->_getContextName($object->get('context_key'));
        }

        // Get the parents
        $parents = $this->modx->getParentIds($object->get('id'), 10, array('context' => $object->get('context_key')));
        // Flip the order so we to top > bottom
        $parents = array_reverse($parents);
        foreach ($parents as $id) {
            $crumb = $this->_getResourceTitle($id);
            if (!empty($crumb)) {
                $crumbs[] = $crumb;
            }
        }

        $objectArray['crumbs'] = implode(' &raquo; ', $crumbs);

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

    protected function _getContextName($key)
    {
        if (array_key_exists($key, $this->_contextNames)) {
            return $this->_contextNames[$key];
        }

        // Create a (safe) query for the context
        $c = $this->modx->newQuery('modContext');
        $c->select($this->modx->getSelectColumns('modContext', 'modContext', '', array('key', 'name')));
        $c->where(array(
            'key' => $key
        ));

        // Run it as a PDO statement; this bypasses ACLs and is also faster for this purpose.
        $c->prepare();
        $stmt = $this->modx->query($c->toSQL());
        if ($stmt->execute() && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->_contextNames[$row['key']] = $row['name'];
            return $row['name'];
        }
        return $key;
    }

    protected function _getResourceTitle($id)
    {
        if ($id < 1) {
            return '';
        }
        if (array_key_exists($id, $this->_resourceNames)) {
            return $this->_resourceNames[$id];
        }

        // Create a (safe) query for the resource
        $c = $this->modx->newQuery('modResource');
        $c->select($this->modx->getSelectColumns('modResource', 'modResource', '', array('id', 'pagetitle')));
        $c->where(array(
            'id' => $id
        ));

        // Run it as a PDO statement; this bypasses ACLs and is also faster for this purpose.
        $c->prepare();
        $stmt = $this->modx->query($c->toSQL());
        if ($stmt->execute() && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->_resourceNames[$row['id']] = $row['pagetitle'];
            return $row['pagetitle'];
        }
        return '#' . $id;
    }
}
return 'ContentBlocksResourceSearchProcessor';
