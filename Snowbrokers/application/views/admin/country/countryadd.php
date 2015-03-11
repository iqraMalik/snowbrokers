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
		Add country
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
			redirect('admin/admin_country_management');
		}
		?>
		
		<script>
		function chkFrm()
		{
			// first name checking .................
			if(document.getElementById('country_name').value.search(/\S/)==-1)
			{
				document.getElementById('first_nameerr').innerHTML = 'Please Enter the Country Name...';
				return false;
			}
			else
			{
				document.getElementById('first_nameerr').innerHTML = '';
			}
			
			// last name checking .................
			if(document.getElementById('short_name').value.search(/\S/)==-1)
			{
				document.getElementById('last_nameerr').innerHTML = 'Please Enter the Country short Name...';
				return false;
			}
			else
			{
				document.getElementById('last_nameerr').innerHTML = '';
			}
			
			
			
		}
		</script>
		
		<?php
			//form data
			$attributes = array('class' => 'form-horizontal', 'id' => 'addPage', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			//echo form_open('admin/pages/add', $attributes);
			echo form_open_multipart('admin/admin_country_management/add', $attributes);
		?>
			<fieldset>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Country Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="country_name" name="country_name" value="" >
						<span class="help-inline" id="first_nameerr"></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Short Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="short_name" name="short_name" value="" >
						<span class="help-inline" id="last_nameerr"></span>
					</div>
				</div>
				
				
				<div style="margin-left: 120px;">
					<button class="btn btn-primary" type="submit">Save</button>
					<a href="<?php echo base_url(); ?>admin/admin_country_management"><div class="btn" type="reset">Cancel</div></a>
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>