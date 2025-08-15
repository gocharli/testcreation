<?php
	include('connection.php');
	include('functions.php');
	$functions = new functions;
	
	$reqPost = $_REQUEST['submit'];
	
	switch($reqPost)
	{
		//*************FOR LOGIN
		case 'Login':
		
			$rememberme = '';
			if(isset($_REQUEST['userName'])){$userName = $_REQUEST['userName'];}
			if(isset($_REQUEST['userPassword'])){$userPassword = $_REQUEST['userPassword'];}
			if(isset($_REQUEST['rememberme'])){$rememberme = $_REQUEST['rememberme'];}
			
			if(isset($_POST['submit']))
			{
				if($userName!='' && $userPassword!='')
				{
					$login_info = get_table_data('tbl_admin', 'email_id="'.$userName.'" AND password="'.md5($userPassword).'" ');
					if($login_info != '')
					{
						$login_status = get_table_data('tbl_admin', 'email_id="'.$userName.'" AND status="Active" ');
						if($login_status !='')
						{
							foreach($login_status as $key => $value)
							{
								$_SESSION['user_login']= $value->id;  // Initializing Session with value of PHP Variable
								$_SESSION['user_type']= $value->type;  // Initializing Session with value of PHP Variable
								
								if($rememberme == '1')
								{
									setcookie('userName', $userName, time() + (86400 * 7)); // 86400 = 1 day
									setcookie('userPassword', $userPassword, time() + (86400 * 7)); // 86400 = 1 day
								}
								else
								{
									setcookie('userName', $userName, time() - (86400 * 7)); // 86400 = 1 day
									setcookie('userPassword', $userPassword, time() - (86400 * 7)); // 86400 = 1 day
								}
							
							}
							echo json_encode(array('code'=>1, 'message'=>''));
							exit;
						} 
						else
						{
							echo json_encode(array('code'=>2, 'message'=>'your account temporarily inactive please contact to admin'));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'invalid username/password'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
				
				
			}	 
		break;
		
		//*************FOR ADD SUBADMIN
		case 'Subadmin':
			
			if(isset($_REQUEST['firstName'])){$firstName = $_REQUEST['firstName'];}
			if(isset($_REQUEST['lastName'])){$lastName = $_REQUEST['lastName'];}
			if(isset($_REQUEST['emailid'])){$emailid = $_REQUEST['emailid'];}
			if(isset($_REQUEST['password'])){$password = $_REQUEST['password'];}
			if(isset($_REQUEST['rpassword'])){$rpassword = $_REQUEST['rpassword'];}
			
			if(isset($_POST['submit']))
			{
				if($firstName!='' && $lastName!='' && $emailid!='' && $password !='' && $rpassword!='')
				{
					if($password == $rpassword)
					{
						$user_info = get_table_data('tbl_admin', 'email_id="'.$emailid.'"');
						if($user_info == "")
						{
							$array_val = array("first_name" => $firstName, "last_name" => $lastName, "email_id" => $emailid, "password" => md5($password), "type" => 'subadmin', "status" => 'Active', "created_date" => date('Y-m-d H:i:s'));
							$insert_info = insert_table_data($array_val, 'tbl_admin');
							$last_id = last_id();
							if($last_id > 0)
							{
								echo json_encode(array('code'=>1, 'message'=>''));
								exit;
							}
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'email id already exists.'));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'your password and repeat password do not match.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR EDIT SUBADMIN
		case 'Editsubadmin':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['firstName'])){$firstName = $_REQUEST['firstName'];}
			if(isset($_REQUEST['lastName'])){$lastName = $_REQUEST['lastName'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $firstName!='' && $lastName!='' && $status!='')
				{
					$user_info = get_table_data('tbl_admin', 'id="'.$id.'"');
					if($user_info != "")
					{
						
						$columns = "first_name='".$firstName."', last_name='".$lastName."', status='".$status."' ";
						update_table_data('tbl_admin', $columns, 'id="'.$id.'"');
						echo json_encode(array('code'=>1, 'message'=>'subadmin info was successfully updated'));
						exit;
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR ADD CATEGORY
		case 'mainCategory':
			
			if(isset($_REQUEST['categoryName'])){$categoryName = $_REQUEST['categoryName'];}
			
			if(isset($_POST['submit']))
			{
				if($categoryName!='')
				{
					$category_info = get_table_data('tbl_category', 'category_name="'.$categoryName.'"');
					$slug = create_slug('tbl_category' ,'slug' ,  $categoryName);
					if($category_info == "")
					{
						$array_val = array("parent_id" => "", "category_name" => $categoryName, "created_by" => $_SESSION['user_login'], "status" => 'Active', "slug" => $slug ,   "created_date" => date('Y-m-d H:i:s'));
						$insert_info = insert_table_data($array_val, 'tbl_category');
						$last_id = last_id();
						if($last_id > 0)
						{
							echo json_encode(array('code'=>1, 'message'=>''));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'category name already exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR EDIT MAIN CATEGORY
		case 'editmaincategory':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['categoryName'])){$categoryName = $_REQUEST['categoryName'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $categoryName!='' && $status!='')
				{
					// execute_query('ALTER TABLE `tbl_category` ADD `slug` VARCHAR(255) NOT NULL AFTER `id`');
					$category_info = get_table_data('tbl_category', 'id="'.$id.'"');
					//   echo "<pre>";
					//  $slug = create_slug('tbl_category' ,'slug' ,  $categoryName);
					// print_r($category_info);
					// exit();
					if($category_info != "")
					{
						$check_category = get_table_data('tbl_category', 'id!="'.$id.'" AND category_name="'.$categoryName.'"');
						if($check_category == "")
						{
							$columns = "category_name='".$categoryName."', status='".$status."'   ";
							update_table_data('tbl_category', $columns, 'id="'.$id.'"');
							echo json_encode(array('code'=>1, 'message'=>'main category info was successfully updated'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'category already exists.'));
							exit;
						}
						
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR ADD SUB CATEGORY
		case 'addsubcategory':
			
			if(isset($_REQUEST['maincategory'])){$maincategory = $_REQUEST['maincategory'];}
			if(isset($_REQUEST['subcategory'])){$subcategory = $_REQUEST['subcategory'];}
			
			if(isset($_POST['submit']))
			{
				if($maincategory!='' && $subcategory!='')
				{
					$category_info = get_table_data('tbl_category', 'id="'.$maincategory.'" AND parent_id = "0" ');
					if($category_info != "")
					{
						$slug = create_slug('tbl_category' ,'slug' ,  $subcategory);
						$array_val = array("parent_id" => $maincategory, "slug" => $slug ,  "category_name" => $subcategory, "created_by" => $_SESSION['user_login'], "status" => 'Active', "created_date" => date('Y-m-d H:i:s'));
						$insert_info = insert_table_data($array_val, 'tbl_category');
						$last_id = last_id();
						if($last_id > 0)
						{
							echo json_encode(array('code'=>1, 'message'=>''));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'main category not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR EDIT SUB CATEGORY
		case 'editsubcategory':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['maincategory'])){$maincategory = $_REQUEST['maincategory'];}
			if(isset($_REQUEST['categoryName'])){$categoryName = $_REQUEST['categoryName'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $maincategory!='' && $categoryName!='' && $status!='')
				{
					$category_info = get_table_data('tbl_category', 'id="'.$id.'"');
					if($category_info != "")
					{
						$check_category = get_table_data('tbl_category', 'id!="'.$id.'" AND category_name="'.$categoryName.'" AND parent_id="'.$maincategory.'" ');
						if($check_category == "")
						{

							// $slug = create_slug('tbl_category' ,'slug' ,  $categoryName);
							$columns = "category_name='".$categoryName."', status='".$status."'  ";
							update_table_data('tbl_category', $columns, 'id="'.$id.'"');
							echo json_encode(array('code'=>1, 'message'=>'sub category info was successfully updated'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'category already exists.'));
							exit;
						}
						
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR ADD TYPE
		case 'addtype':
			
			if(isset($_REQUEST['subcategory'])){$subcategory = $_REQUEST['subcategory'];}
			if(isset($_REQUEST['typeName'])){$typeName = $_REQUEST['typeName'];}
			
			if(isset($_POST['submit']))
			{
				if($subcategory!='' && $typeName!='')
				{
					$type_info = get_table_data('tbl_types', 'id!="" AND subcategory_id="'.$subcategory.'" AND type_name = "'.$typeName.'" ');
					if($type_info == "")
					{
						$array_val = array("subcategory_id" => $subcategory, "type_name" => $typeName, "created_by" => $_SESSION['user_login'], "status" => 'Active', "created_date" => date('Y-m-d H:i:s'));
						$insert_info = insert_table_data($array_val, 'tbl_types');
						$last_id = last_id();
						if($last_id > 0)
						{
							echo json_encode(array('code'=>1, 'message'=>''));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'type name already exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR EDIT SUB CATEGORY
		case 'edittype':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['subcategory'])){$subcategory = $_REQUEST['subcategory'];}
			if(isset($_REQUEST['typeName'])){$typeName = $_REQUEST['typeName'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $subcategory!='' && $typeName!='' && $status!='')
				{
					$type_info = get_table_data('tbl_types', 'id="'.$id.'"');
					if($type_info != "")
					{
						$check_type = get_table_data('tbl_types', 'id!="'.$id.'" AND subcategory_id="'.$subcategory.'" AND type_name="'.$typeName.'" ');
						if($check_type == "")
						{
							$check_subject = get_table_data('tbl_subjects', 'id!="" AND type_id="'.$id.'" ');
							if($check_subject!='')
							{
								foreach($check_subject as $key => $row)
								{
									$columns = "category_id='".$subcategory."' ";
									update_table_data('tbl_subjects', $columns, 'id="'.$row->id.'"');
								}
							}
							
							$check_topic = get_table_data('tbl_topics', 'id!="" AND type_id="'.$id.'" ');
							if($check_topic!='')
							{
								foreach($check_topic as $key => $row)
								{
									$columns = "category_id='".$subcategory."' ";
									update_table_data('tbl_topics', $columns, 'id="'.$row->id.'"');
								}
							}
							
							$columns = "subcategory_id='".$subcategory."', type_name='".$typeName."', status='".$status."' ";
							update_table_data('tbl_types', $columns, 'id="'.$id.'"');
							echo json_encode(array('code'=>1, 'message'=>'type info was successfully updated'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'type already exists.'));
							exit;
						}
						
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR GET TYPE
		case 'gettype':
			
			if(isset($_REQUEST['category_id'])){$category_id = $_REQUEST['category_id'];}
			if(isset($_POST['submit']))
			{
				$type_info = get_table_data('tbl_types', 'id!="" AND subcategory_id="'.$category_id.'" AND status = "Active" ');
				if($type_info!="")
				{
					$html = '<label class="col-sm-2 col-form-label">Type</label>
					<div class="col-sm-10">
						<select name="type" id="Example" class="form-control" onChange="get_subject(this);">
							<option value="">Select Type</option>';
							foreach($type_info as $key => $row)
							{	
								$html .= '<option value='.$row->id.'>'.$row->type_name.'</option>';
							}
						$html .= '</select>';
					$html .= '</div>';
					
					echo json_encode(array('code'=>1, 'message'=>$html));
					exit;
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>''));
					exit;
				}
			}
		break;
		
		//*************FOR ADD SUBJECT
		case 'addsubject':
			
			if(isset($_REQUEST['subcategory'])){$subcategory = $_REQUEST['subcategory'];}
			if(isset($_REQUEST['type'])){$type = $_REQUEST['type'];}
			if(isset($_REQUEST['subjectName'])){$subjectName = $_REQUEST['subjectName'];}
			
			if(isset($_POST['submit']))
			{
				if($subcategory!='' && $type!='' && $subjectName!='')
				{
					$subject_info = get_table_data('tbl_subjects', 'id!="" AND category_id="'.$subcategory.'" AND type_id="'.$type.'" AND subject_name = "'.$subjectName.'" ');
					if($subject_info == "")
					{
						$array_val = array("category_id" => $subcategory, "type_id" => $type, "subject_name" => $subjectName, "created_by" => $_SESSION['user_login'], "status" => 'Active', "created_date" => date('Y-m-d H:i:s'));
						$insert_info = insert_table_data($array_val, 'tbl_subjects');
						$last_id = last_id();
						if($last_id > 0)
						{
							echo json_encode(array('code'=>1, 'message'=>''));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'subject name already exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR EDIT SUB SUBJECT
		case 'editsubject':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['subcategory'])){$subcategory = $_REQUEST['subcategory'];}
			if(isset($_REQUEST['type'])){$type = $_REQUEST['type'];}
			if(isset($_REQUEST['subjectName'])){$subjectName = $_REQUEST['subjectName'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $subcategory!='' && $type!='' && $subjectName!='' && $status!='')
				{
					$subject_info = get_table_data('tbl_subjects', 'id="'.$id.'"');
					if($subject_info != "")
					{
						$check_subject = get_table_data('tbl_subjects', 'id!="'.$id.'" AND category_id="'.$subcategory.'" AND type_id="'.$type.'" AND subject_name = "'.$subjectName.'" ');
						if($check_subject == "")
						{
							$columns = "category_id='".$subcategory."', type_id='".$type."', subject_name='".$subjectName."', status='".$status."' ";
							update_table_data('tbl_subjects', $columns, 'id="'.$id.'"');
							echo json_encode(array('code'=>1, 'message'=>'type info was successfully updated'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'subject name already exists.'));
							exit;
						}
						
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR GET SUBJECT
		case 'getsubject':
			
			if(isset($_REQUEST['type_id'])){$type_id = $_REQUEST['type_id'];}
			if(isset($_POST['submit']))
			{
				$subject_info = get_table_data('tbl_subjects', 'id!="" AND type_id="'.$type_id.'" AND status = "Active" ');
				if($subject_info!="")
				{
					$html = '<label class="col-sm-2 col-form-label">Subject</label>
					<div class="col-sm-10">
						<select name="subject" class="form-control" onchange="get_topic(this);">
							<option value="">Select Subject</option>';
							foreach($subject_info as $key => $row)
							{	
								$html .= '<option value='.$row->id.'>'.$row->subject_name.'</option>';
							}
						$html .= '</select>';
					$html .= '</div>';
					
					echo json_encode(array('code'=>1, 'message'=>$html));
					exit;
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>''));
					exit;
				}
			}
		break;
		
		//*************FOR GET PACKAGE
		case 'getpackage':
			
			if(isset($_REQUEST['category_id'])){$category_id = $_REQUEST['category_id'];}
			if(isset($_POST['submit']))
			{
				$package_info = get_table_data('tbl_packages', 'id!="" AND category_id="'.$category_id.'" AND status = "Active" ');
				if($package_info!="")
				{
					$html = '<label class="col-sm-2 col-form-label">Package</label>
					<div class="col-sm-10">
						<select name="package_id" class="form-control">
							<option value="">Select Package</option>';
							foreach($package_info as $key => $row)
							{	
								$html .= '<option value='.$row->id.'>'.$row->duration.' - '.$row->type.'</option>';
							}
						$html .= '</select>';
					$html .= '</div>';
					
					echo json_encode(array('code'=>1, 'message'=>$html));
					exit;
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>''));
					exit;
				}
			}
		break;
		
		//*************FOR ADD TOPIC
		case 'addtopic':
			
			if(isset($_REQUEST['subcategory'])){$subcategory = $_REQUEST['subcategory'];}
			if(isset($_REQUEST['type'])){$type = $_REQUEST['type'];}
			if(isset($_REQUEST['subject'])){$subject = $_REQUEST['subject'];}
			if(isset($_REQUEST['topicName'])){$topicName = $_REQUEST['topicName'];}
			
			if(isset($_POST['submit']))
			{
				if($subcategory!='' && $type!='' && $subject!='' && $topicName!='')
				{
					$topic_info = get_table_data('tbl_topics', 'id!="" AND category_id="'.$subcategory.'" AND type_id="'.$type.'" AND subject_id = "'.$subject.'"  AND topic_name = "'.$topicName.'" ');
					if($topic_info == "")
					{
						$array_val = array("category_id" => $subcategory, "type_id" => $type, "subject_id" => $subject,  "topic_name" => $topicName, "created_by" => $_SESSION['user_login'], "status" => 'Active', "created_date" => date('Y-m-d H:i:s'));
						$insert_info = insert_table_data($array_val, 'tbl_topics');
						$last_id = last_id();
						if($last_id > 0)
						{
							echo json_encode(array('code'=>1, 'message'=>''));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'topic name already exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR EDIT TOPIC
		case 'edittopic':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['subcategory'])){$subcategory = $_REQUEST['subcategory'];}
			if(isset($_REQUEST['type'])){$type = $_REQUEST['type'];}
			if(isset($_REQUEST['subject'])){$subject = $_REQUEST['subject'];}
			if(isset($_REQUEST['topicName'])){$topicName = $_REQUEST['topicName'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $subcategory!='' && $type!='' && $subject!='' && $topicName!='' && $status!='')
				{
					$topic_info = get_table_data('tbl_topics', 'id="'.$id.'"');
					if($topic_info != "")
					{
						$check_topic = get_table_data('tbl_topics', 'id!="'.$id.'" AND category_id="'.$subcategory.'" AND type_id="'.$type.'" AND subject_id = "'.$subject.'"  AND topic_name = "'.$topicName.'" ');
						if($check_topic == "")
						{
							$columns = "category_id='".$subcategory."', type_id='".$type."', subject_id='".$subject."', topic_name='".$topicName."', status='".$status."' ";
							update_table_data('tbl_topics', $columns, 'id="'.$id.'"');
							echo json_encode(array('code'=>1, 'message'=>'topic info was successfully updated'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'topic name already exists.'));
							exit;
						}
						
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR GET TOPIC
		case 'gettopic':
			
			if(isset($_REQUEST['subject_id'])){$subject_id = $_REQUEST['subject_id'];}
			if(isset($_POST['submit']))
			{
				$topic_info = get_table_data('tbl_topics', 'id!="" AND subject_id="'.$subject_id.'" AND status = "Active" ');
				if($topic_info!="")
				{
					$html = '<label class="col-sm-2 col-form-label">Topic</label>
					<div class="col-sm-10">
						<select name="topic" class="form-control"">
							<option value="">Select Topic</option>';
							foreach($topic_info as $key => $row)
							{	
								$html .= '<option value='.$row->id.'>'.$row->topic_name.'</option>';
							}
						$html .= '</select>';
					$html .= '</div>';
					
					echo json_encode(array('code'=>1, 'message'=>$html));
					exit;
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>''));
					exit;
				}
			}
		break;
		
		//*************FOR ADD QUESTION
		case 'addquestion':
			
			$topic = "";
			$answer_type = "MCQs";
			$answerType = "";
			
			if(isset($_REQUEST['questionCategory'])){$questionCategory = $_REQUEST['questionCategory'];}
			if(isset($_REQUEST['type'])){$type = $_REQUEST['type'];}
			if(isset($_REQUEST['subject'])){$subject = $_REQUEST['subject'];}
			if(isset($_REQUEST['topic'])){$topic = $_REQUEST['topic'];}
			if(isset($_REQUEST['questionTitle'])){$questionTitle = $_REQUEST['questionTitle'];}
			if(isset($_REQUEST['difficultyLevel'])){$difficultyLevel = $_REQUEST['difficultyLevel'];}			
			if(isset($_REQUEST['questionType'])){$questionType = implode(',', $_REQUEST['questionType']);}			
			if(isset($_REQUEST['is_correct'])){$is_correct = $_REQUEST['is_correct'];}
			if(isset($_REQUEST['explanation'])){$explanation = $_REQUEST['explanation'];}
			if(isset($_REQUEST['alternative'])){$alternative = $_REQUEST['alternative'];}
			if(isset($_REQUEST['questionHint'])){$questionHint = $_REQUEST['questionHint'];}
			if(isset($_REQUEST['estimatedTime'])){$estimatedTime = $_REQUEST['estimatedTime'];}
			
			if(isset($_REQUEST['answerType'])){$answerType = $_REQUEST['answerType'];}
			if(isset($_REQUEST['correct_answer'])){$correct_answer = $_REQUEST['correct_answer'];}
			
			if($answerType == 'MCQs')
			{
				$answer_type = $_REQUEST['options'][0];
			}
			else if($answerType == 'Detail')
			{
				$answer_type = $correct_answer;
				$is_correct = "0";
			}
			
			if(isset($_POST['submit']))
			{
				$ads = explode('iframe', $explanation);
				$link = "<iframe".$ads[1]."iframe>";
				
				if(isset($questionType)!="")
				{
					if($questionCategory!="" && $type!=""  && $subject!=""  && $questionTitle!=""  && $difficultyLevel!=""  && $answer_type!="" && $is_correct!=""  && $explanation!=""  && $estimatedTime!="")
					{
						$question_info = get_table_data('tbl_questions', 'id!="" AND category_id="'.$questionCategory.'" AND type_id="'.$type.'" AND subject_id = "'.$subject.'"  AND topic_id = "'.$topic.'"  AND title = "'.addslashes($questionTitle).'" ');
						if($question_info == "")
						{
							$array_val = array("category_id" => $questionCategory, "type_id" => $type, "subject_id" => $subject,  "topic_id" => $topic, "title" => addslashes($questionTitle), "explation" => addslashes($explanation), "level" => $difficultyLevel, "question_type" => $questionType, "answer_type" => $answerType, "hint" => addslashes($questionHint), "status" => 'Active', "is_deleted" => "0", "attemped_time" => $estimatedTime, "video" => addslashes($alternative), "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
							$insert_info = insert_table_data($array_val, 'tbl_questions');
							$last_id = last_id();
							if($last_id > 0)
							{
								if(isset($_FILES['questionImage']))
								{
									$file_name = $_FILES['questionImage']['name'];
									$file_size = $_FILES['questionImage']['size'];
									$file_tmp = $_FILES['questionImage']['tmp_name'];
									
									$filenameitems = explode(".", $file_name);

									$file_ext = $filenameitems[count($filenameitems) - 1]; // .ext
															  
									$expensions = array("jpeg","jpg","png","pdf");
								  
									if(in_array($file_ext,$expensions)=== false)
									{
									}
									else
									{
										$target = "../questionImg/".basename($file_name);
										
										if(move_uploaded_file($file_tmp, $target))
										{
											$columns = "image='".$file_name."' ";
											update_table_data('tbl_questions', $columns, 'id="'.$last_id.'"');
										}
										else
										{
											echo json_encode(array('code'=>0, 'message'=>'extension not allowed, please choose a JPEG or PNG file.'));
											exit;
										}
									}
								}

								if(isset($_FILES['referenceImage']))
								{
									$file_name = $_FILES['referenceImage']['name'];
									$file_size = $_FILES['referenceImage']['size'];
									$file_tmp = $_FILES['referenceImage']['tmp_name'];
									
									$filenameitems = explode(".", $file_name);

									$file_ext = $filenameitems[count($filenameitems) - 1]; // .ext
															  
									$expensions = array("jpeg","jpg","png","pdf");
								  
									if(in_array($file_ext,$expensions)=== false)
									{
									}
									else
									{
										$target = "../questionImg/".basename($file_name);
										
										if(move_uploaded_file($file_tmp, $target))
										{
											$columns = "referenceImage='".$file_name."' ";
											update_table_data('tbl_questions', $columns, 'id="'.$last_id.'"');
										}
										else
										{
											echo json_encode(array('code'=>0, 'message'=>'extension not allowed, please choose a JPEG or PNG file.'));
											exit;
										}
									}
								}

								
																
								if($answerType == 'MCQs')
								{
									foreach($_REQUEST['options'] as $key=>$value)
									{
										$array_val = array("question_id" => $last_id, "answer_value" => addslashes($value), "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
										$insert_info = insert_table_data($array_val, 'tbl_options');
										$lastId = last_id();
										if($lastId > 0)
										{
											if($key == $is_correct[0])
											{
												$columns = "option_id='".$lastId."' ";
												update_table_data('tbl_questions', $columns, 'id="'.$last_id.'"');
											}
										}							
									}
								}
								else if($answerType == 'Detail')
								{
									$array_val = array("question_id" => $last_id, "answer_value" => addslashes($correct_answer), "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
									$insert_info = insert_table_data($array_val, 'tbl_options');
									$lastId = last_id();
									if($lastId > 0)
									{
										$columns = "option_id='".$lastId."' ";
										update_table_data('tbl_questions', $columns, 'id="'.$last_id.'"');
									}	
								}
								
								echo json_encode(array('code'=>1, 'message'=>'question info was successfully added.'));
								exit;
							}
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'question already exists.'));
							exit;
						}
						
						
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'please select at least one question type.'));
					exit;
				}
				
			}
		break;
		
		//*************FOR EDIT QUESTION
		case 'editquestion':
			
			$topic = "";
			$answerType = "MCQs";

			//echo $_REQUEST['questionType']; exit;
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['questionCategory'])){$questionCategory = $_REQUEST['questionCategory'];}
			if(isset($_REQUEST['type'])){$type = $_REQUEST['type'];}
			if(isset($_REQUEST['subject'])){$subject = $_REQUEST['subject'];}
			if(isset($_REQUEST['topic'])){$topic = $_REQUEST['topic'];}
			if(isset($_REQUEST['questionTitle'])){$questionTitle = $_REQUEST['questionTitle'];}
			if(isset($_REQUEST['difficultyLevel'])){$difficultyLevel = $_REQUEST['difficultyLevel'];}			
			if(isset($_REQUEST['questionType'])){$questionType = implode(',', $_REQUEST['questionType']);}			
			if(isset($_REQUEST['is_correct'])){$is_correct = $_REQUEST['is_correct'];}
			if(isset($_REQUEST['explanation'])){$explanation = $_REQUEST['explanation'];}
			if(isset($_REQUEST['alternative'])){$alternative = $_REQUEST['alternative'];}
			if(isset($_REQUEST['questionHint'])){$questionHint = $_REQUEST['questionHint'];}
			if(isset($_REQUEST['estimatedTime'])){$estimatedTime = $_REQUEST['estimatedTime'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			if(isset($_REQUEST['answerType'])){$answerType = $_REQUEST['answerType'];}
			// echo "<pre>";
			// print_r($explanation);
			// exit();
			if($answerType == "MCQs")
			{
				if(isset($_REQUEST['options_new'])){$options_new = $_REQUEST['options_new'];}
				if(isset($_REQUEST['options'])){$options = $_REQUEST['options'];}
				if(isset($_REQUEST['optionids'])){$optionids = $_REQUEST['optionids'];}
				
				if($options == '')
				{
					$options = $_REQUEST['options_new'];
				}
				if($is_correct == '')
				{
					$is_correct = $_REQUEST['is_correct_new'];
				}
			}
			else if($answerType == "Detail")
			{
				if(isset($_REQUEST['correct_answer'])){$correct_answer = $_REQUEST['correct_answer'];}
				if(isset($_REQUEST['optionids'])){$optionids = $_REQUEST['optionids'];}
				$is_correct = '0';
				$options = '0';
			}
			
			if(isset($_POST['submit']))
			{
				$ads = explode('iframe', $explanation);
				
				$link = "<iframe".$ads[1]."iframe>";

				$ads2 = explode('iframe', $alternative);
				
				$link2 = "<iframe".$ads2[1]."iframe>";
				// echo "<pre>";
				// print_r($explanation);
				// print_r($link2);
				// print_r($ads2[1]);
				// print_r($_POST);
				// die;
				if(isset($questionType)!="")
				{
					if($id!="" && $questionCategory!="" && $type!=""  && $subject!=""  && $questionTitle!=""  && $difficultyLevel!=""  && $options!="" && $is_correct!=""  && $explanation!=""  && $estimatedTime!="")
					{
						$question_info = get_table_data('tbl_questions', 'id="'.$id.'" ');
						if($question_info != "")
						{
							
							$columns = "category_id='".$questionCategory."', type_id='".$type."', subject_id='".$subject."', topic_id='".$topic."', title='".addslashes($questionTitle)."', explation = '".addslashes($explanation)."', level = '".$difficultyLevel."', question_type = '".$questionType."', hint = '".addslashes($questionHint)."', attemped_time = '".$estimatedTime."', status='".$status."' , answer_type='".$answerType."' , video='".addslashes($alternative)."' ";
							update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
							
							if(isset($_FILES['questionImage']))
							{
								$file_name = $_FILES['questionImage']['name'];
								$file_size = $_FILES['questionImage']['size'];
								$file_tmp = $_FILES['questionImage']['tmp_name'];
									
								$filenameitems = explode(".", $file_name);

								$file_ext = $filenameitems[count($filenameitems) - 1]; // .ext
															  
								$expensions = array("jpeg","jpg","png","pdf");
							  
								if(in_array($file_ext,$expensions)=== false)
								{
								}
								else
								{
									$target = "../questionImg/".basename($file_name);
									
									if(move_uploaded_file($file_tmp, $target))
									{
										$columns = "image='".$file_name."' ";
										update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
									}
									else
									{
										echo json_encode(array('code'=>0, 'message'=>'extension not allowed, please choose a JPEG or PNG file.'));
										exit;
									}
								}
							}
							
							
							if(isset($_FILES['referenceImage']))
							{
								$file_name = $_FILES['referenceImage']['name'];
								$file_size = $_FILES['referenceImage']['size'];
								$file_tmp = $_FILES['referenceImage']['tmp_name'];
									
								$filenameitems = explode(".", $file_name);

								$file_ext = $filenameitems[count($filenameitems) - 1]; // .ext
															  
								$expensions = array("jpeg","jpg","png","pdf");
							  
								if(in_array($file_ext,$expensions)=== false)
								{
								}
								else
								{
									$target = "../questionImg/".basename($file_name);
									
									if(move_uploaded_file($file_tmp, $target))
									{
										$columns = "referenceImage='".$file_name."' ";
										update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
									}
									else
									{
										echo json_encode(array('code'=>0, 'message'=>'extension not allowed, please choose a JPEG or PNG file.'));
										exit;
									}
								}
							}


							
							if($answerType == "MCQs")
							{
								
								if($optionids!='')
								{
									foreach($optionids as $key => $value)
									{
										$options_info = get_table_data('tbl_options', 'id="'.$value.'" ');
										if($options_info!="")
										{
											$columns = "question_id='".$id."', answer_value='".$options[$key]."' ";
											update_table_data('tbl_options', $columns, 'id="'.$value.'"');
											
											if($is_correct[0]!='')
											{
												$columns = "option_id='".$is_correct[0]."' ";
												update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
											}
										
										}
									}
									if($_REQUEST['options_new']!='')
									{
										foreach($_REQUEST['options_new'] as $key=>$value)
										{
											$array_val = array("question_id" => $id, "answer_value" => addslashes($value), "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
											$insert_info = insert_table_data($array_val, 'tbl_options');
											$lastId = last_id();
											if($lastId > 0)
											{
												if($is_correct[0] == $key)
												{
													$columns = "option_id='".$lastId."' ";
													update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
												}
											}							
										}
									}
								}
								else
								{
									if($_REQUEST['options_new']!='')
									{
										$columns = "question_id='".$id."' ";
										delete_data('tbl_options', $columns);
										
										foreach($_REQUEST['options_new'] as $key=>$value)
										{
											$array_val = array("question_id" => $id, "answer_value" => addslashes($value), "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
											$insert_info = insert_table_data($array_val, 'tbl_options');
											$last_idd = last_id();
											if($last_idd > 0)
											{
												if($is_correct[0] == $key)
												{
													$columns = "option_id='".$last_idd."' ";
													update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
												}
											}							
										}
									}
								}
							}
							else if($answerType == "Detail")
							{
								if($optionids!='')
								{
									foreach($optionids as $key => $value)
									{
										
										$options_info = get_table_data('tbl_options', 'id="'.$value.'" ');
										if($options_info!="")
										{
											$columns = "id='".$value."' ";
											delete_data('tbl_options', $columns);									
										}				
									}
								}
								
								
								$options_info = get_table_data('tbl_options', 'question_id="'.$id.'" ');
								if($options_info=="")
								{
									$array_val = array("question_id" => $id, "answer_value" => addslashes($correct_answer), "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
									$insert_info = insert_table_data($array_val, 'tbl_options');
									$lastId = last_id();
									if($lastId > 0)
									{
										$columns = "option_id='".$lastId."' ";
										update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
									}
								}
								else
								{
									$columns = "answer_value='".addslashes($correct_answer)."' ";
									update_table_data('tbl_options', $columns, 'question_id="'.$id.'"');
								}
							}
							
												
							echo json_encode(array('code'=>1, 'message'=>'question info was successfully updated.'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'please select at least one question type.'));
					exit;
				}
				
			}
		break;
		
		//*************FOR BLOCK QUESTION
		case 'blockquestion':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='')
				{
					$question_info = get_table_data('tbl_questions', 'id="'.$id.'"');
					if($question_info != "")
					{
						$isBlock = '';
						if($question_info[0]->is_block == '0')
						{
							$isBlock = '1';
							$message = "question successfully blocked.";
						}
						else if($question_info[0]->is_block == '1')
						{
							$isBlock = '0';
							$message = "question successfully unblocked.";
						}
						$columns = "is_block = '".$isBlock."' ";
						update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
						echo json_encode(array('code'=>1, 'message'=>$message));
						exit;
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'invalid system id.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR GET COUTRIES
		case 'getcountry':
			
			if(isset($_POST['submit']))
			{
				$country_info = get_table_data('tbl_countries', 'id!="" ');
				if($country_info!="")
				{
					$html = '<select name="userCountry" class="form-control">
						<option value="">Select Country</option>';
						foreach($country_info as $key => $row)
						{	
							$html .= '<option value='.$row->id.'>'.$row->name.'</option>';
						}
					$html .= '</select>';
					
					$html .= '<select name="graduationYear" class="form-control">
						<option value="">Select Graduation Year</option>';
						$end_year = date('Y')+4;
						for($i=($end_year-50); $i<=$end_year; $i++)
						{	
							$html .= '<option value='.$i.'>'.$i.'</option>';
						}
					$html .= '</select>';
					
					$html .= '<input name="schoolName" id="schoolName" type="text" class="form-field" placeholder="School Name"/>';
					
					echo json_encode(array('code'=>1, 'message'=>$html));
					exit;
				}
			}
		break;
		
		//*************FOR GET COUTRIES
		case 'getstate':
			
			if(isset($_POST['submit']))
			{
				$country_info = get_table_data('tbl_countries', 'id!="" ');
				if($country_info!="")
				{
					$html = '<select name="userCountry" class="form-control">
						<option value="">Select Country</option>';
						foreach($country_info as $key => $row)
						{	
							$html .= '<option value='.$row->id.'>'.$row->name.'</option>';
						}
					$html .= '</select>';
					
					$html .= '<input name="userState" id="userState" type="text" class="form-field" placeholder="State"/>';
					
					$html .= '<select name="graduationYear" class="form-control">
						<option value="">Select Graduation Year</option>';
						$end_year = date('Y')+4;
						for($i=($end_year-50); $i<=$end_year; $i++)
						{	
							$html .= '<option value='.$i.'>'.$i.'</option>';
						}
					$html .= '</select>';
					
					$html .= '<input name="schoolName" id="schoolName" type="text" class="form-field" placeholder="School Name"/>';
					
					echo json_encode(array('code'=>1, 'message'=>$html));
					exit;
				}
			}
		break;
		
		//*************FOR SETTINGS
		case 'addsetting':
			
			if(isset($_REQUEST['category'])){$category = $_REQUEST['category'];}
			if(isset($_REQUEST['bannerText'])){$bannerText = $_REQUEST['bannerText'];}
			if(isset($_REQUEST['serviceTitle'])){$serviceTitle = $_REQUEST['serviceTitle'];}
			if(isset($_REQUEST['serviceDescription'])){$serviceDescription = $_REQUEST['serviceDescription'];}
			if(isset($_REQUEST['keyFeature'])){$keyFeature = $_REQUEST['keyFeature'];}
			
			if(isset($_POST['submit']))
			{
				if($category!="" && $bannerText!=""  && $serviceTitle!=""  && $serviceDescription!=""  && $keyFeature!="")
				{
					$setting_info = get_table_data('tbl_settings', 'id!="" AND category_id="'.$category.'" ');
					if($setting_info == "")
					{						
						$array_val = array("category_id" => $category, "banner_text" => addslashes($bannerText), "service_title" => addslashes($serviceTitle),  "service_description" => addslashes($serviceDescription), "key_feature" => addslashes($keyFeature), "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
						$insert_info = insert_table_data($array_val, 'tbl_settings');
						$last_id = last_id();
						if($last_id > 0)
						{
							if(isset($_FILES['bannerImage']))
							{
								$file_name = $_FILES['bannerImage']['name'];
								$file_size = $_FILES['bannerImage']['size'];
								$file_tmp = $_FILES['bannerImage']['tmp_name'];
								
								$filenameitems = explode(".", $file_name);

								$file_ext = $filenameitems[count($filenameitems) - 1]; // .ext
														  
								$expensions = array("jpeg","jpg","png","pdf");
							  
								if(in_array($file_ext,$expensions)=== false)
								{
								}
								else
								{
									$target = "../bannerImg/".basename($file_name);
									
									if(move_uploaded_file($file_tmp, $target))
									{
										$columns = "banner_image='".$file_name."' ";
										update_table_data('tbl_settings', $columns, 'id="'.$last_id.'"');
									}
									else
									{
										echo json_encode(array('code'=>0, 'message'=>'extension not allowed, please choose a JPEG or PNG file.'));
										exit;
									}
								}
							}
							echo json_encode(array('code'=>1, 'message'=>'setting info was successfully added.'));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'setting already exists.'));
						exit;
					}
					
					
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}
		break;
		
		//*************FOR EDIT SETTINGS
		case 'editsetting':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['category'])){$category = $_REQUEST['category'];}
			if(isset($_REQUEST['bannerText'])){$bannerText = $_REQUEST['bannerText'];}
			if(isset($_REQUEST['serviceTitle'])){$serviceTitle = $_REQUEST['serviceTitle'];}
			if(isset($_REQUEST['serviceDescription'])){$serviceDescription = $_REQUEST['serviceDescription'];}
			if(isset($_REQUEST['keyFeature'])){$keyFeature = $_REQUEST['keyFeature'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			
			if(isset($_POST['submit']))
			{				
				if($id!='' && $category!='' && $bannerText!='' && $serviceTitle!='' && $serviceDescription!='' && $keyFeature!='' && $status!='')
				{
					$setting_info = get_table_data('tbl_settings', 'id="'.$id.'"');
					if($setting_info != "")
					{
						$check_setting = get_table_data('tbl_settings', 'id!="'.$id.'" AND category_id="'.$category.'" ');
						if($check_setting == "")
						{
							$columns = "category_id='".$category."', banner_text='".$bannerText."', banner_text='".$bannerText."', service_title='".$serviceTitle."', service_description='".$serviceDescription."', key_feature = '".$keyFeature."', status='".$status."' ";
							update_table_data('tbl_settings', $columns, 'id="'.$id.'"');
							
							if(isset($_FILES['bannerImage']))
							{
								$file_name = $_FILES['bannerImage']['name'];
								$file_size = $_FILES['bannerImage']['size'];
								$file_tmp = $_FILES['bannerImage']['tmp_name'];
								
								$filenameitems = explode(".", $file_name);

								$file_ext = $filenameitems[count($filenameitems) - 1]; // .ext
														  
								$expensions = array("jpeg","jpg","png","pdf");
							  
								if(in_array($file_ext,$expensions)=== false)
								{
								}
								else
								{
									$target = "../bannerImg/".basename($file_name);
									
									if(move_uploaded_file($file_tmp, $target))
									{
										$columns = "banner_image='".$file_name."' ";
										update_table_data('tbl_settings', $columns, 'id="'.$id.'"');
									}
									else
									{
										echo json_encode(array('code'=>0, 'message'=>'extension not allowed, please choose a JPEG or PNG file.'));
										exit;
									}
								}
							}
							echo json_encode(array('code'=>1, 'message'=>'setting info was successfully updated'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'setting already exists.'));
							exit;
						}
						
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}
		break;
		
		//*************FOR ADD PACKAGES
		case 'addpackage':
			
			if(isset($_REQUEST['category'])){$category = $_REQUEST['category'];}
			if(isset($_REQUEST['price'])){$price = $_REQUEST['price'];}
			if(isset($_REQUEST['duration'])){$duration = $_REQUEST['duration'];}
			if(isset($_REQUEST['packageDescription'])){$packageDescription = $_REQUEST['packageDescription'];}
			if(isset($_REQUEST['type'])){$type = $_REQUEST['type'];}
			
			if(isset($_POST['submit']))
			{
				if($category!="" && $price!="" && $duration!="" && $packageDescription!="" && $type!="")
				{
					$setting_info = get_table_data('tbl_packages', 'id!="" AND category_id="'.$category.'" AND duration="'.$duration.'" AND type="'.$type.'" ');
					if($setting_info == "")
					{						
						$array_val = array("category_id" => $category, "price" => $price, "duration" => $duration, "description" => addslashes($packageDescription), "type" => $type, "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
						$insert_info = insert_table_data($array_val, 'tbl_packages');
						$last_id = last_id();
						if($last_id > 0)
						{
							echo json_encode(array('code'=>1, 'message'=>'package info was successfully added.'));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'package already exists against this category.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}
		break;
		
		//*************FOR EDIT PACKAGES
		case 'editpackage':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			
			if(isset($_REQUEST['category'])){$category = $_REQUEST['category'];}
			if(isset($_REQUEST['price'])){$price = $_REQUEST['price'];}
			if(isset($_REQUEST['duration'])){$duration = $_REQUEST['duration'];}
			if(isset($_REQUEST['packageDescription'])){$packageDescription = $_REQUEST['packageDescription'];}
			if(isset($_REQUEST['type'])){$type = $_REQUEST['type'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $category!='' && $price!='' && $duration!='' && $packageDescription!='' && $status!='')
				{
					
					$package_info = get_table_data('tbl_packages', 'id="'.$id.'"');
					if($package_info != "")
					{
						/* $check_package = get_table_data('tbl_packages', 'id!="'.$id.'" ');
						if($check_package == "")
						{ */
							$columns = "category_id='".$category."', price='".$price."', duration='".$duration."', description='".$packageDescription."', type='".$type."', status='".$status."' ";
							update_table_data('tbl_packages', $columns, 'id="'.$id.'"');
							
							echo json_encode(array('code'=>1, 'message'=>'package info was successfully updated'));
							exit;
						/* }
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'package already exists against this category.'));
							exit;
						} */
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}
		break;
		
		//*************FOR USER EXIST
		case 'CheckUser':
			
			if(isset($_POST['submit']))
			{
				if(isset($_REQUEST['emailId'])){$emailId = $_REQUEST['emailId'];}
				
				$user_info = get_table_data('tbl_users', 'username="'.$emailId.'"');
				if($user_info == "")
				{
					echo json_encode(array('code'=>1, 'message'=>'Available'));
					exit;
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'Unavailable'));
					exit;
				}
			
			}	 
		break;
		
		//*************FOR REGISTER USER
		case 'Register':
			
			if(isset($_POST['submit']))
			{
				$userCountry = "";
				$userState = "";
				$graduationYear = "";
				$schoolName = "";
				
				if(isset($_REQUEST['userEmail'])){$userEmail = $_REQUEST['userEmail'];}
				if(isset($_REQUEST['userPassword'])){$userPassword = $_REQUEST['userPassword'];}
				
				if(isset($_REQUEST['firstName'])){$firstName = $_REQUEST['firstName'];}
				if(isset($_REQUEST['lastName'])){$lastName = $_REQUEST['lastName'];}
				if(isset($_REQUEST['primaryAddress'])){$primaryAddress = $_REQUEST['primaryAddress'];}
				if(isset($_REQUEST['secondaryAddress'])){$secondaryAddress = $_REQUEST['secondaryAddress'];}
				if(isset($_REQUEST['city'])){$city = $_REQUEST['city'];}
				if(isset($_REQUEST['country'])){$country = $_REQUEST['country'];}
				if(isset($_REQUEST['state'])){$state = $_REQUEST['state'];}
				if(isset($_REQUEST['zipCode'])){$zipCode = $_REQUEST['zipCode'];}
				if(isset($_REQUEST['phoneNo'])){$phoneNo = $_REQUEST['phoneNo'];}
				
				if(isset($_REQUEST['userType'])){$userType = $_REQUEST['userType'];}
				if(isset($_REQUEST['userCountry'])){$userCountry = $_REQUEST['userCountry'];}
				if(isset($_REQUEST['userState'])){$userState = $_REQUEST['userState'];}
				if(isset($_REQUEST['graduationYear'])){$graduationYear = $_REQUEST['graduationYear'];}
				if(isset($_REQUEST['schoolName'])){$schoolName = $_REQUEST['schoolName'];}
				if(isset($_REQUEST['securityQustion1'])){$securityQustion1 = $_REQUEST['securityQustion1'];}
				if(isset($_REQUEST['securityAnswer1'])){$securityAnswer1 = $_REQUEST['securityAnswer1'];}
				if(isset($_REQUEST['securityQustion2'])){$securityQustion2 = $_REQUEST['securityQustion2'];}
				if(isset($_REQUEST['securityAnswer2'])){$securityAnswer2 = $_REQUEST['securityAnswer2'];}
				
				$user_info = get_table_data('tbl_users', 'username="'.$userEmail.'"');
				if($user_info == "")
				{
					$array_val = array("username" => $userEmail, "password" => md5($userPassword), "firstname" => $firstName, "lastname" => $lastName, "primaryaddress" => addslashes($primaryAddress), "secondaryaddress" => addslashes($secondaryAddress), "city" => $city, "country" => addslashes($country), "state" => addslashes($state), "zipcode" => $zipCode, "phone" => $phoneNo, "usertype" => $userType, "usercountry" => addslashes($userCountry), "userstate" => addslashes($userState), "graduationyear" => $graduationYear, "schoolname" => addslashes($schoolName), "securityquestion1" => $securityQustion1, "securityanswer1" => addslashes($securityAnswer1), "securityquestion2" => $securityQustion2, "securityanswer2" => addslashes($securityAnswer2), "status" => 'Active', "created_date" => date('Y-m-d H:i:s'));
					$insert_info = insert_table_data($array_val, 'tbl_users');
					$last_id = last_id();
					if($last_id > 0)
					{
						
						$array_val1 = array("user_id" => $last_id, "first_name" => $firstName, "last_name" => $lastName, "address1" => addslashes($primaryAddress), "addres2" => addslashes($secondaryAddress), "city" => $city, "county" => addslashes($country), "state" => addslashes($state), "zip_code" => $zipCode, "phone_no" => $phoneNo, "created_date" => date('Y-m-d H:i:s'));
						$insert_info1 = insert_table_data($array_val1, 'tbl_billing_info');
						
						$headers = '';
						$from = $form = "info@danquahprep.com";
						$to = $userEmail;
						$subject = "Registration Info";
						
						$message = "<body style='margin: 10px;'>
							<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 16px;'>
								<p>Dear ".$firstName." ".$lastName."</p>
								<p>Welcome ​to <strong>DanquahPrep.com</strong> ​Your login information is included below<br />
								Username : ".$userEmail."<br /><br />
								Please login at http://danquahprep/ using the above information.<br />
								Feel free to contact us if you need any assistance.<br />
								Thank you<br /><br />
								DanquahPrep Support
							</div>
						</body>";
						
						$headers.= "From: ".$form." <".$form."> \r\n";
						$headers.= "MIME-Version: 1.0\r\n"; 
						$headers.= "Content-Type: text/html; charset=utf-8\r\n"; 
						$headers.= "X-Priority: 1\r\n"; 
						
						if(mail($to, $subject, $message, $headers))
						{
							$_SESSION['student_login'] = $last_id;
							echo json_encode(array('code'=>1, 'message'=>'you have successfully registered.'));
							exit;
						}
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'user email id already exists.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR REGISTER USER
		case 'Register2':
			
			if(isset($_POST['submit']))
			{
				if(isset($_REQUEST['register_email'])){$register_email = $_REQUEST['register_email'];}
				if(isset($_REQUEST['register_password'])){$register_password = $_REQUEST['register_password'];}
				
				if($register_email != "" && $register_password != "")
				{
					$user_info = get_table_data('tbl_users', 'username="'.$register_email.'"');
					if($user_info == "")
					{
						$array_val = array("username" => $register_email, "password" => md5($register_password), "firstname" => "", "lastname" => "", "primaryaddress" => "", "secondaryaddress" => "", "city" => "", "country" => "", "state" => "", "zipcode" => "", "phone" => "", "usertype" => "", "usercountry" => "", "userstate" => "", "graduationyear" => "", "schoolname" => "", "securityquestion1" => "", "securityanswer1" => "", "securityquestion2" => "", "securityanswer2" => "", "status" => 'Active', "created_date" => date('Y-m-d H:i:s'));
						$insert_info = insert_table_data($array_val, 'tbl_users');
						$last_id = last_id();
						if($last_id > 0)
						{
							$header = '';
							$form = "support@testcreation.com";
							$to = $register_email;
							$subject = "Registration Info";
							$body = "<body style='margin: 10px;'>
								<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 16px;'>	
									<p>Dear User</p>
									Welcome to UWorld.com. Your login information is included below<br />
									Username : ".$register_email."<br /><br />
									Please login at http://www.uworld.com using the above information.<br />
									Feel free to contact us if you need any assistance.<br />
									Thank you<br /><br />
									UWorld Support
								</div>	
							</body>";
													
							$header .= "From: ".$form." <".$form."> \r\n";
							$header.= "MIME-Version: 1.0\r\n";
							$header.= "Content-Type: text/html; charset=utf-8\r\n"; 
							$header.= "X-Priority: 1\r\n"; 
							if(@mail($to, $subject, $body, $header))
							{
								$_SESSION['student_login'] = $last_id;
								echo json_encode(array('code'=>1, 'message'=>'you have successfully registered.'));
								exit;
							}
							else
							{
								$_SESSION['student_login'] = $last_id;
								echo json_encode(array('code'=>1, 'message'=>'you have successfully registered.'));
								exit;
							}
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'user email id already exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR QUICK START TEST
		case 'QuickTest':
			
			if(isset($_POST['submit']))
			{
				$test_mode = 'Tutor'; // quick test will be in Tutor mode always
				$user_id = "";
				$userType = "";
				if(isset($_REQUEST['test_mode'])){$test_mode = $_REQUEST['test_mode'];}
				if(isset($_REQUEST['categoryId'])){$categoryId = $_REQUEST['categoryId'];}
				if(isset($_REQUEST['typeId'])){$typeId = $_REQUEST['typeId'];}
				if(isset($_REQUEST['maxQuestion'])){$maxQuestion = $_REQUEST['maxQuestion'];}

				$_SESSION['test_mode'] = $test_mode;  // added by david
				$_SESSION['quick_test_mode'] = 1;  // added by david
				//exit;
				$exprity_date = $functions->get_first_expiry_date($_SESSION['student_login'], $categoryId);
				
				$totalQuestion = 0;
				if($exprity_date!='') 
				{  // Paid User
					$totalQuestion = 45;
					
					$user_id = $_SESSION['student_login'];
					$userType = "Register";
					
					//$get_questions = $functions->check_question_exists_demo($categoryId, $typeId);
					$get_questions = $functions->get_unused_question($categoryId, $typeId);
				
					if($get_questions > 0) 
					{
						// Added by David
						//$strQryTotalDemo = "SELECT count(*) as cnt FROM tbl_questions WHERE id != '' and category_id = ".$categoryId." AND is_deleted = '0' AND is_block = '0' AND status = 'Active' and question_type like '%demo%' ";
						// $strQryTotalDemo = "SELECT count(*) as cnt FROM tbl_questions WHERE id != '' AND category_id = '".$categoryId."' AND type_id = '".$typeId."' AND status = 'Active' AND is_deleted = '0' and is_block = '0' and  question_type like '%live%' "; // live because this is for paid users
						// $resultTotalDemo = mysqli_query($conn, $strQryTotalDemo);
						// $rowTotalDemo = mysqli_fetch_array($resultTotalDemo);
						// $available_questions = $rowTotalDemo['cnt'];
						// if($maxQuestion > $available_questions){
						// 	echo json_encode(array('code'=>0, 'message'=>'There are only '.$available_questions.' unused questions available for demo'));
						// 	exit;
						// }

						if($maxQuestion > $get_questions){
							echo json_encode(array('code'=>0, 'message'=>'There are only '.$get_questions.' unused questions available for demo'));
							exit;
						}

						
						// End Added by David


						if($maxQuestion <= $totalQuestion)
						{
							if($categoryId!="" && $typeId!="")
							{
								$ipaddress = $_SERVER['REMOTE_ADDR'];
								$randomNo = random_number();
								
								$array_val = array("user_id" => $user_id, "ip_address" => $ipaddress, "category_id" => $categoryId, "type_id" => $typeId, "user_type" => $userType, "random_id" => $randomNo, "created_date" => date('Y-m-d H:i:s'));
								$insert_info = insert_table_data($array_val, 'tbl_quick_test');
								$last_id = last_id();
								if($last_id > 0)
								{
									global $conn;
									
									$strQry = $functions->get_unused_question_query($categoryId, $typeId,$maxQuestion); //"SELECT id, question_type FROM tbl_questions WHERE id != '' AND category_id = '".$categoryId."' AND type_id = '".$typeId."' AND is_deleted = '0' AND is_block = '0' AND status = 'Active' and question_type like '%live%' ORDER BY RAND() LIMIT ".$maxQuestion." ";
									//echo $strQry; exit;
									// Updated by david 5 Oct 2020
									//$strQry = "SELECT id, question_type FROM tbl_questions WHERE id != '' AND is_deleted = '0' AND is_block = '0' AND status = 'Active' and question_type like '%demo%' ORDER BY RAND() LIMIT ".$maxQuestion." ";
									$result = mysqli_query($conn, $strQry);
									if(mysqli_num_rows($result) > 0)
									{
										while($row = mysqli_fetch_array($result))
										{
											//if($row['question_type'] == "Live,Demo" || $row['question_type'] == "Live") // only Demo question are coming here
											//{
												$questionInfo = get_table_data('tbl_questions', 'id="'.$row['id'].'" ');
												if($questionInfo !='')
												{
													foreach($questionInfo as $key => $value)
													{
														$array_val = array("test_id" => $randomNo, "user_id" => $user_id, "user_type" => $userType, "category_id" => $row['category_id'], "type_id" => $row['type_id'], "question_id" => $row['id'], "answer" => "Pending", "user_answer" => "", "solve_time" => "");
														$insert_info = insert_table_data($array_val, 'tbl_quick_user_test');
													}
												}
											//}
										}
									}else{
										echo json_encode(array('code'=>0, 'message'=>'Demo questions not found against this type.'));
										exit;
									}
									echo json_encode(array('code'=>1, 'test_id'=>$randomNo, 'message'=>'your test has been created successfully.'));
									exit;
								}
							}
							else
							{
								echo json_encode(array('code'=>0, 'message'=>'category id or type id is missing.'));
								exit;
							}
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'No of Questions(you entered) should be less than maximum limit.'));
							exit;
						}
					}else if($get_questions == 0)
					{
						echo json_encode(array('code'=>0, 'message'=>'There are no unused questions against this type.'));
						exit;
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'There are only '.$get_questions.' unused questions available against this type.'));
						exit;
					}				
				}
				else
				{  // Unpaid user

					$totalQuestion = 10;
					$user_id = $_SESSION['student_login'];

					$exprity_date = $functions->get_first_expiry_date($user_id, $categoryId);
					if($exprity_date!='') 
					{
						// Do Norhing
					}else{
						//echo $user_id; exit;
						$total_test_performed_by_user = $functions->get_total_test_performed_by_user($user_id);
						if($total_test_performed_by_user >= 3){
							echo json_encode(array('code'=>5, 'message'=>'You have already performed maximum 3 demo tests, Please subscribe now.'));
							exit;
						}
					}


					

					$userType = "Demo";
					
					//$get_questions = $functions->check_question_exists_demo($categoryId, $typeId);
					$get_questions = $functions->get_unused_question_demo($categoryId, $typeId);
				
					if($get_questions > 0)
					{

						// Added by David
						// $strQryTotalDemo = "SELECT count(*) as cnt FROM tbl_questions WHERE id != '' AND category_id = '".$categoryId."'  AND type_id = '".$typeId."' AND is_deleted = '0' AND is_block = '0' AND status = 'Active' and question_type like '%demo%' ";
						// $resultTotalDemo = mysqli_query($conn, $strQryTotalDemo);
						// $rowTotalDemo = mysqli_fetch_array($resultTotalDemo);
						// $available_questions = $rowTotalDemo['cnt'];
						// if($maxQuestion > $available_questions){
						// 	echo json_encode(array('code'=>0, 'message'=>'There are only '.$available_questions.' demo questions available for this type'));
						// 	exit;
						// }
						// End Added by David

						if($maxQuestion > $get_questions){
							echo json_encode(array('code'=>0, 'message'=>'There are only '.$get_questions.' demo questions available for this type.'));
							exit;
						}

						if($maxQuestion <= $totalQuestion)
						{
							if($categoryId!="" && $typeId!="")
							{
								$ipaddress = $_SERVER['REMOTE_ADDR'];
								$randomNo = random_number();
								
								$array_val = array("user_id" => $user_id, "ip_address" => $ipaddress, "category_id" => $categoryId, "type_id" => $typeId, "user_type" => $userType, "random_id" => $randomNo, "created_date" => date('Y-m-d H:i:s'));
								$insert_info = insert_table_data($array_val, 'tbl_quick_test');
								$last_id = last_id();
								if($last_id > 0)
								{
									global $conn;
									
									//$strQry = "SELECT id, question_type FROM tbl_questions WHERE id != '' AND category_id = '".$categoryId."' AND type_id = '".$typeId."' AND is_deleted = '0' AND is_block = '0' AND status = 'Active' and question_type like '%demo%' ORDER BY RAND() LIMIT ".$maxQuestion." ";
									$strQry = $functions->get_unused_question_query_demo($categoryId, $typeId,$maxQuestion);
									$result = mysqli_query($conn, $strQry);
									if(mysqli_num_rows($result) > 0)
									{
										while($row = mysqli_fetch_array($result))
										{
											// if($row['question_type'] == "Live,Demo" || $row['question_type'] == "Demo") // only Demo question are coming here
											// {
												$questionInfo = get_table_data('tbl_questions', 'id="'.$row['id'].'" ');
												if($questionInfo !='')
												{
													foreach($questionInfo as $key => $value)
													{
														$array_val = array("test_id" => $randomNo, "user_id" => $user_id, "user_type" => $userType, "category_id" => $row['category_id'], "type_id" => $row['type_id'], "question_id" => $row['id'], "answer" => "Pending", "user_answer" => "", "solve_time" => "");
														$insert_info = insert_table_data($array_val, 'tbl_quick_user_test');
													}
												}
											//}
										}
									}else{
										echo json_encode(array('code'=>0, 'message'=>'Demo questions are not available for this type.'));
										exit;
									}
									echo json_encode(array('code'=>1, 'test_id'=>$randomNo, 'message'=>'your test has been created successfully.'));
									exit;
								}
							}
							else
							{
								echo json_encode(array('code'=>0, 'message'=>'category id or type id is missing.'));
								exit;
							}
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'No of demo Questions(you entered) should be less than maximum limit ('.$totalQuestion.').'));
							exit;
						}
					}else if($get_questions == 0){

						echo json_encode(array('code'=>0, 'message'=>'Demo questions are not available for this type.'));
						exit;
						
					}else
					{
						echo json_encode(array('code'=>0, 'message'=>'There are only '.$get_questions.' demo questions available for this type.'));
						exit;
					}
					
				}
			}	 
		break;
		
		//*************FOR GENERATE TEST
		case 'GenerateTest':
			
			if(isset($_POST['submit']))
			{
				
				$test_mode = 'Tutor';
				$group = '';
				$difficulty_level = '';
				if(isset($_REQUEST['test_mode'])){$test_mode = $_REQUEST['test_mode'];}
				if(isset($_REQUEST['group'])){$group = implode("','",$_REQUEST['group']);}
				//if(isset($_REQUEST['difficulty_level'])){$difficulty_level = implode("','",$_REQUEST['difficulty_level']);}


				$_SESSION['test_mode'] = $test_mode;  // added by david
				$_SESSION['quick_test_mode'] = 0;  // added by david
			
				
				$user_id = "";
				$userType = "";
				if(isset($_REQUEST['categoryId'])){$categoryId = $_REQUEST['categoryId'];}
				if(isset($_REQUEST['typeId'])){$typeId = $_REQUEST['typeId'];}
				if(isset($_REQUEST['maximum_questions'])){$maxQuestion = $_REQUEST['maximum_questions'];} // Added by david
				if(isset($_REQUEST['maxQuestion'])){$maxQuestion = $_REQUEST['maxQuestion'];}


				// Added by david 8 and 12 Oct 2020

				if(isset($_REQUEST['QMode'])){$QMode = $_REQUEST['QMode'];}
				if(isset($_REQUEST['Qdifficulty'])){$Qdifficulty = $_REQUEST['Qdifficulty'];}
				if(isset($_REQUEST['Qtopic'])){$Qtopic = $_REQUEST['Qtopic'];}

				
				$whr=" AND question_type like '%live%' "; // where on tbl_questions

				if(trim($Qtopic) != ""){
					
					$whr.=" AND topic_id in (".$Qtopic.") ";
				
				}

				if(trim($Qdifficulty) != ""){
					
					$whr.=" AND level in (".$Qdifficulty.") ";
				
				}

				if($QMode == 'Unused'){  // Get used questions ids
					$used_q_ids = $functions->get_question_ids_by_Qmode($categoryId, $typeId, $QMode);
					if(trim($used_q_ids) != ""){
						$whr.=" AND id NOT IN(".$used_q_ids.") ";   // unused excluding used questions ids
					}
					
				}elseif($QMode == 'Incorrect'){ // Get Incorrect questions ids
					$incorrect_q_ids = $functions->get_question_ids_by_Qmode($categoryId, $typeId, $QMode);
					//echo $incorrect_q_ids; exit;
					if(trim($incorrect_q_ids) != ""){
						$whr.=" AND id IN(".$incorrect_q_ids.") ";  // incorrect questions ids
					}
				}else if($QMode == 'Marked'){ // Get Marked questions ids
					$marked_q_ids = $functions->get_question_ids_by_Qmode($categoryId, $typeId, $QMode);
					if(trim($marked_q_ids) != ""){
						$whr.=" AND id IN(".$marked_q_ids.") ";  // marked questions ids
					}
				}else{
					
				}

				//echo $whr; exit;
				
				//echo json_encode(array('code'=>0, 'message'=>$whr));
				//exit;

				// By david
				
				$exprity_date = $functions->get_first_expiry_date($_SESSION['student_login'], $categoryId);
				
				$totalQuestion = 0;
				if($exprity_date!='') 
				{
					$totalQuestion = 45;
					
					$user_id = $_SESSION['student_login'];
					$userType = "Register";
					
					$get_questions = $functions->check_question_exists_live($categoryId, $typeId, $whr); // including topic and difficulty options
				
					if($get_questions > 0) 
					{
						// Added by David 
						$available_questions = $functions->get_all_question($categoryId, $typeId, $whr); // all question of this type and category including topic and difficulty options
						if($available_questions < $maxQuestion){
							echo json_encode(array('code'=>0, 'message'=>'There are only '.$available_questions.' questions available against this combinition'));
							exit;
						}
						// End Added by David

						if($maxQuestion <= $totalQuestion)
						{
							if($categoryId!="" && $typeId!="")
							{
								global $conn;
								$ipaddress = $_SERVER['REMOTE_ADDR'];
								$randomNo = random_number();

								$array_val = array("user_id" => $user_id, "ip_address" => $ipaddress, "category_id" => $categoryId, "type_id" => $typeId, "user_type" => $userType, "random_id" => $randomNo, "created_date" => date('Y-m-d H:i:s'));
								$insert_info = insert_table_data($array_val, 'tbl_quick_test');
								$last_id = last_id();
								if($last_id > 0)
								{
									global $conn;
									
									$strQry = "SELECT id, question_type FROM tbl_questions WHERE id != '' AND category_id = '".$categoryId."' AND type_id = '".$typeId."' AND status = 'Active' AND is_deleted = '0' AND is_block = '0' ".$whr." ORDER BY RAND() LIMIT ".$maxQuestion." ";
									//echo json_encode(array('code'=>1, 'test_id'=>$randomNo, 'message'=>$strQry));
									//exit;
									$result = mysqli_query($conn, $strQry);
									if(mysqli_num_rows($result) > 0)
									{

										// $is_bookmark = 'No';
										// if($QMode == 'Marked'){
										// 	$is_bookmark = 'Yes';
										// }

										$repeated_q_ids = $functions->get_question_ids_by_Qmode($categoryId, $typeId, $QMode); // 
										$repeated_q_ids_arr = explode(',',$repeated_q_ids);
										//echo $repeated_q_ids;

										while($row = mysqli_fetch_array($result))
										{
											//if($row['question_type'] == "Live,Demo" || $row['question_type'] == "Live")  // only live question are coming here
											//{
												$questionInfo = get_table_data('tbl_questions', 'id="'.$row['id'].'" ');
												if($questionInfo !='')
												{
													foreach($questionInfo as $key => $value)
													{

														// Added by david 
														$is_bookmark = 'No';
														if($QMode != 'Unused'){ // to generate marked questions if already marked (Qmode is incorrect / marked / All)
															if (in_array($row['id'], $repeated_q_ids_arr)) { //echo "exists";
																
																$prev_quest = get_table_data('tbl_quick_user_test', 'question_id="'.$row['id'].'" AND user_id = "'.$user_id.'" AND category_id = "'.$categoryId.'" AND type_id = "'.$typeId.'" AND user_type like "%Register%" order by id desc limit 1'); // if selected All
																if($QMode == 'Incorrect'){
																	$prev_quest = get_table_data('tbl_quick_user_test', 'question_id="'.$row['id'].'" AND user_id = "'.$user_id.'" AND category_id = "'.$categoryId.'" AND type_id = "'.$typeId.'" AND user_type like "%Register%" AND answer != "Correct" order by id desc limit 1');
																}else if($QMode == 'Marked'){
																	$prev_quest = get_table_data('tbl_quick_user_test', 'question_id="'.$row['id'].'" AND user_id = "'.$user_id.'" AND category_id = "'.$categoryId.'" AND type_id = "'.$typeId.'" AND user_type like "%Register%" AND is_bookmark = "Yes" order by id desc limit 1');
																}
																if($prev_quest !='')
																{
																	foreach($prev_quest as $key => $value)
																	{
																		//echo '<pre>'; print_r($value);
																		if($value->is_bookmark == 'Yes'){
																			$is_bookmark = 'Yes';
																		}
																	}
																}
															}
														}
														// End Added by david


														$array_val = array("test_id" => $randomNo, "user_id" => $user_id, "user_type" => $userType, "category_id" => $value->category_id, "type_id" => $value->type_id, "question_id" => $row['id'], "answer" => "Pending", "user_answer" => "", "solve_time" => "", "is_bookmark"=>$is_bookmark);
														$insert_info = insert_table_data($array_val, 'tbl_quick_user_test');
													}
												}
											//}
										}
									}
									echo json_encode(array('code'=>1, 'test_id'=>$randomNo, 'message'=>'your test has been created successfully.'));
									exit;
								}
							}
							else
							{
								echo json_encode(array('code'=>0, 'message'=>'category id or type id is missing.'));
								exit;
							}
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'No of Questions(you entered) should be less than maximum limit.'));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'Questions not found against this combinition.'));
						exit;
					}				
				}else{
					echo json_encode(array('code'=>5, 'message'=>'Please subscribe first.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR SUBMIT ANSWER
		case 'answer':
			
			if(isset($_POST['submit']))
			{
				$opId = "";
				$rid = "";
				$answer_status = "";
				$sAnswer = "";

				$user_id = $_SESSION['student_login'];
				
				if(isset($_REQUEST['tid'])){$tid = $_REQUEST['tid'];}
				
				if($_REQUEST['aType'] == 'MCQs')
				{
					if(isset($_REQUEST['rid'])){$rid = $_REQUEST['rid'];}
				}
				else if($_REQUEST['aType'] == 'Detail')
				{
					if(isset($_REQUEST['sAnswer'])){$sAnswer = $_REQUEST['sAnswer'];}
				}
				
				if(isset($_REQUEST['opId'])){$opId = $_REQUEST['opId'];}
				if(isset($_REQUEST['qId'])){$qId = $_REQUEST['qId'];}
				if(isset($_REQUEST['stime'])){$stime = $_REQUEST['stime'];}
				
				
				if($_REQUEST['aType'] == 'MCQs')
				{
					if($rid == $opId)
					{
						$answer_status = "Correct";
						$ansType = "Correct";
					}
					else if($rid != $opId && $rid !='undefined')
					{
						$answer_status = "Wrong";
						$ansType = "Incorrect";
					}
					else if($rid == "" || $rid == "undefined")
					{
						$answer_status = "Pending";
						$ansType = "Omited";
					}									
				}
				else if($_REQUEST['aType'] == 'Detail')
				{
					$correctAnswer = $functions->get_answer_by_questionid($qId);
					
					if($sAnswer == $correctAnswer)
					{
						$answer_status = "Correct";
						$ansType = "Correct";
						$rid = $sAnswer;
					}
					else if($sAnswer != $correctAnswer)
					{
						$answer_status = "Wrong";
						$ansType = "Incorrect";
						$rid = $sAnswer;
					}
					else if($sAnswer == "")
					{
						$answer_status = "Pending";
						$ansType = "Omited";
						$rid = $sAnswer;
					}
				}
				$columns = "user_answer='".$rid."', answer='".$answer_status."', solve_time='".$stime."' ";
				update_table_data('tbl_quick_user_test', $columns, 'test_id="'.$tid.'" AND question_id="'.$qId.'" ');

				// Addd by david 9 Oct
				update_table_data('tbl_quick_user_test', $columns, 'user_id="'.$user_id.'" AND question_id="'.$qId.'" ');
				
				echo json_encode(array('code'=>1, 'message'=>$ansType));
				exit;
			}	
		break;
		
		//*************FOR SIGN IN
		case 'SignIn':
			
			if(isset($_REQUEST['userEmail'])){$userEmail = $_REQUEST['userEmail'];}
			if(isset($_REQUEST['userPassword'])){$userPassword = $_REQUEST['userPassword'];}
			
			if(isset($_POST['submit']))
			{
				if($userEmail!='' && $userPassword!='')
				{
					$login_info = get_table_data('tbl_users', 'username="'.$userEmail.'" AND password="'.md5($userPassword).'" ');
					if($login_info != '')
					{
						$login_status = get_table_data('tbl_users', 'username="'.$userEmail.'" AND status="Active" ');
						if($login_status !='')
						{
							foreach($login_status as $key => $value)
							{
								$_SESSION['student_login']= $value->id;  // Initializing Session with value of PHP Variable
							}
							echo json_encode(array('code'=>1, 'message'=>''));
							exit;
						} 
						else
						{
							echo json_encode(array('code'=>2, 'message'=>'your account temporarily inactive please contact to admin'));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'invalid username/password'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR PROFILE UPDATE
		case 'ProfileUpdate':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['firstName'])){$firstName = $_REQUEST['firstName'];}
			if(isset($_REQUEST['lastName'])){$lastName = $_REQUEST['lastName'];}
			if(isset($_REQUEST['primaryAddress'])){$primaryAddress = $_REQUEST['primaryAddress'];}
			if(isset($_REQUEST['secondaryAddress'])){$secondaryAddress = $_REQUEST['secondaryAddress'];}
			if(isset($_REQUEST['city'])){$city = $_REQUEST['city'];}
			if(isset($_REQUEST['country'])){$country = $_REQUEST['country'];}
			if(isset($_REQUEST['zipCode'])){$zipCode = $_REQUEST['zipCode'];}
			if(isset($_REQUEST['phoneNo'])){$phoneNo = $_REQUEST['phoneNo'];}
			if(isset($_REQUEST['userEmail'])){$userEmail = $_REQUEST['userEmail'];}
			if(isset($_REQUEST['userType'])){$userType = $_REQUEST['userType'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $firstName!='' && $lastName!='' && $primaryAddress!='' && $city!='' && $country!='' && $zipCode!=''&& $phoneNo!='' && $userEmail!='' && $userType!='')
				{
					$user_info = get_table_data('tbl_users', 'id="'.$id.'"');
					if($user_info != "")
					{
						$check_user = get_table_data('tbl_users', 'id!="'.$id.'" AND username = "'.$userEmail.'" ');
						if($check_user == "")
						{
							$columns = "username='".$userEmail."', firstname='".$firstName."', lastname='".$lastName."', primaryaddress='".$primaryAddress."' , secondaryaddress='".$secondaryAddress."' , city='".$city."' , country='".$country."' , zipcode='".$zipCode."' , phone='".$phoneNo."' , usertype='".$userType."' ";
							update_table_data('tbl_users', $columns, 'id="'.$id.'"');
							echo json_encode(array('code'=>1, 'message'=>'your profile info was successfully updated'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'email id already exists.'));
							exit;
						}
						
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR PASSWORD UPDATE
		case 'PasswordUpdate':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['oldPassword'])){$oldPassword = $_REQUEST['oldPassword'];}
			if(isset($_REQUEST['newPassword'])){$newPassword = $_REQUEST['newPassword'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $oldPassword!='' && $newPassword!='' )
				{
					$user_info = get_table_data('tbl_users', 'id="'.$id.'"');
					if($user_info != "")
					{
						$check_user = get_table_data('tbl_users', 'password = "'.md5($oldPassword).'" ');
						if($check_user != "")
						{
							$columns = "password='".md5($newPassword)."' ";
							update_table_data('tbl_users', $columns, 'id="'.$id.'"');
							echo json_encode(array('code'=>1, 'message'=>'your password was successfully updated'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'invalid old password.'));
							exit;
						}
						
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR ANSWER UPDATE
		case 'AnswerUpdate':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['securityQustion1'])){$securityQustion1 = $_REQUEST['securityQustion1'];}
			if(isset($_REQUEST['securityAnswer1'])){$securityAnswer1 = $_REQUEST['securityAnswer1'];}
			if(isset($_REQUEST['securityQustion2'])){$securityQustion2 = $_REQUEST['securityQustion2'];}
			if(isset($_REQUEST['securityAnswer2'])){$securityAnswer2 = $_REQUEST['securityAnswer2'];}
			
			if(isset($_POST['submit']))
			{
				$user_info = get_table_data('tbl_users', 'id="'.$id.'"');
				if($user_info != "")
				{
					$columns = "securityquestion1='".$securityQustion1."', securityanswer1='".$securityAnswer1."', securityquestion2='".$securityQustion2."', securityanswer2='".$securityAnswer2."' ";
					update_table_data('tbl_users', $columns, 'id="'.$id.'"');
					echo json_encode(array('code'=>1, 'message'=>'your info was successfully updated'));
					exit;
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR BILLING INFO UPDATE
		case 'BillingUpdate':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['bfName'])){$bfName = $_REQUEST['bfName'];}
			if(isset($_REQUEST['blName'])){$blName = $_REQUEST['blName'];}
			if(isset($_REQUEST['bAddress1'])){$bAddress1 = $_REQUEST['bAddress1'];}
			if(isset($_REQUEST['bAddress2'])){$bAddress2 = $_REQUEST['bAddress2'];}
			if(isset($_REQUEST['bCity'])){$bCity = $_REQUEST['bCity'];}
			if(isset($_REQUEST['bCountry'])){$bCountry = $_REQUEST['bCountry'];}
			if(isset($_REQUEST['bState'])){$bState = $_REQUEST['bState'];}
			if(isset($_REQUEST['bZipcode'])){$bZipcode = $_REQUEST['bZipcode'];}
			if(isset($_REQUEST['bPhoneno'])){$bPhoneno = $_REQUEST['bPhoneno'];}
			
			if(isset($_POST['submit']))
			{
				$user_info = get_table_data('tbl_billing_info', 'user_id="'.$id.'"');
				if($user_info != "")
				{
					$columns = "first_name='".$bfName."', last_name='".$blName."', address1='".$bAddress1."', addres2='".$bAddress2."', city='".$bCity."', county='".$bCountry."', state='".$bState."', zip_code='".$bZipcode."', phone_no='".$bPhoneno."' ";
					update_table_data('tbl_billing_info', $columns, 'user_id="'.$id.'"');
					echo json_encode(array('code'=>1, 'message'=>'your billing info was successfully updated'));
					exit;
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR SUBMIT BOOKMARK
		case 'bookmark':
			
			if(isset($_POST['submit']))
			{
				$isBookmark = "";
				$code = "";
				if(isset($_REQUEST['testId'])){$testId = $_REQUEST['testId'];}
				if(isset($_REQUEST['qId'])){$qId = $_REQUEST['qId'];}
				
				$test_info = get_table_data('tbl_quick_user_test', 'test_id="'.$testId.'" AND question_id="'.$qId.'" ');
				if($test_info != "")
				{
					if($test_info[0]->is_bookmark == "No")
					{
						$isBookmark = "Yes";
						$code = 1; 
					}
					else
					{
						$isBookmark = "No";
						$code = 2; 
					}
					
					$columns = "is_bookmark='".$isBookmark."' ";
					update_table_data('tbl_quick_user_test', $columns, 'id="'.$test_info[0]->id.'" ');
					
					
					echo json_encode(array('code'=>$code));
					exit;
				}
			}	 
		break;
		
		
		//*************FOR FORGOT PASSWORD
		case 'ForgotPassword':
			
			if(isset($_POST['submit']))
			{
				if(isset($_REQUEST['register_email'])){$register_email = $_REQUEST['register_email'];}
				
				$header ="";
				$user_info = get_table_data('tbl_users', 'id!="" AND username="'.$register_email.'" ');
				if($user_info != "")
				{
					$token = token_generate();
							
					$form = "support@danquahprep.com";
					$to = $register_email;
					$subject = "RxCalculatoin (Reset Password)";
					$body = "<body style='margin: 10px;'>
						<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>
						&nbsp;Hi <strong>".$user_info[0]->firstname." ".$user_info[0]->lastname."</strong><br>
						We received a request to reset the password associated with this email address. If you made this request, please click the link below to reset your password:<br><br>
						<a href='https://$_SERVER[HTTP_HOST]/reset_password?token=".$token."&id=".$user_info[0]->id."' style='text-decoration:none;'><div style='color: #FFF; background: #d63737; padding: 15px 35px 12px;font-size: 15px; width:187px; text-align: center; border-radius: 0.5em;'>RESET YOUR PASSWORD</div></a><br />
						If you ​did ​not ​request ​a ​password ​change ​please ​ignore ​this​ ​email.<br />
						Thanks​ ​-​ DanquahPrep.
						</div>
					</body>";
							
					$header.= "From: ".$form." <".$form."> \r\n";
					$header.= "MIME-Version: 1.0\r\n"; 
					$header.= "Content-Type: text/html; charset=utf-8\r\n"; 
					$header.= "X-Priority: 1\r\n";

					if(@mail($to, $subject, $body, $header))
					{
						$columns = "reset_password='".$token."' ";
						update_table_data('tbl_users', $columns, 'id="'.$user_info[0]->id.'"');
					}
					
					echo json_encode(array('code'=>1, 'message'=>'password reset link email has been sent to your email address.'));
					exit;   
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'email id not exists.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR RESET PASSWORD
		case 'ResetPassword':
			
			if(isset($_POST['submit']))
			{
				if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
				if(isset($_REQUEST['token'])){$token = $_REQUEST['token'];}
				if(isset($_REQUEST['new_password'])){$new_password = $_REQUEST['new_password'];}
				
				$user_info = get_table_data('tbl_users', 'id="'.$id.'" ');
				if($user_info != "")
				{
					$valid_toke = get_table_data('tbl_users', 'id="'.$id.'" AND reset_password="'.$token.'" ');
					if($valid_toke != '')
					{
						$password = md5($new_password);
						
						$columns = "reset_password='', password='".$password."' ";
						update_table_data('tbl_users', $columns, 'id="'.$user_info[0]->id.'"');
						
						echo json_encode(array('code'=>1, 'message'=>'your password successfully updated.'));
						exit;  
					}
					else 
					{
						echo json_encode(array('code'=>2, 'message'=>'token not exists or token expired.'));
						exit; 
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR UPDATE PROFILE AND BILLING INFO
		case 'ProfileBilling':
			
			if(isset($_POST['submit']))
			{
				$userCountry = "";
				$userState = "";
				$graduationYear = "";
				$schoolName = "";
				//*************FOR PROFILE INFO 
 				if(isset($_REQUEST['pfName'])){$pfName = $_REQUEST['pfName'];}
				if(isset($_REQUEST['plName'])){$plName = $_REQUEST['plName'];}
				
				if(isset($_REQUEST['ppAddress'])){$ppAddress = $_REQUEST['ppAddress'];}
				if(isset($_REQUEST['psAddress'])){$psAddress = $_REQUEST['psAddress'];}
				if(isset($_REQUEST['pCity'])){$pCity = $_REQUEST['pCity'];}
				if(isset($_REQUEST['pCountry'])){$pCountry = $_REQUEST['pCountry'];}
				if(isset($_REQUEST['pState'])){$pState = $_REQUEST['pState'];}				
				if(isset($_REQUEST['pZipcode'])){$pZipcode = $_REQUEST['pZipcode'];}
				if(isset($_REQUEST['pPhoneno'])){$pPhoneno = $_REQUEST['pPhoneno'];}				
				if(isset($_REQUEST['userType'])){$userType = $_REQUEST['userType'];}
				
				if(isset($_REQUEST['userCountry'])){$userCountry = $_REQUEST['userCountry'];}
				if(isset($_REQUEST['userState'])){$userState = $_REQUEST['userState'];}
				if(isset($_REQUEST['graduationYear'])){$graduationYear = $_REQUEST['graduationYear'];}
				if(isset($_REQUEST['schoolName'])){$schoolName = $_REQUEST['schoolName'];}
				
				//*************FOR BILLING INFO 
				if(isset($_REQUEST['bfName'])){$bfName = $_REQUEST['bfName'];}
				if(isset($_REQUEST['blName'])){$blName = $_REQUEST['blName'];}
				
				if(isset($_REQUEST['bpAddress'])){$bpAddress = $_REQUEST['bpAddress'];}
				if(isset($_REQUEST['bsAddress'])){$bsAddress = $_REQUEST['bsAddress'];}
				if(isset($_REQUEST['bCity'])){$bCity = $_REQUEST['bCity'];}
				if(isset($_REQUEST['bCountry'])){$bCountry = $_REQUEST['bCountry'];}
				if(isset($_REQUEST['bState'])){$bState = $_REQUEST['bState'];}				
				if(isset($_REQUEST['bZipcode'])){$bZipcode = $_REQUEST['bZipcode'];}
				if(isset($_REQUEST['bPhoneno'])){$bPhoneno = $_REQUEST['bPhoneno'];}
				
				$user_info = get_table_data('tbl_users', 'id="'.$_SESSION['student_login'].'"');
				if($user_info != "")
				{
					$columns = "firstname='".$pfName."', lastname='".$plName."', primaryaddress='".$ppAddress."' , secondaryaddress='".$psAddress."' , city='".$pCity."' , country='".$pCountry."' , state='".$pState."' , zipcode='".$pZipcode."' , phone='".$pPhoneno."' , usertype='".$userType."'  , usercountry='".$userCountry."'  , userstate='".$userState."'  , graduationyear='".$graduationYear."'  , schoolname='".$schoolName."' ";
					update_table_data('tbl_users', $columns, 'id="'.$_SESSION['student_login'].'"');
					
					if($bfName !='' && $blName !='' && $bpAddress !='' && $bCity !='' && $bCountry !='' && $bState !='' && $bZipcode !='' && $bPhoneno !='')
					{
						$user_info = get_table_data('tbl_billing_info', 'user_id="'.$_SESSION['student_login'].'"');
						if($user_info != "")
						{
							$columns = "first_name='".$bfName."', last_name='".$blName."', address1='".$bpAddress."', addres2='".$bsAddress."', city='".$bCity."', county='".$bCountry."', state='".$bState."', zip_code='".$bZipcode."', phone_no='".$bPhoneno."' ";
							update_table_data('tbl_billing_info', $columns, 'user_id="'.$_SESSION['student_login'].'"');
						}
						else
						{
							$array_val1 = array("user_id" => $_SESSION['student_login'], "first_name" => $bfName, "last_name" => $blName, "address1" => addslashes($bpAddress), "addres2" => addslashes($bsAddress), "city" => $bCity, "county" => addslashes($bCountry), "state" => addslashes($bState), "zip_code" => $bZipcode, "phone_no" => $bPhoneno, "created_date" => date('Y-m-d H:i:s'));
							$insert_info1 = insert_table_data($array_val1, 'tbl_billing_info');
						}
					}
					
					
					echo json_encode(array('code'=>1, 'message'=>'you have successfully updated your profile and billing info.'));
					exit;
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'user id not exists.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR GENERATE COUPON
		case 'generatecoupon':
			
			if(isset($_POST['submit']))
			{
				$length = 10;
				$code = '';  
				$code .= substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
				echo json_encode(array('code'=>1, 'message'=>$code));
				exit;
			}
		break;
		
		//*************FOR ADD DISCOUNT
		case 'adddiscount':
			
			if(isset($_REQUEST['category'])){$category = $_REQUEST['category'];}
			if(isset($_REQUEST['package_id'])){$package_id = $_REQUEST['package_id'];}
			if(isset($_REQUEST['coupon'])){$coupon = $_REQUEST['coupon'];}
			if(isset($_REQUEST['discount'])){$discount = $_REQUEST['discount'];}
			if(isset($_REQUEST['expiry_date'])){$expiry_date = $_REQUEST['expiry_date'];}
			
			if(isset($_POST['submit']))
			{
				if($category!='' && $package_id!='' && $coupon!='' && $discount!='' && $expiry_date!='')
				{
					$discount_info = get_table_data('tbl_discounts', 'id!="" AND package_id	="'.$package_id.'" ');
					if($discount_info == "")
					{
						$array_val = array("category_id" => $category, "package_id" => $package_id, "coupon" => $coupon,  "discount" => $discount, "expiry_date" => $expiry_date, "status" => 'Active', "created_date" => date('Y-m-d H:i:s'));
						$insert_info = insert_table_data($array_val, 'tbl_discounts');
						$last_id = last_id();
						if($last_id > 0)
						{
							echo json_encode(array('code'=>1, 'message'=>''));
							exit;
						}
					}
					else
					{
						$columns = "category_id='".$category."', package_id='".$package_id."', coupon='".$coupon."', discount='".$discount."', expiry_date='".$expiry_date."', status='Active' ";
						update_table_data('tbl_discounts', $columns, 'id="'.$discount_info[0]->id.'"');
						
						echo json_encode(array('code'=>1, 'message'=>''));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR EDIT DISCOUNT
		case 'editdiscount':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['category'])){$category = $_REQUEST['category'];}
			if(isset($_REQUEST['package_id'])){$package_id = $_REQUEST['package_id'];}
			if(isset($_REQUEST['coupon'])){$coupon = $_REQUEST['coupon'];}
			if(isset($_REQUEST['discount'])){$discount = $_REQUEST['discount'];}
			if(isset($_REQUEST['expiry_date'])){$expiry_date = $_REQUEST['expiry_date'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $category!='' && $package_id!='' && $coupon!='' && $discount!='' && $expiry_date!='' && $status!='')
				{
					$discount_info = get_table_data('tbl_discounts', 'id="'.$id.'"');
					if($discount_info != "")
					{
						$columns = "category_id='".$category."', package_id='".$package_id."', coupon='".$coupon."', discount='".$discount."', expiry_date='".$expiry_date."', status='".$status."' ";
						update_table_data('tbl_discounts', $columns, 'id="'.$id.'"');
						echo json_encode(array('code'=>1, 'message'=>'subadmin info was successfully updated'));
						exit;
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;
		
		//*************FOR GET DISCOUNT
		case 'getdiscount':
			
			if(isset($_REQUEST['discount_code'])){$discount_code = $_REQUEST['discount_code'];}
			if(isset($_REQUEST['cid'])){$cid = $_REQUEST['cid'];}
			if(isset($_REQUEST['pid'])){$pid = $_REQUEST['pid'];}
			if(isset($_REQUEST['main_price'])){$main_price = $_REQUEST['main_price'];}
			
			if(isset($_POST['submit']))
			{
				if($discount_code!='' && $cid!='' && $pid!='' && $main_price != "")
				{
					$today_date = date('Y-m-d');
					$discount_info = get_table_data('tbl_discounts', 'id!="" AND category_id = "'.$cid.'" AND package_id = "'.$pid.'" AND coupon = "'.$discount_code.'" AND expiry_date >= "'.$today_date.'" ');

					if($discount_info != "")
					{
						$package_info = get_table_data('tbl_packages', 'id="'.$pid.'" AND status="Active" ');
						
						$price = $package_info[0]->price;
						$discount = $discount_info[0]->discount;
						
						$discountamt = ($discount*$price)/100;
						$main_price = number_format($main_price - $discountamt,2);
						echo json_encode(array('code'=>1, 'message'=>$discountamt, 'main_price'=>$main_price));
						exit;
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'invalid discount coupon'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'please enter discount coupon.'));
					exit;
				}
			}	 
		break;


		//////////// Code Added By David////////////

		//*************FOR EDIT ADMIN
		case 'Editadmin':
			
			$id = $_SESSION['user_login'];
			if(isset($_REQUEST['firstName'])){$firstName = $_REQUEST['firstName'];}
			if(isset($_REQUEST['lastName'])){$lastName = $_REQUEST['lastName'];}
			if(isset($_REQUEST['email'])){$email = $_REQUEST['email'];}

			if(isset($_REQUEST['password'])){$password = $_REQUEST['password'];}
			if(isset($_REQUEST['cpassword'])){$cpassword = $_REQUEST['cpassword'];}
			
			if(isset($_POST['submit']))
			{
				if($password != "" && $password != $cpassword){
					echo json_encode(array('code'=>0, 'message'=>'Password does not match!'));
					exit;
				}

				if($id!='' && $firstName!='' && $lastName!='' && $email!='')
				{
					$user_info = get_table_data('tbl_admin', 'id="'.$id.'"');
					if($user_info != "")
					{
						$columns = "first_name='".$firstName."', last_name='".$lastName."', email_id='".$email."' ";
						if($password != "" && $password == $cpassword){
							$password = md5($password);
							$columns = "password = '".$password."', first_name='".$firstName."', last_name='".$lastName."', email_id='".$email."' ";
						}
						
						update_table_data('tbl_admin', $columns, 'id="'.$id.'"');
						echo json_encode(array('code'=>1, 'message'=>'Admin info is updated successfully'));
						exit;
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id does not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
					exit;
				}
			}	 
		break;

		//*************FOR EDIT User
		case 'EditUser':
			
			$id = "";
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['firstname'])){$firstname = $_REQUEST['firstname'];}
			if(isset($_REQUEST['lastname'])){$lastname = $_REQUEST['lastname'];}
			if(isset($_REQUEST['username'])){$username = $_REQUEST['username'];}

			if(isset($_REQUEST['primaryaddress'])){$primaryaddress = $_REQUEST['primaryaddress'];}
			if(isset($_REQUEST['secondaryaddress'])){$secondaryaddress = $_REQUEST['secondaryaddress'];}
			if(isset($_REQUEST['country'])){$country = $_REQUEST['country'];}
			if(isset($_REQUEST['city'])){$city = $_REQUEST['city'];}
			if(isset($_REQUEST['state'])){$state = $_REQUEST['state'];}
			if(isset($_REQUEST['zipcode'])){$zipcode = $_REQUEST['zipcode'];}
			if(isset($_REQUEST['phone'])){$phone = $_REQUEST['phone'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}

			if(isset($_REQUEST['password'])){$password = $_REQUEST['password'];}
			if(isset($_REQUEST['cpassword'])){$cpassword = $_REQUEST['cpassword'];}
			
			if(isset($_POST['submit']))
			{
				if($password != "" && $password != $cpassword){
					echo json_encode(array('code'=>0, 'message'=>'Password does not match!'));
					exit;
				}

				if($id!='' && $firstname!='' && $lastname!='' && $username!='')
				{
					$user_info = get_table_data('tbl_users', 'id="'.$id.'"');
					if($user_info != "")
					{
						$columns = "firstname='".$firstname."', lastname='".$lastname."', username='".$username."' , primaryaddress='".$primaryaddress."' , secondaryaddress='".$secondaryaddress."' , country='".$country."' , city='".$city."' , state='".$state."' , zipcode='".$zipcode."' , phone='".$phone."' , status='".$status."' ";
						if($password != "" && $password == $cpassword){
							$password = md5($password);
							$columns = "password = '".$password."', firstname='".$firstname."', lastname='".$lastname."', username='".$username."' , primaryaddress='".$primaryaddress."' , secondaryaddress='".$secondaryaddress."' , country='".$country."' , city='".$city."' , state='".$state."' , zipcode='".$zipcode."' , phone='".$phone."' , status='".$status."' ";
						}
						
						update_table_data('tbl_users', $columns, 'id="'.$id.'"');
						echo json_encode(array('code'=>1, 'message'=>'User info is updated successfully'));
						exit;
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id does not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'Please enter required fields.'));
					exit;
				}
			}	 
		break;



		//*************FOR UPDATE TEST TITLE
		case 'UpdateTestTitle':
			
			if(isset($_POST['submit']))
			{	
				$id = "";
				$test_title = "";
				if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
				if(isset($_REQUEST['test_title'])){$test_title = $_REQUEST['test_title'];}
					//global $conn;	
					$columns = "test_title='".$test_title."' ";
					update_table_data('tbl_quick_test', $columns, 'id="'.$id.'"');
					
					?> <a id="test_<?php echo $id; ?>" href="javascript:;" onclick="edit_title('<?php echo $id; ?>', '<?php echo $test_title; ?>')" title="Edit Name"> <?php echo $test_title; ?> </a>  <?php 
					exit;		
			}

		break;


		//*************FOR UPDATE TEST TITLE
		case 'UpdateHelpSection':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['description'])){$description = $_REQUEST['description'];}
			
			if(isset($_POST['submit']))
			{
				if($description!='')
				{
					$help = get_table_data('tbl_user_settings', 'type = "help" ');

					if($help != "")
					{
						$columns = "description='".$description."' ";
						update_table_data('tbl_user_settings', $columns, 'id="'.$id.'"');
						echo json_encode(array('code'=>1, 'message'=>"Record updated successfully", 'main_price'=>$main_price));
						exit;
					}
					else
					{
						$array_val = array("description" => $description);
						$insert_info = insert_table_data($array_val, 'tbl_user_settings');
						$last_id = last_id();

						if($last_id > 0)
						{
							echo json_encode(array('code'=>1, 'message'=>'Record added successfully'));
							exit;
						}

					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'please enter description.'));
					exit;
				}
			}	 
		break;


		//*************FOR EDIT QUESTION
		case 'duplicatequestion':
			
			$topic = "";
			$answerType = "MCQs";

			//echo $_REQUEST['questionType']; exit;
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['questionCategory'])){$questionCategory = $_REQUEST['questionCategory'];}
			if(isset($_REQUEST['type'])){$type = $_REQUEST['type'];}
			if(isset($_REQUEST['subject'])){$subject = $_REQUEST['subject'];}
			if(isset($_REQUEST['topic'])){$topic = $_REQUEST['topic'];}
			if(isset($_REQUEST['questionTitle'])){$questionTitle = $_REQUEST['questionTitle'];}
			if(isset($_REQUEST['difficultyLevel'])){$difficultyLevel = $_REQUEST['difficultyLevel'];}			
			if(isset($_REQUEST['questionType'])){$questionType = implode(',', $_REQUEST['questionType']);}			
			if(isset($_REQUEST['is_correct'])){$is_correct = $_REQUEST['is_correct'];}
			if(isset($_REQUEST['explanation'])){$explanation = $_REQUEST['explanation'];}
			if(isset($_REQUEST['questionHint'])){$questionHint = $_REQUEST['questionHint'];}
			if(isset($_REQUEST['estimatedTime'])){$estimatedTime = $_REQUEST['estimatedTime'];}
			if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
			if(isset($_REQUEST['answerType'])){$answerType = $_REQUEST['answerType'];}
			
			if($answerType == "MCQs")
			{
				if(isset($_REQUEST['options_new'])){$options_new = $_REQUEST['options_new'];}
				if(isset($_REQUEST['options'])){$options = $_REQUEST['options'];}
				if(isset($_REQUEST['optionids'])){$optionids = $_REQUEST['optionids'];}
				
				if($options == '')
				{
					$options = $_REQUEST['options_new'];
				}
				if($is_correct == '')
				{
					$is_correct = $_REQUEST['is_correct_new'];
				}
			}
			else if($answerType == "Detail")
			{
				if(isset($_REQUEST['correct_answer'])){$correct_answer = $_REQUEST['correct_answer'];}
				if(isset($_REQUEST['optionids'])){$optionids = $_REQUEST['optionids'];}
				$is_correct = '0';
				$options = '0';
			}
			
			if(isset($_POST['submit']))
			{
				$ads = explode('iframe', $explanation);
				$link = "<iframe".$ads[1]."iframe>";
				if(isset($questionType)!="")
				{

					$array_val = array("category_id" => $questionCategory, "type_id" => $type, "subject_id" => $subject,  "topic_id" => $topic, "title" => addslashes($questionTitle), "explation" => addslashes($explanation), "level" => $difficultyLevel, "question_type" => $questionType, "answer_type" => $answerType, "hint" => addslashes($questionHint), "status" => 'Active', "is_deleted" => "0", "attemped_time" => $estimatedTime, "video" => $link, "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
					$insert_info = insert_table_data($array_val, 'tbl_questions');
					$id = last_id();  // duplicate id / new inserted id

					if($id!="" && $questionCategory!="" && $type!=""  && $subject!=""  && $questionTitle!=""  && $difficultyLevel!=""  && $options!="" && $is_correct!=""  && $explanation!=""  && $estimatedTime!="")
					{
						$question_info = get_table_data('tbl_questions', 'id="'.$id.'" ');
						if($question_info != "")
						{
							
							$columns = "category_id='".$questionCategory."', type_id='".$type."', subject_id='".$subject."', topic_id='".$topic."', title='".addslashes($questionTitle)."', explation = '".addslashes($explanation)."', level = '".$difficultyLevel."', question_type = '".$questionType."', hint = '".addslashes($questionHint)."', attemped_time = '".$estimatedTime."', status='".$status."' , answer_type='".$answerType."' , video='".$link."' ";
							update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
							
							if(isset($_FILES['questionImage']))
							{
								$file_name = $_FILES['questionImage']['name'];
								$file_size = $_FILES['questionImage']['size'];
								$file_tmp = $_FILES['questionImage']['tmp_name'];
									
								$filenameitems = explode(".", $file_name);

								$file_ext = $filenameitems[count($filenameitems) - 1]; // .ext
															  
								$expensions = array("jpeg","jpg","png","pdf");
							  
								if(in_array($file_ext,$expensions)=== false)
								{
								}
								else
								{
									$target = "../questionImg/".basename($file_name);
									
									if(move_uploaded_file($file_tmp, $target))
									{
										$columns = "image='".$file_name."' ";
										update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
									}
									else
									{
										echo json_encode(array('code'=>0, 'message'=>'extension not allowed, please choose a JPEG or PNG file.'));
										exit;
									}
								}
							}
							
							
							if(isset($_FILES['referenceImage']))
							{
								$file_name = $_FILES['referenceImage']['name'];
								$file_size = $_FILES['referenceImage']['size'];
								$file_tmp = $_FILES['referenceImage']['tmp_name'];
									
								$filenameitems = explode(".", $file_name);

								$file_ext = $filenameitems[count($filenameitems) - 1]; // .ext
															  
								$expensions = array("jpeg","jpg","png","pdf");
							  
								if(in_array($file_ext,$expensions)=== false)
								{
								}
								else
								{
									$target = "../questionImg/".basename($file_name);
									
									if(move_uploaded_file($file_tmp, $target))
									{
										$columns = "referenceImage='".$file_name."' ";
										update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
									}
									else
									{
										echo json_encode(array('code'=>0, 'message'=>'extension not allowed, please choose a JPEG or PNG file.'));
										exit;
									}
								}
							}


							
							if($answerType == "MCQs")
							{
								
								if($optionids!='')
								{
									foreach($optionids as $key => $value)
									{
										$options_info = get_table_data('tbl_options', 'id="'.$value.'" ');
										if($options_info!="")
										{
											$columns = "question_id='".$id."', answer_value='".$options[$key]."' ";
											update_table_data('tbl_options', $columns, 'id="'.$value.'"');
											
											if($is_correct[0]!='')
											{
												$columns = "option_id='".$is_correct[0]."' ";
												update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
											}
										
										}
									}
									if($_REQUEST['options_new']!='')
									{
										foreach($_REQUEST['options_new'] as $key=>$value)
										{
											$array_val = array("question_id" => $id, "answer_value" => addslashes($value), "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
											$insert_info = insert_table_data($array_val, 'tbl_options');
											$lastId = last_id();
											if($lastId > 0)
											{
												if($is_correct[0] == $key)
												{
													$columns = "option_id='".$lastId."' ";
													update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
												}
											}							
										}
									}
								}
								else
								{
									if($_REQUEST['options_new']!='')
									{
										$columns = "question_id='".$id."' ";
										delete_data('tbl_options', $columns);
										
										foreach($_REQUEST['options_new'] as $key=>$value)
										{
											$array_val = array("question_id" => $id, "answer_value" => addslashes($value), "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
											$insert_info = insert_table_data($array_val, 'tbl_options');
											$last_idd = last_id();
											if($last_idd > 0)
											{
												if($is_correct[0] == $key)
												{
													$columns = "option_id='".$last_idd."' ";
													update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
												}
											}							
										}
									}
								}
							}
							else if($answerType == "Detail")
							{
								if($optionids!='')
								{
									foreach($optionids as $key => $value)
									{
										
										$options_info = get_table_data('tbl_options', 'id="'.$value.'" ');
										if($options_info!="")
										{
											$columns = "id='".$value."' ";
											delete_data('tbl_options', $columns);									
										}				
									}
								}
								
								
								$options_info = get_table_data('tbl_options', 'question_id="'.$id.'" ');
								if($options_info=="")
								{
									$array_val = array("question_id" => $id, "answer_value" => addslashes($correct_answer), "status" => 'Active', "created_by" => $_SESSION['user_login'], "created_date" => date('Y-m-d H:i:s'));
									$insert_info = insert_table_data($array_val, 'tbl_options');
									$lastId = last_id();
									if($lastId > 0)
									{
										$columns = "option_id='".$lastId."' ";
										update_table_data('tbl_questions', $columns, 'id="'.$id.'"');
									}
								}
								else
								{
									$columns = "answer_value='".addslashes($correct_answer)."' ";
									update_table_data('tbl_options', $columns, 'question_id="'.$id.'"');
								}
							}
							
												
							echo json_encode(array('code'=>1, 'message'=>'question info was copied successfully.'));
							exit;
						}
						else
						{
							echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
							exit;
						}
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'you must fill in all of the fields.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'please select at least one question type.'));
					exit;
				}
				
			}
		break;


		//*************FOR EDIT SUBADMIN
		case 'EditTest':
			
			if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];}
			if(isset($_REQUEST['test_title'])){$test_title = $_REQUEST['test_title'];}
			
			if(isset($_POST['submit']))
			{
				if($id!='' && $test_title!='')
				{
					$test_info = get_table_data('tbl_quick_test', 'id="'.$id.'"');
					if($test_info != "")
					{
						
						$columns = "test_title='".$test_title."' ";
						update_table_data('tbl_quick_test', $columns, 'id="'.$id.'"');
						echo json_encode(array('code'=>1, 'message'=>'Test info was successfully updated'));
						exit;
					}
					else
					{
						echo json_encode(array('code'=>0, 'message'=>'system id not exists.'));
						exit;
					}
				}
				else
				{
					echo json_encode(array('code'=>0, 'message'=>'Please fill in the title field.'));
					exit;
				}
			}	 
		break;

		//*************FOR SUBMIT BOOKMARK
		case 'test_remaining_time':
			
			if(isset($_POST['submit']))
			{
				
				if(isset($_REQUEST['test_remaining_time'])){$test_remaining_time = $_REQUEST['test_remaining_time'];}
				
					$_SESSION['total_time_seconds'] = $test_remaining_time;	

					echo $test_remaining_time;
					exit;
				
			}	 
		break;

		//*************FOR SUBMIT BOOKMARK
		case 'cancel_subscription':
			
			if(isset($_POST['submit']))
			{
				
				if(isset($_REQUEST['id'])){
					
					$id = $_REQUEST['id'];

					$columns = "subscription_status='Expired' ";
					update_table_data('tbl_subscribe_package', $columns, 'id="'.$id.'"');
				}
				
				echo json_encode(array('code'=>1, 'message'=>'Subscription was successfully cancelled'));
				exit;
				
			}	 
		break;


	}	
?>