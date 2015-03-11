<section class="content">
    	<div class="container">
      		<div class="ful_inner_page">
      			<?php foreach($row as $details){ ?>
      			<div class="f_inner_title">
      				<h3><?php echo $details->page_title; ?></h3>
      			</div>
      			<!-- <div class="revised"><span>Last revised:</span> January 2010</div> -->
      				<?php echo $details->page_content; ?>
      			</div>
      			<?php } ?>
      		</div>
    	</div>
    </section>