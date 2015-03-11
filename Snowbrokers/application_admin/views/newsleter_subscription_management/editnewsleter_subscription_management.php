<?php
$this->load->view('includes/header');

$dataone_fetch = $this->modelnewsletr_subscription_management->edit_news_channel();

//print_r($dataone_fetch);die();
?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4> Newsleter Subscription Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit newsleter</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('newsleter_subscription_management/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user" enctype="multipart/form-data" action="<?php echo site_url('newsleter_subscription_management/update_newsleter_subscription_management');?>" name="new_user" id="new_user" method="post" autocomplete="off" onsubmit="return validate()">
						 <input type="hidden" name="id" id="id" value="<?php echo $dataone_fetch->id; ?>">
<!--						  <div class="span12 field-box">
							<label><span style="color: red;">*</span>Name : </label>
							<input type="text" class="span9 required"  label="Name" name="name" id="name" style="width: 50%;"  value="<?php echo $dataone_fetch->name; ?>">
							<div id="name_error" class="error_div" style="color:red;"></div> 
						 </div>
-->                                                 <div class="span12 field-box">
							<label><span style="color: red;">*</span>Email : </label>
							<input type="text" class="span9 required"  label="Email" name="email" id="email" style="width: 50%;"  value="<?php echo $dataone_fetch->email; ?>" >
							<div id="email_error" class="error_div" style="color:red;"></div> 
						 </div>
                                                       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Status :</label>
								<div class="ui-select">
								   <select name="status" id="status">
									   <option value="1" <?php if($dataone_fetch->status==1){echo "selected";}?>>Active</option>
									   <option value="0" <?php if($dataone_fetch->status==0){echo "selected";}?>>Inactive</option>
								   </select>
							       </div>
						       </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Edit Newsleter Subscription " class="btn-glow primary" id="createUser">
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
    <?php $this->load->view('includes/footer'); ?>