<?php
/**
 */
class cbDefaultUpdateFromGridProcessor extends modProcessor {
    /** @var array $records */
    public $record;

    /**
     * @return bool|null|string
     */
    public function initialize() {
        $data = $this->getProperty('data');
        if (empty($data)) return $this->modx->lexicon('invalid_data');
        $this->record = $this->modx->fromJSON($data);
        if (empty($this->record)) return $this->modx->lexicon('invalid_data');
        return true;
    }

    /**
     * @return array|string
     */
    public function process() {
        if (empty($this->record['id'])) {
            return $this->failure($this->modx->lexicon('contentblocks.error.missing_id'));
        }

        $object = $this->modx->getObject('cbDefault', $this->record['id']);
        if (!$object) {
            return $this->failure($this->modx->lexicon('contentblocks.error.field_not_found'));
        }

        $object->fromArray($this->record);
        if ($object->save()) {
            return $this->success();
        }
        return $this->failure($this->modx->lexicon('contentblocks.error.error_saving_object'));
    }
}
return 'cbDefaultUpdateFromGridProcessor';
