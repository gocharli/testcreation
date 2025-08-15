<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	if(!isset($_SESSION['student_login'])) // If session is not set then redirect to Login Page
	{
		header("Location:../index");  
	}	
	
	if(isset($_REQUEST['id'])){$id = $_REQUEST['id']; }
	
	if($id == "")
	{
		$id = $_SESSION['categoryType'];
	}
	else
	{
		$_SESSION['main_id'] = $id;
	}
	
	$category_info = get_table_data('tbl_category', 'id="'.$id.'" AND parent_id != "0" AND status = "Active" ');
	if($category_info!='')
	{
		$categoryName = $category_info[0]->category_name;
	}
	else
	{
		header("Location:../index");
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php");?>
</head>
<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
		</svg>
    </div>
    <div id="main-wrapper">
        <?php include("header.php");?>
		<?php
			$date = date("d-m-Y");
			$expiry_date = $functions->get_first_expiry_date($_SESSION['student_login'], $id);
			if($expiry_date > date('Y-m-d'))
			{
				$expirtyDate = date('M d, Y',strtotime($expiry_date));
			}
			else
			{
				$expirtyDate = date('M d, Y',strtotime('+30 days',strtotime($date)));
			}
		?>
        <?php include("sidebar.php");?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Create Test</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Create Test</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">                
				<div class="row">
					<div class="col-md-12 custom-tabs">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<?php
								$typeId = array();
								$type_info = get_table_data('tbl_types', 'id!="" AND subcategory_id = "'.$id.'" AND status = "Active" ');
								if($type_info!="")
								{
									$i = 0;
									$class = 0;
									foreach($type_info as $key => $value)
									{
										$typeId[$i] = $value->id;
										if($class < 1)
										{
											?>
											<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#<?php echo $value->id;?>" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"><?php echo $value->type_name;?></span></a> </li>
											<?php
										}
										else
										{
											?>
											<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#<?php echo $value->id;?>" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"><?php echo $value->type_name;?></span></a> </li>
											<?php
										}
										$class++;
										$i++;
									}
								}
							?>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content tabcontent-border">
							<?php
								$class = 0;
								for($j=0; $j<sizeof($typeId); $j++)
								{
									if($class < 1)
									{
										?>
										<div class="tab-pane active" id="<?php echo $typeId[$j]?>" role="tabpanel">
											<div class="p-20">
												<div class="test-col">
													<div class="subtitle">
														<h4>Quick <a href="javascript:;" data-toggle="modal" data-target="#Quick"><i class="fa fa-info-circle"></i></a></h4>
														<div class="clearfix"></div>
													</div>
													<!-- Modal -->
													<div class="modal fade" id="Quick" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-body">
																	<p>Create a quick test of unused math questions or unused reading/writing passage in untimed-tutor mode</p>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
													<div class="body-content">
														<div class="col-md-2 pull-left">
															<button type="button" id="startQuick" class="btn waves-effect waves-light btn-info" onClick="qucik_start(<?php echo $typeId[$j]?>);">Start Test</button>
														</div>
														<div class="col-md-2 pull-left">
															<input class="form-control" id="maxQuestion" type="text" value="5" maxlength="2">
														</div>
														<div class="col-md-3 pull-left">
															<p class="m-0">Max Questions <span class="badge badge-dark">45</span></p>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="test-col">
													<div class="subtitle">
														<h4>Personalize <a href="javascript:;" data-toggle="modal" data-target="#Personalize"><i class="fa fa-info-circle"></i></a></h4>
														<span class="float-right">Personalize feature is only available for live user</span>
														<div class="clearfix"></div>
													</div>
													<!-- Modal -->
													<div class="modal fade" id="Personalize" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-body">
																	<p>Personalize your test to cover specific math topics or reading/writing subjects</p>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
													<form id="generate_test_<?php echo $typeId[$j]?>">
														<div class="body-content2">
															<div class="row demo-swtich border-bottom">
																<div class="col-md-12">
																	<h5>Test Mode <a href="javascript:;" data-toggle="modal" data-target="#TestMode"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="TestMode" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p><b>Tutor: </b> Shows the correct answer and explanation after you answer each question</p>
																				<hr />
																				<p><b>Timed: </b> Sets a time limit on the test</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-3">
																	<div class="demo-switch-title">Tutor</div>
																	<div class="switch">
																		<label><input name="test_mode[]" type="checkbox" value="Tutor" checked=""><span class="lever switch-col-light-blue"></span></label>
																	</div>
																</div>											
																<div class="col-sm-3">
																	<div class="demo-switch-title">Timed</div>
																	<div class="switch">
																		<label><input name="test_mode[]" type="checkbox" value="Timed" ><span class="lever switch-col-light-blue"></span></label>
																	</div>
																</div>
																<div class="clearfix"></div>	
															</div>
															<div class="row demo-swtich border-bottom">
																<div class="col-md-12">
																	<h5>Question Mode <a href="javascript:;" data-toggle="modal" data-target="#QuestionMode"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="QuestionMode" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p><b>Unused: </b> Selects questions from a set of new/unseen questions</p>
																				<hr />
																				<p><b>Incorrect: </b> Generates test using questions that were answered incorrectly</p>
																				<hr />
																				<p><b>Marked: </b> Selects questions that were previously marked/flagged for review</p>
																				<hr />
																				<p><b>All: </b> Randomly selects questions from a set of all available questions</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-md-12 demo-radio-button mt-2">
																	<input name="group[]" type="radio" class="with-gap radio-col-cyan" id="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_1" value="Unused" checked>
																	<label for="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_1">Unused <span class="badge badge-secondary"><?php echo $functions->get_unused_question($id, $typeId[$j]);?></span></label>
																	<input name="group[]" type="radio" class="with-gap radio-col-cyan" id="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_2" value="Incorrect">
																	<label for="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_2">Incorrect <span class="badge badge-secondary">0</span></label>
																	<input name="group[]" type="radio" class="with-gap chk-col-cyan" id="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_3" value="Marked">
																	<label for="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_3">Marked <span class="badge badge-secondary">0</span></label>
																	<input name="group[]" type="radio" id="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_4" class="with-gap radio-col-cyan" value="All">
																	<label for="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_4">All <span class="badge badge-secondary"><?php echo $functions->get_unused_question($id, $typeId[$j]);?></span></label>
																</div>
																<div class="clearfix"></div>	
															</div>
															<div class="row demo-swtich border-bottom">
																<div class="col-md-12">
																	<h5>Difficulty Level <a href="javascript:;" data-toggle="modal" data-target="#DifficultyLevel"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="DifficultyLevel" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p><b>High: </b> Selects questions that are relatively hard</p>
																				<hr />
																				<p><b>Medium: </b> Selects questions with moderate difficulty level</p>
																				<hr />
																				<p><b>Low: </b> Selects questions that are relatively easy</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-md-12 mt-2 demo-checkbox">
																	<input name="difficulty_level[]" type="checkbox" class="filled-in chk-col-cyan" id="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_1" value="Low" checked>
																	<label for="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_1">Low <span class="badge badge-secondary"><?php echo $functions->get_difficulty_level($id, $typeId[$j], "Low")?></span></label>
																	<input name="difficulty_level[]" type="checkbox" id="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_2" class="filled-in chk-col-cyan" value="Medium" checked>
																	<label for="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_2">Medium  <span class="badge badge-secondary"><?php echo $functions->get_difficulty_level($id, $typeId[$j], "Medium")?></span></label>
																	<input name="difficulty_level[]" type="checkbox" id="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_3" class="filled-in chk-col-cyan" value="High" checked>
																	<label for="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_3">High <span class="badge badge-secondary"><?php echo $functions->get_difficulty_level($id, $typeId[$j], "High")?></span></label>
																</div>
																<div class="clearfix"></div>	
															</div>
															<div class="row demo-swtich border-bottom">
																<div class="col-md-12">
																	<h5>Subjects <a href="javascript:;" data-toggle="modal" data-target="#Subjects"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="Subjects" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p>Choose questions that cover SAT specific math topics or reading/writing subjects</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<?php
																	$subject_info = get_table_data('tbl_subjects', 'id!="" AND category_id="'.$id.'" AND type_id = "'.$typeId[$j].'" AND status = "Active" ');
																	if($subject_info!="")
																	{
																		foreach($subject_info as $key => $val)
																		{
																			$displaySubject = $functions->get_subject_by_topic($val->id);
																			if($displaySubject!="0")
																			{
																				?>
																				<div class="col-md-6 mt-2 demo-checkbox">
																					<div class="col-md-12">
																						<input name="subject_name[]" type="checkbox" class="filled-in chk-col-cyan" id="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_<?php echo $key;?>_1" checked="">
																						<label for="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_<?php echo $key;?>_1"><?php echo $val->subject_name?> <span class="badge badge-secondary"><?php echo $functions->get_subject_total_ques($id, $typeId[$j], $val->id);?></span></label>
																						<div class="col-md-12">
																							<?php
																								$topic_info = get_table_data('tbl_topics', 'id!="" AND category_id="'.$id.'" AND type_id = "'.$typeId[$j].'" AND subject_id = "'.$val->id.'" AND status = "Active" ');
																								if($topic_info!="")
																								{
																									foreach($topic_info as $keys => $row)
																									{
																										?>
																										<input name="topic_name[]" type="checkbox" class="filled-in chk-col-cyan" id="basic_checkbox__<?php echo $id;?>_<?php echo $typeId[$j];?>_<?php echo $keys;?>_2" >
																										<label for="basic_checkbox__<?php echo $id;?>_<?php echo $typeId[$j];?>_<?php echo $keys;?>_2" style="width: 100%;"><?php echo $row->topic_name;?> <span class="badge badge-secondary"><?php echo $functions->get_topic_total_ques($id, $typeId[$j], $val->id, $row->id);?></span></label>
																										<?php
																									}
																								}
																								?>
																						</div>
																					</div>																
																				</div>
																				<?php
																			}
																		}
																	}
																?>
																<div class="clearfix"></div>	
															</div>
															<div class="row demo-swtich mt-3">
																<div class="col-md-12">
																	<h5>Number of Questions <a href="javascript:;" data-toggle="modal" data-target="#NumberofQuestions"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="NumberofQuestions" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p>Specify the number of math questions or reading/writing passages you want to include in the test</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="test-col" style="width: 100%;">
																	<div class="body-content">
																		<div class="col-md-2 pull-left pr-0">
																			<input name="maximum_questions" id="maximum_questions" class="form-control" type="text" value="5" maxlength="2">
																		</div>
																		<div class="col-md-3 pull-left">
																			<p class="m-0">Max Questions <span class="badge badge-dark">45</span></p>
																		</div>
																		<div class="clearfix"></div>	
																	</div>
																</div>
															</div>
															<button type="button" class="btn waves-effect waves-light btn-info" onClick="generate_start(<?php echo $typeId[$j]?>);">Generate Test</button>
														</div>
													</form>
													<!--body content-->
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
										<?php
									}
									else
									{
										?>
										<div class="tab-pane" id="<?php echo $typeId[$j]?>" role="tabpanel">
											<div class="p-20">
												<div class="test-col">
													<div class="subtitle">
														<h4>Quick <a href="javascript:;" data-toggle="modal" data-target="#Quick"><i class="fa fa-info-circle"></i></a></h4>
														<div class="clearfix"></div>
													</div>
													<!-- Modal -->
													<div class="modal fade" id="Quick" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-body">
																	<p>Create a quick test of unused math questions or unused reading/writing passage in untimed-tutor mode</p>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
													<div class="body-content">
														<div class="col-md-2 pull-left">
															<button type="button" class="btn waves-effect waves-light btn-info" onClick="qucik_start(<?php echo $typeId[$j]?>);">Start Test</button>
														</div>
														<div class="col-md-1 pull-left">
															<input class="form-control" type="text" value="5">
														</div>
														<div class="col-md-3 pull-left">
															<p class="m-0">Max Questions <span class="badge badge-dark">45</span></p>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="test-col">
													<div class="subtitle">
														<h4>Personalize <a href="javascript:;" data-toggle="modal" data-target="#Personalize"><i class="fa fa-info-circle"></i></a></h4>
														<div class="clearfix"></div>
													</div>
													<!-- Modal -->
													<div class="modal fade" id="Personalize" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-body">
																	<p>Personalize your test to cover specific math topics or reading/writing subjects</p>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
													<form id="generate_test_<?php echo $typeId[$j]?>">
														<div class="body-content2">
															<div class="row demo-swtich border-bottom">
																<div class="col-md-12">
																	<h5>Test Mode <a href="javascript:;" data-toggle="modal" data-target="#TestMode"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="TestMode" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p><b>Tutor: </b> Shows the correct answer and explanation after you answer each question</p>
																				<hr />
																				<p><b>Timed: </b> Sets a time limit on the test</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-3">
																	<div class="demo-switch-title">Tutor</div>
																	<div class="switch">
																		<label><input type="checkbox" checked=""><span class="lever switch-col-light-blue"></span></label>
																	</div>
																</div>											
																<div class="col-sm-3">
																	<div class="demo-switch-title">Timed</div>
																	<div class="switch">
																		<label>
																			<input type="checkbox"><span class="lever switch-col-light-blue"></span></label>
																	</div>
																</div>
																<div class="clearfix"></div>	
															</div>
															<div class="row demo-swtich border-bottom">
																<div class="col-md-12">
																	<h5>Question Mode <a href="javascript:;" data-toggle="modal" data-target="#QuestionMode"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="QuestionMode" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p><b>Unused: </b> Selects questions from a set of new/unseen questions</p>
																				<hr />
																				<p><b>Incorrect: </b> Generates test using questions that were answered incorrectly</p>
																				<hr />
																				<p><b>Marked: </b> Selects questions that were previously marked/flagged for review</p>
																				<hr />
																				<p><b>All: </b> Randomly selects questions from a set of all available questions</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-md-12 demo-radio-button mt-2">
																	<input name="group[]" type="radio" class="with-gap radio-col-cyan" id="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_1" checked="">
																	<label for="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_1">Unused <span class="badge badge-secondary"><?php echo $functions->get_unused_question($id, $typeId[$j]);?></span></label>
																	<input name="group[]" type="radio" class="with-gap radio-col-cyan" id="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_2">
																	<label for="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_2">Incorrect <span class="badge badge-secondary">0</span></label>
																	<input name="group[]" type="radio" class="with-gap chk-col-cyan" id="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_3">
																	<label for="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_3">Marked <span class="badge badge-secondary">0</span></label>
																	<input name="group[]" type="radio" id="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_4" class="with-gap radio-col-cyan">
																	<label for="radio_<?php echo $id;?>_<?php echo $typeId[$j];?>_4">All <span class="badge badge-secondary"><?php echo $functions->get_unused_question($id, $typeId[$j]);?></span></label>
																</div>
																<div class="clearfix"></div>	
															</div>
															<div class="row demo-swtich border-bottom">
																<div class="col-md-12">
																	<h5>Difficulty Level <a href="javascript:;" data-toggle="modal" data-target="#DifficultyLevel"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="DifficultyLevel" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p><b>High: </b> Selects questions that are relatively hard</p>
																				<hr />
																				<p><b>Medium: </b> Selects questions with moderate difficulty level</p>
																				<hr />
																				<p><b>Low: </b> Selects questions that are relatively easy</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-md-12 mt-2 demo-checkbox">
																	<input name="difficulty_level[]" type="checkbox" class="filled-in chk-col-cyan" id="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_1" value="Low" checked>
																	<label for="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_1">Low <span class="badge badge-secondary"><?php echo $functions->get_difficulty_level($id, $typeId[$j], "Low")?></span></label>
																	<input name="difficulty_level[]" type="checkbox" id="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_2" class="filled-in chk-col-cyan" value="Medium" checked>
																	<label for="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_2">Medium  <span class="badge badge-secondary"><?php echo $functions->get_difficulty_level($id, $typeId[$j], "Medium")?></span></label>
																	<input name="difficulty_level[]" type="checkbox" id="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_3" class="filled-in chk-col-cyan" value="High" checked>
																	<label for="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_3">High <span class="badge badge-secondary"><?php echo $functions->get_difficulty_level($id, $typeId[$j], "High")?></span></label>
																</div>
																<div class="clearfix"></div>	
															</div>
															<div class="row demo-swtich border-bottom">
																<div class="col-md-12">
																	<h5>Subjects <a href="javascript:;" data-toggle="modal" data-target="#Subjects"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="Subjects" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p>Choose questions that cover SAT specific math topics or reading/writing subjects</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<?php
																	$subject_info = get_table_data('tbl_subjects', 'id!="" AND category_id="'.$id.'" AND type_id = "'.$typeId[$j].'" AND status = "Active" ');
																	if($subject_info!="")
																	{
																		foreach($subject_info as $key => $val)
																		{
																			$displaySubject = $functions->get_subject_by_topic($val->id);
																			if($displaySubject!="0")
																			{
																				?>
																				<div class="col-md-6 mt-2 demo-checkbox">
																					<div class="col-md-12">
																						<input type="checkbox" class="filled-in chk-col-cyan" id="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_<?php echo $key;?>_1" checked="">
																						<label for="basic_checkbox_<?php echo $id;?>_<?php echo $typeId[$j];?>_<?php echo $key;?>_1"><?php echo $val->subject_name?> <span class="badge badge-secondary"><?php echo $functions->get_subject_total_ques($id, $typeId[$j], $val->id);?></span></label>
																						<div class="col-md-12">
																							<?php
																								$topic_info = get_table_data('tbl_topics', 'id!="" AND category_id="'.$id.'" AND type_id = "'.$typeId[$j].'" AND subject_id = "'.$val->id.'" AND status = "Active" ');
																								if($topic_info!="")
																								{
																									foreach($topic_info as $keys => $row)
																									{
																										?>
																										<input type="checkbox" class="filled-in chk-col-cyan" id="basic_checkbox__<?php echo $id;?>_<?php echo $typeId[$j];?>_<?php echo $keys;?>_2" >
																										<label for="basic_checkbox__<?php echo $id;?>_<?php echo $typeId[$j];?>_<?php echo $keys;?>_2" style="width: 100%;"><?php echo $row->topic_name;?> <span class="badge badge-secondary"><?php echo $functions->get_topic_total_ques($id, $typeId[$j], $val->id, $row->id);?></span></label>
																										<?php
																									}
																								}
																								?>
																						</div>
																					</div>																
																				</div>
																				<?php
																			}
																		}
																	}
																?>
																<div class="clearfix"></div>	
															</div>
															<div class="row demo-swtich mt-3">
																<div class="col-md-12">
																	<h5>Number of Questions <a href="javascript:;" data-toggle="modal" data-target="#NumberofQuestions"><i class="fa fa-info-circle"></i></a></h5>
																</div>
																<!-- Modal -->
																<div class="modal fade" id="NumberofQuestions" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-body">
																				<p>Specify the number of math questions or reading/writing passages you want to include in the test</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="test-col" style="width: 100%;">
																	<div class="body-content">
																		<div class="col-md-1 pull-left pr-0">
																			<input class="form-control" type="text" value="5">
																		</div>
																		<div class="col-md-3 pull-left">
																			<p class="m-0">Max Questions <span class="badge badge-dark">45</span></p>
																		</div>
																		<div class="clearfix"></div>	
																	</div>
																</div>
															</div>
															<button type="button" class="btn waves-effect waves-light btn-info" onClick="generate_start(<?php echo $typeId[$j]?>);">Generate Test</button>
														</div>
													</form>
													<!--body content-->
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
										<?php
									}
									$class++;
								}
							?>
						</div>
					</div>
				</div>
				<!-- row -->               
			</div>
			<footer class="footer text-center"> Copyright © DanquahPrep. All rights reserved. </footer>
		</div>
	</div>
	<?php include("script.php");?>
	<script>
	function qucik_start(tid)
	{
		//*************FOR QUICK START
		$.confirm({
			title: 'Info!',
			icon: 'fa fa-check',
			content: 'Demo version is restricted to a test of 10 questions only in Tutor mode. <br /><br />However, paid subscribers can specify any number of questions with a maximum of 45 per test.',
			type: 'orange',
			typeAnimated: true,
			buttons:{
				ok:{
					text: 'Ok',
					btnClass: 'btn-orange',
					action: function(){
						var maxQuestion = $('#maxQuestion').val();
						if(maxQuestion <= 45)
						{
							$.confirm({
								icon: 'fa fa-spinner fa-spin',
								title: 'Working!',
								content: function (){
									var self = this;
									return $.ajax({
										url: "../include/post_func.php",
										dataType: 'json',
										data:"categoryId="+<?php echo $id;?>+"&typeId="+tid+"&maxQuestion="+maxQuestion+"&submit=QuickTest",
										method: 'post'
									}).done(function (response){
										self.close();
										if(response.code==0)
										{
											$.confirm({
												title: 'Error!',
												icon: 'fa fa-warning',
												closeIcon: true,
												content: response.message,
												type: 'red',
												autoClose: 'close|10000',
												typeAnimated: true,
												buttons:{
													close: function (){
													}
												}
											});
										}
										else if(response.code==1)
										{
											$.confirm({
												title: 'Success!',
												icon: 'fa fa-check',
												content: response.message,
												type: 'green',
												typeAnimated: true,
												buttons:{
													ok:{
														text: 'Ok',
														btnClass: 'btn-green',
														action: function(){
															window.location = 'start_test?id='+response.test_id;
														}
													}
												}
											});
										}
										else if(response.code==2)
										{
											$.confirm({
												title: 'Error!',
												icon: 'fa fa-warning',
												closeIcon: true,
												content: response.message,
												type: 'red',
												autoClose: 'close|10000',
												typeAnimated: true,
												buttons:{
													close: function (){
													}
												}
											});
										}
									}).fail(function(){
										self.close();
										$.confirm({
											title: 'Encountered an error!',
											content: 'Something went wrong.',
											type: 'red',
											typeAnimated: true,
											buttons:{
												close: function (){
												}
											}
										});
									});
								},
								buttons: {
									close: function (){
									}
								}
							});
						}
						else
						{
							$.confirm({
								title: 'Error!',
								icon: 'fa fa-warning',
								closeIcon: true,
								content: 'Please enter a number between 1 and 45.',
								type: 'red',
								autoClose: 'close|10000',
								typeAnimated: true,
								buttons:{
									close: function (){
									}
								}
							});
						}
					}
				}
			}
		});
		
	};
	
	function generate_start(tid)
	{
		//*************FOR GENERETE START
		$.confirm({
			title: 'Info!',
			icon: 'fa fa-check',
			content: 'paid subscribers can specify any number of questions with a maximum of 45 per test.',
			type: 'orange',
			typeAnimated: true,
			buttons:{
				ok:{
					text: 'Ok',
					btnClass: 'btn-orange',
					action: function(){
						var maxQuestion = $('#maximum_questions').val();
						if(maxQuestion <= 45)
						{
							var serializeFrom = $('#generate_test_'+tid).serialize();
							$.confirm({
								icon: 'fa fa-spinner fa-spin',
								title: 'Working!',
								content: function (){
									var self = this;
									return $.ajax({
										url: "../include/post_func.php",
										dataType: 'json',
										data:serializeFrom+"&categoryId="+<?php echo $id;?>+"&typeId="+tid+"&submit=GenerateTest",
										method: 'post'
									}).done(function (response){
										self.close();
										if(response.code==0)
										{
											$.confirm({
												title: 'Error!',
												icon: 'fa fa-warning',
												closeIcon: true,
												content: response.message,
												type: 'red',
												autoClose: 'close|10000',
												typeAnimated: true,
												buttons:{
													close: function (){
													}
												}
											});
										}
										else if(response.code==1)
										{
											$.confirm({
												title: 'Success!',
												icon: 'fa fa-check',
												content: response.message,
												type: 'green',
												typeAnimated: true,
												buttons:{
													ok:{
														text: 'Ok',
														btnClass: 'btn-green',
														action: function(){
															window.location = 'start_test?id='+response.test_id;
														}
													}
												}
											});
										}
										else if(response.code==2)
										{
											$.confirm({
												title: 'Error!',
												icon: 'fa fa-warning',
												closeIcon: true,
												content: response.message,
												type: 'red',
												autoClose: 'close|10000',
												typeAnimated: true,
												buttons:{
													close: function (){
													}
												}
											});
										}
									}).fail(function(){
										self.close();
										$.confirm({
											title: 'Encountered an error!',
											content: 'Something went wrong.',
											type: 'red',
											typeAnimated: true,
											buttons:{
												close: function (){
												}
											}
										});
									});
								},
								buttons: {
									close: function (){
									}
								}
							});
						}
						else
						{
							$.confirm({
								title: 'Error!',
								icon: 'fa fa-warning',
								closeIcon: true,
								content: 'Please enter a number between 1 and 45.',
								type: 'red',
								autoClose: 'close|10000',
								typeAnimated: true,
								buttons:{
									close: function (){
									}
								}
							});
						}
					}
				}
			}
		});
		
	};
	</script>
</body>
</html>