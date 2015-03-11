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
    function get_color(obj)
	{
           value =($(obj).attr('value'));
	  
	    if ($(obj).attr('checked')=='checked')
            {
                $('#color_div'+value).slideDown(500);
            }
            else
            {
                $('#color_div'+value).slideUp(500);
            }
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
            }
    }
    
    function validfrm()
    {
        var size_flag=0,color_flag=0,quantity =0;
       $(".size_opt:checked").each(function() {
       var  size_id =($('.size_opt').val());
        
	  size_flag =1;
          color_flag =0;
	  quantity=0;
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
	document.getElementById("size_error").innerHTML="please check one color";
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
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('product/addproduct'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						   <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('product/advanceproductadd/'.$this->uri->segment(5));?>" name="new_category" id="new_category" method="post" autocomplete="off" onsubmit="return validfrm()">
                                                   
                                                   <div class="control-group" style="border-top:1px solid #eeeeee; padding-top: 5px;">
                                                    <label style="text-align: center;font-size: 20px;padding-top: 15px;" for="inputError" class="control-label">Choose Product Size</label>
                                                    <div>
                                                    <?php
                                                    $pro_typ= $this->uri->segment(3);
                                                    $pro_cat= $this->uri->segment(4);
                                                    $size=$this->model_product->size_type($pro_typ,$pro_cat);
						   
						    if(empty($size))
						    {
							echo '<b><h3><i>'."No size here to select !!".'</i></h3></b>';
						    }
                                                    foreach($size as $size_opt)
                                                    {
                                                    ?>
                                                    <div style="font-size: x-large;">
                                                    <input type="checkbox" name="size_opt[]" id="ref_<?php echo $size_opt->id;?>" class="size_opt" onclick="get_color(this)" value="<?php echo $size_opt->id ; ?>">
                                                    <?php echo $size_opt->size_type;?>
                                                  
						              
						    <div id="color_div<?php echo $size_opt->id;?>"  style="display: none;">
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
						    ?>
						    <table>
                                                    <div>
							<tr>
								<td>
                                                    <input type="checkbox" name="color_opt[]" id="ref_<?php echo $size_opt->id;?>_<?php echo $color_opt->id ; ?>" class="color_opt" onclick="get_quantity(this)" value="<?php echo $color_opt->id ; ?>"></td>
                                                    <br><td><div style="background:<?php echo $color_opt->color_code ;?>; height: 20px; width: 50px;border: 2px solid;"></div></td>
                                              <td>  <div id="ref_<?php echo $size_opt->id;?>_<?php echo $color_opt->id ; ?>_qty" class="quantity"  style="display: none;height: 30px;"><input type="text" id ="ref_<?php echo $size_opt->id;?>_<?php echo $color_opt->id ; ?>_text" name="ref_<?php echo $size_opt->id;?>_<?php echo $color_opt->id ; ?>_text" value="" placeholder="0" style="width: 40px;"><span id="qnty_error"></span></div></td>
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
                            