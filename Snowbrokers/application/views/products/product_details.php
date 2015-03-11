<section class="content-area">

  <!--rate it files-->
  <link href="<?php echo base_url();?>rate_it/rateit.css" rel="stylesheet" type="text/css">
  <script src="<?php echo base_url();?>rate_it/jquery.rateit.js" type="text/javascript"></script>
  <!--rate it files end-->
<!------------#################### page load calculations  ##################----------------------->
<?php
//check if coming from cart page
$chk_edit = $this->uri->segment(6);
if( $chk_edit == 'edit' )
{
  $product_id = $this->uri->segment(5);
  $order_details_id = $this->uri->segment(7);
  
  $getOrderproductinfo = $this->model_products->getOrderproductinfo($order_details_id);
  
  echo $order_size  = $getOrderproductinfo[0]['size_id'];
  echo $order_color = $getOrderproductinfo[0]['color_id'];
  echo $order_quantity = $getOrderproductinfo[0]['quantity'];
  //echo "<pre>";
  //print_r( $getOrderproductinfo );
  //echo "</pre>";
  //$get_color = $this->modelhome->get_singleProductColor($value->color_id);
  //$get_size = $this->modelhome->get_singleProductSize($value->size_id);
}
//check if coming from cart page end

$act_size = array(); /*############### this array contains all active sizes ########*/
if( !empty( $all_pro_related_details ) )
{
  foreach($all_pro_related_details as $sz)
  {
    if( !in_array( $sz['product_related_size_id'],$act_size, true ))
    {
      array_push( $act_size, $sz['product_related_size_id']);
    }
  }  
}


$a   = ''; /*it will determine which size is available*/
$b=0;
$c =0;
if( !empty($all_sizes) )
{
foreach( $all_sizes as $size )
{
if( in_array($size['id'], $act_size ))
   {
    
     $class = '';
     if( $c == 0 )
      {
	if( $chk_edit != 'edit' )
	{
	 $a   = $size['id'];	  
	}
	else
	{
	  $a = $order_size;
	}
      }
     $c++;
   }
   else
   {
    $class = 'disable';  
   }
$b++;
}  
}
else{
  $class = '';
}
//echo "Available Size :".$a;

//color calculation depending on the available size
if( $a != '' )
{
  $color_arr = $this->model_products->getColors_size_redo( $a, $this->uri->segment(5) );
}
else
{
  $color_arr = $this->model_products->getColors_redo(  $this->uri->segment(5) );
}

//now get the images for first load
if(!empty( $color_arr ))
{
  //if color choosen
  $i = 0;
  foreach( $color_arr as $img_arr )
  {
    if( $i == 0 )
    {
      if($chk_edit != 'edit')
      {
	$img_array = $this->model_products->getImage_color_redo( $img_arr['color_id'], $this->uri->segment(5) );	
      }
      else
      {
	$img_array = $this->model_products->getImage_color_redo( $order_color, $this->uri->segment(5) );
      }
    }
  $i++;  
  }
}
else
{
  //if no color chosen
  $img_array = $this->model_products->getImage_redo( $this->uri->segment(5) );
}
//now get the images for first load
//echo "<pre>";
//print_r( $color_arr );
//echo "</pre>";
//echo "<pre>";
//print_r( $img_array );
//echo "</pre>";
?>
  <!--####################this is for navigation menu ###############-->
  <?php echo $this->load->view('header/menu_bar'); ?>
  <!--####################this is for navigation menu ###############-->
	<div class="container">
	  <div id="success_order" style="margin-top:15px; display: none;" class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Order placed successfully</strong><span style="float: right; margin-right: 20px;"><a href="javascript:void(0);">Show details</a></span></div>
		<!-- breadcrumb	 -->
		<?php
		$get_cat  = $this->model_products->getTypes_specific($this->uri->segment(3));
		$get_type = $this->model_products->getSubCategories_specific($this->uri->segment(4));
		?>
		
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url();?>">Home</a></li>
		  <li><a href="javascript:void(0);"><?php echo stripslashes(ucfirst($get_cat[0]['title']));?></a></li>
		  <li class="active"><?php echo stripslashes(ucfirst($get_type[0]['name']));?></li>
		</ol>
		<!-- breadcrumb End	-->	
		<div class="row">
			<div class="col-md-7">
				<div class="product-left">
					<!-- <script type="text/javascript">
					    function changeImage(a) {
					        document.getElementById("bannerImage").src=a;
				       }
					</script> -->
					<div class="SliderVertical">
						<div id="zoom" class="zoom slider">
						<?php
						$m = 0;
						if( !empty($img_array))
						{
						foreach( $img_array as $image )
						{
						  if( $m == 0 )
						  {
						    $main_img = base_url().'admin/images/uploads/long_thumb/'.$image['image'];
						    $main_big_img = base_url().'admin/images/uploads/big_thumb/'.$image['image'];
						  }
						  ?>
						    <a href="javascript:void(0);" data-image="<?php echo base_url().'admin/images/uploads/long_thumb/'.$image['image'];?>" data-zoom-image="<?php echo base_url().'admin/images/uploads/big_thumb/'.$image['image'];?>"> 
						    <img style="height: 64px; width: 66px;" src="<?php echo base_url().'admin/images/uploads/short_thumb/'.$image['image'];?>" /> 
						    </a>
						  <?php
						}  
						}
						else
						{
						  $main_img = base_url().'admin/images/no_image.jpeg';
						  $main_big_img = base_url().'admin/images/no_image.jpeg';
						}
						?>
						</div>
						
						<div class = 'scrollbar'></div>
					</div>
					<div class="vertical-prev" onclick = "$('.SliderVertical').iosSliderVertical('prevPage');"><img src="<?php echo base_url();?>images/up-arrow.png" alt="down-arrow" /></div>
					<div class="vertical-next" onclick = "$('.SliderVertical').iosSliderVertical('nextPage');"><img src="<?php echo base_url();?>images/down-arrow.png" alt="up-arrow" /></div>
				</div>
				<div class="product-view">
					<img id="zoom_03" src="<?php echo $main_img;?>" data-zoom-image="<?php echo $main_big_img;?>"/>
				</div>	
			</div>	
			<div class="col-md-5 xtra-marg">
				<div class="product-name clearfix">
					<h1><?php echo stripcslashes(ucfirst($full_details_products[0]['title']));?></h1>
				</div>
				
				<div id="success_rev" style="margin-top:15px; display: none;" class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Your review posted successfully</strong><span style="float: right; margin-right: 20px;"></div>
				
				<div id="review_sec">
				<div class="review-section">
				  <?php
				  $comment = $this->model_products->countComment($this->uri->segment(5));
				  //echo $comment;
				  $val_arr = explode('^^',$comment);
				  
				  //echo "<pre>";
				  //print_r($val_arr);
				  //echo "</pre>";
				  if($val_arr[0] != '')
				  {
				    $count        = $val_arr[0];
				  }
				  else
				  {
				    $count        = 0;
				  }
				  
				  if( $count != 0 )
				  {
				    $total_star   = $val_arr[1];
				  }
				  else
				  {
				    $total_star   = 0;
				  }
				  if( $count != 0 )
				  {
				    $star_count         = $val_arr[2];
				  }
				  else
				  {
				    $star_count     = 0;
				  }
				  
				  $star = '';
				  $url = base_url();
				  for($i=0; $i<$star_count; $i++)
				  {
				      $star = $star.'<span><img src="'.$url.'images/rating-star.png" alt="star"></span>';    
				  }
				  ?>
				 
					  <div class="product-star"><?php echo $star;?></div>
					  <a href="#review" class="rating">
						  <span> <?php echo $star_count;?> Ratings</span>
						  <span>|</span>
						  <span><?php echo $count;?> Reviews</span>
					  </a>	
				
				</div>
				</div>
				<?php
			  $chk_comment = $this->model_products->check_comment($this->uri->segment(5), $this->session->userdata('id') );
			  if( $chk_comment == 0  )
			  {
			  ?>
			    <ul class="add-area" id="comment">
			      <li><a href="javascript:void(0)" onclick="open_rating();"><span class="review">&nbsp;</span>Write a Review</a></li>
			    </ul>
			  <?php
			  }
			  ?>
				<div id="comment_pop" style=" display: none;">
				<div class="product-size clearfix" style="margin-bottom:10px;">
				  
				  <div class="product-box" style="width: 100%">
				    
				    <ul class="nostyle" id="examples" style="list-style-type: none; padding: 0">
				     <label style="float: left; color: #000;"> Rate this item : </label>
				    <li style="float: left; margin-left: 10px;" id="ex_a1">
				      <div class="rateit" data-rateit-step="1">
				      </div>
				    </li>
				  </ul>
				    <input type="hidden" id="rate_it_val" value="0"/>
				    <span id="rate_it_err" style="display: none;color: red; margin-top: 20px;">Please rate..</span>
				    <textarea style="resize: none;color: rgb(2, 2, 2);" class="required" cols="55" id="comment_post"></textarea>
				    <span id="comment_post_err" style="display: none;color: red; float: left;width: 100%;">Please put your comment.</span>
				    <button id="hide_submit" style="margin-top:10px; float: left;" class="btn btn-default" onclick="submit_comment();">Submit</button>
				    <img src="<?php echo base_url();?>assets/images/325 (6).GIF" id="loader" style="display: none; margin-top: 15px;"/>
				  </div>
				</div>
				</div>
				<div class="product-size clearfix" id="information">
				<?php
					  if(!empty($color_arr))
					  {
					    ?>
					<div class="product-box">
					  
					    <h3>SELECT COLOR : </h3>
						
						<div class="select-color">
						      <ul id="all_colors" class="select--product-color">
							<?php
							//echo "<pre>";
							//print_r( $get_allfirst_colors );
							//echo "</pre>";
							if($chk_edit == 'edit')
							{
							  $s = 0;
							  foreach( $color_arr as $colo )
							  {
							    
							    if( $order_color == $colo['id']  )
							    {
							      $qty = $colo['quantity'];
							      $color = $colo['id'];							      
							    }

							     
							   
							    //echo $colo['quantity'];
							    ?>
							    
							    <li onclick="change_color(<?php echo $colo['id'];?>,<?php echo $colo['product_related_size_id'];?>,<?php echo $this->uri->segment(5);?>, <?php echo $colo['quantity'];?> )" class="" style=" background-color : <?php echo $colo['color_code'];?>">
								    <a id="pop_<?php echo $s;?>" title="<?php echo "Available :".$colo['quantity'];?>" <?php if( $order_color == $colo['id'] ){ ?> class="col_select" <?php }?> href="javascript:void(0)">
									    
								    </a>
							    </li>
							    <script>
							  $(function() {
							      $( "#pop_<?php echo $s;?>" ).tooltip({
							      show: {
							      effect: "slideDown",
							      delay: 250
							      }
							      });
							  })
							  </script>
							    <?php
							    $s++;
							  }
							}
							else
							{
							  $s = 1;
							  foreach( $color_arr as $colo )
							  {
							    
							    if( $s==1 )
							    {
							      $qty = $colo['quantity'];
							      $color = $colo['id'];
							     
							    }
							    //echo $colo['quantity'];
							    ?>
							    
							    <li onclick="change_color(<?php echo $colo['id'];?>,<?php echo $colo['product_related_size_id'];?>,<?php echo $this->uri->segment(5);?>, <?php echo $colo['quantity'];?> )" class="" style=" background-color : <?php echo $colo['color_code'];?>">
								    <a id="pop_<?php echo $s;?>" title="<?php echo "Available :".$colo['quantity'];?>" <?php if( $s == 1 ){ ?> class="col_select" <?php }?> href="javascript:void(0)">
									    
								    </a>
							    </li>
							    <script>
							  $(function() {
							      $( "#pop_<?php echo $s;?>" ).tooltip({
							      show: {
							      effect: "slideDown",
							      delay: 250
							      }
							      });
							  })
							  </script>
							    <?php
							    $s++;
							  }
							}
							
							?>
							     
						      </ul>
					      </div>
					</div>
					    <?php
					  }
					  else
					  {
					    //$qty = 0;
					    $color = 0;
					    $quantity_re = $this->model_products->quantity_re($color, $this->uri->segment(5));
					    //echo "<pre>";
					    //print_r($quantity_re);
					    //echo "</pre>";
					    if( !empty($quantity_re) )
					    {
					      $qty = $quantity_re[0]['quantity'];
					    }
					    else
					    {
					      $qty = 0;
					    }
					  }
					  ?>
						
					
					<?php
					//--------####### this for getting all the sizes of this category #######------------
					//echo "<pre>";
					//print_r( $all_sizes );
					//echo "</pre>";
					//echo "<pre>";
					//print_r( $all_pro_related_details );
					//echo "</pre>";
					//get all product active sizes
					
					$act_size = array(); /*############### this array contains all active sizes ########*/
					if( $all_pro_related_details != 0 )
					{
					 foreach($all_pro_related_details as $sz)
					{
					  if( !in_array( $sz['product_related_size_id'],$act_size, true ))
					  {
					    array_push( $act_size, $sz['product_related_size_id']);
					  }
					  
					} 
					}
					
					
					if( !empty($all_sizes) )
					{
					  ?>
					  <div class="product-box">
						  <div class="clearfix">
							  <h3 class="pull-left">SELECT SIZES : </h3>
						  </div>
						  
						  <ul id="size_box" class="size-box clearfix">
						    <?php
						    $sel   = '';
						    $h=0;
						    $k =0;
						    foreach( $all_sizes as $size )
						    {
						      if( in_array($size['id'], $act_size ))
							 {
							  
							   $class = '';
							   if( $chk_edit != 'edit' )
							   {
							      if( $k == 0 )
							       {
								  $sel   = $size['id'];
							       }
							    }
							    else
							    {
							        $sel   = $order_size;
							    }
							   $k++;
							 }
							 else
							 {
							  $class = 'disable';  
							 }
							 if($class != 'disable')
                             {
						      ?>
						      <li id="li_<?php echo $size['id'];?>" class="<?php if( $sel == $size['id'] ){  echo $class.' selected'; }else{ if( $class == '' ){ ?> <?php } echo $class;}?>" onclick="choose_diff_size(<?php echo $size['id'];?>, <?php echo $this->uri->segment(5);?>);"><?php echo ucwords(stripslashes($size['size_type']));?></li>
						      <?php
                             }
						      $h++;
                            }
						    ?>
						  </ul>	
					  </div>	
					  <?php
					}
					else
					{
					  $sel = 0;
					}
					?>	
					
				</div>	
				<div class="price clearfix">
					<div class="price-size pull-left">
						<h2>Price <?php echo $full_details_products[0]['choose_currency'].' '.$full_details_products[0]['price']?></h2>
						<!--<button class="btn btn-default">ADD TO ORDER</button>-->
						<button id="add_cart" onclick="add_cart();" <?php if( $qty == 0 ) { ?> style="display: none;"  <?php  }?>class="btn btn-default">ADD TO ORDER</button>
						<button id="add_cart_not" <?php if( $qty > 0 ) { ?> style="display: none;"  <?php  }else{ ?> style="display: block;" <?php }?>class="btn btn-default">NOT AVAILABLE</button>
					</div>	
					<div class="price-size pull-right text_black">
					  <!--###############  Product details section #######################---------------->
						<?php
						echo $full_details_products[0]['shipping_terms'];
						?>
					  <!--###############  Product details section #######################---------------->
					</div>	
				</div>	
			</div>	
		</div>	
		<div class="row">
			<div class="col-md-8 col-sm-8 text_black">
				<div class="info">
					<h3>Product Description</h3>
				</div>
                <div class="product-info">
				<?php
				//--------############# Product description ##################---------------------
				echo $full_details_products[0]['product_details'];
				//--------############# Product description ##################---------------------
				?>
                </div>
			</div>
			<!---------################## matching products ##################------------>
			<div class="col-md-4" style="overflow: hidden;">
				<div class="info">
					<h3>you may also like</h3>
				</div>
				<div class="other-product" id="owl-demo">
				<?php
				$matching_products = $this->model_products->getRelatedproducts( $this->uri->segment(3), $this->uri->segment(4) );
				//echo "<pre>";
				//print_r( $matching_products );
				//echo "</pre>";
				if( !empty( $matching_products ) )
				{
				  $u = 0;
				  $i = 1;
				  $j = 1;
				  
				  foreach( $matching_products as $match )
				  {
				      if(isset($match['countries']) && $match['countries']!="")
				      {
					$ids = $match['countries'];
					$country_ids = explode(",",$ids);
					
					if(in_array($country_id, $country_ids)) {
					
					      $product_name  = $match['title'];
					      $product_price = $match['price'];
					      $currency = $match['choose_currency'];
					      
					      $currency_code = $this->model_products->getSymbolproduct($currency);
					      
					      //echo $match['id'];
					      $image         = $this->model_products->getImage($match['id']);
					      $m = 0;
					      if( !empty($image) )
					      {
						 foreach( $image as $im )
						  {
						  if( $m == 0 )
						  {
						    $image_file = $im['image'];
						    $src =  base_url().'admin/images/uploads/short_thumb/'.$image_file;
						   break;
						  }
						  $m++;  
						  }
					      }
					     else
					     {
					      $src =  base_url().'admin/images/no_image.jpeg';
					      $image_file = '../../../no_image.jpeg';
					     }
					      //echo "<pre>";
					      //print_r( $image );
					      //echo "</pre>";
					      //if( !empty($match[0]) )
					      //{
						if( $u == 0 || $u%2 == 0 )
						{
						?>
						  <div class="item">
						    <div class="row">
							  
						  <?php
						}
					      ?>
					      <div class="col-md-12">
						      <div class="other-img">
							<a href="<?php echo base_url().'index.php/product/details/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$match['id'];?>">
						<img src="<?php echo base_url().'timthumb.php?src=';?><?php echo $src;?>" alt="like">
						      </a>
						      </div>	
						      <div class="other-detail">
							      <a href="<?php echo base_url().'index.php/product/details/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$match['id'];?>"><?php echo stripslashes(ucfirst($product_name));?></a>
							      <p><?php echo stripslashes(ucfirst($product_name));?></p>
							      <span><?php echo $currency_code[0]['currency_code'].' '.$product_price;?></span>
						      </div>	
					      </div>	
					      <?php
						if( $i%2 == 0 )
						{
						  ?>
						  </div>
						  </div>
						  <?php
						}
					     
					      $u++;
					      $i++;
					}
				      }
				      else {
					
					  $product_name  = $match['title'];
					  $product_price = $match['price'];
					  $currency = $match['choose_currency'];
					  
					  $currency_code = $this->model_products->getSymbolproduct($currency);
					  
					  //echo $match['id'];
					  $image         = $this->model_products->getImage($match['id']);
					  $m = 0;
					  if( !empty($image) )
					  {
					     foreach( $image as $im )
					      {
					      if( $m == 0 )
					      {
						$image_file = $im['image'];
						$src =  base_url().'admin/images/uploads/short_thumb/'.$image_file;
					       break;
					      }
					      $m++;  
					      }
					  }
					 else
					 {
					  $src =  base_url().'admin/images/no_image.jpeg';
					  $image_file = '../../../no_image.jpeg';
					 }
					  //echo "<pre>";
					  //print_r( $image );
					  //echo "</pre>";
					  //if( !empty($match[0]) )
					  //{
					    if( $u == 0 || $u%2 == 0 )
					    {
					    ?>
					      <div class="item">
						<div class="row">
						      
					      <?php
					    }
					  ?>
					  <div class="col-md-12">
						  <div class="other-img">
						    <a href="<?php echo base_url().'index.php/product/details/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$match['id'];?>">
					    <img src="<?php echo base_url().'timthumb.php?src=';?><?php echo $src;?>" alt="like">
						  </a>
						  </div>	
						  <div class="other-detail">
							  <a href="<?php echo base_url().'index.php/product/details/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$match['id'];?>"><?php echo stripslashes(ucfirst($product_name));?></a>
							  <p><?php echo stripslashes(ucfirst($product_name));?></p>
							  <span><?php echo $currency_code[0]['currency_code'].' '.$product_price;?></span>
						  </div>	
					  </div>	
					  <?php
					    if( $i%2 == 0 )
					    {
					      ?>
					      </div>
					      </div>
					      <?php
					    }
					 
					  $u++;
					  $i++;
					 //}
				      }
				  }
				}
				
				?>
				</div>
			</div>
			<!---------################## matching products end ##################------------>
		</div>
		</div>
	    <!--</div>-->
		
		
		
		  <a id="review"></a>
		      <div class="row" id="show_review_div">
			<?php
			  $pid=$this->uri->segment(5);
			  $review_products1 = $this->model_products->gereviewsProduct($pid, 5);
			 // $i=0;
			 //echo $review_products1;
			if($review_products1!='0')
			{
			  $total_comment=$this->model_products->countComment($pid);
			 // echo $total_comment;
			  $arr_total_comment=explode('^^',$total_comment);
			  //echo $arr_total_comment[0];
			?>
		      <div class="col-md-12">
			      <div class="info">
				<h3>Top Reviews of <?php echo $full_details_products[0]['title'];?></h3>
				<?php
				if(count($review_products1) > 5)
				{
				?>
				<span style="color: black; font-size: smaller; margin-left: 67%; cursor: pointer;" onclick="expand_all('<?php echo $arr_total_comment[0];?>','<?php echo $pid;?>');">Expand all reviews</span>
				<?php
				}
				?>
			      </div>
			      
			      <table style="color: black; width: 100%;">
			      <?php
				foreach($review_products1 as $review_products)
				{
				  $text=ucfirst($review_products->text);
				  $rate=$review_products->rating;
				  $uid=$review_products->uid;
				  $user_name = $this->model_products->get_user($uid);
				  
				  $star = '';
				  $url = base_url();
				  for($i=0; $i<$rate; $i++)
				  {
				      $star = $star.'<span><img src="'.$url.'images/rating-star.png" alt="star"></span>';    
				  }
				  ?>
				  <tr style="border-bottom: 1px dotted black;">
				    <td style="width: 200px;">
				      <?php echo $star;?>
				      <p style="font-size: smaller; padding-left: 4px;"><?php echo $rate;?> Ratings</p>
				      <?php echo $user_name;?>
				    </td>
				    <td style="text-align: justify;"><?php echo $text;?></td>
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
		      <br>
	</div>
</section>
<!-- content End -->

<script type="text/javascript">
	$(window).load(function() {
		$('.SliderVertical').iosSliderVertical({
			desktopClickDrag: true
		});
	});
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
	    	autoPlay: 3000, //Set AutoPlay to 3 seconds
	    	navigation : true,
	    	pagination : false,
		    items : 2,
	        itemsCustom : false,
	        itemsDesktop : [1199, 2],
	        itemsDesktopSmall : [979, 2],
	        itemsTablet : [768, 3],
	        itemsTabletSmall : false,
	        itemsMobile : [479, 2],
	    });
	
	
		$('#bannerImage').elevateZoom({
		    zoomType: "inner",
			cursor: "crosshair",
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 750,
			zoomWindowWidth: 552,
			zoomWindowHeight: 362,
	   });
	   
	   //initiate the plugin and pass the id of the div containing gallery images 
		$("#zoom_03").elevateZoom({
			zoomType : "lens",
			containLensZoom : true,
			gallery : 'zoom',
			cursor : 'pointer',
			galleryActiveClass : "active",
			zoomWindowWidth: 552,
			zoomWindowHeight: 362,
		}); 
		
	});
	
//functions written by anupam
function change_color(col_id, prod_rel_sz_id, pid, qty)
{
  //alert(qty);
  $("#qty").val(qty);
  if (qty == 0)
  {
    $("#add_cart").css({'display':'none'});
    $("#add_cart_not").css({'display':'block'});	
  }
  else
  {
    $("#add_cart").css({'display':'block'});
    $("#add_cart_not").css({'display':'none'});	
  }
  
  $("#color_id").val(col_id);
  
  //alert( col_id+'--'+prod_rel_sz_id+'--'+pid );
  $.ajax({
		type : "POST",
		url  : "<?php echo base_url();?>product/loadAjaximage",
		data : {col_id:col_id,pid:pid},
		success: function(data) {
		    //alert(data);
		    var data_arr =  data.split('*^*');
		    var slider_images = data_arr[0];
		    var zoom_image    = data_arr[1];
		    
		    $(".SliderVertical").html('');
		    $(".SliderVertical").html(slider_images);
		    //var url = <?php echo base_url().'admin/images/uploads/normal/';?>;
		    var htm = '<img id="zoom_03" src="<?php echo base_url();?>admin/images/uploads/long_thumb/'+zoom_image+'" data-zoom-image="<?php echo base_url();?>admin/images/uploads/big_thumb/'+zoom_image+'">';
		    $("#zoom_03").remove();
		   //$("#zoom_03").attr('src', <?php echo '../admin/images/uploads/normal/';?>zoom_image);
		   $(".product-view").html(htm);
		   $(".zoomLens").css({'background-image':'url(<?php echo base_url();?>admin/images/uploads/big_thumb/'+zoom_image+')'});
		    
		    $("#zoom_03").elevateZoom({
			zoomType : "lens",
			containLensZoom : true,
			gallery : 'zoom',
			cursor : 'pointer',
			galleryActiveClass : "active",
			zoomWindowWidth: 552,
			zoomWindowHeight: 362,
		});
		    $(".zoomContainer").each(function(){
		      var att = $(this).css('top');
		      //alert(att)
		      if (att == 0)
		      {
			$(this).remove();
		      }
		      });
		//    $(".SliderVertical").iosSliderVertical({
		//	desktopClickDrag: true
		//    });
		    //$("#zoom_03").html('');
		    //$("#zoom_03").html(slider_images);
		}
      });
}

function choose_diff_size(sid, pid)
{
    var class_detect = $("#li_"+sid).attr("class");
    //alert(class_detect);
    if (class_detect != 'selected' && class_detect != 'disable' )
    {
    //alert('start');
    $("#size_box li").each(function(){
      $(this).removeClass("selected");
    });
    
    $("#size_id").val(sid);
    $("#li_"+sid).addClass("selected");
    //load colors ajax
    $.ajax({
	type : "POST",
	url  : "<?php echo base_url();?>product/loadAjaxcolors",
	data : {sid:sid,pid:pid},
	success: function(data) {
	  //alert(data);
	  var data_arr = data.split( '^*^' );
	  var htm = data_arr[0];
	  var qty = data_arr[1];
	  
	  $("#all_colors").html('');
	  $("#all_colors").html(htm);
	  
	  $("#qty").val(qty);
	  if (qty == 0) /*not available quantitiy*/
	  {
	    $("#add_cart").css({'display':'none'});
	    $("#add_cart_not").css({'display':'block'});	
	  }
	  else
	  {
	    $("#add_cart").css({'display':'block'});
	    $("#add_cart_not").css({'display':'none'});	
	  }
	  
	  $("#all_colors li").first().trigger("click");
	  //alert(qty);
	  //alert( $("#qty").val());
	  $("#all_colors").delegate("li", 'click', function(){
	      $("#all_colors li a").each(function(){
		//alert('coun');
		$(this).removeClass("col_select"); /*removing the class*/
		});
	      $(this).children("a").addClass("col_select"); /*adding the class*/
	  });
	}
    });	
    }
}
$("#all_colors li").on('click',function(){

  $("#all_colors li a").each(function(){
	      $("#all_colors li a").each(function(){
		//alert('coun');
		$(this).removeClass("col_select"); /*removing the class*/
		});
	      
	      //alert('set');
    });
  $(this).children("a").addClass("col_select"); /*adding the class*/
});

function open_rating()
{
  $("#comment_pop").slideDown('slow');
  $("#comment").css({'display':'none'});
  
}

//------------------############### Add to Cart functionality #####################--------------------
function add_cart()
{
  var available_quantity = $("#qty").val();
  if (available_quantity > 0 )
  {
    
    var unit_price = $("#unit_price").val();
    var prodict_id = $("#prodict_id").val();
    var size_id    = $("#size_id").val();
    var color_id   = $("#color_id").val();
    
    var available_quantity = $("#qty").val();
    
    //alert(unit_price);
    var string = '';
    if (available_quantity > 0)
    {
      //code
      for (i=1;i<=available_quantity;i++)
      {
	string = string+'<option value="'+i+'">'+i+'</option>';
      }		
    }
    else
    {
      string = '<option value="0">--Not Available--</option>';
    }

    //alert(string);
    $("#choosen_quantity").html('');
    $("#choosen_quantity").html(string);
    $( "#dialog" ).dialog( "open" );
  }
  else
  {
    alert('Product not available.');
  }
}
//------------------############### Add to Cart functionality end #####################--------------------
</script>
<!--rate it scripts-->
<script>
       //build toc
       var toc = [];
       $('#examples > li').each(function (i, e) {

	   toc.push('<li><a href="#')
	   toc.push(e.id)
	   toc.push('">')
	   toc.push($(e).find('h3:first').text());
	   toc.push('</a></li>');

       });

       $('#toc').html(toc.join(''));

       $('.rateit').bind('rated', function() {
	//alert($(this).rateit('value'));
	  $("#rate_it_val").val($(this).rateit('value'));
	});
       $('.rateit').bind('reset', function () {
	//alert('reset');
	$("#rate_it_val").val(0);
	} );
       
function submit_comment ()
{
  var rate_it = $("#rate_it_val").val();
  var comment = $("#comment_post").val();
  var pid     = <?php echo $this->uri->segment(5);?>;
  var uid     = <?php echo $this->session->userdata('id');?>;
  
  if (rate_it == 0 || rate_it == '' )
  {
      $("#rate_it_err").css({'display':'block'});
      return false;
  }
  else
  {
     $("#rate_it_err").css({'display':'none'});
  }
  if (comment == '')
  {
      $("#comment_post_err").css({'display':'block'});
      return false;
  }
  else
  {
    $("#comment_post_err").css({'display':'none'});
    $("#hide_submit").css({'display':'none'});
    $("#loader").css({'display':'block'});
  }
  
  //alert(uid+'--'+pid);
    $.ajax({
		type : "POST",
		url  : "<?php echo base_url();?>product/insertComment",
		data : {comment:comment,rate_it:rate_it,pid:pid,uid:uid},
		success: function(data) {
		 // alert(data);
		 var arr= data.split('****');
		  $("#comment_pop").slideUp('slow');
		  $("#review_sec").html('');
		   $("#review_sec").html(arr[0]);
		   $("#success_rev").css({'display':'block'});
		   $("#show_review_div").html(arr[1]);
		   setTimeout(function(){ $("#success_rev").fadeOut(); },5000);
		}
      });
    
}

function expand_all(num, pid)
{
  $.ajax({
	      type : "POST",
	      url  : "<?php echo base_url();?>product/show_all_reviews",
	      data : {num:num,pid:pid},
	      success: function(data) {
	       // alert(data);
	       $("#show_review_div").html('');
	       $("#show_review_div").html(data);
	      }
      });
}
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<!--<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>-->
<script>
  $(function() {
    $( "#dialog" ).dialog({
      draggable:false,
      resizable:false,
      autoOpen: false,
      modal: true,
      show: {
        effect: "",
        duration: 500
      },
       buttons: {
        Ok: function() {
	  //function on ok button click
	      //Add to cart using ajax
	      <?php
	      if( $chk_edit == 'edit' )
	      {
		?>
		var stat = "update";
		<?php
	      }
	      else
	      {
		?>
		var stat = "order";
		<?php
	      }
	      ?>
	      var available_quantity = $("#qty").val();
	      var qn = $("#choosen_quantity").val();
	      
	      var unit_price = $("#unit_price").val();
	      var prodict_id = $("#prodict_id").val();
	      var size_id    = $("#size_id").val();
	      var color_id   = $("#color_id").val();		
    
    //alert(stat);
		//alert(qn);
		$.ajax({
			    type : "POST",
			    url  : "<?php echo base_url();?>product/placeOrder",
			    data : {unit_price:unit_price,prodict_id:prodict_id,size_id:size_id,color_id:color_id,qn:qn,available_quantity:available_quantity,stat:stat},
			    success: function(data) {
			      //alert(data);
			      var chk_arr = data.split('^*^');
			      var chk = chk_arr[0].replace(/^\s+|\s+$/g, '');
			      //alert(chk);
			      $("#success_order").css({'display':'block'});
			      $("#qty").val(parseInt(available_quantity-1));
			      
			      $("#all_colors li a").each(function(){
				var classs = $(this).attr('class');
				  if (classs == 'col_select')
				  {
				    var new_qty = parseInt( available_quantity -1 );
				    
				    $(this).attr({'data-original-title':'Available :'+new_qty});
				  }	
			      });
			      if (chk == 'success')
			      {
				//alert('asd');
				 //$( this ).dialog( "close" );
				 
				setTimeout(function(){
				  window.location.href = "<?php echo base_url();?>index.php/shipping_details/index/";
				  },1000);			  
			      }
	    
			    }
		  });
		 //Add to cart using ajax end
          //$( this ).dialog( "close" );
        }
      },
      hide: {
        effect: "",
        duration: 500
      }
    });
 
    //$( "#opener" ).click(function() {
    //  $( "#dialog" ).dialog( "open" );
    //});
  });
$(document).ready(function(){
  var val = $("#information").html().replace(/\s/g, "");
  //alert(val);
  var temp = val;
  var count = temp.match(/"product-box"/g);
  
  if( val == '' )
  {
    $("#information").css({'display':'none'});
  }
  
  if( count.length == 1 )
  {
    $("#information").removeClass('clearfix');
  }

});
</script>
<!--<button id="opener">Open Dialog</button>-->
<div id="dialog" title="Choose quantity">
  <div>
 <label>Please choose quantity</label>
 <select id="choosen_quantity">
 </select>
 </div>
</div>
 <!--rate it scripts end-->
<input type="hidden" id="qty" value="<?php echo $qty;?>">
<input type="hidden" id="unit_price" value="<?php echo $full_details_products[0]['price'];?>">
<input type="hidden" id="prodict_id" value="<?php echo $this->uri->segment(5);?>">
<input type="hidden" id="size_id" value="<?php echo $sel;?>">
<input type="hidden" id="color_id" value="<?php echo $color;?>">