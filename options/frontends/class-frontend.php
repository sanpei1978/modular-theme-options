<?php

namespace FrontEnd;

require_once 'class-material.php';
require_once 'class-bootstrap.php';
require_once \ThemeOptions\LIB_PATH . '/class-config.php';

if ( 'material' === \ThemeOptions\Config::get( 'frontend' ) ) {
	class Front_End extends Material_Ui_Lite {
		// Use base class.
	}
}
if ( 'bootstrap' === \ThemeOptions\Config::get( 'frontend' ) ) {
	class Front_End extends Bootstrap_4 {
		// Use base class.
	}
}
