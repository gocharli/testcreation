<?php 
	include('include/connection.php');
	include('include/functions.php');
	$functions = new functions;
	
	$package_info = get_table_data('tbl_packages', 'id="'.$_REQUEST['cid'].'" ');
	if($package_info!='')
	{
		foreach($package_info as $key => $value)
		{
			$package_cid = $value->category_id;
			$package_duration = $value->duration;
			$package_price = $value->price;
		}
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
						<li><a href="javascript:;">Select</a></li>
						<li><a href="javascript:;" class="active">Cart</a></li>
						<li><a href="javascript:;">Billing</a></li>
						<li><a href="javascript:;">Review</a></li>
						<li><a href="javascript:;">Confirm</a></li>
					</ul>
				</div>
				<!--container-->
			</div>
			<!--sub nav-->
			<div class="container p-50px-tb">
				<div class="row">
					<div class="col-md-6 pull-left">
						<h4>SHOPPING CART</h4>
						<div class="package-listing m-50px-t">
							<h5><?php echo $functions->get_category_name($package_cid);?> Qbank</h5>
							<ul>
								<li class="active">
									<h6><?php echo $package_duration;?></h6>
									<span class="price-tag">US $<?php echo number_format($package_price,2);?></span>
									<a href="javascript:;" onClick="delete_cart();" class="float-right"><i class="fa fa-times"></i></a>
									<div class="clearfix"></div>
								</li>
							</ul>
						</div>
						<!--package listing-->
					</div>
					<!--col-->
					<div class="col-md-6 pull-left">
						<h4>PAYMENT</h4>
						<div class="signform">      
							<div class="right" style="width: 100%; border-radius: 10px; padding: 20px;">
								<div class="form">
									<div class="row">
										<div class="col-md-12 float-right text-center">
											<form class="login-form m-0" id="r" action="javascript:;">
												<div class="row">
													<div class="col-md-12">
														<label class="m-0">Total (USD)</label>
														<div class="price-box">$<?php echo number_format($package_price,2);?></div>
														<p class="m-0">* Price shown here do not include sales tax.</p>
														<input class="subbt" type="submit" value="Check Out" style="border:none;" onClick="call_page(<?php echo $_REQUEST['cid'];?>);"/>   
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
	<script type="text/javascript" src="admin/files/assets/js/jquery-confirm.js"></script>
	<script>
	function call_page(cid)
	{
		window.location = "login2?cid="+cid;
	}
	
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
</body>
<!-- Body End -->
</html>