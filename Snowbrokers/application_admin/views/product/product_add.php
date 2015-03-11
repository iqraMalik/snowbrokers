<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Product Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>BASIC DETAILS( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('product/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						   <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('product/insert_product');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>  Product Type :</label>
								
								<select style="font-size: inherit;" onchange="choose_type()" id="product_type" name="product_type">
								      <option value="">------------------SELECT------------------</option>
								      <?php foreach ($product_type as $pc) {?>
									     <option value="<?php echo $pc->id; ?>"><?php echo $pc->title; ?></option>
								      <?php }?>
								</select>
								
								<div id="product_type_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								      <label><span style="color: red;">*</span>  Product Category :</label>
								      
								      <select style="font-size: inherit;" id="product_category" name="product_category">
									    <option>Not available</option>
								      </select>
								      
								      <div id="product_category_error" class="error_div" style="color:red;"></div>
							</div>
						 
                                                  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>  Uploaded By Administrator :</label>
								
								<select style="font-size: inherit;" id="customer_type" name="customer_type">
								      <option value="">SELECT</option>
								        <option value="0">Admin</option>
								      <?php foreach ($customer_type as $c) {?>
									     <option value="<?php echo $c->id; ?>"><?php echo $c->first_name; ?></option>
								      <?php }?>
								</select>
								
								<div id="customer_type_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>  Product Title :</label>
								<input type="text" class="span9 required" id="product_title" name="product_title" label="product title" autocomplete="off" style="background-image: none; width: initial;">
								<div id="product_title_error" class="error_div" style="color:red;"></div>
							 </div>
	      
							
                                                          <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>  Tag :</label>
								<input type="text" class="span9 required" id="tag" name="tag" label="product tag" autocomplete="off" style="background-image: none; width: initial;">
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
									     <option value="<?php echo $pc->currency_code;?>"><?php echo $pc->currrency_symbol; ?></option>
								      <?php
								      }
								      }
								      ?>
								</select>
								<div id="currency_error" class="error_div" style="color:red;"></div>
							</div>
                                                        <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>  Price :</label>
								<input type="text" class="span9 required" id="price" name="price" onkeypress="return isFloat(event)" label="price Value" autocomplete="off" style="background-image: none; width: initial;">
								<div id="price_error" class="error_div" style="color:red;"></div>
							 </div>
                                                         
                                                          <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Short Description :</label>
								<textarea class="span9" label="Short Description" name="short_desc" id="short_desc"></textarea>
								<div id="short_desc_error" class="error_div" style="color:red;"></div>
							 </div>
                                                           <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Shipping Details :</label>
								<textarea class="span9" label="Shipping details" name="shipping_details" id="shipping_details"></textarea>
								<div id="shipping_details_error" class="error_div" style="color:red;"></div>
							 </div>
                                                          
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Submit & Next" class="btn-glow primary" id="createUser">
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
			 if (document.getElementById('product_type').value=="")
			 {
			    document.getElementById('product_type_error').innerHTML="Product Type Name required";
			    has_error++;
			    //return false;
			 }
			if (document.getElementById('product_category').value=="")
			 {
			    document.getElementById('product_category_error').innerHTML="product category Name required";
			    has_error++;
			    //return false;
			 }
                        if (document.getElementById('customer_type').value=="")
			 {
			    document.getElementById('customer_type_error').innerHTML="Seller Name required";
			    has_error++;
			    //return false;
			 }
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
	   
       
       function choose_type(){
	      
		     var e = document.getElementById('product_type');
		     var option = e.options[e.selectedIndex].value;
		     
		     $.ajax({
                        url : '<?php echo base_url().'index.php/product/choose_category';?>',
                        type:'post',
                        cache:false,
                        data: {'ptype':option},
                        success:function(response)
                        {
                          //$('#list_filmmakers').show();
                          $('#product_category').html(response);
                        }
		    });
		      }
		     
		     function isFloat(evt) {

		     var charCode = (event.which) ? event.which : event.keyCode;
		     if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
		     document.getElementById('price_error').innerHTML="Price In Number Only";
		     return false;
		     }
		     else {
		     //if dot sign entered more than once then don't allow to enter dot sign again. 46 is the code for dot sign
		     var parts = evt.srcElement.value.split('.');
		     if (parts.length > 1 && charCode == 46)
		     return false;
		     return true;
		     return true;
		     }
		     }
			   
       
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
    </script>
  <script>

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