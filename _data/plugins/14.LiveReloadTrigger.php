id: 14
source: 2
name: LiveReloadTrigger
category: SEDA.digital
properties: 'a:0:{}'

-----

$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkSave':
    case 'OnDocFormSave':
    case 'OnTemplateSave':
    case 'OnTemplateVarSave':
        $touch = touch ( MODX_CORE_PATH . '/cache/reload.html');
        break;
}