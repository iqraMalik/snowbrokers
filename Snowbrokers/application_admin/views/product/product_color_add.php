<?php
$this->load->view('includes/header');

?>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

<head>
<meta charset="utf-8">
<link href="<?php echo base_url();?>dropzone/css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url();?>dropzone/dropzone.min.js"></script>
 <script>


       $( document ).ready(function() {
    
       var image_id = '';
       var images_id = [];
 
	      Dropzone.options.myAwesomeDropzone = {
	      paramName: "file", // The name that will be used to transfer the file
	      maxFilesize: 10, // MB
	      //?cid='.$color_id.'/?pid='.$this->uri->segment(3));?>"
	      maxFiles: 12,   // Maximum number of images
	      url: "<?php echo base_url().'index.php/product/add_dropzone_pic/'.$color_id.'/'.$this->uri->segment(3)?>",
	      addRemoveLinks: true,
	      acceptedFiles: 'image/*',
	      init: function()
		     {
			 this.on("success", function(file, response) {
			     file.serverId = response; // If you just return the ID when storing the file
			     image_id += file.serverId+",";
			     $("#images_id").val(image_id);
			     //alert(file.serverId);
		       });
          
	    this.on("removedfile", function(file)
            {
                if (!file.serverId) { return; } // The file hasn't been uploaded
                else
                {
                   alert(file.serverId);
                    //alert(image_id);
                    //image_ids[] = image_id.split(",");
                    //alert(image_ids[]);
                    // image_ids = image_ids.remove(file.serverId);
                   //image_id = image_ids.toString();
                   // alert(image_id);
                    $.post("<?php echo site_url('product/delete_dropzone_pic');?>/"+file.serverId); // Send the file id along
                    images_id = image_id.split(",");
                    var i = images_id.indexOf(file.serverId);
                    if(i != -1)
                    {
                        images_id.splice(i, 1);
                    }
                    image_id = images_id.toString();
                    $("#images_id").val(image_id);
                }
            });
        }
      
    };
    });
       
       
       function delete_image(id)
       {
	     
	      
       var r=confirm("Are you sure to delete this Image?");
       
       if (r==true)
       {  
	  $.ajax({
                        url : '<?php echo base_url().'index.php/product/delete_img';?>',
                        type:'post',
                        cache:false,
                        data: {'img_id':id},
                        success:function(response)
                        {
                          //$('#list_filmmakers').show();
                          $('#del_'+id).remove();
                        }
		    });
       }
       }
       function show_img(img)
       {
	
	window.open("<?php echo base_url();?>images/uploads/normal/"+img);
       }

 </script>
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Product Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>IMAGE UPLOAD DETAILS ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('product/product_image_add/'.$this->uri->segment(3)); ?>">< BACK</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
                                            
                                            <?php $product_id = $this->uri->segment(3);
					    $get_color_code = $this->model_product->get_color_code_by_color_id($color_id);
                                             $get_size = $this->model_product->get_size_by_prod_id($product_id);
                                             ?>
					        Upload This <div style="background:<?php echo $get_color_code[0]['color_code'];?>; height: 30px; width: 90px;border: 2px solid;"></div>
                                               <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id;?>">
						   <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('product/product_color_add/'.$product_id);?>" name="new_category" id="new_category" method="post" autocomplete="off">
                                                  
                                                
                                                   <label style="width: 100px;" for="inputError" class="control-label">Image</label>
                                                          <div style="margin: 0 0 0px 120px; " class="controls">
                                                            <div id="my-awesome-dropzone" style="width: 48%;"class="dropzone">
							       UPLOAD IMAGE CLICK HERE
                                                            </div>
                                                            <input type="hidden" name="images_id[]" id="images_id" value="">
                                                            <!--<input type="file" onchange="change_picture(this.value,<?php // echo $get_color_code[0]['id'];?>)" name="image[]" id="image_<?php echo $get_color_code[0]['id'];?>"/>-->
                                                             <!--<input type="hidden" name="color_id[]" id="color_id" value="<?php echo $get_color_code[0]['id'];?>">-->
                                                            </div><br>
                                                  
                                                      <input type="hidden" id="color_ids" name="color_ids" value="<?php echo $get_color_code[0]['id'];?>"
                                                   <input type="hidden" id="images_id" name="images_id" value="">
							
                                                 <?php
						
						 $get_img = $this->model_product->get_image($product_id,$color_id);
					  
						 foreach($get_img as $img)
						 {
						 ?>
					
					<div id="del_<?php echo $img['id'];?>">
					  <img src="<?php echo base_url();?>images/uploads/long_thumb/<?php echo $img['image']; ?>"/><br>
					  <span id="show" style="cursor:pointer;color: green;" onclick="show_img('<?php echo $img['image'];?>')">SHOW FULL IMAGE |</span>
					 <!-- <a href="<?php echo site_url('product/image_big_show/'.$img['image'].'/'.$img['product_id']);?>">VIEW FULL IMAGE</a> ||-->
					  <!--<a href="<?php // echo site_url('product/delete_image/'.$img['id'].'/'.$img['product_id']);?>">DELETE</a>-->
					  <span id="delete" name="delete" style="cursor:pointer;color: red;" onclick="delete_image(<?php echo $img['id'];?>)">| DELETE</span>
					</div>	 <?php
						 }
						 ?>
				</div>
                                                    <div class="span11 field-box actions" style="margin-top: 20px;">
								<!--<input type="submit" value="Submit & Next" class="btn-glow primary" id="createUser">-->
								<!--<span>OR</span>-->
								<a class="btn-flat new-product" href="<?php echo site_url('product/product_image_add/'.$this->uri->segment(3)); ?>">BACK</a>
							 </div>
						  </form>
				</div>
                                       </div>
                                </div>
                            