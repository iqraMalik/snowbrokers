<?php
$this->load->view('includes/header');

?>

<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->

<script src="http://malsup.github.com/jquery.form.js"></script> 
<script type="text/javascript">
$(document).ready(function () {
  
	$('#createUser').click(function (e) {
		e.preventDefault();              
		$('.span9').css('border-color','#B2BFC7');
		$('.error_div').html('');
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
				    has_error++;
				}
			 }) 
	   
                    
                        if(has_error==0)
                        {
                           
                            $('#new_event').submit();
                        }
			
		
	});
});

function show_recurring(event_type)
{
	
 if (event_type==2) {
		//recurring_div
		$('#recurring_div').show();
		$('#recurring_div1').show();
		var recurring_type = document.getElementById("recurring_type").value;
		 var reccring_upto = document.getElementById("reccring_upto").value;
		if (recurring_type =='')
		{
			$('#recurring_type_error').html('Recurring Type is Required');

			has_error++;
		}
		if (reccring_upto =='')
		{
			$('#reccring_upto_error').html('Recurring Upto is Required');

			has_error++;
		}

	      }
	      else{
		$('#recurring_div').hide();
		$('#recurring_div1').hide();
	      }	
}
function Select_state(country_id)
{
     $.ajax({
                    url: "<?php echo base_url(); ?>index.php/event/Select_state",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
                      
                           $('#state').html(response);
                            
                           }
                          
                          
                    
                })
}

</script>

<script type="text/javascript">	
	function instant_change1() {		
		
		var frm1=document.new_album; 
		
		var error =0;		
		
		var files = document.getElementById("photos_albumn").files;
		len = files.length;


		for(var i = 0; i < len; i++)
		{
		    var fileName=files[i].name;
		    
		    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		   
		    
		    if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
		    {
			error--;
		    } 
		    else
		    {
			
			    document.getElementById("photos_albumn_error").style.display="block";
			    document.getElementById("photos_albumn_error").innerHTML='<div style=color:red>Invalid image (gif,jpg,jpeg, png are allow)</div>';
			    document.getElementById("photos_albumn_error").focus();
			    error++;
		    }
		}
    // the file is the first element in the files property
    //var filesss = document.getElementById('photoimg').files[0];   
		
		
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		
		if(error < len || error==0)
		{
		    
			
				//var a = document.getElementById('photoimg');
    
				//for (var i = 0; i < a.files.length; i++) 
					
					//if (i<limit_image) {
						//code
					
						document.getElementById("photos_albumn_error").innerHTML='';
						var options = { 
						target:        '#preview',   // target element(s) to be updated with server response 
						beforeSubmit:  showRequest,  // pre-submit callback				
						success:       showResponse1,  // post-submit callback
						
						// other available options:
						url:'<?php echo site_url('album/upload_albumn/'); ?>',	
						      // override for form's 'action' attribute 
						//type:      type        // 'get' or 'post', override for form's 'method' attribute 
						//dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
						//clearForm: true        // clear all form fields after successful submit 
						//resetForm: true        // reset the form after successful submit 
						// $.ajax options can be used here too, for example: 
						//timeout:   3000 
						};
						$(frm1).ajaxSubmit(options);
					
				
			
		}
		
	}

	function showRequest(formData, jqForm, options) {
				//var $=jQuery.noConflict();
			// formData is an array; here we use $.param to convert it to a string to display it 
			// but the form plugin does this for you automatically when it submits the data 
			var queryString = $.param(formData); 
		     
			// jqForm is a jQuery object encapsulating the form element.  To access the 
			// DOM element for the form do this: 
			 //var formElement = jqForm[0]; 
		    
			//alert('About to submit: \n\n' + queryString); 
		     
			// here we could return false to prevent the form from being submitted; 
			// returning anything other than false will allow the form submit to continue 
			return true;
	}
	function showResponse1(responseText, statusText, xhr, $form)  {
		
		//document.getElementById('photo').innerHTML=responseText;
		
		//$("#image_load").html("");
		//$("#image_load").html('<img id="photo" src="'+responseText+'">');
		//var res = responseText.split("crop_thumb/"); 
		alert(responseText);
		$("#preview").val(responseText);
		//$("#can_image").css('display','block');
		//document.getElementById('photo_albumn').value='';
		//
		//$("#show_loader").css('display','none');
	
 
	}
	
	function del_image(image,id)
	{
	    var total_photos = $('#total_photos').val(); 
		var res = confirm("Are you sure to delete this image?");
		
		
		if (res==true) {
				$.ajax({
			   url: "<?php echo base_url(); ?>signup/del_image",
			   data: {
			       image:image,
			       id:id
			   },
			   success: function(response) {
			     var total_photosnow = total_photos-1;
                                $('#total_photos').val(total_photosnow); 
				   $("#"+id).remove();
				    if (total_photosnow==0) {
                                    $("#can_image").css('display','none');
                               }
				   
			   }
		      });
		}
	}
</script>

<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Album Management</h4>
        </div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>Add Album ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
					</div>
				</div>
				<div class="row-fluid filter-block">
				   <div class="pull-right">
						<a class="btn-flat new-product" href="<?php echo site_url('album/index'); ?>">< View List</a>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
				<!-- left column -->
				<div class="span9 with-sidebar">
					<div class="container">
						<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('album/insert_group');?>" name="new_album" id="new_album" method="post" autocomplete="off">
						
							<input type="hidden" name="email_hidden" id="email_hidden" value="">
							<input type="hidden" name="password_length" id="password_length" value="">
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								 <label><span style="color: red;">*</span>Album name</label>
								<input type="text" class="span9 required" label="Album Name" name="albumn_name" id="albumn_name" style="width: 50%;" value=""/>
								 <div id="albumn_name_error" class="error_div" style="color:red;"></div>
								
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								 <label><span style="color: red;">*</span>Upload Image</label>
								<input type="file" onchange="instant_change1();" class="span9 required" name="photos_albumn[]" label="Image"  id="photos_albumn" multiple="true">
							   
								    <div id="photos_albumn_error" class="error_div" style="color:red;"></div>
								     <div id="preview"></div>
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
								<input type="button" value="createUser" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('album/index'); ?>">Cancel</a>
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



</script>
<!-- taskaroo-->
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>