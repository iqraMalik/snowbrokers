<?php
$this->load->view('includes/header');
//$dataone_fetch = $this->modeladmin->getDataUser($this->input->post('ListingUserid'));
//print_r($edit_user);
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.css" id="theme_base">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.date.css" id="theme_date">
<script src="<?php echo base_url();?>js/res_datepicker/picker.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.date.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.time.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/main.js"></script>
<script src="<?php echo base_url();?>js/jwplayer.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
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
$(function () {
        $('#updateUser').click(function (e) {
/*client side validation left*/
		
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
var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
var email=document.getElementById('email').value;
 if (!reg.test(email))
 {
 document.getElementById('emailvalid_error').innerHTML='Enter valid email..';
 document.getElementById('email').focus();
 has_error++;
 }
var availabelmail=document.getElementById('email_hidden').value;
if (availabelmail==0)
{
     has_error++;
     $("#email_error").html('Email is not available.');
     document.getElementById('email').focus();
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
     if(has_error==0)
                        {
                           
                            $( "#edit_user" ).submit();
                        }
		
			
		
		
       
        });

	

$('#age').pickadate({
// An integer (positive/negative) sets it relative to today.
								
// `true` sets it to today. `false` removes any limits.
max: 1,
selectYears: true,
selectMonths: true,
format: "yyyy-mm-dd",
})

});


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
    
function validateEmail(email)
{
     
 var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
 if (!reg.test(email))
 {
 document.getElementById('emailvalid_error').innerHTML='Enter valid email..';
 document.getElementById('email').focus();
 return false;
 }
 else
 {
 return true;
 }
} 

function check_email(email) {
  var id=$("#userid_hidden").val();
	if (email.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/user/check_email_edit",
			data: {email:email,
			       userid:id
			},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				//alert(response_array[1]);
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
function check_email_en(email) {
     
  var id=$("#userid_hidden").val();
 
	if (email.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/user/check_email_edit",
			data: {email:email,
			       userid:id
			},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				if (response_array[1]==0) {
					$("#email_en_error").html('')
					$("#email_hidden").val('1')
				}
				else
				{
					$("#email_en_error").html('Email is not available.')
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

</script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>user Management</h4>
        </div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>Edit User ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
					</div>
				</div>
				
				<div class="row-fluid filter-block">
				   <div class="pull-right">
						<a class="btn-flat new-product" href="<?php echo site_url('user/index'); ?>">< View List</a>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
					<div class="span9 with-sidebar" style="margin-bottom: 30px;">
						<div class="container">
							<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('user/update_users');?>" name="edit_user" id="edit_user" method="post" autocomplete="off">
						    <input type="hidden" name="userid_hidden" id="userid_hidden" value="<?php echo $edit_user[0]->id;?>">
						    <input type="hidden" name="name_hidden" id="name_hidden" value="<?php //echo $edit_user[0]->profile_image;?>">
						    <input type="hidden" name="email_hidden" id="email_hidden" value="1">
							<input type="hidden" name="edit_email_hidden" id="edit_email_hidden" value="<?php echo $edit_user[0]->email;?>">
							<!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

							    <label><span style="color: red;">*</span>Gender :</label>
							    <div style="padding-bottom:15px;">
								<input type="radio" name="gender_type" id="gender_types1" value='1' <?php //if($edit_user[0]->gender==1){echo "checked";}?>  >&nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender_type" id="gender_types2" value='2' <?php //if($edit_user[0]->gender==2){echo "checked";}?>>&nbsp;&nbsp;Female &nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender_type" id="gender_types3" value='3' <?php //if($edit_user[0]->gender==3){echo "checked";}?>>&nbsp;&nbsp;Other wonderful options
							    </div>
							</div>-->
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>First Name:</label>
								<input type="text" class="span9 required" label="First Name" name="first_name" id="first_name" style="width: 50%;" value="<?php echo $edit_user[0]->first_name;?>">
								<div id="first_name_error" class="error_div" style="color:red;"><?php echo form_error('first_name'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Last Name:</label>
								<input type="text" class="span9 required" label="Last Name" name="last_name" id="last_name" style="width: 50%;" value="<?php echo $edit_user[0]->last_name;?>">
								<div id="last_name_error" class="error_div" style="color:red;"><?php echo form_error('last_name'); ?></div>
							</div>							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Email:</label>
								<input type="email" class="span9 required" label="Email" validation_type="email" name="email" id="email" onblur="validateEmail(this.value);" onkeyup="check_email_en(this.value);" onblur="check_email_en(this.value);"  style="width: 50%;" value="<?php echo $edit_user[0]->email;?>">
								<div id="email_error" class="error_div" style="color:red;"><?php echo form_error('email'); ?></div>
								<div id="emailvalid_error" class="error_div" style="color:red;"></div>
							        <div id="email_en_error" class="error_div" style="color:red;"></div>
							</div>
							    <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Phone number:</label>
								<input type="text" class="span9 required" label="Phone number"  name="phnumber" id="phnumber" style="width: 50%;" value="<?php echo $edit_user[0]->phone_number;?>">
								<div id="phnumber_error" class="error_div" style="color:red;"><?php echo form_error('phnumber'); ?></div>
							</div>
                                                         <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Product type:</label>
						       
							 <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
							     <select id="select" name="product_type" class="" label="Product type"   id="product_type">
							  <?php
						      $res=$this->modeladmin->get_product_type(); // fetching tehe product type from the database 
						         ?>
							  <?php foreach($res as $row){?>
								<option value = "<?php echo $row['id'];?>"
								<?php if( $edit_user[0]->product_type==$row['id']){echo "selected";} ?>>
								<?php echo $row['title'];}?></option>
							</select>
								<input type="text" class="span9 required" label="Product type"  name="producttype" id="producttype" style="width: 50%;" value="<?php echo $edit_user[0]->product_type;?>">
								<div id="producttype_error" class="error_div" style="color:red;"><?php echo form_error('producttype'); ?></div>
							</div>
							 </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Address:</label>
								<input type="text" class="span9 required" label="Address"  name="address" id="address" style="width: 50%;" value="<?php echo $edit_user[0]->address;?>">
								<div id="address_error" class="address_div" style="color:red;"><?php echo form_error('address'); ?></div>
							</div>
							    <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Company:</label>
								<input type="text" class="span9 required" label="Company"  name="company" id="company" style="width: 50%;" value="<?php echo $edit_user[0]->company;?>">
								<div id="company_error" class="error_div" style="color:red;"><?php echo form_error('company'); ?></div>
							</div>
                                                       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Website:</label>
								<input type="text" class="span9 required" label="Website"  name="website" id="website" style="width: 50%;" value="<?php echo $edit_user[0]->website;?>">
								<div id="website_error" class="error_div" style="color:red;"><?php echo form_error('website'); ?></div>
							</div>
						       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Company position:</label>
								<input type="text" class="span9 required" label="Company position"  name="companyposition" id="companyposition" style="width: 50%;" value="<?php echo $edit_user[0]->company_position;?>">
								<div id="companyposition_error" class="error_div" style="color:red;"><?php echo form_error('companyposition'); ?></div>
							</div>
							
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

								<label>Country</label>
							    <?php $getcountry = $this->modelgoals->GetCountry();?>
							       	<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

							       <select name="country" class="" id="country" label="Country" onChange="Select_state(this.value)">
							       <option value="">Select Country</option>
							      <?php                          
								   if(count($getcountry)>0 || $getcountry !=0)
								   {
								       foreach($getcountry as $key=>$val)
								       {
								   ?>
								   <option value="<?php echo $val->id;?>" <?php if( $edit_user[0]->country==$val->id){echo "selected";} ?>><?php echo $val->country_name;?></option>
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
									   <option value="1" <?php if($edit_user[0]->customer_type=='1'){echo "selected";}else{echo "";} ?>>Buyer</option>
									   <option value="2" <?php if($edit_user[0]->customer_type=='2'){echo "selected";}else{echo "";} ?>>Seller</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>	
								
						       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
							<label>Status:</label>
							<div class="ui-select">
							    <select name="status" id="status" class="span9 required">
							    <option value="1" <?php if($edit_user[0]->status=='1') { echo "selected";}?>>Active</option>
						    <option value="0" <?php if($edit_user[0]->status=='0') { echo "selected";}?>>Inactive</option>
							    </select>
							</div>
							</div>
<!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
     <label>User Type:</label>
	  <div>
	 <?php if($edit_user[0]->customer_type=='1') { echo "Buyer";}elseif($edit_user[0]->customer_type=='2'){ echo "Seller"; }?>
     </div>
</div>-->

						     
							<div class="span11 field-box actions" style="margin-top: 20px;">
									<input type="button" value="Update User" class="btn-glow primary" id="updateUser">
								         <span>OR</span>
									<a class="btn-flat new-product" href="<?php echo site_url('user/index'); ?>">Cancel</a>
								</div>
							</div>
						    </form>
					
					</div>
				</div>
				
				
			</div>
		</div>
    </div>
</div>
 <script type="text/javascript">
//    function sports1_otherss_edit(other_val) {
//	if (other_val==5) {
//		$('#sports1_edit_other_div').show();
//		
//	}
//	else
//	{
//		$('#sports1_edit_other_div').hide();
//		$('#sports1_edit_other').val('');
//	}
//}
//
//function sports2_otherss_edit(other_val) {
//	if (other_val==5) {
//		$('#sports2_edit_other_div').show();
//		
//	}
//	else
//	{
//		$('#sports2_edit_other_div').hide();
//		$('#sports2_edit_other').val('');
//	}
//}
//
//function sports3_otherss_edit(other_val) {
//	if (other_val==5) {
//		$('#sports3_edit_other_div').show();
//		
//	}
//	else
//	{
//		$('#sports3_edit_other_div').hide();
//		$('#sports3_edit_other').val('');
//	}
//}
//function goal1_otherss_edit(other_val) {
//	if (other_val==14) {
//		$('#goal1_other_edit_div').show();
//		
//	}
//	else
//	{
//		$('#goal1_other_edit_div').hide();
//		$('#goal1_other_edit').val('');
//	}
//}
//function goal2_otherss_edit(other_val) {
//	
//	if (other_val==14) {
//		$('#goal2_other_edit_div').show();
//	}
//	else
//	{
//		
//		$('#goal2_other_edit_div').hide();
//		$('#goal2_other_edit').val('');
//	}
//}
//function goal3_otherss_edit(other_val) {
//	if (other_val==14) {
//		$('#goal3_other_edit_div').show();
//		
//	}
//	else
//	{
//		$('#goal3_other_edit_div').hide();
//		$('#goal3_other_edit').val('');
//	}
//}
 </script>  

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>