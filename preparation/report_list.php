<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	
	$id = $_SESSION['main_id'];
	
	$category_info = get_table_data('tbl_category', 'id="'.$_SESSION['main_id'].'" AND parent_id != "0" AND status = "Active" ');
	if($category_info!='')
	{
		$categoryName = $category_info[0]->category_name;
	}
	else
	{
		header("Location:../index");
	}
	
	$testid = "";
	if(isset($_REQUEST['testid'])){$testid = $_REQUEST['testid'];}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php");?>
</head>
<script src="js/chart.js"></script>
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
			$expirtyDate = date('M d, Y',strtotime('+30 days',strtotime($date)));
		?>
        <?php include("sidebar.php");?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Report List </h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Report List</li>
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
							if($type_info!="")
							{
								foreach($type_info as $key => $val)
								{
									//echo '<pre>'; print_r($type_info); 
									?>
									<div class="tab-pane <?php if($key < 1) { echo "active";}?>" id="<?php echo $val->id;?>" role="tabpanel">
									
								</br></br>

									<div class="row">


										<?php if($testid == "")
											{
												$totalQuestions = $functions->count_total_question_by_category($_SESSION['main_id'], "", $val->id);
												$correctQuestions = $functions->count_total_question_by_category($_SESSION['main_id'], "Correct", $val->id);
												$wrongQuestions = $functions->count_total_question_by_category($_SESSION['main_id'], "Wrong", $val->id);
												$pendingQuestions = $functions->count_total_question_by_category($_SESSION['main_id'], "Pending", $val->id);
											}
											else
											{
												$totalQuestions = $functions->count_total_question_by_test($testid, "", $val->id);
												$correctQuestions = $functions->count_total_question_by_test($testid, "Correct", $val->id);
												$wrongQuestions = $functions->count_total_question_by_test($testid, "Wrong", $val->id);
												$pendingQuestions = $functions->count_total_question_by_test($testid, "Pending", $val->id);
											}
											 ?>

										<?php if($totalQuestions > 0){ ?>
										
											<div class="col-md-4">
												<div class="test-col">
													<div style="width:80%">
														<canvas id="pie-chart-<?php echo $val->id;?>" width="400" height="250"></canvas>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>

											

											<div class="col-md-4">
												<div class="test-col">
													<div style="width:100%">
														<canvas id="myChart-<?php echo $val->id;?>" width="400" height="250"></canvas>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>

											<div class="col-md-4">
												<div class="test-col">
													<div style="width:100%">
														<canvas id="myChart1-<?php echo $val->id;?>" width="400" height="250"></canvas>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>

										<?php }else{ ?>

											<div class="col-md-12">
												<div class="test-col">
													<div style="text-align:center">
														<h4>No Record Found!</h4>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>

										<?php } ?>

									</div>	



										<?php
											


											if($totalQuestions > 0){
											
												if($correctQuestions != 0 || $wrongQuestions != 0 || $pendingQuestions != 0)
												{
													$ttt="";

													$correct_per = number_format( ($correctQuestions/$totalQuestions*100), 2);
													$wrong_per = number_format( ($wrongQuestions/$totalQuestions*100), 2);
													$omitted_per = number_format( ($pendingQuestions/$totalQuestions*100), 2);

													?>
													<script type="text/javascript">
														new Chart(document.getElementById("pie-chart-<?php echo $val->id;?>"),
														{
															type: 'pie',
															data: {
																labels: ["Correct <?php echo $correct_per;?>%", "Incorrect <?php echo $wrong_per;?>%", "Omited <?php echo $omitted_per;?>%"],
																datasets: [{
																	backgroundColor: ["#69c869", "#f05a5b","#689bf6"],
																	//data: [<?php //echo $correct_per;?>,<?php //echo $wrong_per;?>,<?php //echo $omitted_per;?>]
																	data: [<?php echo $correctQuestions;?>,<?php echo $wrongQuestions;?>,<?php echo $pendingQuestions;?>]
																}]
															},
															options: {
															title: {
																	display: true,
																}
															}
														});
													</script>
													<?php
												}
												else
												{
													?>
													<script type="text/javascript">
														new Chart(document.getElementById("pie-chart-<?php echo $val->id;?>"),
														{
															type: 'pie',
															data: {
																labels: ["Correct <?php echo $correct_per;?>%", "Incorrect <?php echo $wrong_per;?>%", "Omited <?php echo $omitted_per;?>%"],
																datasets: [{
																	backgroundColor: ["#69c869", "#f05a5b","#689bf6"],
																	data: [0.1,0.1,0.1]
																}]
															},
															options: {
															title: {
																	display: true,
																}
															}
														});
													</script>
													<?php
												}
											}
										?>





										<script>


										<?php
												$labels = "["; 
												$labels1 = "["; 
												$i = 0;
												$j = 0;
												$c_data = [];
												$c_data1 = [];

												// $c_data['Correct'] = [];
												// $c_data['Incorrect'] = [];
												// $c_data['Omitted'] = [];

												$strQry = "";
												if($testid != "")
												{
													$strQry = "SELECT tbl_2.* FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_1.id != '' AND tbl_1.test_id = '".$testid."' AND tbl_2.type_id = '".$val->id."' GROUP BY tbl_2.topic_id";
												}
												else
												{
													$strQry = "SELECT tbl_2.* FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_1.id != '' AND tbl_2.category_id = '".$_SESSION['main_id']."' AND tbl_2.type_id = '".$val->id."' GROUP BY tbl_2.topic_id";
												}
												$result = mysqli_query($conn, $strQry);
												while($rows = mysqli_fetch_object($result))
												{
													$topicName = $functions->get_topic_name($rows->topic_id);
													
													$lbl="Untitled";
													if($topicName == ""){
														$labels.='"'.$lbl.' %",';
													}else{
														$labels.='"'.$topicName.' %",';
													}

													$subjectName = $functions->get_subject_name($rows->subject_id);
													if($subjectName == ""){
														$labels1.='"'.$lbl.' %",';
													}else{
														$labels1.='"'.$subjectName.' %",';
													}
													

													$ttest_idd = "";
													if($testid != "")
													{
														$ttest_idd = $testid;	
													}

													// By topic data
													$correct_question = $functions->count_total_question_by_topic($rows->topic_id, "Correct", $val->id, $ttest_idd);
													$incorrect_question = $functions->count_total_question_by_topic($rows->topic_id, "Wrong", $val->id, $ttest_idd);
													$omited_question = $functions->count_total_question_by_topic($rows->topic_id, "Pending", $val->id, $ttest_idd);

													$total_questions = $correct_question + $incorrect_question + $omited_question;

													$c_per = number_format( ($correct_question/$total_questions*100), 0);
													$i_per = number_format( ($incorrect_question/$total_questions*100), 0);
													$o_per = number_format( ($omited_question/$total_questions*100), 0); 
													
													$c_data['Correct'][$i] = $c_per;
													$c_data['Incorrect'][$i] = $i_per;
													$c_data['Omitted'][$i] = $o_per;
													$i++;

													// End by topic data

													// By subject data

													$correct_question1 = $functions->count_total_question_by_subject($rows->subject_id, "Correct", $val->id, $ttest_idd);
													$incorrect_question1 = $functions->count_total_question_by_subject($rows->subject_id, "Wrong", $val->id, $ttest_idd);
													$omited_question1 = $functions->count_total_question_by_subject($rows->subject_id, "Pending", $val->id, $ttest_idd);

													$total_questions1 = $correct_question1 + $incorrect_question1 + $omited_question1;

													$c_per1 = number_format( ($correct_question1/$total_questions1*100), 0);
													$i_per1 = number_format( ($incorrect_question1/$total_questions1*100), 0);
													$o_per1 = number_format( ($omited_question1/$total_questions1*100), 0); 
													
													$c_data1['Correct'][$j] = $c_per1;
													$c_data1['Incorrect'][$j] = $i_per1;
													$c_data1['Omitted'][$j] = $o_per1;
													$j++;

													// End by subject data

												}

												$labels = substr($labels, 0, -1);
												$labels.="]";

												$labels1 = substr($labels1, 0, -1);
												$labels1.="]";

												//echo '<pre>'; print_r($c_data);
	
											?>


											var cnt = '<?php echo count($c_data); ?>';
											//alert(cnt);
											var ctx = document.getElementById("myChart-<?php echo $val->id;?>").getContext("2d");
											var index = 0;

											var data = {
											labels: <?php echo $labels; ?>,
											datasets: [{
												label: "Correct",
												backgroundColor: "green",
												data: [<?php echo implode(",",$c_data['Correct']); ?>] 
											}, {
												label: "Incorrect",
												backgroundColor: "red",
												data: [<?php echo implode(",",$c_data['Incorrect']); ?>]
											}, {
												label: "Omitted",
												backgroundColor: "blue",
												data: [<?php echo implode(",",$c_data['Omitted']); ?>]
											}]
											};

											var myBarChart = new Chart(ctx, {
											type: 'bar',
											data: data,
											options: {
												barValueSpacing: 20,
												scales: {
												yAxes: [{
													ticks: {
													min: 0,
													}
												}]
												}
											}
											});








											var ctx1 = document.getElementById("myChart1-<?php echo $val->id;?>").getContext("2d");
											var index = 0;

											var data = {
											labels: <?php echo $labels1; ?>,
											datasets: [{
												label: "Correct",
												backgroundColor: "green",
												data: [<?php echo implode(",",$c_data1['Correct']); ?>] 
											}, {
												label: "Incorrect",
												backgroundColor: "red",
												data: [<?php echo implode(",",$c_data1['Incorrect']); ?>]
											}, {
												label: "Omitted",
												backgroundColor: "blue",
												data: [<?php echo implode(",",$c_data1['Omitted']); ?>]
											}]
											};

											var myBarChart = new Chart(ctx1, {
											type: 'bar',
											data: data,
											options: {
												barValueSpacing: 20,
												scales: {
												yAxes: [{
													ticks: {
													min: 0,
													}
												}]
												}
											}
											});

										</script>




										




										<div class="container-fluid">
											<div class="row">
												<div class="col-12">
													<div class="table-responsive m-t-40">
														<table id="myTable" class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>NAME</th>
																	<th>CORRECT</th>
																	<th>INCORRECT</th>
																	<th>OMITED</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$strQry = "";
																	if($testid != "")
																	{
																		$strQry = "SELECT tbl_2.* FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_1.id != '' AND tbl_1.test_id = '".$testid."' AND tbl_2.type_id = '".$val->id."' GROUP BY tbl_2.topic_id";
																	}
																	else
																	{
																		$strQry = "SELECT tbl_2.* FROM tbl_quick_user_test tbl_1 LEFT JOIN tbl_questions tbl_2 ON tbl_1.question_id = tbl_2.id WHERE tbl_1.id != '' AND tbl_2.category_id = '".$_SESSION['main_id']."' AND tbl_2.type_id = '".$val->id."' GROUP BY tbl_2.topic_id";
																	}
																	$result = mysqli_query($conn, $strQry);
																	while($rows = mysqli_fetch_object($result))
																	{
																		$topicName = $functions->get_topic_name($rows->topic_id);
																		if($testid != "")
																		{
																			$correct_question = $functions->count_total_question_by_topic($rows->topic_id, "Correct", $val->id, $testid);
																			$incorrect_question = $functions->count_total_question_by_topic($rows->topic_id, "Wrong", $val->id, $testid);
																			$omited_question = $functions->count_total_question_by_topic($rows->topic_id, "Pending", $val->id, $testid);
																		}
																		else
																		{
																			$correct_question = $functions->count_total_question_by_topic($rows->topic_id, "Correct", $val->id, "");
																			$incorrect_question = $functions->count_total_question_by_topic($rows->topic_id, "Wrong", $val->id, "");
																			$omited_question = $functions->count_total_question_by_topic($rows->topic_id, "Pending", $val->id, "");
																		}

																		$total_questions = $correct_question + $incorrect_question + $omited_question;

																		$c_per = number_format( ($correct_question/$total_questions*100), 0);
																		$i_per = number_format( ($incorrect_question/$total_questions*100), 0);
																		$o_per = number_format( ($omited_question/$total_questions*100), 0);

																		?>
																		<tr>
																			<td><?php echo $topicName;?></td>
																			<td><?php echo $correct_question.' ('.$c_per.'%)';?> </td>
																			<td><?php echo $incorrect_question.' ('.$i_per.'%)';?></td>
																			<td><?php echo $omited_question.' ('.$o_per.'%)';?></td>
																		</tr>
																		<?php
																	}
																?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
									}
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
</body>
</html>