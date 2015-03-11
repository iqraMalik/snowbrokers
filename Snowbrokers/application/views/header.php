
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, JS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<meta name="author" content="Esolz Technology">
	<title>SNOWBROKERS ASIA</title>
	
	
	<link href="<?php echo $this->config->base_url(); ?>assets/css/fonts.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/select.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/developer.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">

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
	
	<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/custom.js"></script>

	<link rel="icon" href="http://esolz.co.in/lab5/html/snowbrokers/images/favicon.ico" type="image/x-icon">
	<link rel="icon" type="image/png" href="http://esolz.co.in/lab5/html/snowbrokers/images/favicon.png">
	
	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->
</head>

<body>
<header class="header navbar-fixed-top">
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
				<a class="navbar-brand" href="#">Snowbrokers</a><!-- <img src="images/logo.png" alt="LOGO"> -->
			</div>
			<div class="login-btn navbar-right">
				<button class="btn btn-default" data-toggle="modal" data-target="#loginModal">
					<span class="glyphicon glyphicon-log-in visible-xs"></span>
					<span class="hidden-xs">Log in</span>
				</button>
				<button class="btn btn-info" data-toggle="modal" data-target="#registerModal">
					<span class="glyphicon glyphicon-user visible-xs"></span>
					<span class="hidden-xs">Register</span>
				</button>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="#">Help</a>
					</li>
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">English <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li>
								<a href="#">Another link</a>
							</li>
						</ul>
					</li>-->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">CurrencyUS$ <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li>
								<a href="#">Another link</a>
							</li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</header>
</body>
</html>

<div class="modal fade registerModal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  
<!-----------------REGISTRATION FORM FOR BUYERS-----WORKED -> PRITAM (29/7/2014)--------------------------------------------------------->

				    <?php
				    
                                        $attributes = array('class' => 'bg-form clearfix', 'method' => 'post', 'onSubmit' => 'return check_buyers();');
                                        echo form_open('registration/add', $attributes);
                                    ?>

				<!--<form class="bg-form clearfix">-->
					<div class="form-group">
						<label>First Name:</label>
						<div>
							<input type="text" name="fname" id="fname">
							<label id='fname_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<div>
							<input type="text" name="lname" id="lname">
							<label id='lname_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Email</label>
						<div>
							<input type="email" name="email" id="email">
							<label id='email_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Phone:</label>
						<div>
							<input type="text" name="phone" id="phone">
							<label id='phone_error' style="display: none;"></label>
						</div>
					</div>
                                        <div class="form-group">
						<label>Password:</label>
						<div>
							<input type="password" name="pass" id="pass">
							<label id='pass_error' style="display: none;"></label>
						</div>
					</div>
                                        <div class="form-group">
						<label>Confirm Password:</label>
						<div>
							<input type="password" name="cpass" id="cpass">
							<label id='cpass_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Address:</label>
						<div>
							<input type="text" name="address" id="address">
							<label id='address_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>State:</label>
						<div>
							<input type="text" name="state" id="state">
							<label id='state_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Company name:</label>
						<div>
							<input type="text" name="company" id="company">
							<label id='company_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Country:</label>
						<div>
							<input type="text" name="country" id="country">
							<label id='country_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Website:</label>
						<div>
							<input type="text" name="website" id="website">
							<label id='website_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Company position:</label>
						<div>
							<input type="text" name="company_pos" id="company_pos">
							<label id='company_pos_error' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Choose Products:</label>
						
						<?php
						      $res=$this->registration_model->get_product_type(); // fetching tehe product type from the database 
						?>
						
						<div class="select-box-style">
							<select id="select" name="product_type">
							  <?php foreach($res as $row){?>
								<option value = "<?php echo $row['id'];?>"><?php echo $row['title'];}?></option>
							</select>
						</div>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" id="checkbox-1" name="perspiciatis">
						<label for="checkbox-1" class="checkbox_label">Sed ut perspiciatis unde omnis iste natus</label>
						
						<input type="checkbox" class="checkbox" id="checkbox-2" name="agree">
						<label for="checkbox-2" class="checkbox_label">Accept Terms</label>
						<label id="agree_error" style="display: none;"></label>
						<input style="display: none;" name="check" value="buyers"> <!------ take the value to controller for seperate sellers and buyers------->
					</div>
					<div class="modal-btn">
						<button type="submit" class="btn btn-primary pull-left">
							submit
						</button>
					</div>
				<!--</form>-->
				<?php echo form_close(); ?>
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
						<label>First Name:</label>
						<div>
							<input type="text" name="fname" id="fname2">
							<label id='fname_error2' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<div>
							<input type="text" name="lname" id="lname2">
							<label id='lname_error2' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Email</label>
						<div>
							<input type="email" name="email" id="email2">
							<label id='email_error2' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Phone:</label>
						<div>
							<input type="text" name="phone" id="phone2">
							<label id='phone_error2' style="display: none;"></label>
						</div>
					</div>
                                          <div class="form-group">
						<label>Password:</label>
						<div>
							<input type="password" name="pass" id="pass2">
							<label id='pass_error2' style="display: none;"></label>
						</div>
					</div>
                                        <div class="form-group">
						<label>Confirm Password:</label>
						<div>
							<input type="password" name="cpass" id="cpass2">
							<label id='cpass_error2' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Website:</label>
						<div>
							<input type="text" name="website" id="website2">
							<label id='website_error2' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>company position:</label>
						<div>
							<input type="text" name="company_pos" id="company_pos2">
							<label id='company_pos_error2' style="display: none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label>Choose Products:</label>
						<div>
							<select id="select2" name="product_type">
								<?php foreach($res as $row){?>
								<option value = "<?php echo $row['id'];?>"><?php echo $row['title'];}?></option>
							</select>
						</div>
					</div>
					<!--<div class="checkbox">-->
					<!--	<input type="checkbox" class="checkbox" id="checkbox-12">-->
					<!--	<label for="checkbox-1" class="checkbox_label">Sed ut perspiciatis unde omnis iste natus</label>-->
					<!--	-->
					<!--	<input type="checkbox" class="checkbox" id="checkbox-22">-->
					<!--	<label for="checkbox-2" class="checkbox_label">Accept Terms</label>-->
					<!--	<label id="agree_error2" style="display: none;"></label>-->
					<!--</div>-->
					
					<div class="checkbox">
						<input type="checkbox" class="checkbox" id="checkbox-12" name="perspiciatis">
						<label for="checkbox-12" class="checkbox_label">Sed ut perspiciatis unde omnis iste natus</label>
						
						<input type="checkbox" class="checkbox" id="checkbox-22" name="agree2">
						<label for="checkbox-22" class="checkbox_label">Accept Terms</label>
						<label id="agree_error2" style="display: none;"></label>
						<input style="display: none;" name="check" value="sellers"> <!------ take the value to controller for seperate sellers and buyers------->
					</div>

					<div class="modal-btn">
						<button type="submit" class="btn btn-primary pull-left">
							submit
						</button>
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
<div class="modal fade registerModal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Login <span>for sellers/ buyers</span></h4>
      </div>
       <div class="modal-body clearfix">
			<div class="tab-pane" id="profile">

				<!--<form class="bg-form clearfix">-->
				
<!--===================================================LOGIN FORM ====WORKED (PRITAM -- 29/7/14)============================================-->				
				<?php
				    
				  $attributes = array('class' => 'bg-form clearfix', 'method' => 'post');
				  //form validation
				?>
                          
				<?php
				    echo form_open('registration/login', $attributes);
				?>
					
						
					<div class="">
						<label>Email</label>
						<div>
							<input type="email" style="height: 40px;width: 80%;" name="email"> 
						</div>
					</div>
				    <br>
                                          <div class="" >
						<label>Password:</label>
						<div>
							<input type="password" style="height: 40px;width: 80%;" name="pass">
						</div>
					</div>
					  <br>
					    
					<!--<div class="checkbox">-->
					<!--	<input type="checkbox" class="checkbox" id="checkbox-3">-->
					<!--	<label for="checkbox-3" class="checkbox_label">Sed ut perspiciatis unde omnis iste natus</label>-->
					<!--	-->
					<!--	<input type="checkbox" class="checkbox" id="checkbox-4">-->
					<!--	<label for="checkbox-4" class="checkbox_label">Accept Terms</label>-->
					<!--</div>-->
					<div class="modal-btn">
						<button type="submit" class="btn btn-primary pull-left">
							submit
						</button>
					</div>
				<!--</form>-->
				<?php echo form_close(); ?>
				
<!--============================================================END OF LOGIN FORM (PRITAM-- 29/7/14)========================================-->
			</div>
		</div>
      	
      	
	        
      </div>
      
    </div>
</div>

<!--========================================= JAVA SCRIPT VALIDATION OF BUYERS REGISTRATION ===(PRITAM--29/7/14)=============================-->

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script type="text/javascript">
  
  
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
 
function check_buyers() {
  
  if(document.getElementById("fname").value == '') /*=======validate First name=====*/
  {
    document.getElementById('fname_error').style.display='block';
    document.getElementById('fname_error').innerHTML='Enter your first name..';
    document.getElementById('fname_error').style.color="red";
    document.getElementById('fname').style.border="1px #FF0000 solid";
    document.getElementById('fname').focus();
    return false;
  }
  else
  {
    document.getElementById('fname_error').style.display='none';
    document.getElementById('fname').style.border="1px #006600 solid";
  }
  
  if(document.getElementById("lname").value == '') /*=======validate Last name=====*/
  {
    document.getElementById('lname_error').style.display='block';
    document.getElementById('lname_error').innerHTML='Enter your last name..';
    document.getElementById('lname_error').style.color="red";
    document.getElementById('lname').style.border="1px #FF0000 solid";
    document.getElementById('lname').focus();
    return false;
  }
  else
  {
    document.getElementById('lname_error').style.display='none';
    document.getElementById('lname').style.border="1px #006600 solid";
  }	

  if(document.getElementById("email").value == '')  /*=======validate email=====*/
  {	
    document.getElementById('email_error').style.display='block';
    document.getElementById('email_error').innerHTML='Enter your email..';
    document.getElementById('email_error').style.color="red";
    document.getElementById('email').style.border="1px #FF0000 solid";
    document.getElementById('email').focus();
    return false;
  }	
  else
  {  
      var pq=document.getElementById("email").value;
      var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      
      if (!pq.match(filter))
      {
	document.getElementById('email_error').style.display='block';
	document.getElementById('email_error').innerHTML='Enter Correct Email Format.';
	document.getElementById('email_error').style.color="red";
	document.getElementById('email').style.border="1px #FF0000 solid";
	document.getElementById('email').focus();
	return false;
      }
      else
      {
	 document.getElementById('email_error').style.display='none';
	 document.getElementById('email').style.border="1px #006600 solid";
      }
  }
  
  //if(document.getElementById("confirm_email").value == '')  /*=======validate Confirm email=====*/
  //{	
  //  document.getElementById('cemail_error').style.display='block';
  //  document.getElementById('cemail_error').innerHTML='Enter your email again..';
  //  document.getElementById('cemail_error').style.color="red";
  //  document.getElementById('confirm_email').style.border="1px #FF0000 solid";
  //  document.getElementById('confirm_email').focus();
  //  return false;
  //}	
  //else
  //{
  //  var email=document.getElementById("email").value;
  //  var cemail=document.getElementById("confirm_email").value;
  //  
  //  if (email==cemail) {
  //    
  //    document.getElementById('cemail_error').style.display='none';
  //    document.getElementById('confirm_email').style.border="1px #006600 solid";
  //  }
  //  else{
  //    
  //    document.getElementById('cemail_error').style.display='block';
  //    document.getElementById('cemail_error').innerHTML='Confirm email not matched..';
  //    document.getElementById('cemail_error').style.color="red";
  //    document.getElementById('confirm_email').style.border="1px #FF0000 solid";
  //    document.getElementById('confirm_email').focus();
  //    return false;
  //  }
  //  
  //}
  
   if(document.getElementById('phone').value == '') /*=======validate Phnone Number=====*/
  {
    //alert("phone");
    document.getElementById('phone_error').style.display='block';
    document.getElementById('phone_error').innerHTML='Enter Phone Number.';
    document.getElementById('phone_error').style.color="red";
    document.getElementById('phone').style.border="1px #FF0000 solid";
    document.getElementById('phone').focus();
    return false;
      
  }
  else{
      
      var ph=document.getElementById('phone').value.length;
      
      if(ph < 10)
      {
        
          document.getElementById('phone_error').style.display='block';
          document.getElementById('phone_error').innerHTML='Phone Number Must be atleast 10 digits.';
          document.getElementById('phone_error').style.color="red";
          document.getElementById('phone').style.border="1px #FF0000 solid";
          document.getElementById('phone').focus();
          
          return false;
        
      }
      else
      {
          document.getElementById('phone_error').style.display='none';
          document.getElementById('phone').style.border="1px #006600 solid";
          //alert('city');
      }
  }
  
  if(document.getElementById("pass").value == '') /*=======validate Password=====*/
  {
    document.getElementById('pass_error').style.display='block';
    document.getElementById('pass_error').innerHTML='Enter your password..';
    document.getElementById('pass_error').style.color="red";
    document.getElementById('pass').style.border="1px #FF0000 solid";
    document.getElementById('pass').focus();
    return false;
  }
  else
  {
    
    var pass=document.getElementById("pass").value.length;
    if (pass < 5) {
      
      document.getElementById('pass_error').style.display='block';
      document.getElementById('pass_error').innerHTML='Password must be atleast 5 character in length..';
      document.getElementById('pass_error').style.color="red";
      document.getElementById('pass').style.border="1px #FF0000 solid";
      document.getElementById('pass').focus();
      return false;
    }
    else{
      
      document.getElementById('pass_error').style.display='none';
      document.getElementById('pass').style.border="1px #006600 solid";
    }
  }
  
  if(document.getElementById("cpass").value == '')  /*=======validate Confirm Password=====*/
  {	
    document.getElementById('cpass_error').style.display='block';
    document.getElementById('cpass_error').innerHTML='Enter your password again..';
    document.getElementById('cpass_error').style.color="red";
    document.getElementById('cpass').style.border="1px #FF0000 solid";
    document.getElementById('cpass').focus();
    return false;
  }	
  else
  {
    var pass=document.getElementById("pass").value;
    var cpass=document.getElementById("cpass").value;
    
    if (pass==cpass) {
      
      document.getElementById('cpass_error').style.display='none';
      document.getElementById('cpass').style.border="1px #006600 solid";
    }
    else{
      
      document.getElementById('cpass_error').style.display='block';
      document.getElementById('cpass_error').innerHTML='Confirm password not matched..';
      document.getElementById('cpass_error').style.color="red";
      document.getElementById('cpass').style.border="1px #FF0000 solid";
      document.getElementById('cpass').focus();
      return false;
    }
    
  }
  
  
  if(document.getElementById('address').value == '')  /*=======validate address=====*/
  {
    ;
    document.getElementById("address_error").style.display='block';
    document.getElementById("address_error").innerHTML='Enter your address..';
    document.getElementById("address_error").style.color="red";
    document.getElementById("address").style.border="1px #FF0000 solid";
    document.getElementById("address").focus();
    return false;
    
  }
  else
  {
    document.getElementById("address_error").style.display='none';
    document.getElementById("address").style.border="1px #006600 solid";
  }
  
  if(document.getElementById("state").value == '')  /*=======validate state=====*/
  {
    document.getElementById("state_error").style.display='block';
    document.getElementById("state_error").innerHTML='Enter your state..';
    document.getElementById("state_error").style.color="red";
    document.getElementById("state").style.border="1px #FF0000 solid";
    document.getElementById("state").focus();
    return false;
    
  }
  else
  {
    document.getElementById("state_error").style.display='none';
    document.getElementById("state").style.border="1px #006600 solid";
  }
  
  if(document.getElementById("company").value == '')  /*=======validate company=====*/
  {
    document.getElementById("company_error").style.display='block';
    document.getElementById("company_error").innerHTML='Enter your company..';
    document.getElementById("company_error").style.color="red";
    document.getElementById("company").style.border="1px #FF0000 solid";
    document.getElementById("company").focus();
    return false;
    
  }
  else
  {
    document.getElementById("company_error").style.display='none';
    document.getElementById("company").style.border="1px #006600 solid";
  }

  if(document.getElementById("country").value == '')  /*=======validate country=====*/
  {
    document.getElementById("country_error").style.display='block';
    document.getElementById("country_error").innerHTML='Enter your country..';
    document.getElementById("country_error").style.color="red";
    document.getElementById("country").style.border="1px #FF0000 solid";
    document.getElementById("country").focus();
    return false;
    
  }
  else
  {
    document.getElementById("country_error").style.display='none';
    document.getElementById("country").style.border="1px #006600 solid";
  }
  
  if(document.getElementById("website").value == '')  /*=======validate website=====*/
  {
    document.getElementById("website_error").style.display='block';
    document.getElementById("website_error").innerHTML='Enter your website..';
    document.getElementById("website_error").style.color="red";
    document.getElementById("website").style.border="1px #FF0000 solid";
    document.getElementById("website").focus();
    return false;
    
  }
  else
  {
    document.getElementById("website_error").style.display='none';
    document.getElementById("website").style.border="1px #006600 solid";
  }
  
  if(document.getElementById("company_pos").value == '')  /*=======validate company_position=====*/
  {
    document.getElementById("company_pos_error").style.display='block';
    document.getElementById("company_pos_error").innerHTML='Enter your company..';
    document.getElementById("company_pos_error").style.color="red";
    document.getElementById("company_pos").style.border="1px #FF0000 solid";
    document.getElementById("company_pos").focus();
    return false;
    
  }
  else
  {
    document.getElementById("company_pos_error").style.display='none';
    document.getElementById("company_pos").style.border="1px #006600 solid";
  }
  
  //if(document.getElementById("select").value == 0)  /*=======validate Select options=====*/
  //{
  //  document.getElementById("select_error").style.display='block';
  //  document.getElementById("select_error").innerHTML='Choose the product type..';
  //  document.getElementById("select_error").style.color="red";
  //  document.getElementById("select").style.border="1px #FF0000 solid";
  //  document.getElementById("select").focus();
  //  return false;
  //  
  //}
  //else
  //{
  //  document.getElementById("select_error").style.display='none';
  //  document.getElementById("select").style.border="1px #006600 solid";
  //}
  
  if(!document.getElementById('checkbox-2').checked)
  {
    
    document.getElementById("agree_error").style.display='block';
    document.getElementById("agree_error").innerHTML='You must agree to our terms to continue..';
    document.getElementById("agree_error").style.color="red";
    document.getElementById("checkbox-2").style.border="1px #FF0000 solid";
    document.getElementById("checkbox-2").focus();
    return false;
  }
  else{
    
    document.getElementById("agree_error").style.display='none';
    document.getElementById("checkbox-2").style.border="1px #006600 solid";
  }
}

//==================================================== VALIDATION FOR SELLERS =====================================================//

function check_sellers() {
  
  if(document.getElementById("fname2").value == '') /*=======validate First name=====*/
  {
    document.getElementById('fname_error2').style.display='block';
    document.getElementById('fname_error2').innerHTML='Enter your first name..';
    document.getElementById('fname_error2').style.color="red";
    document.getElementById('fname2').style.border="1px #FF0000 solid";
    document.getElementById('fname2').focus();
    return false;
  }
  else
  {
    document.getElementById('fname_error2').style.display='none';
    document.getElementById('fname2').style.border="1px #006600 solid";
  }
  
  if(document.getElementById("lname2").value == '') /*=======validate Last name=====*/
  {
    document.getElementById('lname_error2').style.display='block';
    document.getElementById('lname_error2').innerHTML='Enter your last name..';
    document.getElementById('lname_error2').style.color="red";
    document.getElementById('lname2').style.border="1px #FF0000 solid";
    document.getElementById('lname2').focus();
    return false;
  }
  else
  {
    document.getElementById('lname_error2').style.display='none';
    document.getElementById('lname2').style.border="1px #006600 solid";
  }	

  if(document.getElementById("email2").value == '')  /*=======validate email=====*/
  {	
    document.getElementById('email_error2').style.display='block';
    document.getElementById('email_error2').innerHTML='Enter your email..';
    document.getElementById('email_error2').style.color="red";
    document.getElementById('email2').style.border="1px #FF0000 solid";
    document.getElementById('email2').focus();
    return false;
  }	
  else
  {  
      var pq=document.getElementById("email2").value;
      var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      
      if (!pq.match(filter))
      {
	document.getElementById('email_error2').style.display='block';
	document.getElementById('email_error2').innerHTML='Enter Correct Email Format.';
	document.getElementById('email_error2').style.color="red";
	document.getElementById('email2').style.border="1px #FF0000 solid";
	document.getElementById('email2').focus();
	return false;
      }
      else
      {
	 document.getElementById('email_error2').style.display='none';
	 document.getElementById('email2').style.border="1px #006600 solid";
      }
  }
  
  //if(document.getElementById("confirm_email").value == '')  /*=======validate Confirm email=====*/
  //{	
  //  document.getElementById('cemail_error').style.display='block';
  //  document.getElementById('cemail_error').innerHTML='Enter your email again..';
  //  document.getElementById('cemail_error').style.color="red";
  //  document.getElementById('confirm_email').style.border="1px #FF0000 solid";
  //  document.getElementById('confirm_email').focus();
  //  return false;
  //}	
  //else
  //{
  //  var email=document.getElementById("email").value;
  //  var cemail=document.getElementById("confirm_email").value;
  //  
  //  if (email==cemail) {
  //    
  //    document.getElementById('cemail_error').style.display='none';
  //    document.getElementById('confirm_email').style.border="1px #006600 solid";
  //  }
  //  else{
  //    
  //    document.getElementById('cemail_error').style.display='block';
  //    document.getElementById('cemail_error').innerHTML='Confirm email not matched..';
  //    document.getElementById('cemail_error').style.color="red";
  //    document.getElementById('confirm_email').style.border="1px #FF0000 solid";
  //    document.getElementById('confirm_email').focus();
  //    return false;
  //  }
  //  
  //}
  
   if(document.getElementById('phone2').value == '') /*=======validate Phnone Number=====*/
  {
    //alert("phone");
    document.getElementById('phone_error2').style.display='block';
    document.getElementById('phone_error2').innerHTML='Enter Phone Number.';
    document.getElementById('phone_error2').style.color="red";
    document.getElementById('phone2').style.border="1px #FF0000 solid";
    document.getElementById('phone2').focus();
    return false;
      
  }
  else{
      
      var ph=document.getElementById('phone2').value.length;
      
      if(ph < 10)
      {
        
          document.getElementById('phone_error2').style.display='block';
          document.getElementById('phone_error2').innerHTML='Phone Number Must be atleast 10 digits.';
          document.getElementById('phone_error2').style.color="red";
          document.getElementById('phone2').style.border="1px #FF0000 solid";
          document.getElementById('phone2').focus();
          
          return false;
        
      }
      else
      {
          document.getElementById('phone_error2').style.display='none';
          document.getElementById('phone2').style.border="1px #006600 solid";
          //alert('city');
      }
  }
  
  if(document.getElementById("pass2").value == '') /*=======validate Password=====*/
  {
    document.getElementById('pass_error2').style.display='block';
    document.getElementById('pass_error2').innerHTML='Enter your password..';
    document.getElementById('pass_error2').style.color="red";
    document.getElementById('pass2').style.border="1px #FF0000 solid";
    document.getElementById('pass2').focus();
    return false;
  }
  else
  {
    
    var pass=document.getElementById("pass2").value.length;
    if (pass < 5) {
      
      document.getElementById('pass_error2').style.display='block';
      document.getElementById('pass_error2').innerHTML='Password must be atleast 5 character in length..';
      document.getElementById('pass_error2').style.color="red";
      document.getElementById('pass2').style.border="1px #FF0000 solid";
      document.getElementById('pass2').focus();
      return false;
    }
    else{
      
      document.getElementById('pass_error2').style.display='none';
      document.getElementById('pass2').style.border="1px #006600 solid";
    }
  }
  
  if(document.getElementById("cpass2").value == '')  /*=======validate Confirm Password=====*/
  {	
    document.getElementById('cpass_error2').style.display='block';
    document.getElementById('cpass_error2').innerHTML='Enter your password again..';
    document.getElementById('cpass_error2').style.color="red";
    document.getElementById('cpass2').style.border="1px #FF0000 solid";
    document.getElementById('cpass2').focus();
    return false;
  }	
  else
  {
    var pass=document.getElementById("pass2").value;
    var cpass=document.getElementById("cpass2").value;
    
    if (pass==cpass) {
      
      document.getElementById('cpass_error2').style.display='none';
      document.getElementById('cpass2').style.border="1px #006600 solid";
    }
    else{
      
      document.getElementById('cpass_error2').style.display='block';
      document.getElementById('cpass_error2').innerHTML='Confirm password not matched..';
      document.getElementById('cpass_error2').style.color="red";
      document.getElementById('cpass2').style.border="1px #FF0000 solid";
      document.getElementById('cpass2').focus();
      return false;
    }
    
  }
  
  
  //if(document.getElementById('address2').value == '')  /*=======validate address=====*/
  //{
  //  ;
  //  document.getElementById("address_error2").style.display='block';
  //  document.getElementById("address_error2").innerHTML='Enter your address..';
  //  document.getElementById("address_error2").style.color="red";
  //  document.getElementById("address2").style.border="1px #FF0000 solid";
  //  document.getElementById("address2").focus();
  //  return false;
  //  
  //}
  //else
  //{
  //  document.getElementById("address_error2").style.display='none';
  //  document.getElementById("address2").style.border="1px #006600 solid";
  //}
  //
  //if(document.getElementById("state2").value == '')  /*=======validate state=====*/
  //{
  //  document.getElementById("state_error2").style.display='block';
  //  document.getElementById("state_error2").innerHTML='Enter your state..';
  //  document.getElementById("state_error2").style.color="red";
  //  document.getElementById("state2").style.border="1px #FF0000 solid";
  //  document.getElementById("state2").focus();
  //  return false;
  //  
  //}
  //else
  //{
  //  document.getElementById("state_error2").style.display='none';
  //  document.getElementById("state2").style.border="1px #006600 solid";
  //}
  //
  //if(document.getElementById("company2").value == '')  /*=======validate company=====*/
  //{
  //  document.getElementById("company_error2").style.display='block';
  //  document.getElementById("company_error2").innerHTML='Enter your company..';
  //  document.getElementById("company_error2").style.color="red";
  //  document.getElementById("company2").style.border="1px #FF0000 solid";
  //  document.getElementById("company2").focus();
  //  return false;
  //  
  //}
  //else
  //{
  //  document.getElementById("company_error2").style.display='none';
  //  document.getElementById("company2").style.border="1px #006600 solid";
  //}
  //
  //if(document.getElementById("country2").value == '')  /*=======validate country=====*/
  //{
  //  document.getElementById("country_error2").style.display='block';
  //  document.getElementById("country_error2").innerHTML='Enter your country..';
  //  document.getElementById("country_error2").style.color="red";
  //  document.getElementById("country2").style.border="1px #FF0000 solid";
  //  document.getElementById("country2").focus();
  //  return false;
  //  
  //}
  //else
  //{
  //  document.getElementById("country_error2").style.display='none';
  //  document.getElementById("country2").style.border="1px #006600 solid";
  //}
  
  if(document.getElementById("website2").value == '')  /*=======validate website=====*/
  {
    document.getElementById("website_error2").style.display='block';
    document.getElementById("website_error2").innerHTML='Enter your website..';
    document.getElementById("website_error2").style.color="red";
    document.getElementById("website2").style.border="1px #FF0000 solid";
    document.getElementById("website2").focus();
    return false;
    
  }
  else
  {
    document.getElementById("website_error2").style.display='none';
    document.getElementById("website2").style.border="1px #006600 solid";
  }
  
  if(document.getElementById("company_pos2").value == '')  /*=======validate company_position=====*/
  {
    document.getElementById("company_pos_error2").style.display='block';
    document.getElementById("company_pos_error2").innerHTML='Enter your company..';
    document.getElementById("company_pos_error2").style.color="red";
    document.getElementById("company_pos2").style.border="1px #FF0000 solid";
    document.getElementById("company_pos2").focus();
    return false;
    
  }
  else
  {
    document.getElementById("company_pos_error2").style.display='none';
    document.getElementById("company_pos2").style.border="1px #006600 solid";
  }
  
  //if(document.getElementById("select").value == 0)  /*=======validate Select options=====*/
  //{
  //  document.getElementById("select_error").style.display='block';
  //  document.getElementById("select_error").innerHTML='Choose the product type..';
  //  document.getElementById("select_error").style.color="red";
  //  document.getElementById("select").style.border="1px #FF0000 solid";
  //  document.getElementById("select").focus();
  //  return false;
  //  
  //}
  //else
  //{
  //  document.getElementById("select_error").style.display='none';
  //  document.getElementById("select").style.border="1px #006600 solid";
  //}
  
  if(!document.getElementById('checkbox-22').checked)
  {
    
    document.getElementById("agree_error2").style.display='block';
    document.getElementById("agree_error2").innerHTML='You must agree to our terms to continue..';
    document.getElementById("agree_error2").style.color="red";
    document.getElementById("checkbox-22").style.border="1px #FF0000 solid";
    document.getElementById("checkbox-22").focus();
    return false;
  }
  else{
    
    document.getElementById("agree_error2").style.display='none';
    document.getElementById("checkbox-22").style.border="1px #006600 solid";
  }
}

</script>