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

require_once INCLUDES_PATH . '/class-addon-loader-base.php';

class Addon_Loader extends Addon_Loader_Base {
	public function __construct( $addon_id, $loader_id, $config ) {
		parent::__construct( $addon_id, $loader_id, $config );
		if ( 'login-page' === $addon_id ) {
			new Addon\Login_Page( $this->options_name, $this->obj_options );
		}
		if ( 'maintenance-mode' === $addon_id ) {
			new Addon\Maintenance_Mode( $this->options_name, $this->obj_options );
		}
		if ( 'setting-pages' === $addon_id ) {
			new Addon\Setting_Pages( $this->options_name, $this->obj_options );
		}
		/*
		if ( 'PLUGIN_ID' === $addon_id ) {
			new Addon\PLUGIN_CLASS( $this->options_name, $this->obj_options );
		}
		*/
	}
}
