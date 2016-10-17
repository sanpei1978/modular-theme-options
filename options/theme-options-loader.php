<?php
/*
Plugin Name: Theme Options
Author: Takuma Yamanaka
Plugin URI:
Description: More portable, simpler. A options framework for WordPress themes.
Version: 0.2.0
Author URI: https://github.com/sanpei1978
Domain Path: /languages
Text Domain: theme-options
*/

namespace ThemeOptions;

include  'lib/constants.php';

require_once LIB_PATH . '/class-theme-options.php';

new Theme_Options();
