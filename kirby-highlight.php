<?php

/**
 * Kirby Highlight - Themeable server-side syntax highlighting for Kirby
 *
 * @package   Kirby CMS
 * @author    S1SYPHOS <hello@twobrain.io>
 * @link      http://twobrain.io
 * @version   0.5.0
 * @license   MIT
 */

if (c::get('plugin.kirby-highlight', true)) {
    // Loading settings & core
    require_once __DIR__ . DS . 'core' . DS . 'syntax_highlight.php';
}
