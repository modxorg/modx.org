<?php
/**
 * Creates a cbDefault object.
 */
class cbDefaultCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'cbDefault';
    public $languageTopics = array('contentblocks:default');
    public $permission = array('contentblocks_defaults_new' => true, 'contentblocks_defaults_save' => true);

    /**
     * @return bool
     */
    public function beforeSet() {
        $so = $this->getProperty('sortorder');
        if ($so < 1) {
            $so = $this->modx->getCount('cbDefault');
        }
        $this->setProperty('sortorder', $so);
        return parent::beforeSet();
    }
}
return 'cbDefaultCreateProcessor';
