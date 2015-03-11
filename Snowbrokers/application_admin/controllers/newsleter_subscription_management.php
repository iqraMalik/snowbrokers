<?php

class newsleter_subscription_management extends CI_Controller {
 //private $limit = 10;
 
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
                $this->load->model('modelnewsletr_subscription_management');
		
		if(!$this->modelnewsletr_subscription_management->isLoggedIn()){
			redirect("login/index");
		}
		$parents = $this->modeladmin->access_avalible(4);
		if($parents==0)
		{
			redirect('dashboard/index');
		}
		$GLOBALS['limit'] = $this->modeladmin->setting_pagination();
	}
	
	function index()
	{
           
		$data['success_msg']	= $this->session->userdata('success_msg');
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
				delete_cookie('news_newsleter_subscription_management_type');
				delete_cookie('news_newsleter_subscription_management_field');
				$cookie = array(
				'name'   => 'news_newsleter_subscription_management_type',
				'value'  => $sort_type,
				'expire' => time()+24*60*60*365*100
				);
				set_cookie($cookie);
				
				$cookie2 = array(
				'name'   => 'news_newsleter_subscription_management_field',
				'value'  => $sort_field,
				'expire' => time()+24*60*60*365*100
				);
				set_cookie($cookie2);
				
			}
			if($this->input->post('get_search')!='')
			{
				$searchoption = $this->input->post('search_option');
				$searchtext = $searchoption."=".urlencode($this->input->post('get_search'));
				$searchparams .= $searchtext."&";
				
				$data['search_text'] = $this->input->post('get_search');
				$data['search_option'] = $searchoption;
			}

			$searchtext = '/q=/';
			$searchparam = preg_replace($searchtext,'',$searchparams,1);
			$searchparam = substr($searchparam,0,-1);
			
			$config['total_rows'] = $this->modelnewsletr_subscription_management->count_all_slider($searchparam);
			
			$offset = 0;
			$uri_segment = $offset;
			$parents = $this->modelnewsletr_subscription_management->get_paged_list_slider($GLOBALS['limit'],$offset,$searchparam);
			
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
			$config['total_rows'] = $this->modelnewsletr_subscription_management->count_all_slider($searchparam);
			$parents = $this->modelnewsletr_subscription_management->get_paged_list_slider($GLOBALS['limit'],$offset,$searchparam);
			
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
			if(isset($searchitems['email']))
			{
				$data['search_text'] = $searchitems['email'];
				$data['search_option'] = 'email';
			}

			$sort_type = get_cookie('news_newsleter_subscription_management_type');
			$sort_field = get_cookie('news_newsleter_subscription_management_field');
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
				
				$config['total_rows'] = $this->modelnewsletr_subscription_management->count_all_slider($searchparam);
				$parents = $this->modelnewsletr_subscription_management->get_paged_list_slider($GLOBALS['limit'],$offset,$searchparam);
				
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
				if(isset($searchitems['email']))
				{
					$data['search_text'] = $searchitems['email'];
					$data['search_option'] = 'email';
				}

				
				$sort_type = get_cookie('news_newsleter_subscription_management_type');
				$sort_field = get_cookie('news_newsleter_subscription_management_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			else
			{
				$sort_type = get_cookie('news_newsleter_subscription_management_type');
				$sort_field = get_cookie('news_newsleter_subscription_management_field');
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
				if(isset($searchitems['email']))
				{
					$data['search_text'] = $searchitems['email'];
					$data['search_option'] = 'email';
				}
				
				
				$config['total_rows'] = $this->modelnewsletr_subscription_management->count_all_slider($searchparam);
				$parents = $this->modelnewsletr_subscription_management->get_paged_list_slider($GLOBALS['limit'],$offset,$searchparam);
				$sort_type = get_cookie('news_newsleter_subscription_management_type');
				$sort_field = get_cookie('news_newsleter_subscription_management_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			
		}
		
		$searchparams = base64_encode($searchparams);
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/newsleter_subscription_management/index/'.$searchparams.'/';
  		$config['per_page'] = $GLOBALS['limit'];
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
	
		// load view
		$data['rows'] = $parents;
		$this->load->view('newsleter_subscription_management/index',$data);
		
	}function addnewsleter_subscription_management()
	{
		$this->load->view('newsleter_subscription_management/addnewsleter_subscription_management');
	}
	function generate_csv()
	{
                $output_file="export.csv";
		$query = "SELECT * FROM newsleter_subscription";

		$select_data=mysql_query($query);
		
 		
		        $output = '';
			//$output .= 'Name,';
			$output .= 'Email,';

			$output .="\n";
			
		while($row=mysql_fetch_array($select_data))
		{
			//$row = & $rows[$i];
			//if($row['name'] != '')
			//{
			//	$name = $row['name'];
			//}
			//else
			//{
			//	$name = 'N/A';
			//}

			if( $row['email'] != '' )
			{
				$eml = $row['email'];
			}
			{
				$eml = 'N/A';
			}
			
			//$output .= ''.$name.',';
			$output .= ''.$row['email'].',';
			
			$output .="\n";
		}
		// Open a new output file
		$file = fopen ($output_file,'w');
		// Put contents of $output into the $file
		fputs($file, $output);
		fclose($file);
		// This line will stream the file to the user rather than spray it across the screen
		header("Content-type: application/octet-stream");
		// Internet Explorer support
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-disposition:  attachment; filename=NewsletterSubsList_" .
		date("ymd").".csv");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $output;
		exit();
		//redirect('newsleter_subscription_management');
		//echo "CSV";die();
		
		
	}
	
	function insert_newsleter_subscription_management()
	{
		//echo "hello";die;
		$insertd = $this->modelnewsletr_subscription_management->create_newsleter_subscription_management();
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Newsleter added successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Duplicate Entry. Please try again</strong></div>');
		
		
		
		 redirect('newsleter_subscription_management/index');
	}
        
        public function editnewsleter_subscription_management()
	{
		//echo 'hello';die;
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
			$this->load->view('newsleter_subscription_management/editnewsleter_subscription_management',$data);
	}
        
        
        public function update_newsleter_subscription_management()
        {
            $data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
			$data=$this->modelnewsletr_subscription_management->update_newsleter_subscription_management();
			if($data)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Newsleter updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update Newsleter. Please try again</strong></div>');
                       
                          redirect('newsleter_subscription_management/index');
                        
        }
	public function delete_newsleter_subscription_management()
	{
		
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$insertd = $this->modelnewsletr_subscription_management->delete_newsleter_subscription_management();
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Newsleter deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to deleted News Channel. Please try again</strong></div>');
                redirect('newsleter_subscription_management/index');
		
            
	}
	
	public function multiple_option_newsleter_subscription_management()
	{
		//echo 'hello';die;
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
		if($this->input->post('select_my_option')==1)
		{
			$insertd = $this->modelnewsletr_subscription_management->multiple_delete();
			
			$msg="Data(s) Deleted Successfully!";
		}
		else if($this->input->post('select_my_option')==2)
		{
			$insertd = $this->modelnewsletr_subscription_management->multiple_active_inactive(1);
			
			$msg="Data(s) activated Successfully!";
		}
		else if($this->input->post('select_my_option')==3)
		{
			$insertd = $this->modelnewsletr_subscription_management->multiple_active_inactive(0);
			
			$msg="Data(s) deactivated Successfully!";
		}
		redirect('newsleter_subscription_management/index');
		
	}
}