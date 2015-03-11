<?php
class Admin_currency_model extends CI_Model {
 
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
		$this->db->from('currency');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
    public function get_pages($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('*');
		$this->db->from('currency');
		$this->db->where('id >', 0);
		
		//$this->db->select('category.id, category.name, category.parent_id, category.status, pt.name parent_name');
		//$this->db->from('`category`, category pt');
		//$this->db->where('category.parent_id = pt.id');
		//$this->db->where('category.id >', 0);
		
		 /*
		 	SELECT category.id, category.name, category.parent_id, category.status, pt.name parent_name
			FROM `category` , category pt
			WHERE category.parent_id=pt.id
		 */
		 
		if($search_string){
			$this->db->like('currency_name', $search_string);
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
		$this->db->from('currency');
		$this->db->where('id >', 0);
		//$this->db->select('category.id, category.name, category.parent_id, category.status, pt.name parent_name');
		//$this->db->from('`category`, category pt');
		//$this->db->where('category.parent_id = pt.id');
		//$this->db->where('category.id >', 0);
		if($search_string)
		{
			$this->db->like('currency_name', $search_string);
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
    
    function store_currency($table,$data)
    {
	   // TRUNCATE TABLE  currency ;
	
	    
		$insert = $this->db->insert($table, $data);
		return $insert;
    }
    
     function delete_currency($id)
    {
	    $this->db->where('id', $id);
	    $this->db->delete('currency'); 
    }
    function truncate()
    {
	$qr =  mysql_query("TRUNCATE TABLE  currency ");
    }
}