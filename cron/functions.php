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
			global $conn;
			$difficultyLevel = "0";
			$strQry = "SELECT COUNT(*) AS totalLevel FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND level = '".$level."' AND status = 'Active' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$difficultyLevel = $row['totalLevel'];
			}
			return $difficultyLevel;
		}
		
		function get_subject_total_ques($cid, $tid, $sid)
		{
			global $conn;
			$subjectQuestion = "0";
			$strQry = "SELECT COUNT(*) AS totalQuestion FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND subject_id = '".$sid."' AND status = 'Active' ";
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
			$strQry = "SELECT COUNT(*) AS totalQuestion FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND subject_id = '".$sid."' AND topic_id = '".$tpid."' AND status = 'Active' ";
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
			global $conn;
			$topicQuestion = "0";
			$strQry = "SELECT COUNT(*) AS totalQuestion FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' ";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$topicQuestion = $row['totalQuestion'];
			}
			return $topicQuestion;
		}
		
		function get_all_question($cid, $tid)
		{
			global $conn;
			$topicQuestion = "0";
			$strQry = "SELECT COUNT(*) AS totalQuestion FROM tbl_questions WHERE id != '' AND category_id = '".$cid."' AND type_id = '".$tid."' AND status = 'Active' ";
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
			$strQry = "SELECT expiry_date FROM tbl_subscribe_package WHERE id != '' AND student_id = '".$s_id."' AND category_id = '".$c_id."' ORDER BY id DESC";
			$result = mysqli_query($conn, $strQry);
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				$expiry_date = $row['expiry_date'];
			}
			return $expiry_date;
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
?>