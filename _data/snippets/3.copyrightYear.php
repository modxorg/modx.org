id: 3
source: 2
name: copyrightYear
description: 'Returns the year for the copyright statement. Specify the &start property with the year that the website launched to get a year range in the next year.'
category: 'Snippets and Output-Filters'
properties: 'a:0:{}'

-----

/*
 * copyrightYear
 *
 * Returns the year for the copyright statement. Specify the &start property
 * with the year that the website launched to get a year range in the next year.
 *
 * Usage examples:
 * [[!copyrightYear]]
 * [[!copyrightYear? &start=`2010`]]
 *
 * @author Christian Seel <cs@seda.digital>
 */

$firstYear = !empty($start) ? $start : strftime("%Y");
$currentYear = strftime("%Y");

if ($firstYear == $currentYear) {
  $output = $currentYear;
} else {
  $output = $firstYear.' - '.$currentYear;
}

return $output;