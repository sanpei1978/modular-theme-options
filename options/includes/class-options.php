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
