<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $this->session->userdata('site_name');?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- new code -->
	<title>Detail Admin - Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?php echo base_url();?>assets/nw/ckeditor/ckeditor.js"></script>
	
    <!-- bootstrap -->
    <link href="<?php echo base_url();?>assets/nw/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/nw/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/nw/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="<?php echo base_url();?>assets/nw/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/nw/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/nw/css/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/nw/css/elements.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/nw/css/icons.css">
	
	<!-- this page user styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/nw/css/compiled/user-list.css" type="text/css" media="screen" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/nw/css/compiled/index.css" type="text/css" media="screen" />    

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<!-- end new code -->
</head>
<body>
	<!-- new header-->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="<?php echo base_url(); ?>admin"><img src="<?php echo base_url();?>assets/nw/img/logo.png"></a>

            <ul class="nav pull-right">                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        <?php echo $this->session->userdata('user_name'); ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">                        
                        <li><a href="<?php echo base_url(); ?>admin/myaccount">My Account</a></li>                                        
						<li><a href="<?php echo base_url(); ?>admin/logout">Logout</a></li>
                    </ul>
                </li>
            </ul> 
                       
        </div>
    </div>
	<!-- end new header-->	
<?php
	$current_page = basename($_SERVER['PHP_SELF']);
?>
	<!-- left menu-->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
        	
			<li class="active">
				<?php
					if($current_page=="dashboard")
					{
					?>
					<div class="pointer">
						<div class="arrow"></div>
						<div class="arrow_border"></div>
					</div>
				<?php } ?>

                <a class="ajax-link" href="<?php echo base_url(); ?>admin/dashboard">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li> 
			
			<li>
				<?php
					if($current_page=="myaccount" || $current_page=="chngpassword" || $current_page=="sitesetting")
					{
					?>
					<div class="pointer">
						<div class="arrow"></div>
						<div class="arrow_border"></div>
					</div>
				<?php } ?>
                		
				<a class="dropdown-toggle" href="#">                    
                    <i class="icon-cog"></i>
                    <span>Setting</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo base_url(); ?>admin/myaccount">My Account</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/chngpassword">Change Password</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/sitesetting">Site Setting</a></li>
                </ul>
			</li>
			
			<li>
				<?php
					if($current_page=="pages")
					{
					?>
					<div class="pointer">
						<div class="arrow"></div>
						<div class="arrow_border"></div>
					</div>
				<?php } ?>
				
				<div id="staticPage" class="pointer" style="display: none">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
				
				<a class="ajax-link" href="<?php echo base_url(); ?>admin/pages">
					<i class="icon-edit"></i>
					<span class="hidden-tablet">Static Pages </span>
				</a>
			</li>
			
			<li>
				<?php
					if($current_page=="admin_users")
					{
					?>
					<div class="pointer">
						<div class="arrow"></div>
						<div class="arrow_border"></div>
					</div>
				<?php } ?>
				
				<div id="userManagement" class="pointer" style="display: none">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
				<a class="ajax-link" href="<?php echo base_url(); ?>admin/admin_users/">
					<i class="icon-group"></i>
					<span class="hidden-tablet">User Management </span>
				</a>
			</li>
        	
		<li>
		  <?php
			  if($current_page=="admin_category")
			  {
			  ?>
			  <div class="pointer">
				  <div class="arrow"></div>
				  <div class="arrow_border"></div>
			  </div>
		  <?php } ?>

		  <a class="ajax-link" href="<?php echo base_url(); ?>admin/admin_category/">
		  <i class="icon-sitemap"></i>
		    <span class="hidden-tablet">Category Management </span>
		  </a>
		</li>
		
		<li>
		  <?php
			  if($current_page=="admin_product")
			  {
			  ?>
			  <div class="pointer">
				  <div class="arrow"></div>
				  <div class="arrow_border"></div>
			  </div>
		  <?php } ?>

		  <a class="ajax-link" href="<?php echo base_url(); ?>admin/admin_product/">
		  <i class="icon-shopping-cart"></i>
		    <span class="hidden-tablet">Product Management </span>
		  </a>
		</li>
		
		
		<li>
		    <a class="ajax-link" href="<?php echo base_url(); ?>admin/admin_country_management/">
		  <i class="icon-plane"></i>
		    <span class="hidden-tablet">Country Management </span>
		  </a>
		</li>
		<li>
		    <a class="ajax-link" href="<?php echo base_url(); ?>admin/color_controler/">
		  <i class="icon-adjust"></i>
		    <span class="hidden-tablet">Color Management </span>
		  </a>
		</li>
		<li>
		    <a class="ajax-link" href="<?php echo base_url(); ?>admin/admin_size_controller/">
		  <i class="icon-move"></i>
		    <span class="hidden-tablet">Size Management </span>
		  </a>
		</li>
		<li>
		    <a class="ajax-link" href="<?php echo base_url(); ?>admin/admin_mail_controller/">
		  <i class="icon-envelope-alt"></i>
		    <span class="hidden-tablet"> Subscriber Mail </span>
		  </a>
		</li>
           <!--            
            <li>
                <a href="chart-showcase.html">
                    <i class="icon-signal"></i>
                    <span>Charts</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Users</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">User list</a></li>
                    <li><a href="new-user.html">New user form</a></li>
                    <li><a href="user-profile.html">User profile</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>Forms</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="form-showcase.html">Form showcase</a></li>
                    <li><a href="form-wizard.html">Form wizard</a></li>
                </ul>
            </li>
            <li>
                <a href="gallery.html">
                    <i class="icon-picture"></i>
                    <span>Gallery</span>
                </a>
            </li>
            <li>
                <a href="calendar.html">
                    <i class="icon-calendar-empty"></i>
                    <span>Calendar</span>
                </a>
            </li>
            <li>
                <a href="tables.html">
                    <i class="icon-th-large"></i>
                    <span>Tables</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle ui-elements" href="#">
                    <i class="icon-code-fork"></i>
                    <span>UI Elements</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="ui-elements.html">UI Elements</a></li>
                    <li><a href="icons.html">Icons</a></li>
                </ul>
            </li>
            <li>
                <a href="personal-info.html">
                    <i class="icon-cog"></i>
                    <span>My Info</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-share-alt"></i>
                    <span>Extras</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="code-editor.html">Code editor</a></li>
                    <li><a href="grids.html">Grids</a></li>
                    <li><a href="signin.html">Sign in</a></li>
                    <li><a href="signup.html">Sign up</a></li>
                </ul>
            </li> -->
        </ul>
    </div>
	<!-- end left menu -->	
	
	<div class="content">
		<div class="container-fluid" style="margin-top: 20px; margin-bottom: 20px;">
		           
			<div id="content">
					
			
			
			
