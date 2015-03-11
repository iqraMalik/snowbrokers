<?php
class Admin_dashboard extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/admin_login');
        }
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {

        $this->load->view('admin/includes/admin_header');
		$this->load->view('admin/admin_dashboard');
		$this->load->view('admin/includes/admin_footer');

    }//index

}