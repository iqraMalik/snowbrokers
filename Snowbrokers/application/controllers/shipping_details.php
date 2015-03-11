<?php
class Shipping_details extends CI_Controller{


    function __construct()
    {
        parent::__construct();
                //$this->load->model('modelhome');
                //$this->no_cache();
		$this->load->model('registration_model');
		$this->load->model('site_settingsmodel');
		//$this->load->model('modelsports');
		//$this->load->model('modelgroup');
		//$this->load->model('modellogin');
		//$this->load->model('modelgoals');
		
		//$this->load->model('modelevent');
		$this->load->model('model_offer_banner');
		$this->load->model('model_top_banner');
		$this->load->model('model_middle_banner');
		$this->load->model('modelbanner_home_footer');
		$this->load->model('modelsignup');
		$this->load->model('model_products');  /*all data related to products created by anupam on 30 th aug 2014*/
		$this->load->model('modelfooter');
                $this->load->model('modelhome');
                $this->load->model('modelsettings');
		$this->load->library('pagination');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->modelsettings->site_settings();
		$this->limit = $this->modelsignup->per_page();
		$this->load->library('session');
	        $data=$this->session->userdata('id'); 
		if(empty($data) || ($data<0))
		{
		    
		    redirect('home');
		}
		
    }
    
    public function index()
    {
	
	//$trans_id = trim($this->uri->segment(3));
	//$data['cart_details'] = $this->modelhome->get_Product_Cartdetails($trans_id);
	//if($data['cart_details']!='0')
	//{
	   // $this->modelhome->get_detailsProduct($data['cart_details']->id);
	    //$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	    //$data['categories'] = $categories;
	  // echo $this->session->userdata('id');
	    $data['cart_items'] = $this->modelhome->get_myCartDetails();
	   // print_r($data['cart_items']);die();
	 //   $data['cart_items'] = $this->modelhome->get_myCartsDetails();
	   // print_r($data['cart_items']);die();
	    $categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	    $data['categories'] = $categories;
	    
	    $this->load->view('header/header',$data);
	    $this->load->view('products/shipping_details',$data);
	    $this->load->view('footer/footer');
	//}
	//else
	//{
	//    $this->session->set_userdata('error_msg','There are some problem occurred. Please try again!');
	//}
	
    }
    public function add_new_quintity()
    {
	$product_id=$this->input->post('product_id');
	$quintity=$this->input->post('quinty');
	echo $product_id = $this->modelhome->insert_quintity($product_id,$quintity);
    }
    public function basic_features()
    {
	$product_id = $this->modelhome->insert_Product();
	if($product_id>0)
	{
	    $this->session->set_userdata('success_msg','You are nearly finished please do Colour Size Qty and Photo..');
	    redirect('shipping_details/advance_features/'.$product_id);
	}
	else
	{
	    $this->session->set_userdata('error_msg','Please try again! Failed to add your product.');
	    redirect('product/basic_details');
	}
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
	   // $this->session->set_userdata('error_msg','Sorry! This is not embarrassing!');
	    redirect('product/basic_details');
	}
	
    }
    public function get_categoryType()
    {
	$data="@@";
	$product_id = $_REQUEST['product_id'];
	$get_category = $this->modelhome->get_ProductCategory($product_id);
	if(count($get_category) > 0)
        {
	    $data .='<select name="category" id="category" onchange="get_size_color(this.value);">';
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
        public function get_size_color()
    {
	$data = "";
	$data1 = "";
	$result = array();
	$product_cat = $_REQUEST['product_cat'];
	//echo "die();";die();
	$get_size = $this->modelhome->get_ProductSize_val($product_cat);
	$get_color = $this->modelhome->get_ProductColor_val($product_cat);
	//print_r(count($get_color));
	//die();
	if(!empty($get_size))
         {
	   
			$data .='<select name="size_opt" id="size_opt">';
			foreach($get_size as $values)
			{	
			    $data .="<option value='".$values->id."'>".$values->size_type."</option>";
			}
			$data.='</select>';
	   
	 }
	 else
	 {
	    $data .='<select name="size_opt" id="size_opt">';
				
			    $data .="<option value='0'>No Size Here</option>";
			
			$data.='</select>';
	 }
	
	 if(!empty($get_color))
         {
	   	  $data1 .='<select name="color_opt" id="color_opt">';
		    foreach($get_color as $values1)
		    {	
			$data1 .="<option value='".$values1->id."'>".$values1->color_code."</div></option>";
		    }
		    $data1.='</select><button onclick="add_more_color();">+Add More Color</button> (If you want to add more color click this button)';
	 }
	 else
	 {
	    $data1 .='<select name="size_opt" id="size_opt">';
				
			    $data1 .="<option value='0'>No Color Here</option>";
			
			$data1.='</select><button onclick="add_more_color();">+Add More Color</button> (If you want to add more color click this button)';
	 }
	 
	
//	if(count($get_size) > 0)
//        {
//	    $data .='<select name="size_opt" id="size_opt">';
//	    foreach($get_size as $values)
//            {	
//		$data .="<option value='".$values->id."'>".$values->size_type."</option>";
//	    }
//	    $data.='</select>@@';
//	}
//	else
//	{
//	    $data .='No Size available. @@';
//	}
	////////////// color value //////////

//	if(count($get_color) > 0)
//        {
//	    $data1 .='<select name="color_opt" id="color_opt">';
//	    foreach($get_color as $values1)
//            {	
//		$data1 .="<option value='".$values1->id."'>".$values1->color_code."</option>";
//	    }
//	    $data1.='</select>@@@';
//	}
//	else
//	{
//	    $data1 .='No Size available. @@@';
//	}
	//$result['size'] = $data;
	//$result['color'] = $data1;
	echo $data.'@[ESOLZ]@'.$data1;
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
    public function add_toCart()
    {
	$update_address = $this->modelhome->insert_ShippingAddress();
	if($update_address==1)
	{
	    //$this->session->set_userdata('success_msg','Item(s) added successfully in your cart.');
	    $this->session->set_userdata('success_msg','Your order has been placed successfully.');
	    //after finish redirect them to thank you page
	    redirect('shipping_details/my_cart_finish');
	}
	
    }
    public function my_cart_finish()
    {
	$data['cart_items'] = $this->modelhome->get_myCartDetails();
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	
	$this->load->view('header/header',$data);
        $this->load->view('products/cart_finish');
        $this->load->view('footer/footer');
    }
    public function insert_advancedetails()
    {
	$data = $this->modelhome->insert_advancedetails();
	$this->session->set_userdata('success_msg','Your product updated successfully.');
	redirect('shipping_details/advance_features/'.trim($this->input->post('product_id')));
    }
    public function delete_dropzone_pic()
    {
	$delete_dropzone_img = $this->modelhome->delete_dropzone_img();
    }
    public function delete_Image()
    {
	$image_id = trim($_REQUEST['image_id']);
	echo $delte_Image = $this->modelhome->delete_Image($image_id);
    }
    public function my_cart()
    {
	$data['cart_items'] = $this->modelhome->get_myCartDetails();
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	
	$this->load->view('header/header',$data);
        $this->load->view('products/cart_details',$data);
        $this->load->view('footer/footer');
    }
    public function remove_CartItem()
    {
	$cart_id = $_REQUEST['cart_id'];
	echo $delete_item = $this->modelhome->delete_FromCart($cart_id);
    }
    public function confirm_Order()
    {
	$confirm_order = $this->modelhome->confirm_Order();
	if($confirm_order==1)
	{
	    //$this->session->set_userdata('success_msg','Your order placed successfully!');
	    $this->session->set_userdata('success_msg','Your order has been placed successfully.');
	    //after finish redirect them to thank you page
	    //redirect('shipping_details/my_cart_finish');
	}
	if($confirm_order==2)
	{
	    $this->session->set_userdata('error_msg','There are no product in your cart!');
	}
	if($confirm_order==0)
	{
	    $this->session->set_userdata('error_msg','There some error occurred! Please try again.');
	}
	echo $confirm_order;
    }
    
    public function advance_features_post()
    {
        $image_session = $this->input->post('random_un');
        $product_type_ad = $this->input->post('product_type_ad');
        $product_category_ad = $this->input->post('product_category_ad');
        //$data['quantity'] = $this->input->post('qty_color');
        $data['product_id'] = $this->input->post('product_id');
        $color_id = '#'.trim($this->input->post('color_text'));
        $color_ids = $this->site_settingsmodel->insert_color($color_id,$product_type_ad,$product_category_ad);
        $data['color_id'] = $color_ids;
        $sizes = $this->input->post('size_text');
        $quantity = $this->input->post('size_qty');
        $count_size = count($sizes);
        //echo '<pre>';
        //print_r($sizes);
        //echo $count_size;die();
        for($i=0;$i<$count_size;$i++)
        {
            $sizeid = trim($sizes[$i]);
            if($sizeid=='')
            {
                $size_id = 0;
                $data['product_related_size_id'] = $size_id;
                $data['quantity'] = $this->input->post('qty_color');
            }
            else
            {
                $size_id = $this->site_settingsmodel->insert_size($sizeid,$product_type_ad,$product_category_ad);
                $data['product_related_size_id'] = $size_id;
                $data['quantity'] = $quantity[$i];
            }
            //print_r($data);die();
            $this->site_settingsmodel->productrelatedDataInsert($data);
        }
        $imag_update['img_session'] = 0;
        $imag_update['color_id'] = $color_ids;
        $this->site_settingsmodel->image_UpdateModel($imag_update,$image_session,$data['product_id']);
        
        
        redirect('shipping_details/advance_features/'.$data['product_id']);
        //print_r($this->input->post());die();
    }
}

?>