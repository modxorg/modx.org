<?php
require_once dirname(__FILE__) . '/redprocessor.class.php';
/**
 * Choose Redactor Images.
 *
 * @param string $file The absolute path of the file
 * @param string $name Will rename the file if different
 * @param string $content The new content of the file
 *
 * @package modx
 * @subpackage processors.browser.file
 */
class RedactorFileBrowserProcessor extends redProcessor {
    public $browseRecursive;
    public $rootPath = '';
    public $browsePath = 'file_browse_path';
    public $uploadPath = 'file_upload_path';
    public $browseWarn = 'redactor.browse_files_warning';
    protected $sourceSetting = 'redactor.file_mediasource';
    protected $patch_11291 = true;
    
    public function initialize() {
        $success = parent::initialize();
        $this->browseRecursive   = (bool)$this->redactor->getOption('redactor.browse_recursive', null, true);
        $vd = $this->modx->getVersionData();
        $this->patch_11291 = (bool)((bool)$this->redactor->getOption('redactor.patch_11291', null, true) && version_compare('2.2.15-pl',$vd['full_version'],'<='));
        return $success;
    }

    /**
     * @return array|bool|string
     */
    public function process() {
        /**
         * Load the modMediaSource
         */
        $loaded = $this->getSource();
        if (!($this->source instanceof modMediaSource)) return $loaded;
        
        $path = $this->redactor->getOption('redactor.'.$this->browsePath,null,$this->modx->getOption('redactor.'.$this->uploadPath,null,'assets/uploads/'));
        if ($this->tv) {
            $properties = $this->tv->get('input_properties');
            if (isset($properties[$this->browsePath]) && !empty($properties[$this->browsePath])) {
                $path = $properties[$this->browsePath];
            } elseif (isset($properties[$this->uploadPath]) && !empty($properties[$this->uploadPath])) {
                $path = $properties[$this->uploadPath];
            }
        }
        $this->rootPath = $this->redactor->parsePathVariables($path);

        $files = $this->addFiles($this->rootPath);
        if(count($files)) usort($files, array($this, 'sortFiles'));
        else {
            $this->modx->getService('lexicon','modLexicon');
            $ck = $this->modx->cultureKey || 'en';
            $this->modx->lexicon->load("$ck:redactor:default");
            $message = $this->modx->lexicon($this->browseWarn,array('path' => $this->rootPath)); 
            if(!$message && $ck != 'en') { // try english then
                $this->modx->lexicon->load("en:redactor:default");
                $message = $this->modx->lexicon($this->browseWarn,array('path',$this->rootPath));
            }
            $files[] = array('message' => $message);
        }
        return $this->outputArray($files);
    } 
    
    protected function handleFile($image,&$files = array()) {
            if($this->browseRecursive && $image['type'] == 'dir') { /* back to the end of the line buddy */
	            $files = $this->addFiles($image['pathRelative'],$files);  
            }
            elseif($image['type'] == 'file') {
                $imageUrl = $image['url'];
                if ($this->patch_11291) $imageUrl = $this->removeDuplicatePaths($image,$imageUrl);
                $json = array(
                    'title' => $image['id'],
                    'name' => pathinfo($imageUrl, PATHINFO_FILENAME) . '.' . pathinfo($imageUrl, PATHINFO_EXTENSION),
                    'link' => $imageUrl,
                    'size' => ($image['size']) ? $image['size'] : "n/a",
                    'extension' => pathinfo($imageUrl, PATHINFO_EXTENSION),
                );
                if ($this->browseRecursive) $json['folder'] = dirname($image['pathRelative']);
                $files[] = $json;
            }
    }
    
    protected function addFiles($path, array &$files = array()) {
        $filesInPath = $this->source->getContainerList($path);
        $modAuth = $this->modx->user->getUserToken('mgr');

        /**
         * Loop over files and create thumbs.
         */
        foreach($filesInPath as $image) {
			$this->handleFile($image,$files);
        }
        
        return $files;
    }
    
    public function sortFiles($a,$b) {
    	if($a['folder'] == $this->rootPath) return -1;
    	if(strcmp($a['folder'],$b['folder']) > 0) return 1;
    	return (strcmp($a['title'],$b['title']) > 0) ? 1 : -1;
    }
    
    protected function removeDuplicatePaths($file,$imageUrlAbsolute) {
        $filename = pathinfo($imageUrlAbsolute, PATHINFO_FILENAME) . '.' . pathinfo($imageUrlAbsolute, PATHINFO_EXTENSION);
        $path = str_replace($filename,'',$file['pathRelative']);
        return str_replace($path . $path, $path, $imageUrlAbsolute);
    }

}
return 'RedactorFileBrowserProcessor';
