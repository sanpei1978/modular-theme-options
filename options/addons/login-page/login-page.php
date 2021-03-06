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

class Login_Page {

	//private static $instance = null;
	private $options_name;
	private $obj_options;

	/*
	public static function get_instance( $options_name, &$obj_options ) {
		if ( null === self::$instance ) {
				self::$instance = new self( $options_name, $obj_options );
		}
		return self::$instance;
	}
	*/

	public function __construct( $options_name, &$obj_options ) {
		$this->options_name = $options_name;
		$this->obj_options = $obj_options;
		add_action( 'login_enqueue_scripts', array( $this, 'login_css' ) );
		add_filter( 'login_headerurl', array( $this, 'custom_login_logo_url' ) );
		add_filter( 'login_headertitle', array( $this, 'custom_login_logo_title' ) );
	}

	public function custom_login_logo_url() {
		return site_url();
	}

	public function custom_login_logo_title() {
		return get_bloginfo( 'name' );
	}

	public function login_css() {
		$options = $this->obj_options->get_option();
		$bg_img = esc_html( $options['media-upload-bg_img'] );
		$logo_img = esc_html( $options['media-upload-logo_img'] );
		$logo_h = esc_html( $options['media-upload-logo_img_h'] );
		$opacity = esc_html( $options['form-opacity'] );
		if ( empty( $opacity ) ) {
			$opacity = '1.0';
		}
		echo '<div class="login-page-cover"></div>
		<style>
				.login-page-cover {
						background: url("' . $bg_img . '") no-repeat center center fixed !important;
						background-size: cover !important;
						position:fixed;
						top:0;
						left:0;
						z-index:10;
						overflow: hidden;
						width: 100%;
						height:100%;
				}
				#login {
						z-index:9999;
						position:relative;
						opacity: ' . $opacity . ';
				}';
		if ( ! empty( $logo_img ) ) {
			echo '#login h1 a {
					background-image: url("' . $logo_img . '");
					height: ' . $logo_h . 'px !important;
					width: 100%;
					max-height:200px;
					background-size: 100% !important;
					background-position: center top;
					background-repeat: no-repeat;
				}';
		}
		echo '#login #backtoblog {
					  display: none;
				}
			}
		</style>';
	}

}
