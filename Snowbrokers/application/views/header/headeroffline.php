<?php
    $settings_row=$this->db->query("select * from site_settings where `field_name`='site_offline'");

	$row=$settings_row->result();
	foreach ($settings_row->result() as $row)
	{
	  $siteoffline=$row->field_value;
	}
	
	if($siteoffline==0)
	{
?>
		<script> location.href="<?php echo site_url('home/index');?>"</script>
<?php
	}
	
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<!-- title of page -->
<title>SportypEEps</title>

<!-- favicon -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.png" />

<!-- Fonts link -->
<link href="<?php echo base_url(); ?>css/fonts.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>css/fontello.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>css/glyphicon.css" rel="stylesheet" type="text/css">

<!-- Css for the pages -->
<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>css/templates.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>css/select.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-filestyle.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/developer.css" type="text/css" />
<!-- responsive -->
<link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet" type="text/css">

<!-- scripts -->
<script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/imgareaselect-default.css" />

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.imgareaselect.pack.js"></script>
</head>
<body>
<header class="header">
	<div class="container">
	    <div class="navbar-header">
	      	<a href="<?php echo site_url("home/index");?>" class="navbar-brand"><img src="<?php echo base_url();?>images/logo.png" alt="" /></a>
			
	    </div>
	</div>
</header>
</body>
</html>