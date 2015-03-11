<title>SportypEEps</title>

<!-- favicon -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" type="<?php echo base_url(); ?>image/png" href="images/favicon.png" />

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
<link rel="stylesheet" href="<?php echo base_url(); ?>css/selectricnew.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css" type="text/css" />
<!-- responsive -->
<link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet" type="text/css">

<!-- scripts -->
<script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js" type="text/javascript"></script>
<!--bootstrap -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>js/html5.js" type="text/javascript"></script>
<![endif]-->
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<script>
	$(window).load(function() {
	$(window).scrollTop(0);
	$("#status").fadeOut();
	$("#preloader").delay(350).fadeOut("slow");
	});
</script>	
<script>
	////SideBar
	$(window).resize(function() {
		var win_width = $(window).width();
		if(win_width >= 991 ) {
			$(".sidebar-trigger").removeClass("sidebar-trigger-Open");
			$('.overlay').remove();
			$('.Innermidbox').removeAttr("style");
			$(".Right-Profile").removeAttr("style");
		}
	});
	$(document).ready(function() {
		$(".sidebar-trigger,.overlay").click(function() {
		var widow_width = $(window).width();
		if(widow_width < 991 ) {
				if($('.Innermidbox').hasClass("sidebar-open")){
					$('.sidebar-trigger').removeClass("sidebar-trigger-Open");
					$('.Innermidbox').animate({left:-1,}, 100, 'linear');
					$('.Right-Profile').animate({left:-260,}, 100, 'linear');
					$('.Innermidbox').removeAttr("style");
					$('.Innermidbox').removeClass("sidebar-open");
					$('.overlay').css("display","none");
					$('.blogouter-right').animate({right:-264,}, 100, 'linear');
					return false;
				}
				else{
					$('.sidebar-trigger').addClass("sidebar-trigger-Open");
					$('.Innermidbox').animate({left:260}, 100, 'linear');
					$('.Right-Profile').animate({left:0}, 100, 'linear');
					$('.Innermidbox').addClass("sidebar-open");
					$('.overlay').css("display","block");
				}
			}
		});
	
	});
</script>
<script>
	////SideBar
	$(window).resize(function() {
		var win_width = $(window).width();
		if(win_width >= 991 ) {
			$(".sidebar-trigger-new").removeClass("sidebar-trigger-Open");
			$('.overlay').remove();
			$('.Innermidbox').removeAttr("style");
			$(".blogouter-right").removeAttr("style");
		}
	});
	
	$(document).ready(function() {
		$(".sidebar-trigger-new,.overlay").click(function() {
		var widow_width = $(window).width();
			if(widow_width < 991 ) {
				if($('.Innermidbox').hasClass("sidebar-open")){
					$('.sidebar-trigger-new').removeClass("sidebar-trigger-Open");
					$('.Innermidbox').animate({right:1,}, 100, 'linear');
					$('.blogouter-right').animate({right:-260,}, 100, 'linear');
					$('.Innermidbox').removeAttr("style");
					$('.Innermidbox').removeClass("sidebar-open");
					$('.overlay').css("display","none");
					$('.Right-Profile').animate({left:-260,}, 100, 'linear');
					return false;
				}
				else{
					
					$('.Innermidbox').removeAttr("style");
					$('.sidebar-trigger-new').addClass("sidebar-trigger-Open");
					$('.Innermidbox').animate({right:260}, 100, 'linear');
					$('.blogouter-right').animate({right:15}, 100, 'linear');
					$('.Innermidbox').addClass("sidebar-open");
					$('.overlay').css("display","block");
				}
			}
		});
	
	});
</script>
<script src="<?php echo base_url(); ?>js/jquery.screwdefaultbuttonsV2.js"></script>
<script type="text/javascript">
		$(function(){
			
			$('.checkbox-new').screwDefaultButtons({
				image: 'url("<?php echo base_url(); ?>images/check.png")',
				width: 14,
				height: 14
			});	
			$('.radio-new').screwDefaultButtons({
				image: 'url("<?php echo base_url(); ?>images/radio.png")',
				width: 27,
				height: 27
			});
			});
		</script>

<script src="<?php echo base_url(); ?>js/jquery.selectric_page.js"></script>
<script>
  $(function(){
    $('select, .select').selectricnew();
  });
  
document.getElementById("text_area").onclick=changeElement;
function changeElement() {

          var textarea = document.getElementById("text_area");
          textarea.style.height="120px";
      }
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-filestyle.js"></script>
<script type="text/javascript">
	$('#input03').jfilestyle({
		input : false
	});
	$('#input07').jfilestyle({iconName: 'icon-plus', buttonText: 'browse'});
</script>
<script src="<?php echo base_url(); ?>js/datepicker.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker-end" ).datepicker();
		$( "#datepicker-new" ).datepicker();
		$( "#datepicker-new2" ).datepicker();
	});
	
    
  
  
  
</script>

</head>
<body>
<div id="preloader" style="">
    <div id="status" style=""></div>
</div>
<section class="BodyPanel">
        <header class="Header">
            <div class="container">
              <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                  <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" class="img-responsive" alt=""></a> <!--/.navbar-brand-->
                  <div class="topsearchbar"><input name="" class="searchbox" type="text" placeholder="Search"><input name="" type="button" class="searchbut"></div>
                </div>
                <div class="pull-right HeaderLog">
                	<div class="massege-icon">
                    	<a href="#"><img alt="" src="<?php echo base_url(); ?>images/msg.jpg"></a>
                    </div>
                	<ul class="SocialHead">
                        <li class="facebook"><a href="#" class="icon-facebook-5"></a></li>
                        <li class="twitter"><a href="#" class="icon-twitter-5"></a></li>
                        <li class="insta"><a href="#" class=" icon-instagramm"></a></li>
                    </ul> <!--/.SocialHead-->
                    <ul class="signTag">
                    	<li><a href="<?php echo base_url()."home/logout";?>" data-toggle="modal" data-target="#myModal-in">logout</a></li>
                    </ul> <!--/.signTag-->
                	<div class="HelpButton"><a href="#">Help</a></div> <!--/.HelpButton-->
                </div>
               </div> <!--/.navbar-->
        	</div> <!--/.container-->
        </header> <!--/.Header-->
        <section class="MainBodyinner">
        	<div class="container">
            	<div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
        	<div class="row">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="dudh-bar"></span>
              <span class="dudh-bar"></span>
              <span class="dudh-bar"></span>
            </button>
            </div>
          <div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#">Profile</a></li>
              <li><a href="#">Instructors</a></li>
              <li><a href="#">Sports Centers</a></li>
              <li><a href="#">Find a buddy</a></li>
              <li><a href="#">Activities</a></li>
              <li><a href="#">Events</a></li>
              <li><a href="#">Groups</a></li>   
              <li><a href="#">Apps</a></li>
              <li><a href="#">Supplements</a></li>  
              <li><a href="<?php echo base_url()."videolanding/index"; ?>">Videos</a></li>   
              <li><a href="#">Dashboards</a></li>                                   
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div> <!-- /.navbar-->