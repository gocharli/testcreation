<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	// If session is not set then redirect to Login Page
	if(!isset($_SESSION['user_login']))
	{
		header("Location:index");
	}
	
	$profile_info = get_table_data('tbl_admin', 'id ="'.$_SESSION['user_login'].'" ');
	foreach($profile_info as $key => $value)
	{
		$first_name = $value->first_name;
		$last_name = $value->last_name;
		$email_id = $value->email_id;
		$type = $value->type;
		$status = $value->status;
		$created_date = $value->created_date;
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php 
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
                                    <span><?php echo $functions->get_profile_name($_SESSION['user_login']); ?></span>
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
                                        <h4 class="m-b-10">User Profile</h4>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard">
                                                <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript:;">User Profile</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- tab header start -->
                                            <div class="tab-header card">
                                                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                                    <li class="nav-item">
														<a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
														<div class="slide"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- tab header end -->
                                            <!-- tab content start -->
                                            <div class="tab-content">
                                                <!-- tab panel personal start -->
                                                <div class="tab-pane active" id="personal" role="tabpanel">
                                                    <!-- personal card start -->
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="card-header-text">About Me</h5>
                                                            <a class="btn btn-primary" style="float: right" href="edit_profile">Edit Profile</a>
                                                        </div>
                                                        <div class="card-block">
                                                            <div class="view-info">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="general-info">
																			<!-- start of row -->
                                                                            <div class="row">
                                                                                <div class="col-lg-12 col-xl-6">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table m-0">
																							<tbody>
																								<tr>
																									<th scope="row">First Name</th>
																									<td><?php echo $first_name;?></td>
																								</tr>
																								<tr>
																									<th scope="row">Email</th>
																									<td><?php echo $email_id;?></td>
																								</tr>
																								<tr>
																									<th scope="row">Status</th>
																									<td><?php echo $status?></td>
																								</tr>
																							</tbody>
																						</table>
																					</div>
																				</div>
                                                                                <!-- end of table col-lg-6 -->
                                                                                <div class="col-lg-12 col-xl-6">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">Last Name</th>
                                                                                                    <td><?php echo $last_name;?></td>
                                                                                                </tr>
																								<tr>
                                                                                                    <th scope="row">Type</th>
                                                                                                    <td><?php echo $type;?></td>
                                                                                                </tr>
																								<tr>
                                                                                                    <th scope="row">Created Date</th>
                                                                                                    <td><?php echo date('d F Y', strtotime($created_date));?></td>
                                                                                                </tr>
																							</tbody>
																						</table>
																					</div>
																				</div>
                                                                                <!-- end of table col-lg-6 -->
																			</div>
																			<!-- end of row -->
																		</div>
                                                                        <!-- end of general info -->
																	</div>
                                                                    <!-- end of col-lg-12 -->
																</div>
																<!-- end of row -->
															</div>
															<!-- end of view-info -->
                                                            <div class="edit-info">
																<div class="row">
																	<div class="col-lg-12">
																		<div class="general-info form-material">
																			<!-- end of row -->
																			<!--<div class="text-center">
																				<a href="#!" class="btn btn-primary waves-effect waves-light m-r-20">Save</a>
                                                                                <a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
                                                                            </div>-->
                                                                        </div>
                                                                        <!-- end of edit info -->
                                                                    </div>
                                                                    <!-- end of col-lg-12 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
                                                            <!-- end of edit-info -->
                                                        </div>
                                                        <!-- end of card-block -->
                                                    </div>
                                                    <!-- personal card end-->
												</div>
                                                <!-- tab pane personal end -->
											</div>
										</div>
									</div>
									<!-- Page-body end -->
								</div>
							</div>
						</div>
					</div>
					<!-- Main body end -->
				</div>
			</div>
		</div>
	</div>
	<?php include('script.php');?>
</body>
</html>