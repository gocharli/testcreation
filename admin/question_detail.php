<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	// If session is not set then redirect to Login Page
	if(!isset($_SESSION['user_login']))
	{
		header("Location:index");
	}
	
	$question_info = get_table_data('tbl_questions', 'id="'.$_REQUEST['id'].'" ');
	if($question_info!='')
	{
		foreach($question_info as $key => $value)
		{
			$category_id = $value->category_id;
			$type_id = $value->type_id;
			$subject_id = $value->subject_id;
			$topic_id = $value->topic_id;
			$title = $value->title;
			$answer_type = $value->answer_type;
			$explation = $value->explation;
			$option_id = $value->option_id;
			$image = $value->image;
			$level = $value->level;
			$question_type = explode(',', $value->question_type);
			$hint = $value->hint;
			$status = $value->status;
			$is_deleted = $value->is_deleted;
			$attemped_time = $value->attemped_time;
		}
	}
	else
	{
		header("Location:questions");
	}
	
	$QuestionType = count($question_type);
	
?>
<!DOCTYPE html>
<html lang="en">
<?php 
	$page_act = '7';
	$subpage_act = '13';
	include('header.php');
?>
<link rel="stylesheet" href="files/assets/css/radio-button.css">
</head>
<body>
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-bar"></div>
	</div>
	<!-- [ Pre-loader ] end -->
	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">
			<!-- [ Header ] start -->
			<nav class="navbar header-navbar pcoded-header">
				<div class="navbar-wrapper">
					<div class="navbar-logo">
						<a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
							<i class="feather icon-toggle-right"></i>
						</a>
						<a href="dashboard">
							<b>Admin Panel</b>
						</a>
						<a class="mobile-options waves-effect waves-light">
							<i class="feather icon-more-horizontal"></i>
						</a>
					</div>
					<div class="navbar-container container-fluid">
						<ul class="nav-right">
							<li class="user-profile header-notification">
								<div class="dropdown-primary dropdown">
									<div class="dropdown-toggle" data-toggle="dropdown">
										<img src="files/assets/images/dummy.jpg" class="img-radius" alt="User-Profile-Image">
										<span><?php echo $functions->get_profile_name($_SESSION['user_login'])?></span>
										<i class="feather icon-chevron-down"></i>
									</div>
									<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
										<li>
											<a href="profile">
												<i class="feather icon-user"></i> Profile
											</a>
										</li>
										<li>
											<a href="logout">
												<i class="feather icon-log-out"></i> Logout
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- [ Header ] end -->
			<div class="pcoded-main-container">
				<div class="pcoded-wrapper">
					<!-- [ navigation menu ] start -->
					<?php include('navigation_menu.php');?>
					<!-- [ navigation menu ] end -->
					<div class="pcoded-content">
						<!-- [ breadcrumb ] start -->
						<div class="page-header">
							<div class="page-block">
								<div class="row align-items-center">
									<div class="col-md-8">
										<div class="page-header-title">
											<h4 class="m-b-10">Question Detail</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="dashboard">
													<i class="feather icon-home"></i>
												</a>
											</li>
											<li class="breadcrumb-item"><a href="questions">Questions</a></li>
											<li class="breadcrumb-item">
												<a href="javascript:;">Question Detail</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- [ breadcrumb ] end -->                        
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Inputs Validation start -->
                                                <div class="card">
													<div class="card-block">
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Category</b></label>
															<div class="col-sm-10">
																<?php echo $functions->get_category_name($category_id);?>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Type</b></label>
															<div class="col-sm-10">
																<?php echo $functions->get_type_name($type_id);?>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Subject</b></label>
															<div class="col-sm-10">
																<?php echo $functions->get_subject_name($subject_id);?>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Topic</b></label>
															<div class="col-sm-10">
																<?php echo $functions->get_topic_name($topic_id);?>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Question</b></label>
															<div class="col-sm-10">
																<?php echo $title;?>
															</div>
														</div>
														<?php if($image!=''){?>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Question Image</b></label>
															<div class="col-sm-10">
																<img class="media-object card-list-img" src="../questionImg/<?php echo $image;?>">
															</div>
														</div>
														<?php } ?>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Difficulty Level</b></label>
															<div class="col-sm-10">
																<?php echo $level;?>
															</div>
														</div>
														<?php
															if($QuestionType == 2)
															{
																?>
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label"><b>Question Type</b></label>
																	<div class="col-sm-10">
																		<div class="checkbox-color checkbox-primary">
																			<input name="questionType[]" id="checkbox18" type="checkbox" value="Live" checked disabled>
																			<label for="checkbox18">Live</label>
																		</div>
																		<div class="checkbox-color checkbox-primary">
																			<input name="questionType[]" id="checkbox19" type="checkbox" value="Demo" checked disabled>
																			<label for="checkbox19">Demo</label>
																		</div>
																	</div>
																</div>
																<?
															}
															else
															{
																?>
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label"><b>Question Type</b></label>
																	<div class="col-sm-10">
																		<div class="checkbox-color checkbox-primary">
																			<input name="questionType[]" id="checkbox18" type="checkbox" value="Live" <?php if($question_type[0] == "Live"){ echo "checked";} ?> disabled>
																			<label for="checkbox18">Live</label>
																		</div>
																		<div class="checkbox-color checkbox-primary">
																			<input name="questionType[]" id="checkbox19" type="checkbox" value="Demo" <?php if($question_type[0] == "Demo"){ echo "checked";} ?> disabled>
																			<label for="checkbox19">Demo</label>
																		</div>
																	</div>
																</div>
																<?php
															}
														?>
														<hr />
															<h4>Answer Section</h4>
														<hr />
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Answer Type</b></label>
															<div class="col-sm-10 form-radio">
																<div class="radio radio-inline">
																	<label><input type="radio" value="MCQs" <?php if($answer_type == "MCQs"){ echo "checked";}?>  disabled>
																	<i class="helper"></i>MCQs</label>
																</div>
																<div class="radio radio-inline">
																	<label><input type="radio" value="Detail" <?php if($answer_type == "Detail"){ echo "checked";}?>  disabled>
																	<i class="helper"></i>Detail</label>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<?php 
																if($answer_type == "MCQs")
																{
																	?>
																	<label class="col-sm-2 col-form-label"><b>Options</b></label>
																	<div class="col-sm-10" >
																		<?php
																			$optionInfo = get_table_data('tbl_options', 'id !="" AND question_id = "'.$_REQUEST['id'].'" AND created_by = "'.$_SESSION['user_login'].'" ' ,'id ASC');
																			if($optionInfo!='')
																			{
																				foreach($optionInfo as $key => $val)
																				{
																					echo '<li>'.$val->answer_value;
																					if($val->id == $option_id)
																					{
																						echo ' <i class="fa fa-check"></i></li>';
																					}
																				}
																			}
																		?>
																	</div>
																	<?php
																}
																else if($answer_type == "Detail")
																{
																	$optionInfo = get_table_data('tbl_options', 'id !="" AND question_id = "'.$_REQUEST['id'].'" AND created_by = "'.$_SESSION['user_login'].'" ' ,'id ASC');
																	if($optionInfo!='')
																	{
																		foreach($optionInfo as $key => $val)
																		{
																			?>
																			<label class="col-sm-2 col-form-label"><b>Correct Answer</b></label>
																			<div class="col-sm-10"><?php echo $val->answer_value;?></div>
																			<?php
																		}
																	}
																}
															?>
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Explanation</b></label>
															<div class="col-sm-10">
															   <?php echo $explation;?>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Hint</b></label>
															<div class="col-sm-10">
															   <?php echo $hint;?>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Estimated Time</b></label>
															<div class="col-sm-10">
																<?php echo $attemped_time;?>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"><b>Status</b></label>
															<div class="col-sm-10">
																<?php echo $status;?>
															</div>
														</div>
                                                    </div>
                                                </div>
                                                <!-- Basic Inputs Validation end -->
											</div>
										</div>
									</div>
									<!-- Page body end -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Required Jquery -->
	<?php include('script.php');?>
</body>
</html>