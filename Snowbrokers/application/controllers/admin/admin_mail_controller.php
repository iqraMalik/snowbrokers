<?php
class Admin_mail_controller extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    const VIEW_FOLDER = 'admin/mail';
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
	
	        $this->load->helper('url');
		$this->load->library('email');
		$this->load->model('admin_mail_model'); /*loading the products*/
		$this->load->model('sitesetting_model');
		if(!$this->session->userdata('is_logged_in'))
		{
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
        $config['base_url'] = base_url()."admin/admin_mail_controller";
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
            $data['count_pages']  = $this->admin_mail_model->count_pages($search_string, $order);
            $config['total_rows'] = $data['count_pages'];

            //fetch sql data into arrays
            if($search_string)
	    {
                if($order)
		{
                    $data['pages'] = $this->admin_mail_model->get_pages($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }
		else
		{
                    $data['pages'] = $this->admin_mail_model->get_pages($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }
	    else
	    {
                if($order)
		{
                    $data['pages'] = $this->admin_mail_model->get_pages('', $order, $order_type, $config['per_page'],$limit_end);        
                }
		else
		{
                    $data['pages'] = $this->admin_mail_model->get_pages('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }
	else
	{

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
            $data['count_pages']	= $this->admin_mail_model->count_pages();
            $data['pages'] 		= $this->admin_mail_model->get_pages('', '', $order_type, $config['per_page'],$limit_end);
            $config['total_rows'] 	= $data['count_pages'];
                     //print_r($data);
        }
         
        //initializate the panination helper 
        $this->pagination->initialize($config);
        //load the view
        
        
        $data['main_content'] = 'admin/mail/maillist';
        $this->load->view('admin/includes/admin_template',$data);      
    }
    function mailbox($id)
    {
	 
	
		 $data['pages']=$this->admin_mail_model->mailid($id);
		 $data['main_content'] ='admin/mail/sendmail';
                 $this->load->view('admin/includes/admin_template',$data);
                   
                
			//redirect('admin/admin_mail_controller');
            //validation run
        
}
    function sendmail()
    {
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
	    
	    //die();
            //form validation
            $this->form_validation->set_rules('subject',  'Subject Value', 'required|trim');
	    $this->form_validation->set_rules('message', 'Message Value', 'required|trim');
	    $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
	     $mailid=$this->input->post('mailid');
	     $subject= $this->input->post('subject');
	     $message=$this->input->post('message');
	     $this->email->from('satyajitghosh02@gmail.com', 'satyajit');
             $this->email->to("$mailid"); 
             $this->email->subject("$subject");
             $this->email->message("$message");	
            $flag=$this->email->send();
	   
             if(isset($flag)){
		 $this->session->set_flashdata('flash_message', 'SUCESS');
		}
		else
		{
                     $this->session->set_flashdata('flash_message', 'FAILD');
                }
    }
}
 
        //$data['main_content'] = 'admin/mail/sendmail';
        //$this->load->view('admin/includes/admin_template',$data);
    $this->mailbox(0);
     redirect('admin/admin_mail_controller');
    }
   public function delete()
    {        
        $id = $this->uri->segment(4);
        $this->admin_mail_model-> delete_page($id);
        redirect('admin/admin_mail_controller/index');
    }
}