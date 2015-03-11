<section class="content-area">
    <!--   This is for after login header menu bar start -->

    <?php echo $this->load->view('header/menu_bar'); ?>

    <!--   This is for after login header menu bar end -->
    <div class="container">
        <div class="shipping-content clearfix">
            <div class="col-md-12 side-r">
                    <h1>My Cart</h1>
            </div>
            <div class="advance-feture">
	    <?php
		//print_r($cart_items);
		if(!empty($cart_items))
		{
		   // echo $cart_items->id.'milon';
		$cart_products = $this->modelhome->get_CartProducts($cart_items->id);
		
			    if($cart_products!='0')
			    {
		    ?>
                    <div class="col-md-12 side-r">
                        <div class="product">
                            <div class="product-row">
                                <div class="product-cell" style="text-align: left;"></div>
                                <div class="product-cell" style="text-align: left;"> Product </div>
                                <div class="product-cell" style="text-align: left;"> Qty </div>
                          
			  
			        <div class="product-cell" style="text-align: left;"> Size </div>
                                <div class="product-cell" style="text-align: left;"> Color </div>
                                <div class="product-cell" style="text-align: left;"> Delivery </div>
                                <div class="product-cell" style="text-align: left;"> Price </div>
                                <div class="product-cell" style="text-align: left;"> Shipping Charges </div>
                                <div class="product-cell" style="text-align: left;"> Total </div>
                                <div class="product-cell" style="text-align: left;"></div>
                            </div>
                            
				<?php
				    $price_val=0;
                                    foreach($cart_products as $value)
                                    {
					
                                        $get_product_details = $this->modelhome->get_Product_Details($value->product_id,$value->size_id,$value->color_id);
                                        $GET_currency_code = $this->modelhome->get_CurrencyDetails($get_product_details['product_currency']);
                                        $get_color = $this->modelhome->get_singleProductColor($value->color_id);
                                        $get_size = $this->modelhome->get_singleProductSize($value->size_id);
					
					$symbol=$GET_currency_code->currency_code;
					$price_val=$price_val+$value->total_amount;
                            ?>
                            <div class="product-row" id="cartItem_<?php echo $value->id; ?>">
                                <div class="product-cell" style="text-align: left;"> <?php if($get_product_details['image_name']!='0') { ?><img alt="<?php echo $get_product_details['product_name']; ?>" src="<?php echo base_url();?>admin/images/uploads/short_thumb/<?php echo $get_product_details['image_name']; ?>"><?php } ?></div>
                                <div class="product-cell" style="text-align: left;"> <?php if($get_product_details['product_name']!='0'){echo $get_product_details['product_name'];}?> </div>
                                <div class="product-cell" style="text-align: left;" id="qunty_<?php echo $value->id;?>"><?php echo $value->quantity;?></div>
                                <div class="product-cell" style="text-align: left;"> <?php if($get_size!='0') {echo $get_size->size_type;} else {echo "-";} ?> </div>
                                <div class="product-cell" style="text-align: left;">
				    <?php
				    if($get_color!='0')
				    {
					?>
					<div class="select-color" style="float:none;">
					<ul id="all_colors" class="select--product-color">
					<li style=" background-color : <?php echo $get_color->color_code;?>">
					<a class="col_select" href="javascript:void(0)">
					</a>
					</li>
					</ul>
					</div>
					<?php
					//echo $get_color->color_code;
				    }
				    else
				    {
					echo "-";
				    }
				    ?>
				</div>
                                <div class="product-cell" style="text-align: left;"> 3-5 Businness Days </div>
                                <div class="product-cell" style="text-align: left;"> <?php echo $GET_currency_code->currency_code." ".$get_product_details['price']; ?> </div>
                                <div class="product-cell" style="text-align: left;"> We will get back to you with freight options </div>
                                <div class="product-cell" style="text-align: left;"> <?php echo $GET_currency_code->currency_code." ".$value->total_amount; ?> </div>
                                <div class="product-cell" style="text-align: left;">
				    <a href="<?php echo base_url();?>index.php/product/details/<?php echo $get_product_details['product_type_id'].'/'.$get_product_details['product_cat_id'].'/'.$value->product_id.'/edit/'.$value->id;?>">Edit</a>
				    <img title="Delete this item" class="remove_catItem" id="remove_<?php echo $value->id; ?>" src="<?php echo base_url();?>images/list_remove112.png" />
				</div>
                            </div>
                            <?php
                                    }
                            ?>
                        </div>
			<hr/>
			<div class="product">
			    <div class="product-row">
				<div class="product-cell" style="text-align: right; padding-left: 290px;"><h4>Total Price:</h4></div>
				<div class="product-cell" style="text-align: right; padding-right: 103px; font-size: 14px;">
				    <?php echo $symbol." ".number_format((float)$price_val, 2, '.', ''); ?>
				</div>
                            </div>
			</div>
                    </div>
                    <div class="col-md-12 side-r">
                        <div class="sub-total clearfix">
                            <div class="post-address-cell pull-right">
                                <button class="btn btn-default" id="order_confirm">
                                    <span>CONFIRM ORDER</span>
                                </button>
                            </div>
                        </div>
                    </div>
		    <?php
		    }
		    else
		    {
			?>
			<h3 style="color:black; text-align:center;">Your cart is empty.</h3>
			<?php
		    }
		    }
		    ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $( document ).ready(function() {
        $(".remove_catItem").click(function() {
            var id = $(this).attr("id");
            var cart_id_array = id.split("_");
            var cart_id = cart_id_array[1];
	    
	    var crt_qnty = $("#cart_quantity").html();
	    var qnty = $("#qunty_"+cart_id).html();
	    //alert(qnty+'--'+crt_qnty);
	    var tot = parseFloat(crt_qnty - qnty);
            var r = confirm("Are you sure to delete this Item from your cart?");
            if (r==true) {
                $.ajax({
		    url: "<?php echo base_url(); ?>index.php/shipping_details/remove_CartItem",
		    data: {
			cart_id:cart_id
		    },
		    success: function(response) {
                        //alert(response);
			//var ans = response.split('@@');
                        if (response==1)
                        {
                            $('#cartItem_'+cart_id).remove();
			    $( "#cart_quantity").html(tot);
			    if (tot == 0)
			    {
				$(".advance-feture .side-r").remove();
				$(".advance-feture").append('<h3 style="color:black; text-align:center;">Your cart is empty.</h3>');
			    }
                        }
		    }
                });
            }
            
        });
        $("#order_confirm").click(function() {
	     $(location).attr('href',"<?php echo site_url('shipping_details/index')?>");
//            $.ajax({
//                url: "<?php echo base_url(); ?>index.php/shipping_details/confirm_Order",
//                success: function(response) {
//                    //alert(response);
//                    //var ans = response.split('@@');
//                    if (response==1 || response==2 || response==0)
//                    {
//                        $(location).attr('href',"<?php echo site_url('shipping_details/index')?>");
//			 $(location).attr('href',"<?php echo site_url('shipping_details/my_cart_finish')?>");
//                    }
//                }
//            });
        });
    });
</script>