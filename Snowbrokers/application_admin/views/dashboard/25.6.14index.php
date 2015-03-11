<?php $this->load->view('includes/header'); 
?>
<style type="text/css">

	html, body, div, span, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	abbr, address, cite, code,
	del, dfn, em, img, ins, kbd, q, samp,
	small, strong, sub, sup, var,
	b, i,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td {
		margin:0;
		padding:0;
		border:0;
		outline:0;
		font-size:100%;
		vertical-align:baseline;
		background:transparent;
	}
	
	body {
		margin:0;
		padding:0;
		font:12px/15px "Helvetica Neue",Arial, Helvetica, sans-serif;
		color: #555;
		background:#f5f5f5 url(bg.jpg);
	}
	
	a {color:#666;}
	
	#content {width:65%; max-width:690px; margin:6% auto 0;}
	
	/*
	Pretty Table Styling
	CSS Tricks also has a nice writeup: http://css-tricks.com/feature-table-design/
	*/
	
	table {
		overflow:hidden;
		border:1px solid #d3d3d3;
		background:#fefefe;
		width:100%;
		margin:5% auto 0;
		-moz-border-radius:5px; /* FF1+ */
		-webkit-border-radius:5px; /* Saf3-4 */
		border-radius:5px;
		-moz-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
		-webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
	}
	
	th, td {padding:18px 28px 18px; text-align:center; }
	
	th {padding-top:22px; text-shadow: 1px 1px 1px #fff; background:#e8eaeb;}
	
	td {border-top:1px solid #e0e0e0; border-right:1px solid #e0e0e0;}
	
	tr.odd-row td {background:#f6f6f6;}
	
	td.first, th.first {text-align:left}
	
	td.last {border-right:none;}
	
	/*
	Background gradients are completely unnecessary but a neat effect.
	*/
	
	td {
		background: -moz-linear-gradient(100% 25% 90deg, #fefefe, #f9f9f9);
		background: -webkit-gradient(linear, 0% 0%, 0% 25%, from(#f9f9f9), to(#fefefe));
	}
	
	tr.odd-row td {
		background: -moz-linear-gradient(100% 25% 90deg, #f6f6f6, #f1f1f1);
		background: -webkit-gradient(linear, 0% 0%, 0% 25%, from(#f1f1f1), to(#f6f6f6));
	}
	
	th {
		background: -moz-linear-gradient(100% 20% 90deg, #e8eaeb, #ededed);
		background: -webkit-gradient(linear, 0% 0%, 0% 20%, from(#ededed), to(#e8eaeb));
	}
	
	
	
	tr:first-child th.first {
		-moz-border-radius-topleft:5px;
		-webkit-border-top-left-radius:5px; /* Saf3-4 */
	}
	
	tr:first-child th.last {
		-moz-border-radius-topright:5px;
		-webkit-border-top-right-radius:5px; /* Saf3-4 */
	}
	
	tr:last-child td.first {
		-moz-border-radius-bottomleft:5px;
		-webkit-border-bottom-left-radius:5px; /* Saf3-4 */
	}
	
	tr:last-child td.last {
		-moz-border-radius-bottomright:5px;
		-webkit-border-bottom-right-radius:5px; /* Saf3-4 */
	}

</style>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12"  style="padding-top:3px";>
            <h4 style="font-size: 17.5px;">Settings Area</h4>
        </div>
    </div>
    <div class="row-fluid">
	   <div id="main-stats">
		  <div class="row-fluid stats-row" style="background-color:#F7F7F5;">
	
	<?php
	
	$sitesetting = $this->modeladmin->access_avalible(3);
	if($sitesetting==0)
	{
		$style="display: none";
	}
	else{
	$style="display: block";	
	}
	$usermanagement = $this->modeladmin->access_avalible(1);
	if($usermanagement==0)
	{
		$style1="display: none";
	}
	else{
	$style1="display: block";	
	}
	$category_management = $this->modeladmin->access_avalible(2);
	if($category_management==0)
	{
		$style2="display: none";
	}
	else{
	$style2="display: block";	
	}
	$Article_management= $this->modeladmin->access_avalible(4);
	if($Article_management==0)
	{
		$style3="display: none";
	}
	else{
	$style3="display: block";	
	}
	$faq_management= $this->modeladmin->access_avalible(5);
	if($faq_management==0)
	{
		$style4="display: none";
	}
	else{
	$style4="display: block";	
	}
	$Email_management= $this->modeladmin->access_avalible(6);
	if($Email_management==0)
	{
		$style5="display: none";
	}
	else{
	$style5="display: block";	
	}
	$country_management= $this->modeladmin->access_avalible(7);
	if($country_management==0)
	{
		$style6="display: none";
	}
	else{
	$style6="display: block";	
	}
	$state_management= $this->modeladmin->access_avalible(8);
	if($state_management==0)
	{
		$style7="display: none";
	}
	else{
	$style7="display: block";	
	}
	?>
			 <div style="<?php echo $style; ?>">
			 <a href="<?php echo site_url('site_settings/index'); ?>" >
				<div class="span3 stat" style="height: 120px;" >
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398860524_settings-24.png" /></div>
				    <span class="date">Site Settings</span>
				</div>
			 </a>
			 </div>
			 <a href="<?php echo site_url('changepassword/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398860638_35.png" /></div>
				    <span class="date">Change Password</span>
				</div>
			 </a>
			 <div style="<?php echo $style3; ?>">
			 <a href="<?php echo site_url('article/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1399027053_article_square_black.png" /></div>
				    <span class="date">Article Management</span>
				</div>
			 </a>
	   </div>
			<!-- <a href="<?php echo site_url('media/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1399027131_volume-24.png" /></div>
				    <span class="date">Social Media</span>
				</div>
			 </a>-->
		  </div>
		  
	   </div>
    </div>
	<div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;padding-top: 10px;">
        <div class="span12"  style="padding-top:3px";>
            <h4 style="font-size: 17.5px;">Service Area</h4>
        </div>
    </div>
	<div class="row-fluid">
	   <div id="main-stats">
		  <div class="row-fluid stats-row" >
	<div style="<?php echo $style2; ?>">
			 <a href="<?php echo site_url('category/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398860273_category.png" /></div>
				    <span class="date">Category Management</span>
				</div>
			 </a>
		  </div>
			 <!--<a href="<?php echo site_url('subcategory/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398858280_category_settings.png" /></div>
				    <span class="date">SubCategory Management</span>
				</div>
			 </a>-->
			 
			 <!--<a href="<?php echo site_url('addsettings/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398858495_62-deviantart.png" /></div>
				    <span class="date">Advertisement Settings Management</span>
				</div>
			 </a>-->
			 
<!--			  <a href="<?php echo site_url('plan/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398858922_new-24.png" /></div>
				    <span class="date">Plan Management</span>
				</div>
			 </a>-->
			 <div style="<?php echo $style4; ?>">
			  <a href="<?php echo site_url('faq/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398868338_69.png" /></div>
				    <span class="date">Faq Management</span>
				</div>
			 </a>
	   </div>
	   <div style="<?php echo $style1; ?>">
			  <a href="<?php echo site_url('user/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398858726_87.png" /></div>
				    <span class="date">Users Management</span>
				</div>
			 </a>
	</div>
			<!-- <a href="<?php echo site_url('newsletter/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398859186_06.png" /></div>
				    <span class="date">Newsletter Management</span>
				</div>
			 </a>-->
			 <!--<a href="<?php echo site_url('manage_listing/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398866942_46_List.png" /></div>
				    <span class="date">Manage listing Management</span>
				</div>
			 </a>-->
		  </div>
		  
	   </div>
    </div>
	<div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;padding-top: 10px;">
        <div class="span12"  style="padding-top:3px";>
            <h4 style="font-size: 17.5px;">Location Area</h4>
        </div>
    </div>
	<div class="row-fluid">
	   <div id="main-stats">
		  <div class="row-fluid stats-row" style="background-color:#F7F7F5;">
		  <div style="<?php echo $style6; ?>">
			 <a href="<?php echo site_url('country/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398860969_59.png" /></div>
				    <span class="date">Country Management</span>
				</div>
			 </a>
		  </div>
		  <div style="<?php echo $style7; ?>">
			 <a href="<?php echo site_url('state/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398861234_33.png" /></div>
				    <span class="date">State Management</span>
				</div>
			 </a>
	   </div>
			  <!--<a href="<?php echo site_url('citymanagement/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398861140_137.png" /></div>
				    <span class="date">City Management</span>
				</div>
			 </a>-->
			 
			  <!--<a href="<?php echo site_url('location/index'); ?>">
				<div class="span3 stat" style="height: 120px;">
				    <div class="data"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/icons/1398860903_location-24.png" /></div>
				    <span class="date">Location Management</span>
				</div>
			 </a>-->
		  </div>
		  
	   </div>
    </div>
	
	
	
	
	<!-- modifyed by taniya-->
	<div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;padding-top: 20px;font-size: 15px;">
        <div class="span12" >
			<center><h3><b>Site Usage Statistics</b></h3></center></p>
			</div>
	</div>
	<div class="row-fluid">
	   <div id="main-stats">
	<div class="row-fluid stats-row">
	<table cellspacing="0">
							
								<tr>
									
									<th colspan="2" align="right;"><h4 style="font-size: 15px;padding-top: 10px;padding-left: 150px;"><b>Today<b></h4></th>
									
									<th><h4 style="font-size: 15px;padding-top: 10px;"><b><center>Yesterday</center><b></h4></th>
									
									<th ><h4 style="font-size: 15px;padding-top: 10px;"><b><center>Last 30 days</center><b></h4></th>
									
									
								</tr>
							
							
							
								
										<!-- row 
										<tr style="height: 100px;">
											<td><h4 style="font-size: 15px;padding-top: 20px;"><b>ADS<b></h4></td>
											<td><h4><center>0</center></h4></td>
											<td><h4><center>0</center></h4></td>
											<td><h4><center>0</center></h4></td>
											
											
										</tr>-->
										
										<tr style="height: 100px;">
											<td><h4 style="font-size: 15px;padding-top: 20px;"><b>Visits<b></h4></td>
											<?php
												if(count($get_usage) > 0)
												{
											?>
													<td><h4><center><?php echo $get_usage[0]->site_view; ?></center></h4></td>
											<?php
												}
												else
												{
													?>
												<td><h4><center><?php echo '0'; ?></center></h4></td>
												<?php
												}
												
												$recentData = $this->siteusagemodel->get_usage_yesterday();
												
												if(count($recentData) > 0)
												{
													?>
													
													<td><h4><center><?php echo $recentData[0]->site_view; ?></center></h4></td>
												<?php	
												}
												else
												{
												?>
													<td><h4><center><?php echo '0'; ?></center></h4></td>
												<?php
												}
												
											?>
														    
													
											
											<?php
											
							$totalview= $this->siteusagemodel->get_usage_lastfewday();
							
										if(count($totalview) > 0)
										{
											
									?>
									
					<td><h4><center><?php echo $totalview[0]->total_view; ?></center></h4></td>
									<?php
										}
										else
										{
											?>
						<td><h4><center><?php echo '0'; ?></center></h4></td>
										<?php
										
										}?>
								
								
										
											
										</tr>
										
										
										<tr style="height: 100px;">
											<td><h4 style="font-size: 15px;padding-top: 20px;"><b>Registered<b></h4></td>
											<?php
											$todayData = $this->siteusagemodel->get_registerd_today();
											
												if($todayData !='')
												{
											?>
													<td><h4><center><?php echo $todayData; ?></center></h4></td>
											<?php
												}
												else
												{
													?>
															<td><h4><center>0</center></h4></td>

													<?php
												}
												
												
												$yesterdayData = $this->siteusagemodel->get_registerd_yesterday();
												
												if($yesterdayData!='')
												{
													?>
													
													<td><h4><center><?php echo $yesterdayData; ?></center></h4></td>
												<?php	
												}
												else{
													?>
													<td><h4><center>0</center></h4></td>

													<?php
												}
												
												
											?>
														    
													
											
											<?php
											
							$totalview= $this->siteusagemodel->get_registerd_lastfewday();
							
										if($totalview !='')
										{
											
									?>
									
					<td><h4><center><?php echo $totalview;?></center></h4></td>
									<?php
										}
										else{
											?>
												<td><h4><center>0</center></h4></td>

											<?php
											
										}
									?>
								
								
										
											
										</tr>
										
										<!--<tr style="height: 100px;">
											 <td><h4 style="font-size: 15px;padding-top: 20px;"><b>Sales<b></h4></td>
											<td><h4><center>0</center></h4></td>
											<td><h4><center>0</center></h4></td>
											<td><h4><center>0</center></h4></td>
											
										</tr>-->
										
							</tbody>
			     			
		                      </table>
			
		  </div>
		  
	   </div>
    </div>
	<!--modified by taniya-->
</div>
<?php $this->load->view('includes/footer'); ?>