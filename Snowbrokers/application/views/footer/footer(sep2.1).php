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
			<input type="text" placeholder="Enter your email address" />
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