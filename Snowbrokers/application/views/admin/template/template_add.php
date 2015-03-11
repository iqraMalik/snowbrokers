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
		Add Template
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
			redirect('admin/admin_users');
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
		  xmlhttp.open("GET","<?php echo base_url(); ?>ajax/check.php?id_name="+id_name+"&table=templates&colname=name",true);
		  xmlhttp.send();					
		}
		</script>
		
		<?php
			//form data
			$attributes = array('class' => 'form-horizontal', 'id' => 'addtemplate', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			//echo form_open('admin/pages/add', $attributes);
			echo form_open_multipart('admin/admin_template/add', $attributes);
		?>
			<fieldset>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Template Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="template_name" name="template_name" value=""  onkeyup="chech_name()" >
						<span class="help-inline" id="template_nameerr" style="color:red;" ></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Template Key words</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="template_key" name="template_key" value="">
						<!--<span class="help-inline" id="template_nameerr" style="color:red;" ></span>-->
					</div>
				</div>
				
				
				
								
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Status</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="status" name="status">
						<option value="Y">Y</option>
						<option value="N">N</option>
					</select>
				</div>
				
				<!-- <div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">User ID</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="user_name" name="user_name" value="" >
						<span class="help-inline" id="user_nameerr"></span>
					</div>
				</div> -->
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Category</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="category" name="category">
						
						<?php //echo $row; 
							foreach($row as $catname)
							{
						?>
							<option value="<?php echo $catname['id']; ?>"><?php echo stripslashes($catname['name']);?></option>
						<?php } ?>
					</select>
					<span class="help-inline" id="cat_nameerr" style="color:red; margin-left: 11%;" ></span>
					
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Choose Trade</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="trade" name="trade">
						
						<?php echo $row1; 
							foreach($row1 as $trade)
							{
							$row_subtrade = $this->admin_category_model->select_sub_trade_list($trade['id']);
						?>
							<option value="<?php echo $trade['id']; ?>"><?php echo stripslashes($trade['name']);?></option>
						<?php
						foreach($row_subtrade as $sub_trade)
							{
							?>
							<option value="<?php echo $sub_trade['id']; ?>"><?php echo "--->".stripslashes($sub_trade['name']);?></option>
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
						<input style="float: left;" type="radio" name="type" value="h" checked/> &nbsp;&nbsp;&nbsp;&nbsp;Horizontal
						<br/>
						<input type="radio" name="type" value="v"/>&nbsp;&nbsp;&nbsp;&nbsp;Vertical	
					</div>
					
				</div>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Choose Card Sides</label>
					<div style="width: 200px; height: 30px; margin-left: 125px">
						<input style="float: left;" type="radio" name="side" value="one" checked/> &nbsp;&nbsp;&nbsp;&nbsp;One Sided
						<br/>
						<input type="radio" name="side" value="both"/>&nbsp;&nbsp;&nbsp;&nbsp;Both Sided	
					</div>
					
				</div>	
				
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Template Image</label>
					<div style="margin: 0 0 0px 120px;" class="controls">
						<input type="file" name="user_image" id="user_image"/>
					</div>
				</div>
				
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
				<?php
				$basic_template_num = $num_count;
				if ( $basic_template_num >= 3 )
				{
					$disabled_status = 'disabled="disabled"';
				}
				else
				{
					$disabled_status = '';
				}
				?>
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Basic Layout</label>
					<div style="margin: 0 0 0px 120px;">
						<input type="checkbox" name="basic_layout" value="1" <?php echo $disabled_status; ?> />
					</div>
				</div>
				<div style="margin-left: 120px;">
					<button class="btn btn-primary" type="submit">Save</button>
					<a href="<?php echo base_url(); ?>admin/admin_template"><div class="btn" type="reset">Cancel</div></a>
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>