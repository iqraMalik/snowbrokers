<?php
class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modeladmin');
		
		if($this->isLoggedIn()) 
		{
			redirect('dashboard/index');
			
		}
	}
	
	function isLoggedIn()
	{
		$isloggedin = $this->session->userdata('is_logged_in');

		if($isloggedin > 0) 
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	
	function index()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$this->session->set_userdata('success_msg', "");
		$this->session->set_userdata('error_msg', "");

		$this->load->view('login/index',$data);
		
	}
	
	function validate_credentials()
	{
		
		
		 $user_name = $this->input->post('user_name'); 
		
		 $userpassword = $this->input->post('password'); 
		 $password = $this->modeladmin->getpassword($user_name);
		if($password!="")
		{
		$this->load->library('encrypt');
		$realpassword = $this->encrypt->decode($password); 
		if($userpassword==$realpassword)
		{
		$is_valid = $this->modeladmin->validate($user_name);
		if($is_valid==0)
		{
			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true,
				'is_superadmin'=>0
			);
			$this->session->set_userdata($data);
			//print_r($data);die;
			redirect('dashboard/index');
		}
		elseif($is_valid==1)
		{
			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true,
				'is_superadmin'=>1
			);
			$this->session->set_userdata($data);
			redirect('dashboard/index');
		}
		}
		else // incorrect username or password
		{
			
		 
			$data['message_error'] = TRUE;
			$this->session->set_userdata('error_msg', "Invalid username / password!");
			redirect('login/index');	
		}
		
		}
		else{
			
			$data['message_error'] = TRUE;
			$this->session->set_userdata('error_msg', "Invalid username / password!");
			redirect('login/index');
		}
		
		if($this->input->post('remember_me')==1)
		{
	
		    setcookie('cookie_value',1,time()+60*60*60*24*365);
		    setcookie('cookie_email',$this->input->post('user_name'),time()+60*60*60*24*365);
		    setcookie('cookie_password',$this->input->post('password'),time()+60*60*60*24*365);
		}
		else
		{
	
		    setcookie('cookie_value','',1);
		    setcookie('cookie_email','',1);
		    setcookie('cookie_password','',1);
		}
		
		
		
	}
	
	function do_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == TRUE)
		{
			if($this->modeladmin->authenticateUser())
			{
				$this->session->set_userdata('success_msg', "You have logged in successfully.");
				redirect(base_url()."login");
			} 
			else 
			{
				$this->session->set_userdata('error_msg', "Invalid username / password!");
				redirect(base_url()."login");
			}
		}
		else 
		{
			$data['error_msg'] = "Invalid username / password!";
			$this->load->view('login/index',$data);
		}

	}
	
	function  do_forgotpassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		//echo "jay";
		if($this->form_validation->run() == TRUE)
		{
			//echo "jay1";
			$result=$this->modeladmin->sendEmail();
			//echo $result;die;
			if($result==1)
			{
 				$data['success_msg'] = "Mail has been sent successfully to your email.";
				$this->load->view('login/forgotpassword',$data);
			} 
			else 
			{
 				$data['error_msg'] = "Email id not found!";
				$this->load->view('login/forgotpassword',$data);
			}
		}
		else 
		{
			$data['error_msg'] = "You have entered wrong password";
			$this->load->view('login/forgotpassword',$data);
		}
		
	}
	function passwordgenerate()
	{
		$this->load->view('login/passwordgenerate');
	}

	function  do_forgotpassword_confirm()
	{

		$update=$this->modeladmin->updatePassword();
		if($update==1)
		{
			$data['success_msg'] = "Password successfully update";
			$this->load->view('login/index',$data);
		}
		else
		{
			$data['error_msg'] = "Failed to update password";
			redirect('login/passwordgenerate/'.$this->input->post('admin_id'));
		}
	
	}
	
	function  forgotpassword()
	{
		$this->load->view('login/forgotpassword');
	}

	function  forgotpasswordurl()
	{
		$this->load->view('login/forgotpasswordurl');
	}

	function changepass()
	{
		if(!$this->isLoggedIn()) 
		{
			redirect(base_url()."login/index/");
			return false;
		} 

		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$this->session->set_userdata('success_msg', "");
		$this->session->set_userdata('error_msg', "");
		
		$this->load->view('login/changepass',$data);
		
	}
	
	function do_changepass()
	{
		$id = $this->session->userdata('user_data');
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[new_password]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$this->session->set_userdata('success_msg', "");
		$this->session->set_userdata('error_msg', "");

		if($this->form_validation->run())
		{
			if($this->modeladmin->valideOldPassword()) 
			{
				$this->modeladmin->updatePassword($id);
				$data['success_msg'] = "Password Updated";
			} 
			else 
			{
				$data['error_msg']  = "Invalid Old Password ...";
			}

			$this->load->view('login/changepass',$data);
		}
		else
		{
			$data['error_msg']  = " ";
			$this->load->view('login/changepass',$data);
		}
	}

}

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */

?>