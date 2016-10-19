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

namespace FrontEnd;

class Material_Ui_Lite {

	public static function write_container( $options, $addons, $obj_options, $options_name, $display_name ) {
		?>
		<div class="wrap">
			<h2><?php echo esc_html__( 'Theme Options', 'theme-options' ); ?></h2>
			<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			  <div class="mdl-tabs__tab-bar">
					<a href="#panel-setting" class="mdl-tabs__tab is-active"><?php echo esc_html( $display_name ); ?></a>
			<?php
			if ( ! empty( $options ) ) {
				foreach ( $options as $addon_id => $is_active ) {
					if ( 'on' === $is_active && isset( $addons[ $addon_id ] ) ) {
						echo '<a href="#panel-' , $addon_id , '" class="mdl-tabs__tab">' , $addons[ $addon_id ]->display_name , '</a>';
					}
				}
			}
			?>
			  </div>
				<div class="mdl-tabs__panel is-active" id="panel-setting">
					<?php
					echo '<form method="post" action="' , esc_html( $obj_options->FORM_ACTION ) , '" id="' , $options_name , '">';
					$obj_options->fill();
					submit_button( __( 'Save Changes' ), 'primary large', 'submit', true, array( 'form' => $options_name ) );
					echo '</form>';
					?>
				</div>
					<?php
					if ( ! empty( $options ) ) {
						foreach ( $options as $addon_id => $is_active ) {
							if ( 'on' === $is_active && isset( $addons[ $addon_id ] ) ) {
								echo '<div class="mdl-tabs__panel" id="panel-' , $addon_id , '">';
								echo '<form method="post" action="' , esc_html( $addons[ $addon_id ]->form_action ), '" id="' , $addons[ $addon_id ]->options_name, '">';
								$addons[ $addon_id ]->fill_fields();
								submit_button( __( 'Save Changes' ), 'primary large', 'submit', true, array( 'form' => $addons[ $addon_id ]->options_name ) );
								echo '</form>';
								echo '</div>';
							}
						}
					}
					?>
			</div>
		</div>
		<?php
	}

	public static function write_input_field( $field_id, $input_type, $field_name, $input_label, $options ) {
		switch ( $input_type ) {
			case 'checkbox':
				$checked = '';
				$disabled = '';
				if ( isset( $options[ $field_id ] ) ) {
					$checked = checked( $options[ $field_id ], 'on' , false );
				}
				echo '<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="' , $field_id , '">';
				echo '<input type="checkbox" id="' , $field_id , '" name="' , $field_name , '" class="mdl-checkbox__input" ' , $checked , ' ', $disabled , '>';
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
				echo '<input type="checkbox" id="' , $field_id , '" name="' , $field_name , '" class="mdl-checkbox__input" ' , $checked , ' ', disabled( 1, 1, false ) , '>';
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
				echo ' <button id="choose-image-' . $field_id . '" class="media-button mdl-button mdl-js-button mdl-button--raised mdl-button--colored">', esc_html__( 'Select Image' ) , '</button>';
				echo '<div id="image-preview">';
				if ( $value ) {
					echo '<img src="' . $value . '" style="width:300px;"/>';
				}
				echo '</div>';
				break;
			case 'hidden':
				$value = '';
				if ( isset( $options[ $field_id ] ) ) {
					$value = esc_attr( $options[ $field_id ] );
				}
				echo '<input type="hidden" id="choose-image-' , $field_id , '"name="' , $field_name , '" value="' , $value , '"></div>';
				break;
			default:
				break;
		}
	}

}

