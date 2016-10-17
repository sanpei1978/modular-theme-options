<?php

namespace ThemeOptions;

require_once LIB_PATH . '/class-wp-settings.php';

return [
	'display_name' => __( 'Maintenance Mode Settings', 'sanpeity' ),
	'domain' => 'sanpeity',
	'obj_options' => new \SettingStore\Wp_Settings(), // The way of data store.
	'addons' => [], // Using other add-ons in the add-on. Next feature.
	'setting_sections' => [
		[
			'id'			=> 'setting_section_maintenance_mode_1',
			'title'		=> '',
			'summary'	=> '',
		],
	],
	'input_fields' => [
		[
			'id' => 'is_maintenance_mode',
			'title' => '',
			'type' => 'checkbox',
			'label' => __( 'Be maintenance mode', 'sanpeity' ),
			'section' => 'setting_section_maintenance_mode_1',
		],
	],
];
