<?php

namespace Kirby\Plugins\Highlight;

use kirbytext;
use Highlight\Highlighter;
use c;

kirbytext::$post[] = function ($kirbytext, $value) {
    /*
     * I. Adding `hljs` class to all `pre` elements
     */

    // Converting kirbytext to an HTML document
    // See https://secure.php.net/manual/en/class.domdocument.php
    $html = new DOMDocument();
    $html->loadHTML($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    // Retrieving all `pre` elements inside our newly created HTML document
    // See https://secure.php.net/manual/en/class.domxpath.php & https://en.wikipedia.org/wiki/XPath
    $query = new DOMXPath($html);
    $elements = $query->evaluate('//pre');

    // Looping through all `pre` elements, adding the class name
    foreach ($elements as $element) {
        $element->setAttribute('class', c::get('plugin.kirby-highlight.class', 'hljs'));
    }

    // Saving all changes
    $text = $html->saveHTML();


    /*
     * II. Highlighting everything between <code> and </code>
     */

    // Pattern to be matched when parsing kirbytext() (everything between <code> and </code>)
    $pattern = '~<code[^>]*>\K.*(?=</code>)~Uis';

    return preg_replace_callback($pattern, function ($match) {

        // Instantiating Highlighter & passing array of languages to be auto-detected
        $highlighter = new Highlighter();
        $highlighter->setAutodetectLanguages(c::get('plugin.kirby-highlight.languages', ['html', 'php']));

        // Optionally escaping each match ..
        $input = c::get('plugin.kirby-highlight.escaping', false) ? $match[0] : htmlspecialchars_decode($match[0]);

        // .. but always highlighting & outputting it
        $highlightedMatch = $highlighter->highlightAuto($input);
        $highlightedMatch = $highlightedMatch->value;

        return $highlightedMatch;
    }, $value);
};
