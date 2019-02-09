<?php
/**
 * Gets a list of snippets
 */
class ContentSnippetGetListProcessor extends modProcessor {
    public function process()
    {
        $fieldId = (int)$this->getProperty('field', 0);

        $field = $this->modx->getObject('cbField', array('input' => 'snippet', 'id' => $fieldId));
        if (!$field) {
            return $this->failure($this->modx->lexicon('contentblocks.error.no_valid_field'));
        }

        $c = $this->modx->newQuery('modSnippet');
        $c->sortby('name', 'ASC');

        $categories = (string)$field->get('categories');
        if (!empty($categories)) {
            $categories = explode(',', $categories);
            $c->where(array('category:IN' => $categories));
        }

        $snippets = $field->get('available_snippets');
        $snippets = explode(',', $snippets);
        foreach ($snippets as $s) {
            if (is_numeric($s) && $s > 0) $c->orCondition(array('id' => $s));
            elseif (!empty($s)) $c->orCondition(array('name' => $s));
        }

        $results = array();
        $collection = $this->modx->getCollection('modSnippet', $c);
        foreach ($collection as $snippet) {
            $results[] = $snippet->get(array('id', 'name', 'properties'));
        }

        if (empty($results)) {
            return $this->failure($this->modx->lexicon('contentblocks.error.no_snippets'));
        }

        return $this->outputArray($results);
    }
}
return 'ContentSnippetGetListProcessor';
