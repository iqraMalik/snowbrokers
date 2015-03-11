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
                         var passwords = $('#password').val();
                         var conf_password = $('#retypepassword').val();
                         var email_address = $('#email').val();
                         if (passwords !=conf_password) {
                            $('#retypepassword_error').html('Password and Confirm password does not match!');
                            has_error++;
                         }
			 
			var how_tall = $('#how_tall').val();
			var how_weigh = $('#how_weigh').val();
			var body_fat = $('#body_fat').val();
			var des = $('#a_desc').val();
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
			if (des !='') {   
			   
				$('#a_desc_error').html('please write about yourself!');
			       has_error++;
			    
			}
			 if (email_address !='')
                         {
                           
                            $.ajax({
                                        url: "<?php echo base_url(); ?>index.php/user/check_unique_email",
                                        async:false,
                                        data: {
                                         email_address:email_address
                                        
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
								<input type="text" class="span9 required" label="Email" validation_type="email" name="email" id="email" style="width: 50%;" value="<?php echo set_value('email');?>">
								<div id="email_error" class="error_div" style="color:red;"><?php echo form_error('email'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Password:</label>
								<input type="password" class="span9 required" label="Password" name="password" id="password" validation_type="password" style="width: 50%;" value="<?php echo set_value('Password');?>">
								<div id="password_error" class="error_div"" style="color:red;"><?php echo form_error('password'); ?></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Confirm Password:</label>
								<input type="password" class="span9 required" label="Confirm Password" name="retypepassword" validation_type="retype_password" id="retypepassword" style="width: 50%;" value="<?php echo set_value('retypepassword');?>">
								<div id="retypepassword_error" class="error_div" style="color:red;"><?php echo form_error('retypepassword'); ?></div>
							</div>							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							
								<label><span style="color: red;">*</span>Country</label>
								 <?php $getcountry = $this->modelgoals->GetCountry();?>
								     <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
								    <select class="span9 required" style="width:130.90%" name="country" id="country" label="Country" onChange="Select_state(this.value)">
								    <option value="">Select Country</option>
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
								<label><span style="color: red;">*</span>State</label>
								 <?php $getcountry = $this->modelgoals->GetCountry();?>
								     <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <select class="span9 required" style="width:130.90%" name="state" id="state" label="State" >
									<option value="">Select Country first,then state</option>                          
								     </select>
								     </div>
								<div id="country_error" class="error_div" style="color:red;"></div>
							</div>        
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Location:</label>
								
								    <input type="text" class="span9 required" name="location" id="location" label="Location" placeholder="Location" style="width: 50%;">
								
								<div id="location_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Profile:</label>
								 <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								<select name="profile" style="width:130.90%" id="profile" label="Profile" class="span9 required">
								    <option value="">Select Profile</option>
								    <option value="1">User</option>
								    <option value="2">Instructor</option>
								    <option value="3">Company</option>
								</select>
								 </div>
								<div id="profile_error" class="error_div" style="color:red;"></div>
						       </div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;"></span>Payment:</label>
								 <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								<select name="payment" style="width:130.90%" id="payment" label="payment" class="span9 required">
								    <option value="">Select Payment</option>
								    <option value="1">Standard </option>
								    <option value="2">premier</option>
								</select>
								 </div>
								<div id="payment_error" class="error_div" style="color:red;"></div>
						       </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Description :</label>
				   <textarea  style="width: 50%"  label="Description" name="a_desc" id="a_desc" ></textarea>
								<div id="a_desc_error" class="error_div" style="color:red;"></div>
							 </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

								<label><span style="color: red;">*</span>Sports1:</label>
								<?php $SportsyData = $this->modeladmin->GetAllSports();?>
								<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
							<select name="sports1" id="sports1" style="width:130.90%" class="span9 required" label="Sports1">
								    <option value="">Select Sports</option>
								    <?php
								  
								    if(count($SportsyData)>0 || $SportsyData !=0)
								    {
									foreach($SportsyData as $key=>$val)
									{
								    ?>
								    <option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
								    <?php
									}
								    }
								    ?>
								</select>
								</div>
								<div id="sports1_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Sports2:</label>
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
									<option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
									<?php
									    }
									}
									?>
								</select>
								</div>
								<div id="sports2_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Sports3:</label>
								<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								 <?php $SportsyData3 = $this->modeladmin->GetAllSports();?>
								<select name="sports3" id="sports3">
								     <option value="">Select Sports</option>
								   <?php                          
									if(count($SportsyData3)>0 || $SportsyData3 !=0)
									{
									    foreach($SportsyData3 as $key=>$val)
									    {
									?>
									<option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
									<?php
									    }
									}
									?>
								</select>
								</div>
								<div id="sports3_error" class="error_div" style="color:red;"></div>
						       </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>How tall are you?</label>
								<input type="text" label="How tall" name="how_tall" id="how_tall" style="width: 50%;" >
					
								<div id="how_tall_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>How much do you weigh?</label>
								<input type="text" label="How much weigh" name="how_weigh" id="how_weigh" style="width: 50%;" >
					
								<div id="how_weigh_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Body Fat</label>
								<input type="text" label="Body fat" name="body_fat" id="body_fat" style="width: 50%;" >
					
								<div id="body_fat_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Goal1:</label>
								 <?php $GoalsData = $this->modelgoals->GetAllGoals();?>
								 <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								<select name="goal1" style="width:130.90%" id="goal1" class="span9 required" label="Goal1">
								     <option value="">Select Goals</option>
								     <?php                          
									if(count($GoalsData)>0 || $GoalsData !=0)
									{
									    foreach($GoalsData as $key=>$val)
									    {
									?>
									<option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
									<?php
									    }
									}
									?>
								</select>
							 </div>
								<div id="goal1_error" class="error_div" style="color:red;"></div>
						       </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							 
								<label>Goal2:</label>
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
									<option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
									<?php
									    }
									}
									?>
								</select>
							  </div>
								<div id="goal2_error" class="error_div" style="color:red;"></div>
						       </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							
								<label>Goal3:</label>
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
									<option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
									<?php
									    }
									}
									?>
								</select>
							</div>
								<div id="goal3_error" class="error_div" style="color:red;"></div>
						       </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							
								<label>Body Type:</label>
								<?php $bodytype = $this->modelgoals->GetAllBodytype();?>
							    <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
								<select name="body_type" id="body_type">
								    <option value="">Select Bodytype</option>
								    <?php                          
									if(count($bodytype)>0 || $bodytype !=0)
									{
									    foreach($bodytype as $key=>$val)
									    {
									?>
									<option value="<?php echo $val->id;?>"><?php echo $val->body_type;?></option>
									<?php
									    }
									}
									?>
								</select>
							</div>
								<div id="body_type_error" class="error_div" style="color:red;"></div>
						       </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

							
								<label>Date of Birth:</label>
								<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
								<select name="date_date" id="date_date">
								    <option value="">Select Date</option>
								    <?php
								    for($i=0; $i<=31; $i++) {
									?>
									   <option value="<?php if($i<10){echo '0'.$i;}else{echo $i;}?>"><?php if($i<10){echo '0'.$i;}else{echo $i;}?></option>;
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
									    <option value="<?php if($month<10){echo '0'.$month;}else{echo $month;}?>"><?php echo $months[$month];?></option>;
							       <?php
									}
									   
								   
								    ?>
								</select>
								<select name="date_year" id="date_year">
								    <option value="">Select Year</option>
								    <?php
								    for ($year = 1950; $year <= date("Y"); $year++) {
									?>
									    <option value="<?php echo $year;?>"><?php echo $year;?></option>;
					
									<?php
							       
								    }
								    ?>
								</select>
							</div>
								<div id="body_type_error" class="error_div" style="color:red;"></div>
						       </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Mark it as private:</label>
								<input type="checkbox" id="private"  value="1" name="private"/>
						       </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

							
								<label>Life style:</label>
								 <?php $lifestyle = $this->modelgoals->GetAllLifestyle();?>
								 <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
								<select name="life_style" id="life_style">                            
								    <option value="">Select Lifestyle</option>
								    <?php                          
									if(count($lifestyle)>0 || $lifestyle !=0)
									{
									    foreach($lifestyle as $key=>$val)
									    {
									?>
									<option value="<?php echo $val->id;?>"><?php echo $val->name;?></option>
									<?php
									    }
									}
									?>
								</select>
							</div>
								<div id="life_style_error" class="error_div" style="color:red;"></div>
						       
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