<?php
	include('../include/connection.php');
	unset($_SESSION['user_login']);
	header("Location: index");
?>