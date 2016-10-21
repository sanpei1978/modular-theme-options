<?php
/**
 * Copyright (c) 2016 sanpeity (https://github.com/sanpei1978)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
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
