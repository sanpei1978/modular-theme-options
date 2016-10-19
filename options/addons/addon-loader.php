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

require_once INCLUDES_PATH . '/class-addon-loader-base.php';

class Addon_Loader extends Addon_Loader_Base {
	public function __construct( $addon_id, $loader_id, $config ) {
		parent::__construct( $addon_id, $loader_id, $config );
		if ( 'login-page' === $addon_id ) {
			new Addon\Login_Page( $this->options_name, $this->obj_options );
		}
		if ( 'maintenance-mode' === $addon_id ) {
			new Addon\Maintenance_Mode( $this->options_name, $this->obj_options );
		}
		if ( 'setting-pages' === $addon_id ) {
			new Addon\Setting_Pages( $this->options_name, $this->obj_options );
		}
		/*
		if ( 'PLUGIN_ID' === $addon_id ) {
			new Addon\PLUGIN_CLASS( $this->options_name, $this->obj_options );
		}
		*/
	}
}
