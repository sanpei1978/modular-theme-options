<?php

namespace ThemeOptions;

if ( function_exists( 'wp_get_theme' ) ) {
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
} else {
	$theme_data = get_theme_data( get_template_directory() . '/style.css' );
	$theme_version = $theme_data['Version'];
	$theme_name = $theme_data['Name'];
	$theme_uri = $theme_data['ThemeURI'];
	$author_uri = $theme_data['AuthorURI'];
}

if ( ! defined( 'ADMIN_PATH__' ) ) {
	define( 'ADMIN_PATH__', get_template_directory() . '/options' );
}
const ADMIN_PATH = ADMIN_PATH__;

if ( ! defined( 'ADMIN_DIR__' ) ) {
	define( 'ADMIN_DIR__', get_template_directory_uri() . '/options' );
}
const ADMIN_DIR = ADMIN_DIR__;

const ADDON_PATH = ADMIN_PATH . '/addons';
const LIB_PATH = ADMIN_PATH . '/lib';
const JS_DIR = ADMIN_DIR . '/assets/js';
const JS_PATH = ADMIN_PATH . '/assets/js';

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
