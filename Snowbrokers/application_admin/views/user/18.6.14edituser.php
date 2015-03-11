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
                         var passwords = $('#password').val();
                         var conf_password = $('#retypepassword').val();
                         var email_address = $('#email').val();
			 var edit_email_hidden = $('#edit_email_hidden').val();
                         if (passwords !=conf_password) {
                            $('#retypepassword_error').html('Password and Confirm password does not match!');
                            has_error++;
                         }
			 var how_tall = $('#how_tall').val();
			var how_weigh = $('#how_weigh').val();
			var body_fat = $('#body_fat').val();
			if (how_tall !='') {   
			
			    if (isNaN(how_tall)==true) {
				$('#how_tall_error').html('Please insert numeric value!');
			       has_error++;
			    }
			}
			if (how_weigh !='') {   
			    if (isNaN(how_weigh)==true) {
				$('#how_weigh_error').html('Please insert numeric value!');
			       has_error++;
			    }
			}
			if (body_fat !='') {   
			    if (isNaN(body_fat)==true) {
				$('#body_fat_error').html('Please insert numeric value!');
			       has_error++;
			    }
			}
			 if (email_address !='')
                         {
                           
                            $.ajax({
                                        url: "<?php echo base_url(); ?>index.php/user/check_unique_email_edit",
                                        async:false,
                                        data: {
                                         email_address:email_address,
					 edit_email_hidden:edit_email_hidden
                                        
                                        },
                                        success: function(response) {
                                          
                                               if (response != 0) {
                                                $("#email_error").html(response);
                                                has_error++;
                                                
                                               }
                                              
                                              
                                        }
                                    })
                            
                            //alert('has_error inside--'+has_error);
                             
                        }
                         
                        // alert('has_error outside--'+has_error);
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
  var id=$("#userid_hidden_en").val();
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

function isValidEmailAddress(emailAddress)
{
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	return pattern.test(emailAddress);
};

//function form_fill(value)
//{
//   
//    if (value == 0) {	
//	//document.getElementsByClassName("container").style.visibility="hidden";
//	$('.container').hide();
//    }
//    else {
//	$('.container').show();
//    }
//}



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
						    <input type="hidden" name="name_hidden" id="name_hidden" value="<?php echo $edit_user[0]->profile_image;?>">
						    <input type="hidden" name="email_hidden" id="email_hidden" value="1">
							<input type="hidden" name="edit_email_hidden" id="edit_email_hidden" value="<?php echo $edit_user[0]->email;?>">
								
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
								<input type="text" class="span9 required" label="Email" validation_type="email" name="email" id="email" onblur="check_email(this.value);" style="width: 50%;" value="<?php echo $edit_user[0]->email;?>">
								<div id="email_error" class="error_div" style="color:red;"><?php echo form_error('email'); ?></div>
							</div>
							<?php if($edit_user[0]->registration_type==0){?>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label> Password:</label>
								<input type="password" label="Password" name="password" id="password" validation_type="password" style="width: 50%;" value="<?php //echo $edit_user[0]->password;?>">
								<div id="password_error" class="error_div"" style="color:red;"><?php echo form_error('password'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label> Confirm Password:</label>
								<input type="password" label="Confirm Password" name="retypepassword" validation_type="retype_password" id="retypepassword" style="width: 50%;" value="<?php //echo $edit_user[0]->password;?>">
								<div id="retypepassword_error" class="error_div" style="color:red;"><?php echo form_error('retypepassword'); ?></div>
							</div>
							<?php } ?>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

								<label>Country</label>
							    <?php $getcountry = $this->modelgoals->GetCountry();?>
							       	<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

							       <select name="country" id="country" label="Country" onChange="Select_state(this.value)">
							       <option value="">Select Country</option>
							      <?php                          
								   if(count($getcountry)>0 || $getcountry !=0)
								   {
								       foreach($getcountry as $key=>$val)
								       {
								   ?>
								   <option value="<?php echo $val->id;?>" <?php if( $edit_user[0]->country_id==$val->id){echo "selected";} ?>><?php echo $val->country_name;?></option>
								   <?php
								       }
								   }
								   ?>
							   </select>
								</div>
							   <div id="country_error" class="error_div" style="color:red;"></div>
							</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

								<label>State</label>
							    <?php $getstate = $this->modelgoals->GetState($edit_user[0]->country_id);?>
							       	<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

							       <select name="state" id="state" label="State">
								    <?php                          
								   if(count($getstate)>0 || $getstate !=0)
								   {
								       foreach($getstate as $key=>$val)
								       {
								   ?>
								   <option value="<?php echo $val->id;?>" <?php if( $edit_user[0]->state_id==$val->id){echo "selected";} ?>><?php echo $val->state_name;?></option>
								   <?php
								       }
								   }
								   ?>                     
								</select>
								</div>
							   <div id="country_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Location</label>
							<input type="text" name="location" id="location" value="<?php echo $edit_user[0]->location;?>"/>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
								<label>Age</label>
								<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

							<select name="date_date" id="date_date">
								<option value="">Select Date</option>
								<?php
								$dob = $edit_user[0]->date_of_birth;
								if($dob !='')
								{
									$dob1 = explode('-',$dob);
								}
								for($i=0; $i<=31; $i++) {
								    ?>
								       <option value="<?php if($i<10){echo $a = '0'.$i;}else{echo $a = $i;}?>" <?php if($dob1[2]==$a){echo "selected";}?>><?php if($i<10){echo '0'.$i;}else{echo $i;}?></option>;
									<?php
								}
								?>
							</select>
							<select name="date_month" id="date_month">
								<option value="">Select Month</option>
								<?php
								    $months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
								    for ($month = 1; $month <= 12; $month++)
								    {
								?>
									<option value="<?php if($month<10){echo $b ='0'.$month;}else{echo $b = $month;}?>" <?php if($dob1[1]==$b){echo "selected";}?>><?php echo $months[$month];?></option>;
							   <?php
								    }
								       
							       
								?>
							</select>
							<select name="date_year" id="date_year">
								<option value="">Select Year</option>
								<?php
								for ($year = 1950; $year <= date("Y"); $year++) {
								    ?>
									<option value="<?php echo $year;?>" <?php if($dob1[0]==$year){echo "selected";}?>><?php echo $year;?></option>;
				    
								    <?php
							   
								}
								?>
							</select>
								</div>
							</div>
														<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">

							<label>Sport1</label>
							<?php $SportsyData = $this->modeladmin->GetAllSports();?>
							<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
							<select name="sports1" style="width:130.90%" id="sports1" class="span9 required" label="Sports1">
							    <option value="">Select Sports</option>
							    <?php
							  
							    if(count($SportsyData)>0 || $SportsyData !=0)
							    {
								foreach($SportsyData as $key=>$val)
								{
							    ?>
							    <option value="<?php echo $val->id;?>" <?php if($edit_user[0]->sports1==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
							    <?php
								}
							    }
							    ?>
							</select>
							</div>
								<div id="sports1_error" class="error_div" style="color:red;"><?php echo form_error('email'); ?></div>

							    </div>
												<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">

								    <label>Sport2</label>
								    <?php $SportsyData2 = $this->modeladmin->GetAllSports();?>
								     <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <select name="sports2" id="sports2">
									 <option value="">Select Sports</option>
									 <?php                          
									    if(count($SportsyData2)>0 || $SportsyData2 !=0)
									    {
										foreach($SportsyData2 as $key=>$val)
										{
									    ?>
									    <option value="<?php echo $val->id;?>" <?php if($edit_user[0]->sports2==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
									    <?php
										}
									    }
									    ?>
								    </select>
								     </div>
							    </div>
											<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">

								    <label>Sport3</label>
								     <?php $SportsyData3 = $this->modeladmin->GetAllSports();?>
								     <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <select name="sports3" id="sports3">
									 <option value="">Select Sports</option>
								       <?php                          
									    if(count($SportsyData3)>0 || $SportsyData3 !=0)
									    {
										foreach($SportsyData3 as $key=>$val)
										{
									    ?>
									    <option value="<?php echo $val->id;?>" <?php if($edit_user[0]->sports3==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
									    <?php
										}
									    }
									    ?>
								    </select>
								     </div>
							    </div>
										<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">

								    <label>Goal1</label>
								    <?php $GoalsData = $this->modelgoals->GetAllGoals();?>
								      <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <select name="goal1" id="goal1" style="width:130.90%" class="span9 required" label="Goal1">
									 <option value="">Select Goals</option>
									 <?php                          
									    if(count($GoalsData)>0 || $GoalsData !=0)
									    {
										foreach($GoalsData as $key=>$val)
										{
									    ?>
									    <option value="<?php echo $val->id;?>" <?php if($edit_user[0]->goal1==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
									    <?php
										}
									    }
									    ?>
								    </select>
								      </div>
								    <div id="goal1_error" class="error_div" style="color:red;"><?php echo form_error('email'); ?></div>

							    </div>
									<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">

								    <label>Goal2</label>
								    <?php $GoalsData2 = $this->modelgoals->GetAllGoals();?>
								    <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <select name="goal2" id="goal2">
									<option value="">Select Goals</option>
								       <?php                          
									    if(count($GoalsData2)>0 || $GoalsData2 !=0)
									    {
										foreach($GoalsData2 as $key=>$val)
										{
									    ?>
									    <option value="<?php echo $val->id;?>" <?php if($edit_user[0]->goal2==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
									    <?php
										}
									    }
									    ?>
								    </select>
								    </div>
							    </div>
    							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">

								    <label>Goal3</label>
								    <?php $GoalsData3 = $this->modelgoals->GetAllGoals();?>
								   							    <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <select name="goal3" id="goal3">
									<option value="">Select Goals</option>
								       <?php                          
									    if(count($GoalsData3)>0 || $GoalsData3 !=0)
									    {
										foreach($GoalsData3 as $key=>$val)
										{
									    ?>
									    <option value="<?php echo $val->id;?>" <?php if($edit_user[0]->goal3==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
									    <?php
										}
									    }
									    ?>
								    </select>
															    </div>
							    </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>How tall are you?</label>
								<input type="text" label="How tall" name="how_tall" value="<?php echo $edit_user[0]->tall;?>"id="how_tall" style="width: 50%;" >
					
								<div id="how_tall_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>How much do you weigh?</label>
								<input type="text" label="How much weigh" name="how_weigh" value="<?php echo $edit_user[0]->weigh;?>" id="how_weigh" style="width: 50%;" >
					
								<div id="how_weigh_error" class="error_div" style="color:red;"></div>
							</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
								    <label>Body type</label>
								     <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <?php $bodytype = $this->modelgoals->GetAllBodytype();?>
								    <select name="body_type" id="body_type">
									<option value="">Select Bodytype</option>
									<?php                          
									    if(count($bodytype)>0 || $bodytype !=0)
									    {
										foreach($bodytype as $key=>$val)
										{
									    ?>
									    <option value="<?php echo $val->id;?>" <?php if($edit_user[0]->bodytype==$val->id){echo "selected";}?>><?php echo $val->body_type;?></option>
									    <?php
										}
									    }
									    ?>
								    </select>
								     </div>
							    </div>
							    <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								    <label>Body fat</label>
								    <input type="text" name="body_fat" id="body_fat" value="<?php echo $edit_user[0]->fat;?>"/>
	    							    <div id="body_fat_error" class="error_div" style="color:red;"></div>

							    </div>
							    	<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
								    <label>Lifestyle</label>
									<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <?php $lifestyle = $this->modelgoals->GetAllLifestyle();?>
								    <select name="life_style" id="life_style">                            
									<option value="">Select Lifestyle</option>
									<?php                          
									    if(count($lifestyle)>0 || $lifestyle !=0)
									    {
										foreach($lifestyle as $key=>$val)
										{
									    ?>
									    <option value="<?php echo $val->id;?>" <?php if($edit_user[0]->lifestyle==$val->id){echo "selected";}?>><?php echo $val->name;?></option>
									    <?php
										}
									    }
									    ?>
								    </select>
									</div>
							    </div>
						
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
							<label>Status:</label>
							<div class="ui-select">
							    <select name="status" id="status">
							    <option value="1" <?php if($edit_user[0]->status=='1') { echo "selected";}?>>Active</option>
						    <option value="0" <?php if($edit_user[0]->status=='0') { echo "selected";}?>>Inactive</option>
							    </select>
							</div>
							</div>
                                                     
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
   

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>