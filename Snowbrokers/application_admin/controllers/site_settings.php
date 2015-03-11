<?php

class site_settings extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modeladmin');
		$this->load->model('site_settingsmodel');
		
		if(!$this->modeladmin->isLoggedIn()){
			redirect("login/index");
		}
	}
	
	function index()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
		//$this->session->set_userdata('success_msg', "");
		//$this->session->set_userdata('error_msg', "");
		$data['settings'] = $this->site_settingsmodel->getsite_settings();
		$this->load->view('site_settings/index',$data);
	}
	function update_settings()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$this->session->set_userdata('success_msg', "");
		$this->session->set_userdata('error_msg', "");
		$response = $this->site_settingsmodel->updatesite_settings();
		
		//print_r($_FILES);
		//echo 'nm-'.$_FILES['site_settings']['name']['bg_img'];
		
		
		redirect('site_settings/index');
	}
}