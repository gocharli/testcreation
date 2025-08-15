<?php
	define('APPLICATION_MODE',1);
	
	if(APPLICATION_MODE == 1)
	{
		$server = "localhost";
		$db = "dbgjsjwvd65pb3";
		$user = "uyu599yh44xwr";
		$pass = "kas9q3gkcfca";
	}
	
	// Create connection
	$conn = new mysqli($server, $user, $pass, $db);

	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
?>
