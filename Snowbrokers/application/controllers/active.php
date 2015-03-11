<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Active extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['main_content'] = 'active';
        
        $this->load->view('template', $data);
    }
    
    public function active()
    {
        $register_code = $this->url->segment(3);
        if ($register_code == '')    {
            
            //echo 'error no registration code in URL';
            $this->session->set_flashdata('flash_message', 'error');
            //exit();
        }
        else
        {
            $this->session->set_flashdata('flash_message', 'success');
        }
        $data['main_content'] = 'active';
        $this->load->view('template', $data);  
    }
}
?>