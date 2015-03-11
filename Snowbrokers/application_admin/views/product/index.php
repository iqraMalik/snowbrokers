<?php
	$this->load->view('includes/header');
	//print_r($this->session->all_userdata());
	//session_start();
	$_SESSION['is_logged_in']=$this->session->userdata('is_logged_in');
	$_SESSION['session_id']=$this->session->userdata('session_id');
	$_SESSION['admin_login']='true';
	//echo $_SESSION['admin_login'];
?>
<script type="text/javascript">
	function go_seaarch()
	{
		var selected = $("#search_option").val();
        if ((selected=='') && (document.getElementById('get_search').value!=""))
        {
            alert("Please Select an Option");
        }
        else
        {
            $('#search_mode').val('search');
            document.getElementById('search_form').submit();
        }
	}
	function go_reset()
	{
		location.href="<?php echo base_url();?>index.php/product/index";
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
	function display_active_inactive(val) {	
			$('#btnVal').val($.trim(val));
			$('#search_mode').val('search');
			$("#search_form").submit();
			
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
			<h4 class="management_name">Product Management</h4>
			<div class="pull-right" style="margin-bottom: 5px;"><a class="btn-flat new-product" href="http://www.snowbrokers.asia/admin_product/basic_details" target="_blank">+ Add New</a></div>
		</div>
	</div>
	<div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head"></div>
				<div class="row-fluid filter-block">
					
					<div class="pull-left">
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
							<input type="hidden" id="sort_type" name="sort_type" value="<?php echo (isset($sort_type)?$sort_type:get_cookie('snowbrokers_product_type'));?>" />
							<input type="hidden" id="sort_field" name="sort_field" value="<?php echo (isset($sort_field)?$sort_field:get_cookie('snowbrokers_product_field'));?>" />
							<input type="hidden" name="search_mode" id="search_mode" value="" />
							<input type="hidden" name="btnVal" id="btnVal" value="<?php echo $myval;?>"/>
							<div class="btn-group pull-left" style="padding-right: 10px;">
								<button class="glow left large" href="javascript:void(0);" value="1" onclick="display_active_inactive(1);"><span style="<?php echo $style1;?>"> Active </span></button>
								<button class="glow left large" href="javascript:void(0);" value="0" onclick="display_active_inactive(0);"><span style="<?php echo $style2;?>"> In-Active </span></button>
							</div>
							<?php
							   //    $TypeData = $this->model_productcategory->parentcat();
							      
							       ?>
							<div class="ui-select" style="width:160px">
							  
							     <select name="search_option" id="search_option" label="Category Type">
								  <option value="title" <?php if(isset($search_option) && ($search_option=='title')){echo 'selected';}?>>Product Name</option>
								  <option value="customer_type" <?php if(isset($search_option) && ($search_option=='customer_type')){echo 'selected';}?>>Uploaded By</option>
								  <option value="product_type_id" <?php if(isset($search_option) && ($search_option=='product_type_id')){echo 'selected';}?>>Product Type</option>
							     </select>
							</div>
							
							<input type="text" class="search" name="get_search" placeholder="Search by Category Name" id="get_search" value="<?php if(isset($get_search) && ($search_option !="")){echo $get_search;}?>">
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_seaarch();">Search</a>
							<a class="btn-flat new-product" href="javascript:void(0);" onclick="go_reset();">Reset</a>
						</form>
					</div>
					<div class="pull-right">
						<!--<a href="javascript:void(0);" onclick="go_multiple_option(1);"><img src="<?php echo main_url();?>images/trash.png" alt="Delete" title="Delete"></a>-->
						<a href="javascript:void(0);" onclick="go_multiple_option(2);"><img src="<?php echo main_url();?>images/active.png" alt="Active" title="Active"></a>
						<a href="javascript:void(0);" onclick="go_multiple_option(3);"><img src="<?php echo main_url();?>images/deactive.png" alt="Deactive" title="Deactive"></a>
					</div>
				</div>
				<form name="multiple_form" id="multiple_form" method="post" action="<?php echo site_url('product/multiple_option_product'); ?>">
					<input type="hidden" name="select_check" id="select_check" value="">
					<input type="hidden" name="select_my_option" id="select_my_option" value="">
					<!--<input type="hidden" name="search_option" id="search_option" value="<?php //if(isset($_REQUEST['search_option'])){echo $_REQUEST['search_option'];}?>">-->
					<input type="hidden" name="get_search" id="get_search" value="<?php if(isset($_REQUEST['get_search'])){echo $_REQUEST['get_search'];}?>">
					<div class="row-fluid">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="span1"><input type="checkbox" name="check_all" id="check_all" style="margin: 0px;"></th>
									<th class="span2">
										<a id="name" href="javascript:void(0);" onclick="sortField('title');" style="color:#000;text-decoration: none;">
										Product Name
										<?php
												if($sort_field=='title')
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
										</a>
									</th>
									<th class="span2">
										<a id="name" href="javascript:void(0);" onclick="sortField('customer_type');" style="color:#000;text-decoration: none;">
										Uploaded By
										<?php
												if($sort_field=='customer_type')
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
										</a>
									</th>
									<th class="span2">
										<a id="name" href="javascript:void(0);" onclick="sortField('product_type_id');" style="color:#000;text-decoration: none;">
										Product Type
										<?php
												if($sort_field=='product_type_id')
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
										</a>
									</th>
									<th class="span2">
										<a id="name" href="javascript:void(0);" onclick="sortField('product_cat_id');" style="color:#000;text-decoration: none;">
										Product Category
										<?php
												if($sort_field=='product_cat_id')
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
										</a>
									</th>
									
									
									<th class="span3">
										<a id="main_id" href="javascript:void(0);" onclick="sortField('product_tag');" style="color:#000;text-decoration: none;">
	
										Tag Name
										<?php
												if($sort_field=='product_tag')
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
										</a>
									</th>
									<th class="span2">
										<a id="main_id" href="javascript:void(0);" onclick="sortField('price');" style="color:#000;text-decoration: none;">
	
										Selling Price
										<?php
												if($sort_field=='price')
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
										</a>
									</th>
								        <th class="span2">
										<a id="main_id" href="javascript:void(0);" onclick="sortField('seller_price');" style="color:#000;text-decoration: none;">
	
										Seller Price
										<?php
												if($sort_field=='seller_price')
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
										</a>
									</th>
	
									<th class="span3">
										<a id="status" href="javascript:void(0);" onclick="sortField('status');" style="color:#000;text-decoration: none;">

										Status
										<?php
												if($sort_field=='status')
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
										</a>
									</th>
									<th class="span3"><span class="line"></span></th>
								</tr>
							</thead>
							<tbody>
								<?php
												if(count($rows) > 0) {
													/*if($params > $total_row){
														$params = $total_row;
														echo "Showing ".$params. " of ".$total_row." total results";
													}else{
														echo "Showing ".$params. " of ".$total_row." total results";
													}*/
												//echo $params;
												//$no= 0;
												//echo count($rows);
												foreach ($rows as $dataone):
												//++$number;
												//$_SESSION['is_logged_in']=$this->session->userdata('is_logged_in');
											?>
											<!-- row -->
											<tr class="first">
											    <td>
												<input type="checkbox" name="scripts[]" class="checkbox_class" id="checkbox_<?php echo $dataone->id;?>" style="margin: 0px;" value="<?php echo $dataone->id;?>" onclick="go_check_all();">
											<td><?php echo $dataone->title; ?></td>
											<?php $cust_name=$this->model_product->get_customer_by_id($dataone->customer_type);
											if(empty($cust_name))
											{
										          ?>
												<td> Admin</td>
										      <?php
											}
											else{
											//echo $cust_name[0]->first_name;
											?>
											<td> <?php echo $cust_name[0]['first_name'];?>  <?php echo $cust_name[0]['last_name'];?></td>
											<?php
											    }
											    ?>
										 <?php $prod_type=$this->model_product->prod_type_by_id($dataone->product_type_id);
										 ?>
										 <td><?php echo $prod_type[0]->title;?></td>
										<?php $prod_cat=$this->model_product->prod_cat_by_id($dataone->product_cat_id);
										 $currency=$this->model_product->get_currency($dataone->choose_currency);
										// print_r($currency);
										 ?>
										 <td><?php echo $prod_cat[0]->name;?></td>
											<td><?php echo $dataone->product_tag;?></td>
											<td><?php echo $currency[0]->currrency_symbol.$dataone->price;?></td>
											<td><?php echo $currency[0]->currrency_symbol.$dataone->seller_price;?></td>
											<td><?php echo ($dataone->status)?"Active":"Blocked"; ?></td>
											<td>
												
												<ul class="actions">
													<li><a class="Edituser" id="Edituser<?php echo $dataone->id;?>" href="http://www.snowbrokers.asia/admin_product/edit_basic_details/<?php echo $dataone->id;?>" target="_blank" title="Edit Basic Details"><i class="table-edit"></i></a></li>
													<li><a class="Edituser" id="Edituser<?php echo $dataone->id;?>" href="http://www.snowbrokers.asia/admin_product/advance_features/<?php echo $dataone->id;?>" target="_blank" title="Edit Advance Details"><i class="table-edit"></i></a></li>
													<li class="last"><a class="Deleteuser" id="Edituser<?php echo $dataone->id;?>" href="javascript:void(0);"><i class="table-delete-new" title="Delete Product"></i></a></li>
													<?php if($dataone->status==1)
													{
													?>
													<li class="last"><a class="stat_change" id="<?php echo $dataone->id;?>" value="0" href="javascript:void(0);"><img title="Active Status" src="<?php echo base_url();?>images/active.png" style="width: 17px;"></a></li>
													<?php
													}else{
													?>
													<li class="last"><a class="stat_change" id="<?php echo $dataone->id;?>" value="1" href="javascript:void(0);"><img title="Block Status" src="<?php echo base_url();?>images/inactive.png"></a></li>
													<?php
													}
													?>
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
							</tbody>
						</table>
					</div>
				</form>
			    <div class="pagination"><?php echo $pages; ?></div>
			</div>
		</div>
	</div>
</div>
<form class="new_user_form" action="" id="frmValidation" method="post">
	<input type="hidden" name="ListingUserid" id="ListingUserid" value="0">
</form>
<script type="text/javascript">
//	$(function () {
//        $('.Edituser').click(function (e) {
//			e.preventDefault();
//			var mainstring = $(this).attr('id');
//			var stripdata = mainstring.replace('Edituser','');
//			$('#ListingUserid').val($.trim(stripdata));
//			$("#frmValidation").attr("action", "<?php echo site_url('product/editproduct');?>");
//			$( "#frmValidation" ).submit();
//			return true;
//		});
//	});
	$(function () {
        $('.Deleteuser').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edituser','');
			
			var r=confirm("Are you sure to delete this Product?");
			
			if (r==true)
			{
			    $('#ListingUserid').val($.trim(stripdata));
			    $("#frmValidation").attr("action", "<?php echo site_url('product/delete_product');?>");
			    $("#frmValidation").submit();
			    return true;
			}
		});
	
	$('.stat_change').click(function (e) {
		var stat = $(this).attr('value');
		         e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edituser','');
		var r=confirm("Are you sure to Change status of this Product?");
		if (r==true)
			{
			    $('#ListingUserid').val($.trim(stripdata));
			    $("#frmValidation").attr("action", "<?php echo site_url('product/status_change/');?>/"+stat);
			    $("#frmValidation").submit();
			    return true;
			}
	});
});
	
</script>
<?php $this->load->view('includes/footer'); ?>
