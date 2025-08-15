<?php 
	include('include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
							<h1 class="font-alt">Reset Password</h1>
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
									<h4>Reset Password Information</h4>
								</div>
								<div class="form">
									<form id="l" action="javascript:;" method="post" class="login-form" >
										<div class="row">
											<div class="col-md-12 pull-left">
												<input name="new_password" id="new_password" type="password" class="form-field" placeholder="New Password" required />
											</div>											
										</div>
										<div class="row">
											<div class="col-md-12 pull-left">
												<input name="confrim_password" id="confrim_password" type="password" class="form-field" placeholder="Confirm Password" required />
											</div>
										</div>																			
										<button type="submit" class="subbt" style="border:none;">Confirm</button> 
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
	<script>
	jQuery(document).ready(function()
	{
		//*************FOR RESET PASSWORD
		$( "#l" ).on("submit",function( event )
		{	
			var newPassword = $('#new_password').val();
			var confirmPassword = $('#confrim_password').val();
			
			if(newPassword == confirmPassword)
			{
				var id = <?php echo $_REQUEST['id'];?>;
				var token = "<?php echo $_REQUEST['token'];?>";
				var frm = $("#l").serialize();
				
				$.confirm({
					icon: 'fa fa-spinner fa-spin',
					title: 'Working!',
					content: function (){
						var self = this;
						return $.ajax({
							url: "include/post_func.php",
							dataType: 'json',
							data:frm+"&id="+id+"&token="+token+"&submit=ResetPassword",
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
												window.location = 'login';
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
		});
	});
	</script>
</body>
<!-- Body End -->
</html>