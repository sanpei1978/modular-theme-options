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

require_once 'class-wp-settings.php';
require_once 'class-wp-options.php';

class Options {
	public static function get( $data_store_id, $options_page, $optons_group, $options_sections, $options_name, $input_field ) {
		$data_store_class = '';
		if ( 'wp-settings' === $data_store_id ) {
			$data_store_class = 'ThemeOptions\SettingStore\WP_Settings';
		} elseif ( 'wp-options' === $data_store_id ) {
			$data_store_class = 'ThemeOptions\SettingStore\WP_Options';
		}
		if ( $data_store_class ) {
			return new $data_store_class(
				$options_page,
				$optons_group,
				$options_sections,
				$options_name,
				$input_field
			);
		} else {
			return false;
		}
	}
}
