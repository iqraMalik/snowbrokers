<?php
$this->load->view('includes/header');

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.css" id="theme_base">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.date.css" id="theme_date">
<script src="<?php echo base_url();?>js/res_datepicker/picker.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.date.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.time.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/main.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->


<script type="text/javascript">

$(function () {
        $('#createtaskUser').click(function (e) {
/*client side validation left*/
			var fileName=document.getElementById("certificatesfiles").value;
			
			var ext1 = fileName.substring(fileName.lastIndexOf('.') + 1)
			$('#taskposter_error').html('');
			$('#age_error').html('');
			$('#education_error').html('');
			//$('#certificate_error').html('');
			$('#certificatesfiles_error').html('');
			$('#lisencedriver_error').html('');
			$('#caryes_error').html('');
			$('#transpotation_error').html('');
			$('#securebackground_error').html('');
			$('#category_error').html('');
			$('#avaliblity_error').html('');
			$('#avalibledays_error').html('');
			$('#avalibletime_error').html('');
			$('#prefer_error').html('');
			$('#experience_error').html('');
			$('#yourself_error').html('');
        	
		if($('#taskposter').val()==0)
		{
        		$('#taskposter_error').html('Please Select a Taskposter');
        		//$('#age_error').css('border-color','red');
        		//$('#age_error').focus();
        		return false;
        	}
		if($.trim($('#age').val())=='' || $.trim($('#age').val())==0)
		{
        		$('#age_error').html('Age Please');
        		//$('#age_error').css('border-color','red');
        		//$('#age_error').focus();
        		return false;
        	}
		if($.trim($('#education').val())=='' || $.trim($('#education').val())==0)
		{
        		$('#education_error').html('Education Please');
        		//$('#education').css('border-color','red');
        		//$('#education').focus();
        		return false;
        	}
//		if($.trim($('#certificate').val())=='' || $.trim($('#certificate').val())==0)
//		{
//        		$('#certificate_error').html('Certificate Please');
//        		//$('#certificate').css('border-color','red');
//        		//$('#certificate').focus();
//        		return false;
//        	}
//		if($.trim($('#certificatesfiles').val())=='' || $.trim($('#certificatesfiles').val())==0)
//		{
//        		$('#certificatesfiles_error').html('Certificates files Please');
//        		$('#certificatesfiles').css('border-color','red');
//        		//$('#certificatesfiles').focus();
//        		return false;
//        	}
if(ext1 == "doc" || ext1 == "pdf" || ext1 == "docx")
		{
		   
			document.getElementById("certificatesfiles_error").innerHTML='';
		}
		else if (fileName !='' || fileName != 0) 
		{
		     
			$('#certificatesfiles_error').html('Invalid file (only .pdf or .doc are allowed )');
        		//$('#profile_pic_en').css('border-color','red');
        		//$('#profile_pic_en').focus();
        		return false;
		}
		if($.trim($('#lisencedriver').val())=='')
		{
        		$('#lisencedriver_error').html('Are You a liense driver');
        		//$('#lisencedriver').css('border-color','red');
        		//$('#lisencedriver').focus();
        		return false;
        	}
		if($.trim($('#caryes').val())=='')
		{
        		$('#caryes_error').html('Do you have car?');
        		//$('#caryes').css('border-color','red');
        		//$('#caryes').focus();
        		return false;
        	}
		
		if($.trim($('#transpotation').val())=='' || $.trim($('#transpotation').val())==0)
		{
        		$('#transpotation_error').html('Transpotation Please');
        		//$('#transpotation').css('border-color','red');
        		//$('#transpotation').focus();
        		return false;
        	}
		if($.trim($('#securebackground').val())=='' || $.trim($('#securebackground').val())==0)
		{
        		$('#securebackground_error').html('Secure background Please');
        		//$('#securebackground').css('border-color','red');
        		//$('#securebackground').focus();
        		return false;
        	}
		
						$('#taskcategory_error').html('');
						
		var chk = document.getElementsByName('taskcategory[]');
       var len = chk.length;
           var checked = false;
       for(i=0;i<len;i++) {
            if(chk[i].checked) {
               checked=true;
                           break;
                     }
           }
       if (!checked) {
               document.getElementById('taskcategory_error').innerHTML = "Please Select a category"; 
               return false;
             } 
       				
		
		
		if($.trim($('#avaliblity').val())=='' || $.trim($('#avaliblity').val())==0)
		{
        		$('#avaliblity_error').html('Avaliblity Please');
        		//$('#avaliblity').css('border-color','red');
        		//$('#avaliblity').focus();
        		return false;
        	}
//		if($.trim($('#avalibledays').val())=='' || $.trim($('#avalibledays').val())==0)
//		{
//        		$('#avalibledays_error').html('Days Please');
//        		//$('#avalibledays').css('border-color','red');
//        		//$('#avalibledays').focus();
//        		return false;
//        	}
//		if($.trim($('#avalibletime').val())=='' || $.trim($('#avalibletime').val())==0)
//		{
//        		$('#avalibletime_error').html('Time Please');
//        		//$('#avalibletime').css('border-color','red');
//        		//$('#avalibletime').focus();
//        		return false;
//        	}
		if($.trim($('#prefer').val())=='' || $.trim($('#prefer').val())==0)
		{
        		$('#prefer_error').html('Time Please');
        		//$('#prefer').css('border-color','red');
        		//$('#prefer').focus();
        		return false;
        	}
		if($.trim($('#experience').val())=='' || $.trim($('#experience').val())==0)
		{
        		$('#experience_error').html('Experience Please');
        		//$('#experience').css('border-color','red');
        		//$('#experience').focus();
        		return false;
        	}
		if($.trim($('#yourself').val())=='' || $.trim($('#yourself').val())==0)
		{
        		$('#yourself_error').html('Tell me about Self');
        		//$('#yourself').css('border-color','red');
        		//$('#yourself').focus();
        		return false;
        	}
		
		$("#new_user_new").submit();
		return true;
        	
        });
    });
function check_email_en(email) {
	if (email.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/user/check_email",
			data: {email:email},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				if (response_array[1]==0) {
					$("#email_en_error").html('')
					$("#email_hidden_en").val('1')
				}
				else
				{
					$("#email_en_error").html('Email is not available.')
					$("#email_hidden_en").val('0')
				}
			}
		})
	}
}

function check_email(email) {
	if (email.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/user/check_email",
			data: {email:email},
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


function form_fill(value)
{
   //alert("assas");
    if (value == 0) {
	//alert("sadsd");
	//document.getElementsByClassName("container").style.visibility="hidden";
	$('.container').hide();
	$('.containernew').show();
    }
    else {
	$('.container').show();
	$('.containernew').hide();
    }
    }
    function form_fill1(value)
{
   //alert("assas");
    if (value == 1) {
	//alert("sadsd");
	//document.getElementsByClassName("container").style.visibility="hidden";
	$('#daytime').hide();
	
    }
    else {
	$('#daytime').show();
	
    }
    }
    function form_fill2(value)
{
   
    if (value == 16) {
	if($('#taskcategory'+value).attr('checked'))
	{
	$('#addothercaegory').show();
	}
	else{
	   $('#addothercaegory').hide(); 
	}
    }
    else {
	
	$('#addothercaegory').hide();
	
    }
    }
function testcheck()
{
    if ($("#category").prop("checked"))
        alert("first button checked");
    else
        alert("none checked");
}
</script>



<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Taskaroo Management</h4>
        </div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>Add Taskaroo ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
					</div>
				</div>
				
<!-- taskaroo-->
<div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
			    <div class="row-fluid form-wrapper">
				<!-- left column -->
				<div class="span9 with-sidebar">
					
						<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('user/insert_taskaroo');?>" name="new_user_new" id="new_user_new" method="post" autocomplete="off">
						<input type="hidden" name="usertype" id="usertype" value="1">
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
							<label><span style="color: red;">*</span>Taskposter:</label>
							<div class="ui-select">
							<select name="taskposter" id="taskposter">
							<option value="0">Select Taskposter</option>
							<?php
							$taskposter=$this->modeladmin->getalltaskposter();
							if($taskposter >0)
							{
							    foreach($taskposter as $tasky)
							    {
								$firstname=$tasky->first_name;
								$lastname=$tasky->last_name;
							?>
							<option value="<?php echo $tasky->id;?>"><?php echo $firstname." ".$lastname; ?></option>
							<?php }} ?>   
							</select>
							</div>
							<div id="education_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Date Of Birth:</label>
								<input type="text" class="span9" name="age" id="age" style="width: 50%;" value="<?php echo set_value('age');?>">
								<div id="age_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Country:</label>
								<input type="text" class="span9" name="country" id="country" style="width: 50%;" value="<?php echo set_value('country');?>">
								<div id="country_error" class="error_div" style="color:red;"><?php echo form_error('country'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>State:</label>
								<input type="text" class="span9" name="state" id="state" style="width: 50%;" value="<?php echo set_value('state');?>">
								<div id="state_error" class="error_div" style="color:red;"><?php echo form_error('state'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>City:</label>
								<input type="text" class="span9" name="city" id="city" style="width: 50%;" value="<?php echo set_value('city');?>">
								<div id="city_error" class="error_div" style="color:red;"><?php echo form_error('city'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Zip:</label>
								<input type="text" class="span9" name="zip" id="zip" style="width: 50%;" value="<?php echo set_value('zip');?>">
								<div id="zip_error" class="error_div" style="color:red;"><?php echo form_error('zip'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Apartment:</label>
								<input type="text" class="span9" name="apartment" id="apartment" style="width: 50%;" value="<?php echo set_value('apartment');?>">
								<div id="apartment_error" class="error_div" style="color:red;"><?php echo form_error('apartment'); ?></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
							<label><span style="color: red;">*</span>Education:</label>
							<div class="ui-select">
							    <select name="education" id="education">
							<option value="0">Select Education</option>
							    <option value="1">Secendory</option>
							    <option value="2">College</option>
							    <option value="3">University</option>
							    </select>
							</div>
							<div id="education_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Other Diploma and Certificates:</label>
								<textarea name="certificate" id="certificate" style="width: 500px;"></textarea>
								<div id="certificate_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							<label>Attach Certificates:</label>
					<input type="file" class="span9" name="certificatesfiles" id="certificatesfiles" style="width: 50%;" value="<?php echo set_value('certificatesfiles'); ?>">
				    <div id="certificatesfiles_error" style="color:red;"></div>
                                </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Are You a lisense Driver:</label>
								<input type="radio" name="lisencedriver" id="lisencedriver" value="1" checked="cheaked"><span style="padding-left: 10px;padding-right: 10px;">yes</span>
								<input type="radio" name="lisencedriver" id="lisencedriver" value="0"><span style="padding-left: 10px;padding-right: 10px;">No</span>
								<div id="lisencedriver_error" class="error_div" style="color:red;"></div>
							</div>
							
							   <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>If yes Do you have a car:</label>
								<span style="padding-left: 10px;padding-right: 10px;">yes</span><input type="radio" name="caryes" id="caryes" value="1" checked="cheaked">
								<span style="padding-left: 10px;padding-right: 10px;">No</span><input type="radio" name="caryes" id="caryes" value="0">
								<div id="caryes_error" class="error_div" style="color:red;"></div>
							</div> 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
							<label><span style="color: red;">*</span>Transpotaton:</label>
							<div class="ui-select" style="width: 200px;">
							    <select name="transpotation" id="transpotation">
							    <option value="0">Select Transpotation</option>
							    <option value="1">City transit</option>
							    <option value="2">Car</option>
							    </select>
							</div>
							<div id="transpotation_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
							<label><span style="color: red;">*</span>Do you have secure Background cheak:</label>
							<input type="radio" name="securebackground" id="securebackground" value="1" checked="cheaked"><span style="padding-left: 10px;padding-right: 10px;">yes</span>
								<input type="radio" name="securebackground" id="securebackground" value="0"><span style="padding-left: 10px;padding-right: 10px;">No</span>
								<div id="securebackground_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
							<label><span style="color: red;">*</span>Category:</label>
							<?php $dataone_fetch = $this->modeladmin->getDatataskcategory();
							//print_r($dataone_fetch);
							foreach($dataone_fetch as $taskcategory)
							{
							?>
						<input type="checkbox" name="taskcategory[]" id="taskcategory<?php echo $taskcategory->id; ?>" value="<?php echo $taskcategory->id; ?>" onClick="form_fill2(this.value);"><span style="padding-left: 10px;padding-right: 10px;"><?php echo $taskcategory->title; ?></span>
							<?php }?>
							<div id="taskcategory_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div style="display: none;" id="addothercaegory">
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							    <label><span style="color: red;">*</span>Other Category:</label>
								<input type="text" class="span9" name="othercategory" id="othercategory" style="width: 50%;" value="">
								<div id="othercategory_error" class="error_div" style="color:red;"></div>
							</div>	
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Avaliblity:</label>
								
<input type="radio" name="avaliblity" id="avaliblity" value="1" checked="cheaked" onClick="form_fill1(this.value);"><span style="padding-left: 10px;padding-right: 10px;">Any Time (Week days and Weekend)</span>
					    <input type="radio" name="avaliblity" id="avaliblity" value="2" onClick="form_fill1(this.value);"><span style="padding-left: 10px;padding-right: 10px;">Days Of Week (M,T,W,T,F,S,S)</span>
								<div id="avaliblity_error" class="error_div" style="color:red;"></div>
							</div>
							<div id="daytime" style="display: none;">
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Avaliblity days:</label>
								<input type="checkbox" name="avalibledays[]" id="avalibledays" value="1" ><span style="padding-left: 10px;padding-right: 10px;">Monday</span>
								<input type="checkbox" name="avalibledays[]" id="avalibledays" value="2"><span style="padding-left: 10px;padding-right: 10px;">Tuesday</span>
								<input type="checkbox" name="avalibledays[]" id="avalibledays" value="3"><span style="padding-left: 10px;padding-right: 10px;">Wednesday</span>
								<input type="checkbox" name="avalibledays[]" id="avalibledays" value="4"><span style="padding-left: 10px;padding-right: 10px;">Thusday</span>
								<input type="checkbox" name="avalibledays[]" id="avalibledays" value="5"><span style="padding-left: 10px;padding-right: 10px;">Friday</span>
								<input type="checkbox" name="avalibledays[]" id="avalibledays" value="6"><span style="padding-left: 10px;padding-right: 10px;">Satday</span>
								<input type="checkbox" name="avalibledays[]" id="avalibledays" value="7"><span style="padding-left: 10px;padding-right: 10px;">Sunday</span>
								<div id="avalibledays_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Avaliblity time:</label>
								<input type="checkbox" name="avalibletime[]" id="avalibletime" value="1" ><span style="padding-left: 10px;padding-right: 10px;">Morning</span>
								<input type="checkbox" name="avalibletime[]" id="avalibletime" value="2"><span style="padding-left: 10px;padding-right: 10px;">Afternoon</span>
								<input type="checkbox" name="avalibletime[]" id="avalibletime" value="3"><span style="padding-left: 10px;padding-right: 10px;">Evening</span>
								<input type="checkbox" name="avalibletime[]" id="avalibletime" value="4"><span style="padding-left: 10px;padding-right: 10px;">Night</span>
								<div id="avalibletime_error" class="error_div" style="color:red;"></div>
						    </div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>I prefer:</label>
								<input type="checkbox" name="prefer[]" id="prefer" value="1" checked="cheaked">
								<span style="padding-left: 10px;padding-right: 10px;">In Person</span><input type="checkbox" name="prefer[]" id="prefer" value="2"><span style="padding-left: 10px;padding-right: 10px;">Work From home</span>
								<input type="checkbox" name="prefer[]" id="prefer" value="3"><span style="padding-left: 10px;padding-right: 10px;">Both</span>
								<div id="prefer_error" class="error_div" style="color:red;"></div>
						    </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Experience:</label>
								<textarea name="experience" id="experience" style="width: 500px;"></textarea>
								<div id="experience_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Tell me about your self:</label>
								<textarea name="yourself" id="yourself" style="width: 500px;"></textarea>
								<div id="yourself_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
							<label>Status:</label>
							<div class="ui-select">
							    <select name="status" id="status">
							    <option value="1" <?php echo set_select('status','1');?>>Active</option>
							    <option value="0" <?php echo set_select('status','0');?>>Inactive</option>
							    </select>
							</div>
							</div>
							<div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="create Taskaroo" class="btn-glow primary" id="createtaskUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('taskaroo/index'); ?>">Cancel</a>
							</div>
							</div>
							
						</form> <!-- taniya-->
					</div>
			</div>
			</div>
		<!--</div>-->
 <!--   </div>
</div>
-->
<script type="text/javascript">

$('#age').pickadate({
// An integer (positive/negative) sets it relative to today.
								
// `true` sets it to today. `false` removes any limits.
max: 1,
selectYears: true,
selectMonths: true,
format: "yyyy-mm-dd",
})
</script>
<script>

</script>
<!-- taskaroo-->
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>