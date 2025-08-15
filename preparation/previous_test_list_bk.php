<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	if(!isset($_SESSION['student_login'])) // If session is not set then redirect to Login Page
	{
		header("Location:../index");  
	}
	
	$categoryName = $functions->get_category_name($_SESSION['categoryType']);
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("head.php");?>
</head>
<body class="fix-header card-no-border">
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
                    <h3 class="text-themecolor">Previous Test</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Previous Test</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
											<tr>
                                                <th>ID</th>
                                                <th>DATE</th>
                                                <th>SECTION</th>
                                                <th>QS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												$test_id = "";
												$ipaddress = $_SERVER['REMOTE_ADDR'];
												if($_SESSION['student_login'] == '')
												{
													$strQry = "SELECT * FROM tbl_quick_test WHERE id != '' AND ip_address = '".$ipaddress."'  ";
												}
												else
												{
													$strQry = "SELECT * FROM tbl_quick_test WHERE id != '' AND user_id = '".$_SESSION['student_login']."' ";
												}
												$result = mysqli_query($conn, $strQry);
												if($count = mysqli_num_rows($result) > 0)
												{
													while($row = mysqli_fetch_object($result))
													{
														$typeID = $functions->get_type_name($row->type_id);
														$totalQuestion = $functions->count_total_question($row->random_id);
														?>
														<tr>
															<td><?php echo $row->random_id;?></td>
															<td>
																<?php echo date("M d, Y", strtotime($row->created_date));?><br />
																<?php echo date("H:i:s", strtotime($row->created_date));?>
															</td>
															<td><?php echo $typeID;?></td>
															<td><?php echo $totalQuestion;?></td>
															<td><a href="start_test?id=<?php echo $row->random_id;?>&next=yes">Resume</a> | <a href="result_list?id=<?php echo $row->random_id;?>">Result</a> | <a href="report_list?testid=<?php echo $row->random_id;?>">Report</a></td>
														</tr>
														<?php
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
			</div>
            <footer class="footer text-center"> Copyright © DanquahPrep. All rights reserved. </footer>
        </div>
    </div>
    <?php include("script.php");?>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    </script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
