<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<!--<script type="text/javascript" src="<?php //echo base_url(); ?>ckeditor/ckeditor.js"></script>-->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Life style Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add Life style ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('lifestyle/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('lifestyle/insert_lifestyle');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							
                                                         <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Life style Name:</label>
								<input type="text" class="span9 required" label="Life style Name" name="name" id="name" style="width: 50%;" onblur="check_unic(this.value);">
								<div id="name_error" class="error_div" style="color:red;"></div>
					  <input type="hidden" class="span9 required" label="Life style Name" name="tablename" id="tablename" style="width: 50%;" value="lifestyle">
					  <input type="hidden" class="span9 required" label="Life style Name" name="feildname" id="feildname" style="width: 50%;" value="name">
					  <input type="hidden" class="span9 required" label="Life style Name" name="uniccheak" id="uniccheak" style="width: 50%;" value="">
		     
							 </div>
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Add Life style" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('lifestyle/index'); ?>">Cancel</a>
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
			   var feildname=$("#feildname").val();
			    var tablename=$("#tablename").val();
			$("#name_error").val('');
			var val=$("#name").val();
			 if (val.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/lifestyle/check_unic",
			data: {
		         val:val,
			 tablename:tablename,
			feildname:feildname
			
			},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				//alert(response_array[1]);
				if (response_array[1]==0) {
					//if (has_error==0) {
				$('#new_category').submit();
			 //}
				}
				else
				{
					$("#name_error").html('Data is not available.')
					
				}
			}
		})
	}
			
			 
		  });
	   });
	   
//	   function check_unic(val) {
//	   var feildname=$("#feildname").val();
//	   var tablename=$("#tablename").val();
//       $("#name_error").val('');
//	if (val.search(/\S/)!=-1) {
//			$.ajax({
//			url: "<?php echo base_url(); ?>index.php/lifestyle/check_unic",
//			data: {
//		         val:val,
//			 tablename:tablename,
//			feildname:feildname
//			
//			},
//			success: function(response) {
//				var response_array = response.split('[SEPARETOR]');
//				//alert(response_array[1]);
//				if (response_array[1]==0) {
//					$("#name_error").html('')
//					$("#uniccheak").val('0')
//				}
//				else
//				{
//					$("#name_error").html('Data is not available.')
//					$("#uniccheak").val('1')
//				}
//			}
//		})
//	}
//}
    </script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>