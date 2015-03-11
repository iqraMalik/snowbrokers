<?php
$this->load->view('includes/header');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Manage user section Management</h4>
        </div>
    </div>
    <div class="row-fluid">
            <div id="main-stats">
                <div class="table-products">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Add Manage user section ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat new-product" href="<?php echo site_url('manage_user_section/index'); ?>">< View List</a>
                        </div>
                    </div>
                    <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
                        <div class="container">
                            <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('manage_user_section/insert_manage_user_section');?>" id="frmValidation" method="post">
			    
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label><span style="color: red;">*</span>Title:</label>
                                    <input type="text" class="span9" name="title" id="title" style="width: 50%;" value="<?php echo set_value('title'); ?>">
				    <div id="title_error" style="color:red;"><?php echo form_error('title'); ?></div>
                                </div>
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label><span style="color: red;">*</span>Logo:</label>
				    <input type="hidden" name="imagecheak" id="imagecheak" value="0">
				    <input id="image_val" type="hidden" name="image_val" value="1">
                                    <input type="file" class="span9" name="logo" id="logo" style="width: 50%;" value="<?php echo set_value('logo'); ?>">
				    <div id="logo_error" style="color:red;"><?php echo form_error('logo'); ?></div>
                                </div>
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Description :</label>
								<textarea class="span9" label="Description" name="message" id="message"></textarea>
								<div id="message_error" class="error_div" style="color:red;"></div>
							 </div>
			        <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
					<label>Status:</label>
					 <div class="ui-select">
					    <select name="status" id="status">
						    <option value="1">Active</option>
						    <option value="0">Inactive</option>
					    </select>
					</div>
				</div>
				
			       
                                <div class="span11 field-box actions" style="margin-top: 20px;">
                                    <input type="button" value="Submit" class="btn-glow primary" id="createTaskCat">
                                    <span>OR</span>
                                    <a class="btn-flat new-product" href="<?php echo site_url('manage_user_section/index'); ?>">Cancel</a>
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
 var _URL = window.URL || window.webkitURL;
$("#logo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            //alert(this.width + " " + this.height);
	    if (this.width !=360) {
	      //alert(this.width);
	      $('#logo_error').html('File size should be 360x220');
	      //has_error++;
	      $('#imagecheak').val(1);
	      return false;
	    }
	    else{
	    $('#imagecheak').val(0);
	      return true;
       
	    }
	     if (this.height !=220) {
	      $('#logo_error').html('File size should be 360x220');
	       //has_error++;
	         $('#imagecheak').val(1);
	      return false;
	    }
	    else{
	        $('#imagecheak').val(0);
	      return true;
	    }
        };
        img.src = _URL.createObjectURL(file);
    }
});	    
    
    $(document).ready(function () {
	$('#createTaskCat').click(function (e) {
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
		if ($.trim($('#logo').val())=='')
		{
			$('#logo_error').html('Please input file');
        		$('#logo_error').css('border-color','red');
        		$('#logo_error').focus();
        		return false;
		}
		
                   var fileName = document.getElementById("logo").value;
                var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
 //alert(ext);

  
	      if (fileName!='')
	      {
                 if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
                    {
                        var imagecheak= $('#imagecheak').val();
			//alert(imagecheak);
			if (imagecheak==0) {
			 document.getElementById("frmValidation").submit();   
			}
			else{
			    $('#logo_error').html('File size should be 360x220 px');
			    $('#logo_error').css('border-color','red');
			    $('#logo_error').focus();
			    return false;
			}
        		
                    }
	      
                    else{
                        $('#logo_error').html('File type should be jpeg/jpg/png/gif');
        		$('#logo_error').css('border-color','red');
        		$('#logo_error').focus();
        		return false;
                    }
	      }
		   else
	      {
		     document.getElementById("frmValidation").submit();     
	      }  
        
	});
});
    
CKEDITOR.replace( 'message',
       {
       
       height: 250,
       width: 600
       });
  
</script>
<?php $this->load->view('includes/footer'); ?>