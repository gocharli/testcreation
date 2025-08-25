<?php
	class functions
	{
		function get_profile_name($id)
		{
			global $conn;
			$fullName = "";
			$strQry = "SELECT first_name, last_name FROM tbl_admin WHERE id = '".$id."'";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$fullName = $row['first_name']." ".$row['last_name'];
			}
			return $fullName;
		}
		
		function get_user_name($id)
		{
			global $conn;
			$fullName = "";
			$strQry = "SELECT firstname, lastname FROM tbl_users WHERE id = '".$id."'";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$fullName = $row['firstname']." ".$row['lastname'];
			}
			return $fullName;
		}
		
		function get_email_id($id)
		{
			global $conn;
			$email_id = "";
			$strQry = "SELECT username FROM tbl_users WHERE id = '".$id."'";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$email_id = $row['username'];
			}
			return $email_id;
		}
		
		function get_total_clients()
		{
			global $conn;
			$totalCount = "0";
			$strQry = "SELECT COUNT(*) AS totalClient FROM tbl_admin WHERE id != '' AND status = 'Active' AND type= 'subadmin' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalCount =  $row['totalClient'];
			}
			return $totalCount;
		}	
		
		
		function get_total_users()
		{
			global $conn;
			$totalCount = "0";
			$strQry = "SELECT COUNT(*) AS totalUsers FROM tbl_users WHERE id != '' AND status = 'Active' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalCount =  $row['totalUsers'];
			}
			return $totalCount;
		}
		
		function count_total_tests()
		{
			global $conn;
			$totalCount = "0";
			$strQry = "SELECT COUNT(*) AS totalTests FROM tbl_quick_test WHERE id != '' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalCount =  $row['totalTests'];
			}
			return $totalCount;
		}
		
		function get_category_name($id)
		{
			global $conn;
			$categoryName = "";
			$strQry = "SELECT category_name FROM tbl_category WHERE id = '".$id."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$categoryName = $row['category_name'];
			}
			return $categoryName;
		}
		
		function get_type_name($id)
		{
			global $conn;
			$typeName = "";
			$strQry = "SELECT type_name FROM tbl_types WHERE id = '".$id."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$typeName = $row['type_name'];
			}
			return $typeName;
		}
		
		function get_country_name($id)
		{
			global $conn;
			$countryName = "";
			$strQry = "SELECT name FROM tbl_countries WHERE id = '".$id."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$countryName = $row['name'];
			}
			return $countryName;
		}
		
		function get_subject_name($id)
		{
			global $conn;
			$subjectName = "";
			$strQry = "SELECT subject_name FROM tbl_subjects WHERE id = '".$id."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$subjectName = $row['subject_name'];
			}
			return $subjectName;
		}
		
		function get_topic_name($id)
		{
			global $conn;
			$topicName = "";
			$strQry = "SELECT topic_name FROM tbl_topics WHERE id = '".$id."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$topicName = $row['topic_name'];
			}
			return $topicName;
		}
		
		function get_difficulty_level($cid, $tid, $level)
		{

			$user_id = $_SESSION['student_login'];
			
			global $conn;
			$difficultyLevel = 0;
			$str="";
			$totalQuestions = 0;
			$strQry = "SELECT id FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND level = '".$level."' AND question_type like '%live%' AND status = 'Active' AND is_deleted = '0' ";
			$result = mysqli_query($conn, $strQry);
			
			while($row = mysqli_fetch_object($result))
			{
				$str.=$row->id.',';
				$totalQuestions = $totalQuestions + 1;
			}

			$str = substr($str, 0, -1);
			//return $str;

			if($str == ""){
				$strQry = "SELECT COUNT(*) AS totalLevel FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND level = '".$level."' AND question_type like '%live%' AND status = 'Active' ";
			}else{
				$strQry = "SELECT COUNT(*) AS totalLevel FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND level = '".$level."' AND status = 'Active' AND question_type like '%live%' AND tbl_questions.id in(".$str.") ";
			}
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$difficultyLevel = $row['totalLevel'];
			}
			return $difficultyLevel;
		

			// global $conn;
			// $difficultyLevel = "0";
			// $strQry = "SELECT COUNT(*) AS totalLevel FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND level = '".$level."' AND status = 'Active' group by tbl_questions.id ";
			// $result = mysqli_query($conn, $strQry);
			// if(mysqli_num_rows($result) > 0)
			// {
			// 	$row = mysqli_fetch_array($result);
			// 	$difficultyLevel = $row['totalLevel'];
			// }
			// return $difficultyLevel;
		}

		function get_total_test_performed_by_user($user_id){
			
			global $conn;
			$total_test = 0;
			//$strQry = "SELECT COUNT(*) AS total_test FROM tbl_quick_test WHERE user_id != $user_id ";
			//Added by david
			$strQry = "SELECT COUNT(*) AS total_test FROM tbl_quick_test WHERE user_id = $user_id ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$total_test = $row['total_test'];
			}
			return $total_test;

		}
		
		function get_subject_total_ques($cid, $tid, $sid)
		{
			global $conn;
			$subjectQuestion = "0";
			$strQry = "SELECT COUNT(*) AS totalQuestion FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND subject_id = '".$sid."' AND question_type like '%live%' AND status = 'Active' AND is_deleted = '0' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$subjectQuestion = $row['totalQuestion'];
			}
			return $subjectQuestion;
		}
		
		function get_topic_total_ques($cid, $tid, $sid, $tpid)
		{
			global $conn;
			$topicQuestion = "0";
			$strQry = "SELECT COUNT(*) AS totalQuestion FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND subject_id = '".$sid."' AND topic_id = '".$tpid."' AND question_type like '%live%' AND status = 'Active' AND is_deleted = '0' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$topicQuestion = $row['totalQuestion'];
			}
			return $topicQuestion;
		}
		
		function get_unused_question($cid, $tid)
		{

			$user_id = $_SESSION['student_login'];
			global $conn;
			
			$whr = "";
			$unusedQuestions = "0";
			// Get used questions ids by rgistred/paid users
			$used_q_ids = $this->get_question_ids_by_Qmode($cid, $tid, 'Unused');
			if(trim($used_q_ids) != ""){
				$whr.=" AND id NOT IN(".$used_q_ids.") ";   // unused excluding used questions ids
			}

			$strQry = "SELECT COUNT(*) AS unusedQuestions FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' AND is_deleted = '0' and is_block = '0' AND question_type like '%live%' ".$whr." ";
			$result = mysqli_query($conn, $strQry);
			
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$unusedQuestions = $row['unusedQuestions'];
			}

			return $unusedQuestions;



			// $user_id = $_SESSION['student_login'];
			
			// global $conn;
			// $unusedQuestions = 0;
			// $str="";
			// $totalQuestions = 0;


			// // Get total question of given category, type and question_type
			// $strQry = "SELECT COUNT(*) AS totalQuestions FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' AND is_deleted = '0' and is_block = '0' AND question_type like '%live%' ";
			// $result = mysqli_query($conn, $strQry);
			
			// if(mysqli_num_rows($result) > 0)
			// {
			// 	$row = mysqli_fetch_array($result);
			// 	$totalQuestions = $row['totalQuestions'];
			// }

			// // Get used question of given category type and question_type
			// //$strQry1 = "SELECT COUNT(*) AS usedQuestions FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' AND user_type like '%Register%' ";
			// $strQry1 = "SELECT COUNT(*) AS usedQuestions FROM tbl_quick_user_test join tbl_quick_test on tbl_quick_user_test.test_id = tbl_quick_test.random_id join tbl_questions on tbl_quick_user_test.question_id = tbl_questions.id WHERE tbl_quick_user_test.category_id = '".$cid."' AND tbl_quick_user_test.type_id = '".$tid."' AND tbl_quick_user_test.user_type like '%Register%' AND tbl_quick_test.user_id = ".$user_id." group by tbl_quick_user_test.question_id ";
			// $result = mysqli_query($conn, $strQry1);
			// if(mysqli_num_rows($result) > 0)
			// {
			// 	$row = mysqli_fetch_array($result);
			// 	$usedQuestions = $row['usedQuestions'];
			// 	$unusedQuestions = $totalQuestions - $usedQuestions;
			// }

			// if($unusedQuestions <= 0){
			// 	$unusedQuestions = 0;
			// }

			//return $unusedQuestions;
		}

		function get_unused_question_query($cid, $tid, $maxQuestion)
		{


			$user_id = $_SESSION['student_login'];
			global $conn;
			
			$whr = "";
			$unusedQuestions = "0";
			// Get used questions ids by rgistred/paid users
			$used_q_ids = $this->get_question_ids_by_Qmode($cid, $tid, 'Unused');
			if(trim($used_q_ids) != ""){
				$whr.=" AND id NOT IN(".$used_q_ids.") ";   // unused excluding used questions ids
			}

			$strQry1 = "SELECT id, question_type, tbl_questions.category_id, tbl_questions.type_id FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' AND is_deleted = '0' and is_block = '0' and question_type like '%live%' ".$whr." ORDER BY RAND() LIMIT ".$maxQuestion." ";
			return $strQry1;



			//$user_id = $_SESSION['student_login'];
			
			// global $conn;
			// // Get all used questions against user
			// $strQry = "SELECT tbl_questions.id FROM tbl_quick_user_test join tbl_quick_test on tbl_quick_user_test.test_id = tbl_quick_test.random_id join tbl_questions on tbl_quick_user_test.question_id = tbl_questions.id WHERE tbl_quick_user_test.user_type like '%Register%' AND tbl_quick_test.user_id = ".$user_id." group by tbl_quick_user_test.question_id ";
			// $result = mysqli_query($conn, $strQry);
			// $str="";
			// while($row = mysqli_fetch_object($result))
			// {
			// 	$str.=$row->id.',';
			// }
			// $str = substr($str, 0, -1);
			// //echo $str; exit;

			// // Unused question (question not used in test yet by user)
			
			// if($str == ""){ // not any question has been used / no test has been performed yet / get all questions
			// 	$strQry1 = "SELECT id, question_type, tbl_questions.category_id, tbl_questions.type_id FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' AND is_deleted = '0' and is_block = '0' and question_type like '%live%' ORDER BY RAND() LIMIT ".$maxQuestion." ";
			// 	return $strQry1;
			// }else{
			// 	$strQry1 = "SELECT id, question_type, tbl_questions.category_id, tbl_questions.type_id FROM tbl_questions WHERE id != '' AND id NOT IN(".$str.") AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' AND is_deleted = '0' and is_block = '0' and question_type like '%live%' ORDER BY RAND() LIMIT ".$maxQuestion." ";
			// 	return $strQry1;
			// }
			
		}

		function get_unused_question_demo($cid, $tid)
		{
			
			$user_id = $_SESSION['student_login'];
			
			global $conn;
			$usedQuestions = 0;
			$unusedQuestions = 0;
			$totalQuestions = 0;
			$str="";

			// Get total question of given category and type
			$strQry = "SELECT COUNT(*) AS totalQuestions FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' AND is_deleted = '0' and is_block = '0' and question_type like '%demo%' ";
			//echo $strQry; exit;
			$result = mysqli_query($conn, $strQry);
			
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalQuestions = $row['totalQuestions'];
			}

			// echo $totalQuestions; exit;

			// Get used question of given category and type
			$strQry1 = "SELECT COUNT(*) AS usedQuestions FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' and user_type like '%demo%'";
			$result = mysqli_query($conn, $strQry1);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$usedQuestions = $row['usedQuestions'];
				$unusedQuestions = $totalQuestions - $usedQuestions;
			}

			//echo $usedQuestions; exit;
			//echo $unusedQuestions; exit;
			

			return $unusedQuestions;
		}

		function get_unused_question_query_demo($cid, $tid, $maxQuestion)
		{
			$user_id = $_SESSION['student_login'];
			
			global $conn;
			// Get all used questions against user
			$strQry = "SELECT tbl_questions.id FROM tbl_quick_user_test join tbl_quick_test on tbl_quick_user_test.test_id = tbl_quick_test.random_id join tbl_questions on tbl_quick_user_test.question_id = tbl_questions.id WHERE tbl_quick_test.user_id = ".$user_id." AND user_type like '%demo%' group by tbl_quick_user_test.question_id ";
			$result = mysqli_query($conn, $strQry);
			$str="";
			while($row = mysqli_fetch_object($result))
			{
				$str.=$row->id.',';
			}
			$str = substr($str, 0, -1);
			//echo $str; exit;

			// Unused question (question not used in test yet by user)
			
			if($str == ""){ // not any question has been used / no test has been performed yet / get all questions
				$strQry1 = "SELECT id, question_type, tbl_questions.category_id, tbl_questions.type_id FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' AND is_deleted = '0' and is_block = '0' and question_type like '%demo%' ORDER BY RAND() LIMIT ".$maxQuestion." ";
				return $strQry1;
			}else{
				$strQry1 = "SELECT id, question_type, tbl_questions.category_id, tbl_questions.type_id FROM tbl_questions WHERE id != '' AND id NOT IN(".$str.") AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' AND is_deleted = '0' and is_block = '0' and question_type like '%demo%' ORDER BY RAND() LIMIT ".$maxQuestion." ";
				return $strQry1;
			}
			
		}

		function get_incorrect_question($cid, $tid)
		{
			$user_id = $_SESSION['student_login'];
			
			global $conn;
			$incorrectQuestions = 0;

			// Get Incorrect / Pending question of given category and type for login user
			$strQry1 = "SELECT * FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' and user_type like '%Register%' and answer != 'Correct' group by question_id order by id desc";
			$result = mysqli_query($conn, $strQry1);
			
			$incorrectQuestions = mysqli_num_rows($result);
			return $incorrectQuestions;
			
			// // Get Incorrect / Pending question of given category and type for login user
			// $strQry1 = "SELECT COUNT(*) AS incorrectQuestions FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' and user_type like '%Register%' and answer != 'Correct' ";
			// $result = mysqli_query($conn, $strQry1);
			// if(mysqli_num_rows($result) > 0)
			// {
			// 	$row = mysqli_fetch_array($result);
			// 	$incorrectQuestions = $row['incorrectQuestions'];
			// }

			// return $incorrectQuestions;
			
		}

		function get_marked_question($cid, $tid){ // correct

			$user_id = $_SESSION['student_login'];
			
			global $conn;
			$markedQuestions = 0;

			// Get Marked question of given category and type for login user
			// $strQry1 = "SELECT * FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' and user_type like '%Register%' and is_bookmark = 'Yes' group by question_id order by id desc";
			// //echo $strQry1; //exit;
			
			// $result = mysqli_query($conn, $strQry1);
			
			// $markedQuestions = mysqli_num_rows($result);
			// return $markedQuestions;

			
			
			$strQry1 = "SELECT max(id) as max_id FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' and user_type like '%Register%' group by question_id ";
			
			//echo $strQry1; //exit;
			$result = mysqli_query($conn, $strQry1);
			while($row = mysqli_fetch_object($result))
			{
			
				$strQry2= "SELECT is_bookmark FROM tbl_quick_user_test where id = '".$row->max_id."' ";
				$result2 = mysqli_query($conn, $strQry2);
				while($row2 = mysqli_fetch_object($result2))
				{
					if($row2->is_bookmark == 'Yes'){
						$markedQuestions++;
					}
					
				}
			}
			return $markedQuestions;
			

			
			// // Get Marked question of given category and type for login user
			// $strQry1 = "SELECT COUNT(*) AS markedQuestions FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' and is_bookmark = 'Yes' group by question_id ";
			// $result = mysqli_query($conn, $strQry1);
			// if(mysqli_num_rows($result) > 0)
			// {
			// 	$row = mysqli_fetch_array($result);
			// 	$markedQuestions = $row['markedQuestions'];
			// }

			// return $markedQuestions;

		}
		
		function get_all_question($cid, $tid, $whr)
		{ // whr and Qmode added by david 8/12 OCT
			// if($QMode == 'Unused'){  // Get used questions ids
			// 	$used_q_ids = $this->get_question_ids_by_Qmode($c_id, $t_id, $QMode);
			// 	if(trim($used_q_ids) != ""){
			// 		$whr.=" AND id NOT IN(".$used_q_ids.") ";   // unused excluding used questions ids
			// 	}
				
			// }elseif($QMode == 'Incorrect'){ // Get Incorrect questions ids
			// 	$incorrect_q_ids = $this->get_question_ids_by_Qmode($c_id, $t_id, $QMode);
			// 	if(trim($incorrect_q_ids) != ""){
			// 		$whr.=" AND id IN(".$incorrect_q_ids.") ";  // incorrect questions ids
			// 	}
			// }else if($QMode == 'Marked'){ // Get Marked questions ids
			// 	$marked_q_ids = $this->get_question_ids_by_Qmode($c_id, $t_id, $QMode);
			// 	if(trim($marked_q_ids) != ""){
			// 		$whr.=" AND id IN(".$marked_q_ids.") ";  // marked questions ids
			// 	}
			// }

			if($whr == ""){
				$whr=" AND question_type like '%live%' "; // get live count
			}

			global $conn;
			$topicQuestion = "0";
			$strQry = "SELECT COUNT(*) AS totalQuestion FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' AND is_deleted = '0' AND is_block = '0' ".$whr." ";
			//echo $strQry; exit;
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$topicQuestion = $row['totalQuestion'];
			}
			return $topicQuestion;
		}
		
		function get_subject_by_topic($sid)
		{
			global $conn;
			$topicId = "0";
			$strQry = "SELECT id FROM tbl_topics WHERE id != '' AND subject_id = '".$sid."' AND status = 'Active' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$topicId = $row['id'];
			}
			return $topicId;
		}
		
		function get_correct_answer($aid, $qid)
		{
			global $conn;
			$answerValue = "";
			$strQry = "SELECT answer_value FROM tbl_options WHERE id = '".$aid."' AND question_id = '".$qid."' AND status = 'Active' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$answerValue = $row['answer_value'];
			}
			return $answerValue;
		}
		
		function count_total_question($tid)
		{
			global $conn;
			$totalQuestion = "0";
			$strQry = "SELECT COUNT(*) AS totalQuestion FROM tbl_quick_user_test WHERE id != '' AND test_id = '".$tid."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalQuestion = $row['totalQuestion'];
			}
			return $totalQuestion;
		}
		
		function count_total_question_by_category($cid, $type, $type_id)
		{
			global $conn;
			$totalCount = "0";
			$strQry = "SELECT COUNT(tbl_1.id) AS totalQuestion FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_2.id != '' AND tbl_2.category_id = '".$cid."' AND tbl_2.type_id = '".$type_id."' ";
			if($type!='')
			{
				$strQry .= "AND tbl_1.answer = '".$type."' ";
			}
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalCount =  $row['totalQuestion'];
			}
			return $totalCount;
		}
		
		function count_total_question_by_test($tid, $type, $type_id)
		{
			global $conn;
			$totalCount = "0";
			$strQry = "SELECT COUNT(tbl_1.id) AS totalQuestion FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_1.id != '' AND tbl_1.test_id = '".$tid."'AND tbl_2.type_id = '".$type_id."' ";
			if($type!='')
			{
				$strQry .= "AND tbl_1.answer = '".$type."' ";
			}
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalCount =  $row['totalQuestion'];
			}
			return $totalCount;
		}
		
		function count_total_question_by_topic($tp_id, $type, $type_id, $quizid)
		{
			global $conn;
			$totalCount = "0";
			$strQry = "SELECT COUNT(tbl_1.id) AS totalQuestion FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_2.id != '' AND tbl_2.type_id = '".$type_id."'  AND tbl_2.topic_id = '".$tp_id."' ";
			if($type!='')
			{
				$strQry .= "AND tbl_1.answer = '".$type."' ";
			}
			if($quizid!='')
			{
				$strQry .= "AND tbl_1.test_id = '".$quizid."' ";
			}
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalCount =  $row['totalQuestion'];
			}
			return $totalCount;
		}

		function count_total_question_by_subject($sub_id, $type, $type_id, $quizid)
		{
			global $conn;
			$totalCount = "0";
			$strQry = "SELECT COUNT(tbl_1.id) AS totalQuestion FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_2.id != '' AND tbl_2.type_id = '".$type_id."'  AND tbl_2.subject_id = '".$sub_id."' ";
			if($type!='')
			{
				$strQry .= "AND tbl_1.answer = '".$type."' ";
			}
			if($quizid!='')
			{
				$strQry .= "AND tbl_1.test_id = '".$quizid."' ";
			}
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalCount =  $row['totalQuestion'];
			}
			return $totalCount;
		}
		
		function get_package_duration($pid, $cid)
		{
			global $conn;
			$duration = "";
			$strQry = "SELECT duration FROM tbl_packages WHERE id = '".$pid."' AND category_id = '".$cid."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$duration = $row['duration'];
			}
			return $duration;
		}
		
		function get_answer_by_questionid($qid)
		{
			global $conn;
			$answer_value = "";
			$strQry = "SELECT answer_value FROM tbl_options WHERE id != '' AND question_id = '".$qid."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$answer_value = $row['answer_value'];
			}
			return $answer_value;
		}
		
		function get_package_info($pid)
		{
			global $conn;
			$duration = "";
			$strQry = "SELECT duration FROM tbl_packages WHERE id = '".$pid."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$duration = $row['duration'];
			}
			return $duration;
		}
		
		function get_package_id($txn_id)
		{
			global $conn;
			$package_id = "";
			$strQry = "SELECT package_id FROM tbl_subscribe_package WHERE txn_id = '".$txn_id."' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$package_id = $row['package_id'];
			}
			return $package_id;
		}
		
		function get_expiry_date($s_id, $c_id)
		{
			global $conn;
			$expiry_date = "";
			$strQry = "SELECT expiry_date FROM tbl_subscribe_package WHERE id != '' AND student_id = '".$s_id."' AND category_id = '".$c_id."' AND subscription_status = 'Active' ORDER BY id DESC";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$expiry_date = $row['expiry_date'];
			}
			return $expiry_date;
		}
		
		function get_first_expiry_date($s_id, $c_id)
		{
			global $conn;
			$expiryDate = "";
			$strQry = "SELECT expiry_date FROM tbl_subscribe_package WHERE id != '' AND student_id = '".$s_id."' AND category_id = '".$c_id."' AND subscription_status = 'Active' ORDER BY id ASC";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$expiryDate = $row['expiry_date'];
			}
			return $expiryDate;
		}

		function check_question_exists($c_id, $t_id)
		{
			global $conn;
			$totalQuestions = "";
			$strQry = "SELECT COUNT(id) AS totalQuestions FROM tbl_questions WHERE id != '' AND category_id = '".$c_id."'  AND type_id = '".$t_id."' AND status = 'Active' AND is_deleted = '0' AND is_block = '0' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalQuestions = $row['totalQuestions'];
			}
			return $totalQuestions;
		}
		
		function check_question_exists_demo($c_id, $t_id)
		{
			global $conn;
			$totalQuestions = "";
			$strQry = "SELECT COUNT(id) AS totalQuestions FROM tbl_questions WHERE id != '' AND category_id = '".$c_id."'  AND type_id = '".$t_id."' AND status = 'Active' AND is_deleted = '0' AND is_block = '0' and question_type like '%demo%' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalQuestions = $row['totalQuestions'];
			}
			return $totalQuestions;
		}

		function check_question_exists_live($c_id, $t_id, $whr)
		{ // whr and Qmode added by david 8/12 OCT
			// if($QMode == 'Unused'){  // Get used questions ids
			// 	$used_q_ids = $this->get_question_ids_by_Qmode($c_id, $t_id, $QMode);
			// 	if(trim($used_q_ids) != ""){
			// 		$whr.=" AND id NOT IN(".$used_q_ids.") ";   // unused excluding used questions ids
			// 	}
				
			// }elseif($QMode == 'Incorrect'){ // Get Incorrect questions ids
			// 	$incorrect_q_ids = $this->get_question_ids_by_Qmode($c_id, $t_id, $QMode);
			// 	if(trim($incorrect_q_ids) != ""){
			// 		$whr.=" AND id IN(".$incorrect_q_ids.") ";  // incorrect questions ids
			// 	}
			// }else if($QMode == 'Marked'){ // Get Marked questions ids
			// 	$marked_q_ids = $this->get_question_ids_by_Qmode($c_id, $t_id, $QMode);
			// 	if(trim($marked_q_ids) != ""){
			// 		$whr.=" AND id IN(".$marked_q_ids.") ";  // marked questions ids
			// 	}
			// }

			//echo $whr;

			global $conn;
			$totalQuestions = "";
			$strQry = "SELECT COUNT(*) AS totalQuestions FROM tbl_questions WHERE id != '' AND category_id = '".$c_id."'  AND type_id = '".$t_id."' AND status = 'Active' AND is_deleted = '0' AND is_block = '0' ".$whr." ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$totalQuestions = $row['totalQuestions'];
			}
			return $totalQuestions;
		}

		function get_question_ids_by_Qmode($cid, $tid, $QMode)
		{
			$user_id = $_SESSION['student_login'];
			global $conn;
			
			// Get question of given category type and question_type and QMode  (used, incoorect, marked)
			if($QMode == 'Unused'){
				$strQry = "SELECT question_id FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' AND user_type like '%Register%' group by question_id";
			}else if($QMode == 'Incorrect'){
				$strQry = "SELECT question_id FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' AND user_type like '%Register%' AND answer != 'Correct' group by question_id";
			//echo 'aaaaa   '; echo $strQry; exit;
			}else if($QMode == 'Marked'){
				$strQry = "SELECT question_id FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' AND user_type like '%Register%' AND is_bookmark = 'Yes' group by question_id";
			}else{
				$strQry = "SELECT question_id FROM tbl_quick_user_test WHERE user_id = '".$user_id."' AND category_id = '".$cid."' AND type_id = '".$tid."' AND user_type like '%Register%' group by question_id";
			}
			
			$result = mysqli_query($conn, $strQry);
			$str="";
			while($row = mysqli_fetch_object($result))
			{
				$str.=$row->question_id.',';
			}
			$str = substr($str, 0, -1);
			return $str;
		}
		
		
		function extractCommonWords($string)
		{
			$stopWords = array('i','a','about','an','and','are','as','at','be','by','com','de','en','for','from','how','in','is','it','la','of','on','or','that','the','this','to','was','what','when','where','who','will','with','und','the','www');
			
			$string = preg_replace('/\s\s+/i', '', $string); // replace whitespace
			$string = trim($string); // trim the string
			$string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
			$string = strtolower($string); // make it lowercase
     
			preg_match_all('/\b.*?\b/i', $string, $matchWords);
			$matchWords = $matchWords[0];
			
			foreach ( $matchWords as $key=>$item )
			{
				if ( $item == '' || in_array(strtolower($item), $stopWords) || strlen($item) <= 3 )
				{
					unset($matchWords[$key]);
				}
			}   
			$wordCountArr = array();
			if ( is_array($matchWords) )
			{
				foreach ( $matchWords as $key => $val )
				{
					$val = strtolower($val);
					if ( isset($wordCountArr[$val]) )
					{
						$wordCountArr[$val]++;
					}
					else
					{
						$wordCountArr[$val] = 1;
					}
				}
			}
			arsort($wordCountArr);
			$wordCountArr = array_slice($wordCountArr, 0, 10);
			return $wordCountArr;
		}
	}
	function getLatestBlogs($limit = 4) {
    global $conn;
    
    $sql = "SELECT id, title, image, description, created_at, slug
            FROM tbl_blogs
            WHERE status = 'Active' 
            AND is_deleted = 0
            ORDER BY created_at DESC
            LIMIT ?";
            
    $stmt = $conn->prepare($sql);
    if (!$stmt) return [];
    
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $blogs = [];
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
    
    $stmt->close();
    return $blogs;
}
?>