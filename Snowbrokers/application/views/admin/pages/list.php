<!-- 	
	<div>
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo site_url("admin"); ?>"><?php echo ucfirst($this->uri->segment(1));?></a> <span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo ucfirst($this->uri->segment(2));?>"><?php echo ucfirst($this->uri->segment(2));?></a>
			</li>
		</ul>
	</div> -->

	<div class="sortable row-fluid">

		<script>
			function confirmDialog() {
				return confirm("Are you sure you want to delete this record? If deleted then the content ( which is already used at user section ) will be removed.")
			}
		</script>

		<!-- my new list -->
		<div class="table-products">
           
            <div class="row-fluid filter-block">
                <div class="pull-right">                    
                    <a href="<?php echo site_url("admin").'/admin_pages/add'; ?>" class="btn-flat success">+ ADD PAGES</a>
                </div>
            </div>

            <div class="row-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="span3" style="text-align: center;">
                                Pages
                            </th>
                            <th class="span3" style="text-align: center;">
                                <span class="line"></span>Description
                            </th>
                            <th class="span3" style="width: 10%; text-align: center;">
                                <span class="line"></span>Status
                            </th>
                            <th class="span3" style="width: 5%;">
                                <span class="line"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
						foreach($pages as $row)
						{
						?>
							
							<tr>
								<!-- banner img section -->
	                            <td>
	                                <!-- <input type="checkbox"> -->
	                                <div class="img">
	                                	<?php if($row['img'] != ''){?>
	                                   	<!--<img src="<?php echo base_url();?>images/pages/thumb/<?php echo $row['img']; ?>" />-->
	                                   <?php }else{ ?>
	                                    	<!--<img src="<?php echo base_url();?>assets/nw/img/table-img.png" />-->	                                    	
	                                   <?php } ?>
	                                </div>
	                                <a href="#"><?php echo $row['page_title']; ?></a>
	                            </td>
	                            <!-- end banner img section -->
	                            
	                            <!-- Discription section  -->
	                            <td class="description">
	                                <?php 
	                                	$DiscLn = strlen($row['page_content']);
										$count = mb_strlen($row['page_content']);
										
										if($DiscLn > 200){
											$stringCut = substr($row['page_content'], 0, 200).'....';
											
											//$stringCut = $stringCut.'....';
											
											echo $stringCut;
										}else{
											echo $row['page_content'];
										}
	                                	//echo $count.'<>'.$row['page_content']; $string = substr($string,0,10).'...';
	                                ?>
	                            </td>
	                            <!-- end Discription section  -->
	                            
	                            <!-- Status section  -->
	                            <td style="width: 10%; text-align: center;">
	                            	<?php if($row['status'] == 'Y'){ ?>
	                            		<a href="<?php echo base_url().'admin/admin_pages/active/'.$row['id'].'/N'; ?>"><span class="label label-success">Active</span></a>
	                            	<?php }else{ ?>
	                            		<a href="<?php echo base_url().'admin/admin_pages/active/'.$row['id'].'/Y'; ?>"><span class="label label-info">Standby</span></a>
	                            	<?php } ?>
	                            </td>
	                            <!-- End section  -->
	                            
	                            <!-- tool section  -->
	                            <td style="width: 5%;">                              
	                                <ul class="actions">
	                                    <li><a href="<?php echo site_url("admin").'/pages/update/'.$row['id']; ?>"><i class="table-edit"></i></a></li>
	                                    <!-- <li class="last"><a href="<?php echo site_url("admin").'/admin_pages/delete/'.$row['id']; ?>" onclick="return confirmDialog()"><i class="table-delete"></i></a></li> -->
	                                </ul>
	                            </td>
	                            <!-- end tool section  -->
	                        </tr>
						<?php
						}
						?> 
                        
                    </tbody>
                </table>
            </div>
            
            <div class="pagination">
             
                <?php echo $this->pagination->create_links(); ?>
             
            </div>
        </div>
		<!-- end my new list -->		
	</div>