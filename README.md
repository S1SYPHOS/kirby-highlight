# Kirby Highlight
[![Release](https://img.shields.io/github/release/S1SYPHOS/kirby-highlight.svg)](https://github.com/S1SYPHOS/kirby-highlight/releases) [![License](https://img.shields.io/github/license/S1SYPHOS/kirby-highlight.svg)](https://github.com/S1SYPHOS/kirby-highlight/blob/master/LICENSE) [![Issues](https://img.shields.io/github/issues/S1SYPHOS/kirby-highlight.svg)](https://github.com/S1SYPHOS/kirby-highlight/issues)

This plugin highlights your code snippets server-side - without external dependencies.

- Code highlighting for everyone - no javascript needed
- Comprehensive: supports [176 languages](https://github.com/S1SYPHOS/kirby-highlight/tree/master/vendor/scrivo/highlight.php/Highlight/languages)
- Customisable: 79 different styles included

![screenshot of the kirby-highlight plugin](screenshot.gif)

**Table of contents**
- [1. Getting started](#getting-started)
- [2. Configuration](#configuration)
- [3. Styling](#styling)
- [4. Troubleshooting](#troubleshooting)
- [5. Credits / License](#credits--license)

## Getting started
Use one of the following methods to install & use `kirby-highlight`:

### Git submodule

If you know your way around Git, you can download this plugin as a [submodule](https://github.com/blog/2104-working-with-submodules):

```text
git submodule add https://github.com/S1SYPHOS/kirby-highlight.git site/plugins/kirby-highlight
```

### Composer

```text
composer require S1SYPHOS/kirby-highlight:dev-composer
```

### Clone or download

1. [Clone](https://github.com/S1SYPHOS/kirby-highlight.git) or [download](https://github.com/S1SYPHOS/kirby-highlight/archive/master.zip)  this repository.
2. Unzip / Move the folder to `site/plugins`.

### Activate the plugin
Activate the plugin with the following line in your `config.php`:

```text
c::set('plugin.kirby-highlight', true);
```

Now proper classes are added to your code snippets, making  them 'themeable'. In order to do so, head over to the [styling](#styling) section. If you want to activate `kirby-highlight` only on specific domains, read about [multi-environment setups](https://getkirby.com/docs/developer-guide/configuration/options).

## Configuration
Change `kirby-highlight` options to suit your needs:

| Option | Type | Default | Description |
| --- | --- | --- | --- |
| `plugin.kirby-highlight.class` | String | `'hljs'` | Sets class of surrounding `pre` container. |
| `plugin.kirby-highlight.languages` | Array | `['html', 'php']` | Defines languages to be auto-detected (currently 176 languages are supported). |
| `plugin.kirby-highlight.escaping` | Boolean | `false` | Enables character escaping (converting `<` to `&lt;`, `>` to `&gt;`, ..), see `htmlspecialchars()` [docs](http://php.net/manual/en/function.htmlspecialchars.php). |

## Styling
All `highlight.js` styles are fully compatible with `kirby-highlight`. Just include it using the `css()` [helper](https://getkirby.com/docs/cheatsheet/helpers/css):

```php
<?php echo css('assets/plugins/kirby-highlight/css/zenburn.css') ?>
```


## Troubleshooting
If in doubt, check the [correct spelling](https://github.com/S1SYPHOS/kirby-highlight/tree/master/vendor/scrivo/highlight.php/Highlight/languages) of the language in question - doing otherwise breaks `kirbytext()` (see [#2](https://github.com/S1SYPHOS/kirby-highlight/issues/2)).

## Credits / License
`kirby-highlight` is based on Geert Bergman's `highlight.php` library (a PHP port of [highlight.js](https://highlightjs.org)). It is licensed under the [MIT License](LICENSE), but **using Kirby in production** requires you to [buy a license](https://getkirby.com/buy). Are you ready for the [next step](https://getkirby.com/next)?

## Special Thanks
I'd like to thank everybody that's making great software - you people are awesome. Also I'm always thankful for feedback and bug reports :)
