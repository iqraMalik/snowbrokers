<?php

class User extends CI_Controller {

	// num of records per page
	private $limit;
 
	// empty array for search terms
	var $terms     = array();
	
    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modeladmin');
		 $this->load->model('modelsports');
		$this->load->model('modelgoals');
		$this->load->model('site_settingsmodel');
		if(!$this->modeladmin->isLoggedIn()){
			redirect("login/index");
		}
		
		$this->limit = $this->site_settingsmodel->per_page();
		
	}

	
	function index()
	{
		 $parents = $this->modeladmin->access_avalible(12);

		if($parents==0)
		{
		redirect('dashboard/index');
		}else{		
		
			$data['success_msg'] 	= $this->session->userdata('success_msg');
			$data['error_msg'] 	= $this->session->userdata('error_msg');
			
		
			$status = '';
			$searchtext = '';
			$searchparams = '';
			$sort_field = '';
			$sort_type = '';
			
			
			// get total segment number in url to create $config['uri_segment'] for pagination 
			$last = $this->uri->total_segments();
			
			// set offset from last segment
			$offset = $this->uri->segment($last);
			
			// set total segment number
			$uri_segment = $last;
			
			//if search mode set then goes here
			if($this->input->post('search_mode')==='search')
			{
				
				$searchparams = 'q=';
				if($this->input->post('btnVal')==1)
				{
					$status = 'status=1';
					$searchparams .= $status."&";
					
					$data['btnval'] = $this->input->post('btnVal');
				}
				if($this->input->post('btnVal')==0)
				{
					$status = 'status=0';
					$searchparams .= $status."&";
					
					$data['btnval'] = $this->input->post('btnVal');
				}
				
				if($this->input->post('sort_field')!='')
				{
					$sort_field = $this->input->post('sort_field');
					$sort_type = $this->input->post('sort_type');
					$searchparams .= "sfield=".$sort_field."&stype=".$sort_type."&";
					
					//set cookies
					delete_cookie('user_type');
					delete_cookie('user_field');
					$cookie = array(
					'name'   => 'user_type',
					'value'  => $sort_type,
					'expire' => time()+24*60*60*365*100
					);
					set_cookie($cookie);
					
					$cookie2 = array(
					'name'   => 'user_field',
					'value'  => $sort_field,
					'expire' => time()+24*60*60*365*100
					);
					set_cookie($cookie2);
					
				}
				if($this->input->post('get_search')!='')
				{
					$searchoption = $this->input->post('search_option');
					//if( $searchoption == 'customer_type_b' )
					//{
					////die();	
					//	$searchtext = "customer_type = 1 AND first_name = ".urlencode($this->input->post('get_search'))." OR last_name = ".urlencode($this->input->post('get_search'))." OR email = ".urlencode($this->input->post('get_search'))."";
					//}
					//else if( $searchoption == 'customer_type_s' )
					//{
					//	$searchtext = "customer_type = 2 AND first_name = ".urlencode($this->input->post('get_search'))." OR last_name = ".urlencode($this->input->post('get_search'))." OR email = ".urlencode($this->input->post('get_search'))."";	
					//}
					//else
					//{
					//	$searchtext = $searchoption."=".urlencode($this->input->post('get_search'));	
					//}
				
					
					$searchtext = $searchoption."=".urlencode($this->input->post('get_search'));
					$searchparams .= $searchtext."&";
					
					$data['get_search'] = $this->input->post('get_search');
					$data['search_option'] = $searchoption;
				}
				if($this->input->post('date')!='')
				{
					$register_date = 'register_date='.urlencode($this->input->post('date'));
					$searchparams .= $register_date."&";
					
					$data['search_date'] = $this->input->post('date');
				}
				$searchtext = '/q=/';
				$searchparam = preg_replace($searchtext,'',$searchparams,1);
				$searchparam = substr($searchparam,0,-1);
				
				$config['total_rows'] = $this->modeladmin->count_all_users($searchparam);
				
				$offset = 0;
				$uri_segment = $offset;
				$parents = $this->modeladmin->get_paged_list_users($this->limit,$offset,$searchparam);
				
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
				
			}
			//after search mode set and url segment greater than 3(i.e.-4)
			else if($last>3)
			{
				
				//echo $searchparams;exit;
				$searchparams = base64_decode($this->uri->segment(3));
				
				$searchtext = '/q=/';
				$searchparam = preg_replace($searchtext,'',$searchparams,1);
				$searchparam = substr($searchparam,0,-1);
				$config['total_rows'] = $this->modeladmin->count_all_users($searchparam);
				$parents = $this->modeladmin->get_paged_list_users($this->limit,$offset,$searchparam);
				
				$search = explode("&",$searchparam);
				foreach($search as $searchitem)
				{
					list ($key,$value) = explode ('=',$searchitem);
					$searchitems[$key] = urldecode($value);
				}
				if(isset($searchitems['status']))
				{
					$data['btnval'] = $searchitems['status'];
				}
				if(isset($searchitems['first_name']))
				{
					$data['get_search'] = $searchitems['first_name'];
					$data['search_option'] = 'first_name';
				}
				if(isset($searchitems['last_name']))
				{
					$data['get_search'] = $searchitems['last_name'];
					$data['search_option'] = 'last_name';
				}
				if(isset($searchitems['email']))
				{
					$data['get_search'] = $searchitems['email'];
					$data['search_option'] = 'email';
				}
				if(isset($searchitems['register_date']))
				{
					$data['search_date'] = $searchitems['register_date'];
				}
				$sort_type = get_cookie('user_type');
				$sort_field = get_cookie('user_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
				
			}
			//for first load and for first page during pagination
			else
			{
				
				$searchparam = '';
				$searchparams = base64_decode($this->uri->segment(3));
				if(substr($searchparams,0,2)==='q=')
				{
					
					$searchtext = '/q=/';
					$searchparam = preg_replace($searchtext,'',$searchparams,1);
					$searchparam = substr($searchparam,0,-1);
					
					$config['total_rows'] = $this->modeladmin->count_all_users($searchparam);
					$parents = $this->modeladmin->get_paged_list_users($this->limit,$offset,$searchparam);
					
					$search = explode("&",$searchparam);
					foreach($search as $searchitem)
					{
						list ($key,$value) = explode ('=',$searchitem);
						$searchitems[$key] = urldecode($value);
					}
					if(isset($searchitems['status']))
					{
						$data['btnval'] = $searchitems['status'];
					}
					if(isset($searchitems['first_name']))
					{
						$data['get_search'] = $searchitems['first_name'];
						$data['search_option'] = 'first_name';
					}
					if(isset($searchitems['last_name']))
					{
						$data['get_search'] = $searchitems['last_name'];
						$data['search_option'] = 'last_name';
					}
					if(isset($searchitems['email']))
					{
						$data['get_search'] = $searchitems['email'];
						$data['search_option'] = 'email';
					}					
					if(isset($searchitems['register_date']))
					{
						$data['search_date'] = $searchitems['register_date'];
					}
					
					$sort_type = get_cookie('user_type');
					$sort_field = get_cookie('user_field');
					$data['sort_type'] = $sort_type;
					$data['sort_field'] = $sort_field;
				}
				else
				{
					
					$sort_type = get_cookie('user_type');
					$sort_field = get_cookie('user_field');
					$searchparams = "q=sfield=".$sort_field."&stype=".$sort_type."&";
					$searchtext = '/q=/';
					$searchparam = preg_replace($searchtext,'',$searchparams,1);
					$searchparam = substr($searchparam,0,-1);
					
					$search = explode("&",$searchparam);
					foreach($search as $searchitem)
					{
						list ($key,$value) = explode ('=',$searchitem);
						$searchitems[$key] = urldecode($value);
					}
					if(isset($searchitems['status']))
					{
						$data['btnval'] = $searchitems['status'];
					}
					if(isset($searchitems['first_name']))
					{
						$data['get_search'] = $searchitems['first_name'];
						$data['search_option'] = 'first_name';
					}
					if(isset($searchitems['last_name']))
					{
						$data['get_search'] = $searchitems['last_name'];
						$data['search_option'] = 'last_name';
					}
					if(isset($searchitems['email']))
					{
						$data['get_search'] = $searchitems['email'];
						$data['search_option'] = 'email';
					}					
					if(isset($searchitems['register_date']))
					{
						$data['search_date'] = $searchitems['register_date'];
					}
					
					$config['total_rows'] = $this->modeladmin->count_all_users($searchparam);
					$parents = $this->modeladmin->get_paged_list_users($this->limit,$offset,$searchparam);
					$sort_type = get_cookie('user_type');
					$sort_field = get_cookie('user_field');
					$data['sort_type'] = $sort_type;
					$data['sort_field'] = $sort_field;
				}
				
			}
			
			$searchparams = base64_encode($searchparams);
			// generate pagination
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/user/index/'.$searchparams.'/';
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = $uri_segment;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
		
			// load view
			$data['user_list'] = $parents;
			$this->load->view('user/index',$data);
		}
		
	}
	function check_username()
	{
		echo '[SEPARETOR]'.$this->modeladmin->checkusername($_REQUEST['username']).'[SEPARETOR]';
	}
	function check_username_edit()
	{
		echo '[SEPARETOR]'.$this->modeladmin->checkusername_edit($_REQUEST['username'],$_REQUEST['userid']).'[SEPARETOR]';
	}
	
	 public function check_unique_email()
	{
	    $result=$this->modeladmin->check_unique_email($_REQUEST['email_address']);
	    
	    if($result=='Not Available' AND $result !=0)
	    {
		echo 'Email is already taken.';
	       
	    }
	    else if($result=='Not Valid' AND $result !=0)
	    {
		echo 'Please enter valid email.';
		
	    }
	    else
	    {
		echo $result;
	    }
	}
	
	public function check_unique_email_edit()
	{
	    $result=$this->modeladmin->check_unique_email_edit($_REQUEST['email_address'],$_REQUEST['edit_email_hidden']);
	    
	    if($result=='Not Available' AND $result !=0)
	    {
		echo 'Email is already taken.';
	       
	    }
	    else if($result=='Not Valid' AND $result !=0)
	    {
		echo 'Please enter valid email.';
		
	    }
	    else
	    {
		echo $result;
	    }
	}
	function check_email()
	{
		echo '[SEPARETOR]'.$this->modeladmin->checkemail($_REQUEST['email']).'[SEPARETOR]';
	}
	function check_email_edit()
	{
		echo '[SEPARETOR]'.$this->modeladmin->checkemail_edit($_REQUEST['email'],$_REQUEST['userid']).'[SEPARETOR]';
	}
	function adduser()
	{
		$this->load->view('user/adduser');
	}
	function edituser()
	{
		
		$editid=$this->input->post('ListingUserid');
		//echo $editid;die;
		if($editid=="")
		{
			redirect('user/index');
		}
		else
		{
			$data['edit_user']=$this->modeladmin->users_to_edit($editid);
//print_r($edit_task);die;
			$this->load->view('user/edituser', $data);
		}
	}
	public function update_tasaroo()
	{
	$insertd = $this->modeladmin->update_tasaroo();
	redirect('user/index');
	}
	public function update_users()
	{
		
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
		$insertd = $this->modeladmin->update1user();		
			
		
		redirect('user/index');
	}
	public function updatewho_taskaroo(){
	$insertd = $this->modeladmin->whoaretaskarooupdate();
	redirect('user/index');
	}
	function insert_users()
	{
		
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
			
		$insertd = $this->modeladmin->adduser();	
		
		
		redirect('user/index');
			
		
		
	}
	
	public function Select_state()
	{
	     $this->load->model('modelgoals');
	    $result=$this->modelgoals->Select_state($_REQUEST['country_id']);
	    if($result !=0)
	    {
		foreach($result as $key=>$val)
		{
		    ?>
		    <option value="<?php echo $val->id;?>"><?php echo $val->state_name;?></option>
		    <?php
		}
	    }
	    else
	    {
		?>
		    <option value="0">Not Available</option>
		<?php
	    }
	}
	public function insert_taskaroo()
	{
		//echo "asdasds";die;
	$insertd = $this->modeladmin->insert_taskaroo();
	if($insertd)
	redirect('user/index');
	else{
	$this->load->view('user/adduser');	
	}
	}
	public function delete_user()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$editid=$this->input->post('ListingUserid');
		//echo $editid;die;
		if($editid=="")
		{
			redirect('user/index');
		}
		else
		{
			$query = $this->modeladmin->users_to_delete($editid);
					
		}
		redirect('user/index');	
	}
	function get_All_user() {
		$data['rows'] = $this->modeladmin->getAllUser();
	}
	public function multiple_option_user()
	{
		$data['success_msg'] = $this->session->userdata('success_msg');
		$data['error_msg'] = $this->session->userdata('error_msg');
		
		if($this->input->post('select_my_option')=="")
		{
			redirect('task_category/index');
		}
		else
		{
			if($this->input->post('select_my_option')==1)
			{
			$insertd = $this->modeladmin->multiple_user_delete();
			}
			else if($this->input->post('select_my_option')==2)
			{
			$insertd = $this->modeladmin->multiple_user_active_inactive(1);
			}
			else if($this->input->post('select_my_option')==3)
			{
			$insertd = $this->modeladmin->multiple_user_active_inactive(0);
			}

			
		}
		redirect('user/index');
		
		
	}
function email()
    {
	$email = $this->input->post('emailvalid');
	$msg['data']=$this->modeladmin->mail_idcheck($email);
       if($msg>0)
	{
		     
	$this->load->view('user/email_ajax',$msg);
	 }
    }
}