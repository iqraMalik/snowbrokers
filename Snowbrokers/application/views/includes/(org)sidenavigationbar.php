<?php
$DATAURL = explode(base_url().'index.php/', current_url());
$NEWSECTION = explode('/', $DATAURL[1]);
?>
<section class="leftpart">
	<input type="hidden" name="left_m_type" id="left_m_type" value="0" />
	<div onclick="click_div()" class="menubtn"> </div>
	<div class="leftpart_inner">
		<nav class="menu">
			<ul>
				<li><a href="<?php echo site_url('walkin/index'); ?>" class="walkin" id="walkin">Walkin</a></li>
				<li><a href="<?php echo site_url('waitinglist/index'); ?>" class="waiting" id="waitinglist">Waiting List</a></li>
				<li><a href="<?php echo site_url('reservation/index'); ?>" class="reservation" id="reservation">Reservation</a></li>
				<li><a href="<?php echo site_url('contactlist/index'); ?>" class="contact" id="contactlist">Contact</a></li>
				<li><a href="<?php echo site_url('coupons/index'); ?>" class="coupons" id="coupons">Coupons</a></li>
				<li><a href="<?php echo site_url('notification/index'); ?>" class="notification active" id="notification">Notification</a></li>
				<li><a href="<?php echo site_url('logout');?>" class="notification" id="notification">Logout</a></li>
			</ul>
		</nav>
	</div>
</section>
<input type="text" id="nowopeneddiv" value="<?php echo $NEWSECTION[0]; ?>" />
<script type="text/javascript">
	$(function() {
		$('.active').removeClass('active');
		$('#'+$.trim($('#nowopeneddiv').val())).addClass('active');
	});
</script>