<!DOCTYPE html> 
<html lang="en-US" class="login-bg">
  <head>
    <title>
	<?php echo $site_name;?> :: Administration</title>
    <meta charset="utf-8">

    <!-- new addmin sec -->
  
		
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	    <!-- bootstrap -->
	    <link href="<?php echo base_url(); ?>assets/nw/css/bootstrap/bootstrap.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>assets/nw/css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>assets/nw/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">
	
	    <!-- global styles -->
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/nw/css/layout.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/nw/css/elements.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/nw/css/icons.css">
	
	    <!-- libraries -->
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/nw/css/lib/font-awesome.css">
	    
	    <!-- this page specific styles -->
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/nw/css/compiled/signin.css" type="text/css" media="screen" />
	
	    <!-- open sans font -->
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	
    <!-- end new addmin sec -->
    
  </head>
  <body>
    
    <!-- new section -->
    <!-- <div class="bg-switch visible-desktop">
        <div class="bgs">
            <a href="#" data-img="landscape.jpg" class="bg active">
                <img src="<?php echo base_url(); ?>assets/nw/img/bgs/landscape.jpg" />
            </a>
            <a href="#" data-img="blueish.jpg" class="bg">
                <img src="<?php echo base_url(); ?>assets/nw/img/bgs/blueish.jpg" />
            </a>            
            <a href="#" data-img="7.jpg" class="bg">
                <img src="<?php echo base_url(); ?>assets/nw/img/bgs/7.jpg" />
            </a>
            <a href="#" data-img="8.jpg" class="bg">
                <img src="<?php echo base_url(); ?>assets/nw/img/bgs/8.jpg" />
            </a>
            <a href="#" data-img="9.jpg" class="bg">
                <img src="<?php echo base_url(); ?>assets/nw/img/bgs/9.jpg" />
            </a>
            <a href="#" data-img="10.jpg" class="bg">
                <img src="<?php echo base_url(); ?>assets/nw/img/bgs/10.jpg" />
            </a>
            <a href="#" data-img="11.jpg" class="bg">
                <img src="<?php echo base_url(); ?>assets/nw/img/bgs/11.jpg" />
            </a>
        </div>
    </div> -->	
    
    <div class="row-fluid login-wrapper">
        <a href="index.html">
            <img class="logo" src="<?php echo base_url(); ?>assets/nw/img/logo-white.png">
        </a>

        <div class="span4 box">
            <div class="content-wrap">
               
              <?php 
		      $attributes = array('class' => '');
		      echo form_open('admin/admin_login/validate_credentials', $attributes);
			  echo '<h6>Log in</h6>';
			  //echo base_url();
		      //echo form_input('user_name', '', 'placeholder="Username"');
		      //echo form_password('password', '', 'placeholder="Password"');

			  ?>		       
			  <input name="user_name" class="span12" type="text" value="" placeholder="E-mail address">
              <input name="password" class="span12" type="password" value="" placeholder="Your password">
              
			  <!-- <a href="#" class="forgot">Forgot password?</a>
			  <div class="remember">
                    <input id="remember-me" type="checkbox">
                    <label for="remember-me">Remember me</label>
              </div> -->
               <?php
		      if(isset($message_error) && $message_error){
		          echo '<div class="alert alert-error">';
		            echo '<a class="close" data-dismiss="alert">×</a>';
		            echo '<strong>Oh snap!</strong> Change a few things up and try submitting again.';
		          echo '</div>';             
		      }
			  
		      echo "<br />";
		      		      
		     //echo form_submit('submit', 'Log in', 'class="btn-glow primary login"');
		     //        OR ...........NOTE bote submit button will work take any one.......
			  ?>
			  <input type="submit" name="submit" value="Log in" class="btn-glow primary login">
			 
			  <?
		      echo form_close();
		      ?>      
		  
            
            </div>            
		      
        </div>

        <!-- <div class="span4 no-account">
            <p>Don't have an account?</p>
            <a href="signup.html">Sign up</a>
        </div> -->
    </div>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>assets/nw/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/nw/js/theme.js"></script>

    <!-- pre load bg imgs -->
    <script type="text/javascript">
        $(function () {
            // bg switcher
            var $btns = $(".bg-switch .bg");
            $btns.click(function (e) {
                e.preventDefault();
                $btns.removeClass("active");
                $(this).addClass("active");
                var bg = $(this).data("img");

                $("html").css("background-image", "url('assets/nw/img/bgs/" + bg + "')");
            });

        });
    </script>
   </body>
</html>    
    