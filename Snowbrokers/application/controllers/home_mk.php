<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		
    }
	public function index()
	{
		
		
		$data['main_content'] = 'home' ;
		$this->load->view('template', $data);
	}


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */