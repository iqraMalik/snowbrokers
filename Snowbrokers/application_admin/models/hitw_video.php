<?php
class hitw_video extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('hitw_video_model');
                $this->load->model('sitesetting_model');
		$this->load->model('header_model');
		  $this->load->helper('form');
                 $this->load->helper('url');
		  $this->load->library('image_lib');
        if(!$this->session->userdata('is_logged_in'))
	{
            redirect('admin/login');
        }
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {
	//echo 'test';
	
	$search_string = $this->input->post('search_string');
        $admin_pagination = $this->sitesetting_model->get_admin_pagination();
	 //pagination settings
	$config['per_page'] = $admin_pagination;
       
	$config['base_url'] = base_url().'admin/hitw_video';
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] = 20;
	$config['full_tag_open'] = '<ul>';
	$config['full_tag_close'] = '</ul>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a>';
	$config['cur_tag_close'] = '</a></li>';
	$config['prev_link'] = '&lt;';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = '&gt;';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';  
	//limit end
	$page = $this->uri->segment(3);
	//math to get the initial record to be select in the database
	$limit_end = ($page * $config['per_page']) - $config['per_page'];
	if ($limit_end < 0)
	{
	    $limit_end = 0;
	}
	//fetch sql data into arrays
	
	if($search_string !== false || $this->uri->segment(3) == true)
	{
	    /*
	    The comments here are the same for line 79 until 99
       
	    if post is not null, we store it in session data array
	    if is null, we use the session data already stored
	    we save order into the the var to load the view with the param already selected       
	    */
	    
	    if($search_string)
	    {
		$filter_session_data['search_string_selected'] = $search_string;
	    }
	    else
	    {
		$search_string = $this->session->userdata('search_string_selected');
	    }
	    
	    $data['search_string_selected'] = $search_string;

	    //save session data into the session
	    
	    if(isset($filter_session_data))
	    {
	      $this->session->set_userdata($filter_session_data);    
	    }
	    if($search_string)
	    {
		//fetch sql data into arrays
		$data['issues'] = $this->hitw_video_model->show_issues( $search_string ,'', $config['per_page'],$limit_end);
	    }
	    else
	    {
		$data['issues'] = $this->hitw_video_model->show_issues( '' ,'', $config['per_page'],$limit_end);
	    }
	    
	    $sel['list']=$this->hitw_video_model->count_issues($search_string);
     
	    $config['total_rows'] = $sel['list'];
     
	    //fetch sql data into arrays
	}
	else
	{
	    //clean filter data inside section
      
	    $filter_session_data['search_string_selected'] = null;
	    // $filter_session_data['order_type'] = null;
	    
	    $this->session->set_userdata($filter_session_data);
    
	    //pre selected options
	    $data['search_string_selected'] = '';
	
     
	    //fetch sql data into arrays
	 
	    $data['issues'] = $this->hitw_video_model->show_issues( '' ,'', $config['per_page'],$limit_end);
	    $sel['list']=$this->hitw_video_model->count_issues('');
	    $config['total_rows'] = $sel['list'];
	}
	
	//!isset($search_string) && !isset($order)
			 
	$this->pagination->initialize($config);
	$data['r_list']=$sel['list'];
			
	//$data['category']=$this->user_model->show_user('','',$config['per_page'],$limit_end);
			
	//to hide management from sub admin
	//$store=$this->header_model->get_manage();	
	//$data['manage']=$store[0];
		       
	//checking for admin and subadmin status
	//$user_name=$this->session->userdata('user_name');
	//$data['stat']=$this->header_model->get_admin_type($user_name);
	
	
	$this->load->view('admin/includes/admin_header',$data);
	$this->load->view('admin/hitw_video/flag_issues_list',$data);
	$this->load->view('admin/includes/admin_footer');
    }
    
    public function delete_issues()
    {
	$id= $this->uri->segment(4);
	
	if($this->hitw_video_model->del_issue($id) == TRUE)
	{
            $this->session->set_flashdata('flash_message', 'deleted');
        }
	else
	{
            $this->session->set_flashdata('flash_message', 'not_deleted');
        } 
        redirect('admin/hitw_video');
    }
    
    public function edit_video()
    {
	$id= $this->uri->segment(4);
	$sel_cat['mem']=$this->hitw_video_model->edit_question($id);
	
	//to hide management from sub admin
	//$store=$this->header_model->get_manage();	
	//$data['manage']=$store[0];
	
	
	//checking for admin and subadmin status
	$user_name=$this->session->userdata('user_name');
	$data['stat']=$this->header_model->get_admin_type($user_name);
	
	$this->load->view('admin/includes/admin_header',$data);
	$this->load->view('admin/hitw_video/edit_issues',$sel_cat);
	$this->load->view('admin/includes/admin_footer');
    }
    
    public function updt_issues()
    {
	$id=$this->uri->segment(4);
        $updt['id']=$this->uri->segment(4);
	
	
	if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            
            $date = date("ymd");
           $config['upload_path'] =$_SERVER["DOCUMENT_ROOT"].'/lab4/filmcatapro/assets/uploads/video';
	    $config['max_size'] = '20000';
            $config['allowed_types'] = "ogv|mp4|avi|flv|wmv|3gp";
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $video_name = $date.$_FILES['video']['name'];
            $config['file_name'] = $video_name;
         $this->load->library('upload',$config);
	   if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
		$this->session->set_flashdata('flash_message', 'not_supported');
		redirect("admin/hitw_video/edit_video/$id");
            } else {
                $videoDetails = $this->upload->data();
                echo "Successfully Uploaded";
            }
	   
	    
	    $this->upload->initialize($config);
	     $updt['video']="assets/uploads/video/$video_name";
	     
	}
	
	 if(!empty($_FILES['image']['name']))
               {
		    $name=$_FILES['image']['name'];
		    $tmp=$_FILES['image']['tmp_name'];
		    $new1=time().$name;
		    $new="assets/uploads/img/".$new1;
		    
		    move_uploaded_file($tmp,$new); 
		
		list($width, $height, $type, $attr) = getimagesize($new);
		
		if($width >=1140 )
		{
		    $updt['img']="assets/uploads/img/$new1";
		
		}
		else{
		   $this->session->set_flashdata('flash_message', 'nots_supported');
		    redirect("admin/hitw_video/edit_video/$id");
		}
	       }
	
		
	if($this->hitw_video_model->updt_issues($updt) == TRUE)
	{
	    $this->session->set_flashdata('flash_message', 'added');
	}
	
	
	else
	{
	    $this->session->set_flashdata('flash_message', 'not_added');
	}
                
        
	       
        redirect('admin/hitw_video');	
    
	
    }
    function img($file)
    {
	unset($configVideo);
	
	
    }
    
    function add_video()
    {
	//to hide management from sub admin
	//$store=$this->header_model->get_manage();	
	//$data['manage']=$store[0];
	
	//checking for admin and subadmin status
	$user_name=$this->session->userdata('user_name');
	$data['stat']=$this->header_model->get_admin_type($user_name);
	
	$this->load->view('admin/includes/admin_header',$data);
	$this->load->view('admin/hitw_video/add_issues');
	$this->load->view('admin/includes/admin_footer');
    }
    

    public function search()
    {
	// getting search string, pagination and site pagiination
	
	$data = urldecode($this->uri->segment(4));
	$page = $this->uri->segment(5);
	
	$admin_pagination = $this->sitesetting_model->get_admin_pagination();
        
	//pagination settings
        
	$config['per_page'] = $admin_pagination;
     
	$config['base_url'] = base_url().'admin/hitw_video/search/'.$data;
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] = 20;
	$config['uri_segment'] = 5;
	$config['full_tag_open'] = '<ul>';
	$config['full_tag_close'] = '</ul>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a>';
	$config['cur_tag_close'] = '</a></li>';
	$config['prev_link'] = '&lt;';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = '&gt;';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';
	 
	//limit end
       
	//$page = $this->uri->segment(3);
       
	//math to get the initial record to be select in the database
      
	$limit_end = ($page * $config['per_page']) - $config['per_page'];
	if ($limit_end < 0)
	{
	   $limit_end = 0;
	}
       
	$j=0;

	$select['issues']=$this->hitw_video_model->search($config['per_page'], $limit_end, $data);
	
	//fetch sql data into arrays
	
	$sel['list']=$this->hitw_video_model->count_search($data);
	$config['total_rows'] = $sel['list'];
	$this->pagination->initialize($config);
	$select['r_list']=$this->hitw_video_model->count_issues('');
       
	//to hide management from sub admin
	//$store=$this->header_model->get_manage();	
	//$data_header['manage']=$store[0];

	//checking for admin and subadmin status
	$user_name=$this->session->userdata('user_name');
	$data_header['stat']=$this->header_model->get_admin_type($user_name);
	
	
	$this->load->view('admin/includes/admin_header',$data_header);
	$this->load->view('admin/hitw_video/flag_issues_list',$select);
	$this->load->view('admin/includes/admin_footer');
    }
    
    public function active(){
	
		$id = $this->uri->segment(4);
		$status = $this->uri->segment(5);
		
		$data_to_store = array(
		    'status' => $status
		);		
		
		$this->hitw_video_model->active($id,$data_to_store);
		redirect('admin/hitw_video');
    }
}