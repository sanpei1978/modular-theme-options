<?php
/*
Plugin Name: Theme Options
Author: Takuma Yamanaka
Plugin URI:
Description: More portable, simpler. A options framework for WordPress themes.
Version: 0.2.0
Author URI: https://github.com/sanpei1978
Domain Path: /languages
Text Domain: theme-options
*/

namespace ThemeOptions\Addon;

class Maintenance_Mode {

	private $options_name;
	private $obj_options;

	public function __construct( $options_name, &$obj_options ) {
		$this->options_name = $options_name;
		$this->obj_options = $obj_options;
		add_action( 'template_redirect', array( $this, 'display_under_maintenance' ) );
	}

	public function display_under_maintenance() {
		$options = $this->obj_options->get_option( $this->options_name );
		if ( isset( $options['is_maintenance_mode'] ) && 'on' === $options['is_maintenance_mode'] ) {
			if ( ! is_user_logged_in() ) {
				if ( is_home() || is_front_page() ) {
						echo '<!DOCTYPE html>
						<html lang="ja">
						<head>
						  <meta charset="utf-8">
						  <meta http-equiv="x-ua-compatible" content="ie=edge">
						  <meta name="viewport" content="width=device-width, initial-scale=1">
							<style>
								.all{
									font-family: "Century Gothic", Arial, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, "ＭＳ Ｐゴシック", sans-serif;
									text-align:center;
									background-color:#444444;
									color:#fff;
									width:100%;
									padding-top: 10px;
									padding-bottom: 20px;
									border-radius: 4px;
								}
								.title{
									padding-top:10px;
									font-size:larger;
								}
							</style>
						  <title>' .  get_bloginfo( 'name' ) . ' - ' .  get_bloginfo( 'description' ) . '</title>
						</head>
						<body>
							<div class="all">
								<div class="title">メンテナンス中</div>
								<div>期間: 平成28年9月28日から30日まで</div>
								<div class="title">お問い合わせ</div>
								<div>
									XXXXXX<br/>
									〒XXX-XXXX XXXXXXXXXX<br/>
									TEL: XX-XXXX-XXXX<br/>
									FAX: XX-XXXX-XXXX<br/>
									E-Mail: XX@XXXXXXX
								</div>
							</div>
						</body>
						</html>
						';
				} else {
					wp_redirect( site_url() );
				}
				exit();
			}
		}
	}

}