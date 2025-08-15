<?php
include('../include/connection.php');
echo "hi";
// define('APPLICATION_MODE',1);
	
// if(APPLICATION_MODE == 1)
// {
//     $server = "localhost";
//     $db = "dbgjsjwvd65pb3";
//     $user = "uyu599yh44xwr";
//     $pass = "kas9q3gkcfca";
// }

// // Create connection
// $conn = new mysqli($server, $user, $pass, $db);

// // Check connection
// if ($conn->connect_error)
// {
//     die("Connection failed: " . $conn->connect_error);
// }
//Connect to our MySQL database using PHP's PDO extension. 
// $pdo = new PDO('mysql:host=localhost;dbname=dbgjsjwvd65pb3', 'uyu599yh44xwr', 'kas9q3gkcfca');

//This SQL query adds our new column after the first column (id).
$sql = "ALTER TABLE `tbl_questions` ADD `is_show_video` ENUM('explanation','alternative') NOT NULL DEFAULT 'explanation' AFTER `video`;";

//Execute the query.





$result = mysqli_query($conn, $sql);
// $result = $conn->query($sql);

print_r($result); exit;
