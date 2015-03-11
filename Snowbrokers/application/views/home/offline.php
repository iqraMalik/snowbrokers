<?php
$offline_reason = "offline_reason";
$off_reason = $this->modelhome->off_reason($offline_reason);
?>


<section class="content-section">
	<div class="container">
		<div class="content" style="width:100%;padding-top:85px;">
			<div class="content-inner" >
				<?php echo $off_reason; ?>
			</div>
		</div>

	</div>
</section>
