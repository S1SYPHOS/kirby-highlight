<?php

namespace S1SYPHOS\HIGHLIGHT;

use kirbytext;
use Highlight;
use c;

kirbytext::$post[] = function($kirbytext, $value) {

  // Pattern to be matched when parsing kirbytext() (everything between <code> and </code>)
  $pattern = '~<code[^>]*>\K.*(?=</code>)~Uis';

  return preg_replace_callback($pattern, function($match) {

    // Instantiating highlighter & passing array of languages
    $highlighter = new Highlight\Highlighter();
    $highlighter->setAutodetectLanguages(c::get('plugin.kirby-highlight.languages'));

    // Decoding each match, highlighting & outputting it
    $decodedMatch = htmlspecialchars_decode($match[0]); 
    $highlightedMatch = $highlighter->highlightAuto($decodedMatch);
    $highlightedMatch = $highlightedMatch->value;

    return $highlightedMatch;

  }, $value);

};

