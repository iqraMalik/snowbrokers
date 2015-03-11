<?php

class order extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modeladmin');
		$this->load->model('model_order');
		
		if(!$this->model_order->isLoggedIn()){
			redirect("login/index");
		}
		 $this->limit = $this->model_order->setting_pagination();
		
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
				delete_cookie('snowbrokers_order_type');
				delete_cookie('snowbrokers_order_field');
				$cookie = array(
				'name'   => 'snowbrokers_order_type',
				'value'  => $sort_type,
				'expire' => time()+24*60*60*365*100
				);
				set_cookie($cookie);
				
				$cookie2 = array(
				'name'   => 'snowbrokers_order_field',
				'value'  => $sort_field,
				'expire' => time()+24*60*60*365*100
				);
				set_cookie($cookie2);
				
			}
			//if($this->input->post('get_search')!='')
			//{
			//	//$searchoption = $this->input->post('search_option');
			//	$searchtext = 'title='.urlencode($this->input->post('get_search'));
			//	$searchparams .= $searchtext."&";
			//	//echo $this->input->post('btnVal');
			//	
			//	$data['get_search'] = $this->input->post('get_search');
			//	//$data['search_option'] = $searchoption;
			//}
			//
			if(($this->input->post('search_option')!=''))
                        {
                          
                                $search_option = 'search_option='.urlencode($this->input->post('search_option'));
                                $searchparams .= $search_option."&";
                                
                                $data['search_option'] = $this->input->post('search_option');
                        
                        }
                        if($this->input->post('get_search')!='')
				{
					$search_text = 'search_text='.urlencode($this->input->post('get_search'));
					$searchparams .= $search_text."&";
					
					$data['search_text'] = $this->input->post('get_search');
				}
			$searchtext = '/q=/';
			$searchparam = preg_replace($searchtext,'',$searchparams,1);
			$searchparam = substr($searchparam,0,-1);
			
			$config['total_rows'] = $this->model_order->count_all_cat($searchparam);
			 
			$offset = 0;
			$uri_segment = $offset;
			$parents = $this->model_order->get_paged_list_cat($this->limit,$offset,$searchparam);
			
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
			$config['total_rows'] = $this->model_order->count_all_cat($searchparam);
			$parents = $this->model_order->get_paged_list_cat($this->limit,$offset,$searchparam);
			
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
			
			$sort_type = get_cookie('snowbrokers_order_type');
			$sort_field = get_cookie('snowbrokers_order_field');
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
				
				$config['total_rows'] = $this->model_order->count_all_cat($searchparam);
				$parents = $this->model_order->get_paged_list_cat($this->limit,$offset,$searchparam);
				
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
				
				
				$sort_type = get_cookie('snowbrokers_order_type');
				$sort_field = get_cookie('snowbrokers_order_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			else
			{
				
				$sort_type = get_cookie('snowbrokers_order_type');
				$sort_field = get_cookie('snowbrokers_order_field');
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
				
				
				$config['total_rows'] = $this->model_order->count_all_cat($searchparam);
				$parents = $this->model_order->get_paged_list_cat($this->limit,$offset,$searchparam);
				$sort_type = get_cookie('snowbrokers_order_type');
				$sort_field = get_cookie('snowbrokers_order_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			
		}
		
		$searchparams = base64_encode($searchparams);
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/order/index/'.$searchparams.'/';
  		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
		$data['rows'] = $parents;
		$this->load->view('order/index',$data);
		
	}
        
        function vieworder()
        {
            $this->load->view('order/order_details_view');
        }
       
        public function multiple_option_order()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
		
		if($this->input->post('select_my_option')==1)
		{
			$insertd = $this->model_order->multiple_category_delete();
		}
		else if($this->input->post('select_my_option')==2)
		{
			$insertd = $this->model_order->multiple_category_active_inactive(1);
		}
		else if($this->input->post('select_my_option')==3)
		{
			$insertd = $this->model_order->multiple_category_active_inactive(0);
		}
		
		
		
		redirect('order/index');
		
	}
        public function delete_order()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$insertd = $this->model_order->delete_order();
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Order deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to deleted Product. Please try again</strong></div>');
		
		
		$this->load->view('order/index',$data);
		redirect('order/index');
	}
}