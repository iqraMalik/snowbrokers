<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        
        $this->load->library('email');
    }
    public function index()
    {
        $data['main_content'] = 'register';
        
        $this->load->view('template', $data);
    }
    
    public function add()
    {
        
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[5]');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>', '</strong></div>');
        
            if ($this->form_validation->run())
            {
                //check email exist or not
                //echo $this->users_model->check_exist($this->input->post('email'));
                //die();
                if($this->users_model->check_exist($this->input->post('email')))
                {
                    $this->form_validation->set_message('email', 'The Email is already taken');
                }
                else
                {
                    //by soumili//
                    //genrating random number//
                    
                    $date=date('Y-m-d');
                    $a=rand(1,200000);
                    $randmix=date("ymdhms").$a;
                    $key=md5($randmix);
                    
                    //genrating random number//
                    //by soumili//
                    
                    $data_to_store = array(
                            'first_name' => $this->input->post('fname'),
                            'last_name'  => $this->input->post('lname'),
                            'email'      => $this->input->post('email'),
                            'password'   => md5($this->input->post('pass')),		
                            'key'        => $key		
                    );
                    
                    if($this->users_model->store_user('users',$data_to_store))
                    {
                        $this->session->set_flashdata('flash_message', 'saved');
                        ////send a notification mail for user registration
                        //by Anupam
                        $this->email->from('anupam@esolzmail.com', 'Anupam Guchait');
                        $this->email->to($this->input->post('email')); 
                        
                        $this->email->subject('Your Registration information in Snowbrokers.');
                        
                        $link=base_url().'active/'.$key;
                        
                        $message = "Hello ".$this->input->post('fname')." ".$this->input->post('lname').",
                        
                        We have recieved your account registration application, please click on the below link to actiate your account.
                        
                        ".$link."";
                        
                        $this->email->message($message);	
                        
                        $this->email->send();
                        
                        echo $this->email->print_debugger();
                        //send notification mail end

                        redirect('register');
                    }
                    else
                    {
                        $this->session->set_flashdata('flash_message', 'not_saved');
                        redirect('register');   
                    }                    
                }
                

            }
        }
        $data['main_content'] = 'register';
        $this->load->view('template', $data); 
    }
}
?>