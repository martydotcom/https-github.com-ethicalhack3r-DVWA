<?php

if( isset( $_POST[ 'Submit' ]  ) ) {
	// Get input
	$target = $_REQUEST[ 'ip' ];
	
	// Create Not Allowed Charachters 
	// and use str_replace to replace all occurrences of the search string with the replacement string
	$replaceArray = array(
		'&&' => '',
		 ';' => '',
		 '(' => '',
		 ')' => '',	
	);
	$target = str_replace( array_keys($replaceArray ), $replaceArray, $target );
	
	

	// Determine OS and execute the ping command.
	if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
		// Windows
		$cmd = shell_exec( 'ping  ' . $target );
	}
	else {
		// *nix
		$cmd = shell_exec( 'ping  -c 4 ' . $target );
	}

	// Feedback for the end user
	$html .= "<pre>{$cmd}</pre>";
}

?>
