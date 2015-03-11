<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<!--<script type="text/javascript" src="<?php //echo base_url(); ?>ckeditor/ckeditor.js"></script>-->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Sports Center Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add SportsCenter ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('sportscenter/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('sportscenter/insert_sportscenter');?>" name="new_category" id="new_category" method="post" autocomplete="off">
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
									<option value="<?php echo $val->id;?>"><?php echo $val->first_name."&nbsp&nbsp".$val->last_name."&nbsp&nbsp(&nbsp".$type."&nbsp)&nbsp";?></option>
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
								<input type="text" class="span9 required" label="Sports Center Name" name="sport_center_name" id="sport_center_name" style="width: 50%;" >					     
								<div id="sport_center_name_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							
								<label><span style="color: red;">*</span>Country</label>
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
									<option value="<?php echo $val->id;?>"><?php echo $val->country_name;?></option>
									<?php
									    }
									}
									?>
								</select>
								     </div>
								<div id="country_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>State</label>
								 <?php $getcountry = $this->modelgoals->GetCountry();?>
								     <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">

								    <select class="span9 required" style="width:130.90%" name="state" id="state" label="State" >
									<option value="">Select Country first,then state</option>                          
								     </select>
								     </div>
								<div id="country_error" class="error_div" style="color:red;"></div>
							</div>        
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Location:</label>
								
								    <input type="text" class="span9 required" name="location" id="location" label="Location" placeholder="Location" style="width: 50%;">
								
								<div id="location_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">

								<label><span style="color: red;">*</span>Sports:</label>
								<?php $SportsyData = $this->modeladmin->GetAllSports();?>
								<div style="margin-left: 30px;margin-bottom: 10px;">
							<select name="sports1[]" multiple id="sports1" style="width:130.90%" label="Sports1">
								    <option value="">Select Sports</option>
								    <?php
								  
								    if(count($SportsyData)>0 || $SportsyData !=0)
								    {
									foreach($SportsyData as $key=>$val)
									{
								    ?>
								    <option value="<?php echo $val->id;?>"><?php echo $val->title;?></option>
								    <?php
									}
								    }
								    ?>
								</select>
								</div>
								<div id="sports1_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box">
								<label><span style="color: red;">*</span>Image: </label>
								<input id="image_val" type="hidden" name="image_val" value="1">
								<input type="file"   class="span9 required" name="photo" value=""  label="image" id="photo"  />
								<div id="photo_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Rating :</label>
								<div class="ui-select">
								    <select class="span9 required" label="Rating" name="rating" id="rating" style="width: 130%;">
								           <option value="">Select Rating</option>
									   <option value="1">1</option>
									   <option value="2">2</option>
									   <option value="3">3</option>
									   <option value="4">4</option>
									   <option value="5">5</option>
								    </select>
								</div>
								<div id="rating_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Cost :</label>
								<div class="ui-select">
								    <select class="span9 required" label="Cost" name="cost" id="cost" style="width: 130%;">
									   <option value="">Select Cost</option>
									   <option value="1">$</option>
									   <option value="2">$$</option>
									   <option value="3">$$$</option>
									   
								    </select>
								</div>
								<div id="cost_error" class="error_div" style="color:red;"></div>
							 </div>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Certifications:</label>
								<input type="text" class="span9 required" label="Certifications" name="certifications" id="certifications" style="width: 50%;" >					     
								<div id="certifications_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Add Sports" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('sportscenter/index'); ?>">Cancel</a>
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
//        function check_unic(val) {
//	   var feildname=$("#feildname").val();
//	   var tablename=$("#tablename").val();
//       $("#name_error").val('');
//	if (val.search(/\S/)!=-1) {
//			$.ajax({
//			url: "<?php echo base_url(); ?>index.php/sports/check_unic",
//			data: {
//		         val:val,
//			 tablename:tablename,
//			feildname:feildname
//			
//			},
//			success: function(response) {
//				var response_array = response.split('[SEPARETOR]');
//				//alert(response_array[1]);
//				if (response_array[1]==0) {
//					$("#name_error").html('')
//					$("#uniccheak").val('0')
//				}
//				else
//				{
//					$("#name_error").html('Data is not available.')
//					$("#uniccheak").val('1')
//				}
//			}
//		})
//	}
//}
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
                           
                            $('#new_category').submit();
                        }
			
		  });
	   });
function Select_state(country_id)
{
     $.ajax({
                    url: "<?php echo base_url(); ?>index.php/event/Select_state",
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

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>