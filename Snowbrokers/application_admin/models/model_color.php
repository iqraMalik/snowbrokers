<?php

class model_color extends CI_Model {
    
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
				$this->db->where('color_code like "%'.$get_search.'%"');
			}
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('product_color');
			//echo $this->db->last_query();
		}
                
		else
		{
		$this->db->order_by("id", "DESC");
		$q = $this->db->get('product_color');
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
				$this->db->where('color_code like "%'.$get_search.'%"');
			}
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('product_color',$limit,$limit_start);
			
			
		}
		else
		{
			$this->db->order_by("id", "DESC");
			$q = $this->db->get('product_color',$limit,$limit_start);
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
		$this->db->where('status',1);
		$query=$this->db->get('product_color');
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
	public function parentcat()
	{
		$this->db->where('id =', 0);		
		$query=$this->db->get('product_color');
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
		$this->db->where('id',0);
		$this->db->where('status',1);
		$query=$this->db->get('product_color');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $parent_category)
			{
				$data[]=$parent_category;
			}
		}
		return $data;
	}
 
        public function insert_color()
        {
 
		if($this->input->post('category_type')!="")
		{
			$main_id=$this->input->post('category_type');
		}
		if($this->input->post('category_type')=="")
		{
			$main_id=0;
		}
		$query='#'.$this->input->post('color');
		$this->db->where('color_code',$query);
		$query=$this->db->get('product_color');
		if($query->num_rows()>0)
		{
		$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Duplicate entery. Please try again</strong></div>');
		 redirect('product_color/index');
		 }
	        
            $new_member_insert_data = array(
			'color_code' => '#'.$this->input->post('color'),
			'product_type' => $this->input->post('product_type'),
			'product_category' => $this->input->post('product_category'),
			'status' => $this->input->post('status'),
		);
	  
		$insert = $this->db->insert('product_color', $new_member_insert_data);
		//echo $this->db->last_query();die;
		$lastid=$this->db->insert_id();
		
                
		
		
//		if($insert)
//                {
//			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Article added successfully</strong></div>');
//                }
//		else
//                {
//			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to add article. Please try again</strong></div>');
			
		return $insert;
		//}
        }
	public function getDataCategory($category_id)
	{
		$this->db->order_by("id", "desc"); 
		$this->db->where('id',$category_id);
		$query=$this->db->get('product_color');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $Type_data)
			{
				$data[]=$Type_data;
			}
		}
		return $data;
	}
        public function edit_category()
	{
                if($this->input->post('category_type')!="")
		{
			$main_id=$this->input->post('category_type');
		}
		if($this->input->post('category_type')=="")
		{
			$main_id=0;
		}
		//echo $update_category_date;die;
		$result=$this->input->post('chk');
	        $product_id=implode(" ,",$result);
	       
		 $new_member_insert_data = array(
			'color_code' =>'#'. $this->input->post('color'),
			'product_type' => $this->input->post('product_type'),
			'product_category' => $this->input->post('product_category'),
			'status' => $this->input->post('status'),
		);
		
		$this->db->where('id', $this->input->post('id'));
		$insert = $this->db->update('product_color',$new_member_insert_data);
		//echo $this->db->last_query();die;
		$update_specialist_id=$this->input->post('id');
		
		

		if($insert)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product color updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update Product color. Please try again</strong></div>');
			
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
				$query = $this->db->delete('product_color');
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product color deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete Product color. Please try again</strong></div>');
		
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
				$query = $this->db->update('product_color',$new_insert_data);
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product color updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update Product color. Please try again</strong></div>');
		
		return $query;
	}
        public function delete_category()
	{
		$returnvalue=0;
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$query = $this->db->delete('product_color');
		
		if($query)
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Product color  deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to delete Product color. Please try again</strong></div>');
		return $query;
	}
	// ...............pagination............................//
	public function get_username($user_name)
	{
		$this->db->where('color_code', $user_name);
		$query = $this->db->get('product_color');
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
		$q = $this->db->get('product_color',$limit,$offset);
		
		
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
		$this->db->from('product_color');
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
		
		$q = $this->db->get('product_color',$limit,$offset);
		
		
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
		$this->db->from('product_color');
		
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
		if(isset($searchitems['color_code']))
		{
			$color_code = array('color_code'=>$searchitems['color_code']);
			$this->db->like($color_code);
		}
		
		if(isset($searchitems['product_title']))
		{
			$title = array('color_code'=>$searchitems['product_title']);
			$this->db->like($title);
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
			$this->db->order_by("id", "desc");
		}
		$this->db->from('product_color');
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
		
		if(isset($searchitems['color_code']))
		{
			$color_code = array('color_code'=>$searchitems['color_code']);
			$this->db->like($color_code);
		}
		//if(isset($searchitems['name']))
		//{
		//	$title = array('name'=>$searchitems['name']);
		//	$this->db->like($title);
		//}
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			if($searchitems['sfield'] == 'cat_name')
			{
				$searchitems['sfield'] ='name';
			}
			if($searchitems['sfield'] == 'parent_cat')
			{
				$searchitems['sfield'] ='id';
			}
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
		}
		$q = $this->db->get('product_color',$limit,$offset);
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
	function chk()
	{
		$this->db->select('*');
		$this->db->where('status',1);
		$this->db->from('product_category');
	        $query = $this->db->get();
               return $query->result(); 
		
		
	}
	
	function product_type(){
		
		$this->db->select('*');
		$this->db->from('product_type');
		$this->db->where('status',1);
	        $query = $this->db->get();
		
                return $query->result(); 
	}
	
	function choose_category($ptype){
		
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('main_id',$ptype);
		//$this->db->where('status',1); 
	        $query = $this->db->get();
		
                return $query->result(); 
	}
	
	function get_type($pid){
		
		$this->db->select('*');
		$this->db->from('product_type');
		$this->db->where('id',$pid);

	        $query = $this->db->get();
		
                return $query->result(); 
	}
	
	function get_category($pcat){
		
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('id',$pcat);

	        $query = $this->db->get();
		
                return $query->result(); 
	}
}
?>