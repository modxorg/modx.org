<?php
/**
 * Gets a list of cbDefault objects.
 */
class cbDefaultGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'cbDefault';
    public $defaultSortField = 'sortorder';
    public $defaultSortDirection = 'ASC';
}
return 'cbDefaultGetListProcessor';
