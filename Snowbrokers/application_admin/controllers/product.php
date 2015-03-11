<?php

class product extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('encrypt');
		
		$this->load->model('modeladmin');
		$this->load->model('model_product');
		
		if(!$this->model_product->isLoggedIn()){
			redirect("login/index");
		}
		 $this->limit = $this->model_product->setting_pagination();
		
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
				delete_cookie('snowbrokers_product_type');
				delete_cookie('snowbrokers_product_field');
				$cookie = array(
				'name'   => 'snowbrokers_product_type',
				'value'  => $sort_type,
				'expire' => time()+24*60*60*365*100
				);
				set_cookie($cookie);
				
				$cookie2 = array(
				'name'   => 'snowbrokers_product_field',
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
				//echo $this->input->post('btnVal');
				
				$data['get_search'] = $this->input->post('get_search');
				$data['search_option'] = $searchoption;
				
			}
			
			//if($this->input->post('cat_type')!='')
			//{
			//	$cat_type = 'cat_type='.urlencode($this->input->post('cat_type'));
			//	$searchparams .= $cat_type."&";
			//	
			//	$data['cat_type'] = $this->input->post('cat_type');
			//}
			$searchtext = '/q=/';
			$searchparam = preg_replace($searchtext,'',$searchparams,1);
			$searchparam = substr($searchparam,0,-1);
			
			$config['total_rows'] = $this->model_product->count_all_cat($searchparam);
			 
			$offset = 0;
			$uri_segment = $offset;
			$parents = $this->model_product->get_paged_list_cat($this->limit,$offset,$searchparam);
			
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
			$config['total_rows'] = $this->model_product->count_all_cat($searchparam);
			$parents = $this->model_product->get_paged_list_cat($this->limit,$offset,$searchparam);
			
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
			if(isset($searchitems['title']))
			{
				$data['get_search'] = $searchitems['title'];
				$data['search_option'] = 'title';
			}
			if(isset($searchitems['customer_type']))
			{
				$data['get_search'] = $searchitems['customer_type'];
				$data['search_option'] = 'customer_type';
			}
			if(isset($searchitems['product_type_id']))
			{
				$data['get_search'] = $searchitems['product_type_id'];
				$data['search_option'] = 'product_type_id';
			}
			/*if(isset($searchitems['search_option']))
			{
				$data['search_text'] = $searchitems['search_option'];
				$data['search_option'] = 'search_option';
			}*/
			
			$sort_type = get_cookie('snowbrokers_product_type');
			$sort_field = get_cookie('snowbrokers_product_field');
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
				
				$config['total_rows'] = $this->model_product->count_all_cat($searchparam);
				$parents = $this->model_product->get_paged_list_cat($this->limit,$offset,$searchparam);
				
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
				
				
				$sort_type = get_cookie('snowbrokers_product_type');
				$sort_field = get_cookie('snowbrokers_product_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			else
			{
				
				$sort_type = get_cookie('snowbrokers_product_type');
				$sort_field = get_cookie('snowbrokers_product_field');
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
				
				
				$config['total_rows'] = $this->model_product->count_all_cat($searchparam);
				$parents = $this->model_product->get_paged_list_cat($this->limit,$offset,$searchparam);
				$sort_type = get_cookie('snowbrokers_product_type');
				$sort_field = get_cookie('snowbrokers_product_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			
		}
		
		$searchparams = base64_encode($searchparams);
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/product/index/'.$searchparams.'/';
  		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
		$data['rows'] = $parents;
		$this->load->view('product/index',$data);
		
	}
	
	function addproduct()
	{
               $data['customer_type']=$this->model_product->customer_type();
                $data['currency']=$this->model_product->currency_type();
                $data['product_type']=$this->model_product->product_type();
		$this->load->view('product/product_add',$data);
	}
        function advance_product_add()
	{
               
		$this->load->view('product/advance_product_add');
	}
	 function product_image_add()
	{
               $this->load->view('product/product_image_add');
		
	}

	function image_big_show()
	{
		$data['img']=$this->uri->segment(3);
		$data['prod_id']=$this->uri->segment(4);
               $this->load->view('product/image_big_show',$data);	
	}
         function product_color_add()
	{
		if($this->input->post('color_ids')>0)
		{
			$data['product_id']= $this->uri->segment(3);
			$data['color_id'] = $this->input->post('color_ids');
			//if($data['color_id']=="")
			//{
			//	$this->load->view('product/product_image_add');
			//}
			//$product_id= $data['product_id'];
			//$color_id=$data['color_id'];
			//$insert_img = $this->model_product->insert_color_id($product_id,$color_id);
			$this->load->view('product/product_color_add',$data);
		}
		else
		{
			$this->load->view('product/product_image_add');
		}
		
	}
        function choose_category(){
		
		$product_type = $this->input->post('ptype');
		$data['product_type']=$this->model_product->choose_category($product_type);
		$this->load->view('product/category_ajax',$data);
	}
	
	function add_dropzone_pic()
	{
		$color_id=$this->uri->segment(3);
		$product_id=$this->uri->segment(4);
	
	$insert_img = $this->model_product->insert_img($product_id,$color_id);
	echo $insert_img;
	//if($insert_img)
	//{
	//	//echo $insert_img;
	//}
	}
	
	function delete_image()
	{
		$id=$this->uri->segment(3);
		$pid=$this->uri->segment(4);
		$delete_img = $this->model_product->delete_img($id);
		//$this->load->view('product/product_image_add');
		redirect('product/product_image_add/'.$pid);
	}
	function delete_dropzone_pic()
	{
	$delete_dropzone_img = $this->model_product->delete_dropzone_img();
			
	}
		function editproduct()
		{
			    $data['currency']=$this->model_product->currency_type();
			if($this->input->post('ListingUserid')!=0)
				$this->load->view('product/edit_product',$data);
			else
				redirect('product/index');
		}
		
		public function edit_product()
		{
			$pro_typ = $this->uri->segment(3);
			$pro_cat = $this->uri->segment(4);
			$p_id= $this->uri->segment(5);
		
			$insertd = $this->model_product->edit_product();
			if($insertd)
				$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product Updated successfully</strong></div>');
			else
				$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to Updated Product. Please try again</strong></div>');
			
			redirect('product/advance_product_edit/'.$pro_typ.'/'.$pro_cat.'/'.$p_id);
		}
		 function advance_product_edit()
		{
			$data['pro_typ'] = $this->uri->segment(3);
			$data['pro_cat'] = $this->uri->segment(4);
			$data['p_id']= $this->uri->segment(5);
		  
			$this->load->view('product/advance_product_edit',$data);
		}
			
	function insert_product()
	{
            $pro_typ =  $this->input->post('product_type');
            $pro_cat =  $this->input->post('product_category');
           
		$insertd = $this->model_product->insert_product();
		
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product Is Not Showing in the site ..Please add all the Field</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to added Product . Please try again</strong></div>');
		
		redirect('product/advance_product_add/'.$pro_typ.'/'.$pro_cat.'/'.$insertd);
	}
	function advanceproductedit()
	{
		 $product_id= $this->uri->segment(3);
	 
		$insertd = $this->model_product->edit_product_size($product_id);
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product Updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to Updated Product. Please try again</strong></div>');
		redirect('product/product_image_add/'.$product_id);
	}
	function advanceproductadd()
	{
		//echo "<pre>";
		//print_r($this->input->post());
		//echo "</pre>";
		//die();
		if($this->uri->segment(3)!='')
		{
		$product_id= $this->uri->segment(3);
		//echo $product_id; die;
//        $size_arr=  $this->input->post('size_opt');
//	$size = implode(',',$size_arr);
//	
//          $color_arr =  $this->input->post('color_opt');
//	  $color = implode(',',$color_arr);
//	 
//	    $quantity_arr =  $this->input->post('qnty');
//	    $qnty = implode(',',$quantity_arr);
	
	
           
		$insert_size = $this->model_product->insert_advance_product_size($product_id);
		if($insert_size)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product Is Not Showing in the site ..Please add all the Field</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to added Product . Please try again</strong></div>');
		
		redirect('product/product_image_add/'.$product_id);
	}
	else
	{
		redirect('product/product_image_add');
	}
	}
	
	//function advanceproduct_imageadd()
	//{
	//	echo "success";die;
	//}
	public function delete_img()
	{
		$img = $_REQUEST['img_id'];
		$delete_img = $this->model_product->delete_img($img);
		echo $delete_img;
		
	}
	public function delete_product()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$insertd = $this->model_product->delete_product();
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to deleted Product. Please try again</strong></div>');
		
		
		$this->load->view('product/index',$data);
		redirect('product/index');
	}
	public function status_change()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		$statuss = $this->uri->segment(3);
		$insertd = $this->model_product->status_change($statuss);
		if($insertd)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to deleted Product. Please try again</strong></div>');
		
		
		$this->load->view('product/index',$data);
		redirect('product/index');
	}
	//
	//function get_All_category() {
	//	$data['rows'] = $this->model_productcategory->getAllArticles();
	//}
	public function multiple_option_product()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
		
		if($this->input->post('select_my_option')==1)
		{
			$insertd = $this->model_product->multiple_category_delete();
		}
		else if($this->input->post('select_my_option')==2)
		{
			$insertd = $this->model_product->multiple_category_active_inactive(1);
		}
		else if($this->input->post('select_my_option')==3)
		{
			$insertd = $this->model_product->multiple_category_active_inactive(0);
		}
		
		
		
		redirect('product/index');
		
	}
}