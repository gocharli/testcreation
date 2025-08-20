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
	<title>Test Creation</title>
	<!-- / -->
	<!---Font Icon-->
	<link href="static/plugin/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
	<link href="static/plugin/et-line/style.css" rel="stylesheet">
	<link href="static/plugin/themify-icons/themify-icons.css" rel="stylesheet">
	<!-- / -->
	<!-- Plugin CSS -->
	<link href="static/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="static/plugin/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
	<!-- / -->	<!-- Theme Style -->
	<link href="static/css/styles.css" rel="stylesheet">
	<link href="static/css/custom-front.css" rel="stylesheet">
	<link href="static/css/color/default.css" rel="stylesheet" id="color_theme">
	<!-- / -->	<!-- Favicon -->
	<link rel="icon" href="favicon/favicon.ico" />
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
						<?php if(isset($_SESSION['student_login'])) {?>			
							<li><a class="nav-link" href="logout">Logout</a></li>
						<?php }?>			
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
						<li><a href="#" class="active">Select</a></li>
						<li><a href="#">Cart</a></li>			
						<li><a href="#">Billing</a></li>			
						<li><a href="#">Review</a></li>				
						<li><a href="#">Confirm</a></li>		
					</ul>		
				</div>
				<!--container-->
			</div>
			<!--sub nav-->
			<div class="container p-50px-tb">	
				<div class="row">	
				<?php		
				$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host     = $_SERVER['HTTP_HOST'];
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');  // e.g. /testcreation
$baseUrl  = rtrim($protocol . $host . $basePath, '/');
					$category_info = get_table_data('tbl_category', 'id!="" AND parent_id = "0" AND status = "Active" ');
					if($category_info!='')
					{		
						foreach($category_info as $key => $value)	
						{	
							?>					
							<div class="col-md-4 pull-left">
								<h4 class="mt-3"><?php echo $value->category_name;?></h4>
								<div class="package-listing">	
									<?php		
										$subcategory_info = get_table_data('tbl_category', 'id!="" AND parent_id = "'.$value->id.'" AND status = "Active" ');
										if($subcategory_info!='')	
										{				
											foreach($subcategory_info as $key => $val)	
											{
												 $url = $baseUrl . "/category/" . $val->slug; 
												?>							
												<ul>					
													<li>
														<h6 style="margin-bottom: 0!important; margin-top: 7px !important; "><?php echo $val->category_name;?></h6>		
														<a href="<?= $url ?>" class="m-btn-theme">View</a>	
														<div class="clearfix"></div>
										
													</li>		
												</ul>	
												<?php	
											}		
										}	
									?>		
								</div>
								<!--package listing-->	
							</div>	
							<?php	
						}		
					}	
				?>		
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
	<!-- custom -->
	<script src="static/js/custom.js"></script>
</body>
<!-- Body End -->
</html>