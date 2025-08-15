<?php
	include('../include/connection.php');
	
	if($_REQUEST['id']!='')
	{
		$columns = "is_deleted='1' ";
		update_table_data('tbl_questions', $columns, 'id="'.$_REQUEST['id'].'"');
	}
	
	header("Location: questions");
?>