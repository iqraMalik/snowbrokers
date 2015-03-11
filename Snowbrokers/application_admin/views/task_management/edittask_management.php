<?php
$this->load->view('includes/header');
$data_fetch=$this->modeltask_management->GetTask_List($this->input->post('ListingUserid'));
$data=$data_fetch[0];
?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.datetimepicker.css"/>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Task/Project Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Task/Project Management ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('task_management/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('task_management/edit_task_management');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							<input type="hidden" name="task_id" id="task_id" value="<?php echo $data->id;?>">
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> User Name :</label>
							       <div class="ui-select">
								   <select label="User Name" name="user_id" id="user_id" style="width: 130%;">
									  <option value="">Select User</option>
									  <?php
									  $user=$this->modeltask_management->GetAllUser();
									  if(count($user)>0)
									  {
									     foreach($user as $user_details)
									     {
										    if($user_details->id==$data->user_id)
										    {
											   $user_select="selected";
										    }
										    else
										    {
											   $user_select='';
										    }
									     ?>
									     <option value="<?php echo $user_details->id?>" <?php echo $user_select;?>><?php echo $user_details->first_name." ".$user_details->last_name;?></option>
									     <?php
									     }
									  }
									  ?>
								   </select>
							       </div>
							       <div id="user_id_error" class="error_div" style="color:red;"></div>
							</div>
							
							
							<div style="margin-left: 30px;margin-bottom: 10px;" class="span12 field-box">
							       <label>&nbsp;</label>
							       <input type="radio" style="margin-right: 5px;margin-bottom: 4px;" value="1" id="user_type1" name="user_type" <?php if($data->i_am==1){echo "checked";}else{echo "";}?>>I am an Individual
							       <input type="radio" style="margin-left: 20px;margin-right: 5px;margin-bottom: 4px;" value="2" id="user_type2" name="user_type" <?php if($data->i_am==2){echo "checked";}else{echo "";}?>>I am a business
							       <div style="color:red;" class="error_div" id="user_type_error"></div>
							</div>
							
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Title of your Task:</label>
							       <input type="text" class="span9 required" label="Task Title" name="task_title" id="task_title" style="width: 50%;" value="<?php echo $data->task_title;?>">
							       <div id="task_title_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Describe your task:</label>
							       <textarea class="span9" label="Task Description" name="task_description" id="task_description" style="width: 50%;"><?php echo $data->task_description;?></textarea>
							       <div id="task_description_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><u>Task Location Address</u></label>
							
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Location</label>
							       <input type="text" class="span9 required" label="Location" name="location" id="location" style="width: 50%;" value="<?php echo $data->location;?>">
							       <div id="location_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Address:</label>
							       <input type="text" class="span9" label="Address" name="address" id="address" style="width: 50%;" value="<?php echo $data->address;?>">
							       <div id="address_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>City:</label>
							       <input type="text" class="span9" label="City" name="city" id="city" style="width: 50%;" value="<?php echo $data->city;?>">
							       <div id="city_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>State:</label>
							       <input type="text" class="span9" label="State" name="state" id="state" style="width: 50%;" value="<?php echo $data->state;?>">
							       <div id="state_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Zip:</label>
							       <input type="text" class="span9" label="Zip" name="zipcode" id="zipcode" style="width: 50%;" value="<?php echo $data->zipcode;?>">
							       <div id="zipcode_error" class="error_div" style="color:red;"></div>
							</div>
							

							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span><u>Additional Details</u></label>
							
							</div>
							 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <!--<label><span style="color: red;">*</span> (Private note for the assigned TaskRabbit):</label>-->
							       <textarea class="span9" label="Additional Details" name="additional_details" id="additional_details" style="width:50%;resize: none;"><?php echo $data->additional_details;?></textarea>
							       <div id="additional_details_error" class="error_div" style="color:red;"></div>
							</div>
							<?php
							       //$data=array();
							$checked_1='';$checked_2='';$checked_3='';
							$hear_about=explode(',',$data->task_type);
							//print_r($hear_about);
							foreach($hear_about as $key=>$hear_about_value)
							{
							       if($hear_about_value==1)
							       {
								      $checked_1="checked";
							       }
							       if($hear_about_value==2)
							       {
								      $checked_2="checked";
							       }
							       if($hear_about_value==3)
							       {
								      $checked_3="checked";
							       }
							       
							       
							
							}
							//print_r($data);
							?>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       
							       
							       <input type="checkbox" name="task_done[]" id="task_done1" value="1" style="margin-right: 5px;margin-bottom: 4px;" <?php echo $checked_1;?>>This task can be done online or by phone<br/>
							       <input type="checkbox" name="task_done[]" id="task_done2" value="2" style="margin-right: 5px;margin-bottom: 4px;" <?php echo $checked_2;?>>This task requires a vehicle<br/>
							       <input type="checkbox" name="task_done[]" id="task_done3" value="3" style="margin-right: 5px;margin-bottom: 4px;" <?php echo $checked_3;?>>This task is private<br/>
							       <div id="task_done_error" class="error_div" style="color:red;"></div>
							</div>

							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><u>Bid close deadline</u></label>
							
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Close Date:</label>
							       <input type="text" class="span9 required" label="Bid Close Date" name="bid_close_date" id="bid_close_date" style="width: 50%;" readonly="true" value="<?php echo $data->bid_close_deadline;?>">
							       <div id="bid_close_date_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Close Time:</label>
							       <input type="text" class="span9 required" label="Bid Close Time" name="bid_close_time" id="bid_close_time" style="width: 50%;" readonly="true" value="<?php echo $data->bid_close_timeline;?>">
							       <div id="bid_close_time_error" class="error_div" style="color:red;"></div>
							</div>
							
							
							<script type="text/javascript">
							       $('#bid_close_date').datetimepicker({
								       
								       //yearOffset:222,
								       timepicker:false,
								       format:'Y-m-d',
								       formatDate:'Y/m/d',
								       minDate:'today'
								       //minDate:'-1970/01/02', // yesterday is minimum date
								       //maxDate:'+1970/01/02' // and tommorow is maximum date calendar
							       });
							       $('#bid_close_time').datetimepicker({
								       datepicker:false,
								       format:'H:i',
								       step:5
							       });
						       </script>
							
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><u>Task complete deadline</u></label>
							
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Close Date:</label>
							       <input type="text" class="span9 required" label="Task Close Date" name="task_close_date" id="task_close_date" style="width: 50%;" readonly="true" value="<?php echo $data->task_close_deadline;?>">
							       <div id="task_close_date_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Close Time:</label>
							       <input type="text" class="span9 required" label="Task Close Time" name="task_close_time" id="task_close_time" style="width: 50%;" readonly="true" value="<?php echo $data->task_close_timeline;?>">
							       <div id="task_close_time_error" class="error_div" style="color:red;"></div>
							</div>
							
							<script type="text/javascript">
								
							       $('#task_close_date').datetimepicker({
								       //yearOffset:222,
								       timepicker:false,
								       format:'Y-m-d',
								       formatDate:'Y/m/d',
								       //minDate:'-1970/01/02', // yesterday is minimum date
								       minDate:'today'
								       //maxDate:'+1970/01/02' // and tommorow is maximum date calendar
							       });
							       
							       $('#task_close_time').datetimepicker({
								       datepicker:false,
								       format:'H:i',
								       step:5
							       });
						       </script>
							
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Repeated Task :</label>
							       <div class="ui-select" style="width: 350px;">
								   <select label="Repeated Task" name="repeated_task" id="repeated_task" style="width: 130%;">
									     <option value=""> Would you like to see this Task up to repeat regularly? </option>
									     <?php
									     $repeat_task=$this->modeltask_management->repeated_task();
									     if(count($repeat_task)>0)
									     {
									     foreach($repeat_task as $task)
									     {
										    if($task->id==$data->repeated_task)
										    {
											   $select_repeat="selected";
										    }
										    else
										    {
											   $select_repeat="";
										    }
									     ?>
									     <option value="<?php echo $task->id;?>" <?php echo $select_repeat;?>><?php echo $task->task_interval;?></option>
									     <?php
									     }
									     }
									     ?>
								   </select>
							       </div>
							       <div id="repeated_task_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Contractor to spend $:</label>
							       <input type="text" class="span9 required" label="Contrator spend amount" name="contractor_spend" id="contractor_spend" style="width: 50%;" onkeyup="check_spend_amount(this.value);" value="<?php echo $data->contractor_spend;?>">
							       <div id="contractor_spend_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> I will pay for the task $:</label>
							       <input type="text" class="span9 required" label="Pay for task" name="pay_for_task" id="pay_for_task" style="width: 50%;" onkeyup="check_task_amount(this.value);" value="<?php echo $data->pay_for_task;?>">
							       <div id="pay_for_task_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div style="margin-left: 30px;margin-bottom: 10px;" class="span12 field-box">
							       <label><span style="color: red;">*</span>Task Assignment</label>
							       <input type="radio" style="margin-right: 5px;margin-bottom: 4px;" value="1" id="task_assignment1" name="task_assignment" <?php if($data->task_assignment==1){echo "checked";}else{echo "";}?>>Currently: Pick for me, based on availability and price
							       <input type="radio" style="margin-left: 20px;margin-right: 5px;margin-bottom: 4px;" value="2" id="task_assignment2" name="task_assignment" <?php if($data->task_assignment==2){echo "checked";}else{echo "";}?>>Let me review offers before auto assignment
							       <div style="color:red;" class="error_div" id="task_assignment_error"></div>
							</div>
							 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Status :</label>
							       <div class="ui-select">
								   <select label="Status" name="status" id="status" style="width: 130%;">
									  <option value="1" <?php if($data->status==1){echo "checked";}else{echo "";}?>>Active</option>
									  <option value="0" <?php if($data->status==0){echo "checked";}else{echo "";}?>>Inactive</option>
								   </select>
							       </div>
							       <div id="status_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span11 field-box actions" style="margin-top: 20px;">
							       <input type="button" value="Update Task" class="btn-glow primary" id="createUser">
							       <span>OR</span>
							       <a class="btn-flat new-product" href="<?php echo site_url('task_management/index'); ?>">Cancel</a>
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
       
       function check_spend_amount(val)
       {
	       if (isNaN(val)==true)
	       {
		       $('#contractor_spend').val('');
	       }
       }
       function check_task_amount(val)
       {
	       if (isNaN(val)==true)
	       {
		       $('#pay_for_task').val('');
	       }
       }
       
       
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
			 if(CKEDITOR.instances.task_description.getData()=='') {
			    $('#task_description_error').html("Task Description is required");
			    $('#task_description_error').css('color','red');
			    $('#task_description').focus();
			    has_error=has_error+1;
			    
			    }
			    if(CKEDITOR.instances.additional_details.getData()=='') {
			    $('#additional_details_error').html("Additional Details is required");
			    $('#additional_details_error').css('color','red');
			    $('#additional_details').focus();
			    has_error=has_error+1;
			    
			    }
			    if (document.getElementById('user_id').value=='')
			    {
				   $('#user_id_error').html("User name is required");
				   $('#user_id_error').css('color','red');
				   
				   has_error=has_error+1;
			    }
			    if (document.getElementById('repeated_task').value=='')
			    {
				   $('#repeated_task_error').html("Repeated Task is required");
				   $('#repeated_task_error').css('color','red');
				   
				   has_error=has_error+1;
			    }
			    if ((document.getElementById('task_assignment1').checked==false) && (document.getElementById('task_assignment2').checked==false))
			    {
				   $('#task_assignment_error').html("Task assignment is required");
				   $('#task_assignment_error').css('color','red');
				   $('#task_assignment1').focus();
				   has_error=has_error+1;
			    }
			    
			    

			 if (has_error==0) {
				$('#new_category').submit();
			 }
		  });
	   });
    </script>
    <script>
       //CKEDITOR.replace('description');
       //CKEDITOR.resize( '100%', '100%' );
       CKEDITOR.replace( 'task_description',
       {
	      
	      height: 250,
	      width: 600
       });
		
       CKEDITOR.replace( 'additional_details',
       {
	      
	      height: 250,
	      width: 600
       });
    </script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>