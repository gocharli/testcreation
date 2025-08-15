<?php 
	include('include/connection.php');

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
		<section class="home-banner-02 theme-bg">		
			<div class="container">
				<div class="row p-90px-tb pb-0">
					<div class="col-md-12">
					</div>
				</div>
			</div>
			<!-- container -->
		</section>
		<!-- / -->
		<!-- Features -->
		<section id="" class="feature-section p-0 section">
			<div class="subnav">			
				<div class="container">
					<ul>
						<li><a href="javascript:;">Select</a></li>
						<li><a href="javascript:;">Cart</a></li>
						<li><a href="javascript:;" class="active">Billing</a></li>
						<li><a href="javascript:;">Review</a></li>
						<li><a href="javascript:;">Confirm</a></li>
					</ul>
				</div>
				<!--container-->
			</div>
			<!--sub nav-->
			<?php
				$student_info = get_table_data('tbl_users', 'id="'.$_SESSION['student_login'].'" ');
				if($student_info!='')
				{
					foreach($student_info as $key => $value)
					{
						$firstname = $value->firstname;
						$lastname = $value->lastname;
						$primaryaddress = $value->primaryaddress;
						$secondaryaddress = $value->secondaryaddress;
						$city = $value->city;
						$country = $value->country;
						$state = $value->state;
						$zipcode = $value->zipcode;
						$phone = $value->phone;
					}	
				}
			?>
			<div class="container p-50px-tb">		
				<div class="row">
					<div class="col-md-6 pull-left">
						<h4>Profile Info</h4>
						<form class="login-form" id="l" action="javascript:;" method="post">
							<div class="row">
								<div class="col-md-6 pull-left">
									<input name="pfName" id="pfName" type="text" class="form-field" value="<?php echo $firstname;?>" placeholder="First Name" required />
								</div>
								<div class="col-md-6 pull-left">
									<input name="plName" id="plName" type="text" class="form-field" value="<?php echo $lastname;?>" placeholder="Last Name" required />
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input name="ppAddress" id="ppAddress" type="text" class="form-field" value="<?php echo $primaryaddress;?>" placeholder="Address (House Number & Street Name)" required />
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pull-left">
									<input name="psAddress" id="psAddress" type="text" class="form-field" value="<?php echo $secondaryaddress;?>" placeholder="Address2" />
								</div>
								<div class="col-md-6 pull-left">
									<input name="pCity" type="text" id="pCity" class="form-field" value="<?php echo $city;?>" placeholder="City" required />
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pull-left">
									<select name="pCountry" id="pCountry" class="form-control" required />
										<option value="">Select Country</option>
										<?php
											$country_info = get_table_data('tbl_countries', 'id!="" ');
											if($country_info!='')
											{
												foreach($country_info as $key => $value)
												{
													?>
													<option <?php if($country == $value->id) { echo "selected" ;} ?> value="<?php echo $value->id;?>" ><?php echo $value->name;?></option>
													<?php
												}
											}
										?>
									</select>
								</div>
								<div class="col-md-6 pull-left">
									<input name="pState" id="pState" type="text" class="form-field" placeholder="State" value="<?php echo $state;?>" required />
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pull-left">
									<input name="pZipcode" id="pZipcode" type="text" class="form-field" value="<?php echo $zipcode;?>" placeholder="Zip" required />
								</div>
								<div class="col-md-6 pull-left">
									<input name="pPhoneno" id="pPhoneno" type="text" class="form-field mob_no" placeholder="Phone" value="<?php echo $phone;?>" data-mask="999-999-9999" required />
								</div>
							</div>
							<?php
								$category_info = get_table_data('tbl_category', 'id!="" AND parent_id = "0" AND status = "Active" ');
								if($category_info!='')
								{
									foreach($category_info as $key => $val)
									{
										?>
										<div class="form-check form-check-inline">
											<label class="control control--radio"><?php echo $val->category_name?>
												<input name="userType" type="radio" id="inlineCheckbox<?php echo $val->id?>" <?php if($key == 0) { echo "checked"; } ?> value="<?php echo $val->id?>" required />
												<div class="control__indicator"></div>
											</label>
										</div>
										<?php
									}
								}
							?>
							<div class="row">
								<div id="display_country" class="col-md-12 pull-left">
								</div>
							</div>
						</form>
					</div>
					<!--col-->
					<div class="col-md-6 pull-left">
						<h4 style="display: inline;">Billing Info </h4>
						<span class="float-right">
							<label class="control control--checkbox">Use Profile Info
								<input type="checkbox" name="check1" onchange="copyTextValue(this);" />
								<div class="control__indicator"></div>
							</label>
						</span>
						<div class="signform">      
							<div class="right" style="width: 100%; border-radius: 10px; padding: 20px;">
								<div class="form">
									<div class="row">
										<div class="col-md-12 float-right text-center">
											<form class="login-form" id="b" action="javascript:;" method="post">
												<div class="row">
													<div class="col-md-6 pull-left">
														<input name="bfName" id="bfName" type="text" class="form-field" value="" placeholder="First Name" required />
													</div>
													<div class="col-md-6 pull-left">
														<input name="blName" id="blName" type="text" class="form-field" value="" placeholder="Last Name" required />
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<input name="bpAddress" id="bpAddress" type="text" class="form-field" value="" placeholder="Address (House Number & Street Name)" required />
													</div>
												</div>
												<div class="row">
													<div class="col-md-6 pull-left">
														<input name="bsAddress" id="bsAddress" type="text" class="form-field" value="" placeholder="Address2" />
													</div>
													<div class="col-md-6 pull-left">
														<input name="bCity" type="text" id="bCity" class="form-field" value="" placeholder="City" required />
													</div>
												</div>
												<div class="row">
													<div class="col-md-6 pull-left">
														<select name="bCountry" id="bCountry" class="form-control" required />
															<option value="">Select Country</option>
															<?php
																$country_info = get_table_data('tbl_countries', 'id!="" ');
																if($country_info!='')
																{
																	foreach($country_info as $key => $value)
																	{
																		?>
																		<option value="<?php echo $value->id;?>" ><?php echo $value->name;?></option>
																		<?php
																	}
																}
															?>
														</select>
													</div>
													<div class="col-md-6 pull-left">
														<input name="bState" id="bState" type="text" class="form-field" placeholder="State" value="" required />
													</div>
												</div>
												<div class="row">
													<div class="col-md-6 pull-left">
														<input name="bZipcode" id="bZipcode" type="text" class="form-field" value="" placeholder="Zip" required />
													</div>
													<div class="col-md-6 pull-left">
														<input name="bPhoneno" id="bPhoneno" type="text" class="form-field mob_no" placeholder="Phone" value="" data-mask="999-999-9999" required />
													</div>
												</div>
												<span class="float-right">
													<button type="submit" id="profile-update" class="subbt" style="border:none;" >Next: Payment Info</button>   
												</span>
											</form>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>       
						</div>
					</div>
					<!--col-->
				</div>
				<!--row-->
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
	<script>
		function copyTextValue(bf)
		{
			if($(bf).prop('checked') == true)
			{
				var pfName = $("#pfName").val();
				$("#bfName").val(pfName);
				var plName = $("#plName").val();
				$("#blName").val(plName);
				
				var ppAddress = $("#ppAddress").val();
				$("#bpAddress").val(ppAddress);
				var psAddress = $("#psAddress").val();
				$("#bsAddress").val(psAddress);
				
				var pCity = $("#pCity").val();
				$("#bCity").val(pCity);
				var pCountry = $("#pCountry").val();
				$("#bCountry").val(pCountry);
				
				var pState = $("#pState").val();
				$("#bState").val(pState);
				var pZipcode = $("#pZipcode").val();
				$("#bZipcode").val(pZipcode);
				
				var pPhoneno = $("#pPhoneno").val();
				$("#bPhoneno").val(pPhoneno);		
			}
			else
			{
				$('#b')[0].reset();
			}
		}
	</script>
	<script type='text/javascript'>
		$(document).ready(function()
		{
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
			
			$("#inlineCheckbox1").click(function(){
				$('#display_country').hide();
			});
		});
		
		
		//*************FOR UPDATE PROFILE AND BILLING INFO
		$('#profile-update').unbind().click(function()
		{
			var profileFrom = $('#l').serialize();
			var billingFrom = $('#b').serialize();
			
			$.confirm({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				content: function (){
					var self = this;
					return $.ajax({
						url: "include/post_func.php",
						dataType: 'json',
						data:profileFrom+"&"+billingFrom+"&submit=ProfileBilling",
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
											window.location = 'review?cid=<?php echo $_REQUEST['cid'];?>';
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
		});	
	</script>
</body>
<!-- Body End -->
</html>