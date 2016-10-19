<?php
/*
Plugin Name: Modular Theme Options
Author: Takuma Yamanaka
Plugin URI:
Description: A framework designed to facilitate the development of WordPress Themes options.
Version: 0.4.0
Author URI: https://github.com/sanpei1978
Domain Path: /languages
Text Domain: theme-options
*/

namespace ThemeOptions;

include  'lib/constants.php';

load_plugin_textdomain( 'theme-options', false, '../themes/' . get_template() . '/options/languages' );

require_once LIB_PATH . '/class-theme-options.php';

new Theme_Options();
