<?php $this->load->view('includes/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<script type="text/javascript">
    function exefunction()
    {
	var lfckv = document.getElementById("site_offline").checked;
	//alert(lfckv);
	if (lfckv == true)
	{
	    $('#site_offline_hd').val('1');
	    //var val = $('#site_offline_hd').val();
	    //alert(val);
	}
	else
	{
	    $('#site_offline_hd').val('0');
	}
    }
</script>

<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12"><h4>Settings</h4></div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>Site Settings</h4>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
					<div class="span9 with-sidebar" style="margin-bottom: 30px;">
						<div class="container">
							<form class="site_settings_form" action="<?php echo site_url('site_settings/update_settings');?>" name="site_settings" id="site_settings" method="post" autocomplete="off" enctype="multipart/form-data">
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Site Name :</label>
								    <input type="text" class="span9 required" label="Site Name" name="site_settings[site_name]" id="site_name" style="width: 50%;" value="<?php echo $settings['site_name']; ?>">
								    <div id="site_name_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Admin Email :</label>
								    <input type="text" class="span9 required" label="Admin Email" name="site_settings[admin_email]" validation_type="email" id="admin_email" style="width: 50%;" value="<?php echo $settings['admin_email']; ?>">
								    <div id="admin_email_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Phone Number :</label>
								    <input type="text" class="span9 required" label="Phone Number" name="site_settings[phone_number]" id="phone_number" style="width: 50%;" value="<?php if(!empty($settings['phone_number'])){echo $settings['phone_number'];}else{echo "";} ?>">
								    <div id="phone_number_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Site Email :</label>
								    <input type="text" class="span9 required" label="Site Email" name="site_settings[site_email]" id="site_email" style="width: 50%;" value="<?php if(!empty($settings['site_email'])){echo $settings['site_email'];}else{echo "";} ?>">
								    <div id="site_email_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Meta Keyword :</label>
								    <input type="text" class="span9 required" label="Meta Keyword" name="site_settings[meta_keyword]" id="meta_keyword" style="width: 50%;" value="<?php echo $settings['meta_keyword']; ?>">
								    <div id="meta_keyword_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Meta Title :</label>
								    <input type="text" class="span9 required" label="Meta Title" name="site_settings[meta_title]" id="meta_title" style="width: 50%;" value="<?php echo $settings['meta_title']; ?>">
									<div id="meta_title_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Meta Description :</label>
								    <input type="text" class="span9 required" label="Meta Description" name="site_settings[meta_description]" id="meta_description" style="width: 50%;" value="<?php echo $settings['meta_description']; ?>">
									<div id="meta_description_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Admin Result per Page :</label>
								    <input type="text" class="span9 required" label="Admin Result Per Page" name="site_settings[admin_resultsPerPage]" id="admin_resultsPerPage" style="width: 50%;" value="<?php echo $settings['admin_resultsPerPage']; ?>">
									<div id="admin_resultsPerPage_error" class="error_div" style="color:red;"></div>
								</div>
								
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Facebook :</label>
								    <input type="text" class="span9 required" label="Facebook" name="site_settings[Facebook]" id="Facebook" style="width: 50%;" value="<?php if(!empty($settings['Facebook'])){echo $settings['Facebook'];}else{echo "";} ?>">
								    <div id="facebook_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Twitter :</label>
								    <input type="text" class="span9 required" label="Twitter" name="site_settings[Twitter]" id="Twitter" style="width: 50%;" value="<?php if(!empty($settings['Twitter'])){echo $settings['Twitter'];}else{echo "";} ?>">
								    <div id="Twitter_error" class="error_div" style="color:red;"></div>
								</div>
								
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="padding-right: 20px;">Take Site Offline :</span>
								    <input type="hidden" class="span9" name="site_settings[site_offline]" id="site_offline_hd" value=""/>
								    <input type="checkbox"  label="Site Offline" name="site_offline[]" id="site_offline" value="site_offline" <?php if($settings['site_offline']==1) {echo "checked";}?> onclick="exefunction()"/>
								    </label>
								   
								    <div id="site_offline_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label>Offline Reason :</label>
								    <textarea class="span9 ckeditor" label="Offline Reason (in english)" name="site_settings[offline_reason]" id="offline_reason"><?php echo $settings['offline_reason'];?></textarea>
								    <div id="offline_reason_error" class="error_div" style="color:red;"></div>
								</div>
								
								
								<div class="row-fluid head">
								    <div class="span12">
									    <h4>Payment Settings</h4>
								    </div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Paypal :</label>
								    <input type="hidden" name="site_settings[payment_paypal]" id="payment_paypal_hd" value="<?php echo $settings['payment_paypal']; ?>">
								    <div style="padding-bottom:15px;">
									<input type="radio" name="site_settings[payment_paypal]" id="paypal_active_en" value='1' onclick="paypal_data(1);" <?php if($settings['payment_paypal']=='1'){echo "checked";}?>>&nbsp;&nbsp;Enable &nbsp;&nbsp;&nbsp;
									<input type="radio" name="site_settings[payment_paypal]" id="paypal_active_ds" value='0' onclick="paypal_data(0);" <?php if($settings['payment_paypal']=='0'){echo "checked";}?>>&nbsp;&nbsp;Disable &nbsp;&nbsp;&nbsp;
								    </div>
								    <div id="paypal_active_error" class="error_div" style="color:red;"></div>
								</div>
								<div id="paypal_details">
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Paypal Mode :</label>
								    <div style="padding-bottom:15px;">
									<input type="radio" name="site_settings[paypal_url]" id="paypal_url_en" value='1' <?php if($settings['paypal_url']=='1'){echo "checked";}?>>&nbsp;&nbsp;Live Mode &nbsp;&nbsp;&nbsp;
									<input type="radio" name="site_settings[paypal_url]" id="paypal_url_ds" value='0' <?php if($settings['paypal_url']=='0'){echo "checked";}?>>&nbsp;&nbsp;Test Mode &nbsp;&nbsp;&nbsp;
								    </div>
								    <div id="paypal_active_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;" id="paypal_details_email">
								    <label><span style="color: red;">*</span>Paypal Email :</label>
								    <input type="text" class="span9 required" label="Paypal Email" name="site_settings[paypal_email]" id="paypal_email" validation_type="email" style="width: 50%;" value="<?php echo $settings['paypal_email']; ?>">
								    <div id="paypal_email_error" class="error_div" style="color:red;"></div>
								</div>
								
								<!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;" id="paypal_details_email">
								    <label><span style="color: red;">*</span>Amount For Per Bids :</label>
								    <input type="text" class="span9 required" label="site_income_per_task" name="site_settings[site_income_per_task]" id="site_income_per_task"  style="width: 50%;" value="<?php echo $settings['site_income_per_task']; ?>">
								    <div id="site_income_per_task_error" class="error_div" style="color:red;"></div>
								</div>-->
								
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Creditcard Payment :</label>
								    <input type="hidden" name="site_settings[payment_creditcard]" id="payment_creditcard_hd" value="<?php echo $settings['payment_creditcard']; ?>">
								    <div style="padding-bottom:15px;">
									<input type="radio" name="site_settings[payment_creditcard]" id="payment_creditcard_en" value='1' onclick="credit_data(1);" <?php if($settings['payment_creditcard']=='1'){echo "checked";}?>>&nbsp;&nbsp;Enable &nbsp;&nbsp;&nbsp;
									<input type="radio" name="site_settings[payment_creditcard]" id="payment_creditcard_ds" value='0' onclick="credit_data(0);" <?php if($settings['payment_creditcard']=='0'){echo "checked";}?>>&nbsp;&nbsp;Disable &nbsp;&nbsp;&nbsp;
								    </div>
								    <div id="payment_creditcard_error" class="error_div" style="color:red;"></div>
								</div>
								<div id="creditcard_details">
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Creditcard Mode :</label>
								    <div style="padding-bottom:15px;">
									<input type="radio" name="site_settings[creditcard_url]" id="credit_url_en" value='1' <?php if($settings['creditcard_url']=='1'){echo "checked";}?>>&nbsp;&nbsp;Live Mode &nbsp;&nbsp;&nbsp;
									<input type="radio" name="site_settings[creditcard_url]" id="credit_url_ds" value='0' <?php if($settings['creditcard_url']=='0'){echo "checked";}?>>&nbsp;&nbsp;Test Mode &nbsp;&nbsp;&nbsp;
								    </div>
								    <div id="paypal_active_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Login name :</label>
								    <input type="text" class="span9 required" label="Creditcard Login name" name="site_settings[loginname_creditcard]" id="cr_login_name" style="width: 50%;" value="<?php echo $settings['loginname_creditcard']; ?>">
								    <div id="cr_login_name_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Authorization key :</label>
								    <input type="text" class="span9 required" label="Creditcard Authorization key" name="site_settings[authorization_key]" id="cr_auth_key" style="width: 50%;" value="<?php echo $settings['authorization_key']; ?>">
								    <div id="cr_auth_key_error" class="error_div" style="color:red;"></div>
								</div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							         <label>Home page Text for user section :</label>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label>upload lower text :</label>
						    <textarea class="span9 ckeditor" label="upload lower text" name="site_settings[upload_lower_text]" id="upload_lower_text"><?php echo $settings['upload_lower_text'];?></textarea>
								    <div id="upload_lower_text_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label>upload lower text :</label>
						    <textarea class="span9 ckeditor" label="Add Banner text" name="site_settings[Add_Banner_text]" id="Add_Banner_text"><?php echo $settings['Add_Banner_text'];?></textarea>
								    <div id="Add_Banner_text_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Google+ :</label>
								    <input type="text" class="span9 required" label="Google" name="site_settings[Google]" id="Google" style="width: 50%;" value="<?php if(!empty($settings['Google'])){echo $settings['Google'];}else{echo "";} ?>">
								    <div id="Google_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Youtube :</label>
								    <input type="text" class="span9 required" label="Youtube" name="site_settings[Youtube]" id="Youtube" style="width: 50%;" value="<?php if(!empty($settings['Youtube'])){echo $settings['Youtube'];}else{echo "";} ?>">
									<div id="Youtube_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>linkedin :</label>
								    <input type="text" class="span9 required" label="LinkedIn" name="site_settings[LinkedIn]" id="LinkedIn" style="width: 50%;" value="<?php if(!empty($settings['LinkedIn'])){echo $settings['LinkedIn'];}else{echo "";} ?>">
									<div id="linkdin_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>Instagram :</label>
								    <input type="text" class="span9 required" label="instagram" name="site_settings[Instagram]" id="Instagram" style="width: 50%;" value="<?php if(!empty($settings['Instagram'])){echo $settings['Instagram'];}else{echo "";} ?>">
									<div id="Instagram_error" class="error_div" style="color:red;"></div>
								</div>
								<!--image -->
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label><span style="color: red;">*</span>footer image :</label>
								   <input type="file"  class="span6" name="myphoto" value=""  id="myphoto"  />
									<div id="photo_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <?php
								    $dataone_fetch_image = $this->site_settingsmodel->image();
								    ?>
								    <img src="<?php echo GET_LOGO_PATH."images/footerimage/thumbnail/".$dataone_fetch_image;?>">
								</div>
								<div class="span11 field-box actions" style="margin-top: 20px;">
								    <input type="button" value="Submit" class="btn-glow primary" id="createUser">
								    <span>OR</span>
								   <!-- <input type="reset" value="Cancel" class="btn-glow primary" style="text-decoration: none">-->
								    <a class="btn-glow primary" href="<?php echo site_url('dashboard/index'); ?>">Cancel</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	$('#createUser').click(function (e) {
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
				has_error++
			}
			else if (element_validation_type=='email' && !isValidEmailAddress(element_value)) {
				error_div.html('Please provide a valid email.')
				has_error++
			}
		})
		
		//if (isNaN(document.getElementById("site_income_per_task").value)) {
		//     document.getElementById('site_income_per_task_error').innerHTML="Please put numeric value";
		//     has_error++
		//}
		//else{
		//    document.getElementById('site_income_per_task_error').innerHTML="";
		//}
		
		if (document.getElementById("Facebook").value.search(/\S/)!=-1) {
		    var val=document.getElementById("Facebook").value;
		    var re = /((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)/i;
		    if (!re.test(val))
		    {
			   document.getElementById('Facebook_error').innerHTML="Please write proper url";
			   has_error++;
			   
			   
		    }
		    
		}
		if (document.getElementById("Twitter").value.search(/\S/)!=-1) {
		    var val=document.getElementById("Twitter").value;
		    var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;
		    if (!re.test(val))
		    {
			   document.getElementById('Twitter_error').innerHTML="Please write proper url";
			   has_error++;
			   
			   
		    }
		    
		}
		if (document.getElementById("Google").value.search(/\S/)!=-1) {
		    var val=document.getElementById("Google").value;
		    var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;
		    if (!re.test(val))
		    {
			   document.getElementById('Google_error').innerHTML="Please write proper url";
			   has_error++;
			   
			   
		    }
		    
		}
		if (document.getElementById("LinkedIn").value.search(/\S/)!=-1) {
		    var val=document.getElementById("LinkedIn").value;
		    var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;
		    if (!re.test(val))
		    {
			   document.getElementById('LinkedIn_error').innerHTML="Please write proper url";
			   has_error++;
			   
			  
		    }
		    
		}
		if (document.getElementById("Youtube").value.search(/\S/)!=-1) {
		    var val=document.getElementById("Youtube").value;
		    var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;
		    if (!re.test(val))
		    {
			   document.getElementById('Youtube_error').innerHTML="Please write proper url";
			   has_error++;
			   
			  
		    }
		    
		}
		if (document.getElementById("Instagram").value.search(/\S/)!=-1) {
		    var val=document.getElementById("Instagram").value;
		    var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;
		    if (!re.test(val))
		    {
			   document.getElementById('Instagram_error').innerHTML="Please write proper url";
			   has_error++;
			   
			  
		    }
		    
		}
		/*if (document.getElementById("photo").value.search(/\S/)!=-1) {
		    var val=document.getElementById("photo").value;
		    var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;
		    if (!re.test(val))
		    {
			   document.getElementById('photo_error').innerHTML="Please write proper url";
			   has_error++;
			   
			  
		    }
		    
		}*/
		if (has_error==0)
		{
			document.getElementById("site_settings").submit();
		}
	});
});
function check_username(username,userid) {
	if (username.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/user/check_username_edit",
			data: {username:username,userid:userid},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				if (response_array[1]==0) {
					$("#username_error").html('')
					$("#username_hidden").val('1')
				}
				else
				{
					$("#username_error").html('Username is not available.')
					$("#username_hidden").val('0')
				}
			}
		})
	}
}
function check_email(email,userid) {
	if (email.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/user/check_email_edit",
			data: {email:email,userid:userid},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				if (response_array[1]==0) {
					$("#email_error").html('')
					$("#email_hidden").val('1')
				}
				else
				{
					$("#email_error").html('Email is not available.')
					$("#email_hidden").val('0')
				}
			}
		})
	}
}
function isValidEmailAddress(emailAddress)
{
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	return pattern.test(emailAddress);
};
CKEDITOR.replace('offline_reason',
{
       height: 250,
       width: 600
});
CKEDITOR.replace('upload_lower_text',
{
       height: 250,
       width: 600
});
CKEDITOR.replace('Add_Banner_text',
{
       height: 250,
       width: 600
});
</script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>