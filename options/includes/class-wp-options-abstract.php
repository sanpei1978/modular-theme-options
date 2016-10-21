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

namespace ThemeOptions\SettingStore;

abstract class WP_Options_Base {

	protected $options_page = '';
	protected $options_group = '';
	protected $options_sections = [];
	protected $options_name = '';
	protected $input_fields = [];

	protected $form_action = '';

	protected $options = [];

	public function __construct( $options_page, $optons_group, $options_sections, $options_name, $input_field ) {
		$this->options_page = $options_page;
		$this->options_group = $optons_group;
		$this->options_sections = $options_sections;
		$this->options_name = $options_name;
		$this->input_fields = $input_field;
	}

	public function get_option( $default = false ) {
		return $this->options = get_option( $this->options_name, $default );
	}

	public function set_option( $options ) {
		$this->options = $options;
	}

	public function add_option( $option, $value, $deprecated = '', $autoload = 'yes' ) {
		return add_option( $option, $value, $autoload, $autoload );
	}

	public function update_option( $option, $newvalue, $autoload = null ) {
		return update_option( $option, $newvalue, $autoload );
	}

	public function delete_option( $option ) {
		return delete_option( $option );
	}

	public function __get( $prop_name ) {
		if ( 'form_action' === $prop_name ) {
			return $this->form_action;
		} elseif ( 'options_name' === $prop_name ) {
			return $this->options_name;
		}
	}

	public function sanitize_input_field( $input ) {
		$new_input = array();
		foreach ( $this->input_fields as $input_field ) {

			if ( isset( $input[ $input_field['id'] ] ) ) {
				$input_value = $input[ $input_field['id'] ];
				if ( ! isset( $input_field['validate'] ) ) {
					$new_input[ $input_field['id'] ] = $input_value;
				} else {
					$input_rule = $input_field['validate']['rule'];
					$result_validate = true;
					if ( 'float' === $input_rule ) {
						if ( ! filter_var( $input_value, FILTER_VALIDATE_FLOAT, FILTER_REQUIRE_SCALAR ) ) {
							if ( ! empty( $input_value ) ) {
								$result_validate = false;
							}
						}
					}
					if ( 'url' === $input_rule ) {
						if ( ! filter_var( $input_value, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED ) ) {
							if ( ! empty( $input_value ) ) {
								$result_validate = false;
							}
						}
					}
					if ( 'email' === $input_rule ) {
						if ( ! is_email( trim( $input_value ) ) ) {
							if ( ! empty( $input_value ) ) {
								$result_validate = false;
							}
						}
					}
					if ( 'integer' === $input_rule ) {
						if ( ! ctype_digit( $input_value ) && $input_value ) {
							$result_validate = false;
						}
					}

					if ( $result_validate ) {
						$new_input[ $input_field['id'] ] = $input_value;
					} else {
						$this->add_settings_error(
							$input_field['id'],
							$input_value,
							$input_field['validate']['message']
						);
					}
				}
			}
		}
		return $new_input;
	}

	abstract protected function add_settings_error( $input_id, $input_value, $message );

	public function write_page( $addons, $options_name, $display_name ) {
		$options = $this->get_option();
		$this->set_option( $options );
		FrontEnd\Front_End::write_container( $options, $addons, $this, $options_name, $display_name );
	}

	public function write_input_field( array $args ) {
		$field_id = esc_html( $args[0] );
		$input_type = $args[1];
		$field_name = $this->options_name . '[' . $field_id . ']';
		$input_label = $args[2];
		//$this->options = $this->get_option();
		$input_value = '';
		if ( isset( $this->options[ $field_id ] ) ) {
			$input_value = $this->options[ $field_id ];
		}

		FrontEnd\Front_End::write_input_field( $field_id, $input_type, $field_name, $input_label, $input_value );
	}

}
