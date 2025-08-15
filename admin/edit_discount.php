<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	// If session is not set then redirect to Login Page
	if(!isset($_SESSION['user_login']))
	{
		header("Location:index");
	}
	
	$package_info = get_table_data('tbl_discounts', 'id="'.$_REQUEST['id'].'" ');
	if($package_info!='')
	{
		foreach($package_info as $key => $value)
		{
			$category_id = $value->category_id;
			$package_id = $value->package_id;
			$coupon = $value->coupon;
			$discount = $value->discount;
			$expiry_date = $value->expiry_date;
			$status = $value->status;
		}
	}
	else
	{
		header("Location:discounts");
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php 
	$page_act = '8';
	$subpage_act = '19';
	include('header.php');
?>
<!-- Date-range picker css  -->
<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css" />
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
											<h4 class="m-b-10">Add Discount</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="dashboard">
													<i class="feather icon-home"></i>
												</a>
											</li>
											<li class="breadcrumb-item"><a href="discounts">Discounts</a></li>
											<li class="breadcrumb-item">
												<a href="javascript:;">Add Discount</a>
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
                                                                <label class="col-sm-2 col-form-label">Category</label>
                                                                <div class="col-sm-10">
                                                                    <select name="category" class="form-control" onChange="get_package(this);">
																		<option value="">Select Category</option>
																		<?php
																			$category_info = get_table_data('tbl_category', 'id!="" AND parent_id != "0" AND status = "Active" ');
																			if($category_info!='')
																			{
																				foreach($category_info as $key => $value)
																				{
																					?>
																					<option <?php if($category_id == $value->id){ echo "selected";}?> value="<?php echo $value->id;?>"><?php echo $value->category_name;?></option>
																					<?php
																				}
																			}
																		?>
																	</select>
                                                                </div>
                                                            </div>
															<div class="form-group row" id="hide_package" >
                                                                <label class="col-sm-2 col-form-label">Package</label>
                                                                <div class="col-sm-10">
                                                                    <select name="package_id" class="form-control">
																		<option value="">Select Package</option>
																		<?php
																			$package_info = get_table_data('tbl_packages', 'id!="" AND category_id="'.$category_id.'" AND status = "Active" ');
																			if($package_info!="")
																			{
																				foreach($package_info as $key => $row)
																				{
																					?>
																					<option <?php if($package_id == $row->id){ echo "selected";}?> value="<?php echo $row->id;?>"><?php echo $row->duration.' - '.$row->type;?></option>
																					<?php
																				}
																			}
																		?>
																	</select>
                                                                </div>
                                                            </div>
															<div id="package_display" class="form-group row" style="display:none;"></div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Coupon</label>
                                                                <div class="col-sm-8">
                                                                    <input name="coupon" type="text" id="coupon" class="form-control" value="<?php echo $coupon;?>" >
                                                                </div>
																<div class="col-sm-2">
																	<button type="button" id="generate_coupon" class="btn btn-primary" style="padding: 5.5px;">Generate Coupon</button>
																</div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Discount (%)</label>
                                                                <div class="col-sm-10">
                                                                    <input name="discount" type="text" id="discount" class="form-control" value="<?php echo $discount;?>">
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Expiry Date</label>
                                                                <div class="col-sm-10">
                                                                    <input name="expiry_date" type="date" id="expiry_date" class="form-control" value="<?php echo $expiry_date;?>" >
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
	<!-- Date-range picker js -->
	<script type="text/javascript" src="files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>
	<script>
	$( "#generate_coupon" ).on("click",function( event )
	{	
		//Fire off the request to /form.php
		request = $.ajax({
			url: "../include/post_func.php",
			type: "post",
			dataType: "json",
			data: "submit=generatecoupon"	
		}).done(function(response)
		{
			if(response.code==1)
			{
				$('#coupon').val(response.message);
			}
		}).responseText;
	});
	
	function get_package(c)
	{
		//Fire off the request to /form.php
		request = $.ajax({
			url: "../include/post_func.php",
			type: "post",
			dataType: "json",
			data: "category_id="+c.value+"&submit=getpackage"	
		}).done(function(response)
		{
			if(response.code==0)
			{
				$('#package_display').hide();
			}
			else if(response.code==1)
			{
				$('#hide_package').hide();
				$('#package_display').show();
				$('#package_display').html(response.message);
			}
		}).responseText;
	}
	
	jQuery(document).ready(function()
	{ 
		//*************FOR ADD DISCOUNT
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
						data:frm.serialize()+"&id=<?php echo $_REQUEST['id'];?>&submit=editdiscount",
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
							window.location = 'discounts';
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
	
	</script>	
</body>
</html>