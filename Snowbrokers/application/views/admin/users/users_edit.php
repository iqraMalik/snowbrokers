	
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
		Updating <?php echo $user[0]['first_name'].' '.$user[0]['last_name'];?>
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
			if(document.getElementById('first_name').value.search(/\S/)==-1)
			{
				document.getElementById('first_nameerr').innerHTML = 'Please Enter the First Name...';
				return false;
			}
			else
			{
				document.getElementById('first_nameerr').innerHTML = '';
			}
			
			// last name checking .................
			if(document.getElementById('last_name').value.search(/\S/)==-1)
			{
				document.getElementById('last_nameerr').innerHTML = 'Please Enter the Last Name...';
				return false;
			}
			else
			{
				document.getElementById('last_nameerr').innerHTML = '';
			}
			
			// user id checking .................
			if(document.getElementById('user_name').value.search(/\S/)==-1)
			{	
				if(document.getElementById('user_name').value == document.getElementById('first_name').value){
					
					document.getElementById('user_nameerr').innerHTML = "User Name and user ID are same. Try again ...";
					return false;
					
				}else{
					
					document.getElementById('user_nameerr').innerHTML = 'Please Enter the User Id Name...';
					return false;
				}
				
			}
			else
			{
				document.getElementById('user_nameerr').innerHTML = '';
			}
			
			// password checking .................
			//if(document.getElementById('user_pass').value.search(/\S/)==-1)
			//{
			//	document.getElementById('user_passerr').innerHTML = 'Please Enter the password...';
			//	return false;
			//}
			//else
			//{
			//	document.getElementById('user_passerr').innerHTML = '';
			//}
			
			// email checking..................
			if(document.getElementById('user_email').value.search(/\S/)==-1)
			{
				document.getElementById('user_emailerr').innerHTML = 'Please Enter the Email...';
				return false;
			}
			else
			{
				document.getElementById('user_emailerr').innerHTML = '';
			}
			
			if(document.getElementById('user_email').value.search(/\S/)!=-1)
			{
				var x=document.getElementById('user_email').value;
				var filter=/^([a-z0-9A-Z_\.\-])+\@(([a-z0-9A-Z\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if(!filter.test(x))
				{
					document.getElementById('user_emailerr').innerHTML = 'Please Enter Valid Email...';
					return false;
				}
			}
			else
			{
				document.getElementById('user_emailerr').innerHTML = '';
			}
		}
		</script>
		
		<?php
			//form data
			$attributes = array('class' => 'form-horizontal', 'id' => 'editPage', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			echo form_open_multipart('admin/admin_users/update/'.$this->uri->segment(4).'', $attributes);
		?>
			<fieldset>
				<!-- <div class="control-group">
				<label style="width: 100px;" for="inputError" class="control-label">Title</label>
				<div style="margin-left: 120px;" class="controls">
					<input type="text" id="page_title" name="page_title" value="<?php echo $page[0]['page_title']; ?>" >
					<span class="help-inline" id="page_titleerr"></span>
				</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Image</label>
					<div style="margin: 0 0 0px 120px;" class="controls">
						<!-- <input type="file" name="category_image" id="category_image" value="<?php echo $page[0]['img']; ?>" /> -->
						<!--<input type="file" name="category_image" id="category_image" value="<?php echo base_url().'pagesimg/thumb/'.$page[0]['img']; ?>" />
					</div>
					<div style="margin: 0 0 0px 120px;">
						<?php if($page[0]['img'] != ''){?>
                        	<img src="<?php echo base_url();?>pagesimg/thumb/<?php echo $page[0]['img']; ?>" />
                        <?php }else{ ?>
                        	<!-- <img src="<?php echo base_url();?>assets/nw/img/table-img.png" />	 -->                                    	
                        <!--<?php } ?>
					</div>
				</div> -->
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">First Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="first_name" name="first_name" value="<?php echo $user[0]['first_name']; ?>" >
						<span class="help-inline" id="first_nameerr"></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Last Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="last_name" name="last_name" value="<?php echo $user[0]['last_name']; ?>" >
						<span class="help-inline" id="last_nameerr"></span>
					</div>
				</div>

				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">User ID</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="user_name" name="user_name" value="<?php echo $user[0]['user_name']; ?>" >
						<span class="help-inline" id="user_nameerr"></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Password</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="password" id="user_pass" name="user_pass" value="" >
						<span class="help-inline" id="user_passerr"></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Email</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="user_email" name="user_email" value="<?php echo $user[0]['email']; ?>" >
						<span class="help-inline" id="user_emailerr"></span>
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
				<a href="<?php echo base_url(); ?>admin/admin_users"><div class="btn" type="reset">Cancel</div></a>
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>