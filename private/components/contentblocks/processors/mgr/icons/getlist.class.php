<?php

class ContentBlocksIconsGetListProcessor extends modProcessor {

    public $customIconPath = '';
    public $customIconUrl = '';
    public $coreIconPath = '';
    public $coreIconUrl = '';

    /**
     * {@inheritDoc}
     * @return boolean
     */
    public function initialize() {
        $this->customIconPath = $this->modx->contentblocks->config['customIconPath'];
        $this->customIconUrl = $this->modx->contentblocks->config['customIconUrl'];
        $this->coreIconPath = $this->modx->contentblocks->config['assetsPath'].'img/icons/';
        $this->coreIconUrl = $this->modx->contentblocks->config['assetsUrl'].'img/icons/';
        return parent::initialize();
    }
    
    /**
     * @return mixed
     */
    public function process()
    {
        $icons = array();
        if($this->customIconPath && $customIcons = $this->getIconsFromPath($this->customIconPath)) {
            $icons = array_merge($customIcons, $icons);
        }
        
        if($this->coreIconPath && $coreIcons = $this->getIconsFromPath($this->coreIconPath)) {
            $icons = array_merge($coreIcons, $icons);
        }
        
        if(count($icons)) {
            return $this->modx->toJSON(array(
                'total' => count($icons),
                'results' => $icons
            ));            
        }
        return $this->failure($this->modx->lexicon('contentblocks.error.no_icons'));
    }
    
    public function getIconsFromPath($path) {
        if ($handle = opendir($path)) {
            $icons = array();
            
            $icon_type = ($path == $this->coreIconPath) ? 'core' : 'custom';
            $base_url = ($icon_type == 'core') ? $this->coreIconUrl : $this->customIconUrl;
            
            while(($file = readdir($handle)) !== false) {
                if (in_array($file, array('.', '..'))) continue;

                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if ($ext == 'png') {
                    $fileName = pathinfo($file, PATHINFO_FILENAME);
                    if (substr($fileName, -3) == '@2x') continue;
                    $icons[] = array(
                        'value' => $fileName,
                        'icon_url' => $base_url . $file,
                        'icon_type' => $icon_type,
                    );
                }
            }
            return $icons;
        }
        return false;
    }
}
return 'ContentBlocksIconsGetListProcessor';
