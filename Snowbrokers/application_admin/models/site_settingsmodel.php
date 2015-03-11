<?php

class site_settingsmodel extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	
	public function getsite_settings()
	{
		$query = $this->db->get('site_settings');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$data[$row->field_name] = $row->field_value;
			}
			
			return $data;
		}
		else
		{
			return 0;
		}
	}
	public function updatesite_settings()
	{
		//print_r($_FILES);
		
		
		$site_settings=$this->input->post('site_settings');
		
		$allbox=count($site_settings);
		
		if($allbox>0)
		{
			foreach($site_settings as $key=>$value)
			{
				
				$new_insert_data['field_value'] = $value;
				
				$this->db->where('field_name', $key);
				$query = $this->db->update('site_settings',$new_insert_data);
				
			
			}
		}
		
		else
		{
			$query=0;
		}	
		
		if($_FILES['bg_img']['name'] !="")
		{
			$_FILES['bg_img']['name'] = 'banner.jpg';
			
			//echo "heelo";die;
		
			$this->load->library('image_lib');
			//$img=$_FILES[$site_settings['photo']]['name'];
			$file = $_FILES['bg_img']['tmp_name'];
			$test=getimagesize($file);
			$height=$test[1];
			$width=$test[0];
			
			if($_FILES['bg_img']['name']!="")
			{
				
				//if($height==36 && $width==190)
				//{
					if (($_FILES["bg_img"]["type"]== "image/jpeg") || ($_FILES["bg_img"]["type"]== "image/JPEG") || ($_FILES["bg_img"]["type"]== "image/jpg") || ($_FILES["bg_img"]["type"]== "image/JPG") || ($_FILES["bg_img"]["type"] == "image/gif") || ($_FILES["bg_img"]["type"]== "image/GIF") || ($_FILES["bg_img"]["type"]== "image/png") || ($_FILES["bg_img"]["type"]== "image/PNG"))
					{
						
						
					$DIR_IMG_NORMAL = LOGO_PATH.'assets/images/';
						
					$DIR_IMG_THUMB = LOGO_PATH.'assets/images/thumb/';
						$arra1 = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','/','*','+','~','`','=');
						$arra2 = array('','','','','','','','','','','','','','','','','','','','','','','','','');
						$filename = '';
						$filename = str_replace($arra1, $arra2, $_FILES['bg_img']['name']);
						
			
			               
			
		                        $s=$filename;
				                $fileNormal = $DIR_IMG_NORMAL.$s;
					        $fileThumb = $DIR_IMG_THUMB.$s;
						
						$file = $_FILES['bg_img']['tmp_name'];
						
												
						if(move_uploaded_file($file, $fileNormal))
						{
							//echo 'hello1';die;
							
							$config = array(
								'source_image' => $fileNormal,
								'new_image' => $fileThumb,
								'maintain_ratio' => true,
								'width' => 190,
								'height' => 36
							 );
							
							$this->image_lib->clear();
							$this->image_lib->initialize($config);
							$this->image_lib->resize();
							
						$new_insert_data_image['field_value'] = $_FILES['bg_img']['name'];
						$this->db->where('id',103);
		                $query = $this->db->update('site_settings',$new_insert_data_image);	
						//echo $this->db->last_query();die;	  
								
						}
					}
				//}
				//else{
				//$this->session->set_userdata('error_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>The file size should be 190x36</strong></div>');	
				//}
				
			}
			}	//image//
		
		if($query)
		{
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Data are saved successfully</strong></div>');
		}
		else
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to save data. Please try again</strong></div>');
			
		
		}
		return $query;
	
	
	}
	public function per_page()
	{
		$this->db->where('field_name','admin_resultsPerPage');	
		$query = $this->db->get('site_settings');
		$query2=$query->row();
		return $query2->field_value;	
	}
	public function image()
	{
		$this->db->where('id',100);	
		$query = $this->db->get('site_settings');
		$query2=$query->row();
		return $query2->field_value;	
	}
}
?>

