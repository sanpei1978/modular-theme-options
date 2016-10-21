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

return [
	'display_name' => __( 'Settings', 'theme-options' ),
	'domain' => 'sanpeity',
	'loader_id' => 'theme_options',
	'data_store' => 'wp-settings', // The way of data store. "wp-options" or "wp-settings"
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
