<?php
class modelhome extends CI_Model {
    
    function construct()
    {
        parent::_construct();
        
    }
    
    ////////////////////  This functions for Snowbrokers //////////////////
    //// This section for get Product types from database in Snowbrokers //////
    public function get_ProductTypes($product_id='')
    {
	if($product_id!='')
	{
	    $this->db->where('id',$product_id);
	}
	$this->db->order_by('title','asc');
	$this->db->where('status',1);
	$q = $this->db->get('product_type');
	
	if($q->num_rows()>0)
	{
	    $query = $q->result();
	    return $query;
	}
	else
	{
	    return 0;
	}
    }
    ///////////// End //////////////////////
    //// This section for get Product currencies from database in Snowbrokers //////
    public function get_Currencies()
    {
	$this->db->where('status',1);
	//$this->db->where('currrency_symbol <> ','');
	//$this->db->group_by('currrency_symbol');
	$this->db->order_by('country_name', 'ASC');
	$q = $this->db->get('country');
	
	if($q->num_rows()>0)
	{
	    $query = $q->result();
	    return $query;
	}
	else
	{
	    return 0;
	}
    }
    ///////////// End //////////////////////
    //// This section for get Product categories from database in Snowbrokers //////
    public function get_ProductCategory($product_id,$product_cat_id='')
    {
	if($product_cat_id!='')
	{
	    $this->db->where('id',$product_cat_id);
	}
	$this->db->order_by('name', 'ASC');
	$this->db->where('status',1);
	$this->db->where('main_id',$product_id);
	$q = $this->db->get('product_category');
	
	if($q->num_rows()>0)
	{
	    $query = $q->result();
	    return $query;
	}
	else
	{
	    return 0;
	}
    }
        public function get_ProductSize_val($product_id,$product_cat_id='')
    {
	if($product_cat_id!='')
	{
	    $this->db->where('id',$product_cat_id);
	}
	$this->db->where('status',1);
	$this->db->where('product_category',$product_id);
	$q = $this->db->get('product_size');
	
	if($q->num_rows()>0)
	{
	    $query = $q->result();
	    return $query;
	}
	else
	{
	    return 0;
	}
    }
        public function get_ProductColor_val($product_id,$product_cat_id='')
    {
	if($product_cat_id!='')
	{
	    $this->db->where('id',$product_cat_id);
	}
	$this->db->where('status',1);
	$this->db->where('product_category',$product_id);
	$q = $this->db->get('product_color');
	
	if($q->num_rows()>0)
	{
	    $query = $q->result();
	    return $query;
	}
	else
	{
	    return 0;
	}
    }
    ///////////// End //////////////////////
    public function get_needHelpPagecontent()
    {
	$data['subject'] = '';
	$data['content'] = '';
	$this->db->where('id',89);
	$article_needhelp = $this->db->get('article');
	if($article_needhelp->num_rows()>0)
	{
	    $needhelp_content = $article_needhelp->row();
	    $data['subject'] = $needhelp_content->article_title;
	    $data['content'] = $needhelp_content->a_desc;
	}
	return $data;
    }
    
    public function get_all_userdetails($id)
    {
	$this->db->where('id',$id);
	$value = $this->db->get('people');
	
	if($value->num_rows>0)
	{
	    $result = $value->row();
	    return $result;
	}
    }
    
    //// This section for insert basic product details in Snowbrokers //////
    public function insert_Product($admin_type='')
    {
	
    //===========================Get Input of Visibility(Country ids)==(Pritam 27.12.14)====================
	$countries = array();
	$values=$this->input->post('visibility');
	
	if ($values)
	{
	    foreach ($values as $value)
	    {
		array_push($countries,$value);
	    }
	}
	
	//echo "working..."; echo "<pre>"; print_r($shiftarraycalc); echo "</pre>"; die();
	//$visibility = implode(",",$countries);
	//echo "working..."; echo "<pre>"; print_r($visibility); echo "</pre>"; die();
	
	if (in_array("all", $countries)) {
	    
	    $visibility='';
	}
	else {
	    
	    $visibility = implode(",",$countries);
	}
	
    //===========================================END========================================================
    
	$basic_product = array(
			       'product_type_id' => $this->input->post('product_type'),
			       'product_code' => $this->input->post('prod_cod'),
			       'product_cat_id' => $this->input->post('category'),
			       'title' => trim($this->input->post('product_title')),
			       'product_tag' => trim($this->input->post('tag')),
			       'choose_currency' => $this->input->post('currency'),
			       'customer_type' => (($admin_type!='')?$admin_type:$this->session->userdata('id')),
			       'price' => trim($this->input->post('price')),
			       'seller_price' => trim($this->input->post('price')),
			       'product_details' => trim($this->input->post('details')),
			       'shipping_terms' => trim($this->input->post('shipping_details')),
			       'countries' => $visibility,
			       'status' => (($admin_type!='')?1:0)
			       );
	$inserted = $this->db->insert('product',$basic_product);
	$last_id = $this->db->insert_id();
	$size_add = $this->input->post('size_text');
	
	$color_add = $this->input->post('color_text');
	if(!empty($size_add))
	{
	    for($i=0;$i<count($size_add);$i++)
	    {
		$add_size = array(
				'product_type' => $this->input->post('product_type'),
			        'product_category' => $this->input->post('category'),
			        'size_type' => $size_add[$i],
				'status' => 1
				  );
		$inserted = $this->db->insert('product_size',$add_size);
	    }
	}
	if(!empty($color_add))
	{
	    for($j=0;$j<count($color_add);$j++)
	    {
		$add_color = array(
				'product_type' => $this->input->post('product_type'),
			        'product_category' => $this->input->post('category'),
			        'color_code' => '#'.$color_add[$j],
				'status' => 1
				  );
		$inserted = $this->db->insert('product_color',$add_color);
	    }
	}
	
	    $p_type_arr=$this->get_ProductTypes($this->input->post('product_type'));      //get name of the product type by its id
	    $p_name= $this->input->post('product_title');
	    $p_type= $p_type_arr[0]->title;
	    $p_code= $this->input->post('prod_cod');
	    $p_price= trim($this->input->post('price'));
	    $p_currency= $this->input->post('currency');
	    
	if($admin_type=='')
	{
	    $data['site_name'] = $this->registration_model->get_site_name();
            $site_name = $data['site_name'];
	       
	    $username = $this->modelhome->get_userdetails($this->session->userdata('id'));
	    
	    $this->db->where('id',11);
	    $article=$this->db->get('email_template_management');
	    if($article->num_rows>0)
	    {
		foreach($article->result() as $article_details)
		{
		    $article_heading=$article_details->subject;
		    $article_body=$article_details->details;
		}
	    }
	    //echo $article_body;
	    
	    $logo = base_url().'images/logo_new.jpg';
	    $body=str_replace(array('[LOGO]','[NAME]','[USERS]','[SITENAME]','[PRODUCTNAME]','[PRODUCTTYPE]','[PRODUCTCODE]','[PRODUCTPRICE]','[CURRENCY]'),array($logo,'ADMIN',$username,$site_name,$p_name,$p_type,$p_code,$p_price,$p_currency),$article_body);
	    //echo $this->email->print_debugger();
	    $admin_mail=$this->site_settingsmodel->admin_email();
	    $return_mail=$this->site_settingsmodel->send_mail($admin_mail,$article_heading,$body);
	    
	    
		$userdetail = $this->modelhome->get_all_userdetails($this->session->userdata('id'));
		$email=$userdetail->email;
		
		$this->db->where('id',17);
		$article_user=$this->db->get('email_template_management');
		if($article_user->num_rows>0)
		{
		    foreach($article_user->result() as $article_user_details)
		    {
			$article_heading_user=$article_user_details->subject;
			$article_body_user=$article_user_details->details;
		    }
		}
		
		$body_user=str_replace(array('[LOGO]','[USERS]','[SITENAME]','[PRODUCTNAME]','[PRODUCTTYPE]','[PRODUCTCODE]','[PRODUCTPRICE]','[CURRENCY]'),array($logo,$username,$site_name,$p_name,$p_type,$p_code,$p_price,$p_currency),$article_body_user);
		
		//$admin_mail=$this->site_settingsmodel->admin_email();
		$return_mail_user=$this->site_settingsmodel->send_mail($email,$article_heading_user,$body_user);
	    
	}
	if($last_id>0)
	{
	    return $last_id;
	}
	else
	{
	    return 0;
	}
    }
    ///////////// End //////////////////////
    public function get_userdetails($id)
    {
	$name = '';
	$this->db->where('id',$id);
	$value = $this->db->get('people');
	
	if($value->num_rows>0)
	{
	    $result = $value->row();
	    $name = $result->first_name." ".$result->last_name;
	    return $name;
	}
	else
	{
	    return $name;
	}
    }
    //// This section for get product details from product table in Snowbrokers //////
    public function get_detailsProduct($product_id)
    {
	$this->db->where('id',$product_id);
	//$this->db->where('customer_type',$this->session->userdata('id'));
	$q = $this->db->get('product');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	    return $result;
	}
	else
	{
	    return 0;
	}
    }
    public function get_ProductDetails($product_id)
    {
	$this->db->where('id',$product_id);
	$this->db->where('customer_type',$this->session->userdata('id'));
	$q = $this->db->get('product');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	    return $result;
	}
	else
	{
	    return 0;
	}
    }
    public function edit_basic_features($prod_id)
    {
        $countries = array();
        $values=$this->input->post('visibility');

        if ($values)
        {
            foreach ($values as $value)
            {
            array_push($countries,$value);
            }
        }

        if (in_array("all", $countries)) {

            $visibility='';
        }
        else {

            $visibility = implode(",",$countries);
        }
	$basic_product = array(
			       'product_type_id' => $this->input->post('product_type'),
			       'product_code' => $this->input->post('prod_cod'),
			       'product_cat_id' => $this->input->post('category'),
			       'title' => trim($this->input->post('product_title')),
			       'product_tag' => trim($this->input->post('tag')),
			       'product_code' => trim($this->input->post('prod_cod')),
			       'choose_currency' => $this->input->post('currency'),
			       'price' => trim($this->input->post('price')),
			       'seller_price' => trim($this->input->post('seller_price')),
			       'product_details' => trim($this->input->post('details')),
			       'shipping_terms' => trim($this->input->post('shipping_details')),
			       'countries' => $visibility
			       );
	$this->db->where('id',$prod_id);
	$inserted = $this->db->update('product',$basic_product);
	//$last_id = $this->db->insert_id();
	
	if($inserted)
	{
	    return 1;
	}
	else
	{
	    return 0;
	}
    }
    public function get_ProductDetails_admin($product_id)
    {
	$this->db->where('id',$product_id);
	//$this->db->where('customer_type',$this->session->userdata('id'));
	$q = $this->db->get('product');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	    return $result;
	}
	else
	{
	    return 0;
	}
    }
    ///////////// End //////////////////////
    //// This section for get product related sizes in Snowbrokers //////
    public function get_ProductSize($product_id='',$category_id='')
    {
	if($product_id!='')
	{
	    $this->db->where('product_type',$product_id);
	}
	if($category_id!='')
	{
	    $this->db->where('product_category',$category_id);
	}
	$this->db->where('status',1);
	$q = $this->db->get('product_size');
	if($q->num_rows()>0)
	{
	    $result = $q->result();
	    return $result;
	}
	else
	{
	    return 0;
	}
    }
    public function get_singleProductSize($size_id)
    {
	$result = 0;
	$this->db->where('id',$size_id);
	$q = $this->db->get('product_size');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	}
	return $result;
    }
    ///////////// End //////////////////////
    //// This section for get product related colors in Snowbrokers //////
    public function get_ProductColors($product_id='',$category_id='')
    {
	if($product_id!='')
	{
	    $this->db->where('product_type',$product_id);
	}
	if($category_id!='')
	{
	    $this->db->where('product_category',$category_id);
	}
	$this->db->where('status',1);
	$q = $this->db->get('product_color');
	if($q->num_rows()>0)
	{
	    $result = $q->result();
	    return $result;
	}
	else
	{
	    return 0;
	}
    }
    public function get_singleProductColor($color_id)
    {
	$result = 0;
	$this->db->where('id',$color_id);
	$q = $this->db->get('product_color');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	}
	return $result;
    }
    ///////////// End //////////////////////
    public function getColorName($color_id)
    {
        $this->db->where('id',$color_id);
        $q = $this->db->get('product_color');
        if($q->num_rows>0)
        {
            $result = $q->row();
            $color_code = $result->color_code;
        }
        else
        {
            $color_code = 0;
        }
        
        return $color_code;
    }
    public function getSizeName($color_id)
    {
        $this->db->where('id',$color_id);
        $q = $this->db->get('product_size');
        $result = $q->row();
        
        return $size_name = $result->size_type;
    }
    public function getImageName($prod_id,$color_id)
    {
        $this->db->where('color_id',$color_id);
        $this->db->where('product_id',$prod_id);
        $q = $this->db->get('product_related_image');
        $result = $q->row();
        if($q->num_rows()>0)
	{
	    $image_name = $result->image;
	}
	else{
	    $image_name = '';
	}
        
	return $image_name;
    }
    
    //////////
    public function insert_img($data)
    {
	
	    $random_num = $data['random_num'];
	    $product_id = $data['product_id'];
	    $product_type_id = $data['product_type'];
	    $product_category_id = $data['product_category'];
	    $this->load->library('image_lib');
	    if(!empty($_FILES))
	    {
		
		$config['upload_path'] = PHYSICAL_PATH.'admin/images/uploads/normal/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
		$config['max_size'] = 1024 * 8;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		
		$file_name=$_FILES["file"]["name"];
		$image_name='file';
		$file_element_name = $image_name;
		if (!$this->upload->do_upload($file_element_name))
		{
		    $status = 'error';
		    $msg = $this->upload->display_errors();
		    echo $msg;
		}
		else
		{
		    $data = $this->upload->data();
		    if($data)
		    {
			$big_thumbs = PHYSICAL_PATH.'admin/images/uploads/long_thumb/';
			$short_thumbs = PHYSICAL_PATH.'admin/images/uploads/short_thumb/';
			$extra_big_thumbs = PHYSICAL_PATH.'admin/images/uploads/big_thumb/';
			$actual_thumbs = PHYSICAL_PATH.'admin/images/uploads/actual_thumb/';
			$big_thumbnail = $this->make_thumbnail_images($big_thumbs,334,307,$data);
			$short_thumbnail = $this->make_thumbnail_images($short_thumbs,100,164,$data);
			$extra_big_thumbnail = $this->make_thumbnail_images($extra_big_thumbs,616,566,$data);
			$actual_thumbnail = $this->make_thumbnail_images($actual_thumbs,236,256,$data);
			$userpicture = $data['file_name'];
		    
		    //$new_image_data = array(
		    //'session_id' => $image_ses_id,
		    //'image' => $userpicture
		    //);
		    //$insert_image = $this->db->insert('manage_listing_image',$new_image_data);
		    //echo $insert_id = $this->db->insert_id();
			 $new_member_insert_data = array(
			    'product_id' => $product_id,
			    'img_session' => $random_num,
			    'image' => $userpicture
			);
		
			$insert_img = $this->db->insert('product_related_image', $new_member_insert_data);
			$last_id=$this->db->insert_id();
		    }
		}
       
	    }
       
	return $last_id;
    }
    public function make_thumbnail_images($path,$height,$width,$imgdata)
    {
	$config0 = array(
	'source_image' => $imgdata['full_path'],
	'new_image' => $path,
	'maintain_ratio' => true,
	'width' => $width,
	'height' => $height
	);
	$this->image_lib->initialize($config0);
	//$this->load->library('image_lib', $config0);
	//$this->image_lib->resize();
	if ( ! $this->image_lib->resize())
	{
	    echo $this->image_lib->display_errors();
	//return;
	}
	$this->image_lib->clear();
	$userpicture = $imgdata['file_name'];
	return $userpicture;
    }
	///// end image upload ///////
    //////  Insert advance data in product related details table ////
    public function insert_advancedetails()
    {
	    $total_size = 0;
	    $color_id = 0;
	    $data['random_un'] = $this->input->post('random_un');
	    $data['allproduct_sizes'] = $this->input->post('allproduct_sizes');
	    $data['allproduct_colors'] = $this->input->post('allproduct_colors');
	    $data['product_qty'] = $this->input->post('product_qty');
	    $data['product_id'] = $this->input->post('product_id');
	    $data['product_type'] = $this->input->post('product_type');
	    $data['product_category'] = $this->input->post('product_category');
	    
	    $all_size = array();
	    
	    if($data['allproduct_sizes']!='0')
	    {
		$all_size = explode("_",$data['allproduct_sizes']);
		//print_r($all_size);
		$total_size = count($all_size);
		//echo $total_size;
	    }
	    if($data['allproduct_colors']!='0')
	    {
		$color_id = $data['allproduct_colors'];
	    }
	    $product_id = $data['product_id'];
	    $total_quty = $data['product_qty'];
	    $product_type_id = $data['product_type'];
	    $product_category_id = $data['product_category'];
	    
	    if($total_size>1)
	    {
		for($i=1;$i<$total_size;$i++)
		{
		    $this->db->where('product_id',$product_id);
		    $this->db->where('color_id',$color_id);
		    $this->db->where('product_related_size_id',$all_size[$i]);
		    $q = $this->db->get('product_related_details');
		    if($q->num_rows()>0)
		    {
			$this->db->set('quantity', 'quantity+'.$total_quty, FALSE);
			$this->db->where('product_id',$product_id);
			$this->db->where('color_id',$color_id);
			$this->db->where('product_related_size_id',$all_size[$i]);
			$this->db->update('product_related_details');
		    }
		    else
		    {
			$array_insert = array(
					    'product_id' => $product_id,
					    'color_id' => $color_id,
					    'product_related_size_id' => $all_size[$i],
					    'quantity' => $total_quty
					    );
			$this->db->insert('product_related_details',$array_insert);
		    }
		    
		}
	    }
	    else
	    {
		$this->db->where('product_id',$product_id);
		$this->db->where('color_id',$color_id);
		$this->db->where('product_related_size_id',0);
		$q = $this->db->get('product_related_details');
		if($q->num_rows()>0)
		{
		    $this->db->set('quantity', 'quantity+'.$total_quty, FALSE);
		    $this->db->where('product_id',$product_id);
		    $this->db->where('color_id',$color_id);
		    $this->db->where('product_related_size_id',0);
		    $this->db->update('product_related_details');
		}
		else
		{
		    $array_insert = array(
					'product_id' => $product_id,
					'color_id' => $color_id,
					'product_related_size_id' => 0,
					'quantity' => $total_quty
					);
		    $this->db->insert('product_related_details',$array_insert);
		}
	    }
	    //exit;
	    $this->db->where('img_session',$data['random_un']);
	    $this->db->where('product_id',$product_id);
	    $this->db->update('product_related_image',array('img_session'=>0,'color_id'=>$color_id));
    }
    ///////   end ///////
    ////////// Get all product Images ///////
    public function get_allImages($product_id)
    {
	$result = 0;
	$this->db->where('product_id',$product_id);
	$this->db->where('color_id',0);
	$q = $this->db->get('product_related_image');
	if($q->num_rows()>0)
	{
	    $result = $q->result();
	}
	return $result;
    }
    ///////////  End   /////////////
    ///////////// Get all product size and colors ////////
    public function get_allproduct_PreviousDetails($product_id)
    {
	$result = 0;
	$this->db->where('product_id',$product_id);
	//$this->db->group_by('product_related_size_id');
	//$this->db->group_by('color_id');
	$q = $this->db->get('product_related_details');
	if($q->num_rows()>0)
	{
	    $result = $q->result();
	}
	return $result;
    }
    public function insert_quintity($product_id,$quintity)
    {
	$product_id = explode("_",$product_id);
	
	$this->db->where('product_id',$product_id[1]);
	$this->db->where('color_id',$product_id[2]);
	$this->db->where('product_related_size_id',$product_id[3]);
	$q = $this->db->get('product_related_details');
	if($q->num_rows()>0)
	{
	    $this->db->where('product_id',$product_id[1]);
	    $this->db->where('color_id',$product_id[2]);
	    $this->db->where('product_related_size_id',$product_id[3]);
	    $flag=$this->db->update('product_related_details', array('quantity'=>$quintity));
	    if($flag)
	    {
		return 1;
	    }
	
	}
	else
	    return 0;
    }
    
     public function Update_Size($ID,$Sizeval)
    {
	$product_id = explode("_",$ID);
	
	$this->db->where('product_type',$product_id[1]);
	$this->db->where('product_category',$product_id[2]);
	$this->db->where('id',$product_id[3]);
	$q = $this->db->get('product_size');
	if($q->num_rows()>0)
	{
	       $this->db->where('product_type',$product_id[1]);
	      $this->db->where('product_category',$product_id[2]);
	      $this->db->where('id',$product_id[3]);
	    $flag=$this->db->update('product_size', array('size_type'=>$Sizeval));
	    if($flag)
	    {
		return 1;
	    }
	
	}
	else
	    return 0;
    }
     public function Update_Color($ID,$Colorval)
    {
	$product_id = explode("_",$ID);
	
	$this->db->where('product_type',$product_id[1]);
	$this->db->where('product_category',$product_id[2]);
	$this->db->where('id',$product_id[3]);
	$q = $this->db->get('product_color');
	if($q->num_rows()>0)
	{
	       $this->db->where('product_type',$product_id[1]);
	      $this->db->where('product_category',$product_id[2]);
	      $this->db->where('id',$product_id[3]);
	    $flag=$this->db->update('product_color', array('color_code'=>'#'.$Colorval));
	    if($flag)
	    {
		return 1;
	    }
	
	}
	else
	    return 0;
    }
    
    public function getSizeStatus($product_id,$size_id)
    {
	$result = 0;
	$this->db->where('product_id',$product_id);
	$this->db->where('product_related_size_id',$size_id);
	$q = $this->db->get('product_related_details');
	if($q->num_rows()>0)
	{
	    $result = $q->result();
	}
	return $result;
    }
    public function getColorStatusImages($product_id,$color_id)
    {
	$result = 0;
	$this->db->where('product_id',$product_id);
	$this->db->where('color_id',$color_id);
	$q = $this->db->get('product_related_image');
	if($q->num_rows()>0)
	{
	    $result = $q->result();
	}
	return $result;
    }
    ////////////    End      //////////////
    ////////////  Delete dropzone Image ////////////
    public function delete_dropzone_img()
    {
	$image_id = $this->uri->segment(3);
	$this->db->where('id',$image_id);
	$result_rs = $this->db->get('product_related_image');
	if($result_rs->num_rows()>0)
	{
	    $result = $result_rs->row();
	    
	    @unlink(PHYSICAL_PATH.'admin/images/uploads/long_thumb/'.$result->image);
	    @unlink(PHYSICAL_PATH.'admin/images/uploads/short_thumb/'.$result->image);
	    @unlink(PHYSICAL_PATH.'admin/images/uploads/big_thumb/'.$result->image);
	    
	    $this->db->where('id',$image_id);
	    $this->db->delete('product_related_image');
	    // echo $image_id;
	}
    }
    public function delete_Image($image_id)
    {
	$this->db->where('id',$image_id);
	$result_rs = $this->db->get('product_related_image');
	if($result_rs->num_rows()>0)
	{
	    $result = $result_rs->row();
	    
	    @unlink(PHYSICAL_PATH.'admin/images/uploads/long_thumb/'.$result->image);
	    @unlink(PHYSICAL_PATH.'admin/images/uploads/short_thumb/'.$result->image);
	    @unlink(PHYSICAL_PATH.'admin/images/uploads/big_thumb/'.$result->image);
	    
	    $this->db->where('id',$image_id);
	    $q = $this->db->delete('product_related_image');
	    //echo $image_id;
	    return $q;
	}
    }
    ///////////  End  /////////////
    ////////////////////////  Get all cart imtems  ////////////////////////
    public function get_myCartDetails()
    {
	$result = 0;
	$this->db->where('userid',$this->session->userdata('id'));
        $this->db->where('status',0);
	$q = $this->db->get('order_main');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	}
	return $result;
    }
     public function get_myCartsDetails()
    {
	$result = 0;
	$this->db->where('userid',$this->session->userdata('id'));
      //  $this->db->where('status',0);
	$q = $this->db->get('order_main');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	}
	return $result;
    }
    public function get_CartProducts($order_id)
    {
	$result = 0;
	$this->db->where('order_id',$order_id);
	$q = $this->db->get('order_details');
	if($q->num_rows()>0)
	{
	    $result = $q->result();
	}
	return $result;
    }
    public function get_Product_Details($product_id,$size_id,$color_id)
    {
	$data['product_name'] = 0;
	$data['price'] = 0;
	$data['image_name'] = 0;
	$data['product_currency'] = 0;
	$this->db->where('id',$product_id);
	$q = $this->db->get('product');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	    $data['product_name'] = $result->title;
	    $data['product_currency'] = $result->choose_currency;
	    $data['price'] = $result->price;
	    $data['product_type_id']= $result->product_type_id;
	    $data['product_cat_id']= $result->product_cat_id;
	}
	$this->db->where('product_id',$product_id);
	$this->db->where('color_id',$color_id);
	$image = $this->db->get('product_related_image');
	if($image->num_rows()>0)
	{
	    $image_name = $image->row();
	    $data['image_name'] = $image_name->image;
	}
	return $data;
    }
    public function delete_FromCart($cart_id)
    {
	$this->db->where('id',$cart_id);
	$value = $this->db->get('order_details');
	if($value->num_rows()>0)
	{
	    $result = $value->row();
	    $quantity = $result->quantity;
	    $color_id = $result->color_id;
	    $size_id = $result->size_id;
	    $product_id = $result->product_id;
	    $this->db->where('id',$cart_id);
	    $q = $this->db->delete('order_details');
	    if($q==1)
	    {
		//$this->db->set('quantity','quantity+'.$quantity, FALSE);
		//$this->db->where('product_id',$product_id);
		//$this->db->where('product_related_size_id',$size_id);
		//$this->db->where('color_id',$color_id);
		//$update_table = $this->db->update('product_related_details');
		//echo $this->db->last_query();
	    }
	    return $q;
	}
	else
	{
	    return 0;
	}
    }
    
    public function delete_FromCart1($cart_id)
    {
	$this->db->where('id',$cart_id);
	$value = $this->db->get('order_details');
	if($value->num_rows()>0)
	{
	    $result = $value->row();
	    $quantity = $result->quantity;
	    $color_id = $result->color_id;
	    $size_id = $result->size_id;
	    $product_id = $result->product_id;

	    
		
		$this->db->where('product_id',$product_id);
		$this->db->where('product_related_size_id',$size_id);
		$this->db->where('color_id',$color_id);
		$pro_det = $this->db->get('product_related_details');
		
		$fet     =  $pro_det->row();
		$product_quantity = $fet->quantity;
		
		if( $quantity > $product_quantity ) /*product not available to order*/
		{
		    $val = 'na*^*'.$product_id.'*^*'.$cart_id;
		}
		else
		{
		    $val = 'available*^*0*^*0';
		}
		//$this->db->set('quantity','quantity+'.$quantity, FALSE);
		//$this->db->where('product_id',$product_id);
		//$this->db->where('product_related_size_id',$size_id);
		//$this->db->where('color_id',$color_id);
		//$update_table = $this->db->update('product_related_details');
		//echo $this->db->last_query();
	    return $val;
	}
	else
	{
	    return 0;
	}
    }
 
     public function update_pro($cart_id)  /*update function for product update after order confirmation*/
    {
	$this->db->where('id',$cart_id);
	$value = $this->db->get('order_details');
	if($value->num_rows()>0)
	{
	    
	    $result = $value->row();
	    $quantity = $result->quantity;
	    $color_id = $result->color_id;
	    $size_id = $result->size_id;
	    $product_id = $result->product_id;
	    $order_main_id = $result->order_id;
	     $date          = date("Y-m-d") ;

	    
	
		$this->db->where('product_id',$product_id);
		$this->db->where('product_related_size_id',$size_id);
		$this->db->where('color_id',$color_id);
		$pro_det = $this->db->get('product_related_details');
		
		$fet     =  $pro_det->row();
		$product_quantity = $fet->quantity;
		
		if( $product_quantity > $quantity )
		{
		   $update_qn = $product_quantity - $quantity; 
		}
		else
		{
		    $update_qn = 0;
		}
		
		$this->db->set('quantity', $update_qn, FALSE);
		$this->db->where('product_id',$product_id);
		$this->db->where('product_related_size_id',$size_id);
		$this->db->where('color_id',$color_id);
		$update_table = $this->db->update('product_related_details');
		//$this->db->set('order_date', $date);
		//$this->db->set('order_date', $date, FALSE);
		$this->db->set('status', 1, FALSE);
		$this->db->where('id',$order_main_id);
		$update_main_table = $this->db->update('order_main');
		//echo $this->db->last_query();
	}
	else
	{
	    return 0;
	}
    }
    
    public function get_allShippingAddress()
    {
	$this->db->where('user_id',$this->session->userdata('id'));
	$q = $this->db->get('shipping_address');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	    
	    $data['f_name'] = $result->f_name;
	    $data['l_name'] = $result->l_name;
	    $data['company_name'] = $result->company_name;
	    $data['mobile'] = $result->mobile;
	    $data['alternate_mobile'] = $result->alternate_mobile;
	    $data['address'] = $result->address;
	    $data['country'] = $result->country;
	    $data['state'] = $result->state;
	    $data['city'] = $result->city;
	}
	else
	{
	    $this->db->where('id',$this->session->userdata('id'));
	    $query = $this->db->get('people');
	    $query_result = $query->row();
	    $country_name="";
	    if($query_result->country!='')
	    {
		 $this->db->where('id',$query_result->country);
		 $country = $this->db->get('country');
		 $country_result = $country->row();
	         $country_name= $country_result->country_name;
	    }
	   
	   
	    $data['f_name'] = $query_result->first_name;
	    $data['l_name'] = $query_result->last_name;
	    $data['company_name'] = $query_result->company;
	    $data['mobile'] = $query_result->phone_number;
	    $data['alternate_mobile'] = $query_result->phone_number;
	    $data['address'] = $query_result->address;
	    $data['country'] = $country_name;
	    $data['state'] = '';
	    $data['city'] = '';
	}
	return $data;
    }
    public function insert_ShippingAddress()
    {
	$this->db->where('user_id',$this->session->userdata('id'));
	$q = $this->db->get('shipping_address');
	if($q->num_rows()>0)
	{
	    $update_array = array(
				    'f_name'=>trim($this->input->post('f_name')),
				    'l_name'=>trim($this->input->post('l_name')),
				    'company_name'=>trim($this->input->post('company_name')),
				    'mobile'=>trim($this->input->post('mobile')),
				    'alternate_mobile'=>trim($this->input->post('alternate_mobile')),
				    'address'=>trim($this->input->post('address')),
				    'country'=>trim($this->input->post('country')),
				    'state'=>trim($this->input->post('state')),
				    'city'=>trim($this->input->post('city'))
				);
	    $this->db->where('user_id',$this->session->userdata('id'));
	    $up = $this->db->update('shipping_address',$update_array);
	    
		//updating product table
		$oid = $this->input->post('oid');   /*This is main order id*/
		//Now fetch order details
		//$order_details = $this->modelhome->get_myCartDetails(); /*check the order table*/
		$cart_products = $this->modelhome->get_CartProducts($oid);
		foreach($cart_products as $pro)
		{
			$delete_item = $this->modelhome->update_pro($pro->id);
		}
	}
	else
	{
	    $insert_array = array(
				    'f_name'=>trim($this->input->post('f_name')),
				    'l_name'=>trim($this->input->post('l_name')),
				    'company_name'=>trim($this->input->post('company_name')),
				    'mobile'=>trim($this->input->post('mobile')),
				    'alternate_mobile'=>trim($this->input->post('alternate_mobile')),
				    'address'=>trim($this->input->post('address')),
				    'country'=>trim($this->input->post('country')),
				    'state'=>trim($this->input->post('state')),
				    'city'=>trim($this->input->post('city')),
				    'user_id'=>$this->session->userdata('id')
				);
	    $inserted = $this->db->insert('shipping_address',$insert_array);
	    
		//updating product table
		$oid = $this->input->post('oid');   /*This is main order id*/
		//Now fetch order details
		//$order_details = $this->modelhome->get_myCartDetails(); /*check the order table*/
		$cart_products = $this->get_CartProducts($oid);
		foreach($cart_products as $pro)
		{
		    $delete_item = $this->update_pro($pro->id);
		}
	}
	return 1;
    }
    
    public function confirm_Order()
    {
	$this->db->where('userid',$this->session->userdata('id'));
	$this->db->where('status',0);
	$q = $this->db->get('order_main');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	    $this->db->where('id',$result->id);
	    $up = $this->db->update('order_main',array('status'=>1));
	    if($up)
	    {
		return 1;
	    }
	    else
	    {
		return 0;
	    }
	}
	else
	{
	    return 2;
	}
    }
    public function product_order_details()
    {
	$this->db->where('id',$this->session->userdata('row_id'));
	$q = $this->db->get('order_details');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	    
	    $data['product_id'] = $result->product_id;
	    $data['size_id'] = $result->size_id;
	    $data['color_id'] = $result->color_id;
	    $data['quantity'] = $result->quantity;
	    $data['sub_total'] = $result->total_amount;
	    return $data;
	}
	else
	{
	    return 0;
	}
    }
    public function get_CurrencyDetails($product_currency)
    {
	$result= 0;
	$this->db->where('currency_code',$product_currency);
	$q = $this->db->get('all_currency');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	}
	return $result;
    }
    public function get_Product_Cartdetails($trans_id)
    {
	$result = 0;
	$this->db->where('userid',$this->session->userdata('id'));
	$this->db->where('order_transaction_id',$trans_id);
	$this->db->where('status',0);
	$q = $this->db->get('order_main');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	}
	return $result;
    }
    ////////////////// End   ///////////////////////
    public function get_slider()
    {
	$data = "";
	$this->db->where('status',1);
        $q = $this->db->get('slider');
        //echo $this->db->last_query();die;
        if($q->num_rows() > 0)
	{
	    foreach ($q->result() as $row)
	    {
		$data[] = $row;
				
	    }
			
			
	return $data;
	}
    }
    public function get_clientsay()
    {
	$data = "";
	$this->db->where('status',1);
        $q = $this->db->get('client_say');
        //echo $this->db->last_query();die;
        if($q->num_rows() > 0)
	{
	    foreach ($q->result() as $row)
	    {
		$data[] = $row;
				
	    }
			
			
	return $data;
	}
    }
     public function get_imagebox()
    {
	$this->db->where('id',74);
	$this->db->where('status',1);
        $q = $this->db->get('article');
	if($q->num_rows() > 0)
	{
	    $fields = $q->row();
	    $reason = $fields->a_desc;
	    return $reason;
	}
    }
    public function footerupper()
    {
	$this->db->where('id',77);
	$this->db->where('status',1);
        $q = $this->db->get('article');
	if($q->num_rows() > 0)
	{
	    $fields = $q->row();
	    $reason = $fields->a_desc;
	    return $reason;
	}
    }
     public function get_home()
    {
	$this->db->where('id',75);
	$this->db->where('status',1);
        $q = $this->db->get('article');
	if($q->num_rows() > 0)
	{
	    $fields = $q->row();
	    
	    return $fields;
	}
    }
  public function contactphnumber()
    {
	$off_reason = $this->db->get_where('site_settings',array('field_name'=>'phone_number'));
	if($off_reason->num_rows() > 0)
	{
	    $fields = $off_reason->row();
	    $phnumber = $fields->field_value;
	    return $phnumber;
	}
    }
    public function contactemail()
    {
	$off_reason = $this->db->get_where('site_settings',array('field_name'=>'site_email'));
	if($off_reason->num_rows() > 0)
	{
	    $fields = $off_reason->row();
	    $siteemail = $fields->field_value;
	    return $siteemail;
	}
    }
     public function off_reason($offline_reason)
    {
	$off_reason = $this->db->get_where('site_settings',array('field_name'=>$offline_reason));
	if($off_reason->num_rows() > 0)
	{
	    $fields = $off_reason->row();
	    $reason = $fields->field_value;
	    return $reason;
	}
    }
  function thumbnail($fileThumb, $file, $Twidth, $Theight, $tag)
    {
        list($width, $height, $type, $attr) = getimagesize($file);
        
        
        switch($type)
        {
        case 1:
        $img = ImageCreateFromGIF($file);
        break;
        
        case 2:
        $img = ImageCreateFromJPEG($file);
        break;
        
        case 3:
        $img = ImageCreateFromPNG($file);
        break;
        }
        
        if($tag == "width") //width contraint
        {  
        $thumb_w = $Twidth;
        $Theight = round(($height/$width)*$Twidth);
        $thumb_h = $Theight;
        }
        elseif($tag == "height") //height constraint
        {
        $Twidth = round(($width/$height)*$Theight);
        }
        elseif($tag=="both")
        {
        $Twidth = $Twidth;
        $Theight = $Theight;
        }
        else
        {
         $old_x=imageSX($img);
                    $old_y=imageSY($img);
                   
                   
                    if(($old_x>$Twidth)||($old_y>$Theight))
                    {
                        $ratio1=$old_x/$Twidth;
                        $ratio2=$old_y/$Theight;
                        if($ratio1>$ratio2)
                        {
                            $thumb_w=$Twidth;
                            $thumb_h=$old_y/$ratio1;
                        }
                        else
                        {
                            $thumb_h=$Theight;
                            $thumb_w=$old_x/$ratio2;
                        }
                    }
                    else
                    {
                        $thumb_h=$old_y;
                        $thumb_w=$old_x;
                    }
        }
        
        $thumb = imagecreatetruecolor($thumb_w, $thumb_h);
        
        $white = imagecolorallocate($thumb, 238, 238, 238);
        
        // Draw a white rectangle
        imagefilledrectangle($thumb, 0, 0, $thumb_w, $thumb_h, $white);
        
        if(imagecopyresampled($thumb, $img, 0, 0, 0, 0, $thumb_w, $thumb_h, $width, $height))
        {
        switch($type)
        {
        case 1:
        ImageGIF($thumb,$fileThumb);
        break;
        
        case 2:
        ImageJPEG($thumb,$fileThumb);
        break;
        
        case 3:
        ImagePNG($thumb,$fileThumb);
        break;
        }
        
        return true;
        }
    }  
    public function site_setting_details()
    {
        $total_details=$this->db->get('site_settings');
        if($total_details->num_rows>0)
        {
            foreach($total_details->result() as $data)
            {
                $data_settings[]=$data;
                
            }
            return $data_settings;
        }
    }
   /* public function create_members_full()
    {
       
      
       $tot_life_style = $this->input->post('life_style');
       if(count($tot_life_style)>1)
       {
           $life_style = implode(',',$this->input->post('life_style'));
       }
       else
       {
         $life_style = $_REQUEST['life_style'][0];
        
       }
      
       $dob = $this->input->post('date_year').'-'.$this->input->post('date_month').'-'.$this->input->post('date_date');
      
           
            $update_member=array(
                     'sports1' => $this->input->post('sports1'),
                     'sports1_other' => $this->input->post('sports1_other'),
                     'sports2' => $this->input->post('sports2'),
                     'sports2_other' => $this->input->post('sports2_other'),
                     'sports3' => $this->input->post('sports3'),
                     'sports3_other' => $this->input->post('sports3_other'),
                     'unit_system' => $this->input->post('ex1_t'),
                     'tall' => $this->input->post('how_tall'),
                     'weigh' => $this->input->post('how_weigh'),
                     'fat' => $this->input->post('body_fat'),
                     'goal1' => $this->input->post('goal1'),
                     'goal1_other' => $this->input->post('goal1_other'),
                     'goal2' => $this->input->post('goal2'),
                     'goal2_other' => $this->input->post('goal2_other'),
                     'goal3' => $this->input->post('goal3'),
                     'goal3_other' => $this->input->post('goal3_other'),
                     'bodytype' => $this->input->post('body_type'),
                     'date_of_birth' => $dob,
                     'mark' => $this->input->post('private'),
                     'lifestyle' => $life_style,
                     'login_first'=>1,
                     );
                 $this->db->where('id',$this->input->post('user_ids'));
                 $insert=$this->db->update('people',$update_member);
      
           
           //echo $this->db->last_query();
         
                if($insert)
                {
                   
                     $return = 1;
                    
                }
                else
                {
                   $return = 0;
                   
                }
                return $return;
       
        return $return;          
                
   
     
    }*/
    
     public function update_members_full()
    {
        $dob = $this->input->post('date_year_edit').'-'.$this->input->post('date_month_edit').'-'.$this->input->post('date_date_edit');
          
    
        
        $tot_life_style = $this->input->post('life_style_edit');
      
       
      
         if(count($tot_life_style)>1)
         {
             $life_style = implode(',',$this->input->post('life_style_edit'));
         }
         else
         {
           $life_style = $_REQUEST['life_style_edit'][0];
          
         }
   
           
            $update_member=array(
                     'sports1' => $this->input->post('sports1_edit'),
                     'sports1_other' => $this->input->post('sports1_edit_other'),
                     'sports2' => $this->input->post('sports2_edit'),
                     'sports2_other' => $this->input->post('sports2_edit_other'),
                     'sports3' => $this->input->post('sports3_edit'),
                     'sports3_other' => $this->input->post('sports3_edit_other'),
                     'country_id' => $this->input->post('country_profile_edit'),
                     'state_id' => $this->input->post('state_profile_edit'),
                     'location' => $this->input->post('location_edit'),
		      'unit_system' => $this->input->post('ex1_t_edit'),
                     'tall' => $this->input->post('how_tall_edit'),
                     'weigh' => $this->input->post('how_weigh_edit'),
                     'fat' => $this->input->post('body_fat_edit'),
                     'goal1' => $this->input->post('goal1_edit'),
                     'goal1_other' => $this->input->post('goal1_other_edit'),
                     'goal2' => $this->input->post('goal2_edit'),
                     'goal2_other' => $this->input->post('goal2_other_edit'),
                     'goal3' => $this->input->post('goal3_edit'),
                     'goal3_other' => $this->input->post('goal3_other_edit'),
                     'bodytype' => $this->input->post('body_type_edit'),
                     'date_of_birth' => $dob,
                     'mark' => $this->input->post('private_edit'),
                     'lifestyle' => $life_style,
                    
                     );
                 $this->db->where('id',$this->input->post('update_user_id'));
                 $insert=$this->db->update('people',$update_member);
      
           
        //echo $this->db->last_query();
       
         
                if($insert)
                {
                   
                     $return = 1;
                    
                }
                else
                {
                   $return = 0;
                   
                }
                return $return;
       
        return $return;  
        
    }
    
    public function create_albumn()
    {
        $new_user_array=array(
                'user_id' => $this->session->userdata('user_id'),
                'albumn_name' => $this->input->post('albumn_name'),
                'created_date' => DATE('Y-m-d H:i:s'),              
                );
        $inserted=$this->db->insert('albumn_tb',$new_user_array);
        $last_id=$this->db->insert_id();
        return $last_id;
    }
    
    public function upload_albumn_more()
    {
	$remove_button = "<img src='".base_url()."images/1405090829_cross.png' alt='remove'>";

        
        
        $this->db->where('posted',0);
        $img2 = $this->db->get('albumn_photos');
	
	//echo " <div style='width:850px'><div id='main_".$last_id."'>";
	$n=0;
        if($img2->num_rows() > 0)
        {
           foreach ($img2->result() as $row)
           {
                   @$b .= "<div id='".$row->id."' style='float:left;padding-left:20px'><img src='". base_url()."image_crop_thumb.php?img_path=".PHYSICAL_PATH."images/albumn_photos/thumb_small/".$row->photos."' class='imgList'><br /><a href='#' onclick=del_image('".$row->photos."','".$row->id."')>".$remove_button."</a></div>";

                   $n++;
           }
        }
        echo @$b;
        
                
       
        //if($last_id !=0)
        //{
                
                $main_dir = PHYSICAL_PATH.'images/albumn_photos';
                $thumb_large = PHYSICAL_PATH.'images/albumn_photos/thumb_large';
                $thumb_small= PHYSICAL_PATH.'images/albumn_photos/thumb_small';
                $thumb_medium = PHYSICAL_PATH.'images/albumn_photos/thumb_medium';
            if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
		    
		   
			
			
			   
				$m=0;
				foreach ($_FILES['photos_albumn1']['name'] as $name => $value)
				 {
				   
                                   
                                   $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg","JPG","PNG","GIF","JPEG");
	
                                    $photoname = $_FILES['photos_albumn1']['name'][$name];
			
				    list($txt, $ext) = explode(".", $photoname);
                                       
                               if(in_array($ext,$valid_formats))
                                    {
                                   
                                   
				     
					$filename = stripslashes($_FILES['photos_albumn1']['name'][$name]);
                                        $filename = str_replace(' ','',$filename);
					$image_name=time().$filename;
					
					$size=filesize($_FILES['photos_albumn1']['tmp_name'][$name]);
                                        
                                        $DIR_IMG_NORMAL = $main_dir;
                                        $DIR_IMG_LARGE = $thumb_large;
                                        $DIR_IMG_SMALL = $thumb_small;
                                        $DIR_IMG_MEDIUM = $thumb_medium;
                                    
                                        
                                        
                                        
                                        $dest_main=$DIR_IMG_NORMAL.'/'.$image_name;
                                        
                                        
                                        $dest_large = $DIR_IMG_LARGE.'/'.$image_name;
                                        $size_width_3=700;
                                        $size_height_3=600;            
                                        $tag="";
                                        
                                        $dest_samll = $DIR_IMG_SMALL.'/'.$image_name;
                                        $size_width_1=85;
                                        $size_height_1=80;            
                                        $tag="";
                                        
                                        $dest_medium = $DIR_IMG_MEDIUM.'/'.$image_name;
                                         $size_width_2=300;
                                        $size_height_2=200;            
                                        $tag="";  
					
					
						//File size check
						if ($size < (20000*1024))
						{	
						
							$newname=$dest_main;
							//Moving file to uploads folder
							if (move_uploaded_file($_FILES['photos_albumn1']['tmp_name'][$name], $newname))
							{
							    $m++;
							    $this->thumbnail($dest_large, $newname, $size_width_3, $size_height_3, $tag);
                  
                             
                                                            $this->thumbnail($dest_samll, $newname, $size_width_1, $size_height_1, $tag);
                                                            
                                                            $this->thumbnail($dest_medium, $newname, $size_width_2, $size_height_2, $tag);
							    
							    
							    /*$data = array(
							    'image' => $image_name ,
							    'session_id' =>  $ses_id 
							    
							     );
							     
							     $this->db->insert('manage_listing_image', $data);
							    $last_id=$this->db->insert_id();*/
                                                            
                                                             $new_user_array1=array(
                                                            'user_id' => $this->session->userdata('user_id'),                                                           
                                                            'photos' => $image_name,
							    'photo_flag' => $this->input->post('phto_flag'),
                                                            'created_date' => DATE('Y-m-d H:i:s'),              
                                                            );
                                                          $inserted=$this->db->insert('albumn_photos',$new_user_array1);
                                                          $last_id1=$this->db->insert_id();
							    echo @$a ="<div id='".$last_id1."' style='float:left;padding-left:20px'><img src='". base_url()."image_crop_thumb.php?img_path=".PHYSICAL_PATH."images/albumn_photos/thumb_small/".$image_name."' ><br /><a href='#' onclick=del_image('".$image_name."','".$last_id1."')>".$remove_button."</a></div>";
							    echo "<input type='hidden' name='phto_flag' id='phto_flag' value='".$this->input->post('phto_flag')."'>";

							   
							}
							else
							{
							    echo '<span width=50% height=40% class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
							}
						}		    
						else
						{
						    echo '<span  width=50% height=40% class="imgList">You have exceeded the size limit!</span>';
						}
			
					
                                    }
                                    else{
                                        	echo '<span  width=50% height=40% class="imgList" style="color:red">Unknown extension. Only png,gif,jpg,jpeg is allowed!</span>';

                                    }
				   
				    
				} //foreach end

			$a=$m+$n;
		   	echo "<input type='hidden' name='total_photos' id='total_photos' value='".$a."'>";
			echo "<input type='file' id='photos_albumn_albumns' onchange='instant_change_ajax();' name='photos_albumn1[]' multiple='true'>";

		    
		}
    }
    public function upload_albumn()
    {
         $remove_button = "<img src='".base_url()."images/1405090829_cross.png' alt='remove'>";

        
        
        $this->db->where('posted',0);
        $img2 = $this->db->get('albumn_photos');
	
	//echo " <div style='width:850px'><div id='main_".$last_id."'>";
        if($img2->num_rows() > 0)
        {
           foreach ($img2->result() as $row)
           {
                   @$b .= "<div id='".$row->id."' style='float:left;padding-left:20px'><img src='". base_url()."image_crop_thumb.php?img_path=".PHYSICAL_PATH."images/albumn_photos/thumb_small/".$row->photos."' class='imgList'><br /><a href='#' onclick=del_image('".$row->photos."','".$row->id."')>".$remove_button."</a></div>";

                   
           }
        }
        echo @$b;
        
                
       
        //if($last_id !=0)
        //{
                
                $main_dir = PHYSICAL_PATH.'images/albumn_photos';
                $thumb_large = PHYSICAL_PATH.'images/albumn_photos/thumb_large';
                $thumb_small= PHYSICAL_PATH.'images/albumn_photos/thumb_small';
                $thumb_medium = PHYSICAL_PATH.'images/albumn_photos/thumb_medium';
            if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
		    
		   
			
			
			   
				$m=0;
				foreach ($_FILES['photos_albumn']['name'] as $name => $value)
				 {
				   
                                   
                                   $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg","JPG","PNG","GIF","JPEG");
	
                                    $photoname = $_FILES['photos_albumn']['name'][$name];
			
				    list($txt, $ext) = explode(".", $photoname);
                                       
/*echo '===ext===='.$ext;
echo "<pre>";
print_r($valid_formats);
if(in_array($ext,$valid_formats))
{
    echo "valid";
}
else{
    echo "not valid";
}*/
                                    if(in_array($ext,$valid_formats))
                                    {
                                   
                                   
				     
					$filename = stripslashes($_FILES['photos_albumn']['name'][$name]);
                                        $filename = str_replace(' ','',$filename);
					$image_name=time().$filename;
					
					$size=filesize($_FILES['photos_albumn']['tmp_name'][$name]);
                                        
                                        $DIR_IMG_NORMAL = $main_dir;
                                        $DIR_IMG_LARGE = $thumb_large;
                                        $DIR_IMG_SMALL = $thumb_small;
                                        $DIR_IMG_MEDIUM = $thumb_medium;
                                    
                                        
                                        
                                        
                                        $dest_main=$DIR_IMG_NORMAL.'/'.$image_name;
                                        
                                        
                                        $dest_large = $DIR_IMG_LARGE.'/'.$image_name;
                                        $size_width_3=700;
                                        $size_height_3=600;            
                                        $tag="";
                                        
                                        $dest_samll = $DIR_IMG_SMALL.'/'.$image_name;
                                        $size_width_1=85;
                                        $size_height_1=80;            
                                        $tag="";
                                        
                                        $dest_medium = $DIR_IMG_MEDIUM.'/'.$image_name;
                                         $size_width_2=300;
                                        $size_height_2=200;            
                                        $tag="";  
					
					
						//File size check
						if ($size < (20000*1024))
						{	
						
							$newname=$dest_main;
							//Moving file to uploads folder
							if (move_uploaded_file($_FILES['photos_albumn']['tmp_name'][$name], $newname))
							{
							    $m++;
							    $this->thumbnail($dest_large, $newname, $size_width_3, $size_height_3, $tag);
                  
                             
                                                            $this->thumbnail($dest_samll, $newname, $size_width_1, $size_height_1, $tag);
                                                            
                                                            $this->thumbnail($dest_medium, $newname, $size_width_2, $size_height_2, $tag);
							    
							    
							    /*$data = array(
							    'image' => $image_name ,
							    'session_id' =>  $ses_id 
							    
							     );
							     
							     $this->db->insert('manage_listing_image', $data);
							    $last_id=$this->db->insert_id();*/
                                                             $this->db->where('posted',1);
							      $this->db->order_by('id','desc');
							    $query = $this->db->get('albumn_photos',1,0);
							    if($query->num_rows>0)
							    {
								 $row = $query->row();

								$photo_flag = $row->photo_flag;
								$photo_flag_new = $photo_flag+1;
								 $new_user_array1=array(
								    'user_id' => $this->session->userdata('user_id'),                                                           
								    'photos' => $image_name,
								    'created_date' => DATE('Y-m-d H:i:s'),
								    'photo_flag'=>$photo_flag_new,
								    );
								 $inserted=$this->db->insert('albumn_photos',$new_user_array1);
								 $last_id1=$this->db->insert_id();
								 echo @$a ="<div id='".$last_id1."' style='float:left;padding-left:20px'><img src='". base_url()."image_crop_thumb.php?img_path=".PHYSICAL_PATH."images/albumn_photos/thumb_small/".$image_name."' ><br /><a href='#' onclick=del_image('".$image_name."','".$last_id1."')>".$remove_button."</a></div>";
								echo "<input type='hidden' name='phto_flag' id='phto_flag' value='".$photo_flag_new."'>";

							    }
							    else{
								 $new_user_array1=array(
								    'user_id' => $this->session->userdata('user_id'),                                                           
								    'photos' => $image_name,
								    'created_date' => DATE('Y-m-d H:i:s'),
								    'photo_flag'=>1,
								    );
								  $inserted=$this->db->insert('albumn_photos',$new_user_array1);
								  $last_id1=$this->db->insert_id();
								  echo @$a ="<div id='".$last_id1."' style='float:left;padding-left:20px'><img src='". base_url()."image_crop_thumb.php?img_path=".PHYSICAL_PATH."images/albumn_photos/thumb_small/".$image_name."' ><br /><a href='#' onclick=del_image('".$image_name."','".$last_id1."')>".$remove_button."</a></div>";
								echo "<input type='hidden' name='phto_flag' id='phto_flag' value='1'>";

							    }
							    
                                                            
                                                          

							   
							}
							else
							{
							    echo '<span width=50% height=40% class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
							}
						}		    
						else
						{
						    echo '<span  width=50% height=40% class="imgList">You have exceeded the size limit!</span>';
						}
			
					
                                    }
                                    else{
                                        	echo '<span  width=50% height=40% class="imgList" style="color:red">Unknown extension!Only png,gif,jpg,jpeg is allowed!</span>';

                                    }
				   
				    
				} //foreach end

		    
		   	echo "<input type='hidden' name='total_photos' id='total_photos' value='".$m."'>";
			echo "<input type='file' id='photos_albumn_albumns' onchange='instant_change_ajax();' name='photos_albumn1[]' multiple='true'>";

		    
		}
        //}
        /* $new_user_array=array(
                'user_id' => $this->session->userdata('user_id'),
                'albumn_name' => $this->input->post('albumn_name'),
                'created_date' => DATE('Y-m-d H:i:s'),              
                );
        $inserted=$this->db->insert('albumn_tb',$new_user_array);
        if($inserted)
        {
                $last_id=$this->db->insert_id();
                    $main_dir = PHYSICAL_PATH.'/images/albumn_photos';
                    $thumb_large = PHYSICAL_PATH.'/images/albumn_photos/thumb_large';
                    $thumb_small= PHYSICAL_PATH.'/images/albumn_photos/thumb_small';
                    $thumb_medium = PHYSICAL_PATH.'/images/albumn_photos/thumb_medium';
                  if(!empty($_FILES["file1"]["name"]))
                  {
                      list($width, $height,$type) = getimagesize($_FILES["file1"]["tmp_name"]);
                  
                      $size = filesize($_FILES["file1"]["tmp_name"]);
                      
                      
                      $DIR_IMG_NORMAL = $main_dir;
                      $DIR_IMG_LARGE = $thumb_large;
                      $DIR_IMG_SMALL = $thumb_small;
                      $DIR_IMG_MEDIUM = $thumb_medium;
                  
                      $filename=$_FILES['file1']['name'];
                      $img_info=pathinfo($_FILES["file1"]['name']);
                      
                      $image_name=$last_id.'_'.time().'.'.$img_info['extension'];
                      
                      $src=$_FILES['file1']['tmp_name'];
                      $dest_main=$DIR_IMG_NORMAL.'/'.$image_name;
                      
                      
                      $dest_large = $DIR_IMG_LARGE.'/'.$image_name;
                      $size_width_3=700;
                      $size_height_3=600;            
                      $tag="";
                      
                      $dest_samll = $DIR_IMG_SMALL.'/'.$image_name;
                      $size_width_1=85;
                      $size_height_1=80;            
                      $tag="";
                      
                      $dest_medium = $DIR_IMG_MEDIUM.'/'.$image_name;
                       $size_width_2=556;
                      $size_height_2=417;            
                      $tag="";  
                      
                      if(move_uploaded_file($src,$dest_main))
                      {

                        
                             $this->thumbnail($dest_large, $dest_main, $size_width_3, $size_height_3, $tag);
                  
                             
                             $this->thumbnail($dest_samll, $dest_main, $size_width_1, $size_height_1, $tag);
                             
                             $this->thumbnail($dest_medium, $dest_main, $size_width_2, $size_height_2, $tag);
                             
                      }
                  
                      $new_user_array1=array(
                        'user_id' => $this->session->userdata('user_id'),
                        'albumn_id' => $last_id,
                        'photos' => $image_name,
                        'created_date' => DATE('Y-m-d H:i:s'),              
                        );
                      $inserted=$this->db->insert('albumn_photos',$new_user_array1);
                  
                  }
                  
                  
                  
                  
        }*/
        //$this->db->where('albumn_id',$last_id);
        
        //$query1=$this->db->get('albumn_photos');
        //$tot_photos = $query1->num_rows();
        //echo "</div></div><input type='hidden' name='total_photos' id='total_photos' value='".$tot_photos."'>";
	
    }
    
    public function upload_albumn_ie()
    {
      
        $last_id = $this->input->post('albumn_ids');       
       
        if($last_id !=0)
        {
                
                $main_dir = PHYSICAL_PATH.'images/albumn_photos';
                $thumb_large = PHYSICAL_PATH.'images/albumn_photos/thumb_large';
                $thumb_small= PHYSICAL_PATH.'images/albumn_photos/thumb_small';
                $thumb_medium = PHYSICAL_PATH.'images/albumn_photos/thumb_medium';
                if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
                    $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg","JPG","PNG","GIF","JPEG");
	
                    $photoname = $_FILES['photos_albumn_ie']['name'];
        
                    list($txt, $ext) = explode(".", $photoname);
                       

                    if(in_array($ext,$valid_formats))
                    { 
                     
                        $filename = stripslashes($_FILES['photos_albumn_ie']['name']);
                        $filename = str_replace(' ','',$filename);
                        $image_name=$last_id.'_'.time().$filename;
                        
                        $size=filesize($_FILES['photos_albumn_ie']['tmp_name']);
                        
                        $DIR_IMG_NORMAL = $main_dir;
                        $DIR_IMG_LARGE = $thumb_large;
                        $DIR_IMG_SMALL = $thumb_small;
                        $DIR_IMG_MEDIUM = $thumb_medium;
                        
                        $dest_main=$DIR_IMG_NORMAL.'/'.$image_name;
                        
                        
                        $dest_large = $DIR_IMG_LARGE.'/'.$image_name;
                        $size_width_3=700;
                        $size_height_3=600;            
                        $tag="";
                        
                        $dest_samll = $DIR_IMG_SMALL.'/'.$image_name;
                        $size_width_1=85;
                        $size_height_1=80;            
                        $tag="";
                        
                        $dest_medium = $DIR_IMG_MEDIUM.'/'.$image_name;
                         $size_width_2=300;
                        $size_height_2=200;            
                        $tag="";  
                        
                        
                                //File size check
                                if ($size < (20000*1024))
                                {	
                                
                                        $newname=$dest_main;
                                        //Moving file to uploads folder
                                        if (move_uploaded_file($_FILES['photos_albumn_ie']['tmp_name'], $newname))
                                        {
                                            $this->thumbnail($dest_large, $newname, $size_width_3, $size_height_3, $tag);
  
             
                                            $this->thumbnail($dest_samll, $newname, $size_width_1, $size_height_1, $tag);
                                            
                                            $this->thumbnail($dest_medium, $newname, $size_width_2, $size_height_2, $tag);
                                            
                                            
                                            /*$data = array(
                                            'image' => $image_name ,
                                            'session_id' =>  $ses_id 
                                            
                                             );
                                             
                                             $this->db->insert('manage_listing_image', $data);
                                            $last_id=$this->db->insert_id();*/
                                            
                                             $new_user_array1=array(
                                            'user_id' => $this->session->userdata('user_id'),
                                            'albumn_id' => $last_id,
                                            'photos' => $image_name,
                                            'created_date' => DATE('Y-m-d H:i:s'),              
                                            );
                                          $inserted=$this->db->insert('albumn_photos',$new_user_array1);

                                           
                                        }
                                        else
                                        {
                                            echo '<span width=50% height=40% class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
                                        }
                                }		    
                                else
                                {
                                    echo '<span  width=50% height=40% class="imgList">You have exceeded the size limit!</span>';
                                }
        
                        
                    }
                    else{
                                echo '<span  width=50% height=40% class="imgList" style="color:red">Unknown extension!</span>';

                    }
                }
        }
        
    }
    
    public function user_pic()
    {
	$this->db->where('uid',$this->session->userdata('user_id'));        
        $query=$this->db->get('users');
	if($query->num_rows>0)
        {
             $row = $query->row();
	    if($row->profile_image_small!='')
	    {
		return $row->profile_image_small;
	    }else{
		return $row->profile_image;
	    }
        }
    }
    public function all_albumn()
    {
        $this->db->select('albumn_tb.id as albumn_id ,albumn_tb.user_id,albumn_tb.albumn_name');
        $this->db->from('albumn_tb');       
        $this->db->where('albumn_tb.user_id',$this->session->userdata('user_id'));
        $query = $this->db->get();
       foreach ($query->result() as $row)
	    {
		$data[] = $row;
				
	    }
			
			
	return @$data;
    }
    
    public function complete_profile($user_id)
    {
	$this->db->where('id',$user_id);	
	$query = $this->db->get('people');
	$query2=$query->row();
	return $query2->login_first;	
    }
    public function addbannertext()
   {
       $off_reason = $this->db->get_where('site_settings',array('field_name'=>'Add_Banner_text'));
       if($off_reason->num_rows() > 0)
       {
           $fields = $off_reason->row();
           $siteemail = $fields->field_value;
           return $siteemail;
       }
   }
   //public function image_box()
   //{
   //    $data = "";
   //    $this->db->where('status',1);
   //    $q = $this->db->get('who_we_are');
   //    //echo $this->db->last_query();die;
   //    if($q->num_rows() > 0)
   //    {
   //        foreach ($q->result() as $row)
   //        {
   //            $data[] = $row;
   //                            
   //        }
   //                    
   //                    
   //    return $data;
   //    }
   //}
    public function getallphotos($albumn_id)
    {
        $this->db->where('albumn_id',$albumn_id);
        
        $query=$this->db->get('albumn_photos');
        //echo $this->db->last_query();
        if($query->num_rows>0)
        {
            foreach ($query->result() as $row)
	    {
		$data[] = $row;
				
	    }		
			
            return @$data;
        }
    }
     public function footerimage()
   {
       $off_reason = $this->db->get_where('site_settings',array('field_name'=>'photo'));
       if($off_reason->num_rows() > 0)
       {
           $fields = $off_reason->row();
           $siteemail = $fields->field_value;
           return $siteemail;
       }
   }
   public function copyright_text()
   {
       $off_reason = $this->db->get_where('site_settings',array('field_name'=>'Copy_Right_text'));
       if($off_reason->num_rows() > 0)
       {
           $fields = $off_reason->row();
           $siteemail = $fields->field_value;
           return $siteemail;
       }
   }
    public function upload_albumn_edit()
    {
                    $remove_button = "<img src='".base_url()."images/1405090829_cross.png' alt='remove'>";

        $last_id = $this->input->post('albumn_id_edit');
         $update_image=array(
                     'albumn_name' => $this->input->post('albumn_name_edit'),          
                    
                     );
        $this->db->where('id',$last_id);
        $insert=$this->db->update('albumn_tb',$update_image);
        
        echo " <div style='width:850px'><div id='main_".$last_id."'>";
        $this->db->where('albumn_id',$last_id);
        $img2 = $this->db->get('albumn_photos');

        if($img2->num_rows() > 0)
        {
           foreach ($img2->result() as $row)
           {
                   @$b .= "<div id='".$row->id."' style='float:left;padding-left:20px'><img src='". base_url()."image_crop.php?img_path=".PHYSICAL_PATH."images/albumn_photos/thumb_medium/".$row->photos."' class='imgList'><br /><a href='#' onclick=del_image('".$row->photos."','".$row->id."')>".$remove_button."</a></div>";

                   
           }
        }
        echo @$b;
        
                
       
        if($last_id !=0)
        {
                
                $main_dir = PHYSICAL_PATH.'images/albumn_photos';
                $thumb_large = PHYSICAL_PATH.'images/albumn_photos/thumb_large';
                $thumb_small= PHYSICAL_PATH.'images/albumn_photos/thumb_small';
                $thumb_medium = PHYSICAL_PATH.'images/albumn_photos/thumb_medium';
            if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
		    
		   
			
			
			   
				$m=0;
				foreach ($_FILES['photos_albumn_edit']['name'] as $name => $value)
				 {
				   
                                   
                                   $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg","JPG","PNG","GIF","JPEG");
	
                                    $photoname = $_FILES['photos_albumn_edit']['name'][$name];
			
				    list($txt, $ext) = explode(".", $photoname);
                                    
                                    if(in_array($ext,$valid_formats))
                                    {                                
                                   
				     
					$filename = stripslashes($_FILES['photos_albumn_edit']['name'][$name]);
					$filename = str_replace(' ','',$filename);
                                        $image_name=$last_id.'_'.time().$filename;
					
					$size=filesize($_FILES['photos_albumn_edit']['tmp_name'][$name]);
                                        
                                        $DIR_IMG_NORMAL = $main_dir;
                                        $DIR_IMG_LARGE = $thumb_large;
                                        $DIR_IMG_SMALL = $thumb_small;
                                        $DIR_IMG_MEDIUM = $thumb_medium;
                                    
                                        
                                        
                                        
                                        $dest_main=$DIR_IMG_NORMAL.'/'.$image_name;
                                        
                                        
                                        $dest_large = $DIR_IMG_LARGE.'/'.$image_name;
                                        $size_width_3=700;
                                        $size_height_3=600;            
                                        $tag="";
                                        
                                        $dest_samll = $DIR_IMG_SMALL.'/'.$image_name;
                                        $size_width_1=85;
                                        $size_height_1=80;            
                                        $tag="";
                                        
                                        $dest_medium = $DIR_IMG_MEDIUM.'/'.$image_name;
                                         $size_width_2=300;
                                        $size_height_2=200;            
                                        $tag="";  
					
					
						//File size check
						if ($size < (20000*1024))
						{	
						
							$newname=$dest_main;
							//Moving file to uploads folder
							if (move_uploaded_file($_FILES['photos_albumn_edit']['tmp_name'][$name], $newname))
							{
							    $this->thumbnail($dest_large, $newname, $size_width_3, $size_height_3, $tag);
                  
                             
                                                            $this->thumbnail($dest_samll, $newname, $size_width_1, $size_height_1, $tag);
                                                            
                                                            $this->thumbnail($dest_medium, $newname, $size_width_2, $size_height_2, $tag);
							    
							    
							    /*$data = array(
							    'image' => $image_name ,
							    'session_id' =>  $ses_id 
							    
							     );
							     
							     $this->db->insert('manage_listing_image', $data);
							    $last_id=$this->db->insert_id();*/
                                                            
                                                             $new_user_array1=array(
                                                            'user_id' => $this->session->userdata('user_id'),
                                                            'albumn_id' => $last_id,
                                                            'photos' => $image_name,
                                                            'created_date' => DATE('Y-m-d H:i:s'),              
                                                            );
                                                          $inserted=$this->db->insert('albumn_photos',$new_user_array1);
                                                          $last_id1=$this->db->insert_id();
                                                          
                                                           
							    echo @$a ="<div id='".$last_id1."' style='float:left;padding-left:20px'><img src='". base_url()."image_crop.php?img_path=".PHYSICAL_PATH."images/albumn_photos/thumb_medium/"
                                                            .$image_name."' class='imgList'><br /><a href='#' onclick=del_image('".$image_name."','".$last_id1."')>".$remove_button."</a></div>";

							   
							}
							else
							{
							    echo '<span width=50% height=40% class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
							}
						}		    
						else
						{
						    echo '<span  width=50% height=40% class="imgList">You have exceeded the size limit!</span>';
						}
			
					
                                    }
                                    else{
                                        	echo '<span  width=50% height=40% class="imgList" style="color:red">Unknown extension!</span>';

                                    }
				   
				    
				} //foreach end

		    
		   
		    
		}
        }
        /* $new_user_array=array(
                'user_id' => $this->session->userdata('user_id'),
                'albumn_name' => $this->input->post('albumn_name'),
                'created_date' => DATE('Y-m-d H:i:s'),              
                );
        $inserted=$this->db->insert('albumn_tb',$new_user_array);
        if($inserted)
        {
                $last_id=$this->db->insert_id();
                    $main_dir = PHYSICAL_PATH.'/images/albumn_photos';
                    $thumb_large = PHYSICAL_PATH.'/images/albumn_photos/thumb_large';
                    $thumb_small= PHYSICAL_PATH.'/images/albumn_photos/thumb_small';
                    $thumb_medium = PHYSICAL_PATH.'/images/albumn_photos/thumb_medium';
                  if(!empty($_FILES["file1"]["name"]))
                  {
                      list($width, $height,$type) = getimagesize($_FILES["file1"]["tmp_name"]);
                  
                      $size = filesize($_FILES["file1"]["tmp_name"]);
                      
                      
                      $DIR_IMG_NORMAL = $main_dir;
                      $DIR_IMG_LARGE = $thumb_large;
                      $DIR_IMG_SMALL = $thumb_small;
                      $DIR_IMG_MEDIUM = $thumb_medium;
                  
                      $filename=$_FILES['file1']['name'];
                      $img_info=pathinfo($_FILES["file1"]['name']);
                      
                      $image_name=$last_id.'_'.time().'.'.$img_info['extension'];
                      
                      $src=$_FILES['file1']['tmp_name'];
                      $dest_main=$DIR_IMG_NORMAL.'/'.$image_name;
                      
                      
                      $dest_large = $DIR_IMG_LARGE.'/'.$image_name;
                      $size_width_3=700;
                      $size_height_3=600;            
                      $tag="";
                      
                      $dest_samll = $DIR_IMG_SMALL.'/'.$image_name;
                      $size_width_1=85;
                      $size_height_1=80;            
                      $tag="";
                      
                      $dest_medium = $DIR_IMG_MEDIUM.'/'.$image_name;
                       $size_width_2=556;
                      $size_height_2=417;            
                      $tag="";  
                      
                      if(move_uploaded_file($src,$dest_main))
                      {

                        
                             $this->thumbnail($dest_large, $dest_main, $size_width_3, $size_height_3, $tag);
                  
                             
                             $this->thumbnail($dest_samll, $dest_main, $size_width_1, $size_height_1, $tag);
                             
                             $this->thumbnail($dest_medium, $dest_main, $size_width_2, $size_height_2, $tag);
                             
                      }
                  
                      $new_user_array1=array(
                        'user_id' => $this->session->userdata('user_id'),
                        'albumn_id' => $last_id,
                        'photos' => $image_name,
                        'created_date' => DATE('Y-m-d H:i:s'),              
                        );
                      $inserted=$this->db->insert('albumn_photos',$new_user_array1);
                  
                  }
                  
                  
                  
                  
        }*/
        $this->db->where('albumn_id',$last_id);
        
        $query1=$this->db->get('albumn_photos');
        $tot_photos = $query1->num_rows();
        echo "</div></div><input type='hidden' name='total_photos' id='total_photos' value='".$tot_photos."'>";
    }
     public function pic_save_ie()
    {
        $remove_button = "<img src='".base_url()."images/1405090829_cross.png' alt='remove'>";

        $last_id = $this->input->post('albumn_id_edit');
         $update_image=array(
                     'albumn_name' => $this->input->post('albumn_name_edit'),          
                    
                     );
        $this->db->where('id',$last_id);
        $insert=$this->db->update('albumn_tb',$update_image); 
        if($last_id !=0)
        {
                
                $main_dir = PHYSICAL_PATH.'images/albumn_photos';
                $thumb_large = PHYSICAL_PATH.'images/albumn_photos/thumb_large';
                $thumb_small= PHYSICAL_PATH.'images/albumn_photos/thumb_small';
                $thumb_medium = PHYSICAL_PATH.'images/albumn_photos/thumb_medium';
            if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
		    
		   
			
			
			   
				
				   
                                   
                                   $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg","JPG","PNG","GIF","JPEG");
	
                                    $photoname = $_FILES['photos_albumn_edit_ie']['name'];
			
				    list($txt, $ext) = explode(".", $photoname);
                                    
                                    if(in_array($ext,$valid_formats))
                                    {                                
                                   
				     
					$filename = stripslashes($_FILES['photos_albumn_edit_ie']['name']);
					$filename = str_replace(' ','',$filename);
                                        $image_name=$last_id.'_'.time().$filename;
					
					$size=filesize($_FILES['photos_albumn_edit_ie']['tmp_name']);
                                        
                                        $DIR_IMG_NORMAL = $main_dir;
                                        $DIR_IMG_LARGE = $thumb_large;
                                        $DIR_IMG_SMALL = $thumb_small;
                                        $DIR_IMG_MEDIUM = $thumb_medium;
                                    
                                        
                                        
                                        
                                        $dest_main=$DIR_IMG_NORMAL.'/'.$image_name;
                                        
                                        
                                        $dest_large = $DIR_IMG_LARGE.'/'.$image_name;
                                        $size_width_3=700;
                                        $size_height_3=600;            
                                        $tag="";
                                        
                                        $dest_samll = $DIR_IMG_SMALL.'/'.$image_name;
                                        $size_width_1=85;
                                        $size_height_1=80;            
                                        $tag="";
                                        
                                        $dest_medium = $DIR_IMG_MEDIUM.'/'.$image_name;
                                         $size_width_2=300;
                                        $size_height_2=200;            
                                        $tag="";  
					
					
						//File size check
						if ($size < (20000*1024))
						{	
						
							$newname=$dest_main;
							//Moving file to uploads folder
							if (move_uploaded_file($_FILES['photos_albumn_edit_ie']['tmp_name'], $newname))
							{
							    $this->thumbnail($dest_large, $newname, $size_width_3, $size_height_3, $tag);
                  
                             
                                                            $this->thumbnail($dest_samll, $newname, $size_width_1, $size_height_1, $tag);
                                                            
                                                            $this->thumbnail($dest_medium, $newname, $size_width_2, $size_height_2, $tag);
							    
							    
							    /*$data = array(
							    'image' => $image_name ,
							    'session_id' =>  $ses_id 
							    
							     );
							     
							     $this->db->insert('manage_listing_image', $data);
							    $last_id=$this->db->insert_id();*/
                                                            
                                                             $new_user_array1=array(
                                                            'user_id' => $this->session->userdata('user_id'),
                                                            'albumn_id' => $last_id,
                                                            'photos' => $image_name,
                                                            'created_date' => DATE('Y-m-d H:i:s'),              
                                                            );
                                                          $inserted=$this->db->insert('albumn_photos',$new_user_array1);
                                                          $last_id1=$this->db->insert_id();
                                                       
							   
							}
							else
							{
							    echo '<span width=50% height=40% class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
							}
						}		    
						else
						{
						    echo '<span  width=50% height=40% class="imgList">You have exceeded the size limit!</span>';
						}
			
					
                                    }
                                    else{
                                        	echo '<span  width=50% height=40% class="imgList" style="color:red">Unknown extension!</span>';

                                    }
		    
		}
        }
        
    }
    
    public function insidebannertext()
   {
       $off_reason = $this->db->get_where('site_settings',array('field_name'=>'upload_lower_text'));
       if($off_reason->num_rows() > 0)
       {
           $fields = $off_reason->row();
           $siteemail = $fields->field_value;
           return $siteemail;
       }
   }
   
   public function update_status($user_id,$phto_flag)
   {    
     $this->db->where('user_id',$user_id);
     $this->db->order_by('id','desc');
     $this->db->where('posted',0);
     $query=$this->db->get('albumn_photos');
     //echo $this->db->last_query();
     if($query->num_rows>0)
     {
	 //$row = $query->row();
	 
	 $new_user_array=array(
                'posted_by' => $this->session->userdata('user_id'),
                'posted_on' => DATE('Y-m-d h:i:s'),
                'activity_type' => 2,
                'photo_flag' =>$phto_flag,
                
                );
            $inserted=$this->db->insert('activity',$new_user_array);
	 
	 $update_image=array(
                     'posted' => 1,
                    
                    
                     );
                 $this->db->where('user_id',$user_id);
                 $insert=$this->db->update('albumn_photos',$update_image);

	
	
	foreach ($query->result() as $row)
	    {
		$data[] = $row;
				
	    }
			
			
	return @$data;
    
     }
     else{
	return 0;
     }
     
      
    
   }
   
   public function update_status_one($user_id)
   {    
     $this->db->where('posted_by',$user_id);
     //$this->db->where('posted',1);
     //$this->db->where('photo_flag <>',0);
     //$this->db->group_by('photo_flag');
     $this->db->order_by('id','desc');
     $query=$this->db->get('activity');
     //echo $this->db->last_query();
     //echo"<br />";
     if($query->num_rows>0)
     {
	foreach ($query->result() as $row)
	    {
		$data[] = $row;
				
	    }
			
			
	return @$data;
    
     }
     else{
	return 0;
     }
   }
   
   public function update_status_photo($photo_flag)
   {
	$this->db->where('user_id',$this->session->userdata('user_id'));
	$this->db->where('posted',1);
	$this->db->where('photo_flag',$photo_flag);
	$this->db->where('photo_flag !=',0);
	$this->db->order_by('id','desc');
	$query=$this->db->get('albumn_photos');
	//echo $this->db->last_query();
	if($query->num_rows>0)
	{
	   foreach ($query->result() as $row)
	       {
		   $data[] = $row;
				   
	       }
			   
			   
	   return @$data;
       
	}
	else{
	   return 0;
	}
   }
   
   public function update_status_data($user_id,$text_val)
   {
    $text_msg =str_replace("'","",$text_val);
    if(preg_match_all('@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)*)@',$text_msg,$res))
    {
	$links = $res[0][0];
	
    }
    else{
	$links='';
    }
    
	$new_user_array=array(
                'user_id' =>$this->session->userdata('user_id'),
                'thoughts' => $text_msg,
		'links'=>$links,
		'posted'=>1
                );
            $inserted=$this->db->insert('user_thoughts',$new_user_array);
            if($inserted)
            {
		$last_insert_id=$this->db->insert_id();
		$new_user_array=array(
                'posted_by' => $this->session->userdata('user_id'),
                'posted_on' => DATE('Y-m-d h:i:s'),
                'activity_type' => 3,               
                'thoughts_id'=>$last_insert_id,
                );
            $insert=$this->db->insert('activity',$new_user_array);
                
                $this->db->where('user_id',$user_id);
		$this->db->where('posted',1);
		$this->db->order_by('id','desc');		
		$query=$this->db->get('user_thoughts',1,0);
		//echo $this->db->last_query();
		if($query->num_rows>0)
		{
		   foreach ($query->result() as $row)
		       {
			   $data[] = $row;
					   
		       }
				   
				   
		   return @$data;
	       
		}
		else{
		   return 0;
		}
            }
            else
            {
                $return=0;
            }
   }
   public function update_status_data_only($thought_id)
   {
	 $this->db->where('user_id',$this->session->userdata('user_id'));
	$this->db->where('posted',1);
	$this->db->where('id',$thought_id);		
	$query=$this->db->get('user_thoughts');
	//echo $this->db->last_query();
	if($query->num_rows>0)
	{
	   foreach ($query->result() as $row)
	       {
		   $data[] = $row;
				   
	       }
			   
			   
	   return @$data;
       
	}
	else{
	   return 0;
	}
   }
   
    public function cancel_status($user_ids)
    {
        
        $this->db->where('user_id',$user_ids);       
	$this->db->delete('user_thoughts');
    }
    
    public function MyLinks()
    {
	$this->db->where('user_id',$this->session->userdata('user_id'));
	$this->db->where('posted',1);
	$this->db->where('links !=','');		
	$query=$this->db->get('user_thoughts');
	//echo $this->db->last_query();
	if($query->num_rows>0)
	{
	   foreach ($query->result() as $row)
	       {
		   $data[] = $row;
				   
	       }
			   
			   
	   return @$data;
       
	}
	else{
	   return 0;
	}
    }
    
    public function user_name()
    {
	 $this->db->where('id',$this->session->userdata('user_id'));        
        $query=$this->db->get('people');
        if($query->num_rows>0)
        {
             $row = $query->row();

            return $row->first_name."&nbsp".$row->last_name;
        }
    }
    
    public function TimelineDuration($posted_time)
    {
	$get_time=strtotime($posted_time);

	$now=strtotime("now");

	$interval="";
	$timeCalc=($now-$get_time);

	if($timeCalc > (60*60*24*365))
	{
	    $timeCalc = round($timeCalc/60/60/24/365);

	    $interval=" Years ago";
	}
	elseif($timeCalc > (60*60*24*30))
	{
	    $timeCalc = round($timeCalc/60/60/24/30);

	    $interval=" Months ago";
	}
	else if ($timeCalc > (60*60*24))
	{
	    $timeCalc = round($timeCalc/60/60/24);

	    $interval=" Days ago";
	}
	else if ($timeCalc > (60*60))
	{
	    $timeCalc = round($timeCalc/60/60);
	    $interval=" Hours ago";
	}
	else if ($timeCalc > 60)
	{
	    $timeCalc = round($timeCalc/60);
	    $interval=" Minutes ago";
	}
	else if ($timeCalc > 0)
	{
	    $timeCalc=$timeCalc;
	    $interval=" Seconds ago";
	}

	$difference_time=$timeCalc.$interval;
	
	return $difference_time;
    }
    
    public function search_instructor()
    {
	if ( !isset($_REQUEST['term']) )
	{
	    exit;
	}
	else
	{
	    
	    $this->db->where('user_id',$this->session->userdata('user_id'));        
	    $query=$this->db->get('user_instructor');
	    //echo $this->db->last_query();
	    if($query->num_rows>0)
	    {
	       foreach ($query->result() as $row)
		   {
			$data[] = "'".$row->instructor_email."'";
		   }
		   $emails = implode(",",$data);
		   
		   $this->db->like('email',$_REQUEST['term']);	
		    $this->db->where('user_type',2);
		    $this->db->where('status',1);
		    $this->db->where('`email` NOT IN ('.$emails.')', NULL, FALSE);   
		    $query=$this->db->get('people');
		    //echo $this->db->last_query();
		    if($query->num_rows>0)
		    {
		       foreach ($query->result() as $row)
			   {
			       $data1[] = $row;
					       
			   }
				       
				       
		       return @$data1;
		   
		    }
		    else{
		       return 0;
		    }
	    }
	    else{
		    $this->db->like('email',$_REQUEST['term']);	
		    $this->db->where('user_type',2);
		     $this->db->where('status',1);
		    $query=$this->db->get('people');
		    //echo $this->db->last_query();
		    if($query->num_rows>0)
		    {
		       foreach ($query->result() as $row)
			   {
			       $data2[] = $row;
					       
			   }
				       
				       
		       return @$data2;
		   
		    }
		    else{
		       return 0;
		    }
	    }
	    
	    
	    
	   
	}
	
    }
    
    public function instructor_list($instructor)
    {
	$new_user_array=array(
                'user_id' => $this->session->userdata('user_id'),
                'instructor_email' => $instructor,
                'status' => 1,              
                );
        $inserted=$this->db->insert('user_instructor',$new_user_array);
        $last_id=$this->db->insert_id();
	if($inserted)
        {
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->where('status',1);
		$query=$this->db->get('user_instructor');
		//echo $this->db->last_query();
		if($query->num_rows>0)
		{
		   foreach ($query->result() as $row)
		       {
			   $data[] = $row;
					   
		       }
				   
				   
		   return @$data;
	       
		}
		else{
		   return 0;
		}
	}
	else{
	    return "Error in inserting data";
	}
    }
    
    public function show_instructor_list()
    {
	$this->db->where('user_id',$this->session->userdata('user_id'));
	$this->db->where('status',1);
	$query=$this->db->get('user_instructor');
	//echo $this->db->last_query();
	if($query->num_rows>0)
	{
	   foreach ($query->result() as $row)
	       {
		   $data[] = $row;
				   
	       }
			   
			   
	   return @$data;
       
	}
	else{
	   return 0;
	}
    }
    
    public function delete_instructor($email)
    {
	$this->db->where('instructor_email',$email);       
	$this->db->delete('user_instructor');
    }
    
    public function unique_instructor($new_instructor_email)
    {
	$this->db->like('email',$new_instructor_email);		
	$query=$this->db->get('people');
	//echo $this->db->last_query();
	if($query->num_rows>0)
	{
	   $row = $query->row();

            return $row->email;
       
	}
	else{
	   return 0;
	}
    }
    
    public function new_instructor_create()
    {
	$new_instructor_array=array(
                'user_id' => $this->session->userdata('user_id'),
                'instructor_email' => $this->input->post('new_instructor_email'),               
		'status' =>0
                );
        $insertor_insert=$this->db->insert('user_instructor',$new_instructor_array);
	$last_id_instructor=$this->db->insert_id();
	
	$new_user_array=array(
                'first_name' => $this->input->post('full_name'),
                'user_type' => 2,
                'email' => $this->input->post('new_instructor_email'),
		'status' =>0
                );
        $inserted=$this->db->insert('people',$new_user_array);
        $last_id=$this->db->insert_id();
	if($inserted)
        {
	    $encrypt_id=urlencode(base64_encode($last_id));
	    
	    $this->db->where('id',$last_id);	
	    $query4 = $this->db->get('people');
	    //echo $this->db->last_query();
	    $query5=$query4->row();
    
	   $name=$query5->first_name;
	   $email=$query5->email;
	   
	    $this->db->where('id',6);
	    $article=$this->db->get('email_template_management');
	    if($article->num_rows>0)
	    {
		    foreach($article->result() as $article_details)
		    {
			    $article_heading=$article_details->subject;
			    $article_body=$article_details->details;
		    }
	    }
	    
	    //User who want to add Instructor
	    
	    $this->db->where('id',$this->session->userdata('user_id'));	
	    $query_invited_by = $this->db->get('people');
	    //echo $this->db->last_query();
	    $query_invited_by1=$query_invited_by->row();
    
	   $name_invited_by=$query_invited_by1->first_name.''.$query_invited_by1->last_name;

	    $link=base_url().'index.php/home/signup_instructor/'.$encrypt_id.'/'.$last_id_instructor;
	    
	    $body=str_replace(array('[LINK]','[SITENAME]','[NAME]',' [USER]'),array($link,SITE_NAME,$name,$name_invited_by),$article_body);
	    
	    $this->load->library('email');
	    $this->email->set_newline("\r\n");
	    $this->email->from(SMTP_MAIL,SITE_NAME);
	    $this->email->to($email); 
	     
	    
	    $this->email->subject($article_heading);
	    //echo $body;die;
	    $this->email->message($body);	
	    
	    $this->email->send();
	    
	    $return = 1;
                    
        }
	else
	{
	   $return = 0;
	   
	}
	return $return;
    }
    
    public function del_instructor_email($uid)
    {
	 $update_member=array(
                     'email' => '',
                    
                     );
                 $this->db->where('id',$uid);
                 $insert=$this->db->update('people',$update_member);
    }
	public function mail_idcheck($data)
    {
        $this->db->select('email');
        $this->db->from('newsleter_subscription');
        $this->db->where('email', $data);
		$query = $this->db->get();
		
        return  $query->num_rows;
    }
      public function insert_subscribe($email)
      {
	$new_data = array(
				
			'email' => $email,
			'status' => 0
				);
		
		$insert = $this->db->insert('newsleter_subscription', $new_data);
		return $insert;
      }
      public function activate_subscribe($id)
      {
	$this->db->where('id',$id);
	$new_data = array(
			'status' => 1
			);
	$insert=$this->db->update('newsleter_subscription', $new_data);
	return $insert;
      }
   
    public function get_subscribe($email)
    {
	
	$this->db->select('id');
	$this->db->from('newsleter_subscription');
	$this->db->where('email',$email);
	$query = $this->db->get();
	return  $query->row();
    }
    //get category name
    function get_cat_name($id)
    {
	$this->db->select('*');
	$this->db->from('product_type');
	$this->db->where('id',$id);
	$query = $this->db->get();
	return  $query->row();
    }
    function get_sub_cat_name($id)
    {
	$this->db->select('*');
	$this->db->from('product_category');
	$this->db->where('id',$id);
	$query = $this->db->get();
	return  $query->row();
    }    
   function shippin_days()
   {
          $this->db->select('field_value');
	$this->db->from('site_settings');
	$this->db->where('id',105);
	$query = $this->db->get();
	$result = $query->row();
	return $result->field_value;
   }
   
    public function getproduct_name($prod_id)
    {
       
        $this->db->where('id',$prod_id);
        $q = $this->db->get('product');
	$number_rows= $q->num_rows;
	if($number_rows > 0)
	{
	    $result = $q->row();
            return $image_name = $result->title;
	}
	else
	return 0;
        
    }
}
?>