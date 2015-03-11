<?php
    //print_r($rows);
    if(count($records) > 0)
    {
        foreach($records as $value)
        {
            //print_r($value);
                ?>
        <div class="col-md-4 col-xs-6">
                <div class="product-img-box">
                        <a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>"><img src="<?php echo base_url();?>/images/black_jacket.png" alt="<?php echo stripslashes($value['title']);?>" /></a>
                </div>
                <div class="product-details clearfix">
                        <h2><a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>"><?php echo stripslashes($value['title']);?></a></h2>
                        <p><?php echo stripslashes($value['product_tag']);?></p>
                        <div class="clearfix price_row">
                                <span class="pull-left">$<?php echo $value['price'];?></span>
                                <div class="pull-right cart-search">
                                        <form>
                                                <button type="button" class="cart-product"></button>
                                                <button type="button" class="search"></button>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
<?php
        }	
    }
?>