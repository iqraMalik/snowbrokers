<?php
$flash_message=$this->session->flashdata('flash_message');
if(isset($flash_message))
{
    if($flash_message == 'pass_updated')
    {
	echo '<div class="alert alert-success">';
	echo '<i class="icon-ok-sign"></i><strong>Success!</strong>Password successfully updated.';
	echo '</div>';
     }

    if($flash_message == 'pass_not_updated')
  
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
				if(document.getElementById('npass').value == '')
				{
					document.getElementById('nerr').innerHTML = 'Please Enter New Password...';
					return false;
				}
				else
				{
					document.getElementById('nerr').innerHTML = '';
				}
				
				if(document.getElementById('cpass').value == '')
				{
					document.getElementById('cerr').innerHTML = 'Please Enter Confirm Password...';
					return false;
				}
				else
				{
					document.getElementById('cerr').innerHTML = '';
				}
				
				if(document.getElementById('npass').value != document.getElementById('cpass').value)
				{
					document.getElementById('cerr').innerHTML = 'Confirm Password and New Password be same...';
					return false;
				}
				else
				{
					document.getElementById('cerr').innerHTML = '';
				}
			  }
			  </script>
			  
			  <?php
				  //form data
				  $attributes = array('class' => 'form-horizontal', 'id' => 'chngPass', 'onSubmit' => 'return chkFrm();');
			
				  //form validation
				  echo validation_errors();
				  
				  echo form_open('admin/chngpassword/updt', $attributes);
			  ?>
					<fieldset>
					  <div class="control-group">
						<label for="inputError" class="control-label">New Password</label>
						<div class="controls">
						  <input type="password" id="npass" name="npass" value="" >
						  <span class="help-inline" id="nerr"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label for="inputError" class="control-label">Confirm Password</label>
						<div class="controls">
						  <input type="password" id="cpass" name="cpass" value="" >
						  <span class="help-inline" id="cerr"></span>
						</div>
					  </div>
					  
					  <div  style="margin-left: 120px;">
						<button class="btn btn-primary" type="submit">Save</button>
						<a href="<?php echo base_url(); ?>admin/dashboard"><div class="btn" type="reset">Cancel</div></a>
					  </div>
					</fieldset>

      			<?php echo form_close(); ?>
				
			</div>
