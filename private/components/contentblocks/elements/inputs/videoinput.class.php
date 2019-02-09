<?php
/**
 * Class CodeInput
 *
 * Displays a fancy Ace-powered syntax highlighter.
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class VideoInput extends cbBaseInput {
    public $defaultIcon = 'video';
    public $defaultTpl = '<div class="video-embed"><iframe src="//www.youtube.com/embed/[[+value]]" frameborder="0" allowfullscreen></iframe></div>';
    /**
     * @return array
     */
    public function getJavaScripts() {
        if ($this->contentBlocks->debug) {
            return array(
                $this->contentBlocks->config['assetsUrl'] . 'js/inputs/video.js',
            );
        }
        return array(
            $this->contentBlocks->config['assetsUrl'] . 'dist/inputs/video-min.js',
        );
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('video');
        $tpls[] = $this->contentBlocks->getCoreTpl('inputs/modals/video', 'contentblocks-modal-video');
        $tpls[] = $this->contentBlocks->getCoreTpl('inputs/partials/video_item', 'contentblocks-field-video-item');
        return $tpls;
    }
}
