<?php $this->load->view('includes/header'); ?>
<script type="text/javascript">
	function go_search()
	{
		if (document.getElementById('get_search').value!="")
		{
		   document.getElementById('search_form').submit();
		}
		else
		{
			alert("Please Enter Search Value");
		}
	}
	function seaarch_cat() {
		if (document.getElementById('cat_type').value!="")
		{
		   document.getElementById('search_form').submit();
		}
		else
		{
			alert("Please Select Category");
		}
	}
	function go_reset()
	{
		location.href="<?php echo base_url();?>index.php/blog_article/index";
	}
	function select_check_option()
	{
		var frm=document.multiple_form;
		var total=0;
		var checkbox_class = $('.checkbox_class')
		
		checkbox_class.each(function(){
			var element_id = $(this).attr('id');
			if(document.getElementById(element_id).checked)
			{
				total++;
			}
		})
		
		return total;
	}
	function go_multiple_option(val)
	{
		var frm=document.multiple_form;
		var total= select_check_option();
		
		if(total=="")
		{
			alert("Please first make a selection from the list");
		}
		else
		{
			document.getElementById('select_check').value=total;
			
			
			var msg;
			
			if (val==1)
			{
			   msg="Are You sure to Delete the Data?";
			}
			else if (val==2)
			{
			   msg="Are You sure to Active the Data?"
			}
			else
			{
				msg="Are You sure to Inactive the Data?"
			}
			
			var r = confirm(msg);
			
			   if (r == true)
			   {
				 document.getElementById('select_my_option').value=val;
				 
				frm.submit();
			   }
			
		}
	}
	   
	function go_check_all()
	{
		var frm=document.multiple_form;
		var total= select_check_option();
		var totallength=frm.scripts.length;
		
		if (total!=totallength)
		{
		    document.getElementById('check_all').checked=false;
		}
		else
		{
		    document.getElementById('check_all').checked=true;
		}
	}
</script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
	<div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
		<div class="span12">
			<h4 class="management_name">Blog Article Management</h4>
			<div class="pull-right" style="margin-bottom: 5px;"><a class="btn-flat new-product" href="<?php echo site_url('blog_article/addblog_article'); ?>">+ Add New</a></div>
		</div>
	</div>
	<div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head"></div>
				<div class="row-fluid filter-block">
					<div class="pull-left">
						<a href="javascript:void(0);" onclick="go_multiple_option(1);"><img src="<?php echo main_url();?>images/trash.png" alt="Delete" title="Delete"></a>
						<a href="javascript:void(0);" onclick="go_multiple_option(2);"><img src="<?php echo main_url();?>images/active.png" alt="Active" title="Active"></a>
						<a href="javascript:void(0);" onclick="go_multiple_option(3);"><img src="<?php echo main_url();?>images/deactive.png" alt="Block" title="Block"></a>
					</div>
					<div class="pull-right">
						<form name="search_form" id="search_form" method="post" action="">
							<?php
								 $myval=0;
								 
								if(isset($btnVal))
								{
								   $myval=$btnVal;
								}
								
								$style1="";
								$style2="";
									
								if($myval==1)
								{
									$style1="color:#32A0EE;";
									$style2="";
								}
								else if($myval==2)
								{
									$style1="";
									$style2="color:#32A0EE;";
								}
							?>
							<input type="hidden" name="btnVal" id="btnVal" value="<?php echo $myval;?>"/>
							<div class="btn-group pull-left" style="padding-right: 10px;">
								<button class="glow left large" href="javascript:void(0);" value="1" onclick="display_active_inactive(1);"><span style="<?php echo $style1;?>"> Active </span></button>
								<button class="glow left large" href="javascript:void(0);" value="2" onclick="display_active_inactive(2);"><span style="<?php echo $style2;?>"> In-Active </span></button>
							</div>						
								
							       <?php $TypeData = $this->modelblog_article->Getblog_type();?>
							      <div class="ui-select">
								
								   <select name="cat_type" id="cat_type" label="Blog Type" onChange="seaarch_cat();">
								      <option value="" <?php if(!isset($cat_type)){echo 'selected';}?>>Search by Blogtype</option>
								      <?php
								    
								      foreach($TypeData as $data_type)
								      {
								      ?>
								      <option value="<?php echo $data_type->id;?>" <?php if($cat_type==$data_type->id)echo ' selected="selected"';?>><?php echo $data_type->blogname;?></option>     
								      <?php
								      }
								      ?>
								   </select>
							      </div>
							   
							<div class="ui-select">
								<select name="search_option" id="search_option">
                                                                        <option value="" <?php if(!isset($search_option) || $search_option=='') {echo 'selected';}?>>Search by</option>
									<option value="title" <?php if(isset($search_option) && ($search_option=='title')){echo 'selected';}?>>Blog Title</option>
                                                                        <option value="added_date" <?php if(isset($search_option) && ($search_option=='added_date')){echo 'selected';}?>>Added Date</option>
								</select>
							</div>
							<input type="text" class="search" name="get_search" id="get_search" value="<?php if(isset($get_search) && ($get_search!="")){echo $get_search;}?>">
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_search();">Search</a>
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_reset();">Reset</a>
						</form>
					</div>
				</div>
				<form name="multiple_form" id="multiple_form" method="post" action="<?php echo site_url('blog_article/multiple_option_blog'); ?>">
					<input type="hidden" name="select_check" id="select_check" value="">
					<input type="hidden" name="select_my_option" id="select_my_option" value="">
					<input type="hidden" name="search_option" id="search_option" value="<?php if(isset($search_option)){echo $search_option;}?>">
					<input type="hidden" name="get_search" id="get_search" value="<?php if(isset($get_search)){echo $get_search;}?>">
					<input type="hidden" name="cat_type" id="cat_type" value="<?php if(isset($cat_type)){echo $cat_type;}?>">
					<div class="row-fluid">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="span1"><input type="checkbox" name="check_all" id="check_all" style="margin: 0px;"></th>
									<th class="span5">Blog Title</th>
									<th class="span5">Blog Category Name</th>
									<th class="span3">Added Date</th>
									<th class="span3">Status</th>
									<th class="span3"><span class="line"></span></th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(count($article_list) > 0)
									{
										foreach ($article_list as $dataone):
									?>
										<!-- row -->
										<tr class="first">
											<td><input type="checkbox" name="scripts[]" class="checkbox_class" id="checkbox_<?php echo $dataone->id;?>" style="margin: 0px;" value="<?php echo $dataone->id;?>" onclick="go_check_all();"></td>
											<td><?php echo $dataone->title; ?></td>
											<td>
								<?php
								if(!empty($dataone->blog_catid))
								{
									$name=$this->modelblog_article->getblogCategoryName($dataone->blog_catid);
									if($name == false){echo "N/A";}
									else{echo $name->blogname;}
								}
								else{echo "N/A";}
								?>
											</td>
											<td><?php echo $dataone->added_date; ?></td>
											<td><?php echo ($dataone->status)?"Active":"Blocked"; ?></td>
											<td>
												<ul class="actions">
													<li><a class="Edituser" id="Edituser<?php echo $dataone->id;?>" href="javascript:void(0);"><i class="table-edit"></i></a></li>
													<li class="last"><a class="Deleteuser" id="Edituser<?php echo $dataone->id;?>" href="javascript:void(0);"><i class="table-delete-new"></i></a></li>
												</ul>
											</td>
										</tr>
										<?php
										endforeach;
									}
									else
									{
										?>
										<tr class="first"><td colspan="7"><div class="span12"><h4>No Records Found.</h4></div></td></tr>
										<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</form>
			    <div class="pagination"><?php echo $pagination; ?></div>
			</div>
		</div>
	</div>
</div>
<form class="new_user_form" action="" id="frmValidation" method="post">
	<input type="hidden" name="ListingUserid" id="ListingUserid" value="0">
</form>
<script type="text/javascript">
	$(function () {
        $('.Edituser').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edituser','');
			$('#ListingUserid').val($.trim(stripdata));
			$("#frmValidation").attr("action", "<?php echo site_url('blog_article/editblog');?>");
			$( "#frmValidation" ).submit();
			return true;
		});
	});
	$(function () {
        $('.Deleteuser').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edituser','');
			
			var r=confirm("Are you sure to delete this Blog?");
			
			if (r==true)
			{
			    $('#ListingUserid').val($.trim(stripdata));
			    $("#frmValidation").attr("action", "<?php echo site_url('blog_article/delete_blog');?>");
			    $("#frmValidation").submit();
			    return true;
			}
		});
	});
	function display_active_inactive(val) {	
		
			$('#btnVal').val($.trim(val));
			$( "#search_form" ).submit();
			
	}
</script>
<?php $this->load->view('includes/footer'); ?>