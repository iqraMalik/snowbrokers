<?php
$flash_message=$this->session->flashdata('flash_message');
if(isset($flash_message))
{
    if($flash_message == 'set_updated')
    {
	echo '<div class="alert alert-success">';
	echo '<i class="icon-ok-sign"></i><strong>Success!</strong>Information successfully updated.';
	echo '</div>';
     }

    if($flash_message == 'set_not_updated')
  
	{
	echo'<div class="alert alert-error">';
	echo'<i class="icon-remove-sign"></i><strong>Error!</strong> in updation. Please try again.';        
	echo'</div>';
	}
	    
}
?>
			<div class="sortable row-fluid">
			  <script>
			  function chkFrm()
			  {
				if(document.getElementById('sname').value == '')
				{
					document.getElementById('snerr').innerHTML = 'Please Enter Website Name...';
					return false;
				}
				else
				{
					document.getElementById('snerr').innerHTML = '';
				}
				
				// service hour
				if(document.getElementById('serv_hour').value == '')
				{
					document.getElementById('serv_hourerr').innerHTML = 'Please Enter Service Hours .....';
					return false;
				}
				else
				{
					document.getElementById('serv_hourerr').innerHTML = '';
				}
				// end service hour
				
				// Contac Number
				if(document.getElementById('contact_number').value == '')
				{
					document.getElementById('contact_numbererr').innerHTML = 'Please Enter Contact Number .....';
					return false;
				}
				else
				{
					document.getElementById('contact_numbererr').innerHTML = '';
				}
				// end Contact Number
				
				if(document.getElementById('semail').value == '')
				{
					document.getElementById('semerr').innerHTML = 'Please Enter System Email...';
					return false;
				}
				else
				{
					document.getElementById('semerr').innerHTML = '';
				}
				
				if(document.getElementById('cmail').value == '')
				{
					document.getElementById('cmerr').innerHTML = 'Please Enter Contact Email...';
					return false;
				}
				else
				{
					document.getElementById('cmerr').innerHTML = '';
				}
				
				if(document.getElementById('admin_pagination').value == '')
				{
					document.getElementById('admin_paginationerr').innerHTML = 'Please Enter Value for Admin Pagination...';
					return false;
				}
				else
				{
					document.getElementById('admin_paginationerr').innerHTML = '';
				}
				
				if(document.getElementById('site_pagination').value == '')
				{
					document.getElementById('site_paginationerr').innerHTML = 'Please Enter Value for Site Pagination...';
					return false;
				}
				else
				{
					document.getElementById('site_paginationerr').innerHTML = '';
				}
			  }
			  </script>
			  
			  <?php
				  //form data
				  $attributes = array('class' => 'form-horizontal', 'id' => 'siteSettings', 'onSubmit' => 'return chkFrm();');
			
				  //form validation
				  echo validation_errors();
				  
				  echo form_open('admin/sitesetting/updt', $attributes);
			  ?>
					<fieldset>
					  <div class="control-group">
						<label for="inputError" class="control-label">Site Name</label>
						<div class="controls">
						  <input type="text" id="sname" name="site_name" value="<?php echo $settings[0]['site_name']; ?>" >
						  <span class="help-inline" id="snerr"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label for="inputError" class="control-label">System Email</label>
						<div class="controls">
						  <input type="text" id="semail" name="system_email" value="<?php echo $settings[0]['system_email']; ?>" >
						  <span class="help-inline" id="semerr"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label for="inputError" class="control-label">Contact Email</label>
						<div class="controls">
						  <input type="text" id="cmail" name="contact_email" value="<?php echo $settings[0]['contact_email']; ?>" >
						  <span class="help-inline" id="cmerr"></span>
						</div>
					  </div>
					  
					  <!-- service hour--><div class="control-group">
						<label for="inputError" class="control-label">Service Hours</label>
						<div class="controls">
						  <input type="text" id="serv_hour" name="serv_hour" value="<?php echo $settings[0]['service_hours']; ?>" >
						  <span class="help-inline" id="serv_hourerr"></span>
						</div>
					  </div>
					  <!-- end service hour-->
					  <!-- service phone number--><div class="control-group">
						<label for="inputError" class="control-label">Contact Number</label>
						<div class="controls">
						  <input type="text" id="contact_number" name="contact_number" value="<?php echo $settings[0]['contact_number']; ?>" >
						  <span class="help-inline" id="contact_numbererr"></span>
						</div>
					  </div>
					  <!-- end service phone number-->
					  
					  <div class="control-group">
						<label for="inputError" class="control-label">Records per page of Admin</label>
						<div class="controls">
						  <input type="text" id="admin_pagination" name="admin_pagination" value="<?php echo $settings[0]['admin_pagination']; ?>" >
						  <span class="help-inline" id="admin_paginationerr"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label for="inputError" class="control-label">Records per page of Site</label>
						<div class="controls">
						  <input type="text" id="site_pagination" name="site_pagination" value="<?php echo $settings[0]['site_pagination']; ?>" >
						  <span class="help-inline" id="site_paginationerr"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label for="inputError" class="control-label">No. of Currency Type</label>
						<div class="controls">
						  <input type="text" id="currency_no" name="currency_no" value="<?php echo $settings[0]['currency_no']; ?>" >
						  <span class="help-inline" id="currency_noerr"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label for="inputError" class="control-label">Meta Keywords</label>
						<div class="controls">
						  <textarea rows="5" cols="30" name="meta_keywords" id="meta_keywords"><?php echo $settings[0]['meta_keywords']; ?></textarea>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label for="inputError" class="control-label">Meta Description</label>
						<div class="controls">
						  <textarea rows="5" cols="30" name="meta_description" id="meta_description"><?php echo $settings[0]['meta_description']; ?></textarea>
						</div>
					  </div>
					  
					  <div style="margin-left: 120px;">
						<button class="btn btn-primary" type="submit">Save</button>
						<a href="<?php echo base_url(); ?>admin/admin_dashboard"><div class="btn" type="reset">Cancel</div></a>
					  </div>
					</fieldset>

      			<?php echo form_close(); ?>
				
			</div>
