<?php $this->load->view('includes/header'); ?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Change Password</h4>
        </div>
    </div>
    <div class="row-fluid">
            <div id="main-stats">
                <div class="table-products">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4></h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <!--<a class="btn-flat new-product" href="<?php echo site_url('subadmins/index'); ?>">< View List</a>-->
                        </div>
                    </div>
		    <?php
                    
				if($rows>0)
				{
				foreach ($rows as $dataone):				
                    
		                                    
		  
                    ?>
                    <div class="row-fluid form-wrapper">
                    <!-- left column -->
                   
                    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
                        <div class="container">
                            <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('changepassword/insertpassword');?>" id="frmValidation" method="post">
                                <div class="span12 field-box" style="margin-left: 30px;">
                                    <label>Current password:</label>
                                    <input type="password" value="" class="span9" name="password" id="password" style="width: 50%;">
                                </div>
				
                                <div class="span12 field-box">
                                    <label>New Password:</label>
                                    <input type="password" class="span9" value="" name="userpassword" id="userpassword" style="width: 50%;">
                                </div>
                                <div class="span12 field-box">
                                    <label>Retype Password:</label>
                                    <input type="password" class="span9" value="" name="retypepassword" id="retypepassword" style="width: 50%;">
                                </div>
                               <div id="pass_error" style="color:red;"></div>
                                <div class="span11 field-box actions">
                                    <input type="button" value="submit" class="btn-glow primary" id="createSubadmin">
                                    <span>OR</span>
                                    <a class="btn-flat new-product" href="<?php echo site_url('dashboard/index'); ?>">Cancel</a>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                </div>
			</div>
    </div>
</div>
     <?php
  endforeach;
				}
    ?> 
<script type="text/javascript">
    $(function () {
        $('#createSubadmin').click(function (e) {
			e.preventDefault();
			var pass = $.trim($('#retypepassword').val());
			var r_pass=$.trim($('#userpassword').val());
			$('.span9').css('border-color','#B2BFC7');
        	if($.trim($('#password').val())=='' || $.trim($('#password').val())==0) {
        		$('#password').attr('placeholder','Current Password Please');
        		$('#password').css('border-color','red');
        		$('#password').focus();
        		return false;
        	} else if($.trim($('#userpassword').val())=='' || $.trim($('#userpassword').val())==0) {
        		$('#userpassword').attr('placeholder','password Please');
        		$('#userpassword').css('border-color','red');
        		$('#userpassword').focus();
        		return false;
        	} else if($.trim($('#retypepassword').val())=='' || $.trim($('#retypepassword').val())==0) {
        		$('#retypepassword').attr('placeholder','password Please');
        		$('#retypepassword').css('border-color','red');
        		$('#retypepassword').focus();
        		return false;
        	
        	} else if(pass!= r_pass) {
		    
		    $('#pass_error').html('password and Retype Password does not match. Please try again! ');
        		
        		$('#retypepassword').focus();
        		return false;
        		
        	}
		else{
		   
		    $( "#frmValidation" ).submit();
        		return true;
		}
        });
    });
    
</script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>