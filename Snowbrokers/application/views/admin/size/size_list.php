	
		
	<div class="sortable row-fluid">
		<script>
		
			function confirmDialog() {
				return confirm("Are you sure you want to delete this record? If deleted then the content ( which is already used at user section ) will be removed.")
			}
			
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
				xmlhttp.open("GET","<?php echo base_url(); ?>ajax/change_status.php?id="+$id+"&status="+$st+"&tableName=attributes_size",true);			
			 	xmlhttp.send();		
			}
			
		
		</script>
		

		
		<!--- -->
			<div class="container-fluid">
            <div id="pad-wrapper" class="users-list" style="margin-top: 0px; padding: 0px;">
                 <div class="row-fluid header" style="margin-bottom: 34px;">
				<a href="<?php echo base_url().'admin/admin_size_controller/'?>">
                    <h3>Size &nbsp</h3>
                   </a>
			
                        
                            <a href="<?php echo base_url().'admin/admin_size_controller/add';?>" class="btn-flat success pull-right">
                            	<span>&#43;</span>
                            	ADD SIZE
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
                                    Category name
                                </th>
                                <th class="span3 sortable">
                                    <span class="line"></span>Sub_category
                                </th>
                                
                                 <th class="span3 sortable" style="text-align: center;">
                                    <span class="line"></span>Size
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
                           
                                                         
                                <td class="name"><?php $catid=$row['cat_id'];
				$catid=$this->admin_size_model->category($catid);
				
				 $cat_id=$catid[0]['name'];
				           echo $cat_id=strtoupper($cat_id);?></td>
                            
                            
                                <td class="name">
				<?php
				$id=$row['subcat_id'];
				$sub_cat=$this->admin_size_model->subcat($id);
				//print_r($sub_cat);
			       $sub_cate=$sub_cat[0]['name'];
			       echo $sub_cat=strtoupper($sub_cate);
				?>
                            </td>
				    <td style="text-align: center;">
				<?php  echo $row['size'];
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
                                    	<a href="<?php echo base_url().'admin/admin_size_controller/update/'.$row['id'];?>"><i class="table-edit"></i></a>
                                    </div>
                                    <div style="float: left; padding-left: 10px;">
                                    	<a href="<?php echo base_url().'admin/admin_size_controller/delete/'.$row['id']; ?>" onclick="return confirmDialog()"><i class="table-delete"></i></a>                                    	
                                    </div>
                               		
                                </div>
                            </td>
                        </tr>
                        <?php
						}
			}else{
			?>
						
						This Value is Not Existed...
			
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