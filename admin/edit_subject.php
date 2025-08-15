<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	// If session is not set then redirect to Login Page
	if(!isset($_SESSION['user_login']))
	{
		header("Location:index");
	}
	
	$subject_info = get_table_data('tbl_subjects', 'id="'.$_REQUEST['id'].'" ');
	if($subject_info!='')
	{
		foreach($subject_info as $key => $value)
		{
			$category_id = $value->category_id;
			$type_id = $value->type_id;
			$subject_name = $value->subject_name;
			$status = $value->status;
		}
	}
	else
	{
		header("Location:subjects");
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php 
	$page_act = '5';
	$subpage_act = '9';
	include('header.php');
?>
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
											<h4 class="m-b-10">Edit Subject</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="dashboard">
													<i class="feather icon-home"></i>
												</a>
											</li>
											<li class="breadcrumb-item"><a href="subjects">Subjects</a></li>
											<li class="breadcrumb-item">
												<a href="javascript:;">Edit Subject</a>
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
                                                        <form name="frm" id="main" method="post" action="javascript:;">															
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Category</label>
                                                                <div class="col-sm-10">
                                                                    <select name="subcategory" id="subcategory" class="form-control">
																		<option value="">Select Category</option>
																		<?php
																			$category_info = get_table_data('tbl_category', 'id!="" AND parent_id != "0" AND status = "Active" ');
																			if($category_info!='')
																			{
																				foreach($category_info as $key => $value)
																				{
																					?>
																					<option <?php if($category_id == $value->id){ echo "selected"; }; ?> value="<?php echo $value->id;?>"><?php echo $value->category_name;?></option>
																					<?php
																				}
																			}
																		?>
																	</select>
                                                                </div>
                                                            </div>
															<div id="cateogyType" class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Type</label>
                                                                <div class="col-sm-10">
                                                                    <select name="type" id="type" class="form-control">
																		<option value="">Select Type</option>
																		<?php
																			$type_info = get_table_data('tbl_types', 'id!="" AND subcategory_id="'.$category_id.'" AND status = "Active" ');
																			if($type_info!='')
																			{
																				foreach($type_info as $key => $value)
																				{
																					?>
																					<option <?php if($type_id == $value->id){ echo "selected"; }; ?> value="<?php echo $value->id;?>"><?php echo $value->type_name;?></option>
																					<?php
																				}
																			}
																		?>
																	</select>
                                                                </div>
                                                            </div>
															<div id="type_display" class="form-group row" style="display:none;"></div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Subject Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="subjectName" id="subjectName" placeholder="Subject Name" value="<?php echo $subject_name;?>" required>
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
	$(function() {
		$('#subcategory').change(function() {
			var category_id = $('#subcategory').val();
			//Fire off the request to /form.php
			request = $.ajax({
				url: "../include/post_func.php",
				type: "post",
				dataType: "json",
				data: "category_id="+category_id+"&submit=gettype"	
			}).done(function(response)
			{
				if(response.code==0)
				{
					$('#cateogyType').hide();
				}
				else if(response.code==1)
				{
					$('#cateogyType').hide();
					$('#type_display').show();
					$('#type_display').html(response.message);
				}
			}).responseText;
		});
	});
	jQuery(document).ready(function()
	{ 
		//*************FOR EDIT SUBADMIN
		$( "#main" ).on("submit",function( event )
		{
			var frm = $(this);
			$.confirm({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				content: function (){
					var self = this;
					return $.ajax({
						url: "../include/post_func.php",
						dataType: 'json',
						data:frm.serialize()+"&id=<?php echo $_REQUEST['id'];?>&submit=editsubject",
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
								autoClose: 'ok',
								typeAnimated: true,
								buttons:{
									ok:{
										text: 'Ok',
										btnClass: 'btn-green',
										action: function(){
											window.location = 'subjects';
										}
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
	</script>
</body>
</html>