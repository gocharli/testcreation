	<aside class="left-sidebar">
		<!-- Sidebar scroll-->
		<div class="scroll-sidebar">
			<!-- User profile -->
			<div class="user-profile"> 
				<!-- User profile text--> 
				<div class="profile-text"> 
					<h4 style="color: #FFF;"><?php echo $categoryName;?> QBank </h4>
					<p style="color: #a7b1c2;">Expiry Date <?php echo $expirtyDate;?> </p> 	
				</div>  
			</div>   
			<nav class="sidebar-nav"> 
				<ul id="sidebarnav">   	
					<li class="nav-devider"></li>  	
					<li><a class="waves-effect waves-dark" href="create_test?id=<?php echo $_SESSION['categoryType']; ?>" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">CREATE TEST</span></a></li>	
					<li><a class="waves-effect waves-dark" href="previous_test_list" aria-expanded="false"><i class="fa fa-list-alt"></i><span class="hide-menu">PREVIOUS TESTS</span></a></li>
					<li><a class="waves-effect waves-dark" href="report_list" aria-expanded="false"><i class="fa fa-pie-chart"></i><span class="hide-menu">REPORTS</span></a></li>	
					<li><a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-question-circle"></i><span class="hide-menu">HELP</span></a></li>
					<li><a class="waves-effect waves-dark" href="../logout" aria-expanded="false"><i class="fa fa-sign-out"></i><span class="hide-menu">LOGOUT</span></a></li> 
				</ul> 
			</nav>     
		</div>   
	</aside>