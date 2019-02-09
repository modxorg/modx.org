<?php
require_once(dirname(dirname(__FILE__)) . '/image/upload.class.php');

/**
 * Class ContentBlocksFileUploadProcessor
 */
class ContentBlocksFileUploadProcessor extends ContentBlocksImageUploadProcessor
{
    public $pathSetting = 'contentblocks.file.upload_path';
    public $allowedFileTypes = 'pdf,doc,docx,xls,xlsx,txt,ppt,pptx';
}

return 'ContentBlocksFileUploadProcessor';
