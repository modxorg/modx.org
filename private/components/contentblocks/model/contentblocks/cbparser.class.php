<?php

/**
 * Class cbParser
 *
 * Overwritten parser class that has been tweaked to only parse placeholders and resource fields, but nothing else.
 * Unfortunately the modParser did not provide the flexibility needed to pre-process ContentBlocks content safely,
 * so the custom parser is required.
 */
class cbParser extends modParser {

    /**
     * Hardcodes the $tokens variable to [+,*], to only allow parsing placeholders and resource fields.
     *
     * @param string $parentTag
     * @param string $content
     * @param bool $processUncacheable
     * @param bool $removeUnprocessed
     * @param string $prefix
     * @param string $suffix
     * @param array $tokens
     * @param int $depth
     * @return int
     */
    public function processElementTags($parentTag, & $content, $processUncacheable= false, $removeUnprocessed= false, $prefix= "[[", $suffix= "]]", $tokens= array (), $depth= 0) {
        // Only placeholders and resource fields are allowed, like, ever.
        $tokens = array('+', '*');
        return parent::processElementTags($parentTag, $content, $processUncacheable, $removeUnprocessed, $prefix, $suffix, $tokens, $depth);
    }
}
