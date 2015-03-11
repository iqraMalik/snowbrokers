<?php
$this->load->view('includes/header');
$dataone_fetch = $this->model_product->getDataCategory($this->input->post('ListingUserid'));

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!--<script type="text/javascript" src="http://esolz.co.in/lab4/mr_easy_print/assets/js/jscolor.js"></script>
<script type="text/javascript" src="jscolor.js"></script>-->

    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Product Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Product ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('product/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						<?php
						$p_type_id= $dataone_fetch[0]->product_type_id;
						 $cat_id = $dataone_fetch[0]->product_cat_id;
						  $p_id =  $dataone_fetch[0]->id;
						  ?>
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('product/edit_product/'.$p_type_id.'/'.$cat_id.'/'.$p_id);?>" name="new_category" id="new_category" method="post" autocomplete="off">
							 <input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" />
							<?php
							$p_type_name=$this->model_product->prod_type_by_id($p_type_id);
							$cat_name=$this->model_product->prod_cat_by_id($cat_id);
							
							?>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;"></span>  Product Type :</label>
								<input type="text" readonly="readonly" class="span9 required" id="product_title" name="product_title" value="<?php echo $p_type_name[0]->title;?>" label="product title" autocomplete="off" style="background-image: none; width: initial;">
								<div id="product_title_error" class="error_div" style="color:red;"></div>
							 </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;"></span>  Product Category :</label>
								<input type="text" readonly="readonly" class="span9 required" id="product_title" name="product_title" value="<?php echo $cat_name[0]->name;?>" label="product title" autocomplete="off" style="background-image: none; width: initial;">
								<div id="product_title_error" class="error_div" style="color:red;"></div>
							 </div>
                                                        <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>  Product Title :</label>
								<input type="text" class="span9 required" id="product_title" name="product_title" value="<?php echo $dataone_fetch[0]->title;?>" label="product title" autocomplete="off" style="background-image: none; width: initial;">
								<div id="product_title_error" class="error_div" style="color:red;"></div>
							 </div>
	      
							
                                                          <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>  Tag :</label>
								<input type="text" class="span9 required" id="tag" name="tag" value="<?php echo $dataone_fetch[0]->product_tag;?>" label="product tag" autocomplete="off" style="background-image: none; width: initial;">
								<div id="tag_error" class="error_div" style="color:red;"></div>
							 </div>
							
                                                        <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>  Currency Type :</label>
								
								<select style="font-size: inherit;" id="currency" name="currency">
								      <option value="">------------------SELECT------------------</option>
								      <?php foreach ($currency as $pc)
								      {
									      if($pc->currrency_symbol !='')
									     {
									     ?>
									     ?>
									     <option value="<?php echo $pc->currency_code; ?>"<?php if($pc->currency_code==$dataone_fetch[0]->choose_currency){echo "selected";}else{echo "";}?>><?php echo $pc->currrency_symbol; ?></option>
								      <?php
								      }
								      }
								      ?>
								</select>
								<div id="currency_error" class="error_div" style="color:red;"></div>
							</div>
                                                        <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>  Price :</label>
								<input type="text" class="span9 required" id="price" name="price" value="<?php echo $dataone_fetch[0]->price;?>" onkeypress="return isFloat(event)" label="price Value" autocomplete="off" style="background-image: none; width: initial;">
								<div id="price_error" class="error_div" style="color:red;"></div>
							 </div>
                                                         
                                                          <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Short Description :</label>
								<textarea class="span9" label="Short Description" name="short_desc" id="short_desc"><?php echo $dataone_fetch[0]->product_details;?></textarea>
								<div id="short_desc_error" class="error_div" style="color:red;"></div>
							 </div>
                                                           <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Shipping Details :</label>
								<textarea class="span9" label="Shipping details" name="shipping_details" id="shipping_details"><?php echo $dataone_fetch[0]->shipping_terms;?></textarea>
								<div id="shipping_details_error" class="error_div" style="color:red;"></div>
							 </div> 
						 
						  	 
						  

						<!-- <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									   <option value="1" <?php if($dataone_fetch[0]->status==1){echo "selected";}else{echo "";}?>>Active</option>
									   <option value="0" <?php if($dataone_fetch[0]->status==0){echo "selected";}else{echo "";}?>>Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>-->
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Submit" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('product/index'); ?>">Cancel</a>
							 </div>
						  </form>
					   </div>
				    </div>
				</div>
			 </div>
		  </div>
	   </div>
    </div>
    <script type="text/javascript">
	   $(document).ready(function () {
		  $('#createUser').click(function (e) {
                   
			 e.preventDefault();
			 $('.span9').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required')
			 var has_error = 0;
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
			 })
			  
			  if (document.getElementById('currency').value=="")
			 {
			    document.getElementById('currency_error').innerHTML="Currency required";
			    has_error++;
			    //return false;
			 }
                         if(CKEDITOR.instances.short_desc.getData()=='') {
			    $('#short_desc_error').html("Add Short Description");
			    $('#short_desc_error').css('color','red');
			    $('#short_desc').focus();
			    has_error=has_error+1;
			    
			    }
			
			  if(CKEDITOR.instances.shipping_details.getData()=='') {
			    $('#shipping_details_error').html("Add Shipping Details");
			    $('#shipping_details_error').css('color','red');
			    $('#shipping_details').focus();
			    has_error=has_error+1;
			    
			    }
			 
			 if (has_error==0) {
				$('#new_category').submit();
			 }
		  });
	   });
	   
//        function choose_type(){ 
//	      
//		     var e = document.getElementById('product_type');
//		     var option = e.options[e.selectedIndex].value;
//		     
//		     $.ajax({
//                        url : '<?php echo base_url().'index.php/product_color/choose_category';?>',
//                        type:'post',
//                        cache:false,
//                        data: {'ptype':option},
//                        success:function(response)
//                        {
//                          //$('#list_filmmakers').show();
//                          $('#product_category').html(response);
//                        }
//		    });
//       }
       
//       function chkfrm(){
//	      
//	    var e = document.getElementById('product_type');
//            var ptype = e.options[e.selectedIndex].value;
//	    
//	    var e = document.getElementById('product_category');
//            var pcat = e.options[e.selectedIndex].value;
//	    
//	    if (ptype=="") {
//	      
//	      document.getElementById('type_error').innerHTML="please select product type";
//	      return false;
//	    }
//	    else {
//	      
//	      if (pcat=="") {
//		 
//		 document.getElementById('category_error').innerHTML="please select product category";
//	         return false;    
//	      }
//	      else {
//		     return true;
//	      }
//	    }
//       }
 

           CKEDITOR.replace( 'short_desc',
       {
       
       height: 250,
       width: 600
       });
           
           CKEDITOR.replace( 'shipping_details',
       {
       
       height: 250,
       width: 600
       });
           
  </script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>