<?php
$this->load->view('includes/header');
//print_r($edit_task);
?>
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Task Sub-Category Management</h4>
        </div>
    </div>
    <div class="row-fluid">
            <div id="main-stats">
                <div class="table-products">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Edit Task Sub-Category</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat new-product" href="<?php echo site_url('task_sub_category/index'); ?>">< View List</a>
                        </div>
                    </div>
                    <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
                        <div class="container">
                            <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('task_sub_category/update_task_sub_category');?>" id="frmValidation" method="post">
			    <input type="hidden" name="task_id" id="task_id" value="<?php echo $edit_task[0]->id;?>"/>
			    <input type="hidden" name="logo_name_hidden" id="logo_name_hidden" value="<?php echo $edit_task[0]->logo;?>"/>
                            
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label>Title:</label>
                                    <input type="text" class="span9" name="title" id="title" style="width: 50%;" value="<?php echo set_value('title'); ?><?php echo $edit_task[0]->title;?>">
				    <div id="title_error" style="color:red;"><?php echo form_error('title'); ?></div>
                                </div>
                                
                                <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
					<label>Sub-Category Type :</label>
					<select name="category_type" id="category_type" class="span5">
					    <option value="">Category Type</option>
					   <?php if(count($list) > 0){ ?>
					    <?php for($i=0; $i < count($list);$i++): ?>
					    <option value="<?php echo $list[$i]->id; ?>" <?php if($list[$i]->id == $edit_task[0]->category_id){ echo 'selected';} ?>><?php echo $list[$i]->title;?></option>
					    <?php endfor; }else{ ?>
					    <option value="">No Category to show</option>
					    <?php }?>
					</select>
					<div id="category_type_error" style="color:red;"><?php echo form_error('category_type'); ?></div>
			       </div>
                               
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label>Category Logo:(Present Logo)</label>
                                    <img src="<?php echo GET_LOGO_PATH;?>task_sub_cat_logo/thumbnail/<?php echo $edit_task[0]->logo; ?>" height="80" width="100"><br/>
                                    <label><u>Change logo:</u></label>
                                    <input type="file" class="span9" name="logo" id="logo" style="width: 50%;" value="<?php echo set_value('logo'); ?>">
				    <div id="logo_error" style="color:red;"><?php echo form_error('logo'); ?></div>
                                </div>
			        <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
					<label>Status:</label>
					 <div class="ui-select">
                                            <select name="status" id="status">
						    <option value="1" <?php if($edit_task[0]->status=='1') { echo "selected";}?>>Active</option>
						    <option value="0" <?php if($edit_task[0]->status=='0') { echo "selected";}?>>Inactive</option>
					    </select>
					</div>
				</div>
				
			       
                                <div class="span11 field-box actions" style="margin-top: 20px;">
                                    <input type="button" value="Update Task Category" class="btn-glow primary" id="updateTaskCat">
                                    <span>OR</span>
                                    <a class="btn-flat new-product" href="<?php echo site_url('task_sub_category/index'); ?>">Cancel</a>
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
        $('#updateTaskCat').click(function (e) {

			
			var is_logo_change = document.getElementById('logo').value;
			$('#title_error').html('');
			$('#logo_error').html('');
                        $('#category_type_error').html('');
                        
        	if($.trim($('#title').val())=='' || $.trim($('#title').val())==0)
		{
        		$('#title_error').html('Title Please');
        		$('#title').css('border-color','red');
        		$('#title').focus();
        		return false;
        	}
		
                if($.trim($('#category_type').val())=='' || $.trim($('#category_type').val())==0)
		{
        		$('#category_type_error').html('Select Category Please');
        		$('#category_type').css('border-color','red');
        		$('#category_type').focus();
        		return false;
        	}
                
		if (is_logo_change != '')
		{
		    var fileName=document.getElementById("logo").value;
		    var ext1 = fileName.substring(fileName.lastIndexOf('.') + 1);
		    
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
		} 
			
		$( "#frmValidation" ).submit();
		return true;
        	
        });
    });

  
</script>
<?php $this->load->view('includes/footer'); ?>