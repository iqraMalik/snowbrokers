<script src="<?php echo base_url();?>js/select2.min.js"></script>

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
			<form name="basic_details" id="basic_details" action="<?php echo site_url('shipping_details/basic_features');?>" method="post">
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
							<label>Product Name <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="requireded" name="product_title" id="product_title" label="Product Name" placeholder="">
								<span class="star-color error_div" id="product_title_error"></span>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Brand<span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="requireded" name="tag" id="tag" label="Brand" placeholder="">
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
								
								
								if(!empty($currency1))
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
					<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Price <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="requireded" name="price" id="price" label="Price" placeholder="">
								<span class="star-color error_div" id="price_error"></span>
							</div>	
						</div>
					</div>
					 <div class="col-md-6">
						
					</div>
<!--			              <div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product Visibility <span class="star-color">*</span></label>
							

						<div class="post-address-cell" style="color:  #000000;">
							All country
							<input type="radio" value="all" id="visibility" name="visibility" checked="checked">
								
							</div>	
						</div>
					</div>
-->
					
<!--					<div class="col-md-6">
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
										<option value="<?php echo $values->id;?>"><?php echo $values->country_name; ?>
										
										</option>
									   <?php
										}
									}
									?>
							    </select>
							</div>	
						</div>
					</div>
-->
		<div class="col-md-12">
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
							<label id="" for="visibility_<?php echo $values->id;?>"><?php echo $values->country_name; ?></label>
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

					
					
					
					
					
					
<!--						<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							 <label>Product Related options :</label>
							 <div class="ui-select" id="rel_op" style="width: 250px; height: auto;">
							 
							    <select multiple class="select2" name="visibility[]" id="visibility" style="width:250px">
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
-->
					
					<div class="col-md-12">
						<div class="post-address besic-form">
							<label>Product Description <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<textarea rows="10" cols="50" class="tinyeditor" name="details" id="details" label="Details" validation_type="texteditor">
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
									All shipping details, for Freight Forwarder or Couriers including FOB or EX WORKS
								</textarea>
								<span class="star-color error_div" id="shipping_details_error"></span>
							</div>	
						</div>
					</div>
                    <!--<div class="col-md-6">
						<div class="post-address besic-form">
							<label>Product size <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" class="requireded" name="size_text[]" id="size_text" label="Product size" placeholder="">
								<span class="star-color error_div" id="size_text_error"></span>
                                <button onclick="add_more_size();" type="button">+ Add More Size</button> (If you want to add more size click this button)
							</div>	
						</div>
					</div>-->
                </div>
				<!--<div class="col-md-8">
						<div class="post-address besic-form">
							<label>Product Size<span class="star-color">*</span></label>
							<div class="post-address-cell" id="size" style="color: black;">
								
								
								<button onclick="add_more_size();" type="button">+Add More Size</button> (If you want to add more size click this button)
							</div>	
						</div>
				</div>-->
				 
				<div class="post-address-cell basic-submit col-md-12">
					<button class="btn btn-default" type="button" id="form_submit_btn">
						CONTINUE TO NEXT PAGE
					</button>
					<div id="loader" style="display:none;"><img src="<?php echo base_url().'images/loader.gif'; ?>" /></div>
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
function check_Form_Basic()
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
		if (has_error==0)
		{
		 $('#loader').css({'display':'inline-block'});
		    ////alert(has_error);
		    //return true;
		    $("#basic_details").submit();
		}
		else
		{
		    return false;
		}
}
$("#form_submit_btn").on("click", function() {
	
	check_Form_Basic();
});
	
</script>

<script>
	var auto_val=1;
	function add_more_size()
	{
	 var table_id_val = 'additional_size'+auto_val;
	    var innerHTML = '<div id='+table_id_val+'><input type="hidden" name="field_value[]" value="'+auto_val+'" /><div class="col-md-12"><div class="post-address besic-form"><label>Size </label><div class="post-address-cell"><input type="text" class="requireded" name="size_text[]" id="size_text'+auto_val+'" label="Size" placeholder="Add Size Here" style="width : 60%;"><a href="JavaScript:void(0);" onclick="deleteExtraNews('+auto_val+');" title="Delete"><img src="<?php echo base_url()?>admin/images/inactive.png" alt="DELETE" /></a><br><span class="star-color error_div" id="size_text'+auto_val+'_error"></span></div></div></div>';
	    
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
	    var innerHTML = '<div id='+table_id_val+'><input type="hidden" name="field_value[]" value="'+auto_val+'" /><div class="col-md-12"><div class="post-address besic-form color"><label>Color </label><div class="post-address-cell"><input type="text" class="requireded color" name="color_text[]" id="color_text'+auto_val+'" label="Color" placeholder="Add Color Here" style="width : 60%;"><a href="JavaScript:void(0);" onclick="deleteExtraNews1('+auto_val+');" title="Delete"><img src="<?php echo base_url()?>admin/images/inactive.png" alt="DELETE" /></a><span class="star-color error_div" id="color_text'+auto_val+'_error"></span></div></div></div>';
	    
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