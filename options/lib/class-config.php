<?php

namespace ThemeOptions;

class Config {

	private static $config_file_name = 'config.php';

	public static function get( $addon_id = '' ) {
		if ( empty( $addon_id ) ) {
			return require_once( ADMIN_PATH . '/' . self::$config_file_name );
		} else {
			$addon_config = ADDON_PATH . '/' . $addon_id . '/' . self::$config_file_name;
			if ( ! file_exists( $addon_config ) ) {
				return [];
			} else {
				return require( $addon_config );
			}
		}
	}

}
