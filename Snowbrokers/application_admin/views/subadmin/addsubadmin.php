<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<!--<script type="text/javascript" src="<?php //echo base_url(); ?>ckeditor/ckeditor.js"></script>-->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Subadmin Management</h4></div></div>
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
								<input type="hidden" class="span9 required" label="User Name" name="usernamecheak" id="usernamecheak" style="width: 50%;">	
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
							  <?php
							  $i=0;
							  
							  $dataone_fetch = $this->modelsubadmin->Get_alladmin();
							  if($dataone_fetch !="")
							  {
							  foreach($dataone_fetch as $man)
							  { 
							  if($i<=3)
							  {$j="";
							  ?>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><?php echo $man->management_name;?></label>
								<input type="checkbox" name="management_access[]" value="<?php echo $man->id;?>" id="management_access"><?php echo $j; ?>
				   <div id="management_access_error" class="error_div" style="color:red;"></div>
							 </div>
							 
							 <?php
							 if($i==3)
							 {
							$i=-1;$j="<br/>";
							}
							 
							 $i++;
							 
							 } }}
							 
							 ?>
							       <div class="span12 field-box" style="margin-bottom: 20px;">
								<label>Status:</label>
								<select class="span9" style="width: 50%;" name="status" id="status">
								    <option value="1" >Active</option>
								    <option value="0">Inactive</option>
								  
								</select>
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
			      $("#usernamecheak").val(1);
			    return false;
			     
			    }
			    else{
				  $("#usernamecheak").val(0); 
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
			 var usernamecheak = $('#usernamecheak').val();
                         if (passwords !=conf_password) {
                            $('#conf_password_error').html('Password and Confirm password does not match!');
                            has_error++;
                         }
			  if (usernamecheak==1){
			    has_error++;
			    $('#user_name_error').html('Username is already there please change the username!');
			    return false;
			  }
			  var chk = document.getElementsByName('management_access[]');
			    var len = chk.length;
				var checked = false;
			    for(i=0;i<len;i++) {
				 if(chk[i].checked) {
				    checked=true;
						break;
					  }
				}
			    if (!checked) {
				    document.getElementById('management_access_error').innerHTML = "Please Select a Management";
				    has_error++;
				    return false;
				  } 	
		  if (has_error==0) {
		     $('#new_category').submit();
		  }
			
		  });
		 
	   });
    </script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>