# Modular Theme Options
[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg?style=flat-square)](https://github.com/sanpei1978/theme-options-portable/blob/master/LICENSE)
[![Wordpress: 4.6.1 tested](https://img.shields.io/badge/wordpress-4.6.1%20tested-brightgreen.svg?style=flat-square)](#)
[![PHP: 5.6](https://img.shields.io/badge/PHP-5.6-blue.svg?style=flat-square)](#)

Modular Theme Options is a framework designed to facilitate the development of WordPress Themes options.
It have modular and scalable add-on architecture, so it is programable and portable.

+ Add-ons
 + We can make new theme options as add-ons.
 + You can move those together with a theme body easily to your other site.
 + Maybe you can transform those to WordPress Plugins as needed.
+ Data store
 + This framework use a wrapper class for handling WordPress Settings API.
  + Settings API allows admin pages containing settings forms to be managed semi-automatically. It store options data with wp_options table.
 + We can make new classes for storing options data.

## Next Feature

+ ~~Improvement of the logic for front-end.~~
+ Supporting more input fields.
+ New Add-ons for this framework.
 + There are Add-ons "login-page", "maintenance-mode","setting-pages"  now.
+ New wrapper class for the other data store.
 + There is a data store of the wp_options table used WordPress Settings API.

## Get Started

 + You must place "options" directory to your theme directory.
 + And then, include "options/theme-options-loader.php" in the Wordpress "functions.php".
 + Edit configurations. There are "options/config.php" and "options/addons/{ADD-ON ID}/config.php".
 + If you want a new add-on, make "config.php", "{NEW ADD-ON ID}.php" in "options/addons/{NEW ADD-ON ID}/".
 + And then, edit "options/addons/addon-loader.php" to load new add-ons.

## Postscript

 英語しんどい。
