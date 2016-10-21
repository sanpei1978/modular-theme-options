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

namespace ThemeOptions\SettingStore\FrontEnd;

use \ThemeOptions\Config;

require_once 'class-material.php';
require_once 'class-bootstrap.php';
require_once \ThemeOptions\INCLUDES_PATH . '/class-config.php';

if ( 'material' === Config::get( 'frontend' ) ) {
	class Front_End extends Material_Ui_Lite {
		// Use base class.
	}
}
if ( 'bootstrap' === Config::get( 'frontend' ) ) {
	class Front_End extends Bootstrap_4 {
		// Use base class.
	}
}
