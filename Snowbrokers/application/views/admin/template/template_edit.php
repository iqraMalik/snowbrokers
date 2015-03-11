	
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
		Updating <?php echo $cat[0]['name'];?>
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
		var sub_mit;
		
		function chkFrm()
		{
			// first name checking .................
			if(document.getElementById('template_name').value.search(/\S/)==-1)
			{
				document.getElementById('template_nameerr').style.display = 'block';
				document.getElementById('template_nameerr').innerHTML = 'Please Enter the Template Name...';
				document.getElementById('template_nameerr').focus();
				return false;
			}
			else
			{
				document.getElementById('template_nameerr').innerHTML = '';
				document.getElementById('template_nameerr').style.display = 'none';
			}
			
			chech_name();
								
			if(sub_mit == false){
				return false;
			}
			
			if(document.getElementById('category').value == 0){
				document.getElementById('cat_nameerr').style.display = 'block';
				document.getElementById('cat_nameerr').innerHTML = 'Please Select the Category Name...';
				document.getElementById('cat_nameerr').focus();
				return false;
			}else{
				
				document.getElementById('cat_nameerr').innerHTML = '';
				document.getElementById('cat_nameerr').style.display = 'none';
			}
		}
		
		function chech_name()
		{
			var id_name=document.getElementById('template_name').value;
			var id=document.getElementById('hedden_id').value;
			
		  var xmlhttp;
		  if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  }
		  else
		  {// code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function()
		  {					  	
		    if (xmlhttp.readyState==4 && xmlhttp.status==200)
		  	{					  		
		      //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;					      
		      if(xmlhttp.responseText == 'Y'){
		     		document.getElementById('template_nameerr').style.display = 'block';
					document.getElementById('template_nameerr').innerHTML = 'This Name is already registered.';
					document.getElementById('template_nameerr').focus();
					sub_mit = false;
					return false;
		      }else{
		      		sub_mit = true;
		      		document.getElementById('template_nameerr').innerHTML = '';
					document.getElementById('template_nameerr').style.display = 'none';
		      }
		    }
		  }					  
		  xmlhttp.open("GET","<?php echo base_url(); ?>ajax/check_edit.php?id_name="+id_name+"&table=templates&colname=name&id="+id,true);
		  xmlhttp.send();					
		}
		</script>
		
		<?php
			//form data
			$attributes = array('class' => 'form-horizontal', 'id' => 'edittemplate', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			echo form_open_multipart('admin/admin_template/update/'.$this->uri->segment(4).'', $attributes);
		?>
			<fieldset>
								
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Template Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="template_name" name="template_name" value="<?php echo $cat[0]['name'];?>"  onkeyup="chech_name()" >
						<input type="hidden" value="<?php echo $cat[0]['id'];?>" name="hedden_id" id="hedden_id"/>
						<span class="help-inline" id="template_nameerr" style="color:red;" ></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Template Key words</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="template_key" name="template_key" value="<?php echo $cat[0]['key'];?>">
						
						
					</div>
				</div>
				<?php
				//echo "<pre>";
				//print_r($cat);
				//echo "</pre>";
				?>				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Status</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="status" name="status">
						<option <?php if($cat[0]['status'] == 'Y' ){ echo "selected"; }?> value="Y">Y</option>
						<option <?php if($cat[0]['status'] == 'N' ){ echo "selected"; }?> value="N">N</option>
					</select>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Category</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="category" name="category">
						
						<?php echo $row; 
							foreach($row as $catname)
							{								
						?>
						<option <?php if($cat[0]['cat_id'] == $catname['id'] ){ echo "selected"; }?> value="<?php echo $catname['id']; ?>"><?php echo $catname['name'];?></option>
						<?php
						}
						?>
					</select>
					<span class="help-inline" id="cat_nameerr" style="color:red; margin-left: 11%;" ></span>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Choose Trade</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="trade" name="trade">
						
						<?php //echo $row1; 
							foreach($row1 as $trade)
							{
							$row_subtrade = $this->admin_category_model->select_sub_trade_list($trade['id']);
						?>
							<option <?php if($cat[0]['trade_id'] == $trade['id'] ){ echo "selected"; }?> value="<?php echo $trade['id']; ?>"><?php echo stripslashes($trade['name']);?></option>
						<?php
						foreach($row_subtrade as $sub_trade)
							{
							?>
							<option <?php if($cat[0]['trade_id'] == $sub_trade['id'] ){ echo "selected"; }?> value="<?php echo $sub_trade['id']; ?>"><?php echo "--->".stripslashes($sub_trade['name']);?></option>
							<?php	
							}
							}
						?>
					</select>
					<span class="help-inline" id="trade_nameerr" style="color:red; margin-left: 11%;" ></span>
					
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Choose Card Type</label>
					<div style="width: 200px; height: 30px; margin-left: 125px">
						<input style="float: left;" type="radio" name="type" value="h" <?php if($cat[0]['template_type'] == 'h' ){ echo "checked"; }?>/> &nbsp;&nbsp;&nbsp;&nbsp;Horizontal
						<br/>
						<input type="radio" name="type" value="v"<?php if($cat[0]['template_type'] == 'v' ){ echo "checked"; }?>/>&nbsp;&nbsp;&nbsp;&nbsp;Vertical	
					</div>
					
				</div>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Choose Card Sides</label>
					<div style="width: 200px; height: 30px; margin-left: 125px">
						<input style="float: left;" type="radio" name="side" value="one" <?php if($cat[0]['template_side'] == 'one' ){ echo "checked"; }?>/> &nbsp;&nbsp;&nbsp;&nbsp;One Sided
						<br/>
						<input type="radio" name="side" value="both"<?php if($cat[0]['template_side'] == 'both' ){ echo "checked"; }?>/>&nbsp;&nbsp;&nbsp;&nbsp;Both Sided	
					</div>
					
				</div>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Template Image</label>
					<div style="margin: 0 0 0px 120px;" class="controls">
						<input type="file" name="user_image" id="user_image"/>
					</div>
				</div>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Existing Image</label>
					<div style="margin: 0 0 0px 120px;">
						<?php if($cat[0]['template_image'] != ''){?>
					<img src="<?php echo base_url();?>images/template_image/thumb/<?php echo $cat[0]['template_image']; ?>"/>
						<?php } ?>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Update your design</label>
					<div style="margin: 0 0 0px 120px;">
						<a href="../../admin_editor_design/<?php echo $cat[0]['id'];?>"><b>Update Your Design</b></a>
					</div>
				</div>
				<?php
				if ( $cat[0]['basic_layout'] == '1' ) {
					$checked = 'checked="true"';
				} else {
					$checked = '';
				}
				?>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Basic Layout</label>
					<div style="margin: 0 0 0px 120px;">
						<input type="checkbox" name="basic_layout" value="1" <?php echo $checked; ?> />
					</div>
				</div>
				<div style="margin-left: 120px;">
				<button class="btn btn-primary" type="submit">Save</button>
				<a href="<?php echo base_url(); ?>admin/admin_template"><div class="btn" type="reset">Cancel</div></a>
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>