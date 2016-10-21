<?php
/*
Plugin Name: Modular Theme Options
Author: Takuma Yamanaka
Plugin URI:
Description: A framework designed to facilitate the development of WordPress Themes options.
Version: 0.4.0
Author URI: https://github.com/sanpei1978
Domain Path: /languages
Text Domain: theme-options
*/

namespace ThemeOptions\SettingStore;

abstract class WP_Options_Base {

	protected $options_page = '';
	protected $options_group = '';
	protected $options_sections = [];
	protected $options_name = '';
	protected $input_fields = [];

	private $form_action = '';

	protected $options = [];

	public function __construct( $options_page, $optons_group, $options_sections, $options_name, $input_field ) {
		$this->options_page = $options_page;
		$this->options_group = $optons_group;
		$this->options_sections = $options_sections;
		$this->options_name = $options_name;
		$this->input_fields = $input_field;
	}

	//public function initialize( $options_page, $options_group, $setting_sections, $input_fields ) {
	//public function initialize() {//} $input_fields ) {
		//$this->input_fields = $input_fields;
	//}

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
		/*
		$new_input = array();
		for ( $i = 0; $i < count( $this->all_field_ids ); $i++ ) {
			$all_field_id = esc_attr( $this->all_field_ids[ $i ] );
			if ( isset( $input[ $all_field_id ] ) ) {
				$new_input[ $all_field_id ] = $input[ $all_field_id ];
			}
		}
		return $new_input;
		*/
	}

	abstract protected function add_settings_error( $input_id, $input_value, $message );

}
