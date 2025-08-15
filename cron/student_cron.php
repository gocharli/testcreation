<?php
	require_once('database.php');
	require_once('db_functions.php');
	
	include('functions.php');
	$functions = new functions();
	
	//********************************	
	$timezone = date_default_timezone_set('US/Eastern');
	$current_time = date('H:i:s');
	
	$count = 0;
	$check_user_active = get_table_data('tbl_users', 'id != "" AND status = "Active" ');
	if($check_user_active != '' )
	{
		foreach($check_user_active as $key => $val)
		{
			$current_date = date('Y-m-d');
			$expiry_info = get_table_data('tbl_subscribe_package', 'id !="" AND student_id="'.$val->id.'" AND expiry_date < "'.$current_date.'" AND subscription_status = "Active" ');
			if($expiry_info != '' )
			{
				foreach($expiry_info as $key => $value)
				{
					$currentDate = date('Y-m-d');
					$expiryDate = $value->expiry_date;
							
					if($currentDate > $expiryDate)
					{
						$columns = "subscription_status='Expired' ";
						update_table_data('tbl_subscribe_package', $columns, 'id="'.$value->id.'"');
					}
					
					$txt = json_encode($expiry_info);
					$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);				
					@fwrite($myfile, $txt);
					@fclose($myfile);
				}
			}			
		}
	}	
?>