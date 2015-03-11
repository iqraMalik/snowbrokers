<?php
class Admin_users_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

   

    /**
    * Fetch manufacturers data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_reg($id)
    {
	    //echo "select * from users where `id`= $id";
	    //exit;
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
        
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }
    
    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_user_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	public function get_pages($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('*');
		$this->db->from('users');

		if($search_string){
			$this->db->like('first_name', $search_string);
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
		$this->db->select('*');
		$this->db->from('users');

		if($search_string){
			$this->db->like('first_name', $search_string);
		}
		$this->db->group_by('id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
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
    function store_user($table,$data)
    {		
		$insert = $this->db->insert($table, $data);
		return $insert;
    }
	
	function select_cat_list()
    {
    	$this->db->select('*');
		$this->db->from('category');		
		$this->db->where('parent_id', 0);
		$query = $this->db->get();
		return $query->result_array();    
    }
	
	
    function update_user($id, $data)
    {
	    $this->db->where('id', $id);
	    $this->db->update('users', $data);
	    $report = array();
	    $report['error'] = $this->db->_error_number();
	    $report['message'] = $this->db->_error_message();
	    if($report !== 0){
		    return true;
	    }else{
		    return false;
	    }
    }
     function active_update_user($active,$data)
    {
	    $this->db->where('activation_key', $active);
	    $this->db->update('users', $data);
	    return true;
    }
	
 	function delete_page($id){
		$this->db->where('id', $id);
		$this->db->delete('users'); 
	}
	
}
?>