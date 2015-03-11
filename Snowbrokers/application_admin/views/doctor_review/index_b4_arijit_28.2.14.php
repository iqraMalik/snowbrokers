<?php $this->load->view('includes/header'); ?>
<script type="text/javascript">
	function go_seaarch()
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
	function go_reset()
	{
		location.href="<?php echo base_url();?>index.php/doctor_review/index";
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
			<h4 class="management_name">Specialist's Review Management</h4>
			<!--<div class="pull-right" style="margin-bottom: 5px;"><a class="btn-flat new-product" href="<?php echo site_url('doctor_review/adddoctor_review'); ?>">+ Add New</a></div>-->
		</div>
	</div>
	<div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4 class="management_name">Specialist's Review List</h4></div></div>
				<div class="row-fluid filter-block">
					<div class="pull-left">
						<!--<a href="javascript:void(0);" onclick="go_multiple_option(1);"><img src="<?php echo main_url();?>images/trash.png" alt="Delete" title="Delete"></a>-->
						<a href="javascript:void(0);" onclick="go_multiple_option(2);"><img src="<?php echo main_url();?>images/active.png" alt="Active" title="Active"></a>
						<a href="javascript:void(0);" onclick="go_multiple_option(3);"><img src="<?php echo main_url();?>images/deactive.png" alt="Active" title="Active"></a>
					</div>
					<div class="pull-right">
						<form name="search_form" id="search_form" method="post" action="">
							<div class="ui-select">
								<select name="search_option" id="search_option">
									<option value="all" <?php if(isset($_REQUEST['search_option']) && ($_REQUEST['search_option']=='all')){echo "selected";}?>>All</option>
									<option value="doctor_id" <?php if(isset($_REQUEST['search_option']) && ($_REQUEST['search_option']=='doctor_id')){echo "selected";}?>>Specialist's Name</option>
								</select>
							</div>
							<input type="text" class="search" name="get_search" id="get_search" value="<?php if(isset($_REQUEST['get_search']) && isset($_REQUEST['search_option']) && ($_REQUEST['search_option']!="")){echo $_REQUEST['get_search'];}?>">
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_seaarch();">Search</a>
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_reset();">Reset</a>
						</form>
					</div>
				</div>
				<form name="multiple_form" id="multiple_form" method="post" action="<?php echo site_url('doctor_review/multiple_option_doctor_review'); ?>">
					<input type="hidden" name="search_option" id="search_option" value="<?php if(isset($_REQUEST['search_option']) &&$_REQUEST['search_option']){echo $_REQUEST['search_option'];} ?>">
					<input type="hidden" name="get_search" id="get_search" value="<?php if(isset($_REQUEST['get_search']) &&$_REQUEST['get_search']){echo $_REQUEST['get_search'];} ?>">
					
					<input type="hidden" name="select_check" id="select_check" value="">
					<input type="hidden" name="select_my_option" id="select_my_option" value="">
					<div class="row-fluid">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="span1"><input type="checkbox" name="check_all" id="check_all" style="margin: 0px;"></th>
									<th class="span3">Specialist's Name</th>
									<th class="span3">User's Name</th>
									<th class="span5">Review</th>
									<th class="span2">Rating</th>
									<th class="span2">Posted Date</th>
									<th class="span1">Status</th>
									<th class="span2"><span class="line"></span></th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(count($doctor_review_list) > 0)
									{
										foreach ($doctor_review_list as $dataone):
									?>
										<!-- row -->
										<tr class="first">
											<td><input type="checkbox" name="scripts[]" class="checkbox_class" id="checkbox_<?php echo $dataone->id;?>" style="margin: 0px;" value="<?php echo $dataone->id;?>" onclick="go_check_all();"></td>
											<td>
												<?php
													$doctor_details = $this->modeldoctor_review->user_name($dataone->doctor_id, 'specialist');
													echo $doctor_details->name;
												?>
											</td>
											<td>
												<?php
													$user_details = $this->modeldoctor_review->user_name($dataone->user_id, 'people');
													echo $user_details->name;
												?>
											</td>
											<td><?php echo $this->modeldoctor_review->short_data($dataone->review, 150); ?></td>
											<td><?php echo $this->modeldoctor_review->generate_rating($dataone->rating); ?></td>
											<td><?php echo $dataone->added_date; ?></td>
											<td><?php echo ($dataone->status)?"Active":"Blocked"; ?></td>
											<td>
												<ul class="actions">
													<li><a class="Edituser" id="Edituser<?php echo $dataone->id;?>" href="javascript:void(0);"><i class="table-edit"></i></a></li>
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
			$("#frmValidation").attr("action", "<?php echo site_url('doctor_review/view_doctor_review');?>");
			$( "#frmValidation" ).submit();
			return true;
		});
	});
	$(function () {
        $('.Deleteuser').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edituser','');
			
			var r=confirm("Are you sure to delete this user?");
			
			if (r==true)
			{
			    $('#ListingUserid').val($.trim(stripdata));
			    $("#frmValidation").attr("action", "<?php echo site_url('doctor_review/delete_doctor_review');?>");
			    $("#frmValidation").submit();
			    return true;
			}
		});
	});
</script>
<?php $this->load->view('includes/footer'); ?>