<?php
$this->load->view('includes/header');
$last = $this->uri->total_segments();
$rid = $this->uri->segment($last);
$dataone_fetch = $this->model_middle_banner->edit_banner_home_footer($rid);

if(isset($dataone_fetch))
{
     //echo '<pre>';
     //print_r($dataone_fetch);
}
//print_r($dataone_fetch);die();
?>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
      <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Middle Banner Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit </h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('middle_banner/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user" enctype="multipart/form-data" action="<?php echo site_url('middle_banner/update_banner_home_footer');?>" name="new_user" id="new_user" method="post" autocomplete="off">
             
						  <div class="span12 field-box">
						       <div class="span12 field-box">
									     <!--<label><span style="color: red;">*</span>Heading : </label>
									     <input type="text" class="span9 required"  label="Heading" name="heading" id="heading" style="width: 50%;"  value="<?php /*echo $dataone_fetch->heading;*/ ?>">-->
											
								<div id="heading_error" class="error_div" style="color:red;"></div> 
						       </div>
                                                        
                                                         <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								 <img src="<?php if(isset($dataone_fetch)) {  echo $dataone_fetch->icon; }?>" style=" width: 200px; height: 170px; "/>
								<label> Icon :</label>
								
								<input type="file" name="image_icon" id="image_icon" required/>
								<div id="image_icon_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								 <img src="<?php if(isset($dataone_fetch)) {  echo $dataone_fetch->image; }?>" />
								<label> Image :</label>
								
								<input type="file" name="image" id="image" required/>
								<!--<textarea class="span9" label="Details" name="details" id=""><?php /*echo $dataone_fetch->top;*/?></textarea>-->
								<div id="details_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label> Details :</label>
								
								<textarea class="span9" label="Details" name="details" id="details" required><?php echo $dataone_fetch->details;?></textarea>
								<div id="details_error" class="error_div" style="color:red;"></div>
							 </div>
                                                        <!--<div class="span12 field-box">
							<label><span style="color: red;">*</span>Previous Image : </label>
							<input id="image" type="hidden" name="image" value="1">
							
							
							<td><img src="<?php /*echo $this->config->item('base_url').'banner_home/image/'.$dataone_fetch->image;*/?>" /></td>
                                                
							
							<div id="image_error" class="error_div" style="color:red;"></div>
							</div>
					
						
							 <div class="span12 field-box">
									     <label class ="span3">Image: </label>
									     <input type="file"   class="span6" name="photo" value=""  id="photo"  />
									     <label> </label>
								             <div id="photo_error" class="error_div" style="color:red;"></div>
							</div>-->
							
							
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="submit" value="Edit" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('middle_banner/index'); ?>">Cancel</a>
							 </div>
						  </form>
					   </div>
				    </div>
				</div>
			 </div>
		  </div>
	   </div>
    </div>
      <input type="hidden" name="id" id="id" value="<?php if(isset($dataone_fetch)) { echo $dataone_fetch->id; } ?>">
    
    
<script type="text/javascript">

 //var auto_val=1;
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
				//alert(des);
			    $('#details_error').html("Add  Details");
			    $('#details_error').css('color','red');
			    $('#details_error').focus();
			    has_error=has_error+1;
			    
			    }
			
			 if (has_error==0) {
				$('#new_user').submit();
			 }
			 else
			 return false;
		  });
	   });
</script>
<script>

           CKEDITOR.replace( 'details',
       {
       
       height: 250,
       width: 600
       });
	   </script>
    <?php $this->load->view('includes/footer'); ?>