<?php $this->load->view('includes/header'); ?>
<script type="text/javascript">
	function go_seaarch()
	{
		var selected = $("#search_option").val();
		//alert(selected);
		if ((selected == '') && (document.getElementById('get_search').value == ""))
		{
		    alert("Please Select an Option");
		   //alert("Please Enter Search Value");
		}
		else if ((selected == '') && (document.getElementById('get_search').value!=""))
		{
		    alert("Please Select an Option");
		   //alert("Please Enter Search Value");
		}
		else if ((selected != '') && (document.getElementById('get_search').value==""))
		{
			alert("Please Enter Search Value");
		}
		
		else
		{
			$('#search_mode').val('search');
			 document.getElementById('search_form').submit();
		}
	}
	function go_reset()
	{
		location.href="<?php echo base_url();?>index.php/state/index";
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
	   
	//function go_check_all()
	//{
	//	var frm=document.multiple_form;
	//	var total= select_check_option();
	//	var totallength=frm.scripts.length;
	//	
	//	if (total!=totallength)
	//	{
	//	    document.getElementById('check_all').checked=false;
	//	}
	//	else
	//	{
	//	    document.getElementById('check_all').checked=true;
	//	}
	//}
	function go_check_all()
{
var arr = new Array();
    for (var i=0;i<document.multiple_form.elements.length;i++)
    {
	var e=document.multiple_form.elements[i];
	if ((e.name != 'scripts') && (e.type=='checkbox'))
	{
		e.checked=document.multiple_form.check_all.checked;
	}
    }
}
function check(id)
{	
    var ele=document.multiple_form.elements["scripts[]"];
    var chk=0;
    for(var i=0;i<ele.length;i++)
    {
	if(ele[i].checked==true)
	chk=chk+1;
    }
    if(chk==ele.length)document.multiple_form.check_all.checked="true";
    else document.multiple_form.check_all.checked="";
}
	
	function sortField(field)
	{
		var get_field = field;
		var sort_type = $("#sort_type").val();
		var sort_field = $("#sort_field").val();
		if (sort_field === get_field) {
			
			if (sort_type == 'DESC')
			{
				$("#sort_type").val('ASC');
			}
			else
			{
				$("#sort_type").val('DESC');
			}
		}
		else
		{
			$("#sort_field").val(get_field);
			$("#sort_type").val('DESC');
		}
		
		$('#search_mode').val('search');
		$('#search_form').submit();
	}
</script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
	<div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
		<div class="span12">
			<h4 class="management_name">State Management</h4>
			<div class="pull-right" style="margin-bottom: 5px;"><a class="btn-flat new-product" href="<?php echo site_url('state/addstate'); ?>">+ Add New</a></div>
		</div>
	</div>
	<div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head"><div class="span12"><!--<h4 class="management_name">State List</h4>--></div></div>
				<div class="row-fluid filter-block">
					<div class="pull-left">&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onclick="go_multiple_option(1);"><img src="<?php echo main_url();?>images/trash.png" alt="Delete" title="Delete"></a>
						<a href="javascript:void(0);" onclick="go_multiple_option(2);"><img src="<?php echo main_url();?>images/active.png" alt="Active" title="Active"></a>
						<a href="javascript:void(0);" onclick="go_multiple_option(3);"><img src="<?php echo main_url();?>images/deactive.png" alt="Active" title="Active"></a>
					</div>
					<div class="pull-right">
						<form name="search_form" id="search_form" method="post" action="">
							
							<?php
								 $myval=2;
								 
								if(isset($btnval))
								{
								   $myval=$btnval;
								}
								
								$style1="";
								$style2="";
									
								if($myval==1)
								{
									$style1="color:#32A0EE;";
									$style2="";
								}
								else if($myval==0)
								{
									$style1="";
									$style2="color:#32A0EE;";
								}
							?>
							<input type="hidden" id="sort_type" name="sort_type" value="<?php echo (isset($sort_type)?$sort_type:get_cookie('taskaroo_statetype_type'));?>" />
							<input type="hidden" id="sort_field" name="sort_field" value="<?php echo (isset($sort_field)?$sort_field:get_cookie('taskaroo_statetype_field'));?>" />
							<input type="hidden" name="search_mode" id="search_mode" value="" />
							<input type="hidden" name="btnVal" id="btnVal" value="<?php echo $myval;?>"/>
							<div class="btn-group pull-left" style="padding-right: 10px;">
								<button class="glow left large" href="javascript:void(0);" value="1" onclick="display_active_inactive(1);"><span style="<?php echo $style1;?>"> Active </span></button>
								<button class="glow left large" href="javascript:void(0);" value="0" onclick="display_active_inactive(0);"><span style="<?php echo $style2;?>"> In-Active </span></button>
							</div>
							
							
							<div class="ui-select">
								<select name="search_option" id="search_option">
									<!--<option value="all" <?php if(isset($_REQUEST['search_option']) && ($_REQUEST['search_option']=='all')){echo "selected";}?>>All</option>-->
									<option value="" selected="selected">Select One</option>
									<option value="state_name" <?php if(isset($_REQUEST['search_option']) && ($_REQUEST['search_option']=='state_name')){echo "selected";}?>>State Name</option>
								</select>
							</div>
							<input type="text" class="search" name="get_search" id="get_search" value="<?php if(isset($search_text) && ($search_text!="")){echo $search_text;}?>">
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_seaarch();">Search</a>
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_reset();">Reset</a>
						</form>
					</div>
				</div>
				<form name="multiple_form" id="multiple_form" method="post" action="<?php echo site_url('state/multiple_option_state'); ?>">
					<input type="hidden" name="select_check" id="select_check" value="">
					<input type="hidden" name="select_my_option" id="select_my_option" value="">
					<input type="hidden" name="search_option" id="search_option" value="<?php if(isset($_REQUEST['search_option'])){echo $_REQUEST['search_option'];}?>">
					<input type="hidden" name="get_search" id="get_search" value="<?php if(isset($_REQUEST['get_search'])){echo $_REQUEST['get_search'];}?>">
					<div class="row-fluid">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="span1"><input type="checkbox" name="check_all" id="check_all" style="margin: 0px;"></th>
									<th class="span5"><a id="state_name" href="javascript:void(0);" onclick="sortField('state_name');" style="color:#000;text-decoration: none;">State Name
										<?php
											if($sort_field=='state_name')
											{
												if($sort_type=="DESC")
												{
													echo "<img src='".base_url()."images/sort_desc.png' />";
												}
												if($sort_type=="ASC")
												{
													echo "<img src='".base_url()."images/sort_asc.png' />";
												}
											}
										?>
										</a></th>
									<!--<th class="span3">Country Name</th>-->
									<th class="span5"><a id="published" href="javascript:void(0);" onclick="sortField('published');" style="color:#000;text-decoration: none;">Status
										<?php
											if($sort_field=='published')
											{
												if($sort_type=="DESC")
												{
													echo "<img src='".base_url()."images/sort_desc.png' />";
												}
												if($sort_type=="ASC")
												{
													echo "<img src='".base_url()."images/sort_asc.png' />";
												}
											}
										?>
										</a></th>
									<th class="span3"><span class="line"></span></th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(count($faq) > 0)
									{
										foreach ($faq as $dataone):
										//$thumbImg = main_url()."images/subcategory/thumbs/";
									?>
										<!-- row -->
										<tr class="first">
											<td><input type="checkbox" name="scripts[]" class="checkbox_class" id="checkbox_<?php echo $dataone->id;?>" style="margin: 0px;" value="<?php echo $dataone->id;?>" onclick="check(<?php echo $dataone->id;?>);"></td>
											<td><?php echo $dataone->state_name; ?></td>
											<!--<td>-->
											<?php
											//if($dataone->country_id==null)
											//{
											//	echo "N/A";
											//}
											//else
											//{
											//	$Parent_Category=$this->modelstate->parentCountry($dataone->country_id);
											//	foreach($Parent_Category as $category_details)
											//	{
											//		echo $category_details->country_name;
											//	}
											//}
											?>
											<!--</td>-->
											
											<td><?php echo ($dataone->published)?"Active":"Blocked"; ?></td>
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
			$("#frmValidation").attr("action", "<?php echo site_url('state/editstate');?>");
			$( "#frmValidation" ).submit();
			return true;
		});
	});
	$(function () {
        $('.Deleteuser').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edituser','');
			
			var r=confirm("Are you sure to delete this state?");
			
			if (r==true)
			{
			    $('#ListingUserid').val($.trim(stripdata));
			    $("#frmValidation").attr("action", "<?php echo site_url('state/delete_state');?>");
			    $("#frmValidation").submit();
			    return true;
			}
		});
	});
	function display_active_inactive(val) {	
		
		$('#btnVal').val($.trim(val));
		$('#search_mode').val('search');
		$("#search_form").submit();
			
	}
</script>
<?php $this->load->view('includes/footer'); ?>