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

require_once LIB_PATH . '/class-wp-settings.php';

return [
	'display_name' => __( 'Maintenance Mode Settings', 'theme-options' ),
	'domain' => 'sanpeity',
	'obj_options' => new \SettingStore\Wp_Settings(), // The way of data store.
	'addons' => [], // Using other add-ons in the add-on. Next feature.
	'setting_sections' => [
		[
			'id'			=> 'setting_section_maintenance_mode_1',
			'title'		=> '',
			'summary'	=> '',
		],
		[
			'id'			=> 'setting_section_maintenance_mode_2',
			'title'		=> esc_html__( 'Display content', 'theme-options' ),
			'summary'	=> '',
		],
	],
	'input_fields' => [
		[
			'id' => 'is_maintenance_mode',
			'title' => '',
			'type' => 'checkbox',
			'label' => esc_html__( 'Be maintenance mode', 'theme-options' ),
			'section' => 'setting_section_maintenance_mode_1',
		],
		[
			'id' => 'is-non-logged-in',
			'title' => '',
			'type' => 'checkbox',
			'label' => esc_html__( 'Only non-logged in user', 'theme-options' ),
			'section' => 'setting_section_maintenance_mode_1',
		],
		[
			'id' => 'maintenance-period',
			'title' => esc_html__( 'Period', 'theme-options' ),
			'type' => 'text',
			'label' => esc_html__( 'Period of maintenance. Free text.', 'theme-options' ),
			'section' => 'setting_section_maintenance_mode_2',
		],
		[
			'id' => 'contact-name',
			'title' => esc_html__( 'Name', 'theme-options' ),
			'type' => 'text',
			'label' => esc_html__( 'Your name', 'theme-options' ),
			'section' => 'setting_section_maintenance_mode_2',
		],
		[
			'id' => 'contact-address',
			'title' => esc_html__( 'Address', 'theme-options' ),
			'type' => 'text',
			'label' => esc_html__( 'Your address', 'theme-options' ),
			'section' => 'setting_section_maintenance_mode_2',
		],
		[
			'id' => 'contact-tel',
			'title' => esc_html__( 'TEL', 'theme-options' ),
			'type' => 'text',
			'label' => esc_html__( 'Your tel number', 'theme-options' ),
			'section' => 'setting_section_maintenance_mode_2',
		],
		[
			'id' => 'contact-fax',
			'title' => esc_html__( 'FAX', 'theme-options' ),
			'type' => 'text',
			'label' => esc_html__( 'Your fax number', 'theme-options' ),
			'section' => 'setting_section_maintenance_mode_2',
		],
	],
];
