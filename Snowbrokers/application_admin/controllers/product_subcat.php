<?php

class product_subcat extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modeladmin');
		$this->load->model('model_productsubcat');
		
		if(!$this->model_productsubcat->isLoggedIn()){
			redirect("login/index");
		}
		 $this->limit = $this->model_productsubcat->setting_pagination();
		
	}
	
	function index()
	{
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
				delete_cookie('s_cat_type');
				delete_cookie('s_cat_field');
				$cookie = array(
				'name'   => 's_cat_type',
				'value'  => $sort_type,
				'expire' => time()+24*60*60*365*100
				);
				set_cookie($cookie);
				
				$cookie2 = array(
				'name'   => 's_cat_field',
				'value'  => $sort_field,
				'expire' => time()+24*60*60*365*100
				);
				set_cookie($cookie2);
				
			}
			if($this->input->post('get_search')!='')
			{
				//$searchoption = $this->input->post('search_option');
				$searchtext = 'title='.urlencode($this->input->post('get_search'));
				$searchparams .= $searchtext."&";
				
				$data['get_search'] = $this->input->post('get_search');
				//$data['search_option'] = $searchoption;
			}
			
			if($this->input->post('cat_type')!='')
			{
				$cat_type = 'cat_type='.urlencode($this->input->post('cat_type'));
				$searchparams .= $cat_type."&";
				
				$data['cat_type'] = $this->input->post('cat_type');
			}
			$searchtext = '/q=/';
			$searchparam = preg_replace($searchtext,'',$searchparams,1);
			$searchparam = substr($searchparam,0,-1);
			
			$config['total_rows'] = $this->model_productsubcat->count_all_cat($searchparam);
			
			$offset = 0;
			$uri_segment = $offset;
			$parents = $this->model_productsubcat->get_paged_list_cat($this->limit,$offset,$searchparam);
			
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
			$config['total_rows'] = $this->model_productsubcat->count_all_cat($searchparam);
			$parents = $this->model_productsubcat->get_paged_list_cat($this->limit,$offset,$searchparam);
			
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
			if(isset($searchitems['cat_type']))
			{
				$data['search_text'] = $searchitems['cat_type'];
				//$data['search_option'] = 'cat_type';
			}
			/*if(isset($searchitems['search_option']))
			{
				$data['search_text'] = $searchitems['search_option'];
				$data['search_option'] = 'search_option';
			}*/
			
			$sort_type = get_cookie('s_cat_type');
			$sort_field = get_cookie('s_cat_field');
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
				
				$config['total_rows'] = $this->model_productsubcat->count_all_cat($searchparam);
				$parents = $this->model_productsubcat->get_paged_list_cat($this->limit,$offset,$searchparam);
				
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
				if(isset($searchitems['cat_type']))
				{
					$data['search_text'] = $searchitems['cat_type'];
					//$data['search_option'] = 'cat_type';
				}
				/*if(isset($searchitems['search_option']))
				{
					$data['search_text'] = $searchitems['search_option'];
					$data['search_option'] = 'search_option';
				}*/
				
				
				$sort_type = get_cookie('s_cat_type');
				$sort_field = get_cookie('s_cat_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			else
			{
				
				$sort_type = get_cookie('s_cat_type');
				$sort_field = get_cookie('s_cat_field');
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
				if(isset($searchitems['cat_type']))
				{
					$data['search_text'] = $searchitems['cat_type'];
					//$data['search_option'] = 'cat_type';
				}
				/*if(isset($searchitems['search_option']))
				{
					$data['search_text'] = $searchitems['search_option'];
					$data['search_option'] = 'search_option';
				}*/
				
				
				$config['total_rows'] = $this->model_productsubcat->count_all_cat($searchparam);
				$parents = $this->model_productsubcat->get_paged_list_cat($this->limit,$offset,$searchparam);
				$sort_type = get_cookie('s_cat_type');
				$sort_field = get_cookie('s_cat_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			
		}
		
		$searchparams = base64_encode($searchparams);
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/product_subcat/index/'.$searchparams.'/';
  		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
		$data['rows'] = $parents;
		$this->load->view('product_subcat/index',$data);
		
	}
	
	function addproductsubcat()
	{
		$this->load->view('product_subcat/addsubcat');
	}
	function editsubcat()
	{
		if($this->input->post('ListingUserid')!=0)
			$this->load->view('product_subcat/editsubcat');
		else
			redirect('product_subcat/index');
	}
	
	public function edit_subcat()
	{

		$insertd = $this->model_productsubcat->edit_subcat();
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product subcat Updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to Updated Product subcat. Please try again</strong></div>');
		
		redirect('product_subcat/index');
	}
	
	function insert_subcat()
	{
		
		
		$insertd = $this->model_productsubcat->insert_subcat();
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product subcat added successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to added Product subcat. Please try again</strong></div>');
		
		redirect('product_subcat/index');
	}
	public function delete_subcat()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$insertd = $this->model_productsubcat->delete_subcat();
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product subcat deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to deleted Product subcat. Please try again</strong></div>');
		
		
		$this->load->view('product_subcat/index',$data);
		redirect('product_subcat/index');
	}
	
	function get_All_subcat() {
		$data['rows'] = $this->model_productsubcat->getAllArticles();
	}
	public function multiple_option_subcat()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
		
		if($this->input->post('select_my_option')==1)
		{
			$insertd = $this->model_productsubcat->multiple_subcat_delete();
		}
		else if($this->input->post('select_my_option')==2)
		{
			$insertd = $this->model_productsubcat->multiple_subcat_active_inactive(1);
		}
		else if($this->input->post('select_my_option')==3)
		{
			$insertd = $this->model_productsubcat->multiple_subcat_active_inactive(0);
		}
		
		
		
		redirect('product_subcat/index');
		
	}
}