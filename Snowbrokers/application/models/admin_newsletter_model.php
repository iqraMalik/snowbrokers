<?php
class Admin_newsletter_model extends CI_Model {
 
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

   public function get_pages($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {

		//query to get all pagination data and all the product listing data
		$this->db->select('*');
		$this->db->from('newsletter');
		 
		if($search_string)
		{
			$this->db->like('email', $search_string);
		}
		$this->db->group_by('id');

		if($order)
		{
			$this->db->order_by($order, $order_type);
		}
		else
		{
		    $this->db->order_by('id', $order_type);
		}

		if($limit_start && $limit_end){
		 $this->db->limit($limit_start, $limit_end);	
		}
        
		if($limit_start != null)
		{
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
		//$this->db->select('product.id, product.name, product.category, product.status');
		//$this->db->from('`product`, product pt');
		$this->db->select('*');
		$this->db->from('newsletter');
		if($search_string)
		{
			$this->db->like('email', $search_string);
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
    function store_product($table,$data)
    {		
		$insert = $this->db->insert($table, $data);
		return $insert;
    }	

    function update_product($id, $data)
    {
	    $this->db->where('id', $id);
	    $this->db->update('product', $data);
	    $report = array();
	    $report['error'] = $this->db->_error_number();
	    $report['message'] = $this->db->_error_message();
	    if($report !== 0){
		    return true;
	    }else{
		    return false;
	    }
    }
	
    function delete_product($id)
    {
	    $this->db->where('id', $id);
	    $this->db->delete('product'); 
    }

    public function get_product_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }	
}
?>