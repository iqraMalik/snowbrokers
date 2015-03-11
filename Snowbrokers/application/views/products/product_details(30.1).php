<!-- content -->
<section class="content-area">
        <!--   This is for after login header menu bar start -->
    
	<?php echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
            <div class="container">
		<!-- breadcrumb	 -->
		<ol class="breadcrumb">
		  <li><a href="javascript:void(0)">HOME</a></li>
		  <li><a href="javascript:void(0)">MENS</a></li>
		  <li class="active">JACKETS</li>
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
							
								<a href="javascript:void(0)" data-image="images/small/product-right-img.jpg" data-zoom-image="images/large/product-right-img.jpg"> 
									<img src="<?php echo base_url();?>images/thumb/product-right-img.jpg" /> 
								</a>
						
								
								<a href="javascript:void(0)" data-image="images/small/product-right-img2.jpg" data-zoom-image="images/large/product-right-img2.jpg"> 
									<img src="<?php echo base_url();?>images/thumb/product-right-img2.jpg" /> 
								</a>
								<a href="javascript:void(0)" data-image="images/small/product-right-img3.jpg" data-zoom-image="images/large/product-right-img3.jpg"> 
									<img src="<?php echo base_url();?>images/thumb/product-right-img3.jpg" /> 
								</a>
								<a href="javascript:void(0)" data-image="images/small/product-right-img4.jpg" data-zoom-image="images/large/product-right-img4.jpg"> 
									<img src="<?php echo base_url();?>images/thumb/product-right-img4.jpg" /> 
								</a>
								<a href="javascript:void(0)" data-image="images/small/product-right-img.jpg" data-zoom-image="images/large/product-right-img.jpg"> 
									<img src="<?php echo base_url();?>images/thumb/product-right-img.jpg" /> 
								</a>
								<a href="javascript:void(0)" data-image="images/small/product-right-img2.jpg" data-zoom-image="images/large/product-right-img2.jpg"> 
									<img src="<?php echo base_url();?>images/thumb/product-right-img2.jpg" /> 
								</a>
								<a href="javascript:void(0)" data-image="images/small/product-right-img3.jpg" data-zoom-image="images/large/product-right-img3.jpg"> 
									<img src="<?php echo base_url();?>images/thumb/product-right-img3.jpg" /> 
								</a>
								<a href="javascript:void(0)" data-image="images/small/product-right-img4.jpg" data-zoom-image="images/large/product-right-img4.jpg"> 
									<img src="<?php echo base_url();?>images/thumb/product-right-img4.jpg" /> 
								</a>
						</div>
						
						<div class = 'scrollbar'></div>
						
						
						
						
					</div>
					<div class="vertical-prev" onclick = "$('.SliderVertical').iosSliderVertical('prevPage');"><img src="<?php echo base_url();?>images/up-arrow.png" alt="down-arrow" /></div>
					<div class="vertical-next" onclick = "$('.SliderVertical').iosSliderVertical('nextPage');"><img src="<?php echo base_url();?>images/down-arrow.png" alt="up-arrow" /></div>
				</div>
				<div class="product-view">
					<img id="zoom_03" src="<?php echo base_url();?>images/small/product-right-img.jpg" data-zoom-image="<?php echo base_url();?>images/large/product-right-img.jpg"/>
					<!-- <img id="bannerImage" src="images/product-right-img.jpg" alt="product" data-zoom-image="images/product-right-img.jpg" />	 -->
				</div>	
				
				<!-- <div class="">
					<img id="zoom_03" src="small/image1.png" data-zoom-image="large/image1.jpg"/>
					<div id="gal1">
						<a href="javascript:void(0)" data-image="small/image1.png" data-zoom-image="large/image1.jpg"> 
							<img id="img_01" src="thumb/image1.jpg" /> 
						</a>
						<a href="javascript:void(0)" data-image="small/image2.png" data-zoom-image="large/image2.jpg"> 
							<img id="img_01" src="thumb/image2.jpg" />
						</a>
						<a href="javascript:void(0)" data-image="small/image3.png" data-zoom-image="large/image3.jpg"> 
							<img id="img_01" src="thumb/image3.jpg" /> 
						</a>
						<a href="javascript:void(0)" data-image="small/image4.png" data-zoom-image="large/image4.jpg"> 
							<img id="img_01" src="thumb/image4.jpg" /> 
						</a>
					</div>
				</div> -->
				
				
				
			</div>	
			<div class="col-md-5 xtra-marg">
				<div class="product-name clearfix">
					<h1>jacket</h1>
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
					<li><a href="javascript:void(0)"><span class="my-wishlist">&nbsp;</span> My Wishlist</a></li>
					<li><a href="javascript:void(0)"><span class="compare">&nbsp;</span> to compare</a></li>
				</ul>	
				<div class="product-size clearfix">
					<div class="product-box">
						<h3>SELECT COLOR : </h3>
						<div class="select-color">
							<a href="javascript:void(0)"><img src="<?php echo base_url();?>images/color.png" alt="color"></a>
						</div>	
					</div>	
					<div class="product-box">
						<div class="clearfix">
							<h3 class="pull-left">SELECT SIZE : </h3>
							<a href="javbascript:void(0)" class="pull-right select-size">SIZE CHART</a>
						</div>
						<ul class="size-box clearfix">
							<li>XS</li>
							<li>S</li>
							<li>M</li>
							<li>L</li>
							<li>XL</li>
						</ul>	
					</div>	
				</div>	
				<div class="price clearfix">
					<div class="price-size pull-left">
						<h2>Price $80</h2>
						<button class="btn btn-default">ADD TO ORDER</button>
					</div>	
					<div class="price-size pull-right">
						<ul>
							<li>Call 1800 208 9898 (toll free)<br/> for from our product expert.</li>
							<li>EMI Option</li>
							<li>Product Enquiry</li>
							<li>30 Day Replacement Guarantee</li>
						</ul>	
					</div>	
				</div>	
			</div>	
		</div>	
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="info">
					<h3>Product Info & Care</h3>
				</div>	
				<p class="product-info">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque 
ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
				<div class="care">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<p>Fabric</p>
						</div>	
						<div class="col-md-6 col-sm-8 col-xs-5">
							<p>Cotton</p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<p>Sleeves</p>
						</div>	
						<div class="col-md-6 col-sm-8 col-xs-5">
							<p>3/4th Sleeve</p>
						</div>	
					</div>	
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<p>Neck</p>
						</div>	
						<div class="col-md-6 col-sm-8 col-xs-5">
							<p>Round Neck</p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<p>Fit</p>
						</div>	
						<div class="col-md-6 col-sm-8 col-xs-5">
							<p>Regular</p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<p>Length</p>
						</div>	
						<div class="col-md-6 col-sm-8 col-xs-5">
							<p>Thigh Length</p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<p>Color</p>
						</div>	
						<div class="col-md-6 col-sm-8 col-xs-5">
							<p>Off White</p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<p>SKU</p>
						</div>	
						<div class="col-md-6 col-sm-8 col-xs-5">
							<p>SA038WA36SBNINDFAS</p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
						</div>	
						<div class="col-md-6 col-sm-8 col-xs-5">
							<a href="javascript:void(0)">Report inaccurate/incomplete information here</a>
						</div>	
					</div>	
				</div>	
			</div>
			<div class="col-md-4" style="overflow: hidden;">
				<div class="info">
					<h3>you may also like</h3>
				</div>
				<div class="other-product" id="owl-demo">
					<div class="item">
						<div class="row">
							<div class="col-md-12">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-1.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>	
							<div class="col-md-12 other-marg">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-2.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-12">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-3.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>	
							<div class="col-md-12 other-marg">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-4.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-12">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-1.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>	
							<div class="col-md-12 other-marg">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-2.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-12">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-3.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>	
							<div class="col-md-12 other-marg">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-4.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-12">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-1.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>	
							<div class="col-md-12 other-marg">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-2.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-12">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-3.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>	
							<div class="col-md-12 other-marg">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-4.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-12">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-1.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>	
							<div class="col-md-12 other-marg">
								<div class="other-img">
									<img src="<?php echo base_url();?>images/other-2.jpg" alt="like">
								</div>	
								<div class="other-detail">
									<a href="javascript:void(0)">Sangria</a>
									<p>Veniam  quinostru</p>
									<span>£399</span>
								</div>	
							</div>
						</div>
					</div>
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
</script>