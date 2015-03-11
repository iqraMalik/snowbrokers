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
				<li><a href="javascript:void(0)" onclick="loadajax('walkin')" class="walkin" id="walkin">Walkin</a></li>
				<li><a href="javascript:void(0)" onclick="loadajax('waitinglist')" class="waiting" id="waitinglist">Waiting List</a></li>
				<li><a href="javascript:void(0)" onclick="loadajax('reservation')" class="reservation" id="reservation">Reservation</a></li>
				<li><a href="javascript:void(0)" onclick="loadajax('contactlist')" class="contact" id="contactlist">Contact</a></li>
				<li><a href="javascript:void(0)" onclick="loadajax('coupons')" class="coupons" id="coupons">Coupons</a></li>
				<li><a href="javascript:void(0)" class="notification" id="notification">Notification</a></li>
				<li><a href="<?php echo site_url('logout');?>" class="logout" id="logout">Logout</a></li>
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
<div id="containerdiv">