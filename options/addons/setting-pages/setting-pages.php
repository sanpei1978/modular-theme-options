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

namespace ThemeOptions\Addon;

class Setting_Pages {

	private $options_name;
	private $obj_options;

	public function __construct( $options_name, &$obj_options ) {
		$this->options_name = $options_name;
		$this->obj_options = $obj_options;
		if ( current_user_can( 'administrator' ) ) {
			$options = $this->obj_options->get_option();
			if ( isset( $options['is-add-settings-user-profile'] ) && 'on' === $options['is-add-settings-user-profile'] ) {
				add_action( 'show_user_profile', array( $this, 'add_settings_user_profile' ), 100 );
				add_action( 'edit_user_profile', array( $this, 'add_settings_user_profile' ), 100 );
				add_action( 'personal_options_update', array( $this, 'update_settings_user_profile' ), 100 );
				add_action( 'edit_user_profile_update', array( $this, 'update_settings_user_profile' ), 100 );
			}
		}
	}
	public function add_settings_user_profile( $user ) {
		?>
		<h3>TEST</h3>
			<table class="form-table">
					<tr>
						<th>
							<label for="test-user-profile">TEST</label>
						</th>
						<td>
							<input type="text" name="test-user-profile" id="test-user-profile" value="<?php echo esc_attr( get_the_author_meta( 'test-user-profile', $user->ID ) ); ?>" class="regular-text" />
						</td>
					</tr>
			</table>
		<?php
	}

	public function update_settings_user_profile( $user_id ) {
		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return false;
		}
		update_usermeta( $user_id, 'test-user-profile', $_POST['test-user-profile'] );
	}

}
