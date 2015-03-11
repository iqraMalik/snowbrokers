<!DOCTYPE html>
<html class="login-bg">
	<head>
		<title>Sports Admin - Dashboard</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php 
			$data_url = base_url();
			$data_admin_iocns_url = $data_url."assets/img/admin/icons/"
		?>
		<!-- bootstrap -->
		<link href="<?php echo $data_url; ?>assets/css/admin/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="<?php echo $data_url; ?>assets/css/admin/bootstrap/bootstrap-responsive.css" rel="stylesheet">
		<link href="<?php echo $data_url; ?>assets/css/admin/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">
	 
		<!-- global styles -->
		<link rel="stylesheet" type="text/css" href="<?php echo $data_url; ?>assets/css/admin/layout.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $data_url; ?>assets/css/admin/elements.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $data_url; ?>assets/css/admin/icons.css">
	 
		<!-- libraries -->
		<link rel="stylesheet" type="text/css" href="<?php echo $data_url; ?>assets/css/admin/lib/font-awesome.css">
		
		<!-- this page specific styles -->
		<link rel="stylesheet" href="<?php echo $data_url; ?>assets/css/admin/compiled/index.css" type="text/css" media="screen" />
		
		<script src="<?php echo $data_url; ?>assets/js/jquery-1.7.1.min.js"></script>
		<script src="<?php echo $data_url; ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo $data_url; ?>assets/js/theme.js"></script>
		 <!-- <!-- scripts -->
		
		<!-- scripts -->
		<script src="<?php echo $data_url; ?>assets/js/jquery-ui-1.10.2.custom.min.js"></script>
		<!-- knob -->
		<script src="<?php echo $data_url; ?>assets/js/jquery.knob.js"></script>
		<!-- flot charts -->
		<script src="<?php echo $data_url; ?>assets/js/jquery.flot.js"></script>
		<script src="<?php echo $data_url; ?>assets/js/jquery.flot.stack.js"></script>
		<script src="<?php echo $data_url; ?>assets/js/jquery.flot.resize.js"></script>
		
		<!-- open sans font -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!-- open sans font -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<!-- navbar -->
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			  
				<a class="brand" href="<?php echo site_url('dashboard/index'); ?>"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/admin/logo.png"></a>
	
				<ul class="nav pull-right">                
					<!--<li class="hidden-phone">
					    <input class="search" type="text" />
					</li>-->
					<?php
					//$site_name=str_replace('admin/index.php','',site_url());
					
					?>
				
				
					<!--<li class="settings hidden-phone">
							<a href="<?php //echo base_url();?>index.php/langswitch/switchLanguage/english">
								<img class="logo" src="<?php //echo main_url(); ?>images/england.png" height="32px" width="32px">
							</a>
					</li>
					<li class="settings hidden-phone">
							<a href="<?php //echo base_url();?>index.php/langswitch/switchLanguage/pashto">
								<img class="logo" src="<?php //echo main_url(); ?>images/afghanistan.png" height="32px" width="32px">
							</a>
					</li>
					<li class="settings hidden-phone">
							<a href="<?php //echo base_url();?>index.php/langswitch/switchLanguage/persian">
								<img class="logo" src="<?php //echo main_url(); ?>images/Iran.png" height="32px" width="32px">
							</a>
					</li>-->
					<?php
					$site_name=str_replace('admin/index.php','',site_url());
					
					?>
					<li class="settings hidden-phone"><a href="<?php echo $site_name;?>" role="button" target="_blank">View Site</a></li>
					<li class="settings hidden-phone"><a href="<?php echo site_url('logout');?>" role="button">Logout</a></li>
				</ul>            
			</div>
		</div>
		<!-- end navbar -->
	
		<!-- sidebar -->
			<div id="sidebar-nav"><?php $this->load->view('includes/sidenavigationbar'); ?></div>
		<!-- end sidebar -->
	
		<!-- main container -->
		<div class="content">
			<!-- settings changer -->
			<div class="container-fluid">
				<!-- upper main stats -->
				<?php
				if($this->uri->segment(1)=='dashboard')
				{
					
					$register_user_business =$this->modeladmin->usernumber();
				?>
				<div id="main-stats">
				    <div class="row-fluid stats-row" style="background-color:#DAE1E8">
					   <div class="span3 stat">
						<div class="data">
						    <span class="number"><?php echo $register_user_business;?></span>Total
						</div>
						<span class="date" style="color:#000">Registered member</span>
					    </div>
					    
					    <div class="span3 stat">
						<div class="data">
						    <span class="number">$5633</span>
						    Total
						</div>
						<span class="date" style="color:#000">Income</span>
					    </div>
						<div class="span3 stat">
						<div class="data">
						    <span class="number"><?php //echo $register_user_individual;?></span>
						    Total
						</div>
						<span class="date" style="color:#000">Individual members</span>
					    </div>
					    
				    </div>
				</div>
				<?php
				}
				?>
				<!-- end upper main stats -->
				<div id="pad-wrapper">
					<?php
					
						if($this->session->userdata('success_msg'))
						{
							echo $this->session->userdata('success_msg');
							$this->session->unset_userdata('success_msg');
							//$this->session->userdata('success_msg','');
						}
						
						if($this->session->userdata('error_msg'))
						{
							echo $this->session->userdata('error_msg');
							$this->session->unset_userdata('error_msg');
							//$this->session->userdata('error_msg','');
						}
						
					?>