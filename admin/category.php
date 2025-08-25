<?php 

	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	// If session is not set then redirect to Login Page
	if(!isset($_SESSION['user_login']))
	{
		header("Location:index");
	}	
?>
<!DOCTYPE html>
<html lang="en">
<?php 
	$page_act = '3';
	$subpage_act = '3';

	include('header.php');
?>
</head>
<body>
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-bar"></div>
	</div>
	<!-- [ Pre-loader ] end -->
	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">
			<!-- [ Header ] start -->
			<nav class="navbar header-navbar pcoded-header">
				<div class="navbar-wrapper">
					<div class="navbar-logo">
						<a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="javascript:;">
							<i class="feather icon-toggle-right"></i>
						</a>
						<a href="dashboard">
							<b>Admin Panel</b>
						</a>
						<a class="mobile-options waves-effect waves-light">
							<i class="feather icon-more-horizontal"></i>
						</a>
					</div>
					<div class="navbar-container container-fluid">
						<ul class="nav-right">
							<li class="user-profile header-notification">
								<div class="dropdown-primary dropdown">
									<div class="dropdown-toggle" data-toggle="dropdown">
										<img src="files/assets/images/dummy.jpg" class="img-radius" alt="User-Profile-Image">
										<span><?php echo $functions->get_profile_name($_SESSION['user_login']);?></span>
										<i class="feather icon-chevron-down"></i>
									</div>
									<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
										<li>
											<a href="profile">
												<i class="feather icon-user"></i> Profile
											</a>
										</li>
										<li>
											<a href="logout">
												<i class="feather icon-log-out"></i> Logout
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
					
				</div>
			</nav>
			<!-- [ Header ] end -->
			<div class="pcoded-main-container">
				<div class="pcoded-wrapper">
					<!-- [ navigation menu ] start -->
					<?php include('navigation_menu.php');?>
					<!-- [ navigation menu ] end -->
					<div class="pcoded-content">
						<!-- [ breadcrumb ] start -->
						<div class="page-header">
							<div class="page-block">
								<div class="row align-items-center">
									<div class="col-md-8">
										<div class="page-header-title">
											<h4 class="m-b-10">Cateogries List</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="dashboard">
													<i class="feather icon-home"></i>
												</a>
											</li>
											<li class="breadcrumb-item">
												<a href="javascript:;">Cateogries List</a>
											</li>
										</ul>
									</div>
									<div class="col-md-4 text-right">
                                        <a href="main_category" class="btn btn-light">Add Main Category</a>
                                    </div>
								</div>
							</div>
						</div>
						<!-- [ breadcrumb ] end -->
						<div class="pcoded-inner-content">
							<!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Table header styling table start -->
                                        <div class="card">
                                            <div class="card-block table-border-style">
												<div class="table-responsive">
													<table class="table table-styling">
														<thead>
                                                            <tr class="table-primary">
                                                                <th>#</th>                                                                
                                                                <th>Main Category</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
																$category_info = get_table_data('tbl_category', 'id !="" AND parent_id = "0" AND created_by = "'.$_SESSION['user_login'].'" ' ,'id ASC');
																if($category_info!='')
																{
																	$sr = "0";
																	foreach($category_info as $key => $value)
																	{
																		$sr++;
																		?>
																		<tr>
																			<th scope="row"><?php echo $sr;?></th>
																			<td><?php echo $value->slug;?></td>
																			<td><?php echo $value->status;?></td>
																			<td><a href="edit_category?id=<?php echo $value->id;?>" title="Edit Main Category"><i class="fa fa-edit"></i></a></td>
																		</tr>
																		<?php
																	}																	
																}
															?>
															
															
															
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Table header styling table end -->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php include('script.php');?>
</body>
</html>