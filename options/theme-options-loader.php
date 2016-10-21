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

include  'includes/constants.php';

load_plugin_textdomain( 'theme-options', false, '../themes/' . get_template() . '/options/languages' );

require_once INCLUDES_PATH . '/class-theme-options.php';

new Theme_Options();
