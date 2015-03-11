<?php $this->load->view('includes/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.css" id="theme_base">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.date.css" id="theme_date">
<script src="<?php echo base_url();?>js/res_datepicker/picker.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.date.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.time.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/main.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
		var selected = $("#search_option").val();
		if (selected==='addeddate') {
			$("#get_search").val('');
			$("#get_search").hide();
			$("#add_date").show();
		}
		else
		{
			$("#add_date").val('');
			$("#add_date").hide();
			$("#get_search").show();
		}
	});
	function go_seaarch()
	{
		var selected = $("#search_option").val();
		if (((selected=='title') && (document.getElementById('get_search').value!=""))||((selected=='addeddate') && (document.getElementById('add_date').value!="")))
		{
			$('#search_mode').val('search');
			document.getElementById('search_form').submit();
		}
		else
		{
			alert("Please Enter Search Value");
		}
	}
	function display_active_inactive(val) {	
		
			$('#btnVal').val($.trim(val));
			$('#search_mode').val('search');
			$("#search_form").submit();
			
	}
	function go_reset()
	{
		location.href="<?php echo base_url();?>index.php/faq/index";
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
<script type="text/javascript">
	function openSearchBox(val) {
		
		if (val==='addeddate') {
			$("#get_search").val('');
			$("#get_search").hide();
			$("#add_date").show();
		}
		else
		{
			$("#add_date").val('');
			$("#add_date").hide();
			$("#get_search").show();
		}
	}
</script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
	<div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
		<div class="span12">
			<h4 class="management_name">FAQ Management</h4>
			<div class="pull-right" style="margin-bottom: 5px;"><a class="btn-flat new-product" href="<?php echo site_url('faq/addfaqtype'); ?>">+ Add New</a></div>
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
								else if($myval==2)
								{
									$style1="";
									$style2="color:#32A0EE;";
								}
							?>
							<input type="hidden" name="search_mode" id="search_mode" value="" />
							<input type="hidden" name="btnVal" id="btnVal" value="<?php echo $myval;?>"/>
							<div class="btn-group pull-left" style="padding-right: 10px;">
								<button class="glow left large" href="javascript:void(0);" value="1" onclick="display_active_inactive(1);"><span style="<?php echo $style1;?>"> Active </span></button>
								<button class="glow left large" href="javascript:void(0);" value="2" onclick="display_active_inactive(2);"><span style="<?php echo $style2;?>"> In-Active </span></button>
							</div>
							<div class="ui-select">
								<select name="search_option" id="search_option" onchange="openSearchBox(this.value);">
									
									
									
									<option value="title" <?php if(isset($search_option) && ($search_option=='title')){echo 'selected';}?>>Question</option>
									<option value="addeddate" <?php if(isset($search_option) && ($search_option=='addeddate')){echo 'selected';}?>>Added Date</option>
									
								</select>
							</div>
							<input type="text" class="search" name="date" id="add_date" value="" placeholder="Search by added date" style="width: 200px;background: none;">
							<input type="text" class="search" name="get_search" id="get_search" value="<?php if(isset($get_search) && ($get_search!="")){echo $get_search;}?>">
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_seaarch();">Search</a>
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_reset();">Reset</a>
							<script>

								$('#add_date').pickadate({
								// An integer (positive/negative) sets it relative to today.
								
								// `true` sets it to today. `false` removes any limits.
								max: 1,
								selectYears: true,
								selectMonths: true,
								format: "yyyy-mm-dd",
								})
							</script>
						</form>
					</div>
				</div>
				<form name="multiple_form" id="multiple_form" method="post" action="<?php echo site_url('faq/multiple_option_faq'); ?>">
					<input type="hidden" name="search_option" id="search_option" value="<?php if(isset($_REQUEST['search_option'])){echo $_REQUEST['search_option'];}?>">
					<input type="hidden" name="get_search" id="get_search" value="<?php if(isset($_REQUEST['get_search'])){echo $_REQUEST['get_search'];}?>">
					<input type="hidden" name="select_check" id="select_check" value="">
					<input type="hidden" name="select_my_option" id="select_my_option" value="">
					<div class="row-fluid">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="span1"><input type="checkbox" name="check_all" id="check_all" style="margin: 0px;"></th>
									<th class="span5">Qustion</th>
									<th class="span5">Answer</th>
									<th class="span3">Added Date</th>
									
									<th class="span3">Status</th>
									<th class="span3"><span class="line"></span></th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(count($faq) > 0)
									{
										foreach ($faq as $dataone):
										
										
									?>
										<!-- row -->
										<tr class="first">
											<td><input type="checkbox" name="scripts[]" class="checkbox_class" id="checkbox_<?php echo $dataone->id;?>" style="margin: 0px;" value="<?php echo $dataone->id;?>" onclick="go_check_all();"></td>
											<td>
											<?php
											echo ($dataone->title);
											?>
											</td>
											
                                                                                        <td>
											<?php
											if(strlen($dataone->details) < 150)
											{
												echo ($dataone->details);
											}
											else
											{
											echo substr($dataone->details,0,150).'...';
											}
											?>
											</td>
                                                                                        <td>
                                                                                            <?php
											echo $dataone->addeddate;
											?>
                                                                                            </td>
                                                                                        
											
											
											
											
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
			$("#frmValidation").attr("action", "<?php echo site_url('faq/editfaq');?>");
			$( "#frmValidation" ).submit();
			return true;
		});
	});
	$(function () {
        $('.Deleteuser').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edituser','');
			
			var r=confirm("Are you sure to delete this FAQ?");
			
			if (r==true)
			{
			    $('#ListingUserid').val($.trim(stripdata));
			    $("#frmValidation").attr("action", "<?php echo site_url('faq/delete_faq');?>");
			    $("#frmValidation").submit();
			    return true;
			}
		});
	});
</script>
<?php $this->load->view('includes/footer'); ?>
