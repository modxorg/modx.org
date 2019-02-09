id: 1
source: 2
name: getTime
description: 'Returns a Unix Timestamp by default, but can also be used to get the current date/time in any format with the &format property or to convert a timestamp to any date format using the &format and &timestamp property.'
category: 'Snippets and Output-Filters'
properties: 'a:0:{}'

-----

/*
 * getTime
 *
 * Returns a Unix Timestamp by default, but can also be used to get the current
 * date/time in any format with the &format property or to convert a timestamp
 * to any date format using the &format and &timestamp property.
 *
 * Usage examples:
 * [[!getTime]]
 * [[!getTime? &format=`%d.%m.%Y %H:%M:%S`]]
 * [[!getTime? &format=`%d.%m.%Y %H:%M:%S` &timestamp=`1456473956`]]
 *
 * @author Christian Seel <cs@seda.digital>
 */

$format = $modx->getOption('format', $scriptProperties, '');
$timestamp = $modx->getOption('timestamp', $scriptProperties, time());
if (empty($format)) return $timestamp;
return strftime($format, $timestamp);