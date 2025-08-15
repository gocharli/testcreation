<?php 
	include('include/connection.php');
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
		<div class="container">
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
				<!-- Top Menu -->
				<div class="collapse navbar-collapse justify-content-end" id="navbarHeader">
					<ul class="navbar-nav ml-auto">
						<li><a class="nav-link active" href="login">My Account</a></li>
						<li><a class="nav-link" href="#">Help</a></li>
						<!--<li><a class="nav-link-btn m-btn-white" href="#"><i class="fa fa-cart-plus"></i> BUY</a></li>-->
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
		<section class="home-banner-02 inner-page-header theme-bg">		
			<div class="container">
				<div class="row pb-0">
					<div class="col-md-12">
						<div class="home-left">
							<h1 class="font-alt">Register</h1>
						</div>
					 </div>
				</div>
			</div>
			<!-- container -->
		</section>
		<!-- / -->
		<!-- Features -->
		<section id="services" class="feature-section section p-50px-t grey-bg">
			<div class="container">
				<div class="col-md-10 offset-1">
					<section class="register-account"> 
						<div class="signform">   
							<div class="right" style="width: 100%;">
								<div class="headit">
									<h4>Login Information</h4>
								</div>
								<div class="form">
									<form id="l" action="javascript:;" method="post" class="login-form" >
										<div class="row">
											<div class="col-md-6 pull-left">
												<input name="userEmail" id="userEmail" type="text" class="form-field" placeholder="Email (Username)" onblur="check_user();" required />
											</div>											
											<div class="col-md-6 pull-left">
												<input name="confirmEmail" id="confirmEmail" type="text" class="form-field" placeholder="Confirm Email (Username)" required />
											</div>
										</div>
										<span id="user_availability"></span>
										<div class="row">
											<div class="col-md-6 pull-left">
												<input name="userPassword" id="userPassword" type="password" class="form-field" placeholder="Password" required />
											</div>
											<div class="col-md-6 pull-left">
												<input name="confirmPassword" id="confirmPassword" type="password" class="form-field" placeholder="Confirm Password" required />
											</div>
											<div class="col-md-6 pull-left">
												<label>
													<input type="checkbox" id="remember" name="remember">
													<span style="color:#666;font-size: 0.9em;"> Show Password</span>
												</label>
											</div>
										</div>
										<br />
										<div class="headit">
											<h4>Personal Information</h4>
										</div>
										<div class="row">
											<div class="col-md-6 pull-left">
												<input name="firstName" id="firstName" type="text" class="form-field" placeholder="First Name" required />
											</div>
											<div class="col-md-6 pull-left">
												<input name="lastName" id="lastName" type="text" class="form-field" placeholder="Last Name" required />
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input name="primaryAddress" id="primaryAddress" type="text" class="form-field" placeholder="Address 1 (House Number & Street Name)" required />
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 pull-left">
												<input name="secondaryAddress" id="secondaryAddress" type="text" class="form-field" placeholder="Address 2 (Landmark/Community/Colony)" />
											</div>
											<div class="col-md-6 pull-left">
												<input name="city" id="city" type="text" class="form-field" placeholder="City" required />
											</div>											
										</div>
										<div class="row">
											<div class="col-md-6 pull-left">
												<select name="country" class="form-control" required >
													<option value="">Select Country</option>
													<?php
														$country_info = get_table_data('tbl_countries', 'id!="" ');
														if($country_info!='')
														{
															foreach($country_info as $key => $value)
															{
																?>
																<option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
																<?php
															}
														}
													?>
												</select>
											</div>
											<div class="col-md-6 pull-left">
												<input name="state" id="state" type="text" class="form-field" placeholder="State" required />
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 pull-left">
												<input name="zipCode" id="zipCode" type="text" class="form-field" placeholder="Zip" required />
											</div>
											<div class="col-md-6 pull-left">
												<input name="phoneNo" id="phoneNo" type="text" class="form-field mob_no" placeholder="Phone" data-mask="999-999-999" required />
											</div>
										</div>
										<br />
										<div class="headit">
											<h4>User Type</h4>
										</div>
										<?php
											$usertype_info = get_table_data('tbl_usertype', 'id!="" AND status = "Active" ');
											if($usertype_info!='')
											{
												foreach($usertype_info as $key => $value)
												{
													?>
													<div class="form-check form-check-inline">
														<input name="userType" class="form-check-input" type="radio" id="inlineCheckbox<?php echo $value->id?>" value="<?php echo $value->id?>" required />
														<label class="form-check-label" for="inlineCheckbox<?php echo $value->id?>"><?php echo $value->usertype?></label>
													</div>
													<?php
												}
											}
											?>
											
											<?php
										?>										
										<div class="row">
											<div id="display_country" class="col-md-12 pull-left"></div>
										</div>
										<div class="clearfix"></div>
										<br />
										<div class="headit">
											<h4>Security Questions</h4>
										</div>
										<div class="row">
											<div class="col-md-12 pull-left">
												<select name="securityQustion1" id="securityQustion1" class="form-control" required />
													<option value="">Select Qestion 1</option>	
													<option value="1">What is your mother's maiden name?</option>
													<option value="2">What was the make of your first car?</option>
													<option value="3">What is your father's middle name</option>
													<option value="4">In what city were you born?</option>
												</select>
											</div>
											<div class="col-md-12 pull-left">
												<input name="securityAnswer1" id="securityAnswer1" type="text" class="form-field" placeholder="Answer" required />
											</div>
										</div>									
										<div class="row">
											<div class="col-md-12 pull-left">
												<select name="securityQustion2" id="securityQustion2" class="form-control" required />
													<option value="">Select Qestion 2</option>	
													<option value="1">In what city did you meet your spouse/significant other?</option>
													<option value="2">What is the name of the first company you worked for?</option>
													<option value="3">What is your maternal grandmother's first name?</option>
													<option value="4">What is your maternal grandfather's first name?</option>
												</select>
											</div>
											<div class="col-md-12 pull-left">
												<input name="securityAnswer2" id="securityAnswer2" type="text" class="form-field" placeholder="Answer" required />
											</div>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option1" required>
											<label class="form-check-label" for="inlineCheckbox5"> I am over 13 years of age, and I agree to the terms and conditions.</label>
										</div>
										<button type="submit" class="subbt" style="border:none;">Register</button> 
									</form>
								</div>
							</div>       
						</div>
					</section>
				</div>
			</div>
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
			$('#remember').click(function(){
				$(this).is(':checked') ? $('#userPassword').attr('type', 'text') : $('#userPassword').attr('type', 'password');
				$(this).is(':checked') ? $('#confirmPassword').attr('type', 'text') : $('#confirmPassword').attr('type', 'password');
			});
			
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
		function check_user()
		{
			var emailId = $("#userEmail").val();
			$.ajax({
				url: "include/post_func.php",
				dataType: 'json',
				data:"emailId="+emailId+"&submit=CheckUser",
				method: 'post'
			}).done(function (response){
				if(response.code==0)
				{
					$("#user_availability").css({"color": "red", "font-size": "16px"});
					$("#user_availability").html(response.message);
				}
				else if(response.code==1)
				{
					$("#user_availability").css({"color": "green", "font-size": "16px"});
					$("#user_availability").html(response.message);
				}
			});
		};
	</script>
	<script>
	jQuery(document).ready(function()
	{
		//*************FOR SIGN UP
		$( "#l" ).on("submit",function( event )
		{	
			
			var userEmail = $('#userEmail').val();
			var confirmEmail = $('#confirmEmail').val();
			
			var userPassword = $('#userPassword').val();
			var confirmPassword = $('#confirmPassword').val();
			
			if(userEmail == confirmEmail)
			{
				if(userPassword == confirmPassword)
				{
					var frm = $(this);
					$.confirm({
						icon: 'fa fa-spinner fa-spin',
						title: 'Working!',
						content: function (){
							var self = this;
							return $.ajax({
								url: "include/post_func.php",
								dataType: 'json',
								data:frm.serialize()+ "&submit=Register",
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
													window.location = 'registeration_continue';
												}
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
			}
			else
			{
				$.confirm({
					title: 'Error!',
					icon: 'fa fa-warning',
					closeIcon: true,
					content: 'email does not match with email confirmation.',
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
	</script>
</body>
<!-- Body End -->
</html>