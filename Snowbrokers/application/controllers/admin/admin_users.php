<?php
class Admin_users extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    const VIEW_FOLDER = 'admin/users';
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_users_model');
		$this->load->model('sitesetting_model');

       if(!$this->session->userdata('is_logged_in')){
           redirect('admin/admin_login');
       }
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {
	//echo "abc";
	//exit;
	//all the posts sent by the view
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type');

		$admin_pagination = $this->sitesetting_model->get_admin_pagination();

        //pagination settings
        $config['per_page'] = $admin_pagination;

        $config['base_url'] = base_url().'admin/users';
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
            $data['count_pages']= $this->admin_users_model->count_pages($search_string, $order);
           	$config['total_rows'] = $data['count_pages'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['pages'] = $this->admin_users_model->get_pages($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['pages'] = $this->admin_users_model->get_pages($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['pages'] = $this->admin_users_model->get_pages('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['pages'] = $this->admin_users_model->get_pages('', '', $order_type, $config['per_page'],$limit_end);        
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
            $data['count_pages']= $this->admin_users_model->count_pages();
            $data['pages'] = $this->admin_users_model->get_pages('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_pages'];

        }
         
        //initializate the panination helper 
        $this->pagination->initialize($config);
        //load the view
        
        $data['main_content'] = 'admin/users/users_list';
        $this->load->view('admin/includes/admin_template', $data);  

    }//index

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
			$this->form_validation->set_rules('user_pass', 'Password', 'required|trim|min_length[5]');
	    	$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">�</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                //$title_alias = str_replace(" ","-",$this->input->post('page_title'));
				//$title_alias = strtolower($title_alias);
				
				//...... img uploading section ..................
					$image_name="";					
	                if (($_FILES["user_image"]["type"] == "image/jpeg")
	                                || ($_FILES["user_image"]["type"] == "image/JPEG")
	                                || ($_FILES["user_image"]["type"] == "image/jpg")
	                                || ($_FILES["user_image"]["type"] == "image/JPG")
	                                || ($_FILES["user_image"]["type"] == "image/gif")
	                                || ($_FILES["user_image"]["type"] == "image/GIF")
	                                || ($_FILES["user_image"]["type"] == "image/png")
	                                || ($_FILES["user_image"]["type"] == "image/PNG"))
	                        {
	                            if($_FILES["user_image"]['name']!= "")
	                            {
	                                    $DIR_IMG_NORMAL = "images/users/";
	                                    $DIR_IMG_THUMB = "images/users/thumb/";
	            
	                                    $arra1 = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','/','*','+','~','`','=');
	                                    $arra2 = array('','','','','','','','','','','','','','','','','','','','','','','','','');
	            
	                                    $filename = str_replace($arra1, $arra2, $_FILES["user_image"]['name']);
	                                    $s=time()."_".$filename;
	            
	                                    $fileNormal = $DIR_IMG_NORMAL.$s;
	                                    $fileThumb = $DIR_IMG_THUMB.$s;
	            
	                                    $file = $_FILES["user_image"]['tmp_name'];
	                                    list($width, $height) = getimagesize($file);
	            						
										/*if($width > $height){
											$widhPercent = (50*100)/$width;
										}else{
											$widhPercent = (50*100)/$height;
										}*/									
										
	                                    $thumbWidth = 50;//($width*$widhPercent)/100;
	                                    //round($width);
	                                    $thumbHeight = 50;//($height*$widhPercent)/100;
	                                    //round($height);
	            
	                                    //$tag = "both";
	            
	                                    $result = move_uploaded_file($file, $fileNormal);
	                                    
	                                    if($result==1)	                                    {
	                                        
											
	                                       //thumbnail($fileThumb, $fileNormal, $thumbWidth, $thumbHeight, $tag);
	                                        $this->createThumbs($DIR_IMG_NORMAL,$DIR_IMG_THUMB,$thumbWidth,$thumbHeight,$s);
	                                        $image_name=$s;
											//$image_name=$width;
	                                    }
	                            }
	                        }
	                   
				//........................
				
                $data_to_store = array(
		    'profile_img' => $image_name,
		    'first_name' => $this->input->post('first_name'),
		    'last_name' => $this->input->post('last_name'),
		    'user_name' => $this->input->post('user_name'),
		    'email' => $this->input->post('user_email'),
		    'password' => md5($this->input->post('user_pass'))		
		    		
                );
                //if the insert has returned true then we show the flash message
                if($this->admin_users_model->store_user('users',$data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/users/users_add';
        $this->load->view('admin/includes/admin_template', $data);  
    }


    /**
    * Update item by his id
    * @return void
    */
    public function update()
    {
        //echo "456";
        //exit;
        //product id 
        $id = $this->uri->segment(4);
	$data['reg'] = $this->admin_users_model->get_reg($id);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
	    $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
	    $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
	    //$this->form_validation->set_rules('user_pass', 'Password', 'required|trim|min_length[5]');
	    $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
	    $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">�</a><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    			//$title_alias = str_replace(" ","-",$this->input->post('page_title'));
				//$title_alias = strtolower($title_alias);
			
				//...... img uploading section ..................
					$image_name="";					
	                if (($_FILES["user_image"]["type"] == "image/jpeg")
	                                || ($_FILES["user_image"]["type"] == "image/JPEG")
	                                || ($_FILES["user_image"]["type"] == "image/jpg")
	                                || ($_FILES["user_image"]["type"] == "image/JPG")
	                                || ($_FILES["user_image"]["type"] == "image/gif")
	                                || ($_FILES["user_image"]["type"] == "image/GIF")
	                                || ($_FILES["user_image"]["type"] == "image/png")
	                                || ($_FILES["user_image"]["type"] == "image/PNG"))
	                        {
	                            if($_FILES["user_image"]['name']!= "")
	                            {
	                                    $DIR_IMG_NORMAL = "images/users/";
	                                    $DIR_IMG_THUMB = "images/users/thumb/";
	            
	                                    $arra1 = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','/','*','+','~','`','=');
	                                    $arra2 = array('','','','','','','','','','','','','','','','','','','','','','','','','');
	            
	                                    $filename = str_replace($arra1, $arra2, $_FILES["user_image"]['name']);
	                                    $s=time()."_".$filename;
	            
	                                    $fileNormal = $DIR_IMG_NORMAL.$s;
	                                    $fileThumb = $DIR_IMG_THUMB.$s;
	            
	                                    $file = $_FILES["user_image"]['tmp_name'];
	                                    list($width, $height) = getimagesize($file);
	            						
										/*if($width > $height){
											$widhPercent = (50*100)/$width;
										}else{
											$widhPercent = (50*100)/$height;
										}*/									
										
	                                    $thumbWidth = 50;//($width*$widhPercent)/100;
	                                    //round($width);
	                                    $thumbHeight = 50;//($height*$widhPercent)/100;
	                                    //round($height);
	            
	                                    //$tag = "both";
	            
	                                    $result = move_uploaded_file($file, $fileNormal);
	                                    
	                                    if($result==1)	                                    {
	                                        
											
	                                       //thumbnail($fileThumb, $fileNormal, $thumbWidth, $thumbHeight, $tag);
	                                        $this->createThumbs($DIR_IMG_NORMAL,$DIR_IMG_THUMB,$thumbWidth,$thumbHeight,$s);
	                                        $image_name=$s;
											//$image_name=$width;
	                                    }
	                            }
	                        }
	                   
				//........................
				//if($image_name != ''){
				
				if( $this->input->post('user_pass') != '' )
				{
				    $data_to_store = array(
				    'profile_img' => $image_name,
				    'first_name' => $this->input->post('first_name'),
				    'last_name' => $this->input->post('last_name'),
				    'user_name' => $this->input->post('user_name'),
				    'email' => $this->input->post('user_email'),
				    'password' => md5($this->input->post('user_pass'))		    		
				    );				    
				}
				else
				{
				    $data_to_store = array(
				    'profile_img' => $image_name,
				    'first_name' => $this->input->post('first_name'),
				    'last_name' => $this->input->post('last_name'),
				    'user_name' => $this->input->post('user_name'),
				    'email' => $this->input->post('user_email'),
				    );				    
				}


					
				/*}else{
					$data_to_store = array(
                	'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('user_email'),
                 	'password' => md5($this->input->post('user_pass'))		    		
                	);
				}*/
				
                //if the insert has returned true then we show the flash message
                if($this->admin_users_model->update_user($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/admin_users');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/admin_users/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
       	$data['user'] = $this->admin_users_model->get_user_by_id($id);
        //load the view
        $data['main_content'] = 'admin/users/users_edit';
        $this->load->view('admin/includes/admin_template', $data);            

    }//update

	function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth,$thumbHeight,$filename )
    {
        
      // open the directory
      $dir = opendir( $pathToImages );
      
        // parse path for the extension
        $info = pathinfo($pathToImages);
    
          // load image and get image size
         /// $img = imagecreatefromjpeg( "{$pathToImages}{$filename}" );....................
         //..................
	        $ext = explode(".", $filename);
		    $ext=strtolower($ext[1]);
		    $img="";
		    if($ext=="jpg")
		    {
		          // load image and get image size
		          $img = imagecreatefromjpeg( "{$pathToImages}{$filename}" );
		    }
		    else if($ext=="png")
		    {
		          // load image and get image size
		          $img = imagecreatefrompng( "{$pathToImages}{$filename}" );
		    }
		    else if($ext=="gif")
		    {
		          // load image and get image size
		          $img = imagecreatefromgif( "{$pathToImages}{$filename}" );
		    }
         //..............
          $width = imagesx( $img );
          $height = imagesy( $img );
    
          // calculate thumbnail size
          $new_width = $thumbWidth;
          $new_height = $thumbHeight;
    
          // create a new temporary image
          $tmp_img = imagecreatetruecolor( $new_width, $new_height );
    
          // copy and resize old image into new image
          	imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			    		
          // save thumbnail into a file
          imagejpeg( $tmp_img, "{$pathToThumbs}{$filename}" );
        //}
     
      // close the directory
      closedir( $dir );
    } // End of Thumbnil function
    
    
    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->admin_users_model->delete_page($id);
        redirect('admin/users');
    }//edit


}