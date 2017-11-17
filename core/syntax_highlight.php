<?php

namespace S1SYPHOS\HIGHLIGHT;

use kirbytext;
use Highlight\Highlighter;
use c;

class Settings {

  /**
   * Returns the default options for `kirby-highlight`
   *
   * @return array
   */

  public static function __callStatic($name, $args) {

    // Set prefix
    $prefix = 'plugin.kirby-highlight.';

    // Set config names and fallbacks as settings
    $settings = [
      'languages' => ['html', 'php'], // Languages to be auto-detected
      'escaping'  => false, // Enables / disables character escaping
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
