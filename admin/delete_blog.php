<?php
	include('../include/connection.php');
	include('../include/functions.php');
	if(!isset($_SESSION['user_login'])){ header('Location:index'); }
	if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
		$columns = "is_deleted='1'";
		update_table_data('tbl_blogs', $columns, 'id="'.intval($_REQUEST['id']).'"');
	}
	header('Location: blogs');
	exit;
?>