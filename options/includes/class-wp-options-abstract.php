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

abstract class WP_Options_Abstract {

	public function add_option( $option, $value, $deprecated = '', $autoload = 'yes' ) {
		return add_option( $option, $value, $autoload, $autoload );
	}

	public function update_option( $option, $newvalue, $autoload = null ) {
		return update_option( $option, $newvalue, $autoload );
	}

	public function delete_option( $option ) {
		return delete_option( $option );
	}

	abstract public function sanitize_callback( $input );
	abstract public function section_callback( array $args );
	abstract public function write_input_field( array $args );

}