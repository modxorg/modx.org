<?php

/**
 * The name of the controller is based on the path (home) and the
 * namespace (contentblocks). This home controller is the main client view.
 */
class ContentblocksMgrHomeManagerController extends ContentblocksManagerController {
    /**
     * Any specific processing we need on the Admin controller.
     * @param array $scriptProperties
     */
    public function process(array $scriptProperties = array()) {
        $this->loadRichTextEditor();
    }

    /**
     * The pagetitle to put in the <title> attribute.
     * @return null|string
     */
    public function getPageTitle() {
        return $this->modx->lexicon('contentblocks');
    }

    /**
     * Register all the needed javascript files. Using this method, it will automagically
     * combine and compress them if enabled in system settings.
     */
    public function loadCustomCssJs() {
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/combos.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/grid.availability.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/grid.categories.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/grid.defaults.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/grid.fields.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/grid.layoutcolumns.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/grid.layouts.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/grid.repeater_groups.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/grid.settings.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/grid.templates.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.availability.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.categories.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.defaults.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.fields.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.import.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.layoutcolumns.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.layouts.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.rebuild_content.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.repeater_groups.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.settings.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.template_builder.js');
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/widgets/window.templates.js');

        $this->addCss($this->contentblocks->config['assetsUrl'].'css/mgr.css');

        $this->addLastJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/sections/home.js');

        $this->loadContentBlocksCanvas();
    }

    /**
     * The name for the template file to load.
     * @return string
     */
    public function getTemplateFile() {
        return $this->contentblocks->config['templatesPath'].'home.tpl';
    }

    public function loadContentBlocksCanvas()
    {
        // Generate a wrapper class to apply, so we can target stuff in CSS
        $wrapperCls = array();
        $wrapperCls[] = 'type_contentblocks_component';
        $modxVersion = $this->modx->getVersionData();
        if (version_compare($modxVersion['full_version'], '2.3.0-dev', '>=')) {
            $wrapperCls[] = 'modx_v23';
        }
        $wrapperCls = implode(' ', $wrapperCls);

        // Config
        $config = $this->modx->toJSON($this->contentblocks->config);

        $this->addHtml(<<<HTML
<script type="text/javascript">
    var ContentBlocksConfig = $config,
        ContentBlocksWrapperCls = "$wrapperCls";

</script>
HTML
);
        // Assets
        $html = $this->contentblocks->getAssets();
        $this->addHtml($html);
    }
}
