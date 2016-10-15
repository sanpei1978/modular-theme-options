<?php

namespace ThemeOptions;

if ( is_admin() ) {

	include  'lib/constants.php';

	require_once LIB_PATH . '/class-theme-options.php';

	new Theme_Options();

}
