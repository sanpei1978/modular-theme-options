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

// Designated class for the Settings API on WordPress

namespace ThemeOptions\SettingStore;

require_once \ThemeOptions\INCLUDES_PATH . '/interface-options.php';
require_once \ThemeOptions\INCLUDES_PATH . '/class-wp-options-abstract.php';

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

	public function sanitize_input_field( $input ) {
		return parent::sanitize_input_field( $input );
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

	public function write_page( $addons, $options_name, $display_name ) {
		$options = $this->get_option();
		$this->set_option( $options );
		FrontEnd\Front_End::write_container( $options, $addons, $this, $options_name, $display_name );
	}

	public function write_input_field( array $args ) {
		//parent::write_input_field( $args );
		$field_id = esc_html( $args[0] );
		$input_type = $args[1];
		$field_name = $this->options_name . '[' . $field_id . ']';
		$input_label = $args[2];
		//$this->options = $this->get_option();

		$errors = get_settings_errors( $field_id );
		foreach ( $errors as $error ) {
			if ( 'error' === $error['type'] ) {
				$this->options[ $error['setting'] ] = $error['code'];
			}
		}
		settings_errors( $field_id );

		FrontEnd\Front_End::write_input_field( $field_id, $input_type, $field_name, $input_label, $this->options );
	}

}
