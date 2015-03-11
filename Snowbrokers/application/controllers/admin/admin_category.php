<?php
class Admin_category extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    const VIEW_FOLDER = 'admin/category';
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
		$this->load->model('admin_category_model');
		$this->load->model('sitesetting_model');
		if(!$this->session->userdata('is_logged_in'))
		{
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
        $search_string    = $this->input->post('search_string');        
        $order            = $this->input->post('order'); 
        $order_type       = $this->input->post('order_type');

	$admin_pagination = $this->sitesetting_model->get_admin_pagination();

        //pagination settings
        $config['per_page'] = $admin_pagination;
	//$config['per_page'] = 1;

        $config['base_url'] 		= base_url().'admin/category';
        $config['use_page_numbers'] 	= TRUE;
        $config['num_links'] 		= 20;
        $config['full_tag_open'] 	= '<ul>';
        $config['full_tag_close'] 	= '</ul>';
        $config['num_tag_open']	 	= '<li>';
        $config['num_tag_close'] 	= '</li>';
        $config['cur_tag_open'] 	= '<li class="active"><a>';
        $config['cur_tag_close'] 	= '</a></li>';
	$config['prev_link'] 		= '&lt;';
	$config['prev_tag_open'] 	= '<li>';
	$config['prev_tag_close'] 	= '</li>';
	$config['next_link'] 		= '&gt;';
	$config['next_tag_open'] 	= '<li>';
	$config['next_tag_close'] 	= '</li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0)
	{
            $limit_end = 0;
        } 
        //if order type was changed
        if($order_type)
	{
            $filter_session_data['order_type'] = $order_type;
        }
        else
	{
            //we have something stored in the session? 
            if($this->session->userdata('order_type'))
	    {
                $order_type = $this->session->userdata('order_type');    
            }
	    else
	    {
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
        if($search_string !== false && $order !== false || $this->uri->segment(3) == true)
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

            if($order)
	    {
                $filter_session_data['order'] = $order;
            }
            else
	    {
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;

            //save session data into the session
            if(isset($filter_session_data))
	    {
              $this->session->set_userdata($filter_session_data);    
            }
            
            //fetch sql data into arrays
            $data['count_pages']  = $this->admin_category_model->count_pages($search_string, $order);
            $config['total_rows'] = $data['count_pages'];

            //fetch sql data into arrays
            if($search_string)
	    {
                if($order)
		{
                    $data['pages'] = $this->admin_category_model->get_pages($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }
		else
		{
                    $data['pages'] = $this->admin_category_model->get_pages($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }
	    else
	    {
                if($order)
		{
                    $data['pages'] = $this->admin_category_model->get_pages('', $order, $order_type, $config['per_page'],$limit_end);        
                }
		else
		{
                    $data['pages'] = $this->admin_category_model->get_pages('', '', $order_type, $config['per_page'],$limit_end);        
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
            $data['count_pages']	= $this->admin_category_model->count_pages();
            $data['pages'] 		= $this->admin_category_model->get_pages('', '', $order_type, $config['per_page'],$limit_end);
            $config['total_rows'] 	= $data['count_pages'];

        }
         
        //initializate the panination helper 
        $this->pagination->initialize($config);
        //load the view
        
        $data['main_content'] = 'admin/category/category_list';
        $this->load->view('admin/includes/admin_template', $data);  

    }//index

    public function add()
    {
   	$data['row'] = $this->admin_category_model->select_category_list();
		// to get the trade list
		
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST'){

            //form validation
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
            	//...... img uploading section ..................
			$image_name="";					
	                if (($_FILES["category_image"]["type"] == "image/jpeg")
	                                || ($_FILES["category_image"]["type"] == "image/JPEG")
	                                || ($_FILES["category_image"]["type"] == "image/jpg")
	                                || ($_FILES["category_image"]["type"] == "image/JPG")
	                                || ($_FILES["category_image"]["type"] == "image/gif")
	                                || ($_FILES["category_image"]["type"] == "image/GIF")
	                                || ($_FILES["category_image"]["type"] == "image/png")
	                                || ($_FILES["category_image"]["type"] == "image/PNG"))
	                        {
	                            if($_FILES["category_image"]['name']!= "")
	                            {
	                                    $DIR_IMG_NORMAL = "assets/uploads/category_img/";
	                                    $DIR_IMG_THUMB  = "assets/uploads/category_img/thumb/";
	            
	                                    $arra1 = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','/','*','+','~','`','=');
	                                    $arra2 = array('','','','','','','','','','','','','','','','','','','','','','','','','');
	            
	                                    $filename = str_replace($arra1, $arra2, $_FILES["category_image"]['name']);
	                                    $s=time()."_".$filename;
	            
	                                    $fileNormal = $DIR_IMG_NORMAL.$s;
	                                    $fileThumb = $DIR_IMG_THUMB.$s;
	            
	                                    $file = $_FILES["category_image"]['tmp_name'];
	                                    
	                                    $thumbWidth = 130;

	                                    $thumbHeight = 102;

	                                    $result = move_uploaded_file($file, $fileNormal);
	                                    
	                                    if($result==1)
					    {
	                                        $this->createThumbs($DIR_IMG_NORMAL,$DIR_IMG_THUMB,$thumbWidth,$thumbHeight,$s);
	                                        $image_name=$s;                                      
	                                    }
	                            }
	                        }
		
                $data_to_store = array(
			'name' => $this->input->post('category_name'),
			
			'parent_id' => $this->input->post('parent_cate'),
			
			'description' => $this->input->post('page_content'),
			
			'img' => $image_name
				
                );				
                //if the insert has returned true then we show the flash message
               	if($this->admin_category_model->store_category('category',$data_to_store))
		{
                     $this->session->set_flashdata('flash_message', 'added');
					
                }
		else
		{
                     $this->session->set_flashdata('flash_message', 'not_added');
                }
		redirect('admin/admin_category');
            }
        }
	//$data['att']=$this->admin_category_model->get_attributes();
        //load the view
        $data['main_content'] = 'admin/category/category_add';
        $this->load->view('admin/includes/admin_template', $data);  
    }//end add
  	
  	 /**
    * Update item by his id
    * @return void
    */
    public function update()
    {
    	$data['row'] = $this->admin_category_model->select_category_list();
		// to get the trade list
	//$data['trades'] = $this->admin_trade_model->select_trade_list();
        //product id 
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
       if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');			
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
            	//...... img uploading section ..................
					$image_name="";				
	                if (($_FILES["category_image"]["type"] == "image/jpeg")
	                                || ($_FILES["category_image"]["type"] == "image/JPEG")
	                                || ($_FILES["category_image"]["type"] == "image/jpg")
	                                || ($_FILES["category_image"]["type"] == "image/JPG")
	                                || ($_FILES["category_image"]["type"] == "image/gif")
	                                || ($_FILES["category_image"]["type"] == "image/GIF")
	                                || ($_FILES["category_image"]["type"] == "image/png")
	                                || ($_FILES["category_image"]["type"] == "image/PNG"))
	                        {
	                            if($_FILES["category_image"]['name']!= "")
	                            {
	                                    $DIR_IMG_NORMAL = "assets/uploads/category_img/";
	                                    $DIR_IMG_THUMB  = "assets/uploads/category_img/thumb/";
	            
	                                    $arra1 = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','/','*','+','~','`','=');
	                                    $arra2 = array('','','','','','','','','','','','','','','','','','','','','','','','','');
	            
	                                    $filename = str_replace($arra1, $arra2, $_FILES["category_image"]['name']);
	                                    $s=time()."_".$filename;
	            
	                                    $fileNormal = $DIR_IMG_NORMAL.$s;
	                                    $fileThumb = $DIR_IMG_THUMB.$s;
	            
	                                    $file = $_FILES["category_image"]['tmp_name'];

	                                    $thumbWidth = 130;

	                                    $thumbHeight = 102;
            
	                                    $tag = "both";
	                                    $result = move_uploaded_file($file, $fileNormal);
	                                    
	                                    if($result==1)
					    {
	                                        $this->createThumbs($DIR_IMG_NORMAL,$DIR_IMG_THUMB,$thumbWidth,$thumbHeight,$s);
	                                        $image_name=$s;	                                        
	                                    }
	                            }
				    //echo "he he he";
				    //die();
	                        }
			
				
				
		$mate_att_ar=$this->input->post('mate_att');
		$prin_att_ar=$this->input->post('prin_att');
		$mate_att=implode(",", $mate_att_ar);
		$prin_att=implode(",", $prin_att_ar);
		$production_time=$this->input->post('min_days').','.$this->input->post('max_days');
		
		$trade_ar = $this->input->post('trade');
		$trade = implode(",", $trade_ar);
		
		if($banner=='' && $image_name=='')
		{
		    $data_to_store = array(
                	'name'           => $this->input->post('category_name'),
                	
			'parent_id'      => $this->input->post('parent_cate'),
			
			'description'    => $this->input->post('page_content'),
                   	
			//'img'            => $s,
			
			'status'         => $this->input->post('status')					
			);
		}
		else if($banner=='' && $image_name !='')
		{
		    $data_to_store = array(
			'name'                => $this->input->post('category_name'),
			
			'parent_id'	      => $this->input->post('parent_cate'),
			
			'description' 	      => $this->input->post('page_content'),
			
			'img'                 => $s,
			
			'status' 	      => $this->input->post('status')					
			);
		    
		}

                //if the insert has returned true then we show the flash message
                if($this->admin_category_model->update_category($id, $data_to_store) == TRUE)
		{
                    $this->session->set_flashdata('flash_message', 'updated');
                }
		else
		{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
			redirect('admin/category');
            }//validation run

        }
        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        //all main category list for frop down list
       	$data['cat'] = $this->admin_category_model->get_category_by_id($id);
	//$data['att']=$this->admin_category_model->get_attributes();
        //load the view
        $data['main_content'] = 'admin/category/category_edit';
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
    
    public function delete()
    {        
        $id = $this->uri->segment(4);
        $this->admin_category_model->delete_cat($id);
        redirect('admin/category');
    }//delet
}