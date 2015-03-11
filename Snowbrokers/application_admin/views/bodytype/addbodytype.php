<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<!--<script type="text/javascript" src="<?php //echo base_url(); ?>ckeditor/ckeditor.js"></script>-->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Bodytype</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add Bodytype ( <span style="color: red;">*</span> <?php echo $this->lang->line("Fields_are_mandatory");?>)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('bodytype/index'); ?>">< view list</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('bodytype/insert_bodytype');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Bodytype :</label>
								
								<input type="text" class="span9 required" label="Bodytype " name="bodytype_en" id="bodytype_en" style="width: 50%;" >
								      <input type="hidden" class="span9 required" label="Life style Name" name="tablename" id="tablename" style="width: 50%;" value="bodytype">
					  <input type="hidden" class="span9 required" label="Life style Name" name="feildname" id="feildname" style="width: 50%;" value="body_type">
					  <input type="hidden" class="span9 required" label="Life style Name" name="uniccheak" id="uniccheak" style="width: 50%;" value="">
								<div id="bodytype_en_error" class="error_div" style="color:red;"></div>
							 </div>
                                                         <!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Bodytype (in persian) :</label>
								
								<input type="text" class="span9 required" label="Bodytype (In persian)" name="bodytype_pe" id="bodytype_pe" style="width: 50%;" onblur="CitynameAvailability_persi(this.value);">
								<div id="bodytype_pe_error" class="error_div" style="color:red;"></div>
							 </div>
                                                         <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Bodytype (In Pasto) :</label>
								<input type="hidden" name="relval_pa" id="relval_pa" value="">
								<input type="text" class="span9 required" label="Bodytype (In Pasto)" name="bodytype_pa" id="bodytype_pa" style="width: 50%;" onblur="CitynameAvailability_pashto(this.value);">
								<div id="bodytype_pa_error" class="error_div" style="color:red;"></div>
							 </div>-->
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Add Bodytype" class="btn-glow primary" id="createUser">
								<span><?php echo $this->lang->line("OR");?></span>
								<a class="btn-flat new-product" href="<?php echo site_url('bodytype/index'); ?>">cancel</a>
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
//       function check_unic(val) {
//	   var feildname=$("#feildname").val();
//	   var tablename=$("#tablename").val();
//       $("#bodytype_en_error").val('');
//	if (val.search(/\S/)!=-1) {
//			$.ajax({
//			url: "<?php echo base_url(); ?>index.php/bodytype/check_unic",
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
//					$("#bodytype_en_error").html('')
//					$("#uniccheak").val('0')
//				}
//				else
//				{
//					$("#bodytype_en_error").html('Data is not available.')
//					$("#uniccheak").val('1')
//				}
//			}
//		})
//	}
//}
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
				    error_div.html(element_label+'is required')
				    has_error++
				}
			 })
       var feildname=$("#feildname").val();
	   var tablename=$("#tablename").val();
	   var val=$("#bodytype_en").val();
       $("#bodytype_en_error").val('');
	if (val.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/bodytype/check_unic",
			data: {
		         val:val,
			 tablename:tablename,
			feildname:feildname
			
			},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				//alert(response_array[1]);
				if (response_array[1]==0) {
			   
				 
				$('#new_category').submit();
			        
				}
				else
				{
			    $("#bodytype_en_error").html('Data is not available.')
					
				}
			}
		})
	} 
	
	
		  });
	   });
      
    </script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>