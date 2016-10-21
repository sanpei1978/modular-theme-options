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

interface Interface_Options {

	public function add_option( $option, $value, $deprecated = '', $autoload = 'yes' );
	public function update_option( $option, $newvalue, $autoload = null );
	public function get_option( $default = false );
	public function delete_option( $option );
	public function set_option( $option );
	public function initialize();
	public function terminate();
	public function fill();
	public function __get( $property_name );

}
