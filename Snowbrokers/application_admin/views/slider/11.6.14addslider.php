<?php
$this->load->view('includes/header');

?>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Slider Management</h4>
        </div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>Add Slider ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
					</div>
				</div>
				<div class="row-fluid filter-block">
					<div class="pull-right">
						<a class="btn-flat new-product" href="<?php echo site_url('slider/index'); ?>">< View List</a>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
				<!-- left column -->
				<div class="span9 with-sidebar" style="margin-bottom: 30px;">
					<div class="container">
						<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('slider/insert_slider');?>" name="new_user" id="new_user" method="post" autocomplete="off">
							<input type="hidden" name="username_hidden" id="username_hidden" value="0">
							<input type="hidden" name="email_hidden" id="email_hidden" value="0">
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Title:</label>
								<input type="text" class="span9 required" label="Title" name="title" id="title" style="width: 50%;">
								<div id="title_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box">
									     <label><span style="color: red;">*</span>Image: </label>
									     <input id="image_val" type="hidden" name="image_val" value="1">
									     <input type="file"   class="span6" name="photo" value=""  id="photo"  />
								             <div id="photo_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Description :</label>
								<textarea class="span9" label="Description" name="message" id="message"></textarea>
								<div id="message_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" >
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							
							<div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Create Slider" class="btn-glow primary" id="createSlider">
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
	$('#createSlider').click(function (e) {
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
		if(CKEDITOR.instances.message.getData()=='') {
			    $('#message_error').html("Add description");
			    $('#message_error').css('color','red');
			    $('#message').focus();
			    has_error=has_error+1;
			    return false;
			    }
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

 CKEDITOR.replace( 'message',
       {
       
       height: 250,
       width: 600
       });
		
</script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>