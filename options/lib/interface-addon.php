<?php

namespace ThemeOptions;

interface Interface_Addon {
	public function initialize();
	public function fill_fields();
	public function __get( $property_name );
}
