<!-- content -->
<section class="content-area">
	<!--   This is for after login header menu bar start -->
    
	<?php echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
        <?php
        //print_r($member_details);
        //$country = $this->registration_model->get_country(); // Get all country details
        //$res = $this->registration_model->get_product_type(); // fetching product type from the database 
        //print_r($country);
        //print_r($country[$member_details->country]);
        ?>
	<div class="container">
		<div class="shipping-content clearfix">
			
				<div class="form-hedding">
					<h2>Change Password</h2>
				</div>
				<div class="advance-feture">
					<?php
					$attributes = array('class' => 'form-horizontal', 'method' => 'post','id' => 'edit_form');
					echo form_open('myaccount/update_password', $attributes);
                                        ?>
                                    <!--<form action="<?php //echo site_url('myaccount/update_password');?>" name="edit_form" id="edit_form" method="post" onsubmit="return update_validation();">-->
					<div class="product-size clearfix">
                                            <div class="col-md-12">
						<div class="post-address besic-form">
							<label>Current Password <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="password" id="curr_pwd" class="required" name="curr_pwd" value="" onkeyup="check_password();" label="Current password">
                                                                <span class="star-color error_div" id="curr_pwd_error"></span>
                                                        </div>	
						</div>
                                            </div>
                                            <div class="col-md-12">
                                                    <div class="post-address besic-form">
                                                            <label>New Password <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <input type="password" id="new_pwd" class="required" name="new_pwd" value="" label="New Password">
                                                                    <span class="star-color error_div" id="new_pwd_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                            <div class="col-md-12">
                                                    <div class="post-address besic-form">
                                                            <label>Confirm Password <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <input type="password" id="conf_pwd" class="required" name="conf_pwd" value="" label="Confirm new password" onblur="check_pass();">
                                                                    <span class="star-color error_div" id="conf_pwd_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
					    <input type="hidden" id="test_count" name="test_count" value="0">
                                        </div>
                                        <!--<div class="post-address-cell basic-submit">-->
                                        <!--    <button class="btn btn-default" onclick="update_validation()">-->
                                        <!--            SUBMIT-->
                                        <!--    </button>-->
                                        <!--</div>-->
                                           <input type="button" style="margin-top : 20px;" onclick="update_validation()" class="btn btn-default" value="CHANGE">
                                <?php echo form_close(); ?>
				</div>
		</div>
	</div>
</section>
<!-- content End -->
<script type="text/javascript">
    
    function update_validation()
    {
      //  $('.error_div').html('');
        
        var element_id,element_value,element_label,error_div,element_validation_type;
        var required_elements = $('.required');
        var has_error = 0;
        required_elements.each(function(){
               element_id = $(this).attr('id');
               element_value = $(this).val();
               element_label = $(this).attr('label');
               //element_validation_type = $(this).attr('validation_type');
               error_div = $("#"+element_id+"_error")
               
               if (element_value.search(/\S/)==-1) {
                   error_div.html(element_label+' is required.')
                   has_error++
               }
	        else if (element_value.length <= 5) {
		error_div.html(element_label+' length is Week !.')
                has_error++
	       }
        });
	//alert(has_error);
//        if (check_pass()==false)
//	{
//		has_error++;
//	}
//	if ($('#test_count').val()!='1') {
//		has_error++;
//	}
//        //alert(has_error);
//        if (has_error==0)
//        {
//		$('#edit_form').submit();
//	}
	if (check_pass()==true)
	{
		if ($('#test_count').val()=='1')
		{
			$('#edit_form').submit();
		}
	}
        
    }
    function check_pass()
    {
	if (document.getElementById('conf_pwd').value==document.getElementById('new_pwd').value)
	{
		return true;
	}
	else
        {
		document.getElementById('conf_pwd_error').innerHTML="Password must be same as new password.";
		return false;
        }
    }
    function check_password()
    {
 
              //send_data={'opass='+$('#opass').val(),'&key='+$('#key').val();
	     var opass = $("#curr_pwd").val();
	   //  var key= $("#key").val();
			$.ajax({
				type: "POST",
				url: '<?php echo base_url(); ?>myaccount/check_password',
				data: { opass : opass},
				       
				cache: false,
				success: function(data)
				{
				   // alert(data);
					if (data == 0) {
					   document.getElementById("curr_pwd_error").innerHTML = "Previous Password not match !";
					   document.getElementById("curr_pwd_error").style.color='red';
					}
					else{
					 document.getElementById("curr_pwd_error").innerHTML = "You Can Continue..";
					 document.getElementById("curr_pwd_error").style.color='green';
					 document.getElementById("test_count").value ='1';
					}
				}	
			});
	
    }
</script>