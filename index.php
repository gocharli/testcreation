<?php 
 
	include('include/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Page Title -->
	<title>DanquahPrep</title>
	<!-- / -->
	<!---Font Icon-->
	<link href="static/plugin/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
	<link href="static/plugin/et-line/style.css" rel="stylesheet">
	<link href="static/plugin/themify-icons/themify-icons.css" rel="stylesheet">
	<!-- / -->
	<!-- Plugin CSS -->
	<link href="static/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="static/plugin/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
	<!-- / -->
	<!-- Theme Style -->
	<link href="static/css/custom-front.css" rel="stylesheet">
	<link href="static/css/styles.css" rel="stylesheet">
	<link href="static/css/color/default.css" rel="stylesheet" id="color_theme">
	<!-- / -->
	<!-- Favicon -->
	<link rel="icon" href="favicon/favicon.ico" />
	<!-- / -->
	<link rel="stylesheet" href="admin/files/assets/css/jquery-confirm.css">
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
				<a class="navbar-brand p-1-l" href="index"><img src="static/img/logo.png" title="" alt=""></a>
				<!-- / -->
				<!-- Mobile Toggle -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<!-- / -->
				<?php include('menu.php');?>    
				<!-- Top Menu -->
			
				<div class="collapse navbar-collapse justify-content-end p-1-r" id="navbarHeader">
					<ul class="navbar-nav ml-auto">

					<?php if(!isset($_SESSION['student_login'])){ // If session is not set then redirect to Login Page ?>

						<li><a class="nav-link active" href="login">My Account</a></li>
						<li><a class="nav-link" href="javascript:;">Help</a></li>
						<li><a class="nav-link-btn m-btn-white" href="purchase"><i class="fa fa-cart-plus"></i> BUY</a></li>

					<?php }else{ ?>

						<li><a class="nav-link active" href="memberarea">My Account</a></li>
						<li><a class="nav-link" href="#">Help</a></li>
						<li><a class="nav-link" href="logout">Logout</a></li>

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
		<section id="home-box" class="home-banner-02 theme-after-bg theme-bg">
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="static/img/HomePage-Students.jpg" alt="First slide">
						<div class="carousel-caption text-left d-none d-md-block">
							<div class="row p-100px-tb" style="padding-bottom: 200px;">
								<div class="col-md-12">
									<div class="home-left">
										<h1 class="font-alt" style="margin-bottom: 15px;">Achieve your potential</h1>
										<h2 style="font-weight: 300;">The right practice delivers the best ACT and SAT results.</h2>
									</div>
								</div>
							</div>
						</div>
						<!-- container -->
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="static/img/HomePage-Nurses.jpg" alt="Second slide">
						<div class="carousel-caption text-left d-none d-md-block">
							<div class="row p-100px-tb" style="padding-bottom: 200px;">
								<div class="col-md-12">
									<div class="home-left">
										<h1 class="font-alt" style="margin-bottom: 15px;">Be ready, Be confident</h1>
										<h2 style="font-weight: 300;">The right assistance for RN and PN.</h2>
									</div>
								</div>
							</div>
						</div>
						<!-- container -->
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="static/img/HomePage-Pharmacist.jpg" alt="Third slide">
						<div class="carousel-caption text-left d-none d-md-block">
							<div class="row p-100px-tb" style="padding-bottom: 200px;">
								<div class="col-md-12">
									<div class="home-left">
										<h1 class="font-alt" style="margin-bottom: 15px;">Primed for Success</h1>
										<h2 style="font-weight: 300;">Everything you need for the NAPLEX.</h2>
										
									</div>
								</div>
							</div>
						</div>
						<!-- container -->
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="static/img/HomePage-Doctor.jpg" alt="Fouth slide">					
						<div class="carousel-caption text-left d-none d-md-block">
							<div class="row p-100px-tb" style="padding-bottom: 200px;">
								<div class="col-md-12">
									<div class="home-left">
										<h1 class="font-alt" style="margin-bottom: 15px;">Better Prepared</h1>
										<h2 style="font-weight: 300;">Be sure of your score.</h2>
									</div>
								</div>
							</div>
						</div>
						<!-- container -->
					</div>
				</div>
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleCaptions" data-slide-to="0" class=""></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="3" class=""></li>
				</ol>
			</div>
		</section>
		<!-- / -->
		<!-- Features -->
		<section id="services" class="feature-section section p-50px-t grey-bg">
			<div class="container">
				<div class="row justify-content-center title-section m-60px-b sm-m-40px-b">
					<div class="col-md-12">
						<h2 class="font-alt text-center">Your Success is our Passion</h2>
						<p>Students face tough, high stakes standardized exams today.  Having high scores on these standardized exams can make all the difference in the world for getting into college, securing financial aid as well as practicing your profession; but what is the best way to prepare for them?</p><br />
						<p>Here at DanquahPrep, our passion is your success.  In order to achieve the highest possible results on your exams, you must have the right practice and study resources.  Our practice tests strive to match the style and difficulty of the actual exams you will be taking, so you can walk into the exam room confident and prepared to succeed.</p><br />
						<p>We offer question banks for all the major college and board exams: ACT, SAT, NAPLEX, PCAT, MCAT, NCLEX-RN, USMLE, GRE, and PTCE</p>
					</div>
					<!-- col -->
				</div>
				<!-- row -->
				<div class="row justify-content-center title-section m-60px-b sm-m-40px-b">
					<div class="col-md-12">
						<h2 class="font-alt text-center">​You Deserve High Scores. Prep the Smart Way.</h2>
					</div>
					<!-- col -->
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="feature-box-01 m-30px-b">
							<div class="f-icon"><i class="icon-documents"></i></div>
							<h4 class="font-alt">SAT</h4>
							<p>Practice questions and detailed explanations carefully curated by educators with years of experience to provide the highest level of SAT prep.<br /><br /><br /><br /></p>
							<!--<a class="more-btn" href="javascript:;">Read More <i class="ti-arrow-right"></i></a>-->
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-box-01 m-30px-b">
							<div class="f-icon"><i class="icon-recycle"></i></div>
							<h4 class="font-alt">ACT</h4>
							<p>Experience a superior approach to prep for the ACT with top quality practice questions and in-depth explanations.<br /><br /><br /><br /><br /></p>
							<!--<a class="more-btn" href="javascript:;">Read More <i class="ti-arrow-right"></i></a>-->
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-box-01 m-30px-b">
							<div class="f-icon"><i class="icon-genius"></i></div>
							<h4 class="font-alt">MCAT</h4>
							<p>Prep the smart way with our comprehensive MCAT question bank developed by experienced professors. Higher scores guaranteed.<br /><br /><br /><br /></p>
							<!--<a class="more-btn" href="javascript:;">Read More <i class="ti-arrow-right"></i></a>-->
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-box-01 m-30px-b">
							<div class="f-icon"><i class="icon-documents"></i></div>
							<h4 class="font-alt">NAPLEX</h4>
							<p>Prepare for the NAPLEX score you deserve. Use the most up-to-date question bank based on the NAPLEX-blueprint detailed answers.<br /><br /><br /><br /></p>
							<!--<a class="more-btn" href="javascript:;">Read More <i class="ti-arrow-right"></i></a>-->
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-box-01 m-30px-b sm-m-0px-b">
							<div class="f-icon"><i class="icon-recycle"></i></div>
							<h4 class="font-alt">NCLEX</h4>
							<p>Excel on the NCLEX-RN exam with our comprehensive practice questions with detailed answers. Questions are developed to improve critical thinking skills and are based on the requirements specified by the National Council State Boards of Nursing (NCSBN).</p>
							<!--<a class="more-btn" href="javascript:;">Read More <i class="ti-arrow-right"></i></a>-->
						</div>
					</div>	
					<div class="col-md-4">
						<div class="feature-box-01 m-30px-b">
							<div class="f-icon"><i class="icon-genius"></i></div>
							<h4 class="font-alt">USMLE</h4>
							<p>Comprehensive USMLE practice exams (Step 1, Step 2 and Step 3) with detailed explanations developed by seasoned faculty and specialists. Experience a more excellent way to prep.<br /><br /><br /></p>							
							<!--<a class="more-btn" href="javascript:;">Read More <i class="ti-arrow-right"></i></a>-->
						</div>
					</div>								
				</div>
			</div>
			<!-- container -->
		</section>
		<!-- / -->
		<!-- Feature Start -->
		<section id="" class="section border-top-grey">
			<div class="container">
				<div class="row justify-content-center title-section m-60px-b sm-m-40px-b">
					<div class="col-md-8 col-lg-5 text-center">
						<h2 class="font-alt">Why DanquahPrep?</h2>
					</div>
					<!-- col -->
				</div>
				<div class="tab-style-1">
					<div class="tab" id="">
						<div class="tab-pane sm-p-40px-t fade show active" id="" role="tabpanel" aria-labelledby="home-tab">
							<div class="row align-items-center">
								<div class="col-md-6 text-center">
									<div class="std-box">
										<img src="static/img/DanquahPrep_homepage_why_us.png" alt=""/> 
									</div>
								</div> 
								<!-- col -->
								<div class="col-md-6 sm-m-40px-t">
									<!--<div class="std-box p-50px-l m-30px-b md-p-0px-l">
										<div class="title-section ">
											<h6 class="font-alt left"><strong>Current Content</strong></h6>
										</div>
										<p>Our group of experts and professionals review the content regularly to ensure the most up-to-date questions are at your disposal.</p>
									</div>-->
									<div class="std-box m-30px-b p-50px-l md-p-0px-l">
										<div class="title-section  m-0px-b">
											<h6 class="font-alt left"><strong>Developed and Curated by Top Authorities</strong></h6>
										</div>
										<p>Our group of experts and professionals review the content regularly to ensure the most up-to-date questions are at your disposal.</p>
									</div>
									<div class="std-box m-30px-b p-50px-l md-p-0px-l">
										<div class="title-section  m-0px-b">
											<h6 class="font-alt left"><strong>Greater Pass Rate</strong></h6>
										</div>
										<p>Those who use test prep sites have a higher pass rate than the national average, plus a significant reduction in study time.</p>
									</div>
									<div class="std-box m-30px-b p-50px-l md-p-0px-l">
										<div class="title-section  m-0px-b">
											<h6 class="font-alt left"><strong>Verified Results</strong></h6>
										</div>
										<p>Join thousands of students and existing professionals that use DanquahPrep to prepare for the most influential exams of their lives.</p>
										<a class="nav-link-btn m-btn-white" href="aboutus">View More</a>
									</div>									
								</div>
								<!-- col -->
							</div>
							<!-- row -->
						</div>
					</div>
					<!-- Tab Content -->
				</div>
				<!-- Tab style -->
			</div>
		</section>
		<!--  -->
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
	<script>
		<?php if($_REQUEST['user'] == 'demo'){?>
			$.confirm({
				title: 'Info!',
				icon: 'fa fa-info-circle',
				content: 'Register to access demo.',
				type: 'blue',
				autoClose: 'ok',
				typeAnimated: true,
				buttons: {
					ok:{
						text: 'Ok',
						btnClass: 'btn-blue',
						action: function(){
							window.location = 'register';
						}
					},
					cancel: function () {
					}
				}
			});
		<?php }?>
	</script>
</body>
<!-- Body End -->
</html>