<?php

namespace ThemeOptions;

use SettingStore\Wp_Settings;

require_once LIB_PATH . '/class-wp-settings.php';

return [
	'display_name' => __( 'Settings', 'sanpeity' ),
	'domain' => 'sanpeity',
	'loader_id' => 'theme_options',
	'obj_options' => new Wp_Settings(), // The way of data store.
	'addons' => [ 'login-page', 'maintenance-mode' ], // Using add-ons.
	'frontend' => 'material', // or bootstrap(but not implement yet.)
	'setting_sections' => [
		[
			'id'			=> 'setting_section_1',
			'title'		=> __( 'Usable add-ons', 'sanpeity' ),
			'summary'	=> '',
		],
		[
			'id'			=> 'setting_section_2',
			'title'		=> __( 'SECTION TITLE 2', 'sanpeity' ),
			'summary'	=> __( 'SECTION SUMMARY 2', 'sanpeity' ),
		],
		[
			'id'			=> 'setting_section_3',
			'title'		=> __( 'SECTION TITLE 3', 'sanpeity' ),
			'summary'	=> __( 'SECTION SUMMARY 3', 'sanpeity' ),
		],
	],
	'input_fields' => [],
];
