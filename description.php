<?php 
include('include/connection.php');
    include('include/functions.php');
	 echo $base_url; 
	$functions = new functions;

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";

// Detect localhost or live
if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    $base_url = $protocol . $_SERVER['HTTP_HOST'] . "/testcreation"; // no trailing slash here
} else {
    $base_url = $protocol . $_SERVER['HTTP_HOST']; // live domain
}

// Add trailing slash when using
$base_url = rtrim($base_url, '/') . '/';



	 $categ= $category_info = get_table_data('tbl_category', 'slug="'.$_REQUEST['id'].'" ');
	 if($categ!='')
		{
			foreach($categ as $key => $value)
			{
				//echo $value->id;
				$_REQUEST['id'] = $value->id;
			}
		}
	
	if(isset($_SESSION['student_login'])) // If session is not set then redirect to Login Page
	{
		header("Location:preparation/create_test?id=".$_REQUEST['id']);
	}
	else
	{
		$setting_info = get_table_data('tbl_settings', 'category_id="'.$_REQUEST['id'].'" ');
		if($setting_info!='')
		{
			foreach($setting_info as $key => $value)
			{
				$_SESSION['categoryType'] = $_REQUEST['id'];
				$banner_image = $value->banner_image;
				$banner_text = $value->banner_text;
				$service_title = $value->service_title;
				$service_description = $value->service_description;
				$key_feature = $value->key_feature;
				$innovative = $value->innovative;
				$status = $value->status;
			}
		}
		else
		{
			header("Location:index");
		}
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
			<link href="<?= $base_url ?>static/plugin/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
			<link href="<?= $base_url ?>static/plugin/et-line/style.css" rel="stylesheet">
			<link href="<?= $base_url ?>static/plugin/themify-icons/themify-icons.css" rel="stylesheet">
			<!-- / -->
			<!-- Plugin CSS -->
			<link href="<?= $base_url ?>static/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<link href="<?= $base_url ?>static/plugin/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
			<!-- / -->
			<!-- Theme Style -->
			<link href="<?= $base_url ?>static/css/custom-front.css" rel="stylesheet">
			<link href="<?= $base_url ?>static/css/styles.css" rel="stylesheet">
			<link href="<?= $base_url ?>static/css/color/default.css" rel="stylesheet" id="color_theme">
			<!-- / -->
			<!-- Favicon -->
			<link rel="icon" href="<?= $base_url ?>favicon/favicon.ico" />
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
						<a class="navbar-brand p-1-l" href="<?= $base_url ?>"><img src="<?= $base_url ?>static/img/logo.png" title="" alt=""></a>
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
								<li><a class="nav-link active" href="<?= $base_url ?>login">My Account</a></li>
								<li><a class="nav-link" href="javascript:;">Help</a></li>
								<li><a class="nav-link-btn m-btn-white" href="<?= $base_url ?>purchase"><i class="fa fa-cart-plus"></i> BUY</a></li>
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
					<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" style="margin-top: -118px !important;">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="<?= $base_url ?>/bannerImg/<?php echo $banner_image;?>" alt="First slide">
								<div class="carousel-caption text-left d-none d-md-block">
									<div class="row p-100px-tb">
										<div class="col-md-6">
											<div class="home-left">
												<?php echo $banner_text;?>
												<!--<a class="m-btn-white" href="preparation/create_test?id=<?php //echo $_REQUEST['id'];?>">View Demo</a>-->
												<a class="m-btn-white" href="<?= $base_url ?>index?user=demo">View Demo</a>
											</div>
										</div>
									</div>
								</div>
								<!-- container -->
							</div>
						</div>
					</div>
				</section>
				<!-- / -->
				<!-- Feature Start -->
				<section id="" class="section">
					<div class="container">
						<div class="row justify-content-center title-section m-30px-tb sm-m-40px-b">
							<div class="col-md-12">
								<h2 class="font-alt text-center"><?php echo $service_title;?></h2>
								<span style="word-break: break-all;">
									<?php echo $service_description;?>
								</span>
							</div>
							<!-- col -->
						</div>
					</div>
				</section>
				<!--  -->
				<!-- Feature Start -->
				<section id="" class="section grey-bg border-top-grey">
					<div class="container">
						<div class="row justify-content-center title-section m-30px-b sm-m-40px-b">
							<div class="col-md-8 col-lg-5 text-center">
								<h2 class="font-alt">Key Features</h2>
							</div>
							<!-- col -->
						</div>
						<div class="tab-style-1">
							<div class="tab-content" id="">
								<div class="tab-pane sm-p-40px-t fade show active" id="" role="tabpanel" aria-labelledby="home-tab">
									<div class="row align-items-center">
										<div class="col-md-6 text-center">
											<img src="<?= $base_url ?>static/img/act_features_images.png" alt="Feature Image">
										</div>
										<!-- col -->
										<div class="col-md-6 sm-m-40px-t">
											<ol class="process-3">
												<li class="process_item">
													<!--<div class="process__number"><span>✓</span></div>-->
													<div class="process__body" style="word-break: break-all">
														<?php echo $key_feature;?>
													</div>
												</li>
												
											</ol>
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
				<!-- Feature -->
				<?php if($innovative != "") {?>
				<section id="" class="overview-section-large section grey-bg border-top-grey">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-md-7">
								<div class="m-50px-r md-m-0px-r">
									<div class="title-section m-20px-b">
										<h2 class="font-alt left">Detailed Explanation</h2>
									</div>
									<p><?php echo $innovative;?></p>
								</div>
								<!-- / -->
							</div>
							<!-- col -->
							<div class="col-md-5 pull-right text-right sm-m-60px-t">
								<div class="std-box">
									<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
										</ol>
										<div class="carousel-inner">
											<?php if ($_REQUEST['id'] == 9) { ?>
												<div class="carousel-item active">
													<img class="d-block w-100" src="<?= $base_url ?>static/img/pharmaceutical_calculations_image.png" alt="First slide">
												</div>
												<div class="carousel-item">
													<img class="d-block w-100" src="<?= $base_url ?>static/img/pharmaceutical_calculations_why_us.png" alt="Second slide">
												</div>
												<div class="carousel-item">
													<img class="d-block w-100" src="<?= $base_url ?>static/img/pharmaceutical_calculations_explanation_features.png" alt="Third slide">
												</div>
											<?php } else {?>
												<div class="carousel-item active">
													<img class="d-block w-100" src="<?= $base_url ?>static/img/Math.jpg" alt="First slide">
												</div>
												<div class="carousel-item">
													<img class="d-block w-100" src="<?= $base_url ?>static/img/Writing.jpg" alt="Second slide">
												</div>
												<div class="carousel-item">
													<img class="d-block w-100" src="<?= $base_url ?>static/img/Grammar.jpg" alt="Third slide">
												</div>
											<?php }?>
										</div>
										<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
									</div>
								</div>
							</div>
							<!-- col -->
						</div>
						<!-- row -->
					</div>
					<!-- container -->
				</section>
				<?php } ?>
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
											<?php if ($_REQUEST['id'] == 9) { ?>
													<img src="<?= $base_url ?>static/img/pharmaceutical_calculations_why_us.png" alt=""/> 
												<?php } else {?>
													<img src="<?= $base_url ?>static/img/DanquahPrep_homepage_why_us.png" alt=""/> 
												<?php }?>
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
												<a class="nav-link-btn m-btn-white" href="<?= $base_url ?>aboutus">View More</a>
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
				<section id="" class="section grey-bg border-top-grey">
					<div class="container">
						<div class="row justify-content-center title-section m-30px-b sm-m-40px-b">
							<div class="col-md-8 col-lg-5 text-center">
								<h2 class="font-alt"><?php echo $functions->get_category_name($_REQUEST['id']);?> Pricing</h2>
							</div>
							<!-- col -->
						</div>
						<div class="tab-style-1">
							<ul class="nav nav-fill" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="active" id="home-tab" data-toggle="tab" href="#homea" role="tab" aria-controls="homea" aria-selected="true">QBank</a>
								</li>
								<!--<li class="nav-item">
									<a id="profile-tab" data-toggle="tab" href="#profilea" role="tab" aria-controls="profilea" aria-selected="false">Renewals</a>
								</li>-->
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane p-80px-t sm-p-40px-t fade show active" id="homea" role="tabpanel" aria-labelledby="home-tab">
									<div class="row">
									<?php
										$package_info = get_table_data('tbl_packages', 'category_id="'.$_REQUEST['id'].'" AND type = "New" AND status = "Active" ');
										if($package_info!='')
										{
											foreach($package_info as $key => $value)
											{
												?>
												<div class="col-md-4 sm-p-15px-tb">
													<div class="price-table">
														<div class="price-table-head theme-after">
															<h2><?php echo $value->duration;?></h2>
															<div class="pricing"><span>$</span><?php echo $value->price;?></div>
														</div>
														<div class="price-table-body">
															<ul>
																<li style="word-break: break-all; font-size: 11px;"><?php echo $value->description;?></li>
															</ul>
															<a class="m-btn-theme text-center" style="width: 100%;" href="<?= $base_url ?>cart?cid=<?php echo $value->id;?>">SIGN UP</a>
														</div>
													</div>
													<!-- Price table -->
												</div>										
												<?php
											}
										}
									?>
									</div>
									<!-- row -->
								</div>
								<div class="tab-pane p-80px-t sm-p-40px-t fade" id="contacta" role="tabpanel" aria-labelledby="contact-tab">
									<div class="row align-items-center">
										<div class="col-md-6 text-center">
											<img class="img-shadow" src="<?= $base_url ?>static/img/550x500.jpg" title="" alt="">
										</div>
										<!-- col -->
										<div class="col-md-6 sm-p-40px-t">
											<div class="std-box p-50px-l md-p-0px-l">
												<div class="title-section  m-20px-b">
													<h2 class="font-alt left">Micor Overview</h2>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
												<p class="m-30px-b">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
												<a href="javascript:;" class="m-btn-theme">More Feature</a>
											</div>
											<!-- / -->
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
			</main>
			<!-- Main End -->
			<!-- Footer -->
			<?php include('footer.php');
			$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";

// Detect localhost or live
if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    $base_url = $protocol . $_SERVER['HTTP_HOST'] . "/testcreation"; // no trailing slash here
} else {
    $base_url = $protocol . $_SERVER['HTTP_HOST']; // live domain
}

// Add trailing slash when using
$base_url = rtrim($base_url, '/') . '/'; ?>
			<!-- / -->
			<!-- jQuery -->
			<script src="<?= $base_url ?>static/js/jquery-3.2.1.min.js"></script>
			<script src="<?= $base_url ?>static/js/jquery-migrate-3.0.0.min.js"></script>
			<!-- Plugins -->
			<script src="<?= $base_url ?>static/plugin/bootstrap/js/popper.min.js"></script>
			<script src="<?= $base_url ?>static/plugin/bootstrap/js/bootstrap.min.js"></script>
			<script src="<?= $base_url ?>static/plugin/owl-carousel/js/owl.carousel.min.js"></script>
			<!-- custom -->
			<script src="<?= $base_url ?>static/js/custom.js"></script>
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
		<?php
	}
?>