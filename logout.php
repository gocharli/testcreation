<?php
	include('include/connection.php');
	session_unset();
	unset($_SESSION['student_login']);
	header("Location: index");
?>