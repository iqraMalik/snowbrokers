<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
	
        $this->load->model('model_offer_banner');
	$this->load->model('model_top_banner');
	$this->load->model('model_middle_banner');
	$this->load->model('modelbanner_home_footer');
	$this->load->model('registration_model');

		$this->load->model('modelsignup');
		$this->load->model('model_products');  //all data related to products created by anupam on 30 th aug 2014//
		$this->load->model('modelfooter');
                $this->load->model('modelhome');
                $this->load->model('modelsettings');
		$this->load->library('pagination');
		$this->load->helper(array('form','url'));//=================ADDED BY PRITAM (29/7/14)====//
		$this->load->library('form_validation');//=================ADDED BY PRITAM (29/7/14)====//
		$this->modelsettings->site_settings();
		$this->limit = $this->modelsignup->per_page();
	
	$this->load->library('session');
	$data=$this->session->userdata('id'); 
	 
	if(empty($data) || ($data<0))
	{
	    
	    redirect('home');
	}
    }
    public function index()
    {
	    $categories = $this->model_products->getTypes(); //to get the navigation categories/
	    $data['categories'] = $categories;
	    $data['aboutus_content']=$this->model_top_banner->aboutus();
	    $this->load->view('header/header',$data);
	    $this->load->view('about/about',$data);
	    $this->load->view('footer/footer');
	   

    }
}
?>