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

// Designated class for the Settings API on WordPress

namespace ThemeOptions\SettingStore;

require_once 'interface-options.php';
require_once 'class-wp-options-abstract.php';

class WP_Settings extends WP_Options_Base implements Interface_Options {

	public function __construct( $options_page, $optons_group, $options_sections, $options_name, $input_field ) {
		parent::__construct( $options_page, $optons_group, $options_sections, $options_name, $input_field );
		$this->form_action = 'options.php';
	}

	public function initialize() {

		foreach ( $this->options_sections as $section ) {
			if ( isset( $section['id'] ) ) {
				add_settings_section(
					$section['id'],
					'', // Section title. I want to compose the original description, so here is blank.
					array( $this, 'section_callback' ),
					$this->options_page
				);
			}
		}

		foreach ( $this->input_fields as $input_field ) {
			if ( isset( $input_field['id'] ) && isset( $input_field['type'] ) && isset( $input_field['section'] ) ) {

				add_settings_field(
					$input_field['id'],
					$input_field['title'],
					array( $this, 'write_input_field' ),
					$this->options_page,
					$input_field['section'],
					array( $input_field['id'], $input_field['type'], $input_field['label'] )
				);
			}
		}

		register_setting( $this->options_group, $this->options_name, array( $this, 'sanitize_input_field' ) );
	}

	public function terminate() {
		unregister_setting( $this->options_group, $this->options_group );
	}

	public function fill() {
		settings_fields( $this->options_group );
		do_settings_sections( $this->options_page );
	}

	protected function add_settings_error( $input_id, $input_value, $message ) {
		add_settings_error( $input_id, $input_value, $message, 'error' );
	}

	public function section_callback( array $args ) {
		foreach ( $this->options_sections as $section ) {
			if ( $section['id'] === $args['id'] ) {
				echo '<h5>' , esc_html( $section['title'] ) , '</h5>';
				echo '<p>' , esc_html( $section['summary'] ) , '</p>';
			}
		}
	}

	public function write_input_field( array $args ) {
		$field_id = esc_html( $args[0] );
		$errors = get_settings_errors( $field_id );
		foreach ( $errors as $error ) {
			if ( 'error' === $error['type'] ) {
				$this->options[ $error['setting'] ] = $error['code'];
			}
		}
		settings_errors( $field_id );
		parent::write_input_field( $args );
	}

}
