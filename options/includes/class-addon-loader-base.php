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

namespace ThemeOptions;

require_once INCLUDES_PATH . '/interface-addon-loader.php';

class Addon_Loader_Base implements Interface_Addon_Loader {

	private $options_name;
	private $obj_options;
	private $display_name;
	private $form_action;

	public function __construct( $addon_id, $loader_id, $config ) {

		$this->options_name = $config['domain'] . '_' . $loader_id . '_' . $addon_id;

		$this->obj_options = new SettingStore\Options(
			$loader_id . '_' . $addon_id,
			$loader_id . '_' . $addon_id,
			$config['setting_sections'],
			$this->options_name,
			$config['input_fields']
		);

		$this->display_name = $config['display_name'];
		$this->form_action = $this->obj_options->form_action;

		require_once( ADDON_PATH . '/' . $addon_id . '/' . $addon_id . '.php' );

	}

	public function initialize() {
		$this->obj_options->initialize();
	}

	public function fill_fields() {
		$this->obj_options->set_option( $this->obj_options->get_option() );
		$this->obj_options->fill();
	}

	public function __get( $property_name ) {
		if ( 'options_name' === $property_name ) {
			return $this->options_name;
		} elseif ( 'obj_options' === $property_name ) {
			 return $this->obj_options;
		} elseif ( 'display_name' === $property_name ) {
			return $this->display_name;
		} elseif ( 'form_action' === $property_name ) {
			return $this->form_action;
		}
	}

}
