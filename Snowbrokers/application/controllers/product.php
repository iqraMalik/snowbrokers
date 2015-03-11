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
		$this->load->model('model_products'); /*all data related to products created by anupam on 30 th aug 2014*/
		$this->load->model('site_settingsmodel');
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
	
	//=====================GET VISITORS COUNTRY===========================================
	
	    $user_ip = $this->getUserIP(); //Get visitors ip address
	    
	    $details = $this->geoCheckIP($user_ip);
        if($details['country']=='not found')
        {
            $country_id = "";
        }
	    else
        {
            $code = explode(' - ',$details['country']);
            $country_code = $code[0];

            $id = $this->model_products->get_country_id($country_code);
            $country_id = $id[0]['id'];
        }
	    //echo $country_id;
	//====================================================================================
	
	$related['country_id'] = $country_id;
	
        $this->load->view('header/header',$data);
        $this->load->view('products/product_details',$related);
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
	    $data['product_cat'] = $this->modelhome->get_ProductCategory($data['product_type'][0]->id);
	    //print_r($data['product_cat']);die();
	    //$data['product_category'] = $this->modelhome->get_ProductCategory();
	    $data['currency'] = $this->modelhome->get_Currencies();
	    $this->load->view('header/header',$data);
	    $this->load->view('products/basic-details-new');
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
    
//=================================ADDED TO DETECT VISITORS COUNTRY (PRITAM 26.12.14)===============================

    //========================Get visitors IP address=================
    function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = @$_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }
    
    
//    function ip_details($ip)
//    {
//	//$json = file_get_contents("http://ipinfo.io/{$ip}");
//	$json = file_get_contents("http://www.netip.de/search?query=".$ip);
//	//$details = json_decode($json);
//	print_r($json);
//	//return $details;
//	die();
//     }

    
    //Get an array with geoip-infodata
    function geoCheckIP($ip)
    {
	    //check, if the provided ip is valid
	    if(!filter_var($ip, FILTER_VALIDATE_IP))
	    {
		    throw new InvalidArgumentException("IP is not valid");
	    }
	   
	    //contact ip-server 110.33.122.75
	   // $response = @file_get_contents('http://www.geoplugin.net/json.gp?ip='.$ip);
	    $response = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
	    //$response=file_get_contents('http://www.google.com');
	    //echo"<pre>";
	    //if (empty($response))
	    //{
        //      throw new InvalidArgumentException("Error contacting Geo-IP-Server");
	    //}
	   
	    //Array containing all regex-patterns necessary to extract ip-geoinfo from page
	    //$patterns=array();
	    //$patterns["domain"] = '#Domain: (.*?)&nbsp;#i';
	    //$patterns["country"] = '#Country: (.*?)&nbsp;#i';
	    //$patterns["state"] = '#State/Region: (.*?)<br#i';
	    //$patterns["town"] = '#City: (.*?)<br#i';
	    
	    //print_r($response);die();
	    //print_r($patterns["country"]);
	    //Array where results will be stored
	  //  $ipInfo=array();
	   
	    //check response from ipserver for above patterns
	//    foreach ($patterns as $key => $pattern)
	//    {
	//	    //store the result in array
	//	    $ipInfo['country'] = preg_match($pattern,$response,$value) && !empty($value[1]) ? $value[1] : 'not found';
	//    }
	   if($response && $response->geoplugin_countryName != null)
	    {
		$return_data['country'] = $response->geoplugin_countryCode;
	    }
	    else{
		$return_data['country'] ='not found';
	    }
	    return $return_data;
    }
    
//=====================================================================END=========================================

    ////for load more scroll pagination ///
    public function autoload_process()
    {
	
	//=====================GET VISITORS COUNTRY===========================================
	
	    $user_ip = $this->getUserIP(); //Get visitors ip address
	    //echo $user_ip;
	    $details = $this->geoCheckIP($user_ip);
	    //print_r($details);
        if($details['country']=='not found')
        {
            $country_id = "";
        }
        else
        {
            $code = explode(' - ',$details['country']);
            $country_code = $code[0];
            //echo $country_code;
            $id = $this->model_products->get_country_id($country_code);
            //print_r($id);
            //echo "<pre>";
            //print_r($country_code);
            //echo "<br>";
            //echo "<pre>";
            //print_r($id);
            $country_id = $id[0]['id'];
            //echo $country_id;
        }
        //echo $country_id;
	//====================================================================================
	
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
	    
	    $results['country_id']=$country_id;
        $results['group_no_count']=$_REQUEST['group_no'];
	    //if ($results['records']) {
		$this->load->view('ajax/load_moreresults',$results);
		
	    //}
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