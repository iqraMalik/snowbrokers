<?php
$flash_message=$this->session->flashdata('flash_message');
if(isset($flash_message))
{
    if($flash_message == 'acc_updated')
    {
	echo '<div class="alert alert-success">';
	echo '<i class="icon-ok-sign"></i><strong>Success!</strong>Information successfully updated.';
	echo '</div>';
     }

    if($flash_message == 'acc_not_updated')
  
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
				if(document.getElementById('fname').value.search(/\S/)==-1)
				{
					document.getElementById('fnerr').innerHTML = 'Please Enter First Name...';
					return false;
				}
				else
				{
					document.getElementById('fnerr').innerHTML = '';
				}
				
				if(document.getElementById('lname').value.search(/\S/)==-1)
				{
					document.getElementById('lnerr').innerHTML = 'Please Enter Last Name...';
					return false;
				}
				else
				{
					document.getElementById('lnerr').innerHTML = '';
				}
				
				if(document.getElementById('amail').value.search(/\S/)==-1)
				{
					document.getElementById('amerr').innerHTML = 'Please Enter Email...';
					return false;
				}
				else
				{
					document.getElementById('amerr').innerHTML = '';
				}
				
				if(document.getElementById('amail').value.search(/\S/)!=-1)
				{
					var x=document.getElementById('amail').value;
					var filter=/^([a-z0-9A-Z_\.\-])+\@(([a-z0-9A-Z\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if(!filter.test(x))
					{
						document.getElementById('amerr').innerHTML = 'Please Enter Valid Email...';
						return false;
					}
				}
				else
				{
					document.getElementById('amerr').innerHTML = '';
				}
			  }
			  </script>
			  
			  <?php
				  //form data
				  $attributes = array('class' => 'form-horizontal', 'id' => 'accountFrm', 'onSubmit' => 'return chkFrm();');
			
				  //form validation
				  echo validation_errors();
				  
				  echo form_open('admin/myaccount/updt', $attributes);
			  ?>
					<fieldset>
					  <div class="control-group">
						<label for="inputError" class="control-label">First Name</label>
						<div class="controls">
						  <input type="text" id="fname" name="first_name" value="<?php echo $myaccount_data[0]['first_name']; ?>" >						 
						  <span class="help-inline" id="fnerr"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label for="inputError" class="control-label">Last Name</label>
						<div class="controls">
						  <input type="text" id="lname" name="last_name" value="<?php echo $myaccount_data[0]['last_name']; ?>" >
						  <span class="help-inline" id="lnerr"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label for="inputError" class="control-label">Email</label>
						<div class="controls">
						  <input type="text" id="amail" name="email_addres" value="<?php echo $myaccount_data[0]['email_addres']; ?>" >
						  <span class="help-inline" id="amerr"></span>
						</div>
					  </div>
					  
					  <div  style="margin-left: 120px;">
						<button class="btn btn-primary" type="submit">Save</button>
						<a href="<?php echo base_url(); ?>admin/dashboard"><div class="btn" type="reset">Cancel</div></a>
					  </div>
					</fieldset>

      			<?php echo form_close(); ?>
				
			</div>
