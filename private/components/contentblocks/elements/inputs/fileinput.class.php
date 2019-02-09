<?php
/**
 * Class fileInput
 * 
 * sweet! now you can upload files!.
 */
class fileInput extends cbBaseInput {
    public $defaultIcon = 'attachment';
    public $defaultTpl = '<li><a href="[[+url]]" title="[[+title]]">[[+title]] ([[+size:cbFileFormatSize]])</a></li>';
    public $defaultWrapperTpl = '<ul class="files">[[+files]]</ul>';

    /**
     * Load the template for the input, and also set a JS variable so the JS can find the connector.
     *
     * @return array
     */
    public function getTemplates()
    {    
        $tpls = array();
        $tpls[] = $this->contentBlocks->getCoreInputTpl('file');
        $tpls[] = $this->contentBlocks->getCoreTpl('inputs/partials/file_item', 'contentblocks-field-fileinput_file');
        return $tpls;
    }
    
    /**
     * @return array
     */
    public function getFieldProperties()
    {
        return array(
            array(
                'key' => 'wrapper_template',
                'fieldLabel' => $this->modx->lexicon('contentblocks.wrapper_template'),
                'xtype' => 'code',
                'default' => $this->defaultWrapperTpl,
                'description' => $this->modx->lexicon('contentblocks.file.wrapper_template.description')
            ),
            array(
                'key' => 'max_files',
                'fieldLabel' => $this->modx->lexicon('contentblocks.file.max_files'),
                'xtype' => 'numberfield',
                'default' => 12,
                'description' => $this->modx->lexicon('contentblocks.file.max_files.description')
            ),
            array(
                'key' => 'source',
                'fieldLabel' => $this->modx->lexicon('contentblocks.image.source'),
                'xtype' => 'contentblocks-combo-mediasource',
                'default' => 0,
                'description' => $this->modx->lexicon('contentblocks.image.source.description')
            ),
            array(
                'key' => 'directory',
                'fieldLabel' => $this->modx->lexicon('contentblocks.file.directory'),
                'xtype' => 'textfield',
                'default' => $this->contentBlocks->getOption('contentblocks.image.upload_path', null, 'assets/uploads/files/'),
                'description' => $this->modx->lexicon('contentblocks.file.directory.description')
            ),
            array(
                'key' => 'file_types',
                'fieldLabel' => $this->modx->lexicon('contentblocks.file.file_types'),
                'xtype' => 'textfield',
                'default' => 'pdf,doc,docx,xls,xlsx,txt,ppt,pptx',
                'description' => $this->modx->lexicon('contentblocks.file.file_types.description')
            ),
        );
    }

    /**
     * Process this field based on a row and a wrapper tpl
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */
    public function process(cbField $field, array $data = array())
    {  
        $settings = $data;
        unset($settings['files']);

        $rowTpl = $field->get('template');
        $wrapperTpl = $field->get('wrapper_template');

        $output = array();
        $idx = 1;
        foreach ($data['files'] as $file) {
            $file = array_merge($settings, $file);
            $file['idx'] = $idx;
            $output[] = $this->contentBlocks->parse($rowTpl, $file);
            $idx++;
        }
        $output = implode('', $output);
        $settings['total'] = count($data['files']);
        $settings['files'] = $output;
        return $this->contentBlocks->parse($wrapperTpl, $settings);
    }
}
