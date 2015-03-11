<?php $this->load->view('includes/header'); 
?>
<script>
    function go_reset()
	{
		location.href="<?php echo base_url();?>index.php/workfeild/index";
	}
	
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
        <div class="span12" style="margin-left: -20px;">
            <h4>WorkField Management</h4>
	      <div class="pull-right">
				 <a class="btn-flat new-product" href="<?php echo site_url('workfeild/addworkfeild'); ?>">+ Add New</a>
			</div>
        </div>
    </div>
    <div class="row-fluid">
            <div id="main-stats">
                <div class="table-products">
                    <div class="row-fluid head">
                        
                    </div>

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
				    
				  <!--<option value="">All</option>-->
                                  <option value="work_feild" <?php if(isset($search_option) && ($search_option=='work_feild')){echo 'selected';}?>>Workfield</option>
                                 
                                </select>
                            </div>
                            <input type="text" class="search" name="get_search" id="get_search" value="<?php if(isset($get_search) && ($get_search!="")){echo $get_search;}?>">
			    <a class="btn-flat new-product" href="javascript:void(0);" onclick="go_search();">Search</a>
			    <a class="btn-flat new-product" href="javascript:void(0);" onclick="go_reset();">Reset</a>
			</form>
                        </div>
                    </div>
		  <form name="multiple_form" id="multiple_form" method="post" action="<?php echo site_url('workfeild/multiple_option_workfeild'); ?>">
		  <input type="hidden" name="select_check" id="select_check" value="">
					<input type="hidden" name="select_my_option" id="select_my_option" value="">
					    <input type="hidden" name="search_option" id="search_option" value="<?php if(isset($_REQUEST['search_option']) &&$_REQUEST['search_option']){echo $_REQUEST['search_option'];} ?>">
					<input type="hidden" name="get_search" id="get_search" value="<?php if(isset($_REQUEST['get_search']) &&$_REQUEST['get_search']){echo $_REQUEST['get_search'];} ?>">
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
				      <th class="span1"><input type="checkbox" name="check_all" id="check_all" style="margin: 0px;"></th>

                                    <th class="span3">
                                        <!--<input type="checkbox">-->
                                        Workfield
                                    </th>
                                   
                                    <th class="span3">
                                        Status
                                    </th>
                                    
                                    <th class="span3">
                                        <span class="line"></span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
				if(count($user_list) > 0)
				{
			    foreach ($user_list as $dataone):
			    ?>
                                <!-- row -->
                                <tr class="first">
                                   
                                      <td><input type="checkbox" name="scripts[]" class="checkbox_class" id="checkbox_<?php echo $dataone->id;?>" style="margin: 0px;" value="<?php echo $dataone->id;?>" onclick="go_check_all();"></td>
				       <td>
                                        <?php echo $dataone->work_feild; ?>
                                    </td>
                                  
                                    <td><?php echo ($dataone->status)?"Active":"Blocked"; ?></td>
                                  
                                    <td>
                                        <ul class="actions">
                                            <li><a class="Edituser" id="Edituser<?php echo $dataone->id;?>" href="javascript:void(0);"><i class="table-edit"></i></a></li>
                                            <li class="last"><a class="Deleteuser" id="Edituser<?php echo $dataone->id;?>" href="javascript:void(0);"><i class="table-delete"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                              <?php endforeach;
                                } else { ?>
                                	<tr class="first">
                                    <td colspan="6">
                                    	<div class="span12">
				                             <h4>There is no Email template at this time !! <a class="btn-flat new-product" href="<?php echo site_url('workfeild/addworkfeild'); ?>">+ Add New</a> For Create New One </h4>
				                        </div>
                                    </td>
                                    </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
		    </form>
		    <div class="pagination">
					    <?php echo $pagination; ?>
			    </div>
                    <!-- <div class="pagination">
                      <ul>
                        <li><a href="#">�</a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">�</a></li>
                      </ul>
                    </div> -->
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
			$("#frmValidation").attr("action", "<?php echo site_url('workfeild/editworkfeild');?>");
			$( "#frmValidation" ).submit();
			return true;
		});
	});
	$(function () {
        $('.Deleteuser').click(function (e) {
			e.preventDefault();
			var mainstring = $(this).attr('id');
			var stripdata = mainstring.replace('Edituser','');
			
			var r=confirm("Are you sure to delete this workfeild?");
			
			if (r==true)
			{
			    $('#ListingUserid').val($.trim(stripdata));
			    $("#frmValidation").attr("action", "<?php echo site_url('workfeild/delete_workfeild');?>");
			    $("#frmValidation").submit();
			    return true;
			}
		});
	});
	function edituserval (userIDClass) {
	  alert(userIDClass);
	}
</script>
<?php $this->load->view('includes/footer'); ?>