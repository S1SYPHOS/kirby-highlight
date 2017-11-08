# Kirby Highlight
[![Release](https://img.shields.io/github/release/S1SYPHOS/kirby-highlight.svg)](https://github.com/S1SYPHOS/kirby-highlight/releases) [![License](https://img.shields.io/github/license/S1SYPHOS/kirby-highlight.svg)](https://github.com/S1SYPHOS/kirby-highlight/blob/master/LICENSE) [![Issues](https://img.shields.io/github/issues/S1SYPHOS/kirby-highlight.svg)](https://github.com/S1SYPHOS/kirby-highlight/issues)

This plugin highlights your code snippets server-side - without external dependencies.

- Highlighting code for everyone - no javascript needed
- Customisable: 65 different styles included (more coming soon)

![screenshot of the kirby-highlight plugin](screenshot.gif)

**Table of contents**
- [1. Getting started](#getting-started)
- [2. Configuration](#configuration)
- [3. Styling](#styling)
- [4. Credits / License](#credits--license)

## Getting started
Use one of the following methods to install & use `kirby-highlight`:

### Git submodule

If you know your way around Git, you can download this plugin as a [submodule](https://github.com/blog/2104-working-with-submodules):

```text
git submodule add https://github.com/S1SYPHOS/kirby-highlight.git site/plugins/kirby-highlight
```

### Clone or download

1. [Clone](https://github.com/S1SYPHOS/kirby-highlight.git) or [download](https://github.com/S1SYPHOS/kirby-highlight/archive/master.zip)  this repository.
2. Unzip / Move the folder to `site/plugins`.

### Activate the plugin
Activate the plugin with the following line in your `config.php`:

```text
c::set('plugin.kirby-highlight', true);
``` 

## Configuration
Change `kirby-highlight` options to suit your needs:

| Option | Type | Default | Description |
| --- | --- | --- | --- |
| `plugin.kirby-highlight.languages` | Array | `['html', 'php']` | Defines languages to be auto-detected (currently over [135 languages](https://highlightjs.org/static/demo/) are supported). |

## Styling
To apply one of the many available stylesheets, just include it in your `<head>` element using the `css()` helper:

```php
<?php echo css('assets/plugins/kirby-highlight/css/zenburn.css') ?>
```

**Note: Most of the included themes depend some way or another on the class `.hljs` to be added to the code's container!**

In order to make sure the theme gets applied as planned, any of these methods will work: 
- Replace `.hljs` with `[class^="language-"]` in the included stylesheet
- Copy it to your `assets/css` directory and modify it
- Include the styles in your own workflow 

## Credits / License
`kirby-highlight` is based on Geert Bergman's `highlight.php` library (a PHP port of [highlight.js](https://highlightjs.org)). It is licensed under the [MIT License](LICENSE), but **using Kirby in production** requires you to [buy a license](https://getkirby.com/buy). Are you ready for the [next step](https://getkirby.com/next)?

## Special Thanks
I'd like to thank everybody that's making great software - you people are awesome. Also I'm always thankful for feedback and bug reports :)

