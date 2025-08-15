<?php 
	include('include/connection.php');
	include('include/functions.php');
	$functions = new functions;
	
	if(!isset($_SESSION['student_login'])) // If session is not set then redirect to Login Page
	{
		header("Location:index");  
	}	
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php');?>
<!-- / -->
</head>
<!-- Body Start -->
<body data-spy="scroll" data-target="#navbarHeader" data-offset="100">
	<!-- Loading -->
	<div id="loading" class="loader-wrapper theme-g-bg">
		<div class="center">
			<div class="d d1"></div>
			<div class="d d2"></div>
			<div class="d d3"></div> 
			<div class="d d4"></div>  
			<div class="d d5"></div>
		</div>
	</div>
	<!-- / -->
	<!-- Header -->
	<header class="header header-01">
		<div class="container-fluid p-0">
			<nav class="navbar navbar-expand-lg">
				<!-- Brand -->
				<a class="navbar-brand" href="index"><img src="static/img/logo.png" title="" alt=""></a>
				<!-- / -->
				<!-- Mobile Toggle -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<!-- / -->
				<div class="menu-box text-center">
					<a href="javascrip:;" id="toggle">Menu <span></span></a>
					<div id="menu">
						<div class="row">
							<div class="col-md-2"></div>
							<?php
								$category_info = get_table_data('tbl_category', 'id!="" AND parent_id = "0" AND status = "Active" ');
								if($category_info!='')
								{
									foreach($category_info as $key => $value)
									{
										?>
										<div class="col-md-2">
											<h4 style="color: #fda100;"><?php echo $value->category_name;?></h4>
											<?php
												$subcategory_info = get_table_data('tbl_category', 'id!="" AND parent_id = "'.$value->id.'" AND status = "Active" ');
												if($subcategory_info!='')
												{
													foreach($subcategory_info as $key => $val)
													{
													?>
													<ul>
														<li><a href="desctiption?id=<?php echo $val->id;?>" style="color: #FFF;"><?php echo $val->category_name;?></a></li>
													</ul>
													<?php
													}
												}
											?>
										</div>
										<?php
									}
								}
							?>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
				<!--menu center-->
				<!-- Top Menu -->
				<div class="collapse navbar-collapse justify-content-end" id="navbarHeader">
					<ul class="navbar-nav ml-auto">
						<li><a class="nav-link active" href="memberarea">My Account</a></li>
						<li><a class="nav-link" href="#">Help</a></li>
						<li><a class="nav-link" href="logout">Logout</a></li>
					</ul>
				</div>
				<!-- / -->
			</nav>
			<!-- Navbar -->     
		</div>
	</header>
	<!-- Header End -->  
	<!-- Main Start -->
	<main>
		<!-- Home Banner -->
		<section class="home-banner-02 theme-after-bg theme-bg">		
			<div class="container">
				<div class="row p-100px-tb custom-padding pb-0 custom-heading-bottom">
					<div class="col-md-12">
						<div class="home-left">
							<h1 class="font-alt">Are you an MCAT expert?</h1>
							<!-- <p style="width: 100%;">Danquahprep is looking for question writers for our new MCAT QBank</p> -->
						</div>
					</div>
				</div>
			</div>
			<!-- container -->
		</section>
		<!-- / -->
		<!-- Features -->
		<section id="" class="feature-section section p-50px-t">
			<div class="container">
				<div class="tab-style-1">
					<ul class="nav nav-fill" id="myTab" role="tablist">
					<li class="nav-item">
							<a class="<?php if($_REQUEST['cid'] == ''){ echo 'active';}?>" id="profile-tab" data-toggle="tab" href="#profilea" role="tab" aria-controls="profilea" aria-selected="true">Profile</a>
						</li>
						<li class="nav-item">
							<a class="<?php if($_REQUEST['cid'] != ''){ echo 'active';}?>" id="home-tab" data-toggle="tab" href="#homea" role="tab" aria-controls="homea" aria-selected="false">Subscriptions</a>
						</li>						
						<li class="nav-item">
							<a id="billing-tab" data-toggle="tab" href="#Billing" role="tab" aria-controls="profilea" aria-selected="false">Billing</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane p-40px-t sm-p-40px-t fade <?php if($_REQUEST['cid'] != ''){ echo 'show active';}?>" id="homea" role="tabpanel" aria-labelledby="home-tab">
							<?php
								$subscription_info = get_table_data('tbl_subscribe_package', 'id!="" AND student_id = "'.$_SESSION['student_login'].'" GROUP BY category_id');
								if($subscription_info!='')
								{
									?>
									<div class="text-center">
										<h2>User Subscriptions</h2>
									</div>
									<?php
									foreach($subscription_info as $key => $value)
									{
										?>
										<!--user-->
										<h4><?php echo $functions->get_category_name($value->category_id);?> Qbank</h4>
										<?php 
											//$package_info = get_table_data('tbl_subscribe_package', 'id!="" AND category_id = "'.$value->category_id.'" AND expiry_date >= "'.date('Y-m-d').'" AND subscription_status = "Active" ');
											$package_info = get_table_data('tbl_subscribe_package', 'id!="" AND category_id = "'.$value->category_id.'" AND expiry_date >= "'.date('Y-m-d').'" ');
											if($package_info!='')
											{
												foreach($package_info as $key => $val)
												{
													?>
													<div class="alert alert-info" style="box-shadow: 0px 0px 15px rgba(0,0,0,0.1);">
														<div class="row">
															<div class="col-md-8 pull-left">
																<h5><?php echo $functions->get_package_info($val->package_id);?> Package </h5>
																<p class="m-0px"><span style="color: #0C9CCE;">Start Date:</span> <?php echo date('M d, Y', strtotime($val->subscription_date));?> </p>
																<p class="m-0px"><span style="color: #0C9CCE;">Expire Date:</span> <?php echo date('M d, Y', strtotime($val->expiry_date));?> </p>
															</div>


															<div class="col-md-4">

																<?php if($val->subscription_status == 'Expired'){ ?>
																	<p class="m-0px" style="color: red; margin-top: 20px; font-size: x-large;"> Cancelled </p> 
																<?php }else{ ?> 
																	<p class="m-0px"> <a href="javascript:;" style="color: white; margin-top: 20px; " class="btn btn-danger" onclick="cancel_subscription('<?php echo $val->id; ?>')" >Cancel Subscription</a> 
																
																<?php } ?>
															
															</div>

															<!--col md 6-->
														</div>
													</div>
													<?php
												}
											}
										?>										
										<?php
									}
									
								}
								else
								{
									?>
									<div class="alert alert-info">
										<strong>Currently</strong> you are not subscribed to any membership.
										<a href="purchase">Purchase Packages</a>
									</div>
									<?php
								}
							?>							
						</div>



<script>

function cancel_subscription(id){
	
	if(confirm("Cancel subscription! Are you sure?")){
		
		var serializedData = "id="+id+"&submit=cancel_subscription",

		//Fire off the request to /form.php
		request = $.ajax({
			url: "include/post_func.php",
			type: "post",
			dataType: "text",
			data: serializedData
		});
		request.done(function (response, textStatus, jqXHR)
		{
			//alert(response);
			window.location = 'memberarea';
		});

	}
}

</script>


						<!---->
						<?php
							$student_info = get_table_data('tbl_users', 'id="'.$_SESSION['student_login'].'" ');
							if($student_info!='')
							{
								foreach($student_info as $key => $value)
								{
									$username = $value->username;
									$firstname = $value->firstname;
									$lastname = $value->lastname;
									$primaryaddress = $value->primaryaddress;
									$secondaryaddress = $value->secondaryaddress;
									$city = $value->city;
									$country = $value->country;
									$state = $value->state;
									$zipcode = $value->zipcode;
									$phone = $value->phone;
									$usertype = $value->usertype;
								}
								
							}
						?>
						<div class="tab-pane p-40px-t sm-p-40px-t fade <?php if($_REQUEST['cid'] == ''){ echo 'show active';}?>" id="profilea" role="tabpanel" aria-labelledby="profile-tab">
							<div class="col-md-12">
								<section class="register-account"> 
									<div class="signform">      
										<div class="right" style="width: 100%;">
											<div class="form">
												<div class="row">
													<div class="col-md-6 pull-left">
														<div class="headit">
															<h4>User Information</h4>
														</div>
														<form class="login-form" id="l">
															<div class="row">
																<div class="col-md-6 pull-left">
																	<input name="firstName" type="text" class="form-field" value="<?php echo $firstname;?>" placeholder="First Name" required />
																</div>
																<div class="col-md-6 pull-left">
																	<input name="lastName" type="text" class="form-field" value="<?php echo $lastname;?>" placeholder="Last Name" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<input name="primaryAddress" type="text" class="form-field" value="<?php echo $primaryaddress;?>" placeholder="Address (House Number & Street Name)" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-6 pull-left">
																	<input name="secondaryAddress" type="text" class="form-field" value="<?php echo $secondaryaddress;?>" placeholder="Address2" />
																</div>
																<div class="col-md-6 pull-left">
																	<input name="city" type="text" class="form-field" value="<?php echo $city;?>" placeholder="City" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-6 pull-left">
																	<select name="country" class="form-control" required />
																		<option value="">Select Country</option>
																		<?php
																			$country_info = '';
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
																<div class="col-md-6 pull-left">
																	<input name="state" type="text" class="form-field" placeholder="State" value="<?php echo $state;?>" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-6 pull-left">
																	<input name="zipCode" type="text" class="form-field" value="<?php echo $zipcode;?>" placeholder="Zip" required />
																</div>
																<div class="col-md-6 pull-left">
																	<input name="phoneNo" type="text" class="form-field mob_no" placeholder="Phone" value="<?php echo $phone;?>" data-mask="999-999-9999" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<input name="userEmail" type="text" class="form-field" placeholder="Email ID (Username)" value="<?php echo $username;?>" required />
																</div>
															</div>
															<?php
																$usertype_info = get_table_data('tbl_usertype', 'id!="" AND status = "Active" ');
																if($usertype_info!='')
																{
																	foreach($usertype_info as $key => $value)
																	{
																		?>
																		<div class="form-check form-check-inline">
																			<input name="userType" class="form-check-input" type="radio" id="inlineCheckbox<?php echo $value->id?>" <?php if($value->id == $usertype){ echo "checked"; }?> value="<?php echo $value->id?>" required />
																			<label class="form-check-label" for="inlineCheckbox<?php echo $value->id?>"><?php echo $value->usertype?></label>
																		</div>
																		<?php
																	}
																}
															?>
															<div class="row">
																<div id="display_country" class="col-md-12 pull-left">
																</div>
															</div>
															<button type="submit" id="profile-update" class="subbt" style="border:none;" >Update</button>   
														</form>
													</div>
													<!--col md 6-->
													<div class="col-md-6 pull-right">
														<div class="headit">
															<h4>Change Password</h4>
														</div>
														<form class="login-form" id="r">
															<div class="row">
																<div class="col-md-12">
																	<input name="oldPassword" type="password" class="form-field" placeholder="Current or Temporary Password"/>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<input name="newPassword" id="newPassword" type="password" class="form-field" placeholder="New Password (minimum 8 characters)"/>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<input name="confirmPassword" id="confirmPassword" type="password" class="form-field" placeholder="Confirm Password"/>
																</div>
															</div>
															<p style="font-size: 12px;">• Password cannot be same as Username <br /> • Should not contain space, or symbols</p>
															<button type="submit" id="password-update" class="subbt" style="border:none;" >Update</button>   
															<div class="clearfix"></div><br />
														</form>
														<form class="login-form" id="m">
															<div class="headit">
																<h4>Security Questions</h4>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<select name="securityQustion1" id="securityQustion1" class="form-control" required />
																		<option value="">Select Qestion 1</option>	
																		<option value="1">What is your mother's maiden name?</option>
																		<option value="2">What was the make of your first car?</option>
																		<option value="3">What is your father's middle name</option>
																		<option value="4">In what city were you born?</option>
																	</select>
																</div>
																<div class="col-md-12">
																	<input name="securityAnswer1" id="securityAnswer1" type="text" class="form-field" placeholder="Answer 1" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<select name="securityQustion2" id="securityQustion2" class="form-control" required />
																		<option value="">Select Qestion 2</option>	
																		<option value="1">In what city did you meet your spouse/significant other?</option>
																		<option value="2">What is the name of the first company you worked for?</option>
																		<option value="3">What is your maternal grandmother's first name?</option>
																		<option value="4">What is your maternal grandfather's first name?</option>
																	</select>
																</div>
																<div class="col-md-12">
																	<input name="securityAnswer2" id="securityAnswer2" type="text" class="form-field" placeholder="Answer 2" required />
																</div>
															</div>
															<button type="submit" id="answer-update" class="subbt" style="border:none;" >Update</button>   
														</form>
													</div>
													<!--col md 6-->
													<div class="clearfix"></div>
												</div>
											</div>
										</div>       
									</div>
								</section>
							</div>
						</div>
						<?php
							$billing_info = get_table_data('tbl_billing_info', 'user_id="'.$_SESSION['student_login'].'" ');
							if($billing_info!='')
							{
								foreach($billing_info as $key => $val)
								{
									$first_name = $val->first_name;
									$last_name = $val->last_name;
									$address1 = $val->address1;
									$address2 = $val->addres2;
									$city = $val->city;
									$bCountry = $val->county;
									$state = $val->state;
									$zip_code = $val->zip_code;
									$phone_no = $val->phone_no;
								}
								
							}
						?>
						<div class="tab-pane p-40px-t sm-p-40px-t fade" id="Billing" role="tabpanel" aria-labelledby="contact-tab">
							<div class="col-md-12">
								<section class="register-account"> 
									<div class="signform">      
										<div class="right" style="width: 100%;">
											<div class="form">
												<div class="row">
													<div class="col-md-5 pull-left">
														<div class="headit">
															<h4>Billing Information</h4>
														</div>
														<form class="login-form" id="b" >
															<div class="row">
																<div class="col-md-6 pull-left">
																	<input name="bfName" type="text" class="form-field" value="<?php echo $first_name;?>" placeholder="First Name" required />
																</div>
																<div class="col-md-6 pull-left">
																	<input name="blName" type="text" class="form-field" value="<?php echo $last_name;?>" placeholder="Last Name" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<input name="bAddress1" type="text" class="form-field" value="<?php echo $address1;?>" placeholder="Address (House Number & Street Name)" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-6 pull-left">
																	<input name="bAddress2" type="text" class="form-field" value="<?php echo $address2;?>"  placeholder="Address 2" />
																</div>
																<div class="col-md-6 pull-left">
																	<input name="bCity" type="text" class="form-field" value="<?php echo $city;?>" placeholder="City" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-6 pull-left">
																	<select name="bCountry" class="form-control" required />
																		<option value="">Select Country</option>
																		<?php
																			$country_info = get_table_data('tbl_countries', 'id!="" ');
																			if($country_info!='')
																			{
																				foreach($country_info as $key => $value)
																				{
																					?>
																					<option <?php if($value->id == $bCountry){ echo "selected"; } ?> value="<?php echo $value->id;?>" ><?php echo $value->name;?></option>
																					<?php
																				}
																			}
																		?>
																	</select>
																</div>
																<div class="col-md-6 pull-left">
																	<input name="bState" type="text" class="form-field" placeholder="State" value="<?php echo $state;?>" required />
																</div>
															</div>
															<div class="row">
																<div class="col-md-6 pull-left">
																	<input name="bZipcode" type="text" class="form-field" value="<?php echo $zip_code;?>" placeholder="Zip Code" required />
																</div>
																<div class="col-md-6 pull-left">
																	<input name="bPhoneno" type="text" class="form-field mob_no" placeholder="Phone" value="<?php echo $phone_no;?>" data-mask="999-999-9999" required />
																</div>
															</div>
															<button type="submit" id="billing-info-update" class="subbt" style="border:none;" >Update</button>   
														</form>
													</div>
													<!--col md 6-->
													<div class="col-md-7 pull-right">
														<div class="headit">
															<h4>Payments / Credit</h4>
														</div>														
														<?php
															$payment_info = get_table_data('tbl_payments', 'id!="" AND student_id = "'.$_SESSION['student_login'].'" ORDER BY id DESC LIMIT 0, 5');
															if($payment_info!='')
															{
																?>
																<div class="table-response">
																	<table class="table">
																		<thead>
																			<tr class="table-primary">
																				<th>#</th>
																				<th>Txn Date</th>
																				<th>Txn Id</th>
																				<th>Package</th>
																				<th>Amount</th>
																			</tr>
																		</thead>
																		<tbody>
																		<?php
																			foreach($payment_info as $key => $value)
																			{
																				$package_id = $functions->get_package_id($value->txn_id);
																				$durations = $functions->get_package_info($package_id);
																				
																				
																				$sr++;
																				?>
																				<tr>
																					<td scope="row"><?php echo $sr;?></td>
																					<td><?php echo date('d-m-Y', strtotime($value->created_date));?></td>
																					<td><?php echo $value->txn_id;?></td>
																					<td><?php echo $durations;?></td>
																					<td>$ <?php echo number_format($value->paid_amount, 2);?></td>
																				</tr>
																				<?php
																			}
																		?>
																		</tbody>
																	</table>
																</div>
																<?php
															}
															else
															{
																?>
																<div class="alert alert-warning">
																	There are no payments.
																</div>
																<?php
															}
														?>
														
														
														
														
													</div>
													<!--col md 6-->
													<div class="clearfix"></div>
												</div>
											</div>
										</div>      
									</div>
								</section>
							</div>
						</div>
					</div>
					<!-- Tab Content -->
				</div>
				<!-- Tab style -->   
			</div>
			<!--container-->
		</section>
		<!-- / -->
	</main>
	<!-- Main End -->
	<!-- Footer -->
	<?php include('footer.php');?>
	<!-- / -->
	<!-- jQuery -->
	<script src="static/js/jquery-3.2.1.min.js"></script>
	<script src="static/js/jquery-migrate-3.0.0.min.js"></script>
	<!-- Plugins -->
	<script src="static/plugin/bootstrap/js/popper.min.js"></script>
	<script src="static/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="static/plugin/owl-carousel/js/owl.carousel.min.js"></script>
	<!-- Masking js -->
	<script src="admin/files/assets/pages/form-masking/inputmask.js"></script>
	<script src="admin/files/assets/pages/form-masking/jquery.inputmask.js"></script>
	<script src="admin/files/assets/pages/form-masking/autoNumeric.js"></script>
	<script src="admin/files/assets/pages/form-masking/form-mask.js"></script>
	<!-- custom -->
	<script src="static/js/custom.js"></script>
	<script type="text/javascript" src="admin/files/assets/js/jquery-confirm.js"></script>
	<script type='text/javascript'>
		$(document).ready(function(){
			$("#inlineCheckbox1").click(function(){
				//Fire off the request to /form.php
				request = $.ajax({
					url: "include/post_func.php",
					type: "post",
					dataType: "json",
					data: "submit=getcountry"	
				}).done(function(response)
				{
					if(response.code==1)
					{
						$('#display_country').show();
						$('#display_country').html(response.message);
					}
				}).responseText;
			});
			
			$("#inlineCheckbox2").click(function(){
				//Fire off the request to /form.php
				request = $.ajax({
					url: "include/post_func.php",
					type: "post",
					dataType: "json",
					data: "submit=getstate"	
				}).done(function(response)
				{
					if(response.code==1)
					{
						$('#display_country').show();
						$('#display_country').html(response.message);
					}
				}).responseText;
			});
			
			$("#inlineCheckbox3").click(function(){
				//Fire off the request to /form.php
				request = $.ajax({
					url: "include/post_func.php",
					type: "post",
					dataType: "json",
					data: "submit=getstate"	
				}).done(function(response)
				{
					if(response.code==1)
					{
						$('#display_country').show();
						$('#display_country').html(response.message);
					}
				}).responseText;
			});
			
			$("#inlineCheckbox4").click(function(){
				$('#display_country').hide();
			});
			
		});
	</script>
	<script>	
	//*************FOR PROFILE UPDATE
	$('#profile-update').unbind().click(function()
	{
		$( "#l" ).unbind().on("submit",function( event )
		{
			var profileForm = $('#l').serialize();
			$.confirm({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				content: function (){
					var self = this;
					return $.ajax({
						url: "include/post_func.php",
						dataType: 'json',
						data:profileForm+ "&id="+<?php echo $_SESSION['student_login'];?>+"&submit=ProfileUpdate",
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
								icon: 'fa fa-success',
								closeIcon: true,
								content: response.message,
								type: 'green',
								autoClose: 'close|10000',
								typeAnimated: true,
								buttons:{
									close: function (){
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
					close: function ()
					{
					}
				}
			});
			return false;
			
			
			
		});
	});
	
	
	$('#password-update').unbind().click(function()
	{
		$( "#r" ).unbind().on("submit",function( event )
		{
			var newPassword = $('#newPassword').val();
			var confirmPassword = $('#confirmPassword').val();
			
			if(newPassword == confirmPassword)
			{
				var passwordForm = $('#r').serialize();
				$.confirm({
					icon: 'fa fa-spinner fa-spin',
					title: 'Working!',
					content: function (){
						var self = this;
						return $.ajax({
							url: "include/post_func.php",
							dataType: 'json',
							data:passwordForm+ "&id="+<?php echo $_SESSION['student_login'];?>+"&submit=PasswordUpdate",
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
									icon: 'fa fa-success',
									closeIcon: true,
									content: response.message,
									type: 'green',
									autoClose: 'close|10000',
									typeAnimated: true,
									buttons:{
										close: function (){
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
						close: function ()
						{
						}
					}
				});
				return false;
			}
			else
			{
				$.confirm({
					title: 'Error!',
					icon: 'fa fa-warning',
					closeIcon: true,
					content: 'password does not match with password confirmation.',
					type: 'red',
					autoClose: 'close|10000',
					typeAnimated: true,
					buttons:{
						close: function (){
						}
					}
				});
			}
		});
	});
	
	$('#answer-update').unbind().click(function()
	{
		$( "#m" ).unbind().on("submit",function( event )
		{
			var answerForm = $('#m').serialize();
			$.confirm({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				content: function (){
					var self = this;
					return $.ajax({
						url: "include/post_func.php",
						dataType: 'json',
						data:answerForm+ "&id="+<?php echo $_SESSION['student_login'];?>+"&submit=AnswerUpdate",
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
								icon: 'fa fa-success',
								closeIcon: true,
								content: response.message,
								type: 'green',
								autoClose: 'close|10000',
								typeAnimated: true,
								buttons:{
									close: function (){
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
					close: function ()
					{
					}
				}
			});
			return false;
		});
	});
	
	$('#billing-info-update').unbind().click(function()
	{
		$( "#b" ).unbind().on("submit",function( event )
		{
			var billingForm = $('#b').serialize();
			$.confirm({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				content: function (){
					var self = this;
					return $.ajax({
						url: "include/post_func.php",
						dataType: 'json',
						data:billingForm+ "&id="+<?php echo $_SESSION['student_login'];?>+"&submit=BillingUpdate",
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
								icon: 'fa fa-success',
								closeIcon: true,
								content: response.message,
								type: 'green',
								autoClose: 'close|10000',
								typeAnimated: true,
								buttons:{
									close: function (){
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
					close: function ()
					{
					}
				}
			});
			return false;
		});
	});
	</script>
	<script>
		var theToggle = document.getElementById('toggle');
		// hasClass
		function hasClass(elem, className) {
			return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
		}
		// toggleClass
		function toggleClass(elem, className) {
			var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';
			if (hasClass(elem, className)) {
				while (newClass.indexOf(" " + className + " ") >= 0 ) {
					newClass = newClass.replace( " " + className + " " , " " );
				}
				elem.className = newClass.replace(/^\s+|\s+$/g, '');
			} else {
				elem.className += ' ' + className;
			}
		}
		theToggle.onclick = function() {
			toggleClass(this, 'on');
			return false;
		}
	</script>
</body>
<!-- Body End -->
</html>