<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password extends CI_Controller {
    
	public function __construct()
	{
                parent::__construct();
                
		$this->load->library('pagination');
                $this->load->helper(array('form','url'));
                $this->load->library('form_validation');
                $this->load->library('email');
                $this->load->library('session');
                $this->load->model('registration_model');
		$this->load->model('site_settingsmodel');
		$this->load->model('model_offer_banner');
		$this->load->model('model_top_banner');
		$this->load->model('model_middle_banner');
		$this->load->model('modelbanner_home_footer');
	}
	
	function index()
	{
            $this->load->view('header/header');
	    $this->load->view('home/forgot_pass');
	    $this->load->view('footer/footer');
	}
        
        public function send_mail()
        {
            $data['site_name'] = $this->registration_model->get_site_name();
            $siteMail= $data['site_name'];
           
            //$mail=$this->input->post('email');
                            
            if ($this->input->server('REQUEST_METHOD') == 'POST')
            {
                  
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_error_delimiters('<div class="alert alert-error" style="color: red;"><strong>', '</strong></div>');
            
            
                if ($this->form_validation->run())
                {
                     $email = $this->input->post('email'); 
                     $data= $this->registration_model->get_username($email);
		    

                   //echo "<pre>";
                   //print_r($data['uname']);
                   //echo "</pre>";
                   //die();
                    if($data)
                    {
                       
                        
                            $this->session->set_flashdata('flash_message', 'send_msg');
                            $fname= $data->first_name;
                            $lname= $data->last_name;
                            $id= $data->id;
                            //echo $uname;
                            $sitename = $this->site_settingsmodel->siet_name(); 
                            $link=base_url().'retrieve_pass/';
                            $pass=rand(10,100).$id;
                            $password=md5($pass);
			    $data=$this->registration_model->mailbody(16);
			    $details=$data[0]['details'];
			    
			    $details=str_replace("[NAME]","$fname.$lname","$details");
			    $details=str_replace("[PASSWORD]","$pass","$details");
		            $details=str_replace("[LINKS]","$link","$details");
		            $details=str_replace("[SITENAME]","$sitename","$details");
		 //$this->email->from('pritam.polley@esolzmail.com',$site_name);
		
		 //$link=base_url().'activation/account/'.$key;
		// MAIL TO USER AFTER REGISTER
		$message = $details;
                            //$message ="Hello  ".ucfirst($fname)." ".$lname."PASSWORD:".$pass.",
                            //This is your new password please login with this and change the password after login with this link.
                            //".$link;
                        $data= $this->registration_model->changepassword($id,$password);
			if(!empty($data))
			{
                        $this->site_settingsmodel->send_mail($this->input->post('email'),'Retrieve Your Password',$message);  
                        $this->session->set_flashdata('flash_message', 'mail');
			}
                        redirect('forgot_password');
                        
                    }
                    else
                    {
                        //echo "jjghjg";
                        //die();
                        $this->session->set_flashdata('flash_message', 'not_mail');
                        redirect('forgot_password');
                    }
                }
                    
    
            }
           
            $this->load->view('header/header');
	    $this->load->view('home/forgot_pass');
	    $this->load->view('footer/footer');
        }
    function email()
    
 {
	$email = $this->input->post('emailvalid');
	$msg['data']=$this->registration_model->mail_idchecks($email);
       if($msg>0)
	{
	  $this->load->view('home/email_ajax',$msg);
	}
   
 }    
 }
?>