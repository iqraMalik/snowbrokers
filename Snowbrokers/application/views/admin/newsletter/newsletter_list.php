	
	<div class="sortable row-fluid">
		<script>
			function confirmDialog() {
				return confirm("Are you sure you want to delete this record? If deleted then the content ( which is already used at user section ) will be removed.")
			}
			
			
			 function frmAction() {
		    //
		    var s =  document.getElementById('cat').value;
		    if (s == "search by name.."||s=="") {
		       //code
		       s="";
		       return false;
		    }
		    else{
		    document.getElementById('search_form').action = "<?php echo site_url('admin'); ?>/admin_newsletter/index/"+s;
		    return true;
		    }
		}
		
                
                function chkval()
                {
                 var count=parseInt($('#tr_count').val());
                var ck = document.getElementById("checkbox"+count);
               
                alert(ck);
                for(var i = 0; i< len ; i++)
                {
                 var arr = ck[i].value;
                 alert (arr);
                }
            
                $('#tr_count').val(count+1);
    }
                
		</script>
		

		
		<!--- -->
			<div class="container-fluid">
            <div id="pad-wrapper" class="users-list" style="margin-top: 0px; padding: 0px;">
                 <div class="row-fluid header" style="margin-bottom: 34px;">
				<a href="<?php echo base_url().'admin/admin_newsletter/'?>">
                    <h3>News Letter &nbsp</h3>
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
                            <input  type="text"  class="search" id="cat" name="search_string" value="<?php if($string == ''){ ?>search by name..<?php }else{ echo $string; } ?>" name="search_string"  onfocus="if(this.value=='search by name..'){this.value=''}" onblur="if(this.value==''){this.value='search by name..'}">
		
                      <input type="Submit" class="btn-flat new-product" value="Search">
		          </div>
		<?php echo form_close(); ?>
                        
                            <!--<a href="<?php echo base_url().'admin/admin_newsletter/add';?>" class="btn-flat success pull-right">
                            	<span>&#43;</span>
                            	ADD USER
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
                                 
                                <th class="span2 sortable">
                                   <input type="checkbox" name="checkbox"  onclick="chkval()">  
                                </th>
                                <th class="span3 sortable" style="text-align: center">
                                    <span class="line"></span>Email Id
                                </th>
                               
                                <!-- <th class="span3 sortable align-right">
                                    <span class="line"></span>Email
                                </th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?php  $i=1;
						foreach($pages as $row)
						{
						?>
                        <tr>
                           
                             <td style="text-align: left">
                                <input type="checkbox" name="checkbox[]" id="checkbox<?php echo $i ;?>">
                             </td>
                            
                                <td style="text-align: center">
				<?php echo $row['email'];?>
                             </td>
                            
                           
                            
                           <!-- <td>                                
                                <div style="float:right">
                                    <div style="float: left; border-right: 1px solid #edf2f7; padding-right: 10px;">
                                    	<a href="<?php echo base_url().'admin/admin_users/update/'.$row['id'];?>"><i class="table-edit"></i></a>
                                    </div>
                                    <div style="float: left; padding-left: 10px;">
                                    	<a href="<?php echo base_url().'admin/admin_users/delete/'.$row['id']; ?>" onclick="return confirmDialog()"><i class="table-delete"></i></a>                                    	
                                    </div>
                               		
                                </div>
                            </td>-->
                        </tr>
                        <?php
                        $i++;
						}
			}else{
			?>
						
						This Value is Not Existed...
			
			<?php
			}
			?>
                        </tbody>
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