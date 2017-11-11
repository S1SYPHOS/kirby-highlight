<?php

namespace S1SYPHOS\HIGHLIGHT;

use kirbytext;
use Highlight\Highlighter;
use c;

class Settings {

  /**
   * Returns the default options for `kirby-pep`
   *
   * @return array
   */

  public static function __callStatic($name, $args) {

    // Set prefix
    $prefix = 'plugin.kirby-highlight.';

    // Set config names and fallbacks as settings
    $settings = [

      // Languages to be auto-detected
      'languages' => ['html', 'php'],
      'escaping'  => false,
    ];

    // If config settings exist, return the config with fallback
    if(isset($settings) && array_key_exists($name, $settings)) {
      return c::get($prefix . $name, $settings[$name]);
    }
  }
}

kirbytext::$post[] = function($kirbytext, $value) {

  // Pattern to be matched when parsing kirbytext() (everything between <code> and </code>)
  $pattern = '~<code[^>]*>\K.*(?=</code>)~Uis';

  return preg_replace_callback($pattern, function($match) {

    // Instantiating highlighter & passing array of languages
    $highlighter = new Highlighter();
    $highlighter->setAutodetectLanguages(settings::languages());

    // Optionally escaping each match ..
    $input = settings::escaping() ? $match[0] : htmlspecialchars_decode($match[0]);

    // .. but always highlighting & outputting it
    $highlightedMatch = $highlighter->highlightAuto($input);
    $highlightedMatch = $highlightedMatch->value;

    return $highlightedMatch;

  }, $value);

};
