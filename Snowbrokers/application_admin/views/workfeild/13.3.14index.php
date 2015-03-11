<?php $this->load->view('includes/header'); 
?>
<script>
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
                        <div class="span12">
                            <h4>WorkField List</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
			<form name="search_form" id="search_form" method="post" action="">
                            <div class="ui-select">
                                <select name="search_option" id="search_option">
				  <option value="">All</option>
                                  <option value="work_feild" <?php if(isset($_REQUEST['search_option']) && ($_REQUEST['search_option']=='work_feild')){echo "selected";}?>>Workfield</option>
                                 
                                </select>
                            </div>
                            <input type="text" class="search" name="get_search" id="get_search" value="<?php if(isset($_REQUEST['get_search']) && isset($_REQUEST['search_option']) && ($_REQUEST['search_option']!="")){echo $_REQUEST['get_search'];}?>">
			    <a class="btn-flat new-product" href="javascript:void(0);" onclick="go_search();">Search</a>
			</form>
                        </div>
                    </div>
		  
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
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
				if(count($row) > 0)
				{
					foreach ($row as $dataone):
			    ?>
                                <!-- row -->
                                <tr class="first">
                                    <td>
                                       <!-- <input type="checkbox">-->
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
                    <!-- <div class="pagination">
                      <ul>
                        <li><a href="#">Ü</a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Ý</a></li>
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