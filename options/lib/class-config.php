<?php
/*
Plugin Name: Theme Options
Author: Takuma Yamanaka
Plugin URI:
Description: More portable, simpler. A options framework for WordPress themes.
Version: 0.3.0
Author URI: https://github.com/sanpei1978
Domain Path: /languages
Text Domain: theme-options
*/

namespace ThemeOptions;

class Config {

	private static $config_file_name = 'config.php';
	private static $configs = [];

	public static function get( $key = '', $addon_id = 'theme_options' ) {
		$addon_config = ADDON_PATH . '/' . $addon_id . '/' . self::$config_file_name;
		if ( 'theme_options' === $addon_id ) {
			$addon_config = ADMIN_PATH . '/' . self::$config_file_name;
		}
		if ( ! file_exists( $addon_config ) ) {
			return [];
		} else {
			$temp = require_once( $addon_config );
			if ( true !== $temp ) {
					self::$configs[ $addon_id ] = $temp;
			}
			if ( empty( $key ) ) {
				return self::$configs[ $addon_id ];
			}
			return self::$configs[ $addon_id ][ $key ];
		}
	}
}
