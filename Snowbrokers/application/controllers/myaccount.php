<?php
class Myaccount extends CI_Controller{

    public $size_id;
    public $color_id;   
    function __construct()
    {
        parent::__construct();
        $this->no_cache();
	
	 $this->load->model('site_settingsmodel');
        $this->load->model('registration_model');
        $this->load->model('modelsignup');
        $this->load->model('modelfooter');
        $this->load->model('modelhome');
        $this->load->model('modelsettings');
        $this->load->model('modelmyaccount');
        $this->load->model('model_products');  /*all data related to products created by anupam on 30 th aug 2014*/
        $this->load->model('model_offer_banner');
	$this->load->model('model_top_banner');
	$this->load->model('model_middle_banner');
	$this->load->model('modelbanner_home_footer');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        $this->load->helper('cookie');
        
        $this->modelsettings->site_settings();
        $this->limit = $this->modelsignup->per_page();
        
        $data=$this->session->userdata('id');
        if(empty($data) || ($data<0))
        {
            redirect('home');
        }
//	$size_id="";
//        $color_id="";
    }
    
    public function index()
    {
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	
        $data['member_details'] = $this->modelmyaccount->member_details($this->session->userdata('id'));
	$this->load->view('header/header',$data);
        $this->load->view('member/my_account');
        $this->load->view('footer/footer');
    }
    public function update_user()
    {
        if($this->session->userdata('id')>0)
        {
            $update = $this->modelmyaccount->update_user();
            if($update==1)
            {
                $this->session->set_userdata('success_msg','Your account updated successfully!');
            }
            else
            {
                $this->session->set_userdata('error_msg','Please try again. Tehre are some error occurred!');
            }
        }
        else
        {
            $this->session->set_userdata('error_msg','Please try again. Tehre are some error occurred!');
        }
        redirect('myaccount');
    }
    public function change_password()
    {
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	$this->load->view('header/header',$data);
        $this->load->view('member/chang_password');
        $this->load->view('footer/footer');
    }
    public function update_password()
    {
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	$uid=$this->session->userdata('id');
	//$old_pass=md5($this->input->post('curr_pwd'));
	if($this->input->post('conf_pwd')!='')
	{
	$data_to_update = array(
                            'password'  => md5($this->input->post('conf_pwd'))
			    );
	$updt = $this->model_products->get_user_by_pass($uid,$data_to_update);
	 if($updt)
	     {
		 //$data['flash_message'] = 'ok';
		 $this->session->set_userdata('success_msg','Your password has been updated successfully.');
	     }
	
	    else
	    {
		$this->session->set_userdata('error_msg','Failed to update! Please try again.');
	    }
	   // $this->session->set_flashdata('flash_message', 'pass_updt');
	   // redirect('myaccount');
	//}
	}
	$this->load->view('header/header',$data);
        $this->load->view('member/chang_password');
        $this->load->view('footer/footer');
	
    }
    public function check_password()
    {
	$opass=md5($_REQUEST['opass']);
	$uid=$this->session->userdata('id');
	$get_pass=$this->model_products->get_password_by_uid($uid);
	
	if($opass==$get_pass)
	 {
	    echo '1';
	 }
	 else{
	    echo '0';
	 }
    }
    public function track_product()
    {
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	$data['track_product'] = $this->model_products->get_track_product($this->session->userdata('id'));
	$this->load->view('header/header',$data);
        $this->load->view('member/track_product');
        $this->load->view('footer/footer');
    }
    public function edit_track_details()
    {
	$data['product_type'] = $this->modelhome->get_ProductTypes();
	$product_id=$this->uri->segment(3);
	//$prod_details = $this->model_products->get_product_size_color_quantity($product_id);
	//$data['product_id'] = $product_id;
	$data['product_details'] = $this->modelhome->get_ProductDetails_admin($product_id);
	$size_id=$this->uri->segment(4);
	//$data['size_details'] = $this->model_products->get_SizeProduct($size_id);
	$data['size_details'] = $size_id;
	$color_id=$this->uri->segment(5);
	$data['color_details'] = $this->model_products->get_ColorProduct($color_id);
	$data['track_product'] = $this->model_products->get_track_product($this->session->userdata('id'));
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	$data['country'] = $this->modelhome->get_Currencies();
	$data['product_basic_details'] = $this->modelhome->get_ProductDetails_admin($product_id);
	$this->load->view('header/header',$data);
	$this->load->view('member/edit_track_details',$data);
        //$this->load->view('member/track_product');
        $this->load->view('footer/footer');
    }
     public function edit_basic_features()
    {
	$prod_id = trim($this->input->post('product_id'));
	$update = $this->model_products->edit_basic_features($prod_id);
	
	if($update==1)
	{
	    $this->session->set_userdata('success_msg','This product updated successfully.');
	    redirect('myaccount/track_product');
	}
	else
	{
	    $this->session->set_userdata('error_msg','There are some problem occurred! Please try again latter.');
	     redirect('myaccount/track_product');
	}
    }
   protected function no_cache()
	{
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
	}
public function advance_features()
    {
	$product_id = $this->uri->segment(3);
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	$data['product_basic_details'] = $this->modelhome->get_ProductDetails($product_id);
	if($data['product_basic_details']!='0')
	{
	    $this->load->view('header/header',$data);
	    $this->load->view('products/advance-details-new');
	    $this->load->view('footer/footer');
	}
	else
	{
	    $this->session->set_userdata('error_msg','Sorry! This is not embarrassing!');
	    redirect('product/basic_details');
	}
	
    }

}
?>