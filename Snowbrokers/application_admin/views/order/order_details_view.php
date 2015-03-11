<?php
$this->load->view('includes/header');
if($this->input->post('ListingUserid')=='')
{
    redirect('order/index');
}
//echo $this->input->post('ListingUserid');die;
$dataone_fetch = $this->model_order->getDataCategory($this->input->post('ListingUserid'));
$order_details_fetch_array = $this->model_order->getData_orderdetails($this->input->post('ListingUserid'));

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!--<script type="text/javascript" src="http://esolz.co.in/lab4/mr_easy_print/assets/js/jscolor.js"></script>
<script type="text/javascript" src="jscolor.js"></script>-->

    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Order Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12" style="text-align: center; font-size: 20px;padding: 10px;">Order Details</div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('order/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						
						 <!-- <form class="new_user_form" enctype="multipart/form-data" action="<?php //echo site_url('product/edit_product/'.$p_type_id.'/'.$cat_id.'/'.$p_id);?>" name="new_category" id="new_category" method="post" autocomplete="off">-->
							 <input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" />
                                                <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">       
						<b>Order ID -</b><?php echo $dataone_fetch[0]->order_transaction_id;?>
                                                
                                                </div>
                                                <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
						    <?php $cust = $this->model_order->get_customer_by_id($dataone_fetch[0]->userid)?>
						<b>Order By -</b><?php echo $cust[0]->first_name;?> <?php echo $cust[0]->last_name;?>
                                                </div>
						
                                                 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
						  <?php $datee=$dataone_fetch[0]->order_date; ?>

						<b>Order Date -</b><?php echo date('g:ia \o\n l jS F Y',strtotime($datee));?>
                                                </div>
                                                 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">       
						<!--<h4><b>Total Amount -</b><?php // echo $dataone_fetch[0]->total_amount;?></h4>-->
                                                </div>
                                                 
                                                 <table style="width: 90% ;margin-bottom: 20px" border="2px";>
                                                    <thead>
                                                    <tr>
                                                        <th class="span1">
                                                            Product Name
                                                        </th>
                                                        <th class="span1">
                                                           Quantity
                                                        </th>
                                                          <th class="span1">
                                                          Color
                                                        </th>
                                                          <th class="span1">
                                                          Size
                                                        </th>
							  <th class="span1">
                                                          Seller Name
                                                        </th>
                                                       <th class="span1" style=" background-color: #CCFF99;">
                                                         Unit Selling Price
                                                        </th>
							<th class="span1" style="background-color: #CCFF99;">
                                                          Selling Price
                                                        </th>
							<th class="span1" style="background-color: #FFCCFF;">
                                                          Unit Seller Price
                                                        </th>
							<th class="span1" style="background-color: #FFCCFF;">
                                                          Seller Price
                                                        </th>
						 </tr>
                                                    </thead>
						    <?php
						    foreach($order_details_fetch_array as $order_details_fetch)
						    {
							//print_r($order_details_fetch);
						    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: center;">
                                                             <?php $prod = $this->model_order->get_product_by_id($order_details_fetch['product_id']);
                                                             echo  $prod[0]->title;
								 ?>
                                                            </td>
                                                             <td style="text-align: center;">
                                                                <?php echo $order_details_fetch['quantity']; ?>
                                                            </td>
                                                             <td>
                                                            <?php $color = $this->model_order->get_color_code_by_color_id($order_details_fetch['color_id']);
							   
							    ?>
                                                              <center>
								<?php
								 if(empty($color))
								{
								   echo 'N/A';
								}else
								{
								?>
								<div style="background:<?php echo $color[0]->color_code;?> ; height: 20px; width: 60px;border: 2px solid;"></div>
								<?php
								}
								?>
							      </center>
                                                            </td>
                                                              <td style="text-align: center;">
                                                              <?php  $size = $this->model_order->get_size_code_by_id($order_details_fetch['size_id']);
							      
								 if(empty($size))
								{
								   echo 'N/A';
								}else
								{
								 echo $size[0]->size_type;
								}
								 ?>
                                                            </td>
							      <td>
								  <?php
								  if($prod[0]->customer_type !=0)
								  {
								  $seller = $this->model_order->get_customer_by_id($prod[0]->customer_type);
								  echo $seller[0]->first_name .' '. $seller[0]->last_name;
								  }
								    else
								    {
								    echo 'Admin';
								    }
								  ?>
							      </td>
                                                             
							     <td style="text-align: center;">
								<?php
								$currency_symbol = $this->model_order->get_currency_symbol_by_id($prod[0]->choose_currency);
								$get_price = $this->model_order->get_product_by_id($order_details_fetch['product_id']);
								$usp = $get_price[0]->price / $order_details_fetch['quantity'];
								echo $currency_symbol[0]->currrency_symbol.number_format($usp,2);?>
							     </td>
							    <td style="text-align: center;">
								<?php
								echo $currency_symbol[0]->currrency_symbol.$get_price[0]->price;
								?>
							    </td>
							    <td style="text-align: center;">
								<?php
								$usrp = $get_price[0]->seller_price / $order_details_fetch['quantity'];
								echo $currency_symbol[0]->currrency_symbol.number_format($usrp,2);?>
							     </td>
							     <td style="text-align: center;">
								<?php echo $currency_symbol[0]->currrency_symbol.$get_price[0]->seller_price;?>
							     </td>
							   </tr>
                                                    </tbody>
						    <?php
						    }
						    ?>
                                                 </table>
                                                 <!--<span>Total =  <?php //echo $order_details_fetch[0]->total_amount; ?></span>-->
						
						<!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									   <option value="1" <?php if($dataone_fetch[0]->status==1){echo "selected";}else{echo "";}?>>Active</option>
									   <option value="0" <?php if($dataone_fetch[0]->status==0){echo "selected";}else{echo "";}?>>Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>-->
							 <div class="span11 field-box actions" style="margin-top: 20px;padding-left: 60%;">
							
							<?php
							$t=0;
							$s=0;
						    foreach($order_details_fetch_array as $get_total_prise)
						    {
						    ?>
							<?php
							//print_r($order_details_fetch);
						   $currency_symbol = $this->model_order->get_currency_symbol_by_id($prod[0]->choose_currency);
							//$get_prod = $this->model_order->get_prod($order_details_fetch['order_id']);
							 $total_selling_price =  $this->model_order->get_sum_selling_price($get_total_prise['product_id']);
								$t+= $total_selling_price[0]['price'];
							 $total_seller_price =  $this->model_order->get_sum_seller_price($get_total_prise['product_id']);	
								$s+= $total_seller_price[0]['seller_price'];?>
								
							<?php
						    }
							?>
							<h5>Total Selling Price = <?php echo $currency_symbol[0]->currrency_symbol.number_format($t,2);?><br></h5>
							<h5>Total Seller Price = <?php echo $currency_symbol[0]->currrency_symbol.number_format($s,2);?><br></h5>
							----------------------------------------<br>
							<h5>Website Income = <?php $sum = $t - $s; echo $currency_symbol[0]->currrency_symbol.number_format($sum,2);?></h5>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<!--<input type="button" value="Submit" class="btn-glow primary" id="createUser">
								<span>OR</span>-->
								<a class="btn-flat new-product" href="<?php echo site_url('order/index'); ?>">BACK</a>
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
//	   $(document).ready(function () {
//		  $('#createUser').click(function (e) {
//                   
//			 e.preventDefault();
//			 $('.span9').css('border-color','#B2BFC7');
//			 $('.error_div').html('');
//			 var element_id,element_value,element_label,error_div,element_validation_type;
//			 var required_elements = $('.required')
//			 var has_error = 0;
//			 required_elements.each(function(){
//				element_id = $(this).attr('id');
//				element_value = $(this).val();
//				element_label = $(this).attr('label');
//				element_validation_type = $(this).attr('validation_type');
//				error_div = $("#"+element_id+"_error")
//				
//				if (element_value.search(/\S/)==-1) {
//				    error_div.html(element_label+' is required.')
//				    has_error++
//				}
//			 })
//			  
//			  if (document.getElementById('currency').value=="")
//			 {
//			    document.getElementById('currency_error').innerHTML="Currency required";
//			    has_error++;
//			    //return false;
//			 }
//                         if(CKEDITOR.instances.short_desc.getData()=='') {
//			    $('#short_desc_error').html("Add Short Description");
//			    $('#short_desc_error').css('color','red');
//			    $('#short_desc').focus();
//			    has_error=has_error+1;
//			    
//			    }
//			
//			  if(CKEDITOR.instances.shipping_details.getData()=='') {
//			    $('#shipping_details_error').html("Add Shipping Details");
//			    $('#shipping_details_error').css('color','red');
//			    $('#shipping_details').focus();
//			    has_error=has_error+1;
//			    
//			    }
//			 
//			 if (has_error==0) {
//				$('#new_category').submit();
//			 }
//		  });
//	   });
	   
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
 

       //    CKEDITOR.replace( 'short_desc',
       //{
       //
       //height: 250,
       //width: 600
       //});
       //    
       //    CKEDITOR.replace( 'shipping_details',
       //{
       //
       //height: 250,
       //width: 600
       //});
           
  </script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>