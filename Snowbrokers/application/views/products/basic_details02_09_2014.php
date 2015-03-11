<!-- content -->
<section class="content-area">
	<!--   This is for after login header menu bar start -->
    
	<?php echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
	<div class="container">
		<div class="shipping-content clearfix">
			<form>
				<div class="form-hedding">
					<h2>Basic Details</h2>
				</div>
				<div class="row besic-form-row">
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product Type <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product Category <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product Title <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" placeholder="">
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Tag <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" placeholder="">
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Currency <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Price <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" placeholder="">
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Details <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" placeholder="">
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Shipping Details <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" placeholder="">
							</div>	
						</div>
					</div>
				</div>
				<div class="form-hedding">
					<h2>Advance Feture</h2>
				</div>
				<div class="advance-feture">
					<div class="product-size clearfix">
						<div class="product-box clearfix">
							<div class="select-color">
								<h3>SELECT COLOR : </h3>
								<div class="select-color">
									<ul class="select--product-color">
										<li class="gray">
											<a href="javascript:void(0)">
												
											</a>
										</li>
										<li class="pink">
											<a href="javascript:void(0)">
												
											</a>
										</li>
										<li class="blue">
											<a href="javascript:void(0)">
												
											</a>
										</li>
										<li class="green">
											<a href="javascript:void(0)">
												
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="number-of-stock">
								<input type="text" readonly="" placeholder="5" />
								<p>In stock</p>
							</div>
						</div>
						<div class="product-box">
							<div class="clearfix">
								<h3 class="pull-left">SELECT SIZE : </h3>
								<a class="pull-right select-size" href="javbascript:void(0)">SIZE CHART</a>
							</div>
							<ul class="size-box clearfix">
								<li>
									<a href="javascript:void(0)">XS</a>
								</li>
								<li>
									<a href="javascript:void(0)">S</a>
								</li>
								<li>
									<a href="javascript:void(0)">M</a>
								</li>
								<li>
									<a href="javascript:void(0)">L</a>
								</li>
								<li>
									<a href="javascript:void(0)">XL</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="advance-feture upload">
					<div class="browse-loop clearfix">
						<p>Upload White image</p>
						<div class="browse-btn">
							<input type="file" />
						</div>
					</div>
					<div class="browse-loop clearfix">
						<p>Upload Blue image</p>
						<div class="browse-btn">
							<input type="file" />
						</div>
					</div>
				</div>
				<div class="post-address-cell basic-submit">
				<button class="btn btn-default">
					SUBMIT
				</button>
			</div>
			</form>
		</div>
	</div>
</section>
<!-- content End -->