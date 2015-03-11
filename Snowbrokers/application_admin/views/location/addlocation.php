<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<!--<script type="text/javascript" src="<?php //echo base_url(); ?>ckeditor/ckeditor.js"></script>-->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Location Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add Location ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('location/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('location/insert_location');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							
								
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Location</label>
								<input type="text" class="span9 required" label="Location" name="name" id="name" style="width: 50%;">
								<div id="name_error" class="error_div" style="color:red;"></div>
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
								<input type="button" value="Add Location" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('location/index'); ?>">Cancel</a>
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
			 //if (document.getElementById('image').value.search(/\S/)!=-1)
			 //   {
			 //      var image_type=document.getElementById('image').value;
			 //      var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
			 //      if(!re.exec(image_type))
			 //      {
			 //      document.getElementById("image_error").innerHTML="File extension not supported( .jpg, .png, .jpeg, .gif are allowed)";
			 //      has_error++;
			 //      return false;
			 //      }		
			 //   }
			
			 if (has_error==0) {
				$('#new_category').submit();
			 }
		  });
	   });
       function GetStateFromCountry(Countryid) {
	var CountryId = $.trim(Countryid);
	if(CountryId!=0) {
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/location/Get_StateDetails",
			data: {CountryId:CountryId},
			success: function(response) {
			    
			    var allval=response;
	                    var splitResponse = allval.split('@@');
			    //alert(splitResponse[1]);
			    $('#state').html(splitResponse[0]);
	                    if (splitResponse[1]!="") {
				   $('#city_name').html(splitResponse[1]);
			              }
				    
				 
			}
		});
	}
}
 function GetcityFromstate(stateid1) {
	var stateid = $.trim(stateid1);
	if(stateid!=0) {
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/location/Get_CityDetails",
			data: {stateid:stateid},
			success: function(response) {
			    //alert(response);
				$('#city_name').html(response);
			}
		});
	}
}

    </script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>