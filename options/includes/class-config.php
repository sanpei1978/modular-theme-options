<?php
/**
 * Copyright (c) 2016 sanpeity (https://github.com/sanpei1978)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
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
