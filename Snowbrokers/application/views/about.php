<html>
<body>
<!-- content -->
<section class="content-area">
<!--   This is for after login header menu bar start -->
   
       <?php
       $var = $this->session->userdata;
       if(isset($var['email']) && $var['email']!="")
	{
       echo $this->load->view('header/menu_bar');
	}
       ?>
   
   <!--   This is for after login header menu bar end -->
<div class="container about-content">
	<h1>about us</h1>
	<?php
	
	echo $aboutus_content->a_desc;
		?>
	<!--<h3>Welcome to snowbrokers!</h3>
<p>Snowbrokers.asia is a Global wholesale buying and selling platform designed specifically for the snow industry. We work closely with both the Northern and Southern hemisphere . 
Our main Office is centrally located in the garment hub of Asia with team members constantly on the move. Working with all aspects of the clothing industry from manufacturers 
to distributors, factories and retailers  to find and put on offer the best deals year round no matter what the season. With a large member base of both "buyers" from stores in all the
Major winter destinations and "sellers" from some of your favourite brands our offers are forever changing as offers roll through daily, this makes for a very dynamic and exciting 
marketplace.</p>
			<p>Let me give you some background on Snowbrokers. Our Team has over 40 years experience in the ski and outdoor industries. Between us we have been involved in all elements 
of the industry from sourcing, manufacturing, distributing, retailing etc. We have dealt with nearly all the Major countries from Australia to USA, Japan to China the list goes on. 
The teams experience allows us to have our finger on the pulse, knowing exactly what our clients are looking for and the Service they expect wether that be from a buying or 
selling perspective. We strive to provide the best Service in the industry. Wether you have a warehouse full of stock that needs to be cleared or an empty shop with customers 
queing out the door. We will do our utmost to cater for your needs providing a professional and swift service. We understand Business never sleeps, snow melts, time is of the 
essence and we all want to make some money while we can. Whatever your buying, selling or manufacturing needs put us to the test, with dedicated sourcing and equipment 
officers always available.</p>
			<p>We understand todays climates both weather and economically speaking its crazily unpredictable, this makes pre season stock ordering, and quantity forecasting somewhat difficult and daunting. Alot of companies cant afford to over order and to sit on large amounts of stock in the off season. Two great reasons why Snowbrokers.asia can be beneficial for you is. </p>
		<ul class="about-us-ul">
			<li>If you over order and are left with a large amount of inventory at the end of the season we can help move your leftovers to the opposite hemisphere. This makes room for new stock and boosts cash flow for future orders allowing you to maintain a fresh image.</li>
			<li>If you are experiencing high sales and  shortage of stock (which is awesome) you can order straight off our site 24 hours a day and we can organise express shipping to have the stock on your shelves ASAP! All goods on snowbroker.asia are already manufactured and ready for immediate delivery. This helps take the pressure off the buyer to place large orders pre season. Remember Its always better to have the right stock right on time!</li>
		</ul>
		<p>If you want to know more or have any further questions feel free to contact us <a href="mailto:admin@snowbrokers.asia">admin@snowbrokers.asia</a> or you can speak directly to our sales Manager Joshua Tarte: <a href="mailto:joshsnowbrokers.asia@gmail.com">joshsnowbrokers.asia@gmail.com</a></p>-->
	</div>
</section>
<!-- content End -->

<!-- footer -->
<!--Register Modal Start-->
<div class="modal fade registerModal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Registration <span>for sellers/ buyers</span></h4>
      </div>
      <div class="modal-body clearfix">
      	      	<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li class="active"><a href="#home" role="tab" data-toggle="tab">Buyers</a></li>
		  <li><a href="#profile" role="tab" data-toggle="tab">Sellers</a></li>
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="home">
				<form class="bg-form clearfix">
					<div class="form-group">
						<label>First Name:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Email</label>
						<div>
							<input type="email">
						</div>
					</div>
					<div class="form-group">
						<label>Phone:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Address:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>State:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Company name:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Country:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Website:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>company position:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Choose Products:</label>
						<div class="select-box-style">
							<select>
								<option>Choose a option</option>
								<option>Option</option>
								<option>Another Option</option>
								<option>Another Option</option>
								<option>Another Option</option>
							</select>
						</div>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" id="checkbox-1">
						<label for="checkbox-1" class="checkbox_label">Sed ut perspiciatis unde omnis iste natus</label>
						
						<input type="checkbox" class="checkbox" id="checkbox-2">
						<label for="checkbox-2" class="checkbox_label">Accept Terms</label>
					</div>
					<div class="modal-btn">
						<button type="button" class="btn btn-primary pull-left">
							submit
						</button>
					</div>
				</form>
			</div>
			<div class="tab-pane" id="profile">
				<form class="bg-form clearfix">
					<div class="form-group">
						<label>First Name:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Email</label>
						<div>
							<input type="email">
						</div>
					</div>
					<div class="form-group">
						<label>Phone:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Website:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>company position:</label>
						<div>
							<input type="text">
						</div>
					</div>
					<div class="form-group">
						<label>Choose Products:</label>
						<div class="select-box-style">
							<select>
								<option>Choose a option</option>
								<option>Option</option>
								<option>Another Option</option>
								<option>Another Option</option>
								<option>Another Option</option>
							</select>
						</div>
					</div>
					<div class="checkbox">
						<input type="checkbox" class="checkbox" id="checkbox-3">
						<label for="checkbox-3" class="checkbox_label">Sed ut perspiciatis unde omnis iste natus</label>
						
						<input type="checkbox" class="checkbox" id="checkbox-4">
						<label for="checkbox-4" class="checkbox_label">Accept Terms</label>
					</div>
					<div class="modal-btn">
						<button type="button" class="btn btn-primary pull-left">
							submit
						</button>
					</div>
				</form>
			</div>
		</div>
      	
      	
	        
      </div>
      
    </div>
  </div>
</div>
<!--Register Modal End-->

</body>
</html>