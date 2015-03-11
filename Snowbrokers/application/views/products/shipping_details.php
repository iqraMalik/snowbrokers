<?php
$shipping_data = $this->modelhome->get_allShippingAddress();
$product_order_details = $this->modelhome->product_order_details();
//$get_product_details = $this->modelhome->get_Product_Details($product_order_details['product_id'],$product_order_details['size_id'],$product_order_details['color_id']);
//$GET_currency_code = $this->modelhome->get_CurrencyDetails($get_product_details['product_currency']);
//$get_color = $this->modelhome->get_singleProductColor($value->color_id);
//$get_size = $this->modelhome->get_singleProductSize($value->size_id);
?>
<!-- content -->
<section class="content-area">
	<!--   This is for after login header menu bar start -->
    
	<?php echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
	<div class="container">
		<div class="shipping-content clearfix">
			<div class="col-md-8 side-r">
				<h1>Shipping Address</h1>
				<?php //echo $this->session->userdata('prodict_id'); echo "<br/>row_id-".$this->session->userdata('row_id'); ?>
				<div class="address-area">
					<form name="add_cart" id="add_cart" action="<?php echo site_url('shipping_details/add_toCart');?>" method="post" onsubmit="return validate_Cart();">
					<?php if($cart_items != '0')
					{
					?>
					<input type="hidden" name="oid" value="<?php echo $cart_items->id;?>">
					<?php
					}
					?>
					<div class="post-address">
						<label>First Name <span class="star-color">*</span></label>
						<div class="post-address-cell">
							<input type="text" name="f_name" id="f_name" class="requireded" label="First Name" value="<?php echo $shipping_data['f_name'];?>" placeholder="">
							<span class="error_div" style="color:red;" id="f_name_error"></span>
						</div>	
					</div>	
					<div class="post-address">
						<label>Last name <span class="star-color">*</span></label>
						<div class="post-address-cell">
							<input type="text" name="l_name" id="l_name" class="requireded" label="Last Name" value="<?php echo $shipping_data['l_name'];?>" placeholder="">
							<span class="error_div" style="color:red;" id="l_name_error"></span>
						</div>	
					</div>
					<div class="post-address">
						<label>Company name <span class="star-color">*</span></label>
						<div class="post-address-cell">
							<input type="text" name="company_name" id="company_name" class="requireded" label="Company name" value="<?php echo $shipping_data['company_name'];?>" placeholder="">
							<span class="error_div" style="color:red;" id="company_name_error"></span>
						</div>	
					</div>
					<div class="post-address">
						<label>Mobile <span class="star-color">*</span></label>
						<div class="post-address-cell">
							<input type="text" name="mobile" id="mobile" class="requireded qty_value" label="Mobile" value="<?php echo $shipping_data['mobile'];?>" placeholder="">
							<span class="error_div" style="color:red;" id="mobile_error"></span>
						</div>	
					</div>
					<div class="post-address">
						<label>Alternate Phone <span class="star-color">*</span></label>
						<div class="post-address-cell">
							<input type="text" name="alternate_mobile" id="alternate_mobile" class="requireded qty_value" label="Alternate Phone" value="<?php echo $shipping_data['alternate_mobile'];?>" placeholder="">
							<span class="error_div" style="color:red;" id="alternate_mobile_error"></span>
						</div>	
					</div>
					<div class="post-address">
						<label>Address <span class="star-color">*</span></label>
						<div class="post-address-cell">
							<input type="text" name="address" id="address" class="requireded" label="Address" value="<?php echo $shipping_data['address'];?>" placeholder="">
							<span class="error_div" style="color:red;" id="address_error"></span>
						</div>	
					</div>
					<div class="post-address">
						<label>Country <span class="star-color">*</span></label>
						<div class="post-address-cell">
							<input type="text" name="country" id="country" class="requireded" label="Country" value="<?php echo $shipping_data['country'];?>" placeholder="">
							<span class="error_div" style="color:red;" id="country_error"></span>
						</div>	
					</div>
					<div class="post-address">
						<label>State/Region <span class="star-color">*</span></label>
						<div class="post-address-cell">
							<input type="text" name="state" id="state" class="requireded" label="State/Region" value="<?php echo $shipping_data['state'];?>" placeholder="">
							<span class="error_div" style="color:red;" id="state_error"></span>
						</div>	
					</div>
					<div class="post-address">
						<label>City <span class="star-color">*</span></label>
						<div class="post-address-cell">
							<input type="text" name="city" id="city" class="requireded" label="City" value="<?php echo $shipping_data['city'];?>" placeholder="">
							<span class="error_div" style="color:red;" id="city_error"></span>
						</div>
					</div>
						<input type="submit" id="sub" style="display: none;"/>
					</form>
					<div class="post-address">
						<label>&nbsp</label>
						<div class="post-address-cell">
							<button class="btn btn-default" id="button" type="button" onclick="chkAvailablity();">
								<span>SAVE & CONTINUE</span>
							</button>
							<p><span class="star-color">*</span>Required Fields</p>
						</div>	
					</div>
					
				</div>	
			</div>	
			<div class="col-md-4">
				<div class="order">
					<h2>order summary</h2>
					<div class="summary-detail">
						 <?php
						//print_r($cart_items);
						    if(!empty($cart_items))
						    {
							
							$cart_products = $this->modelhome->get_CartProducts($cart_items->id);
							if($cart_products!='0')
							{
								$price_val=0;
								$total = 0;
								$total_price_arr=array();
							    foreach($cart_products as $value)
							    {
								
								//echo "<pre>"; print_r($value); echo "</pre>";
								$get_product_details = $this->modelhome->get_Product_Details($value->product_id,$value->size_id,$value->color_id);
								$GET_currency_code = $this->modelhome->get_CurrencyDetails($get_product_details['product_currency']);
								$get_color = $this->modelhome->get_singleProductColor($value->color_id);
								$get_size = $this->modelhome->get_singleProductSize($value->size_id);
						
								$symbol=$GET_currency_code->currency_code;
								$price_val=$price_val+$value->total_amount;
								
								array_push($total_price_arr,$value->total_amount);
						?>
						<div class="product" id="product_head<?php echo $value->id;?>">
						<div class="product-row">
							<div class="product-cell" style="text-align: left;">
								Product
							</div>	
							<div class="product-cell"  style="width: 55px;">
								Qty
							</div>
							<div class="product-cell">
								Delivery
							</div>
							<div class="product-cell">
								Price
							</div>
						</div>	
						<div class="product-row" id="product_body<?php echo $value->id;?>">
							<div class="product-cell" style="text-align: left;">
								<?php
								if($get_product_details['image_name']!="" || $get_product_details['image_name']!=0)
								{
								?>
									<img alt="<?php echo $get_product_details['product_name']; ?>" src="<?php echo base_url();?>admin/images/uploads/short_thumb/<?php echo $get_product_details['image_name']; ?>">
								<?php
								}else
								{
								?>
									<img alt="<?php echo $get_product_details['product_name']; ?>" src="<?php echo base_url();?>admin/images/no_image.jpeg">
								<?php
								}
								?>
								
							</div>
							<div class="product-cell">
								<?php echo $value->quantity;?>
							</div>
							<div class="product-cell">
								<?php echo $days = $this->modelhome->shippin_days();?><br />
							</div>
							<div class="product-cell">
								<?php echo $GET_currency_code->currency_code." ".$get_product_details['price']; ?>
							</div>
						</div>	
						</div>	

						<div class="amount">
						<div style="background-color: rgb(255, 153, 153); display: none;" id="not_available<?php echo $value->id;?>" class="sub-total clearfix">
							<p>Sorry! This product is not available.</p>
						</div>
						</div>
						<div class="amount" id="product_body_price<?php echo $value->id;?>">
						<div class="sub-total clearfix">
							<p class="pull-left">Sub total</p>
							<p class="pull-right"><?php echo $GET_currency_code->currency_code." ".$value->total_amount; ?></p>
						</div>	
						</div>
						<?php
						
							    }
							    //print_r($total_price_arr);
							//$total_num_of_price = count($total_price_arr);
							//for($i=0;$i<$total_num_of_price;$i++)
							//{
							//	$total = $total + $total_price_arr[$i];
							//}
							
						?>
						<div class="amount" id="product_total_price">
							<div class="sub-total clearfix">
								<p class="pull-left">Total Price</p>
								<p class="pull-right"><?php echo $symbol." ".number_format((float)$price_val, 2, '.', ''); ?></p>
							</div>	
						</div>
						<?php
							}
						    }
						    
						?>
						
					<button class="btn btn-default" onclick="redirect_cart();">
								<span>EDIT CART</span>
					</button>
					</div>
					
					
				</div>	
			</div>	
		</div>
	</div>
</section>
<script>
	
	function redirect_cart()
	{
		//code
		//Order confirmation section and checking for--product available or not
		//alert(<?php echo $cart_items->id;?>);
		
		
		window.location.href="<?php echo base_url();?>shipping_details/my_cart";
	}
</script>
<!-- content End -->
<script type="text/javascript">
	$('.qty_value').keyup(function () { 
            this.value = this.value.replace(/[^0-9]/g,'');
        });
	function validate_Cart()
	{
		$('.error_div').html('');
		
		var element_id,element_value,element_label,error_div,element_validation_type;
		var required_elements = $('.requireded');
		var has_error = 0;
		required_elements.each(function(){
		       element_id = $(this).attr('id');
		       element_value = $(this).val();
		       element_label = $(this).attr('label');
		       element_validation_type = $(this).attr('validation_type');
		       error_div = $("#"+element_id+"_error")
		       if (element_value.search(/\S/)==-1) {
			   error_div.html(element_label+' is required.');
			   has_error++;
		       }
		       
		});
		
		if (has_error==0)
		{
		    //return false;
		    return true;
		}
		else
		{
		    return false;
		}
	}
	
function chkAvailablity()
{
	
		 var oid = $('#oid').val();
		 
	        //order confirmation section and checking product available or not
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url();?>product/chkPlaceorder",
				data : {oid:oid},
				success: function(data) {
					//alert(data);
					var chk_string = data;
					var chk_arr = chk_string.split('##');
					var len     = chk_arr.length;
					var na_count = 0;
					//looping to check whick product is available and which is not
					for (i=0; i < len; i++)
					{
						var product_arr = chk_arr[i].split('*^*');
						var av          = product_arr[0].replace(/\s/g, "");;
						//alert(av);
						//alert(chk_arr[i])
						if (av == 'na') {
							var err_id = product_arr[2];
							$("#not_available"+err_id).css({'display':'block'});
							na_count++;
							//code
						}
					}
					
					if (parseInt(na_count) > 0)
					{
						//code
						return false;	
					}
					else
					{
						$("#sub").trigger('click');
					}
					//alert('length :'+len);
				}		
			});
		//order confirmation section and checking product available or not
}

</script>