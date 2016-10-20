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

class WP_Settings extends WP_Options_Abstract implements Interface_Options {

	private $options_page = '';
	private $options_group = '';
	private $options_name = '';

	private $options_sections = [];
	private $all_field_ids = [];

	private $form_action = '';

	private $options = [];

	public function __construct( $options_name ) {
		$this->form_action = 'options.php';
		$this->options_name = $options_name;
	}

	public function get_option( $default = false ) {
		return $this->options = get_option( $this->options_name, $default );
	}

	public function set_option( $options ) {
		$this->options = $options;
	}

	public function initialize( $options_page, $options_group, $setting_sections, $input_fields ) {
		$this->options_page = $options_page;
		$this->options_group = $options_group;

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

		register_setting( $this->options_group, $this->options_name, array( $this, 'sanitize_callback' ) );
	}

	public function terminate() {
		unregister_setting( $this->options_group, $this->options_group );
	}

	public function fill() {
		settings_fields( $this->options_group );
		do_settings_sections( $this->options_page );
	}

	public function __get( $prop_name ) {
		if ( 'form_action' === $prop_name ) {
			return $this->form_action;
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
		//$this->options = $this->get_option();
		//get_settings_errors('test');
		//settings_errors('test');

		\ThemeOptions\FrontEnd\Front_End::write_input_field( $field_id, $input_type, $field_name, $input_label, $this->options );
	}

}
