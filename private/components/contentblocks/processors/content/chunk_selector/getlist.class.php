<?php
/**
 * Gets a list of chunks
 */
class ContentChunkSelectorGetListProcessor extends modProcessor {
    public function process()
    {
        $fieldId = (int)$this->getProperty('field', 0);

        $field = $this->modx->getObject('cbField', array('input' => 'chunk_selector', 'id' => $fieldId));
        if (!$field) {
            return $this->failure($this->modx->lexicon('contentblocks.error.no_valid_field'));
        }

        $c = $this->modx->newQuery('modChunk');
        $c->sortby('name', 'ASC');

        $categories = (string)$field->get('available_categories');
        if (!empty($categories)) {

            // would love to leftJoin, but for some reason, the query gets all messed up and tries to prefix
            // category stuff with modChunk, and makes a big mess out of everything.
            $categoryIDs = array();
            $categoryNames = array();
            $categories = explode(',', $categories);

            foreach($categories as $category) {
                //  make sure 'item1, item2' works like 'item1,item2'
                $category = trim($category);
                // if it's numeric, stick it in the IDs array; if not, ready it for the query
                (is_numeric($category)) ? $categoryIDs[] = $category : $categoryNames[] = $category;
            }

            // get ids of any named categories
            if(!empty($categoryNames)) {
                $catQuery = $this->modx->newQuery('modCategory');
                $catQuery->where(array('category:IN' => $categoryNames));
                $catCollection = $this->modx->getCollection('modCategory', $catQuery);
                foreach($catCollection as $category) {
                    $categoryIDs[] = $category->get('id');
                }
            }
            $c->where(array('category:IN' => $categoryIDs));

        }

        $chunks = $field->get('available_chunks');
        $chunks = explode(',', $chunks);
        foreach ($chunks as &$ch) {
            //  make sure 'item1, item2' works like 'item1,item2'
            $ch = trim($ch);
            if (is_numeric($ch) && $ch > 0) $c->orCondition(array('id' => $ch));
            elseif (!empty($ch)) $c->orCondition(array('name' => $ch));
        }

        $results = array();
        $collection = $this->modx->getCollection('modChunk', $c);
        foreach ($collection as $chunk) {
            $results[] = $chunk->get(array('id', 'name', 'description', 'properties'));
        }

        if (empty($results)) {
            return $this->failure($this->modx->lexicon('contentblocks.error.no_chunks'));
        }

        return $this->outputArray($results);
    }
}
return 'ContentChunkSelectorGetListProcessor';
