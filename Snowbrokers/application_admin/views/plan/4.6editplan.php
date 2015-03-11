<?php
$this->load->view('includes/header');
$dataone_fetch = $this->modelplan->getDataStatic_page($this->input->post('ListingUserid'));
?>
<script type="text/javascript">
 function cheakfree()
 {
   var show=$("#plantype").val();
  if (show == 1) {
$("#divtoshow").hide();
    }
   if (show == 2) {
$("#divtoshow").show();
   }
 }
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Plan Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit plan</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('plan/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('plan/edit_plan');?>" name="new_static_page" id="new_static_page" method="post" autocomplete="off">
							 <input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" /> 
							 <!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Plan Name:</label>
								 <input type="text" name="planname" id="planname" label="planname" class="span9 required">
								
								</div>
								<div id="planname_error" class="error_div" style="color:red;"></div>-->
							
					   <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Plan Name :</label>
							       <input type="text" name="planname" id="planname" label="planname" class="span9 required" value="<?php echo $dataone_fetch[0]->planname;?>">
							       <div id="planname_error" class="error_div" style="color:red;"></div>
							 </div>
					   <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Plan For :</label>
								<div class="ui-select">
								    <select label="planfor" name="planfor" id="planfor" style="width: 130%;">
								           <option value="">Select one</option>
					  <option value="1" <?php if($dataone_fetch[0]->plan_for==1){echo "selected";}else{echo "";}?>>User</option>
					  <option value="2" <?php if($dataone_fetch[0]->plan_for==2){echo "selected";}else{echo "";}?>>Instructor</option>
					  <option value="3" <?php if($dataone_fetch[0]->plan_for==3){echo "selected";}else{echo "";}?>>Company</option>
								    </select>
								</div>
								<div id="planfor_error" class="error_div" style="color:red;"></div>
				         </div>
					   <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Plan Type :</label>
								<div class="ui-select">
								    <select label="plantype" name="plantype" id="plantype" style="width: 130%;"  onchange="cheakfree();">
								            <option value="">Select one</option>
									   <option value="1" <?php if($dataone_fetch[0]->plan_type==1){echo "selected";}else{echo "";}?>>Free</option>
									   <option value="2" <?php if($dataone_fetch[0]->plan_type==2){echo "selected";}else{echo "";}?>>payable</option>
									    
								    </select>
								</div>
								<div id="plantype_error" class="error_div" style="color:red;"></div>
				         </div>
							 <div id="divtoshow" <?php if($dataone_fetch[0]->plan_type==2){?> style="display: block;" <?php }?>style="display: none;">
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>price :</label>
							       <input type="text" name="price" id="price" label="Price" class="span9 required" value="<?php echo $dataone_fetch[0]->price;?>">(In $)
							       <div id="price_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Time period :</label>
						 <input type="text" name="time_period" id="time_period" label="Time period" class="span9" value="<?php echo $dataone_fetch[0]->time_period;?>"><br/>days(30 days)(year 365 days)
							       <div id="time_period_error" class="error_div" style="color:red;"></div>
							 </div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>features :</label>
								<textarea class="span9" label="Plan Details" name="planfeatures" id="planfeatures"><?php echo $dataone_fetch[0]->planfeatures;?></textarea>
								<div id="details_error" class="error_div" style="color:red;"></div>
							 </div>
                                                          <?php
                                                          //echo $dataone_fetch[0]->id;
                                                            $features = $this->modelplan->getfeatures($dataone_fetch[0]->id);
                                                            //print_r($features);
                                                            ?>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                                                        <label>Plan Features:</label>
                                                                        <?php if(count($features)>0)
                                                                                foreach($features as $rows):
                                                                                ?>
                                                                       <div name="fea" id="fea<?php echo $rows->id; ?>">
                                                                       <textarea class="span5" name="features[]" id="features<?php echo $rows->id; ?>" style="width: 50%;"><?php echo $rows->features; ?></textarea><strong><a href="javascript:void(0)" class="deletefeatures" onclick="delete_features(<?php echo $rows->id; ?>)" style="color:red" id="delete_features"> -Delete</a></strong>
                                                                         <input type="hidden" name="fid[]" id="fid" value="<?php echo $rows->id; ?>">
                                                                         </div>
                                                                        <div id="fea_error" style="color:red;"></div>
                                                                       
                                                                        <?php endforeach;?>
                                                                    </div>
							  <div id="addimageportion"> <div ></div></div>
							<div class="span12 field-box" id="url_add_more"><a href="javascript:void(0)" onclick="add_multi_row()">Add More Features</a></div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Create Plan" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('plan/index'); ?>">Cancel</a>
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
       var auto_val=1;
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
			if (document.getElementById('planfor').value=="")
			 {
			    document.getElementById('planfor_error').innerHTML="Plan For is required";
			    has_error++;
			    //return false;
			 }
			 if (document.getElementById('plantype').value=="")
			 {
			    document.getElementById('plantype_error').innerHTML="Plan Type is required";
			    has_error++;
			    //return false;
			 }
                        if (document.getElementById('planfeatures').value=="")
			 {
			    document.getElementById('planfeatures_error').innerHTML="Feature is required";
			    has_error++;
			    //return false;
			 }
		     
			 if (has_error==0) {
				$('#new_static_page').submit();
			 }
			 else
			 return false;
		  });
	   });
    </script>
    <script>

                                //CKEDITOR.replace('description');
				//CKEDITOR.resize( '100%', '100%' );
//				CKEDITOR.replace( 'details',
//    {
//       
//        height: 250,
//        width: 600
//    });
       function deleteMultiRowYoutube(this_id)
        {
		

                $('#additional_div_id'+this_id).remove();
                //alert(count_div);
		auto_val--;
		 document.getElementById("image_val").value =auto_val;
        }
	function add_multi_row(any)
	{
           
	 
		var table_id_val = 'additional_div_id'+auto_val;
               
               var function_id = 'add_state'+auto_val;
               
    
               //var innerHTML=  '<div id='+table_id_val+' class="span12 field-box"><label class="span3">Features</label><div class="input3"><input type="text"  class="span6" name="features[]"  autocomplete="off" id="features'+auto_val+'" label="Features"  /><a href="JavaScript:void(0);" class="delete_pack" onclick="deleteMultiRowYoutube('+auto_val+');" >Delete </a><div id="features_error"></div></div>';
               
       var innerHTML=  '<div id='+table_id_val+' class="span12 field-box"><label class="span3">Features</label><div class="input3"><textarea class="span6" label="features" name="features[]" id="features'+auto_val+'"></textarea><a href="JavaScript:void(0);" class="delete_pack" onclick="deleteMultiRowYoutube('+auto_val+');" >Delete </a><div id="features_error"></div></div>';
               $('#addimageportion').append(innerHTML);
		auto_val++;	    
	      document.getElementById("image_val").value =auto_val;
               

	}			

 function delete_features(featuresid)
{
$.ajax({
       url: "<?php echo base_url(); ?>index.php/plan/del_features",
       data: {featuresid:featuresid},
       success: function(msg) {

			  
			      $('#fea'+featuresid).fadeOut(160);
			   
			    
	      }
       });

}       
        
        
        
        
                     </script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>