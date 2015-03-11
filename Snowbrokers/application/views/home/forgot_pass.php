
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
			
			if($flash_message == 'not_mail') {
                              
                                  echo '<div class="alert alert-error" style="background-color: rgb(248, 201, 201);color: rgb(243, 48, 48);border-color: rgb(247, 131, 131);">';
				  echo '<i class="icon-remove-sign"></i>&nbsp<strong>Error.! &nbsp</strong> Can not send recovery email.';
				  echo '</div>';
                        }
			
			if($flash_message == 'mail') {
                              
				echo '<div class="alert alert-success">';
				echo '<i class="icon-ok-sign"></i><strong>Success ! </strong>Email sent. Check your mail to retrieve password';
				echo '</div>';
                        }
		     }
		?>
	<!--============================END=============================================-->   
			   
			<?php
			      $attributes = array('class' => 'bg-form clearfix',
						  'id'=>'sb_scrib');
			      //form validation
			      echo validation_errors();
			      echo form_open_multipart('forgot_password/send_mail/', $attributes);
			?>
				
						
						<table align="center">
							<tr><td><label>Email</label></td></tr>
						<tr>
					<td>
	<input type="text" name="email" id="email_id" style="width: 300px;" onblur="forgetEmail(this.value)" onkeyup="forgetEmail(this.value)">
							</td>
						</tr>
							<tr><td><input type="hidden" id="hidden" name="hidden" value='0'></td></tr>
				                       <tr><td><div id="emailvalid_error"></div></td></tr>
						
				
				
				       <tr><td><!--<div class="modal-btn" >-->
					<button type="button" class="btn btn-primary pull-center" onclick="Email()">
						submit
					</button>
						
				<!--</div>-->
				       </td>
				</tr>
				</table>
			<?php
			  //closeing the form
			  echo form_close();
			?>
			</div>
	
			<p>
				Enter your email id to retrieve your password
			</p>
			<a href="javascript:void(0)" class="bounce" id="bounce"><img src="<?php echo $this->config->base_url(); ?>assets/images/scroll-arrow.png" alt="scroll-arrow"></a>
		</div>
	</div>
</section>
<script>
function Email()
{
	var email=document.getElementById('email_id').value;
	
	var has_error=0;  
	var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if (email.search(/\S/)==-1)
	{
	
	document.getElementById('emailvalid_error').innerHTML='<span style="color:#FF0000;">Enter email id..</span>';
	has_error++;
	}
	else
	{
	if (!reg.test(email))
	{
	       
	document.getElementById('emailvalid_error').innerHTML='<span style="color:#FF0000;">Enter valid email..</span>';
	document.getElementById('email').focus();
	has_error++;
	}
	else
	{
	document.getElementById('emailvalid_error').innerHTML='';
	$.ajax({

                        url : '<?php echo base_url().'home/email';?>',
                        type:'post',
                        cache:false,
                        data: {'emailvalid':email},
                        success:function(response)
			{
				//alert(response);
				
				
							if (response==1)
							{
								
								  document.getElementById('hidden').value=1;
							 
							    
							}
							else
							{
								 document.getElementById('hidden').value=0;
							  
							  
							}
			  
                        }
		    });
	
	
	
	}
	var hidden=document.getElementById('hidden').value;
	
	if (hidden==1)
	{
		
		has_error=0;
		
		
	}
	else
	{
		has_error++;
		
	}
	if (has_error==0)
	{
		
	   document.getElementById('sb_scrib').submit();
	  
	}
 }
}
function forgetEmail(email)
{
$.ajax({

                        url : '<?php echo base_url().'home/email';?>',
                        type:'post',
                        cache:false,
                        data: {'emailvalid':email},
                        success:function(response)
			{
				//alert(response);
				
							if (response==1)
							{
								
								  document.getElementById('hidden').value=1;
								 
								  document.getElementById('emailvalid_error').innerHTML='<span style="color:green;">Email id Exists!</span>';
							 
							    
							}
							else
							{
								 document.getElementById('hidden').value=0;
							         document.getElementById('emailvalid_error').innerHTML='<span style="color:red;">Email id not Exists!</span>';
							  
							}
			  
                        }
		    });	
}
</script>