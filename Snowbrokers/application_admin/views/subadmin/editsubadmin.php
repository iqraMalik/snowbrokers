<?php
$this->load->view('includes/header');
$dataone_fetch = $this->modelsubadmin->getDatastate($this->input->post('ListingUserid'));

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<!--<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>-->

    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Subadmin Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Subadmin ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('subadmin/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('subadmin/edit_subadmin');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							 <input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" />
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> User Name:</label>
								<input type="hidden" class="span9 required" label="User Name" name="usernamecheak" id="usernamecheak" style="width: 50%;" value="0">	
								<input type="text" class="span9 required" label="User Name" name="user_name" id="user_name" style="width: 50%;" onblur="check_unique_username(this.value)" value="<?php echo $dataone_fetch[0]->username;?>">					     
								<div id="user_name_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Password:</label>
								<input type="password" class="span9" label="Password" name="password" id="password" style="width: 50%;">					     
								<div id="password_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Confirm Password:</label>
								<input type="password" class="span9" label="Confirm Password" name="conf_password" id="conf_password" style="width: 50%;">					     
								<div id="conf_password_error" class="error_div" style="color:red;"></div>
							 </div>
							  <?php
							  $dataone_fetch_cash = $this->modelsubadmin->Get_alladmin();
							//print_r($dataone_fetch);
							foreach($dataone_fetch_cash as $taskcategory)
							{
							    $cate=$dataone_fetch[0]->page_access;
							    $tasky=explode(",",$cate);
							    
							     if(in_array($taskcategory->id, $tasky))
									{
									    $selecteone="checked";
									   
									}
									else
									{
									    $selecteone="";
									}	
							  ?>
							  
							
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><?php echo $taskcategory->management_name;?></label>
								<input type="checkbox" name="management_access[]" value="<?php echo $taskcategory->id;?>" id="management_access" <?php echo $selecteone;?>>
							       <div id="management_access_error" class="error_div" style="color:red;"></div>
							 </div>
							 
							 <?php  }?>
							 
							 
							 
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									   <option value="1" <?php if($dataone_fetch[0]->status==1){echo "selected";}else{echo "";}?>>Active</option>
									   <option value="0" <?php if($dataone_fetch[0]->status==0){echo "selected";}else{echo "";}?>>Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Submit" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('sports/index'); ?>">Cancel</a>
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
		     url: "<?php echo base_url(); ?>index.php/subadmin/check_unique_username_edit",
		     async:false,
		     data: {
		      username:username,
		      id:id
		     
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
			 if($.trim($('#password').val())!='' || $.trim($('#conf_password').val())!='')
		         {
        		
		    if($.trim($('#conf_password').val()) !== $.trim($('#password').val()))
		    {
        		$('#conf_password_error').html('Password Must Match Please');
        		$('#conf_password').css('border-color','red');
        		$('#conf_password').focus();
			has_error++
        		return false;
		    }
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