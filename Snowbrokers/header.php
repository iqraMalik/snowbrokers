<?php
	$settings_row=$this->db->query("select * from site_settings where `field_name`='site_offline'");

	$row=$settings_row->result();
	foreach ($settings_row->result() as $row)
	{
	  $siteoffline=$row->field_value;
	}
	//echo $siteoffline;die();
	
	if($siteoffline==1)
	{
?>
		<script> location.href="<?php echo site_url('home/offline');?>"</script>
<?php
	}
	else
	{
		$today=date('Y-m-d');
		$select_row="select * from site_view_statistics where `view_date`='".$today."'";
		$result=$this->db->query($select_row);
		$get_row=$this->db->affected_rows();
		if($get_row==0)
		{
		$sql = "INSERT INTO site_view_statistics (view_date, site_view) VALUES ('".$today."', site_view+1)";
		$this->db->query($sql);
		}
		else
		{
		$sql = "update site_view_statistics set site_view=site_view+1 where view_date='".$today."'";
		
		$this->db->query($sql);
		} 
	}
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>SNOWBROKERS ASIA</title>
	
	
	<link href="<?php echo $this->config->base_url(); ?>assets/css/fonts.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/select.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/developer.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->base_url(); ?>assets/css/rcarousel.css" rel="stylesheet" type="text/css" />

	<script src="<?php echo $this->config->base_url(); ?>assets/js/jquery-1.js"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?php echo $this->config->base_url(); ?>assets/js/html5shiv.min.js"></script>
	<script src="<?php echo $this->config->base_url(); ?>assets/js/respond.min.js"></script>
	<![endif]-->
	<!-- <script src="js/global.js"></script> -->
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/jquery-ui.js"></script>
	
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/select.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/stellar.js"></script>

	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/scrollTo.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/magnet.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/owl.carousel.js"></script>
	
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/jquery.iosslider-vertical.js"></script>
	
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/jquery.elevatezoom.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/custom.js"></script>
	<script>
	function Select_state(country_id)
	{
	     $.ajax({
			    url: "<?php echo base_url(); ?>index.php/home/Select_state",
			    async:false,
			    data: {
			     country_id:country_id
			    
			    },
			    success: function(response) {
			      
				   $('#state').html(response);
				    
				   }
				  
				  
			    
			})
	}
function email_valid(email)
{
	if (email!='')
	{
		$.ajax({
			url : '<?php echo base_url().'index.php/registration/email';?>',
			type:'post',
			cache:false,
			data: {'emailvalid':email},
			success:function(response)
			{
				if (response==1)
				{
					$("#error_div").html('This email id already exist.');
					$( "#email_label" ).css( "color", "#FF0000" );
					$( "#email" ).css( "border", "1px #FF0000 solid" );
					$( "#email" ).focus();
					document.getElementById('buyemail').value=1;
				}
				else
				{
					$( "#email_label" ).css( "color", "#303030" );
					$( "#email" ).css( "border", "1px #006600 solid" );
					document.getElementById('buyemail').value=0;
				}
			  
			}
		});
	}
}
function saleremail_valid(email){
	
	if ($.trim(email)!='')
	{
		$.ajax({
			url : '<?php echo base_url().'index.php/registration/email';?>',
			type:'post',
			cache:false,
			data: {'emailvalid':email},
			success:function(response)
			{
				if (response==1)
				{
					$("#error_div2").html('This email id already exist.');
					$( "#error_div2" ).css( "color", "#FF0000" );
					$( "#email2" ).css( "border", "1px #FF0000 solid" );
					$( "#email2" ).focus();
					document.getElementById('saleremail').value=1;
				}
				else
				{
					$( "#email2_label" ).css( "color", "#303030" );
					$( "#email2" ).css( "border", "1px #006600 solid" );
					document.getElementById('saleremail').value=0;
				}
			}
		});
	}
}
function loginvalidation()
{
	var loginid=document.getElementById('loginemail').value;
	var logpass=document.getElementById('logpass').value;
	if(loginid.search(/\S/)==-1) /*=======validate loginid=====*/
  {
    document.getElementById('loginemail_error').style.display='block';
    document.getElementById('loginemail_error').innerHTML='Enter your loginid..';
    document.getElementById('loginemail_error').style.color="red";
    document.getElementById('loginemail_error').style.width="68%";
    document.getElementById('loginemail_error').style.float="right";
    document.getElementById('loginemail').style.border="1px #FF0000 solid";
    document.getElementById('loginemail').focus();
    return false;
  }  
  else
  {
     var pq=document.getElementById("loginemail").value;
      var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      
      if (!pq.match(filter))
      {
	
	document.getElementById('loginemail_error').style.display='block';
	document.getElementById('loginemail_error').innerHTML='Enter Correct Email Format.';
	document.getElementById('loginemail_error').style.color="red";
	document.getElementById('loginemail_error').style.width="68%";
	document.getElementById('loginemail_error').style.float="right";
	document.getElementById('loginemail').style.border="1px #FF0000 solid";
	document.getElementById('loginemail').focus();
	return false;
      }
	
	else{
	
		document.getElementById('loginemail_error').style.display='none';
		document.getElementById('loginemail').style.border="1px #006600 solid";
	   }
  }
if(logpass.search(/\S/)==-1) /*=======validate password=====*/
  {
    document.getElementById('logpass_error').style.display='block';
    document.getElementById('logpass_error').innerHTML='Enter your password..';
    document.getElementById('logpass_error').style.color="red";
    document.getElementById('logpass_error').style.width="68%";
    document.getElementById('logpass_error').style.float="right";
    document.getElementById('logpass').style.border="1px #FF0000 solid";
    document.getElementById('logpass').focus();
    return false;
  }  
  else
  {
    document.getElementById('logpass_error').style.display='none';
    document.getElementById('logpass').style.border="1px #006600 solid";
  }
	
}
	</script>


	<link rel="icon" href="<?php echo $this->config->base_url();?>images/favicon.ico" type="image/x-icon">
	<link rel="icon" type="image/png" href="<?php echo $this->config->base_url();?>images/favicon.png">
	
	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->
	<meta name="google-translate-customization" content="ad4259c42ea5b6c5-3359b597afc22ffe-g72e09eb1f4dff5de-21"></meta>
</head>

<body>

<header class="header navbar-fixed-top">
	<?php
	if($this->uri->segment(1) == 'admin_product')
	{
	?>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="login-btn navbar-right">
				<button class="btn btn-default" id="product_admin">
					<span class="glyphicon glyphicon-log-in visible-xs"></span>
					<span class="hidden-xs">Product List</span>
				</button>
			</div>
		</div>
	</nav>
	<?php
	}
	if($this->uri->segment(1) != 'admin_product')
	{
	?>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url();?>"><span class="sr-only">Snowbrokers</span><img src="<?php echo base_url();?>images/logo_new.jpg" alt="LOGO"></a><!-- <img src="images/logo.png" alt="LOGO"> -->
			</div>
			<div class="login-btn navbar-right">
				<?php
					$uid= $this->session->userdata('id'); //die();
					if(isset($uid) && $uid!=""){
				?>
					<button class="btn btn-default" data-toggle="modal" onclick="logout()">
						<span class="glyphicon glyphicon-log-in visible-xs"></span>
						<span class="hidden-xs">Log out</span>
					</button>
				<?php
					}
					else
					{
				?>
					<button class="btn btn-default" data-toggle="modal" data-target="#loginModal">
						<span class="glyphicon glyphicon-log-in visible-xs"></span>
						<span class="hidden-xs">Log in</span>
					</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#registerModal">
					    <span class="glyphicon glyphicon-user visible-xs"></span>
					    <span class="hidden-xs">Register</span>
					</button>
				<?php
					}
				?>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					
					<li class="dropdown">
						<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
					</li>
<!--					<li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">CurrencyUS$ <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="javascript:void(0);">Action</a>
							</li>
							<li>
								<a href="javascript:void(0);">Another action</a>
							</li>
							<li>
								<a href="javascript:void(0);">Something else here</a>
							</li>
							<li>
								<a href="javascript:void(0);">Another link</a>
							</li>
						</ul>
					</li>
-->
					<li>
						<a href="<?php echo base_url().'/'.'help';?>">Help</a>
					</li>
					<?php
					if(isset($uid) && $uid!="")
					{
						$this->load->model('registration_model');
						$user= $this->registration_model->get_user_by_id($this->session->userdata('id'));
						//print_r($user);
					?>
						<li class="dropdown">
							<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Hi ! &nbsp;".$user[0]['first_name']." ".$user[0]['last_name']; ?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="<?php echo base_url();?>myaccount">My Account</a>
								</li>
								<li>
									<a href="<?php base_url();?>myaccount/change_password">Change Password</a>
								</li>
								<?php
								//if($user[0]['customer_type']==2) {
								?>
								<!--<li>
									<a href="<?php echo base_url();?>product/basic_details">Sell your product</a>
								</li>-->
								<?php //} ?>
							</ul>
						</li>
						<?php
						if($user[0]['customer_type']==2) {
						?>
						<li>
							<a href="<?php echo base_url();?>product/basic_details" style="color:#d09700;">Sell your product</a>
						</li>
						<?php } ?>
					<?php
					}
					?>
					
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<?php
	if($this->session->userdata('success_msg'))
	{
	?>
	<div class="alert alert-success fade in" role="alert" style="text-align: center; font-size: larger;">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
			<strong>Success!</strong> <?php echo $this->session->userdata('success_msg'); ?>
	</div>
	<!--
	<div class="alert alert-success" style="text-align: center; font-size: larger;">
                <i class="icon-ok-sign"><b>X</b></i><strong>Success</strong>&nbsp;!&nbsp;<?php echo $this->session->userdata('success_msg'); ?>
        </div>-->
	<?php
		$this->session->unset_userdata('success_msg');
	}
	if($this->session->userdata('error_msg'))
	{
	?>
	<div class="alert alert-danger fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" style="text-align: center; font-size: larger;"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
			<strong>Error!</strong> <?php echo $this->session->userdata('error_msg'); ?>
	</div>
	<!--<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131); text-align: center; font-size: larger;">
		<i class="icon-remove-sign"><b>X</b></i><strong>Error</strong>&nbsp;!&nbsp;<?php echo $this->session->userdata('error_msg'); ?>
	</div>-->
	<?php
		$this->session->unset_userdata('error_msg');
	}
	?>
	<?php $flash_message=$this->session->flashdata('flash_message'); ?> <!--=====ADDED PRITAM 30/7/14-->
	<!--=========== ADDED FOR FLASH MESSAGE (PRITAM-- 30/7/14) ====================-->

		<?php
                     if(isset($flash_message)) {
			
			if($flash_message == 'not_activated') {
                              
                                  echo '<div class="alert alert-success" style="text-align: center; font-size: larger;">';
                                  echo '<i class="icon-ok-sign"></i><strong>Success</strong>&nbsp;!&nbsp;You have successfully created an account, Please Check Your Mail. Your Account activated within 24 Hours.';
                                  echo '</div>';
                        }
			
			if($flash_message == 'activated') {
                              
				echo '<div class="alert alert-success" style="text-align: center; font-size: larger;">';
				echo '<i class="icon-ok-sign"></i><strong>Success</strong>&nbsp;!&nbsp;Your account is now activated.';
				echo '</div>';
                        }
			
			if($flash_message == 'already_activated') {
                              
				echo '<div class="alert alert-success" style="text-align: center; font-size: larger;">';
				echo '<i class="icon-ok-sign"></i><strong>Hey</strong>&nbsp;!&nbsp;Your account is already activated.';
				echo '</div>';
                        }
			
			if($flash_message == 'not_registered') {
                              
				echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131); text-align: center; font-size: larger;">';
				echo '<i class="icon-remove-sign"></i><strong>Error</strong>&nbsp;!&nbsp;Invalid email or password. Please register to create your account.';
				echo '</div>';
			}
                                      
			if($flash_message == 'n_activated') {
	    
			    echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131);text-align: center; font-size: larger;">';
			    echo '<i class="icon-remove-sign"></i>&nbsp<strong>Error</strong>&nbsp;!&nbsp;Your account is not activated now. Please check your mail to activate your account.';
			    echo '</div>';
			}
			  if($flash_message == 'emailidexists') {
                              
                     echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131);">';
                     echo '<i class="icon-remove-sign"></i>&nbsp<center><strong>Error.! &nbsp</strong> Given mail id already exists</center>';
                     echo '</div>';
					  }
			if($flash_message == 'update') {
		
				      echo '<center><div class="alert alert-success">';
				      echo '<i class="icon-ok-sign"></i><strong>Success ! </strong> Your password successfully updated';
				      echo '</div></center>';
				  }
					
		     }
		?>
	  <!--============================END=============================================-->
	  <?php } ?>
</header>
<!--</body>
</html>-->

<div class="modal fade registerModal" id="registerModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Registration <span>for sellers/ buyers</span></h4>
      </div>
      <div class="modal-body clearfix">
      	      	<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li class="active"><a href="#home" role="tab" data-toggle="tab">Buyers</a></li>
		  <li><a href="#profile" role="tab" data-toggle="tab">Sellers</a></li>
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="home">
			  
<!-----------------REGISTRATION FORM FOR BUYERS-----WORKED -> PRITAM (29,30/7/2014)--------------------------------------------------------->
				
				<form class="bg-form clearfix" method="post" id="myform" name="myform" action="<?php echo base_url('registration/add');?>" onsubmit="return check_buyers();">
					<div class="form-group">
						<label id="fname_label">First Name:</label>
						<div>
							<input type="text" name="fname" id="fname" label="First Name" class="required">
						</div>
					</div>
					<div class="form-group">
						<label id="lname_label">Last Name:</label>
						<div>
							<input type="text" name="lname" id="lname" label="Last Name" class="required">
						</div>
					</div>
					<div class="form-group">
						<label id="email_label">Email</label>
						<div>
							<input type="email" name="email" id="email" class="required" label="Email" validation_type="email" onblur="email_valid(this.value);" onkeyup="email_valid(this.value);" >
							<input type="hidden" id="buyemail" name="buyemail" value="1">
						</div>
					</div>
					<div class="form-group">
						<label id="phone_label">Phone:</label>
						<div>
							<input type="text" name="phone" id="phone" class="required" label="Phone" validation_type="phone_no">
						</div>
					</div>
                                        <div class="form-group">
						<label id="pass_label">Password:</label>
						<div>
							<input type="password" name="pass" id="pass" class="required" label="Password">
						</div>
					</div>
                                        <div class="form-group">
						<label id="cpass_label">Confirm Password:</label>
						<div>
							<input type="password" name="cpass" id="cpass" class="required" label="Confirm Password" validation_type="confirmpassword">
						</div>
					</div>
					<div class="form-group">
						<label id="address_label">Address:</label>
						<div>
							<input type="text" name="address" id="address" class="required" label="Address">
						</div>
					</div>
					<div class="form-group">
						<label id="country_label">Country:</label>
						<?php
						$country=$this->registration_model->get_country();  // fetching the country list from the country tabel from database
						?>
						<div class="select-box-style">
							<select id="selectcountry" name="country" id="country" label="Country">
								<?php
								foreach($country as $row)
								{
								?>
								<option value = "<?php echo $row['id'];?>"><?php echo $row['country_name'];?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label id="company_label">Company name:</label>
						<div>
							<input type="text" name="company" id="company" class="required" label="Company name">
						</div>
					</div>
					<div class="form-group">
						<label id="company_pos_label">Company position:</label>
						<div>
							<input type="text" name="company_pos" id="company_pos" class="required" label="Company position">
						</div>
					</div>
					<div class="form-group">
						<label id="website_label">Website:</label>
						<div>
							<input type="text" name="website" id="website" class="required" validation_type="website" label="Website">
						</div>
					</div>
					<div class="form-group">
						<label id="selectproduct_label">Products of interest:</label>
						<?php
						      $res=$this->registration_model->get_product_type(); // fetching tehe product type from the database 
						?>
						<div class="select-box-style">
							<select id="selectproduct" name="product_type" label="Products of interest">
								<?php
								foreach($res as $row)
								{
								?>
								<option value = "<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div id='error_div' class="form-group" style="font-size: 14pt;"></div>
					<div class="checkbox">
						<!--<input type="checkbox" class="checkbox" id="checkbox-1" name="perspiciatis">
						<label for="checkbox-1" class="checkbox_label">Sed ut perspiciatis unde omnis iste natus</label>-->
						<input type="checkbox" class="checkbox" id="checkbox2" name="agree" label="Accept Terms">
						<label for="checkbox2" class="checkbox_label" id="checkbox2_label" style="width: 3%;"></label><a style="cursor: pointer;" href="<?php echo base_url();?>ourterms" target="_blank">Accept Terms & Condition</a>
						<label id="agree_error" style="display: none;"></label>
						<input style="display: none;" name="check" value="buyers"> <!------ take the value to controller for seperate sellers and buyers------->
					</div>
					<div class="modal-btn">
						<input type="submit" class="btn btn-primary pull-left"  name="submit" value="submit">
					</div>
				</form>
			
		    </div>
  <!--------------------------------------------------END OF BYERS REGISTRATION-------------------------------------------------------------------->
  
  <!------------------------------REGISTRATION FORM FOR SELLERS-----WORKED -> PRITAM (29/7/2014)--------------------------------------------------------->
		    
		    <div class="tab-pane" id="profile">
			  <?php
				$attributes = array('class' => 'bg-form clearfix', 'method' => 'post', 'onSubmit' => 'return check_sellers();');
				echo form_open('registration/add', $attributes);
                          ?>
				<!--<form class="bg-form clearfix">-->
					<div class="form-group">
						<label id="fname2_label">First Name:</label>
						<div>
							<input type="text" name="fname" id="fname2" label="First Name" class="needed">
						</div>
					</div>
					<div class="form-group">
						<label id="lname2_label">Last Name:</label>
						<div>
							<input type="text" name="lname" id="lname2" label="Last Name" class="needed">
						</div>
					</div>
					<div class="form-group">
						<label id="email2_label">Email</label>
						<div>
							<input type="email" name="email" id="email2" class="needed" label="Email" validation_type="email" onblur="saleremail_valid(this.value);" onkeyup="saleremail_valid(this.value);" >
							<input type="hidden" id="saleremail" name="saleremail" value="1">
							
						</div>
					</div>
					<div class="form-group">
						<label id="phone2_label">Phone:</label>
						<div>
							<input type="text" name="phone" id="phone2" class="needed" label="Phone" validation_type="phone_no">
						</div>
					</div>
                                        <div class="form-group">
						<label id="pass2_label">Password:</label>
						<div>
							<input type="password" name="pass" id="pass2" class="needed" label="Password">
						</div>
					</div>
                                        <div class="form-group">
						<label id="cpass2_label">Confirm Password:</label>
						<div>
							<input type="password" name="cpass" id="cpass2" class="needed" label="Confirm Password" validation_type="confirmpassword">
						</div>
					</div>
					<div class="form-group">
						<label id="company2_label">Company name:</label>
						<div>
							<input type="text" name="company" id="company2" class="needed" label="Company Name">
						</div>
					</div>
					<div class="form-group">
						<label id="companypos2_label">Company Position:</label>
						<div>
							<input type="text" name="company_pos" id="companypos2" class="needed" label="Company Position">
						</div>
					</div>
					<div class="form-group">
						<label>Website:</label>
						<div>
							<input type="text" name="website" id="website2" class="needed" label="Website">
						</div>
					</div>
					<div class="form-group">
						<label>Products of Interest:</label>
						<div>
							<select id="select24" name="product_type">
								<?php foreach($res as $row){?>
								
								<option value = "<?php echo $row['id'];?>"><?php echo $row['title'];}?></option>
							</select>
							<label id='product_error2' style="display: none;"></label>
						</div>
					</div>
					<div id='error_div2' class="form-group" style="font-size: 14pt;"></div>
					<div class="checkbox">
						<!--<input type="checkbox" class="checkbox" id="checkbox-12" name="perspiciatis">
						<label for="checkbox-12" class="checkbox_label">Sed ut perspiciatis unde omnis iste natus</label>-->
						<input type="checkbox" class="checkbox" id="checkbox22" name="agree" label="Accept Terms">
						<label for="checkbox22" class="checkbox_label" id="checkbox22_label" style="width: 3%;"></label><a style="cursor: pointer;" href="<?php echo base_url();?>ourterms" target="_blank">Accept Terms & Condition</a>
						<label id="agree_error" style="display: none;"></label>
						<input style="display: none;" name="check" value="buyers"> <!------ take the value to controller for seperate sellers and Sellers------->
					</div>
						<div class="modal-btn">
						<input type="submit" class="btn btn-primary pull-left"  name="submit" value="submit">
					</div>
				<!--</form>-->
				<?php echo form_close(); ?>
				
  <!--------------------------------------------------END OF SELLER REGISTRATION-------------------------------------------------------------------->
			</div>
		</div>
      	 </div>
      
    </div>
  </div>
</div>
<!--Login Pop up-->
<div class="modal fade registerModal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Login <span>for sellers/ buyers</span></h4>
      </div>
       <div class="modal-body clearfix">
			<div class="tab-pane" id="profile">

				<!--<form class="bg-form clearfix">-->
				
<!--===================================================LOGIN FORM ====WORKED (PRITAM -- 29,30/7/14)============================================-->				
				<?php
				    
				  $attributes = array('class' => 'bg-form clearfix', 'method' => 'post','onSubmit'=>'return loginvalidation();');
				  //form validation
				  
				  $flash_message=$this->session->flashdata('flash_message'); // used for flash message
				?>
				
				<!--=========== ADDED FOR FLASH MESSAGE (PRITAM-- 30/7/14) ====================-->
				      <?php
                                    if(isset($flash_message)) {
                                      
					  if($flash_message == 'not_registered') {
                              
                                              echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131);">';
                                              echo '<i class="icon-remove-sign"></i><strong>Error.! </strong> Invalid email or password. Please register to create your account.';
                                              echo '</div>';
					  }
                                      
					  if($flash_message == 'n_activated') {
                              
                                              echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131);">';
                                              echo '<i class="icon-remove-sign"></i>&nbsp<strong>Error.! &nbsp</strong> Your account is not activated now. Please check your mail to activate your account.';
                                              echo '</div>';
					  }
					  
				    }
                                ?>
			      <!--============================END=============================================-->
			      
				<?php
				    echo form_open('registration/login', $attributes);
				?>
					
						
					<div class="form-group" style="width:100%">
						<label>Email</label>
						<div>
							<input type="email" name="email" id="loginemail" value="<?php if($this->input->cookie('snowbrokers_cookie_value')==1){echo $this->input->cookie('snowbrokers_cookie_email');} else{echo "";}?>">
							<label id='loginemail_error' style="display: none;"></label>
						</div>
					</div>
				
                    <div class="form-group" style="width:100%">
						<label>Password:</label>
						<div>
							<input type="password" name="pass" id="logpass" value="<?php if($this->input->cookie('snowbrokers_cookie_value')==1){echo $this->input->cookie('snowbrokers_cookie_password');} else{echo "";}?>">
							<label id='logpass_error' style="display: none;"></label>
						</div>
					</div>
					  
					    
					<!--<div class="checkbox">-->
					<!--	<input type="checkbox" class="checkbox" id="checkbox-3">-->
					<!--	<label for="checkbox-3" class="checkbox_label">Sed ut perspiciatis unde omnis iste natus</label>-->
					<!--	-->
					<!--	<input type="checkbox" class="checkbox" id="checkbox-4">-->
					<!--	<label for="checkbox-4" class="checkbox_label">Accept Terms</label>-->
					<!--</div>-->
					
					<div class="form-group">
					  <div>
					      <a href="forgot_password">Forgot Password</a>
					  </div>
					</div>
					<div class="checkbox1">
						<input type="checkbox" class="checkbox" id="remember_me" name="remember_me" value="1" <?php if($this->input->cookie('snowbrokers_cookie_value')==1){echo 'checked';} else{echo "";}?>>
						<label for="remember_me" class="checkbox_label">Remember Me</label>
					</div>
					<div class="modal-btn">
						<button type="submit" class="btn btn-primary pull-left">
							submit
						</button>
					</div>
				<!--</form>-->
				<?php echo form_close(); ?>
				
<!--============================================================END OF LOGIN FORM========================================-->
			</div>
		</div>
      	
      	
	        
      </div>
      
    </div>
</div>

<!--========================================= JAVA SCRIPT VALIDATION OF BUYERS REGISTRATION ===(PRITAM--29,30/7/14)=============================-->

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script type="text/javascript">
  
  $( document ).ready(function() {
        $("#product_admin").click(function() {
		window.location.href = "<?php echo base_url();?>admin/index.php/product/index";
	});
  });
  
  function logout(){
    
    window.location.href="<?php echo base_url();?>registration/logout";
  }
  //$(document).ready(function(){
  //    
  //    $('#checkbox-2').click(function(){
  //      
  //        //alert('clicked');
  //        $('#agree_error').hide();
  //        document.getElementById("agree").style.border="1px #006600 solid";
  //        
  //    });
  //});
  //
  //$(document).ready(function(){
  //    
  //    $('#checkbox-22').click(function(){
  //      
  //        //alert('clicked');
  //        $('#agree_error2').hide();
  //        document.getElementById("agree").style.border="1px #006600 solid";
  //        
  //    });
  //});
  
  //$("#agree").on(function() {
  //  
  //  if( $get("agree").checked == true)
  //      alert("Checked");
  //  else
  //      alert("Unchecked");
  //});
function isValidEmailAddress(emailAddress)
{
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	return pattern.test(emailAddress);
}
function isValidPhoneNumber(phone_number)
{
	var pattern = new RegExp(/[0-9]/);      // Allowable characters 0-9.+-,
	return pattern.test(phone_number);
}
function check_buyers()
{
	$('#error_div').html('');
	$( "#error_div" ).css( "color", "#FF0000" );
	var element_id,element_value,element_label,error_div,element_validation_type;
	var required_elements = $('.required');
	var has_error = 0;
	error_div = $("#error_div");
	required_elements.each(function() {
		element_id = $(this).attr('id');
		element_value = $(this).val();
		element_label = $(this).attr('label');
		element_validation_type = $(this).attr('validation_type');
		
		//alert(element_id);
		if(element_value.search(/\S/)==-1)
		{
			error_div.html(element_label+' is required.');
			$( "#"+element_id+"_label" ).css( "color", "#FF0000" );
			$( "#"+element_id ).css( "border", "1px #FF0000 solid" );
			$( "#"+element_id ).focus();
			has_error++;
		}
		else if (element_validation_type=='email' && !isValidEmailAddress(element_value))
		{
			error_div.html('Give valid email address.');
			$( "#"+element_id+"_label" ).css( "color", "#FF0000" );
			$( "#"+element_id ).css( "border", "1px #FF0000 solid" );
			$( "#"+element_id ).focus();
			has_error++;
		}
		else if (element_validation_type=='phone_no' && !isValidPhoneNumber(element_value))
		{
			error_div.html('Give valid phone number.');
			$( "#"+element_id+"_label" ).css( "color", "#FF0000" );
			$( "#"+element_id ).css( "border", "1px #FF0000 solid" );
			$( "#"+element_id ).focus();
			has_error++;
		}
		else if (element_validation_type=='confirmpassword')
		{
			var password = $( "#pass" ).val();
			if(password.search(/\S/)!=-1)
			{
				if(element_value == password)
				{
					$( "#pass_label" ).css( "color", "#303030" );
					$( "#pass" ).css( "border", "1px #006600 solid" );
					$( "#"+element_id ).css( "color", "#303030" );
					$( "#"+element_id ).css( "border", "1px #006600 solid" );
					$( "#"+element_id+"_label" ).css( "color", "#303030" );
				}
				else
				{
					error_div.html('Password and Confirm password are not matched.');
					$( "#pass_label" ).css( "color", "#FF0000" );
					$( "#pass" ).css( "border", "1px #FF0000 solid" );
					$( "#"+element_id+"_label" ).css( "color", "#FF0000" );
					$( "#"+element_id ).css( "border", "1px #FF0000 solid" );
					$( "#"+element_id ).focus();
					has_error++;
				}
			}
		}
		else
		{
			$( "#"+element_id+"_label" ).css( "color", "#303030" );
			$( "#"+element_id ).css( "border", "1px #006600 solid" );
		}
		if (has_error>0)
		{
			return false;
		}
	});
	if (has_error>0)
	{
		return false;
	}
	else
	{
		if(!document.getElementById('checkbox2').checked)
		{
			error_div.html('Please accept terms and codition.');
			$( "#checkbox2_label" ).css( "color", "#FF0000" );
			$( "#checkbox2" ).css( "border", "1px #FF0000 solid" );
			$( "#checkbox2" ).focus();
			has_error++;
			return false;
		}
	}
}

//==================================================== VALIDATION FOR SELLERS =====================================================//

function check_sellers()
{
	$('#error_div2').html('');
	$( "#error_div2" ).css( "color", "#FF0000" );
	var element_id,element_value,element_label,error_div,element_validation_type;
	var required_elements = $('.needed');
	var has_error = 0;
	error_div = $("#error_div2");
	required_elements.each(function() {
		element_id = $(this).attr('id');
		element_value = $(this).val();
		element_label = $(this).attr('label');
		element_validation_type = $(this).attr('validation_type');
		
		//alert(element_id);
		if(element_value.search(/\S/)==-1)
		{
			error_div.html(element_label+' is required.');
			$( "#"+element_id+"_label" ).css( "color", "#FF0000" );
			$( "#"+element_id ).css( "border", "1px #FF0000 solid" );
			$( "#"+element_id ).focus();
			has_error++;
		}
		else if (element_validation_type=='email' && !isValidEmailAddress(element_value))
		{
			error_div.html('Give valid email address.');
			$( "#"+element_id+"_label" ).css( "color", "#FF0000" );
			$( "#"+element_id ).css( "border", "1px #FF0000 solid" );
			$( "#"+element_id ).focus();
			has_error++;
		}
		else if (element_validation_type=='phone_no' && !isValidPhoneNumber(element_value))
		{
			error_div.html('Give valid phone number.');
			$( "#"+element_id+"_label" ).css( "color", "#FF0000" );
			$( "#"+element_id ).css( "border", "1px #FF0000 solid" );
			$( "#"+element_id ).focus();
			has_error++;
		}
		else if (element_validation_type=='confirmpassword')
		{
			var password = $( "#pass2" ).val();
			if(password.search(/\S/)!=-1)
			{
				if(element_value == password)
				{
					$( "#pass2_label" ).css( "color", "#303030" );
					$( "#pass2" ).css( "border", "1px #006600 solid" );
					$( "#"+element_id ).css( "color", "#303030" );
					$( "#"+element_id ).css( "border", "1px #006600 solid" );
					$( "#"+element_id+"_label" ).css( "color", "#303030" );
				}
				else
				{
					error_div.html('Password and Confirm password are not matched.');
					$( "#pass2_label" ).css( "color", "#FF0000" );
					$( "#pass2" ).css( "border", "1px #FF0000 solid" );
					$( "#"+element_id+"_label" ).css( "color", "#FF0000" );
					$( "#"+element_id ).css( "border", "1px #FF0000 solid" );
					$( "#"+element_id ).focus();
					has_error++;
				}
			}
		}
		else
		{
			$( "#"+element_id+"_label" ).css( "color", "#303030" );
			$( "#"+element_id ).css( "border", "1px #006600 solid" );
		}
		if (has_error>0)
		{
			return false;
		}
	});
	if (has_error>0)
	{
		return false;
	}
	else
	{
		if(!document.getElementById('checkbox22').checked)
		{
			error_div.html('Please accept terms and codition.');
			$( "#checkbox22_label" ).css( "color", "#FF0000" );
			$( "#checkbox22" ).css( "border", "1px #FF0000 solid" );
			$( "#checkbox22" ).focus();
			has_error++;
			return false;
		}
	}
}

</script>