<?php
$this->load->view('includes/header');
$dataone_fetch = $this->modeladmin->getDataSpecialist($this->input->post('ListingUserid'));

$dataone_fetch_address=$this->modeladmin->getDataSpecialistAddress($this->input->post('ListingUserid'));

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Specialist Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Specialist</h4></div></div>
				<div class="row-fluid filter-block" style="margin-bottom: 0px;">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('specialist/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('specialist/edit_specialist');?>" name="new_specialist" id="new_specialist" method="post" autocomplete="off">
							<input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" />
							<input type="hidden" name="email_format" id="email_format" value="">
							<input type="hidden" name="email_hidden" id="email_hidden" value="">
							<input type="hidden" name="username_hidden" id="username_hidden" value="">
							<input type="hidden" name="image_prevalue" id="image_prevalue" value="<?php echo $dataone_fetch[0]->image?>">
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Type :</label>
								<?php $TypeData = $this->modeladmin->GetSpecialistType();?>
								<div class="ui-select">
								    <select label="Type" name="type" id="type" onchange="change_type(this.value);">
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
							 <div id="sub_type_content">
							       <?php
							       if($dataone_fetch[0]->sub_type!=0)
							       {
							       ?>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								      <label>Sub Type :</label>
								      <div class="ui-select" >
									     <?php $TypeSubData = $this->modeladmin->GetSpecialistSubType($dataone_fetch[0]->type);?>
									     <select name="sub_type" id="sub_type" class="span6 required" label="Sub Type" style="width:180px;">
									     <option value="">Select Type</option>
									     <?php
									     foreach($TypeSubData as $type_done)
									     {
										    if($type_done->id==$dataone_fetch[0]->sub_type)
										    {
											   $subtype_select="selected";
										    }
										    else
										    {
											   $subtype_select="";
										    }
									     ?>
									     <option value="<?php echo $type_done->id; ?>"<?php echo $subtype_select;?>><?php echo $type_done->name ?></option>
									     <?php
									     }
									     ?>
									     </select>
								      </div>
							       </div>
							       <?php
							       }
							       ?>
							       
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
								<input type="text" class="span9 required" label="Email" name="email" id="email" value="<?php echo $dataone_fetch[0]->email ;?>" onblur="check_email_edit_specialist(this.value,'<?php echo $dataone_fetch[0]->id;?>');">
								<div id="email_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Username :</label>
								<input type="text" class="span9 required" label="Username" name="username" id="username" value="<?php echo $dataone_fetch[0]->username ;?>" onblur="check_username_edit_specialist(this.value,'<?php echo $dataone_fetch[0]->id;?>');">
								<div id="username_error" class="error_div" style="color:red;"></div>
							 </div>
							 <?php
							 if(count($dataone_fetch_address)>0)
							 {
							       foreach($dataone_fetch_address as $data_done_address)
							       {
							?>
							<div id="edit_div<?php echo $data_done_address->id?>">
							       <input type="hidden" name="edit_whole_address[]" id="edit_whole_address<?php echo $data_done_address->id;?>" value="<?php echo $data_done_address->id;?>">
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Country Name:</label>
								<?php $CountryData = $this->modeladmin->GetAllCountry();?>
								<select name="edit_country[]" id="edit_country<?php echo $data_done_address->id;?>" class="span6" onchange="GetStateFromCountryEdit(this.value,'<?php echo $data_done_address->id;?>');" label="Country">
									<option value="">Select Country</option>
									<?php foreach ($CountryData as $dataone): ?>
										<option value="<?php echo $dataone->id; ?>" <?php if($dataone->id==$data_done_address->country){echo "selected";}else{echo "";}?>><?php echo $dataone->country_name ?></option>
									<?php endforeach; ?>
								</select>
								
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>State Name:</label>
								<label id="edit_statecontent<?php echo $data_done_address->id;?>">
								<?php
								if(!is_numeric($data_done_address->state))
								{
							       ?>
							       <input type="text" name="edit_state[]" id="edit_state<?php echo $data_done_address->id;?>" class="span6" value="<?php echo $data_done_address->state?>">
							       <?php
								}
								else
								{
								?>
								
								      <?php
								      $CountryData_State = $this->modeladmin->Get_StateDetailsModel($data_done_address->country);
								      ?>
								      <select name="edit_state[]" id="edit_state<?php echo $data_done_address->id;?>" class="span6">
									     <option value="">Select State</option>
									     <?php foreach ($CountryData_State as $dataone_State): ?>
									     <option value="<?php echo $dataone_State->id; ?>" <?php if($dataone_State->id == $data_done_address->state){ echo 'selected'; } ?>><?php echo $dataone_State->state_name ?></option>
									     <?php endforeach; ?>
								      </select>
								
								<?php
								}
								?>
								</label>
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>City Name:</label>
								<label id="citycontent">
									<input type="text" class="span9" value="<?php echo $data_done_address->city;?>" label="City" name="edit_city[]" id="edit_city<?php echo $data_done_address->id;?>">
								</label>
								
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Address :</label>
								<textarea class="span9" label="Address" name="edit_address[]" id="edit_address<?php echo $data_done_address->id;?>"><?php echo $data_done_address->address;?></textarea>
								
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								      <a href="javascript:void()" onclick="delete_form(<?php echo $data_done_address->id?>)">Delete</a>
							       </div>
							</div>
							<?php
							       }
							 }
							 ?>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Country Name:</label>
								<?php $CountryData = $this->modeladmin->GetAllCountry();?>
								<select name="country[]" id="country" class="span6" onchange="GetStateFromCountry(this.value);" label="Country">
									<option value="">Select Country</option>
									<?php foreach ($CountryData as $dataone): ?>
										<option value="<?php echo $dataone->id; ?>"><?php echo $dataone->country_name ?></option>
									<?php endforeach; ?>
								</select>
								<div id="country_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>State Name:</label>
								<label id="statecontent">
									<input type="text" class="span9" style="width: 50%;" readonly="readonly" value="Select Country First">
								</label>
								<div id="state_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>City Name:</label>
								<label id="citycontent">
									<input type="text" class="span9" value="" label="City" name="city[]" id="city">
								</label>
								<div id="city_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Address :</label>
								<textarea class="span9" label="Address" name="address[]" id="address"></textarea>
								<div id="address_error" class="error_div" style="color:red;"></div>
							 </div>
							 
							 <div id="additional_address"></div>
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <a href="javascript:void(0)" onclick="add_more_address()" style="color:red">Add More</a>
							 </div>
							 <?php
							 if($dataone_fetch[0]->image!="")
							 {
							       $image_path=base_url()."images/specialist_profile_image/thumbs/".$dataone_fetch[0]->image;
							  ?>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Existing Image :</label>
							       <img src="<?php echo $image_path;?>">
							  </div>
							  <?php
							 }
							 ?>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Image :</label>
							       <input type="file" class="span9" name="image" id="image" label="Profile Image">
							       <div id="image_error" class="error_div" style="color:red;"></div>
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
       <form class="new_user_form" action="" id="frmValidation" method="post">
	<input type="hidden" name="ListingUserAddress" id="ListingUserAddress" value="">
       </form>
    <?php
    $country_details="";
    $CountryData = $this->modeladmin->GetAllCountry();
    foreach ($CountryData as $dataone):
    $value=str_replace("'","",$dataone->country_name);
    $country_details.="<option value=".$dataone->id.">".$value."</option>";
    endforeach;
    $total_country=$country_details;
    //echo $total_country;
    ?>
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
		     if (document.getElementById("email_format").value==1)
		     {
			    document.getElementById('email_error').innerHTML="Please write email in proper format";
			    document.getElementById('email').focus();
			    has_error++;
		     }
		     if (document.getElementById("email_hidden").value==1)
		     {
			    document.getElementById('email_error').innerHTML="Email is not available";
			    document.getElementById('email').focus();
			    has_error++;
		     }
		     if (document.getElementById("username_hidden").value==1)
		     {
			    document.getElementById('username_error').innerHTML="Username is not available";
			    document.getElementById('username').focus();
			    has_error++;
		     }
		     if (document.getElementById("image_prevalue").value=="")
		     {
		       if (document.getElementById("image").value=="")
		       {
			document.getElementById("image_error").innerHTML="Please upload image";
			has_error++;
		       }
		     }
			 
			 if (has_error==0) {
				$('#new_specialist').submit();
			 }
		  });
	   });
	   	   function GetStateFromCountry(Countryid) {
		     var CountryId = $.trim(Countryid);
		     if(CountryId!=0) {
			     $.ajax({
				     url: "<?php echo base_url(); ?>index.php/specialist/Get_StateDetails",
				     data: {CountryId:CountryId},
				     success: function(response) {
					     $('#statecontent').html(response);
				     }
			     });
		     }
	     }
	     
	      var auto_val=0;
	      function add_more_address()
	      {
		     //alert(auto_val);
		     var country_details='<?php echo $total_country;?>';
		     var innerHTML="<div id='table_id"+auto_val+"'><div class=span12 field-box style='margin-left: 30px;margin-bottom: 10px;'><label>Country Name:</label><select name='country[]' id='country"+auto_val+"' class='span6 required' onchange='GetStateFromCountryMore(this.value,"+auto_val+");' label='Country'><option value=''>Select Country</option>"+country_details+"</select></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>State Name:</label><label id='statecontent"+auto_val+"'><input type='text' class='span9 required' style='width: 50%;' readonly='readonly' value='Select Country First'></label></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>City Name:</label><input type='text' class='span9 required' value='' label='City' name='city[]' id='city"+auto_val+"'></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Address :</label><textarea class='span9 required' label='Address' name='address[]' id='address"+auto_val+"'></textarea></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><a href='javascript:void(0)' onclick='delete_more_address("+auto_val+")'>Delete</a></div></div>";
		     $("#additional_address").append(innerHTML);
		     auto_val++;
	      }
	      
	      function delete_more_address(val)
	      {
		     $("#table_id"+val).remove();
	      }
	      function GetStateFromCountryMore(Countryid,val) {
		     //alert(val);
		     var CountryId = $.trim(Countryid);
		     if(CountryId!=0) {
			     $.ajax({
				     url: "<?php echo base_url(); ?>index.php/specialist/Get_StateDetailsMore",
				     data: "CountryId="+CountryId+"&val="+val,
				     success: function(response) {
					     $('#statecontent'+val).html(response);
				     }
			     });
		     }
	     }
	     function check_email_edit_specialist(val,userid)
	     {
	      
	      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	      if (!filter.test(val))
	      {
		     
		     
		     document.getElementById('email_error').innerHTML="Please write email in proper format";
		     document.getElementById('email_format').value="1";
		     
		     return false;
	      }
	      else
	      {
		     
		     //document.getElementById('email_error').innerHTML="";
		     document.getElementById('email_format').value="0";
		     $.ajax({
			url: "<?php echo base_url(); ?>index.php/specialist/check_email_edit_specialist",
			data: {email:val,userid:userid},
			success: function(response) {
			    
				var response_array = response.split('[SEPARETOR]');
				if (response_array[1]==0) {
					$("#email_error").html('')
					$("#email_hidden").val('0')
				}
				else
				{
					$("#email_error").html('Email is not available.')
					$("#email_hidden").val('1')
				}
			}
		     })
	      }
	     }
	     
	     function check_username_edit_specialist(username,userid) {
		     if (username.search(/\S/)!=-1) {
				     $.ajax({
				     url: "<?php echo base_url(); ?>index.php/specialist/check_username_edit_specialist",
				     data: {username:username,userid:userid},
				     success: function(response) {
					     var response_array = response.split('[SEPARETOR]');
					     if (response_array[1]==0) {
						     $("#username_error").html('')
						     $("#username_hidden").val('0')
					     }
					     else
					     {
						     $("#username_error").html('Username is not available.')
						     $("#username_hidden").val('1')
					     }
				     }
			     })
		     }
	     }
	     function GetStateFromCountryEdit(Countryid,val) {
		     var CountryId = $.trim(Countryid);
		     if(CountryId!=0) {
			     $.ajax({
				     url: "<?php echo base_url(); ?>index.php/specialist/GetStateFromCountryEdit",
				     data: {CountryId:CountryId,val:val},
				     success: function(response) {
					     $('#edit_statecontent'+val).html(response);
				     }
			     });
		     }
	     }
	     function delete_form(val)
	     {
	      var r=confirm("Are you sure to delete this address?");
	      if (r==true)
	      {
		     $('#ListingUserAddress').val($.trim(val));
		     $("#frmValidation").attr("action", "<?php echo site_url('specialist/delete_specialist_address');?>");
		     $("#frmValidation").submit();
		     return true;
	      }
	     }
	     function change_type(type_id)
	     {
	      var TypeId = $.trim(type_id);
	      if(TypeId!=0) {
		      $.ajax({
			      url: "<?php echo base_url(); ?>index.php/specialist/Get_Type",
			      data: "TypeId="+TypeId,
			      success: function(response) {
				      $('#sub_type_content').html(response);
			      }
		      });
	      }
	     }
    </script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>