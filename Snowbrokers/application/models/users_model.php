<?php

class Users_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	function validate($user_name, $password)
	{
		$this->db->where('user_name', $user_name);
		$this->db->where('pass_word', $password);
		$query = $this->db->get('admin');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}
	
	public function get_site_name()
	{
		    $id = '1';
		    $this->db->select('site_name');
		    $this->db->from('settings');
		    $this->db->where('id', $id);
		    $query = $this->db->get();
		    $ret = $query->row();
		    return $ret->site_name;
	}

    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	function get_db_session_data()
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
	
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	
	function create_member()
	{

		$this->db->where('user_name', $this->input->post('username'));
		$query = $this->db->get('admin');

        if($query->num_rows > 0){
        	echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Username already taken";	
			echo '</strong></div>';
		}else{

			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_addres' => $this->input->post('email_address'),			
				'user_name' => $this->input->post('username'),
				'pass_word' => md5($this->input->post('password'))						
			);
			$insert = $this->db->insert('admin', $new_member_insert_data);
		    return $insert;
		}
	      
	}//create_member
	
	function store_user($table,$data)
	{		
		$insert = $this->db->insert($table, $data);
		return $insert;
	}
	
	function check_exist($email)
	{
		//echo $email; 
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		
		if($query->num_rows > 0)
		{
			return true;
		}
	}
	
	//login function
	
	function login_validate($user_email, $password)
	{
		$this->db->where('email', $user_email);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}


	public function get_id_by_name($u_name,$table){
		$this->db->select('id');
		$this->db->from($table);
		$this->db->where('email', $u_name);
        
		$query = $this->db->get();
		
		return $query->result_array(); 
	}
}