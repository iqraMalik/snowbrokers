<!--  for tinymce editor -->
<script src="<?php echo base_url(); ?>admin/asset/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo base_url(); ?>admin/asset/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo base_url(); ?>admin/asset/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo base_url(); ?>admin/asset/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
<script src="<?php echo base_url(); ?>assets/js/tinymce_script_class.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jscolor.js"></script>
<!--      End   -->
<!-- content -->
<section class="content-area">
	<!--   This is for after login header menu bar start -->
    
	<?php echo $this->load->view('header/menu_bar');
	
	?>
    
        <!--   This is for after login header menu bar end -->
	<div class="container">
		<div class="shipping-content clearfix">
			<form name="basic_details" id="basic_details" action="<?php echo site_url('shipping_details/basic_features');?>" method="post" onsubmit="return check_Form();">
				<div class="form-hedding">
					<h2>Basic Details</h2>
				</div>
				<div class="row besic-form-row">
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product Type <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<select name="product_type" id="product_type" onchange="get_productCategory(this.value);">
								<?php
								if($product_type!='0')
								{
									foreach($product_type as $values)
									{
								?>
									<option value="<?php echo $values->id; ?>"><?php echo $values->title; ?></option>
								<?php
									}
								}
								else
								{
								?>
									<option value="0">Products not available</option>
								<?php
								}
								?>
								</select>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product Category <span class="star-color">*</span></label>
							<div class="post-address-cell" id="product_category">
								<select name="category" id="category" onchange="get_size_color(this.value);">
									<?php
									$product_category = $this->modelhome->get_ProductCategory($product_type[0]->id);
									if($product_category!='0')
									{
										foreach($product_category as $value)
										{
									?>
										<option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
									<?php
										}
									}
									?>
								</select>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product Title <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="required" name="product_title" id="product_title" label="Product Title" placeholder="">
								<span class="star-color error_div" id="product_title_error"></span>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Tag <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="required" name="tag" id="tag" label="Tag" placeholder="">
								<span class="star-color error_div" id="tag_error"></span>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Currency <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<select name="currency" id="currency">
								<?php
								if($currency!='0')
								{
									foreach($currency as $values)
									{
								?>
										<option value="<?php echo $values->currency_code; ?>"><?php echo $values->currrency_symbol; ?></option>
								<?php
									}
								}
								else
								{
								?>
									<option value="0">Currency not available</option>
								<?php
								}
								?>
								</select>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Price <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="required" name="price" id="price" label="Price" placeholder="">
								<span class="star-color error_div" id="price_error"></span>
							</div>	
						</div>
					</div>
					<div class="col-md-12">
						<div class="post-address besic-form">
							<label>Details <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<textarea rows="10" cols="50" class="tinyeditor" name="details" id="details" label="Details" validation_type="texteditor">
									
									<p class="product-info">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
									<div class="care">
									<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
									<p>Fabric</p>
									</div>
									<div class="col-md-6 col-sm-8 col-xs-5">
									<p>Cotton</p>
									</div>
									</div>
									<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
									<p>Sleeves</p>
									</div>
									<div class="col-md-6 col-sm-8 col-xs-5">
									<p>3/4th Sleeve</p>
									</div>
									</div>
									<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
									<p>Neck</p>
									</div>
									<div class="col-md-6 col-sm-8 col-xs-5">
									<p>Round Neck</p>
									</div>
									</div>
									<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
									<p>Fit</p>
									</div>
									<div class="col-md-6 col-sm-8 col-xs-5">
									<p>Regular</p>
									</div>
									</div>
									<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
									<p>Length</p>
									</div>
									<div class="col-md-6 col-sm-8 col-xs-5">
									<p>Thigh Length</p>
									</div>
									</div>
									<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
									<p>Color</p>
									</div>
									<div class="col-md-6 col-sm-8 col-xs-5">
									<p>Off White</p>
									</div>
									</div>
									<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
									<p>SKU</p>
									</div>
									<div class="col-md-6 col-sm-8 col-xs-5">
									<p>SA038WA36SBNINDFAS</p>
									</div>
									</div>
									<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
									<div class="col-md-6 col-sm-8 col-xs-5"><a>Report inaccurate/incomplete information here</a></div>
									</div>
									</div>
								</textarea>
								<span class="star-color error_div" id="details_error"></span>
							</div>	
						</div>
					</div>
					<div class="col-md-12">
						<div class="post-address besic-form">
							<label>Shipping Details <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<textarea rows="10" cols="50" class="tinyeditor" name="shipping_details" id="shipping_details" label="Shipping Details" validation_type="texteditor">
									<ul>
									<li>Call 1800 208 9898 (toll free)<br> for from our product expert.</li>
									<li>EMI Option</li>
									<li>Product Enquiry</li>
									<li>30 Day Replacement Guarantee</li>
									</ul>
								</textarea>
								<span class="star-color error_div" id="shipping_details_error"></span>
							</div>	
						</div>
					</div>
				</div>
				
				
				<div class="col-md-8">
						<div class="post-address besic-form">
							<label>Product Size<span class="star-color">*</span></label>
							<div class="post-address-cell" id="size" style="color: black;">
								
								<select name="size_opt" id="size_opt">
									<?php
									$product_size = $this->modelhome->get_ProductSize_val($product_cat[0]->id);
									if($product_size!='0')
									{
										foreach($product_size as $value)
										{
									?>
										<option value="<?php echo $value->id;?>"><?php echo $value->size_type;?></option>
									<?php
										}
									}
									?>
								</select>
								<button onclick="add_more_size();">+Add More Size</button> (If you want to add more size click this button)
							</div>	
						</div>
						
				</div>
				
				 <div id="more_news_title"></div>
				<div class="col-md-8">
						<div class="post-address besic-form">
							<label>Product Color<span class="star-color">*</span></label>
							<div class="post-address-cell" id="color" style="color: black;">
								<select name="color_opt" id="color_opt">
									<?php
									$product_color = $this->modelhome->get_ProductColor_val($product_cat[0]->id);
									if($product_color!='0')
									{
										foreach($product_color as $value)
										{
									?>
										<option value="<?php echo $value->id;?>"><?php echo $value->color_code;?></option>
									<?php
										}
									}
									?>
								</select>
								<button onclick="add_more_color();">+Add More Color</button> (If you want to add more color click this button)
							</div>	
						</div>
				</div>
				<div id="more_news_title1"></div>
				<div class="post-address-cell basic-submit col-md-12">
					<button class="btn btn-default">
						SUBMIT
					</button>
				</div>
			</form>
				<!--<div class="form-hedding">
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
				</div>-->
				
		</div>
	</div>
</section>
<!-- content End -->
<script type="text/javascript">
	function get_productCategory(val)
	{
		$.ajax({
		    url: "<?php echo base_url(); ?>index.php/shipping_details/get_categoryType",
		    data: {
			product_id:val
		    },
		    success: function(response) {
			//alert(response);
			var ans = response.split('@@');
			$('#product_category').html(ans[1]);
			$("select").select2();
		    }
		});
	}
	
	function get_size_color(val)
	{
		//alert(val);exit;
		$.ajax({
		    url: "<?php echo base_url(); ?>index.php/shipping_details/get_size_color",
		    data: {
			product_cat:val
		    },
		    success: function(response) {
			//alert(response);
			var size = response.split('@[ESOLZ]@');
			$('#size').html(size[0]);
			$('#color').html(size[1]);
			$("select").select2();
		    }
		});
	}
	function check_Form()
	{
		$('.error_div').html('');
		
		var element_id,element_value,element_label,error_div,element_validation_type;
		var required_elements = $('.required');
		var has_error = 0;
		var editorContent1 = tinymce.get('details').getContent();
		var editorContent2 = tinymce.get('shipping_details').getContent();
		required_elements.each(function(){
		       element_id = $(this).attr('id');
		       element_value = $(this).val();
		       element_label = $(this).attr('label');
		       element_validation_type = $(this).attr('validation_type');
		       error_div = $("#"+element_id+"_error");
		       if (element_value.search(/\S/)==-1) {
			   error_div.html(element_label+' is required.');
			   has_error++;
		       }
		       else if (element_id=='price') {
			
				var pattern = /^[0-9]\d*(?:\.\d{0,2})?$/ ;
				if (!pattern.test(element_value))
				{
					error_div.html('This is not valid price type.');
					has_error++;
				}
		       }
		});
		if(editorContent1=='' || editorContent1==null) {
			//alert(0);
		       $('#details_error').html("Details is required");
		       $('#details').focus();
		       has_error++;
		}
		if(editorContent2=='' || editorContent2==null) {
			 //alert(0);
        		$('#shipping_details_error').html("Shipping details is required");
			$('#shipping_details').focus();
        		has_error++;
		}
		//alert(has_error);
			if (has_error==10)
			{
			    //alert(has_error);
			    return true;
			}
			else
			{
			    return false;
			}
	}
</script>

<script>
	var auto_val=1;
	function add_more_size()
	{
	 var table_id_val = 'additional_size'+auto_val;
	    var innerHTML = '<div id='+table_id_val+'><input type="hidden" name="field_value[]" value="'+auto_val+'" /><div class="col-md-12"><div class="post-address besic-form"><label>Size </label><div class="post-address-cell"><input type="text" class="required" name="size_text[]" id="size_text'+auto_val+'" label="Size" placeholder="Add Size Here" style="width : 60%;"><a href="JavaScript:void(0);" onclick="deleteExtraNews('+auto_val+');" title="Delete"><img src="<?php echo base_url()?>admin/images/inactive.png" alt="DELETE" /></a><br><span class="star-color error_div" id="size_text'+auto_val+'_error"></span></div></div></div>';
	    
	    $('#more_news_title').append(innerHTML);
	     auto_val++;
	}
	function deleteExtraNews(val)
	{
	    $('#additional_size'+val).remove();
	}
	
	function add_more_color()
	{
	 var table_id_val = 'additional_color'+auto_val;
	    var innerHTML = '<div id='+table_id_val+'><input type="hidden" name="field_value[]" value="'+auto_val+'" /><div class="col-md-12"><div class="post-address besic-form color"><label>Color </label><div class="post-address-cell"><input type="text" class="required color" name="color_text[]" id="color_text'+auto_val+'" label="Color" placeholder="Add Color Here" style="width : 60%;"><a href="JavaScript:void(0);" onclick="deleteExtraNews1('+auto_val+');" title="Delete"><img src="<?php echo base_url()?>admin/images/inactive.png" alt="DELETE" /></a><span class="star-color error_div" id="color_text'+auto_val+'_error"></span></div></div></div>';
	    
	    $('#more_news_title1').append(innerHTML);
	    //for color picker
	    var myPicker = new jscolor.color(document.getElementById('color_text'+auto_val), {})
		myPicker.fromString('FFFFFF');
	    //for color picker end
		
	    auto_val++;
	}
	function deleteExtraNews1(val)
	{
	    $('#additional_color'+val).remove();
	}
</script>