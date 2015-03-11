	
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
			<?php $color= $user[0]['color_code'];
			 $color="#".$color?>
		<table><tr><td>Updating Color</td><td></td><td colspan="200" width="50" height="20"bgcolor="<?php echo $color;?>"></td></tr></table>
		</h4>
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
			$attributes = array('class' => 'form-horizontal', 'id' => 'editPage', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			echo form_open_multipart('admin/color_controler/update/'.$this->uri->segment(4).'', $attributes);
		?>
			<fieldset>
					<!--
					</div>
				</div>-->
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Color Code:</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" class="color" id="color" name="color" value="<?php echo $color;?>" autocomplete="off" style="background-image: none; background-color: rgb(102, 255, 0); color: rgb(0, 0, 0);">
						
					</div>
				</div>
			
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Color Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="color_name" name="color_name" value="<?php echo $user[0]['color_name']; ?>" >
						<span class="help-inline" id="color_nameerr"></span>
					</div>
				</div>

				
				
				
				
				<!-- <div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Content</label>
					<div style="margin-left: 120px; width: 75%" class="controls">
						<textarea rows="5" cols="30" name="page_content" id="page_content"><?php echo $page[0]['page_content']; ?></textarea>
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