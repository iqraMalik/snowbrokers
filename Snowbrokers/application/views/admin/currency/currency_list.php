<?php
$flash_message=$this->session->flashdata('flash_message');
if(isset($flash_message))
{
    if($flash_message == 'updated')
    {
	echo '<div class="alert alert-success">';
	echo '<i class="icon-ok-sign"></i><strong>Success!</strong>successfully updated.';
	echo '</div>';
     }

    if($flash_message == 'not_updated')
  
	{
	echo'<div class="alert alert-error">';
	echo'<i class="icon-remove-sign"></i><strong>Error!</strong> in updation. Please try again.';        
	echo'</div>';
	}
	if($flash_message == 'added')
    {
	echo '<div class="alert alert-success">';
	echo '<i class="icon-ok-sign"></i><strong>Success!</strong>successfully added.';
	echo '</div>';
     }

    if($flash_message == 'not_added')
  
	{
	echo'<div class="alert alert-error">';
	echo'<i class="icon-remove-sign"></i><strong>Error!</strong> when added. Please try again.';        
	echo'</div>';
	}
	    
}
?>
	    <script>
		function chkFrm()
		{
//	    if(document.getElementById('first_input_4[index]').value == 0 )
//                {
//		    alert("chk");
//                        document.getElementById('currency_nameerr').innerHTML = 'Please Select the Currency Name...';
//                        return false;
//                }
//                else
//                {
//                        document.getElementById('currency_nameerr').innerHTML = '';
//                }
		}
		</script>
		<?php
			//form data
			$attributes = array('class' => 'form-horizontal', 'id' => 'addcurrency', 'onSubmit' => 'return chkFrm();');
	
			//form validation
			echo validation_errors();
			
			//echo form_open('admin/pages/add', $attributes);
			echo form_open_multipart('admin/admin_currency/add', $attributes);
		?>
	<div class="sortable row-fluid">
		<script>
			function confirmDialog() {
				return confirm("Are you sure you want to delete this record? If deleted then the content ( which is already used at user section ) will be removed.")
			}
		</script>
<script>
    function add_one() {
       var count=parseInt($('#tr_count').val());
 $('#input_box').append(' <tr id="'+count+'_td"><td><input type="text" id="first_input_'+count+'" name="currency_name[]" value="" style="padding-right: 92px">&nbsp&nbsp;</td><td><input type="text" id="second_input_'+count+'" name="currency_symbol[]" value="" style="padding-right: 92px">&nbsp&nbsp;</td><td><input type="text" id="third_input_'+count+'" name="currency_cost[]" value="" style="padding-right: 92px">&nbsp&nbsp;</td><td><div style="float: left; padding-left: 10px;"><a href="javascript:void(0);" class="del_ele" onclick="remove_tr(\''+count+'_td\');"><i class="table-delete"></i></a></div></td>');
 
 //<td><div style="float: left; padding-left: 10px;"><input type="button" value="Add" onclick="update_row('+count+')"></div></td></tr>

$('#tr_count').val(count+1);
    }
    
function remove_tr(id)
{
    //alert(id);
    $("#"+id).remove();
    //$(this).parent('div').parent().parent().remove(); 
}
</script>
		
		<!--- -->
			<div class="container-fluid">
            <div id="pad-wrapper" class="users-list" style="margin-top: 0px; padding: 0px;">
                 <div class="row-fluid header" style="margin-bottom: 34px;">
			<a href="<?php echo base_url().'admin/admin_currency/'?>">
                    <!--<h3>Categories &nbsp</h3>-->
		    <h3>Currency And Price</h3>
                    </a>
                   
                    <div class="span10 pull-right">
                        
                           <!-- <a href="<?php //echo base_url().'admin/admin_category/add';?>" class="btn-flat success pull-right">
                            	<span>&#43;</span>
                            	ADD NEW ONE
                            </a>-->
                      <input type="button" name="add" id="add" value="ADD ONE" style="float:right;" onclick="add_one()">
                    </div>
                </div>
		 <div class="sortable row-fluid">
		<table>
                <tr>
                <td>
                        <div style="padding-right: 244px;padding-left: 127px;"><h5><i>Currency Name</i></h5></div> 
                </td>
                 <td>
                    <div style="padding-right: 250px"><h5><i>Currency Symbol</i></h5></div> 
                </td>
                  <td>
                    <div style="padding-right: 250px"><h5><i>Currency Price</i></h5></div> 
                </td>
                </tr>
                
                </table>
                  <table id='input_box'>
                   <?php
                   $i = 1;
                   
			foreach($pages as $row)
			{
			?>
			
                      
     
    <tr>
            <td>
                  <input type="text" name="currency_name[]" id="first_input_<?php echo $i;?>" value="<?php echo $row['currency_name'];?> " style="padding-right: 92px">&nbsp&nbsp
            </td>
            <td>
                  <input type="text" name="currency_symbol[]" id="second_input_<?php echo $i;?>" value="<?php echo $row['symbol'];?>"style="padding-right: 92px">&nbsp&nbsp
            </td>
             <td>
                  <input type="text" name="currency_cost[]"  id="third_input_<?php echo $i;?>" value="<?php echo $row['cost'];?>"style="padding-right: 92px">&nbsp&nbsp
            </td>
             <td>
                 <div style="float: left; padding-left: 10px;">
                    <a href="<?php echo base_url().'admin/admin_currency/delete/'.$row['id']; ?>" onclick="remove_tr"><i class="table-delete"></i></a>                                    	
                 </div>
             </td>
             <td>
                 <div style="float: left; padding-left: 10px;">
               <!-- <input type="button" value="Add" onclick="update_row(<?php echo $i;?>)">  -->             	
                 </div>
             </td>
        </tr> 
           
     
                 <?php
                 $i++;
                        }
                        ?>
                        </table>
                  <input type="hidden" id="tr_count" value="<?php echo $i;?>">
                </div>
                <div class="pagination pull-right">
                    <ul>
                      <?php echo $this->pagination->create_links(); ?>
                    </ul>
                </div>
                <!-- end users table -->
            </div>
        </div>
			
		
	</div>
	
<script>
//   $(document).ready(function(){
//	//$(".del_ele").live('click', function(){
//	//    alert('del');
//	//    });
//    });
</script>

		<div style="margin-left: 120px;">
		<button class="btn btn-primary" type="submit">Save</button>
		<!--<a href="<?php echo base_url(); ?>admin/admin_currency"><div class="btn" type="reset">Cancel</div></a>-->
				</div>
			</fieldset>

		<?php echo form_close(); ?>
		
	</div>