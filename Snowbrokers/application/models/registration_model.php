<?php
class Registration_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	//function validate($user_name, $password)
	//{
	//	$this->db->where('user_name', $user_name);
	//	$this->db->where('pass_word', $password);
	//	$query = $this->db->get('admin');
	//	
	//	if($query->num_rows == 1)
	//	{
	//		return true;
	//	}		
	//}
	//
	//public function get_admin_detail()
	//{
	//	$id = '1';
	//	$this->db->select('*');
	//	$this->db->from('admin');
	//	$this->db->where('id', $id);
	//	$query = $this->db->get();
	//	$ret = $query->row();
	//	//print_r($ret);
	//	//die();
	//	return $ret;
	//}
	//
	//public function get_site_name()
	//{
	//	    $id = '1';
	//	    $this->db->select('site_name');
	//	    $this->db->from('settings');
	//	    $this->db->where('id', $id);
	//	    $query = $this->db->get();
	//	    $ret = $query->row();
	//	    return $ret->site_name;
	//}
	//
	//public function get_site_detail()
	//{
	//	    $id = '1';
	//	    $this->db->select('*');
	//	    $this->db->from('settings');
	//	    $this->db->where('id', $id);
	//	    $query = $this->db->get();
	//	    $ret = $query->row();
	//	    //print_r($ret);
	//	    return $ret;
	//}
	//
	//public function get_facebook_link()
	//{
	//	    $id = '1';
	//	    $this->db->select('facebook');
	//	    $this->db->from('settings');
	//	    $this->db->where('id', $id);
	//	    $query = $this->db->get();
	//	    $ret = $query->row();
	//	    return $ret->facebook;
	//}
	//
	//public function get_twitter_link()
	//{
	//	    $id = '1';
	//	    $this->db->select('twitter');
	//	    $this->db->from('settings');
	//	    $this->db->where('id', $id);
	//	    $query = $this->db->get();
	//	    $ret = $query->row();
	//	    return $ret->twitter;
	//}
	
	
	
	
    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	//function get_db_session_data()
	//{
	//	$query = $this->db->select('user_data')->get('ci_sessions');
	//	$user = array(); /* array to store the user data we fetch */
	//	foreach ($query->result() as $row)
	//	{
	//	    $udata = unserialize($row->user_data);
	//	    /* put data in array using username as key */
	//	    $user['user_name'] = $udata['user_name']; 
	//	    $user['is_logged_in'] = $udata['is_logged_in']; 
	//	}
	//	return $user;
	//}
	//
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	
/*	function create_member()
	{

		$this->db->where('user_name', $this->input->post('username'));
		$query = $this->db->get('admin');

        if($query->num_rows > 0){
        	echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Username already taken";	
			echo '</strong></div>';
		}else{

			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_addres' => $this->input->post('email_address'),			
				'user_name' => $this->input->post('username'),
				'pass_word' => md5($this->input->post('password'))						
			);
			$insert = $this->db->insert('admin', $new_member_insert_data);
		    return $insert;
		}
	      
	}*///create_member
	
	function store_byers($table,$data)
	{		
		$insert = $this->db->insert($table, $data);
		//return $insert;
		return  $this->db->insert_id();
		
	}
	function store_news_letter($table,$data,$email_come)
        {
                $this->db->select('email');
                $this->db->from($table);
                $this->db->where('email',$email_come);
                $query = $this->db->get();
                if($query->num_rows == 0)
                {
                    $insert = $this->db->insert($table, $data);
                    return  $this->db->insert_id();
                }
        }
	//function store_cmp($table,$data)
	//{		
	//	$insert = $this->db->insert($table, $data);
	//	return $insert;
	//}
	
	function check_exist($email)
	{
		//echo $email; 
		$this->db->where('email', $email);
		$query = $this->db->get('people');
		
		if($query->num_rows > 0)
		{
			return true;
		}
	}
        
        public function get_product_type($product_id='')
	{
		$this->db->select('*');
                if($product_id>0)
                {
                    $this->db->where('id',$product_id);
                }
		$this->db->from('product_type');
		$query = $this->db->get();
                return $query->result_array();
	}
	public function get_country($country_id='')
	{
                $this->db->select('*');
                if($country_id>0)
                {
                    $this->db->where('id',$country_id);
                }
		$this->db->from('country');
		$query = $this->db->get();
                return $query->result_array();
	}
        public function login_validate($email,$pass,$check){
            
            
            $this->db->where('email', $email);
            $this->db->where('password', $pass);
            $query = $this->db->get('people');
            $ret = $query->row();
            

//	        if($check=='on')
//                {
//                    $expire = time()+60*60*24*30;
//                    
//                }
//                else if($check==0)
//                {
//                    $expire=time() - 60 ;
//                }
//                setcookie("snowbrokers_cookie_email", $email, $expire, "/");
//                setcookie("snowbrokers_cookie_email", $pass, $expire, "/");
            if($query->num_rows == 1) {
                     
		if($ret->status == '0') {
			
		    $this->session->set_flashdata('flash_message', 'n_activated');
		    return false;
		}
		else
                {
                    return $query->result_array(); 
		}
	    }
	    else {
			
		$this->session->set_flashdata('flash_message', 'not_registered');
		redirect('registration');
	    }
            
        }
        
        public function get_site_name()
	{
		    $id = '1';
		    $this->db->select('field_value');
		    $this->db->from('site_settings');
		    $this->db->where('id', $id);
		    $query = $this->db->get();
		    $ret = $query->row();
		    return $ret->field_value;
	}
        
        public function get_username($email){
            
            $this->db->select('*');
            $this->db->from('people');
            $this->db->where('email', $email);
            $query = $this->db->get();
            $ret = $query->row();
            return $ret;
        }
        
        public function updts_user($id, $newpassword){
            $this->db->where('id',$id);
             $newpassword=md5($newpassword);
	$new_data = array(
			'password' => $newpassword
			);
	$insert=$this->db->update('people', $new_data);
       
	return $insert;
        }
        
        public function account_activation($key,$data_to_store) {
            
             $this->db->select('*');
               $this->db->from('people');
               $this->db->where('key', $key);
               
               $query = $this->db->get();
               $ret = $query->row();
                  
               if($query->num_rows == 1) {
                       
                       if($ret->status == '0'){
                               
                               $this->db->where('key', $key);
                               $this->db->update('people', $data_to_store);
                               
                               $this->session->set_flashdata('flash_message', 'activated');
                               return $ret;
                       }
                       else {
                               
                               $this->session->set_flashdata('flash_message', 'already_activated');
                               return 0;
                       }
               }
        }
        
//	public function get_username($email)
//	{
//		$this->db->select('*');
//		$this->db->from('users');
//		$this->db->where('email', $email);
//		$query = $this->db->get();
//		$ret = $query->row();
//		return $ret;
//	}
//	
//	public function updt_user($id, $pass)
//	{
//		$this->db->where('id', $id);
//		$this->db->update('users', $pass);
//	}
//	//login function
//	
//	function login_validate($user_email, $password)
//	{
//	       $this->db->where('email', $user_email);
//               $this->db->where('password', $password);
//               //$this->db->where('status', 'Y');
//               $query = $this->db->get('users');
//               $ret = $query->row();
//	       
//               if($query->num_rows == 1)
//               {
//                     
//		     if($ret->status == 'N') {
//			
//				$this->session->set_flashdata('flash_message', 'n_activated');
//				return false;
//			}
//			else{
//				//redirect("#");
//				
//				//$user=array(
//				//	    'email' => $ret->email,
//				//	    'fname' => $ret->first_name,
//				//	    'lname' => $ret->last_name,
//				//	    'id' => $ret->id
//				//);
//				
//				//$this->session->set_userdata($user);
//				return $query->result_array(); 
//			}
//		}
//		else {
//			
//			$this->session->set_flashdata('flash_message', 'not_registered');
//			redirect('register');
//		}
//               
//	}
//	public function get_id_by_name($u_name,$table){
//		$this->db->select('*');
//		$this->db->from($table);
//		$this->db->where('email', $u_name);
//        
//		$query = $this->db->get();
//		
//		return $query->result_array(); 
//	}
//	public function account_activation($key,$data_to_store) {
//               
//               $this->db->select('*');
//               $this->db->from('users');
//               $this->db->where('key', $key);
//               
//               $query = $this->db->get();
//               $ret = $query->row();
//                  
//               if($query->num_rows == 1) {
//                       
//                       if($ret->status == 'N'){
//                               
//                               $this->db->where('key', $key);
//                               $this->db->update('users', $data_to_store);
//                               
//                               $this->session->set_flashdata('flash_message', 'activated');
//                       }
//                       else {
//                               
//                               $this->session->set_flashdata('flash_message', 'already_activated');
//                       }
//               }
//       }
//       
       public function get_user_by_id($uid) {
	
		$this->db->select('*');
		$this->db->from('people');
		$this->db->where('id', $uid);
		$query = $this->db->get();
	        return $query->result_array();
       }
       
       public function Select_state($country_id)
    {
        $this->db->where('country_id',$country_id);
        $this->db->where('published',1);
        $article=$this->db->get('state');
        if($article->num_rows>0)
        {
                foreach($article->result() as $state_details)
                {
                        $sates[]=$state_details;
                        
                }
                return $sates;
        }
        else
        {
            return 0;
        }
    }
    public function get_adminemail()
    {
        $this->db->select('field_value');
        $this->db->where('id',2);
        $result = $this->db->get('site_settings');
        $result_email = $result->row();
        $admin_email = $result_email->field_value;
        return $admin_email;
    }
    public function mailbody($id)
    {
               $this->db->select('*');
		$this->db->from('email_template_management');
		$this->db->where('id',$id);
		$query = $this->db->get();
	        return $query->result_array();
    }
    public function mail_idcheck($data)
    {
        $this->db->select('email');
        $this->db->from('people');
        $this->db->where('email', $data);
        $query = $this->db->get();
     return  $query->num_rows;
      }
      public function mail_idchecks($data)
    {
        $this->db->select('email');
        $this->db->from('people');
        $this->db->where('customer_type',2);
        $this->db->where('email', $data);
        $query = $this->db->get();
     return  $query->num_rows;
      }
      
      
      
     //smtp mail sending 
      
    function send_mail($email,$subject,$body)
    {
       
    require_once PHYSICAL_PATH.'/smtpmail/PHPMailerAutoload.php';
    $mail = new PHPMailer;
       
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'esolz.technologies@gmail.com';                 // SMTP username
    $mail->Password = 'un!techvikas';                           // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->isHTML(true);                                  // Set email format to HTML
        $mail->From = 'esolz.technologies@gmail.com';
    //$mail->Port=26;    // Enable encryption, 'ssl' also accepted
    //$mail->From = ADMIN_EMAIL;
    //$mail->FromName = SITE_NAME;
    $mail->FromName = 'Snowbrokers';
    $mail->addAddress($email);     // Add a recipient
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    //$mail->send();
    if(!$mail->send())
    {
       //echo 'Message could not be sent.';
       //echo 'Mailer Error: ' . $mail->ErrorInfo;
       $return=1;
    }
    else
    {
       //echo 'Message has been sent';
       $return=0;
    }
    return $return;
    //die;
    }
      
    function changepassword($id,$password)
	{		
	$this->db->where('id',$id);
	$new_data = array(
			'password' => $password
			);
	$insert=$this->db->update('people', $new_data);
	return $insert;
		
	}  
      
     public function password_check($password)
   
     {
        $this->db->select('id');
        $this->db->from('people');
        $this->db->where('password', $password);
       $query = $this->db->get();
         return  $query->row();
      } 
      
}
?>