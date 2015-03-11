<?php
$this->load->view('includes/header');
?>
<script>

     function get_ids(color_id)
        {
            document.getElementById('color_ids').value=color_id;
        }
        function check()
        {
          // var color_id = $('.check').val();
        //  alert($('#color_'+color_id).val());
        
        
              var isChecked = jQuery("input[name=color]:checked").val();
                if(!isChecked){
                    document.getElementById('error').innerHTML="Nothing Selected , Please Select One !!";
                   
                    return false;
                }else{
                    return true;
                }
             }
    
 </script>

 
 
 
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
                                            
                                            <?php $product_id = $this->uri->segment(3);
                                            
                                            $get_size = $this->model_product->get_size_by_prod_id($product_id);
                                           
                                            ?>
                                               <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id;?>">
						   <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('product/product_color_add/'.$product_id);?>" name="new_category" id="new_category" method="post" autocomplete="off" onsubmit="return check()">
                                                  
                                                  <?php
                                                 
                                                    foreach($get_size as $size)
                                                    {
                                                        $get_size_id[] = $size->id;
                                                    }
                                                  //   echo $size->id;
                                                      $get_color = $this->model_product->get_color_all($get_size_id);
                                                       //print_r($get_color);die();
                                                   
                                                      foreach($get_color as $color)
                                                        {
                                                         $get_color_code = $this->model_product->get_color_code_by_color_id($color->color_id);
                                                         $get_num_of_img=$this->model_product->get_num_img($get_color_code[0]['id'],$product_id);
                                                         if($get_num_of_img=="")
                                                         {
                                                            $get_num_of_img=0;
                                                         }
                                                         
                                                      ?>
                                                      <input type="radio" class="check" onclick="get_ids(<?php echo $get_color_code[0]['id'];?>)" name="color" id="color_<?php echo $get_color_code[0]['id'];?>" value="<?php echo $get_color_code[0]['id'];?>"> 
                                                   
                                                  <h4 style="padding-bottom: 10px;"> Upload more Color Image</h4><div style="background:<?php echo $get_color_code[0]['color_code'];?>; height: 40px; width: 180px;border: 2px solid;"></div>
                                                        <h4 style="padding-top: 10px;">(You have <b><?php echo $get_num_of_img;?></b> Image Uploaded)</h4><br>
                                                    <!-- <label style="width: 100px;" for="inputError" class="control-label">Image</label>
                                                          <div style="margin: 0 0 0px 120px; " class="controls">
                                                            <div id="my-awesome-dropzone" onclick="get_ids(<?php echo $get_color_code[0]['id'];?>,<?php echo $product_id;?>)" class="dropzone">
                                                            </div>
                                                            <input type="hidden" name="images_id[]" id="images_id" value="">
                                                            <!-- <input type="file" onchange="change_picture(this.value,<?php // echo $get_color_code[0]['id'];?>)" name="image[]" id="image_<?php// echo $get_color_code[0]['id'];?>"/>-->
                                                             <!-- <input type="hidden" name="color_id[]" id="color_id" value="<?php echo $get_color_code[0]['id'];?>">
                                                            </div>-->
                                                  
                                                        <?php
                                                        }
                                                  ?>
                                                    <input type="hidden" id="color_ids" name="color_ids" value="<?php echo $get_color_code[0]['id'];?>"<br><span id="error" style="color: red;" ></span>
                                                  
                                                    <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="submit" value="Submit & Next" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('product/index'); ?>">Cancel</a>
							 </div>
						  </form>
                                           </div>
                                   </div>
                                </div>
                            
                          