<?php
	include('../include/connection.php');
	
	if($_REQUEST['id']!='')
	{
		$id = $_REQUEST['id'];
		
		global $conn;
		
		$strQry = "delete FROM tbl_users WHERE id = '".$id."'";
		$result = mysqli_query($conn, $strQry);
		// if(mysqli_num_rows($result) > 0)
		// {
		// 	$row = mysqli_fetch_array($result);
		// 	$fullName = $row['first_name']." ".$row['last_name'];
		// }
		// return $fullName;

		//update_table_data('tbl_questions', $columns, 'id="'.$_REQUEST['id'].'"');
	}
	
	header("Location: users");
?>