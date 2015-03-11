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
$(document).ready(function () {
   
	$('#createUser').click(function (e) {
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
			 var email=document.getElementById('email').value;
			 if (email.search(/\S/)==-1)
			 {
				var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
				if (!reg.test(email))
				{
				       
				//document.getElementById('emailvalid_error').innerHTML='Enter valid email..';
				//document.getElementById('email').focus();
				has_error++;
				
				}
				npass  =document.getElementById('password').value;
				cpass  =document.getElementById('confirm_password').value;
				if (npass != cpass) {
				    document.getElementById('confirm_password_error').innerHTML='Password missmatch';
				    has_error++;
				}

				var product_type= $('#product_type').val();
				if (product_type==0)
				{
				$('#product_type_error').html('Please select a product type');
				has_error++;
				}
				var country=$('#country').val();
				if (country==0)
				{
				$('#country_error').html('Please select a country');
				has_error++;
				}
			 }
			 
			var check=document.getElementsByName('product_type[]');
			var len=check.length;
			var product_type_arr=[];
			for (i=0;i<check.length;i++)
			{	
				if (check.item(i).checked==true)
				{
					product_type_arr.push(check[i].value);
				}
			}
			
			if (product_type_arr.length==0)
			{
				document.getElementById('product_type_error').innerHTML='Product type is required';
				has_error++;
			}
			
			//alert(product_type_arr.length);
			//exit();
			$.ajax({
	
				url : '<?php echo base_url().'index.php/user/email';?>',
				type:'post',
				cache:false,
				data: {'emailvalid':email},
				success:function(response)
				{
					if (response==1)
					{
						
						  document.getElementById('hidden').value=1;
					 
					    
					}
					else
					{
						 document.getElementById('hidden').value=0;
					  
					  
					}
				  
				}
			    });
			 
					var hidden=document.getElementById('hidden').value;
					if (hidden==1)
					{
						has_error=hidden;
						document.getElementById('email').focus();
						$('#emailid_error').html('<span style="color:#FF0000;">Email Already Exists!</span>');
					}
			
					if(has_error==0)
					{
					   document.getElementById('prod_type_val').value=product_type_arr;
					    $('#new_user').submit();
					}
						
		
	});
});

function isValidEmailAddress(emailAddress)
{
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	return pattern.test(emailAddress);
};
function Select_state(country_id)
{
     $.ajax({
                    url: "<?php echo base_url(); ?>index.php/user/Select_state",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
                      
                           $('#state').html(response);
                            
                           }
                          
                          
                    
                })
}
function go_video_type(val)
{
    document.getElementById('my_video_url').value="";
    document.getElementById('image').value="";

    if (val==2)
    {
	    document.getElementById('video').style.display="";
	    document.getElementById('video_url').style.display="none";
    }
    else
    {
	    document.getElementById('video').style.display="none";
	    document.getElementById('video_url').style.display="";
    }
}
function pageLoad()
{
    document.location.href="<?php echo site_url('user/adduser');?>";
}
function validateEmail(email)
{
	var has_error;  
	var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if (!reg.test(email))
	{
	       
	document.getElementById('emailvalid_error').innerHTML='Enter valid email..';
	document.getElementById('email').focus();
	}
	else
	document.getElementById('emailvalid_error').innerHTML='';
 
 }
function email_valid(email){
	
	
	 $.ajax({
                        url : '<?php echo base_url().'index.php/user/email';?>',
                        type:'post',
                        cache:false,
                        data: {'emailvalid':email},
                        success:function(response)
                        {
							if (response==1)
							{
							  $('#emailid_error').html('<span style="color:#FF0000;">Email Already Exists!</span>');
							  
							  document.getElementById('hidden').value=1;
							}
							else
							{
							  $('#emailid_error').html('<span style="color:green;">Email Available!</span>');
							  
							  document.getElementById('hidden').value=0;
							  
							}
			  
                        }
		    });
	
	
}
</script>



<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>User Management</h4>
        </div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>Add User ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
					</div>
				</div>
				<div class="row-fluid filter-block">
				   <div class="pull-right">
						<a class="btn-flat new-product" href="<?php echo site_url('user/index'); ?>">< View List</a>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
				<!-- left column -->
				<div class="span9 with-sidebar">
					<div class="container">
						<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('user/insert_users');?>" name="new_user" id="new_user" method="post" autocomplete="off">
						
							<input type="hidden" name="email_hidden" id="email_hidden" value="">
							<input type="hidden" name="password_length" id="password_length" value="">
							<input type="hidden" name="prod_type_val" id="prod_type_val" value="">
							<!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

							    <label><span style="color: red;">*</span>Gender :</label>
							    <div style="padding-bottom:15px;">
								<input type="radio" name="gender_type" id="gender_types1" value='1' >&nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender_type" id="gender_types2" value='2' >&nbsp;&nbsp;Female &nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender_type" id="gender_types3" value='3'>&nbsp;&nbsp;Other wonderful options
							    </div>
							</div>-->
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>First Name:</label>
								<input type="text" class="span9 required" label="First Name" name="first_name" id="first_name" style="width: 50%;" value="<?php echo set_value('first_name');?>">
								<div id="first_name_error" class="error_div" style="color:red;"><?php echo form_error('first_name'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Last Name:</label>
								<input type="text" class="span9 required" label="Last Name" name="last_name" id="last_name" style="width: 50%;" value="<?php echo set_value('last_name');?>">
								<div id="last_name_error" class="error_div" style="color:red;"><?php echo form_error('last_name'); ?></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Email:</label>
								<input type="email" class="span9 required" label="Email" validation_type="email" name="email" id="email" style="width: 50%;" onblur="validateEmail(this.value)" onblur="email_valid(this.value)" onkeyup="email_valid(this.value)" value="<?php echo set_value('email');?>">
								<div id="email_error" class="error_div" style="color:red;"><?php echo form_error('email'); ?></div>
								<div id="emailvalid_error" class="error_div" style="color:red;"></div>
								<div id="emailid_error" class="error_div" style="color:red;"></div>
								<input type="hidden" id="hidden" name="hidden" >
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Password:</label>
								<input type="password" class="span9 required" label="Password" validation_type="password" name="password" id="password" style="width: 50%;">
								<div id="password_error" class="error_div" style="color:red;"><?php echo form_error('password'); ?></div>
								<div id="passwordvalid_error" class="error_div" style="color:red;"></div>
							        <div id="password_en_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Confirm Password:</label>
								<input type="password" class="span9 required" label="Confirm Password" validation_type="password" name="confirm_password" id="confirm_password" style="width: 50%;">
								<div id="confirm_password_error" class="error_div" style="color:red;"><?php echo form_error('confirm_password'); ?></div>
								<div id="confirm_passwords_error" class="error_div" style="color:red;"></div>
							      
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Phone number:</label>
								<input type="text" class="span9 required" label="Phone number"  name="phnumber" id="phnumber" style="width: 50%;" value="">
								<div id="phnumber_error" class="error_div" style="color:red;"><?php echo form_error('phnumber'); ?></div>
							</div>
                                                         <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Product type:</label>
								
						         <div style="margin-left: 30px;margin-bottom: 10px;">
						        <!--<select  name="product_type" style="width:130.90%" class="" label="Product type"  id="product_type">-->
							   <!--<option value="0">Select Product</option>-->
								<?php
								$res=$this->modeladmin->get_product_type(); // fetching tehe product type from the database 
								$i=0;
								foreach($res as $row)
								{
								?>
									<p><input type="checkbox" id="check_<?php echo $i;?>" name="product_type[]" value="<?php echo $row['id'];?>"><?php echo $row['title'];?></p>
								<?php
									$i++;
								}
								?>
								<!--<option value = "<?php echo $row['id'];?>"><?php echo $row['title'];?></option>-->
							<!--</select>-->
							 </div>
								<div id="product_type_error" class="error_div" style="color:red;"><?php echo form_error('product_type'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Address:</label>
								<input type="text" class="span9 required" label="Address"  name="address" id="address" style="width: 50%;" value="">
								<div id="address_error" class="error_div" style="color:red;"><?php echo form_error('address'); ?></div>
							</div>
							    <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Company:</label>
								<input type="text" class="span9 required" label="Company"  name="company" id="company" style="width: 50%;" value="">
								<div id="company_error" class="error_div" style="color:red;"><?php echo form_error('company'); ?></div>
							</div>
                                                       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Website:</label>
								<input type="text" class="span9 required" label="Website"  name="website" id="website" style="width: 50%;" value="">
								<div id="website_error" class="error_div" style="color:red;"><?php echo form_error('website'); ?></div>
							</div>
						       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Company position:</label>
								<input type="text" class="span9 required" label="Company position"  name="companyposition" id="companyposition" style="width: 50%;" value="">
								<div id="companyposition_error" class="error_div" style="color:red;"><?php echo form_error('companyposition'); ?></div>
							</div>
													
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							
								<label><span style="color: red;">*</span>Country</label>
								 <?php $getcountry = $this->modelgoals->GetCountry();?>
								     <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
								    <select class="" style="width:130.90%" name="country" id="country" label="Country" onChange="Select_state(this.value)">
								    <option value="0">Select Country</option>
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
								     </div>
								<div id="country_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>User Type :</label>
								<div class="ui-select">
								    <select label="Status" name="customer_type" id="customer_type">
									   <option value="1">Buyer</option>
									   <option value="2">Seller</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>

							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" >
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							<div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="createUser" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('user/index'); ?>">Cancel</a>
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

$('#dob').pickadate({
// An integer (positive/negative) sets it relative to today.
								
// `true` sets it to today. `false` removes any limits.
max: 1,
selectYears: true,
selectMonths: true,
format: "yyyy-mm-dd",
})

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
</script>
<script>

</script>
<!-- taskaroo-->
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>