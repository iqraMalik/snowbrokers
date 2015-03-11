<?php
$this->load->view('includes/header');

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<!--<script type="text/javascript" src="<?php //echo base_url(); ?>ckeditor/ckeditor.js"></script>-->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>country management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add country ( <span style="color: red;">*</span> Fields are mandatory</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('country/index'); ?>">view list</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('country/insert_country');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Country name :</label>
								<input type="hidden" name="relval" id="relval" value="">
								<input type="text" class="span9 required" label="Country name" name="Country_name_en" id="Country_name_en" style="width: 50%;">
								<div id="Country_name_en_error" class="error_div" style="color:red;"></div>
							 </div>
                                                        <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Country Short Code :</label>
								<input type="hidden" name="relval" id="relval" value="">
								<input type="text" class="span9 required" label="Country code" name="country_code" id="country_code" style="width: 50%;" value="">
								<div id="country_code_error" class="error_div" style="color:red;"></div>
							</div>
							
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Status:</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									   <option value="1">Active</option>
									   <option value="0">Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Add Country" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('country/index'); ?>">Cancel</a>
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
				    error_div.html(element_label+' is required')
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
			 if (document.getElementById('relval').value==1)
			 {
			    document.getElementById('Country_name_en_error').innerHTML="Country Already There";
			    has_error++;
			    //return false;
			 }
			 
			 if (has_error==0) {
				$('#new_category').submit();
			 }
		  });
	   });
       function CitynameAvailability(CityName) {
	$('#Country_name_en_error').html('');
	var CityName = $.trim(CityName);
	if(CityName!='') {
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/country/Check_CityName",
			data: {CityName:CityName},
			success: function(response) {
			     var ab=response.split("||");
				if(ab[1]== 'Y') {
					$('#relval').val('1');
					$('#Country_name_en_error').css('color','red');
					$('#Country_name_en_error').html('Country Already There');
				} else {
				        $('#relval').val('0');
					$('#Country_name_en_error').html('Country Available');
					$('#Country_name_en_error').css('color','green');
				}
			}
		});
	}
}
function CitynameAvailability_pashto(CityName) {
	$('#category_title_pas_error').html('');
	var CityName = $.trim(CityName);
	if(CityName!='') {
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/country/Check_CityName_pa",
			data: {CityName:CityName},
			success: function(response) {
			    //alert(response);
			    var ab=response.split("||");
				if(ab[1]== 'Y') {
					$('#relval_pa').val('1');
					$('#category_title_pas_error').css('color','red');
					$('#category_title_pas_error').html('Country in pashto Already There');
				} else {
				        $('#relval_pa').val('0');
					$('#category_title_pas_error').html('Country in pashto Available');
					$('#category_title_pas_error').css('color','green');
				}
			}
		});
	}
}
function CitynameAvailability_persi(CityName) {
	$('#category_title_per_error').html('');
	var CityName = $.trim(CityName);
	if(CityName!='') {
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/country/Check_CityName_pe",
			data: {CityName:CityName},
			success: function(response) {
			    var ab=response.split("||");
				if(ab[1] == 'Y') {
					$('#relval_pe').val('1');
					$('#category_title_per_error').css('color','red');
					$('#category_title_per_error').html('Country in Persian Already There');
				} else {
				        $('#relval_pe').val('0');
					$('#category_title_per_error').html('Country in Persian Available');
					$('#category_title_per_error').css('color','green');
				}
			}
		});
	}
}
    </script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>