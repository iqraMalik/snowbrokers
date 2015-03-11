<?php
session_start();
$settings_row=$this->db->query("select * from site_settings where `field_name`='site_offline'");

$row=$settings_row->result();
foreach ($settings_row->result() as $row)
{
  $siteoffline=$row->field_value;
}

if($siteoffline==1)
{
?>
	<script> location.href="<?php echo site_url('home/offline');?>"</script>
<?php
}
?>


<html>
<head>
<!-- meta tag -->
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
<link rel="stylesheet" href="<?php echo base_url(); ?>css/selectize.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-filestyle.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/developer.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/selectric.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/selectrichome.css" type="text/css" />

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
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

<script src="<?php echo base_url(); ?>js/jquery.screwdefaultbuttonsV2.js"></script>
   
<script type="text/javascript">
	var slider;
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
			//myModal-up
//			login-modal
//			
//			myModal-in
//			Signup-modal
			
			$("#login-modal").live( "click", function(){
				$('#myModal-up').modal('hide');
				$('#myModal-in').modal('show');
			});
			$("#Signup-modal").live("click", function(){
				$('#myModal-in').modal('hide');
				$('#myModal-up').modal('show');
			});
			$("#modal-forget").live("click", function(){
				$('#myModal-in').modal('hide');
				$('#myModal-forget').modal('show');
			});
			$("#modal_profile_pic_update").live( "click", function(){
				
				$('#myModal-profile_pic_update').modal('show');
				$('#myModal-profile-pic-no-crop').modal('hide');thumbs
				$('.theme-selector').remove();
				$('#thumbs').hide();
				$('#ok_show').hide();
				$('#cancel_show').hide();
				$('#profile_pic_update_form').show();
			});
			$("#myModal-profile-pic-ok").live( "click", function(){
				
				$('#myModal-profile_pic_update').modal('hide');
			});
			$("#modal_description_edit").live( "click", function(){
				
				$('#myModal-desc_update').modal('show');
			});
			$("#modal_event_create").live( "click", function(){
				
				$('#myModal-event-create').modal('show');
			});
			$("#modal-update_event").live( "click", function(){
				
				$('#Mymodal_event_updation').modal('show');
			});
			$("#modal_group_create").live( "click", function(){
				
				$('#myModal-group-create').modal('show');
			}); 
			$("#image_popup_remove").live( "click", function(){
				
				$('#myModal-profile_pic_update').modal('hide');
			});
			$("#comp_your_prof").live( "click", function(){
				
				$('#myModal-profile1').modal('show');
				$('#myModal-in').modal('hide');
			});
			
			
			
			
			
		});
	</script> 
<script defer src="<?php echo base_url(); ?>js/jquery.flexslider.js"></script>
  
<script type="text/javascript">
    $(window).load(function(){
	$('.theme-selector').remove();
      $('.flexslider').flexslider({
       
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
<script>
 $(window).load(function () {
	  var window_height = $(window).outerHeight();
	  var navmenu_height = $('.Header').outerHeight();
	
	  $('.sliderimg').css('height', (window_height - navmenu_height) + 'px');	
});
</script>
<script>
	 $(window).resize(function () {
		  var window_height = $(window).outerHeight();
		  var navmenu_height = $('.Header').outerHeight();
		
		  $('.sliderimg').css('height', (window_height - navmenu_height) + 'px');
		
		});
</script>
<script>
	$(window).load(function() {
	$(window).scrollTop(0);
	$("#status").fadeOut();
	$("#preloader").delay(350).fadeOut("slow");
	});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.selectric.js"></script>
<script>
  $(function(){
    $('.select').selectric();
  });
</script>
<script src="<?php echo base_url(); ?>js/jquery.selectric_home.js"></script>
<script>
  $(function(){
    $('.select-new').selectrichome();
  });
</script>
<script src="<?php echo base_url(); ?>js/selectize.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/index.js" type="text/javascript"></script>

<!-----Jcrop ------>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.Jcrop.css" />

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.Jcrop.js"></script>

<!-----Jcrop ------>


<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-filestyle.js"></script>

<!----- Calender ----->

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-----Calender ------>
<script>
$(function(){

    $('#photo').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });
function updateCoords(c)
  {
	
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };
  
  function getImageCrop()
  {
	$("#loader_show").css('display','block');
	var ses_id1 = $("#profile_pic_user_id").val();
	var base_url_names = $("#base_url_names").val();
	var x = $("#x").val();
	var y = $("#y").val();
	var w = $("#w").val();
	var h = $("#h").val();
	$.ajax({
		type:"POST",
		url:base_url_names+"ajax_image.php?t=ajax&img="+$("#image_name").val()+"&x="+x+"&y="+y+"&w="+w+"&h="+h+"&ses_id1="+ses_id1,
		cache:false,
		success:function(rsponse)
			{									
			
			 //$("#cropimage").hide();
			    $('#thumbs').show();
				$('#ok_show').show();
				$('#cancel_show').show();
				$("#thumbs").html("<img src='"+base_url_names+"images/profile_pic/crop_kept_thumb/"+rsponse.trim()+"'/>");
			 $("#profile_pic_update_form").hide();
			  var a ="'"+rsponse.trim()+"'";
			  
			 var b=a.split(' ').join('');
			  $("#ok_show").html('<a href="#" onClick="showthumb('+ses_id1+');"style="background:linear-gradient(to bottom, #BDDD36 0%, #A8C529 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);color:#fff; padding: 5px 40px 0 30px;margin:0 0 0 45px;float:left;">Crop and Save</a>');
			  $('#Image_error').html('');
			
			  
			  $("#cancel_show").html('<a href="#" onClick="delthumb('+ses_id1+');"style="background:linear-gradient(to bottom, #BDDD36 0%, #A8C529 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);color:#fff; padding: 5px 40px 0 30px;float:left;margin-left: 15px;">Save without Crop</a>');
			$("#loader_show").css('display','none');
			}
	});
  }
  
  function delthumb(id) {
	
	var base_url_names = $("#base_url_names").val();
	var image = $("#image_name").val();
	$.ajax({
			type:"GET",
			url:base_url_names+"ajax_image.php",
			data:"action=del&image_name="+image+"&use_id="+id,
			success:function(rsponse)
				{									
					
					$('#myModal-profile_pic_update').modal('hide');
					$("#prof_pic_show").attr('src','http://'+rsponse.trim());
				}
		});
}
function showthumb(id) {
	
	var base_url_names = $("#base_url_names").val();
	var image = $("#image_name").val();
	
	$.ajax({
			type:"GET",
			url:base_url_names+"ajax_image.php",
			data:"action=show&image_name="+image+"&user_id="+id,
			success:function(rsponse)
				{					
					
					$('#myModal-profile_pic_update').modal('hide');
					$("#prof_pic_show").attr('src','http://'+rsponse.trim());

				}
		});
}
</script>
</head>
<body>
	<script type="text/javascript">
			$(document).ready(function () {
				$('.theme-selector').remove();
			$('#update_prof_comp').hide();
			//$('#body_fat_edit').hide();
			})
		</script>
	<style type="text/css">
    
    .alert_success {
    background-color: #DFF0D8;
    border-color: #D6E9C6;
    color: #468847;
}
  </style>
  	<style type="text/css">
    
    .alert_error {
    background-color: #FBEED5;
    border-color: #D6E9C6;
    color: #468847;
}

.areacls{
	background-color: rgba(255, 255, 255, 0.25);
    border: 2px solid #FFFFFF;
    color: #FFFFFF;
    font-family: 'Lato',sans-serif;
    font-weight: 400;
   
    margin: 0 0 10px;
    outline: 0 none;
    padding: 0 15px;
    transition: all 0.4s ease-in-out 0s;
    width: 100%;
}

.show_pop_div{
background: none repeat scroll 0px 0px rgb(255, 255, 255); border: 1px solid rgb(187, 187, 187); border-radius: 4px 4px 4px 4px; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.25); text-align: left; margin: 4em auto; padding: 2em 3em 2em;
}
  </style>
	
	<!--------- modal will open for per session data requested starts---------->
	
	<?php
	
	if($this->session->flashdata('login_modal_activate_profile_reg')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {
				
			$('#myModal-in').modal('show');
			})
		</script>
		<?php
	}
	if($this->session->flashdata('login_modal_activate_profile_reg_already')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {
				
			$('#myModal-in').modal('show');
			})
		</script>
		<?php
	}
	if($this->session->flashdata('login_modal_user_not_exists_reg')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {
				
			$('#myModal-in').modal('show');
			})
		</script>
		<?php
	}
	
	if($this->session->flashdata('login_modal_after_normal_reg')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {
				
			$('#myModal-in').modal('show');
			})
		</script>
		<?php
	}
	if($this->session->flashdata('login_modal_failed_normal_reg')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {
				
			$('#myModal-in').modal('show');
			})
		</script>
		<?php
	}
	if($this->session->flashdata('login_modal_after_facebook_reg')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {
			$('#myModal-in').modal('hide');	
			$('#myModal-up_fb').modal('show');
			})
		</script>
		<?php
	}
	if($this->uri->segment(3) !='' AND $this->session->flashdata('show_change_password')=='' AND $this->uri->segment(2) !='my_event' AND $this->uri->segment(2) !='getallalbumns' AND $this->uri->segment(2) !='getallphotos' AND $this->uri->segment(2) !='bigphoto' AND $this->uri->segment(2) !='edit_albumn' AND $this->uri->segment(2) !='index' AND $this->uri->segment(2) !='signup_instructor')
	{
		
		?>
		<script type="text/javascript">
			$(document).ready(function () {			
			$('#myModal-verify').modal('show');
			})
		</script>
		<?php	
	}
	if($this->session->flashdata('show_change_password')==1 AND $this->uri->segment(3) !='')
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {			
			$('#myModal-up_chg_pass').modal('show');
			})
		</script>
		<?php
	}
	if($this->session->flashdata('login_modal_after_half_reg')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {			
			$('#myModal-profile1').modal('show');
			})
		</script>
		<?php
	}
	if($this->session->flashdata('forget_pass_modal')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {			
			$('#myModal-forget').modal('show');
			})
		</script>
		<?php
	}
	if($this->session->flashdata('profile_pictue_update_form')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {			
			$('#myModal-profile_pic_update').modal('show');
			})
		</script>
		<?php
	}
	if($this->session->flashdata('complete_your_profile_normal_reg')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {
				
			$('#myModal-profile1').modal('show');
			})
		</script>
		<?php
	}
	if($this->session->flashdata('signup_modal_instructor_reg')==1)
	{
		?>
		<script type="text/javascript">
			$(document).ready(function () {
				
			$('#myModal-up').modal('show');
			})
		</script>
		<?php
	}
	?>
	<!---------- modal will open for per session data requested ends----------->
	
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox.js"></script>

	
	<!--------------------------- Login modal starts -------------------------->
	
<div class="modal fade" id="myModal-in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><span>Log in </span>with your Facebook account</h4>
        <div class="Modalfacebook">
        	<a href="#">
            	<div class="Facebookpop"><img src="<?php echo base_url(); ?>images/facepop.png" alt=""></div>
                <a href="<?php echo site_url('signup/inner_signup_facebook')?>"><div class="Facetxt">Log in with Facebook</div></a>
            </a>
        </div>
      </div>
      <div class="modal-body">
        <div class="ordevider">OR</div>
		<div class="login-inner clearfix">
				<?php
				if($this->session->userdata('success_msg_reg')!='')
				{
				?>
				<div class="alert_success">
				<?php
					echo $this->session->userdata('success_msg_reg');
					$this->session->unset_userdata('success_msg_reg');
				?>
				</div>
				<?php
				}
				if($this->session->userdata('error_msg_reg')!='')
				{
				?>
				<div class="alert_error">
				<?php
					echo $this->session->userdata('error_msg_reg');
					$this->session->unset_userdata('error_msg_reg');
				?>
				</div>
				<?php
				}
				
				?>
		</div>
		<br />
	<form class="spcing_otr" id="login_form" name="login_form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('home/u_login');?>">
		
		<input name="login_email" type="text" id="login_email" value="<?php if($this->input->cookie('cookie_email')!=''){echo $this->input->cookie('cookie_email');}else{echo "";}?>" class="textbox" placeholder="Email">
		<div id="login_email_error" style="color: red;margin-bottom: 20px;"></div>
		<input name="login_password" id="login_password" type="Password" value="<?php if($this->input->cookie('cookie_password')!=''){echo $this->input->cookie('cookie_password');}else{echo "";}?>" class="textbox" placeholder="Password">
		<div id="login_password_error" style="color: red;margin-bottom: 20px;"></div>
	     
	    
		 <div class="keepsign">
		<div class="Checkouter">
			
		    <input type="checkbox" class="checkbox-new" name="ex2_a" id="ex2_a" value="1" <?php if($this->input->cookie('cookie_value')==1){echo "checked";}else{echo "";}?>>
		    <label class="lableof" for="ex2_a">Keep me signed in</label>
		</div>
		<div class="Keepright"><a href="#" id="modal-forget">Forgot password?</a></div>
	      </div>
	      
	      <div class="">
		<input name="" type="submit" onclick="return check_login();" class="loginbut" data-toggle="modal" data-target="#myModal-profile" id="profile-modal" value="LOG IN">
	      </div>
      </form>
      </div>
      <div class="modal-footer">
      	<div class="Donthave pull-left">Don't have an account?</div>
        <div class="Donthave pull-right"><a href="javascript:void(0);" id="Signup-modal">Sign up</a></div>
      </div>
    </div>
  </div>
</div>

	<!--------------------------- Login modal starts -------------------------->
	
	
	
		
	
	<!--------------------------forget password starts  ------------------------>
	
	<div class="modal fade" id="myModal-forget" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="login-inner clearfix">
				<?php
				if($this->session->userdata('success_msg_reg')!='')
				{
				?>
				<div class="alert_success">
				<?php
					echo $this->session->userdata('success_msg_reg');
					$this->session->unset_userdata('success_msg_reg');
				?>
				</div>
				<?php
				}
				if($this->session->userdata('error_msg_fgt_pass')!='')
				{
				?>
				<div class="alert_error">
				<?php
					echo $this->session->userdata('error_msg_fgt_pass');
					$this->session->unset_userdata('error_msg_fgt_pass');
				?>
				</div>
				<?php
				}
				
				?>
		</div>
		<br />
      <div class="modal-body">
       <h4 class="modal-title">Forget Password</h4>
	<form class="spcing_otr" id="forget_login_form" name="forget_login_form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('login/check_mail');?>">
		
		<input name="forget_email" type="text" id="forget_email" value="" class="textbox" placeholder="Email">
		<div id="forget_email_error" style="color: red;margin-bottom: 20px;"></div>
	      
	      <div class="">
		<input name="" type="button" class="loginbut" data-toggle="modal" data-target="#myModal-profile" id="forget_pass-modal" value="Submit">
	      </div>
      </form>
      </div>
     
    </div>
  </div>
</div>
	
	
	<!-------------------------------- forget password ends-------------------------------->
	
	<!---------------------------------- verify code starts ------------------------------->
	
	<div class="modal fade" id="myModal-verify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="login-inner clearfix">
				<?php
				//echo '----'.$this->session->userdata('error_msg_verification');
				if($this->session->userdata('success_msg_verification')!='')
				{
				?>
				<div class="alert_success">
				<?php
					echo $this->session->userdata('success_msg_verification');
					$this->session->unset_userdata('success_msg_verification');
				?>
				</div>
				<?php
				}
				if($this->session->userdata('error_msg_verification')!='')
				{
				?>
				<div class="alert_error">
				<?php
					echo $this->session->userdata('error_msg_verification');
					$this->session->unset_userdata('error_msg_verification');
				?>
				</div>
				<?php
				}
				
				?>
		</div>
		<br />
      <div class="modal-body">
       <h4 class="modal-title">Verification Code</h4>
	<form class="spcing_otr" id="verify_code_form" name="verify_code_form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('login/check_code');?>">
		 <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->uri->segment(3);?>">
		<input type="text" id="verify_code" name="verify_code" placeholder="Verification Code" value="" class="textbox">
		<div id="verify_code_error" style="color: red;margin-bottom: 20px;"></div>
	      
	      <div class="">
		<input name="" type="button" class="loginbut" data-toggle="modal" data-target="#myModal-profile" id="verify-code-modal" value="Submit">
	      </div>
      </form>
      </div>
     
    </div>
  </div>
</div>
	
		
	<!------------------------------------- verify code ends ----------------------------------->
	
	<!-------------------------------------- change password starts---------------------------->
	
	<div class="modal fade" id="myModal-up_chg_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
       <h4 class="modal-title">Forgot Password</h4>
       <p style="color:white"> Enter new password</p>
	<form class="spcing_otr" id="update_password_form" name="update_password_form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('login/update_password');?>">
		 <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->uri->segment(3);?>">
		<input type="password" id="new_password" name="new_password" placeholder="Password" value="" class="textbox">
		<div id="new_password_error" style="color: red;margin-bottom: 20px;"></div>
	      <input type="password" class="textbox"  id="confirm_password" name="confirm_password" placeholder="Confirm Password" value=""/>
	      <div id="confirm_password_error" style="color: red;margin-bottom: 20px;"></div>	
	      <div class="">
		<input name="" type="button" class="loginbut" data-toggle="modal" data-target="#myModal-profile" id="update-pass-modal" value="Submit">
	      </div>
      </form>
      </div>
     
    </div>
  </div>
</div>


	
	<!-----------------------------------change password ends ---------------------------------->
		
	
	
	<!---------------------------------- profile pic update starts---------------------------->

<script type="text/javascript">
			
		
			
			

</script>

		<div class="modal fade" id="myModal-profile_pic_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div id="colorbox" class="" style="top: 0px; position: absolute;">
<div class="show_pop_div" style="width:510px;height:510px">
	 <h5><b>Change Profile Picture and Crop </b></h5>
	 
    <div class="modal-content">
     
      <div class="modal-body">
      
       <div id="Image_error" style="color:red;"></div>
       <div id="Image_error1">Please Crop the Uploaded Image</div>
        <div style="color:#000">Please Upload (jpg/png/gif/bmp/jpeg) type Image</div>
       <span>
	
<?php
echo "<span style='color:red;'>".$this->session->flashdata('prof_pic')."</span>";
    
	$site=base_url().'images/profile_pic/crop_thumb/';
	      
       $sql_select="Select * from users where uid='".$this->session->userdata('user_id')."'";
	$query = mysql_query($sql_select);
	$result = mysql_fetch_assoc($query);
	@$profile_image  = $result['profile_image'];
	@$profile_image_small  = $result['profile_image_small'];
if($profile_image !='')
	{
	?>
	<span>
<h3>Please drag on the image</h3>
<a href="#" id="image_load" onClick="getImageCrop()"><img id="photo" src="<?php echo $site.$profile_image;?>"/></a>
</span>
	<?php
	}else{
		?>
		<span>
<h3>Please drag on the image</h3>
<a href="#" id="image_load" onClick="getImageCrop()"><img id="photo" src="<?php echo $site.$profile_image;?>"/></a>
</span>
		<?php
	}

	
	?>
	
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
	
		<script src="http://malsup.github.com/jquery.form.js"></script> 

<div id="thumbs" style="padding:5px; width:500px"></div>
<div id="photo_id"></div>
	<form class="spcing_otr" id="profile_pic_update_form" name="profile_pic_update_form" method="POST" enctype="multipart/form-data" action="<?php //echo site_url('signup/update_profile_pic');?>">
		<input type="hidden" name="base_url_names" id="base_url_names" value="<?php echo base_url();?>">
		<input type="hidden" name="user_id_val_pic" id="user_id_val_pic" value="<?php echo $this->session->userdata('user_id');?>">

		 <input type="hidden" name="profile_pic_user_id" id="profile_pic_user_id" value="<?php echo $this->session->userdata('user_id');?>">
		<input type="file" onchange="instant_image_change();" name="photoimg" id="photoimg" />
		<input type="hidden" name="image_name" id="image_name" value="<?php echo @$profile_image;?>" />
	      <div class="">
		<a href="#" class="loginbut"  style="width:44%;float:left;padding-top:10px;" id="myModal-profile-pic-update" >Save Image </a>
			<a href="#" style="width:44%;float:right;padding-top:10px;" id="image_popup_remove" class="loginbut">Not Interested</a>
	      </div>
      </form>
      <div id="ok_show"></div>
      <div id="cancel_show"></div>
      <div id="loader_show" style="display:none;padding: 61px 61px 61px 204px;"><img src="<?php echo base_url(); ?>images/loading_blue.gif"></img></div>
      </div>
     
    </div>
</div>
	</div>
  </div>
</div>
<script type="text/javascript">	
	function instant_image_change() {		
		
		var frm1=document.profile_pic_update_form; 
		
	

		var fileName = document.getElementById('photoimg').value;
		
		
    // the file is the first element in the files property
    //var filesss = document.getElementById('photoimg').files[0];
    
		
		
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		
		if(fileName!="")
		{
			if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
			{
				//var a = document.getElementById('photoimg');
    
				//for (var i = 0; i < a.files.length; i++) 
					
					//if (i<limit_image) {
						//code
					$("#loader_show").css('display','block');
						document.getElementById("Image_error").innerHTML='';
						var options = { 
						target:        '#photo',   // target element(s) to be updated with server response 
						beforeSubmit:  showRequest,  // pre-submit callback				
						success:       showResponse1,  // post-submit callback
						
						// other available options:
						url:'<?php echo site_url('signup/update_profile_pic/'); ?>',	
						      // override for form's 'action' attribute 
						//type:      type        // 'get' or 'post', override for form's 'method' attribute 
						//dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
						//clearForm: true        // clear all form fields after successful submit 
						//resetForm: true        // reset the form after successful submit 
						// $.ajax options can be used here too, for example: 
						//timeout:   3000 
						};
						$(frm1).ajaxSubmit(options);
					
				
			} 
			else
			{
				document.getElementById("Image_error").style.display="block";
				document.getElementById("Image_error").innerHTML='<div style=color:red>Invalid image (gif,jpg,jpeg, png are allow)</div>';
				document.getElementById("Image_error").focus();
				return false;
			}
		}
		
	}

	function showRequest(formData, jqForm, options) {
				//var $=jQuery.noConflict();
			// formData is an array; here we use $.param to convert it to a string to display it 
			// but the form plugin does this for you automatically when it submits the data 
			var queryString = $.param(formData); 
		     
			// jqForm is a jQuery object encapsulating the form element.  To access the 
			// DOM element for the form do this: 
			 //var formElement = jqForm[0]; 
		    
			//alert('About to submit: \n\n' + queryString); 
		     
			// here we could return false to prevent the form from being submitted; 
			// returning anything other than false will allow the form submit to continue 
			return true;
	}
	function showResponse1(responseText, statusText, xhr, $form)  {
		
		//document.getElementById('photo').innerHTML=responseText;
		
		$("#image_load").html("");
		$("#image_load").html('<img id="photo" src="'+responseText+'">');
		var res = responseText.split("crop_thumb/"); 
		
		$("#image_name").val(res[1]);
		//
		$("#loader_show").css('display','none');
		//$("#photo").attr("src", responseText.trim())
		//$("#photo").css({"display":"block","visibility":"visible"});
$(function(){

    $('#photo').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });
		//var responseText1 = <?php echo base_url(); ?>images[1];
		/*if (responseText==1) {
			document.getElementById('preview').innerHTML="";
			document.getElementById('Image_error').innerHTML="Minimum image-size is 530X786.";
		 
		}
		else
		{
		document.getElementById('Image_error').innerHTML='';
		document.getElementById('preview').innerHTML=res1[0];
		//$( "#preview" ).append('<div>'+responseText+'</div>');
		//$('<div>'+responseText+'</div//appendTo( "#preview" );
		
		}
		*/
 
	}
</script>
	<!---------------------------------profile pic update ends---------------------------------->
	
	
	<!-------------------------------Description edits starts------------------------------------>
	<?php
	if($this->session->userdata('user_id') !='')
	{
		
	
	$dataone_fetch2=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));

	$data2=$dataone_fetch2[0];
	
		?>

	<div class="modal fade" id="myModal-desc_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
       <h4 class="modal-title">Change Details</h4>

	<form class="spcing_otr" id="details_update_form" name="details_update_form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('signup/update_desc_details');?>">
		<input type="hidden" name="user_id_val1" id="user_id_val1" value="<?php echo $this->session->userdata('user_id');?>">

		 <input type="text" class="textbox" label="First name" name="first_name_edit_desc" id="first_name_edit_desc" value="<?php echo $data2->first_name;?>" placeholder="First name" >
                <div id="first_name_edit_desc_error" class="error_div" style="color:red;"></div>
		
		<input type="text" class="textbox" value="<?php echo $data2->last_name;?>" label="Last name" name="last_name_edit_desc" id="last_name_edit_desc" placeholder="Last name" >
                <div id="last_name_edit_desc_error" class="error_div" style="color:red;"></div>
		<textarea class="areacls" rows="10" cols="20"  name="description_edit" id="description_edit" placeholder="Please write about yourself..."><?php echo @$data2->about_myself;?></textarea>
	      <div class="">
		<input name="" type="button" class="loginbut" data-toggle="modal" data-target="#myModal-profile-pic-update" id="myModal-description-update" value="Submit">
	      </div>
      </form>
      <div id="ok_show"></div>
      </div>
     
    </div>
  </div>
</div>
	<?php
	
	}
	?>

	<!------------------------------Description edits ends--------------------------------------->
	
	
	
	<!-------------------------------Create Events starts---------------------------------------->
	<?php
	if($this->session->userdata('user_id') !='')
	{
		
	
	
	
		?>

	<div class="modal fade" id="myModal-event-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
       <h4 class="modal-title">Create Event</h4>

	<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('signup/insert_event');?>" name="new_event" id="new_event" method="post" autocomplete="off">
						
									
				
				<input type="text" class="span21 required21 textbox" label="Event Name" name="event_name" placeholder="Event Name..." id="event_name" value="">
				<div id="event_name_error" class="error_div" style="color:red;"></div>			
			
				
				
				    <select class="span21 required21 demo-default" name="event_type" id="event_type" label="Event Type" onchange="show_recurring(this.value)">
				    <option value="">Select Event Type</option>
					<option value="1">Normal</option>
					<option value="2">Recurring</option>
					
				</select>
				 <script>
				$('#event_type').selectize();
				</script>
				<div id="event_type_error" class="error_div" style="color:red;"></div>
			
			<div id="recurring_div" style="display:none;">
				
				
				<select class="select" tabindex="1" name="recurring_type" id="recurring_type" label="Recurring Type">

				    <option value="">Select Recurring Type</option>								    	
					<option value="1">Weekly</option>
					<option value="2">Monthly</option>
					<option value="3">Yearly</option>
					
				</select>
				
				<div id="recurring_type_error" class="error_div" style="color:red;"></div>
			</div>
			<div id="recurring_div1" style="display:none;">
				
				<input type="text" label="Recurring UPTO" class="textbox"  name="reccring_upto" value="" id="reccring_upto" placeholder="Recurring Upto..." />
				<div id="reccring_upto_error" class="error_div" style="color:red;"></div>
				
			</div>
				
				 <script>
				 $(function() {
					var dateToday = new Date();
	$( "#reccring_upto" ).datepicker({ minDate: dateToday,showButtonPanel: true});
	showButtonPanel: false,
	$( "#reccring_upto" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	});
				</script>
			
			
				
				 <?php $getcountry = $this->modelgoals->GetCountry();?>
				    
				    <select class="span21 required21 demo-default" name="country_event" id="country_event" label="Country" onChange="Select_state_event(this.value)">
				    <option value="">Select Country</option>
				   <?php                          
					if(count($getcountry)>0 || $getcountry !=0)
					{
					    foreach($getcountry as $key=>$val)
					    {
					?>
					<option value="<?php echo $val->id;?>"><?php echo $val->country_name;?></option>
					<?php
					    }
					}
					?>
				</select>
				    <script>
				$('#country_event').selectize();
				</script>
				<div id="country_event_error" class="error_div" style="color:red;"></div>
				    
					<div id="event_state">
						<select class="span21 required21 select" name="state_event" id="state_event" label="State" >
						    <option value="">Select Country first,then state</option>                          
						 </select>
					</div>
				<div id="state_event_error" class="error_div" style="color:red;"></div>

			
				
				
				    <input type="text" class="span21 required21 textbox" name="location_event" id="location_event" label="Location" placeholder="Location" >
				
				<div id="location_event_error" class="error_div" style="color:red;"></div>							
			

				
				<?php $SportsyData = $this->modelgoals->GetAllSports();?>
				
			<select name="sports_event" id="sports_event" class="span21 required21 demo-default" label="Sports1">
				    <option value="">Select Sports</option>
				    <?php
				  
				    if(count($SportsyData)>0 || $SportsyData !=0)
				    {
					foreach($SportsyData as $key=>$val)
					{
				    ?>
				    <option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
				    <?php
					}
				    }
				    ?>
				</select>
				 <script>
				$('#sports_event').selectize();
				</script>
				<div id="sports_event_error" class="error_div" style="color:red;"></div>
			
			
											
				<textarea class="span21 required21 textbox" label="Description" name="desc_event" id="desc_event"></textarea>								
				<div id="desc_event_error" class="error_div" style="color:red;"></div>
			
			
				
				
				<input type="file"   class="span21 required21" name="photo_event" value=""  label="image" id="photo_event" />
				<div id="photo_event_error" class="error_div" style="color:red;"></div>
			
			
				
				<input type="text" class="span21 required21 textbox" label="Start Date" name="start_date_event" value="" id="start_date_event" placeholder="Enter Start Date...." />
				<div id="start_date_event_error" class="error_div" style="color:red;"></div>
			
			
			 <script>
				 $(function() {
					var dateToday = new Date();
	$( "#start_date_event" ).datepicker({ minDate: dateToday,showButtonPanel: true});
	
	$( "#start_date_event" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	 
	});
				</script>
			
				
				<input type="text" class="span21 required21 textbox" label="End Date" name="end_date_event" value=""  id="end_date_event"  placeholder="Enter End Date...."/>
				<div id="end_date_event_error" class="error_div" style="color:red;"></div>

			
			 <script>
				 $(function() {
					var dateToday = new Date();
					showButtonPanel: true
	$( "#end_date_event" ).datepicker({ minDate: dateToday,showButtonPanel: true});
	
	$( "#end_date_event" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	 
	});
				</script>
			
				
				
				    <select class="select" label="State" name="event_state_p" id="event_state_p" >
					   <option value="1">Public</option>
					   <option value="0">Private</option>
				    </select>
				
				<div id="event_state_p_error" class="error_div" style="color:red;"></div>

			  <div class="">
				<input name="" type="button" class="loginbut" data-toggle="modal" data-target="#myModal-profile-pic-update" id="myModal-event-creation" value="Submit">
		</div>	
		</form>
      </div>
     
    </div>
  </div>
</div>
	<?php
	
	}
	?>

	<!---------------------------------Create Events ends--------------------------------------->
	
	
	<!---------------------------------Edit Events Starts--------------------------------------->
	
	
	<?php
	if($this->session->userdata('user_id') !='')
	{
		$event_id=$this->uri->segment(3);
		$event_id = str_replace('#','',$this->uri->segment(3));
		$event_details=$this->modelsignup->GetEventDetail($event_id);
	
		if(isset($event_details))
		{
		?>

	<div class="modal fade" id="Mymodal_event_updation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
       <h4 class="modal-title">Update Event</h4>

	<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('signup/update_event');?>" name="new_event_edit" id="new_event_edit" method="post" autocomplete="off">
						
				<input type="hidden" name="hid_event_id" id="hid_event_id" value="<?php echo $event_id;?>"/>				
				
				<input type="text" class="span22 required22 textbox" label="Event Name" name="event_name_edit" placeholder="Event Name..." id="event_name_edit" value="<?php echo $event_details[0]->event_name; ?>">
				<div id="event_name_edit_error" class="error_div" style="color:red;"></div>			
				
				
				 <?php $getcountry = $this->modelgoals->GetCountry();?>
				    
				    <select class="span22 required22 demo-default" name="country_event_edit" id="country_event_edit" label="Country" onChange="Select_state_event_edit(this.value)">
				    <option value="">Select Country</option>
				   <?php                          
					if(count($getcountry)>0 || $getcountry !=0)
					{
					    foreach($getcountry as $key=>$val)
					    {
					?>
					<option value="<?php echo $val->id;?>" <?php if( $event_details[0]->country_id==$val->id){echo "selected";} ?>><?php echo $val->country_name;?></option>
					<?php
					    }
					}
					?>
				</select>
				    <script>
				$('#country_event_edit').selectize();
				</script>
				<div id="country_event_edit_error" class="error_div" style="color:red;"></div>
				    <?php $getstate = $this->modelgoals->GetState($event_details[0]->country_id);?>
					<div id="event_state_edit">
						<select class="span22 required22 demo-default" name="state_event_edit" id="state_event_edit" label="State" >
						     <?php                          
								   if(count($getstate)>0 || $getstate !=0)
								   {
								      if($getstate !=0)
								      {
									   foreach($getstate as $key=>$val)
									   {
								       ?>
								       <option value="<?php echo $val->id;?>" <?php if( $event_details[0]->state_id==$val->id){echo "selected";} ?>><?php echo $val->state_name;?></option>
								       <?php
									   }
								      }
								      else
								      {
								      ?>
								      		    <option value="0">Not Available</option>

								      <?php
								      }
								   }
								  
								   ?>                           
						 </select>
						<script>
				$('#state_event_edit').selectize();
				</script>
					</div>
				<div id="state_event_edit_error" class="error_div" style="color:red;"></div>

			
				
				
				    <input type="text" class="span22 required22 textbox" value ="<?php echo $event_details[0]->location;?>" name="location_event_edit" id="location_event_edit" label="Location" placeholder="Location" >
				
				<div id="location_event_edit_error" class="error_div" style="color:red;"></div>							
			

				
				<?php $SportsyData = $this->modelgoals->GetAllSports();?>
				
			<select name="sports_event_edit" id="sports_event_edit" class="span22 required22 demo-default" label="Sports1">
				    <option value="">Select Sports</option>
				    <?php
				  
				    if(count($SportsyData)>0 || $SportsyData !=0)
				    {
					foreach($SportsyData as $key=>$val)
					{
				    ?>
				    <option value="<?php echo $val->id;?>" <?php if($event_details[0]->sports==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
				    <?php
					}
				    }
				    ?>
				</select>
				<script>
				$('#sports_event_edit').selectize();
				</script>
				<div id="sports_event_edit_error" class="error_div" style="color:red;"></div>
			
			
											
				<textarea class="span22 required22 textbox" label="Description" name="desc_event_edit" id="desc_event_edit"><?php echo $event_details[0]->description; ?></textarea>								
				<div id="desc_event_edit_error" class="error_div" style="color:red;"></div>
			
				 <?php
					if($event_details[0]->picture !='')
					{
					?> 
				    <div class="span12 field-box" style="padding-bottom: 30px;">
					      <label><span style="color: red;">*</span>Previous Image : </label>
					      <input id="image_edit" type="hidden" name="image_edit" value="<?php echo $event_details[0]->picture;?>">
					      
					      
					     <img src="<?php echo base_url().'images/event_images/'.$event_details[0]->picture;?>" height="150px;" width="230px;"/>
				      
					      
					      <div id="image_error" class="error_div" style="color:red;"></div>
				     </div>
				    <?php
				    }
				    ?>
				
				
				<input type="file"   name="photo_event_edit" value=""  label="image" id="photo_event_edit" />
				<div id="photo_event_edit_error" class="error_div" style="color:red;"></div>
			 <script>
				 $(function() {
					//$( "#datepicker" ).datepicker( "destroy" );
					
	$( "#start_date_event_edit" ).datepicker({minDate:0,showButtonPanel: true});
	
	$( "#start_date_event_edit" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	 
	});
				</script>
			
			
				
				<input type="text" class="span22 required22 textbox" label="Start Date" name="start_date_event_edit" value='' id="start_date_event_edit" placeholder="Enter Start Date...." />
				 <script>
					$(window).load(function(){
						
						document.getElementById("start_date_event_edit").value="<?php echo $event_details[0]->start_date; ?>";
						
						
					})
				 </script>	
				<div id="start_date_event_edit_error" class="error_div" style="color:red;"></div>
			
			
			<script>
				 $(function() {

					var dateToday = new Date();
					showButtonPanel: true
	$( "#end_date_event_edit" ).datepicker({ minDate: dateToday,showButtonPanel: true});
	
	$( "#end_date_event_edit" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	 
	});
				</script>
				
				<input type="text" class="span22 required22 textbox" label="End Date" name="end_date_event_edit" value=""  id="end_date_event_edit"  placeholder="Enter End Date...."/>
				 <script>
					$(window).load(function(){
						
						document.getElementById("end_date_event_edit").value="<?php echo $event_details[0]->end_date; ?>";
						
						
					})
				 </script>	
				<div id="end_date_event_edit_error" class="error_div" style="color:red;"></div>

			
			 
			
				
				
				    <select class="select" label="State" name="event_state_p_edit" id="event_state_p_edit" >
					   <option value="1" <?php if($event_details[0]->event_state=='1') { echo "selected";}?>>Public</option>
					   <option value="0" <?php if($event_details[0]->event_state=='0') { echo "selected";}?>>Private</option>
				    </select>
				
				<div id="event_state_p_edit_error" class="error_div" style="color:red;"></div>

			  <div class="">
				<input name="" type="button" class="loginbut" data-toggle="modal" data-target="#myModal-profile-pic-update" id="myModal-event-update_edit" value="Submit">
		</div>	
		</form>
      </div>
     
    </div>
  </div>
</div>
	<?php
		}
	
	}
	?>
	
	<!---------------------------------Edit Events ends--------------------------------------->
	
	
	
	
	<!---------------------------------Create Group Starts--------------------------------------->
	
	
	<?php
	if($this->session->userdata('user_id') !='')
	{
		
	
	
		?>

	<div class="modal fade" id="myModal-group-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
       <h4 class="modal-title">Create Group</h4>

	<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('group/create_group');?>" name="new_create_group" id="new_create_group" method="post" autocomplete="off">
						
				<input type="hidden" name="group_create_user_id" id="group_create_user_id" value="<?php echo $this->session->userdata('user_id');?>"/>
							
				<input type="text" class="span23 required23 textbox" label="Group Name" name="group_name" id="group_name" placeholder="Group Name...">
				<div id="group_name_error" class="error_div" style="color:red;"></div>
				
				<?php $geteventcreator = $this->modelgroup->Geteventcreator();?>
				
					<select multiple name="invite_people[]" id="invite_people" label="Invite People" >
					<option value="">Select User to Invite</option>
				       <?php                          
					    if(count($geteventcreator)>0 || $geteventcreator !=0)
					    {
						foreach($geteventcreator as $key=>$val)
						{
						    
					    ?>
					    <option value="<?php echo $val->id;?>"><?php echo $val->first_name."&nbsp&nbsp".$val->last_name."&nbsp&nbsp&nbsp";?></option>
					    <?php
						}
					    }
					    ?>
				    </select>
				
			   <div id="invite_people_error" class="error_div" style="color:red;"></div>
			   
				 <?php $getcountry = $this->modelgoals->GetCountry();?>
				    
				    <select class="span23 required23 select" name="country_group" id="country_group" label="Country" onChange="Select_state_group(this.value)">
				    <option value="">Select Country</option>
				   <?php                          
					if(count($getcountry)>0 || $getcountry !=0)
					{
					    foreach($getcountry as $key=>$val)
					    {
					?>
					<option value="<?php echo $val->id;?>" ><?php echo $val->country_name;?></option>
					<?php
					    }
					}
					?>
				</select>
				  <div id="country_group_error" class="error_div" style="color:red;"></div>			  
				
				    
					<div id="groups_state_div">
						<select class="span23 required23 select" name="state_group" id="state_group" label="State" >
						     <option value="">Select Country first,then state</option>                            
						 </select>
					</div>
				<div id="state_group_error" class="error_div" style="color:red;"></div>
				
				<input type="text" class="span23 required23 textbox" name="location_group" id="location_group" label="Location" placeholder="Location" >
				
				<div id="location_group_error" class="error_div" style="color:red;"></div>							
			

				
				<?php $SportsyData = $this->modelgoals->GetAllSports();?>
				
			<select name="sports_group" id="sports_group" class="span23 required23 select" label="Sports">
				    <option value="">Select Sports</option>
				    <?php
				  
				    if(count($SportsyData)>0 || $SportsyData !=0)
				    {
					foreach($SportsyData as $key=>$val)
					{
				    ?>
				    <option value="<?php echo $val->id;?>" ><?php echo $val->title;?></option>
				    <?php
					}
				    }
				    ?>
				</select>
				
				<div id="sports_group_error" class="error_div" style="color:red;"></div>
			
			
											
				<textarea class="span23 required23 textbox" label="Description" name="desc_group" id="desc_group"></textarea>								
				<div id="desc_group_error" class="error_div" style="color:red;"></div>
			
				
				<input type="file"  class="span23 required23" name="photo_group" value=""  label="image" id="photo_group" />
				<div id="photo_group_error" class="error_div" style="color:red;"></div>
			
			
			
				
				

			  <div class="">
				<input name="" type="button" class="loginbut" data-toggle="modal" data-target="#myModal-profile-pic-update" id="myModal-create-group" value="Submit">
		</div>	
		</form>
      </div>
     
    </div>
  </div>
</div>
	<?php
	
	}
	?>
	
	<!---------------------------------Create Group ends--------------------------------------->
	
	
	
	
	<!-----------------------------------registration starts------------------------------------>
	
<div class="modal fade" id="myModal-up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><span>Sign up </span>with your Facebook account</h4>
        <div class="Modalfacebook">
        	<a href="#">
            	<div class="Facebookpop"><img src="<?php echo base_url();?>images/facepop.png" alt=""></div>
                <a href="<?php echo site_url('signup/inner_signup_facebook');?>"><div class="Facetxt">Sign Up with Facebook</div></a>
            </a>
        </div>
      </div>
      <div class="modal-body">
        <div class="ordevider">OR</div>
		<?php
		$instructor_main_id = $this->uri->segment(3);
		$result=$this->modelsignup->instructor_signup();
		$instructor_user_id = $this->uri->segment(4);
		
		
		
		?>
		<div class="rediomain">
        <form class="" enctype="multipart/form-data" action="<?php echo site_url('signup/registration_full');?>" name="register" id="register" method="post" autocomplete="off">
		<input type="hidden" name="instructor_id_by_user" id="instructor_id_by_user" value="<?php echo @$instructor_user_id; ?>"/>
		<input type="hidden" name="instructor_main_id" id="instructor_main_id" value="<?php echo @$instructor_main_id; ?>"/>

			<div class="Radioouter">
			<input type="radio" name="ex1" id="ex1_a" value="1" class="radio-new">
			<label class="lableof" for="ex1_a">Male</label>
		    </div>
		    <div class="Radioouter">
			<input type="radio"  name="ex1" id="ex1_b" value="2" class="radio-new">
			<label class="lableof" for="ex1_b">Female</label>
		    </div>
		    <div class="Radioouter">
			<input type="radio" name="ex1" id="ex1_c" value="3" class="radio-new">
			<label class="lableof" for="ex1_c">Other wonderful options</label>
		    </div>
		     <div id="ex1_error" class="error_div" style="color:red;"></div>
		</div>
		<?php
		if(count($result)>0 AND $result !=0)
		{
			foreach($result as $ins_val)
			{
			?>
				<input type="text" class="span9 required textbox" label="First name" name="first_name" id="first_name" placeholder="First name" value="<?php echo $ins_val->first_name;?>">
				<div id="first_name_error" class="error_div" style="color:red;"></div>
			<?php
			}
		}
		else
		{
			?>
			<input type="text" class="span9 required textbox" label="First name" name="first_name" id="first_name" placeholder="First name" >
			<div id="first_name_error" class="error_div" style="color:red;"></div>
			<?php
		}
		?>
		
		<input type="text" class="span9 required textbox" label="Last name" name="last_name" id="last_name" placeholder="Last name" >
                <div id="last_name_error" class="error_div" style="color:red;"></div>
		
		 
		
		<?php
		$result_email=$this->modelsignup->instructor_email($instructor_user_id);
		//echo $result_email;
		if($result_email !=0 OR $result_email !='')
		{
			
			?>
				<input type="text" readonly class="span9 required textbox" label="Email Address" value="<?php echo $result_email;?>" name="email_address" id="email_address" placeholder="Email Address">
				<div id="email_address_error" class="error_div" style="color:red;"></div>
			<?php
			
		}
		else
		{
			?>
				<input type="text" class="span9 required textbox" label="Email Address" name="email_address" id="email_address" placeholder="Email Address">
				<div id="email_address_error" class="error_div" style="color:red;"></div>
			<?php
		}
		?>
		
		 <input type="password" class="span9 required textbox" name="passwords" id="passwords" label="Password" placeholder="Password">                        
                <div id="passwords_error" class="error_div" style="color:red;"></div>
		
		<input type="password" class="span9 required textbox" name="conf_password" id="conf_password" label="Confirm password" class="span9 required" placeholder="Confirm Password">                        
                <div id="conf_password_error" class="error_div" style="color:red;"></div>
		
		
                         <?php $getcountry = $this->modelgoals->GetCountry();?>
                            
			<select class="span9 required demo-default" tabindex="1" name="country" id="country" label="Country" onChange="Select_state(this.value)">
			<option value="">Select Country</option>
		       <?php                          
			    if(count($getcountry)>0 || $getcountry !=0)
			    {
				foreach($getcountry as $key=>$val)
				{
			    ?>
			    <option value="<?php echo $val->id;?>"><?php echo $val->country_name;?></option>
			    <?php
				}
			    }
			    ?>
		    </select>
			<script>
			$('#country').selectize();
			</script>
                <div id="country_error" class="error_div" style="color:red;"></div>
		
		
                        
			<div id="select_div">
			    <select class="span9 required select" tabindex="1" name="state" id="state" label="State">
				<option value="">Select Country first,then state</option>                          
			     </select>
			</div>
                <div id="country_error" class="error_div" style="color:red;"></div>
		
		 <input type="text" class="span9 required textbox" name="location" id="location" label="Location" placeholder="Location">                        
                <div id="location_error" class="error_div" style="color:red;"></div>
		<?php
		if(count($result)>0 AND $result !=0)
		{
			foreach($result as $ins_val)
			{
			?>
			
                        <select disabled name="profile" id="profile" label="Profile" class="span9 required select" tabindex="1">
                            <option value="">Select Profile</option>
                            <option value="1">Personal</option>
                            <option value="2" <?php if($ins_val->user_type==2){echo 'selected';}?>>Instructor</option>
                            <option value="3">Business</option>
                        </select>
                <div id="profile_error" class="error_div" style="color:red;"></div>
		<?php
			}
		}
		else
		{
			?>
			 <select name="profile" id="profile" label="Profile" class="span9 required select" tabindex="1">
                            <option value="">Select Profile</option>
                            <option value="1">Personal</option>
                            <option value="2">Instructor</option>
                            <option value="3">Business</option>
                        </select>
                <div id="profile_error" class="error_div" style="color:red;"></div>
			<?php
		}
		?>
		<!--<select class="select" tabindex="1">
				<option value="">Location</option>
					<option value="1">USA</option>
					<option value="9">Canada</option>
			</select>
		<select class="select" tabindex="1">
				<option value="">Profile</option>
					<option value="1">Personal</option>
					<option value="9">Public</option>
			</select>-->
	      </div>
	      <div class="">
		<input name="" type="button" id="sign_up" class="loginbut" value="SIGN UP">
	      </div>
</form>
      <div class="modal-footer">
      	<div class="Donthave pull-left">Already an SportspEEps member?</div>
        <div class="Donthave pull-right"><a href="javascript:void(0);" id="login-modal">Log in</a></div>
      </div>
    </div>
  </div>
</div>
	<!-----------------------------------registration ends------------------------------------>

	<!---------------------------------facebook registration starts---------------------------->

<div class="modal fade" id="myModal-up_fb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <div class="login-inner clearfix">
				<?php
				if($this->session->userdata('success_msg_reg_fcbk')!='')
				{
				?>
				<div class="alert_success">
				<?php
					echo $this->session->userdata('success_msg_reg_fcbk');
					$this->session->unset_userdata('success_msg_reg_fcbk');
				?>
				</div>
				<?php
				}
				
				
				?>
		</div>
		<br />
      </div>
      <div class="modal-body">
       
		
		<div class="rediomain">
			<h4 class="modal-title">Sign Up</h4>
		<form class="spcing_otr" id="registration_form" name="registration_form" method="post" enctype="multipart/form-data" action="<?php echo site_url('signup/registration_full')?>">
		<input type="hidden" id="email_format" name="email_format" value="">
		<input type="hidden" id="email_hidden" name="email_hidden" value="">
		<input type="hidden" id="registration_type" name="registration_type" value="<?php if($this->session->userdata('registration_type')!=''){echo $this->session->userdata('registration_type');}else{echo '';}?>">
		<input type="hidden" id="facebook_id" name="facebook_id" value="<?php if($this->session->userdata('facebook_id')!=''){echo $this->session->userdata('facebook_id');}else{echo '';}?>">
		<input type="hidden" id="facebook_image" name="facebook_image" value="<?php if($this->session->userdata('facebook_image')!=''){echo $this->session->userdata('facebook_image');}else{echo '';}?>">
		
			<div class="Radioouter">
			<input type="radio" name="ex1_1" id="ex1_a_1" value="1" class="radio-new">
			<label class="lableof" for="ex1_a_1">Male</label>
		    </div>
		    <div class="Radioouter">
			<input type="radio"  name="ex1_1" id="ex1_b_1" value="2" class="radio-new">
			<label class="lableof" for="ex1_b_1">Female</label>
		    </div>
		    <div class="Radioouter">
			<input type="radio" name="ex1_1" id="ex1_c_1" value="3" class="radio-new">
			<label class="lableof" for="ex1_c_1">Other wonderful options</label>
		    </div>
		<div id="ext1_1_error" class="error_div" style="color:red;"></div>

		</div>
		<input type="text" class="span7 required7 textbox" label="First name" name="first_name1" value="<?php if($this->session->userdata('facebook_first_name')!=''){echo $this->session->userdata('facebook_first_name');}else{echo '';}?>" id="first_name1" placeholder="First name" >
		 <div id="first_name1_error" class="error_div" style="color:red;"></div>

		
		<input type="text" class="span7 required7 textbox" label="Last name" name="last_name1" id="last_name1" value="<?php if($this->session->userdata('facebook_last_name')!=''){echo $this->session->userdata('facebook_last_name');}else{echo '';}?>" placeholder="Last name" >
                <div id="last_name1_error" class="error_div" style="color:red;"></div>
		
		 <input type="text" class="span7 required7 textbox" label="Email Address" name="email_address1" id="email_address1" value="<?php if($this->session->userdata('facebook_email')!=''){echo $this->session->userdata('facebook_email');}else{echo '';}?>" placeholder="Email Address">
                <div id="email_address1_error" class="error_div" style="color:red;"></div>
		
                         <?php $getcountry = $this->modelgoals->GetCountry();?>
                            
			<select class="span7 required7 demo-default" tabindex="1" name="country1" id="country1" label="Country" onChange="Select_state_fb(this.value)">
			<option value="">Select Country</option>
		       <?php                          
			    if(count($getcountry)>0 || $getcountry !=0)
			    {
				foreach($getcountry as $key=>$val)
				{
			    ?>
			    <option value="<?php echo $val->id;?>"><?php echo $val->country_name;?></option>
			    <?php
				}
			    }
			    ?>
		    </select>
			<script>
				$('#country1').selectize();
				</script>
                <div id="country1_error" class="error_div" style="color:red;"></div>		
		
                        
			<div id="select_div_fb">
			    <select class="span7 required7 select" tabindex="1" name="state_fb" id="state_fb" label="State">
				<option value="">Select Country first,then state</option>                          
			     </select>
			</div>
                <div id="state1_error" class="error_div" style="color:red;"></div>
		
		 <input type="text" class="span7 required7 textbox" name="location1" id="location1" label="Location" placeholder="Location">                        
                <div id="location1_error" class="error_div" style="color:red;"></div>
		
		
                        <select name="profile1" id="profile1" label="Profile" class="span7 required7 select" tabindex="1">
                            <option value="">Select Profile</option>
                            <option value="1">Personal</option>
                            <option value="2">Instructor</option>
                            <option value="3">Business</option>
                        </select>
                <div id="profile1_error" class="error_div" style="color:red;"></div>
		
		<!--<select class="select" tabindex="1">
				<option value="">Location</option>
					<option value="1">USA</option>
					<option value="9">Canada</option>
			</select>
		<select class="select" tabindex="1">
				<option value="">Profile</option>
					<option value="1">Personal</option>
					<option value="9">Public</option>
			</select>-->
	      </div>
	      <div class="">
		<input name="" type="button" id="sign_in_fcbk" class="loginbut" value="SIGN UP">
	      </div>
</form>
      <div class="modal-footer">
      	<div class="Donthave pull-left">Already an SportspEEps member?</div>
        <div class="Donthave pull-right"><a href="javascript:void(0);" id="login-modal">Log in</a></div>
      </div>
    </div>
  </div>
</div>

	<!------------------------------- facebook registration ends ------------------------------>
	
	<!-------------------------------- Profile Completion starts ------------------------------->
<div class="modal fade" id="myModal-profile1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog-new">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title-big" id="myModalLabel">Complete your profile</h4>
        <div class="favouritetxt">What’s your favourite sports?</div>
      </div>
<form class="" enctype="multipart/form-data" action="<?php echo site_url('signup/registration_complete');?>" name="register_complete" id="register_complete" method="post" autocomplete="off">
<input type="hidden" name="user_ids" id="user_ids" value="<?php echo $this->uri->segment(3);?>">
<input type="hidden" name="fb_user" id="fb_user" value="<?php echo $this->uri->segment(4);?>">
<input type="hidden" name="user_ins_id" id="user_ins_id" value="<?php echo $this->uri->segment(3);?>">

      <div class="modal-body clearfix">
        <div class="left">
        <div class="category">Sports 1<span>*</span></div>
        <?php $SportsyData = $this->modelsports->GetAllSports();?>
	
		<select name="sports1" id="sports1" class="span6 required6 demo-default" tabindex="1" label="Sports1" onChange="sports1_otherss(this.value)">
		    <option value="">Select Your Sports</option>
		    <?php
		  
		    if(count($SportsyData)>0 || $SportsyData !=0)
		    {
			foreach($SportsyData as $key=>$val)
			{
		    ?>
		    <option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
		    <?php
			}
		    }
		    ?>
	</select>
		<script>
		$('#sports1').selectize();
		</script>
	<div id="sports1_error" class="error_div" style="color:red;"></div>
	
	<div id="sports1_other_div" style="display:none">
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="sports1_other" id="sports1_other" class="textbox" placeholder="Sports1 Other...">
		<div id="sports1_other_error" class="error_div" style="color:red;"></div>
	</div>
	
        <div class="category">Sports 2</div>
        <?php $SportsyData2 = $this->modelsports->GetAllSports();?>
	       <select name="sports2" id="sports2" class="demo-default" tabindex="2" onChange="sports2_otherss(this.value)">
		    <option value="">Select Your Sports</option>
		    <?php                          
		       if(count($SportsyData2)>0 || $SportsyData2 !=0)
		       {
			   foreach($SportsyData2 as $key=>$val)
			   {
		       ?>
		       <option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
		       <?php
			   }
		       }
		       ?>
	       </select>
	       <script>
		$('#sports2').selectize();
		</script>
	       <div id="sports2_error" class="error_div" style="color:red;"></div>
	       
	 <div id="sports2_other_div" style="display:none">      
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="sports2_other" id="sports2_other" class="textbox" placeholder="Sports2 Other...">
		<div id="sports2_other_error" class="error_div" style="color:red;"></div>
	 </div>
	
        <div class="category">Sports 3</div>
        <?php $SportsyData3 = $this->modelsports->GetAllSports();?>
	       <select name="sports3" id="sports3" class="demo-default" tabindex="3" onChange="sports3_otherss(this.value)">
		    <option value="">Select Your Sports</option>
		  <?php                          
		       if(count($SportsyData3)>0 || $SportsyData3 !=0)
		       {
			   foreach($SportsyData3 as $key=>$val)
			   {
		       ?>
		       <option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
		       <?php
			   }
		       }
		       ?>
	       </select>
	       <script>
		$('#sports3').selectize();
		</script>
	       <div id="sports3_error" class="error_div" style="color:red;"></div>
	 <div id="sports3_other_div" style="display:none">      
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="sports3_other" id="sports3_other" class="textbox" placeholder="Sports3 Other...">
		<div id="sports3_other_error" class="error_div" style="color:red;"></div>
	</div>  
        <!--<div class="category">How tall are you?</div>
        <input type="text" label="How tall" tabindex="4" name="how_tall" id="how_tall" class="textbox" placeholder="How tall are you?">-->
	
	<script>
        	$(document).ready(function(){
				$('#Radioouterus').click(function(){					   
				 $("#how_tall").attr("placeholder", "feet and inches");
			  	$("#how_weigh").attr("placeholder", "lbs");
			  });
				$('#Radiooutermetric').click(function(){
						$("#how_tall").attr("placeholder", "cm");
			  			$("#how_weigh").attr("placeholder", "kg");						  
					});							  
			});
        </script>
        <div class="Radiotxtouter">
        	<div class="Donthave pull-left" style="line-height:14px">Unit System</div>
        </div>
        
        <div class="rediomain_com">
        <div class="Radioouter" id="Radioouterus" style="padding-top: 10px">
                <input type="radio" name="ex1_t" id="ex1_t_us" value="1" class="radio-new">
                <label class="lableof" for="ex1_t_us">US</label>
            </div>
            <div class="Radioouter" id="Radiooutermetric" style="padding-top: 10px">
                <input type="radio" name="ex1_t" id="ex1_t_mc" value="2" class="radio-new">
                <label class="lableof" for="ex1_t_mc">Metric</label>
            </div>
            <div class="howtall">
            <div class="category hidden-sm hidden-lg hidden-md">How tall are you?</div>
        <input type="text" label="How tall" tabindex="4" name="how_tall" id="how_tall" class="textbox" placeholder="How tall are you?">
            </div>
        </div>
	
	<!--<div id="how_tall_error" class="error_div" style="color:red;"></div>-->
	
        <div class="category">How much do you weigh?</div>
        <input type="text" label="How much weigh" tabindex="5" name="how_weigh" id="how_weigh" placeholder="How much do you weigh?" class="textbox">
	<div id="how_weigh_error" class="error_div" style="color:red;"></div>
        <div class="category">Body Fat %</div>
        <input type="text" label="Body fat" tabindex="6" name="body_fat" id="body_fat" class="textbox">
        <div id="body_fat_error" class="error_div" style="color:red;"></div>
        <div class="textmessage">You will be required to enter number from 1 to 100 . this number will be presented in %</div>
        </div>
        <div class="right">
        <div class="category">Goal 1<span>*</span></div>
        <?php $GoalsData = $this->modelgoals->GetAllGoals();?>
       <select name="goal1" id="goal1" class="span6 required6 demo-default" tabindex="7" label="Goal1" onchange="goal1_otherss(this.value)">
	    <option value="">Select Your Goals</option>
	    <?php                          
	       if(count($GoalsData)>0 || $GoalsData !=0)
	       {
		   foreach($GoalsData as $key=>$val)
		   {
	       ?>
	       <option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
	       <?php
		   }
	       }
	       ?>
       </select>
       <script>
	$('#goal1').selectize();
	</script>
       <div id="goal1_error" class="error_div" style="color:red;"></div>
        
	 <div id="goal1_other_div" style="display:none">      
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="goal1_other" id="goal1_other" class="textbox" placeholder="Goal1 Other...">
		<div id="goal1_other_error" class="error_div" style="color:red;"></div>
	</div>
	 
	 
        <div class="category">Goal 2</div>
       <?php $GoalsData2 = $this->modelgoals->GetAllGoals();?>
	<select name="goal2" id="goal2" class="demo-default" tabindex="7" onchange="goal2_otherss(this.value)">
	    <option value="">Select Your Goals</option>
	   <?php                          
		if(count($GoalsData2)>0 || $GoalsData2 !=0)
		{
		    foreach($GoalsData2 as $key=>$val)
		    {
		?>
		<option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
		<?php
		    }
		}
		?>
	</select>
	<script>
	$('#goal2').selectize();
	</script>
	<div id="goal2_error" class="error_div" style="color:red;"></div>
	
	 <div id="goal2_other_div" style="display:none">      
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="goal2_other" id="goal2_other" class="textbox" placeholder="Goal2 Other...">
		<div id="goal2_other_error" class="error_div" style="color:red;"></div>
	</div>
	 
        <div class="category">Goal 3</div>
        <?php $GoalsData3 = $this->modelgoals->GetAllGoals();?>
	<select name="goal3" id="goal3" class="demo-default" tabindex="9" onchange="goal3_otherss(this.value)">
	    <option value="">Select Your Goals</option>
	   <?php                          
		if(count($GoalsData3)>0 || $GoalsData3 !=0)
		{
		    foreach($GoalsData3 as $key=>$val)
		    {
		?>
		<option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
		<?php
		    }
		}
		?>
	</select>
	<script>
	$('#goal3').selectize();
	</script>
	<div id="goal3_error" class="error_div" style="color:red;"></div>
	
	 <div id="goal3_other_div" style="display:none">      
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="goal3_other" id="goal3_other" class="textbox" placeholder="Goal3 Other...">
		<div id="goal3_other_error" class="error_div" style="color:red;"></div>
	</div>
	 
        <div class="category">Body Type</div>
            <?php $bodytype = $this->modelgoals->GetAllBodytype();?>
	<select name="body_type" id="body_type" class="select" tabindex="10">
	    <option value="">Select Bodytype</option>
	    <?php                          
		if(count($bodytype)>0 || $bodytype !=0)
		{
		    foreach($bodytype as $key=>$val)
		    {
		?>
		<option value="<?php echo $val->id;?>"><?php echo $val->body_type;?></option>
		<?php
		    }
		}
		?>
	</select>
	<div id="body_type_error" class="error_div" style="color:red;"></div>
            <div class="category">Date Of birth 
            <div class="checkbutouter">
                <div class="Checkouter">
                     <input type="checkbox" id="private"  value="1" class="checkbox-new" name="private"/>
                    
                </div>
		&nbsp&nbsp<label class="lableof" for="private">Make it as private</label>
        	</div>
        </div>
            <div class="DOB clearfix">
            <div class="Dobouter">
                <select class="select" tabindex="11" name="date_date" id="date_date">
                    <option value="">DD</option>
                     <?php
		for($i=1; $i<=31; $i++) {
		    ?>
		       <option value="<?php if($i<10){echo '0'.$i;}else{echo $i;}?>"><?php if($i<10){echo '0'.$i;}else{echo $i;}?></option>;
			<?php
		}
		?>
	    </select>
            </div>
            <div class="Dobouter">
                <select class="select" tabindex="11" name="date_month" id="date_month">
                    <option value="">MM</option>
                    <?php
			$months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			for ($month = 1; $month <= 12; $month++)
			{
		    ?>
			    <option value="<?php if($month<10){echo '0'.$month;}else{echo $month;}?>"><?php echo $months[$month];?></option>;
	       <?php
			}
			   
		   
		    ?>
		</select>
            </div>
            <div class="Dobouter">
                <select class="select" tabindex="11" name="date_year" id="date_year">
                    <option value="">YYYY</option>
                    <?php
	    for ($year = 1950; $year <= date("Y"); $year++) {
		?>
		    <option value="<?php echo $year;?>"><?php echo $year;?></option>;

		<?php
       
	    }
	    ?>
	</select>
            </div>
          </div> 
       		<div class="category">Lifestyle</div>
		<script>
		
		var options = [];
		var title = [];
	       </script>
           <?php $lifestyle = $this->modelgoals->GetAllLifestyle();?>
       <select name="life_style[]" id="select-junk">
	
       </select>
	   <?php                          
	       if(count($lifestyle)>0 || $lifestyle !=0)
	       {
		   foreach($lifestyle as $key=>$val)
		   {
			
	       ?>
	       
	       
	       <script>		
		
		//alert("<?php echo $val->name;?>");
		
		var dropdowntitle="<?php echo $val->name;?>";

		title.push(dropdowntitle);
		//alert(dropdowntitle);
		options.push({
			id: "<?php echo $val->id;?>",
			title: dropdowntitle
					
		    });
	       </script>
	       <?php
		   }
	       }
	       ?>
       <script>
	//$(document).ready(function () {
		$('#select-junk').selectize({
						maxItems: null,
						maxOptions: 100,
						valueField: 'id',
						labelField: 'title',
						searchField: 'title',
						sortField: 'title',
						options: options,
						create: false,
						 plugins: ['remove_button'],
					});
		
	//});
	</script>
       <div id="life_style_error" class="error_div" style="color:red;"></div>
        </div>
      </div>
      <div class="Outerbutton">
      	<input name="" type="button" id="prof_comp" class="loginbut" value="complete your profile">
      </div>
    </div>
  </div>
    </form>
</div>
<div id="preloader" style="">
    <div id="status" style=""></div>
</div>
	<!------------------------------- Profile Completion ends  ------------------------------>
	
	<!----------------------------- update profile of a particular user starts----------------->
	<?php
	if($this->session->userdata('user_id') !='')
	{
		?>
	<div class="modal fade" id="myModal-update-account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog-new">
    <div class="modal-content">
	
      <div class="modal-header">
	<?php
	
	$dataone_fetch=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));

	$data=$dataone_fetch[0];
	?>
       <h4 class="modal-title-big" id="myModalLabel">Update your profile</h4>
        <div class="favouritetxt">What’s your favourite sports?</div>
      </div>
<form class="" enctype="multipart/form-data" action="<?php echo site_url('home/update_profile_account');?>" name="update_account_complete" id="update_account_complete" method="post" autocomplete="off">
<input type="hidden" name="update_user_id" id="update_user_id" value="<?php echo $this->session->userdata('user_id');?>">

      <div class="modal-body clearfix">
        <div class="left">	
		
		
        <div class="category">Sports 1<span>*</span></div>
        <?php $SportsyData = $this->modelsports->GetAllSports();?>
		<select name="sports1_edit" id="sports1_edit" class="span12 required12 demo-default" tabindex="1" label="Sports1" onChange="sports1_otherss_edit(this.value)">
		    <option value="">Select Sports</option>
		    <?php
		  
		    if(count($SportsyData)>0 || $SportsyData !=0)
		    {
			foreach($SportsyData as $key=>$val)
			{
		    ?>
		    <option value="<?php echo $val->id;?>" <?php if($data->sports1==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
		    <?php
			}
		    }
		    ?>
	</select>
		<script>
		$('#sports1_edit').selectize();
		</script>
	<div id="sports1_edit_error" class="error_div" style="color:red;"></div>
	
	<div id="sports1_edit_other_div" <?php if($data->sports1==5){echo "style='display:block'";}else{echo "style='display:none'";}?>>
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="sports1_edit_other" value="<?php echo @$data->sports1_other;?>" id="sports1_edit_other" class="textbox" placeholder="Sports1 Other...">
		<div id="sports1_edit_other_error" class="error_div" style="color:red;"></div>
	</div>
	
        <div class="category">Sports 2</div>
        <?php $SportsyData2 = $this->modelsports->GetAllSports();?>
	       <select name="sports2_edit" id="sports2_edit" class="demo-default" tabindex="2" onChange="sports2_otherss_edit(this.value)">
		    <option value="">Select Sports</option>
		    <?php                          
		       if(count($SportsyData2)>0 || $SportsyData2 !=0)
		       {
			   foreach($SportsyData2 as $key=>$val)
			   {
		       ?>
		       <option value="<?php echo $val->id;?>" <?php if($data->sports2==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
		       <?php
			   }
		       }
		       ?>
	       </select>
	       <script>
		$('#sports2_edit').selectize();
		</script>
	       <div id="sports2_edit_error" class="error_div" style="color:red;"></div>
	       
	<div id="sports2_edit_other_div" <?php if($data->sports2==5){echo "style='display:block'";}else{echo "style='display:none'";}?>>
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="sports2_edit_other" value="<?php echo @$data->sports2_other;?>" id="sports2_edit_other" class="textbox" placeholder="Sports2 Other...">
		<div id="sports2_edit_other_error" class="error_div" style="color:red;"></div>
	</div>
	       
        <div class="category">Sports 3</div>
        <?php $SportsyData3 = $this->modelsports->GetAllSports();?>
	       <select name="sports3_edit" id="sports3_edit" class="demo-default" tabindex="3" onChange="sports3_otherss_edit(this.value)">
		    <option value="">Select Sports</option>
		  <?php                          
		       if(count($SportsyData3)>0 || $SportsyData3 !=0)
		       {
			   foreach($SportsyData3 as $key=>$val)
			   {
		       ?>
		       <option value="<?php echo $val->id;?>" <?php if($data->sports3==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
		       <?php
			   }
		       }
		       ?>
	       </select>
	       <script>
				$('#sports3_edit').selectize();
				</script>
	       <div id="sports3_edit_error" class="error_div" style="color:red;"></div>
	       
	<div id="sports3_edit_other_div" <?php if($data->sports3==5){echo "style='display:block'";}else{echo "style='display:none'";}?>>
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="sports3_edit_other" id="sports3_edit_other" value="<?php echo @$data->sports3_other;?>" class="textbox" placeholder="Sports3 Other...">
		<div id="sports3_edit_other_error" class="error_div" style="color:red;"></div>
	</div>

	<div class="category">Country<span>*</span></div>
		 <?php $getcountry = $this->modelgoals->GetCountry();?>
                            
			<select class="span12 required12 demo-default" tabindex="1" name="country_profile_edit" id="country_profile_edit" label="Country" onChange="Select_state1(this.value)">
			<option value="">Select Country</option>
		       <?php                          
			    if(count($getcountry)>0 || $getcountry !=0)
			    {
				foreach($getcountry as $key=>$val)
				{
			    ?>
			    <option value="<?php echo $val->id;?>" <?php if($data->country_id==$val->id){echo "selected";} ?>><?php echo $val->country_name;?></option>
			    <?php
				}
			    }
			    ?>
		    </select>
			<script>
			$('#country_profile_edit').selectize();
			</script>
                <div id="country_profile_edit_error" class="error_div" style="color:red;"></div>		
		
                        <div class="category">State<span>*</span></div>
			<div id="select_div_edit">
			<select name="state_profile_edit" id="state_profile_edit" class="demo-default"label="State">

			   <?php
				if ($data->state_id !=0)
				{
					$getstate = $this->modelgoals->GetState($data->country_id);
			    ?>
							    
				     <?php
				     
				    if(count($getstate)!='0')
				    {
					
					
					if(print_r($getstate) !=0 OR count($getstate)!=0)
					{
					
						foreach($getstate as $key=>$val)
						{
					    ?>
					    <option value="<?php echo $val->id;?>" <?php if($data->state_id==$val->id){echo "selected";} ?>><?php echo $val->state_name;?></option>
					    <?php
						}
					}
				    }
				}
				else
				{
				    
				    
				    ?>
					    <option value="0">Not Available</option>

				    <?php
				}
				?>                     
				 </select>
			<script>
			$('#state_profile_edit').selectize();
			</script>
			</div>
                <div id="state_profile_edit__error" class="error_div" style="color:red;"></div>
		<div class="category">Location<span>*</span></div>
		 <input type="text" class="span12 required12 textbox" value="<?php echo $data->location;?>" name="location_edit" id="location_edit" label="Location" placeholder="Location">                        
                <div id="location_edit_error" class="error_div" style="color:red;"></div>

		
		<script>
        	$(document).ready(function(){
				$('#Radioouterus1').click(function(){					   
				 $("#how_tall_edit").attr("placeholder", "feet and inches");
			  	$("#how_weigh_edit").attr("placeholder", "lbs");
			  });
				$('#Radiooutermetric1').click(function(){
						$("#how_tall_edit").attr("placeholder", "cm");
			  			$("#how_weigh_edit").attr("placeholder", "kg");						  
					});							  
			});
        </script>
        <div class="Radiotxtouter">
        	<div class="Donthave pull-left" style="line-height:14px">Unit System</div>
        </div>
        
        <div class="rediomain_com">
        <div class="Radioouter" id="Radioouterus1" style="padding-top: 10px">
                <input type="radio" name="ex1_t_edit" id="ex1_t_edit_us"
		       <?php
		       if($data->unit_system !=0 AND $data->unit_system==1)
			{
				echo "checked";
			}
			else
			{
				echo '';
			}
		       ?>
		       value="1" class="radio-new">
                <label class="lableof" for="ex1_t_edit_us">US</label>
            </div>
            <div class="Radioouter" id="Radiooutermetric1" style="padding-top: 10px">
                <input type="radio" name="ex1_t_edit" id="ex1_t_edit_mc"
		        <?php
		       if($data->unit_system !=0 AND $data->unit_system==2)
			{
				echo "checked";
			}
			else
			{
				echo '';
			}
		       ?>
		       value="2" class="radio-new">
                <label class="lableof" for="ex1_t_edit_mc">Metric</label>
            </div>
            <div class="howtall">
            <div class="category hidden-sm hidden-lg hidden-md">How tall are you?</div>
        <input type="text" label="How tall" name="how_tall_edit" id="how_tall_edit" value="<?php echo $data->tall;?>" class="textbox" placeholder="How tall are you?">
		<div id="how_tall_edit_error" class="error_div" style="color:red;"></div>
            </div>
        </div>

		
	<div class="category">How much do you weigh?</div>
       <input type="text" label="How much weigh" tabindex="5" value="<?php echo $data->weigh;?>" name="how_weigh_edit" id="how_weigh_edit" placeholder="How much do you weigh?" class="textbox">
       <div id="how_weigh_edit_error" class="error_div" style="color:red;"></div>
        
        </div>
        <div class="right">
        <div class="category">Goal 1<span>*</span></div>
        <?php $GoalsData = $this->modelgoals->GetAllGoals();?>
       <select name="goal1_edit" id="goal1_edit" class="span12 required12 demo-default" tabindex="7" label="Goal1" onchange="goal1_otherss_edit(this.value)">
	    <option value="">Select Goals</option>
	    <?php                          
	       if(count($GoalsData)>0 || $GoalsData !=0)
	       {
		   foreach($GoalsData as $key=>$val)
		   {
	       ?>
	       <option value="<?php echo $val->id;?>" <?php if($data->goal1==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
	       <?php
		   }
	       }
	       ?>
       </select>
       <script>
	$('#goal1_edit').selectize();
	</script>
       <div id="goal1_edit_error" class="error_div" style="color:red;"></div>
       
       <div id="goal1_other_edit_div" <?php if($data->goal1==14){echo "style='display:block'";}else{echo "style='display:none'";}?>>      
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="goal1_other_edit" value="<?php echo @$data->goal1_other ;?>" id="goal1_other_edit" class="textbox" placeholder="Goal1 Other...">
		<div id="goal1_other_edit_error" class="error_div" style="color:red;"></div>
	</div>
       
        <div class="category">Goal 2</div>
       <?php $GoalsData2 = $this->modelgoals->GetAllGoals();?>
	<select name="goal2_edit" id="goal2_edit" class="demo-default" tabindex="7" onchange="goal2_otherss_edit(this.value)">
	    <option value="">Select Goals</option>
	   <?php                          
		if(count($GoalsData2)>0 || $GoalsData2 !=0)
		{
		    foreach($GoalsData2 as $key=>$val)
		    {
		?>
		<option value="<?php echo $val->id;?>" <?php if($data->goal2==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
		<?php
		    }
		}
		?>
	</select>
	<script>
	$('#goal2_edit').selectize();
	</script>
	<div id="goal2_edit_error" class="error_div" style="color:red;"></div>
	
	<div id="goal2_other_edit_div" <?php if($data->goal2==14){echo "style='display:block'";}else{echo "style='display:none'";}?>>      
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="goal2_other_edit" id="goal2_other_edit" value="<?php echo @$data->goal2_other ;?>" class="textbox" placeholder="Goal2 Other...">
		<div id="goal2_other_edit_error" class="error_div" style="color:red;"></div>
	</div>
	
        <div class="category">Goal 3</div>
        <?php $GoalsData3 = $this->modelgoals->GetAllGoals();?>
	<select name="goal3_edit" id="goal3_edit" class="demo-default" tabindex="9" onchange="goal3_otherss_edit(this.value)">
	    <option value="">Select Goals</option>
	   <?php                          
		if(count($GoalsData3)>0 || $GoalsData3 !=0)
		{
		    foreach($GoalsData3 as $key=>$val)
		    {
		?>
		<option value="<?php echo $val->id;?>" <?php if($data->goal3==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
		<?php
		    }
		}
		?>
	</select>
	<script>
	$('#goal3_edit').selectize();
	</script>
	<div id="goal3_edit_error" class="error_div" style="color:red;"></div>
	
	<div id="goal3_other_edit_div" <?php if($data->goal3==14){echo "style='display:block'";}else{echo "style='display:none'";}?>>      
		<div class="category">Other</div>
		<input type="text" label="Other" tabindex="1" name="goal3_other_edit" id="goal3_other_edit" value="<?php echo @$data->goal3_other ;?>" class="textbox" placeholder="Goal3 Other...">
		<div id="goal3_other_edit_error" class="error_div" style="color:red;"></div>
	</div>
	
        <div class="category">Body Type</div>
            <?php $bodytype = $this->modelgoals->GetAllBodytype();?>
	<select name="body_type_edit" id="body_type_edit" class="select" tabindex="10">
	    <option value="">Select Bodytype</option>
	    <?php                          
		if(count($bodytype)>0 || $bodytype !=0)
		{
		    foreach($bodytype as $key=>$val)
		    {
		?>
		<option value="<?php echo $val->id;?>" <?php if($data->bodytype==$val->id){echo "selected";}?>><?php echo $val->body_type;?></option>
		<?php
		    }
		}
		?>
	</select>
	<div id="body_type_edit_error" class="error_div" style="color:red;"></div>
            <div class="category">Date Of birth 
            <div class="checkbutouter">
                <div class="Checkouter">
                     <input type="checkbox" id="private_edit" value="1" <?php if($data->mark ==1){echo "checked";}else {echo '';};?> class="checkbox-new" name="private_edit"/>
                    
                </div>
		&nbsp&nbsp<label class="lableof" for="private_edit">Make it as private</label>
        	</div>
        </div>
            <div class="DOB clearfix">
            <div class="Dobouter">
		<?php
		$dob = $data->date_of_birth;
		if($dob !='')
		{
			$dob1 = explode('-',$dob);
		}
		
		?>
                <select class="select" tabindex="11" name="date_date_edit" id="date_date_edit">
                    <option value="">DD</option>
                     <?php
		for($i=1; $i<=31; $i++) {
		    ?>
		       <option value="<?php if($i<10){echo $a = '0'.$i;}else{echo $i;}?>"  <?php if($dob1[2]==$a){echo "selected";}?>><?php if($i<10){echo '0'.$i;}else{echo $i;}?></option>;
			<?php
		}
		?>
	    </select>
            </div>
            <div class="Dobouter">
                <select class="select" tabindex="11" name="date_month_edit" id="date_month_edit">
                    <option value="">MM</option>
                    <?php
			$months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			for ($month = 1; $month <= 12; $month++)
			{
		    ?>
			    <option value="<?php if($month<10){echo $b='0'.$month;}else{echo $month;}?>" <?php if($dob1[1]==$b){echo "selected";}?>><?php echo $months[$month];?></option>;
	       <?php
			}
			   
		   
		    ?>
		</select>
            </div>
            <div class="Dobouter">
                <select class="select" tabindex="11" name="date_year_edit" id="date_year_edit">
                    <option value="">YYYY</option>
                    <?php
	    for ($year = 1950; $year <= date("Y"); $year++) {
		?>
		    <option value="<?php echo $year;?>" <?php if($dob1[0]==$year){echo "selected";}?>><?php echo $year;?></option>;

		<?php
       
	    }
	    ?>
	</select>
            </div>
          </div>
       		<div class="category">Lifestyle</div>
		<script>
		
		var options = [];
		var title = [];
	       </script>
           <?php $lifestyle = $this->modelgoals->GetAllLifestyle();?>
	              <?php $lifestyle_selected = $this->modelgoals->GetAllLifestyleName($data->lifestyle);?>

 
              <input id="input-tags" name="life_style_edit[]" class="demo-default selectized" type="text" tabindex="-1" style="display: none;" value="<?php echo $data->lifestyle;?>">

	   <?php
	   if(strpos($data->lifestyle,',') !== false)
	   {
		  foreach($lifestyle_selected as $key=>$val)
		   {	
			
	      
			
		   }
	   }
	   else
	   {
		$life_s = $data->lifestyle;
		
	   }

	       if(count($lifestyle)>0 || $lifestyle !=0)
	       {
		   foreach($lifestyle as $key=>$val)
		   {
			
			
	       ?>
	    <script>		
		
		//alert("<?php echo $val->name;?>");
		
		var dropdowntitle1="<?php echo $val->name;?>";

		title.push(dropdowntitle1);
		//alert(dropdowntitle);
		options.push({
			id: "<?php echo $val->id;?>",
			title: dropdowntitle1
					
		    });
	       </script>
	       <?php
			
		   }
	       }
	       ?>
      
         <script>
	//$(document).ready(function () {
		$('#input-tags').selectize({
						maxItems: null,
						maxOptions: 100,
						valueField: 'id',
						labelField: 'title',
						searchField: 'title',
						sortField: 'title',
						options: options,
						create: false,
						 plugins: ['remove_button'],
						  delimiter: ',',
							persist: false,
							create: function(input) {
							    return {
								value: input,
								hidden: input
							    }
							}
						
					});
		
	//});
	
	</script>
	 <script type="text/javascript">
	$(function() {
	    $('life_style_edit').selectize(options);
	});
	</script>
       <div id="life_style_edit_error" class="error_div" style="color:red;"></div>
       
	
      
        <div class="category">Body Fat</div>
        <input type="text" label="Body fat" tabindex="6" value="<?php echo $data->fat;?>" name="body_fat_edit" id="body_fat_edit" class="textbox">
        <div id="body_fat_edit_error" class="error_div" style="color:red;"></div>
        <div class="textmessage">You will be required to enter number from 1 to 100 . this number will be presented in %</div>
	
	
	
        </div>
      </div>
      <div class="Outerbutton">
      	<input name="" type="button" id="update_prof_comp" class="loginbut" value="Update your profile">
      </div>
    </div>
  </div>
    </form>
</div>
	<?php
	}
	?>
	
	<!---------------------------- update profile of a particular user ends------------------->
    
    <section class="BodyPanel">
        <header class="Header">
            <div class="container">
              <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                  <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" class="img-responsive" alt=""></a> <!--/.navbar-brand-->
                   <div class="topsearchbar"><input name="" class="searchbox" type="text" placeholder="Search"><input name="" type="button" class="searchbut"></div>

		</div>
                <div class="pull-right HeaderLog">
			<?php
			if($this->session->userdata('user_id')!='')
			{
				?>
			<div class="massege-icon">
                    	<a href="#"><img src="<?php echo base_url(); ?>images/msg.jpg" alt=""></a>
                    </div>
			<?php
			}
			?>
                	<ul class="SocialHead">
                        <li class="facebook"><a href="https://www.facebook.com/SportypEEps" class="icon-facebook-5"></a></li>
                        <li class="twitter"><a href="https://twitter.com/sportypeeps" class="icon-twitter-5"></a></li>
                        <li class="insta"><a href="http://instagram.com/sportypeeps" class=" icon-instagramm"></a></li>
                    </ul> <!--/.SocialHead-->
                    <ul class="signTag">
			<?php
			 if($this->session->userdata('user_id')=='')
			{
			?>
                    	<li><a href="#" data-toggle="modal" data-target="#myModal-up">sign up</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModal-in">login</a></li>
			<?php
			}
			else
			{
			?>
			
				<li><a href="<?php echo site_url('home/logout');?>" data-target="#myModal-in" ><span>logout</span><b class="logout"></b></a></li>


			        <li><a href="<?php echo site_url('home/my_account');?>" data-target="#myModal-in" ><span>My Account</span><b class="user"></b></a></li>

			
				<?php $result=$this->modelhome->complete_profile($this->session->userdata('user_id'));
				
				if($result==0)
				{
				?>
			
			
                        <li><a href="#" data-toggle="modal" id="comp_your_prof" data-target="#myModal-in"><span>Complete Your Profile</span><b class="user"></b></a></li>

			<?php
				}
			}
			?>
                    </ul> <!--/.signTag-->
                	<div class="HelpButton"><a href="<?php echo base_url()."index.php/home/help";?>">Help</a></div> <!--/.HelpButton-->
                </div>
                
              </div> <!--/.navbar-->
        	</div> <!--/.container-->
        </header>
	 <script type="text/javascript">
$(document).ready(function () {
   
	$('#sign_up').click(function (e) {
		//$(".selectricWrapper").removeClass("span9");   
		//$(".selectricWrapper").removeClass("required");
		$(".selectize-control").removeClass("span9");  
		$(".selectize-control").removeClass("required");
		$(".selectize-dropdown").removeClass("span9");   
		$(".selectize-dropdown").removeClass("required"); 
		$(".selectricWrapper").removeClass("span9");  
		$(".selectricWrapper").removeClass("required");
		e.preventDefault();              
		$('.span9').css('border-color','#B2BFC7');
		$('.error_div').html('');
                 e.preventDefault();
			 $('.span9').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required')
			 var has_error = 0;
			 required_elements.each(function(){
				element_id = $(this).attr('id');
				
				element_value = $(this).val();
				element_label = $(this).attr('label');				
				element_validation_type = $(this).attr('validation_type');
				error_div = $("#"+element_id+"_error")
				
				if (element_value.search(/\S/)==-1) {
				    error_div.html(element_label+' is required.')
				    has_error++;
				}
			 }) 
                         var passwords = $('#passwords').val();
                         var conf_password = $('#conf_password').val();
                         var email_address = $('#email_address').val();
                         if (passwords !=conf_password) {
                            $('#conf_password_error').html('Password and Confirm password does not match!');
                            has_error++;
                         }
			 if (passwords.length<6) {
                            $('#passwords_error').html('Please enter password atleast of 6 characters!');
                            has_error++;
                         }         
                         if (email_address !='')
                         {
                           
                            $.ajax({
                                        url: "<?php echo base_url(); ?>index.php/signup/check_unique_email",
                                        async:false,
                                        data: {
                                         email_address:email_address
                                        
                                        },
                                        success: function(response) {
                                          
                                               if (response != 0) {
                                                $("#email_address_error").html(response);
                                                has_error++;
                                                
                                               }
                                              
                                              
                                        }
                                    })
                            
                           
                             
                        }
                     chosen = ""
			len = document.register.ex1.length;
			
			
			for (i = 0; i <len; i++) {
			if (document.register.ex1[i].checked) {
				
			chosen = document.register.ex1[i].value;
			}
			}
			
			if (chosen == "") {
				
			 $("#ex1_error").html('Please select Option');
			 has_error++;
			}
			
                        if(has_error==0)
                        {
                           
                           
			    $('#register').submit();
			   
                        }
			
		
	});
	
	$('#myModal-profile-pic-update').click(function (e) {
		
		var fileName = document.getElementById('photoimg').value;
		var fileN = document.getElementById('photoimg');
		var user_id_val_pic = document.getElementById('user_id_val_pic').value; 
		
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		
		if(fileName=="")
		{
			$('#Image_error').html('Please Upload Image!');
		}
		else{
			//$("#prof_pic_show").attr('src', responseText);
			 $.ajax({
                                        url: "<?php echo base_url(); ?>index.php/signup/image_upload_profile",
                                        async:false,
                                        data: {
                                         user_id_val_pic:user_id_val_pic
                                        
                                        },
                                        success: function(response) {
                                          
                                              $("#prof_pic_show").attr('src', response);
                                             
						$('#myModal-profile_pic_update').modal('hide');							
						
                                              
                                        }
					
                                    })
			 

		}
		
		
	
	});
});

function Select_state(country_id)
{
     $.ajax({
                    url: "<?php echo base_url(); ?>index.php/signup/Select_state",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
			
				$('#select_div').html(response);
				$('#state').selectize();
                           }
                          
                          
                    
                })
}

function Select_state_group(country_id)
{
     $.ajax({
                    url: "<?php echo base_url(); ?>index.php/signup/Select_state_group",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
			 
				$('#groups_state_div').html(response);
				$('#state_group').selectize();
                           }
                          
                          
                    
                })
}

function Select_state_event(country_id)
{
     $.ajax({
                    url: "<?php echo base_url(); ?>index.php/signup/Select_state_event",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
			
				$('#event_state').html(response);
				$('#state_event').selectize();
                           }
                          
                          
                    
                })
}
 function Select_state_event_edit(country_id)
 {
	$.ajax({
                    url: "<?php echo base_url(); ?>index.php/signup/Select_state_event_edit",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
			
				$('#event_state_edit').html(response); 
				$('#state_event_edit').selectize();
                           }
                          
                          
                    
                })
 }
function Select_state1(country_id)
{
	$.ajax({
                    url: "<?php echo base_url(); ?>index.php/signup/Select_state1",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
			
				$('#select_div_edit').html(response);
				//$('#state_profile_edit').selectbox();
				$('#state_profile_edit').selectize();
                           }
                          
                          
                    
                })
}
 
function Select_state_fb(country_id) {
	$.ajax({
                    url: "<?php echo base_url(); ?>index.php/signup/Select_state_fb",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {state_fb
			
				$('#select_div_fb').html(response);
				$('#state_fb').selectize();
                           }
                          
                          
                    
                })
}
    </script><!--/.Header-->
    
    <script type="text/javascript">
$(document).ready(function () {
   
	$('#prof_comp').click(function (e) {
		//$(".selectricWrapper").removeClass("span6");   
		//$(".selectricWrapper").removeClass("required6");
		
		$(".selectize-control").removeClass("span6");  
		$(".selectize-control").removeClass("required6");
		$(".selectize-dropdown").removeClass("span6");   
		$(".selectize-dropdown").removeClass("required6");
		//$(".selectricWrapper").removeClass("span6");  
		//$(".selectricWrapper").removeClass("required6");
		e.preventDefault();              
		$('.span6').css('border-color','#B2BFC7');
		$('.error_div').html('');
                 e.preventDefault();
			 $('.span6').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required6')
			 var has_error = 0;
			 required_elements.each(function(){
				
				element_id = $(this).attr('id');
				
				element_value = $(this).val();
				element_label = $(this).attr('label');				
				element_validation_type = $(this).attr('validation_type');
				error_div = $("#"+element_id+"_error")
				
				if (element_value.search(/\S/)==-1) {
				    error_div.html(element_label+' is required.')
				    has_error++;
				}
			 }) 
                         var how_tall = $('#how_tall').val();
			var how_weigh = $('#how_weigh').val();
			var body_fat = $('#body_fat').val();
			
			var sports1 = $('#sports1').val();
			var sports2 = $('#sports2').val();
			var sports3 = $('#sports3').val();
			
			var goal1 = $('#goal1').val();
			var goal2 = $('#goal2').val();
			var goal3 = $('#goal3').val();
			//  sports3_other_error
			var sports1_other = $('#sports1_other').val();  
			var sports2_other = $('#sports2_other').val();
			var sports3_other = $('#sports3_other').val();
			
			var goal1_other = $('#goal1_other').val();  
			var goal2_other = $('#goal2_other').val();
			var goal3_other = $('#goal3_other').val();
			
			if (goal1 ==14) {   
			
			    if (goal1_other=='') {
				$('#goal1_other_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			if (goal2 ==14) {   
			
			    if (goal2_other=='') {
				$('#goal2_other_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			if (goal3 ==14) {   
			
			    if (goal3_other=='') {
				$('#goal3_other_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			
			if (sports1 ==5) {   
			
			    if (sports1_other=='') {
				$('#sports1_other_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			
			if (sports2 ==5) {   
			
			    if (sports2_other=='') {
				$('#sports2_other_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			
			if (sports3 ==5) {   
			
			    if (sports3_other=='') {
				$('#sports3_other_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			
			if (how_tall !='') {   
			
			    if (isNaN(how_tall)==true) {
				$('#how_tall_error').html('Please insert numeric value!');
			       has_error++;
			    }
			}
			if (how_weigh !='') {   
			    if (isNaN(how_weigh)==true) {
				$('#how_weigh_error').html('Please insert numeric value!');
			       has_error++;
			    }
			}
			if (body_fat !='') {   
			    if (isNaN(body_fat)==true) {
				$('#body_fat_error').html('Please insert numeric value!');
			       has_error++;
			    }
			}
			
                         if (has_error==0) {
				$('#register_complete').submit();
			 }
		
	});
	
	$('#sign_in_fcbk').click(function (e) {
		//$(".selectricWrapper").removeClass("span7");   
		//$(".selectricWrapper").removeClass("required7");
		$(".selectize-control").removeClass("span7");  
		$(".selectize-control").removeClass("required7");
		$(".selectize-dropdown").removeClass("span7");   
		$(".selectize-dropdown").removeClass("required7");
		$(".selectricWrapper").removeClass("span7");  
		$(".selectricWrapper").removeClass("required7");
		e.preventDefault();              
		$('.span7').css('border-color','#B2BFC7');
		$('.error_div').html('');
                 e.preventDefault();
			 $('.span9').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required7')
			 var has_error = 0;
			 required_elements.each(function(){
				element_id = $(this).attr('id');
				
				element_value = $(this).val();
				element_label = $(this).attr('label');				
				element_validation_type = $(this).attr('validation_type');
				error_div = $("#"+element_id+"_error")
				
				if (element_value.search(/\S/)==-1) {
				    error_div.html(element_label+' is required.')
				    has_error++;
				}
			 }) 
                         
                         var email_address1 = $('#email_address1').val();
                                      
                         if (email_address1 !='')
                         {
                           
                            $.ajax({
                                        url: "<?php echo base_url(); ?>index.php/signup/check_unique_email",
                                        async:false,
                                        data: {
                                         email_address:email_address1
                                        
                                        },
                                        success: function(response) {
                                          
                                               if (response != 0) {
                                                $("#email_address1_error").html(response);
                                                has_error++;
                                                
                                               }
                                              
                                              
                                        }
                                    })
                            
                           
                             
                        }
                      chosen = ""
			len = document.registration_form.ex1_1.length;
			
			
			for (i = 0; i <len; i++) {
				
			if (document.registration_form.ex1_1[i].checked) {
				
			chosen = document.registration_form.ex1_1[i].value;
			}
			}
			
			if (chosen == "") {
				
			 $("#ext1_1_error").html('Please select Option');
			 has_error++;
			}
			
                        if(has_error==0)
                        {
                           
                           
			    $('#registration_form').submit();
			   
                        }
		
	});
	
	$('#update_prof_comp').click(function (e) {
		
		$(".selectize-control").removeClass("span12");  
		$(".selectize-control").removeClass("required12");
		$(".selectize-dropdown").removeClass("span12");   
		$(".selectize-dropdown").removeClass("required12");
		$(".selectricWrapper").removeClass("span12");  
		$(".selectricWrapper").removeClass("required12");
		
		e.preventDefault();              
		$('.span12').css('border-color','#B2BFC7');
		$('.error_div').html('');
                 e.preventDefault();
			 $('.span9').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required12')
			 var has_error = 0;
			 required_elements.each(function(){
				element_id = $(this).attr('id');
				
				element_value = $(this).val();
				element_label = $(this).attr('label');				
				element_validation_type = $(this).attr('validation_type');
				error_div = $("#"+element_id+"_error")
				
				if (element_value.search(/\S/)==-1) {
				    error_div.html(element_label+' is required.')
				    has_error++;
				}
			 })
			 
			  var how_tall = $('#how_tall_edit').val();
			var how_weigh = $('#how_weigh_edit').val();
			var body_fat = $('#body_fat_edit').val();
			
			var sports1_edit = $('#sports1_edit').val();
			var sports2_edit = $('#sports2_edit').val();
			var sports3_edit = $('#sports3_edit').val();
			
			var goal1_edit = $('#goal1_edit').val();
			var goal2_edit = $('#goal2_edit').val();
			var goal3_edit = $('#goal3_edit').val();
			//  sports3_other_error
			var sports1_edit_other = $('#sports1_edit_other').val();  
			var sports2_edit_other = $('#sports2_edit_other').val();
			var sports3_edit_other = $('#sports3_edit_other').val();
			
			var goal1_other_edit = $('#goal1_other_edit').val();  
			var goal2_other_edit = $('#goal2_other_edit').val();
			var goal3_other_edit = $('#goal3_other_edit').val();
			
			if (goal1_edit ==14) {   
			
			    if (goal1_other_edit=='') {
				$('#goal1_other_edit_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			if (goal2_edit ==14) {   
			
			    if (goal2_other_edit=='') {
				$('#goal2_other_edit_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			if (goal3_edit ==14) {   
			
			    if (goal3_other_edit=='') {
				$('#goal3_other_edit_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			
			if (sports1_edit ==5) {   
			
			    if (sports1_edit_other=='') {
				$('#sports1_edit_other_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			
			if (sports2_edit ==5) {   
			
			    if (sports2_edit_other=='') {
				$('#sports2_edit_other_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			
			if (sports3_edit ==5) {   
			
			    if (sports3_edit_other=='') {
				$('#sports3_edit_other_error').html('Other Value is required!');
			       has_error++;
			    }
			}
			
			
			if (how_tall !='') {   
			
			    if (isNaN(how_tall)==true) {
				$('#how_tall_edit_error').html('Please insert numeric value!');
			       has_error++;
			    }
			}
			if (how_weigh !='') {   
			    if (isNaN(how_weigh)==true) {
				$('#how_weigh_edit_error').html('Please insert numeric value!');
			       has_error++;
			    }
			}
			if (body_fat !='') {   
			    if (isNaN(body_fat)==true) {
				$('#body_fat_edit_error').html('Please insert numeric value!');
			       has_error++;
			    }
			}
			
			
			 if(has_error==0)
                        {
                           
                           
			    $('#update_account_complete').submit();
			   
                        }
	
	});
	
	
	$('#myModal-event-creation').click(function (e) {
		
		//$(".selectricWrapper").removeClass("span21");   
		//$(".selectricWrapper").removeClass("required21");
		$(".selectize-control").removeClass("span21");  
		$(".selectize-control").removeClass("required21");
		$(".selectize-dropdown").removeClass("span21");   
		$(".selectize-dropdown").removeClass("required21");
		e.preventDefault();              
		$('.span21').css('border-color','#B2BFC7');
		$('.error_div').html('');
                 e.preventDefault();
			 $('.span21').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required21')
			 var has_error = 0;
			 required_elements.each(function(){
				element_id = $(this).attr('id');
				
				element_value = $(this).val();
				element_label = $(this).attr('label');				
				element_validation_type = $(this).attr('validation_type');
				error_div = $("#"+element_id+"_error")
				
				if (element_value.search(/\S/)==-1) {
				    error_div.html(element_label+' is required.')
				    has_error++;
				}
			 })
			 
			 var fileName = document.getElementById("photo_event").value;
			var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			 var start_date = document.getElementById("start_date_event").value;
			var end__date = document.getElementById("end_date_event").value;
			

   

 
	      if (fileName!='') 
	      {
                 if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
                    {
                        $('#photo_event_error').html('');
                    }
		    else{
			$('#photo_event_error').html('File type should be jpeg/jpg/png/gif');
        		$('#photo_event_error').css('border-color','red');
        		$('#photo_event').focus();
        		 has_error++;

		    }
                   
	      }
	      if (start_date !='' && end__date !='') {
			var stDate = new Date(start_date);
			var enDate = new Date(end__date);
			var compDate = enDate - stDate;
			//var fdate=enDate-curr_Date;

			if(compDate >= 0)
			{
				$('#end_date_event_error').html('');

			}
			else 
			{
			   
			   $('#end_date_event_error').html('End Date Should be greater than From Date');

			   has_error++;
			}
	      }
	     
	     
	    var event_type = document.getElementById("event_type").value;
	   
	      if (event_type==2) {
		
		//recurring_div
		$('#recurring_div').show();
		$('#recurring_div1').show();
		
		 var recurring_type = document.getElementById("recurring_type").value;
	      var reccring_upto = document.getElementById("reccring_upto").value;
		if (recurring_type =='')
		{
			$('#recurring_type_error').html('Recurring Type is Required');

			has_error++;
		}
		if (reccring_upto=='') {
			$('#reccring_upto_error').html('Recurring Upto is Required');

			has_error++;
		}

	      }
			 
			
			 if(has_error==0)
                        {
                           
                           
			    $('#new_event').submit();
			   
                        }
	
	});
	
	$('#myModal-event-update_edit').click(function (e) {
		
		//$(".selectricWrapper").removeClass("span22");   
		//$(".selectricWrapper").removeClass("required22");
		$(".selectize-control").removeClass("span22");  
		$(".selectize-control").removeClass("required22");
		$(".selectize-dropdown").removeClass("span22");   
		$(".selectize-dropdown").removeClass("required22");
		e.preventDefault();              
		$('.span22').css('border-color','#B2BFC7');
		$('.error_div').html('');
                 e.preventDefault();
			 $('.span22').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required22')
			 var has_error = 0;
			 required_elements.each(function(){
				element_id = $(this).attr('id');
				
				element_value = $(this).val();
				element_label = $(this).attr('label');				
				element_validation_type = $(this).attr('validation_type');
				error_div = $("#"+element_id+"_error")
				
				if (element_value.search(/\S/)==-1) {
				    error_div.html(element_label+' is required.')
				    has_error++;
				}
			 })
			 
			 var fileName = document.getElementById("photo_event_edit").value;
			var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			 var start_date = document.getElementById("start_date_event_edit").value;
			var end__date = document.getElementById("end_date_event_edit").value;
			

   

 
	      if (fileName!='') 
	      {
                 if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
                    {
                        $('#photo_event_edit_error').html('');
                    }
		    else{
			$('#photo_event_edit_error').html('File type should be jpeg/jpg/png/gif');
        		$('#photo_event_edit_error').css('border-color','red');
        		$('#photo_event_edit').focus();
        		 has_error++;

		    }
                   
	      }
	      if (start_date !='' && end__date !='') {
			var stDate = new Date(start_date);
			var enDate = new Date(end__date);
			var compDate = enDate - stDate;
			//var fdate=enDate-curr_Date;

			if(compDate >= 0)
			{
				$('#end_date_event_edit_error').html('');

			}
			else 
			{
			   
			   $('#end_date_event_edit_error').html('End Date Should be greater than From Date');

			   has_error++;
			}
	      }
	     
	     
	 
			 
			
			 if(has_error==0)
                        {
                           
                           
			    $('#new_event_edit').submit();
			   
                        }
	
	});
	
	$('#myModal-create-group').click(function (e) {

		//$(".selectricWrapper").removeClass("span23");   
		//$(".selectricWrapper").removeClass("required23");
		$(".selectize-control").removeClass("span23");  
		$(".selectize-control").removeClass("required23");
		$(".selectize-dropdown").removeClass("span23");   
		$(".selectize-dropdown").removeClass("required23");
		
		e.preventDefault();              
		$('.span23').css('border-color','#B2BFC7');
		$('.error_div').html('');
                 e.preventDefault();
			 $('.span23').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required23')
			 var has_error = 0;
			 required_elements.each(function(){
				element_id = $(this).attr('id');
				
				element_value = $(this).val();
				element_label = $(this).attr('label');				
				element_validation_type = $(this).attr('validation_type');
				error_div = $("#"+element_id+"_error")
				
				if (element_value.search(/\S/)==-1) {
				    error_div.html(element_label+' is required.')
				    has_error++;
				}
			 })
			 
			 var fileName = document.getElementById("photo_group").value;
			var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			
	      if (fileName!='') 
	      {
                 if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
                    {
                        $('#photo_group_error').html('');
                    }
		    else{
			$('#photo_group_error').html('File type should be jpeg/jpg/png/gif');
        		$('#photo_group_error').css('border-color','red');
        		$('#photo_group').focus();
        		 has_error++;

		    }
                   
	      } 
			
		if(has_error==0)
	       {
		  
		  
		   $('#new_create_group').submit();
		  
	       }
	
	});
	
	$('#forget_pass-modal').click(function (e) {
		
			var email=$('#forget_email').val();
			
			//alert(email);
			//alert(password);
			if (email=='')
			{
				$('#forget_email_error').html('Email is required.');
				$('#forget_email').focus();
				return false;
			}
			else if (email!='')
			{
				var filter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (!filter.test(email))
				{
					$('#forget_email_error').html('Please enter valid email.');
					$('#forget_email').focus();
					return false;
				}
				else
				{
					
					$('#forget_login_form').submit();
				}
			}
			
			
		});
	$('#verify-code-modal').click(function (e) {
	
	var verify_code=$('#verify_code').val();
		
		//alert(email);
		//alert(password);
		if (verify_code=='')
		{
			$('#verify_code_error').html('Verification code is required.');
			$('#verify_code').focus();
			return false;
		}
		else
		{
			$('#verify_code_form').submit();
		}
	});
	
	$('#myModal-description-update').click(function (e) {
		
		var first_name_edit_desc=$('#first_name_edit_desc').val();
		var last_name_edit_desc=$('#last_name_edit_desc').val();
		if (first_name_edit_desc=='')
		{
			
			$('#first_name_edit_desc_error').html('Please insert First Name.');
			$('#first_name_edit_desc').focus();
			return false;
		}
		else if (last_name_edit_desc=='')
		{
			
			$('#last_name_edit_desc_error').html('Please insert Last Name.');
			$('#last_name_edit_desc').focus();
			return false;
		}
		else
		{
			 
			$('#details_update_form').submit();
		}
		
		});
	
	
	$('#update-pass-modal').click(function (e) {
		
			var new_password=$('#new_password').val();
			var confirm_password=$('#confirm_password').val();
			
			if (new_password=='')
			{
				$('#new_password_error').html('Password is required');
				$('#new_password').focus();
				return false;
			}
			if (new_password!='')
			{
				if (new_password.length<6)
				{
					$('#new_password_error').html('Password should not be lass than 6 charecters');
					$('#new_password').focus();
					return false;	
				}
				else
				{
					$('#new_password_error').html('');
				}
			}
			if (confirm_password=='')
			{
				$('#confirm_password_error').html('Confirm Password is required');
				$('#confirm_password').focus();
				return false;
			}
			if (confirm_password!='')
			{
				if (new_password!=confirm_password)
				{
					
					$('#confirm_password_error').html('Password and confirm password should be same');
					$('#confirm_password').focus();
					return false;	
				}
				else
				{
					
					$("#update_password_form").submit();
				}
			}
			else
			{
				
				$("#update_password_form").submit();
			}
			
			
		});
});
   
	/*function check_validation()
	{
		
		if ($("#first_name1").val()=='')
		{
			$('#name_error').html('First name is required.');
			$('#first_name1').focus();
			return false;
		}
		else if ($('#last_name1').val()=='')
		{
			$('#name_error').html('Last name is required.');
			$('#last_name1').focus();
			return false;
		}				
		else if ($('#email_address1').val()=='')
		{
			$('#email_address_error1').html('Email is required.');
			$('#email_address1').focus();
			return false;
		}
		else if ($('#email_address1').val()!='')
		{
			email_address = $('#email_address1').val();
			$.ajax({
                                        url: "<?php echo base_url(); ?>index.php/signup/check_unique_email",
                                        async:false,
                                        data: {
                                         email_address:email_address
                                        
                                        },
                                        success: function(response) {
                                          
                                               if (response != 0) {
                                                $("#email_address_error1").html(response);
                                               var a =  false;
                                                
                                               }
					       else{
						a =  true;
					       }
					       
                                              alert('---'+a);
                                              
                                        }
					
                                    })
			alert('===='+a);
			return a;
		
		}
		else if ($('#email_format').val()==1)
		{
		    $('#email_address_error1').html('Please enter valid email.');
		    $('#email_address1').focus();
		    return false;
		}
		else if ($('#email_hidden').val()==1)
		{
		    $('#email_address_error1').html('This email is already registered.');
		    $('#email_address1').focus();
		    return false;
		}		
		else if ($('#country1').val()=='')
		{
		    $('#country_error1').html('Please Select Country.');
		    $('#country1').focus();
		    return false;
		}		
		else if ($('#state1').val()=='')
		{
		    $('#state_error1').html('Please Select State.');
		    $('#state1').focus();
		    return false;
		}		
		else if ($('#location1').val()=='')
		{
		    $('#location_error1').html('Please Enter Location.');
		    $('#location1').focus();
		    return false;
		}		
		else if ($('#profile1').val()=='')
		{
		    $('#profile_error1').html('Please Select Profile.');
		    $('#profile1').focus();
		    return false;
		}
		else
		{
			$('#registration_form').submit();
		}
		
		
		

	}*/
	
	function check_email(email) {

	    if (email.search(/\S/)!=-1) {
		if (!isValidEmailAddress(email))
		{
			
			$("#email_error").html('Please enter valid email.');

			$('#email_format').val(1);
		}
		else
		{
			$('#email_format').val('');
				$.ajax({
				url: "<?php echo base_url(); ?>index.php/signup/check_email",
				data: {email:email},
				success: function(response) {
					var response_array = response.split('[SEPARETOR]');
					if (response_array[1]==0) {
					    $("#email_error").html('');
					    $("#email_hidden").val('')
					}
					else
					{
					    $("#email_error").html('This email is already registered.');
						
					    $("#email_hidden").val('1')
					}
				}
			})
		}
	    }
	}
	
	/*function check_email_facebookid(email)
	{
		
	}*/
	function isValidEmailAddress(emailAddress)
	{
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	}
	
	function check_login()
	{
		
		var email=$.trim($('#login_email').val());
		var password=$.trim($('#login_password').val());
		//alert(email);
		//alert(password);
		if (email=='')
		{
			$('#login_email_error').html('Email is required.');
			$('#login_email').focus();
			return false;
		}
		if (email!='')
		{
			var filter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(email))
			{
				$('#login_email_error').html('Please enter valid email.');
				$('#login_email').focus();
				return false;
			}
			else
			{
				$('#login_email_error').html('');
			}
		}
		if (password=='')
		{
			$('#login_password_error').html('Password is required');
			$('#login_password').focus();
			return false;
		}
		else{
			$('#login_form').submit();
		}
		
		
		
	}
	
function show_recurring(event_type)
{
	
 if (event_type==2) {
	
		//recurring_div
		$('#recurring_div').show();
		$('#recurring_div1').show();
		var recurring_type = document.getElementById("recurring_type").value;
		 var reccring_upto = document.getElementById("reccring_upto").value;
		if (recurring_type =='')
		{
			$('#recurring_type_error').html('Recurring Type is Required');

			
		}
		if (reccring_upto =='')
		{
			$('#reccring_upto_error').html('Recurring Upto is Required');

			
		}

	      }
	      else{
		$('#recurring_div').hide();
		$('#recurring_div1').hide();
	      }	
}
function sports1_otherss(other_val) {
	if (other_val==5) {
		$('#sports1_other_div').show();
		
	}
	else
	{
		$('#sports1_other_div').hide();
		$('#sports1_other').val('');
	}
}

function sports2_otherss(other_val) {
	if (other_val==5) {
		$('#sports2_other_div').show();
		
	}
	else
	{
		$('#sports2_other_div').hide();
		$('#sports2_other').val('');
	}
}

function sports3_otherss(other_val) {
	if (other_val==5) {
		$('#sports3_other_div').show();
		
	}
	else
	{
		$('#sports3_other_div').hide();
		$('#sports3_other').val('');
	}
}
function goal1_otherss(other_val) {
	if (other_val==14) {
		$('#goal1_other_div').show();
		
	}
	else
	{
		$('#goal1_other_div').hide();
		$('#goal1_other').val('');
	}
}
function goal2_otherss(other_val) {
	
	if (other_val==14) {
		$('#goal2_other_div').show();		
	}
	else
	{
		
		$('#goal2_other_div').hide();
		$('#goal2_other').val('');
	}
}
function goal3_otherss(other_val) {
	if (other_val==14) {
		$('#goal3_other_div').show();
		
	}
	else
	{
		$('#goal3_other_div').hide();
		$('#goal3_other').val('');
	}
}


function sports1_otherss_edit(other_val) {
	if (other_val==5) {
		$('#sports1_edit_other_div').show();
		
	}
	else
	{
		$('#sports1_edit_other_div').hide();
		$('#sports1_edit_other').val('');
	}
}

function sports2_otherss_edit(other_val) {
	if (other_val==5) {
		$('#sports2_edit_other_div').show();
		
	}
	else
	{
		$('#sports2_edit_other_div').hide();
		$('#sports2_edit_other').val('');
	}
}

function sports3_otherss_edit(other_val) {
	if (other_val==5) {
		$('#sports3_edit_other_div').show();
		
	}
	else
	{
		$('#sports3_edit_other_div').hide();
		$('#sports3_edit_other').val('');
	}
}
function goal1_otherss_edit(other_val) {
	if (other_val==14) {
		$('#goal1_other_edit_div').show();
		
	}
	else
	{
		$('#goal1_other_edit_div').hide();
		$('#goal1_other_edit').val('');
	}
}
function goal2_otherss_edit(other_val) {
	
	if (other_val==14) {
		$('#goal2_other_edit_div').show();
	}
	else
	{
		
		$('#goal2_other_edit_div').hide();
		$('#goal2_other_edit').val('');
	}
}
function goal3_otherss_edit(other_val) {
	if (other_val==14) {
		$('#goal3_other_edit_div').show();
		
	}
	else
	{
		$('#goal3_other_edit_div').hide();
		$('#goal3_other_edit').val('');
	}
}
</script>

    <?php
$today=date('Y-m-d');

$select_row="select * from site_view_statistics where `view_date`='".$today."'";
$result=$this->db->query($select_row);

$get_row=$this->db->affected_rows();

if($get_row==0)
{
	$sql = "INSERT INTO site_view_statistics (view_date, site_view)
        VALUES ('".$today."', site_view+1)";

	$this->db->query($sql);
}
else
{
	$sql = "update site_view_statistics set site_view=site_view+1 where view_date='".$today."'";

	$this->db->query($sql);
} 	



?>

