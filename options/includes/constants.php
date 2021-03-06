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

if ( is_child_theme() ) {
	$temp_obj = wp_get_theme();
	$theme_obj = wp_get_theme( $temp_obj->get( 'Template' ) );
} else {
	$theme_obj = wp_get_theme();
}

$theme_version = $theme_obj->get( 'Version' );
$theme_name = $theme_obj->get( 'Name' );
$theme_uri = $theme_obj->get( 'ThemeURI' );
$author_uri = $theme_obj->get( 'AuthorURI' );

if ( ! defined( 'ADMIN_PATH__' ) ) {
	define( 'ADMIN_PATH__', get_template_directory() . '/options' );
}
const ADMIN_PATH = ADMIN_PATH__;

if ( ! defined( 'ADMIN_DIR__' ) ) {
	define( 'ADMIN_DIR__', get_template_directory_uri() . '/options' );
}
const ADMIN_DIR = ADMIN_DIR__;

const ADDON_PATH = ADMIN_PATH . '/addons';
const ADDON_DIR = ADMIN_DIR . '/addons';
const INCLUDES_PATH = ADMIN_PATH . '/includes';
const JS_DIR = ADMIN_DIR . '/assets/js';
const JS_PATH = ADMIN_PATH . '/assets/js';
const FRONTEND_PATH = INCLUDES_PATH . '/frontends';

if ( ! defined( 'THEME_NAME__' ) ) {
	define( 'THEME_NAME__', $theme_name );
}
if ( ! defined( 'THEME_VERSION__' ) ) {
	define( 'THEME_VERSION__', $theme_version );
}
if ( ! defined( 'THEME_URI__' ) ) {
	define( 'THEME_URI__', $theme_uri );
}
if ( ! defined( 'THEME_AUTHOR_URI__' ) ) {
	define( 'THEME_AUTHOR_URI__', $author_uri );
}
const THEME_NAME = THEME_NAME__;
const THEME_VERSION = THEME_VERSION__;
const THEME_URI = THEME_URI__;
const THEME_AUTHOR_URL = THEME_AUTHOR_URI__;
