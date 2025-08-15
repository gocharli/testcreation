<?php 
	include('../include/connection.php');
	include('../include/functions.php');
	$functions = new functions;
	
	if(!isset($_SESSION['student_login'])) // If session is not set then redirect to Login Page
	{
		header("Location:../index");  
	}	
	
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php");?>
</head>
<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
		</svg>
    </div>
    <div id="main-wrapper">
        <?php include("header.php");?>
		
        <?php include("sidebar.php");?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Help</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Help</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">                
				<div class="row">
					<div class="col-md-12 custom-tabs">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<?php
								
								$description="";
								$settings = get_table_data('tbl_user_settings', 'type="help" ');
								if($settings!='')
								{
									foreach($settings as $key => $value)
									{
										$description = $value->description;
									}
								}

							?>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content tabcontent-border">
							
								<div class="test-col" style="width: 100%;">
									<div style="padding: 50px;">
										
											<?php echo $description; ?>
										
										
									</div>
								</div>

							
						</div>
					</div>
				</div>
				<!-- row -->               
			</div>
			<footer class="footer text-center"> Copyright © DanquahPrep. All rights reserved. </footer>
		</div>
	</div>
	<?php include("script.php");?>
	<script>
	function qucik_start(tid)
	{
		//*************FOR QUICK START
		$.confirm({
			title: 'Info!',
			icon: 'fa fa-check',
			content: 'Demo version is restricted to a test of 10 questions only in Tutor mode. <br /><br />However, paid subscribers can specify any number of questions with a maximum of 45 per test.',
			type: 'orange',
			typeAnimated: true,
			buttons:{
				ok:{
					text: 'Ok',
					btnClass: 'btn-orange',
					action: function(){
						var maxQuestion = $('#maxQuestion').val();
						if(maxQuestion <= 45)
						{
							$.confirm({
								icon: 'fa fa-spinner fa-spin',
								title: 'Working!',
								content: function (){
									var self = this;
									return $.ajax({
										url: "../include/post_func.php",
										dataType: 'json',
										data:"categoryId="+<?php echo $id;?>+"&typeId="+tid+"&maxQuestion="+maxQuestion+"&submit=QuickTest",
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
												typeAnimated: true,
												buttons:{
													ok:{
														text: 'Ok',
														btnClass: 'btn-green',
														action: function(){
															window.location = 'start_test?id='+response.test_id;
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
									close: function (){
									}
								}
							});
						}
						else
						{
							$.confirm({
								title: 'Error!',
								icon: 'fa fa-warning',
								closeIcon: true,
								content: 'Please enter a number between 1 and 45.',
								type: 'red',
								autoClose: 'close|10000',
								typeAnimated: true,
								buttons:{
									close: function (){
									}
								}
							});
						}
					}
				}
			}
		});
		
	};
	
	function generate_start(tid)
	{
		//*************FOR GENERETE START
		$.confirm({
			title: 'Info!',
			icon: 'fa fa-check',
			content: 'paid subscribers can specify any number of questions with a maximum of 45 per test.',
			type: 'orange',
			typeAnimated: true,
			buttons:{
				ok:{
					text: 'Ok',
					btnClass: 'btn-orange',
					action: function(){
						var maxQuestion = $('#maximum_questions').val();
						if(maxQuestion <= 45)
						{
							var serializeFrom = $('#generate_test_'+tid).serialize();
							$.confirm({
								icon: 'fa fa-spinner fa-spin',
								title: 'Working!',
								content: function (){
									var self = this;
									return $.ajax({
										url: "../include/post_func.php",
										dataType: 'json',
										data:serializeFrom+"&categoryId="+<?php echo $id;?>+"&typeId="+tid+"&submit=GenerateTest",
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
												typeAnimated: true,
												buttons:{
													ok:{
														text: 'Ok',
														btnClass: 'btn-green',
														action: function(){
															window.location = 'start_test?id='+response.test_id;
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
									close: function (){
									}
								}
							});
						}
						else
						{
							$.confirm({
								title: 'Error!',
								icon: 'fa fa-warning',
								closeIcon: true,
								content: 'Please enter a number between 1 and 45.',
								type: 'red',
								autoClose: 'close|10000',
								typeAnimated: true,
								buttons:{
									close: function (){
									}
								}
							});
						}
					}
				}
			}
		});
		
	};
	</script>
</body>
</html>