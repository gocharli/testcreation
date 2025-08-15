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
				<a class="navbar-brand" href="#"><img src="static/img/logo.png" title="" alt=""></a>
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
		<section id="services" class="feature-section section p-50px-t">
			<div class="container">
				<div class="col-md-10 offset-1">
					<section class="register-account"> 
						<div class="text-center" style="width: 100%; min-height: 300px; display: flex; align-items: center;">
							<div style="width: 100%;">
								<p>Your profile was created successfully. Please select one of the options below to continue with the site.</p>
								<div class="text-center">
									<a href="purchase" class="m-btn-theme">Continue Shopping</a>
									<a href="memberarea" class="m-btn-theme">PURCHASE LATER</a>
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
	<!-- custom -->
	<script src="static/js/custom.js"></script>
</body>
<!-- Body End -->
</html>