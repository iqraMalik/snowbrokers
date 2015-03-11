<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->

    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Social Media Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add Media ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('category/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('media/insert_media');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Label (In English) :</label>
								<input type="hidden" name="relval" id="relval" value="">
								<input type="text" class="span9 required" label="Label in English" name="label_in_english" id="label_in_english" style="width: 50%;" onblur="CitynameAvailability(this.value);">
								<div id="label_in_english_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Label (In Parsian):</label>
								<input type="hidden" name="relval_pe" id="relval_pe" value="">
								<input type="text" class="span9 required" label="Label in Parsian" name="label_in_pe" id="label_in_pe" style="width: 50%;" onblur="CitynameAvailability_persi(this.value);">
								<div id="label_in_pe_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Label (In Pasto):</label>
								<input type="hidden" name="relval_pa" id="relval_pa" value="">
								<input type="text" class="span9 required" label="Label in Pasto" name="label_in_pa" id="label_in_pa" style="width: 50%;" onblur="CitynameAvailability_pashto(this.value);">
								<div id="label_in_pa_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Link :</label>								
								<input type="text" class="span9 required" label="link" name="link" id="link" style="width: 50%;" onblur="CitynameAvailability_pashto(this.value);">
								<div id="link_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Icon :</label>
							       <input type="file" class="span9 required" name="icon" id="icon" label="Icon>
							       <div id="icon_error" class="error_div" style="color:red;"></div>
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
								<input type="button" value="Create Label" class="btn-glow primary" id="createLabel">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('media/index'); ?>">Cancel</a>
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
		  $('#createLabel').click(function (e) {
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
				$('#new_category').submit();
			 }
		  });
	   });
	  

 </script>
<script>

	      //CKEDITOR.replace('description');
	      //CKEDITOR.resize( '100%', '100%' );
	      CKEDITOR.replace( 'a_desc',
       {
       
       height: 250,
       width: 600
       });
				
CKEDITOR.replace( 'a_desc_pe',
       {
       
       height: 250,
       width: 600
       });
CKEDITOR.replace( 'a_desc_pa',
       {
       
       height: 250,
       width: 600
       });
</script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>