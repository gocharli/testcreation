<?php



// Define constant from env
define('APPLICATION_MODE', (int) ($_ENV['APPLICATION_MODE'] ?? 0));

	if(APPLICATION_MODE == 1)
	{
		
		define('DB_HOST', $_ENV['DB_HOST_LOCAL']);
    define('DB_NAME', $_ENV['DB_NAME_LOCAL']);
    define('DB_USER', $_ENV['DB_USER_LOCAL']);
    define('DB_PASS', $_ENV['DB_PASS_LOCAL']);
	}
	
	// Create connection
	// $conn = new mysqli($server, $user, $pass, $db);
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
?>
