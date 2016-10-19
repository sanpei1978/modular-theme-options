<?php
/*
Plugin Name: Theme Options
Author: Takuma Yamanaka
Plugin URI:
Description: More portable, simpler. A options framework for WordPress themes.
Version: 0.4.0
Author URI: https://github.com/sanpei1978
Domain Path: /languages
Text Domain: theme-options
*/

namespace SettingStore;

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
