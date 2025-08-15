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
						<li><a class="nav-link" href="javascript:;">Help</a></li>
						<?php if(isset($_REQUEST['cid'])!='') {?>
							<li><a class="nav-link-btn m-btn-white" href="cart?cid=<?php echo $_REQUEST["cid"];?>"><i class="fa fa-shopping-cart"></i> View Cart - 1</a></li>
						<?php } ?>
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
				<div class="row">
					<div class="col-md-12">
						<div class="home-left">
							<h1 class="font-alt">Login</h1>
						</div>
					</div>
				</div>
      		</div>
			<!-- container -->
		</section>
		<!-- / -->
		<!-- Features -->
		<section id="services" class="feature-section section p-50px-t">
			<div class="container">
				<div class="col-md-10 offset-1">
					<section class="register-account"> 
						<div class="signform">      
							<div class="left">
								<div class="headit">
									<h4>Forgot Password?</h4>
									<span>Please enter your registered Email ID.</span>
								</div>
								<div class="form">
									<form class="login-form" id="login-form" >
										<input name="register_email" type="text" class="form-field" placeholder="Register Email Address"/>
										<input class="subbt" type="submit" value="Submit" style="border:none;"/>   
									</form>
								</div>
							</div>
							<div class="right">
								<div class="headit">
									<h4>Already a member?</h4>
								</div>
								<div class="form">
									<form class="login-form" id="l">
										<input name="userEmail" id="userEmail" type="email" class="form-field" placeholder="User Email" required />
										<input name="userPassword" id="userPassword" type="password" class="form-field" placeholder="Password" required />        
										<input class="subbt form-field" type="submit" value="Login" style="border:none;"/>   
									</form>
								</div>
								<br /><br />
								<div class="headit">
									<h4>New Member?</h4>
									<span>If you are a new member, please click on the "Register" button below to create a new account.</span>
								</div>
								<a href="register" class="subbt" style="border:none; color: #FFF; text-align: center; float: left;">Register</a>
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
	<!-- custom -->
	<script src="static/js/custom.js"></script>
	<script type="text/javascript" src="admin/files/assets/js/jquery-confirm.js"></script>
	<script>
	jQuery(document).ready(function()
	{
		//*************FOR SIGN IN
		$( "#l" ).on("submit",function( event )
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
						data:frm.serialize()+ "&submit=SignIn",
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
							window.location = 'memberarea';
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
		
		
		//*************FOR FORGOT PASSWORD
		$( "#login-form" ).on("submit",function( event )
		{
			var serializedFrom = $("#login-form").serialize();
			$.confirm({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				content: function (){
					var self = this;
					return $.ajax({
						url: "include/post_func.php",
						dataType: 'json',
						data:serializedFrom+ "&submit=ForgotPassword",
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
</body>
<!-- Body End -->
</html>