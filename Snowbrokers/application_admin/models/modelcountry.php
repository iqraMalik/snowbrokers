<?php

class modelcountry extends CI_Model {
    
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
	
	//public function CategoryType()
	//{
	//	$this->db->where('status',1);
	//	$query=$this->db->get('categorytype');
	//	
	//	if($query->num_rows()>0)
	//	{
	//		foreach($query->result() as $parent_category)
	//		{
	//			$data[]=$parent_category;
	//		}
	//	}
	//	return $data;
	//}
	
	public function getAllcountry($search_option,$get_search) 
	{
		if(($search_option!="") && ($get_search!=""))
		{
			if($search_option!="all")
			{
				$this->db->where($search_option.' like "%'.$get_search.'%"');
			}
			if($search_option=="all")
			{
				$this->db->where('country_name_en like "%'.$get_search.'%"');
			}
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('country');
			//echo $this->db->last_query();
		}
                
		else
		{
		$this->db->order_by("id", "DESC");
		$q = $this->db->get('country');
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
	public function getcountry($search_option,$get_search,$limit_start=0,$limit=0) 
	{
		if(($search_option!="") && ($get_search!=""))
		{
			
			if($search_option!="all")
			{
				$this->db->where($search_option.' like "%'.$get_search.'%"');
			}
			if($search_option=="all")
			{
				$this->db->where('country_name_en like "%'.$get_search.'%"');
			}
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('country',$limit,$limit_start);
			
			
		}
		else
		{
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('country',$limit,$limit_start);
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
	//public function parentCategory($category_id)
	//{
	//	$this->db->where('id',$category_id);
	//	$this->db->where('status',1);
	//	$query=$this->db->get('categorytype');
	//	//echo $this->db->last_query();
	//	if($query->num_rows()>0)
	//	{
	//		foreach($query->result() as $parent_category)
	//		{
	//			$data[]=$parent_category;
	//		}
	//		return $data;
	//	}
	//	
	//}
	    //..................................unic cheaking.........................................//
	public function Check_CityName_pa($CityName)
	{
		$this->db->where('country_name_pa', $CityName);
		$query = $this->db->get('country');
		//echo $this->db->last_query();die;
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	public function Check_CityName_Edit_pa($CityName,$city_ID)
	{
		$this->db->where('country_name_pa', $CityName);
		$this->db->where('id !=', $city_ID);
		$query = $this->db->get('country');
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	public function Check_CityName_pe($CityName)
	{
		$this->db->where('country_name_pe', $CityName);
		$query = $this->db->get('country');
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	public function Check_CityName_Edit_pe($CityName,$city_ID)
	{
		$this->db->where('country_name_pe', $CityName);
		$this->db->where('id !=', $city_ID);
		$query = $this->db->get('country');
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	public function Check_CityName($CityName)
	{
		$this->db->where('country_name', $CityName);
		$query = $this->db->get('country');
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	public function Check_CityName_Edit($CityName,$city_ID)
	{
		$this->db->where('country_name', $CityName);
		$this->db->where('id !=', $city_ID);
		$query = $this->db->get('country');
		//echo $this->db->last_query();die;
		if ($query->num_rows() > 0) {
			return "Y";
		} else {
			return "N";
		}
	}
	//...................end.....................................................................//
	public function insert_country()
        {
		$this->db->select('country_name');
		$this->db->where('country_name', $this->input->post('Country_name_en'));
		$query = $this->db->get('country');
		if ($query->num_rows() == 0) {
		$new_categorytype_insert_data = array(
			'country_name' => $this->input->post('Country_name_en'),
			'iso_alpha2' => $this->input->post('country_code'),
			'status' => $this->input->post('status'),
		);
		$insert = $this->db->insert('country', $new_categorytype_insert_data);
		$lastid=$this->db->insert_id();
		$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Cauntry added successfully</strong></div>');
		}
		else{
		$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Duplicate Entry !. Please try again</strong></div>');
		}
 
		
		
//                if($insert)
//		{
//			// Image Upload //
//			//echo PHYSICAL_PATH; exit;
//			$config['upload_path'] = PHYSICAL_PATH.'images/subcategory/';
//			$config['allowed_types'] = 'gif|jpg|png|jpeg';
//			$config['max_size']  = 1024 * 8;
//			$config['encrypt_name'] = TRUE;
//			$this->load->library('upload', $config);
//			$status = "";
//			$msg = "";
//			$userpicture='';
//			if(!empty($_FILES["image"]["name"]))
//			{
//			$file_element_name = 'image';
//			
//			if (!$this->upload->do_upload($file_element_name))
//			{
//				$status = 'error';
//				$msg = $this->upload->display_errors('', '');
//			}
//			else
//			{
//			   $data = $this->upload->data();
//				   
//			   if($data)
//			   {
//			    
//				$config = array(
//				     'source_image' => $data['full_path'],
//				     'new_image' => $config['upload_path'] . '/thumbs/',
//				     'maintain_ratio' => true,
//				     'width' => 25,
//				     'height' => 25
//				 );
//			     //print_r($config);
//			      $this->load->library('image_lib', $config);
//			      $this->image_lib->resize();
//			      $userpicture = $data['file_name'];
//			      //echo $userpicture;die;
//			   }
//			
//			}
//			
//			$new_image_data=array(
//			    'image' => $userpicture
//			);
//			$this->db->where('id', $lastid);
//			$insert_image = $this->db->update('subcategory',$new_image_data);
//			
//			}
//		}
                
		
		
		
        }
	
	public function getDatacountry($category_id)
	{
		$this->db->where('id',$category_id);
		$query=$this->db->get('country');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $Type_data)
			{
				$data[]=$Type_data;
			}
		}
		return $data;
	}
	public function edit_country()
	{
                $this->db->select('country_name');
		$this->db->where('country_name', $this->input->post('Country_name_en'));
		$query = $this->db->get('country');
		if ($query->num_rows() == 0) {
		//echo $update_category_date;die;
		$new_categorytype_insert_data = array(
			'country_name' => $this->input->post('Country_name_en'),
			'iso_alpha2' => $this->input->post('country_code'),
			'status' => $this->input->post('status'),
		);
		
		$this->db->where('id', $this->input->post('id'));
		$insert = $this->db->update('country',$new_categorytype_insert_data);
		//echo $this->db->last_query();die;
		$update_specialist_id=$this->input->post('id');
		$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Country updated successfully</strong></div>');
		}
			
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update country type. Please try again</strong></div>');
			
		
	}
	
	public function delete_country()
	{
		$returnvalue=0;
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$query = $this->db->delete('country');
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Country deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete Country. Please try again</strong></div>');
		return $query;
	}
	public function multiple_country_delete()
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$this->db->where('id', $value);
				$query = $this->db->delete('country');
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Country deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete Country. Please try again</strong></div>');
		
		return $query;
	}
	public function multiple_country_active_inactive($get)
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$new_insert_data['status'] = $get;
				
				$this->db->where('id', $value);
				$query = $this->db->update('country',$new_insert_data);
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Country updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update Country. Please try again</strong></div>');
		
		return $query;
	}
	//........................pagination.......................................//
	function count_all_search_category($searchparams, $active_inactive=0)
	{
		
		if($active_inactive == 1){
			$this->db->order_by("id", "desc");
			$this->db->where('status','1');
			$this->db->like($searchparams);
			$q = $this->db->get('country');
		
			//echo $this->db->last_query();die;
			$q = $this->db->count_all_results();
		
			return $q;
		}else if($active_inactive == 2){
			$this->db->order_by("id", "desc");
			$this->db->where('status','0');
			$this->db->like($searchparams);
			$q = $this->db->get('country');
		
			//echo $this->db->last_query();die;
			$q = $this->db->count_all_results();
		
			return $q;
		}else{
		
		$this->db->like($searchparams);
		
		//}
		$this->db->from('country');
		$q = $this->db->count_all_results();
		//echo $this->db->last_query();die;
		return $q;
		}
	}
	
	function get_search_pagedlist_category($searchparams,$limit, $offset = 0,$active_inactive=0)
	{
 		$data=array();
		if($active_inactive == 1){
			$this->db->order_by("id", "desc");
			$this->db->where('status','1');
			
			$this->db->like($searchparams);
			
			$q = $this->db->get('country',$limit,$offset);
		
			//echo $this->db->last_query();die;
			if($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
			}
			
			
			return $data;
		}
		else if($active_inactive == 2){
			$this->db->order_by("id", "desc");
			$this->db->where('status','0');
			$this->db->like($searchparams);
			$q = $this->db->get('country',$limit,$offset);
		
			//echo $this->db->last_query();die;
			if($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
			}
			
			
			return $data;
		}
		else{
		
		
		$this->db->like($searchparams);
		
		$q = $this->db->get('country',$limit,$offset);
		
		
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
	}	
	
	function count_all_country($searchparams='')
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
		if(isset($searchitems['country_name']))
		{
			$this->db->like('country_name',$searchitems['country_name']);
		}
		
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			if($searchitems['sfield']=='year')
			{
				$searchitems['sfield']='id';
			}
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
		}
		$this->db->from('country');
		$q = $this->db->count_all_results();
		
		return $q;
	}
	
	function get_paged_list_country($limit = 0, $offset = 0,$searchparams='')
	{
		$data="";
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
		if(isset($searchitems['country_name']))
		{
			$this->db->like('country_name',$searchitems['country_name']);
		}
		
		
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			if($searchitems['sfield']=='year')
			{
				$searchitems['sfield']='id';
			}
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
		}
		$q = $this->db->get('country',$limit,$offset);
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
	
	
	
	
}

?>