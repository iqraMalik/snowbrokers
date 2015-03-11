<?php
class Admin_category_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

   
    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_category_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
     public function get_perent_name($id)
    {
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
    public function get_pages($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		/*$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id >', 0);*/
		
		$this->db->select('category.id, category.name, category.parent_id, category.status, pt.name parent_name');
		$this->db->from('`category`, category pt');
		//$this->db->where('category.parent_id = pt.id');
		//$this->db->where('category.id >', 0);
		
		 /*
		 	SELECT category.id, category.name, category.parent_id, category.status, pt.name parent_name
			FROM `category` , category pt
			WHERE category.parent_id=pt.id
		 */
		 
		if($search_string){
			$this->db->like('category.name', $search_string);
		}
		$this->db->group_by('id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}

        if($limit_start && $limit_end){
         $this->db->limit($limit_start, $limit_end);	
        }
        
        if($limit_start != null){
         $this->db->limit($limit_start, $limit_end);    
        }
        
		$query = $this->db->get();
		
		return $query->result_array();		
    }
    
	/**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_pages($search_string=null, $order=null)
    {
		$this->db->select('category.id, category.name, category.parent_id, category.status, pt.name parent_name');
		$this->db->from('`category`, category pt');
		//$this->db->where('category.parent_id = pt.id');
		//$this->db->where('category.id >', 0);
		if($search_string)
		{
			$this->db->like('category.name', $search_string);
		}
		$this->db->group_by('id');
		if($order)
		{
			$this->db->order_by($order, $order_type);
		}
		else
		{
		    $this->db->order_by('id', 'Asc');
		}

		$query = $this->db->get();
		return $query->num_rows();        
    }
	
    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_category($table,$data)
    {		
		$insert = $this->db->insert($table, $data);
		return $insert;
    }	
	
	/*
	 * this function is use in 'admin_category.php' controller
	 * this function is use in 'home.php' controller
	 * to load all list name of Categories
	 */
	//get category names
    function select_category_list()
    {
		$this->db->select('*');
		$this->db->from('category');		
		$this->db->where('parent_id', 0);
		$this->db->where('id >', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
    
    //get all category names
    function select_category_list_all()
    {
		$this->db->select('*');
		$this->db->from('category');		
		//$this->db->where('status', 'Y');
		$this->db->where('parent_id', 0);
		$this->db->where('id >', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
	
	/*
	 * this function is use in 'home.php' controller
	 * to load all list name of sub Categories OR Products
	 */	 
    function select_Subcategory_list()
    {
		$this->db->select('*');
		$this->db->from('category');		
		$this->db->where('parent_id >', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
	
	// to get the value of all attributes list
    function get_attributes()
   {
	$this->db->select('*');
	$this->db->from('attributes');
	$query = $this->db->get();
	return $query->result_array();
   }
	
	
    function select_return_list()
    {
    	$this->db->select('*');
		$this->db->from('return_policy');		
		//$this->db->where('parent_id', 0);
		$this->db->where('id >', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
    
	// to get the green printing value from table
    function select_greenprinting_list()
    {
    	$this->db->select('*');
		$this->db->from('green_printing');		
		//$this->db->where('parent_id', 0);
		$this->db->where('id >', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
	
	//
    function select_privacy_list()
    {
    	$this->db->select('*');
		$this->db->from('privacy_policy');		
		//$this->db->where('parent_id', 0);
		$this->db->where('id >', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
	
	//
    function select_shipping_list()
    {
    	$this->db->select('*');
		$this->db->from('shipping_static');		
		//$this->db->where('parent_id', 0);
		$this->db->where('id >', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
	
	
    function select_promise_list()
    {
    	$this->db->select('*');
		$this->db->from('promise');		
		//$this->db->where('parent_id', 0);
		$this->db->where('id >', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
	
	
    function select_service_list()
    {
    	$this->db->select('*');
		$this->db->from('service');		
		//$this->db->where('parent_id', 0);
		$this->db->where('id >', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
    
    function update_category($id, $data)
    {
	    $this->db->where('id', $id);
	    $this->db->update('category', $data);
	    $report = array();
	    $report['error'] = $this->db->_error_number();
	    $report['message'] = $this->db->_error_message();
	    if($report !== 0){
		    return true;
	    }else{
		    return false;
	    }
    }
    //**************ANUPAM 25 th Apr***********************
    function select_terms_list()
    {
    	$this->db->select('*');
	$this->db->from('terms');
	$this->db->where('id', 1);
	$query = $this->db->get();
	return $query->result_array(); 
    
	    
	    
    }
    function select_terms_rules_list()
    {
    	$this->db->select('*');
	$this->db->from('terms_rules');
	$this->db->where('status', 'Y');
	$query = $this->db->get();
	return $query->result_array();    
    }
    
    function select_trade_list()
    {
    	$this->db->select('*');
	$this->db->from('template_trade');
	$this->db->where('status', 'Y');
	$query = $this->db->get();
	return $query->result_array(); 
    }
    function select_sub_trade_list($id)
    {
	$this->db->select('*');
	$this->db->from('template_trade');
	$this->db->where('parent_id', $id);
	$this->db->where('status', 'Y');
	$query = $this->db->get();
	return $query->result_array(); 
    }
	
    function delete_cat($id)
    {
	    $this->db->where('id', $id);
	    $this->db->delete('category'); 
    }
	
}
?>