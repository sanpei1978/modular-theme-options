<?php

namespace ThemeOptions;

require_once LIB_PATH . '/class-addon.php';

class Addon extends Addon_Base {
	public function __construct( $addon_id, $loader_id, $config ) {
		parent::__construct( $addon_id, $loader_id, $config );
		if ( 'login-page' === $addon_id ) {
			LoginPage\Login_Page::get_instance( $this->options_name, $this->obj_options );
		}
		//if ( 'maintenance-mode' === $addon_id ) {
		//	MaintenanceMode\Maintenance_Mode::get_instance( $obj_options );
		//}
	}
}
