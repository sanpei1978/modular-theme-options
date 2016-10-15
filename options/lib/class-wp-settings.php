<?php

// Designated class for the Settings API on WordPress

namespace SettingStore;

require_once \ThemeOptions\LIB_PATH . '/interface-options.php';
require_once \ThemeOptions\LIB_PATH . '/class-wp-settings-abstract.php';

if ( ! class_exists( 'Wp_Settings' ) ) {

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
				$all_field_id = esc_html( $this->all_field_ids[ $i ] );
				if ( isset( $input[ $all_field_id ] ) ) {
					$new_input[ $all_field_id ] = $input[ $all_field_id ];
				}
			}
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

			switch ( $input_type ) {
				case 'checkbox':
					$checked = '';
					$disabled = '';
					if ( isset( $options[ $field_id ] ) ) {
						$checked = checked( $options[ $field_id ], 'on' , false );
					}
					echo '<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="' , $field_id , '">';
					echo '<input type="checkbox" id="' , $field_id , '" name="' , $field_name , ']" class="mdl-checkbox__input" ' , $checked , ' ', $disabled , '>';
					echo '<span class="mdl-checkbox__label">' , $input_label , '</span>';
					echo '</label>';
					break;
				case 'disabled':
					$checked = '';
					$disabled = '';
					if ( isset( $options[ $field_id ] ) ) {
						$checked = checked( $options[ $field_id ], 'on', false );
						$disabled = disabled( 1, 1, false );
					}
					echo '<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="' , $field_id , '">';
					echo '<input type="checkbox" id="' , $field_id , '" name="' , $field_name , ']" class="mdl-checkbox__input" ' , $checked , ' ', disabled( 1, 1, false ) , '>';
					echo '<span class="mdl-checkbox__label">' , $input_label , '</span>';
					echo '</label>';
					break;
				case 'text':
					$value = '';
					if ( isset( $options[ $field_id ] ) ) {
						$value = esc_attr( $options[ $field_id ] );
					}
					echo '<div class="mdl-textfield mdl-js-textfield">
							<input class="mdl-textfield__input" type="text" id="' , $field_id . '" name="' , $field_name , '" value="' , $value , '">
								<label class="mdl-textfield__label" for="' , $field_id , '">' , $input_label , '</label>
								</div>';
					break;
				case 'media':
					$value = '';
					if ( isset( $options[ $field_id ] ) ) {
						$value = esc_attr( $options[ $field_id ] );
					}
					echo '<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="' , $field_id . '" name="' , $field_name, '" value="' , $value , '">
									<label class="mdl-textfield__label" for="' , $field_id , '">', $input_label , '</label>
									</div>';
					echo ' <button id="choose-image" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">', esc_html__( 'Choose image', 'sanpeity' ) , '</button>';
					echo '<div id="image-preview"></div>';
					break;
				default:
					break;
			}
		}

	}

}
