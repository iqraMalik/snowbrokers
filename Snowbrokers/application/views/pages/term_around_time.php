
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
      				
      				<!-- title -->      				
      				<div class="clearfix red_title_outer">
	      				<h2 class="red_title"><?php echo $details->page_title; ?></h2>
      				</div>
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
 