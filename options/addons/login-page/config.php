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

namespace ThemeOptions;

require_once INCLUDES_PATH . '/class-wp-settings.php';

return [
	'display_name' => __( 'Login Page Settings', 'theme-options' ),
	'domain' => 'sanpeity',
	'data_store' => 'wp-settings', // The way of data store. "wp-options" or "wp-settings"
	'addons' => [], // Using other add-ons in the add-on. Next feature.
	'setting_sections' => [
		[
			'id'			=> 'setting_section_login_page_1',
			'title'		=> '',
			'summary'	=> '',
		],
	],
	'input_fields' => [
		[
			'id' => 'media-upload-bg_img',
			'title' => __( 'Choose background image', 'theme-options' ),
			'type' => 'media',
			'label' => __( 'Place of a image file', 'theme-options' ),
			'section' => 'setting_section_login_page_1',
			'validate' => [
				'rule' => 'url',
				'message' => __( 'Invalid url.', 'theme-options' ),
			],
		],
		[
			'id' => 'media-upload-logo_img',
			'title' => __( 'Choose logo image', 'theme-options' ),
			'type' => 'media',
			'label' => __( 'Place of a image file', 'theme-options' ),
			'section' => 'setting_section_login_page_1',
			'validate' => [
				'rule' => 'url',
				'message' => __( 'Invalid url.', 'theme-options' ),
			],
		],
		[
			'id' => 'media-upload-logo_img_h',
			'title' => '',
			'type' => 'hidden',
			'label' => '',
			'section' => 'setting_section_login_page_1',
		],
		[
			'id' => 'form-opacity',
			'title' => __( 'Form opacity', 'theme-options' ),
			'type' => 'text',
			'label' => __( 'default: 1.0, e.g. 0.93.', 'theme-options' ),
			'section' => 'setting_section_login_page_1',
			'validate' => [
				'rule' => 'float',
				'message' => __( 'Invalid opacity.', 'theme-options' ),
			],
		],
	],
];
