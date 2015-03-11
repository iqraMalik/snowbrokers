<?php

class middle_banner extends CI_Controller {

 
	var $terms     = array();
    
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('modeladmin');
                $this->load->model('model_middle_banner');
		
		if(!$this->model_middle_banner->isLoggedIn()){
			redirect("login/index");
		}
		$GLOBALS['limit'] = $this->modeladmin->setting_pagination();
	}
	
	function index()
	{
           //echo 'hello'; die;
		$data['success_msg']	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
		$status = '';
		$searchtext = '';
		$searchparams = '';
		$sort_field = '';
		$sort_type = '';
		$key='';
		
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
				delete_cookie('snowbrokers_bottom_home_footer_type');
				delete_cookie('snowbrokers_bottom_home_footer_field');
				$cookie = array(
				'name'   => 'snowbrokers_bottom_home_footer_type',
				'value'  => $sort_type,
				'expire' => time()+24*60*60*365*100
				);
				set_cookie($cookie);
				
				$cookie2 = array(
				'name'   => 'snowbrokers_bottom_home_footer_type',
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
			
			$config['total_rows'] = $this->model_middle_banner->count_all_slider($searchparam);
			
			$offset = 0;
			$uri_segment = $offset;
			$parents = $this->model_middle_banner->get_paged_list_slider($GLOBALS['limit'],$offset,$searchparam);
			
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
			$config['total_rows'] = $this->model_middle_banner->count_all_slider($searchparam);
			$parents = $this->model_middle_banner->get_paged_list_slider($GLOBALS['limit'],$offset,$searchparam);
			
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
			if(isset($searchitems['heading']))
			{
				$data['search_text'] = $searchitems['heading'];
				$data['search_option'] = 'heading';
			}

			$sort_type = get_cookie('snowbrokers_bottom_home_footer_type');
			$sort_field = get_cookie('snowbrokers_bottom_home_footer_field');
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
				
				$config['total_rows'] = $this->model_middle_banner->count_all_slider($searchparam);
				$parents = $this->model_middle_banner->get_paged_list_slider($GLOBALS['limit'],$offset,$searchparam);
				
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
				if(isset($searchitems['heading']))
				{
					$data['search_text'] = $searchitems['heading'];
					$data['search_option'] = 'heading';
				}

				
				$sort_type = get_cookie('snowbrokers_bottom_home_footer_type');
				$sort_field = get_cookie('snowbrokers_bottom_home_footer_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			else
			{
				$sort_type = get_cookie('snowbrokers_bottom_home_footer_type');
				$sort_field = get_cookie('snowbrokers_bottom_home_footer_field');
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
				if(isset($searchitems['heading']))
				{
					$data['search_text'] = $searchitems['heading'];
					$data['search_option'] = 'heading';
				}
				
				
				$config['total_rows'] = $this->model_middle_banner->count_all_slider($searchparam);
				$parents = $this->model_middle_banner->get_paged_list_slider($GLOBALS['limit'],$offset,$searchparam);
				$sort_type = get_cookie('snowbrokers_bottom_home_footer_type');
				$sort_field = get_cookie('snowbrokers_bottom_home_footer_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			
		}
		
		$searchparams = base64_encode($searchparams);
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/middle_banner/index/'.$searchparams.'/';
  		$config['per_page'] = $GLOBALS['limit'];
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
	
		// load view
		$data['rows'] = $parents;
		$this->load->view('middle_banner/index',$data);
		
	}
	
	//function addbanner_home_footer()
	//{
	//	//echo 'hello';die;
	//	$this->load->view('banner_home_footer/addbanner_home_footer');
	//}
	
//	function insert_banner_home_footer()
//	{
//		echo "hello";die;
//		$insertd = $this->modelbanner_home_footer->create_banner_home_footer();
//		if($insertd>0)
//			{
//			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong> added successfully</strong></div>');
//		}
//                else
//		{
//			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add. Please try again</strong></div>');
//		}
//		redirect('banner_home_footer/index');
//	}
	
	 public function editbanner_home_footer()
	{
		//echo hello ;die;
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		//die("hello");
			$this->load->view('middle_banner/edit_middle_banner',$data);
	}
        
        public function update_banner_home_footer()
        {
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
			$data=$this->model_middle_banner->update_top_banner();
			//print_r($data);exit;
			if($data > 0)
				$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Middle Top banner updated successfully</strong></div>');
			else
				$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update middle banner. Please try again</strong></div>');
                       
                          redirect('middle_banner/index');
                        
        }
//	public function delete_banner_home_footer()
//	{
//		
//		$data['success_msg'] 	= $this->session->userdata('success_msg');
//		$data['error_msg'] 	= $this->session->userdata('error_msg');
//		
//		$insertd = $this->modelbanner_home_footer->delete_banner_home_footer();
//		if($insertd)
//			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>News section deleted successfully</strong></div>');
//		else
//			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to deleted news section. Please try again</strong></div>');
//                redirect('banner_home_footer/index');
//		
//            
//	}
	
	//public function multiple_option_banner_home_footer()
	//{
	//	$data['success_msg'] 	= $this->session->userdata('success_msg');
	//	$data['error_msg'] 	= $this->session->userdata('error_msg');
	//	
	//	
	//	if($this->input->post('select_my_option')==1)
	//	{
	//		$insertd = $this->modelbanner_home_footer->multiple_delete();
	//		
	//		$msg="Data(s) Deleted Successfully!";
	//	}
	//	else if($this->input->post('select_my_option')==2)
	//	{
	//		$insertd = $this->modelbanner_home_footer->multiple_active_inactive(1);
	//		
	//		$msg="Data(s) activated Successfully!";
	//	}
	//	else if($this->input->post('select_my_option')==3)
	//	{
	//		$insertd = $this->modelbanner_home_footer->multiple_active_inactive(0);
	//		
	//		$msg="Data(s) deactivated Successfully!";
	//	}
	//	redirect('banner_home_footer/index');
	//	
	//}
	//
	
	
}