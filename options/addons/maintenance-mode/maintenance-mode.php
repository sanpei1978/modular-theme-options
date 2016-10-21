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

class Maintenance_Mode {

	private $options_name;
	private $obj_options;

	public function __construct( $options_name, &$obj_options ) {
		$this->options_name = $options_name;
		$this->obj_options = $obj_options;
		add_action( 'template_redirect', array( $this, 'display_under_maintenance' ) );
	}

	public function display_under_maintenance() {
		$options = $this->obj_options->get_option();
		if ( isset( $options['is_maintenance_mode'] ) && 'on' === $options['is_maintenance_mode'] ) {
			$user_login_status = true;
			if ( isset( $options['is-non-logged-in'] )  && 'on' === $options['is-non-logged-in'] ) {
				$user_login_status = ! is_user_logged_in();
			}
			if ( $user_login_status ) {
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
						  <title>' . get_bloginfo('name') . ' - ' . get_bloginfo('description') . '</title>
						</head>
						<body>
							<div class="all">
								<div class="title">' . esc_html__( 'UNDER MAINTENANCE', 'theme-options' ) . '</div>
								<div>期間: ' . $options['maintenance-period'] . '</div>
								<div class="title">' . esc_html__( 'Contact us', 'theme-options' ) . '</div>
								<div>'
									. $options['contact-name'] . '<br/>'
									. $options['contact-address'] . '<br/>
									TEL: ' . $options['contact-tel'] . '<br/>
									FAX: ' . $options['contact-fax'] . '<br/>
									E-Mail: ' . get_option('admin_email') . '
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
