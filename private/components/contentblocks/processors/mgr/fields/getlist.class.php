<?php
/**
 * Gets a list of cbField objects.
 */
class cbFieldGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'cbField';
    public $defaultSortField = 'sortorder';
    public $defaultSortDirection = 'ASC';

    /**
     * {@inheritDoc}
     * @return boolean
     */
    public function initialize() {
        $this->modx->contentblocks->loadInputs();
        return parent::initialize();
    }

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

        $parent = (int)$this->getProperty('parent', 0);
        $c->where(array(
          'parent' => $parent,
        ));

        if ($ids = $this->getProperty('ids')) {
            $ids = array_map('trim',explode(",",$ids));

            $c->where(array(
              'cbField.id:IN' => $ids,
            ));
        }

        if ($inputs = $this->getProperty('inputs')) {
            $c->where(array(
                'cbField.input:IN' => explode(',',$inputs),
            ));
        }

        if ($input = $this->getProperty('type')) {
            $c->where(array(
              'cbField.input:IN' => array($input),
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
              'cbField.category' => $category,
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
        $array['input_display'] = $array['input'];

        // Try to get a lexicon value for the input
        $input = $array['input'];
        if (isset($this->modx->contentblocks->inputs[$input]) && ($this->modx->contentblocks->inputs[$input] instanceof cbInput)) {
            $array['input_display'] = $this->modx->contentblocks->inputs[$input]->getName();
        }

        if (empty($array['category_name'])) {
            $array['category_name'] = $this->modx->lexicon('contentblocks.uncategorized');
        }

        // Turn into JSON so the JS can easily interact with the data
        $array['properties'] = $this->modx->fromJSON($array['properties']);
        $array['parent_properties'] = $this->modx->fromJSON($array['parent_properties']);
        $array['availability'] = $this->modx->fromJSON($array['availability']);
        $array['settings'] = $this->modx->fromJSON($array['settings']);
        return $array;
    }
}
return 'cbFieldGetListProcessor';
