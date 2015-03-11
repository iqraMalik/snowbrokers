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
	<script type="text/javascript" src="http://esolz.co.in/lab4/mr_easy_print/assets/js/jscolor.js"></script>
	<script type="text/javascript" src="jscolor.js"></script>

	<div class="page-header">
		<h4>
		Add color
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
			redirect('admin/color_controler');
		}
		?>
		
		<script>
		function chkFrm()
		{
			// first name checking .................
			if(document.getElementById('color_name').value.search(/\S/)==-1)
			{
				document.getElementById('color_nameerr').innerHTML = 'Please Enter the Color Name...';
				return false;
			}
			else
			{
				document.getElementById('color_nameerr').innerHTML = '';
			}
			
	}
		</script>
		
		<?php
			//form data
			$attributes = array('class' => 'form-horizontal', 'id' => 'addPage', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			//echo form_open('admin/pages/add', $attributes);
			echo form_open_multipart('admin/color_controler/add', $attributes);
		?>
			<fieldset>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Color code</label>
					<!--<div style="margin-left: 120px;" class="controls">
						<input type="text" id="color_name" name="color_name" value="" >
						<span class="help-inline" id="first_nameerr"></span>
					</div>-->
					 <input type="text" class="color" id="color" name="color" value="66ff00" autocomplete="off" style="background-image: none; background-color: rgb(102, 255, 0); color: rgb(0, 0, 0);">
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Color Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="color_name" name="color_name" value="" >
						<span class="help-inline" id="color_nameerr"></span>
					</div>
				</div>
				
				<!--<div class="control-group">-->
				<!--	<label style="width: 100px;" for="inputError" class="control-label">Profile Image</label>-->
				<!--	<div style="margin: 0 0 0px 120px; mar" class="controls">-->
				<!--		<input type="file" name="user_image" id="user_image"/>-->
				<!--	</div>-->
				<!--</div>-->
				
				
				
				
				<!-- <div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Content</label>
					<div style="margin-left: 120px; width: 75%" class="controls">
						<textarea rows="5" cols="30" name="page_content" id="page_content"></textarea>
						<script>
	
								CKEDITOR.replace('page_content');
				
						</script> 
						<span class="help-inline" id="page_contenterr"></span>
					</div>
				</div> -->
				
				<div style="margin-left: 120px;">
					<button class="btn btn-primary" type="submit">Save</button>
					<a href="<?php echo base_url(); ?>admin/color_controler"><div class="btn" type="reset">Cancel</div></a>
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>