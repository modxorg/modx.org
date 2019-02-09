<?php
require_once(dirname(__FILE__) . '/imageinput.class.php');
/**
 * Class ImageInput
 *
 * @author Mark Hamstra
 * @package contentblocks
 */
class ImageWithTitleInput extends ImageInput {
    public $defaultIcon = 'image';
    public $defaultTpl = '<img src="[[+url]]" width="[[+width]]" height="[[+height]]" alt="[[+title:htmlent]]">';
    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = parent::getTemplates();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('image_with_title');
        return $tpls;
    }


    /**
     * Return an array of field properties. Properties are used in the component for defining
     * additional templates or other settings the site admin can define for the field.
     *
     * @return array
     */
    public function getFieldProperties()
    {
        $props = parent::getFieldProperties();
        $props[] = array(
            'key' => 'use_tinyrte',
            'fieldLabel' => $this->modx->lexicon('contentblocks.use_tinyrte'),
            'xtype' => 'contentblocks-combo-boolean',
            'default' => '1',
            'description' => $this->modx->lexicon('contentblocks.use_tinyrte.description.image')
        );
        return $props;
    }
}
