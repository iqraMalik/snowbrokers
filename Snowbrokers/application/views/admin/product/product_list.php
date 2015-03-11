
<?php
//showing the flash messages
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
//showing flash messages end
?>
<div class="sortable row-fluid">
    <script>
            //confirmbox
            function confirmDialog()
            {
                return confirm("Are you sure you want to delete this record? If deleted then the content ( which is already used at user section ) will be removed.")
            }
            
            //changeing the status in ajax
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
				xmlhttp.open("GET","<?php echo base_url(); ?>ajax/change_status.php?id="+$id+"&status="+$st+"&tableName=product",true);			
			 	xmlhttp.send();		
			}
            
            // search function 
            function frmAction() {
                var s =  document.getElementById('cat').value;
                if (s == "search by name.." || s=="") {
                   //code
                   s="";
                    window.location.href = "<?php echo site_url('admin'); ?>/admin_product/";
                   return false;

                }
                else{

                document.getElementById('search_form').action = "<?php echo site_url('admin'); ?>/admin_product/index/"+s;
                return true;
                }
            }
    </script>

		
		<!--- -->
	<div class="container-fluid">
            <div id="pad-wrapper" class="users-list" style="margin-top: 0px; padding: 0px;">
                <div class="row-fluid header" style="margin-bottom: 34px;">
			<a href="<?php echo base_url().'admin/admin_product/'?>">
                    <!--<h3>Categories &nbsp</h3>-->
		    <h3>All Products &nbsp</h3>
                    </a>
                    <form method="post"  onsubmit="return frmAction();"   name="search_form" id="search_form" enctype="multipart/form-data">
                        <div class="pull-left">
                            <input  type="text"  class="search" id="cat" name="search_string" name="search_string"  onfocus="if(this.value=='search by name..'){this.value=''}" onblur="if(this.value==''){this.value='search by name..'}">
                            <input type="Submit" class="btn-flat new-product" value="Search"><span id="s1"></span>
                        </div>
                    </form>
                    
                    <div class="span10 pull-right">
                        
                            <a href="<?php echo base_url().'admin/admin_product/add';?>" class="btn-flat success pull-right">
                            	<span>&#43;</span>
                            	ADD Product
                            </a>
                       
                    </div>
                </div> 
                <?php
                //listing the items
		if(count($pages)> 0)
		{
			?>
                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span4 sortable">
                                    Product Image
                                <th class="span4 sortable">
                                    <span class="line"></span>Product Name
                                </th>
                                
                                <th class="span3 sortable">
                                    <span class="line"></span>Category
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
                                <div class="thumb">
                                    <img src="<?php echo base_url().'assets/uploads/product_img/thumb/'.$row['image']; ?>">
                                </div>  
                            </td>
                            <td>
                              <a href="javascript:void(0);" class="name"><?php echo $row['name'];?></a>                               
                            </td>
                            
                            <td>
                                <?php
				$id=$row['category'];
				if($id==0)
				echo "No Category found";
			    else
			    $data=$this->admin_product_model->category($id);
			//print_r($data);
			echo $data[0]['name'];
				   
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
                                    	<a href="<?php echo base_url().'admin/admin_product/update/'.$row['id'];?>"><i class="table-edit"></i></a>
                                    </div>
                                    <div style="float: left; padding-left: 10px;">
                                        <a href="<?php echo base_url().'admin/admin_product/delete1/'.$row['id']; ?>" onclick="return confirmDialog()"><i class="table-delete"></i></a>
                                    </div>
                               		
                                </div>
                            </td>
                        </tr>
                        <?php
                        	
			    }
			}
			else
                        {
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
                <!-- end products table -->
            </div>
        </div>
</div>