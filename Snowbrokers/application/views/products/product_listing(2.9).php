<!-- content -->
<section class="content-area">
	<!--   This is for after login header menu bar start -->
    
	<?php echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
	<section class="container browse-tag">
		<div class="men-jacket-content pull-left">
			<h1>Men Jackets</h1>
		</div>
		<div class="men-jacket pull-right">
			<span>Browse by tag</span>
			<form class="men-jacket">
				<input type="search" />
				<button type="submit"></button>
			</form>
		</div>
	</section>
	<div class="product-sec">
		<div class="container">
			<div class="row product-main-content">
			  <div class="col-sm-2 hidden-xs left-add">
			  	<img src="<?php echo base_url();?>/images/news_night.jpg" alt="left-add" />
			  	<img src="<?php echo base_url();?>/images/gatway.jpg" alt="getway" />
			  </div>
			  <div class="col-sm-8">
			  	<div class="row">
					<?php
					//print_r($rows);
					if(count($rows) > 0)
					{
					foreach($rows as $value)
					{
						?>
				  	<div class="col-md-4 col-xs-6">
				  		<div class="product-img-box">
				  			<img src="<?php echo base_url();?>/images/black_jacket.png" alt="black_jacket" />
				  		</div>
				  		<div class="product-details clearfix">
				  			<h2><?php echo stripslashes($value->title);?></h2>
				  			<p><?php echo stripslashes($value->product_tag);?></p>
				  			<div class="clearfix price_row">
					  			<span class="pull-left">$<?php echo $value->price;?></span>
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
					else
					{
						echo "<h1>No product found..</h1>";
					}
					?>
				  	<!--<div class="col-md-4 col-xs-6">
				  		<div class="product-img-box">
				  			<img src="<?php echo base_url();?>/images/black_jacket.png" alt="black_jacket" />
				  		</div>
				  		<div class="product-details clearfix">
				  			<h2>voluptatem</h2>
				  			<p>dummy text of the printing</p>
				  			<div class="clearfix price_row">
					  			<span class="pull-left">$ 56.23</span>
					  			<div class="pull-right cart-search">
					  				<form>
					  					<button type="button" class="cart-product"></button>
					  					<button type="button" class="search"></button>
					  				</form>
					  			</div>
				  			</div>
				  		</div>
				  	</div>-->
				  </div>
				  <div class="pull-right pagination-box">
				  	    <div class="pagination">
						    <!--<ul>
							    <li><a href="#" class="prev">Prev</a></li>
							    <li><a href="#" class="active">1</a></li>
							    <li><a href="#">2</a></li>
							    <li><a href="#">3</a></li>
							    <li><a href="#">4</a></li>
							    <li><a href="#">5</a></li>
							    <li><a href="#" class="next">Next</a></li>
						    </ul>-->
						    
						    <?php echo $pages; ?>
					    </div>
				  </div>
			  </div>
			  <div class="col-sm-2 right-add">
			  	<img src="<?php echo base_url();?>/images/asian_heros.jpg" alt="right-dd" />
			  	<img src="<?php echo base_url();?>/images/apply_now.jpg" alt="applynow" />
			  </div>
			</div>
		</div>
	</div>
</section>
<!-- content End -->