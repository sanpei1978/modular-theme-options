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
			'id' => 'media-upload-bg_img',
			'title' => __( 'Choose background image', 'sanpeity' ),
			'type' => 'media',
			'label' => __( 'Place of a image file', 'sanpeity' ),
			'section' => 'setting_section_login_page_1',
		],
		[
			'id' => 'media-upload-logo_img',
			'title' => __( 'Choose logo image', 'sanpeity' ),
			'type' => 'media',
			'label' => __( 'Place of a image file', 'sanpeity' ),
			'section' => 'setting_section_login_page_1',
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
			'title' => __( 'Form opacity', 'sanpeity' ),
			'type' => 'text',
			'label' => __( 'default: 1.0, e.g. 0.93.', 'sanpeity' ),
			'section' => 'setting_section_login_page_2',
		],
	],
];
