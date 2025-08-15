<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	if(!isset($_SESSION['student_login'])) // If session is not set then redirect to Login Page
	{
		header("Location:../index");  
	}
	
	$previous = '';
	$next = '';
	if(isset($_REQUEST['previous'])){$previous = $_REQUEST['previous']; }
	if(isset($_REQUEST['next'])){$next = $_REQUEST['next']; }
	
	$limit = 1;  
	if(isset($_GET["page"]))
	{
		$page  = $_GET["page"];
	}
	else
	{
		$page=1;
	};  
	$start_from = ($page-1) * $limit;

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
	<!---------------------------------->
	<?php 

		// Added by david
		$categorry_id=0;
		$qq = "SELECT * FROM tbl_quick_user_test WHERE test_id = '".$_REQUEST['id']."' ";
		$rr = mysqli_query($conn, $qq);

		$total_time = 0; // minutes
		while($tt = mysqli_fetch_object($rr))
		{
			$tt->question_id;

			$ss = "SELECT attemped_time, category_id FROM tbl_questions WHERE id = '".$tt->question_id."' ";
			$uu = mysqli_query($conn, $ss);
			$vv = mysqli_fetch_object($uu);

			if($vv){
				if(trim($vv->attemped_time!="")){
					$t_arr = explode(":",$vv->attemped_time);
					$t_mins = ($t_arr[0]*60*60) + $t_arr[1]*60 + $t_arr[2];
					$total_time = $total_time + $t_mins; // seconds
				}
			}

			$categorry_id = $vv->category_id;

		}




		// Added by david 8 Oct
		$is_paid_user = 0;
		$exprity_date = $functions->get_expiry_date($_SESSION['student_login'], $categorry_id); // $id is category id like ACT GRE and Pharmacy Calculations
		if($exprity_date!=''){
			$is_paid_user = 1;
		}
		
		// Added by david



		if (!isset($_SESSION['total_time_seconds'])){ 

			//echo 'not set';
			$total_time_seconds = $total_time; // seconds
			$_SESSION['total_time_seconds'] = $total_time_seconds;
		
		}else{  
			//echo 'set';
			$total_time_seconds = $_SESSION['total_time_seconds']; 
	
		}

		//$total_time_seconds;

		//echo $total_time;

		// End

		$optoinId = "";
		$test_id = "";
		$strQry = "SELECT tbl_2.*, tbl_1.is_bookmark, tbl_1.test_id, tbl_1.user_answer, tbl_1.answer, tbl_1.solve_time FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_1.id != '' AND tbl_1.test_id = '".$_REQUEST['id']."' ";
		// echo $strQry;
		$strQry .= "LIMIT $start_from, $limit";
		$result = mysqli_query($conn, $strQry);
		//echo 'here';
		// echo '<pre>'; print_r($result); exit;

		if($count = mysqli_num_rows($result) > 0)
		{
			$j = 1;
			while($row = mysqli_fetch_object($result))
			{
				// echo '<pre>'; print_r($row);
				$optoinId = $row->option_id;
				$test_id = $row->test_id;
				$questionId = $row->id;
				$userAnswer = $row->user_answer;


				$answer = $row->answer;
				// if($row->answer != 'Correct'){
				// 	$answer = 'Incorrect';
				// }
				
				
//echo $answer;

				$solveTime = $row->solve_time;
				$isbookmark = $row->is_bookmark;
				$answer_type = $row->answer_type;
				?>

<input id="test_remaining_time" type="hidden" value="<?php echo $total_time_seconds; ?>" /> 


				<div id="main-wrapper">
					<header class="topbar">
						<nav class="navbar top-navbar navbar-expand-md navbar-light">
							<div class="navbar-collapse">
								<div class="col-xs-5 col-sm-5 text-left">
									<ul class="navbar-nav mr-auto mt-md-0">
										<li class="nav-link">
											<?php if($isbookmark == "Yes") {?>
												<span id="bookmark_yes">
													<a href="javascript:;" id="bookmarked" style="color: #FFF;">
														<!-- <img src="../static/img/marked_for_review_icon_notext.png" id="book_marked" width="25" height="25" alt=""/> -->
														<img id="book_marked_img" src="../static/img/Red_Flag.png" id="book_marked" width="25" height="25" alt=""/>
													</a>
												</span>
											<?php } else {?>
												<span id="bookmark_no">
													<a href="javascript:;" id="bookmarked" style="color: #FFF;">
														<img id="book_marked_img" src="../static/img/mark_for_review_icon_notext.png" id="bookmark" width="25" height="25" alt=""/>
													</a>
												</span>
											<?php }?>
											<span id="marked"></span>
										</li>
										<li class="nav-link">

										<?php 
										
											if(!empty($row->referenceImage)){ 
												$ref_src = "../questionImg/".$row->referenceImage;
											}else{
												$ref_src = "../static/img/equations.png";
											}
										
										?>

											<a data-toggle="modal" data-target=".bd-example-modal-lg" href="#" onclick="update_ref_img_src('<?php echo $ref_src; ?>')" style="color: #FFF;">
											<img src="../static/img/reference_sheet.png" width="25" height="25" alt=""/>

											<!-- <?php //if(!empty($row->referenceImage)){ ?>
												<img src="../questionImg/<?php //echo $row->referenceImage;?>" width="25" height="25" alt=""/> 
											<?php //}else{ ?>
												<img src="../static/img/reference_sheet.png" width="25" height="25" alt=""/>
											<?php //} ?> -->

											</a>
											
											
										</li>
										<?php if($row->hint!=""){ ?>
										<li class="nav-link">
											<a data-toggle="modal" data-target="#exampleModal1" href="#" style="color: #FFF;">
												<img src="../static/img/bulb_icon_notext.png" width="25" height="25" alt=""/> 
											</a>
										</li>
										<?php } ?>
									</ul>
								</div>					
								<div class="col-xs-2 col-sm-2 text-center">
									<ul class="navbar-nav text-center my-lg-0">
									<!-- ============================================================== -->
										<li class="nav-item" style="width: 100%;">
											<a data-toggle="modal" data-target="#exampleModal" class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="">
											<?php echo $page; ?> / <?php echo $functions->count_total_question($_REQUEST['id']) ;?> <i class="fa fa-angle-double-down"></i>
											</a>
										</li>
									</ul>
								</div>
								<!-- User profile and search -->
								<div class="col-xs-5 col-sm-5 text-right">
									<ul class="navbar-nav pull-right my-lg-0">



									<?php
									
									
									// Added by david
									if(!isset($_SESSION['test_mode'])){ // If session is not set for test mode
										$test_mode = 'Tutor';
									}else{
										$test_mode = $_SESSION['test_mode'];
									}

									if(!isset($_SESSION['quick_test_mode'])){ // If session is not set for quick test mode
										$quick_test_mode = 0;
									}else{
										$quick_test_mode = $_SESSION['quick_test_mode'];  // will be 1 for quick test and 0 for generate test
									}

									?>


<?php //if($test_mode == 'Timed' && $quick_test_mode > 0){  // timed test mode ?>

									<?php if($test_mode == 'Tutor'){ ?>
										<li class="nav-item" id="pause-icon">
											<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:;" onClick="pause_timer();">
												<i class="fa fa-pause"></i>
											</a>								
										</li>
										<li class="nav-item" id="play-icon" style="display:none;">
											<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:;" onClick="play_timer();">
												<i class="fa fa-play"></i>
											</a>								
										</li>
										<li class="nav-item">
											<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:;">
												<img src="../static/img/clock.png" width="25" height="25" alt=""/>
												<label id="minutes">00</label>:<label id="seconds">00</label>	
												<label id="time1"></label>	
											</a>
										</li>

									<?php }else{ ?>

										<li class="nav-item" >
											<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:;" >
												Time:
											</a>								
										</li>

										<li class="nav-item">
											<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:;">
												<img src="../static/img/clock.png" width="25" height="25" alt=""/>
												<div style="display: none"><label id="minutes">00</label>:<label id="seconds">00</label>	</div>
												<label id="time"></label>	
											</a>
										</li>

									<?php } ?>



<script>

// By david


function timeout_test(){

	$.confirm({
		title: 'Alert!',
		icon: 'fa fa-warning',
		content: "time's up now! Finish and score your test.",
		type: 'orange',
		typeAnimated: true,
		buttons:{
			ok:{
				text: 'Ok',
				btnClass: 'btn-danger',
				action: function(){
					window.location = 'previous_test_list?id=<?php echo $_REQUEST['id'];?>';
				}
			}
		}
	});

	setTimeout(function(){ window.location = 'previous_test_list?id=<?php echo $_REQUEST['id'];?>'; }, 5000);

}


function update_test_duration(href){

	<?php if($test_mode == 'Timed'){ ?>

		var test_remaining_time = $("#test_remaining_time").val();

		var testId = <?php echo $_REQUEST['id'];?>;
		var qId = <?php echo $questionId;?>;
		var serializedData = "test_remaining_time="+test_remaining_time+"&submit=test_remaining_time",
		
		//Fire off the request to /form.php
		request = $.ajax({
			url: "../include/post_func.php",
			type: "post",
			dataType: "text",
			data: serializedData
		});
		request.done(function (response, textStatus, jqXHR)
		{
			//alert(response);
			window.location = href;
		});

	<?php }else{ ?>

		window.location = href;

	<?php } ?>
}


function startTimer(duration, display) {

	if(duration <= 0){
		timeout_test();
		return;
	}

    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

		var remaining_time = parseInt( parseInt(minutes*60) + parseInt(seconds) ) ;  // seconds
		$("#test_remaining_time").val(remaining_time);

		console.log("remaining_time = "+remaining_time);

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
			//$("#end_submit").trigger("click");
			timeout_test();
        }
    }, 1000);
}


<?php if($test_mode == 'Timed'){ ?>

window.onload = function () {

	var total_time_seconds = <?php echo $total_time_seconds; ?>; 

    //var total_time_seconds = <?php //echo $total_time_seconds; ?>; //60 * 5,

	total_time_seconds = parseInt(total_time_seconds);
	display = document.querySelector('#time');
	startTimer(total_time_seconds, display);
	console.log("timer started");

};

<?php } ?>

// End by david

</script>



									</ul>
								</div>	
							</div>
						</nav>
					</header>
					<div class="page-wrapper m-0">
						<div class="container-fluid pt-4">
							<div class="card col-md-8">
								<div class="card-body">
									<p><?php echo $row->title;?></p>
									<?php
										if($row->image!="")
										{
											?>
											<img src="../questionImg/<?php echo $row->image;?>" />
											<?php
										}
									?>
									<div class="steps-radio">
										<form class="form cf">
											<section class="plan cf">
												<?php
													if($answer_type == "MCQs")
													{
														$optionInfo = get_table_data('tbl_options', 'id!="" AND question_id = "'.$row->id.'" ');
														if($optionInfo !='')
														{
															foreach($optionInfo as $key => $value)
															{
																?>
																<input type="radio" name="radio1" id="radio_<?php echo $key;?>" value="<?php echo $value->id;?>" <?php if($userAnswer == $value->id){ echo "checked" ;}?> ><label class="free-label four col" for="radio_<?php echo $key;?>"><?php echo $value->answer_value;?></label>
																<?php
															}
														}
													}
													else if($answer_type == "Detail")
													{
														?>
														<textarea name="correct_answer" id="correct_answer" style="width: 100%; height: 192px; margin-bottom: 15px;"></textarea><br />
														<?php
													}
												?>
											</section>
											<button id="answer_submit" class="btn waves-effect waves-light btn-info" type="button" value="Submit" onClick="submit_answer();" >Submit</button>
										</form>			
									</div>						
								</div>
							</div>


						<?php if($test_mode == 'Timed' && $quick_test_mode > 0){  // timed test mode ?>

							<!-- No answer should be shown during timed test mode.  -->

						<?php }else{ ?>

							<div id="display-detail" style="display:none">
								
								<div class="table-content mt-5 col-md-8">
									<table class="table table-bordered text-center">
										<tbody>
											<tr>
												

												<td style="background-color: #c6d8ec; color: #000;">Status: 
												<!-- <?php if(strtolower($previous) == 'yes'){ ?>
													<div id="correct-answer_previous"><?php echo $answer; ?></div>
												<?php }else{ ?>
													<div id="correct-answer"><?php echo $answer; ?></div>
												<?php } ?> -->

												<div id="correct-answer"><?php echo $answer; ?></div>
												
												
												</td>
												<td style="background-color: #9fbcdf; color: #000;">Correct Answer: <br /> <?php echo $functions->get_correct_answer($row->option_id, $row->id);?></td>
												<td style="background-color: #9fbcdf; color: #000;">Collecting <br />Statistics</td>
												<?php if($userAnswer == "0") {?>
													<td style="background-color: #c6d8ec; color: #000;">Time: <div id="finalTime"></div></td>
												<?php } else {?>
													<td style="background-color: #c6d8ec; color: #000;">Time: <?php echo $solveTime; ?></div></td>
												<?php } ?>
											</tr> 
										</tbody>
									</table>
								</div>
								
								
								<?php if($test_mode == 'Tutor'){ ?>

									<div class="row">
										<div class="col-md-12 custom-tabs">
											<ul class="nav nav-tabs" role="tablist">
												
											<?php //if($row->explation) {?>
												<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Explanation</span></a> </li>
												<?php //} ?>
												<?php if($row->video) {?>
													<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Alternate Method</span></a> </li>
												<?php } ?>
											</ul>
											<?php
												$ads = explode('<iframe', $row->explation);
											?>
											<div class="tab-content tabcontent-border">
												<?php if($ads[0] != '') {?>
												<div class="tab-pane active" id="home" role="tabpanel">
													<div class="p-20">
														<span style="word-break:break-all"><?php echo $row->explation; //$ads[0];?></span>
													</div>
												</div>
												<?php } ?>
												<?php if($row->video != '') { ?>
												<div class="tab-pane  p-20" id="profile" role="tabpanel">
													<?php echo $row->video;?>
												</div>
												<?php } ?>
											</div>
										</div>
									</div>

							<?php } ?>


							</div>

						<?php } ?>


							<!-- row -->
						</div>
						<footer class="footer text-center" style="left: 0; background: #1976d2; position:fixed;">
							<div class="row">
								<div class="col-xs-6 col-sm-6 text-left">
									<a href="javascript:;" id="end_submit" style="color: #FFF;">
										<img src="../static/img/end_icon_notext.png" width="25" height="25" alt=""/> End
									</a>
								</div>
								<?php
									$sql = "SELECT COUNT(*) AS totalQuestion FROM tbl_quick_user_test WHERE id != '' AND test_id = '".$_REQUEST['id']."' ";
									$rs_result = mysqli_query($conn, $sql);  
									$row1 = mysqli_fetch_row($rs_result);  
									$total_records = $row1[0];
									$total_pages = ceil($total_records / $limit);  
									?>
									<div class="col-xs-6 col-sm-6 text-right">
										<?php if($page > 1) {?>
											<a onclick="update_test_duration(this.id);" id='start_test?id=<?php echo $_REQUEST['id'];?>&page=<?php echo $page-1;?>&previous=yes' style="color: #FFF; padding-right: 20px; cursor: pointer">
												<img src="../static/img/previous_icon_notext.png" width="25" height="25" alt=""/> Previous
											</a>
										<?php } ?>
										<?php if($total_pages > $page) {?>
										<a onclick="update_test_duration(this.id);" id='start_test?id=<?php echo $_REQUEST['id'];?>&page=<?php echo $page+1;?>&next=yes' style="color: #FFF;cursor: pointer">
											Next <img src="../static/img/next_icon_notext.png" width="25" height="25" alt=""/> 
										</a>

										<?php } else {?>
											<a href="javascript:;" id="finish_submit" style="color: #FFF;">
												Finish <img src="../static/img/next_icon_notext.png" width="25" height="25" alt=""/> 
											</a>
										<?php } ?>
									</div>	
									<?php
								
								?>								
							</div>
						</footer>
					</div>
				</div>

				
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Navigator</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p><?php echo $j;?> Questions</p>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<?php
												$strQry1 = "SELECT tbl_2.* FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_1.id != '' AND tbl_1.test_id = '".$_REQUEST['id']."' ";
												$result1 = mysqli_query($conn, $strQry1);
												if(mysqli_num_rows($result1) > 0)
												{
													$i = 1 ;
													while($row2 = mysqli_fetch_array($result1))
													{
														?>
														<tr>
															<td><?php echo $i;?> (<?php echo $row2['id'];?>)</td>
															<td><i class="fa fa-circle fa-circle-override"></i></td>
														</tr>
														<?php
														$i++;
													}
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="">Hint</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<span style="word-break: break-all;">
									<?php echo $row->hint;?>
								</span>
							</div>
						</div>
					</div>
				</div>
				<?php
				$j++;
			}
		}
	?>
	<!---------------------------------->	
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="">Reference Sheet</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<img id="ref_img_src" src="../static/img/equations.png" width="100%" alt=""/> 
				</div>
			</div>
		</div>
	</div>


<script>

function update_ref_img_src(src){

	$("#ref_img_src").attr("src", src);

}

</script>


	<?php include("script.php");?>
	<?php
		if($previous == "yes" && $userAnswer != "")
		{
			?>
			<script>
				$("#display-detail").show();
				$("#answer_submit").hide();
				$("#correct_answer").val('<?php echo $userAnswer;?>');
				$("#correct_answer").attr('disabled', true);
				$("input[type=radio]").attr('disabled', true);
				var seconds = $('#seconds').text();
				var minutes = $('#minutes').text();
				
				$('#finalTime').html(minutes+":"+seconds);
				
				var ansType = '<?php echo $answer_type;?>';
				
				var radioValue;
				var realvalue;
				
				if(ansType == 'MCQs')
				{
					radioValue = $("input[name='radio1']:checked").val();
					realvalue = <?php echo $optoinId;?>;
				}
				else if(ansType == 'Detail')
				{
					radioValue = '<?php echo $userAnswer;?>';
					realvalue = $("#correct_answer").val();
				}


				// Added by david

				<?php if($answer == 'Correct' ){ ?>

				$('#correct-answer').html("Correct");
				$("#correct-answer").css("color", "#008000", "font-weight", "bold");

				<?php }else if($answer == 'Wrong'){ ?>

				$('#correct-answer').html("Incorrect");
				$("#correct-answer").css("color", "#d63737", "font-weight", "bold");

				<?php }else{ ?>

				$('#correct-answer').html("Omited");
				$("#correct-answer").css("color", "#1976d2", "font-weight", "bold");

				<?php } ?>

				// Commented by david
				
				if(radioValue == realvalue)
				{
					$('#correct-answer').html("Correct");
					$("#correct-answer").css("color", "#008000", "font-weight", "bold");
				}
				else if (typeof radioValue === 'undefined')
				{
					$('#correct-answer').html("Omited");
					$("#correct-answer").css("color", "#1976d2", "font-weight", "bold");
				}
				else
				{
					$('#correct-answer').html("Incorrect");
					$("#correct-answer").css("color", "#d63737", "font-weight", "bold");
				}


				refreshIntervalId = setInterval(setTime, 1000);
				clearInterval(refreshIntervalId);
			</script>
			<?php
		}
		else if($next == "yes" && $userAnswer != "")
		{
			?>
			<script>	
				$("#display-detail").show();
				$("#answer_submit").hide();
				$("#correct_answer").val('<?php echo $userAnswer;?>');
				$("#correct_answer").attr('disabled', true);
				$("input[type=radio]").attr('disabled', true);
				var seconds = $('#seconds').text();
				var minutes = $('#minutes').text();
				
				$('#finalTime').html(minutes+":"+seconds);
				
				var ansType = '<?php echo $answer_type;?>';
				
				var radioValue;
				var realvalue;
				
				if(ansType == 'MCQs')
				{
					radioValue = $("input[name='radio1']:checked").val();
					realvalue = <?php echo $optoinId;?>;
				}
				else if(ansType == 'Detail')
				{
					radioValue = '<?php echo $userAnswer;?>';
					realvalue = $("#correct_answer").val();
				}




				// Added by david

				<?php if($answer == 'Correct' ){ ?>

					$('#correct-answer').html("Correct");
					$("#correct-answer").css("color", "#008000", "font-weight", "bold");

				<?php }else if($answer == 'Wrong'){ ?>

					$('#correct-answer').html("Incorrect");
					$("#correct-answer").css("color", "#d63737", "font-weight", "bold");

				<?php }else{ ?>

					$('#correct-answer').html("Omited");
					$("#correct-answer").css("color", "#1976d2", "font-weight", "bold");

				<?php } ?>

				// Commented by david
				
				// if(radioValue == realvalue)
				// {
				// 	$('#correct-answer').html("Correct");
				// 	$("#correct-answer").css("color", "#008000", "font-weight", "bold");
				// }
				// else if (typeof radioValue === 'undefined')
				// {
				// 	$('#correct-answer').html("Omited");
				// 	$("#correct-answer").css("color", "#1976d2", "font-weight", "bold");
				// }
				// else
				// {
				// 	$('#correct-answer').html("Incorrect");
				// 	$("#correct-answer").css("color", "#d63737", "font-weight", "bold");
				// }

				refreshIntervalId = setInterval(setTime, 1000);
				clearInterval(refreshIntervalId);
			</script>
			<?php
		}
	?>
	<script>
		var minutesLabel = document.getElementById("minutes");
		var secondsLabel = document.getElementById("seconds");
		var totalSeconds = 0;
		var refreshIntervalId = setInterval(setTime, 1000);
		
		function setTime()
		{
			++totalSeconds;
			secondsLabel.innerHTML = pad(totalSeconds % 60);
			minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
		}

		function pad(val)
		{
			var valString = val + "";
			if (valString.length < 2)
			{
				return "0" + valString;
			}
			else
			{
				return valString;
			}
		}
		
		function submit_answer()
		{
			$("#display-detail").show();
			$("#answer_submit").hide();
			$("input[type=radio]").attr('disabled', true);
			$("#correct_answer").attr('disabled', true);
			var seconds = $('#seconds').text();
			var minutes = $('#minutes').text();
			
			$('#finalTime').html(minutes+":"+seconds);
			
			clearInterval(refreshIntervalId);
		}
		
		function pause_timer()
		{
			$("#play-icon").show();
			$("#pause-icon").hide();
			clearInterval(refreshIntervalId);
		}
		
		function play_timer()
		{
			$("#play-icon").hide();
			$("#pause-icon").show();
			refreshIntervalId = setInterval(setTime, 1000);
		}
	</script>
	<script>
		jQuery(document).ready(function()
		{
			//*************FOR SUBMIT ANSWER
			$( "#answer_submit" ).click("submit",function( event )
			{
				var aType = '';
				var radioValue = '';
				var correct_answer = '';
				var seconds = $('#seconds').text();
				var minutes = $('#minutes').text();
				var stime = minutes+":"+seconds;
				
				var testId = <?php echo $_REQUEST['id'];?>;
				var opId = <?php echo $optoinId;?>;
				var qId = <?php echo $questionId;?>;
				aType = "<?php echo $answer_type;?>";
				
				
				if(aType == 'MCQs')
				{
					radioValue = $("input[name='radio1']:checked").val();
				}
				else if(aType == 'Detail')
				{
					correct_answer = $('#correct_answer').val();
				}
				
				var serializedData = "tid="+testId+"&rid="+radioValue+"&opId="+opId+"&qId="+qId+"&stime="+stime+"&aType="+aType+"&sAnswer="+correct_answer+"&submit=answer",
								
				//Fire off the request to /form.php
				request = $.ajax({
					url: "../include/post_func.php",
					type: "post",
					dataType: 'json',
					data: serializedData
				});
				request.done(function (response, textStatus, jqXHR)
				{
					if(response.code==1)
					{
						$('#correct-answer').html(response.message);
					}
				});
			});
			
			
			//*************FOR SUBMIT TEST
			$('#finish_submit').click(function(event)
			{
				$.confirm({
					title: 'Info!',
					icon: 'fa fa-check',
					content: 'Finish and score your test.',
					type: 'orange',
					typeAnimated: true,
					buttons:{
						ok:{
							text: 'Ok',
							btnClass: 'btn-green',
							action: function(){
								window.location = 'previous_test_list?id=<?php echo $_REQUEST['id'];?>';
							}
						}
					}
				});
			});
			
			//*************FOR SUBMIT TEST
			$('#end_submit').click(function(event)
			{
				$.confirm({
					title: 'Info!',
					icon: 'fa fa-check',
					content: 'End and score your test.',
					type: 'orange',
					typeAnimated: true,
					buttons:{
						ok:{
							text: 'Ok',
							btnClass: 'btn-green',
							action: function(){
								window.location = 'previous_test_list?id=<?php echo $_REQUEST['id'];?>';
							}
						}
					}
				});
			});
			
			//*************FOR BOOKMARK ANSWER
			$( "#bookmarked" ).click("submit",function( event )
			{
				var testId = <?php echo $_REQUEST['id'];?>;
				var qId = <?php echo $questionId;?>;
				var serializedData = "testId="+testId+"&qId="+qId+"&submit=bookmark",
				
				//Fire off the request to /form.php
				request = $.ajax({
					url: "../include/post_func.php",
					type: "post",
					dataType: "json",
					data: serializedData
				});
				request.done(function (response, textStatus, jqXHR)
				{
					if(response.code == 1){
						$("#book_marked_img").attr("src", '../static/img/Red_Flag.png');
						
					}else{
						$("#book_marked_img").attr("src", '../static/img/mark_for_review_icon_notext.png');
					}
				});
			});
			
			
		});
	</script>	
</body>
</html>
