<?php
/*
Plugin Name: Theme Options
Author: Takuma Yamanaka
Plugin URI:
Description: More portable, simpler. A options framework for WordPress themes.
Version: 0.3.0
Author URI: https://github.com/sanpei1978
Domain Path: /languages
Text Domain: theme-options
*/

namespace ThemeOptions;

require_once LIB_PATH . '/class-wp-settings.php';

return [
	'display_name' => __( 'Settings', 'theme-options' ),
	'domain' => 'sanpeity',
	'loader_id' => 'theme_options',
	'obj_options' => new \SettingStore\Wp_Settings(), // The way of data store.
	'addons' => [ 'login-page', 'maintenance-mode', 'setting-pages' ], // Using add-ons.
	'frontend' => 'material', // or bootstrap(but not implement yet.)
	'setting_sections' => [
		[
			'id'			=> 'setting_section_1',
			'title'		=> __( 'Usable add-ons', 'theme-options' ),
			'summary'	=> '',
		],
		[
			'id'			=> 'setting_section_2',
			'title'		=> __( 'SECTION TITLE 2', 'theme-options' ),
			'summary'	=> __( 'SECTION SUMMARY 2', 'theme-options' ),
		],
		[
			'id'			=> 'setting_section_3',
			'title'		=> __( 'SECTION TITLE 3', 'theme-options' ),
			'summary'	=> __( 'SECTION SUMMARY 3', 'theme-options' ),
		],
	],
	'input_fields' => [],
];
