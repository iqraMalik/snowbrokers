	
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
			// Cartegory name checking .................
			if(document.getElementById('category_name').value.search(/\S/)==-1)
			{				
				document.getElementById('category_nameerr').style.display = 'block';
				document.getElementById('category_nameerr').innerHTML = 'Please Enter the Category Name...';
				document.getElementById('category_nameerr').focus();
				return false;
			}
			else
			{
				document.getElementById('category_nameerr').innerHTML = '';
				document.getElementById('category_nameerr').style.display = 'none';
			}
			
			/*// Product page title checking .................
			if(document.getElementById('pro_name').value.search(/\S/)==-1)
			{				
				document.getElementById('pro_nameerr').style.display = 'block';
				document.getElementById('pro_nameerr').innerHTML = 'Please Enter the Product page Name...';
				document.getElementById('pro_nameerr').focus();
				return false;
			}
			else
			{
				document.getElementById('pro_nameerr').innerHTML = '';
				document.getElementById('pro_nameerr').style.display = 'none';
			}*/
			
			/*// validate page discription 
			if(CKEDITOR.instances.page_content.getData() == '')
			{
				document.getElementById('page_contenterr').style.display = 'block';
				document.getElementById('page_contenterr').innerHTML = 'Please Enter the Description...';
				document.getElementById('page_contenterr').focus();
				return false;
			}
			else
			{
				document.getElementById('page_contenterr').innerHTML = '';
				document.getElementById('page_contenterr').style.display = 'none';
			}*/
			
			chech_name();
								
			if(sub_mit == false){
				return false;
			}
		}
		
		
		function chech_name()
		{
			var id_name=document.getElementById('category_name').value;
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
		     		document.getElementById('category_nameerr').style.display = 'block';
					document.getElementById('category_nameerr').innerHTML = 'This Name is already registered.';
					document.getElementById('category_nameerr').focus();
					sub_mit = false;
					return false;
		      }else{
		      		sub_mit = true;
		      		document.getElementById('category_nameerr').innerHTML = '';
					document.getElementById('category_nameerr').style.display = 'none';
		      }
		    }
		  }
		  xmlhttp.open("GET","<?php echo base_url(); ?>ajax/check_edit.php?id_name="+id_name+"&table=category&colname=name&id="+id,true);
		  xmlhttp.send();					
		}
		</script>
		<style>
			.ckh_inp{
				margin-left: 2%;
				width: 10%;
				float: left;
				text-align: center;
				font-size: 12px;
			}
			.att_name
			{
				
			}
		</style>
		<?php
			//form data
			$attributes = array('class' => 'form-horizontal', 'id' => 'editcategory', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			echo form_open_multipart('admin/admin_category/update/'.$this->uri->segment(4).'', $attributes);
		?>
			<fieldset>
								
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Industry Name</label>
					<div style="margin-left: 120px;" class="controls">
						<input type="text" id="category_name" name="category_name" value="<?php echo $cat[0]['name'];?>" onkeyup="chech_name()" >
						<input type="hidden" value="<?php echo $cat[0]['id'];?>" name="hedden_id" id="hedden_id"/>
						<span class="help-inline" id="category_nameerr" style="color:red;" ></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Parent Category</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="parent_cate" name="parent_cate">						
						<option value="0">No</option>
						<?php 
							//echo $row; 
							foreach($row as $catname)
							{								
						?>							
							<option value="<?php echo $catname['id']; ?>" <?php if($catname['id'] == $cat[0]['parent_id']){ echo "selected";}; ?>><?php echo $catname['name'];?></option>							
							
						<?php } ?>
					</select>					
				</div>

				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Description</label>
					<div style="margin-left: 120px; width: 75%" class="controls">
						<textarea rows="5" cols="30" name="page_content" id="page_content"><?php echo $cat[0]['description'];?></textarea>
						<script>	
								CKEDITOR.replace('page_content');				
						</script> 
						<span class="help-inline" id="page_contenterr" style="color:red;"></span>
					</div>
				</div>
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Image</label>
					<img src="<?php echo base_url()."assets/uploads/category_img/thumb/".$cat[0]['img'];?>" style="height: 80px">
					<div style="margin-top: 2%" class="controls">
						<input type="file" name="category_image" id="category_image"/>
					</div>
				</div>				
				
				<div class="control-group">
					<label style="width: 100px;" for="inputError" class="control-label">Status</label>
					<select style="width: 200px; height: 30px; margin-left: 25px" id="status" name="status">
						<option <?php if($cat[0]['status'] == 'Y'){ ?> selected="true" <?php }?> value="Y">Y</option>
						<option <?php if($cat[0]['status'] == 'N'){ ?> selected="true" <?php }?> value="N">N</option>
					</select>
				</div>

				<div style="margin-left: 120px;">
				<button class="btn btn-primary" type="submit">Save</button>
				<a href="<?php echo base_url(); ?>admin/admin_category"><div class="btn" type="reset">Cancel</div></a>
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>