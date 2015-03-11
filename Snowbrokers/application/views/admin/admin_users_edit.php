	<div>
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo site_url("admin"); ?>"><?php echo ucfirst($this->uri->segment(1));?></a> <span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo site_url("admin"); ?>/pages"><?php echo ucfirst($this->uri->segment(2));?></a>
			</li>
		</ul>
	</div>

	<div class="page-header">
		<h2>
		Updating <?php echo $page[0]['page_title'];?>
		</h2>
	</div>


	<div class="sortable row-fluid">
				
		<?php
		//flash messages
		if($this->session->flashdata('flash_message')){
			if($this->session->flashdata('flash_message') == 'updated')
			{
			echo '<div class="alert alert-success">';
			echo '<a class="close" data-dismiss="alert">×</a>';
			echo '<strong>Success!</strong> Page has been updated with success.';
			echo '</div>';       
			}else{
			echo '<div class="alert alert-error">';
			echo '<a class="close" data-dismiss="alert">×</a>';
			echo '<strong>Error!</strong> Error in updation. Please try again.';
			echo '</div>';
			}
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
			$attributes = array('class' => 'form-horizontal', 'id' => 'editPage', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			echo form_open('admin/users/update/'.$this->uri->segment(4).'', $attributes);
		?>
			<fieldset>
				<div class="control-group">
				<label for="inputError" class="control-label">Name</label>
				<div class="controls">
					<input type="text" id="page_title" name="page_title" value="<?php /*echo $page[0]['page_title'];*/ ?>" >
					<span class="help-inline" id="page_titleerr"></span>
				</div>
				</div>
				
				<div class="control-group">
				<label for="inputError" class="control-label">Email</label>
				<div class="controls">
					<input type="text" id="page_title" name="page_title" value="<?php /*echo $page[0]['page_title'];*/ ?>" >
					<span class="help-inline" id="page_titleerr"></span>
				</div>
				</div>

				
<!--				<div class="control-group">
				<label for="inputError" class="control-label">Content</label>
				<div class="controls">
					<textarea rows="5" cols="30" name="page_content" id="page_content"><?php /*echo $page[0]['page_content']; */?></textarea>
					<script>

							CKEDITOR.replace('page_content');
			
					</script> 
					<span class="help-inline" id="page_contenterr"></span>
				</div>
				</div>
-->				
				<div class="form-actions">
				<button class="btn btn-primary" type="submit">Save</button>
				<button class="btn" type="reset">Cancel</button>
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>