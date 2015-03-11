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
				if($this->session->userdata('user_email')!='')
				{
					$user_email=$this->session->userdata('user_email');
					$this->session->unset_userdata('user_email');
				}
				else
				
				{
					$user_email='';
				}
				?>
					<h4>TASK POSTER SIGN UP</h4>
					<form class="spcing_otr" id="registration_form" name="registration_form" method="post" enctype="multipart/form-data" action="<?php echo site_url('signup/create_memeber')?>" autocomplete="off">
					<input type="hidden" id="email_hidden_error" name="email_hidden_error" value="">
					<input type="hidden" id="email_format" name="email_format" value=1>
					<input type="hidden" id="email_hidden" name="email_hidden" value="">
						<div class="frst_nm_rw clearfix">
							<input type="text" class="frst_nm_txt_bx"  id="first_name" name="first_name" placeholder="First Name"/>
							<input type="text" class="frst_nm_txt_bx"  id="last_name" name="last_name" placeholder="Last Name"/>
						</div>
						<div id="name_error" style="color: red;margin-bottom: 20px;"></div>
						<div class="frst_nm_rw clearfix">
							<input type="text" class="txt_bx_ptlcd" id="postal_code" name="postal_code" placeholder="Postal Code"/>
						</div>
						<div id="postal_code_error" style="color: red;margin-bottom: 20px;"></div>
						<div class="frst_nm_rw clearfix">
							<input type="text" class="txt_bx_ph_no" id="phone_number" name="phone_number" placeholder="Phone Number"/>
						</div>
						<div id="phone_number_error" style="color: red;margin-bottom: 20px;"></div>
						<div class="frst_nm_rw clearfix">
							<input type="text" class="txt_bx_eml" id="email" name="email" placeholder="Email" value="<?php echo $user_email;?>"/>
						</div>
						<div id="email_error" style="color: red;margin-bottom: 20px;"></div>
						<div class="frst_nm_rw clearfix">
							<input type="password" class="txt_bx_psw" id="password" name="password" placeholder="Password"/>
						</div>
						<div id="password_error" style="color: red;margin-bottom: 20px;"></div>
						<div class="frst_nm_rw clearfix">
							<input type="password" class="txt_bx_psw" id="retype_password" name="retype_password" placeholder="Confirm Password"/>
						</div>
						<div id="retype_password_error" style="color: red;margin-bottom: 20px;"></div>
						<!-- <span class="bcm_tsk">Become a Task-Aroo <a href="#">Sign Up Here</a></span> -->
						
						<div class="frst_nm_rw clearfix">
							<input type="text" class="txt_bx_psw" id="security_question_1" name="security_question_1" placeholder="Security Question 1"/>
						</div>
						<div id="security_question_1_error" style="color: red;margin-bottom: 20px;"></div>
						
						<div class="frst_nm_rw clearfix">
							<input type="text" class="txt_bx_eml" id="security_answer_1" name="security_answer_1" placeholder="Security Answer 1"/>
						</div>
						<div id="security_answer_1_error" style="color: red;margin-bottom: 20px;"></div>
						
						<div class="frst_nm_rw clearfix">
							<input type="text" class="txt_bx_psw" id="security_question_2" name="security_question_2" placeholder="Security Question 2"/>
						</div>
						<div id="security_question_2_error" style="color: red;margin-bottom: 20px;"></div>
						
						<div class="frst_nm_rw clearfix">
							<input type="text" class="txt_bx_eml" id="security_answer_2" name="security_answer_2" placeholder="Security Answer 2"/>
						</div>
						<div id="security_answer_2_error" style="color: red;margin-bottom: 20px;"></div>
						
						<div class="ckh_bx_ot sign_up_chk">
							<ul class="gf-checkbox">
								<li>
									<input type="checkbox" id="terms_condition" name="terms_condition" value="1"/><label for="terms_condition">I agree to all <a href="<?php echo base_url(); ?>index.php/terms/index" target="_blank">terms and conditions</a>.</label>
								</li>
							</ul>
						</div>
						
						<div id="terms_condition_error" style="color: red;margin-bottom: 20px;"></div>
						
						<span class="sgnup">
							<input type="button" class="sgn_btu" value="Create My Account" onclick="check_validation();"/>
						</span>
						
						<span class="bcm_tsk">or sign up using</span>
						
						<span class="fbk_lnk"> <a href="<?php echo site_url('signup/inner_signup_facebook')?>"> <img src="<?php echo base_url();?>images/fbk.png" alt="" /> </a> </span>
						
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
		var has_error=0;
		if ($.trim($('#first_name').val())=='')
		{
			$('#name_error').html('First name is required.');
			$('#first_name').focus();
			has_error=1;
			return false;
		}
		else if ($.trim($('#last_name').val())=='')
		{
			$('#name_error').html('Last name is required.');
			$('#last_name').focus();
			has_error=1;
			return false;
		}
		else
		{
			$('#name_error').html('');
		}
		if ($.trim($('#postal_code').val())=='')
		{
			$('#postal_code_error').html('Postal code is required.');
			$('#postal_code').focus();
			has_error=1;
			return false;
		}
		else
		{
			$('#postal_code_error').html('');
		}
		if ($.trim($('#postal_code').val())=='')
		{
			$('#postal_code_error').html('Postal code is required.');
			$('#postal_code').focus();
			has_error=1;
			return false;
		}
		else
		{
			$('#postal_code_error').html('');
		}
		
		if ($.trim($('#phone_number').val())=='')
		{
			$('#phone_number_error').html('Phone number is required.');
			$('#phone_number').focus();
			has_error=1;
			return false;
		}
		else
		{
			$('#phone_number_error').html('');
		}
		if ($.trim($('#email').val())=='')
		{
			$('#email_error').html('Email is required.');
			$('#email').focus();
			has_error=1;
			return false;
		}
		else if ($.trim($('#email').val())!='')
		{
			
			if (!isValidEmailAddress($('#email').val()))
			{
				$('#email_error').html('Please enter valid email');
				$('#email').focus();
				has_error=1;
				return false;	
			}
			else
			{
				$.ajax({
			url: "<?php echo base_url(); ?>index.php/signup/check_email",
			data: {email:$('#email').val()},
			async: false,
			success: function(response) {

				var response_array = response.split('[SEPARETOR]');
	
				if (response_array[1]==0) {
				    $("#email_error").html('');
				    $("#email_hidden").val('');
				    //email_status=1;
				    //var email_value=0;
					if ($.trim($('#password').val())=='')
					{
					    $('#password_error').html('Password is required.');
					    $('#password').focus();
					    has_error=1;
					    return false;
					}
					else if (($.trim($('#password').val())!='') && ($('#password').val().length<6))
					{
					    $('#password_error').html('Password should not be less than 6 charecters');
					    $('#password').focus();
					    has_error=1;
					    return false;
					}
					else
					{
						$('#password_error').html('');
					}
					if ($.trim($('#retype_password').val())=='')
					{
					    $('#retype_password_error').html('Confirm Password is required');
					    $('#retype_password').focus();
					    has_error=1;
					    return false;
					}
					else if (($.trim($('#retype_password').val())!='') && ($.trim($('#password').val())!=$.trim($('#retype_password').val())))
					{
					    $('#retype_password_error').html('Password and confirm password should be same');
					    $('#retype_password').focus();
					    has_error=1;
					    return false;
					}
					else
					{
					    $('#retype_password_error').html('');
					}
					if ($.trim($('#security_question_1').val())=='')
					{
						$('#security_question_1_error').html('Security question 1 is required.');
						$('#security_question_1').focus();
						has_error=1;
						return false;
					}
					else
					{
						$('#security_question_1_error').html('');
					}
					if ($.trim($('#security_answer_1').val())=='')
					{
						$('#security_answer_1_error').html('Security answer 1 is required.');
						$('#security_answer_1').focus();
						has_error=1;
						return false;
					}
					else
					{
						$('#security_answer_1_error').html('');
					}
					if ($.trim($('#security_question_2').val())=='')
					{
						$('#security_question_2_error').html('Security question 2 is required.');
						$('#security_question_2').focus();
						has_error=1;
						return false;
					}
					else
					{
						$('#security_question_2_error').html('');
					}
					if ($.trim($('#security_answer_2').val())=='')
					{
						$('#security_answer_2_error').html('Security answer 2 is required.');
						$('#security_answer_2').focus();
						has_error=1;
						return false;
					}
					else
					{
						$('#security_answer_2_error').html('');
					}
					//alert(document.getElementById('terms_condition').value);
					if (document.getElementById('terms_condition').checked)
					{
						$('#terms_condition_error').html('');
						//alert('papai');
						
					}
					else
					{
						$('#terms_condition_error').html('Please agree Terms and Conditions');
						$('#terms_condition').focus();
						has_error=1;
						return false;
					}
				}
				else
				{
				    $("#email_error").html('This email is already registered.');
				//var email_value=1;
				    $("#email_hidden").val('1');
				    has_error=1;
				    return false;
				}
				//return $("#email_hidden").val();
			}
		});
				
				//return false;
				
			}
		}
		else
		{
			$("#email_error").html('');
		}
		//if (email_status==1)
		//{
		//		
		//}
		
		if (has_error==0)
		{
			document.getElementById('registration_form').submit();
		}
	   
 
	}
	
	function check_email(email) {

		//$('#email_format').val('');
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/signup/check_email",
			data: {email:email},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				alert(response_array);
				if (response_array[1]==0) {
				    $("#email_error").html('');
				    $("#email_hidden").val('');
				    //var email_value=0;
				}
				else
				{
				    $("#email_error").html('This email is already registered.');
				//var email_value=1;
				    $("#email_hidden").val('1');
				}
				return $("#email_hidden").val();
			}
		});
			//alert($("#email_hidden").val());
		
	   
	}
	function isValidEmailAddress(emailAddress)
	{
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	};
</script>