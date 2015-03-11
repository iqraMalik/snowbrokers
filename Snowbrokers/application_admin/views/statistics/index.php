<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>Detail Admin - Dashboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php 
		$data_url = "http://esolz.co.in/lab3/alDente/admin/";
		$data_admin_static_image_url = $data_url."assets/img/admin/";
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
            
            <a class="brand" href="index.html"><img src="<?php echo $data_admin_static_image_url; ?>/logo.png"></a>

            <ul class="nav pull-right">                
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>
                <li class="settings hidden-phone">
                    <a href="<?php echo base_url();?>logout" role="button">
                        Logout
                    </a>
                </li>
            </ul>            
        </div>
    </div>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
        <!-- <a class="btn-glow success" href="new-movies.html"> &nbsp;+ NEW MOVIES &nbsp;</a> -->
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="<?php echo base_url(); ?>dashboard/index">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
           
             <li>
                <a href="#" class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
                    <span>Sub Admin</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">Add New</a></li>
                    <li><a href="new-user.html">View Listing</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Users</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">User list</a></li>
                    <li><a href="new-user.html">Add new user</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Users</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">User list</a></li>
                    <li><a href="new-user.html">Add new user</a></li>
                </ul>
            </li>
            
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Users</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">User list</a></li>
                    <li><a href="new-user.html">Add new user</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Users</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">User list</a></li>
                    <li><a href="new-user.html">Add new user</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Users</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">User list</a></li>
                    <li><a href="new-user.html">Add new user</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Users</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">User list</a></li>
                    <li><a href="new-user.html">Add new user</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Users</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">User list</a></li>
                    <li><a href="new-user.html">Add new user</a></li>
                </ul>
            </li>
            
            
        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">

        <!-- settings changer -->
        
        <div class="container-fluid">
        	
            <!-- upper main stats -->
            <div id="main-stats">
                <div class="row-fluid stats-row">
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">33</span>New
                        </div>
                        <span class="date">Reservations</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">102</span>
                            Cupons
                        </div>
                        <span class="date">Scanned</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">122</span>
                            Contacts
                        </div>
                        <span class="date">New</span>
                    </div>
                    <div class="span3 stat last">
                        <div class="data">
                            <span class="number">100</span>
                            Cupons
                        </div>
                        <span class="date">Remaining</span>
                    </div>
                </div>
            </div>
            <!-- end upper main stats -->
            <div id="pad-wrapper">

                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div class="table-products">
                    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
                        <div class="span12">
                            <h4>Action Area</h4>
                        </div>
                    </div>

                    <div class="row-fluid">
	                        <div id="main-stats">
				                <div class="row-fluid stats-row" style="border-bottom: 1px solid #DAE1E8; margin-bottom: 5px;">
				                	<a href="<?php echo base_url(); ?>user/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>SUB_ADMIN.png" />
				                        </div>
				                        <span class="date">User</span>
				                    </div>
				                    </a>
				                    <a href="<?php echo base_url(); ?>siteettings/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>SITE_SETTINGS.png" />
				                        </div>
				                        <span class="date">Site Settings</span>
				                    </div>
				                    </a>
				                    <a href="<?php echo base_url(); ?>contacts/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>CONTACTS.png" />
				                        </div>
				                        <span class="date">Contacts</span>
				                    </div>
				                    </a>
				                    <a href="<?php echo base_url(); ?>reservation/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>RESERVATION.png" />
				                        </div>
				                        <span class="date">Reservation</span>
				                    </div>
				                    </a>
				                </div>
				                <div class="row-fluid stats-row" style="border-bottom: 1px solid #DAE1E8; margin-bottom: 5px;">
				                	<a href="<?php echo base_url(); ?>walkinlist/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>Walkin.png" />
				                        </div>
				                        <span class="date">Walkin List</span>
				                    </div>
				                    </a>
				                    <a href="<?php echo base_url(); ?>waitinglist/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>Waiting.png" />
				                        </div>
				                        <span class="date">Waiting List</span>
				                    </div>
				                    </a>
				                    <a href="<?php echo base_url(); ?>coupons/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>Coupons.png" />
				                        </div>
				                        <span class="date">Coupons</span>
				                    </div>
				                    </a>
				                    <a href="<?php echo base_url(); ?>statistics/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>statistics.png" />
				                        </div>
				                        <span class="date">Statistics</span>
				                    </div>
				                    </a>
				                </div>
				                <div class="row-fluid stats-row">
				                	<a href="<?php echo base_url(); ?>emailmanagement/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>Email.png" />
				                        </div>
				                        <span class="date">Email Management</span>
				                    </div>
				                    </a>
				                    <a href="<?php echo base_url(); ?>reviewlist/index">
				                    <div class="span3 stat" style="height: 120px;">
				                        <div class="data">
				                            <img src="<?php echo $data_admin_iocns_url; ?>Review.png" />
				                        </div>
				                        <span class="date">Review List</span>
				                    </div>
				                    </a>
				                </div>
	            			</div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
	<!-- scripts -->
    <script src="<?php echo $data_url; ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo $data_url; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $data_url; ?>assets/js/theme.js"></script>
    <!-- scripts -->
    <script src="<?php echo $data_url; ?>assets/js/jquery-ui-1.10.2.custom.min.js"></script>
    <!-- knob -->
    <script src="<?php echo $data_url; ?>assets/js/jquery.knob.js"></script>
    <!-- flot charts -->
    <script src="<?php echo $data_url; ?>assets/js/jquery.flot.js"></script>
    <script src="<?php echo $data_url; ?>assets/js/jquery.flot.stack.js"></script>
    <script src="<?php echo $data_url; ?>assets/js/jquery.flot.resize.js"></script>
</body>
</html>