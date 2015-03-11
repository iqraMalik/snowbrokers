<?php
class Product extends CI_Controller{


    function __construct()
    {
        parent::__construct();
                //$this->load->model('modelhome');
                //$this->no_cache();
		$this->load->model('registration_model');
		//$this->load->model('modelsports');
		//$this->load->model('modelgroup');
		//$this->load->model('modellogin');
		//$this->load->model('modelgoals');
		
		//$this->load->model('modelevent');
		$this->load->model('modelsignup');
		$this->load->model('model_offer_banner');
	        $this->load->model('model_top_banner');
	        $this->load->model('model_middle_banner');
	        $this->load->model('modelbanner_home_footer');
		$this->load->model('modelfooter');
                $this->load->model('modelhome');
                $this->load->model('modelsettings');
		$this->load->model('model_products');  /*all data related to products created by anupam on 30 th aug 2014*/
		
		$this->load->library('pagination');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->modelsettings->site_settings();
		$this->limit = $this->modelsignup->per_page();
		$this->load->library('session');
	        $data=$this->session->userdata('id');
		
		$this->load->helper('cookie');
		
	    if($this->uri->segment(3)!='admin_auth')
	    {
		if(empty($data) || ($data<0))
		{
		    redirect('home');
		}
	    }
	    
    }
    
    public function index()
    {
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	
	$this->load->view('header/header',$data);
        $this->load->view('products/product_listing');
        $this->load->view('footer/footer');
    }
    public function details()
    {
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	
	$matching_products     = $this->model_products->getMatchingProducts( $this->uri->segment(3), $this->uri->segment(4), $this->uri->segment(5) ); /*to get the matching products*/
	$full_details_products = $this->model_products->getFulldetailsProduct( $this->uri->segment(5) ); /*to get the matching products*/
	$get_all_sizes         = $this->model_products->getallSizes( $this->uri->segment(3), $this->uri->segment(4) ); /*to get the matching sizes*/
	
	$get_all_colors        = $this->model_products->getallColors( $this->uri->segment(3), $this->uri->segment(4) ); /*to get the matching colors*/
	
	$get_active_sizes      = $this->model_products->getactiveSizes( $this->uri->segment(5) ); /*to get the exact sizes*/
	$get_active_colors     = $this->model_products->getactiveColors( $this->uri->segment(5) ); /*to get the exact colors*/
	
	$data['all_sizes']             = $get_all_sizes;
	$data['get_active_sizes']      = $get_active_sizes;
	$data['full_details_products'] = $full_details_products;
	$data['matching_products']     = $matching_products;
	
	//re-do all works
	$data['all_pro_related_details'] = $this->model_products->product_rel_details( $this->uri->segment(5) );
	
	
        $this->load->view('header/header',$data);
        $this->load->view('products/product_details');
        $this->load->view('footer/footer');
    }
    public function basic_details()
    {
	$user= $this->registration_model->get_user_by_id($this->session->userdata('id'));
	if($user[0]['customer_type']!=2)
	{
	    $this->session->set_userdata('error_msg','You dont have any seller account to sell product. Please register as a seller.');
	    redirect('myaccount');
	}
	else
	{
	    $categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	    $data['categories'] = $categories;
	    $data['product_type'] = $this->modelhome->get_ProductTypes();
	    //$data['product_category'] = $this->modelhome->get_ProductCategory();
	    $data['currency'] = $this->modelhome->get_Currencies();
	    $this->load->view('header/header',$data);
	    $this->load->view('products/basic_details');
	    $this->load->view('footer/footer');
	}
    }
    public function product_list()
    {
	$categories = $this->model_products->getTypes(); /*to get the navigation categories*/
	$data['categories'] = $categories;
	$data['items_per_group'] = $this->limit;
	$data['tagname'] = '';
	$data['allsearch'] = '';
	if($this->input->post('search_mode')==='tagsearch')
	{
	    $tagname = trim($this->input->post('by_tag'));
	    $data['tagname'] = $tagname;
	    $data['total_rows'] = $this->model_products->count_all_pro($tagname,'');
	}
	else if($this->input->post('search_mode')==='allsearch')
	{
	    $prod_name = trim($this->input->post('all_search'));
	    $data['allsearch'] = $prod_name;
	    $data['total_rows'] = $this->model_products->count_all_pro('',$prod_name);
	}
	else
	{
	    $data['total_rows'] = $this->model_products->count_all_pro('','');
	}
	$this->load->view('header/header',$data);
        $this->load->view('products/product_listing');
        $this->load->view('footer/footer');
    }
    ////for load more scroll pagination ///
    public function autoload_process()
    {
	    //sanitize post value
	    $group_number = filter_var($_REQUEST['group_no'], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	    
	    //throw HTTP error if group number is not valid
	    if(!is_numeric($group_number)){
		    header('HTTP/1.1 500 Invalid number!');
		    exit();
	    }
	    $product_type_id = $_REQUEST['segment3'];
	    $product_cat_id = $_REQUEST['segment4'];
	    $tagname = $_REQUEST['tagname'];
	    $allsearch = $_REQUEST['allsearch'];
	    //get current starting point of records
	    $position = ($group_number * $this->limit);
	    //Limit our results within a specified range.
	    $results['records'] = $this->model_products->get_paged_list_products($position,$this->limit,$product_type_id,$product_cat_id,$tagname,$allsearch);
	    
	    if ($results['records']) {
		$this->load->view('ajax/load_moreresults',$results);
		
	    }
    }
    ///end scroll pagination ////
    //for loading the images
    function loadAjaximage()
    {
	$col_id =  $this->input->post('col_id');
	$pid    =  $this->input->post('pid');
	
	$get_all_sizes         = $this->model_products->getspecificimages( $col_id, $pid ); /*to get the matching sizes*/
	$data['get_all_sizes'] = $get_all_sizes;
	
	$this->load->view('ajax/load_colors',$data);
    }
    //for loading colors
    function loadAjaxcolors()
    {
	$sid    =  $this->input->post('sid');
	$pid    =  $this->input->post('pid');
	
	$get_all_colors         = $this->model_products->getColors_size_redo( $sid, $pid ); /*to get the matching colors*/
	$data['get_all_sizes']  = $get_all_colors;
	$data['pid']            = $pid;
	
	$this->load->view('ajax/loadAjaxcolors',$data);
    }
    //ajax function for inserting comments
    function insertComment()
    {
	$comment =  $this->input->post('comment');
	$rate    =  $this->input->post('rate_it');
	$pid     =  $this->input->post('pid');
	$uid     =  $this->input->post('uid');
	
	$insert_rating         = $this->model_products->insertComment( $comment,$rate,$uid, $pid ); /*to insert comments*/
	$total_comment	       = $this->model_products->countComment($pid);
	$review_products1      = $this->model_products->gereviewsProduct($pid, $total_comment); /*TO FETCH DATA*/
	$full_details_products = $this->model_products->getFulldetailsProduct( $pid );  /*TO product details*/
	$get_rating            = $this->model_products->countComment( $pid ); /*to insert comments*/
	$data['get_rating']    = $get_rating;
	$data['get_review']    = $review_products1;
	$data['full_details_products']    = $full_details_products;
	
	//echo $get_rating;
	$this->load->view('ajax/getRating',$data);
    }
    
    //Order placing functionality
    function placeOrder()
    {
	$quantiyy   = $this->input->post('qn'); 
	$unit_price = $this->input->post('unit_price');
	$prodict_id = $this->input->post('prodict_id');
	$size_id    = $this->input->post('size_id');
	$color_id   = $this->input->post('color_id');
	$uid        = $this->session->userdata('id');
	$available_quantity = $this->input->post('available_quantity');
	$stat       = $this->input->post('stat');
	
	$order      = $this->model_products->order( $unit_price,$prodict_id,$size_id, $color_id, $uid,$quantiyy, $available_quantity, $stat ); /*to insert order or update it*/
	echo $order;
    }
    
    //order confirmation section checking product available or not starts
    function chkPlaceorder()
    {
	$oid = $this->input->post('oid');   /*This is main order id*/
	//Now fetch order details
	//$order_details = $this->modelhome->get_myCartDetails(); /*check the order table*/
	$cart_products = $this->modelhome->get_CartProducts($oid);
	//echo "<pre>";
	//print_r( $cart_products );
	//echo "</pre>";
	$delete_item = '';
	$i = 0;
	foreach($cart_products as $pro)
	{
	    if( $i == 0 )
	    {
		$delete_item = $this->modelhome->delete_FromCart1($pro->id);
	    }
	    else
	    {
		$delete_item = $delete_item.'##'.$this->modelhome->delete_FromCart1($pro->id);
	    }
	    $i++;
	}
	echo $delete_item;
	//echo "<pre>";
	//print_r($delete_item);
	//echo "</pre>";
	//$delete_item = $this->modelhome->delete_FromCart($cart_id);
    }
    //order confirmation section checking product available or not starts end
    
    //show all reviews of a particular products//
    function show_all_reviews()
    {
	$num    =  $this->input->post('num');
	$pid     =  $this->input->post('pid');
	
	$review_products1      = $this->model_products->gereviewsProduct($pid, $num); /*TO FETCH DATA*/
	$full_details_products = $this->model_products->getFulldetailsProduct( $pid );  /*TO product details*/
	
	$data['get_review']    = $review_products1;
	$data['full_details_products']    = $full_details_products;
	
	//echo $get_rating;
	$this->load->view('ajax/show_all_review',$data);
    }
    
}

?>