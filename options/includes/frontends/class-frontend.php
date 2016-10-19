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

namespace ThemeOptions\FrontEnd;

use \ThemeOptions\Config;

require_once 'class-material.php';
require_once 'class-bootstrap.php';
require_once \ThemeOptions\INCLUDES_PATH . '/class-config.php';

if ( 'material' === Config::get( 'frontend' ) ) {
	class Front_End extends Material_Ui_Lite {
		// Use base class.
	}
}
if ( 'bootstrap' === Config::get( 'frontend' ) ) {
	class Front_End extends Bootstrap_4 {
		// Use base class.
	}
}
