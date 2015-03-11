
<?php $flash_message=$this->session->flashdata('flash_message'); ?> <!--=====ADDED PRITAM 30/7/14-->
<!-- Header Start -->

<!-- Header End -->
<!-- Banner Start -->
<section class="banner" data-stellar-background-ratio="0.3">
	<div class="container">
		
	
		<div class="banner-text">
			<div class="border-head">
				<h2>Retrieve Password</h2>
			</div>
		      
			<div class="big-text">
			   
			   
			<!--=========== ADDED FOR FLASH MESSAGE (PRITAM-- 30/7/14) ====================-->
		<?php
                     if(isset($flash_message)) {
			
			if($flash_message == 'not_update') {
                              
                                  echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131);">';
				  echo '<i class="icon-remove-sign"></i>&nbsp<strong>Error.! &nbsp</strong> Can not update your password.';
				  echo '</div>';
                        }
			
			
		     }
		?>
	<!--============================END=============================================-->   
			   
			 <?php
			      $attributes = array('class' => 'bg-form clearfix','onsubmit'=>'return passwordstrenth()','width'=>'400px','height'=>'400px');
			      //form validation
			      echo validation_errors();
			      echo form_open_multipart('retrieve_pass/update_user/'.$id, $attributes);
			?>
				<div class="form-group">
				  
						
                                               <label id="labl" style="display: block;">One time password</label>
                                                <div class="input_outer" style="display: block;" id="onpass">
							
                                                    <input type="password" name="pass" id="pass" class="textbox" placeholder="please enter otp" onblur="chk_password(this.value)" onkeyup="chk_password(this.value)" />
                                                </div>
				</div>
				<input type="hidden" id="hidden" name="hidden">
			       <div class="form-group" style="display: none;" id="newpassdiv">
				  
						<label>New Password</label>
                                               
                                                <div class="input_outer">
                                                    <input type="password" name="repass" id="repass" class="textbox" placeholder="enter Password" />
                                                </div>
					<label>Confirm Password</label>
					   <div class="input_outer">
                                         <input type="password" name="repass1" id="repass1" class="textbox" placeholder="enter Password" />
                                                </div>
				   
				
					<button type="submit" class="btn btn-primary pull-center">
						submit
					</button>
				</div>
			          
				  
			<div id="passwordvalid_error"></div>
				
			<?php
			  //closeing the form
			  echo form_close();
			?>
			<div id='pass_error'></div>
			<div id='cpass_error'></div>
			</div>
	
			<p>
				Enter your new password here
			</p>
			<a href="javascript:void(0)" class="bounce" id="bounce"><img src="<?php echo $this->config->base_url(); ?>assets/images/scroll-arrow.png" alt="scroll-arrow"></a>
		</div>
	</div>
</section>
<script>
	function chk_password(password)
{
	//alert(password);
$.ajax({

                        url : '<?php echo base_url().'retrieve_pass/password';?>',
                        type:'post',
                        cache:false,
                        data: {'passwordonetime':password},
                        success:function(response)
			{
				
				
							if(response>0)
							{
								
								  document.getElementById('hidden').value=response;
								  
								  $("#labl").css({'display':'none'});
								   $("#onpass").css({'display':'none'});
								  $("#newpassdiv").css({'display':'block'});
								 document.getElementById('passwordvalid_error').innerHTML='<span style="color:green;">Valid one time password!</span>';
								  
								   
							 
							    
							}
							else
							{
								 document.getElementById('hidden').value=0;
							         document.getElementById('passwordvalid_error').innerHTML='<span style="color:red;">Not Valid one time password!</span>';
							  
							}
			  
                        }
		    });	
}

function passwordstrenth()
{
	var pass= document.getElementById('repass').value;
	var cpass=document.getElementById("repass1").value;
	
	if(pass.search(/\S/)==-1) /*=======validate Password=====*/
  {
    
   document.getElementById('passwordvalid_error').innerHTML='<span style="color:red;">Enter password</span>';

    
    
    return false;
  }
  else
  {
    
    var pass=document.getElementById("repass").value.length;
     
    if (pass < 5) {
      
     
       document.getElementById('passwordvalid_error').innerHTML='<span style="color:red;">Password must be atleast 5 character in length..</span>';
       
      return false;
    }
    else{
      
      document.getElementById('pass_error').style.display='none';
      
    }
  }
  if(cpass.search(/\S/)==-1)  /*=======validate Confirm Password=====*/
  {	
    
    document.getElementById('passwordvalid_error').innerHTML='<span style="color:red;">Enter your password again..</span>';
   
    
    return false;
  }	
  else
  {
    var pass=document.getElementById("repass").value;
    var cpass=document.getElementById("repass1").value;
    
    if (pass==cpass) {
      
      
      document.getElementById('repass1').style.border="1px #006600 solid";
    }
    else{
        
	document.getElementById('passwordvalid_error').innerHTML='<span style="color:red;">Confirm password not matched..</span>';
        document.getElementById('repass1').focus();
      return false;
    }
  }
}
</script>
