<?php

$data=$this->model_top_banner->copyright();
$facebook=$this->model_top_banner->social_sitef();
$twiter=$this->model_top_banner->social_sitet();

//echo $data[0]->field_value; die;?>
<footer class="footer text-center">
	<section class="container">
		<h2>snowbrokers</h2>
		<h3>Keep in touch for the best daily deals</h3>
		<form class="feep-touch-form" action="<?php echo base_url('home/subscribe');?>" method="post" id="sb_scrib">
			<input type="text" placeholder="Enter your email address" onblur="validatesEmail(this.value)" onkeyup="validatesEmail(this.value)"  name="email" id="email_id"/>
			
			<input type="hidden" id="hidden" name="hidden" value='0'>
			<button type="button"  onclick="validateEmail()">
				<span class="glyphicon glyphicon-send"></span>
			</button>
				
			<div id="emailvalid_error"></div>
		</form>
		<p><?php echo $data[0]->field_value;?></p>
		<section class="bottom-social-icon">
			<ul>
				<li><a href="<?php echo $facebook[0]->field_value;?>"><i class="fa fa-facebook"></i></a></li>
				<li><a href="<?php echo $twiter[0]->field_value;?>"><i class="fa fa-twitter"></i></a></li>
				
			</ul>
		</section>
	</section>
</footer>
<script>
function validateEmail()
{
	var email=document.getElementById('email_id').value;
	alert(email);
	var has_error=0;  
	var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if (email.search(/\S/)==-1)
	{
		alert(email);
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
				alert(response);
				
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
		
		has_error=hidden;
		
		document.getElementById('email').focus();
		document.getElementById('emailvalid_error').innerHTML='<span style="color:#FF0000;">Email Already Exists!</span>';
		
	}
	
	if (has_error==0)
	{
	   document.getElementById('sb_scrib').submit();	
	}
 }
}
function validatesEmail(email)
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
								  document.getElementById('emailvalid_error').innerHTML='<span style="color:#FF0000;">Email Already Exists!</span>';
							 
							    
							}
							else
							{
								 document.getElementById('hidden').value=0;
							         document.getElementById('emailvalid_error').innerHTML='<span style="color:green;">Email id availabel!</span>';
							  
							}
			  
                        }
		    });	
}
</script>