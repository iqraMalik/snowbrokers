<?php
class Admin_myaccount extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('myaccount_model');
        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {
		//settings data 
        $data['myaccount_data'] = $this->myaccount_model->get_account_data();			
		$this->load->view('admin/includes/admin_header');
		$this->load->view('admin/admin_myaccount', $data);
		$this->load->view('admin/includes/admin_footer');

    }//index
	
	
	public function updt()
    {
		$this->load->library('form_validation');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			//form validation
            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
			$this->form_validation->set_rules('email_addres', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');
		
		
			if ($this->form_validation->run())
			{
				$data_to_store = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email_addres' => $this->input->post('email_addres')
				);
				//if the insert has returned true then we show the flash message
				if($this->myaccount_model->update_account($data_to_store)){
					$data['flash_message'] = TRUE;
					redirect('admin/myaccount');
				}else{
					$data['flash_message'] = FALSE; 
				}
	
			}
		}

		//settings data 
		$data['myaccount_data'] = $this->myaccount_model->get_account_data();					
		$this->load->view('admin/includes/admin_header');
		$this->load->view('admin/admin_myaccount', $data);
		$this->load->view('admin/includes/admin_footer');

    }

}