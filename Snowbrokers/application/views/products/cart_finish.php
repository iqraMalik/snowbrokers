<section class="content-area">
    <!--   This is for after login header menu bar start -->

    <?php echo $this->load->view('header/menu_bar'); ?>

    <!--   This is for after login header menu bar end -->
    <div class="container">
        <div class="shipping-content clearfix">
            <div class="col-md-12 side-r">
                    <h1>Thank you</h1>
            </div>
            <div class="advance-feture">
		<h3 style="color:black; text-align:center;">Thank you for your order - A Snowbrokers representative will contact you within the next 24 hours to finalise payment.</h3>
		 <div class="side-r">
		    <div class="">
			<div class="post-address-cell pull-right" style="margin-bottom: 15px;">
			    <button class="btn btn-default" id="order_confirm">
				<span>Continue Shopping</span>
			    </button>
			</div>
		    </div>
		</div>
	    </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $( document ).ready(function() {
	$("#order_confirm").click(function(){
	    window.location.href = '<?php echo base_url();?>myaccount/';
	    });
	
	setTimeout(function(){
	    $(".alert-success").fadeOut();
	    },3000);
    });
</script>