	<!-- <div>
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo site_url("admin"); ?>"><?php echo ucfirst($this->uri->segment(1));?></a> <span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo site_url("admin"); ?>/pages"><?php echo ucfirst($this->uri->segment(2));?></a>
			</li>
		</ul>
	</div> -->

	<div class="page-header">
		<h4>
		Add Page
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
			redirect('admin/pages');
		}
		?>
		
		<script>
		function chkFrm()
		{
			if(document.getElementById('page_title').value.search(/\S/)==-1)
			{
				document.getElementById('page_titleerr').innerHTML = 'Please Enter Page Title...';
				return false;
			}
			else
			{
				document.getElementById('page_titleerr').innerHTML = '';
			}
			
			// here page_content is the element name not id
			if(CKEDITOR.instances.page_content.getData() == '')
			{
				document.getElementById('page_contenterr').innerHTML = 'Please Enter Page Content...';
				return false;
			}
			else
			{
				document.getElementById('page_contenterr').innerHTML = '';
			}
		}
		</script>
		
		<?php
			//form data
			$attributes = array('class' => 'form-horizontal', 'id' => 'addPage', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			//echo form_open('admin/pages/add', $attributes);
			echo form_open_multipart('admin/pages/add', $attributes);
		?>
			<fieldset>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Title</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="page_title" name="page_title" value="" >
						<span class="help-inline" id="page_titleerr"></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Image</label>
					<div style="margin: 0 0 0px 120px; mar" class="controls">
						<input type="file" name="category_image" id="category_image"/>
					</div>
				</div>
				
				<div class="control-group">
				<label style="width: 100px;" for="inputError" class="control-label">Content</label>
				<div style="margin-left: 120px; width: 75%" class="controls">
					<textarea rows="5" cols="30" name="page_content" id="page_content"></textarea>
					<script>

							CKEDITOR.replace('page_content');
			
					</script> 
					<span class="help-inline" id="page_contenterr"></span>
				</div>
				</div>
				
				<div style="margin-left: 120px;">
					<button class="btn btn-primary" type="submit">Save</button>
					<a href="<?php echo base_url(); ?>admin/admin_pages"><div class="btn" type="reset">Cancel</div></a>
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>