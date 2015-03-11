<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
<title><?php echo $this->config->item('site_title'); if(isset($title))echo " ".$this->config->item('site_title_delimiter')." ".$title;?></title>
    <link type='text/css' href="<?php echo base_url();?>css/fonts.css" rel="stylesheet" type="text/css">
	<link type='text/css' href="<?php echo base_url();?>css/general.css" rel="stylesheet" type="text/css">
	<link type='text/css' href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css">
	<link type='text/css' href="<?php echo base_url();?>css/responsive.css" rel="stylesheet" type="text/css">
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/retina-1.1.0.js"></script>
	<script src="<?php echo base_url();?>js/jquery-scrolltofixed.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>js/organictabs.jquery.js"></script>
	<script src="<?php echo base_url();?>js/jquery.dropkick-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script>
	
	<script type="text/javascript" src="http://jquery-countdown.googlecode.com/svn/trunk/js/jquery.countdown.js"></script>
	
	<script type="text/javascript">
	function loadajax(type) {
		var datastr='type='+type;
		
		$('#containerdiv').fadeOut();
		$(window).scrollTop(0);
		$("#status").fadeIn();
		$("#preloader").fadeIn();
		
		
		$.ajax({
			url: '<?php echo site_url('ajax_load/ajaxindex');?>', 
			type: 'POST',
			data: datastr,
			success: function(response){
				
				$('.active').removeClass('active');
				$('#'+type).addClass('active');
				
				$(window).scrollTop(0);
				$("#status").fadeOut();
				$("#preloader").delay(350).fadeOut("slow");
				$('#containerdiv').fadeIn();
				
				$('#containerdiv').html(response);
				
				$('#left_m_type').val(1);
				click_div();
			}
		}); 
	}
	</script>
	
</head>
<body>
<div id="preloader" style="">
	<div id="status" style=""> </div>
</div>
