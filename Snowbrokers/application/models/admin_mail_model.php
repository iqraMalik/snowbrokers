<?php
class Admin_mail_model extends CI_model
{
      public function __construct()
    {
        $this->load->database();
        $this->load->library('javascript');
    }

	public function get_pages($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('*');
		$this->db->from('mail');

		if($search_string){
			$this->db->like('mailid', $search_string);
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
    function count_pages($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('mail');

		if($search_string){
			$this->db->like('mailid', $search_string);
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
    function store_user($table,$data)
    {		//print_r($data);
		$insert = $this->db->insert($table, $data);
                return $insert;
                }
                
                function delete_page($id){
		$this->db->where('id', $id);
		$this->db->delete('mail'); 
	}
         public function get_reg($id)
    {
	    
		$this->db->select('*');
		$this->db->from('mail');
		$this->db->where('id', $id);
        
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }
    function update_user($id, $data)
    {
      echo $id;
      print_r($data);
	    $this->db->where('id', $id);
	    $this->db->update('mail', $data);
	    $report = array();
	    $report['error'] = $this->db->_error_number();
	    $report['message'] = $this->db->_error_message();
	    if($report !== 0){
		    return true;
	    }else{
		    return false;
	    }
    }
      public function get_user_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('mail');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    public function mailid($id)
    {
                $this->db->select('*');
		$this->db->from('mail');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
}