<?php

namespace ThemeOptions;

require_once LIB_PATH . '/class-addon-loader-base.php';

class Addon_Loader extends Addon_Loader_Base {
	public function __construct( $addon_id, $loader_id, $config ) {
		parent::__construct( $addon_id, $loader_id, $config );
		if ( 'login-page' === $addon_id ) {
			new Addon\Login_Page( $this->options_name, $this->obj_options );
		}
		if ( 'maintenance-mode' === $addon_id ) {
			new Addon\Maintenance_Mode( $this->options_name, $this->obj_options );
		}
	}
}
