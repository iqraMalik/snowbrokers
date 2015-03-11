<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jscolor.js"></script>
<link href="<?php echo base_url();?>admin/dropzone/css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url();?>admin/dropzone/dropzone.min.js"></script>
<!-- content -->
<section class="content-area">
    <!--   This is for after login header menu bar start -->

    <?php //echo $this->load->view('header/menu_bar'); ?>

    <!--   This is for after login header menu bar end -->
    <?php
       // print_r($product_basic_details);
        $product_size = $this->modelhome->get_ProductSize($product_basic_details->product_type_id,$product_basic_details->product_cat_id);
        $product_colors = $this->modelhome->get_ProductColors($product_basic_details->product_type_id,$product_basic_details->product_cat_id);
        $all_images = $this->modelhome->get_allImages($product_basic_details->id);
        $all_product_related_details = $this->modelhome->get_allproduct_PreviousDetails($product_basic_details->id);
          $get_product_details_nw = $this->site_settingsmodel->get_allProduct_Details($this->uri->segment(3));
    ?>
    <div class="container">
        <div class="shipping-content clearfix">
            <div class="form-hedding">
                    <h2>Advanced Details</h2>
            </div>
            <div class="besic-form-row basic_row">
                <!-- Added by SD on 09-01-2015 start -->
                <form action="<?php echo site_url('admin_product/advance_features_post');?>" name="adva_add" id="adva_add" method="post" onsubmit="return check_Form_Advance();">
                    <div class="col-md-8">
                            <div class="post-address besic-form">
                                <label>Product Color<span class="star-color">*</span></label>
                                <div class="post-address-cell" id="color" style="color: black;">
                                    <input type="hidden" name="product_id" value="<?php echo $this->uri->segment(3); ?>">
                                    <input type="hidden" name="product_type_ad" id="product_type_ad" value="<?php echo $product_basic_details->product_type_id; ?>" />
                                    <input type="hidden" name="product_category_ad" id="product_category_ad" value="<?php echo $product_basic_details->product_cat_id; ?>" />
                                    <input type="text" class="requireded color" name="color_text" id="color_text" label="Product color" placeholder="">
                                    <span class="star-color error_div" id="color_text_error"></span>
                                    <button onclick="add_more_size();" type="button">+ Add Sizes</button> (If you want to add more sizes for this color click in this button)
                                </div>	
                            </div>
                            <div class="post-address besic-form">
                                <label>Product Quantity<span class="star-color">*</span></label>
                                <div class="post-address-cell" id="color" style="color: black;">                                    
                                    <input type="number" class="required" name="qty_color" id="qty_color" value="0" />
                                    <span class="star-color error_div" id="color_text_error"></span>
                                </div>	
                            </div>
                    </div>
                    <div id="more_news_title"></div>
                    <div class="upload_image">
                            <label>Upload Image:</label>
                            <input type="hidden" name="random_un" id="random_num" value="<?php echo sprintf("%0d", mt_rand(1, 999)).$this->session->userdata('id');?>">
                            <div>
                              
                                    <div id="my-awesome-dropzone" style="width: 100%;"class="dropzone">
                               <label style ="color:black;margin: 25px;"> Please ensure to upload correct images as this cannot be adjusted later</label>
                               <label style ="color:red;margin: 60px;">Click Here to Upload Image</label>
                                    </div>
                                    <!--<div id="my-awesome-dropzone" class="dropzone"></div>-->
                                    <input type="hidden" name="images_id[]" id="images_id" value="">
                            </div>
                    </div>
                    <input class="submit_cont" type="submit" value="Submit" name="Submit" id="submit" /><br>
                </form>
<!--<div style="color:black;margin-left: 70%;font-size: larger;"><a href="<?php echo base_url();?>admin/index.php/product">Click here to see the listing of your products</a></div>-->
    <!-- Here to put all start -->
    <!-- Here to put all end -->
        <div class="advance-feture upload">
        <?php
        //print_r($get_product_details_nw);
        if(!empty($get_product_details_nw))
        {
            foreach($get_product_details_nw as $value)
            {
                $color =  $this->site_settingsmodel->get_color($value->color_id);
        ?>
            <div class="choose_color">
                <span>Color</span><span class="color_boxn" style="background: <?php echo $color; ?>;"></span>
                <input type="text" id="colorcode_<?php echo $value->color_id;?>" class="color" readonly value="<?php echo $color;?>"/>
                <img class="apply_color" style="height: 20px;" id="colorcode_<?php echo $product_basic_details->product_type_id;?>_<?php echo $product_basic_details->product_cat_id;?>_<?php echo $value->color_id;?>" src="<?php echo base_url();?>images/apply.png" />
            </div>
        <?php
            $get_size_nw = $this->site_settingsmodel->get_allProduct_Details_total($this->uri->segment(3),$value->color_id);
           
            if(!empty($get_size_nw))
            {
                foreach($get_size_nw as $value_id)
                {
            ?>
            <div class="details_pros">
                <div class="avalable_pro">
                   <!-- <span class="size_cell">-->
                    <?php 
                        if($this->site_settingsmodel->get_size($value_id->product_related_size_id))
                       {
                         $sizetoshow = $this->site_settingsmodel->get_size($value_id->product_related_size_id);
                       }
                       else{
                         $sizetoshow = "N/A";
                       }
                    ?>
                    <input type="text" id="sizeEdit_<?php echo $value_id->product_related_size_id;?>" name="sizeEdit" class="size_cell" value="<?php echo $sizetoshow;?>"/>
                    <img class="apply_size" style="height: 20px;" id="sizeEditbtn_<?php echo $product_basic_details->product_type_id;?>_<?php echo $product_basic_details->product_cat_id;?>_<?php echo $value_id->product_related_size_id;?>" src="<?php echo base_url();?>images/apply.png" />
                        <!--</span>-->
                    <span class="quanity_head">Quantity:</span>
                    <span class="quanity_ammount"><?php echo $value_id->quantity;?></span>
                    <span class="add_quantitys" style="display: none;" id="put_<?php echo $value_id->id;?>">
                        <span class="quanity_input" ><input id="quntity_<?php echo $this->uri->segment(3); ?>_<?php echo $value->color_id; ?>_<?php echo $value_id->product_related_size_id; ?>" type="number"/>
                            <img class="apply_quantity" style="height: 20px;"id="qeapply_<?php echo $this->uri->segment(3); ?>_<?php echo $value->color_id; ?>_<?php echo $value_id->product_related_size_id; ?>" src="<?php echo base_url();?>images/apply.png" />
                        </span>
                    </span>
                    <span class="quanity_input" id="ediet_<?php echo $value_id->id;?>"  onclick="show_ediet(this.id)"><a href="javascript: void(0);">Edit quantity</a></span>
                    
                </div>
            </div>
            <?php
                }
            }
            else
            {
            ?>
            <div class="choose_color">
                <span>Color</span><span class="color_boxn" style="background: <?php echo $color; ?>;"></span><span>Quantity</span><span class="quanity_ammount"><?php echo $value->quantity;?></span>
            </div>
            <?php
            }
       $get_color_status = $this->modelhome->getColorStatusImages($this->uri->segment(3),$value->color_id);
      
        if($get_color_status=='0')
        {
            ?>
             <div class="pros_img">
            <p>No image uploaded for this color.</p>
             </div>
   <?php
   }
   else
   {
      
    ?>
    <div class="pros_img">
<?php
    foreach($get_color_status as $imgvalue)
       {
        ?>
                <div class="pro_inner_img" id="remove_imge_<?php echo $imgvalue->id;?>">
              
                    <img id="img_<?php echo $imgvalue->id; ?>" src="<?php echo base_url();?>admin/images/uploads/short_thumb/<?php echo $imgvalue->image; ?>" /><img class="remove_imge" id="remove_<?php echo $imgvalue->id; ?>" src="<?php echo base_url();?>images/list_remove112.png" />
                 
                </div>
            <?php
              }
              ?>
            </div>
            <?php
     
   }
            }
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
<?php
$show_result = $this->modelhome->get_needHelpPagecontent();
?>
<div class="modal fade registerModal" id="needHelpsection" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $show_result['subject']; ?></h4>
            </div>
            <div class="modal-body clearfix">
                    <div class="tab-pane">
                        <div>
                            <?php echo $show_result['content']; ?>
                        </div>
                        <div class="modal-btn">
                                <button type="submit" class="btn btn-primary pull-right" data-dismiss="modal">
                                    Cancel
                                </button>
                        </div>
                    </div>
            </div>
      	</div>
    </div>
</div>
<script type="text/javascript">
function show_ediet(id)
{
   
 $("#"+id).css({'display': 'none'});
 id=id.replace("ediet_","put_");
 $("#"+id).css({'display': 'inline-block'});
}
$(document).ready(function() {
                $(".apply_quantity").click(function () {
                   
            var update_qty = $(this).attr("id");
            var update_qty_array = update_qty.split('_');
            id=update_qty.replace("qeapply_","quntity_");
          
            var quinty=$('#'+id).val();
            if(quinty.search(/\S/)!=-1 && quinty>0)
            {
                
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin_product/add_new_quintity",
                    data: {
                            product_id: update_qty,quinty: quinty
                    },
                    type: "post",
                    success: function(response) {
                      
                        if (response==1)
                        {
                            
                         //  id=id.replace("quntity_","ediet_");
                         //  $("#"+id).css({'display': 'none'});
                         //  id=id.replace("ediet_","put_");
                         //$("#"+id).css({'display': 'block'});
                           window.location.reload(true);
                        }
                    }
                });
            }
            else
            {
                alert('Please enter the quantity');
            }
           
        });
           $('.apply_size').click(function(){
            var totalId = $(this).attr('id');
            var PertId = totalId.split('_');
            
            var current_sizeVal = $('#sizeEdit_'+PertId[3]).val();
             if(current_sizeVal.search(/\S/)==-1)
             {
                alert('Please enter the Size');
             }
             else
             {
                 $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin_product/Edit_new_size",
                    data: {
                            product_size_Id: totalId,current_sizeVal: current_sizeVal
                    },
                    type: "post",
                    success: function(response) {
                    
                        if (response==1)
                        {
                           window.location.reload(true);
                        }
                    }
                });
             }
            })     
            $('.apply_color').click(function(){
            var totalCId = $(this).attr('id');
            var PertCId = totalCId.split('_');
           
            var current_colorVal = $('#colorcode_'+PertCId[3]).val();
           
             if(current_colorVal.search(/\S/)==-1)
             {
                alert('Please enter the Color');
             }
             else
             {
                 $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin_product/Edit_new_color",
                    data: {
                            product_size_Id: totalCId,current_colorVal: current_colorVal
                    },
                    type: "post",
                    success: function(response) {
                     //alert(response);
                        if (response==1)
                        {
                           window.location.reload(true);
                        }
                    }
                });
             }
            })        

        $(".remove_imge").click(function() {
            var id = $(this).attr("id");
            var image_id_array = id.split("_");
            var image_id = image_id_array[1];
            var r = confirm("Are you sure to delete this image?");
            if (r==true) {
                $.ajax({
		    url: "<?php echo base_url(); ?>index.php/admin_product/delete_Image",
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
            url: "<?php echo base_url()?>"+"index.php/admin_product/add_dropzone_pic/"+$("#random_num").val()+"/"+$("#product_id").val()+"/"+$("#product_type").val()+"/"+$("#product_category").val(),
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
                                $.post("<?php echo site_url('admin_product/delete_dropzone_pic');?>/"+file.serverId); // Send the file id along
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
    
    var auto_val=1;
	function add_more_size()
	{
        
	 var table_id_val = 'additional_size'+auto_val;
	    var innerHTML = '<div id='+table_id_val+'><input type="hidden" name="field_value[]" value="'+auto_val+'" /><div class="col-md-12"><div class="post-address besic-form"><label>Size </label><div class="post-address-cell"><input type="text" class="requireded" name="size_text[]" id="size_text'+auto_val+'" label="Size" placeholder="Add Size Here" style="width : 60%;"><input type="number" class="requireded" name="size_qty[]" id="size_qty'+auto_val+'" label="Quantity" placeholder="Add Quantity Here" style="width : 20%;"><a href="JavaScript:void(0);" onclick="deleteExtraNews('+auto_val+');" title="Delete"><img src="<?php echo base_url()?>admin/images/inactive.png" alt="DELETE" /></a><br><span class="star-color error_div" id="size_text'+auto_val+'_error"><span class="star-color error_div" id="size_qty'+auto_val+'_error"></span></div></div></div>';
	    
	    $('#more_news_title').append(innerHTML);
        if($("#more_news_title").children("div").length > 0)
        {
            $('#qty_color').hide();
            $('#qty_color').val(0);
        }
        else
        {
            $('#qty_color').show();
            $('#qty_color').val(0);
        } 
	     auto_val++;
	}
function deleteExtraNews(val)
	{
        
	    $('#additional_size'+val).remove();
        if($("#more_news_title").children("div").length > 0)
        {
            $('#qty_color').hide();
            $('#qty_color').val(0);
        }
        else
        {
            $('#qty_color').show();
            $('#qty_color').val(0);
        } 
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
        
 function check_Form_Advance()
     {
	
	$('.error_div').html('');
	
	var element_id,element_value,element_label,error_div,element_validation_type;
	var required_elements = $('.requireded');
	var has_error = 0;
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
	       
	});
	
	//alert(has_error);
		if (has_error==0)
		{
		    ////alert(has_error);
		    return true;
		    //$("#basic_details").submit();
		}
		else
		{
		    return false;
		}
}

        
</script>