<?php
class Country extends CI_Controller {
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
		
		$this->load->model('modelsubcategory');
		$this->load->model('modeladmin');
		$this->load->model('modelcountry');
		$this->load->model('site_settingsmodel');
		if(!$this->modelsubcategory->isLoggedIn()){
			redirect("login/index");
		}
		$this->limit = $this->site_settingsmodel->per_page();
	}
	
	function index()
	{
		$parents = $this->modeladmin->access_avalible(7);

			if($parents==0)
			{
			redirect('dashboard/index');
			}
		else{
		
		$data['success_msg'] = $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
		$usertype = '';
		$status = '';
		$searchtext = '';
		$searchparams = '';
		$sort_field = '';
		$sort_type = '';
		$searchparam = '';
		// get total segment number in url to create $config['uri_segment'] for pagination 
		$last = $this->uri->total_segments();
		
		// set offset from last segment
		$offset = $this->uri->segment($last);
		
		// set total segment number
		$uri_segment = $last;
		
		//if search mode set then goes here
		
		if($this->input->post('search_mode')==='search')
		{
			
			
			//echo "hi";exit;
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
				delete_cookie('classified_country_field');
				delete_cookie('classified_country_type');
				$cookie = array(
				'name'   => 'classified_country_type',
				'value'  => $sort_type,
				'expire' => time()+24*60*60*365*100
				);
				set_cookie($cookie);
				
				$cookie2 = array(
				'name'   => 'classified_country_field',
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
				
				$data['get_search'] = $this->input->post('get_search');
				$data['search_option'] = $searchoption;
			}
			
			$searchtext = '/q=/';
			$searchparam = preg_replace($searchtext,'',$searchparams,1);
			$searchparam = substr($searchparam,0,-1);
			
			$config['total_rows'] = $this->modelcountry->count_all_country($searchparam);
			
			$offset = 0;
			$uri_segment = $offset;
			$parents = $this->modelcountry->get_paged_list_country($this->limit,$offset,$searchparam);
			
			$data['sort_type'] = $sort_type;
			$data['sort_field'] = $sort_field;
			
		}
		//after search mode set and url segment greater than 3(i.e.-4)
		else if($last>3)
		{
			
			//echo $searchparams;exit;
			$searchparams = base64_decode($this->uri->segment(3));
			
			
			if($this->input->post('sort_field')!='')
			{
				$sort_field = $this->input->post('sort_field');
				$sort_type = $this->input->post('sort_type');
				$searchparams .= "sfield=".$sort_field."&stype=".$sort_type."&";
				
				
				
			}
			/*if($this->input->post('get_search')!='')
			{
				echo "///////////";
				echo '==='.$searchoption = $this->input->post('search_option');
				$searchtext = $searchoption."=".urlencode($this->input->post('get_search'));
				$searchparams .= $searchtext."&";
				
				echo '+++'.$data['get_search'] = $this->input->post('get_search');
				echo ']]]]]]'.$data['search_option'] = $searchoption;
			}*/
			
			$searchtext = '/q=/';
			$searchparam = preg_replace($searchtext,'',$searchparams,1);
			$searchparam = substr($searchparam,0,-1);
			$config['total_rows'] = $this->modelcountry->count_all_country($searchparam);
			$parents = $this->modelcountry->get_paged_list_country($this->limit,$offset,$searchparam);
			
			$search = explode("&",$searchparam);
			
			foreach($search as $searchitem)
			{
				list($key,$value) = explode('=',$searchitem);
				$searchitems[$key] = urldecode($value);
			}
			if(isset($searchitems['status']))
			{
				$data['btnval'] = $searchitems['status'];
			}
			if(isset($searchitems['country_name']))
			{
				$data['get_search'] = $searchitems['country_name'];
			}
			
			
			$sort_type = get_cookie('classified_country_type');
			$sort_field = get_cookie('classified_country_field');
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
				
				$search = explode("&",$searchparam);
				foreach($search as $searchitem)
				{
					list($key,$value) = explode('=',$searchitem);
					$searchitems[$key] = urldecode($value);
				}
				if(isset($searchitems['status']))
				{
					$data['btnval'] = $searchitems['status'];
				}
				
				
				$config['total_rows'] = $this->modelcountry->count_all_country($searchparam);
				$parents = $this->modelcountry->get_paged_list_country($this->limit,$offset,$searchparam);
				
				$sort_type = get_cookie('classified_country_type');
				$sort_field = get_cookie('classified_country_field');
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			else
			{
				
				$sort_type = get_cookie('classified_country_type');
				$sort_field = get_cookie('classified_country_field');
				$searchparams = "q=sfield=".$sort_field."&stype=".$sort_type."&";
				$searchtext = '/q=/';
				$searchparam = preg_replace($searchtext,'',$searchparams,1);
				$searchparam = substr($searchparam,0,-1);
				
				$search = explode("&",$searchparam);
				foreach($search as $searchitem)
				{
					list($key,$value) = explode('=',$searchitem);
					$searchitems[$key] = urldecode($value);
				}
				if(isset($searchitems['status']))
				{
					$data['btnval'] = $searchitems['status'];
				}
				
				
				$config['total_rows'] = $this->modelcountry->count_all_country($searchparam);
				$parents = $this->modelcountry->get_paged_list_country($this->limit,$offset,$searchparam);
				
				$data['sort_type'] = $sort_type;
				$data['sort_field'] = $sort_field;
			}
			
		}
		
		$searchparams = base64_encode($searchparams);
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/country/index/'.$searchparams.'/';
  		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
	
 
		// load view
		$data['category_list'] = $parents;
		
                $this->load->view('country/index',$data);
		
	}
	}
        function addcountry()
	{
		$this->load->view('country/addcountry');
	}
	
	function editcountry()
	{
		if($this->input->post('ListingUserid')!=0)
			$this->load->view('country/editcountry');
		else
			redirect('country/index');
	}
	 function Check_CityName_pa() {
		$DateRetuns  = $this->modelcountry->Check_CityName_pa($_REQUEST['CityName']);
		echo "||".$DateRetuns."||";
	}
	function Check_CityName_Edit_pa() {
		$DateRetuns  = $this->modelcountry->Check_CityName_Edit_pa($_REQUEST['CityName'],$_REQUEST['city_ID']);
		echo "||".$DateRetuns."||";
	}
	function Check_CityName_pe() {
		$DateRetuns  = $this->modelcountry->Check_CityName_pe($_REQUEST['CityName']);
		echo "||".$DateRetuns."||";
	}
	function Check_CityName_Edit_pe() {
		$DateRetuns  = $this->modelcountry->Check_CityName_Edit_pe($_REQUEST['CityName'],$_REQUEST['city_ID']);
		echo "||".$DateRetuns."||";
	}
	function Check_CityName() {
		$DateRetuns  = $this->modelcountry->Check_CityName($_REQUEST['CityName']);
		echo "||".$DateRetuns."||";
	}
	function Check_CityName_Edit() {
		$DateRetuns  = $this->modelcountry->Check_CityName_Edit($_REQUEST['CityName'],$_REQUEST['city_ID']);
		echo "||".$DateRetuns."||";
	}
	public function edit_country()
	{
		//echo "Edit";

		$insertd = $this->modelcountry->edit_country();
		
		//if(isset($_REQUEST['search_option']) && ($_REQUEST['search_option']!=""))
		//{
		//	$search_option=$_REQUEST['search_option'];
		//	$get_search=$_REQUEST['get_search'];
		//}
		//else
		//{
		//	$search_option="";
		//	$get_search="";
		//}
		//
		//$allcategorys = $this->modelcategorytype->getAllCategory($search_option,$get_search);
		//
		//$data['search_option'] 	= $search_option;
		//$data['get_search'] 	= $get_search;
		//
		//######### Pagination ###########
		//$this->load->library('pagination');
		//$config['base_url'] = base_url().'index.php/category/index';
		//$config['total_rows'] = count($allcategorys);
		//$config['per_page'] = $this->modelcategorytype->setting_pagination();
		//
		//$this->pagination->initialize($config);
		//
		//$currentPage = $this->uri->segment(3);
		//$data['category_list'] = $this->modelcategorytype->getCategory($search_option,$get_search,$currentPage,$config['per_page']);
		//
		//$data['pagination'] = $this->pagination->create_links();
		
		//$this->load->view('category/index',$data);
		redirect('country/index');
	}
	
	public function delete_country()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		$insertd = $this->modelcountry->delete_country();
		
		redirect('country/index');
		//if(isset($_REQUEST['search_option']) && ($_REQUEST['search_option']!=""))
		//{
		//	$search_option=$_REQUEST['search_option'];
		//	$get_search=$_REQUEST['get_search'];
		//}
		//else
		//{
		//	$search_option="";
		//	$get_search="";
		//}
		//
		//$allcategorys = $this->modelcategorytype->getAllCategory($search_option,$get_search);
		//
		//$data['search_option'] 	= $search_option;
		//$data['get_search'] 	= $get_search;
		//
		//######### Pagination ###########
		//$this->load->library('pagination');
		//$config['base_url'] = base_url().'index.php/category/index';
		//$config['total_rows'] = count($allcategorys);
		//$config['per_page'] = $this->modelcategorytype->setting_pagination();
		//
		//$this->pagination->initialize($config);
		//
		//$currentPage = $this->uri->segment(3);
		//$data['category_list'] = $this->modelcategorytype->getCategory($search_option,$get_search,$currentPage,$config['per_page']);
		//
		//$data['pagination'] = $this->pagination->create_links();
		//
		//$this->load->view('categorytype/index',$data);
	}
	
	function insert_country()
	{
		
		$insertd = $this->modelcountry->insert_country();
		
		redirect('country/index');
	}
	
	public function multiple_option_country()
	{
		$data['success_msg'] 	= $this->session->userdata('success_msg');
		$data['error_msg'] 	= $this->session->userdata('error_msg');
		
		
		
		if($this->input->post('select_my_option')==1)
		{
			$insertd = $this->modelcountry->multiple_country_delete();
		}
		else if($this->input->post('select_my_option')==2)
		{
			$insertd = $this->modelcountry->multiple_country_active_inactive(1);
		}
		else if($this->input->post('select_my_option')==3)
		{
			$insertd = $this->modelcountry->multiple_country_active_inactive(0);
		}
		
		
		//echo $search_option." ".$get_search;die;
		if(isset($_REQUEST['search_option']) && ($_REQUEST['search_option']!=""))
		{
			$search_option=$_REQUEST['search_option'];
			$get_search=$_REQUEST['get_search'];
		}
		else
		{
			$search_option="";
			$get_search="";
		}
		
		$allcategorys = $this->modelcountry->getAllcountry($search_option,$get_search);
		
		$data['search_option'] 	= $search_option;
		$data['get_search'] 	= $get_search;
		
		######### Pagination ###########
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/country/index';
		$config['total_rows'] = count($allcategorys);
		$config['per_page'] = $this->modelcountry->setting_pagination();
		
		$this->pagination->initialize($config);
		
		$currentPage = $this->uri->segment(3);
		$data['category_list'] = $this->modelcountry->getcountry($search_option,$get_search,$currentPage,$config['per_page']);
		
		$data['pagination'] = $this->pagination->create_links();
		
		redirect('country/index');
		
	}
	
	
}
        
?>