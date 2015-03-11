<?php
$this->load->view('header/header');
?>
<section class="innerpage_page">
	<div class="container">
		<div class="row">
			<div class="col-md-3"> </div>
			<div class="col-md-6">
				<div class="sgn_up_out">
				<?php
				if($this->session->userdata('success_msg')!='')
				{
				?>
				<div class="alert_success">
				<?php
					echo $this->session->userdata('success_msg');
					$this->session->unset_userdata('success_msg');
				?>
				</div>
				<?php
				}
				if($this->session->userdata('error_msg')!='')
				{
				?>
				<div class="alert_error">
				<?php
					echo $this->session->userdata('error_msg');
					$this->session->unset_userdata('error_msg');
				?>
				</div>
				<?php
				}
				
				?>
					<h4>Sports SIGN UP</h4>
					<form class="spcing_otr" id="registration_form" name="registration_form" method="post" enctype="multipart/form-data" action="<?php echo site_url('signup/registration_full')?>" onsubmit="return check_validation();">
					<input type="hidden" id="email_format" name="email_format" value="">
					<input type="hidden" id="email_hidden" name="email_hidden" value="">
					<input type="hidden" id="registration_type" name="registration_type" value="<?php if($this->session->userdata('registration_type')!=''){echo $this->session->userdata('registration_type');}else{echo '';}?>">
					<input type="hidden" id="facebook_id" name="facebook_id" value="<?php if($this->session->userdata('facebook_id')!=''){echo $this->session->userdata('facebook_id');}else{echo '';}?>">
					<input type="hidden" id="facebook_image" name="facebook_image" value="<?php if($this->session->userdata('facebook_image')!=''){echo $this->session->userdata('facebook_image');}else{echo '';}?>">
					
						<div class="frst_nm_rw clearfix">
							<input type="text" class="frst_nm_txt_bx"  id="first_name" name="first_name" placeholder="First Name" value="<?php if($this->session->userdata('facebook_first_name')!=''){echo $this->session->userdata('facebook_first_name');}else{echo '';}?>"/>
							<input type="text" class="frst_nm_txt_bx"  id="last_name" name="last_name" placeholder="Last Name" value="<?php if($this->session->userdata('facebook_last_name')!=''){echo $this->session->userdata('facebook_last_name');}else{echo '';}?>"/>
						</div>
						<div id="name_error" style="color: red;margin-bottom: 20px;"></div>
						
						
						<div class="frst_nm_rw clearfix">
							<input type="text" class="txt_bx_eml" id="email" name="email" placeholder="Email" onblur="check_email(this.value);" value="<?php if($this->session->userdata('facebook_email')!=''){echo $this->session->userdata('facebook_email');}else{echo '';}?>"/>
						</div>
						<div id="email_error" style="color: red;margin-bottom: 20px;"></div>
						<div class="frst_nm_rw clearfix">
							<label>Location</label>
							<input type="text" label="Location" name="location" value="" id="location" placeholder="Location" style="width: 50%;" >
				
							<div id="location_error" class="error_div" style="color:red;"></div>
						</div>             
					       
						 <div class="frst_nm_rw clearfix">
							<label>Profile:</label>
							<select name="profile" id="profile" label="Profile">
							    <option value="">Select Profile</option>
							    <option value="1">User</option>
							    <option value="2">Instructor</option>
							    <option value="3">Company</option>
							</select>
							<div id="profile_error" class="error_div" style="color:red;"></div>
					       </div>
						<span class="sgnup">
							<input type="submit" class="sgn_btu" value="Create My Account" />
						</span>
						
						
						
					</form>
						
				</div>
			</div>
			<div class="col-md-3"> </div>
		</div>
	</div>
</section>
<script>
	function check_validation()
	{
		if ($.trim($('#first_name').val())=='')
		{
			$('#name_error').html('First name is required.');
			$('#first_name').focus();
			return false;
		}
		else if ($.trim($('#last_name').val())=='')
		{
			$('#name_error').html('Last name is required.');
			$('#last_name').focus();
			return false;
		}
		else
		{
			$('#name_error').html('');
		}		
		if ($.trim($('#email').val())=='')
		{
			$('#email_error').html('Email is required.');
			$('#email').focus();
			return false;
		}
		
		else if ($('#email_format').val()==1)
		{
		    $('#email_error').html('Please enter valid email.');
		    $('#email').focus();
		    return false;
		}
		else if ($('#email_hidden').val()==1)
		{
		    $('#email_error').html('This email is already registered.');
		    $('#email').focus();
		    return false;
		}
		else
		{
			$('#email_error').html('');
		}
		if ($('#location').val()=='')
		{
		    $('#location_error').html('Please Enter Location.');
		    $('#location').focus();
		    return false;
		}
		else
		{
			$('#location_error').html('');
		}
		if ($('#profile').val()=='')
		{
		    $('#profile_error').html('Please Select Profile.');
		    $('#profile').focus();
		    return false;
		}
		else
		{
			$('#profile_error').html('');
		}

	}
	
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
	};
</script>
<?php
unset($this->session->userdata);
?>
    </body>
    </htm>