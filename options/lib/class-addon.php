<?php

namespace ThemeOptions;

require_once LIB_PATH . '/interface-addon.php';

class Addon implements Interface_Addon {

	private $obj_options;

	private $display_name;
	private $form_action;
	private $options_name;

	public function __construct( $addon_id, $loader_id ) {

		$config = Config::get( $addon_id );

		$this->obj_options = $config['obj_options'];

		$this->display_name = $config['display_name'];
		$this->form_action = $this->obj_options->FORM_ACTION;
		$this->options_name = $config['domain'] . '_' . $loader_id . '_' . $addon_id;

		$this->obj_options->initialize(
			$loader_id . '_' . $addon_id,
			$loader_id . '_' . $addon_id,
			$config['setting_sections'],
			$this->options_name,
			$config['input_fields']
		);
	}

	public function fill_fields() {
		$this->obj_options->fill();
	}

	public function __get( $property_name ) {
		if ( 'display_name' === $property_name ) {
			return $this->display_name;
		} elseif ( 'form_action' === $property_name ) {
			return $this->form_action;
		} elseif ( 'options_name' === $property_name ) {
			return $this->options_name;
		}
	}

}
