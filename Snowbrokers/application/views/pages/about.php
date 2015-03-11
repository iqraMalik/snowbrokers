
	<!-- header end -->
	
    <!-- Static navbar -->

	<!-- nav end -->
	
	<!-- /content part -->
    <section class="content">
    	<div class="container">
      		<div class="row">
      			<!-- left_panel -->
				<?php
				
				/* loading left panel menu */
				/* Location: ./application/views/left_panel.php */
				 $this->load->view('left_panel');
				 
				  ?>
      			<!-- left_panel -->
      			
      			<!-- right content -->
      			
      			<div class="col-md-9">
      				<?php foreach($row as $details){ ?>
      				<!-- banner image -->
      				<div class="banner">   					
      					<!-- <img src="<?php echo $this->config->base_url(); ?>assets/images/about_img.jpg" alt="" /> -->
      					<img src="<?php echo $this->config->base_url(); ?>images/pages/<?php echo $details->img; ?>" alt="" />
      				</div>
      				<!-- banner end  -->
      				
      				<!-- title -->
      				<h2 class="title"><span><?php echo $details->page_title; ?></span></h2>
      				<!-- title end -->
      				<!-- main content -->
      				<div class="cont_box">
      					<?php echo $details->page_content; ?>
      				</div>
      				<?php } ?>
      				<!-- main content end -->
      				
      			</div>
      		</div>
    	</div>
    </section> <!-- content part end -->
    
    <!-- footer -->
 