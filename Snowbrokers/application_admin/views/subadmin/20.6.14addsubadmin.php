<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<!--<script type="text/javascript" src="<?php //echo base_url(); ?>ckeditor/ckeditor.js"></script>-->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Sports Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add Subadmin ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('subadmin/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('subadmin/insert_subadmin');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							
                                                         <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> User Name:</label>
								<input type="text" class="span9 required" label="User Name" name="user_name" id="user_name" style="width: 50%;" onblur="check_unique_username(this.value)">					     
								<div id="user_name_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Password:</label>
								<input type="password" class="span9 required" label="Password" name="password" id="password" style="width: 50%;">					     
								<div id="password_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Confirm Password:</label>
								<input type="password" class="span9 required" label="Confirm Password" name="conf_password" id="conf_password" style="width: 50%;">					     
								<div id="conf_password_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Dashboard Management:</label>
								<div class="ui-select">
							           <select label="State" name="dashboard" id="dashboard">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="dashboard_error" class="error_div" style="color:red;"></div>
							 </div>
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Settings Management:</label>
								<div class="ui-select">
								    <select label="Settings" name="settings" id="settings">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>				     
								<div id="settings_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>User Management:</label>
								<div class="ui-select">
							           <select label="User" name="user" id="user">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
								<div id="user_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Category Management:</label>
							       <div class="ui-select">
							           <select label="Category" name="category" id="category">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="category_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Article Management:</label>
								<div class="ui-select">
							           <select label="Article" name="article" id="article">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
								<div id="article_error" class="error_div" style="color:red;"></div>
							 </div>
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>FAQ Management:</label>
							       <div class="ui-select">
							           <select label="FAQ" name="faq" id="faq">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="faq_error" class="error_div" style="color:red;"></div>
							 </div>
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Email Management:</label>
							       <div class="ui-select">
							           <select label="Email" name="email" id="email">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="email_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Country Management:</label>
							       <div class="ui-select">
							           <select label="Country" name="country" id="country">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="country_error" class="error_div" style="color:red;"></div>								<div id="article_error" class="error_div" style="color:red;"></div>
							 </div>
							  
							   <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>State Management:</label>
							       <div class="ui-select">
							           <select label="State" name="state" id="state">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="state_error" class="error_div" style="color:red;"></div>
							 </div>
							   
							    <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Slider Management:</label>
							       <div class="ui-select">
							           <select label="State" name="slider" id="slider">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="slider_error" class="error_div" style="color:red;"></div>
							 </div>
							    
							     <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Plan Management:</label>
							       <div class="ui-select">
							           <select label="State" name="plan" id="plan">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="plan_error" class="error_div" style="color:red;"></div>
							 </div>
							     
							      <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Sports Management:</label>
								<div class="ui-select">
							           <select label="State" name="sports" id="sports">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="sports_error" class="error_div" style="color:red;"></div>
							 </div>
							      
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Goal Management:</label>
								<div class="ui-select">
							           <select label="State" name="goal" id="goal">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="goal_error" class="error_div" style="color:red;"></div>
							 </div>
							       
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Skill Management:</label>								
								<div class="ui-select">
							           <select label="State" name="skill" id="skill">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="skill_error" class="error_div" style="color:red;"></div>
								
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>LifeStyle Management:</label>
								<div class="ui-select">
							           <select label="State" name="lifestyle" id="lifestyle">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="lifestyle_error" class="error_div" style="color:red;"></div>
							 </div>
								 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>BodyType Management:</label>
								<div class="ui-select">
							           <select label="State" name="bodytype" id="bodytype">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="bodytype_error" class="error_div" style="color:red;"></div>
							 </div>
								  
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Currency Management:</label>
								<div class="ui-select">
							           <select label="State" name="currency" id="currency">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="currency_error" class="error_div" style="color:red;"></div>
							 </div>
							
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Offer Management:</label>
								<div class="ui-select">
							           <select label="State" name="offer" id="offer">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="offer_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Event Management:</label>
								<div class="ui-select">
							           <select label="State" name="event" id="event">
								           <option value="0">Inactive</option>
									   <option value="1">Active</option>									   
								    </select>
								</div>
							       <div id="event_error" class="error_div" style="color:red;"></div>
							 </div>		
							
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Add User Access" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('subadmin/index'); ?>">Cancel</a>
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
      function check_unique_username(username) {
       if (username !='') {
	    
       
	      $.ajax({
		     url: "<?php echo base_url(); ?>index.php/subadmin/check_unique_username",
		     async:false,
		     data: {
		      username:username
		     
		     },
		     success: function(response) {
		       
			    if (response != 0) {
			     $("#user_name_error").html('Username is already taken');
			    return false;
			     
			    }
			    else{
				  return true; 
			    }
			   
			   
		     }
		 })
       }
       else{
	     $("#user_name_error").html('Enter Username');
	     return false;
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
			    
		     var passwords = $('#password').val();
                         var conf_password = $('#conf_password').val();
                         var email_address = $('#email').val();
                         if (passwords !=conf_password) {
                            $('#conf_password_error').html('Password and Confirm password does not match!');
                            has_error++;
                         }
			  
		  if (has_error==0) {
		     $('#new_category').submit();
		  }
			
		  });
		 
	   });
    </script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>