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
	    
}
?>	
	<div class="sortable row-fluid">
		<script>
			function confirmDialog() {
				return confirm("Are you sure you want to delete this record? If deleted then the content ( which is already used at user section ) will be removed.")
			}
			//.........change the satus......
			function changeStaus($id,$st)
			{
				//alert($id+' '+$st);
				
			  var xmlhttp;
			  if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  }
			  else
			  {// code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  //alert(1);
			  xmlhttp.onreadystatechange=function()
			  {					  	
			    if (xmlhttp.readyState==4 && xmlhttp.status==200)
			  	{				
			  		      
			      if(xmlhttp.responseText == 'Y'){
			     		document.getElementById('sy'+$id).style.display = 'block';
			     		document.getElementById('sn'+$id).style.display = 'none';
			      }else{
			      		document.getElementById('sy'+$id).style.display = 'none';
			     		document.getElementById('sn'+$id).style.display = 'block';
			      }
			    }
			  }					  
				xmlhttp.open("GET","<?php echo base_url(); ?>ajax/change_status.php?id="+$id+"&status="+$st+"&tableName=category",true);			
			 	xmlhttp.send();		
			}
			
			
			// search function 
			function frmAction() {
			    //
			    var s =  document.getElementById('cat').value;
			    if (s == "search by category name.." || s=="") {
			       //code
			       s="";
				window.location.href = "<?php echo site_url('admin'); ?>/admin_category/";
			       return false;

			    }
			    else{
	
			    document.getElementById('search_form').action = "<?php echo site_url('admin'); ?>/admin_category/index/"+s;
			    return true;
			    }
			}
		</script>

		
		<!--- -->
			<div class="container-fluid">
            <div id="pad-wrapper" class="users-list" style="margin-top: 0px; padding: 0px;">
                 <div class="row-fluid header" style="margin-bottom: 34px;">
			<a href="<?php echo base_url().'admin/admin_category/'?>">
                    <!--<h3>Categories &nbsp</h3>-->
		    <h3>All Category &nbsp</h3>
                    </a>
                    <form method="post"  onsubmit="return frmAction();"   name="search_form" id="search_form" enctype="multipart/form-data">
                    	<?php
			    $string = $this->uri->segment(4);
			    if(isset($string)) {
				  if(is_numeric($this->uri->segment(4))){
				       $string = $this->uri->segment(4);
				  }
			     }
		       ?>
			<div class="pull-left">
				<input  type="text"  class="search" id="cat" value="<?php if($string == ''){ ?>search by category name..<?php }else{ echo $string; } ?>" name="search_string" name="search_string"  onfocus="if(this.value=='search by category name..'){this.value=''}" onblur="if(this.value==''){this.value='search by category name..'}">
				<input type="Submit" class="btn-flat new-product" value="Search">	<span id="s1"></span>
			</div>
                    </form>
                    
                    <div class="span10 pull-right">
                        
                            <a href="<?php echo base_url().'admin/admin_category/add';?>" class="btn-flat success pull-right">
                            	<span>&#43;</span>
                            	ADD NEW ONE
                            </a>
                       
                    </div>
                </div> 
                <?php
		if(count($pages)> 0)
		{
			?>
                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span4 sortable">
                                    Category Name
                                </th>
                                
                                <th class="span3 sortable">
                                    <span class="line"></span>Parent Category Name
                                </th>
                                
                                 <th class="span3 sortable" style="text-align: center;">
                                    <span class="line"></span>Status
                                </th>
                                
                                <th class="span2 sortable">
                                    
                                </th>
                                <!-- <th class="span3 sortable align-right">
                                    <span class="line"></span>Email
                                </th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?php
			foreach($pages as $row)
			{
			?>
                        <tr>
                            <td>
                              <a href="javascript:void(0);" class="name"><?php echo ucfirst($row['name']);?></a>                               
                            </td>
                            
                            <td>
                                <?php
				if($row['parent_id'] == 0)
				{
					echo "Parent Category";
				}
				else
				{
				    $p_id= $row['parent_id'];
				    $p_name = $this->admin_category_model->get_perent_name($p_id);
					echo ucfirst($p_name[0]['name']);
				}
				?>
                            </td>
                            
                             <td style="text-align: center;">
                            	<?php if($row['status'] == 'Y'){ ?>
                            		<a href="JavaScript:void(0)" id="sy<?php echo $row['id'];?>" onclick="changeStaus(<?php echo $row['id'];?>,'N')"><span class="label label-success">Active</span></a>
                            		<a href="JavaScript:void(0)" id="sn<?php echo $row['id'];?>" onclick="changeStaus(<?php echo $row['id'];?>,'Y')" style="display: none;"><span class="label label-info">Standby</span></a>
                            	<?php }else{?>
                            		<a href="JavaScript:void(0)" id="sy<?php echo $row['id'];?>" onclick="changeStaus(<?php echo $row['id'];?>,'N')" style="display: none;"><span class="label label-success">Active</span></a>
                            		<a href="JavaScript:void(0)" id="sn<?php echo $row['id'];?>" onclick="changeStaus(<?php echo $row['id'];?>,'Y')"><span class="label label-info">Standby</span></a>
                            	<?php } ?>
                            </td>
                            
                            <td>                                
                                <div style="float:right">
                                    <div style="float: left; border-right: 1px solid #edf2f7; padding-right: 10px;">
                                    	<a href="<?php echo base_url().'admin/admin_category/update/'.$row['id'];?>"><i class="table-edit"></i></a>
                                    </div>
                                    <div style="float: left; padding-left: 10px;">
                                    	<a href="<?php echo base_url().'admin/admin_category/delete/'.$row['id']; ?>" onclick="return confirmDialog()"><i class="table-delete"></i></a>                                    	
                                    </div>
                               		
                                </div>
                            </td>
                        </tr>
                        <?php
                        	
						}
			}
			else{
				?>
				This Value Is not Matched....
				<?php
			}
			?>
                        </tbody>
                    </table>
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