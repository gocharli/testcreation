<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	// If session is not set then redirect to Login Page
	if(!isset($_SESSION['user_login']))
	{
		header("Location:index");
	}
	
	$category_info = get_table_data('tbl_category', 'id="'.$_REQUEST['id'].'" ');
	if($category_info!='')
	{
		foreach($category_info as $key => $value)
		{
			$category_name = $value->category_name;
			$status = $value->status;
		}
	}
	else
	{
		header("Location:category");
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php 
	$page_act = '3';
	$subpage_act = '3';
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
											<h4 class="m-b-10">Edit Main Category</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="dashboard">
													<i class="feather icon-home"></i>
												</a>
											</li>
											<li class="breadcrumb-item"><a href="category">Categories</a></li>
											<li class="breadcrumb-item">
												<a href="javascript:;">Edit Main Category</a>
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
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Category Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="categoryName" id="cname" placeholder="Category Name" value="<?php echo $category_name;?>" required>
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
						data:frm.serialize()+"&id=<?php echo $_REQUEST['id'];?>&submit=editmaincategory",
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
											window.location = 'category';
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