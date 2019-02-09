<?php
/**
 * Gets a list of cbLayout objects.
 */
class cbLayoutGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'cbLayout';
    public $defaultSortField = 'sortorder';
    public $defaultSortDirection = 'ASC';

    /**
     * Can be used to adjust the query prior to the COUNT statement
     *
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $c->leftJoin('cbCategory', 'Category');
        $c->select($this->modx->getSelectColumns($this->classKey, $this->classKey));
        $c->select($this->modx->getSelectColumns('cbCategory', 'Category', 'category_', array('id', 'name')));
        if($ids = $this->getProperty('ids')) {
            $ids = explode(',', $ids);
            $c->where(array(
                'cbLayout.id:IN' => $ids,
            ));
        }

        if ($searchTerm = $this->getProperty('search')) {
            $c->where(array(
              'name:LIKE' => '%'.$searchTerm.'%',
              'OR:description:LIKE' => '%'.$searchTerm.'%',
              'OR:id:LIKE' => '%'.$searchTerm.'%',
            ));
        }

        if ($category = $this->getProperty('category')) {
            $c->where(array(
              'category' => $category,
            ));
        }

        return $c;
    }

    /**
     * @param xPDOObject $object
     *
     * @return array
     */
    public function prepareRow(xPDOObject $object) {
        $array = $object->toArray('', false, true);
        if (empty($array['category_name'])) {
            $array['category_name'] = $this->modx->lexicon('contentblocks.uncategorized');
        }
        $array['columns'] = $this->modx->fromJSON($array['columns']);
        $array['availability'] = $this->modx->fromJSON($array['availability']);
        $array['settings'] = $this->modx->fromJSON($array['settings']);
        return $array;
    }
}
return 'cbLayoutGetListProcessor';
