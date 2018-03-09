<?php

namespace Kirby\Plugins\Highlight;

use kirbytext;
use Highlight\Highlighter;
use c;

kirbytext::$post[] = function ($kirbytext, $value) {
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
