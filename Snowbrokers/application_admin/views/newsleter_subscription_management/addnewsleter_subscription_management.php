<?php
$this->load->view('includes/header');

?>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>-->
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>News channel Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add newsleter</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('newsleter_subscription_management/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('newsleter_subscription_management/insert_newsleter_subscription_management');?>" name="new_user" id="new_user" method="post" autocomplete="off" onsubmit="return validate()">
							 
							 <!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Plan Name:</label>
								 <input type="text" name="planname" id="planname" label="planname" class="span9 required">
								
								</div>
								<div id="planname_error" class="error_div" style="color:red;"></div>-->
							
					  <!-- <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Name :</label>
							       <input type="text" name="name" id="name" label="Name" class="span9 required">
							       <div id="name_error" class="error_div" style="color:red;"></div>
							 </div>-->
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Email :</label>
							       <input type="text" name="email" id="email" label="Email" class="span9 required" >
							       <div id="email_error" class="error_div" style="color:red;"></div>
							 </div>
							 
							  
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Create newsleter" class="btn-glow primary" id="createUser" >
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('newsleter_subscription_management/index'); ?>">Cancel</a>
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
       var auto_val=1;
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
			
			 if (has_error==0) {
				$('#new_user').submit();
			 }
			 else
			 return false;
		  });
	   });
	function validate() {
    var x = document.forms["new_user"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
        alert("Not a valid e-mail address");
        return false;
    }
    else
    {
     return true;  
    }
}

    
    </script>
   
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>