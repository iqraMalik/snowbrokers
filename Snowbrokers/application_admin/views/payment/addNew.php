<?php
$this->load->view('includes/header');
?>
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Who We Are Management</h4>
        </div>
    </div>
    <div class="row-fluid">
            <div id="main-stats">
                <div class="table-products">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Add Who we are ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat new-product" href="<?php echo site_url('who_we_are/index'); ?>">< View List</a>
                        </div>
                    </div>
                    <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
                        <div class="container">
                            <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('who_we_are/insert_who_we_are');?>" id="frmValidation" method="post">
			    
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label><span style="color: red;">*</span>Title:</label>
                                    <input type="text" class="span9" name="title" id="title" style="width: 50%;" value="<?php echo set_value('title'); ?>">
				    <div id="title_error" style="color:red;"><?php echo form_error('title'); ?></div>
                                </div>
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label><span style="color: red;">*</span>Logo:</label>
                                    <input type="file" class="span9" name="logo" id="logo" style="width: 50%;" value="<?php echo set_value('logo'); ?>">
				    <div id="logo_error" style="color:red;"><?php echo form_error('logo'); ?></div>
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
                                    <input type="button" value="Add Task Category" class="btn-glow primary" id="createTaskCat">
                                    <span>OR</span>
                                    <a class="btn-flat new-product" href="<?php echo site_url('who_we_are/index'); ?>">Cancel</a>
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
	    
    
    $(function () {
        $('#createTaskCat').click(function (e) {

			var fileName=document.getElementById("logo").value;
			var ext1 = fileName.substring(fileName.lastIndexOf('.') + 1)
			
			$('#title_error').html('');
			$('#logo_error').html('');
		    
        	if($.trim($('#title').val())=='' || $.trim($('#title').val())==0)
		{
        		$('#title_error').html('Title Please');
        		$('#title').css('border-color','red');
        		$('#title').focus();
        		return false;
        	}
		
		 if($.trim($('#logo').val())=='' || $.trim($('#logo').val())==0)
		{
        		$('#logo_error').html('logo Please');
        		$('#logo').css('border-color','red');
        		$('#logo').focus();
        		return false;
        	}
		
		 if(ext1 == "gif" || ext1 == "GIF" || ext1 == "JPEG" || ext1 == "jpeg" || ext1 == "jpg" || ext1 == "JPG" || ext1 == "png" || ext1 == "PNG")
		{
			document.getElementById("logo_error").innerHTML='';
		}
		else
		{
			$('#logo_error').html('Invalid image (gif,jpg,jpeg, png are allow)');
        		$('#logo').css('border-color','red');
        		$('#logo').focus();
        		return false;
		}
		  
			
		$( "#frmValidation" ).submit();
		return true;
        	
        });
    });

  
</script>
<?php $this->load->view('includes/footer'); ?>