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
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>offer Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add offer</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('offer/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('offer/insert_offer');?>" name="new_static_page" id="new_static_page" method="post" autocomplete="off">
						
					   
					   <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Plan For :</label>
								<div class="ui-select">
								    <select label="planfor" name="planfor" id="planfor" style="width: 130%;" onchange="fetchname(this.value);">
								           <option value="">Select one</option>
									   <option value="1">User</option>
									   <option value="2">Instructor</option>
									    <option value="3">Company</option>
								    </select>
								</div>
								<div id="planfor_error" class="error_div" style="color:red;"></div>
				         </div>
					    <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Plan Name :</label>
								<div class="ui-select">
								    <select label="planname" name="planname" id="planname" style="width: 130%;">
								           <option value="">Select Plan for First</option>
									   
								    </select>
								</div>
								<div id="planname_error" class="error_div" style="color:red;"></div>
				         </div>
					    <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>offer for :</label>
							       <input type="text" name="offerfor" id="offerfor" label="offerfor" class="span9 required">
							       <div id="offerfor_error" class="error_div" style="color:red;"></div>
					  </div>
					 <script type="text/javascript">

								
								$('#add_date').pickadate({
								// An integer (positive/negative) sets it relative to today.
								
								// `true` sets it to today. `false` removes any limits.
								max: 1,
								selectYears: true,
								selectMonths: true,
								format: "yyyy-mm-dd",
								})
							</script>
					   <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>offer start :</label>
							     
							       <input type="text" name="add_date" id="add_date" label="add_date" class="span9 required">
							       <div id="add_date_error" class="error_div" style="color:red;"></div>
					  </div>
					   <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>offer End :</label>
							     
							       <input type="text" name="end_date" id="end_date" label="end_date" class="span9 required">
							       <div id="end_date_error" class="error_div" style="color:red;"></div>
					  </div>
					   
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
								<input type="button" value="Create offer" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('offer/index'); ?>">Cancel</a>
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
			 if (document.getElementById('offerfor').value=="")
			 {
			    document.getElementById('offerfor_error').innerHTML="Offer for is required";
			    has_error++;
			    //return false;
			 }
			 
			  if(isNaN($.trim($('#offerfor').val())) || $.trim($('#offerfor').val()) % 1 !=0 || parseFloat($.trim($('#offerfor').val())) != parseInt($.trim($('#offerfor').val())))
			    {
				    $('#offerfor_error').html('Only Newmaric value Please');
				    
				    has_error++;
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

                              CKEDITOR.replace( 'planfeatures',
       {
       
       height: 250,
       width: 600
       });
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

                     </script>
    <script>
       function fetchname(offerfor) {
	if (offerfor.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/offer/check_offer",
			data: {offerfor:offerfor},
			success: function(response) {
				$('#planname').html(response);
			
			}
		})
	}
}
    </script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>