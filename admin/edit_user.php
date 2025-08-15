<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	// If session is not set then redirect to Login Page
	if(!isset($_SESSION['user_login']))
	{
		header("Location:index");
	}
	
	$id = $_REQUEST['id'];

	// If session is not set then redirect to Login Page
	if($id == "")
	{
		header("Location:users");
	}

	$user = get_table_data('tbl_users', 'id ="'.$id.'" ');
	foreach($user as $key => $value)
	{
		$firstname = $value->firstname;
		$lastname = $value->lastname;
		$username = $value->username;
		$primaryaddress = $value->primaryaddress;
		$secondaryaddress = $value->secondaryaddress;
		$city = $value->city;
		$country = $value->country;
		$state = $value->state;
		$zipcode = $value->zipcode;
		$phone = $value->phone;
		$usertype = $value->usertype;
		$status = $value->status;
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<?php 
	$page_act = '2';
	$subpage_act = '1';
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
											<h4 class="m-b-10">Edit User</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="dashboard">
													<i class="feather icon-home"></i>
												</a>
											</li>
											<li class="breadcrumb-item"><a href="users">Users</a></li>
											<li class="breadcrumb-item">
												<a href="javascript:;">Edit User</a>
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
																<label class="col-sm-2 col-form-label">First Name </label>
																<div class="col-sm-10">
																	<input type="hidden" name="id" value="<?php echo $id; ?>"  />
																	<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $firstname;?>" >
																</div>
															</div>	

															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Last Name </label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $lastname;?>" >
																</div>
															</div>

															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Username </label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username;?>" >
																</div>
															</div>

															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Primary Address </label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" name="primaryaddress" id="primaryaddress" placeholder="Primary Address" value="<?php echo $primaryaddress;?>" >
																</div>
															</div>

															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Secondary Address </label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" name="secondaryaddress" id="secondaryaddress" placeholder="Secondary Address" value="<?php echo $secondaryaddress;?>" >
																</div>
															</div>


															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Country </label>
																<div class="col-sm-10">
																	<select name="country" class="form-control"  />
																		<option value="">Select Country</option>
																		<?php
																			$country_info = get_table_data('tbl_countries', 'id!="" ');
																			if($country_info!='')
																			{
																				foreach($country_info as $key => $value)
																				{
																					?>
																					<option <?php if($value->id == $country){ echo "selected"; } ?> value="<?php echo $value->id;?>" ><?php echo $value->name;?></option>
																					<?php
																				}
																			}
																		?>
																	</select>
																</div>
															</div>

															<div class="form-group row">
																<label class="col-sm-2 col-form-label"> City </label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $city;?>" >
																</div>
															</div>
															
															
															<div class="form-group row">
																<label class="col-sm-2 col-form-label">State </label>
																<div class="col-sm-10">
																	<input name="state" id="state" type="text" class="form-control" placeholder="State" value="<?php echo $state;?>" >
																</div>
															</div>

															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Zip Code </label>
																<div class="col-sm-10">
																	<input name="zipcode" id="zipcode" type="text" class="form-control" placeholder="zipcode" value="<?php echo $zipcode;?>" >
																</div>
															</div>


															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Phone </label>
																<div class="col-sm-10">
																	<input name="phone" id="phone" type="text" class="form-control mob_no" placeholder="Phone" value="<?php echo $phone;?>" data-mask="999-999-9999"  >
																</div>
															</div>


															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Status </label>
																<div class="col-sm-10">
																	<select name="status" class="form-control" required />
																		<option value="Active" <?php if($status == 'Active') echo 'selected'; ?>>Active</option>
																		<option value="Inactive" <?php if($status == 'Inactive') echo 'selected'; ?>>Inactive</option>
																	</select>
																</div>
															</div>

														
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Password </label>
                                                                <div class="col-sm-10">
																	<span style="font-size: smaller;">Leave it blank if you do not want to change the password!</span>
                                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" >
                                                                </div>
                                                            </div>

															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Confirm Password </label>
                                                                <div class="col-sm-10">
																	<span id="pwd_err" style="color: red; display: none">Password does not match</span>
                                                                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" value="" >
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"></label>
                                                                <div class="col-sm-10">
                                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
																	<button type="button" class="btn"><a href="users">Cancel</a></button>
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
			var password = $("#password").val();
			var cpassword = $("#cpassword").val();
			if(password != cpassword){
				$("#pwd_err").show();
				return;
			}else{
				$("#pwd_err").hide();
			}
			
			var frm = $(this);
			$.confirm({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				content: function (){
					var self = this;
					return $.ajax({
						url: "../include/post_func.php",
						dataType: 'json',
						data:frm.serialize()+"&id=<?php echo $_SESSION['user_login'];?>&submit=EditUser",
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
											window.location = 'users';
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