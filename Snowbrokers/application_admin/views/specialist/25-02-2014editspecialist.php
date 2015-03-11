<?php
$this->load->view('includes/header');
$dataone_fetch = $this->modeladmin->getDataSpecialist($this->input->post('ListingUserid'));

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Specialist Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Specialist</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('specialist/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('specialist/edit_specialist');?>" name="new_specialist" id="new_specialist" method="post" autocomplete="off">
							 <input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" />
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Type :</label>
								<?php $TypeData = $this->modeladmin->GetSpecialistType();?>
								<div class="ui-select">
								    <select label="Type" name="type" id="type">
									     <option value="">Select Type</option>
									     <?php
									     foreach($TypeData as $type_done)
									     {
										    if($type_done->id==$dataone_fetch[0]->type)
										    {
											   $select="selected";
										    }
										    else
										    {
											   $select="";
										    }
									     ?>
									     <option value="<?php echo $type_done->id; ?>" <?php echo $select;?>><?php echo $type_done->name ?></option>
									     <?php
									     }
									     ?>
								    </select>
								</div>
								<div id="type_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Name :</label>
								<input type="text" class="span9 required" label="Specialist Name" name="name" id="name" value="<?php echo $dataone_fetch[0]->name ;?>">
								<div id="name_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Phone Number :</label>
								<input type="text" class="span9 required" label="Phone Number" name="phone_number" id="phone_number" value="<?php echo $dataone_fetch[0]->phone_number ;?>">
								<div id="phone_number_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Email :</label>
								<input type="text" class="span9 required" label="Email" name="email" id="email" value="<?php echo $dataone_fetch[0]->email ;?>">
								<div id="email_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Username :</label>
								<input type="text" class="span9 required" label="Username" name="username" id="username" value="<?php echo $dataone_fetch[0]->username ;?>">
								<div id="username_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Address :</label>
								<textarea class="span9 required" label="Address" name="address" id="address"><?php echo $dataone_fetch[0]->address ;?></textarea>
								<div id="address_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" >
									   <option value="1" <?php if($dataone_fetch[0]->status==1){echo 'selected';} ?>>Active</option>
									   <option value="0" <?php if($dataone_fetch[0]->status==0){echo 'selected';} ?>>Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Submit" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('specialist/index'); ?>">Cancel</a>
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
			 var type=document.getElementById('type').value;
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
			 if (type=="")
		     {
			document.getElementById('type_error').innerHTML="Type is required";
			has_error++;
		     }
			 
			 if (has_error==0) {
				$('#new_specialist').submit();
			 }
		  });
	   });
    </script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>