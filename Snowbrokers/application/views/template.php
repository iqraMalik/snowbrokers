<?php
/* loading header */
/* Location: ./application/views/header.php */
	$this->load->view('header');
	
/* loading navigation */
/* Location: ./application/views/navigation.php */	
	//$this->load->view('navigation');
	
/* loading body */
/* Location: ./application/views/home.php */
	
/*$main_content is defined in controller*/
/* Location: ./application/controller/home.php */
	$this->load->view($main_content);

/* loading header */
/* Location: ./application/views/footer.php */
	$this->load->view('footer');
?>