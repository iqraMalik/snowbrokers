	<div class="page-header">
		<h4>
		Add Category and Sub-Category
		</h4>
	</div>


	<div class="sortable row-fluid">
				
		<?php
		//flash messages
		if(isset($flash_message)){
			if($flash_message == TRUE)
			{
				echo '<div id="success" class="alert alert-success">';
				echo '<a class="close" data-dismiss="alert">×</a>';
				echo '<strong>Success!</strong> new page has been created with success.';
				echo '</div>';
				
					
			}else{
				echo '<div class="alert alert-error">';
				echo '<a class="close" data-dismiss="alert">×</a><strong>';
				echo "Page Already Exists";	
				echo '</strong></div>';
			}
			//redirect('admin/admin_users');
		}
		?>
		
		<script>
		var sub_mit;
		function chkFrm()
		{
			// Cartegory name checking .................
			if(document.getElementById('category_name').value.search(/\S/)==-1)
			{				
			document.getElementById('category_nameerr').style.display = 'block';
			document.getElementById('category_nameerr').innerHTML = 'Please Enter the Category Name...';
			document.getElementById('category_nameerr').focus();
				return false;
			}
			else
			{
				document.getElementById('category_nameerr').innerHTML = '';
				document.getElementById('category_nameerr').style.display = 'none';
			}
			
			//if(document.getElementById('page_content').value == 0 )
			//{
			//	document.getElementById('page_contenterr').innerHTML = 'Please Write Something as Description...';
			//	return false;
			//}
			//else
			//{
			//	document.getElementById('page_contenterr').innerHTML = '';
			//}
			//if(document.getElementById('category_image').value == 0 )
			//{
			//	document.getElementById('category_imageerr').innerHTML = 'Please Select a Category Image...';
			//	return false;
			//}
			//else
			//{
			//	document.getElementById('category_imageerr').innerHTML = '';
			//}	
		}
	
		</script>
		
		<?php
			//form data
			$attributes = array('class' => 'form-horizontal', 'id' => 'addcategory', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			//echo form_open('admin/pages/add', $attributes);
			echo form_open_multipart('admin/admin_category/add', $attributes);
		?>
			<fieldset>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Category Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="category_name" name="category_name" value="" onkeyup="check_name()" >
						<span class="help-inline" id="category_nameerr" style="color:red;"></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Parent Category</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="parent_cate" name="parent_cate">						
						<option value="0">No</option>
						<?php echo $row; 
							foreach($row as $catname)
							{
						?>
							<option value="<?php echo $catname['id']; ?>"><?php echo $catname['name'];?></option>
						<?php } ?>
					</select>					
				</div>

				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Description</label>
					<div style="margin-left: 120px; width: 75%" class="controls">
						<textarea rows="5" cols="30" name="page_content" id="page_content"></textarea>
						<script>	
								CKEDITOR.replace('page_content');				
						</script> 
						<span class="help-inline" id="page_contenterr" style="color:red;"></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Category Image</label>
					<div style="margin: 0 0 0px 120px; " class="controls">
						<input type="file" name="category_image" id="category_image"/>
						<span class="help-inline" id="category_imageerr" style="color:red;"></span>
					</div>
				</div>			
		
				<!--<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Status</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="status" name="status">
						<option value="Y">Y</option>
						<option value="N">N</option>
					</select>
				</div>-->
				
				<div style="margin-left: 120px;">
					<button class="btn btn-primary" type="submit">Save</button>
					<a href="<?php echo base_url(); ?>admin/admin_category"><div class="btn" type="reset">Cancel</div></a>
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>