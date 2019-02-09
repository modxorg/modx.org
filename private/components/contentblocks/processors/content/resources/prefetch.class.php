<?php
/**
 * Prefetches a bunch of modResources that are most likely to get picked.
 */
require_once('search.class.php');
class ContentBlocksResourcePrefetchProcessor extends ContentBlocksResourceSearchProcessor {
    /**
     * Adjust the query prior to the COUNT statement to only get top contenders.
     *
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c) {

        $c->where(array(
            'parent' => 0,
            'published' => true,
            'deleted' => false,
        ));

        if($this->context) {
            $c->andCondition(array(
              'context_key' => $this->context,
            ));
        }
        /**
         * Preview and Workflow stores additional copies of resources under specific resources. This block of code
         * ensures that those revision copies don't show up in the link search.
         */
        $previewContainers = $this->modx->getOption('preview.resourceHolder');
        if (!empty($previewContainers)) {
          $pcs          = $this->modx->fromJSON($previewContainers);
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
            'context_key',
            'introtext'
        )));

        $this->includeIntrotext = $this->modx->contentblocks->getOption('contentblocks.typeahead.include_introtext', null, true);
        return $c;
    }
}
return 'ContentBlocksResourcePrefetchProcessor';
