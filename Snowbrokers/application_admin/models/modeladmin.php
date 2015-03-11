<?php

class modeladmin extends CI_Model {

	var $name = '';
	var $id = '';
	var $password = '';
	
	function __construct()
	{
		parent::__construct();
	}
    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	public function validate($user_name)
	{
		$this->db->where('username', $user_name);
		//$this->db->where('password', $password);
		$query = $this->db->get('admin');
		$query2=$query->row();
		if($query->num_rows == 1)
		{
			return $query2->its_superadmin;
		}		
	}
	public function getpassword($user_name)
	{
		$this->db->where('username', $user_name);
		//$this->db->where('password', $password);
		$query = $this->db->get('admin');
		$query2=$query->row();
		if($query->num_rows == 1)
		{
			return $query2->password;
		}		
	}
    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	public function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
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
	function sitesetting_details()
	{
		$query = $this->db->get('site_settings');
		//echo $this->db->last_query();
		$query2=$query->num_rows();
		foreach($query->result() as $result_row)
		{
			$data[]=$result_row;
			//print_r($result_row);
			//define('ADMIN_EMAIL', $data[0]->admin_email);
		}
		return $data;
		//echo "<pre>";
		//print_r($data);
		//echo "</pre>";
		//define('ADMIN_EMAIL', $data[1]->field_value);
		//echo ADMIN_EMAIL;
		//die;
	}
	
		// for super admin access function//
	function access_avalible($val)
	{
	//echo $val;die;
	//echo $this->session->userdata('is_superadmin');die;
	if($this->session->userdata('is_superadmin')==1)
	{
	return 1;
        exit;
	}
	else{
		
	$username=$this->session->userdata('user_name');
	$this->db->where('username', $username);
	$query = $this->db->get('admin');
	$query2=$query->row();
	//echo $this->db->last_query();die;
	$pageaccess=$query2->page_access;
	$tasky=explode(",",$pageaccess);
	if(in_array($val,$tasky))
	{
	return 1;	
	}
	else{
	return 0;
	}
	}
	}
	// for super admin access function//
	
public function GetAllSports()
    {        
        $this->db->where('status',1);
        $article=$this->db->get('sports');
        if($article->num_rows>0)
        {
                foreach($article->result() as $sports_details)
                {
                        $sports[]=$sports_details;
                        
                }
                return $sports;
        }
        else
        {
            return 0;
        }
            
    }
	public function buyer()
	{
		$this->db->where('status',1);
		$this->db->where('customer_type',1);
		$q=$this->db->get('people');
		return $q->num_rows();
	}
	public function seller()
	{
		$this->db->where('status',1);
		$this->db->where('customer_type',2);
		$q=$this->db->get('people');
		return $q->num_rows();
	}
	public function product()
	{
		$this->db->where('status',1);
		$q=$this->db->get('product');
		return $q->num_rows();
	}
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */
	public function setting_pagination()
	{
	$this->db->where('field_name','admin_resultsPerPage');	
	$query = $this->db->get('site_settings');
	$query2=$query->row();
	return $query2->field_value;
	}
	public function create_member()
	{
		$message="";
		$error=0;
		
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get('people');
		
		if($query->num_rows > 0)
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Username Already Taken</strong></div>');
			
			$error=1;
		}
		
		$this->db->where('email', $this->input->post('email'));
		$queryemail = $this->db->get('people');
		
		if($queryemail->num_rows > 0)
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Username Already Taken</strong><strong>Email id Already Taken</strong></div>');
			
			$error=1;
		}
		
		if($error==0)
		{
			$this->load->library('encrypt');
			
			$pass = $this->input->post('password');
			
			$encrypted_string = $this->encrypt->encode($pass);
			
			$day=$this->input->post('day');
			$month=$this->input->post('month');	
			$year=$this->input->post('year');
			if(($day!="") && ($month!="") && ($year!=""))
			{
				$dob=$year."-".$month."-".$day;
			}
			else
			{
				$dob="0000-00-00";
			}
		  
			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username'),
				'password' => $encrypted_string,			
				'email' => $this->input->post('email'),
				'status' => 1,
				'phone_number' => $this->input->post('phone_number'),
				'gender' => $this->input->post('gender'),
				'dob' => $dob,
				'cell_number' => $this->input->post('cell_number'),
				'cell_phone_carrier' => $this->input->post('cell_phone_carrier'),
				'country' => $this->input->post('country'),
				'state' => $this->input->post('state'),
				'city' => $this->input->post('city'),
				'zipcode' => $this->input->post('zipcode'),
				'user_type' => $this->input->post('profile'),
				'payment' => $this->input->post('payment'),
				'about_myself' => $this->input->post('a_desc'),
			);
		  
			$insert = $this->db->insert('people', $new_member_insert_data);
			
			$lastid=$this->db->insert_id();
			
			//if($insert)
			//{
			//
			////.............image upload.......................................//
			//    $config['upload_path'] = PHYSICAL_PATH.'images/user_profile_image';
			//    $config['allowed_types'] = 'gif|jpg|png|jpeg';
			//    $config['max_size']  = 1024 * 8;
			//    $config['encrypt_name'] = TRUE;
			//    $this->load->library('upload', $config);
			//    $status = "";
			//    $msg = "";
			//    $userpicture='';
			//    if(!empty($_FILES["image"]["name"]))
			//    {
			//    $file_element_name = 'image';
			//    
			//    if (!$this->upload->do_upload($file_element_name))
			//    {
			//	    $status = 'error';
			//	    $msg = $this->upload->display_errors('', '');
			//    }
			//    else
			//    {
			//       $data = $this->upload->data();
			//	       
			//       if($data)
			//       {
			//	
			//	    $config = array(
			//		 'source_image' => $data['full_path'],
			//		 'new_image' => $config['upload_path'] . '/thumbs/',
			//		 'maintain_ratio' => true,
			//		 'width' => 200,
			//		 'height' => 200
			//	     );
			//	 //print_r($config);
			//	  $this->load->library('image_lib', $config);
			//	  $this->image_lib->resize();
			//	  $userpicture = $data['file_name'];
			//	  //echo $userpicture;die;
			//       }
			//    
			//    }
			//    
			//    $new_image_data=array(
			//	'image' => $userpicture
			//    );
			//    $this->db->where('id', $lastid);
			//    $insert_image = $this->db->update('people',$new_image_data);
			//    
			//    }   
			//}
			
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>User Added Successfully</strong></div>');
			
			return $insert;
		}
	}
	public function edit_member()
	{
		$message="";
		$error=0;
		
		$this->db->where('username', $this->input->post('username'));
		$this->db->where("id !=",$this->input->post('ListingUserid'));
		$query = $this->db->get('people');
		
		if($query->num_rows > 0)
		{
			$message .='<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			$message .="Username already taken";	
			$message .='</strong></div>';
			$error=1;
		}
		
		$this->db->where('email', $this->input->post('email'));
		$this->db->where("id !=",$this->input->post('ListingUserid'));
		$queryemail = $this->db->get('people');
		//echo $this->db->last_query();
		if($queryemail->num_rows > 0)
		{
			$message .='<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			$message .="Email Already Taken";	
			$message .='</strong></div>';
			$error=1;
		}
		
		$this->db->where('phone_number', $this->input->post('userphoneno'));
		$this->db->where("id !=",$this->input->post('ListingUserid'));
		$queryphone = $this->db->get('people');
		
		if($queryphone->num_rows > 0)
		{
			$message .='<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			$message .="Phone Already Taken";	
			$message .='</strong></div>';
			$error=1;
		}
	      
		if($error==0)
	    {
		
			$day=$this->input->post('day');
			$month=$this->input->post('month');	
			$year=$this->input->post('year');
			if(($day!="") && ($month!="") && ($year!=""))
			{
				$dob=$year."-".$month."-".$day;
			}
			else
			{
				$dob="0000-00-00";
			}
			
			
			$this->load->library('encrypt');
			
			$pass = $this->input->post('password');
			
			$encrypted_string = $this->encrypt->encode($pass);
			
			$new_member_insert_data = array();
			
			if($this->input->post('password')!='')
			{
				$new_member_insert_data['password'] = $encrypted_string;
			}
			
			$new_member_insert_data['first_name'] = $this->input->post('first_name');
			$new_member_insert_data['last_name'] = $this->input->post('last_name');
			$new_member_insert_data['gender'] = $this->input->post('gender');
			$new_member_insert_data['username'] = $this->input->post('username');
			$new_member_insert_data['email'] = $this->input->post('email');
			$new_member_insert_data['status'] = 1;
			$new_member_insert_data['phone_number'] = $this->input->post('phone_number');
			$new_member_insert_data['dob'] = $dob;
			$new_member_insert_data['cell_number'] = $this->input->post('cell_number');
			$new_member_insert_data['cell_phone_carrier'] = $this->input->post('cell_phone_carrier');
			$new_member_insert_data['country'] = $this->input->post('country');
			$new_member_insert_data['state'] = $this->input->post('state');
			$new_member_insert_data['city'] = $this->input->post('city');
			$new_member_insert_data['zipcode'] = $this->input->post('zipcode');
			$new_member_insert_data['user_type'] = $this->input->post('profile');
			$new_member_insert_data['payment'] = $this->input->post('payment');
			$new_member_insert_data['about_myself'] = $this->input->post('a_desc');	
			
			$this->db->where('id', $this->input->post('ListingUserid'));
			$insert = $this->db->update('people',$new_member_insert_data);
			
			//if($insert)
			//{
			//
			////.............image upload.......................................//
			//    $config['upload_path'] = PHYSICAL_PATH.'images/user_profile_image';
			//    $config['allowed_types'] = 'gif|jpg|png|jpeg';
			//    $config['max_size']  = 1024 * 8;
			//    $config['encrypt_name'] = TRUE;
			//    $this->load->library('upload', $config);
			//    $status = "";
			//    $msg = "";
			//    $userpicture='';
			//    if(!empty($_FILES["image"]["name"]))
			//    {
			//    $file_element_name = 'image';
			//    
			//    if (!$this->upload->do_upload($file_element_name))
			//    {
			//	    $status = 'error';
			//	    $msg = $this->upload->display_errors('', '');
			//    }
			//    else
			//    {
			//       $data = $this->upload->data();
			//	       
			//       if($data)
			//       {
			//	
			//	    $config = array(
			//		 'source_image' => $data['full_path'],
			//		 'new_image' => $config['upload_path'] . '/thumbs/',
			//		 'maintain_ratio' => true,
			//		 'width' => 200,
			//		 'height' => 200
			//	     );
			//	 //print_r($config);
			//	  $this->load->library('image_lib', $config);
			//	  $this->image_lib->resize();
			//	  $userpicture = $data['file_name'];
			//	  //echo $userpicture;die;
			//       }
			//    
			//    }
			//    
			//    $new_image_data=array(
			//	'image' => $userpicture
			//    );
			//    $this->db->where('id', $this->input->post('ListingUserid'));
			//    $insert_image = $this->db->update('people',$new_image_data);
			//    
			//    }   
			//}
			//
			
		
			
			
	    }
		if($insert)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>User updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Failed to update user. Please try again</strong></div>');
			
		return $insert;
	
	}
	
	public function sendEmail()
	{
		//echo "Not Working";
		$email=$this->input->post('email');
		//echo $email;
		$this->db->where('field_name','admin_email');
		$this->db->where('field_value',$email);
		$q=$this->db->get('site_settings');
		//echo $this->db->last_query();die;
		if($q->num_rows>0)
		{
			$this->db->where('id',4);
			$article=$this->db->get('email_template_management');
			if($article->num_rows>0)
			{
				foreach($article->result() as $article_details)
				{
					$article_heading=$article_details->subject;
					$article_body=$article_details-> 	details;
				}
			}
			$admin=$this->db->get('admin');
			if($admin->num_rows>0)
			{
				foreach($admin->result() as $admin_result)
				{
					$admin_id=$admin_result->id;
				}
			}
			$encrypt_id=urlencode(base64_encode($admin_id));
			$site_settings=$this->db->get('site_settings');
			if($site_settings->num_rows>0)
			{
				foreach($site_settings->result() as $site_setting_result)
				{
					$site_setting_data[]=$site_setting_result;
				}
				$site_name=$site_setting_data[0]->field_value;
				$smtp_email=$site_setting_data[8]->field_value;
			}
			
			$link=base_url().'index.php/login/passwordgenerate/'.$encrypt_id;
			
			$body=str_replace(array('[LINK]','[SITENAME]'),array($link,$site_name),$article_body);
			
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->from($smtp_email,$site_name);
			$this->email->to($email); 
			 
			
			$this->email->subject($article_heading);
			$this->email->message($body);	
			
			$this->email->send();
			$return=1;
		}
		else
		{
			$return=0;
		}
		return $return;
	}
	
	public function updatePassword()
	{
		$admin_id=base64_decode(urldecode($this->input->post('admin_id')));
		$update_password=array(
			'password' => $this->input->post('password'),
			);
		$this->db->where('id',$admin_id);
		$update=$this->db->update('admin',$update_password);
		if($update)
		{
			$return=1;
		}
		else
		{
			$return=0;
		}
		return $return;
	}
	
	
	public function delete_member()
	{
		$returnvalue=0;
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$fetch_user=$this->db->get('people');
		//echo $this->db->last_query();
		if($fetch_user->num_rows()>0)
		{
			
			foreach($fetch_user->result() as $user_image)
			{
				
			$image_path=PHYSICAL_PATH.'images/user_profile_image/'.$user_image->image;
			$image_path_thumb=PHYSICAL_PATH.'images/user_profile_image/thumbs/'.$user_image->image;
			unlink($image_path);
			unlink($image_path_thumb);
			}
		}
		
		$this->db->where('user_id', $this->input->post('ListingUserid'));
		$delete_doctor_review = $this->db->delete('doctor_review');
		
		$this->db->where('user_type', $this->input->post('ListingUserid'));
		$delete_appointment_booking = $this->db->delete('appointment_booking');
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$query = $this->db->delete('people');
		
		
		
		return $query;
	}
	
	public function delete_article()
	{
		$returnvalue=0;
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$query = $this->db->delete('article');
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>Article is deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Failed to delete article. Please try again</strong></div>');
			
		return $query;
	}
	
	/*users pagination starts here*/
	
	function count_all_search_users($searchparams)
	{		
		
		$q="";
		//$this->db->where('user_type',1);
		$this->db->like($searchparams);
		$this->db->from('people');
		$q = $this->db->count_all_results();
		//echo $this->db->last_query();die;
		return $q;
	}
	
	function get_search_pagedlist_users($searchparams,$limit = 0, $offset = 0)
	{
 		
		$data="";
		//$this->db->where('user_type',1); 
		$this->db->like($searchparams);
		$q = $this->db->get('people',$limit,$offset);
		
		//echo $this->db->last_query();die;
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
				
			}
			
			
			return $data;
		}	
		
	}	
	
	function count_all_users($searchparams='')
	{
		
		$searchitems = array();
		if($searchparams!='')
		{
			//echo $searchparams."<br/>";
			$search = explode("&",$searchparams);
			//print_r($search);exit;
			
			foreach($search as $searchitem)
			{
				list ($key,$value) = explode ('=',$searchitem);
				$searchitems[$key] = urldecode($value);
			}
			//print_r($searchitems);
			//exit;
		}
		$q="";
		if(isset($searchitems['status']))
		{
			$this->db->where('status',$searchitems['status']);
		}
		if(isset($searchitems['customer_type_b']))
		{
			$this->db->where('customer_type',1);
			$added_date = array('first_name'=>$searchitems['customer_type_b']);
			$this->db->like($added_date);
			
			$added_date = array('last_name'=>$searchitems['customer_type_b']);
			$this->db->or_like($added_date);
			
			$added_date = array('last_name'=>$searchitems['customer_type_b']);
			$this->db->or_like($added_date);
		}
		if(isset($searchitems['customer_type_s']))
		{
			$this->db->where('customer_type',2);
			$added_date = array('first_name'=>$searchitems['customer_type_s']);
			$this->db->like($added_date);
			
			$added_date = array('last_name'=>$searchitems['customer_type_s']);
			$this->db->or_like($added_date);
			
			$added_date = array('last_name'=>$searchitems['customer_type_s']);
			$this->db->or_like($added_date);
		}
		if(isset($searchitems['register_date']))
		{
			$added_date = array('register_date'=>$searchitems['register_date']);
			$this->db->like($added_date);
		}
		if(isset($searchitems['first_name']))
		{
			$first_name= array('first_name'=>$searchitems['first_name']);
			$this->db->like($first_name);
		}
		if(isset($searchitems['last_name']))
		{
			$last_name = array('last_name'=>$searchitems['last_name']);
			$this->db->like($last_name);
		}
		if(isset($searchitems['email']))
		{
			$email = array('email'=>$searchitems['email']);
			$this->db->like($email);
		}		
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
		}
		//$this->db->where('questionnarie_id',0);
		$this->db->from('people');
		$q = $this->db->count_all_results();
		//echo '----'.$this->db->last_query();
		//exit;
		
		return $q;
		
	}
	
	function get_paged_list_users($limit = 0, $offset = 0,$searchparams='')
	{
		$data="";
		$searchitems = array();
		if($searchparams!='')
		{
			//echo $searchparams."<br/>";
			$search = explode("&",$searchparams);
			
			foreach($search as $searchitem)
			{
				list ($key,$value) = explode ('=',$searchitem);
				$searchitems[$key] = urldecode($value);
			}
			//print_r($searchitems);
		}
		if(isset($searchitems['status']))
		{
			$this->db->where('status',$searchitems['status']);
		}
		if(isset($searchitems['customer_type_b']))
		{
			$this->db->where('customer_type',1);
			$added_date = array('first_name'=>$searchitems['customer_type_b']);
			$this->db->like($added_date);
			
			$added_date = array('last_name'=>$searchitems['customer_type_b']);
			$this->db->or_like($added_date);
			
			$added_date = array('last_name'=>$searchitems['customer_type_b']);
			$this->db->or_like($added_date);
		}
		if(isset($searchitems['customer_type_s']))
		{
			$this->db->where('customer_type',2);
			$added_date = array('first_name'=>$searchitems['customer_type_s']);
			$this->db->like($added_date);
			
			$added_date = array('last_name'=>$searchitems['customer_type_s']);
			$this->db->or_like($added_date);
			
			$added_date = array('last_name'=>$searchitems['customer_type_s']);
			$this->db->or_like($added_date);
		}
		
		if(isset($searchitems['register_date']))
		{
			$added_date = array('register_date'=>$searchitems['register_date']);
			$this->db->like($added_date);
		}
		if(isset($searchitems['first_name']))
		{
			$first_name= array('first_name'=>$searchitems['first_name']);
			$this->db->like($first_name);
		}
		if(isset($searchitems['last_name']))
		{
			$last_name = array('last_name'=>$searchitems['last_name']);
			$this->db->like($last_name);
		}
		if(isset($searchitems['email']))
		{
			$email = array('email'=>$searchitems['email']);
			$this->db->like($email);
		}		
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
		}
		//$this->db->where('questionnarie_id',0);
		$q = $this->db->get('people',$limit,$offset);
		//echo '---'.$this->db->last_query();
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	/*taskposter pagination ends here*/
	//taskaroo pagination ends here
	function count_all_taskaroo($searchparams='',$taskstatus='')
	{
		$data="";
		$searchitems = array();
		if($searchparams!='')
		{
			//echo $searchparams."<br/>";
			$search = explode("&",$searchparams);
			//print_r($search);exit;
			
			foreach($search as $searchitem)
			{
				list ($key,$value) = explode ('=',$searchitem);
				$searchitems[$key] = urldecode($value);
			}
			//print_r($searchitems);exit;
		}
		
		$q="";
		if(isset($searchitems['taskaroo_status']))
		{
			$this->db->where('taskaroo_status',$searchitems['taskaroo_status']);
		}
		if(isset($taskstatus) && ($taskstatus!=''))
		{
			$this->db->where('taskaroo_status',0);
		}
		if(isset($searchitems['first_name']))
		{
			$first_name= array('first_name'=>$searchitems['first_name']);
			$this->db->like($first_name);
		}
		if(isset($searchitems['last_name']))
		{
			$last_name = array('last_name'=>$searchitems['last_name']);
			$this->db->like($last_name);
		}
		if(isset($searchitems['email']))
		{
			$email = array('email'=>$searchitems['email']);
			$this->db->like($email);
		}
		if(isset($searchitems['phone_number']))
		{
			$phone_number = array('phone_number'=>$searchitems['phone_number']);
			$this->db->like($phone_number);
		}
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
			
		}
		$this->db->where('questionnarie_id !=',0);
		$this->db->where('status',1);
		$this->db->from('people');
		$q = $this->db->count_all_results();
		//echo '----'.$this->db->last_query();
		
		return $q;
		
	}
	
	function get_paged_list_taskaroo($limit = 0, $offset = 0,$searchparams='',$taskstatus='')
	{
		
		$data="";
		$searchitems = array();
		
		if($searchparams!='')
		{
			//echo $searchparams."<br/>";
			$search = explode("&",$searchparams);
			
			foreach($search as $searchitem)
			{
				list ($key,$value) = explode ('=',$searchitem);
				$searchitems[$key] = urldecode($value);
			}
			//print_r($searchitems);
		}
		if(isset($searchitems['taskaroo_status']))
		{
			$this->db->where('taskaroo_status',$searchitems['taskaroo_status']);
		}
		if(isset($taskstatus) && ($taskstatus!=''))
		{
			$this->db->where('taskaroo_status',0);
		}
		if(isset($searchitems['first_name']))
		{
			$first_name= array('first_name'=>$searchitems['first_name']);
			$this->db->like($first_name);
		}
		if(isset($searchitems['last_name']))
		{
			$last_name = array('last_name'=>$searchitems['last_name']);
			$this->db->like($last_name);
		}
		if(isset($searchitems['email']))
		{
			$email = array('email'=>$searchitems['email']);
			$this->db->like($email);
		}
		if(isset($searchitems['phone_number']))
		{
			$phone_number = array('phone_number'=>$searchitems['phone_number']);
			$this->db->like($phone_number);
		}
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
		}
		$this->db->where('status',1);
		$this->db->where('questionnarie_id !=',0);
		$q = $this->db->get('people',$limit,$offset);
		
		//echo '---'.$this->db->last_query();
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	// end of taskaroo pagenination
	public function usernameCheck($email)
	{
		$this->db->where('email',$email);
		$email_exist = $this->db->get('people');
		if($email_exist->num_rows()>0)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*Adding New users*/
	public function adduser()
	{
		//$prod_type_val = $this->input->post('prod_type_val');
		$tot_life = $this->input->post('life_style');
		if(count($tot_life)>1)
		{
			$life_style = implode(',',$tot_life);
		}
		else
		{
			$life_style = $tot_life[0];
		}
		
		$dob = $this->input->post('dob');
		
		$email = $this->input->post('email');
		$email_check = $this->usernameCheck($email);
		if($email_check == 1)
		{
			$this->load->library('encrypt');
			//$encrypt_password=$this->encrypt->encode($this->input->post('password'));
			$encrypt_password = md5($this->input->post('password'));
			$new_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => $encrypt_password,	
				'country' => $this->input->post('country'),
				'phone_number' => $this->input->post('phnumber'),
				'product_type' => $this->input->post('prod_type_val'),
				'address' => $this->input->post('address'),
				'company' => $this->input->post('company'),
				'website' => $this->input->post('website'),
				'customer_type' => $this->input->post('customer_type'),
				'company_position' => $this->input->post('companyposition'),
				'status' => $this->input->post('status')
			);
		  //print_r($new_data);die;
			$insert = $this->db->insert('people', $new_data);
			//echo $this->db->last_query();die;
			$lastid=$this->db->insert_id();
			
			if($insert)
			{
				
				if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '')
				{
				    //$this->upload->initialize($config);
				    //unset($config);
				    //$date = date("ymd");
				    //echo $_FILES['video']['name']; exit;
				    $config['upload_path'] = PHYSICAL_PATH.'vedios/user_videos/';
				    $config['allowed_types'] = 'avi|flv|wmv|mp3|mov|mp4';
				    $config['overwrite'] = FALSE;
				    $config['remove_spaces'] = TRUE;
				    $this->load->library('upload', $config);
				    $this->upload->initialize($config);
				    
				    $video_name = $_FILES['video']['name'];
				    //$config['file_name'] = $video_name;
				    $file_element_name = 'video';
				    
				    
				    if (!$this->upload->do_upload($file_element_name))
				    {
					echo $this->upload->display_errors(); die;
					
				    }
				    else
				    {
					$videoDetails = $this->upload->data();
					$userpicture = $videoDetails['file_name'];
					$new_image_data=array(
							'video' => $userpicture
						    );
						    //$this->db->where('field_name', 'image_url');
						    $this->db->where('id', $lastid);
						   $insert_image = $this->db->update('people',$new_image_data);
						   
					echo "Successfully Uploaded";
				    }
				}
				elseif($this->input->post('image_url') !='')
				{
					$new_image_data=array(
							'video' => $this->input->post('image_url')
						    );
						    //$this->db->where('field_name', 'image_url');
						    $this->db->where('id', $lastid);
						   $insert_image = $this->db->update('people',$new_image_data);
						   
				}
				if(!empty($_FILES["photo"]["name"]))
				{
					$config['upload_path'] = LOGO_PATH.'images/profile_pic/';
					$config['allowed_types'] = '*';
					$config['max_size']  = 1024 * 8;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$status = "";
					$msg = "";
					$userpicture='';
				
					$file_element_name = 'photo';
				
					if (!$this->upload->do_upload($file_element_name))
					{
						//$status = 'error';
						//$msg = $this->upload->display_errors('', '');
						echo $this->upload->display_errors();
						
						
					}
					else
					{
						$data = $this->upload->data();
						
						 $userpicture = $data['file_name'];
					   
						 //}
				 
					 }
				 
					 $new_image_data=array(
					 'profile_image' => $userpicture
					 );
					 $this->db->where('id', $lastid);
					 $insert_image = $this->db->update('people',$new_image_data);
				 //echo '---'.$this->db->last_query();die;
				 }
				$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>User added successfully</strong></div>');
			}
			else
			{
				$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add User. Please try again</strong></div>');
				
			 
			}
			return $insert;
		}
		else
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Email already exist. Please try again with another emailid.</strong></div>');
		}
               
	}
	public function getalltaskposter()
	{
	
		$this->db->where('questionnarie_id',0);
		$q = $this->db->get('people');
		
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}	
	}
	// taskaroo//
		public function insert_taskaroo() // taskaroo insert function//
	{
		//print_r($_REQUEST);die;
		
		
		$days="";
		$days_now="";
		$time_now="";
		$iprefer= $this->input->post('prefer');
		$cats= $this->input->post('taskcategory');
		$days_now=$this->input->post('avalibledays');
		if($days_now!="")
		{
		$days=implode(",",$days_now);
	}
	if($iprefer !="")
	{
		$iprefernow=implode(",",$iprefer);
	}
		$category=implode(",",$cats);
		
		$time=$this->input->post('avalibletime');
		if($time !="")
		{
		$time_now=implode(",",$time);
		}
		$zip= $this->input->post('zip');    
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=
".urlencode($zip)."&sensor=false";
$result_string = file_get_contents($url);
$result = json_decode($result_string, true);
$result1[]=$result['results'][0];
$result2[]=$result1[0]['geometry'];
$result3[]=$result2[0]['location'];
$lat=$result3[0]['lat'];
$long=$result3[0]['lng'];
		$new_data_task = array(
			'people_id' => $this->input->post('taskposter'),
			'othercategory' => $this->input->post('othercategory'),
			'apartment' => $this->input->post('apartment'),
			'city' => $this->input->post('city'),
			'zip' => $this->input->post('zip'),
			'state' => $this->input->post('state'),
			'country' => $this->input->post('country'),
			'date_of_birth' => $this->input->post('age'),
			'education' => $this->input->post('education'),
			'other_diploma' => $this->input->post('certificate'),
			'preference' => $iprefernow,
			'mode_of_transportation' => $this->input->post('transpotation'),
			'licenced_driver' => $this->input->post('lisencedriver'),
			'have_car' => $this->input->post('caryes'),
			'background_check' => $this->input->post('securebackground'),
			'task_category' => $category,
			'availability'=> $this->input->post('avaliblity'),
			'days_availability'=> $days,
			'time_availability'=> $time_now,
			'work_experiance'=> $this->input->post('experience'),
			'tell_about_yourself'=> $this->input->post('yourself'),
			'latitude'=> $lat,
			'longnitude'=> $long,
			'dateofrequest'=>date('Y-m-d')
		);
		$insert_task = $this->db->insert('questionnarie', $new_data_task);
		
		$qus_id=$this->db->insert_id();
		if($insert_task)
		{
	    
		    //.............cv upload.......................................//
		    //echo LOGO_PATH;die;
			$config['upload_path'] = LOGO_PATH.'images/certificates/';
			$config['allowed_types'] = '*';
			$config['max_size']  = 1024 * 8;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$status = "";
			$msg = "";
			$userpicture='';
			if(!empty($_FILES["certificatesfiles"]["name"]))
			{
				$file_element_name = 'certificatesfiles';
			
				if (!$this->upload->do_upload($file_element_name))
				{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
				}
				else
				{
					$data = $this->upload->data();
				       
					
					$userpicture = $data['file_name'];
				  
					//}
			
				}
			
				$new_image_data=array(
				'certificate' => $userpicture
				);
				$this->db->where('id', $qus_id);
				$insert_image = $this->db->update('questionnarie',$new_image_data);
			
			}
		}
		$new_data_task_new = array(
			'questionnarie_id'=> $qus_id,
			'user_type'=>1,
			'taskaroo_status'=>$this->input->post('status')
		);
		$this->db->where('id', $this->input->post('taskposter'));
		$insert_task_update = $this->db->update('people', $new_data_task_new);
		//...mail sending to taskroos...//
		$status=$this->input->post('status');
		if($status==1)
		{
		$this->db->where('id', $this->input->post('taskposter'));
		$q = $this->db->get('people');
		$onlyonedata=$q->row();
		$firstname=$onlyonedata->first_name;
		$lastname=$onlyonedata->last_name;
		$username=$firstname."".$lastname;
		$email=$onlyonedata->email;

		
	$this->db->where('id',11);
	 $this->db->where('status',1);
         $queryemailadmin = $this->db->get('email_template_management');
         $querynewadmin=$queryemailadmin->row();
       $email_subject_admin=$querynewadmin->subject;
	 $email_message_admin=$querynewadmin->details;
	  $site_settings=$this->db->get('site_settings');
			if($site_settings->num_rows>0)
			{
				foreach($site_settings->result() as $site_setting_result)
				{
					$site_setting_data[]=$site_setting_result;
				}
				$site_name=$site_setting_data[0]->field_value;
				$smtp_email=$site_setting_data[8]->field_value;
			}
	$bodyadmin=str_replace(array('[NAME]','[SITENAME]'),array($username,$site_name),$email_message_admin);
         //  echo  $site_name,$smtp_email;
         //print_r($bodyadmin);die;
            
            
            $this->load->library('email');
            $this->email->set_newline("\r\n");
    
            $this->email->from($smtp_email,$site_name);
            $this->email->to($email); 
             
            
            $this->email->subject($email_subject_admin);
            $this->email->message($bodyadmin);	
            
            $this->email->send();
	}
	else{
		$this->db->where('id', $this->input->post('taskposter'));
		$q = $this->db->get('people');
		$onlyonedata=$q->row();
		$firstname=$onlyonedata->first_name;
		$lastname=$onlyonedata->last_name;
		$username=$firstname."".$lastname;
		$email=$onlyonedata->email;
 $site_settings=$this->db->get('site_settings');
			if($site_settings->num_rows>0)
			{
				foreach($site_settings->result() as $site_setting_result)
				{
					$site_setting_data[]=$site_setting_result;
				}
				$site_name=$site_setting_data[0]->field_value;
				$smtp_email=$site_setting_data[8]->field_value;
			}
		
	$this->db->where('id',12);
	 $this->db->where('status',1);
         $queryemailadmin = $this->db->get('email_template_management');
         $querynewadmin=$queryemailadmin->row();
       $email_subject_admin=$querynewadmin->subject;
	 $email_message_admin=$querynewadmin->details;
	 
	$bodyadmin=str_replace(array('[NAME]','[SITENAME]'),array($username,$site_name),$email_message_admin);
            
            //echo $email_subject_admin."<br/>".$bodyadmin."<br/>";die;
            
            
            $this->load->library('email');
            $this->email->set_newline("\r\n");
    
            $this->email->from($site_name,$smtp_email);
            $this->email->to($email); 
             
            
            $this->email->subject($email_subject_admin);
            $this->email->message($bodyadmin);	
            
            $this->email->send();
	}	
		
		//...end mail sending to taskroos...//
		
		//echo $this->db->last_query();die;
		if($insert_task_update)
                {
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Taskaroo inserted successfully</strong></div>');
		return $insert_task_update;
                }
		else
                {
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add Taskaroo. Please try again</strong></div>');
			
		 return $insert_task_update;
		}
               
	}
	// taskaroo//
	/*editing the user*/
	public function users_to_edit($editid)
	{
		$query = $this->db->get_where('people', array('id' => $editid));
		//echo $this->db->last_query();die;
		return $query->result();
	}
	public function update_tasaroo()
	{
		$days="";
		$days_now="";
		$time_now="";
		$iprefer= $this->input->post('prefer');
		$cats= $this->input->post('taskcategory');
		$days_now=$this->input->post('avalibledays');
		if($days_now!="")
		{
		$days=implode(",",$days_now);
	}
	if($iprefer !="")
	{
		$iprefernow=implode(",",$iprefer);
	}
		$category=implode(",",$cats);
		
		$time=$this->input->post('avalibletime');
		if($time !="")
		{
		$time_now=implode(",",$time);
		}
		$new_data_task = array(
			'othercategory' => $this->input->post('othercategory'),
			'apartment' => $this->input->post('apartment'),
			'city' => $this->input->post('city'),
			'zip' => $this->input->post('zip'),
			'state' => $this->input->post('state'),
			'country' => $this->input->post('country'),
			'date_of_birth' => $this->input->post('age'),
			'education' => $this->input->post('education'),
			'other_diploma' => $this->input->post('certificate'),
			'preference' => $iprefernow,
			'mode_of_transportation' => $this->input->post('transpotation'),
			'licenced_driver' => $this->input->post('lisencedriver'),
			'have_car' => $this->input->post('caryes'),
			'background_check' => $this->input->post('securebackground'),
			'task_category' => $category,
			'availability'=> $this->input->post('avaliblity'),
			'days_availability'=> $days,
			'time_availability'=> $time_now,
			'work_experiance'=> $this->input->post('experience'),
			'tell_about_yourself'=> $this->input->post('yourself'),
			'status'=>$this->input->post('taskaroostatus')
		);
		$insert_task = $this->db->insert('questionnarie', $new_data_task);
		
		$qus_id=$this->db->insert_id();
		if($insert_task)
		{
	    
		    //.............cv upload.......................................//
		    //echo LOGO_PATH;die;
			$config['upload_path'] = LOGO_PATH.'images/certificates/';
			$config['allowed_types'] = '*';
			$config['max_size']  = 1024 * 8;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$status = "";
			$msg = "";
			$userpicture='';
			if(!empty($_FILES["certificatesfiles"]["name"]))
			{
				$file_element_name = 'certificatesfiles';
			
				if (!$this->upload->do_upload($file_element_name))
				{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
				}
				else
				{
					$data = $this->upload->data();
				       
					
					$userpicture = $data['file_name'];
				  
					//}
			
				}
			
				$new_image_data=array(
				'certificate' => $userpicture
				);
				$this->db->where('id', $qus_id);
				$insert_image = $this->db->update('questionnarie',$new_image_data);
			
			}
		}
		$new_data_task_new = array(
			'questionnarie_id'=> $qus_id,
		);
		$this->db->where('id', $this->input->post('userid_hidden'));
		$insert_task_update = $this->db->update('people', $new_data_task_new);
	
	if($insert_task_update)
                {
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>User Updated successfully</strong></div>');
		return $insert;
                }
		else
                {
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add Updated. Please try again</strong></div>');
			
		 return $insert;
		}
	}
	///*updating the user*/
	public function update1user()
	{
		$dob = $this->input->post('dob');
		$tot_life = $this->input->post('life_style');
		if(count($tot_life)>1)
		{
			$life_style = implode(',',$tot_life);
		}
		else
		{
			$life_style = $tot_life[0];
		} 
		$new_data = array(
				
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),				
				'country' => $this->input->post('country'),
				'phone_number' => $this->input->post('phnumber'),
				'product_type' => $this->input->post('product_type'),
				'address' => $this->input->post('address'),
				'company' => $this->input->post('company'),
				'website' => $this->input->post('website'),
				'company_position' => $this->input->post('companyposition'),
				'customer_type' => $this->input->post('customer_type'),
				'status' => $this->input->post('status')			
				);

       
		$this->db->where('id', $this->input->post('userid_hidden'));
		$insert = $this->db->update('people', $new_data);
		//echo $this->db->last_query();die;
		if($this->input->post('password')!='' && $this->input->post('retypepassword')!=''){
			$this->load->libbary('encrypt');
			$encrypt_password=$this->encrypt->encode($this->input->post('password'));
			$new_password_update = array(
			
			'password'=>$encrypt_password,
			
			);
			$this->db->where('id', $this->input->post('userid_hidden'));
			$insert = $this->db->update('people', $new_password_update);
			
		}	
                if($insert)
                {
			if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '')
				{
				    //$this->upload->initialize($config);
				    //unset($config);
				    //$date = date("ymd");
				    //echo $_FILES['video']['name']; exit;
				    $config['upload_path'] = PHYSICAL_PATH.'vedios/user_videos/';
				    $config['allowed_types'] = 'avi|flv|wmv|mp3|mov|mp4';
				    $config['overwrite'] = FALSE;
				    $config['remove_spaces'] = TRUE;
				    $this->load->library('upload', $config);
				    $this->upload->initialize($config);
				    
				    $video_name = $_FILES['video']['name'];
				    //$config['file_name'] = $video_name;
				    $file_element_name = 'video';
				    
				    
				    if (!$this->upload->do_upload($file_element_name))
				    {
					echo $this->upload->display_errors(); die;
					
				    }
				    else
				    {
					$videoDetails = $this->upload->data();
					$userpicture = $videoDetails['file_name'];
					$new_image_data=array(
							'video' => $userpicture
						    );
						    //$this->db->where('field_name', 'image_url');
						    $this->db->where('id', $this->input->post('userid_hidden'));
						   $insert_image = $this->db->update('people',$new_image_data);
						   if($this->input->post('prev_video_val') !='')
						   {
							unlink($config['upload_path'].$this->input->post('prev_video_val'));
						   }
					
				    }
				}
				elseif($this->input->post('image_url') !='')
				{
					$new_image_data=array(
							'video' => $this->input->post('image_url')
						    );
						    //$this->db->where('field_name', 'image_url');
						    $this->db->where('id', $this->input->post('userid_hidden'));
						   $insert_image = $this->db->update('people',$new_image_data);
						   if($this->input->post('prev_video_val') !='')
						   {
							unlink($config['upload_path'].$this->input->post('prev_video_val'));
						   }
						   
				}
				if(!empty($_FILES["photo"]["name"]))
				{
					$config['upload_path'] = LOGO_PATH.'images/profile_pic/';
					$config['allowed_types'] = '*';
					$config['max_size']  = 1024 * 8;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$status = "";
					$msg = "";
					$userpicture='';
				
					$file_element_name = 'photo';
				
					if (!$this->upload->do_upload($file_element_name))
					{
						//$status = 'error';
						//$msg = $this->upload->display_errors('', '');
						echo $this->upload->display_errors();
						
						
					}
					else
					{
						$data = $this->upload->data();
						
						 $userpicture = $data['file_name'];
					   
						 //}
				 
					 }
				 
					 $new_image_data=array(
					 'profile_image' => $userpicture
					 );
					 $this->db->where('id', $this->input->post('userid_hidden'));
					 $insert_image = $this->db->update('people',$new_image_data);
					if($this->input->post('prev_image_val') !='')
					{
					     unlink($config['upload_path'].$this->input->post('prev_image_val'));
					}
				 }
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>User updated successfully</strong></div>');
                }
		else
                {
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to updated User. Please try again</strong></div>');
			
		
		}
                return $insert;
	}
	public function Getselectedlifestyle($lifestyle_id)
	{
	   
	    $dj_genres_array = explode(",", $lifestyle_id);
	    $this->db->where_in('id',$dj_genres_array);
	       
	    $q=$this->db->get('lifestyle');
	    //echo $this->db->last_query();
	    
	    
	   
	    if($q->num_rows>0)
	    {
	       
		 foreach($q->result() as $state_details)
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
	public function users_to_delete($id)
	{
		$query = $this->db->delete('people', array('id' => $id));
		if($query)
                {
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>User Deleted successfully</strong></div>');
                }
		else
                {
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete User. Please try again</strong></div>');
			
		
		}
                return $query;
	}
	
	 /*article Pagination Starts here*/
	 function count_all_search_articles($searchparams,$active_inactive,$darr3)
	{		
		
		if($active_inactive == 1){
			$this->db->where('status','1');
			$this->db->like($searchparams);
			$this->db->like('category',$darr3);
			$this->db->order_by('id','DESC');
			$q = $this->db->get('article');
		
			//echo $this->db->last_query();die;
			$q = $this->db->count_all_results();
		
			return $q;
		}else if($active_inactive == 2){
			$this->db->where('status','0');
			$this->db->like($searchparams);
			$this->db->like('category',$darr3);
			$this->db->order_by('id','DESC');
			$q = $this->db->get('article');
		
			//echo $this->db->last_query();die;
			$q = $this->db->count_all_results();
		
			return $q;
		}else{
		
		$this->db->like($searchparams);
		$this->db->like('category',$darr3);
		//}
		$this->db->order_by('id','DESC');
		$this->db->from('article');
		$q = $this->db->count_all_results();
		//echo $this->db->last_query();die;
		return $q;
		}
	}
	
	function get_search_pagedlist_articles($searchparams,$limit = 0, $offset = 0,$active_inactive=0,$darr)
	{
 		
		$data=array();
		if($active_inactive == 1){
			$this->db->where('status','1');
			
			$this->db->like('article_title',$searchparams);
			$this->db->like('category',$darr);
			$this->db->order_by('id','DESC');
			$q = $this->db->get('article',$limit,$offset);
		
			//echo $this->db->last_query();die;
			if($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
			}
			
			
			return $data;
		}
		else if($active_inactive == 2){
			$this->db->where('status','0');
			$this->db->like('article_title',$searchparams);
			$this->db->like('category',$darr);
			$this->db->order_by('id','DESC');
			$q = $this->db->get('article',$limit,$offset);
		
			//echo $this->db->last_query();die;
			if($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
			}
			
			
			return $data;
		}
		else{
		
		
		$this->db->like('article_title',$searchparams);
		$this->db->like('category',$darr);
		$this->db->order_by('id','DESC');
		$q = $this->db->get('article',$limit,$offset);
		
		
		//echo $this->db->last_query();die;
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
				
			}
			return $data;
		}
		}
		
	}
	
	function get_searchs_pagedlist_articles($searchparams,$limit = 0, $offset = 0,$active_inactive=0,$darr)
	{
 		
		$data=array();
		if($active_inactive == 1){
			$this->db->where('status','1');
			$this->db->like('article_title',$searchparams);
			$this->db->like('category',$darr);
			
			$this->db->order_by('id','DESC');
			$q = $this->db->get('article',$limit,$offset);
			//echo $this->db->last_query();die;
			//echo $this->db->last_query();die;
			if($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
			}
			
			
			return $data;
		}
		else if($active_inactive == 2){
			$this->db->where('status','0');
			$this->db->like('article_title',$searchparams);
			$this->db->like('category',$darr);
			$this->db->order_by('id','DESC');
			$q = $this->db->get('article',$limit,$offset);
		//echo $this->db->last_query();die;
			//echo $this->db->last_query();die;
			if($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
			}
			
			
			return $data;
		}
		else{
		
		$this->db->like('article_title',$searchparams);
		$this->db->like('category',$darr);
		$this->db->order_by('id','DESC');
		$q = $this->db->get('article',$limit,$offset);
		//echo $this->db->last_query();die;
		
		//echo $this->db->last_query();die;
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
				
			}
			return $data;
		}
		}
		
	}
	function whoaretaskarooupdate()      // taskaroo update function original//
	{
		// sending email to taskaroo
	$this->db->where('id',$this->input->post('people_id'));
	 $user = $this->db->get('people');
         $userinfo=$user->row();
	
	$taskaroostatus=$userinfo->taskaroo_status;
	$status=$this->input->post('status_en');
	
	if($taskaroostatus !=$status)
	{
	      
	        $status=$this->input->post('status_en');
		if($status==1)
		{
		$this->db->where('id', $this->input->post('people_id'));
		$q = $this->db->get('people');
		$onlyonedata=$q->row();
		$firstname=$onlyonedata->first_name;
		$lastname=$onlyonedata->last_name;
		$username=$firstname."".$lastname;
		$email=$onlyonedata->email;

		
	$this->db->where('id',11);
	 $this->db->where('status',1);
         $queryemailadmin = $this->db->get('email_template_management');
         $querynewadmin=$queryemailadmin->row();
       $email_subject_admin=$querynewadmin->subject;
	 $email_message_admin=$querynewadmin->details;
	  $site_settings=$this->db->get('site_settings');
			if($site_settings->num_rows>0)
			{
				foreach($site_settings->result() as $site_setting_result)
				{
					$site_setting_data[]=$site_setting_result;
				}
				$site_name=$site_setting_data[0]->field_value;
				$smtp_email=$site_setting_data[8]->field_value;
			}
	$bodyadmin=str_replace(array('[NAME]','[SITENAME]'),array($username,$site_name),$email_message_admin);
         //  echo  $site_name,$smtp_email;
         //print_r($bodyadmin);die;
            
            
            $this->load->library('email');
            $this->email->set_newline("\r\n");
    
            $this->email->from($smtp_email,$site_name);
            $this->email->to($email); 
             
            
            $this->email->subject($email_subject_admin);
            $this->email->message($bodyadmin);	
            
            $this->email->send();
	}
	else{
		$this->db->where('id', $this->input->post('people_id'));
		$q = $this->db->get('people');
		$onlyonedata=$q->row();
		$firstname=$onlyonedata->first_name;
		$lastname=$onlyonedata->last_name;
		$username=$firstname."".$lastname;
		$email=$onlyonedata->email;
		$site_settings=$this->db->get('site_settings');
			if($site_settings->num_rows>0)
			{
				foreach($site_settings->result() as $site_setting_result)
				{
					$site_setting_data[]=$site_setting_result;
				}
				$site_name=$site_setting_data[0]->field_value;
				$smtp_email=$site_setting_data[8]->field_value;
			}
		
	$this->db->where('id',12);
	 $this->db->where('status',1);
         $queryemailadmin = $this->db->get('email_template_management');
         $querynewadmin=$queryemailadmin->row();
       $email_subject_admin=$querynewadmin->subject;
	 $email_message_admin=$querynewadmin->details;
	 
	$bodyadmin=str_replace(array('[NAME]','[SITENAME]'),array($username,$site_name),$email_message_admin);
            
            //echo $email_subject_admin."<br/>".$bodyadmin."<br/>";die;
            
            
            $this->load->library('email');
            $this->email->set_newline("\r\n");
    
            $this->email->from($site_name,$smtp_email);
            $this->email->to($email); 
             
            
            $this->email->subject($email_subject_admin);
            $this->email->message($bodyadmin);	
            
            $this->email->send();
	}	
	}
	// end email//
		$days="";
		$days_now="";
		$time_now="";
		$iprefer= $this->input->post('prefer');
		$cats= $this->input->post('taskcategory');
		$days_now=$this->input->post('avalibledays');
		if($days_now!="")
		{
		$days=implode(",",$days_now);
	}
	if($iprefer !="")
	{
		$iprefernow=implode(",",$iprefer);
	}
		$category=implode(",",$cats);
		
		$time=$this->input->post('avalibletime');
		if($time !="")
		{
		$time_now=implode(",",$time);
		}
		if($this->input->post('avaliblity')==1)
		{
		$days="0";
		$time_now="0";
		}
$zip= $this->input->post('zip');    
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=
".urlencode($zip)."&sensor=false";
$result_string = file_get_contents($url);
$result = json_decode($result_string, true);
$result1[]=$result['results'][0];
$result2[]=$result1[0]['geometry'];
$result3[]=$result2[0]['location'];
$lat=$result3[0]['lat'];
$long=$result3[0]['lng'];
		$new_data_task = array(
			'othercategory' => $this->input->post('othercategory'),
			'country' => $this->input->post('country'),
			'city' => $this->input->post('city'),
			'zip' => $this->input->post('zip'),
			'state' => $this->input->post('state'),
			'apartment' => $this->input->post('apartment'),
			'date_of_birth' => $this->input->post('age'),
			'education' => $this->input->post('education'),
			'other_diploma' => $this->input->post('certificate'),
			'preference' => $iprefernow,
			'mode_of_transportation' => $this->input->post('transpotation'),
			'licenced_driver' => $this->input->post('lisencedriver'),
			'have_car' => $this->input->post('caryes'),
			'background_check' => $this->input->post('securebackground'),
			'task_category' => $category,
			'availability'=> $this->input->post('avaliblity'),
			'days_availability'=> $days,
			'time_availability'=> $time_now,
			'work_experiance'=> $this->input->post('experience'),
			'tell_about_yourself'=> $this->input->post('yourself'),
			'latitude'=> $lat,
			'longnitude'=> $long
			
			
		);
		$this->db->where('id', $this->input->post('updatewho_taskarooid'));
		$insert_task = $this->db->update('questionnarie', $new_data_task);
		//echo $this->db->last_query();die;
		// people table update //
		$newuser = array(
			'taskaroo_status' => $this->input->post('status_en'),
			);
		$this->db->where('id', $this->input->post('people_id'));
		$insert_task = $this->db->update('people', $newuser);
		// people table update//
		//echo $this->db->last_query();die;
		$qus_id=$this->input->post('quinetineid');
		if($insert_task)
		{
	    
		    //.............cv upload.......................................//
		    //echo LOGO_PATH;die;
			$config['upload_path'] = LOGO_PATH.'images/certificates/';
			$config['allowed_types'] = '*';
			$config['max_size']  = 1024 * 8;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$status = "";
			$msg = "";
			$userpicture='';
			if(!empty($_FILES["certificatesfiles"]["name"]))
			{
				$file_element_name = 'certificatesfiles';
			
				if (!$this->upload->do_upload($file_element_name))
				{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
				}
				else
				{
					$data = $this->upload->data();
				       
					
					$userpicture = $data['file_name'];
				  
					//}
			
				}
			
				$new_image_data=array(
				'certificate' => $userpicture
				);
				$this->db->where('id', $qus_id);
				$insert_image = $this->db->update('questionnarie',$new_image_data);
			
			}

		}
		
		if($insert_task)
                {
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Taskaroo Updated successfully</strong></div>');
		return $insert;
                }
		else
                {
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to Update Taskaroo. Please try again</strong></div>');
			
		 return $insert;	
	}
	}
	function getquitine($userid)
	{
	        $this->db->where('id', $userid);
		$q = $this->db->get('questionnarie');
		$onlyonedata=$q->row();
		//echo $this->db->last_query();die;
		return $onlyonedata;	
		
	}
	function count_all_articles($active_inactive)
	{
		if($active_inactive == 1){
			$this->db->where('status','1');
			$this->db->order_by('id','DESC');
			$this->db->from('article');
			$q = $this->db->count_all_results();
			//echo $q;
			//echo $this->db->last_query();die;
			
		
			return $q;
		}else if($active_inactive == 2){
			$this->db->where('status','0');
			$this->db->order_by('id','DESC');
			$this->db->from('article');
			$q = $this->db->count_all_results();
			//echo $q;
			//echo $this->db->last_query();//die;
			//echo "</br>".$q;
		
			return $q;
		}else{
			
			$this->db->order_by('id','DESC');
			$this->db->from('article');
			$q = $this->db->count_all_results();
			//echo $q;
			return $q;
		
		}
		
	}
	
	function get_paged_list_articles($limit = 0, $offset = 0,$active_inactive)
	{
		
			$data=array();
		
		if($active_inactive == 1){
			$this->db->where('status','1');
			$this->db->order_by('id','DESC');
			$q = $this->db->get('article',$limit,$offset);
			$row="";
			//echo $this->db->last_query();
			if($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
			}
			
			
			return $data;
		}
		else if($active_inactive == 2){
			$this->db->where('status','0');
			$this->db->order_by('id','DESC');
			$q = $this->db->get('article',$limit,$offset);
			$row="";
			//echo $this->db->last_query();
			if($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
			}
			
			
			return $data;
		}else{
			
			$this->db->order_by('id','DESC');
			$q = $this->db->get('article',$limit,$offset);
		
		
			//echo $this->db->last_query();die;
			if($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
			}
			
			
			return $data;
		
		}
	}
	
	public function getDataUser($userid) 
	{
		$this->db->where('id', $userid);
		$q = $this->db->get('people');
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getDatatasaroo($userid) 
	{
		$this->db->where('id', $userid);
		$q = $this->db->get('questionnarie');
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function checkusername($username) 
	{
		$this->db->where('username', $username);
		$q = $this->db->get('people');
        
		return $q->num_rows();
	}
	public function checkusername_edit($username,$user_id) 
	{
		$this->db->where('username', $username);
		$this->db->where('id!=', $user_id);
        $q = $this->db->get('people');
        
        return $q->num_rows();
	}
	public function checkemail($email) 
	{
		$this->db->where('email', $email);
        $q = $this->db->get('people');
        
        return $q->num_rows();
	}
	public function checkemail_edit($email,$user_id) 
	{
		$this->db->where('email', $email);
		$this->db->where('id !=', $user_id);
        $q = $this->db->get('people');
        //echo $this->db->last_query();die;
        return $q->num_rows();
	}
	public function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}
	public function multiple_user_delete()
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$this->db->where('id', $value);
				$query=$this->db->delete('people');
				//echo $this->db->last_query();
				/*if($fetch_user->num_rows()>0)
				{
					
					foreach($fetch_user->result() as $user_image)
					{
						
					$image_path=PHYSICAL_PATH.'images/user_profile_image/'.$user_image->image;
					$image_path_thumb=PHYSICAL_PATH.'images/user_profile_image/thumbs/'.$user_image->image;
					unlink($image_path);
					unlink($image_path_thumb);
					}
				}*/
				
				
			}
		}
		else
		{
			$query=0;
		}
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>Users deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Failed to deleted users. Please try again</strong></div>');
		return $query;
	}
	public function multiple_review_delete()
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$this->db->where('id', $value);
				$query = $this->db->delete('reviews');
			}
		}
		else
		{
			$query=0;
		}
		
		return $query;
	}
	public function multiple_user_active_inactive($get)
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$new_insert_data['status'] = $get;
				
				$this->db->where('id', $value);
				$query = $this->db->update('people',$new_insert_data);
			}
		}
		else
		{
			$query=0;
		}
		if($query){
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>User updated successfully</strong></div>');
		}
		else{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Failed to update User. Please try again</strong></div>');
		}
		
		return $query;
		
		//return $query;
	}
	public function multiple_review_active_inactive($get)
	{
		$scripts=$this->input->post('scripts');
		$allbox=count($scripts);
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$new_insert_data['status'] = $get;
				$this->db->where('id', $value);
				$query = $this->db->update('reviews',$new_insert_data);
			}
		}
		else
		{
			$query=0;
		}
		return $query;
	}
	public function multiple_terminal_active_inactive($get)
	{
		$scripts=$this->input->post('scripts');

		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$new_insert_data['status'] = $get;
				
				$this->db->where('terminal_Id', $value);
				$query = $this->db->update('terminalmanagement',$new_insert_data);
				//echo $this->db->last_query();
			}
		}
		else
		{
			$query=0;
		}
		
		return $query;
	}
	public function multiple_terminal_delete()
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$this->db->where('terminal_Id', $value);
				$query = $this->db->delete('terminalmanagement');
			}
		}
		else
		{
			$query=0;
		}
		
		return $query;
	}
	public function GetAllCities($search_option,$get_search)
	{
		if(($search_option!="") && ($get_search!=""))
		{
			$this->db->where($search_option." like","%".trim($get_search)."%");
		}
		
		$q = $this->db->get('city_management');
		
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	
	public function GetCities($search_option,$get_search,$limit_start=0,$limit=0) 
	{
		if(($search_option!="") && ($get_search!=""))
		{
			$this->db->where($search_option." like","%".$get_search."%");
		}
		
		$q = $this->db->get('city_management',$limit,$limit_start);
		
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function getdataPoeples($uid) 
	{
		$this->db->where('id', $uid);
		$q = $this->db->get('people');
		$onlyonedata=$q->row();
		return $onlyonedata;
	}
	public function getdataRestaurants($uid) 
	{
		$this->db->where('id', $uid);
		$q = $this->db->get('restaurant');
		$onlyonedata=$q->row();
		return $onlyonedata;
	}
	public function GetCountryNameFromCountryID($CountryID)
	{
		$this->db->where('id', $CountryID);
		$query = $this->db->get('country');
		if ($query->num_rows() > 0) {
			$countrydata = $query->result();
			return $countrydata[0]->country_name;
		} else {
			return "";
		}
		
	}
	public function GetAllCountry()
	{
		$this->db->where('published', 1);
		$query = $this->db->get('country');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
		
	}
	public function GetAllState()
	{
		$this->db->where('published', 1);
		$this->db->order_by('state_name','ASC');
		$query = $this->db->get('state');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}
	public function GetStateNameFromStateID($StateID)
	{
		$this->db->where('id', $StateID);
		$query = $this->db->get('state');
		if ($query->num_rows() > 0) {
			$countrydata = $query->result();
			return $countrydata[0]->state_name;
		} else {
			return "";
		}
	}
	public function Get_StateDetailsModel($CountryId)
	{
		$this->db->where('published', 1);
		$this->db->where('country_id', $CountryId);
		$this->db->order_by('state_name','ASC');
		$query = $this->db->get('state');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function Get_StateCount($CountryId)
	{
		$this->db->where('published', 1);
		$this->db->where('country_id', $CountryId);
		$query = $this->db->get('state');
		return $query->num_rows();
	}
	public function Check_CityName($CityName)
	{
		$this->db->where('CityName', $CityName);
		$query = $this->db->get('city_management');
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	public function Check_TerminalName($CityName)
	{
		$this->db->where('terminal_name', $CityName);
		$query = $this->db->get('terminalmanagement');
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	public function Check_CityName_Edit($CityName,$city_ID)
	{
		$this->db->where('CityName', $CityName);
		$this->db->where('city_ID!=', $city_ID);
		$query = $this->db->get('city_management');
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	public function Check_TerminalName_Edit($CityName,$city_ID)
	{
		$this->db->where('terminal_name', $CityName);
		$this->db->where('terminal_Id !=', $city_ID);
		$query = $this->db->get('terminalmanagement');
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	 /**
    * Store the new city data into the database
    * @return boolean - check the insert
    */	
	public function create_city()
	{
		$message="";
		$error=0;
		
		$this->db->where('CityName', $this->input->post('name'));
		$query = $this->db->get('city_management');
		
		if($query->num_rows > 0)
		{
			$message .='<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			$message .="City Name already taken";	
			$message .='</strong></div>';
			
			$error=1;
		}
		if($error==0)
		{
			$new_city_insert_data = array(
				'CityName' => $this->input->post('name'),
				'Country_ID' => $this->input->post('CountrySelect'),
				'State_ID' => $this->input->post('StateSelect'),			
				'status' => 1
			);
		  
			$insert = $this->db->insert('city_management', $new_city_insert_data);
			return $insert;
		}
		else
		{
			echo $message;
		}
	}
	public function create_terminal()
	{
		$message="";
		$error=0;
		
		$this->db->where('terminal_name', $this->input->post('name'));
		$query = $this->db->get('terminalmanagement');
		
		if($query->num_rows > 0)
		{
			$message .='<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			$message .="Terminal Name already taken";	
			$message .='</strong></div>';
			
			$error=1;
		}
		if($error==0)
		{
			$new_city_insert_data = array(
				'terminal_name' => $this->input->post('name'),
				'Country_ID' => $this->input->post('CountrySelect'),
				'State_ID' => $this->input->post('StateSelect'),
				'state_user_input' => $this->input->post('state_user_input'),
				'city_user_input' => $this->input->post('city_user_input'),
				'City_ID' => $this->input->post('CitySelect'),	
				'status' => '1'
			);
		  
			$insert = $this->db->insert('terminalmanagement', $new_city_insert_data);
			return $insert;
		}
		else
		{
			echo $message;
		}
	}
	public function edit_city()
	{
		$message="";
		$error=0;
		
		$this->db->where('CityName', $this->input->post('name'));
		$this->db->where("city_ID !=",$this->input->post('city_ID'));
		$query = $this->db->get('city_management');
		
		if($query->num_rows > 0)
		{
			$message .='<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			$message .="City Name already taken";	
			$message .='</strong></div>';
			
			$error=1;
		}
		if($error==0)
		{
			$new_city_insert_data = array(
				'CityName' => $this->input->post('name'),
				'Country_ID' => $this->input->post('CountrySelect'),
				'State_ID' => $this->input->post('StateSelect'),			
				'status' => 1
			);
		    $this->db->where('city_ID', $this->input->post('city_ID'));
			$insert = $this->db->update('city_management',$new_city_insert_data);
			return $insert;
		}
		else
		{
			echo $message;
		}
	}
	
	public function edit_terminal()
	{
		$message="";
		$error=0;
		
		$this->db->where('terminal_name', $this->input->post('name'));
		//$query = $this->db->get('terminalmanagement');
		$this->db->where("terminal_Id !=",$this->input->post('terminal_Id'));
		$query = $this->db->get('terminalmanagement');
		
		if($query->num_rows > 0)
		{
			$message .='<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			$message .="Terminal Name already taken";	
			$message .='</strong></div>';
			
			$error=1;
		}
		if($error==0)
		{
			$new_city_insert_data = array(
				'terminal_name' => $this->input->post('name'),
				'Country_ID' => $this->input->post('CountrySelect'),
				'State_ID' => $this->input->post('StateSelect'),
				'state_user_input' => $this->input->post('state_user_input'),
				'city_user_input' => $this->input->post('city_user_input'),
				'City_ID' => $this->input->post('CitySelect'),	
				'status' => '1'
			);
			$this->db->where('terminal_Id', $this->input->post('terminal_Id'));
			$insert = $this->db->update('terminalmanagement',$new_city_insert_data);
			return $insert;
		}
		else
		{
			echo $message;
		}
	}
	
	public function GetCityDetailsFromId($CityId)
	{
		$this->db->where('city_ID', $CityId);
		$query = $this->db->get('city_management');
		if ($query->num_rows() > 0) {
			return $countrydata = $query->result();
		} else {
			return "";
		}
	}
	public function GetReviewDetailsFromId($TerminalId)
	{
		$this->db->where("id", $TerminalId);
		$query = $this->db->get('reviews');
		if ($query->num_rows() > 0) {
			return $countrydata = $query->result();
		} else {
			return "";
		}
	}
	public function GetTerminalDetailsFromId($TerminalId)
	{
		$this->db->where("terminal_Id", $TerminalId);
		$query = $this->db->get(' terminalmanagement');
		if ($query->num_rows() > 0) {
			return $countrydata = $query->result();
		} else {
			return "";
		}
	}
	public function delete_city()
	{
		$returnvalue=0;
		
		$this->db->where('city_ID', $this->input->post('ListingCityid'));
		$query = $this->db->delete('city_management');
		
		if($query)
		{
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>City deleted successfully</strong></div>');
		}
		else
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete city. Please try again</strong></div>');
			
		
		}
		return $query;
	}
	public function delete_terminal()
	{
		$returnvalue=0;
		//echo $this->input->post('ListingCityid');
		$this->db->where('terminal_Id', $this->input->post('ListingTerminalid'));
		$query = $this->db->delete('terminalmanagement');
		
		return $query;
	}
	public function delete_review()
	{
		$returnvalue=0;
		$this->db->where('id', $this->input->post('ListingReviewlid'));
		$query = $this->db->delete('reviews');
		
		return $query;
	}
	public function GetAllTerminals($search_option,$get_search)
	{
		if(($search_option!="") && ($get_search!=""))
		{
			$this->db->where($search_option." like","%".trim($get_search)."%");
		}
		
		$q = $this->db->get('terminalmanagement');
		
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function GetAllPhotos($search_option,$get_search)
	{
		if(($search_option!="") && ($get_search!=""))
		{
			$this->db->where($search_option." like","%".trim($get_search)."%");
		}
		
		$q = $this->db->get('terminalmanagement');
		
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function GetAllReviews($search_option,$get_search)
	{
		if(($search_option!="") && ($get_search!=""))
		{
			$this->db->where("m.rating like '%".trim($get_search)."%' or m.review like '%".trim($get_search)."%' or n.restaurant_name like '%".trim($get_search)."%'");
		}
		
		$this->db->select(' m.*,n.restaurant_name');
		$this->db->from('reviews as m');
		$this->db->join('restaurant as n', 'm.restaurant_id = n.id');
		$this->db->order_by("m.id", "desc");
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function GetTerminals($search_option,$get_search,$limit_start=0,$limit=0) 
	{
		if(($search_option!="") && ($get_search!=""))
		{
			$this->db->where($search_option." like","%".$get_search."%");
		}
		$this->db->order_by("terminal_Id", "desc");
		$q = $this->db->get('terminalmanagement',$limit,$limit_start);
		
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function GetCityNameFromCityID($CityID)
	{
		$this->db->where('city_ID', $CityID);
		$query = $this->db->get('city_management');
		if ($query->num_rows() > 0) {
			$countrydata = $query->result();
			return $countrydata[0]->CityName;
		} else {
			return "";
		}
		
	}
	public function Get_CityDetailsModel($Stateid)
	{
		$this->db->where('status', 1);
		$this->db->where('State_ID', $Stateid);
		$query = $this->db->get('city_management');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function Get_CityCount($Stateid)
	{
		$this->db->where('status', 1);
		$this->db->where('State_ID', $Stateid);
		$query = $this->db->get('city_management');
		return $query->num_rows();
	}
	
	public function insert_article()
	{
		$new_member_insert_data = array(
			'article_title' => $this->input->post('article_title'),
			'a_desc' => $this->input->post('a_desc'),
			'added_date' => date('Y-m-d'),
			'category' => $this->input->post('article_type'),
			'status' => $this->input->post('status')
		);
	  
		$insert = $this->db->insert('article', $new_member_insert_data);
		$lastid=$this->db->insert_id();
		
		if($insert)
		{
			
			$config['upload_path'] = PHYSICAL_PATH.'images/article_image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = 1024 * 8;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$status = "";
			$msg = "";
			$userpicture='';
			if(!empty($_FILES["image"]["name"]))
			{
				
			$file_element_name = 'image';
			
			if (!$this->upload->do_upload($file_element_name))
			{				
				$status = 'error';
				$msg = $this->upload->display_errors('', '');
			}
			else
			{				
			   $data = $this->upload->data();
				   
			   if($data)
			   {			  
				$config = array(
				     'source_image' => $data['full_path'],
				     'new_image' => $config['upload_path'] . '/thumbs/',
				     'maintain_ratio' => true,
				     'width' => 1138,
				     'height' => 287
				 );
			     //print_r($config);
			      $this->load->library('image_lib', $config);
			      $this->image_lib->resize();
			      $userpicture = $data['file_name'];
			      //echo $userpicture;die;
			   }
			
			}
			
			$new_image_data=array(
			    'image' => $userpicture
			);
			$this->db->where('id', $lastid);
			$insert_image = $this->db->update('article',$new_image_data);
			//this->db->last_query();die;
			}
		}	
		
		
		if($insert)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Article added successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add article. Please try again</strong></div>');
			
		return $insert;
	}
	
	public function edit_article()
	{
		$new_member_insert_data = array(
			'article_title' => $this->input->post('article_title'),
			'a_desc' => $this->input->post('a_desc'),
			'category' => $this->input->post('article_type'),
			'status' => $this->input->post('status')
		);
		
		$this->db->where('id', $this->input->post('id'));
		$insert = $this->db->update('article',$new_member_insert_data);
		
		if($insert)
		{
			$config['upload_path'] = PHYSICAL_PATH.'images/article_image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = 1024 * 8;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$status = "";
			$msg = "";
			$userpicture='';
			if(!empty($_FILES["image"]["name"]))
			{
			$file_element_name = 'image';
			
			if (!$this->upload->do_upload($file_element_name))
			{
				$status = 'error';
				$msg = $this->upload->display_errors('', '');
			}
			else
			{
			   $data = $this->upload->data();
				   
			   if($data)
			   {
			    
				$config = array(
				     'source_image' => $data['full_path'],
				     'new_image' => $config['upload_path'] . '/thumbs/',
				     'maintain_ratio' => true,
				     'width' => 1138,
				     'height' => 287
				 );
			     //print_r($config);
			      $this->load->library('image_lib', $config);
			      $this->image_lib->resize();
			      $userpicture = $data['file_name'];
			      //echo $userpicture;die;
			   }
			
			}
			
			$new_image_data=array(
			    'image' => $userpicture
			);
			$this->db->where('id', $this->input->post('id'));
			$insert_image = $this->db->update('article',$new_image_data);
			
			}
		}
		
		if($insert)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Article updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update article. Please try again</strong></div>');
			
		return $insert;
	}
	
	public function multiple_article_delete()
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$this->db->where('id', $value);
				$query = $this->db->delete('article');
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete. Please try again</strong></div>');
		return $query;
	}
	
	public function multiple_article_active_inactive($get)
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$new_insert_data['status'] = $get;
				
				$this->db->where('id', $value);
				$query = $this->db->update('article',$new_insert_data);
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Articles are Updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to Update Articles. Please try again</strong></div>');
		
		return $query;
	}
	
	public function getDataArticle($articleid) 
	{
		$this->db->where('id', $articleid);
		$q = $this->db->get('article');
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	//public function title_creator()
	//{
	//	$CI =& get_instance();
	//	$sitename = ucwords($CI->config->item('site_name'));
	//	
	//	if($this->uri->segment(1))
	//		$title=str_replace('_', ' ', ucwords($this->uri->segment(1))).' management - '.$sitename;
	//	else
	//		$title=$sitename.' admin';
	//}
	
	public function getAllSpecialist($search_option,$get_search) 
	{
		if(($search_option!="") && ($get_search!=""))
		{
			if($search_option=="name")
			{
				$this->db->select('st.*');
				$this->db->select('s.*');
				$this->db->from('specialist as s');
				$this->db->from('specialist_type as st');
				$this->db->where('(s.first_name like "%'.$get_search.'%"  OR s.last_name like "%'.$get_search.'%" OR concat(s.first_name," ",s.last_name) like "%'.$get_search.'%") AND st.id=s.type');
			}
			elseif($search_option=="all")
			{
				$this->db->select('st.*');
				$this->db->select('s.*');
				$this->db->from('specialist as s');
				$this->db->from('specialist_type as st');
				$this->db->where('(s.first_name like "%'.$get_search.'%" OR s.last_name like "%'.$get_search.'%" OR s.email like "%'.$get_search.'%" OR st.name like "%'.$get_search.'%" OR concat(s.first_name," ",s.last_name) like "%'.$get_search.'%" ) AND st.id=s.type');
			}
			$this->db->order_by("s.id", "DESC");
			$q = $this->db->get();
			//echo $this->db->last_query();
		}
		else
		{
		$this->db->order_by("id", "DESC");
		$q = $this->db->get('specialist');
		}
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function getSpecialist($search_option,$get_search,$limit_start=0,$limit=0) 
	{
		//$query="Select t.*,s.* from specialist as s,type as t where s.type=t.id";
		if(($search_option!="") && ($get_search!=""))
		{
			if($search_option=="name")
			{
				$this->db->select('st.*');
				$this->db->select('s.*');
				$this->db->from('specialist as s');
				$this->db->from('specialist_type as st');
				$this->db->where('(s.first_name like "%'.$get_search.'%"  OR s.last_name like "%'.$get_search.'%"  OR concat(s.first_name," ",s.last_name) like "%'.$get_search.'%") AND st.id=s.type');
			}
			elseif($search_option=="all")
			{
				$this->db->select('st.*');
				$this->db->select('s.*');
				$this->db->from('specialist as s');
				$this->db->from('specialist_type as st');
				$this->db->where('(s.first_name like "%'.$get_search.'%" OR s.last_name like "%'.$get_search.'%" OR s.email like "%'.$get_search.'%" OR st.name like "%'.$get_search.'%" OR concat(s.first_name," ",s.last_name) like "%'.$get_search.'%") AND st.id=s.type');
			}
			$this->db->order_by("s.id", "DESC");
			$q = $this->db->get();
		}
		else
		{
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('specialist',$limit,$limit_start);
		}
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function insert_specialist()
	{
		
		$message="";
		$error=0;
		

		
		$this->db->where('email', $this->input->post('email'));
		$queryemail = $this->db->get('specialist');
		
		if($queryemail->num_rows > 0)
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Specialist email id Already Taken</strong></div>');
			
			$error=1;
		}
		
		$this->db->where('email', $this->input->post('email'));
		$queryemail = $this->db->get('people');
		
		if($queryemail->num_rows > 0)
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Email id Already Taken</strong></div>');
			
			$error=1;
		}
		
		
		
		if($error==0)
		{
		$this->load->library('encrypt');
		
		$pass = $this->input->post('password');
		
		$encrypted_string = $this->encrypt->encode($pass);
		
		
		$day=$this->input->post('day');
		$month=$this->input->post('month');	
		$year=$this->input->post('year');
		if(($day!="") && ($month!="") && ($year!=""))
		{
			$dob=$year."-".$month."-".$day;
		}
		else
		{
			$dob="0000-00-00";
		}
		$new_member_insert_data = array(

			'type' => $this->input->post('type'),
			'sub_type' => $this->input->post('sub_type'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'title' => $this->input->post('title'),
			
			'gender' => $this->input->post('gender'),
			'board_certified' => $this->input->post('board_certified'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			
			'date_of_birth' =>$dob,
			'status' => $this->input->post('status'),
			'personal_lisence' => $this->input->post('personal_lisence'),
			'lisence_state' => $this->input->post('lisence_state'),
			'personal_email' => $this->input->post('personal_email'),
			'hear_about' => $this->input->post('hear_about'),
			
			'management_system' => $this->input->post('management_system')


		);
	  
		$insert = $this->db->insert('specialist', $new_member_insert_data);
		
		$lastid=$this->db->insert_id();
		
		//..........insert specialist into user...........//
		if($insert)
		{
			$new_specialist_insert_data = array(
				'user_type' => 2,
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'password' => $encrypted_string,
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email'),
				'gender' => $this->input->post('gender'),
				'dob' =>$dob,
				'status' => $this->input->post('status'),
				'specialist_id' => $lastid
			);
			$insert = $this->db->insert('people', $new_specialist_insert_data);
		}
		
		//..........end of insert specialist into user...........//
		if($insert)
                {

		//.............image upload.......................................//
			list($width, $height,$type) = getimagesize($_FILES["image"]["tmp_name"]);
	
			$size = filesize($_FILES["image"]["tmp_name"]);
			
			
			$DIR_IMG_NORMAL = PHYSICAL_PATH."images/specialist_profile_image/";
		
			$filename=$_FILES['image']['name'];
			$img_info=pathinfo($_FILES["image"]['name']);
			
			$image_name=time().'.'.$img_info['extension'];
			
			$src=$_FILES['image']['tmp_name'];
			$dest=$DIR_IMG_NORMAL.$image_name;
			
			if(move_uploaded_file($src,$dest))
			{
				
				
				$size_width_1=195;
				$size_height_1=195;
				
				$DIR_IMG_THUMB_small_1 = PHYSICAL_PATH."images/specialist_profile_image/thumbs/".$image_name;
				
				
				
				$tag="";
				
				//echo $DIR_IMG_THUMB_small_1.' -> '.$DIR_IMG_THUMB_small_2.' -> '.$dest;die;
				
				$this->thumbnail_crop_new($DIR_IMG_THUMB_small_1, $dest, $size_width_1, $size_height_1, $tag);
				
				//thumbnail_crop_new($DIR_IMG_THUMB_small_3, $dest, $size_width_3, $size_height_3, $tag);
		
				$new_image_data=array(
					'image' => $image_name
				    );
				    $this->db->where('id', $lastid);
				    $insert_image = $this->db->update('specialist',$new_image_data);
				    
				$specialist_image_user=array(
					'image' => $image_name
				    );
				    $this->db->where('specialist_id', $lastid);
				    $insert_image = $this->db->update('people',$new_image_data);
			}
                }
		
		
		$name=$this->input->post('business_name');
		$website_url=$this->input->post('business_website');
		$email=$this->input->post('business_email');
		$country=$this->input->post('country');
		$state=$this->input->post('state');
		$city=$this->input->post('city');
		$street=$this->input->post('street');
		$zipcode=$this->input->post('zipcode');
		$address=$this->input->post('address');
		$phone_number=$this->input->post('business_phone');
		$fax=$this->input->post('business_fax');
		
		for($i=0;$i<count($this->input->post('country'));$i++)
		{
			
			$new_address=array(
				'specialist_id' => $lastid,
				'name' => $name[$i],
				'website_url' => $website_url[$i],
				'email' => $email[$i],
				'phone_number' => $phone_number[$i],
				'fax' => $fax[$i],
				'country'=>$country[$i],
				'state'=>$state[$i],
				'city'=>$city[$i],
				'street'=>$street[$i],
				'zipcode'=>$zipcode[$i],
				'address'=>$address[$i]
			);
			if(($this->input->post('country')!="") && ($this->input->post('state')!="") && ($this->input->post('city')!="") && ($this->input->post('address')!=""))
			{
				$insert_address=$this->db->insert('specialist_address',$new_address);
			}
		}
		
		if($insert)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>Specialist added successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Failed to add specialist. Please try again</strong></div>');
			
		return $insert;
		}
	}
	public function thumbnail_crop_new($fileThumb, $file, $Twidth, $Theight, $tag)
	{
		$img_brk=explode('/', $fileThumb);
		$tmp_path=PHYSICAL_PATH.'images/specialist_profile_image/thumbs/tmp/'.$img_brk[count($img_brk)-1];
		
		list($width_orig, $height_orig, $type, $attr) = getimagesize($file);
		
		switch($type)
		{
			case 1:
			$img = ImageCreateFromGIF($file);
			break;
	
			case 2:
			$img = ImageCreateFromJPEG($file);
			break;
	
			case 3: 
			$img = ImageCreateFromPNG($file);
			break;
		}
	
		$thumb_width = $Twidth;
		$thumb_height = $Theight;
		
		// align
		//$align = $_GET[align];
		 
		// image source
		$imgSrc = $file;
		$imgSrc_Array = explode('.',$imgSrc);
		$imgSrc_Array_end_len = strlen(end($imgSrc_Array));
		
		// ratio
		$ratio_orig = $width_orig/$height_orig;
		 
		// landscape or portrait?
		if ($thumb_width/$thumb_height > $ratio_orig)
		{
		   $new_height = $thumb_width/$ratio_orig;
		   $new_width = $thumb_width;
		}
		else
		{
		   $new_width = $thumb_height*$ratio_orig;
		   $new_height = $thumb_height;
		}
		 
		// middle
		$x_mid = $new_width/2;
		$y_mid = $new_height/2;
		 
		// create new image
		$process = imagecreatetruecolor(round($new_width), round($new_height)); 
		imagecopyresampled($process, $img, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
		$thumb = imagecreatetruecolor($thumb_width, $thumb_height); 
		 
		// alignment
	
		
		if(imagecopyresampled($thumb, $process, 0, 0, ($x_mid-($thumb_width/2)), ($y_mid-($thumb_height/2)), $thumb_width, $thumb_height, $thumb_width, $thumb_height))
		{
			switch($type)
			{
				case 1:
				ImageGIF($thumb,$fileThumb);
				break;
	
				case 2:
				ImageJPEG($thumb,$fileThumb);
				break;
	
				case 3:
				ImagePNG($thumb,$fileThumb);
				break;
			}
	
			return true;
		}

		return true;
	}
	public function getDataSpecialist($specialistid) 
	{
		$this->db->where('id', $specialistid);
		$q = $this->db->get('specialist');
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function edit_specialist()
	{
		$message="";
		$error=0;
		

		
		$this->db->where('email', $this->input->post('email'));
		$this->db->where("id !=",$this->input->post('ListingUserid'));
		$queryemail = $this->db->get('specialist');
		
		if($queryemail->num_rows > 0)
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Specialist email id Already Taken</strong></div>');
			
			$error=1;
		}
		
		$this->db->where('email', $this->input->post('email'));
		$this->db->where("specialist_id !=",$this->input->post('ListingUserid'));
		$queryemail = $this->db->get('people');
		
		if($queryemail->num_rows > 0)
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Email id Already Taken</strong></div>');
			
			$error=1;
		}
		
		if($error==0)
		{
			
			
		
			
			
			
			
		$day=$this->input->post('day');
		$month=$this->input->post('month');	
		$year=$this->input->post('year');
		if(($day!="") && ($month!="") && ($year!=""))
		{
			$dob=$year."-".$month."-".$day;
		}
		else
		{
			$dob="0000-00-00";
		}
		$new_member_insert_data = array(
			'type' => $this->input->post('type'),
			'sub_type' => $this->input->post('sub_type'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'title' => $this->input->post('title'),
			
			'gender' => $this->input->post('gender'),
			'board_certified' => $this->input->post('board_certified'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			
			'date_of_birth' =>$dob,
			'status' => $this->input->post('status'),
			'personal_lisence' => $this->input->post('personal_lisence'),
			'lisence_state' => $this->input->post('lisence_state'),
			'personal_email' => $this->input->post('personal_email'),
			'hear_about' => $this->input->post('hear_about'),
			
			'management_system' => $this->input->post('management_system')
		);
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$insert = $this->db->update('specialist',$new_member_insert_data);
		
		$update_specialist_id=$this->input->post('ListingUserid');
		
		
		//..........update specialist into user...........//
		if($insert)
		{
			if($this->input->post('password')!="")
			{
			$this->load->library('encrypt');
		
			$pass = $this->input->post('password');
			
			$encrypted_string = $this->encrypt->encode($pass);
			
			$update_password=array(
				'password' => $encrypted_string,
			);
			$this->db->where('specialist_id', $this->input->post('ListingUserid'));
			$update_specialist = $this->db->update('people',$update_password);
			}
			
			$new_specialist_insert_data = array(
				
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email'),
				'gender' => $this->input->post('gender'),
				'dob' =>$dob,
				'status' => $this->input->post('status'),
				
			);
			$this->db->where('specialist_id', $this->input->post('ListingUserid'));
			$update_specialist = $this->db->update('people',$new_specialist_insert_data);
		}
		
		//..........end of update specialist into user...........//
		
		if($insert)
                {

		//.............image upload.......................................//
		if(!empty($_FILES["image"]["name"]))
                    {
		    	list($width, $height,$type) = getimagesize($_FILES["image"]["tmp_name"]);
	
			$size = filesize($_FILES["image"]["tmp_name"]);
			
			
			$DIR_IMG_NORMAL = PHYSICAL_PATH."images/specialist_profile_image/";
		
			$filename=$_FILES['image']['name'];
			$img_info=pathinfo($_FILES["image"]['name']);
			
			$image_name=time().'.'.$img_info['extension'];
			
			$src=$_FILES['image']['tmp_name'];
			$dest=$DIR_IMG_NORMAL.$image_name;
			
			if(move_uploaded_file($src,$dest))
			{
				
				
				$size_width_1=195;
				$size_height_1=195;
				
				$DIR_IMG_THUMB_small_1 = PHYSICAL_PATH."images/specialist_profile_image/thumbs/".$image_name;
				
				
				
				$tag="";
				
				//echo $DIR_IMG_THUMB_small_1.' -> '.$DIR_IMG_THUMB_small_2.' -> '.$dest;die;
				
				$this->thumbnail_crop_new($DIR_IMG_THUMB_small_1, $dest, $size_width_1, $size_height_1, $tag);
				
				//thumbnail_crop_new($DIR_IMG_THUMB_small_3, $dest, $size_width_3, $size_height_3, $tag);
		
				$new_image_data=array(
					'image' => $image_name
				    );
				    $this->db->where('id', $update_specialist_id);
				    $insert_image = $this->db->update('specialist',$new_image_data);
				    
				$specialist_update_image_user=array(
					'image' => $image_name
				    );
				    $this->db->where('specialist_id', $update_specialist_id);
				    $insert_image = $this->db->update('people',$new_image_data);
			}
                    
                    
                    
                    }   
                }
		
		
		$name=$this->input->post('business_name');
		$website_url=$this->input->post('business_website');
		$email=$this->input->post('business_email');
		$country=$this->input->post('country');
		$state=$this->input->post('state');
		$city=$this->input->post('city');
		$street=$this->input->post('street');
		$zipcode=$this->input->post('zipcode');
		$address=$this->input->post('address');
		$phone_number=$this->input->post('business_phone');
		$fax=$this->input->post('business_fax');
		
		$whole_address_edit=$this->input->post('edit_whole_address');
		$name_edit=$this->input->post('edit_business_name');
		$website_url_edit=$this->input->post('edit_business_website');
		$email_edit=$this->input->post('edit_business_email');
		$phone_number_edit=$this->input->post('edit_business_phone');
		$fax_edit=$this->input->post('edit_business_fax');
		$country_edit=$this->input->post('edit_country');
		$state_edit=$this->input->post('edit_state');
		$city_edit=$this->input->post('edit_city');
		$street_edit=$this->input->post('edit_street');
		$zipcode_edit=$this->input->post('edit_zipcode');
		$address_edit=$this->input->post('edit_address');
		
		if(count($whole_address_edit)>0)
		{
			for($id_edit=0;$id_edit<count($whole_address_edit);$id_edit++)
			{
				$address_id_edit=$whole_address_edit[$id_edit];
				$new_address_edit=array(
					'specialist_id' => $update_specialist_id,
					'name' => $name_edit[$id_edit],
					'website_url' => $website_url_edit[$id_edit],
					'email' => $email_edit[$id_edit],
					'phone_number' => $phone_number_edit[$id_edit],
					'fax' => $fax_edit[$id_edit],
					'country'=>$country_edit[$id_edit],
					'state'=>$state_edit[$id_edit],
					'city'=>$city_edit[$id_edit],
					'street'=>$street_edit[$id_edit],
					'zipcode'=>$zipcode_edit[$id_edit],
					'address'=>$address_edit[$id_edit]
				);
			
			if(($this->input->post('edit_country')!="") && ($this->input->post('edit_state')!="") && ($this->input->post('edit_city')!="") && ($this->input->post('edit_address')!="") && ($this->input->post('edit_street')!="") && ($this->input->post('edit_zipcode')!=""))
			{
			$this->db->where('id', $address_id_edit);
			
			$this->db->update('specialist_address',$new_address_edit);
			//echo $this->db->last_query();
			}
			}
		}
		
		for($i=0;$i<count($this->input->post('country'));$i++)
		{
			
			$new_address=array(
				'specialist_id' => $update_specialist_id,
				'name' => $name[$i],
				'website_url' => $website_url[$i],
				'email' => $email[$i],
				'phone_number' => $phone_number[$i],
				'fax' => $fax[$i],
				'country'=>$country[$i],
				'state'=>$state[$i],
				'city'=>$city[$i],
				'street'=>$street[$i],
				'zipcode'=>$zipcode[$i],
				'address'=>$address[$i]
				
			);
			if(($this->input->post('country')!="") && ($this->input->post('state')!="") && ($this->input->post('city')!="") && ($this->input->post('address')!=""))
			{
				$insert_address=$this->db->insert('specialist_address',$new_address);
			}
		}
		
		if($insert)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>Specialist updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Failed to update specialist. Please try again</strong></div>');
			
		return $insert;
	}
	}
	public function multiple_specialist_delete()
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$this->db->where('id', $value);
				$fetch_user=$this->db->get('specialist');
				//echo $this->db->last_query();
				if($fetch_user->num_rows()>0)
				{
					
					foreach($fetch_user->result() as $user_image)
					{
						
					$image_path=PHYSICAL_PATH.'images/specialist_profile_image/'.$user_image->image;
					$image_path_thumb=PHYSICAL_PATH.'images/specialist_profile_image/thumbs/'.$user_image->image;
					//echo $image_path." ".$image_path_thumb;
					//die;
					unlink($image_path);
					unlink($image_path_thumb);
					}
				}
				
				$this->db->where('doctor_id', $value);
				$delete_doctor_review = $this->db->delete('doctor_review');
				
				$this->db->where('specialist_id', $value);
				$delete_appointment_booking = $this->db->delete('specialist_address');
				
				$this->db->where('specialist_id', $value);
				$delete_appointment_booking = $this->db->delete('people');
				
				
				$this->db->where('id', $value);
				$query = $this->db->delete('specialist');
			}
		}
		else
		{
			$query=0;
		}
		
		
	
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Data deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete data. Please try again</strong></div>');
			
		return $query;
	}
	
	public function multiple_specialist_active_inactive($get)
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$new_insert_data['status'] = $get;
				
				$this->db->where('id', $value);
				$query = $this->db->update('specialist',$new_insert_data);
			}
		}
		else
		{
			$query=0;
		}
		
		
	
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Status updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to updated status. Please try again</strong></div>');
			
		return $query;
	}
	public function delete_specialist()
	{
		$returnvalue=0;
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$fetch_user=$this->db->get('specialist');
		//echo $this->db->last_query();
		if($fetch_user->num_rows()>0)
		{
			
			foreach($fetch_user->result() as $user_image)
			{
				
			$image_path=PHYSICAL_PATH.'images/specialist_profile_image/'.$user_image->image;
			$image_path_thumb=PHYSICAL_PATH.'images/specialist_profile_image/thumbs/'.$user_image->image;
			unlink($image_path);
			unlink($image_path_thumb);
			}
		}
		
		$this->db->where('doctor_id', $this->input->post('ListingUserid'));
		$delete_doctor_review = $this->db->delete('doctor_review');
		
		$this->db->where('specialist_id', $this->input->post('ListingUserid'));
		$delete_appointment_booking = $this->db->delete('specialist_address');
		
		$this->db->where('specialist_id', $this->input->post('ListingUserid'));
		$delete_appointment_booking = $this->db->delete('people');
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$query = $this->db->delete('specialist');
		
		return $query;
	}
	public function delete_specialist_address($address_id)
	{
		$returnvalue=0;
		
		$this->db->where('id', $address_id);
		$query = $this->db->delete('specialist_address');
		
		return $query;
	}
	public function GetSpecialistType()
	{
		$this->db->where('main_id', 0);
		$this->db->where('status', 1);
		$this->db->order_by('name','ASC');
		$query = $this->db->get('specialist_type');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
		
	}
	public function GetSpecialistSubType($type_id)
	{
		$this->db->where('main_id',$type_id);
		$query = $this->db->get('specialist_type');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
		
	}
	public function GetSpecialistMainType($type_id)
	{
		$this->db->where('main_id', 0);
		$this->db->where('id', $type_id);
		$query = $this->db->get('specialist_type');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
		
	}
	
	public function checkusername_specialist($username) 
	{
		$this->db->where('username', $username);
		$q = $this->db->get('specialist');
        
		return $q->num_rows();
	}
	public function checkusername_edit_specialist($username,$user_id) 
	{
		$this->db->where('username', $username);
		$this->db->where('id !=', $user_id);
        $q = $this->db->get('specialist');
        
        return $q->num_rows();
	}
	public function checkemail_specialist($email) 
	{
		$this->db->where('email', $email);
		$q = $this->db->get('specialist');
		
		$this->db->where('email', $email);
		$q = $this->db->get('people');
        
        return $q->num_rows();
	}
	public function checkemail_edit_specialist($email,$user_id) 
	{
		$this->db->where('email', $email);
		$this->db->where('id !=', $user_id);
		$q = $this->db->get('specialist');
		
		$this->db->where('email', $email);
		$this->db->where('specialist_id !=', $user_id);
		$q = $this->db->get('people');
        
        return $q->num_rows();
	}
	public function getDataSpecialistAddress($specialistid) 
	{
		$this->db->where('specialist_id', $specialistid);
		$q = $this->db->get('specialist_address');
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	public function Get_TypeModel($TypeId)
	{
		
		$this->db->where('main_id', $TypeId);
		$query = $this->db->get('specialist_type');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function Get_TypeCount($TypeId)
	{
		
		$this->db->where('main_id', $TypeId);
		$query = $this->db->get('specialist_type');
		return $query->num_rows();
	}
	public function GetAllTitle()
	{
		$this->db->where('status',1);
		$this->db->order_by('title_name','ASC');
		$query = $this->db->get('specialist_title');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function CategoryType()
	{
		$this->db->where('status',1);
		$this->db->order_by('name','ASC');
		$query=$this->db->get('category');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	
	public function getCategoryName($catId)
	{
		//echo $catId;exit();
		
		$this->db->select('name');
		$this->db->where('id',$catId);
		$catName = $this->db->get('category');
		if($catName->num_rows() > 0)
		{
			return $catName->row(); 
		}
		else
			return false;
		
	}
	
	public function getDatataskcategory()
	{
		$this->db->where('status',1);
		$catName = $this->db->get('task_category');
		if($catName->num_rows() > 0)
		{
			return $catName->result();
		}
		else
			return false;
		
	}
	
	public function check_unique_email($email_address)
	{
	    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email_address))
	    {
		$error=1;
		$return='Please enter valid email';
	    }
	    else
	    {
		$this->db->where('email',$email_address);
		$q=$this->db->get('people');
		//echo $this->db->last_query();
	       
		if($q->num_rows>0)
		{
		    $error=1;
		    $return='Email is already taken.';
		}
		else
		{
		     $error=0;
		     $return=0;
		}
	    }
	    
	    return $return;
	}
	public function check_unique_email_edit($email_address,$edit_email_hidden)
	{
	    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email_address))
	    {
		$error=1;
		$return='Please enter valid email';
	    }
	    else
	    {
		$this->db->where('email',$email_address);
		$this->db->where('email !=',$edit_email_hidden);
		$q=$this->db->get('people');
		//echo $this->db->last_query();
	       
		if($q->num_rows>0)
		{
		    $error=1;
		    $return='Email is already taken.';
		}
		else
		{
		     $error=0;
		     $return=0;
		}
	    }
	    
	    return $return;
	}
 public function get_product_type()
	{
		$this->db->select('*');
		$this->db->from('product_type');
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
}

