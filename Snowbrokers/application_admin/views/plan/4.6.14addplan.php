<?php
$this->load->view('includes/header');

?>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Plan Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add plan</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('plan/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('plan/insert_plan');?>" name="new_static_page" id="new_static_page" method="post" autocomplete="off">
							 
							 <!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Plan Name:</label>
								 <input type="text" name="planname" id="planname" label="planname" class="span9 required">
								
								</div>
								<div id="planname_error" class="error_div" style="color:red;"></div>-->
							
					   <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Plan Name :</label>
							       <input type="text" name="planname" id="planname" label="planname" class="span9 required">
							       <div id="planname_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>price :</label>
							       <input type="text" name="price" id="price" label="Price" class="span9 required">
							       <div id="price_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Description :</label>
								<textarea class="span9" label="Plan Details" name="details" id="details"></textarea>
								<div id="details_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Features :</label>
							        <input id="image_val" type="hidden" name="image_val" value="1">
							       <input type="text" name="features[]" id="features" label="fetures" class="span9 required">
							       <div id="fetures_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div id="addimageportion" > <div ></div></div>
							<div class="span12 field-box" id="url_add_more"><a href="javascript:void(0)" onclick="add_multi_row()">Add More Features</a></div>
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
								<input type="button" value="Create Plan" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('plan/index'); ?>">Cancel</a>
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
			
	               if(CKEDITOR.instances.details.getData()=='') {
        		$('#details_error').html("Add details");
        		$('#details_error').css('color','red');
        		$('#details_error').focus();
			has_error=has_error+1;
        		return false;
		     }
		     
			 if (has_error==0) {
				$('#new_static_page').submit();
			 }
			 else
			 return false;
		  });
	   });
    </script>
    <script>

                                //CKEDITOR.replace('description');
				//CKEDITOR.resize( '100%', '100%' );
				CKEDITOR.replace( 'details',
    {
       
        height: 250,
        width: 600
    });
       function deleteMultiRowYoutube(this_id)
        {
		

                $('#additional_div_id'+this_id).remove();
                //alert(count_div);
		auto_val--;
		 document.getElementById("image_val").value =auto_val;
        }
	function add_multi_row(any)
	{
           
	 
		var table_id_val = 'additional_div_id'+auto_val;
               
               var function_id = 'add_state'+auto_val;
               
    
               var innerHTML=  '<div id='+table_id_val+' class="span12 field-box"><label class="span3">Features</label><div class="input3"><input type="text"  class="span6" name="features[]"  autocomplete="off" id="features'+auto_val+'" label="Features"  /><a href="JavaScript:void(0);" class="delete_pack" onclick="deleteMultiRowYoutube('+auto_val+');" >Delete </a><div id="features_error"></div></div>';
               
   
               $('#addimageportion').append(innerHTML);
		auto_val++;	    
	      document.getElementById("image_val").value =auto_val;
               

	}			

                     </script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>