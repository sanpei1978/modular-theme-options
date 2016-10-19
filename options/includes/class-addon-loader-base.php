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

require_once LIB_PATH . '/interface-addon-loader.php';

class Addon_Loader_Base implements Interface_Addon_Loader {

	private $options_page;
	private $options_group;
	private $setting_sections;
	private $options_name;
	private $input_fields;

	private $obj_options;

	private $display_name;
	private $form_action;

	public function __construct( $addon_id, $loader_id, $config ) {

		$this->options_page = $loader_id . '_' . $addon_id;
		$this->options_group = $loader_id . '_' . $addon_id;
		$this->setting_sections = $config['setting_sections'];
		$this->options_name = $config['domain'] . '_' . $loader_id . '_' . $addon_id;
		$this->input_fields = $config['input_fields'];

		$this->obj_options = $config['obj_options'];

		$this->display_name = $config['display_name'];
		$this->form_action = $this->obj_options->FORM_ACTION;

		require_once( ADDON_PATH . '/' . $addon_id . '/' . $addon_id . '.php' );

	}

	public function initialize() {
		$this->obj_options->initialize(
			$this->options_page,
			$this->options_group,
			$this->setting_sections,
			$this->options_name,
			$this->input_fields
		);
	}

	public function fill_fields() {
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
