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
						<li><a href="javascript:;">Billing</a></li>
						<li><a href="javascript:;" class="active">Review</a></li>	
						<li><a href="javascript:;">Confirm</a></li>
					</ul>	
				</div>		
				<!--container-->	
			</div>	
			<!--sub nav-->
			
			<div class="container p-50px-tb">	
				<div class="row">		
					<div class="col-md-8 pull-left">
						<h4>REVIEW</h4>	
						<?php
							//************** PROFILE INFO
							$student_info = get_table_data('tbl_users', 'id="'.$_SESSION['student_login'].'" ');
							if($student_info!='')
							{
								foreach($student_info as $key => $value)
								{
									$userid = $value->id;
									$firstname = $value->firstname;
									$lastname = $value->lastname;
									$primaryaddress = $value->primaryaddress;
									$city = $value->city;
									$country = $value->country;
									$state = $value->state;
									$zipcode = $value->zipcode;
									$phone = $value->phone;
								}	
							}
						?>
						<div class="col-md-6 float-left">
							<div class="package-listing m-50px-t">			
								<h5>Profile Address</h5>	
								<div class="white ng-binding" style="padding: 1em; color: #808080;border-radius:6px;">
									<?php echo $firstname." ".$lastname;?><br>
									<?php echo $primaryaddress;?><br>
									<?php echo $city;?><br>
									<?php echo $state;?> - <?php echo $zipcode;?><br>
									<?php echo $functions->get_country_name($country); ?><br>	
									<?php echo $phone; ?><br>	
								</div>	
							</div>		
							<!--package listing-->	
						</div>						
						<!--package listing-->
						<?php
							//************** BILLING INFO	
							$billing_info = get_table_data('tbl_billing_info', 'id!="" AND user_id="'.$userid.'" ');
							if($billing_info!='')
							{
								foreach($billing_info as $key => $val)
								{
									$bfname = $val->first_name;
									$blname = $val->last_name;
									$bpaddress = $val->address1;
									$bcity = $val->city;
									$bcountry = $val->county;
									$bstate = $val->state;
									$bzipcode = $val->zip_code;
									$bphone = $val->phone_no;
								}	
							}
						?>						
						<div class="col-md-6 float-right">
							<div class="package-listing m-50px-t">	
								<h5>Billing Address</h5>
								<div class="white ng-binding" style="padding: 1em; color: #808080;border-radius:6px;">
									<?php echo $bfname." ".$blname;?><br>
									<?php echo $bpaddress;?><br>
									<?php echo $bcity;?><br>
									<?php echo $bstate;?> - <?php echo $bzipcode;?><br>
									<?php echo $functions->get_country_name($bcountry); ?><br>	
									<?php echo $bphone; ?><br>	
								</div>				
							</div>			
							<!--package listing-->	
						</div>			
					</div>			
					<!--col-->		
					<div class="col-md-4 pull-left">
						<h4>PAYMENT</h4>			
						<div class="signform">      
							<div class="right" style="width: 100%; border-radius: 10px; padding: 20px;">
								<div class="form">					
									<div class="row">	
										<?php
											//************** PACKAGE INFO	
											$package_info = get_table_data('tbl_packages', 'id="'.$_REQUEST['cid'].'" ');
											if($package_info!='')
											{
												foreach($package_info as $key => $val)
												{
													$package_id = $val->id;
													$category_id = $val->category_id;
													$price = $val->price;
													$duration = $val->duration;
												}	
											}
										?>	
										<div class="col-md-12 float-right text-center">		
											<form class="login-form m-0" id="p" method="post" action="include/checkout.php">			
												<div class="row">		
													<div class="col-md-12 pull-left text-left">
														<div class="package-listing">	
															<h5>Selected Plan</h5>		
															<ul>						
																<li class="active">		
																	<h6 class="float-left" style="width: 63%"><?php echo $functions->get_category_name($category_id);?> Qbank <?php echo $duration; ?> <br />
																		<span>Subscription</span>
																	</h6>							
																	<a href="javascript:;" onClick="delete_cart();" class="float-right"><i class="fa fa-times"></i></a>
																	<span class="price-tag float-right">$ <?php echo number_format($price,2); ?></span>	
																	<div class="clearfix"></div>	
																</li>	
															</ul>	
														</div>		
														<!--package listing-->
													</div>		
													<div class="col-md-12 text-left mt-4">
														<h5>Summary</h5>	
														<div class="col-md-8 float-left">		
															<p>Subtotal</p>		
														</div>		
														<div class="col-md-4 float-left">	
															<p id="subtotalamt">$ <?php echo number_format($price,2); ?></p>		
														</div>	
														<div class="col-md-8 float-left">
															<p>Discount</p>		
														</div>		
														<div class="col-md-4 float-left">
															<p id="discountamt">$ 0.00</p>	
														</div>		
														<div class="col-md-8 float-left">
															<p>Total</p>		
														</div>
														<div class="col-md-4 float-left">	
															<p id="totalamt">$ <?php echo number_format($price,2); ?></p>	
														</div>
														<input class="subbt" id="stripe_btn" type="button" value="Purchase" style="border:none; width:100%;"/> 
													</div>	
												</div>	
											</form>	
										</div>		
										<div class="clearfix"></div>
									</div>	
								</div>	
							</div>
   						</div>		
					</div>		
					<!--col-->	
					<div class="col-md-12 pull-left">
						<h4>Educational Status</h4>
						<div class="right" style="width: 100%; border-radius: 10px; padding: 20px;">
							<div class="form">		
								<div class="row">			
									<div class="col-md-12 float-right text-center">		
										<form class="login-form m-0" id="r" action="javascript:;">	
											<div class="row">					
												<div class="col-md-12">			
													<select class="form-control" required >	
														<option value="">Select Group</option>	
														<?php
															//************** CATEGORY INFO	
															$category_info = get_table_data('tbl_category', 'id!="" AND parent_id="0" AND status="Active" ');
															if($category_info!='')
															{
																foreach($category_info as $key => $val)
																{
																	?>
																	<option <?php if($key == 0){ echo "selected"; }?> value="<?php echo $val->id;?>"><?php echo $val->category_name;?></option>
																	<?php
																}	
															}
														?>	
													</select>			
												</div>				
											</div>				
										</form>					
									</div>						
									<div class="clearfix"></div>	
								</div>				
							</div>					
						</div>				
					</div>
					<!--col-->	
					<div class="col-md-12 pull-left">		
						<h4>Group Discount*</h4>     		
						<div class="right" style="width: 100%; border-radius: 10px; padding: 20px;">
							<div class="form">					
								<div class="row">	
									<div class="col-md-12 float-right text-center">	
										<form class="login-form m-0" id="d" action="javascript:;">
											<div class="row">						
												<div class="col-md-6">				
													<input name="discount_code" id="discount_code" type="text" class="form-field" placeholder="Discount Code (Optional)">	
												</div>
												<div class="col-md-6">				
													<input id="get_discount" class="subbt" type="submit" value="Apply" style="border:none; width:100%;"/>   
												</div>
											</div>	
										</form>		
									</div>			
									<div class="clearfix"></div>	
								</div>			
							</div>				
						</div>					
					</div>				
					<!--<div class="col-md-6 pull-right">	
						<h4>Payment</h4>    
 						<div class="right" style="width: 100%; border-radius: 10px; padding: 20px;">
							<div class="form">		
								<div class="row">
									<div class="col-md-12 float-right text-center">		
										<form class="login-form m-0" id="r" action="javascript:;">
											<div class="row">			
												<div class="col-md-12">	
													<input type="text" class="form-field us_telephone" data-mask="9999 9999 9999 9999" placeholder="Card Number">	
												</div>	
												<div class="col-md-6">		
													<input type="text" class="form-field" placeholder="Expiry (MM/YY)">	
												</div>			
												<div class="col-md-6">
													<input type="text" class="form-field" placeholder="CVV2">	
												</div>						
											</div>					
										</form>	
									</div>		
									<div class="clearfix"></div>
								</div>			
							</div>		
						</div>		
					</div>-->		
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
	<script src="https://checkout.stripe.com/checkout.js"></script>
	<script>
	$( "#get_discount" ).on("click",function( event )
	{
		//*************GET DISCOUNT
		var cid = <?php echo $category_id;?>;
		var pid = <?php echo $package_id;?>;
		var price = <?php echo $price;?>;
		$.confirm({
			icon: 'fa fa-spinner fa-spin',
			title: 'Working!',
			content: function (){
				var self = this;
				return $.ajax({
					url: "include/post_func.php",
					dataType: 'json',
					data:$('#d').serialize()+"&cid="+cid+"&pid="+pid+"&submit=getdiscount"+"&main_price="+price,
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
						$("#discountamt").html("$ "+response.message);
						var discountamount = response.message;
						var subtotalamount = $("#subtotalamt").html();
						var stotalamt = subtotalamount.replace(/[^a-zA-Z 0-9.]+/g,'');
						
						var finalamt = stotalamt-discountamount;
						
						$("#totalamt").html("$ "+finalamt.toFixed(2));
						
						$("#discount_code").attr("disabled", "disabled");
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
	
	function delete_cart()
	{
		//*************FOR REMOVE CART
		$.confirm({
			title: 'Error!',
			icon: 'fa fa-warning',
			closeIcon: true,
			content: 'Are you sure you want to remove it from cart?',
			type: 'red',
			typeAnimated: true,
			buttons:{
				ok:{
					text: 'Yes',
					btnClass: 'btn-green',
					action: function(){
						window.location = 'purchase';
					}
				},
				close:{
					text: 'No',
				}
			}
		});
		return false;
	}
	</script>
	<script type="text/javascript">			
		$('#stripe_btn').on('click', function(e)
		{
			var dc = $('#discount_code').val();
			cid = <?php echo $category_id;?>;
			pid = <?php echo $package_id;?>;
			
			if(dc == "")
			{
				total_g = <?php echo number_format($price,2);?>;			
				total = total_g*100;
				
				handler.open({
					name: 'DanquahPrep Ordered',
					description: 'Charges($'+total_g+'.00)',
					amount: total
				});
				e.preventDefault();
				
			}
			else if(dc != "")
			{
				var price = <?php echo $price;?>;
				//Fire off the request to /form.php
				request = $.ajax({
					url: "include/post_func.php",
					type: "post",
					dataType: 'json',
					data:"discount_code="+dc+"&cid="+cid+"&pid="+pid+"&submit=getdiscount"+"&main_price="+price,
				});
				request.done(function (response, textStatus, jqXHR)
				{
					total_g = <?php echo $price;?>-response.message;
					total = total_g.toFixed(2)*100;
					// total_g = total_g.toFixed(2);
					main_total = total_g.toFixed(2);
					
					handler.open({
						name: 'DanquahPrep Ordered',
						description: 'Charges($'+main_total+')',
						amount: total
					});
					e.preventDefault();
				});
			}
		});
		
		var handler = StripeCheckout.configure
		({
			 key: 'pk_live_KhnIIETSInHHmpXp7TKZatv4',
			//key: 'pk_test_Rbm365ztR9996FV8b6Q4Note',
			image: 'static/img/stripelogo.png',
			token: function(token) 
			{
				$('#p').append("<input type='hidden' name='stripeName' value='<?php echo $bfname.' '.$blname;?>' />"); 
				$('#p').append("<input type='hidden' name='stripeToken' value='" + token.id + "' />"); 
				$('#p').append("<input type='hidden' name='stripeCID' value='" + cid + "' />"); 
				$('#p').append("<input type='hidden' name='stripePID' value='" + pid + "' />"); 
				$('#p').append("<input type='hidden' name='stripeAmt' value='" + total.toFixed(2) + "' />"); 
				setTimeout(function(){ $('#p').submit(); }, 500); 
			}
		});	
		
		
		// Close Checkout on page navigation
		$(window).on('popstate', function() 
		{
			handler.close();
		});
		
	</script>    
</body>
<!-- Body End -->
</html>