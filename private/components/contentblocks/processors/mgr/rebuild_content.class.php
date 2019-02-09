<?php

/**
 * Class ContentBlocksRebuildProcessor
 */
class ContentBlocksRebuildProcessor extends modProcessor {
    public $current = 0;
    public $total = 0;
    public $totalRebuild = 0;
    public $totalSkipped = 0;
    public $totalSkippedBroken = 0;
    public $updateProgressInterval = 1;
    public $contexts = array();

    public function checkPermissions()
    {
        return $this->modx->context->checkPolicy('contentblocks_rebuild_content');
    }

    /** @var ContentBlocks */
    public $contentBlocks;

    public function getLanguageTopics() {
        return array('contentblocks:default');
    }
    public function initialize() {
        $corePath = $this->modx->getOption('contentblocks.core_path', null, $this->modx->getOption('core_path') . 'components/contentblocks/');
        $this->contentBlocks =& $this->modx->getService('contentblocks', 'ContentBlocks', $corePath . 'model/contentblocks/');
        return parent::initialize();
    }

    public function process()
    {
        @set_time_limit(0);
        error_reporting(E_ERROR | E_WARNING | E_PARSE);

        // Get the total count of resources to inform the user
        $this->total = $this->modx->getCount('modResource');

        // Estimate the time it will take, based on a save time of 0.5s per resource
        $estimate = ceil($this->total / 2 / 60);
        $this->modx->log(modX::LOG_LEVEL_INFO,
            $this->modx->lexicon('contentblocks.rebuild_content.resources_found', array(
                'total' => $this->total,
                'estimate' => $estimate
            ))
        );

        // To prevent too many messages on large sites, we limit the number of times we send a progress % update
        // with a maximum of 100 updates (after all, 100%) throughout the process.
        $this->updateProgressInterval = ceil($this->total / 100);

        // Grab parser & inputs to prepare for parsing
        $this->modx->log(modX::LOG_LEVEL_INFO, $this->modx->lexicon('contentblocks.rebuild_content.loading_dependencies'));
        $this->modx->getParser();
        $this->contentBlocks->loadParser();
        $this->contentBlocks->loadInputs();
        $this->modx->log(modX::LOG_LEVEL_INFO, $this->modx->lexicon('contentblocks.rebuild_content.loaded_dependencies'));

        // Sleep for a second to make the above messages be read first
        sleep (1);

        // Loop over all resources in the site
        foreach ($this->modx->getIterator('modResource') as $resource) {
            // Update the progress indicator
            $this->updateProgress();

            $this->contentBlocks->setResource($resource);
            // Make sure the resource is allowed to use CB, based on class_key and context
            if (!$this->contentBlocks->useContentBlocks($resource)) {
                $this->totalSkipped++;
                $this->modx->log(modX::LOG_LEVEL_INFO, $this->modx->lexicon('contentblocks.rebuild_content.skipping_not_allowed', array(
                    'id' => $resource->id,
                    'pagetitle' => $resource->pagetitle,
                    'class_key' => $resource->class_key
                )));
                continue;
            }

            // Make sure the resource has been saved with CB before
            /** @var modResource $resource */
            $isCb = $resource->getProperty('_isContentBlocks', 'contentblocks');
            if (!$isCb) {
                $this->totalSkipped++;
                $this->modx->log(modX::LOG_LEVEL_INFO, $this->modx->lexicon('contentblocks.rebuild_content.skipping_not_used', array(
                    'id' => $resource->id,
                    'pagetitle' => $resource->pagetitle,
                )));
                continue;
            }

            // Sleep for 150ms to cool down + not to send too many messages to the console at once
            usleep (150000);
            
            // Grab the raw JSON content
            $cbJson = $resource->getProperty('content', 'contentblocks');
            $cbContent = $this->modx->fromJSON($cbJson);
            
            // Fire the RenderContent Event that allows plugins to  change the content
            $response = $this->modx->invokeEvent('ContentBlocks_RenderContent', array(
                'cbContent' => $cbContent,
                'cbJson' => $cbJson,
                'resource' => $resource
            ));
            // check if customized content was returned
            if (!empty($response) && is_array($response) && json_encode($response) !== '[""]') {
    		    $cbContent = $response[0]['cbContent'];
    		    $cbJson = $response[0]['cbJson'];
    	    }

            // Fire the RebuildContent Event to allow plugins to listen to rebuilds specifically
            $this->modx->invokeEvent('ContentBlocks_RebuildContent', array(
                'cbContent' => $cbContent,
                'resource' => $resource
            ));

            // Make sure the raw content is valid before trying to parse it.
            if (empty($cbContent) || !is_array($cbContent)) {
                $this->totalSkippedBroken++;
                $this->modx->log(modX::LOG_LEVEL_ERROR, $this->modx->lexicon('contentblocks.rebuild_content.skipping_corrupt', array(
                    'id' => $resource->id,
                    'pagetitle' => $resource->pagetitle,
                )));
                continue;
            }
            // Parse the resource again!
            $this->parse($resource, $cbContent);
        }

        // Send a log of what's been done
        $this->modx->log(modX::LOG_LEVEL_INFO, $this->modx->lexicon('contentblocks.rebuild_content.done', array(
            'total' => $this->total,
            'total_skipped' => $this->totalSkipped,
            'total_skipped_broken' => $this->totalSkippedBroken,
            'total_rebuild' => $this->totalRebuild,
        )));
        
        // Fire the AfterRebuildContent Event to allow plugins to listen to the completed action
        $this->modx->invokeEvent('ContentBlocks_AfterRebuildContent', array(
            'total' => $this->total,
            'total_skipped' => $this->totalSkipped,
            'total_skipped_broken' => $this->totalSkippedBroken,
            'total_rebuild' => $this->totalRebuild,
        ));

        if (intval($this->modx->contentblocks->getOption('contentblocks.clear_cache_after_rebuild', null, true))) {
            $contexts = array_keys($this->contexts);
            $this->modx->log(modX::LOG_LEVEL_INFO, $this->modx->lexicon('contentblocks.rebuild_content.clear_cache', array(
                'contexts' => implode(', ', $contexts)
            )));
            $this->modx->cacheManager->refresh(array(
                'db' => array(),
                'auto_publish' => array('contexts' => $contexts),
                'context_settings' => array('contexts' => $contexts),
                'resource' => array('contexts' => $contexts),
            ));
            $this->modx->log(modX::LOG_LEVEL_INFO, $this->modx->lexicon('contentblocks.rebuild_content.clear_cache_complete'));
        }

        // Send COMPLETED and sleep for 2s to properly exit the console.
        $this->modx->log(modX::LOG_LEVEL_INFO, 'COMPLETED');
        sleep (2);
        return $this->success();
    }

    /**
     * @param modResource $resource
     * @param array $content
     */
    public function parse(modResource $resource, array $content = array())
    {
        $this->contentBlocks->uniqueIdx = 0;
        $this->contentBlocks->setResource($resource);
        $this->modx->elementCache = array();
        $this->modx->resource = $resource;

        $summary = $this->contentBlocks->summarizeContent($content);
        $parsedContent = $this->contentBlocks->generateHtml($content);

        $resource->setProperties(array(
            'linear' => $summary['linear'],
            'fieldcounts' => $summary['fieldcounts']
        ), 'contentblocks', true);
        $resource->setContent($parsedContent);
        if ($resource->save()) {
            $this->totalRebuild++;
            $this->modx->log(modX::LOG_LEVEL_INFO, 'Rebuilt #' . $resource->id . ' (' . $resource->pagetitle . ')');
            $this->contexts[$resource->context_key] = true;
        }
    }

    public function updateProgress()
    {
        $this->current++;
        if (($this->current % $this->updateProgressInterval) == 0) {
            $percent = ceil($this->current / $this->total * 100);
            $this->modx->log(modX::LOG_LEVEL_INFO, 'PROGRESS:'.$percent);
        }
    }
}

return 'ContentBlocksRebuildProcessor';
