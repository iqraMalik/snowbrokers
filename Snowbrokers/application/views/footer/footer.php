<?php

$data=$this->model_top_banner->copyright();
$facebook=$this->model_top_banner->social_sitef();
$twiter=$this->model_top_banner->social_sitet();

//echo $data[0]->field_value; die;?>
<footer class="footer text-center">
	<section class="container">
		<h2>snowbrokers</h2>
		<h3>Keep in touch for the best daily deals</h3>
		<div class="feep-touch-form" id="subscription_section">
			<input type="text" placeholder="Enter your email address"  name="email" id="email_id"/>
			
			
			<button type="button"  onclick="validateEmail()">
				<span class="glyphicon glyphicon-send"></span>
			</button>
				
			<div id="emailvalid_error"></div>
			
			<center><img src="<?php echo base_url();?>images/712.GIF"alt="loader" height="42" width="42" id="load" style="display: none;"></center>
					
		</div>
		<?php
		$var = $this->session->userdata;
		if(isset($var['email']) && $var['email']!="")
		{
		?>
			<a href="<?php echo base_url('about');?>"><h3>STRATEGY</h3></a>
		<?php
		}else{
		?>
		<a href="<?php echo base_url('home/about_us');?>"><h3>STRATEGY</h3></a>
		<?php
		}
		?>
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
	
	var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	
	if (email.search(/\S/)==-1)
	{
	
		document.getElementById('emailvalid_error').innerHTML='<span style="color:#FF0000;">Please Enter Subscription email Id..</span>';
		return false;
	}
	else
	{
		if (!reg.test(email))
		{
			   
			document.getElementById('emailvalid_error').innerHTML='<span style="color:#FF0000;">Please Enter valid email Id..</span>';
			document.getElementById('email').focus();
			return false;
		}
		else
		{
			$("#load").css({'display':'block'});
			
			document.getElementById('emailvalid_error').innerHTML='';
			$.ajax({
		
								url : '<?php echo base_url().'home/email';?>',
								type:'post',
								cache:false,
								data: {'emailvalid':email},
								success:function(response)
								{
									if (response==1)
									{
										$("#load").css({'display':'none'});
										document.getElementById('email').focus();
										document.getElementById('emailvalid_error').innerHTML='<span style="color:#FF0000;">You are Already Subscribed to our site!</span>';
										return false;
										
										
									}
									else
									{
										
										
										document.getElementById('subscription_section').innerHTML='<span style="color:#09A53B;">Thanks for Subscription.You have successfully subscribed..</span>';
										
									}
									
					  
								}
					});
		}

	}
}

</script>