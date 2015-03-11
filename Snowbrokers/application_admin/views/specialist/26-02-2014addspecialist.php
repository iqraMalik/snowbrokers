<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Specialist Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add Specialist</h4></div></div>
				<div class="row-fluid filter-block" style="margin-bottom: 0px;">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('specialist/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('specialist/insert_specialist');?>" name="new_specialist" id="new_specialist" method="post" autocomplete="off">
							 <input type="hidden" name="email_format" id="email_format" value="">
							<input type="hidden" name="email_hidden" id="email_hidden" value="">
							       <input type="hidden" name="username_hidden" id="username_hidden" value="">
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Type :</label>
								<?php $TypeData = $this->modeladmin->GetSpecialistType();?>
								<div class="ui-select" >
								    <select label="Type" name="type" id="type">
									     <option value="">Select Type</option>
									     <?php
									     foreach($TypeData as $type_done)
									     {
									     ?>
									     <option value="<?php echo $type_done->id; ?>"><?php echo $type_done->name ?></option>
									     <?php
									     }
									     ?>
								    </select>
								</div>
								<div id="type_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Name :</label>
								<input type="text" class="span9 required" label="Specialist Name" name="name" id="name">
								<div id="name_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Phone Number :</label>
								<input type="text" class="span9 required" label="Phone Number" name="phone_number" id="phone_number">
								<div id="phone_number_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Email :</label>
								<input type="text" class="span9 required" label="Email" name="email" id="email" onblur="check_email(this.value);">
								<div id="email_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Username :</label>
								<input type="text" class="span9 required" label="Username" name="username" id="username" onblur="check_username(this.value);">
								<div id="username_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Country Name:</label>
								<?php $CountryData = $this->modeladmin->GetAllCountry();?>
								<select name="country[]" id="country" class="span6 required" onchange="GetStateFromCountry(this.value);" label="Country">
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
									<input type="text" class="span9 required" style="width: 50%;" readonly="readonly" value="Select Country First">
								</label>
								<div id="state_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>City Name:</label>
								<label id="citycontent">
									<input type="text" class="span9 required" value="" label="City" name="city[]" id="city">
								</label>
								<div id="city_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Address :</label>
								<textarea class="span9 required" label="Address" name="address[]" id="address"></textarea>
								<div id="address_error" class="error_div" style="color:red;"></div>
							 </div>
							 
							 <div id="additional_address"></div>
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <a href="javascript:void(0)" onclick="add_more_address()" style="color:red">Add More</a>
							 </div>
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status">
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Create Specialist" class="btn-glow primary" id="createUser">
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
	     function check_email(val)
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
			url: "<?php echo base_url(); ?>index.php/specialist/checkemail_specialist",
			data: {email:val},
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
	     
	     function check_username(username) {
		     if (username.search(/\S/)!=-1) {
				     $.ajax({
				     url: "<?php echo base_url(); ?>index.php/specialist/checkusername_specialist",
				     data: {username:username},
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
	     
	     
    </script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>