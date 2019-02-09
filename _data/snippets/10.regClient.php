id: 10
source: 2
name: regClient
category: 'Snippets and Output-Filters'
properties: 'a:0:{}'

-----

/*
 * regClient
 *
 * @usage [[!regClient? &input=`markup or script url here` &function=`htmlToBottom`]]
 */
$options = isset($options) ? $options : 'htmlToBottom';
$function = $modx->getOption('function', $scriptProperties, $options);
$plaintext = (strstr($input, PHP_EOL)) ? true : false;
switch ($function) {
    case 'cssToHead':
        $modx->regClientCSS($input);
        break;
    case 'htmlToHead':
        $modx->regClientStartupHTMLBlock($input);
        break;
    case 'htmlToBottom':
        $modx->regClientHTMLBlock($input);
        break;
    case 'jsToHead':
        $modx->regClientStartupScript($input,$plaintext);
        break;
    case 'jsToBottom':
        $modx->regClientScript($input,$plaintext);
        break;
}
return '';