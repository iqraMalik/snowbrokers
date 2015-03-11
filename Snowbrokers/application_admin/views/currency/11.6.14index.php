<?php $this->load->view('includes/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<?php
//echo count($currency_id);
//print_r($currency_id);
 //$dataone_fetch= $this->currecymodel->getDatacurrency(1);
 //print_r($dataone_fetch);
?>

<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12"><h4>Currency Management</h4></div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>Add Currency</h4>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
					<div class="span9 with-sidebar" style="margin-bottom: 30px;">
						<div class="container">
							<form class="site_settings_form" action="<?php echo site_url('currency/update_currecy');?>" name="site_settings" id="site_settings" method="post" autocomplete="off">
							<input type="hidden" id="currency_id" value="<?php if($currency_id->id!=''){echo $currency_id->id;}else{echo "";}?>">
								
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label style="font-size: 16px;"><span style="color: red;">*</span>$1=€ <span style="padding-left: 20px;padding-top: 10px;"><input type="text" class="span9 required" label="Euro" id="euro" name="euro" style="width: 50%;" value="<?php if($currency_id->euro!=''){echo $currency_id->euro;}else{echo "";}?>" onkeyup="check_number(this.value,'euro');"></span></label>
								    
								    <div id="euro_error" class="error_div" style="color:red;"></div>
								</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label style="font-size: 16px;"><span style="color: red;">*</span>$1=£ <span style="padding-left: 20px;padding-top: 10px;"><input type="text" class="span9 required" label="pound" name="pound" id="pound" style="width: 50%;" value="<?php if($currency_id->pound!=''){echo $currency_id->pound;}else{echo "";}?>" onkeyup="check_number(this.value,'pound');"></span>
								    </label>
								    
								    <div id="pound_error" class="error_div" style="color:red;"></div>
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
		

		
		
		if (has_error==0)
		{
			document.getElementById("site_settings").submit();
		}
	});
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
function check_number(val,id)
{
    //var re = /[^0-9]/g;
    var error_id = "#"+id+'_error';
    //$(error_id).html("");
    //alert(id);
    //if (val.match(/[^0-9]/g) != null)
    //{
    if (isNaN(val)==true)
    {
	//alert(val);
	$("#"+id).val('');
	
	//alert(error_id);
	$(error_id).html("Only number is required");
    }
    else
    {
	$(error_id).html('');
    }
    
}
</script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>