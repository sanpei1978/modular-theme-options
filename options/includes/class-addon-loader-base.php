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

require_once 'interface-addon-loader.php';

class Addon_Loader_Base implements Interface_Addon_Loader {

	private $obj_options;
	private $display_name;

	public function __construct( $addon_id, $loader_id, $config ) {

		$this->obj_options = SettingStore\Options::get(
			$config['data_store'],
			$loader_id . '_' . $addon_id,
			$loader_id . '_' . $addon_id,
			$config['setting_sections'],
			$config['domain'] . '_' . $loader_id . '_' . $addon_id,
			$config['input_fields']
		);
		if ( ! $this->obj_options ) {
			die( __( 'configration error : data_store', 'theme-options' ) );
		}

		$this->display_name = $config['display_name'];

		require_once( ADDON_PATH . '/' . $addon_id . '/' . $addon_id . '.php' );

	}

	public function initialize() {
		$this->obj_options->initialize();
	}

	public function fill_fields() {
		$this->obj_options->set_option( $this->obj_options->get_option() );
		$this->obj_options->fill();
	}

	public function __get( $property_name ) {
		if ( 'options_name' === $property_name ) {
			return $this->obj_options->options_name;
		} elseif ( 'obj_options' === $property_name ) {
			 return $this->obj_options;
		} elseif ( 'display_name' === $property_name ) {
			return $this->display_name;
		} elseif ( 'form_action' === $property_name ) {
			return $this->obj_options->form_action;
		}
	}

}
