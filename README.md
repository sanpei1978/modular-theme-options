# Theme Options Portable
[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg?style=flat-square)](https://github.com/sanpei1978/theme-options-portable/blob/master/LICENSE)
[![Wordpress: 4.6.1 tested](https://img.shields.io/badge/wordpress-4.6.1%20tested-brightgreen.svg?style=flat-square)](#)
[![PHP: 5.6](https://img.shields.io/badge/PHP-5.6-blue.svg?style=flat-square)](#)

More portable, simpler. A options framework for WordPress themes.
+ We can use a wrapper class for handling WordPress Settings API.
+ (Settings API store options data with wp_options table.)
+ We can make or choose the way to store the options data.
+ We can make or choose Add-ons for this framework.

## Next Feature

+ Improvement of the logic for front-end.
+ Support more input fields.
+ New Add-ons for this framework.
  + There is a Add-ons "login-page", "maintenance-mode" now.
+ New wrapper class for the other data store.

## Get Started

+ You must place "options" directory to your theme directory.
+ And then, include "options/theme-options-loader.php" in the Wordpress "functions.php".
+ Edit configurations. There are "options/config.php" and "options/addons/{ADD-ON ID}/config.php".
+ If you add new add-ons, edit "options/addons/addon-loader.php" to load new add-ons.

## Postscript

 英語しんどい。
