<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>Sports - Sign in</title>
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/admin/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/admin/bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/admin/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin/elements.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin/icons.css">

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin/lib/font-awesome.css">
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin/compiled/signin.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<?php
	if(isset($error_msg) && ($error_msg!=""))
	{
?>
		<div class="alert alert-error">
		    <a class="close" data-dismiss="alert">X</a>
		    <strong><?php echo $error_msg;?></strong>
		</div>
<?php
	}
	if(isset($success_msg) && ($success_msg!=""))
	{
?>
		<div class="alert alert-success">
		    <a class="close" data-dismiss="alert">X</a>
		    <strong><?php echo $success_msg;?></strong>
		</div>
<?php
	}
?>

    <!-- background switcher -->

    <div class="row-fluid login-wrapper">
		<!--<div align="right">
				<a href="<?php //echo base_url();?>index.php/langswitch/switchLanguage/english">
					<img class="logo" src="<?php //echo main_url(); ?>images/england.png" height="32px" width="32px">
				</a>
				<a href="<?php //echo base_url();?>index.php/langswitch/switchLanguage/pashto">
					<img class="logo" src="<?php //echo main_url(); ?>images/afghanistan.png" height="32px" width="32px">
				</a>
				<a href="<?php// echo base_url();?>index.php/langswitch/switchLanguage/persian">
					<img class="logo" src="<?php //echo main_url(); ?>images/Iran.png" height="32px" width="32px">
				</a>
		</div>-->
        <a href="<?php echo base_url();?>">
            <img class="logo" src="<?php echo base_url(); ?>assets/img/admin/logo-white.png">
        </a>
		
        <div class="span4 box">
            <div class="content-wrap">
                <h6>Change Password</h6>
		
                <form  id="frmValidation" name="frm_login" class="signin-wrapper" action="<?php echo site_url('login/do_forgotpassword_confirm');?>" method="post">
		<input type="hidden" name="admin_id" id="admin_id" value="<?php echo $this->uri->segment(3);?>">
                <input type="password" id="password" name="password" class="span12 " placeholder="Password">
                <input type="password" id="password_confirm" name="password_confirm" class="span12 " placeholder="Confirm Password">
                <input class="btn-glow primary pass_check" type="submit" value="Submit">
                </form>
            </div>
        </div>

    </div>

	<!-- scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/theme.js"></script>

    <!-- pre load bg imgs -->
    <script type="text/javascript">
        $(function () {
            // bg switcher
            var $btns = $(".bg-switch .bg");
            $('.pass_check').click(function (e) {
    			e.preventDefault();
    			$('.span12').css('border-color','#B2BFC7');
            	if($.trim($('#password').val())=='' || $.trim($('#password').val())==0) {
            		$('#password').attr('placeholder','Password Please');
            		$('#password').css('border-color','red');
            		return false;
            	} else if($.trim($('#password').val().length) < 6) {
			$('#password').val('');
            		$('#password').attr('placeholder','Password Mustbe 6 Character');
            		$('#password').css('border-color','red');
            		return false;
            	} else if($.trim($('#password_confirm').val())=='' || $.trim($('#password').val())==0) {
            		$('#password_confirm').attr('placeholder','Confirm Password Please');
            		$('#password_confirm').css('border-color','red');
            		return false;
            	} else if($.trim($('#password_confirm').val().length) < 6) {
			$('#password_confirm').val('');
            		$('#password_confirm').attr('placeholder','Confirm Password Mustbe 6 Character');
            		$('#password_confirm').css('border-color','red');
            		return false;
            	} else if($.trim($('#password_confirm').val()) != $.trim($('#password').val())) {
			$('#password_confirm').val('');
            		$('#password_confirm').attr('placeholder','Wrong Confirm Password');
            		$('#password_confirm').css('border-color','red');
            		return false;
            	}
		else {
            		$( "#frmValidation" ).submit();
            		return true;
            	}
            });
            $btns.click(function (e) {
                e.preventDefault();
                $btns.removeClass("active");
                $(this).addClass("active");
                var bg = $(this).data("img");
                $("html").css("background-color","#4c636b");
                $("html").css("background-image", "url('<?php echo base_url(); ?>assets/img/admin/bgs/9.jpg')");
            });
        });
    </script>
</body>
</html>