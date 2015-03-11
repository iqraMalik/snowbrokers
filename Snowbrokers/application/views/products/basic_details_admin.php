<!--  for tinymce editor -->
<script src="<?php echo base_url(); ?>admin/asset/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo base_url(); ?>admin/asset/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo base_url(); ?>admin/asset/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo base_url(); ?>admin/asset/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
<script src="<?php echo base_url(); ?>assets/js/tinymce_script_class.js"></script>
<!--      End   -->
<!-- content -->
<section class="content-area">
	<!--   This is for after login header menu bar start -->
    
	<?php //echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
	<div class="container">
		<div class="shipping-content clearfix">
			<form name="basic_details" id="basic_details" action="<?php echo site_url('admin_product/basic_features');?>" method="post" onsubmit="return check_Form();">
				<input type="hidden" name="admin_type_check" id="admin_type_check" value="<?php echo $this->uri->segment(3); ?>" />
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
								<select name="category" id="category">
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
							<label>Product Name <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="requireded" name="product_title" id="product_title" label="Product Name" placeholder="">
								<span class="star-color error_div" id="product_title_error"></span>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Tag <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="requireded" name="tag" id="tag" label="Tag" placeholder="">
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
								$currency1=$this->site_settingsmodel->get_all_currency();
								if($currency1!='0')
								{
									foreach($currency1 as $values)
									{
								?>
										<option value="<?php echo $values->currency_code; ?>"><?php echo $values->currency_code; ?></option>
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

<!--                    <div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product Visibility <span class="star-color">*</span></label>
                            <div class="post-address-cell">
								<select multiple class="select2" name="visibility[]" id="visibility" style="width: 550px; height: auto;">
								
                                    <option value="all" selected="selected">All Country</option>
									<?php
									if($currency!='0')
									{
										foreach($currency as $values)
										{
                                            
									?>
										<option value="<?php echo $values->id;?>"><?php echo $values->country_name; ?></option>
									   <?php
										}
									}
									?>
							    </select>
							</div>	
						</div>
					</div>
-->                                    <div class="col-md-12">
						<div class="post-address besic-form">
							<label>Product code <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="requireded" name="prod_cod" id="prod_cod" label="Product Code" placeholder="Enter Product Code">
								<span class="star-color error_div" id="prod_cod_error"></span>
							</div>	
						</div>
					</div>
					
						<div class="col-md-12">
						<div class="post-address besic-form">
							<label>Product Visibility <span class="star-color">*</span></label>
							
						
						<div class="post-address-cell">
								<!--<select multiple class="select2" name="visibility[]" id="visibility" style="width: 550px; height: auto;">-->
									
									<div class="checkbox" style="margin: 0px;">
									<input type="checkbox" id="all_coun_v" value="all" name="visibility[]" checked>
									<label id="clickID" for="all_coun_v">All Country</label>
									</div>
									<div id="country_div" class="multi_check">
										<?php
										if($currency!='0')
										{
										foreach($currency as $values)
											{
										?>
										<span class="total_c">
											<div class="checkbox" style="margin: 0px;">
												<input type="checkbox" name="visibility[]" id="visibility_<?php echo $values->id;?>" value="<?php echo $values->id;?>"checked>
												<label style="margin:  0;" id="" for="visibility_<?php echo $values->id;?>"><?php echo $values->country_name; ?></label>
											</div>
										</span>
											
										   <?php
											}
										}
										?>
									</div>
							   <!-- </select>-->
							</div>	
						</div>
						</div>

					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Price<span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="requireded" name="price" id="price" label="Price" placeholder="">
								<span class="star-color error_div" id="price_error"></span>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product code <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="requireded" name="prod_cod" id="prod_cod" label="Product Code" placeholder="">
								<span class="star-color error_div" id="prod_cod_error"></span>
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
<script type="text/javascript">
	function get_productCategory(val)
	{
		$.ajax({
		    url: "<?php echo base_url(); ?>index.php/admin_product/get_categoryType",
		    data: {
			product_id:val
		    },
		    success: function(response) {
			var ans = response.split('@@');
			$('#product_category').html(ans[1]);
			$("select").select2();
		    }
		});
	}
	function check_Form()
	{
		$('.error_div').html('');
		
		var element_id,element_value,element_label,error_div,element_validation_type;
		var required_elements = $('.requireded');
		var has_error = 0;
		var editorContent1 = tinymce.get('details').getContent();
		var editorContent2 = tinymce.get('shipping_details').getContent();
		required_elements.each(function(){
		       element_id = $(this).attr('id');
		       element_value = $(this).val();
		       element_label = $(this).attr('label');
		       element_validation_type = $(this).attr('validation_type');
		       error_div = $("#"+element_id+"_error")
		       if (element_value.search(/\S/)==-1) {
			   error_div.html(element_label+' is required.')
			   has_error++
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
		       has_error++
		}
		if(editorContent2=='' || editorContent2==null) {
			 //alert(0);
        		$('#shipping_details_error').html("Shipping details is required");
			$('#shipping_details').focus();
        		has_error++
		}
	    if (has_error==0)
	    {
		//alert(has_error);
		return true;
	    }
	    else
	    {
		return false;
	    }
	}
$(document).ready(function(){
$("#country_div").hide();
var check;
$("#all_coun_v").on("click", function(){
    check = $("#all_coun_v").is(":checked");
    if(check) {
	
	 $("#country_div").hide();
        
    } else {
	 $("#country_div").show();
       
    }
});
});
</script>