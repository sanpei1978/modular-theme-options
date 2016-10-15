<?php

namespace ThemeOptions;

use SettingStore\Wp_Settings;

require_once LIB_PATH . '/class-wp-settings.php';

return [
	'display_name' => __( 'Settings', 'sanpeity' ),
	'domain' => 'sanpeity',
	'loader_id' => 'theme_options',
	'obj_options' => new Wp_Settings(), // The way of data store.
	'addons' => [ 'login-page', 'maintenance-page' ], // Using add-ons.
	'setting_sections' => [
		[
			'id'			=> 'setting_section_1',
			'title'		=> __( 'SECTION TITLE 1', 'sanpeity' ),
			'summary'	=> __( 'SECTION SUMMARY 1', 'sanpeity' ),
		],
		[
			'id'			=> 'setting_section_2',
			'title'		=> __( 'SECTION TITLE 2', 'sanpeity' ),
			'summary'	=> __( 'SECTION SUMMARY 2', 'sanpeity' ),
		],
	],
	'input_fields' => [],
];
