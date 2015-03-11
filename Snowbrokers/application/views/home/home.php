
<?php $flash_message=$this->session->flashdata('flash_message'); ?> <!--=====ADDED PRITAM 30/7/14-->
<?php $settings = $this->site_settingsmodel->getsite_settings();?>
<!-- Header Start -->

<!-- Header End -->
<!-- Banner Start -->
<?php
 //offer section dynamick
 $result=$this->model_offer_banner->dynamick_home();
 // banner section dynamick
 $data=$this->model_top_banner->dynamick_banner();
 // middle section dynamick
 $middle=$this->model_middle_banner->dynamick_middle_banner();
 //footer section
 $footer=$this->modelbanner_home_footer->dynamick_footer();
?>

	       <!--=========== ADDED FOR FLASH MESSAGE (PRITAM-- 30/7/14) ====================-->

		<?php
//                     if(isset($flash_message)) {
//			
//			if($flash_message == 'not_activated') {
//                              
//                                  echo '<div class="alert alert-success" style="text-align: center; font-size: larger;">';
//                                  echo '<i class="icon-ok-sign"></i><strong>Success</strong>&nbsp;!&nbsp;You have successfully created an account, Plese check your mail to activate it.';
//                                  echo '</div>';
//                        }
//			
//			if($flash_message == 'activated') {
//                              
//				echo '<div class="alert alert-success" style="text-align: center; font-size: larger;">';
//				echo '<i class="icon-ok-sign"></i><strong>Success</strong>&nbsp;!&nbsp;Your account is now activated.';
//				echo '</div>';
//                        }
//			
//			if($flash_message == 'already_activated') {
//                              
//				echo '<div class="alert alert-success" style="text-align: center; font-size: larger;">';
//				echo '<i class="icon-ok-sign"></i><strong>Hey</strong>&nbsp;!&nbsp;Your account is already activated.';
//				echo '</div>';
//                        }
//			
//			if($flash_message == 'not_registered') {
//                              
//				echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131); text-align: center; font-size: larger;">';
//				echo '<i class="icon-remove-sign"></i><strong>Error</strong>&nbsp;!&nbsp;Invalid email or password. Please register to create your account.';
//				echo '</div>';
//			}
//                                      
//			if($flash_message == 'n_activated') {
//	    
//			    echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131);text-align: center; font-size: larger;">';
//			    echo '<i class="icon-remove-sign"></i>&nbsp<strong>Error</strong>&nbsp;!&nbsp;Your account is not activated now. Please check your mail to activate your account.';
//			    echo '</div>';
//			}
//			  if($flash_message == 'emailidexists') {
//                              
//                     echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131);">';
//                     echo '<i class="icon-remove-sign"></i>&nbsp<center><strong>Error.! &nbsp</strong> Given mail id already exists</center>';
//                     echo '</div>';
//					  }
//		     }
		?>
	  <!--============================END=============================================-->
 <section class="banner" data-stellar-background-ratio="0.3"> 	
	<div class="container">
		  <div class="banner-text">
			  <div class="border-head">
				  <h2><?php echo $data[0]->top; ?></h2>
			  </div>
			  <div class="big-text">
				  <h1><?php echo $data[0]->middle; ?></h1>
			  </div>
			  <p>
				<?php echo $data[0]->bottom;?> 
			  </p>
			  <a href="javascript:void(0)" class="bounce" id="bounce"><img src="<?php echo $this->config->base_url(); ?>assets/images/scroll-arrow.png" alt="scroll-arrow"></a>
		  </div>
	  </div>
</section>
<!-- Banner End -->
<!-- yellow-bg section Start -->

<section id="yellow-bg" style="background: <?php echo '#'.$result[0]->bg_color;?>" class="">
	<div class="container">
		<div class="row yellow-box-row">
			<div class="col-sm-6 text-center">
				<img src="<?php echo $result[0]->image_big;?>" alt="circle-shoe">
			</div>
			<div class="col-sm-6">
				<div class="perspi-box"><img src="<?php echo $result[0]->image_small; ?>" alt="perspi">
				</div>
				<div class="price-box">
				   <?php
				   $tag_b_s="";
				   $tag_b_e="";
				   $tag_i_s="";
				   $tag_i_e="";
				   if($result[0]->percentage!=0)
				   {
					  ?>
					<h2><?php echo $result[0]->percentage;?><span class="persentage">%</span><span class="off">off</span><span class="off">*</span></h2>
					<?php
					}?>
					<?php
					if($result[0]->bold==1)
					{
				    $tag_b_s="<b>";
				   $tag_b_e="</b>";
					}?>
					
					<?php
					
					if($result[0]->italick==1)
					{
				    $tag_i_s="<i>";
				    $tag_i_e="</i>";
					
					}
					
					?>
				
					
					<p>
					  <?php
				   if($result[0]->underline==1)
					{
					  echo $tag_b_s;
					  echo $tag_i_s; ?>
					<u>
				   <h3><?php echo $result[0]->offer_title;?></h3>  
				        </u>
					<?php
					echo $tag_b_e;
				        echo $tag_i_e;
					  }
					else
					{
					  echo $tag_b_s;
					  echo $tag_i_s;
					  ?>
				   <h3><?php echo $result[0]->offer_title;?></h3>  
				   <?php
					echo $tag_b_e;
				        echo $tag_i_e;
					}
					?>
					
					<?php echo $result[0]->offer_details;?>
					</p>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- yellow-bg section End -->

<section class="bi-color-section">
	<div class="container">
		<div class="row bi-color-row">
			<div class="col-sm-6 bi-color-left">
			   
				<!--<img src="<?php echo $this->config->base_url(); ?>assets/images/persent-border.png" alt="persent-border">-->
				<img src="<?php echo $middle[0]->icon;?>" alt="persent-border">
			    
				<?php echo $middle[0]->details;?>
				<div class="border-snowbrokers">
					<h4>snowbrokers</h4>
				</div>
			</div>
			<div class="col-sm-6 bi-color-right">
				<img src="<?php echo $middle[0]->image; ?>" alt="device-img">
			</div>
		</div>
	</div>
</section>



<section class="product-section" style="background: #<?php echo $settings['bg_color'];?>;">
	<div class="container">
		<div id="tiled_demo" class="product-item">
			<div class="magnet">
				<figure class="magnet-item item-lg-width">
					<div class="product-img">
						<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[0]->image; ?>" alt="Product" />
					</div>
					
					<div class="product-hover">
		                    <?php echo $footer[0]->details;?>				
					</div>
				</figure>
				<figure class="magnet-item">
					<div class="product-img">
						<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[1]->image; ?>" alt="Product" />
					</div>
					<div class="product-hover">
					<?php echo $footer[1]->details;?>	
					</div>
				</figure>
				<figure class="magnet-item">
					<div class="product-img">
						<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[2]->image; ?>" alt="Product" />
					</div>
					<div class="product-hover">
					<?php echo $footer[2]->details;?>	
					</div>
				</figure>
				<figure class="magnet-item">
					<div class="product-img">
						<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[3]->image; ?>" alt="Product" />
					</div>
					<div class="product-hover">
					<?php echo $footer[3]->details;?>	
					</div>
				</figure>
				<figure class="magnet-item">
					<div class="product-img">
						<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[4]->image; ?>" alt="Product" />
					</div>
					<div class="product-hover">
					<?php echo $footer[4]->details;?>		
					</div>
				</figure>
				<figure class="magnet-item">
					<div class="product-img">
						<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[5]->image; ?>" alt="Product" />
					</div>
					<div class="product-hover">
					<?php echo $footer[5]->details;?>	  
					</div>
				</figure>
				<figure class="magnet-item ">
					<div class="product-img">
					<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[6]->image; ?>"alt="Product" />
					</div>
					<div class="product-hover">
					<?php echo $footer[6]->details;?>	
					</div>
				</figure>
				<figure class="magnet-item item-sm-height">
					<div class="product-img">
					<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[7]->image; ?>"alt="Product"/>
					</div>
					<div class="product-hover">
						<?php echo $footer[7]->details;?>
						<!-- <p>ccusantium doloremque laudantium, totam rem aperiam, eaque ip doloremque laudantium, </p> -->
					</div>
				</figure>
				<figure class="magnet-item item-lg-width">
					<div class="product-img">
						<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[8]->image; ?>" alt="Product" />
					</div>
					<div class="product-hover">
					<?php echo $footer[8]->details;?>	
					</div>
				</figure>
				<figure class="magnet-item">
					<div class="product-img">
						<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[9]->image; ?>" alt="Product" />
					</div>
					<div class="product-hover">
					<?php echo $footer[9]->details;?>	
					</div>
				</figure>
				<figure class="magnet-item item-sm-height">
					<div class="product-img">
						<img src="<?php echo $this->config->base_url(); ?>admin/banner_home/thumb/<?php echo $footer[10]->image; ?>" alt="Product" />
					</div>
					<div class="product-hover">
						<?php echo $footer[10]->details;?>
						<!-- <p>ccusantium doloremque laudantium, totam rem aperiam, eaque ip doloremque laudantium, </p> -->
					</div>
				</figure>
			</div>
		</div>
	</div>
</section>

<!--Register Modal Start-->

<!--Register Modal End-->

