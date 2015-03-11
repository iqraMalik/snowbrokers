<?php
$this->load->view('includes/header');

?>
<style>
.ckh_inp{
        margin-left: 2%;
        width: 10%;
        float: left;
        text-align: center;
        font-size: 12px;
}
.att_name
{
        
}
</style>
<script>
     /*$(document).ready(function(){
  
   $('input[type="checkbox"]').click()
{
    $(".size_opt").attr ( "checked" ,"checked" );
     $(".color_opt").attr ( "checked" ,"checked" );
     if($(this).is(":checked")=='true')
     {
        $('.size_opt').next().show();
     }
    
   }
});*/
    
    function get_color(obj)
	{
                value =($(obj).attr('value'));
		value_id =($(obj).attr('id'));
		//var color_id=$('#colorval_'+value).val();
		//alert (color_id);
		$('#'+value_id).parent().find('input:checkbox').each(function() {
			//$('#test').id
			//alert('jaaaaraa  '+value);
		$('.colorval_'+value).prop('checked', false); // will uncheck the checkbox with id
		$('.qtyval_'+value).val(0);
		});
	
           //$('#ref_'+value+':checked').each(function() {
				//if ($('#ref_'+value+':checked'))
				//{
				//	$('#color_div'+value).show();
				//}
				if ($(obj).attr('checked')=='checked')
				{
					$('#color_div'+value).slideDown(500);
				}
				else
				{
					$('#color_div'+value).slideUp(500);
				}
      //  });
          
	}
    function get_quantity(obj)
    {
	
           value =($(obj).attr('id'));
          
	    if ($(obj).attr('checked')=='checked')
            {
                $('#'+value+'_qty').slideDown(500);
		
            }
            else
            {
                $('#'+value+'_qty').slideUp(500);
		$('#'+value+'_text').val(0);
            }
    }
    
    function validfrm()
    {
        var size_flag=0,color_flag=0,quantity =0;
       $(".size_opt:checked").each(function() {
      var  size_id =($('.size_opt').val());
        
	 size_flag =1;
         color_flag =0;
           $(".color_opt:checked").each(function() {
      
		color_flag=1;
                quantity=0;
               value = (this.id);
             var q_val = $('#'+value+'_text').val();
	     
	      if (q_val.search(/\S/)==-1)
              {
               // document.getElementById("qnty_error").innerHTML = "Please enter Quantity";
               // document.getElementById("qnty_error").style.color="red";
                return false;
              }
              else if(isNaN(q_val))
              {
		quantity=2;
                document.getElementById("size_error").innerHTML = "Please enter valid Quantity";
                document.getElementById("size_error").style.color="red";
                return false;
              }
              else
              {
                 quantity=1; 
              }
             });
         });
       
       if(size_flag ==1 && color_flag==1 && quantity==1)
        {
        return true;
        }
        else if (size_flag ==1 && color_flag==0 )
        {
	document.getElementById("size_error").innerHTML="please check one color to Edit";
	document.getElementById("size_error").style.color="red";
	return false;
        }
        else if (size_flag ==1 && color_flag==1 && quantity== 0) 
        {
            document.getElementById("size_error").innerHTML="please enter quantity";
            document.getElementById("size_error").style.color="red";
          return false;
        }
	else if (size_flag ==1 && color_flag==1 && quantity== 2) 
        {
		
            document.getElementById("size_error").innerHTML="Please enter valid Quantity";
            document.getElementById("size_error").style.color="red";
          return false;
        }
        else
        {
		
      document.getElementById("size_error").innerHTML="please check one size";
      document.getElementById("size_error").style.color="red";
      return false;
        }
    }
    
</script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Product Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>ADVANCED DETAILS ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('product/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
								<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('product/advanceproductedit/'.$this->uri->segment(5));?>" name="new_category" id="new_category" method="post" autocomplete="off" onsubmit="return validfrm()">
                                                   
                                                   
                        <div class="control-group" style="border-top:1px solid #eeeeee; padding-top: 5px;">
                                <label style="text-align: center;font-size: 20px;padding-top: 15px;" for="inputError" class="control-label">Choose Product Size</label>
                                       <div>
                                           <?php
						$pro_typ= $this->uri->segment(3);
						$pro_cat= $this->uri->segment(4);
						$select_size = $this->model_product->get_size_by_prod_id($this->uri->segment(5)); /////// get selected sizes for this product
						foreach($select_size as $check_size)
						{
						    $get_all_selected_size[]=$check_size->id;
						    $get_all_selected_size_id[] = $check_size->size_id;
						    $concat_size_id[] = $check_size->id."_".$check_size->size_id;
						}
						//$selected_qnty = $this->model_product->get_color_id_by_size($get_all_selected_size);   ////// get all product quantity and respective colours from product_related details.
						//foreach($selected_qnty as $value)
						//{
						//	$all_details_quantity[] = $value->id."_".$value->product_related_size_id."_".$value->color_id."_".$value->quantity;
						//}
						$size=$this->model_product->size_type($pro_typ,$pro_cat);
						if(empty($size))
						{
							echo '<b><h3><i>'."No size here to select !!".'</i></h3></b>';
						}
													
						foreach($size as $size_opt)
						{
						?>
								<div style="font-size: x-large;">
								<?php
									//$check_size = explode("_",$concat_size_id);
									if(in_array($size_opt->id,$get_all_selected_size_id))
									{
										$size_table_id = $this->model_product->get_table_id($this->uri->segment(5),$size_opt->id);
										$checked = 'checked';
										$style = 'display: block;';
										//$size_table_id = $check_size[1];
									}
									else
									{
										$checked = '';
										$size_table_id = 0;
										$style = 'display: none;';
									}
								?>
									<input type="checkbox" name="size_opt[]" id="ref_<?php echo $size_opt->id;?>" class="size_opt" onclick="get_color(this)" value="<?php echo $size_opt->id ;?>" <?php echo $checked;?>>
    
								<?php echo $size_opt->size_type;?>
										  
							  
												<div id="color_div<?php echo $size_opt->id;?>"  style="<?php echo $style;?>">
												<div class="control-group" style="border-top:1px solid #eeeeee; padding-top: 5px;">
												<label style="padding-bottom: 10px;font-size: 20px;" for="inputError" class="control-label">Choose Product Size Color</label>
												<div id="error"></div>
														<div>
														<?php
														       $pro_typ= $this->uri->segment(3);
														       $pro_cat= $this->uri->segment(4);
														       $color=$this->model_product->color_type($pro_typ,$pro_cat);
															
															foreach($color as $color_opt)
															{
																$checked2 = '';
																$table_qty = 0;
																$product_related_details_id = 0;
																if($size_table_id>0)
																{
																	$get_quty_value = $this->model_product->get_all_quty($size_table_id,$color_opt->id);
																	if($get_quty_value!='0')
																	{
																		$table_qty = $get_quty_value->quantity;
																		$product_related_details_id = $get_quty_value->id;
																		$product_related_details_size_id = $get_quty_value->product_related_size_id;
																		$checked2 = 'checked';
																	}
																}
																
														?>
														<input type="hidden" name="product_related_details_id" value="<?php echo $product_related_details_size_id;?>" id="product_related_details_id">
																<table>
																		<div>
																		    <tr>
																				<td>
																				     <input type="checkbox" name="color_opt[]" id="ref_<?php echo $size_opt->id;?>_<?php echo $color_opt->id ; ?>" class="color_opt colorval_<?php echo $size_opt->id;?>" onclick="get_quantity(this)" value="<?php echo $color_opt->id ; ?>" <?php echo $checked2;?>>
																				     <!--<input type="hidden" id="colorval_<?php echo $size_opt->id;?>" value="<?php echo $color_opt->id ; ?>">-->
																				</td>
																				<br>
																				<td>
																				    <div style="background:<?php echo $color_opt->color_code ;?>; height: 20px; width: 50px;border: 2px solid;"></div>
																				</td>
																		<?php 
																				$get_size_id=$this->model_product->get_id_prod_rel_size_details($size_opt->id,$this->uri->segment(5));
                                               
																				//$get_quantity_id=$this->model_product->get_id_prod_rel_details($get_size_id[0]['id'],$color_opt->id);
                                                   
																				//foreach($get_quantity_id as $get_val)
																				//{
																		?>
                                                   
																						<td>
																								<div id="ref_<?php echo $size_opt->id;?>_<?php echo $color_opt->id ; ?>_qty" class="quantity"  style="display: block;height: 30px;">
																								   <input type="text" id ="ref_<?php echo $size_opt->id;?>_<?php echo $color_opt->id ; ?>_text" name="ref_<?php echo $size_opt->id;?>_<?php echo $color_opt->id ; ?>_text" value="<?php echo $table_qty;?>" class="qtyval_<?php echo $size_opt->id;?>" placeholder="0" style="width: 40px;">
																								
																								    <span id="qnty_error"></span>
																								</div>
																						</td>
                                           
							
																		<?php
																				//}
																		?>
																		
																				</tr>
																		</div>
																</table>
														<?php
																}
														?>
														
																<span style="margin-left: 11%;color:red;" class="help-inline" id="color_opt_error" ></span>
														  </div>
												      </div>
                                                   </div>
                                                    
                                                    
                                                    
                                                    </div>
                                                    <?php
                                                    
												}
                                                    ?>
                                                    <span style="margin-left: 11%;color:red;" class="help-inline" id="size_opt_error" ></span>
                                                    </div>
                                            </div>
												 <span id="size_error"></span>
                                                <div class="span11 field-box actions" style="margin-top: 20px;">
														<input type="submit" value="Submit & Next" class="btn-glow primary" id="createUser">
																<span>OR</span>
																<a class="btn-flat new-product" href="<?php echo site_url('product/index'); ?>">Cancel</a>
												</div>
								</form>
                        </div>
                  </div>
        </div>
                            