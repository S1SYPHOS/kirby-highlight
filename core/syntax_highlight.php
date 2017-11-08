<?php

namespace S1SYPHOS\HIGHLIGHT;

use kirbytext;
use Highlight\Highlighter;
use c;

kirbytext::$post[] = function($kirbytext, $value) {

  // Pattern to be matched when parsing kirbytext() (everything between <code> and </code>)
  $pattern = '~<code[^>]*>\K.*(?=</code>)~Uis';

  return preg_replace_callback($pattern, function($match) {

    // Instantiating highlighter & passing array of languages
    $highlighter = new Highlighter();
    $highlighter->setAutodetectLanguages(c::get('plugin.kirby-highlight.languages') ? c::get('plugin.kirby-highlight.languages') : array('html', 'php'));

    // Decoding each match, highlighting & outputting it
    $decodedMatch = htmlspecialchars_decode($match[0]); 
    $highlightedMatch = $highlighter->highlightAuto($decodedMatch);
    $highlightedMatch = $highlightedMatch->value;

    return $highlightedMatch;

  }, $value);

};

