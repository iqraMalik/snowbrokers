  <?php
class Admin_country_management extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    const VIEW_FOLDER = 'admin/country';
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('admin_country_model');
        
	$this->load->model('sitesetting_model');

       if(!$this->session->userdata('is_logged_in')){
           redirect('admin/admin_login');
       }
    }
    public function index()
    {
         $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type');

		$admin_pagination = $this->sitesetting_model->get_admin_pagination();

        //pagination settings
        $config['per_page'] = $admin_pagination;
        $config['base_url'] = base_url()."admin/admin_country_management";
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
        if ($limit_end < 0){
            $limit_end = 0;
        } 

        //if order type was changed
        if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }
        else{
            //we have something stored in the session? 
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');    
            }else{
                //if we have nothing inside session, so it's the default "Asc"
                $order_type = 'Asc';  
            }
        }
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;      


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
        if($search_string !== false && $order !== false || $this->uri->segment(3) == true){ 
           
            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected       
            */
            if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;

            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;

            //save session data into the session
            if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
            
            //fetch sql data into arrays
            $data['count_pages']= $this->admin_country_model->count_pages($search_string, $order);
           	$config['total_rows'] = $data['count_pages'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['pages'] = $this->admin_country_model->get_pages($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['pages'] = $this->admin_country_model->get_pages($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['pages'] = $this->admin_country_model->get_pages('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['pages'] = $this->admin_country_model->get_pages('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }
	else{

            //clean filter data inside section
            //$filter_session_data['manufacture_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_pages']= $this->admin_country_model->count_pages();
            $data['pages'] = $this->admin_country_model->get_pages('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_pages'];

        }
         
        //initializate the panination helper 
        $this->pagination->initialize($config);
        //load the view
       
        $data['main_content'] = 'admin/country/cuntrylist';
        $this->load->view('admin/includes/admin_template', $data);  

    }
    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('country_name', 'Country Name', 'required|trim');
			$this->form_validation->set_rules('short_name', 'Short Name', 'required|trim');
			//$this->form_validation->set_rules('user_pass', 'Password', 'required|trim|min_length[5]');
	    	//$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">?</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
           if ($this->form_validation->run())
            {
		 
		      $this->db->where('contryname', $this->input->post('country_name'));
		      $query = $this->db->get('country');
			$ck_v = $query->num_rows();

		
                 $data_to_store = array(
		    
		    'contryname' => $this->input->post('country_name'),
		    'shortname' => $this->input->post('short_name'));		
		    		
                
                //if the insert has returned true then we show the flash message
		if($ck_v > 0)
		{
		    $this->session->set_flashdata('flash_message', 'duplicate');
		}
             else{
                if($this->admin_country_model->store_user('country',$data_to_store))
                   {
                    $this->session->set_flashdata('flash_message', 'added');
                 }
		 else
		{
                    $this->session->set_flashdata('flash_message', 'not_added');
                }
                
	     }
	     redirect('admin/admin_country_management');
            }

        }
        //load the view
        $data['main_content'] = 'admin/country/countryadd';
        $this->load->view('admin/includes/admin_template',$data);  
    }
     public function update()
    {
        
        $id = $this->uri->segment(4);
	$data['reg'] = $this->admin_country_model->get_reg($id);
       // print_r($data);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
	    $this->form_validation->set_rules('country_name', 'Country Name', 'required|trim');
	    $this->form_validation->set_rules('short_name', 'Short Name', 'required|trim');
	    

            
            if ($this->form_validation->run())
            {
                $data_to_store = array(
				    'contryname' => $this->input->post('country_name'),
				    'shortname' => $this->input->post('short_name'),
				    );				    
			    //if the insert has returned true then we show the flash message
                if($this->admin_country_model->update_user($id, $data_to_store) == TRUE)
                {
                    $this->session->set_flashdata('flash_message', 'updated');
					
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/admin_country_management');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
       	$data['user'] = $this->admin_country_model->get_user_by_id($id);
        //load the view
        //print_r($data);
        $data['main_content'] = 'admin/country/country_edit';
        $this->load->view('admin/includes/admin_template', $data);            

    }//update
     public function delete()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->admin_country_model->delete_page($id);
        redirect('admin/admin_country_management');
    }//edit

 }
    
    
    
