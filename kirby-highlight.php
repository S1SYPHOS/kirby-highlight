<?php

/**
 * Kirby Highlight - Server-side syntax highlighting for Kirby
 *
 * @package   Kirby CMS
 * @author    S1SYPHOS <hello@twobrain.io>
 * @link      http://twobrain.io
 * @version   0.1.0-beta
 * @license   MIT
 */

if(!c::get('plugin.kirby-highlight')) return;

// Initializing composer's autoloader
require  __DIR__ . DS . 'vendor' . DS . 'autoload.php'; 

// Loading core
require  __DIR__ . DS . 'core' . DS . 'syntax_highlight.php';

