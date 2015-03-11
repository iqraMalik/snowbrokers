	
	<?php
		$flash_message=$this->session->flashdata('flash_message');
		if(isset($flash_message)){
			 if($flash_message == 'SUCESS')
   {
       echo '<div class="alert alert-success">';
       echo '<i class="icon-ok-sign"></i><strong>Success!</strong>successfully send.';
       echo '</div>';
    }
			//redirect('admin/admin_mail_controller');
		}
		?>	
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
				xmlhttp.open("GET","<?php echo base_url(); ?>ajax/change_status.php?id="+$id+"&status="+$st+"&tableName=mail",true);			
			 	xmlhttp.send();		
			}
			
			 function frmAction() {
		    //
		    var s =  document.getElementById('cat').value;
		    if (s == "search by mail id.."||s=="") {
		       //code
		       s="";
		       return false;
		    }
		    else{
		    document.getElementById('search_form').action = "<?php echo site_url('admin'); ?>/admin_mail_controller/index/"+s;
		    return true;
		    }
		}
			
		</script>
		

		
		<!--- -->
			<div class="container-fluid">
            <div id="pad-wrapper" class="users-list" style="margin-top: 0px; padding: 0px;">
                 <div class="row-fluid header" style="margin-bottom: 34px;">
				<a href="<?php echo base_url().'admin/admin_mail_controller/'?>">
                    <h3>Mail &nbsp</h3>
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
		
		 <div class="row-fluid filter-block">
		 <div class="pull-left">
                            <input  type="text"  class="search" id="cat" name="search_string" value="<?php if($string == ''){ ?>search by mail id..<?php }else{ echo $string; } ?>" name="search_string"  onfocus="if(this.value=='search by mail id..'){this.value=''}" onblur="if(this.value==''){this.value='search by mail id..'}">
		
                      <input type="Submit" class="btn-flat new-product" value="Search">
		          </div>
		<?php echo form_close(); ?>
                        
                            <!--<a href="<?php //echo base_url().'admin/color_controler/add';?>" class="btn-flat success pull-right">
                            	<span>&#43;</span>
                            	ADD COLOR
                            </a>-->
                       
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
                                    Mail list
                                </th>
                          <th class="span3 sortable">
                                    <span class="line"></span>Mail
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
                        <?php //print_r($pages);
						foreach($pages as $row)
						{
							$id=$row['id'];
						?>
                        <tr>
                           
                                <!--<img src="<?php //echo base_url().'images/users/thumb/'.$row['profile_img']; ?>" class="img-circle avatar hidden-phone" />   -->                            
                                <td class="name"><div style="background height: 20px; width: 30px;"><?php echo $row['mailid'];?></div>
                                <!-- <span class="subtext">Graphic Design</span> -->
				
                            </td>
                            <td>
                               <?php echo anchor("admin/admin_mail_controller/mailbox/$id",'Send mail');?>
                            </td> 
                            <!--
                                <td>
				<?php // echo $row['shortname'];?>
                            </td>-->
                           
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
                                    
                                    <div style="float: left; padding-left: 10px;">
                                    	<a href="<?php echo base_url().'admin/admin_mail_controller/delete/'.$row['id']; ?>" onclick="return confirmDialog()"><i class="table-delete"></i></a>                                    	
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