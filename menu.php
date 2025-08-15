<div class="menu-box text-center">
							<a href="javascrip:;" id="toggle">Menu <span></span></a>
							<div id="menu">
								<div class="row">
									<div class="col-md-2"></div>
									<?php
										$category_info = get_table_data('tbl_category', 'id!="" AND parent_id = "0" AND status = "Active" ');
										if($category_info!='')
										{
											foreach($category_info as $key => $value)
											{
												?>
												<div class="col-md-2">
													<h4 style="color: #fda100;"><?php echo $value->category_name;?></h4>
													<?php
														$subcategory_info = get_table_data('tbl_category', 'id!="" AND parent_id = "'.$value->id.'" AND status = "Active" ');
														if($subcategory_info!='')
														{
															foreach($subcategory_info as $key => $val)
															{
															?>
															<ul>
																<li><a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'] ?>/category/<?php echo $val->slug;?>" style="color: #FFF;"><?php echo $val->category_name;?></a></li>
															</ul>
															<?php
															}
														}
													?>
												</div>
												<?php
											}
										}
									?>
									<div class="col-md-2"></div>
								</div>
							</div>
						</div>
						<!--menu center-->		