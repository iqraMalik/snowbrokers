<!-- content -->
<section class="content-area">
<?php
$i=0;
  foreach( $all_sizes as $sz1 )
  {
    if( in_array( $sz1['id'], $get_active_sizes ) )
    {
      if( $i == 0 )
      {
	//echo $sz1['id'];
	$sel = $sz1['id'];
	$get_first_colors = $this->model_products->getTheseColors($sz1['id'], $this->uri->segment(5));
	//echo "<pre>";
	//print_r( $get_first_colors );
	//echo "<pre>";
	$id = $get_first_colors[0]['id'];
	
      }
    $i++;
    }
  }
$get_allfirst_colors = $this->model_products->getColors($id);
?>
<?php
$j=0;
foreach( $get_allfirst_colors as $colo1 )
{
  if( $j == 0 )
  {
    $related_image = $colo1['color_id'];
    //echo $related_image;
  }
  $j++;
}

$get_all_images = $this->model_products->getImages($related_image, $this->uri->segment(5));

//echo "<pre>";
//print_r( $get_all_images );
//echo "</pre>";
?>
        <!--   This is for after login header menu bar start -->
    
	<?php echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
            <div class="container">
		<!-- breadcrumb	 -->
		<?php
		$get_cat = $this->model_products->getTypes_specific($this->uri->segment(3));
		//echo "<pre>";
		//print_r( $get_cat );
		//echo "</pre>";
		$get_type = $this->model_products->getSubCategories_specific($this->uri->segment(4));
		//echo "<pre>";
		//print_r( $get_type );
		//echo "</pre>";
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
						    foreach( $get_all_images as $image )
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
				<div class="review-section">
					<div class="product-star">
						<span><img src="<?php echo base_url();?>images/rating-star.png" alt="star"></span>
						<span><img src="<?php echo base_url();?>images/rating-star.png" alt="star"></span>
						<span><img src="<?php echo base_url();?>images/rating-star.png" alt="star"></span>
						<span><img src="<?php echo base_url();?>images/rating-star.png" alt="star"></span>
					</div>
					<div class="rating">
						<span> 94 Ratings</span>
						<span>|</span>
						<span>47 Reviews</span>
					</div>	
				</div>
				<ul class="add-area">
					<li><a href="javascript:void(0)"><span class="review">&nbsp;</span>Write a Review</a></li>
					<!--<li><a href="javascript:void(0)"><span class="my-wishlist">&nbsp;</span> My Wishlist</a></li>
					<li><a href="javascript:void(0)"><span class="compare">&nbsp;</span> to compare</a></li>-->
				</ul>	
				<div class="product-size clearfix">
					<div class="product-box">
						<h3>SELECT COLOR : </h3>
						<!--<div class="select-color">
							<a href="javascript:void(0)"><img src="<?php echo base_url();?>images/color.png" alt="color"></a>
						</div>-->
						
						<div class="select-color">
						      <ul id="all_colors" class="select--product-color">
							<?php
							//echo "<pre>";
							//print_r( $get_allfirst_colors );
							//echo "</pre>";
							$s = 1;
							foreach( $get_allfirst_colors as $colo )
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
							?>
							     
						      </ul>
					      </div>
					</div>	
					<div class="product-box">
					  <?php
					  //echo "<pre>";
					  //print_r( $all_sizes );
					  //echo "</pre>";
					  //
					  //echo "<pre>";
					  //print_r( $get_active_sizes );
					  //echo "</pre>";
					  ?>
						<div class="clearfix">
							<h3 class="pull-left">SELECT SIZE : </h3>
							<!--<a href="javascript:void(0)" class="pull-right select-size">SIZE CHART</a>-->
						</div>
						<ul id="size_box" class="size-box clearfix">
						  <?php
						  //echo "<pre>";
						  //print_r($all_sizes);
						  //echo "</pre>";
						  foreach( $all_sizes as $sz )
						  {
						    if( in_array( $sz['id'], $get_active_sizes ) )
						    {
						    $class = '';  
						    }
						    else
						    {
						      $class = 'disable';  
						    }
						    ?>
						    <li id="li_<?php echo $sz['id'];?>" class="<?php if( $sel == $sz['id'] ){  echo $class.'selected'; }else{ if( $class == '' ){ ?> <?php } echo $class;}?>" onclick="choose_diff_size(<?php echo $sz['id'];?>, <?php echo $this->uri->segment(5);?>);"><?php echo ucwords(stripslashes($sz['size_type']));?></li>
						    <?php
						  }
						  //echo "<pre>";
						  //print_r($full_details_products);
						  //echo "</pre>";
						  ?>
							<!--<li>XS</li>
							<li>S</li>
							<li>M</li>
							<li>L</li>
							<li>XL</li>-->
						</ul>	
					</div>	
				</div>	
				<div class="price clearfix">
					<div class="price-size pull-left">
						<h2>Price <?php echo $full_details_products[0]['currrency_symbol'].' '.$full_details_products[0]['price']?></h2>
						<?php
						//echo $qty;
						?>
						  <button id="add_cart" onclick="add_cart();" <?php if( $qty == 0 ) { ?> style="display: none;"  <?php  }?>class="btn btn-default">ADD TO ORDER</button>
						 <button id="add_cart_not" <?php if( $qty > 0 ) { ?> style="display: none;"  <?php  }else{ ?> style="display: block;" <?php }?>class="btn btn-default">NOT AVAILABLE</button>
						
					</div>	
					<div class="price-size pull-right">
						<?php
						//echo "<pre>";
						//print_r( $full_details_products );
						//echo "</pre>";
						echo $full_details_products[0]['shipping_terms'];
						?>
						<!--<ul>-->
						<!--	<li>Call 1800 208 9898 (toll free)<br/> for from our product expert.</li>-->
						<!--	<li>EMI Option</li>-->
						<!--	<li>Product Enquiry</li>-->
						<!--	<li>30 Day Replacement Guarantee</li>-->
						<!--</ul>	-->
					</div>	
				</div>	
			</div>	
		</div>	
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="info">
					<h3>Product Info & Care</h3>
				</div>	
				<?php
				//echo "<pre>";
				//print_r( $full_details_products );
				//echo "</pre>";
				echo $full_details_products[0]['product_details'];
				?>
			</div>
			<div class="col-md-4" style="overflow: hidden;">
				<div class="info">
					<h3>you may also like</h3>
				</div>
				<div class="other-product" id="owl-demo">
				
				<?php
				//echo "<pre>";
				//print_r( $matching_products );
				//echo "</pre>";
				$u = 0;
				$i=1;
				$j=1;
				//echo count($matching_products);
				foreach( $matching_products as $match )
				{

				   if( !empty($match[0]) )
				   {
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
				      <img src="<?php echo base_url();?>admin/images/uploads/short_thumb/<?php echo $match[0]['image'];?>" alt="like">
					    </div>	
					    <div class="other-detail">
						    <a href="<?php echo base_url().'/index.php/product/details/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$match[0]['product_id'];?>">Sangria</a>
						    <p>Veniam  quinostru</p>
						    <span>&euro;399</span>
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
				?>
				</div>
			</div>		
		</div>	
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
	      $(this).children("a").addClass("col_select"); /*adding the class*/
    });
  
});
</script>
<input type="text" id="qty" value="<?php echo $qty;?>">
<input type="text" id="unit_price" value="<?php echo $full_details_products[0]['price'];?>">
<input type="text" id="prodict_id" value="<?php echo $full_details_products[0]['id'];?>">
<input type="text" id="size_id" value="<?php echo $this->uri->segment(3);?>">
<input type="text" id="color_id" value="<?php echo $color;?>">