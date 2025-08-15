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
	$page_act = "1";
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
                                        <span><?php echo $functions->get_profile_name($_SESSION['user_login'])?></span>
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
                                            <h4 class="m-b-10">Dashboard</h4>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="dashboard">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="javascript:;">Dashboard</a>
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
                                    <div class="page-body">
                                        <!-- [ page content ] start -->
                                        <div class="row">
                                            <!-- subscribe start -->
                                            <div class="col-md-12 col-lg-4">
                                                <div class="card">
                                                    <div class="card-block text-center">
                                                        <i class="feather icon-users text-c-blue d-block f-40"></i>
                                                        <h4 class="m-t-20"><span class="text-c-blue"><?php echo $functions->get_total_clients();?></span> Clients</h4>
                                                        <a href="subadmin" class="btn btn-primary btn-sm btn-round">View Clients</a>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-md-6 col-lg-4">
                                                <div class="card">
                                                    <div class="card-block text-center">
                                                        <i class="feather icon-users text-c-red d-block f-40"></i>
                                                        <h4 class="m-t-20"><span class="text-c-red"><?php echo $functions->get_total_users();?></span> Users</h4>
                                                        <a href="users" class="btn btn-danger btn-sm btn-round">View Users</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <div class="card">
                                                    <div class="card-block text-center">
                                                        <i class="feather icon-file-text text-c-green d-block f-40"></i>
                                                        <h4 class="m-t-20"><span class="text-c-green"><?php echo $functions->count_total_tests();?></span> Test</h4>
														<a href="tests" class="btn btn-success btn-sm btn-round">View Tests</a>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <!-- subscribe end -->
										</div>
                                        <!-- [ page content ] end -->
                                    </div>
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
