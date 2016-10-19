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

interface Interface_Options {

	public function add_option( $option, $value, $deprecated = '', $autoload = 'yes' );
	public function update_option( $option, $newvalue, $autoload = null );
	public function get_option( $option, $default = false );
	public function delete_option( $option );
	public function initialize(
		$options_page = '',
		$options_group = '',
		$setting_sections = array(),
		$options_name = '',
		$input_fields
	);
	public function terminate();
	public function fill();
	public function __get( $property_name );

}
