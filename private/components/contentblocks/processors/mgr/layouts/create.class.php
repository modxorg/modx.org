<?php
/**
 * Creates a cbLayout object.
 */
class cbLayoutCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'cbLayout';
    public $languageTopics = array('contentblocks:default');
    public $permission = array('contentblocks_layouts_new' => true, 'contentblocks_layouts_save' => true);

    /**
     * @return bool
     */
    public function beforeSet() {
        $this->setCheckbox('layout_only_nested', true);

        $sort = (int)$this->getProperty('sortorder', 0);
        if ($sort < 1) {
            $sort = $this->modx->getCount($this->classKey) + 1;
            $this->setProperty('sortorder', $sort);
        }
        return parent::beforeSet();
    }
}
return 'cbLayoutCreateProcessor';
