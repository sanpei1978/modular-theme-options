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
	'display_name' => __( 'Login Page Settings', 'theme-options' ),
	'domain' => 'sanpeity',
	'data_store' => 'wp-settings', // The way of data store. "wp-options" or "wp-settings"
	'addons' => [], // Using other add-ons in the add-on. Next feature.
	'setting_sections' => [
		[
			'id'			=> 'setting_section_login_page_1',
			'title'		=> '',
			'summary'	=> '',
		],
	],
	'input_fields' => [
		[
			'id' => 'media-upload-bg_img',
			'title' => __( 'Choose background image', 'theme-options' ),
			'type' => 'media',
			'label' => __( 'Place of a image file', 'theme-options' ),
			'section' => 'setting_section_login_page_1',
			'validate' => [
				'rule' => 'url',
				'message' => __( 'Invalid url.', 'theme-options' ),
			],
		],
		[
			'id' => 'media-upload-logo_img',
			'title' => __( 'Choose logo image', 'theme-options' ),
			'type' => 'media',
			'label' => __( 'Place of a image file', 'theme-options' ),
			'section' => 'setting_section_login_page_1',
			'validate' => [
				'rule' => 'url',
				'message' => __( 'Invalid url.', 'theme-options' ),
			],
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
			'title' => __( 'Form opacity', 'theme-options' ),
			'type' => 'text',
			'label' => __( 'default: 1.0, e.g. 0.93.', 'theme-options' ),
			'section' => 'setting_section_login_page_1',
			'validate' => [
				'rule' => 'float',
				'message' => __( 'Invalid opacity.', 'theme-options' ),
			],
		],
	],
];
