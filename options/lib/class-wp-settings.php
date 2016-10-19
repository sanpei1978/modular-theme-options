<?php
/*
Plugin Name: Theme Options
Author: Takuma Yamanaka
Plugin URI:
Description: More portable, simpler. A options framework for WordPress themes.
Version: 0.4.0
Author URI: https://github.com/sanpei1978
Domain Path: /languages
Text Domain: theme-options
*/

// Designated class for the Settings API on WordPress

namespace SettingStore;

require_once \ThemeOptions\LIB_PATH . '/interface-options.php';
require_once \ThemeOptions\LIB_PATH . '/class-wp-settings-abstract.php';

class Wp_Settings extends Wp_Settings_Abstract implements Interface_Options {

	private $options_page = '';
	private $options_group = '';
	private $options_name = '';

	private $options_sections = array();
	private $all_field_ids = array();

	public function initialize( $options_page, $options_group, $setting_sections, $options_name, $input_fields ) {

		$this->options_page = $options_page;
		$this->options_group = $options_group;
		$this->options_name = $options_name;

		$this->options_sections = $setting_sections;
		foreach ( $this->options_sections as $section ) {
			if ( isset( $section['id'] ) ) {
				add_settings_section(
					$section['id'],
					'', // Section title. I want to compose the original description, so here is blank.
					array( $this, 'section_callback' ),
					$options_page
				);
			}
		}

		foreach ( $input_fields as $input_field ) {
			if ( isset( $input_field['id'] ) && isset( $input_field['type'] ) && isset( $input_field['section'] ) ) {

				$this->all_field_ids[] = $input_field['id'];

				add_settings_field(
					$input_field['id'],
					$input_field['title'],
					array( $this, 'write_input_field' ),
					$options_page,
					$input_field['section'],
					array( $input_field['id'], $input_field['type'], $input_field['label'] )
				);
			}
		}

		register_setting( $options_group, $options_name, array( $this, 'sanitize_callback' ) );
	}

	public function terminate() {
		unregister_setting( $this->options_group, $this->options_group );
	}

	public function fill() {
		settings_fields( $this->options_group );
		do_settings_sections( $this->options_page );
	}

	public function __get( $prop_name ) {
		if ( 'FORM_ACTION' === $prop_name ) {
			return self::FORM_ACTION;
		}
	}

	public function sanitize_callback( $input ) {
		$new_input = array();
		for ( $i = 0; $i < count( $this->all_field_ids ); $i++ ) {
			$all_field_id = esc_attr( $this->all_field_ids[ $i ] );
			if ( isset( $input[ $all_field_id ] ) ) {
				$new_input[ $all_field_id ] = $input[ $all_field_id ];
			}
		}
		//add_settings_error('test');
		return $new_input;
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
		$input_type = $args[1];
		$field_name = $this->options_name . '[' . $field_id . ']';
		$input_label = $args[2];
		$options = $this->get_option( $this->options_name );
		//get_settings_errors('test');
		//settings_errors('test');

		\FrontEnd\Front_End::write_input_field( $field_id, $input_type, $field_name, $input_label, $options );
	}

}
