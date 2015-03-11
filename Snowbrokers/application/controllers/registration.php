<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
	$this->no_cache();
        $this->load->model('model_offer_banner');
	$this->load->model('model_top_banner');
	$this->load->model('model_middle_banner');
	$this->load->model('registration_model');
	$this->load->model('site_settingsmodel');
	$this->load->model('modelbanner_home_footer');
//	$this->load->model('modelgoals');
//	$this->load->model('modelgroup');
//	$this->load->model('modelevent');
//        $this->load->model('modelhome');
//        $this->load->model('modelsignup');
//	$this->load->model('modelsettings');
//	$this->load->model('modellogin');
	
	$this->load->library('pagination');
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
	$this->load->library('email');
	$this->load->library('session');
    }
    public function index()
    {
//        if($this->session->userdata('id'))
//        {
//            redirect('update_account');
//        }
//	 $data['country'] = $this->search_model->get_distinct_country();
//	 
//	    $data['site_name'] = $this->users_model->get_site_name();
//	    $site_name = $data['site_name'];
//	    $data['main_content'] = 'register';
//	    
//	    $this->load->view('template', $data);

	    $this->load->view('header/header');
	    $this->load->view('home/home');
	    $this->load->view('footer/footer');
	    //redirect('home');

    }

//=================================ADD BUYERS=== WORKED === PRITAM (29,30/7/14) ===========================================================

    public function add() {
	
	        $data['site_name'] = $this->registration_model->get_site_name();
            $site_name = $data['site_name'];
    
            if ($this->input->server('REQUEST_METHOD') == 'POST')
            {
             
//            $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
//            $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
//            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[people.email]');
//            $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
//            $this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[5]');
//            $this->form_validation->set_rules('address', 'Address', 'required|trim');
//            $this->form_validation->set_rules('state', 'State', 'required|trim');
//	    $this->form_validation->set_rules('company', 'Company Name', 'required|trim');
//            $this->form_validation->set_rules('country', 'Country', 'required|trim');
//            $this->form_validation->set_rules('website', 'Website', 'required|trim');
//            $this->form_validation->set_rules('company_pos', 'Company Position', 'required|trim');
//            $this->form_validation->set_rules('product_type', 'Product Type', 'required|trim');
//	    $this->form_validation->set_rules('agree','','required');
//            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>', '</strong></div>');
//      
//            if ($this->form_validation->run()==TRUE)
//            {
//                
//                //check email exist or not
//                //echo $this->users_model->check_exist($this->input->post('email'));
//                //die();
//                if($this->registration_model->check_exist($this->input->post('email')))
//                {
//                    $this->form_validation->set_message('email', 'The Email is already taken');
//                }
//                else
//                {
	    //==================Genrating random number(PRITAM-30/7/14)==========================
                    $date=date('Y-m-d');
                    $a=rand(1,200000);
                    $randmix=date("ymdhms").$a;
                    $key=md5($randmix);
            //====================================================================================       
                    
            //=======================Input Data for Buyers========================================
                if($this->input->post('product_type')=='')
                {
                    $product_type = '';
                }
	            else
                {
                    $product_type = implode(",",$this->input->post('product_type'));
                }
                
            if($this->input->post('check')=="buyers"){    
                      $news_letter_on = addslashes($this->input->post('subscription_for_newletter'));
                            $data_to_store_buyers = array(
                                    'first_name'    => addslashes($this->input->post('fname')),
                                    'last_name'     => addslashes($this->input->post('lname')),
                                    'email'         => addslashes($this->input->post('email')),
                                     'phone_number'  => addslashes($this->input->post('phone')),
                                    'password'      => md5($this->input->post('pass')),
                                     'address'	    => addslashes($this->input->post('address')),
                                     'state' 	    => addslashes($this->input->post('state')),
                                    'company' 	    => addslashes($this->input->post('company')),
                                    'country' 	    => addslashes($this->input->post('country')),
                                    'website' 	    => addslashes($this->input->post('website')),
                                    'company_position' 	    => addslashes($this->input->post('company_pos')),
                                    'product_type' 	    => $product_type,
                                     'register_date'	=> date("Y-m-d h:i:sa"),
                                    'customer_type' => 1,
                                     'key'	=> $key,
                                     'status'	=> '0'
                                );
		    //================================validation for email already exists or not========================//
		      if($news_letter_on=='on')
		    {
			$email_is_sbscripted_or_on = addslashes($this->input->post('email'));
		       $data_to_store_newsletter_table = array(
				   'email'   	 => $email_is_sbscripted_or_on,
				   'status'   	  => '0'
		    );
			$this->registration_model->store_news_letter('newsleter_subscription',$data_to_store_newsletter_table,$email_is_sbscripted_or_on);
		    }
		          $email=addslashes($this->input->post('email'));
		          $msg=$this->registration_model->mail_idcheck($email);
		  
                    if($msg>0)
                    {
                            $this->session->set_flashdata('flash_message','emailidexists');
                            redirect('registration');
                    }
                    else
                    {
                      $data= $this->registration_model->store_byers('people',$data_to_store_buyers);
                    }
            }
            //==============================END BUYRS===============================================
	    
	    //=======================Input Data for Sellers========================================
	    
            if($this->input->post('check')=="sellers"){    
                    $news_letter_on = addslashes($this->input->post('subscription_for_newletter'));
		   
                    $data_to_store_sellers = array(
                            'first_name'   	 => addslashes($this->input->post('fname')),
                            'last_name'   	  => addslashes($this->input->post('lname')),
                            'email'        	 => addslashes($this->input->post('email')),
			    'phone_number' 	 => addslashes($this->input->post('phone')),
                            'password'    	  => md5($this->input->post('pass')),
                            'website' 	   	 => addslashes($this->input->post('website')),
			    'company' 	   	 => addslashes($this->input->post('company')),
                            'company_position' 	=> addslashes($this->input->post('company_pos')),
                            'product_type' 	=> $product_type,
			    'register_date'	=> date("Y-m-d h:i:sa"),
                            'customer_type' 	=> 2,
			    'key'		=> $key,
			    'status'	=> '0'
                    );
	     //================================validation for email already exists or not========================//
	     
	     if($news_letter_on=='on')
	     {
		$email_is_sbscripted_or_on = addslashes($this->input->post('email'));
		$data_to_store_newsletter_table = array(
                            'email'   	 => $email_is_sbscripted_or_on,
                            'status'   	  => '0'
	     );
		 $this->registration_model->store_news_letter('newsleter_subscription',$data_to_store_newsletter_table,$email_is_sbscripted_or_on);
	     }
              $email=addslashes($this->input->post('email'));
              $msg=$this->registration_model->mail_idchecks($email);

                if($msg>0)
                {

                $this->session->set_flashdata('flash_message','emailidexists');

                redirect('registration');
                }
                else
                {
                    $data= $this->registration_model->store_byers('people',$data_to_store_sellers);
                }
            }
		
	    //==============================END SELLERS===============================================
	    
	//    if($data) {
	//	
	//	$this->session->set_flashdata('flash_message', 'saved');
	//	redirect('home');
	//    }
	//    
	//    else
	//    {
	//	$this->session->set_flashdata('flash_message', 'not_saved');
	//	redirect('home');   
	//    }
	//    
	    //==============================SEND ACTIVATION LINK VIA EMAIL==(PRITAM=>30/7/14)======================
	     $data=$this->registration_model->mailbody(8); // email template from emailtemplate table
		 $details=$data[0]['details'];
		 $firstname=$this->input->post('fname');
		 $lastname=$this->input->post('lname');
		 $name=$firstname.$lastname;   // concadinate first name last name
		 $sitename = $this->site_settingsmodel->siet_name(); // website name
		 $link=base_url().'activation/account/'.$key;   //link
		 $details=str_replace("[NAME]","$name","$details");
		 $details=str_replace("[DEMO LINK]","","$details");
		 $details=str_replace("[SITENAME]","$sitename","$details");
		 //$this->email->from('pritam.polley@esolzmail.com',$site_name);
		
		 //$link=base_url().'activation/account/'.$key;
		// MAIL TO USER AFTER REGISTER
		$message = $details;
		$this->site_settingsmodel->send_mail($this->input->post('email'),$data[0]['subject'],$message);
		// MAIL TO ADMIN FOR ACTIVE USER
		$admin_email = $this->registration_model->get_adminemail();
		$admin_data = $this->registration_model->mailbody(12); // email template from emailtemplate table
		$details_admin = $admin_data[0]['details'];
		$userdata = 'Name : '.$name."<br/>Email : ".$this->input->post('email')."<br/>User type : ".$this->input->post('check');
		$details_admin = str_replace("[USER DETAILS]","$userdata","$details_admin");
		$details_admin = str_replace("[LINK]","$link","$details_admin");
		$details_admin = str_replace("[SITENAME]","$sitename","$details_admin");
		$message_admin = $details_admin;
        //echo $admin_email;
		$this->site_settingsmodel->send_mail($admin_email,$admin_data[0]['subject'],$message_admin);
		
		$this->session->set_flashdata('flash_message', 'not_activated');
		//echo 'hi';
		redirect('registration/index');
		
		//echo "<script>alert('mail sent')</script>";
		
	    //==========================================================================================================
                //}
                

            //}
            //else {
            //    echo "<script>alert('Registration unseccessflk')</script>";
            //} 
        }
    }
 //============================================ END OF ADD FUNCTION ============================================================================
 
 //============================================LOGIN FUNCTION (PRITAM -- 29/7/14)===============================================================
 
    public function login() {
        
        $email= $this->input->post('email');
        $pass= md5($this->input->post('pass'));
        $check=$this->input->post('remember_me');
	//echo $check;die();
	//if($this->input->post('remember_me')==1)
	//{
	//setcookie('snowbrokers_cookie_value',1,time()+60*60*60*24*365);
	//setcookie('snowbrokers_cookie_email',trim($this->input->post('email')),time()+60*60*60*24*365);
	//setcookie('snowbrokers_cookie_password',trim($this->input->post('pass')),time()+60*60*60*24*365);
	//}
	//else
	//{
	//
	//setcookie('snowbrokers_cookie_value','',1);
	//setcookie('snowbrokers_cookie_email','',1);
	//setcookie('snowbrokers_cookie_password','',1);
	//}
        $data = $this->registration_model->login_validate($email,$pass,$check);
	
        if($data){
            
            //echo "<script>alert('Login Successful')</script>";
	    $user=array(
			'email' => $data[0]['email'],
			'id' => $data[0]['id']
	    );
	    $this->session->set_userdata($user);
	    
//            $this->load->view('header/header');
//	    $this->load->view('home/home');
//	    $this->load->view('footer/footer');
	    if($check==1)
	    {
		setcookie('snowbrokers_cookie_value',1,time()+60*60*60*24*365, "/");
		setcookie('snowbrokers_cookie_email',trim($this->input->post('email')),time()+60*60*60*24*365, "/");
		setcookie('snowbrokers_cookie_password',trim($this->input->post('pass')),time()+60*60*60*24*365, "/");
		//echo $this->input->cookie('snowbrokers_cookie_value');die();
	    }
	    else
	    {
	    
		setcookie('snowbrokers_cookie_value','',1);
		setcookie('snowbrokers_cookie_email','',1);
		setcookie('snowbrokers_cookie_password','',1);
	    }
	    redirect('myaccount');
        }
        else {
            
            //echo "<script>alert('Invalid User ID or Password')</script>";
            redirect('registration');
        }
    }
    
    public function logout() {
	
	$array_items = array('email' => '', 'id' => '');
	$this->session->unset_userdata($array_items);
	
	//$this->load->view('header/header');
	//$this->load->view('home/home');
	//$this->load->view('footer/footer');
	redirect('home');
    }
    function email()
    {
	        $email = $this->input->post('emailvalid');
		$msg['data']=$this->registration_model->mail_idcheck($email);
		  
		    if($msg>0)
		    {
		     
		       $this->load->view('header/email_ajax',$msg);
		    }
    }
//    public function login(){
//	
//
//        $email= $this->input->post('email');
//        $pass= md5($this->input->post('pass'));
//	$checkbox = $this->input->post('cc');
//	
//	//echo $checkbox;
//	//die();
//	$user_data = $this->users_model->login_validate($email,$pass);
//	
//	
//	//print_r($user_data);
//	
//	if($user_data)
//	{
//	    $user=array(
//			'email' => $user_data[0]['email'],
//			'id' => $user_data[0]['id']
//	    );
//	    $this->session->set_userdata($user);
//	    $mail_session=$this->session->userdata('email');
//	    $id_session=$this->session->userdata('id');
//	     
//	    //==============Remember Me=============//
//           
//           if($checkbox == "check")
//           {
//		    $pass1= $this->input->post('pass');
//                    $time=time()+60*60*24*30;
//                    $cookie = array(
//                         'name'   => 'email',
//                         'value'  => $mail_session,
//                         'expire' => $time,
//                         'domain' => '',
//                         'path'   => '/',
//                         'prefix' => '',
//                         'secure' => FALSE,
//                     );
//                    $this->input->set_cookie($cookie);
//                     
//                    $cookie2 = array(
//                         'name'   => 'pass',
//                         'value'  => $pass1,
//                         'expire' => $time,
//                         'domain' => '',
//                         'path'   => '/',
//                         'prefix' => '',
//                         'secure' => FALSE,
//                     );
//                     $this->input->set_cookie($cookie2);
//		     
//		     $cookie3 = array(
//                         'name'   => 'chk',
//                         'value'  => 'yes',
//                         'expire' => $time,
//                         'domain' => '',
//                         'path'   => '/',
//                         'prefix' => '',
//                         'secure' => FALSE,
//                     );
//                     $this->input->set_cookie($cookie3);
//		     
//		     $cookie4 = array(
//                         'name'   => 'chek',
//                         'value'  => $checkbox,
//                         'expire' => $time,
//                         'domain' => '',
//                         'path'   => '/',
//                         'prefix' => '',
//                         'secure' => FALSE,
//                     );
//                     $this->input->set_cookie($cookie4);
//           }
//           else if($checkbox != "check")
//           {
//	    delete_cookie('email');
//	    delete_cookie('pass');
//	    delete_cookie('chek');
//	   }
//           //==============Remember Me=============//
//	   
//	   
//	    redirect('update_account');
//	}
//	else {
//	     redirect('register');
//	}
//   
//    }
//    public function update_account(){
//	
//	$mail_session=$this->session->userdata('email');
//	$id=$this->session->userdata('id');
//	
//	$data['country'] = $this->search_model->get_distinct_country();
//	
//	$datavl = $this->users_model->get_id_by_name($mail_session,'users');
//	
//	$datacountry = $this->update_account_model->fetch_company($id,'company');
//	
//	//echo $id;	
//	//print_r($datacountry);
//	//die();
//        $category_name = $this->admin_category_model->select_category_list1();  /*get all the category*/
//	$data['category_name'] = $category_name;
//        
//	if($mail_session!='')
//	{
//	    $data['var'] = $datavl;
//	    $data['company'] = $datacountry;
//	    $data['main_content'] = 'update_account';
//	    $this->load->view('template', $data);
//	}
//	else
//	{
//	    redirect('register');
//	}
//    }
//    
//    public function user(){
//	
//	$data['main_content'] = 'active';
//	$this->load->view('template', $data);  
//    }
//    
//    public function logout(){
//	$array_items = array('email' => '','id'=>'');
//	$this->session->unset_userdata($array_items);
//	redirect('register');
//    }
protected function no_cache()
	{
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
	}
}
?>