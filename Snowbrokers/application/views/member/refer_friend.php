<?php
//echo $this->session->userdata('user_id')."$$$$";
$dataone_fetch=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));
//print_r($dataone_fetch);
$data=$dataone_fetch[0];
?>
<section class="innerpage_page">
	
	<div class="container">
		<div class="row">
			<?php $this->load->view('sidebarblog/sidebar_blog_account.php')?>
			
			<div class="col-md-9 col-sm-8" style="">
				<div class="sgn_up_out myacnt_lft">
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
                              <!--<select name="friends" id="friends" class="span4 field-box">
									<option value="">Friendlist</option>
									<?php
//                                                                        $CountryData=$this->modelrefer->friends();
//									foreach ($CountryData as $dataone):
									?>
									<option value="<?php //echo $dataone->id; ?>"><?php// echo $dataone->refer_mail;?> </option>                                                            <?php// endforeach; ?>
								</select>-->
					<h4>REFER FRIEND</h4>
					<form class="spcing_otr" id="registration_form" name="registration_form" method="post" enctype="multipart/form-data" action="<?php echo site_url('refer/refer_mail')?>" autocomplete="off">
					<input type="hidden" id="user_id" name="user_id" value="<?php echo $data->id;?>">
					<input type="hidden" id="email_hidden_error" name="email_hidden_error" value="">
					<input type="hidden" id="email_format" name="email_format" value=1>
					<input type="hidden" id="email_hidden" name="email_hidden" value="">
					<!--<input type="hidden" id="facebook_id" name="facebook_id" value="<?php echo $data->facebook_id;?>">-->
					<input type="hidden" id="pre_image" name="pre_image" value="<?php echo $data->profile_image;?>">
					
						<p>Refer your friend by sending a mail.If your friend post a task you will get $10.If complete the task you will get more $10. </p>
						
						<div class="frst_nm_rw clearfix">
							<input type="text" class="txt_bx_eml" id="email" name="email" placeholder="Email" value=""/>
						</div>
						<div id="email_error" style="color: red;margin-bottom: 20px;"></div>
						<div class="frst_nm_rw clearfix">
                                                <input type="text" class="txt_bx_ptlcd" id="message" name="message" placeholder="Please type your message,we will send it to your friend" value=""/>
                                                </div>
						<span class="sgnup">
							<input type="button" class="sgn_btu" value="Send" onclick="check_validation();"/>
						</span>
						
						
						
					</form>
						
				</div>
			</div>
			
		</div>
	</div>
</section>
<script>
	function check_validation()
	{
		var has_error=0;
		
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
                                $("#email_error").html('');
                        }
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