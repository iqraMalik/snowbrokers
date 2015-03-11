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
	function go_reset()
	{
		location.href="<?php echo base_url();?>index.php/payment/index";
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
			<h4 class="management_name">Payment Management</h4>
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
							<div class="ui-select">
								<select name="search_option" id="search_option">
									
									<option value="task_id" <?php if(isset($search_option) && ($search_option=='task_id')){echo "selected";}?>>Task</option>
								</select>
							</div>
							<input type="text" class="search" name="get_search" id="get_search" value="<?php if(isset($get_search) && ($get_search!="")){echo $get_search;}?>">
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_search();">Search</a>
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_reset();">Reset</a>
						</form>
					</div>
				</div>
				<form name="multiple_form" id="multiple_form" method="post" action="<?php echo site_url('payment/multiple_option_category'); ?>">
					<input type="hidden" name="select_check" id="select_check" value="">
					<input type="hidden" name="select_my_option" id="select_my_option" value="">
					
					<div class="row-fluid">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="span1"><input type="checkbox" name="check_all" id="check_all" style="margin: 0px;"></th>
									<th class="span5">Task ID</th>
									<th class="span3">Payment Type</th>
									<th class="span3">Payment Date</th>
									<th class="span3">Payment Status</th>
									<th class="span3"><span class="line"></span></th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(count($payment) > 0)
									{
										foreach ($payment as $dataone):
									?>
										<!-- row -->
										<tr class="first">
											<td><input type="checkbox" name="scripts[]" class="checkbox_class" id="checkbox_<?php echo $dataone->id;?>" style="margin: 0px;" value="<?php echo $dataone->id;?>" onclick="go_check_all();"></td>
											<td><?php echo $dataone->task_id; ?></td>
											<td><?php echo ($dataone->payment_type==0)?"Credit":"Paypal"; ?></td>
											<td><?php echo DATE('dS M Y',strtotime($dataone->payment_date)) ; ?></td>											
											<td><?php echo ($dataone->payment_status==1)?"Completed":"Pending"; ?></td>
											<td>
												<ul class="actions">
													<li><a class="Edit_task_cat" id="Edit_task_cat<?php echo $dataone->id;?>" href="javascript:void(0);"><i class="table-edit"></i></a></li>
													<li class="last"><a class="Delete_task_cat" id="Delete_task_cat<?php echo $dataone->id;?>" href="javascript:void(0);"><i class="table-delete-new"></i></a></li>
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
	<input type="hidden" name="ListingTaskid" id="ListingTaskid" value="0">
</form>
<script type="text/javascript">
	$(function () {
        $('.Edit_task_cat').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edit_task_cat','');
			$('#ListingTaskid').val($.trim(stripdata));
			$("#frmValidation").attr("action", "<?php echo site_url('payment/edit_payment');?>");
			$( "#frmValidation" ).submit();
			return true;
		});
	});
	
	$(function () {
        $('.Delete_task_cat').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Delete_task_cat','');
			
			var r=confirm("Are you sure to delete this Payment?");
			
			if (r==true)
			{
			    $('#ListingTaskid').val($.trim(stripdata));
			    $("#frmValidation").attr("action", "<?php echo site_url('payment/delete_payment');?>");
			    $("#frmValidation").submit();
			    return true;
			}
		});
	});
</script>
<?php $this->load->view('includes/footer'); ?>