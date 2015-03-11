<!-- content -->
<section class="content-area">
	<!--   This is for after login header menu bar start -->
   
	<?php echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
        <?php
	//print_r($track_product);
	//$country = $this->registration_model->get_country(); // Get all country details
	// $res = $this->registration_model->get_product_type(); // fetching product type from the database 
        //print_r($country);
        //print_r($country[$member_details->country]);
        ?>
	<div class="container">
		<div class="shipping-content clearfix">
			<?php
			if($this->session->flashdata('flash_message')=='pass_updt')
			{
				echo "<p style='color:green;'>Success! Password is updated successfully!</p>";
			}
			//else if($this->session->flashdata('flash_message')=='')
			//{
			//	echo "<p style='color:red;'>Oops! Someting went wrong. Password is not updated.</p>";
			//}
			
					
			?>
				<?php if(!empty($track_product))
				{
					
				?>
				<div class="form-hedding">
					<h2>My Selling Products</h2>
				</div>
					<hr style="color: green; border: 2px solid;">
				<div class="row besic-form-row">
					
                                        <div class="col-md-12">
                                        <div class="post-address besic-form details-show">
					<?php
					
					foreach($track_product as $track_details)
					{
						$prod_details = $this->model_products->get_product_size_color_quantity($track_details['id']);
						$product_quinty = $this->model_products->get_quintity($track_details['id']);
						//print_r($product_quinty);
                                                ?>
						<div class="form-hedding">
							<h2><?php echo $track_details['title'];?></h2>
						</div>
                                                <div class="post-address-cell product_table1">
                                                    <table style="border:2px;width:100%;paddin-left:0px;text-align:center;">
                                                        <tr>
							    <th style="text-align: center;">
                                                                Image
                                                            </th>
                                                            <th style="text-align: center;">
                                                                SIZE 
                                                            </th>
							    <th style="text-align: center;">
                                                                COLOUR
                                                            </th>
							    <th style="text-align: center;">
                                                                UPLOAD QUANTITY
                                                            </th>
							    <th style="text-align: center;">
                                                                SOLD QUANTITY
                                                            </th>
							    <th style="text-align: center;">
                                                                PRICE
                                                            </th>
						          <th style="text-align: center;">
                                                               Edit basic details
                                                            </th>
							<th style="text-align: center;">
                                                               Edit advance details
                                                            </th>


                                                        </tr>
							<i class="table-edit"></i>
							<?php
							if($prod_details!='0')
							{
								foreach($prod_details as $result)
								{
								?>
								<tr>
								    <td>
									<?php
									$nm = $this->modelhome->getImageName($track_details['id'],$result['color_id']);
									if($nm!=''){
									?>
									<img src="<?php echo base_url();?>admin/images/uploads/short_thumb/<?php echo $nm;?>">
									<?php
									}
									?>
								    </td>
								    <td>
									<?php if($result['product_related_size_id']>0){echo $this->model_products->get_SizeProduct($result['product_related_size_id']);}else{echo "-";} ?>
								    </td>
								    <td>
									<?php if($result['color_id']>0)
									{
										$color= $this->model_products->get_ColorProduct($result['color_id']);
										?>
										<center><div style= "width: 30px ; height: 15px; background-color:<?php echo $color;?>;border: 1px solid #000000;"></div></center>
									<?php
									}
										else{echo "-";
										} ?>
								    </td>
								    <td>
									<?php echo  $total=($result['quantity']+$product_quinty->quantity);?>
								    </td>
								    <td>
									<?php
									if($product_quinty->quantity)
									{
									echo $product_quinty->quantity;	
									}
									else
									echo 0;
									?>
								    </td>
								    <td>
									<?php echo $track_details['price']; ?>
								    </td>
								    <td>
									<a href="<?php echo base_url();?>myaccount/edit_track_details/<?php echo $track_details['id'];?>/<?php
									echo $result['product_related_size_id'];?>/<?php echo $result['color_id'];?>" target="_blank">
								<img title="Active Status" src="<?php echo base_url();?>admin/assets/img/admin/ico-table-new.png" style="width: 18px;">
								    </a>
								    </td>
							<td>
									<a href="<?php echo base_url();?>shipping_details/advance_features/<?php echo $track_details['id'];?>/edit" target="_blank">
								<img title="Active Status" src="<?php echo base_url();?>admin/assets/img/admin/ico-table-new.png" style="width: 18px;">
								    </a>
							</td>

								</tr>
								<?php
								}
							}
							else{
							?>
								<tr>
								    <td>
									-
								    </td>
								    <td>
									-
								    </td>
								    <td>
									-
								    </td>
								    <td>
									-
								    </td>
								    <td>
									-
								    </td>
								</tr>
							<?php
							}
							?>
                                                    </table>
                                                </div>
					<?php
					}
					?>
                                        </div>
					</div>
				</div>
				<?php
				}
				
				$result=$this->model_products->get_track_product_seller($this->session->userdata('id'));
				
				if(!empty($result))
				{
				?>
				<div class="form-hedding">
					<h2>My Purchased product</h2>
				</div>
<hr style="color: red; border: 2px solid;">
			<div class="row besic-form-row">
					
                                        <div class="col-md-12">
                                        <div class="post-address besic-form details-show">
					<?php
					foreach($result as $row)
				         {
				         $details=$this->model_products->get_track_product_details_seller($row->id);
				
						//print_r($product_quinty);
                                                ?>
						<div class="form-hedding">
							<h2><?php //echo $track_details['title'];?></h2>
						</div>
                                                <div class="post-address-cell product_table">
                                                    <table style="border:2px;width:100%;paddin-left:0px;text-align:center;">
                                                        <tr>
				               	<th style="text-align: center;">
                                                            PRODUCT NAME
                                                            </th>

						<th style="text-align: center;">
                                                               IMAGE
                                                            </th>
	
                                                            <th style="text-align: center;">
                                                                SIZE 
                                                            </th>
							    <th style="text-align: center;">
                                                                COLOUR
                                                            </th>
						          <th style="text-align: center;">
                                                              QUANTITY
                                                            </th>

							    <th style="text-align: center;">
                                                                TOTAL PRICE
                                                            </th>
						<th style="text-align: center;">
                                                               STATUS
                                                            </th>


                                                        </tr>
							<i class="table-edit"></i>
							<?php
							if(!empty($details))
							{
								foreach($details as $result)
								{
								?>
								<tr>
									<td>
									<?php
									
									if($this->modelhome->getproduct_name($result->product_id)>0)
									{
									echo $this->modelhome->getproduct_name($result->product_id);	
									}
									else
									{
									echo "-";	
									}
									?>	
									</td>
									<td>
									<?php if($result->product_id>0 && $result->color_id>0){$nm = $this->modelhome->getImageName($result->product_id,$result->color_id);
									?>
									<img src="<?php echo base_url();?>admin/images/uploads/short_thumb/<?php echo $nm;?>">
									
									<?php
									}
									else{echo "-";
									} ?>	
									</td>
								    <td>
									<?php if($result->size_id>0){echo $this->modelhome->getSizeName($result->size_id);}else{echo "-";} ?>
								    </td>
								    <td>
								
									<?php
								
									if($result->color_id>0)
									{
										$color= $this->modelhome->getColorName($result->color_id);
										?>
										<center><div style= "width: 30px ; height: 15px; background-color:<?php echo $color;?>; border: 1px solid #000000;"></div></center>
									<?php
									}
										else{echo "-";
										} ?>
								    </td>
								    <td>
									<?php
									if($result->quantity)
									{
									echo $result->quantity;	
									}
									else
									echo 0;
									?>
								    </td>
								    <td>
									<?php echo $result->total_amount; ?>
								    </td>
								    <td>
									<?php if($row->status==1)
									{
									echo "<span style='color: red;'>SALE PENDING</span>";
									}
									else
									echo "<span style='color: green;'>Deliverd</span>";
									?>
								    </td>
								</tr>
								<?php
								}
							}
							else{
							?>
								<tr>
								    <td>
									-
								    </td>
								    <td>
									-
								    </td>
								    <td>
									-
								    </td>
								    <td>
									-
								    </td>
								    <td>
									-
								    </td>
								    <td>
									-
								    </td>
								</tr>
							<?php
							}
							?>
                                                    </table>
                                                </div>
					<?php
					}
					?>
                                        </div>
					</div>
				</div>
<?php
}
?>
				
				
                </div>
        </div>
</section>