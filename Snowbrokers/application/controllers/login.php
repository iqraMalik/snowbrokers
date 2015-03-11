<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['main_content'] = 'login';
        
        $this->load->library('facebook');

        $user = $this->facebook->getUser();
        
        if ($user)
        {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }
        else
        {
            $this->facebook->destroySession();
        }

        if ($user)
        {

            $data['logout_url'] = site_url('login/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        }
        else
        {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('login/'), 
                'scope' => array("email") // permissions here
            ));
        }
        
        
        $this->load->view('template', $data);
    }
    //facebook logout
    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('login/');
    }
    public function Login()
    {
        
        //echo "Checking...";
        //die();
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $this->form_validation->set_rules('login_email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('login_pass', 'Password', 'required|trim');
            
            if ($this->form_validation->run())
            {
                $user_email = $this->input->post('login_email');
                $password = md5($this->input->post('login_pass'));
        

        
                $is_valid = $this->users_model->login_validate($user_email, $password);
                if($is_valid)
                {
                    //echo "Logged In";
                    //die();
                    
                        $uid = $this->users_model->get_id_by_name($user_email,'users');		
                        $user_id = $uid[0]['id'];
                        // store the some values in session
                        $data = array(
                                'userEmail' => $user_email,
                                'userId' => $user_id,
                                'user_logged_in' => TRUE
                        );
                        $this->session->set_userdata($data);
                }
                else
                {
                     $this->form_validation->set_message('required', 'Login credential Failed..');
                }
            }

        }
        $data['main_content'] = 'login';
        $this->load->view('template', $data);            
    }
    

}

?>