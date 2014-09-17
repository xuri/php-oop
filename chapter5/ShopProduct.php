<?php
	// function __autoload( $classname ) {
	// 	$path = str_repeat('-', DIRECTORY_SEPARATOR, $classname );
	// 	require_once( "$path.php" );
	// }

	function __autoload( $classname ) {
		if (preg_match('/\\\/', $classname)) {
			$path = str_replace('\\', DIRECTORY_SEPARATOR, $classname );
		} else {
			$path = str_replace('_', DIRECTORY_SEPARATOR, $classname );
		}
	//  	require_once( "$path.php" );

	}

	// $y = new business_ShopProduct();
?>