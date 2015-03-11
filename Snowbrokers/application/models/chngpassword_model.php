<?php
class Chngpassword_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Update password
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_password($data)
    {
		$id = '1';
		$this->db->where('id', $id);
		$this->db->update('admin', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
		    
		    $this->session->set_flashdata('flash_message', 'pass_updated');
			return true;
		}else{
		    $this->session->set_flashdata('flash_message', 'pass_not_updated');
			return false;
		}
    }
 
}
?>