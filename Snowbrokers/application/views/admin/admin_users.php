	<!-- <div>
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

		<!-- <table class="table table-striped table-bordered table-condensed">
			<thead>
			<tr>
				<th class="header">#</th>
				<th class="yellow header headerSortDown">User Name</th>
				<th class="yellow header headerSortDown">Email</th>
				<th class="yellow header headerSortDown">Option</th>
			</tr>
			</thead>
			
			<tbody>
				<?php
				foreach($pages as $row)
				{
				?>
				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['id'];?></td>
				</tr>
				
				
				<?php
				}
				?> 
			</tbody>
		</table> -->
		
		<!--- -->
			<div class="container-fluid">
            <div id="pad-wrapper" class="users-list">
                 <div class="row-fluid header">
                    <h3>Users</h3>
                    <div class="span10 pull-right">
                        <!--<input type="text" class="span5 search" placeholder="Type a user's name...">
                        
                        <div class="ui-dropdown">
                            <div class="head" data-toggle="tooltip" title="Click me!">
                                Filter users
                                <i class="arrow-down"></i>
                            </div>  
                            <div class="dialog">
                                <div class="pointer">
                                    <div class="arrow"></div>
                                    <div class="arrow_border"></div>
                                </div>
                                <div class="body">
                                    <p class="title">
                                        Show users where:
                                    </p>
                                    <div class="form">
                                        <select>
                                            <option>Name</option>
                                            <option>Email</option>
                                            <option>Number of orders</option>
                                            <option>Signed up</option>
                                            <option>Last seen</option>
                                        </select>
                                        <select>
                                            <option>is equal to</option>
                                            <option>is not equal to</option>
                                            <option>is greater than</option>
                                            <option>starts with</option>
                                            <option>contains</option>
                                        </select>
                                        <input type="text" />
                                        <a class="btn-flat small">Add filter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
						-->
                        <a href="new-user.html" class="btn-flat success pull-right">
                            <span>&#43;</span>
                            ADD USER
                        </a>
                    </div>
                </div> 

                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span4 sortable">
                                    Name
                                </th>
                                <th class="span3 sortable">
                                    <span class="line"></span>Email
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
                                <img src="img/contact-img.png" class="img-circle avatar hidden-phone" />
                                <a href="user-profile.html" class="name"><?php echo $row['name'];?></a>
                                <!-- <span class="subtext">Graphic Design</span> -->
                            </td>
                            <!-- <td>
                               <a href="user-profile.html" class="name"><?php echo $row['name'];?></a>
                            </td> -->
                            <td>
                                <a href="#"><?php echo $row['email'];?></a>
                            </td>
                            <!-- <td class="align-right">
                                <a href="#"><?php echo $row['email'];?></a>
                            </td> -->
                            <td>                                
                                <div>
                                    <div style="float: left; border-right: 1px solid #edf2f7; padding-right: 10px;"><i class="table-edit"></i></div>
                                    <div style="float: left; padding-left: 10px;"><a href="<?php echo base_url().'admin/admin_users/delete/'.$row['id']; ?>" onclick="return confirmDialog()"><i class="table-delete"></i></div>
                               		
                                </div>
                            </td>
                        </tr>
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
			<!-- -->
		
		<?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
		
	</div>