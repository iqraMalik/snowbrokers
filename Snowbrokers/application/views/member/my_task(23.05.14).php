
<section class="innerpage_page">
	
	<div class="container">
		<div class="row">
			<?php $this->load->view('sidebarblog/sidebar_blog_account.php')?>
			
			<div class="col-md-6" style="margin-left:65px">
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
					<h4>MY Posted Task</h4>
					<div class="frst_nm_rw clearfix" style="background-color: #FFFFFF; margin-left: 32px; width: 87%;">
					<?php
					if(count($task_details)>0)
					{
						$i=1;
						foreach($task_details as $task)
						{
							$encrypt_id=urlencode(base64_encode($task->id));
							if($i==count($task_details))
							{
								$bottom_style="border-bottom:none !important";
							}
							else
							{
								$bottom_style="border-bottom:1px solid #C6C6C6";
							}
						?>
						<div style="<?php echo $bottom_style;?>;margin-left: 21px;margin-right: 21px;margin-top: 16px;">
							<div style="line-height: 97px;">
								<label style="font-weight:bold"><?php echo $i.".".$task->task_title;?></label>
								<label>
									Task Complete Status : <?php if($task->task_complete_status==0){echo "Not Completed";}else{echo "Completed";}?>
								</label>
								<label>
									Payment Status : <?php if($task->status==0){echo "Pending";}else{echo "Completed";}?>
								</label>
							</div>
							<?php
							if($task->task_complete_status==0)
							{
							?>
							<div style="width: 30%; margin-bottom: 29px;" class="post_title categories"><a href="<?php echo base_url().'index.php/post_task/review/'.$encrypt_id;?>" style="color:#ffffff;">Update Task</a></div>
							<?php
							}
							?>
						</div>
						<?php
						
							$i++;	
						}
					}
					else
					{
						echo "No Task Posted";
					}
					?>
					</div>
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
			url: "<?php echo base_url(); ?>index.php/signup/check_email_update",
			data: {email:$('#email').val(),user_id:$('#user_id').val()},
			async: false,
			success: function(response) {

				var response_array = response.split('[SEPARETOR]');
	
				if (response_array[1]==0) {
				    $("#email_error").html('');
				    $("#email_hidden").val('');
				    //email_status=1;
				    //var email_value=0;
					if (($('#password').val()!='') && ($('#facebook_id').val()==''))
					{
						if ($('#password').val().length<6)
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
					}
					if ($('#image').val()!='')
					{
					   var image_type=$('#image').val();
					   var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
					   if(!re.exec(image_type))
					   {
						$("#image_error").html("Only .jpg, .png, .jpeg, .gif are allowed");
						has_error=1;
						return false;
					   }
					   else
					   {
						$("#image_error").html('');
					   }
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
	
	
	function isValidEmailAddress(emailAddress)
	{
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	};
</script>