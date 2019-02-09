<?php

/**
 * The main ContentBlocks Manager Controller.
 * In this class, we define stuff we want on all of our controllers.
 */
abstract class ContentblocksManagerController extends modExtraManagerController {
    /** @var ContentBlocks $contentblocks */
    public $contentblocks = null;

    /**
     * Initializes the main manager controller. In this case we set up the
     * ContentBlocks class and add the required javascript on all controllers.
     */
    public function initialize() {
        /* Instantiate the ContentBlocks class in the controller */
        $corePath = $this->modx->getOption('contentblocks.core_path',null,$this->modx->getOption('core_path').'components/contentblocks/');
        $this->contentblocks = $this->modx->getService('contentblocks', 'ContentBlocks', $corePath . 'model/contentblocks/');

        /* Add the main javascript class and our configuration */
        $this->addJavascript($this->contentblocks->config['assetsUrl'].'cmp/js/contentblocks.class.js');
        //$this->addCss($this->contentblocks->config['cssUrl'].'mgr/contentblocks.css');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            ContentBlocksComponent.config = '.$this->modx->toJSON($this->contentblocks->config).';
        });
        </script>');
    }

    /**
     * Defines the lexicon topics to load in our controller.
     * @return array
     */
    public function getLanguageTopics() {
        return array('contentblocks:default');
    }

    /**
     * We can use this to check if the user has permission to see this
     * controller. We'll apply this in the admin section.
     * @return bool
     */
    public function checkPermissions() {
        return $this->modx->context->checkPolicy('contentblocks_component');
    }

    public function loadRichTextEditor() {
        $useEditor = $this->modx->getOption('use_editor');
        $whichEditor = $this->modx->getOption('which_editor');
        if ($useEditor && !empty($whichEditor))
        {
            // invoke the OnRichTextEditorInit event
            $onRichTextEditorInit = $this->modx->invokeEvent('OnRichTextEditorInit',array(
                'editor' => $whichEditor, // Not necessary for Redactor
                'elements' => array('foo'), // Not necessary for Redactor
            ));
            if (is_array($onRichTextEditorInit))
            {
                $onRichTextEditorInit = implode('', $onRichTextEditorInit);
            }
            $this->setPlaceholder('onRichTextEditorInit', $onRichTextEditorInit);
        }
    }
}

/**
 * The Index Manager Controller is the default one that gets called when no
 * action is present. It's most commonly used to define the default controller
 * which then hands over processing to the other controller ("home").
 */
class IndexManagerController extends ContentBlocksManagerController {
    /**
     * Defines the name or path to the default controller to load.
     * @return string
     */
    public static function getDefaultController() {
        return 'mgr/home';
    }
}
