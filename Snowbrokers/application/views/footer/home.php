<?php
class Home extends CI_Controller{


    function __construct()
    {
        parent::__construct();
        $this->load->model('modelhome');
        //$this->no_cache();
	$this->load->model('registration_model');
	$this->load->model('modelsports');
	$this->load->model('modelgroup');
	$this->load->model('modellogin');
	$this->load->model('modelgoals');
        $this->load->model('modelhome');
	$this->load->model('modelevent');
        $this->load->model('modelsignup');
	$this->load->model('modelsettings');
	$this->load->model('modelfooter');
	$this->load->library('pagination');
	$this->load->helper(array('form','url'));//=================ADDED BY PRITAM (29/7/14)====//
	$this->load->library('form_validation');//=================ADDED BY PRITAM (29/7/14)====//
	$this->modelsettings->site_settings();
	$this->limit = $this->modelsignup->per_page();
    }
    
    public function index()
    {
	$this->load->view('header/header');
        $this->load->view('home/home');
        $this->load->view('footer/footer');
    }
//    public function about()
//    {
//	//echo "sdsds";
//        $this->load->view('header/header');
//        $this->load->view('privacy/about');
//        $this->load->view('footer/footer');
//	
//    }
//        public function privacy()
//    {
//	
//        $this->load->view('header/header');
//        $this->load->view('privacy/privacy');
//        $this->load->view('footer/footer');
//    }
//    
//     function activation()
//    {
//        if($this->uri->segment(3)=='')
//        {
//	   
//            $this->session->set_userdata('error_msg_reg','Sorry to activate your profile.');
//
//	    $this->session->set_flashdata('login_modal_activate_profile_reg',1);
//	    redirect('home');
//        }
//        else
//        {
//            $result=$this->modelsignup->activation($this->uri->segment(3));
//            if($result['message']=='Update successfully')
//            {
//                $session_value=array(
//                'user_id' => $result['user_id'],
//                'user_type' => $result['user_type'],
//                'is_login_true' => 1,
//                );
//                $this->session->set_userdata($session_value);
//		if($this->uri->segment(3)!='')
//		{
//		    $decode_id=base64_decode(urldecode($this->uri->segment(3)));
//		    //$this->session->set_userdata('success_msg',"You have successfully activated your profile");
//		    //redirect('signup/my_account');
//		    
//		    //$this->session->set_userdata('success_msg_reg','You have successfully activated your profile.');
//
//		     // $this->session->set_flashdata('login_modal_activate_profile_reg',1);
//		     
//		      $result=$this->modellogin->user_login_direct($decode_id);
//		      //echo '==='.$result;
//		      if($result ==1)
//		      {
//			$this->session->set_userdata('success_msg','You have logged in successfully');
//			redirect('home/my_account');
//		      }
//		      else{
//			$this->session->set_userdata('error_msg_reg','There is some problem regarding login. Please try again.');
//			$this->session->set_flashdata('login_modal_activate_profile_reg',1);
//		       redirect('home');
//		      }
//		    
//		
//		     redirect('home');
//		}
//		
//            }
//            if($result['message']=='Already activate')
//            {
//		$this->session->set_userdata('error_msg_reg','Profile is already Activated. Please login here.');
//
//		$this->session->set_flashdata('login_modal_activate_profile_reg_already',1);
//                redirect('home');
//            }
//            if($result['message']=='User not exist')
//            {
//		$this->session->set_userdata('error_msg_reg','User does not exists.');
//
//		$this->session->set_flashdata('login_modal_user_not_exists_reg',1);
//               redirect('home');
//            }
//        }
//	
//    }
//    
//    public function signup_instructor()
//    {
//	$encrypt_id = $this->uri->segment(3);
//	$user_instructor_id = $this->uri->segment(4);
//	//echo $user_instructor_id;die;
//	$user_id=base64_decode($encrypt_id);
//	$result=$this->modelhome->del_instructor_email($user_id);
//	$this->session->set_flashdata('signup_modal_instructor_reg',1);
//        redirect('home/index/'.$user_id.'/'.$user_instructor_id);
//    }
//    
//    public function u_login() 
//    {
//	 $this->load->model('modellogin');
//        $email=$this->input->post('login_email');
//        $password=$this->input->post('login_password');
//	
//	//echo '==='.$this->input->post('ex2_a');die;
//	
//	
//   
//        if($this->input->post('ex2_a')==1)
//        {
//	    $cookie_1 = array(
//			'name'   => 'cookie_value',
//			'value'  => 1,
//			'expire' => time() + 365 * 24 * 60 * 60
//		    );
//	    $this->input->set_cookie($cookie_1);
//	    $cookie_2 = array(
//		'name'   => 'cookie_email',
//		'value'  => $email,
//		'expire' => time() + 365 * 24 * 60 * 60
//	    );
//	
//	    $this->input->set_cookie($cookie_2);
//	    $cookie_3 = array(
//		'name'   => 'cookie_password',
//		'value'  => $password,
//		'expire' => time() + 365 * 24 * 60 * 60
//	    );
//	    $this->input->set_cookie($cookie_3);
//
//           // setcookie('cookie_value',1,time()+60*60*60*24*365);
//            //setcookie('cookie_email',$this->input->post('login_email'),time()+60*60*60*24*365);
//            //setcookie('cookie_password',$this->input->post('login_password'),time()+60*60*60*24*365);
//        
//	}
//        else
//        {
//	    $cookie_1 = array(
//		'name'   => 'cookie_value',
//		'value'  => '',
//		'expire' => 1
//	    );
//	    $this->input->set_cookie($cookie_1);
//	    
//	    $cookie_2 = array(
//		'name'   => 'cookie_email',
//		'value'  => '',
//		'expire' => 1
//	    );
//	    $this->input->set_cookie($cookie_2);
//	    
//	    $cookie_3 = array(
//		'name'   => 'cookie_password',
//		'value'  => '',
//		'expire' => 1
//	    );
//	    $this->input->set_cookie($cookie_3);
//
//            //setcookie('cookie_value','',1);
//            //setcookie('cookie_email','',1);
//            //setcookie('cookie_password','',1);
//        }
//	
//        $result=$this->modellogin->user_login();
//        
//
//        if($result['value']=='0')
//        {
//            $this->session->set_userdata('error_msg_reg','Email or password does not match. Please try again.');
//             $this->session->set_flashdata('login_modal_activate_profile_reg',1);
//	    redirect('home');
//        }
//        if($result['value']=='not activate')
//        {
//            $this->session->set_userdata('error_msg_reg','Your profile has not been activated.');
//             $this->session->set_flashdata('login_modal_activate_profile_reg',1);
//	    redirect('home');
//        }
//        if($result['value']==1)
//        {
//            $session_value=array(
//                'user_id' => $result['user_id'],
//                'user_type' => $result['user_type'],
//                'is_login_true' => 1,
//                );
//            $this->session->set_userdata($session_value);
//    
//            
//            $this->session->set_userdata('success_msg','You have logged in successfully');
//            
//           
//           // print_r($session_value);
//            if($this->session->userdata('user_id')!='')
//            {
//		$result=$this->modellogin->check_first_login($email);
//		if($result ==0)
//		{
//		    $this->session->set_flashdata('login_modal_after_half_reg',1);
//		    redirect('home');
//		}
//		else
//		{
//		    redirect('home/my_account');
//		}
//            }
//            else
//            {
//		
//                redirect('home');
//            }
//        }
//    }
//	public function press()
//    {
//	
//        $this->load->view('header/header');
//        $this->load->view('privacy/press');
//        $this->load->view('footer/footer');
//    }
//    public function jobs()
//    {
//	
//        $this->load->view('header/header');
//        $this->load->view('privacy/jobs');
//        $this->load->view('footer/footer');
//    }
//    public function terms()
//    {
//	
//        $this->load->view('header/header');
//        $this->load->view('privacy/terms');
//        $this->load->view('footer/footer');
//    }
//	public function help()
//    {
//	
//        $this->load->view('header/header');
//        $this->load->view('privacy/help');
//        $this->load->view('footer/footer');
//    }
//    public function blog()
//    {
//	
//        $this->load->view('header/header');
//        $this->load->view('privacy/blog');
//        $this->load->view('footer/footer');
//    }
//    //public function signup()
//    //{
//    //    $this->session->set_userdata('user_email',$this->input->post('email'));
//    //    redirect('signup/user');
//    //}
    	public function offline()
    {
        $this->load->view('header/headeroffline');
        $this->load->view('home/offline');
    }
    
//   /*public function registration_complete()
//    {
//	
//	$result=$this->modelhome->create_members_full();
//	
//	
//	if($result ==1)
//	{
//	     $this->session->set_userdata('success_msg','Your have Completed registration.');
//	    redirect('home/my_account');
//	}	
//	
//	else
//	{
//	    $this->session->set_userdata('error_msg','Sorry to submit your Data, Please try again!');
//	     redirect('home');
//	}
//    }*/
//     
//    public function my_account()
//    {
//	$this->load->model('modelevent');
//	$this->load->model('modelgroup');
//	$this->load->model('modelgoals');
//	//print_r($this->session->all_userdata());
//	if($this->session->userdata('user_id')=='')
//	{
//	    $this->session->set_userdata('error_msg_reg',"Please login first.");
//	    $this->session->set_flashdata('login_modal_after_normal_reg',1);
//	    redirect('home');
//	}
//	else
//	{
//	   
//	    $result=$this->modelsettings->GetUserName($this->session->userdata('user_id'));
//	    if(count($result)>0)
//	    {
//		$this->load->view('header/header');
//		$this->load->view('header/banner_header');
//		$this->load->view('member/my_account');
//		$this->load->view('footer/footer');
//	    }
//	    else
//	    {
//		//unset($this->session->userdata);
//		//is_login_true
//		$this->session->unset_userdata('is_login_true');
//		$this->session->unset_userdata('user_id');
//		$this->session->unset_userdata('user_type');
//		$this->session->set_userdata('error_msg',"User does not exist.");
//		$this->session->set_flashdata('login_modal_after_normal_reg',1);
//		redirect('home');
//	    }
//	}
//    }
//    
//    public function update_profile_account()
//    {
//	$result=$this->modelhome->update_members_full();
//	if($result ==1)
//	{
//	     $this->session->set_userdata('success_msg','Your Profile has updated Successfully.');
//	     
//	    redirect('home/my_account');
//	}	
//	
//	
//    }
//    
//    public function photos()
//    {
//	
//	$this->load->view('photos/create_albumn_name');
//	
//	//$this->load->view('photos/albumn_create');
//	
//    }
//    
//     public function create_album()
//    {
//	
//	$result['data']=$this->modelhome->create_albumn();
//	$this->load->view('header/header');
//	$this->load->view('header/banner_header');
//	$this->load->view('photos/albumn_create',$result);
//	$this->load->view('footer/footer');
//    }
//    
//    public function upload_albumn()
//    {
//	$result=$this->modelhome->upload_albumn();
//	//redirect('signup/all_albumn');
//    }
//    public function upload_albumn_more()
//    {
//	$result=$this->modelhome->upload_albumn_more();
//	//redirect('signup/all_albumn');
//    }
//    
//   
//    
//    public function update_status_data()
//    {
//	$result=$this->modelhome->update_status_data($_REQUEST['user_ids'],"'".$_REQUEST['text_area_status']."'");
//	$user_pic=$this->modelhome->user_pic();
//	$username = $this->modelhome->user_name();
//	$posted_on = DATE("Y-m-d H:i:s");
//	$res = '<div class="commentsingle">
//			<div class="commenttop-top">
//				
//			<div class="commentimg"><img src="'.base_url().'image_crop_thumb.php?img_path='.PHYSICAL_PATH.'images/profile_pic/crop_kept_thumb/'.$user_pic.'&width=59&height=58" alt=""></div>
//			<div class="commenttextarea">
//			    <div class="commentopfull">
//				<div class="head"><a href="#">'.$username.' Added New Status</a></div>
//				<div class="Dayscount" id="ajax_show_time">Just Now</div>
//				<input type="hidden" value="'.$posted_on.'" id="time_posted"/>
//			    </div>';
//			    foreach($result as $val)
//			    {
//			     $res .='<div class="commenttxt">'.$val->thoughts.'</div>';
//			    }
//			 $res .= '</div>
//		    </div>
//		    <div class="commentbottom-bottom">
//			<div class="like-icon"><a href="#">Like</a></div>
//			<div class="comment-icon"><a href="#">Comment</a></div>
//		    </div>
//		</div>';
//		
//		
//		echo $res;
//    }
//    
//        
//    public function update_status()
//    {
//		$user_pic=$this->modelhome->user_pic();
//		$result=$this->modelhome->update_status($_REQUEST['user_ids'],$_REQUEST['phto_flag']);
//		$username = $this->modelhome->user_name();
//		//echo "<pre>";
//		//print_r($result);
//		$tot_photos = $_REQUEST['total_photos'];
//		$posted_on = DATE("Y-m-d H:i:s");
//		$res = '<div class="commentsingle">
//			<div class="commenttop-top">
//				
//			<div class="commentimg"><img src="'.base_url().'image_crop_thumb.php?img_path='.PHYSICAL_PATH.'images/profile_pic/crop_kept_thumb/'.$user_pic.'&width=59&height=58" alt=""></div>
//			<div class="commenttextarea">
//			    <div class="commentopfull">
//				<div class="head"><a href="#">'.$username.' Added '.$tot_photos.' Photos</a></div>
//				<div class="Dayscount" id="ajax_show_time_pic">Just Now</div>
//				<input type="hidden" value="'.$posted_on.'" id="time_posted_pic"/>
//
//			    </div>';
//			    foreach($result as $val)
//			    {
//			     $res .='<div class="commenttxt" style="padding-top: 5px;"><img src="'.base_url().'image_crop_thumb.php?img_path='.PHYSICAL_PATH.'images/albumn_photos/thumb_medium/'.$val->photos.'&width=120&height=120" alt="" style="float:left;padding-left:10px"></div>';
//			    }
//			 $res .= '</div>
//		    </div>
//		    <div class="commentbottom-bottom">
//			<div class="like-icon"><a href="#">Like</a></div>
//			<div class="comment-icon"><a href="#">Comment</a></div>
//		    </div>
//		</div>';
//		
//		
//		echo $res;
//
//    }
//    
//    public function cancel_status()
//    {
//	$result['data'] = $this->modelhome->cancel_status($_REQUEST['user_ids']);
//    }
//    
//    public function upload_albumn_ie()
//    {
//	$result=$this->modelhome->upload_albumn_ie();
//	redirect('home/all_albumn');
//    }
//    public function all_albumn()
//    {
//	$result['data']=$this->modelhome->all_albumn();
//	$this->load->view('header/header');
//	$this->load->view('header/banner_header');
//	//$this->load->view('event/index');
//	$this->load->view('photos/index',$result);
//	$this->load->view('footer/footer');
//    }
//      public function getallphotos()
//    {
//	$albumn_id = $this->uri->segment(3);
//	
//	$result['data'] = $this->modelhome->getallphotos($albumn_id);
//	$this->load->view('header/header');
//	$this->load->view('header/banner_header');
//	$this->load->view('photos/single_albumn',$result);
//	$this->load->view('footer/footer');
//	
//    }
//    public function edit_albumn()
//    {
//	$albumn_id = $this->uri->segment(3);
//	
//	$result['data'] = $this->modelhome->getallphotos($albumn_id);
//	$this->load->view('header/header');
//	$this->load->view('header/banner_header');
//	$this->load->view('photos/single_albumn_edit',$result);
//	$this->load->view('footer/footer');
//    }
//     public function upload_albumn_edit()
//    {
//	$result=$this->modelhome->upload_albumn_edit();
//    }
//    
//      public function pic_save_ie()
//    {
//	$result=$this->modelhome->pic_save_ie();
//	$albumn_id = $this->uri->segment(3);
//	redirect('home/edit_albumn/'.$albumn_id);
//    }
//    
//       public function logout()
//    {
//	//print_r($this->session->all_userdata())
//	//echo $this->session->userdata('user_id');die;
//	$data = array(
//	    'user_id' => '',
//	    'is_login_true'  => 0,
//	    'user_type' => '',
//	);
//	$this->session->unset_userdata($data);
//	 $this->session->set_flashdata('login_modal_activate_profile_reg',1);
//	$this->session->set_userdata('success_msg_reg','You have logged out successfully');
//	 redirect('home');
//	
//	
//    }
//    
//    public function search_instructor()
//    {
//	$result=$this->modelhome->search_instructor();
//	//echo "<pre>";
//	//print_r($result);
//	if(count($result)>0 AND $result!=0)
//	{
//	    foreach($result as $val)
//	    {
//		//echo $val->email;
//		$data[] = array(
//		 'label' => $val->email,
//		'value' => $val->email
//		);
//	    }
//	    echo json_encode($data);
//	    flush();
//	}
//	else{
//	    $data_no[] = array(
//		 'label' => 'No result found',
//		'value' => 'No result found'
//		);
//	    echo json_encode($data_no);
//	    flush();
//	}
//	
//    }
//    
//    public function instructor_list()
//    {
//	$remove_button = "<img src='".base_url()."images/1405090829_cross.png' alt='remove'>";
//
//	$result=$this->modelhome->instructor_list($_REQUEST['link_instructor']);
//	
//	if(count($result)>0 AND $result !=0 AND $result !='Error in inserting data')
//	{
//	   
//	    foreach($result as $val)
//	    {
//		
//		echo $res ='<div id="email_'.$val->instructor_email.'">
//		    <div style="float:left;color: #ADCA2C;">'.$val->instructor_email.'</div>
//		    <div><a href="#" onclick=del_instructor("'.$val->instructor_email.'")>'.$remove_button.'</a></div>
//		</div><br />';
//		
//		
//	    }
//	    	   echo $res1 ='<input type="hidden" id="total_instructor" value="'.count($result).'"/>';
//
//	}
//	else{
//	    echo "No data found";
//	}
//	
//    }
//    
//    public function delete_instructor()
//    {
//	$result=$this->modelhome->delete_instructor($_REQUEST['instructor_email']);
//
//    }
//    
//    public function unique_instructor()
//    {
//		$result=$this->modelhome->unique_instructor($_REQUEST['new_instructor_email']);
//		echo $result;
//    }
//    
//    public function new_instructor_create()
//    {
//	$result=$this->modelhome->new_instructor_create();
//	$this->session->set_userdata('success_msg','You have successfully Invited Your Instructor');
//	redirect('home/my_account');
//    }
//    

}

?>