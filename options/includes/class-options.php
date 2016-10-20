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

namespace ThemeOptions\SettingStore;

use \ThemeOptions\Config;

require_once 'class-wp-settings.php';
require_once \ThemeOptions\INCLUDES_PATH . '/class-config.php';

if ( 'wp-settings' === Config::get( 'obj_options' ) ) {
	class Options extends WP_Settings {
		// Use base class.
	}
}

if ( 'wp-options' === Config::get( 'obj_options' ) ) {
	class Options extends WP_Options {
		// Use base class.
	}
}
