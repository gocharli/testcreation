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
	$page_act = '8';
	$subpage_act = '17';
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
											<h4 class="m-b-10">Packages List</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="dashboard">
													<i class="feather icon-home"></i>
												</a>
											</li>
											<li class="breadcrumb-item">
												<a href="javascript:;">Packages List</a>
											</li>
										</ul>
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
                                                                <th>Category</th>
                                                                <th>Price</th>
                                                                <th>Duration</th>
                                                                <th>Description</th>
                                                                <th>Type</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
																$package_info = get_table_data('tbl_packages', 'id !="" ' ,'type ASC');
																if($package_info!='')
																{
																	$sr = "0";
																	foreach($package_info as $key => $value)
																	{
																		$sr++;
																		?>
																		<tr>
																			<th scope="row"><?php echo $sr;?></th>
																			<td><?php echo $functions->get_category_name($value->category_id);?></td>	
																			<td><?php echo $value->price;?></td>													
																			<td><?php echo $value->duration;?></td>
																			<td><?php echo $value->description;?></td>
																			<td><?php echo $value->type;?></td>
																			<td><?php echo $value->status;?></td>
																			<td><a href="edit_package?id=<?php echo $value->id;?>" title="Edit Setting"><i class="fa fa-edit"></i></a></td>
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
	<!-- Modal -->
	<?php
		$questionInfo = "";
		if($_SESSION['user_type'] == 'admin')
		{
			$questionInfo = get_table_data('tbl_questions', 'id !="" AND is_deleted = "0" ' ,'id ASC');
		}
		else if($_SESSION['user_type'] == 'subadmin')
		{
			$questionInfo = get_table_data('tbl_questions', 'id !="" AND is_deleted = "0" AND is_block = "0" AND created_by = "'.$_SESSION['user_login'].'" ' ,'id ASC');
		}
		if($questionInfo!='')
		{
			foreach($questionInfo as $key => $val)
			{
				?>
				<div class="modal fade" id="default-Modal-<?php echo $val->id;?>" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Question Title</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" style="word-break: break-word;">
								<p><?php echo $val->title;?></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}
	?>
	<?php include('script.php');?>
	<script>
	function block_question(id)
	{
		$.confirm({
			icon: 'fa fa-spinner fa-spin',
			title: 'Working!',
			content: function (){
				var self = this;
				return $.ajax({
					url: "../include/post_func.php",
					dataType: 'json',
					data:"&id="+id+"&submit=blockquestion",
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
										window.location = 'questions';
									}
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
	};
	</script>
</body>
</html>