<?php
$modx->lexicon->load('redactor:default');
$lang = $modx->lexicon->fetch();
$modx->smarty->assign('_lang',$lang);

$corePath = $modx->getOption('redactor.core_path', null, $modx->getOption('core_path') . 'components/redactor/');
return $modx->smarty->fetch($corePath.'elements/tvs/tpl/inputproperties.tpl');
