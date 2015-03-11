<?php
$this->load->view('includes/header');

$dataone_fetch = $this->slidermodel->edit_slider();

//print_r($dataone_fetch);die();
?>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
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
	       <input type="hidden" name="imagecheak" id="imagecheak" value="0">
						 <!-- <div class="span12 field-box">
									     <label><span style="color: red;">*</span>Title : </label>
									     <input type="text" class="span9 required"  label="Title" name="title" id="title" style="width: 50%;"  value="<?php //echo $dataone_fetch->title; ?>">
								<label><span style="color: red;"></span>If you want to Make The text Bold you have to write [BOLD] as example 1.Lorem ipsum,[BOLD]Gonsectet abore[/BOLD]</span>			
								<div id="title_error" class="error_div" style="color:red;"></div> 
							</div>-->
                                                        
                                                        
                                                        <div class="span12 field-box" style="padding-bottom: 30px;">
							<label><span style="color: red;">*</span>Previous Image : </label>
							<input id="image" type="hidden" name="image" value="1">
							
							
			    <img src="<?php echo $this->config->item('slider_img_url').$dataone_fetch->image;?>" height="300px;" width="300px;"/>
                                                
							
							<div id="image_error" class="error_div" style="color:red;"></div>
							</div>
					
						
							 <div class="span12 field-box">
									     <label class ="span3">Image: </label>
									    
									     <input type="file"   class="span6" name="photo" value=""  id="photo"  />
								             <div id="photo_error" class="error_div" style="color:red;"></div>
							</div>
							<!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Description :</label>
								<textarea class="span9" label="Description" name="message" id="message"><?php echo $dataone_fetch->message; ?></textarea>
								<div id="message_error" class="error_div" style="color:red;"></div>
							 </div>-->
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
								<input type="button" value="Edit Slider" class="btn-glow primary" id="createSlider">
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
 var _URL = window.URL || window.webkitURL;
$("#photo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            //alert(this.width + " " + this.height);
	    if (this.width !=2095) {
	      //alert(this.width);
	      $('#photo_error').html('File size should be 2095x740');
	      //has_error++;
	      $('#imagecheak').val(1);
	      return false;
	    }
	    else{
	      $('#imagecheak').val(0);
	      return true;
        
	    }
	     if (this.height !=740) {
	      $('#photo_error').html('File size should be 2095x740');
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
		
		//if(CKEDITOR.instances.message.getData()=='') {
		//	    $('#message_error').html("Add description");
		//	    $('#message_error').css('color','red');
		//	    $('#message').focus();
		//	    has_error=has_error+1;
		//	    return false;
		//	    }
		
		
              var fileName = document.getElementById("photo").value;
                var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
 //alert(ext);

	      if (fileName!='')
	      {
		     if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
                    {
			var imagecheak= $('#imagecheak').val();
			//alert(imagecheak);
			if (imagecheak==0) {
			 document.getElementById("new_user").submit();   
			}
			else{
			    $('#photo_error').html('File size should be 2095x740');
			    $('#photo_error').css('border-color','red');
			    $('#photo_error').focus();
			    return false;
			}
        		
                    }
                    else{
                        $('#photo_error').html('File type should be jpeg/jpg/png/gif');
        		$('#photo_error').css('border-color','red');
        		$('#photo_error').focus();
        		return false;
                    }
	      }
              else
	      {
		     document.getElementById("new_user").submit();     
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