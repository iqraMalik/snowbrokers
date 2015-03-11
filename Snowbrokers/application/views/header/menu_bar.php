<!--<div class="wishlist-nav-area">
    <section class="container">
        <div class="navbar-right wishlist-nav-right-area text-right">
            <button data-target=".wishlist-nav" data-toggle="collapse" class="navbar-toggle inner-page-navber" type="button">
                <span class="glyphicon glyphicon-th-list"></span>
            </button>
            <form class="wishlist">
                <input type="search">
                <button type="submit"></button>
            </form>
            <div class="cart">
                <div class="cart-bg">
                    <img src="<?php echo base_url();?>images/cart_icon.png">
                </div>
            </div>
            <div class="cart-txt">
                <p>Cart:<span>10</span></p>
            </div>
        </div>
        <nav class="navbar-left">
            <ul class="wishlist-nav collapse clearfix">
                <li><a href="javascript:void(0)">About us</a></li>
                <li class="active"><a href="javascript:void(0)">Wish List</a></li>
                <li><a href="javascript:void(0)">Mens</a></li>
                <li><a href="javascript:void(0)">Womens</a></li>
                <li><a href="javascript:void(0)">Kids</a></li>
                <li><a href="javascript:void(0)">Accessories</a></li>
                <li><a href="javascript:void(0)">Hardware</a></li>
            </ul>
        </nav>
            
    </section>
</div>-->
<?php
//echo "<pre>";
//print_r( $categories );
//echo "</pre>";

?>
	<div class="wishlist-nav-area">
		<section class="container tophedrr">
			<div class="navbar-right wishlist-nav-right-area text-right">
				<button data-target=".wishlist-nav" data-toggle="collapse" class="navbar-toggle inner-page-navber" type="button">
					<span class="glyphicon glyphicon-th-list"></span>
				</button>
				<!--<form class="wishlist" name="all_search" id="all_search" method="post" action="<?php echo site_url('product/product_list');?>">
					<input name="all_search" id="all_search" value="<?php echo (isset($allsearch)?$allsearch:''); ?>" type="search">
                                        <input name="search_mode" id="search_mode" value="allsearch" type="hidden" />
					<button type="submit"></button>
				</form>-->
				<div class="cart">
					<div class="cart-bg">
						<a href="<?php echo base_url();?>shipping_details/index/"><img src="<?php echo base_url();?>images/cart_icon.png"></a>
					</div>
				</div>
				<div class="cart-txt">
				<?php
				//print_r($cart_items);
				$qn = 0;
				    $cart_items1 = $this->modelhome->get_myCartDetails();
				    if($cart_items1 != '0')
				    {
					$cart_products = $this->modelhome->get_CartProducts($cart_items1->id);
					if($cart_products!='0')
					{
					$qn = 0;
					    foreach($cart_products as $value)
					    {
						 $qn = $qn+$value->quantity;
					    }
					}
				    }
				    else
				    {
					$qn = 0;
				    }
				?>
					<a href="<?php echo base_url();?>shipping_details/my_cart/">
						<p>Cart: <span id="cart_quantity"><?php echo $qn;?></span></p>
					</a>
				</div>
			</div>
			<nav class="navbar-left">
				<ul class="wishlist-nav collapse clearfix">
					<?php
					$page = $this->uri->segment(1);
					?>
					<li <?php if( $page == 'about' ){ ?> class="active" <?php }?>><a href="<?php echo base_url();?>about">STRATEGY</a></li>
					<li <?php if( $page == 'wishlist' ){ ?> class="active" <?php }?>><a href="<?php echo base_url();?>wishlist">WISH LIST/OEM</a></li>
					<?php
					//echo $this->uri->segment(3);
					$sel = $this->uri->segment(3);
					$sel_sub = $this->uri->segment(4);
					$i=0;
					
					foreach( $categories as $val )
					{
						?>
						<li <?php if( $sel == $val['id'] ){ ?> class="active" <?php }?>>
						<a href="javascript:void(0)"><?php echo stripslashes(strtoupper($val['title']));?></a>
						<?php
						$val['id'];
						$sub_cat = $this->model_products->getSubCategories($val['id']);
						if($sub_cat != 0)
						{
							//sort($sub_cat);
						?>
						<div class="bigdrop-down new_drop">
							<div class="new_drop_inner">
								<div class="container">
								   <div class="sulisting">
									<ul>
									  <?php
									  foreach( $sub_cat as $sub )
									  {
									     ?>
										<li <?php if( $sel_sub == $sub['id'] ){ ?> class="active" <?php }?>>
										     <a href="<?php echo base_url();?>index.php/product/product_list/<?php echo $val['id'].'/'.$sub['id'];?>">
										     <?php
										     echo strtolower($sub['name']);
										     ?>
										    </a>
										</li>
									     <?php
									  }
									  ?>
									</ul>
								   </div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
						</li>
						<?php
						$i++;
					}
					?>
					<!--<li <?php if( $page == 'oem' ){ ?> class="active" <?php }?>><a href="<?php echo base_url();?>oem">OEM</a></li>-->
				</ul>
			</nav>
			
		</section>
	</div>
	<?php
	if($this->session->userdata('success_msg'))
	{
	?>
	<div class="alert alert-success fade in" role="alert" style="text-align: center; font-size: larger;">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
			<strong>Success!</strong> <?php echo $this->session->userdata('success_msg'); ?>
	</div>
	<!--
	<div class="alert alert-success" style="text-align: center; font-size: larger;">
                <i class="icon-ok-sign"><b>X</b></i><strong>Success</strong>&nbsp;!&nbsp;<?php echo $this->session->userdata('success_msg'); ?>
        </div>-->
	<?php
		$this->session->unset_userdata('success_msg');
	}
	if($this->session->userdata('error_msg'))
	{
	?>
	<div class="alert alert-danger fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" style="text-align: center; font-size: larger;"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
			<strong>Error!</strong> <?php echo $this->session->userdata('error_msg'); ?>
	</div>
	<!--<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131); text-align: center; font-size: larger;">
		<i class="icon-remove-sign"><b>X</b></i><strong>Error</strong>&nbsp;!&nbsp;<?php echo $this->session->userdata('error_msg'); ?>
	</div>-->
	<?php
		$this->session->unset_userdata('error_msg');
	}
	?>