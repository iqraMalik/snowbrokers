<?php
$this->load->view('includes/header');

$dataone_fetch = $this->modelbodytype->getDatabodytype($this->input->post('ListingUserid'));

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<!--<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>-->

    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Bodytype</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Bodytype ( <span style="color: red;">*</span> Fields are mandatory</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('bodytype/index'); ?>">< view list</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('bodytype/edit_bodytype');?>" name="new_category" id="new_category" method="post" autocomplete="off">
							 <input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" />
							 
						
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Bodytype :</label>
								
								<input type="text" class="span9 required" label="Bodytype " name="bodytype_en" id="bodytype_en" style="width: 50%;"  value="<?php echo $dataone_fetch[0]->body_type;?>">
								<input type="hidden" class="span9" label="Life style Name" name="tablename" id="tablename" style="width: 50%;" value="bodytype">
					  <input type="hidden" class="span9" label="Life style Name" name="feildname" id="feildname" style="width: 50%;" value="body_type">
			    <input type="hidden" class="span9" label="Life style Name" name="uniccheak" id="uniccheak" style="width: 50%;" value="0">
								<input type="hidden" class="span9" label="Life style Name" name="id" id="id" style="width: 50%;" value="<?php echo $dataone_fetch[0]->id;?>">
								<div id="bodytype_en_error" class="error_div" style="color:red;"></div>
							 </div>
                                                         <!--<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Bodytype (in persian) :</label>
								
								<input type="text" class="span9 required" label="Bodytype (In persian)" name="bodytype_pe" id="bodytype_pe" style="width: 50%;" onblur="CitynameAvailability_persi(this.value);" value="<?php echo $dataone_fetch[0]->body_type_pe;?>">
								<div id="bodytype_pe_error" class="error_div" style="color:red;"></div>
							 </div>
                                                         <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Bodytype (In Pasto) :</label>
								
								<input type="text" class="span9 required" label="Bodytype (In Pasto)" name="bodytype_pa" id="bodytype_pa" style="width: 50%;" onblur="CitynameAvailability_pashto(this.value);" value="<?php echo $dataone_fetch[0]->body_type_pa;?>">
								<div id="bodytype_pa_error" class="error_div" style="color:red;"></div>
							 </div>-->
							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span>Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" style="width: 130%;">
									  
									   <option value="1" <?php if($dataone_fetch[0]->is_active==1){echo "selected";}else{echo "";}?>>Active</option>
									   <option value="0" <?php if($dataone_fetch[0]->is_active==0){echo "selected";}else{echo "";}?>>Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Submit" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('bodytype/index'); ?>">Cancel</a>
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
//       function check_unic(val) {
//	   var feildname=$("#feildname").val();
//	   var tablename=$("#tablename").val();
//          var id=$("#id").val();
//       $("#bodytype_en_error").val('');
//	if (val.search(/\S/)!=-1) {
//			$.ajax({
//			url: "<?php echo base_url(); ?>index.php/bodytype/check_unic_edit",
//			data: {
//		         val:val,
//			 tablename:tablename,
//			feildname:feildname,
//			id:id
//			
//			},
//			success: function(response) {
//				var response_array = response.split('[SEPARETOR]');
//				//alert(response_array);
//				//alert(response_array[1]);
//				if (response_array[1]==0) {
//					$("#bodytype_en_error").html('')
//					$("#uniccheak").val('0')
//				}
//				else
//				{
//					$("#bodytype_en_error").html('Data is not available.')
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
				    error_div.html(element_label+'is required')
				    has_error++
				}
			 })
       var val=$("#bodytype_en").val();
       var feildname=$("#feildname").val();
	   var tablename=$("#tablename").val();
          var id=$("#id").val();
       $("#bodytype_en_error").val('');
	if (val.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/bodytype/check_unic_edit",
			data: {
		         val:val,
			 tablename:tablename,
			feildname:feildname,
			id:id
			
			},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				//alert(response_array);
				//alert(response_array[1]);
				if (response_array[1]==0) {
			    if (has_error==0) {
				$('#new_category').submit();
			 }
				}
				else
				{
					$("#bodytype_en_error").html('Data is not available.')
					
				}
			}
		})
	}
			
		  });
	   });
//	   function CitynameAvailability(CityName) {
//	$('#Country_name_en_error').html('');
//	var city_ID = $.trim($('#id').val());
//	var CityName = $.trim(CityName);
//	if(CityName!='') {
//		$.ajax({
//			url: "<?php echo base_url(); ?>index.php/country/Check_CityName_Edit",
//			data: {CityName:CityName,city_ID:city_ID},
//			success: function(response) {
//			    //alert(response);
//			    var ab=response.split("||");
//				if(ab[1] == 'Y') {
//					$('#relval').val('1');
//					$('#Country_name_en_error').css('color','red');
//					$('#Country_name_en_error').html('Country Already There');
//				} else {
//				        $('#relval').val('0');
//					$('#Country_name_en_error').html('Country Available');
//					$('#Country_name_en_error').css('color','green');
//				}
//			}
//		});
//	}
//}
//function CitynameAvailability_pe(CityName) {
//	$('#category_title_pe_error').html('');
//	var city_ID = $.trim($('#id').val());
//	var CityName = $.trim(CityName);
//	if(CityName!='') {
//		$.ajax({
//			url: "<?php echo base_url(); ?>index.php/categorytype/Check_CityName_Edit_pe",
//			data: {CityName:CityName,city_ID:city_ID},
//			success: function(response) {
//			    //alert(response);
//			    var ab=response.split("||");
//				if(ab[1] == 'Y') {
//				   //alert(ab[1]);
//					$('#relval_pe').val('1');
//					$('#category_title_per_error').css('color','red');
//					$('#category_title_per_error').html('Country in Persian Already There');
//				} else {
//				        $('#relval_pe').val('0');
//					$('#category_title_per_error').html('Country in Persian Available');
//					$('#category_title_per_error').css('color','green');
//				}
//			}
//		});
//	}
//}
//    
//function CitynameAvailability_pa(CityName) {
//	$('#category_title_pas_error').html('');
//	var city_ID = $.trim($('#id').val());
//	var CityName = $.trim(CityName);
//	if(CityName!='') {
//		$.ajax({
//			url: "<?php echo base_url(); ?>index.php/categorytype/Check_CityName_Edit_pa",
//			data: {CityName:CityName,city_ID:city_ID},
//			success: function(response) {
//			    //alert(response);
//			    var ab=response.split("||");
//				if(ab[1] == 'Y') {
//				   //alert(ab[1]);
//					$('#relval_pa').val('1');
//					$('#category_title_pas_error').css('color','red');
//					$('#category_title_pas_error').html('Country in pasto  Already There');
//				} else {
//				        $('#relval_pa').val('0');
//					$('#category_title_pas_error').html('Country in pasto Available');
//					$('#category_title_pas_error').css('color','green');
//				}
//			}
//		});
//	}
//} 
    </script>
    
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>