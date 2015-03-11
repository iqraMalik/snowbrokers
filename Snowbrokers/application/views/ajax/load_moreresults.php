<?php
    //print_r($rows);
    if(count($records) > 0)
    {
        //echo 'Check';
        foreach($records as $value)
        {
            //echo $value['countries'];
            if(isset($value['countries']) && $value['countries']!="")
            {
            
                $cuntries = explode(",",$value['countries']);
                
                if( in_array($country_id, $cuntries) )
                {
                    $product_images = $this->model_products->getImage($value['id']);
                    //print_r()
    ?>
                    <div class="col-md-4 col-xs-6">
                            <div class="product-img-box">
                                    <a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>"><img src="<?php echo base_url();?>admin/images/<?php if(isset($product_images[0]['image'])) echo 'uploads/actual_thumb/'.$product_images[0]['image']; else echo 'no_image.jpeg'; ?>" alt="<?php echo stripslashes($value['title']);?>" height="256" width="" /></a>
                            </div>
                            <div class="product-details clearfix">
                                    <h2><a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>"><?php echo stripslashes($value['title']);?></a></h2>
                                    <p><?php echo stripslashes($value['product_tag']);?></p>
                                    <div class="clearfix price_row">
                                            <span class="pull-left"><?php echo $value['choose_currency'].$value['price'];?></span>
                                            <div class="pull-right cart-search">
                                                    <form>
                                                        <a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>" class="cart-product"></a>
                                                        <a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>" class="search"></a>
                                                            <!--<button type="button" class="cart-product"></button>-->
                                                            <!--<button type="button" class="search"></button>-->
                                                    </form>
                                            </div>
                                    </div>
                            </div>
                    </div>
<?php           }
            }
            else {
                
                //print_r($value);
                $product_images = $this->model_products->getImage($value['id']);
                //print_r()
            ?>
            
                <div class="col-md-4 col-xs-6">
                        <div class="product-img-box">
                                <a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>"><img src="<?php echo base_url();?>admin/images/<?php if(isset($product_images[0]['image'])) echo 'uploads/actual_thumb/'.$product_images[0]['image']; else echo 'no_image.jpeg'; ?>" alt="<?php echo stripslashes($value['title']);?>" height="256" width="" /></a>
                        </div>
                        <div class="product-details clearfix">
                                <h2><a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>"><?php echo stripslashes($value['title']);?></a></h2>
                                <p><?php echo stripslashes($value['product_tag']);?></p>
                                <div class="clearfix price_row">
                                        <span class="pull-left"><?php echo  $value['choose_currency'].$value['price'];?></span>
                                        <div class="pull-right cart-search">
                                                <form>
                                                    <a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>" class="cart-product"></a>
                                                    <a href="<?php echo base_url().'index.php/product/details/'.$value['product_type_id'].'/'.$value['product_cat_id'].'/'.$value['id'];?>" class="search"></a>
                                                        <!--<button type="button" class="cart-product"></button>-->
                                                        <!--<button type="button" class="search"></button>-->
                                                </form>
                                        </div>
                                </div>
                        </div>
                </div>
            
<?php
            }
        }	
    }
    else if($group_no_count==0)
    {
        ?>
        <div class="col-md-4 col-xs-6">
                <div class="product-details clearfix">
                        <h2 style="color: #000000;width: 315px;">No products available for this category!</h2>
                </div>
        </div>
        <?php
    }
?>