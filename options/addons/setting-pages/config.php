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
	'display_name' => __( 'Setting Pages', 'theme-options' ),
	'domain' => 'sanpeity',
	'data_store' => 'wp-settings', // The way of data store. "wp-options" or "wp-settings"
	'addons' => [], // Using other add-ons in the add-on. Next feature.
	'setting_sections' => [
		[
			'id'			=> 'setting_section_setting_pages_1',
			'title'		=> esc_html__( 'User Profile', 'theme-options' ),
			'summary'	=> '',
		],
	],
	'input_fields' => [
		[
			'id' => 'is-add-settings-user-profile',
			'title' => '',
			'type' => 'checkbox',
			'label' => esc_html__( 'Add settings on User Profile', 'theme-options' ),
			'section' => 'setting_section_setting_pages_1',
		],
	],
];
