<?php
$this->load->view('includes/header');
$data_fetch=$this->modeltask_management->GetTask_List($this->input->post('ListingUserid'));
$data=$data_fetch[0];
?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
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
							       <label><span style="color: red;">*</span> Title of your Task<br/>(Please give your task a brief title):</label>
							       <input type="text" class="span9 required" label="Task Title" name="task_title" id="task_title" style="width: 50%;" value="<?php echo $data->task_title;?>">
							       <div id="task_title_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Describe your task<br/>(Public: Don't share private information here):</label>
							       <textarea class="span9" label="Task Description" name="task_description" id="task_description"><?php echo $data->task_description;?></textarea>
							       <div id="task_description_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><u>Where does the TaskRabbit need to go? (Specify Address)</u></label>
							
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Location</label>
							       <input type="text" class="span9 required" label="Location" name="location" id="location" style="width: 50%;" value="<?php echo $data->location;?>">
							       <div id="location_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Address:</label>
							       <input type="text" class="span9 required" label="Address" name="address" id="address" style="width: 50%;" value="<?php echo $data->address;?>">
							       <div id="address_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> City:</label>
							       <input type="text" class="span9 required" label="City" name="city" id="city" style="width: 50%;" value="<?php echo $data->city;?>">
							       <div id="city_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> State:</label>
							       <input type="text" class="span9 required" label="State" name="state" id="state" style="width: 50%;" value="<?php echo $data->state;?>">
							       <div id="state_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Zip:</label>
							       <input type="text" class="span9 required" label="Zip" name="zipcode" id="zipcode" style="width: 50%;" value="<?php echo $data->zipcode;?>">
							       <div id="zipcode_error" class="error_div" style="color:red;"></div>
							</div>
							

							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><u>Any more details to add deadlines</u></label>
							
							</div>
							 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> (Private note for the assigned TaskRabbit):</label>
							       <textarea class="span9 required" label="Private Note" name="private_note" id="private_note" style="width: 50%;resize: none;"><?php echo $data->private_note;?></textarea>
							       <div id="private_note_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>&nbsp;</label>
							       <input type="radio" name="task_complete" id="task_complete0" value="0" style="margin-right: 5px;margin-bottom: 4px;" <?php if($data->task_type==0){echo "checked";}else{echo "";}?>>I need a confirmed TaskRabbit by<br/>
							       <input type="radio" name="task_complete" id="task_complete1" value="1" style="margin-right: 5px;margin-bottom: 4px;" <?php if($data->task_type==1){echo "checked";}else{echo "";}?>>I need this Task completed by
							       <div id="task_complete_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> <u>TaskRabbit assignment</u></label>
							       <input type="radio" name="task_assignment" id="task_assignment0" value="0" style="margin-right: 5px;margin-bottom: 4px;" <?php if($data->task_rabbit_assignment==0){echo "checked";}else{echo "";}?>>Pick for me (most popular)
							       <input type="radio" name="task_assignment" id="task_assignment1" value="1" style="margin-left: 20px;margin-right: 5px;margin-bottom: 4px;" <?php if($data->task_rabbit_assignment==1){echo "checked";}else{echo "";}?>>Based on availability and price
							       <div id="task_assignment_error" class="error_div" style="color:red;"></div>
							</div>
							<?php
							       //$data=array();
							$checked_1='';$checked_2='';$checked_3='';$checked_4='';$checked_5='';
							$hear_about=explode(',',$data->additional_details);
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
							       if($hear_about_value==4)
							       {
								      $checked_4="checked";
							       }
							       if($hear_about_value==5)
							       {
								      $checked_5="checked";
							       }
							       
							
							}
							//print_r($data);
							?>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> <u>Addtional Details:</u></label>
							       <input type="checkbox" name="additional_details[]" id="additional_details1" value="1" style="margin-right: 5px;margin-bottom: 4px;" <?php echo $checked_1;?>>Let me review offers before auto assignment<br/>
							       <input type="checkbox" name="additional_details[]" id="additional_details2" value="2" style="margin-right: 5px;margin-bottom: 4px;" <?php echo $checked_2;?>>Give first dibs to one of our top 5 TaskRabbits<br/>
							       <input type="checkbox" name="additional_details[]" id="additional_details3" value="3" style="margin-right: 5px;margin-bottom: 4px;" <?php echo $checked_3;?>>This task can be done online or by phone<br/>
							       <input type="checkbox" name="additional_details[]" id="additional_details4" value="4" style="margin-right: 5px;margin-bottom: 4px;" <?php echo $checked_4;?>>This task required a large vehicle (truck, SUV etc.)<br/>
							       <input type="checkbox" name="additional_details[]" id="additional_details5" value="5" style="margin-right: 5px;margin-bottom: 4px;" <?php echo $checked_5;?>>This task is private<br/>
							       <div id="additional_details_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label style="float:left;"><u>Would you like to set this Task up to repeat regularly:</u></label>
							       <input type="checkbox" name="task_repeat" id="task_repeat" value="1" style="margin-left: 20px;margin-right: 5px;margin-bottom: 4px;" <?php if($data->repeated_task==1){echo "checked";}else{echo "";}?>>Repeat this task
							       <div id="task_repeat_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> <u>This task requires the TaskRabbit to spend:</u></label>
							       <input type="radio" name="task_spend" id="task_spend0" value="0" style="margin-right: 5px;margin-bottom: 4px;" <?php if($data->task_spend==0){echo "checked";}else{echo "";}?>>Less than $25
							       <input type="radio" name="task_spend" id="task_spend1" value="1" style="margin-left: 20px;margin-right: 5px;margin-bottom: 4px;" <?php if($data->task_spend==1){echo "checked";}else{echo "";}?>>Less than $50
							       <input type="radio" name="task_spend" id="task_spend2" value="2" style="margin-left: 20px;margin-right: 5px;margin-bottom: 4px;" <?php if($data->task_spend==2){echo "checked";}else{echo "";}?>>Less than $100
							       <input type="radio" name="task_spend" id="task_spend3" value="3" style="margin-left: 20px;margin-right: 5px;margin-bottom: 4px;" <?php if($data->task_spend==3){echo "checked";}else{echo "";}?>>More than $100
							       <div id="task_spend_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><u>How much are you willing to pay for this Task?</u></label>
							
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Enter Amount:</label>
							       <input type="text" class="span9 required" label="Amount" name="task_amount" id="task_amount" style="width: 50%;" value="<?php echo $data->task_amount;?>" onkeyup="check_number(this.value);">
							       <div id="task_amount_error" class="error_div" style="color:red;"></div>
							</div>
							 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Status :</label>
							       <div class="ui-select">
								   <select label="Status" name="status" id="status" style="width: 130%;">
									  <option value="1" <?php if($data->status==1){echo "selected";}else{echo "";}?>>Active</option>
									  <option value="0" <?php if($data->status==0){echo "selected";}else{echo "";}?>>Inactive</option>
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
       function check_number(val)
       {
	      if (isNaN(val))
	      {
		     document.getElementById('task_amount').value='';
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
			    
			    if ((document.getElementById('task_complete0').checked==false) && (document.getElementById('task_complete1').checked==false))
			    {
				   $('#task_complete_error').html("Task completed by is required");
				   $('#task_complete_error').css('color','red');
				   $('#task_complete0').focus();
				   has_error=has_error+1;
			    }
			    if ((document.getElementById('task_assignment0').checked==false) && (document.getElementById('task_assignment1').checked==false))
			    {
				   $('#task_assignment_error').html("Task assignment is required");
				   $('#task_assignment_error').css('color','red');
				   $('#task_assignment0').focus();
				   has_error=has_error+1;
			    }
			    
			    if ((document.getElementById('additional_details1').checked==false) && (document.getElementById('additional_details2').checked==false) && (document.getElementById('additional_details3').checked==false) && (document.getElementById('additional_details4').checked==false) && (document.getElementById('additional_details5').checked==false))
			    {
				   $('#additional_details_error').html("Additonal Details is required");
				   $('#additional_details_error').css('color','red');
				   $('#additional_details1').focus();
				   has_error=has_error+1;
			    }
			    
			    if ((document.getElementById('task_spend0').checked==false) && (document.getElementById('task_spend1').checked==false) && (document.getElementById('task_spend2').checked==false) && (document.getElementById('task_spend3').checked==false))
			    {
				   $('#task_spend_error').html("Task spend is required");
				   $('#task_spend_error').css('color','red');
				   $('#task_spend0').focus();
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
			
    </script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>