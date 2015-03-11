<?php

class modelnewsletr_subscription_management extends CI_Model {

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
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	

	
	
	public function multiple_active_inactive($get)
	{
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$new_insert_data['status'] = $get;
				
				$this->db->where('id', $value);
				$query = $this->db->update('newsleter_subscription',$new_insert_data);
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Newsleter updated successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to updated newsleter. Please try again</strong></div>');
		return $query;
	}

	public function getAllSlider($search_option,$get_search) 
	{
		if(($search_option!="") && ($get_search!=""))
		{
			$this->db->where($search_option." like","%".$get_search."%");
		}
		
		$q = $this->db->get('newsleter_subscription');
		
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function getSlider($search_option,$get_search,$limit_start=0,$limit=0) 
	{
		if(($search_option!="") && ($get_search!=""))
		{
			$this->db->where($search_option." like","%".$get_search."%");
		}
		
		$q = $this->db->get('newsleter_subscription',$limit,$limit_start);
		
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	
	public function create_newsleter_subscription_management()
	{
		$this->db->select('email');
                $this->db->from('newsleter_subscription');
                $this->db->where('email',$this->input->post('email'));
                $query = $this->db->get();
                if($query->num_rows == 0)
		{
		$new_data = array(
				
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status')
				);
		
		$insert = $this->db->insert('newsleter_subscription', $new_data);
		

		return $insert;
		}	
	}
		
	
	
	public function edit_news_channel()
	{
			$id=$this->input->post('ListingUserid');
		
		$this->db->where("id",$id);
		$query = $this->db->get('newsleter_subscription');
		if($query->num_rows()>0)
		{
			$data=$query->row(); 
			
			return $data;
		}
		
	}
	
	public function update_newsleter_subscription_management()
        {
		$message="";
		$error=0;
		//echo $this->input->post('id');die;
		
		if($error==0)
		{
			$new_destination_data = array(
				
				'email' => $this->input->post('email'),
				
				'status' => $this->input->post('status')
			);
		    $this->db->where('id', $this->input->post('id'));
		  //  print_r($new_destination_data);die;
		  //echo $this->input->post('id');die;
			$insert = $this->db->update('newsleter_subscription',$new_destination_data);
			if($insert)
			{
				
				$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>destination Updated successfully</strong></div>');
			}
			else
			{
				$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to update destination. Please try again</strong></div>');
				
			
			}
			return $insert;
		}
		else
		{
			echo $message;
		}
	}
	
	
	public function delete_newsleter_subscription_management()
	{
		
		
		$this->db->where('id', $this->input->post('ListingUserid'));
		$query = $this->db->delete('newsleter_subscription');
		if($query)
		{
		return true;
		}
		else{
			return false;
		}
	}
	
	public function multiple_delete()
	{
		//echo "hello";die;
		$scripts=$this->input->post('scripts');
		
		$allbox=count($scripts);
		
		if($allbox>0)
		{
			foreach($scripts as $key=>$value)
			{
				$this->db->where('id', $value);
				$query = $this->db->delete('newsleter_subscription');
			}
		}
		else
		{
			$query=0;
		}
		
		if($query)
			$this->session->set_userdata('success_msg', '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>newsleter deleted successfully</strong></div>');
		else
			$this->session->set_userdata('error_msg', '<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to deleted newsleter. Please try again</strong></div>');
		return $query;
	}
	// ...............pagination............................//
	public function get_username($user_name)
	{
		$this->db->where('name', $user_name);
		$query = $this->db->get('newsleter_subscription');
		$onlyonedata=$query->row();
		return $onlyonedata;
	}
	
	
	//-------------------Pagination for Slider(12-06-2014)------Jayatish-------------------------//
	
	function count_all_slider($searchparams='')
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

		if(isset($searchitems['email']))
		{
			$answer = array('email'=>$searchitems['email']);
			$this->db->like($answer);
		}
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
		}
		$this->db->from('newsleter_subscription');
		$q = $this->db->count_all_results();
		
		return $q;
		
	}
	
	function get_paged_list_slider($limit = 0, $offset = 0,$searchparams='')
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

		if(isset($searchitems['email']))
		{
			$answer = array('email'=>$searchitems['email']);
			$this->db->like($answer);
		}
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
		}
		$q = $this->db->get('newsleter_subscription',$limit,$offset);
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

