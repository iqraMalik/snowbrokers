<?php
	$this->load->view('includes/header');
	
	//if(isset($dataone))
	//{
	//     echo '<pre>';
	//     print_r($dataone);
	//}
?>
<script type="text/javascript">
   
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
			<h4 class="management_name">Middle Banner Management</h4>
			
		</div>
	</div>
	<div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4 class="management_name"></h4></div></div>
				<div class="row-fluid filter-block">
					
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
							<input type="hidden" id="sort_type" name="sort_type" value="<?php echo (isset($sort_type)?$sort_type:get_cookie('snowbrokers_bottom_home_footer_type'));?>" />
							<input type="hidden" id="sort_field" name="sort_field" value="<?php echo (isset($sort_field)?$sort_field:get_cookie('snowbrokers_bottom_home_footer_field'));?>" />
							
							<input type="hidden" name="btnVal" id="btnVal" value="<?php echo $myval;?>"/>
							
						</form>
					</div>
				</div>
				<form name="multiple_form" id="multiple_form" method="post" action="<?php echo site_url('middle_banner/editbanner_home_footer'); ?>">
					
					<div class="row-fluid">
					<table class="table table-hover">
						<thead>
							<tr>
								<th class="span3" style="width: 32%; padding-left: 2%;">Image</th>
								<th class="span3" style="width: 300%;">Details</th>
								<th class="span3" style="width: 300%;">Icon</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(count($rows) > 0) {
								foreach ($rows as $dataone):
							?>
						<tr class="first">
							<?php /*echo $this->config->item('banner_img_url');*/ ?>
							<td>
								<img src="<?php echo $dataone->image; ?>" />
							</td>
							<td>
								<?php echo $dataone->details; ?>
							</td>
							<td>
								<img src="<?php echo $dataone->icon; ?>" />
							</td>
							<td>
								<ul class="actions">
									<li><a class="Edituser" id="Edituser" href="javascript:void(0);"><i class="table-edit"></i></a></li>
								</ul>
							</td>
						</tr>
					<?php endforeach;
					} else { ?>
					<tr class="first">
					<td colspan="6">
					<div class="span12">
						    <h4>There is No  List at this time !! </h4>
						</div>
					</td>
					</tr>
					<?php } ?>
					</tbody>
					</table>
					</div>
				</form>
			    <!--<div class="pagination">
					    <?php /*echo $pages;*/ ?>
			    </div>-->
			</div>
		   </div>
	</div>
</div>
<form class="new_user_form" action="" id="frmValidation" method="post">
	<input type="hidden" name="ListingUserid" id="ListingUserid" value="<?php echo $dataone->id;?>">
</form>
<script type="text/javascript">
	$(function () {
        $('.Edituser').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edituser','');
			$('#ListingUserid').val($.trim(stripdata));
			$("#frmValidation").attr("action", "<?php echo site_url('middle_banner/editbanner_home_footer/'.$dataone->id);?>");
			$( "#frmValidation" ).submit();
			return true;
		});
	});
</script>
<?php $this->load->view('includes/footer'); ?>