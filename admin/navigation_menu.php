					<nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-menu-user img-radius" src="files/assets/images/dummy.jpg" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <p id="more-details"><?php echo $functions->get_profile_name($_SESSION['user_login']); ?><i class="feather icon-chevron-down m-l-10"></i></p>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
										<a href="profile">
                                            <i class="feather icon-user"></i>View Profile
                                        </a>
										<a href="logout">
                                            <i class="feather icon-log-out"></i>Logout
                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pcoded-navigation-label">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
								<li <?php if(isset($page_act) && $page_act == "1") { echo " class='active' ";}?>">
									<a href="dashboard" class="waves-effect waves-dark">
        								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
								<?php if($_SESSION['user_type'] == 'admin') {?>
								<li class="pcoded-hasmenu <?php if(isset($page_act) && $page_act == "2") { echo "active pcoded-trigger";}?>">
									<a href="javascript:void(0)" class="waves-effect waves-dark">
										<span class="pcoded-micon"><i class="feather icon-users"></i></span>
										<span class="pcoded-mtext">Subadmin</span>
									</a>
                                    <ul class="pcoded-submenu">
                                        <li <?php if(isset($subpage_act) && $subpage_act == "1") { echo " class='active' ";}?>>
                                            <a href="subadmin" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Subadmin List</span>
											</a>
                                        </li>
                                        <li <?php if(isset($subpage_act) && $subpage_act == "2") { echo " class='active' ";}?>>
                                            <a href="add_subadmin" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add New</span>
											</a>
                                        </li>
                                    </ul>
                                </li>
								<?php } ?>
								<li class="pcoded-hasmenu <?php if(isset($page_act) && $page_act == "9") { echo "active pcoded-trigger";}?>">
									<a href="javascript:void(0)" class="waves-effect waves-dark">
										<span class="pcoded-micon"><i class="feather icon-user"></i></span>
										<span class="pcoded-mtext">Users</span>
									</a>
                                    <ul class="pcoded-submenu">
                                        <li <?php if(isset($subpage_act) && $subpage_act == "21") { echo " class='active' ";}?>>
                                            <a href="users" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Users List</span>
											</a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu <?php if(isset($page_act) && $page_act == "10") { echo "active pcoded-trigger";}?>">
									<a href="javascript:void(0)" class="waves-effect waves-dark">
										<span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
										<span class="pcoded-mtext">Tests</span>
									</a>
                                    <ul class="pcoded-submenu">
                                        <li <?php if(isset($subpage_act) && $subpage_act == "22") { echo " class='active' ";}?>>
                                            <a href="tests" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Tests List</span>
											</a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu <?php if(isset($page_act) && $page_act == "3") { echo "active pcoded-trigger";}?>">
									<a href="javascript:void(0)" class="waves-effect waves-dark">
										<span class="pcoded-micon"><i class="feather icon-list"></i></span>
										<span class="pcoded-mtext">Categories</span>
									</a>
									<ul class="pcoded-submenu">
										<li <?php if(isset($subpage_act) && $subpage_act == "3") { echo " class='active' ";}?>>
											<a href="category" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Category List</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "4") { echo " class='active' ";}?>>
											<a href="main_category" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add Main Category</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "5") { echo " class='active' ";}?>>
											<a href="subcategory" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Subcategory List</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "6") { echo " class='active' ";}?>>
											<a href="sub_category" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add Sub Category</span>
											</a>
										</li>
									</ul>
                                </li>
								<li class="pcoded-hasmenu <?php if(isset($page_act) && $page_act == "4") { echo "active pcoded-trigger";}?>">
									<a href="javascript:void(0)" class="waves-effect waves-dark">
										<span class="pcoded-micon"><i class="feather icon-list"></i></span>
										<span class="pcoded-mtext">Types</span>
									</a>
									<ul class="pcoded-submenu">
										<li <?php if(isset($subpage_act) && $subpage_act == "7") { echo " class='active' ";}?>>
											<a href="types" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Type List</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "8") { echo " class='active' ";}?>>
											<a href="add_type" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add New Type</span>
											</a>
										</li>
									</ul>
                                </li>
								<li class="pcoded-hasmenu <?php if(isset($page_act) && $page_act == "5") { echo "active pcoded-trigger";}?>">
									<a href="javascript:void(0)" class="waves-effect waves-dark">
										<span class="pcoded-micon"><i class="fa fa-newspaper-o"></i></span>
										<span class="pcoded-mtext">Subjects</span>
									</a>
									<ul class="pcoded-submenu">
										<li <?php if(isset($subpage_act) && $subpage_act == "9") { echo " class='active' ";}?>>
											<a href="subjects" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Subject List</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "10") { echo " class='active' ";}?>>
											<a href="add_subject" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add New Subject</span>
											</a>
										</li>
									</ul>
                                </li>
								<li class="pcoded-hasmenu <?php if(isset($page_act) && $page_act == "6") { echo "active pcoded-trigger";}?>">
									<a href="javascript:void(0)" class="waves-effect waves-dark">
										<span class="pcoded-micon"><i class="fa fa-pencil-square-o"></i></span>
										<span class="pcoded-mtext">Topics</span>
									</a>
									<ul class="pcoded-submenu">
										<li <?php if(isset($subpage_act) && $subpage_act == "11") { echo " class='active' ";}?>>
											<a href="topics" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Topic List</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "12") { echo " class='active' ";}?>>
											<a href="add_topic" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add New Topic</span>
											</a>
										</li>
									</ul>
                                </li>
								<li class="pcoded-hasmenu <?php if(isset($page_act) && $page_act == "7") { echo "active pcoded-trigger";}?>">
									<a href="javascript:void(0)" class="waves-effect waves-dark">
										<span class="pcoded-micon"><i class="fa fa-question-circle-o"></i></span>
										<span class="pcoded-mtext">Questions</span>
									</a>
									<ul class="pcoded-submenu">
										<li <?php if(isset($subpage_act) && $subpage_act == "13") { echo " class='active' ";}?>>
											<a href="questions" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Question List</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "14") { echo " class='active' ";}?>>
											<a href="add_questions" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add New Question</span>
											</a>
										</li>
									</ul>
                                </li>
								<?php if($_SESSION['user_type'] == 'admin') {?>
								<li class="pcoded-hasmenu <?php if(isset($page_act) && $page_act == "8") { echo "active pcoded-trigger";}?>">
									<a href="javascript:void(0)" class="waves-effect waves-dark">
										<span class="pcoded-micon"><i class="fa fa-cog"></i></span>
										<span class="pcoded-mtext">Settings</span>
									</a>
									<ul class="pcoded-submenu">
										<li <?php if(isset($subpage_act) && $subpage_act == "15") { echo " class='active' ";}?>>
											<a href="settings" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Setting List</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "16") { echo " class='active' ";}?>>
											<a href="add_setting" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add Setting</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "17") { echo " class='active' ";}?>>
											<a href="packages" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Packages List</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "18") { echo " class='active' ";}?>>
											<a href="add_package" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add Package</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "19") { echo " class='active' ";}?>>
											<a href="discounts" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Discount List</span>
											</a>
										</li>
										<li <?php if(isset($subpage_act) && $subpage_act == "20") { echo " class='active' ";}?>>
											<a href="add_discount" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Add Discount</span>
											</a>
										</li>

										<li <?php if(isset($subpage_act) && $subpage_act == "23") { echo " class='active' ";}?>>
											<a href="edit_help" class="waves-effect waves-dark">
												<span class="pcoded-mtext">Help</span>
											</a>
										</li>

									</ul>
                                </li>
								<?php } ?>
							</ul>
                        </div>
                    </nav>