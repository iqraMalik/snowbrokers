<?php
class Admin_product extends CI_Controller{


    function __construct()
    {
        parent::__construct();
        
		session_start();
		$this->load->model('registration_model');
		
		$this->load->model('modelsignup');
		$this->load->model('model_offer_banner');
	        $this->load->model('model_top_banner');
	        $this->load->model('model_middle_banner');
	        $this->load->model('modelbanner_home_footer');
		$this->load->model('modelfooter');
                $this->load->model('modelhome');
                $this->load->model('modelsettings');
		$this->load->model('model_products');  /*all data related to products created by anupam on 30 th aug 2014*/
		
                $this->load->library('encrypt');
		$this->load->library('pagination');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->modelsettings->site_settings();
		$this->limit = $this->modelsignup->per_page();
		$this->load->library('session');
	        $data=$this->session->userdata('id');
		
		$this->load->helper('cookie');
		//echo $_SESSION['admin_login'];exit;
		if($_SESSION['admin_login']!='true')
		{
		    redirect('http://www.esolz.co.in/lab4/Snowbrokers/admin/index.php/login/index');
		}
		
		
    }
    public function basic_details()
    {

        $categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	$data['product_type'] = $this->modelhome->get_ProductTypes();
	//$data['product_category'] = $this->modelhome->get_ProductCategory();
	$data['currency'] = $this->modelhome->get_Currencies();
        $this->load->view('header/header',$data);
        $this->load->view('products/basic_details_admin');
        //$this->load->view('footer/footer');
    }
    public function edit_basic_details()
    {
	$product_id = $this->uri->segment(3);
	//echo $product_id; exit;
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	$data['product_type'] = $this->modelhome->get_ProductTypes();
	//$data['product_category'] = $this->modelhome->get_ProductCategory();
	$data['currency'] = $this->modelhome->get_Currencies();
	$data['product_basic_details'] = $this->modelhome->get_ProductDetails_admin($product_id);
        $this->load->view('header/header',$data);
        $this->load->view('products/edit_basic_details');
        //$this->load->view('footer/footer');
    }
    public function edit_basic_features()
    {
	$prod_id = trim($this->input->post('product_id'));
	$update = $this->modelhome->edit_basic_features($prod_id);
	if($update==1)
	{
	    $this->session->set_userdata('success_msg','This product updated successfully.');
	    redirect('admin_product/edit_basic_details/'.$prod_id);
	}
	else
	{
	    $this->session->set_userdata('error_msg','There are some problem occurred! Please try again latter.');
	    redirect('admin_product/edit_basic_details/'.$prod_id);
	}
    }
    public function get_categoryType()
    {
	$data="@@";
	$product_id = $_REQUEST['product_id'];
	$get_category = $this->modelhome->get_ProductCategory($product_id);
	if(count($get_category) > 0)
        {
	    $data .='<select name="category" id="category">';
	    foreach($get_category as $values)
            {	
		$data .="<option value='".$values->id."'>".$values->name."</option>";
	    }
	    $data.='</select>@@';
	}
	else
	{
	    $data .='<select name="category" id="category">';
	    $data .="<option value='0'>No category available</option></select>@@";
	}
	echo $data;
    }
    public function basic_features()
    {
        //echo "Hi";exit;
	$product_id = $this->modelhome->insert_Product('0');
        //$product_id; exit;
	if($product_id>0)
	{
	    $this->session->set_userdata('success_msg','Add more details about your product.');
	    redirect('admin_product/advance_features/'.$product_id);
	}
	else
	{
	    $this->session->set_userdata('error_msg','Please try again! Failed to add your product.');
	    redirect('admin_product/basic_details/');
	}
    }
    public function advance_features()
    {
	$product_id = $this->uri->segment(3);
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	$data['product_basic_details'] = $this->modelhome->get_ProductDetails_admin($product_id);
	if($data['product_basic_details']!='0')
	{
	    $this->load->view('header/header',$data);
	    $this->load->view('products/advance_details_admin');
	   // $this->load->view('footer/footer');
	}
	else
	{
	    $this->session->set_userdata('error_msg','Sorry! This is not embarrassing!');
	    redirect('admin_product/basic_details/');
	}
	
    }
    public function insert_advancedetails()
    {
	$data = $this->modelhome->insert_advancedetails();
	$this->session->set_userdata('success_msg','Your product saved successfully.');
	redirect('admin_product/advance_features/'.trim($this->input->post('product_id')));
    }
    public function delete_Image()
    {
	$image_id = trim($_REQUEST['image_id']);
	echo $delte_Image = $this->modelhome->delete_Image($image_id);
    }
    public function add_dropzone_pic()
    {
	//echo $this->uri->segment(2);
	//echo $this->uri->segment(3);
	$data['random_num'] = $this->uri->segment(3);
	$data['product_id'] = $this->uri->segment(4);
	$data['product_type'] = $this->uri->segment(5);
	$data['product_category'] = $this->uri->segment(6);
	
	
	$insert_img = $this->modelhome->insert_img($data);
	echo $insert_img;
    }
    public function delete_dropzone_pic()
    {
	$delete_dropzone_img = $this->modelhome->delete_dropzone_img();
    }
}
?>