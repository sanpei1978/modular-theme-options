<?php

namespace ThemeOptions\LoginPage;

class Login_Page {

	private static $instance = null;
	private $addon;

	public static function get_instance( &$addon ) {
		if ( null === self::$instance ) {
				self::$instance = new self( $addon );
		}
		return self::$instance;
	}

	private function __construct( &$addon ) {
		$this->addon = $addon;
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
		$options = $this->addon->obj_options->get_option( $this->addon->options_name );
		$bg_img = esc_html( $options['media-upload-bg_img'] );
		$logo_img = esc_html( $options['media-upload-logo_img'] );
		$logo_h = esc_html( $options['media-upload-logo_img_h'] );
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
						opacity: 0.93;
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
