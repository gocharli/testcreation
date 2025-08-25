<?php 
	// in this file we wil define all generic functins 
	// This is to display data from table
	function get_table_data($tbl, $where='', $order='', $limit='')
	{
		global $conn;
		$sql  = "select * from $tbl";
		if(!empty($where))
		{
			$sql  .= " where $where";
		}
		if(!empty($order))
		{
			$sql  .= " order by $order";
		}
		if(!empty($limit))
		{
			$sql  .= " limit 0, $limit";
		}
		$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_object($res))
		{
			$array[] = $row;
		}
		if(!empty($array))
		{
			return $array;
		} 
	}
	
	// insert table data
	function insert_table_data($array3,$table_name)
	{
		global $conn;
		
		$query ="insert into ";
		$query.=$table_name;
		$query.=" set ";
		$count= count($array3);
		$count1=1;
		foreach ($array3 as $key => $value)
		{
			if($count==$count1)
			{
				$query.= $key.'='."'$value'";
			}
			else
			{
				$query.= $key.'='."'$value'".',';
			}
			$count1++;
		}		
		if(mysqli_query($conn, $query))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// update table data
	function update_table_data($tbl, $columns, $where )
	{
		global $conn;
		$sql  = "update $tbl SET $columns where $where";
		$res  = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		return 1;
	}	
	
	function execute_query($sql){
		global $conn;
		// $sql  =ALTER TABLE `users` ADD `slug` VARCHAR(255) NOT NULL AFTER `id`;
		$res  = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		return 1;
	}

	  function slugify($text, string $divider = '-')
	{
	  // replace non letter or digits by divider
	  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
	
	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	
	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);
	
	  // trim
	  $text = trim($text, $divider);
	
	  // remove duplicate divider
	  $text = preg_replace('~-+~', $divider, $text);
	
	  // lowercase
	  $text = strtolower($text);
	
	  if (empty($text)) {
		return 'n-a';
	  }
	
	  return $text;
	}
	 function create_slug($table, $name, $field = 'slug')
	{
		
		$table = $table;    //Write table name
		$field = $field;         //Write field name
		$slug = $name;  //Write title for slug
		$slug = slugify($name);
		
		$key = NULL;
		$value = NULL;
		$i = 0;
		$params = array();
		$params[$field] = $slug;

		if ($key) $params["$key !="] = $value;
		while(get_table_data($table,' slug="'.$slug.'" ')) {
			if (!preg_match('/-{1}[0-9]+$/', $slug))
				$slug .= '-' . ++$i;
			else
				$slug = preg_replace('/[0-9]+$/', ++$i, $slug);
			$params[$field] = $slug;
		}
		
		return $alias = $slug;
	}
	
	// get last insert id
	function last_id()
	{
		global $conn;
		return mysqli_insert_id($conn);	
	}
	
	// function to convert data from 03/02/2015 to 2015-02-03
	function zoh_date_formate($string)
	{
		//$string = "30/04/2015";
		$dt = str_replace('/', '-', $string);
		$date = explode('-',$dt);
		return $date[2].'-'.$date[1].'-'.$date[0];
	}
	
	// function to find total records
	function find_total($table, $where='')
	{
		global $conn;
		$query = "SELECT COUNT(*) as num FROM $table where 1";
        if(!empty($where))
		{
			$query .= " AND $where ";
		}
		$result = mysqli_query($conn, $query);
		$total_pages = mysqli_fetch_array($result);
		//$total_pages = mysql_fetch_array(mysql_query($conn, $query));
        return $total_pages['num'];     
	}
	
	// delete table data
	function delete_data($tbl, $where)
	{
		global $conn;
		$sql_del = "delete from $tbl where $where";
		if(mysqli_query($conn, $sql_del))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// function to get single column from a table
	function get_single_Column($col, $tbl, $where)
	{
		echo  $sql = "select $col from $tbl where $where";
		$res = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_object($res);
		print stripslashes($row->$col);
	}
	
	// check if this is the current page, then add the active class to the menu
	function active_menu($page)
	{
		//echo SITE_PATH.$_SERVER['REQUEST_URI'];
		//echo "==".HTTP_PATH.$page;
		if(SITE_PATH.$_SERVER['REQUEST_URI'] == HTTP_PATH.$page)
		{
			print 'active';
		}
		else
		{
		
		}
	}
	
	
	function random_number($limit=4)
	{
		$random = substr(rand(), 0, $limit);
		return $random;	
	}
	
	function token_generate($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < $length; $i++)
		{
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
	}
?>