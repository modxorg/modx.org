id: 8
name: calculateImgHeight
category: 'Snippets and Output-Filters'
properties: null

-----

if ($owidth == 0 || empty($owidth)) return " ";
if ($oheight == 0 || empty($oheight)) return " ";

$ratio = $oheight / $owidth;

$resizewidth = round($resizewidth * $ratio);

return $resizewidth;
