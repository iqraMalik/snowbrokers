<?php
$this->load->view('includes/header');

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.css" id="theme_base">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/res_datepicker/default.date.css" id="theme_date">
<script src="<?php echo base_url();?>js/res_datepicker/picker.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.date.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/picker.time.js"></script>
<script src="<?php echo base_url();?>js/res_datepicker/main.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->


<script type="text/javascript">
$(document).ready(function () {
   
	$('#createUser').click(function (e) {
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
			 var invite_people = document.getElementById("invite_people").value;
			



 
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
	 
			if (invite_people =='')
			{
				$('#invite_people_error').html('Invite people  is Required');
	
				has_error++;
			}
			
	      
	    
	   
                    
                        if(has_error==0)
                        {
                           
                            $('#new_event').submit();
                        }
			
		
	});
});

function show_recurring(event_type)
{
	
 if (event_type==2) {
		//recurring_div
		$('#recurring_div').show();
		$('#recurring_div1').show();
		var recurring_type = document.getElementById("recurring_type").value;
		 var reccring_upto = document.getElementById("reccring_upto").value;
		if (recurring_type =='')
		{
			$('#recurring_type_error').html('Recurring Type is Required');

			has_error++;
		}
		if (reccring_upto =='')
		{
			$('#reccring_upto_error').html('Recurring Upto is Required');

			has_error++;
		}

	      }
	      else{
		$('#recurring_div').hide();
		$('#recurring_div1').hide();
	      }	
}
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



<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Group Management</h4>
        </div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>Add Group ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
					</div>
				</div>
				<div class="row-fluid filter-block">
				   <div class="pull-right">
						<a class="btn-flat new-product" href="<?php echo site_url('group/index'); ?>">< View List</a>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
				<!-- left column -->
				<div class="span9 with-sidebar">
					<div class="container">
						<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('group/insert_group');?>" name="new_event" id="new_event" method="post" autocomplete="off">
						
							<input type="hidden" name="email_hidden" id="email_hidden" value="">
							<input type="hidden" name="password_length" id="password_length" value="">
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Group Creator:</label>
								<?php $geteventcreator = $this->modelgroup->Geteventcreator();?>
								     <div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
								    <select class="span9 required"  style="width:130.90%" name="group_user" id="group_user" label="Group Creator" >
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
								<div id="group_user_error" class="error_div" style="color:red;"></div>
								
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Group Name:</label>
								<input type="text" class="span9 required" label="Group Name" name="group_name" id="group_name" style="width: 50%;" value="">
								<div id="group_name_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Invite People:</label>
								<?php $geteventcreator = $this->modelgroup->Geteventcreator();?>
								     <div  style="margin-left: 30px;margin-bottom: 10px;">
								    <select multiple  style="width:130.90%" name="invite_people[]" id="invite_people" label="Invite People" >
								    <option value="">Select User</option>
								   <?php                          
									if(count($geteventcreator)>0 || $geteventcreator !=0)
									{
									    foreach($geteventcreator as $key=>$val)
									    {
										
									?>
									<option value="<?php echo $val->id;?>"><?php echo $val->first_name."&nbsp&nbsp".$val->last_name."&nbsp&nbsp&nbsp";?></option>
									<?php
									    }
									}
									?>
								</select>
								     </div>
								<div id="invite_people_error" class="error_div" style="color:red;"></div>
								
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
								<div class="ui-select" style="margin-left: 30px;margin-bottom: 10px;">
							<select name="sports1" id="sports1" style="width:130.90%" class="span9 required" label="Sports1">
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
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Description:</label>								
								<textarea class="span9 required" label="Description" name="desc" id="desc"></textarea>								
								<div id="desc_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box">
								<label><span style="color: red;">*</span>Image: </label>
								<input id="image_val" type="hidden" name="image_val" value="1">
								<input type="file"   class="span9 required" name="photo" value=""  label="image" id="photo"  />
								<div id="photo_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" >
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							<div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="createUser" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('group/index'); ?>">Cancel</a>
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

$('#age').pickadate({
// An integer (positive/negative) sets it relative to today.
								
// `true` sets it to today. `false` removes any limits.
max: 1,
selectYears: true,
selectMonths: true,
format: "yyyy-mm-dd",
})
</script>
<script>

</script>
<!-- taskaroo-->
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>