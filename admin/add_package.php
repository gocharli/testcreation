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
	$subpage_act = '18';
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
						<a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
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
											<h4 class="m-b-10">Add Package</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="dashboard">
													<i class="feather icon-home"></i>
												</a>
											</li>
											<li class="breadcrumb-item"><a href="packages">Packages</a></li>
											<li class="breadcrumb-item">
												<a href="javascript:;">Add Package</a>
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
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Inputs Validation start -->
                                                <div class="card">
													<div class="card-block">
                                                        <form id="main" method="post" action="javascript:;">															
                                                            <input name="submit" type="hidden" value="addpackage" />
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Category</label>
                                                                <div class="col-sm-10">
                                                                    <select name="category" class="form-control">
																		<option value="">Select Category</option>
																		<?php
																			$category_info = get_table_data('tbl_category', 'id!="" AND parent_id != "0" AND status = "Active" ');
																			if($category_info!='')
																			{
																				foreach($category_info as $key => $value)
																				{
																					?>
																					<option value="<?php echo $value->id;?>"><?php echo $value->category_name;?></option>
																					<?php
																				}
																			}
																		?>
																	</select>
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Price</label>
                                                                <div class="col-sm-10">
                                                                    <input name="price" type="text" id="price" class="form-control">
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Duration</label>
                                                                <div class="col-sm-10">
                                                                    <input name="duration" type="text" id="duration" class="form-control">
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="packageDescription" id="packageDescription"></textarea>
                                                                </div>
                                                            </div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Type</label>
                                                                <div class="col-sm-10 form-radio">																	
																	<div class="radio radio-inline">
																		<label>
																			<input name="type" type="radio" value="New" checked="checked">
                                                                            <i class="helper"></i>New
																		</label>
																	</div>
																	<div class="radio radio-inline">
																		<label>
																			<input name="type" type="radio" value="Renewals" >
																			<i class="helper"></i>Renewals
																		</label>
																	</div>
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-2"></label>
                                                                <div class="col-sm-10">
                                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Basic Inputs Validation end -->
											</div>
										</div>
									</div>
									<!-- Page body end -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Required Jquery -->
	<?php include('script.php');?>
	<script>	
	jQuery(document).ready(function()
	{ 
		//*************FOR ADD QUESTION
		$( "#main" ).on("submit",function( event )
		{	
			var formData = new FormData($('form#main').get(0));
			
			var packageDescription = CKEDITOR.instances.packageDescription.getData();
			formData.set('packageDescription',packageDescription);
			
			$.confirm({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				content: function (){
					var self = this;
					return $.ajax({
						url: "../include/post_func.php",
						dataType: 'json',
						data: formData,
						method: 'post',
						cache:false,
						contentType: false,
						processData: false
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
											$("#price").val("");
											$("#duration").val("");
											
											CKEDITOR.instances.packageDescription.setData("");
										}
									}
								}
							});
						}
						else if(response.code==2)
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
		});
	});
	</script>	
	<script>	
		CKEDITOR.replace('packageDescription', {
			toolbar: [{
				name: 'document',
				items: ['Print']
			}, {
				name: 'clipboard',
				items: ['Undo', 'Redo']
			}, {
				name: 'styles',
				items: ['Format', 'Font', 'FontSize']
			}, {
				name: 'basicstyles',
				items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
			}, {
				name: 'colors',
				items: ['TextColor', 'BGColor']
			}, {
				name: 'align',
				items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
			}, {
				name: 'links',
				items: ['Link', 'Unlink']
			}, {
				name: 'paragraph',
				items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
			}, {
				name: 'insert',
				items: ['Table']
			}, {
				name: 'tools',
				items: ['Maximize']
			}, {
				name: 'editing',
				items: ['Scayt']
			}],
			customConfig: '',
			height: 200,
			contentsCss: ['files/assets/pages/ckeditor/contents.css', 'files/assets/pages/ckeditor/document.css'],
			bodyClass: 'document-editor',
			format_tags: 'p;h1;h2;h3;pre',
			removeDialogTabs: 'image:advanced;link:advanced',
			stylesSet: [
				/* Inline Styles */
				{
					name: 'Marker',
					element: 'span',
					attributes: {
						'class': 'marker'
					}
				}, {
					name: 'Cited Work',
					element: 'cite'
				}, {
					name: 'Inline Quotation',
					element: 'q'
				},

				/* Object Styles */
				{
					name: 'Special Container',
					element: 'div',
					styles: {
						padding: '5px 10px',
						background: '#eee',
						border: '1px solid #ccc'
					}
				}, {
					name: 'Compact table',
					element: 'table',
					attributes: {
						cellpadding: '5',
						cellspacing: '0',
						border: '1',
						bordercolor: '#ccc'
					},
					styles: {
						'border-collapse': 'collapse'
					}
				}, {
					name: 'Borderless Table',
					element: 'table',
					styles: {
						'border-style': 'hidden',
						'background-color': '#E6E6FA'
					}
				}, {
					name: 'Square Bulleted List',
					element: 'ul',
					styles: {
						'list-style-type': 'square'
					}
				}
			]
		});
	</script>	
</body>
</html>