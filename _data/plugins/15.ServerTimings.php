id: 15
source: 2
name: ServerTimings
description: 'Adds server timing information to chrome''s network tab.'
category: SEDA.digital
properties: 'a:0:{}'

-----

/**
 * Servertimings
 *
 * @project:    snippets
 * @author:     Jens Külzer <jk@seda.digital>
 * @date:       2917-02-27 15:30
 * @copyright:  2017 SEDA.digital GmbH & Co. KG
 *
 */

// quick exit if not logged in
if ($modx->user->id === 0 || !$modx->resource ) {
    return;
}

if (!isset($modx->serverTiming)) $modx->serverTiming = array();
$modx->serverTiming[preg_replace('/(?<!\ )[A-Z]/', ' $0', ltrim($modx->event->name, 'On'))] = microtime(true);

// quick if not last event
if ( $modx->event->name !== "OnWebPagePrerender" ) {
    return;
}

// calculate timing steps
$timediffs = array();
$diff = $modx->startTime;
$idx = 1;
foreach ($modx->serverTiming as $e => $time) {
    $timediffs[] = array($e => sprintf("%2.5F",  $time - $diff ));
    $diff = $time;
    $idx++;
}

// get the timings, code from modresponse.class.php
$totalTime= (microtime(true) - $modx->startTime);
$queryTime= $modx->queryTime;
$queries= isset ($modx->executedQueries) ? $modx->executedQueries : 0;
$phpTime= $totalTime - $queryTime;
$queryTime= sprintf("%2.5F", $queryTime);
$totalTime= sprintf("%2.5F", $totalTime);
$phpTime= sprintf("%2.5F", $phpTime);
$source= $modx->resourceGenerated ? "DB" : "cache";

$modxTimings = array();
$modxTimings[] = array("CMS Total Time" => $totalTime);
$modxTimings[] = array("PHP Execution Time" => $phpTime);
$modxTimings[] = array("Query Time (". $source .", #". $queries . ")" => $queryTime);

$modxTimings = array_merge($modxTimings,$timediffs);

$timing_header = "Server-Timing: ".implode(',', array_map( function($k, $v) {
    $n = array_keys($v);
    $t = array_values($v);
    return $k.";dur=".round($t[0]*1000).';desc="'.trim($n[0]).'"';
}, array_keys($modxTimings), $modxTimings));

header($timing_header);