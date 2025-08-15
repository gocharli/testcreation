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
									?>
									<div class="tab-pane <?php if($key < 1) { echo "active";}?>" id="<?php echo $val->id;?>" role="tabpanel">
										<div class="p-20">
											<div class="test-col">
												<div style="width:45%">
													<canvas id="pie-chart-<?php echo $val->id;?>" width="800" height="450"></canvas>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<?php
											if($testid == "")
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
											
											if($correctQuestions != 0 || $wrongQuestions != 0 || $pendingQuestions != 0)
											{
												?>
												<script type="text/javascript">
													new Chart(document.getElementById("pie-chart-<?php echo $val->id;?>"),
													{
														type: 'pie',
														data: {
															labels: ["Correct", "Incorrect", "Omited"],
															datasets: [{
																backgroundColor: ["#69c869", "#f05a5b","#689bf6"],
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
															labels: ["Correct", "Incorrect", "Omited"],
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
										?>
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
																		?>
																		<tr>
																			<td><?php echo $topicName;?></td>
																			<td><?php echo $correct_question;?></td>
																			<td><?php echo $incorrect_question;?></td>
																			<td><?php echo $omited_question;?></td>
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