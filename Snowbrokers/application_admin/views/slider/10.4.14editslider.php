<?php
$this->load->view('includes/header');

$dataone_fetch = $this->slidermodel->edit_slider();

//print_r($dataone_fetch);die();
?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4> Slider Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Slider</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('slider/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user" enctype="multipart/form-data" action="<?php echo site_url('slider/update_slider');?>" name="new_user" id="new_user" method="post" autocomplete="off">
               <input type="hidden" name="ListingUserid" id="ListingUserid" value="<?php echo $dataone_fetch->id; ?>">
						  <div class="span12 field-box">
									     <label class ="span3">Title : </label>
									     <input type="text" class="span9 required"  label="Title" name="title" id="title" style="width: 50%;"  value="<?php echo $dataone_fetch->title; ?>">
											
								<div id="title_error" class="error_div" style="color:red;"></div> 
							</div>
                                                        
                                                        
                                                        <div class="span12 field-box">
							<label class ="span3">Previous Image : </label>
							<input id="image" type="hidden" name="image" value="1">
							
							
			    <img src="<?php echo $this->config->item('slider_img_url').$dataone_fetch->image;?>" />
                                                
							
							<div id="image_error" class="error_div"></div>
							</div>
					
						
							 <div class="span12 field-box">
									     <label class ="span3">Image: </label>
									     <input id="auto_val" type="hidden" name="auto_val" value="1">
									     <input type="file"   class="span6" name="photo" value=""  id="photo"  />
								             <div id="photo_error" class="error_div"></div>
							</div>
							
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label class ="span3">Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" >
									   <option value="1"<?php if($dataone_fetch->status==1){echo "selected";} ?>>Active</option>
									   <option value="0"<?php if($dataone_fetch->status==0){echo "selected";} ?>>Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Edit Slider" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('slider/index'); ?>">Cancel</a>
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
	      alert("aswasa");
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
		
		if ($.trim($('#photo').val())=='')
		{
			$('#photo_error').html('Please input file');
        		$('#photo_error').css('border-color','red');
        		$('#photo_error').focus();
        		return false;
		}
		
                   var fileName = document.getElementById("photo").value;
                var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
 //alert(ext);
 
  
                 if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
                    {
                       document.getElementById("new_user").submit();
        		
                    }
                    else{
                        $('#photo_error').html('File type should be jpeg/jpg/png/gif');
        		$('#photo_error').css('border-color','red');
        		$('#photo_error').focus();
        		return false;
                    }
        
	});
});


    <?php $this->load->view('includes/footer'); ?>