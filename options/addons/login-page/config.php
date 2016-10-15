<?php

namespace ThemeOptions;

use SettingStore\Wp_Settings;

require_once LIB_PATH . '/class-wp-settings.php';

return [
	'display_name' => __( 'Login Page Settings', 'sanpeity' ),
	'domain' => 'sanpeity',
	'obj_options' => new Wp_Settings(), // The way of data store.
	'addons' => [], // Using other add-ons in the add-on. Next feature.
	'setting_sections' => [
		[
			'id'			=> 'setting_section_login_page_1',
			'title'		=> __( 'SECTION TITLE 1', 'sanpeity' ),
			'summary'	=> __( 'SECTION SUMMARY 1', 'sanpeity' ),
		],
		[
			'id'			=> 'setting_section_login_page_2',
			'title'		=> __( 'SECTION TITLE 2', 'sanpeity' ),
			'summary'	=> __( 'SECTION SUMMARY 2', 'sanpeity' ),
		],
	],
	'input_fields' => [
		[
			'id' => 'media-upload',
			'title' => __( 'Upload image', 'sanpeity' ),
			'type' => 'media',
			'label' => __( 'Place of a image file', 'sanpeity' ),
			'section' => 'setting_section_login_page_1',
		],
		[
			'id' => 'css-pass',
			'title' => __( 'Other', 'sanpeity' ),
			'type' => 'text',
			'label' => __( 'Text', 'sanpeity' ),
			'section' => 'setting_section_login_page_1',
		],
		[
			'id' => 'other',
			'title' => __( 'Other', 'sanpeity' ),
			'type' => 'text',
			'label' => __( 'Text', 'sanpeity' ),
			'section' => 'setting_section_login_page_2',
		],
	],
];
