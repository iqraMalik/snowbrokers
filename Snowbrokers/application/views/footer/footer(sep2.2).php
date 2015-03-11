<?php

$data=$this->model_top_banner->copyright();
$facebook=$this->model_top_banner->social_sitef();
$twiter=$this->model_top_banner->social_sitet();

//echo $data[0]->field_value; die;?>
<footer class="footer text-center">
	<section class="container">
		<h2>snowbrokers</h2>
		<h3>Keep in touch for the best daily deals</h3>
		<form class="feep-touch-form">
			<input type="text" placeholder="Enter your email address" onblur="validateEmail(this.value)" onblur="email_valid(this.value)" onkeyup="email_valid(this.value)" name="email" id="email"/>
			<span id="emailvalid_error"></span>
			<input type="hidden" id="hidden" name="hidden">
			<button type="submit" >
				<span class="glyphicon glyphicon-send"></span>
			</button>
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
function validateEmail(email)
{
	var has_error;  
	var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if (email.search(/\S/)==-1)
	{
	document.getElementById('emailvalid_error').innerHTML='Enter email id..';
	}
	else
	{
	if (!reg.test(email))
	{
	       
	document.getElementById('emailvalid_error').innerHTML='Enter valid email..';
	document.getElementById('email').focus();
	}
	else
	{
	document.getElementById('emailvalid_error').innerHTML='';
	$.ajax({

                        url : '<?php echo base_url().'index.php/user/email';?>',
                        type:'post',
                        cache:false,
                        data: {'emailvalid':email},
                        success:function(response)
                        {
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

 }
}
</script>