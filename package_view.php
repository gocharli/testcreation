<?php 
	include('include/connection.php');
	include('include/functions.php');
	$functions = new functions;	
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
					<li><a class="nav-link active" href="purchase">My Account</a></li>
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
		<section class="home-banner-02 theme-after-bg theme-bg">		
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
						<li><a href="javascript:;" class="active">Select</a></li>
						<li><a href="javascript:;">Cart</a></li>
						<li><a href="javascript:;">Billing</a></li>
						<li><a href="javascript:;">Review</a></li>
						<li><a href="javascript:;">Confirm</a></li>
					</ul>
				</div>
				<!--container-->
			</div>
			<!--sub nav-->
			<div class="container p-50px-tb">
				<div class="custom-tabs">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">New Subscriptions</a>
						</li>						
					</ul>
				</div>	
				<br />
				<p>Questions about subscriptions? Check out <a href="javascript:;">FAQ</a></p>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="row">
							<div class="col-md-6 pull-left">
								<?php
									$package_info = get_table_data('tbl_packages', 'category_id="'.$_REQUEST['id'].'" AND type = "New" ');
									if($package_info!='')
									{
										?>
										<h5><?php echo $functions->get_category_name($package_info[0]->category_id);?> Qbank</h5>
										<div class="package-listing">
											<ul>
											<?php
												foreach($package_info as $key => $value)
												{
													?>
													<li>
														<h6><?php echo $value->duration;?></h6>
														<span class="price-tag">$ <?php echo $value->price;?></span>
														<a href="cart?cid=<?php echo $value->id;?>" class="m-btn-theme">BUY</a>
														<div class="clearfix"></div>
													</li>
													<?php
												}
											?>
											</ul>
										</div>
										<?php
									}
								?>
								<!--package listing-->
							</div>
							<!--col-->
							<div class="col-md-12 m-15px-t">
								<div class="alert alert-primary" role="alert">
								* Includes one-time reset option. A reset is a permanent and irreversible purge (deletion) of all your test and performance data from our system.
								</div>
							</div>
						</div>
						<!--row-->
					</div>					
				</div>
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