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
			// echo "<pre>";
			// print_r($value);
			$categoryId = $value->category_id;
			$typeId = $value->type_id;
			$subjectId = $value->subject_id;
			$topicId = $value->topic_id;
			$title = $value->title;
			$explation = $value->explation;
			$video = $value->video;
			$answer_type = $value->answer_type;
			$optionId = $value->option_id;
			$image = $value->image;
			$level = $value->level;
			$hint = $value->hint;
			$status = $value->status;
			$is_deleted = $value->is_deleted;
			$is_block = $value->is_block;
			$question_type = explode(',', $value->question_type);
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
	$subpage_act = '14';
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
											<h4 class="m-b-10">Edit Question</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="dashboard">
													<i class="feather icon-home"></i>
												</a>
											</li>
											<li class="breadcrumb-item"><a href="questions">Questions</a></li>
											<li class="breadcrumb-item">
												<a href="javascript:;">Edit Question</a>
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
                                                        <form id="main" method="post" action="javascript:;">															
                                                            <input name="submit" type="hidden" value="editquestion" />
                                                            <input name="id" type="hidden" value="<?php echo $_REQUEST['id'];?>" />
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Category</label>
                                                                <div class="col-sm-10">
                                                                    <select name="questionCategory" class="form-control" onChange="get_type(this);">
																		<option value="">Select Category</option>
																		<?php
																			$category_info = get_table_data('tbl_category', 'id!="" AND parent_id != "0" AND status = "Active" ');
																			if($category_info!='')
																			{
																				foreach($category_info as $key => $value)
																				{
																					?>
																					<option <?php if($categoryId == $value->id){ echo "selected"; }?> value="<?php echo $value->id;?>"><?php echo $value->category_name;?></option>
																					<?php
																				}
																			}
																		?>
																	</select>
                                                                </div>
                                                            </div>															
															<div id="question-info">
																<?php if($typeId!='0'){?>
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label">Type</label>
																	<div class="col-sm-10">
																		<select name="type" id="Example" class="form-control" onChange="get_subject(this);">
																			<option value="">Select Type</option>
																			<?php
																				$type_info = get_table_data('tbl_types', 'id!="" AND subcategory_id="'.$categoryId.'" AND status = "Active" ');
																				if($type_info!='')
																				{
																					foreach($type_info as $key => $row)
																					{
																						?>
																						<option <?php if($typeId == $row->id){ echo "selected"; }?> value="<?php echo $row->id;?>"><?php echo $row->type_name;?></option>
																						<?php
																					}
																				}
																			?>
																		</select>
																	</div>
																</div>
																<?php }?>
																<div id="type-info">
																	<?php if($subjectId!='0'){?>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Subject</label>
																		<div class="col-sm-10">
																			<select name="subject" id="Example2" class="form-control" onchange="get_topic(this);">
																				<option value="">Select Subject</option>
																				<?php
																					$subject_info = get_table_data('tbl_subjects', 'id!="" AND type_id="'.$typeId.'" AND status = "Active" ');
																					if($subject_info!='')
																					{
																						foreach($subject_info as $key => $row)
																						{
																							?>
																							<option <?php if($subjectId == $row->id){ echo "selected"; }?> value="<?php echo $row->id;?>"><?php echo $row->subject_name;?></option>
																							<?php
																						}
																					}
																				?>
																			</select>
																		</div>
																	</div>
																	<?php }?>
																	<div id="subject-info">
																		<?php if($topicId!='0'){?>
																		<div class="form-group row">
																			<label class="col-sm-2 col-form-label">Topic</label>
																			<div class="col-sm-10">
																				<select name="topic" class="form-control">
																					<option value="">Select Topic</option>
																					<?php
																						$topic_info = get_table_data('tbl_topics', 'id!="" AND subject_id="'.$subjectId.'" AND status = "Active" ');
																						if($topic_info!='')
																						{
																							foreach($topic_info as $key => $row)
																							{
																								?>
																								<option <?php if($topicId == $row->id){ echo "selected"; }?> value="<?php echo $row->id;?>"><?php echo $row->topic_name;?></option>
																								<?php
																							}
																						}
																					?>
																				</select>
																			</div>
																		</div>
																		<?php }?>
																	</div>
																</div>
															</div>													
															<div id="type_display" class="form-group row" style="display:none;"></div>
															<div id="subject_display" class="form-group row" style="display:none;"></div>
															<div id="topic_display" class="form-group row" style="display:none;"></div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Question</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="questionTitle" id="questionTitle"><?php echo $title;?></textarea>
                                                                </div>
                                                            </div>


															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Question Image</label>
                                                                <div class="col-sm-10">
																	<input name="questionImage" id="questionImage" type="file" class="form-control">
																</div>
                                                            </div>

															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Reference Image</label>
                                                                <div class="col-sm-10">
																	<input name="referenceImage" id="questionImage" type="file" class="form-control">
																</div>
                                                            </div>


															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Difficulty Level</label>
                                                                <div class="col-sm-10">
                                                                    <select name="difficultyLevel" id="difficultyLevel" class="form-control">
																		<option value="">Select Category</option>
																		<option <?php if($level == "Low"){ echo "selected"; }?> value="Low">Low</option>
																		<option <?php if($level == "Medium"){ echo "selected"; }?> value="Medium">Medium</option>
																		<option <?php if($level == "High"){ echo "selected"; }?> value="High">High</option>
																	</select>
                                                                </div>
                                                            </div>
															<?php
																if($QuestionType == 2){
																	?>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Question Type  222222</label>
																		<div class="col-sm-10">
																			<div class="checkbox-color checkbox-primary">
																				<input name="questionType[]" id="checkbox18" onclick="check_question_type(this.id, 'checkbox19')" type="checkbox" value="Live" checked>
																				<label for="checkbox18">Live</label>
																			</div>
																			<div class="checkbox-color checkbox-primary">
																				<input name="questionType[]" id="checkbox19" onclick="check_question_type(this.id, 'checkbox18')" type="checkbox" value="Demo" checked>
																				<label for="checkbox19">Demo</label>
																			</div>
																		</div>
																	</div>
																	<?
																}else if($QuestionType == 1){
																	?>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Question Type 111111 </label>
																		<div class="col-sm-10">
																			<div class="checkbox-color checkbox-primary">
																				<input name="questionType[]" id="checkbox18" onclick="check_question_type(this.id, 'checkbox19')" type="checkbox" value="Live" <?php if($question_type[0] == "Live"){ echo "checked";} ?> >
																				<label for="checkbox18">Live</label>
																			</div>
																			<div class="checkbox-color checkbox-primary">
																				<input name="questionType[]" id="checkbox19" onclick="check_question_type(this.id, 'checkbox18')" class="chk_bx" type="checkbox" value="Demo" <?php if($question_type[0] == "Demo"){ echo "checked";} ?>>
																				<label for="checkbox19">Demo</label>
																			</div>
																		</div>
																	</div>
																	<?php
																}else{
																	?>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Question Type</label>
																		<div class="col-sm-10">
																			<div class="checkbox-color checkbox-primary">
																				<input name="questionType[]" id="checkbox18" onclick="check_question_type(this.id, 'checkbox19')" type="checkbox" value="Live" <?php if($question_type[0] == "Live"){ echo "checked";} ?> >
																				<label for="checkbox18">Live</label>
																			</div>
																			<div class="checkbox-color checkbox-primary">
																				<input name="questionType[]" id="checkbox19" onclick="check_question_type(this.id, 'checkbox18')" type="checkbox" value="Demo" <?php if($question_type[0] == "Demo"){ echo "checked";} ?>>
																				<label for="checkbox19">Demo</label>
																			</div>
																		</div>
																	</div>
																	<?php
																}
															?>



															<script>

																function check_question_type(id1, id2){

																	var isChecked = $('#'+id1).is(":checked");
																	if (isChecked) {
																		// Uncheck other type 
																		$('#'+id2).prop( "checked", false );
																	} else {
																		// Check other type
																		$('#'+id2).prop( "checked", true );
																	}
																}


															</script>
															
															<hr />
																<h4>Answer Section</h4>
															<hr />
															<?php if($typeId==4 || $categoryId==9){?>
															<div class="form-group row" id="hide-radio">
                                                                <label class="col-sm-2 col-form-label">Answer Type</label>
																<div class="col-sm-10 form-radio">
                                                                    <div class="radio radio-inline">
																		<label>
																			<input name="answerType" type="radio" value="MCQs" <?php if($answer_type == "MCQs"){ echo "checked";}?> >
																			<i class="helper"></i>MCQs
																		</label>
																	</div>
																	<div class="radio radio-inline">
																		<label>
																			<input name="answerType" type="radio" value="Detail" <?php if($answer_type == "Detail"){ echo "checked";}?> >
																			<i class="helper"></i>Detail
																		</label>
																	</div>
                                                                </div>
															</div>
															<?php } ?>
															<div class="form-group row" id="answer_type" style="display:none;">
                                                                <label class="col-sm-2 col-form-label">Answer Type</label>
																<div class="col-sm-10 form-radio">
                                                                    <div class="radio radio-inline">
																		<label>
																			<input name="answerType" type="radio" value="MCQs" >
                                                                            <i class="helper"></i>MCQs
																		</label>
																	</div>
																	<div class="radio radio-inline">
																		<label>
																			<input name="answerType" type="radio" value="Detail" >
																			<i class="helper"></i>Detail
																		</label>
																	</div>
                                                                </div>
															</div>
															<?php
																if($answer_type == "MCQs")
																{
																	?>
																	<div class="form-group row" id="mcqs">
																		<label class="col-sm-2 col-form-label">Options</label>
																		<div id="myDiv" class="col-sm-10" >
																			<?php
																				$optionInfo = get_table_data('tbl_options', 'id !="" AND question_id = "'.$_REQUEST['id'].'" AND created_by = "'.$_SESSION['user_login'].'" ' ,'id ASC');
																				if($optionInfo!='')
																				{
																					foreach($optionInfo as $key => $val)
																					{
																						?>
																						<p>
																							<input name="options[]" type="text" id="myInput" class="form-control" value="<?php echo $val->answer_value;?>" style="margin-right: 12px; width:78%; float: left; margin-bottom: 8px;"/>
																							<?php if(count($optionInfo)-1 == $key) {?>
																							<a href="javascript:;" id="addInput">
																								<button type="button" class="btn-primary" style="width: 31px; height: 28px;">
																									<i class="icofont icofont-plus"></i>
																								</button>
																							</a>
																							<?php } else {?>
																								<button type="submit" class="btn-primary" style="width: 31px; height: 28px; opacity: 0; pointer-events: none;"></button>
																							<?php } ?>
																							<label class="container">Is Correct
																								<input type="radio" name="is_correct[]" <?php if($optionId == $val->id){ echo "checked";} ?> value="<?php echo $val->id;?>" >
																								<span class="checkmark"></span>
																							</label>
																						</p>
																						<input name="optionids[]" type="hidden" value="<?php echo $val->id;?>" />
																						<?php
																					}
																				}
																			?>
																		</div>
																	</div>
																	<div class="form-group row" id="details" style="display:none;">
																		<label class="col-sm-2 col-form-label">Correct Answer</label>
																		<div class="col-sm-10">
																			<textarea name="correct_answer" id="correct_answer" style="width: 100%; height: 192px;"></textarea>
																		</div>
																	</div>
																	<?php
																}
																else if($answer_type == "Detail")
																{
																	?>
																	<div class="form-group row" id="mcqs" style="display:none;">
																		<label class="col-sm-2 col-form-label">Options</label>
																		<div id="myDiv" class="col-sm-10" >
																			<p style="display:inline;">
																				<input name="options_new[]" type="text" id="myInput" class="form-control" style="margin-right: 12px; width:78%; float: left;"/>
																				<a href="javascript:;" id="addInput">
																					<button type="button" class="btn-primary" style="width: 31px; height: 28px;">
																						<i class="icofont icofont-plus"></i>
																					</button>
																				</a>
																				<label class="container">Is Correct
																				  <input type="radio" name="is_correct_new[]" value="0">
																				  <span class="checkmark"></span>
																				</label>
																			</p>
																		</div>
																	</div>
																	<?php			
																	$optionInfo = get_table_data('tbl_options', 'id !="" AND question_id = "'.$_REQUEST['id'].'" AND created_by = "'.$_SESSION['user_login'].'" ' ,'id ASC');
																	if($optionInfo!='')
																	{
																		foreach($optionInfo as $key => $val)
																		{
																			?>
																			<div class="form-group row" id="details">
																				<label class="col-sm-2 col-form-label">Correct Answer</label>
																				<div class="col-sm-10">
																					<textarea name="correct_answer" id="correct_answer" style="width: 100%; height: 192px;"><?php echo $val->answer_value;?></textarea>
																				</div>
																			</div>
																			<?php
																		}
																	}
																}
															?>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Explanation</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="explanation" id="explanation"><?php echo $explation;?></textarea>
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Alternative</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="alternative" id="alternative"><?php echo $video;?></textarea>
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Hint</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="questionHint" id="questionHint"><?php echo $hint;?></textarea>
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Estimated Time</label>
                                                                <div class="col-sm-10">
                                                                    <input name="estimatedTime" type="text" id="estimatedTime" class="form-control hour" data-mask="99:99:99" value="<?php echo $attemped_time?>">
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Status</label>
                                                                <div class="col-sm-10">
                                                                    <select name="status" class="form-control">
																		<option value="">Select Status</option>
																		<option <?php if($status == "Active"){ echo "selected"; } ?> value="Active">Active</option>
																		<option <?php if($status == "Inactive"){ echo "selected"; } ?> value="Inactive">Inactive</option>
																	</select>
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2"></label>
                                                                <div class="col-sm-10">
                                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
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
	<script>
	function get_type(c)
	{		
		var $sel2 = $("#Example2");
		var text2 = $("option:selected",$sel2).text();
		
		if(text2 == 'Pharmacy Calculations')
		{
			$("input[name=answerType][value=MCQs]").prop('checked', true);			
			$('#answer_type').show();
			$('#mcqs').show();
			$('#details').hide();
		}
		else
		{
			$('#answer_type').hide();
			$('#mcqs').show();
			$('#details').hide();
		}
		
		$('#question-info').hide();
		//Fire off the request to /form.php
		request = $.ajax({
			url: "../include/post_func.php",
			type: "post",
			dataType: "json",
			data: "category_id="+c.value+"&submit=gettype"	
		}).done(function(response)
		{
			if(response.code==0)
			{
				$('#type_display').hide();
				$('#subject_display').hide();
			}
			else if(response.code==1)
			{
				$('#type_display').show();
				$('#subject_display').hide();
				$('#topic_display').hide();
				$('#type_display').html(response.message);
				
				$('#question-info').hide();
				$('#type-info').hide();
				$('#subject-info').hide();
			}
		}).responseText;
	}
	function get_subject(c)
	{
		var $sel = $("#Example");
		var text = $("option:selected",$sel).text();
		
		var $sel2 = $("#Example2");
		var text2 = $("option:selected",$sel2).text();
		
		if(text == 'Math' || text2 == 'Pharmacy Calculations')
		{
			$("input[name=answerType][value=MCQs]").prop('checked', true);			
			$('#answer_type').show();
			$('#hide-radio').hide();
			$('#mcqs').show();
			$('#details').hide();
		}
		else
		{
			$('#answer_type').hide();
			$('#mcqs').show();
			$('#details').hide();
		}		
		
		$('#type-info').hide();
		//Fire off the request to /form.php
		request = $.ajax({
			url: "../include/post_func.php",
			type: "post",
			dataType: "json",
			data: "type_id="+c.value+"&submit=getsubject"	
		}).done(function(response)
		{
			if(response.code==0)
			{
				$('#subject_display').hide();
			}
			else if(response.code==1)
			{
				$('#subject_display').show();
				$('#subject_display').html(response.message);
			}
		}).responseText;
	}
	function get_topic(s)
	{
		$('#subject-info').hide();
		//Fire off the request to /form.php
		request = $.ajax({
			url: "../include/post_func.php",
			type: "post",
			dataType: "json",
			data: "subject_id="+s.value+"&submit=gettopic"	
		}).done(function(response)
		{
			if(response.code==0)
			{
				$('#topic_display').hide();
			}
			else if(response.code==1)
			{
				$('#topic_display').show();
				$('#topic_display').html(response.message);
			}
		}).responseText;
	}
	
	jQuery(document).ready(function()
	{ 
		//*************FOR ADD QUESTION
		$( "#main" ).on("submit",function( event )
		{	
			var formData = new FormData($('form#main').get(0));
			
			var questionTitle = CKEDITOR.instances.questionTitle.getData();
			formData.set('questionTitle',questionTitle);
			
			var explanation = CKEDITOR.instances.explanation.getData();
			formData.set('explanation',explanation);

			var alternative = CKEDITOR.instances.alternative.getData();
			formData.set('alternative',alternative);
			
			var questionHint = CKEDITOR.instances.questionHint.getData();
			formData.set('questionHint',questionHint);
			
			$.confirm({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				content: function (){
					var self = this;
					return $.ajax({
						url: "../include/post_func.php",
						dataType: 'json',
						data: formData,
						method: 'post',
						cache:false,
						contentType: false,
						processData: false
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
							window.location = 'questions';
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
					close: function ()
					{
					}
				}
			});
			return false;
		});
	});
	
	$(function(){
		var scntDiv = $('#myDiv');
		var i = $('#myDiv p').length+1-1;
		$('#addInput').click(function(){
			$('<p class="remove_p" style="margin-top: 10px;"><input name="options_new[]" type="text" id="myInput_'+i+'" class="form-control" style="margin-right: 12px; width:78%; float: left;"/><a href="javascript:;" id="remInput" onclick="removeMe('+i+')"><button type="button" class="btn-primary" style="width:31px; height:28px;"><i class="icofont icofont-minus"></i></button></a> <label class="container">Is Correct <input type="radio" name="is_correct[]" value="'+i+'"><span class="checkmark"></span></label>  ').appendTo(myDiv);
			i++;
			return false;
		});
		removeMe = function(id){
			if( i > 1 )
			{
				$('#myInput_'+id).parents('p').remove();
				i--;
			}
			return false;
		}
	});
	
	$(document).ready(function () {
		$("input[type='radio']").on("change", function()
		{
			var radioValue = $("input[name='answerType']:checked").val();
			if(radioValue == 'MCQs')
			{
				$('#mcqs').show();
				$('#details').hide();
			}
			else if(radioValue == 'Detail')
			{
				$('#mcqs').hide();
				$('#details').show();
			}
		});
	});
	</script>
	<?php include('editor_script.php');?>	
</body>
</html>