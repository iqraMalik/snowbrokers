<?php
$this->load->view('includes/header');
//$dataone_fetch = $this->modeladmin->getDataUser($this->input->post('ListingUserid'));
//print_r($edit_user);
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.css" id="theme_base">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.date.css" id="theme_date">
<script src="<?php echo base_url();?>js/res_datepicker/picker.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.date.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.time.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/main.js"></script>

<script type="text/javascript">
$(document).ready(function () {
   
	$('#updateUser').click(function (e) {
		e.preventDefault();              
		$('.span9').css('border-color','#B2BFC7');
		$('.error_div').html('');
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
				    has_error++;
				}
			 }) 
                        
			 
			
			



 
	      var fileName = document.getElementById("photo").value;
			    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			    var sports1 = document.getElementById("sports1").value;
			



 
			    if (fileName!='')
			    {
			       if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
				  {
				      $('#photo_error').html('');
				  }
				  else{
				      $('#photo_error').html('File type should be jpeg/jpg/png/gif');
				      $('#photo_error').css('border-color','red');
				      $('#photo').focus();
				       has_error++;
	      
				  }
				 
			    }
	 
			if (sports1 =='')
			{
				$('#sports1_error').html('Sports is Required');
	
				has_error++;
			} 
	     
	    
                        
                        if(has_error==0)
                        {
                           
                            $('#edit_user').submit();
                        }
			
		
	});
});


function Select_state(country_id)
{
     $.ajax({
                    url: "<?php echo base_url(); ?>index.php/group/Select_state",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
                      
                           $('#state').html(response);
                            
                           }
                          
                          
                    
                })
}
</script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Sport Center Management</h4>
        </div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>Edit Sport Center ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
					</div>
				</div>
				
				<div class="row-fluid filter-block">
				   <div class="pull-right">
						<a class="btn-flat new-product" href="<?php echo site_url('sportscenter/index'); ?>">< View List</a>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
					<div class="span9 with-sidebar" style="margin-bottom: 30px;">
						<div class="container">
							<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('sportscenter/update_group');?>" name="edit_user" id="edit_user" method="post" autocomplete="off">
						    <input type="hidden" name="userid_hidden" id="userid_hidden" value="<?php echo $edit_user[0]->id;?>">
						    <input type="hidden" name="name_hidden" id="name_hidden" value="<?php echo $edit_user[0]->image ;?>">
						    <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Sports Center Creator:</label>
								<?php $geteventcreator = $this->modelsportscenter->Geteventcreator();?>
								     <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
								    <select class="span9 required"  style="width:130.90%" name="sport_center_creator" id="sport_center_creator" label="Sport Center Creator" >
								    <option value="">Select User</option>
								   <?php                          
									if(count($geteventcreator)>0 || $geteventcreator !=0)
									{
									    foreach($geteventcreator as $key=>$val)
									    {
										if($val->user_type==1)
										{
											$type='User';
										}
										elseif($val->user_type==2)
										{
											$type='Instructor';
										}
										else
										{
											$type='Company';
										}
									?>
									<option value="<?php echo $val->id;?>" <?php if($edit_user[0]->user_id ==$val->id){echo "selected";} ?>><?php echo $val->first_name."&nbsp&nbsp".$val->last_name."&nbsp&nbsp(&nbsp".$type."&nbsp)&nbsp";?></option>
									<?php
									    }
									}
									?>
								</select>
								     </div>
								<div id="sport_center_creator_error" class="error_div" style="color:red;"></div>
								
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Sports Center Name:</label>
								<input type="text" class="span9 required" value="<?php echo $edit_user[0]->sport_ceneter_name;?>" label="Sports Center Name" name="sport_center_name" id="sport_center_name" style="width: 50%;" >					     
								<div id="sport_center_name_error" class="error_div" style="color:red;"></div>
							 </div>								
							
						      
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

								<label>Country</label>
							    <?php $getcountry = $this->modelgoals->GetCountry();?>
							       	<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <select class="span9 required" style="width:130.90%" name="country" id="country" label="Country" onChange="Select_state(this.value)">
							       <option value="">Select Country</option>
							      <?php                          
								   if(count($getcountry)>0 || $getcountry !=0)
								   {
								       foreach($getcountry as $key=>$val)
								       {
								   ?>
								   <option value="<?php echo $val->id;?>" <?php if( $edit_user[0]->country_id==$val->id){echo "selected";} ?>><?php echo $val->country_name;?></option>
								   <?php
								       }
								   }
								   ?>
							   </select>
								</div>
							   <div id="country_error" class="error_div" style="color:red;"></div>
							</div>
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

								<label>State</label>
							    <?php $getstate = $this->modelgoals->GetState($edit_user[0]->country_id);?>
							       	<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <select class="span9 required" style="width:130.90%" name="state" id="state" label="State" >
								    <?php                          
								   if(count($getstate)>0 || $getstate !=0)
								   {
								      if($getstate !=0)
								      {
									   foreach($getstate as $key=>$val)
									   {
								       ?>
								       <option value="<?php echo $val->id;?>" <?php if( $edit_user[0]->state_id==$val->id){echo "selected";} ?>><?php echo $val->state_name;?></option>
								       <?php
									   }
								      }
								      else
								      {
								      ?>
								      		    <option value="0">Not Available</option>

								      <?php
								      }
								   }
								  
								   ?>                     
								</select>
								</div>
							   <div id="state_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Location</label>
							<input type="text"  class="span9 required" name="location" id="location" label="Location" placeholder="Location" value="<?php echo $edit_user[0]->location;?>"/>
							 <div id="location_error" class="error_div" style="color:red;"></div>
							</div>
						      
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

								<label><span style="color: red;">*</span>Sports:</label>
								<?php $SportsyData = $this->modeladmin->GetAllSports();?>
								<div style="margin-left: 30px;margin-bottom: 10px;">
								      <?php
								      $selected_sports = $edit_user[0]->sports;
								      if(strpos($selected_sports,','))
								      {
									     $ss = explode(',',$selected_sports);
								      }
								      else
								      {
									     $ss=$selected_sports;
								      }
								      ?>
							       <select name="sports1[]" multiple id="sports1" style="width:130.90%" label="Sports1">
								    <option value="">Select Sports</option>
								    <?php
								  
								    if(count($SportsyData)>0 || $SportsyData !=0)
								    {
									foreach($SportsyData as $key=>$val)
									{
								    ?>
								    <option value="<?php echo $val->id;?>" <?php if(is_array($ss)){if( in_array($val->id,$ss)){echo "selected";}}else{if($val->id==$ss) { echo "selected";}} ?>><?php echo $val->title;?></option>
								    <?php
									}
								    }
								    ?>
								</select>
								</div>
								<div id="sports1_error" class="error_div" style="color:red;"></div>
							</div>
						  
							   
							   <?php
							   if($edit_user[0]->image !='')
							   {
							   ?> 
						       <div class="span12 field-box" style="padding-bottom: 30px;">
								 <label>Previous Image : </label>
								 <input id="image" type="hidden" name="image" value="1">
								 
								 
								<img src="<?php echo $this->config->item('event_img_url').'sportcenter_images/'.$edit_user[0]->image ;?>" height="300px;" width="300px;"/>
							 
								 
								 <div id="image_error" class="error_div" style="color:red;"></div>
							</div>
						       <?php
						       }
						       ?>
							     
							<div class="span12 field-box">
								<label>Image: </label>
								<input id="image_val" type="hidden" name="image_val" value="1">
								<input type="file" name="photo" value=""  label="image" id="photo"  />
								<div id="photo_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Rating :</label>
								<div class="ui-select">
								    <select class="span9 required" label="Rating" name="rating" id="rating" style="width: 130%;">
								           <option value="">Select Rating</option>
									   <option value="1" <?php if($edit_user[0]->rating=='1') { echo "selected";}?>>1</option>
									   <option value="2" <?php if($edit_user[0]->rating=='2') { echo "selected";}?>>2</option>
									   <option value="3" <?php if($edit_user[0]->rating=='3') { echo "selected";}?>>3</option>
									   <option value="4" <?php if($edit_user[0]->rating=='4') { echo "selected";}?>>4</option>
									   <option value="5" <?php if($edit_user[0]->rating=='5') { echo "selected";}?>>5</option>
								    </select>
								</div>
								<div id="rating_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Cost :</label>
								<div class="ui-select">
								    <select class="span9 required" label="Cost" name="cost" id="cost" style="width: 130%;">
									   <option value="">Select Cost</option>
									   <option value="1" <?php if($edit_user[0]->cost=='1') { echo "selected";}?>>$</option>
									   <option value="2" <?php if($edit_user[0]->cost=='2') { echo "selected";}?>>$$</option>
									   <option value="3" <?php if($edit_user[0]->cost=='3') { echo "selected";}?>>$$$</option>
									   
								    </select>
								</div>
								<div id="cost_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Certifications:</label>
								<input type="text" class="span9 required" value="<?php echo $edit_user[0]->certifications; ?>" label="Certifications" name="certifications" id="certifications" style="width: 50%;" >					     
								<div id="certifications_error" class="error_div" style="color:red;"></div>
							 </div>
						
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
							<label>Status:</label>
							<div class="ui-select">
							    <select name="status" id="status">
								 <option value="1" <?php if($edit_user[0]->status=='1') { echo "selected";}?>>Active</option>
								 <option value="0" <?php if($edit_user[0]->status=='0') { echo "selected";}?>>Inactive</option>
							    </select>
							</div>
							</div>
                                                     
							<div class="span11 field-box actions" style="margin-top: 20px;">
									<input type="button" value="Update User" class="btn-glow primary" id="updateUser">
								         <span>OR</span>
									<a class="btn-flat new-product" href="<?php echo site_url('sportscenter/index'); ?>">Cancel</a>
								</div>
							</div>
						    </form>
					
					</div>
				</div>
				
				
			</div>
		</div>
    </div>
</div>
 

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>