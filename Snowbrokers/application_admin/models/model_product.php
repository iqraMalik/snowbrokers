<?php

class model_product extends CI_Model {
    
        var $name = '';
	var $id = '';
	var $password = '';
	
	function __construct()
	{
		parent::__construct();
	}
    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	public function validate($user_name, $password)
	{
		$this->db->where('username', $user_name);
		$this->db->where('password', $password);
		$query = $this->db->get('admin');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}
    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	public function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
	}
	function isLoggedIn()
	{
		$isloggedin = $this->session->userdata('is_logged_in');

		if($isloggedin > 0) 
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	public function setting_pagination()
	{
	$this->db->where('field_name','admin_resultsPerPage');	
	$query = $this->db->get('site_settings');
	$query2=$query->row();
	return $query2->field_value;
	}
        public function getAllCategory($search_option,$get_search) 
	{
		if(($search_option!="") && ($get_search!=""))
		{
			if($search_option!="all")
			{
				$this->db->where($search_option.' like "%'.$get_search.'%"');
			}
			if($search_option=="all")
			{
				$this->db->where('title like "%'.$get_search.'%"');
			}
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('product');
			//echo $this->db->last_query();
		}
                
		else
		{
		$this->db->order_by("id", "DESC");
		$q = $this->db->get('product_category');
		}
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function getCategory($search_option,$get_search,$limit_start=0,$limit=0) 
	{
		if(($search_option!="") && ($get_search!=""))
		{
			
			if($search_option!="all")
			{
				$this->db->where($search_option.' like "%'.$get_search.'%"');
			}
			if($search_option=="all")
			{
				$this->db->where('name like "%'.$get_search.'%"');
			}
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('product_category',$limit,$limit_start);
			
			
		}
		else
		{
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('product_category',$limit,$limit_start);
		}
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
			 
		}
	}
	
	public function parentCategory($category_id)
	{
		$this->db->where('id',$category_id);
		//$this->db->where('status',1);
		$query=$this->db->get('product_category');
		//echo $this->db->last_query();
		if($query->num_rows()>0)
		{
			foreach($query->result() as $parent_category)
			{
				$data[]=$parent_category;
			}
			return $data;
		}
		
	}
        
        function choose_category($ptype){
		
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('main_id',$ptype);
		//$this->db->where('status',1); 
	        $query = $this->db->get();
		
                return $query->result(); 
	}
        function product_type(){
		
		$this->db->select('*');
		$this->db->from('product_type');
		//$this->db->where('status',1);
	        $query = $this->db->get();
		
                return $query->result(); 
	}
         function currency_type(){
		
		$this->db->select('*');
		$this->db->from('country');
		//$this->db->where('status',1);
		$this->db->group_by('currrency_symbol');
	        $query = $this->db->get();
		
                return $query->result(); 
	}
	
	 function prod_type_by_id($id){
		
		$this->db->select('*');
		$this->db->from('product_type');
		$this->db->where('id',$id);
	        $query = $this->db->get();
		
                return $query->result(); 
	}
	function get_currency($id){
		
		$this->db->select('currrency_symbol');
		$this->db->from('country');
		$this->db->where('currency_code',$id);
	        $query = $this->db->get();
		
                return $query->result(); 
	}
	function get_customer_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('people');
		$this->db->where('id',$id);
	        $query = $this->db->get();
		
                return $query->result_array();
	}
	 function prod_cat_by_id($id){
		
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('id',$id);
	        $query = $this->db->get();
		
                return $query->result(); 
	}
	////get Size respect to product type and category///
        function size_type($pro_typ,$pro_cat){
		
		$this->db->select('*');
		$this->db->from('product_size');
		$this->db->where('product_type',$pro_typ);
                $this->db->where('product_category',$pro_cat);
	        $query = $this->db->get();
		
                return $query->result(); 
	}
        //get customer type to identify seller /////
        function customer_type(){
		
		$this->db->select('*');
		$this->db->from('people');
		$this->db->where('customer_type',2);
               
	        $query = $this->db->get();
		
                return $query->result(); 
	}
	//get color in respect to product type and product category///////
        function color_type($pro_typ,$pro_cat){
		
		$this->db->select('*');
		$this->db->from('product_color');
		$this->db->where('product_type',$pro_typ);
                $this->db->where('product_category',$pro_cat);
	        $query = $this->db->get();
		
                return $query->result(); 
	}
	public function parentcat()
	{
		$this->db->where('main_id =', 0);		
		$query=$this->db->get('product_category');
		//echo $this->db->last_query();
		if($query->num_rows()>0)
		{
			foreach($query->result() as $parent_category)
			{
				$data[]=$parent_category;
			}
			return $data;
		}
	}
	
	public function CategoryType()
	{
		$this->db->select('*');
		$this->db->from('product_type');
		//$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
	}
	public function get_cat($id)
	{
		$this->db->select('*');
		$this->db->from('product_type');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
	}
	public function get_size_by_prod_id($id)
	{
		$this->db->select('*');
		$this->db->from('product_related_size_details');
		$this->db->where('product_id', $id);
		$query = $this->db->get();
		return $query->result(); 
	}
	public function get_color_all($id)
	{
		$this->db->select('*');
		$this->db->from('product_related_details');
		$this->db->where_in('product_related_size_id', $id);
		$this->db->group_by('color_id');
		$query = $this->db->get();
		$value = $query->result();
		//print_r($value);
		//die();
		return $value;
	}
	    public function get_color_by_size_id($id)
	       {
		       $this->db->select('*');
		       //$this->db->from('product_related_details');
		       $this->db->where('product_related_size_id ', $id);
		       $this->db->group_by('color_id');
		       $query = $this->db->get('product_related_details');
		       //$query = $this->db->query('select * from product_related_details where product_related_size_id="'.$id.'" group by color_id');
		       //echo $this->db->last_query();
		       return $query->result_array(); 
	       }
	       public function get_color_id_by_size($id)
	       {
		       $this->db->select('*');
		       $this->db->from('product_related_details');
		       $this->db->where_in('product_related_size_id ', $id);
		     //$this->db->group_by('color_id');
		       $query = $this->db->get();
		       
		       return $query->result(); 
	       }
		public function get_table_id($product_id,$size_opt_id)
		{
		       $this->db->where('size_id ', $size_opt_id);
		       $this->db->where('product_id ', $product_id);
		       $query = $this->db->get('product_related_size_details');
		       $q = $query->row();
		       
		       return $q->id;
		}
		public function get_all_quty($size_table_id,$color_opt_id)
		{
			$this->db->where('color_id ', $color_opt_id);
			$this->db->where('product_related_size_id ', $size_table_id);
			$query = $this->db->get('product_related_details');
			$q = $query->row();
			if($query->num_rows()>0)
			{
				return $q;
			}
			else
			{
				return 0;
			}
		}
	        public function get_color_code_by_color_id($id)
	       {
		       $this->db->select('*');
		       $this->db->from('product_color');
		       $this->db->where('id ', $id);
		       $query = $this->db->get();
		       
		       return $query->result_array(); 
	       }
	         public function get_id_prod_rel_size_details($id,$prod_id)
	       {
		       $this->db->select('*');
		       $this->db->from('product_related_size_details');
		       $this->db->where('size_id ', $id);
		       $this->db->where('product_id ', $prod_id);
		       $query = $this->db->get();
		       
		       return $query->result_array(); 
	       }
	       
	        public function get_id_prod_rel_details($id,$color_id)
	       {
		       $this->db->select('*');
		       $this->db->from('product_related_details');
		       $this->db->where('product_related_size_id ', $id);
		       $this->db->where('color_id ', $color_id);
		       $query = $this->db->get();
		       
		       return $query->result(); 
	       }
		public function get_image($prod_id,$color_id)
	       {
		       $this->db->select('*');
		       $this->db->from('product_related_image');
		       $this->db->where('color_id', $color_id);
		       $this->db->where('product_id', $prod_id);
		       $query = $this->db->get();
		      
		       return $query->result_array(); 
	        
	       }
		public function get_num_img($id,$prod_id)
	       {
		       $this->db->select('*');
		       $this->db->from('product_related_image');
		       $this->db->where('color_id', $id);
		       $this->db->where('product_id', $prod_id);
		       $query = $this->db->get();
		       
		       return $query->num_rows; 
	       }
	       
	     public function insert_img($product_id,$color_id)
        {
		
		$this->load->library('image_lib');
		if(!empty($_FILES))
		{
		$config['upload_path'] = PHYSICAL_PATH.'images/uploads/normal/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
		$big_thumbs = PHYSICAL_PATH.'images/uploads/long_thumb/';
		$short_thumbs = PHYSICAL_PATH.'images/uploads/short_thumb/';
		$extra_big_thumbs = PHYSICAL_PATH.'images/uploads/big_thumb/';
		$big_thumbnail = $this->make_thumbnail_images($big_thumbs,334,307,$data);
		$short_thumbnail = $this->make_thumbnail_images($short_thumbs,100,164,$data);
		$extra_big_thumbnail = $this->make_thumbnail_images($extra_big_thumbs,616,566,$data);
		$userpicture = $data['file_name'];
		
		//$new_image_data = array(
		//'session_id' => $image_ses_id,
		//'image' => $userpicture
		//);
		//$insert_image = $this->db->insert('manage_listing_image',$new_image_data);
		//echo $insert_id = $this->db->insert_id();
		     $new_member_insert_data = array(
			'product_id' => $product_id,
			'color_id' => $color_id,
                        'image' => $userpicture
	   );
	    
	       $insert_img = $this->db->insert('product_related_image', $new_member_insert_data);
	       $last_id=$this->db->insert_id();
		}
		}
	   
		}
	   
	  
	    
	    if($insert_img)
                {
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product Successfully Added</strong></div>');
                }
		else
                {
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add article. Please try again</strong></div>');
		
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
	public function delete_dropzone_img()
	{
		
			$image_id = $this->uri->segment(3);
			$this->db->where('id',$image_id);
			$result_rs = $this->db->get('product_related_image');
			if($result_rs->num_rows()>0)
			{
			$result = $result_rs->row();
			
			@unlink(PHYSICAL_PATH.'images/uploads/normal/'.$result->image);
			//@unlink(PHYSICAL_PATH.'images/uploads/long_thumb/'.$result->image);
			//@unlink(PHYSICAL_PATH.'images/uploads/short_thumb/'.$result->image);
			
			$this->db->where('id',$image_id);
			$this->db->delete('product_related_image');
			// echo $image_id;
			}
	}
        public function insert_product()
        {
 
		//if($this->input->post('category_type')!="")
		//{
		//	$main_id=$this->input->post('category_type');
		//}
		//if($this->input->post('category_type')=="")
		//{
		//	$main_id=0;
		//}
	
            $new_member_insert_data = array(
			'product_type_id' => $this->input->post('product_type'),
			'product_cat_id' => $this->input->post('product_category'),
                        'title' => $this->input->post('product_title'),
			'product_tag' => $this->input->post('tag'),
                        'choose_currency' => $this->input->post('currency'),
			'price' => $this->input->post('price'),
                        'product_details' => $this->input->post('short_desc'),
			'shipping_terms' => $this->input->post('shipping_details')
			
		);
	  
		$insert = $this->db->insert('product', $new_member_insert_data);
		//echo $this->db->last_query();die;
		$lastid = $this->db->insert_id();
				
		if($lastid)
                {
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product Is Not Showing in the site ..Please add all the Field</strong></div>');
                }
		else
                {
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add article. Please try again</strong></div>');
		
		}
		return $lastid;
        }
	  public function insert_advance_product_size($product_id)
        {
		
		//print_r($_REQUEST);
		$size_arr=  $this->input->post('size_opt');
		$color_arr=  $this->input->post('color_opt');
	        $count_arr_color = count($color_arr);
		$count_arr_size = count($size_arr);
		
		//$quantity_arr =  $this->input->post('qnty');
		// $qnty = implode(',',$quantity_arr);
	             //$count_arr_qnty = count($quantity_arr);
		     
		   //  print_r($quantity_arr);
		     
		     // print_r($color_arr);die();
			
			for($i = 0;$i < $count_arr_size ;$i++)
			{
				$sizeid=$size_arr[$i];
				
				$new_member_insert_data = array(
									'product_id' => $product_id,
									'size_id' => $size_arr[$i]
								);
				$insert = $this->db->insert('product_related_size_details', $new_member_insert_data);
				//echo $this->db->last_query();die;
				$lastid = $this->db->insert_id();
			
				for($j=0; $j < $count_arr_color;$j++)
				{
					$mycolorid=$color_arr[$j];
					$getval='ref_'.$sizeid.'_'.$mycolorid.'_text';
					//echo $getval;
					$get_val[] = $getval;
					
					//$my_quant = $this->input->post("$getval");
					//
					//if($my_quant>0 && $my_quant!='')
					//{
					//	$values[] = $getval;
					//	//$new_member_insert_data_color = array(
					//	//					'product_related_size_id' => $lastid,
					//	//					'color_id' => $color_arr[$j],
					//	//					'quantity' => $my_quant
					//	//				);
					//	//
					//	//$insert_color = $this->db->insert('product_related_details', $new_member_insert_data_color);
					//	////echo $this->db->last_query();die;
					//	//$lastid_color = $this->db->insert_id();
					//
					//}
				}
				$quant_field = array_unique($get_val);
				foreach($quant_field as $value)
				{
					$my_quant = $this->input->post($value);
					//echo $my_quant;
					$color_id = explode("_",$value);
					
					$new_member_insert_data_color = array(
										'product_related_size_id' => $lastid,
										'color_id' => $color_id[2],
										'quantity' => $my_quant
									);
						
					$insert_color = $this->db->insert('product_related_details', $new_member_insert_data_color);
					//echo $this->db->last_query();die;
					$lastid_color = $this->db->insert_id();
				}
				$get_val='';
				//$return[] = $values;
				//echo "<pre>";
				//print_r($values);
				//echo "</pre>";
			}
			//exit();
					
		if($lastid)
                {
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product Is Not Showing in the site ..Please add all the Field</strong></div>');
                }
		else
                {
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add article. Please try again</strong></div>');
		
		}
		return $lastid;
        }
	
		  public function edit_product_size($product_id)
        {
		//print_r($_REQUEST);
		$this->db->where('product_id',$product_id);
		$q = $this->db->get('product_related_size_details');
		if($q->num_rows()>0)
		{
			$query = $q->result();
			foreach($query as $value)
			{
				$this->db->where('product_related_size_id',$value->id);
				$delete = $this->db->delete('product_related_details');
			}
		}
		$this->db->where('product_id',$product_id);
		$this->db->delete('product_related_size_details');
		
		$size_arr=  $this->input->post('size_opt');
		$color_arr=  $this->input->post('color_opt');
	        $count_arr_color = count($color_arr);
		$count_arr_size = count($size_arr);
		//$product_related_details_id = $this->input->post('product_related_details_size_id');
		//echo $product_related_details_id; die;
		//$quantity_arr =  $this->input->post('qnty');
		// $qnty = implode(',',$quantity_arr);
	             //$count_arr_qnty = count($quantity_arr);
		     
		   //  print_r($quantity_arr);
		     
		     // print_r($color_arr);die();
			
			for($i = 0;$i < $count_arr_size ;$i++)
			{
				$sizeid=$size_arr[$i];
				
				$new_member_insert_data = array(
									'product_id' => $product_id,
									'size_id' => $size_arr[$i]
								);
				//$this->db->where('product_id', $product_id);
				//$query = $this->db->delete('product_related_size_details');
				
				$insert = $this->db->insert('product_related_size_details', $new_member_insert_data);
				//echo $this->db->last_query();die;
				$lastid = $this->db->insert_id();
			
				for($j=0; $j < $count_arr_color;$j++)
				{
					$mycolorid=$color_arr[$j];
					$getval='ref_'.$sizeid.'_'.$mycolorid.'_text';
					//echo $getval;
					$get_val[] = $getval;
					
					//$my_quant = $this->input->post("$getval");
					//
					//if($my_quant>0 && $my_quant!='')
					//{
					//	$values[] = $getval;
					//	//$new_member_insert_data_color = array(
					//	//					'product_related_size_id' => $lastid,
					//	//					'color_id' => $color_arr[$j],
					//	//					'quantity' => $my_quant
					//	//				);
					//	//
					//	//$insert_color = $this->db->insert('product_related_details', $new_member_insert_data_color);
					//	////echo $this->db->last_query();die;
					//	//$lastid_color = $this->db->insert_id();
					//
					//}
				}
				print_r($get_val);die;
				$quant_field = array_unique($get_val);
				foreach($quant_field as $value)
				{
					$my_quant = $this->input->post($value);
					//echo $my_quant;
					$color_id = explode("_",$value);
					
					$new_member_insert_data_color = array(
										'product_related_size_id' => $lastid,
										'color_id' => $color_id[2],
										'quantity' => $my_quant
									);
						
					$insert_color = $this->db->insert('product_related_details', $new_member_insert_data_color);
					//echo $this->db->last_query();die;
					$lastid_color = $this->db->insert_id();
				}
				$get_val='';
				
			}
			
					
		if($lastid)
                {
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product Is Not Showing in the site ..Please add all the Field</strong></div>');
                }
		else
                {
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add article. Please try again</strong></div>');
		
		}
		return $lastid;
		
        }
	
	
	
	
	public function getDataCategory($category_id)
	{
		$this->db->order_by("id", "desc"); 
		$this->db->where('id',$category_id);
		$query=$this->db->get('product');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $Type_data)
			{
				$data[]=$Type_data;
			}
		}
		return $data;
	}
        public function edit_product()
	{
//                if($this->input->post('category_type')!="")
//		{
//			$main_id=$this->input->post('category_type');
//		}
//		if($this->input->post('category_type')=="")
//		{
//			$main_id=0;
//		}
		//echo $update_category_date;die;
		$new_member_insert_data = array(
			'title' => $this->input->post('product_title'),
			'product_tag' => $this->input->post('tag'),
                        'choose_currency' => $this->input->post('currency'),
			'price' => $this->input->post('price'),
                        'product_details' => $this->input->post('short_desc'),
			'shipping_terms' => $this->input->post('shipping_details')
		);
		
		$this->db->where('id', $this->input->post('id'));
		$insert = $this->db->update('product',$new_member_insert_data);
		//echo $this->db->last_query();die;
		$update_specialist_id=$this->input->post('id');
		
		

		if($insert)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product Category updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update Product category type. Please try again</strong></div>');
			
		return $insert;
	}

        public function multiple_category_delete()
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$this->db->where('id', $value);
				$query = $this->db->delete('product');
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete Product. Please try again</strong></div>');
		
		return $query;
	}
        public function multiple_category_active_inactive($get)
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$new_insert_data['status'] = $get;
				
				$this->db->where('id', $value);
				$query = $this->db->update('product',$new_insert_data);
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update Product. Please try again</strong></div>');
		
		return $query;
	}
	
	
	 public function delete_img($id)
	{
		
		$this->db->where('id', $id);
		$query = $this->db->delete('product_related_image');
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Image deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete Image. Please try again</strong></div>');
		return 1;
	}
        public function delete_product()
	{
		$returnvalue=0;
		//echo $this->input->post('ListingUserid');die;
		$this->db->where('id', $this->input->post('ListingUserid'));
		$query = $this->db->delete('product');
		//$this->db->where('product_id', $this->input->post('ListingUserid'));
		//$query1 = $this->db->delete('product_related_size_details');
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete Product. Please try again</strong></div>');
		return $query;
	}
	public function status_change($statuss)
	{
		//echo $this->input->post('ListingUserid');die();
		$returnvalue=0;
		$stat_change= array(
			'status' => $statuss 
		);
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$insert = $this->db->update('product',$stat_change);
		//$this->db->where('product_id', $this->input->post('ListingUserid'));
		//$query1 = $this->db->delete('product_related_size_details');
		
		if($insert)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Status Updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to Status Updated. Please try again</strong></div>');
		return $insert;
	}
	// ...............pagination............................//
	public function get_username($user_name)
	{
		$this->db->where('name', $user_name);
		$query = $this->db->get('product_category');
		$onlyonedata=$query->row();
		return $onlyonedata;
	}
	function get_paged_list($limit = 0, $offset = 0)
	{
		
		//$user_name=$this->session->userdata('service');
		//$get_userid=$this->get_username($user_name);
		//$user_id=$get_userid->id;
		
		$this->db->order_by("id", "desc"); 
		//$this->db->where('id',$user_id);
		$q = $this->db->get('product',$limit,$offset);
		
		
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
	function count_all_search($searchparams)
	{		
		
		//$user_name=$this->session->userdata('service');
		//$get_userid=$this->get_username($user_name);
		//$user_id=$get_userid->id;
		
		$this->db->order_by("id", "desc");
		$this->db->like($searchparams);
		//$this->db->where('id',$user_id);
		//}
		$this->db->from('product');
		$q = $this->db->count_all_results();
		//echo $this->db->last_query();die;
		return $q;
	}
	function get_search_pagedlist($searchparams,$limit = 100, $offset = 0)
	{
// 		$user_name=$this->session->userdata('service');
//		$get_userid=$this->get_username($user_name);
//		$user_id=$get_userid->id;
		
		$this->db->order_by("id", "desc");
		//$this->db->where('id',$user_id);
		$this->db->like($searchparams);
		
		$q = $this->db->get('product',$limit,$offset);
		
		
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
	function count_all()
	{
		
		//$user_name=$this->session->userdata('service');
		//$get_userid=$this->get_username($user_name);
		//$user_id=$get_userid->id;
		
		$this->db->order_by("id", "desc");
		//$this->db->where('id',$user_id);
		$this->db->from('product');
		
		//$q = $this->db->count_all('customers');
		$q = $this->db->count_all_results();
		
		return $q;
		
	}
	
	public function count_all_cat($searchparams='')
	{
		$searchitems = array();
		if($searchparams!='')
		{
			//echo $searchparams."<br/>";
			$search = explode("&",$searchparams);
			//print_r($search);exit;
			
			foreach($search as $searchitem)
			{
				list ($key,$value) = explode ('=',$searchitem);
				$searchitems[$key] = urldecode($value);
			}
			//print_r($searchitems);exit;
		}
		$q="";
		if(isset($searchitems['status']))
		{
			$this->db->where('status',$searchitems['status']);
		}		
		
		if(isset($searchitems['customer_type']))
		{
		if($searchitems['customer_type'] == 'admin' || $searchitems['customer_type'] == 'Admin')
		{
			$this->db->where('product.customer_type',0);
		}
		else{
		$this->db->select("product.*,people.first_name as f_name,product_type.title as product_type_title");
		$this->db->join('people','product.customer_type=people.id','left outer');
		$this->db->join('product_type','product.product_type_id=product_type.id','inner');
		
		
		$this->db->like('people.first_name', $searchitems['customer_type']);
		}
		
		
		}
		if(isset($searchitems['product_type_id']))
		{
			$this->db->select("product.*,people.first_name as f_name,product_type.title as product_type_title");
			$this->db->join('people','product.customer_type=people.id','left outer');
			$this->db->join('product_type','product.product_type_id=product_type.id','inner');
			$this->db->like('product_type.title', $searchitems['product_type_id']);
		}
		if(isset($searchitems['title']))
		{
			$this->db->select("product.*,people.first_name as f_name,product_type.title as product_type_title");
			$this->db->join('people','product.customer_type=people.id','left outer');
			$this->db->join('product_type','product.product_type_id=product_type.id','inner');
			//$title = array('title'=>$searchitems['title']);
			$this->db->like('product.title',$searchitems['title']);
		}
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			if($searchitems['sfield'] == 'cat_name')
			{
				$searchitems['sfield'] ='name';
			}
			if($searchitems['sfield'] == 'parent_cat')
			{
				$searchitems['sfield'] ='main_id';
			}
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("product.id", "desc");
		}
		$this->db->from('product');
		//echo $this->db->last_query();
		//echo "<br />";
		$q = $this->db->count_all_results();
		
		return $q;
		
	}
	public function get_paged_list_cat($limit = 0, $offset = 0,$searchparams='')
	{
		$data="";
		$searchitems = array();
		if($searchparams!='')
		{
			//echo $searchparams."<br/>";
			$search = explode("&",$searchparams);
			//print_r($search);
			foreach($search as $searchitem)
			{
				list ($key,$value) = explode ('=',$searchitem);
				$searchitems[$key] = urldecode($value);
			}
			//print_r($searchitems);
		}
		if(isset($searchitems['status']))
		{
			$this->db->where('status',$searchitems['status']);
		}
		
		if(isset($searchitems['customer_type']))
		{
		if($searchitems['customer_type'] == 'admin' || $searchitems['customer_type'] == 'Admin')
		{
			$this->db->where('product.customer_type',0);
		}
		else{
		$this->db->select("product.*,people.first_name as f_name,product_type.title as product_type_title");
		$this->db->join('people','product.customer_type=people.id','left outer');
		$this->db->join('product_type','product.product_type_id=product_type.id','inner');
		
		
		$this->db->like('people.first_name', $searchitems['customer_type']);
		}
		
		
		}
		if(isset($searchitems['product_type_id']))
		{
			$this->db->select("product.*,people.first_name as f_name,product_type.title as product_type_title");
			$this->db->join('people','product.customer_type=people.id','left outer');
			$this->db->join('product_type','product.product_type_id=product_type.id','inner');
			$this->db->like('product_type.title', $searchitems['product_type_id']);
		}
		if(isset($searchitems['title']))
		{
			$this->db->select("product.*,people.first_name as f_name,product_type.title as product_type_title");
			$this->db->join('people','product.customer_type=people.id','left outer');
			$this->db->join('product_type','product.product_type_id=product_type.id','inner');
			//$title = array('title'=>$searchitems['title']);
			$this->db->like('product.title',$searchitems['title']);
		}
		
		//if(isset($searchitems['product.product_tag']))
		//{
		//	$tag = array('product_tag'=>$searchitems['product.product_tag']);
		//	$this->db->like($tag);
		//}
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			if($searchitems['sfield'] == 'product.title')
			{
				$searchitems['sfield'] ='product.title';
			}
			if($searchitems['sfield'] == 'product.product_tag')
			{
				$searchitems['sfield'] ='product.product_tag';
			}
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("product.id", "desc");
		}
		$q = $this->db->get('product',$limit,$offset);
		
		//echo $this->db->last_query();
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	//......................pagination.......................//
}
?>