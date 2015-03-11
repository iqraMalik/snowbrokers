<?php
$this->load->view('includes/header');
$dataone_fetch_appointment = $this->modelappointment->getDataAppointment($this->input->post('ListingUserid'));
if(isset($_REQUEST['user_details_value']))
{
$dataone_fetch = $this->modelappointment->preuserdetails($_REQUEST['user_details_value']);
}
else
{
       $dataone_fetch="";
}
?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.css" id="theme_base">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.date.css" id="theme_date">
<script src="<?php echo base_url();?>js/res_datepicker/picker.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.date.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.time.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/main.js"></script>

    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Appointment Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Appointment ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block" style="margin-bottom: 0px;">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('appointment/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('appointment/edit_appointment');?>" name="new_specialist" id="new_specialist" method="post" autocomplete="off">
							<input type="hidden" name="ListingUserid" id="ListingUserid" value="<?php echo $this->input->post('ListingUserid'); ?>">
							<input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" />
							<input type="hidden" name="email_format" id="email_format" value="">
							<input type="hidden" name="show_user_value" id="show_user_value" value="">
							<input type="hidden" name="user_details_value" id="user_details_value" value="<?php if(isset($_REQUEST['user_details_value'])){ echo $_REQUEST['user_details_value'];}?>">
							<input type="hidden" name="prefetch_status" id="prefetch_status" value="<?php echo $dataone_fetch_appointment[0]->status;?>">
							<?php
							
							
							?>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Appointment For:</label>
							       <input type="radio" name="appointment_for" id="appointment_for1" value="1" onclick="show_user(this.value);" <?php if(isset($_REQUEST['user_details_value'])){ echo "checked";}elseif($dataone_fetch_appointment[0]->appointment_for==1){echo "checked";}?>>Existing User&nbsp;&nbsp;
							       <input type="radio" name="appointment_for" id="appointment_for2" value="2" onclick="show_user(this.value);" <?php if(isset($_REQUEST['user_details_value'])){ echo "";}elseif($dataone_fetch_appointment[0]->appointment_for==2){echo "checked";}?>>Someone else&nbsp;&nbsp;
							       <div id="appointment_for_error" class="error_div" style="color:red;"></div>
							</div>
							<?php
							
							if(($dataone_fetch_appointment[0]->appointment_for==1) && ($dataone_fetch_appointment[0]->user_type!=0))
							{
							       $display_style="display:block;";
							}
							elseif(!empty($_REQUEST['user_details_value']))
							{
							       $display_style="display:block;";
							}
							else
							{
							       $display_style="display:none;";
							}
							?>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;<?php echo $display_style;?>" id="show_user">
							       <label><span style="color: red;">*</span> Select User :</label>
							       <?php $TypeData = $this->modelappointment->UserType();?>
							       <div class="ui-select">
								     <select label="User" name="user_type" id="user_type" onchange="user_details(this.value);">
								     <option value="">Select User</option>
								     <?php
								    
								     foreach($TypeData as $datauser)
								     {
								      if($datauser->id==$_REQUEST['user_details_value'])
								      {
									     $select_user="selected";
								      }
								      
								      elseif($datauser->id==$dataone_fetch_appointment[0]->user_type)
								      {
									     $select_user="selected";
								      }
								      else
								      {
									     $select_user="";
								      }
								     ?>
								     <option value="<?php echo $datauser->id?>"<?php echo $select_user;?>><?php echo $datauser->first_name." ".$datauser->last_name?></option>
								     <?php
								     }
								     ?>
								     </select>
							       </div>
							       <div id="user_type_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> First Name :</label>
							       <input type="text" class="span5 required" label="First Name" name="first_name" id="first_name" value="<?php if(!empty($dataone_fetch[0]->first_name)){echo $dataone_fetch[0]->first_name;}else{echo $dataone_fetch_appointment[0]->first_name;}?>">
							       <div id="first_name_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Last Name :</label>
							       <input type="text" class="span5 required" label="Last Name" name="last_name" id="last_name" value="<?php if(!empty($dataone_fetch[0]->last_name)){echo $dataone_fetch[0]->last_name;}else{echo $dataone_fetch_appointment[0]->last_name;}?>">
							       <div id="last_name_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Gender :</label>
							       <input type="radio" name="gender" id="gender1" value="1" <?php if(!empty($dataone_fetch[0]->gender)){if($dataone_fetch[0]->gender==1){echo "checked";}}elseif($dataone_fetch_appointment[0]->gender==1){echo "checked";}?>>Male&nbsp;&nbsp;
							       <input type="radio" name="gender" id="gender2" value="2" <?php if(!empty($dataone_fetch[0]->gender)){if($dataone_fetch[0]->gender==2){echo "checked";}}elseif($dataone_fetch_appointment[0]->gender==2){echo "checked";}?>>Female&nbsp;&nbsp;
							       <div id="gender_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Date of Birth :</label>
							       <div class="ui-select" >
								      <select label="Day" name="day" id="day" class="span9 required" style="width:130%">
									       <option value="">Select Day</option>
									       <?php
									       for($day=01;$day<=31;$day++)
									       {
										    if(!empty($dataone_fetch[0]->dob))
										    {
										    $user_day=date('d',strtotime($dataone_fetch[0]->dob));
										    if($user_day==$day)
										    {
											   $select_day="selected";
										    }
										    else
										    {
											   $select_day="";
										    }
										    }
										    else
										    {
											   $user_fetch_day=date('d',strtotime($dataone_fetch_appointment[0]->dob));
											   if($user_fetch_day==$day)
											   {
												  $select_day="selected";
											   }
											   else
											   {
												  $select_day="";
											   }
										    }
									       ?>
									       <option value="<?php echo $day; ?>"<?php echo $select_day;?>><?php echo $day; ?></option>
									       <?php
									       }
									       ?>
								      </select>
							       </div>
							       <div class="ui-select" >
								      <select label="Month" name="month" id="month" class="span9 required" style="width:130%">
									       <option value="">Select Month</option>
									       <?php
									       $month_array=array("01"=>"January","02"=>"Febuary","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
									       foreach($month_array as $month_key=>$month_value)
									       {
										    if(!empty($dataone_fetch[0]->dob))
										    {
										    $user_month=date('m',strtotime($dataone_fetch[0]->dob));
										    if($user_month==$month_key)
										    {
											   $select_month="selected";
										    }
										    else
										    {
											   $select_month="";
										    }
										    }
										    else
										    {
											   $user_fetch_month=date('m',strtotime($dataone_fetch_appointment[0]->dob));
											   if($user_fetch_month==$month_key)
											   {
												  $select_month="selected";
											   }
											   else
											   {
												  $select_month="";
											   }
										    }
									       ?>
									       <option value="<?php echo $month_key; ?>"<?php echo $select_month;?>><?php echo $month_value; ?></option>
									       <?php
									       }
									       ?>
								      </select>
							       </div>
							       <div class="ui-select" >
								      <select label="Year" name="year" id="year" class="span9 required" style="width:130%">
									       <option value="">Select Year</option>
									       <?php
									       $previous_year=1930;
									       $next_year=date('Y');
									       for($year=$previous_year;$year<=$next_year;$year++)
									       {
										    if(!empty($dataone_fetch[0]->dob))
										    {
										    $user_year=date('Y',strtotime($dataone_fetch[0]->dob));
										    if($user_year==$year)
										    {
											   $select_year="selected";
										    }
										    else
										    {
											   $select_year="";
										    }
										    }
										    else
										    {
											   $user_fetch_year=date('Y',strtotime($dataone_fetch_appointment[0]->dob));
											   if($user_fetch_year==$year)
											   {
												  $select_year="selected";
											   }
											   else
											   {
												  $select_year="";
											   }
										    }
									       ?>
									       <option value="<?php echo $year; ?>"<?php echo $select_year;?>><?php echo $year; ?></option>
									       <?php
									       }
									       ?>
								      </select>
							       </div>
							 </div>
														
							<div class="span12 field-box" style="margin-left: 30px;">
       
							       <div id="day_error" class="error_div" style="color:red;float:left;padding-right: 60px;"></div>
							       <div id="month_error" class="error_div" style="color:red;float:left;padding-right: 60px;"></div>
							       <div id="year_error" class="error_div" style="color:red;float:left;padding-right: 60px;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Appointment Reason :</label>
								<input type="text" class="span5 required" label="Appointment Reason" name="appointment_reason" id="appointment_reason" value="<?php if(!empty($dataone_fetch[0]->first_name)){echo "";}else{echo $dataone_fetch_appointment[0]->appointment_reason;}?>">
								<div id="appointment_reason_error" class="error_div" style="color:red;"></div>
							 </div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Appointment Date :</label>
								<input type="text" class="span5 required" label="Appointment Date" name="appointment_date" id="appointment_date" value="<?php if(!empty($dataone_fetch[0]->first_name)){echo "";}else{echo date('m-d-Y',strtotime($dataone_fetch_appointment[0]->appointment_date));}?>">
								<div id="appointment_date_error" class="error_div" style="color:red;"></div>
							 </div>
							<script>

							       $('#appointment_date').pickadate({
							       // An integer (positive/negative) sets it relative to today.
							       min: 1,
							       // `true` sets it to today. `false` removes any limits.
							       max: false,
							       selectYears: true,
							       selectMonths: true,
							       format: "mm-dd-yyyy",
							       })
							       
						       </script>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Insurance Name :</label>
								<input type="text" class="span5 required" label="Insurance Name" name="insurance_name" id="insurance_name" value="<?php if(!empty($dataone_fetch[0]->first_name)){echo "";}else{echo $dataone_fetch_appointment[0]->insurance_name;}?>">
								<div id="insurance_name_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Confirm Phone Number :</label>
								<input type="text" class="span5 required" label="Confirm Phone Number" name="confirm_phone_number" id="confirm_phone_number" value="<?php if(!empty($dataone_fetch[0]->phone_number)){echo $dataone_fetch[0]->phone_number;}else{echo $dataone_fetch_appointment[0]->confirm_phone_number;}?>">
								<div id="confirm_phone_number_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Enter Email Id :</label>
								<input type="text" class="span5 required" label="Email Id" name="email" id="email" value="<?php if(!empty($dataone_fetch[0]->email)){echo $dataone_fetch[0]->email;}else{echo $dataone_fetch_appointment[0]->email;}?>">
								<div id="email_error" class="error_div" style="color:red;"></div>
							</div>

							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status">
									   <option value="1"<?php if($dataone_fetch_appointment[0]->status==1){echo "selected";}else{echo "";}?>>Active</option>
									   <option value="0" <?php if($dataone_fetch_appointment[0]->status==0){echo "selected";}else{echo "";}?>>Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Update Appointment" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('appointment/index'); ?>">Cancel</a>
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
				
			 })
			 
			 if (document.getElementById("email").value.search(/\S/)!=-1)
			 {
			    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			    if (!filter.test(document.getElementById("email").value))
			    {
				   
				   
				   document.getElementById('email_error').innerHTML="Please write email in proper format";
				   has_error++;
				   
				   
			    }	
			 }

			 if (has_error==0) {
				$('#new_specialist').submit();
			 }
		  });
	   });
       
	      function show_user(val)
	      {
		     if (val==1)
		     {
			    document.getElementById("show_user_value").value=1;
			    document.getElementById("show_user").style.display="";
		     }
		     if (val==2)
		     {
			    document.getElementById("show_user_value").value=0;
			    document.getElementById("show_user").style.display="none";
		     }
	      }
	      
	      function user_details(val)
	      {
		     document.getElementById("user_details_value").value=val;
		     document.getElementById("appointment_date").value="";
		     document.getElementById("appointment_reason").value="";
		     document.getElementById("insurance_name").value="";
		     document.getElementById("new_specialist").action = "<?php echo base_url();?>index.php/appointment/editappointment";
		     document.getElementById("new_specialist").submit();
	      }
    </script>
    
<?php $this->load->view('includes/footer'); ?>