<link href="<?php echo base_url();?>admin/dropzone/css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url();?>admin/dropzone/dropzone.min.js"></script>
<!-- content -->
<section class="content-area">
    <!--   This is for after login header menu bar start -->

    <?php echo $this->load->view('header/menu_bar'); ?>

    <!--   This is for after login header menu bar end -->
    <?php
       // print_r($product_basic_details);
        $product_size = $this->modelhome->get_ProductSize($product_basic_details->product_type_id,$product_basic_details->product_cat_id);
        $product_colors = $this->modelhome->get_ProductColors($product_basic_details->product_type_id,$product_basic_details->product_cat_id);
        $all_images = $this->modelhome->get_allImages($product_basic_details->id);
        $all_product_related_details = $this->modelhome->get_allproduct_PreviousDetails($product_basic_details->id);
    ?>
    <div class="container">
        <div class="shipping-content clearfix">
            <div class="form-hedding">
                    <h2>Basic Details</h2>
            </div>
            <div class="row besic-form-row">
                    <div class="col-md-6">
                            <div class="post-address besic-form details-show">
                                <label>Product Title </label>
                                <div class="post-address-cell">
                                    <?php echo $product_basic_details->title; ?>    
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="post-address besic-form details-show">
                                <label>Product Tag </label>
                                <div class="post-address-cell">
                                    <?php echo $product_basic_details->product_tag; ?>    
                                </div>
                            </div>
                    </div>
                    <!--<div class="col-md-6">
                            <div class="post-address besic-form details-show">
                                <label>Product Type </label>
                                <div class="post-address-cell">
                                    <?php
                                    //$produ$this->modelhome->get_ProductTypes($product_basic_details->product_type_id);
                                    //echo $product_basic_details->product_tag;
                                    ?>    
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="post-address besic-form details-show">
                                <label>Product Category </label>
                                <div class="post-address-cell">
                                    <?php //echo $product_basic_details->product_tag; ?>    
                                </div>
                            </div>
                    </div>-->
            </div>
            <div class="form-hedding">
                    <h2>Add Advance Feature</h2>
            </div>
            <?php
            if($product_size!='0' || $product_colors!='0')
            {
            ?>
            <div class="advance-feture">
                    <div class="product-size">
                        <input type="hidden" name="random_num" id="random_num" value="<?php echo sprintf("%0d", mt_rand(1, 999)).$this->session->userdata('id');?>">
                        <input type="hidden" name="sizes_status" id="sizes_status" value="<?php echo (($product_size!='0')?"1":"0"); ?>">
                        <input type="hidden" name="colors_status" id="colors_status" value="<?php echo (($product_colors!='0')?"1":"0"); ?>">
                        <input type="hidden" name="hidden_sizes" id="hidden_sizes" value="0">
                        <input type="hidden" name="hidden_colors" id="hidden_colors" value="0">
                        <?php
                        if($product_size!='0')
                        {
                        ?>
                            
                            <div class="product-box">
                                    <div class="clearfix">
                                            <h3 class="pull-left">SELECT SIZE : </h3>
                                            <a class="pull-right select-size" href="javbascript:void(0)">SIZE CHART</a>
                                    </div>
                                    <ul class="size-box clearfix">
                                        <?php
                                        foreach($product_size as $value)
                                        {
                                        ?>
                                        <li class="size_value" id="size_<?php echo $value->id;?>">
                                            <a href="javascript:void(0)" <?php echo (($product_colors=='0')?'data-toggle="modal" data-target="#imgUploadModal"':'');?>><?php echo $value->size_type; ?></a>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="clearfix">
                                            <div class="pull-left details-show" id="size_msg"></div>
                                    </div>
                                    <?php
                                    if($product_colors=='0')
                                    {
                                    ?>
                                    <div class="number-of-stock">
                                            <input type="text" class="qty_value" name="qty" id="qty" value="5" />
                                            <p>In stock</p>
                                    </div>
                                    <?php
                                    }
                                    ?>
                            </div>
                        <?php
                        } 
                        if($product_colors!='0')
                        {
                            $clearfix = '';
                            if($product_size!='0')
                            {
                                $clearfix = 'clearfix';
                            }
                        ?>
                            
                            <div class="product-box <?php echo $clearfix; ?>">
                                    <div class="select-color">
                                            <h3>SELECT COLOR : </h3>
                                            <div class="select-color">
                                                    <ul class="select--product-color">
                                                    <?php
                                                    //print_r($product_size);
                                                    foreach($product_colors as $value)
                                                    {
                                                    ?>
                                                        <li class="color_value" id="color_<?php echo $value->id; ?>" style="background-color: <?php echo $value->color_code;?>;">
                                                                <a href="javascript:void(0)"></a>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                    </ul>
                                            </div>
                                    </div>
                                    <div class="number-of-stock">
                                            <input type="text" class="qty_value" name="qty" id="qty" value="5" />
                                            <p>In stock</p>
                                    </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
            </div>
            <?php
            }
            ?>
            <div class="advance-feture upload">
            <?php
            if($product_size=='0' && $product_colors=='0')
            {
            ?>
            <div class="browse-loop clearfix">
                    <form class="bg-form clearfix" action ="<?php echo site_url('shipping_details/insert_advancedetails');?>" name="advance_detailsform" id="advance_detailsform" method="post"  >
                        <input type="hidden" name="allproduct_sizes" id="allproduct_sizes" value="0">
                        <input type="hidden" name="allproduct_colors" id="allproduct_colors" value="0">
                        <div class="product-box">
                            <div class="number-of-stock">
                                <input type="text" name="product_qty" class="qty_value" id="product_qty" value="5" />
                                <p>In stock</p>
                            </div>
                        </div>
                        <!--<input type="text" name="product_qty" id="product_qty" value="0">-->
                        <input type="hidden" name="random_un" id="random_num" value="<?php echo sprintf("%0d", mt_rand(1, 999)).$this->session->userdata('id');?>">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_basic_details->id; ?>">
                        <input type="hidden" name="product_type" id="product_type" value="<?php echo $product_basic_details->product_type_id; ?>">
                        <input type="hidden" name="product_category" id="product_category" value="<?php echo $product_basic_details->product_cat_id; ?>">
                        <div class="">
                                <p>Upload Your Product image Here (Click or Drag your images)</p>
                                <div>
                                        <div id="my-awesome-dropzone" style="width: 80%;"class="dropzone">
                                        </div>
                                        <!--<div id="my-awesome-dropzone" class="dropzone"></div>-->
                                        <input type="hidden" name="images_id[]" id="images_id" value="">
                                </div>
                        </div>
                        <br>
                        <div class="modal-btn">
                                <button type="submit" class="btn btn-primary pull-left">
                                    Save    
                                </button>
                                <button type="submit" class="btn btn-primary pull-right" data-dismiss="modal">
                                    Cancel
                                </button>
                        </div>
                    </form>
            </div>
                    <!--<div class="browse-loop clearfix">
                            <p>Upload Your Product image Here (Click or Drag your images)</p>
                            <div class="browse-btn">
                                    <div id="my-awesome-dropzone" style="width: 80%;"class="dropzone">
						
                                    </div>
                            </div>
                    </div>-->
            <?php
            }
            ?>
            <?php
            if($product_size!='0'){
            ?>
                <div class="product-box">
                    <div class="clearfix">
                        <h3 class="pull-left">SELECTED SIZES : </h3>
                    </div>
                    <ul class="size-box clearfix">
                        <?php
                        foreach($product_size as $value)
                        {
                            $text_decoration = '';
                            $get_size_status = $this->modelhome->getSizeStatus($product_basic_details->id,$value->id);
                            if($get_size_status=='0')
                            {
                                $text_decoration = 'text-decoration : line-through;';
                            }
                        ?>
                        <li class="size_value_bottom" id="size_<?php echo $value->id;?>">
                            <a href="javascript:void(0)" style="<?php echo $text_decoration; ?>"><?php echo $value->size_type; ?></a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            <?php
            }
            if($product_colors!='0')
            {
                foreach($product_colors as $value)
                {
            ?>
                <div class="browse-loop clearfix">
                    <p>Color : <span class="color_img" id="color_<?php echo $value->id; ?>" style="height: 100px;width: 100px;background-color: <?php echo $value->color_code;?>;"></span></p>
            <?php
                    $get_color_status = $this->modelhome->getColorStatusImages($product_basic_details->id,$value->id);
                    if($get_color_status=='0')
                    {
            ?>
                        <p>No image uploaded for this color.</p>
            <?php
                    }
                    else
                    {
                        echo "<p>";
                        foreach($get_color_status as $imgvalue)
                        {
                        ?>
                        <span id="remove_imge_<?php echo $imgvalue->id;?>">
                        <img id="img_<?php echo $imgvalue->id; ?>" src="<?php echo base_url();?>admin/images/uploads/short_thumb/<?php echo $imgvalue->image; ?>" /><img class="remove_imge" id="remove_<?php echo $imgvalue->id; ?>" src="<?php echo base_url();?>images/list_remove112.png" />
                        </span>
                        <?php
                        }
                        echo "</p>";
                    }
                }
                
            }
            ?>
            <?php
            if($product_colors=='0')
            {
            ?>
                <div class="browse-loop clearfix">
                    <?php
                   // print_r($all_images);
                    if($all_images!='0')
                    {
                        foreach($all_images as $value)
                        {
                    ?>
                    <span id="remove_imge_<?php echo $value->id;?>">
                    <img src="<?php echo base_url();?>admin/images/uploads/short_thumb/<?php echo $value->image; ?>" /><img class="remove_imge" id="remove_<?php echo $value->id; ?>" src="<?php echo base_url();?>images/list_remove112.png" />
                    </span>
                    <?php
                        }
                    }
            ?>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</section>
<!--  content end  -->
<!--End of image upload popup section for products -->
<div class="modal fade registerModal" id="imgUploadModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Upload your product image</h4>
            </div>
            <div class="modal-body clearfix">
                    <div class="tab-pane" id="profile">
                        
                        <form class="bg-form clearfix" action ="<?php echo site_url('shipping_details/insert_advancedetails');?>" name="advance_detailsform" id="advance_detailsform" method="post"  >
                            <input type="hidden" name="allproduct_sizes" id="allproduct_sizes" value="0">
                            <input type="hidden" name="allproduct_colors" id="allproduct_colors" value="0">
                            <input type="hidden" name="product_qty" id="product_qty" value="0">
                            <input type="hidden" name="random_un" id="random_un" value="0">
                            <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_basic_details->id; ?>">
                            <input type="hidden" name="product_type" id="product_type" value="<?php echo $product_basic_details->product_type_id; ?>">
                            <input type="hidden" name="product_category" id="product_category" value="<?php echo $product_basic_details->product_cat_id; ?>">
                            <div class="">
                                    <label>Upload Image:</label>
                                    <div>
                                        CLICK OR DRAG AND DROP YOUR IMAGE
                                            <div id="my-awesome-dropzone" style="width: 80%;"class="dropzone">
						
                                            </div>
                                            <!--<div id="my-awesome-dropzone" class="dropzone"></div>-->
                                            <input type="hidden" name="images_id[]" id="images_id" value="">
                                    </div>
                            </div>
                            <br>
                            <div class="modal-btn">
                                    <button type="submit" class="btn btn-primary pull-left">
                                        Save    
                                    </button>
                                    <button type="submit" class="btn btn-primary pull-right" data-dismiss="modal">
                                            Cancel
                                    </button>
                            </div>
                        </form>
                    </div>
            </div>
      	</div>
    </div>
</div>
<!-- End of image upload section -->
<script type="text/javascript">
    $( document ).ready(function() {
        $(".remove_imge").click(function() {
            var id = $(this).attr("id");
            var image_id_array = id.split("_");
            var image_id = image_id_array[1];
            var r = confirm("Are you sure to delete this image?");
            if (r==true) {
                $.ajax({
		    url: "<?php echo base_url(); ?>index.php/shipping_details/delete_Image",
		    data: {
			image_id:image_id
		    },
		    success: function(response) {
                        //alert(response);
			//var ans = response.split('@@');
                        if (response==1)
                        {
                            $('#remove_imge_'+image_id).remove();
                        }
		    }
                });
            }
            
        });
        $( ".size_value" ).click(function() {
            var id = $(this).attr("id");
            var className = $("#"+id).attr("class");
            if (className == "size_value active") {
                $("#"+id).removeClass( "size_value active" ).addClass( "size_value" );
                setSizeValue('remove',id);
            }
            if (className == "size_value") {
                $("#"+id).removeClass( "size_value" ).addClass( "size_value active" );
                setSizeValue('add',id);
            }
            var colors_status = $("#colors_status").val();
            var selected_size = $("#hidden_sizes").val();
            var selected_color = $("#hidden_colors").val();
            var randomnum = $("#random_num").val();
            var qty = $("#qty").val();
            if (colors_status=="0") {
                $("#random_un").val(randomnum);
                $("#allproduct_sizes").val(selected_size);
                $("#product_qty").val(qty);
            }
            if (selected_size=="0")
            {
                $("#size_msg").html("Choose atleast one size.");
            }
            if (selected_size!="0")
            {
                if (selected_color=='0') {
                    $("#size_msg").html("Choose color (You can select multiple sizes).");
                }
                else
                {
                    $("#size_msg").html("Choose color (You can select multiple sizes).");
                }
            }
            
        });
        $( ".color_value" ).click(function() {
            var id = $(this).attr("id");
            $(".color_value").removeClass( "color_value active" ).addClass( "color_value" );
            $("#"+id).removeClass( "color_value" ).addClass( "color_value active" );
            
            var color_id = id.split("_");
            $("#hidden_colors").val(color_id[1]);
            
            var sizes_status = $("#sizes_status").val();
            var selected_size = $("#hidden_sizes").val();
            var selected_color = $("#hidden_colors").val();
            var randomnum = $("#random_num").val();
            var qty = $("#qty").val();
            //alert(selected_size);
            //alert(sizes_status);
            if (selected_size=="0" && sizes_status=="1")
            {
                $("#size_msg").html("Choose atleast one size.");
            }
            else
            {
                $("#allproduct_sizes").val(selected_size);
                $("#allproduct_colors").val(selected_color);
                $("#product_qty").val(qty);
                $("#random_un").val(randomnum);
                $("#imgUploadModal").modal('show');
            }
            
        });
        
        var image_id = '';
        var images_id = [];
        //var myDropzone = new Dropzone("#test",{
        //    url: "<?php echo base_url()?>"+"index.php/shipping_details/add_dropzone_pic/",
        //    addRemoveLinks: true,
        //    acceptedFiles: 'image/*',
        //    maxFilesize: 10,
        //    maxFiles: 15,
        //    //uploadMultiple: false,
        //    parallelUploads: 100,
        //    createImageThumbnails: true,
        //    paramName: "file",
        //    autoProcessQueue: false
        //});
        //var submitButton = document.querySelector("#newAlbum");
        //submitButton.addEventListener("click", function() {
        //
        //    myDropzone.on("sending", function(file, xhr, formData) {
        //        formData.append("allproduct_sizes", $("input[name=allproduct_sizes]").val());
        //        formData.append("allproduct_colors", $("input[name=allproduct_colors]").val());
        //        formData.append("product_qty", $("input[name=product_qty]").val());
        //        formData.append("product_id", $("input[name=product_id]").val());
        //    });
        //    myDropzone.processQueue(); // Tell Dropzone to process all queued files.
        //    alert('show this to have time to upload');
        //});
        Dropzone.options.myAwesomeDropzone = {
            //headers: { "size": "$('#allproduct_sizes').val();","color": "$('#allproduct_colors').val();" },
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 10, // MB
            maxFiles: 15,   // Maximum number of images
            url: "<?php echo base_url()?>"+"index.php/shipping_details/add_dropzone_pic/"+$("#random_num").val()+"/"+$("#product_id").val()+"/"+$("#product_type").val()+"/"+$("#product_category").val(),
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            init: function() {
                        this.on("success", function(file, response) {
                            //alert(response);
                           file.serverId = response; // If you just return the ID when storing the file
                           image_id += file.serverId+",";
                           $("#images_id").val(image_id);
                           //alert(file.serverId);
                        });
              
                        this.on("removedfile", function(file) {
                            if (!file.serverId) { return; } // The file hasn't been uploaded
                            else {
                                //alert(file.serverId);
                                 //alert(image_id);
                                 //image_ids[] = image_id.split(",");
                                 //alert(image_ids[]);
                                 // image_ids = image_ids.remove(file.serverId);
                                //image_id = image_ids.toString();
                                // alert(image_id);
                                $.post("<?php echo site_url('shipping_details/delete_dropzone_pic');?>/"+file.serverId); // Send the file id along
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
        $('.qty_value').keyup(function () { 
            this.value = this.value.replace(/[^0-9]/g,'');
        });
    });
    function setSizeValue(status,id)
    {
        var size_id = id.split("_");
        var selected_size = $("#hidden_sizes").val();
        if (status=='add')
        {
            var newSelected_size = selected_size+"_"+size_id[1];
            $("#hidden_sizes").val(newSelected_size);
        }
        if (status=='remove')
        {
            var selectedsize_array = selected_size.split("_");
            selectedsize_array = $.grep(selectedsize_array, function(value) {
                return value != size_id[1];
            });
            var newSelected_size = selectedsize_array.join("_");
            $("#hidden_sizes").val(newSelected_size);
        }
        
    }
        
</script>