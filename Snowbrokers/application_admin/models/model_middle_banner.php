<?php

class model_middle_banner extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function getsite_settings()
	{
		$query = $this->db->get('middle_banner');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$data['image'] = $row->image;
				$data['detail'] = $row->detail;	
			}
			
			return $data;
		}
		else
		{
			return 0;
		}
	}
	public function edit_banner_home_footer($id)
	{
			//$id=$this->input->post('ListingUserid');
		
		$this->db->where("id",$id);
		$query = $this->db->get('middle_banner');
		if($query->num_rows()>0)
		{
			$data=$query->row(); 
			
			return $data;
		}
		
	}
	public function update_top_banner()
	{
		$this->load->library('image_lib');
		
		//print_r($_FILES);
		//print_r(getimagesize($_FILES['image']['tmp_name']));
		//die();
		
		
		
		
		
		
		//$new_insert_data['details']=$this->input->post('details');
		//
		//$allbox=count($new_insert_data);
		//$message=0;
		//
		//if($allbox>0)
		//{
		//	
		//	$query = $this->db->update('middle_banner',$new_insert_data);
		//	$message=1;
		//}
		//else
		//{
		//	$query=0;
		//	$message=2;
		//}
		//print_r($_FILES['image']);
		//die();
		
		//=============upload image=============//
		
		if($_FILES['image']['name'] !="")
		{
		
			$file = $_FILES['image']['tmp_name'];
			$test=getimagesize($file);
			$height=$test[1];
			$width=$test[0];
				
			if($height==512 && $width==528)
			{
				if (($_FILES["image"]["type"]== "image/jpeg") || ($_FILES["image"]["type"]== "image/JPEG") || ($_FILES["image"]["type"]== "image/jpg") || ($_FILES["image"]["type"]== "image/JPG") || ($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"]== "image/GIF") || ($_FILES["image"]["type"]== "image/png") || ($_FILES["image"]["type"]== "image/PNG"))
				{
					
					
					$DIR_IMG_NORMAL = LOGO_PATH.'images/footerimage/';
					$DIR_IMG_THUMB = LOGO_PATH.'images/footerimage/thumbnail/';
					
					$arra1 = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','/','*','+','~','`','=');
					$arra2 = array('','','','','','','','','','','','','','','','','','','','','','','','','');
					$filename = '';
					$filename = str_replace($arra1, $arra2, $_FILES['image']['name']);
		
					$s=$filename;
					$fileNormal = $DIR_IMG_NORMAL.$s;
					$fileThumb = $DIR_IMG_THUMB.$s;
					
					$file = $_FILES['image']['tmp_name'];
					
					
					if(move_uploaded_file($file, $fileNormal))
					{
						//echo 'hello1';die;
						
						$config = array(
							'source_image' => $fileNormal,
							'new_image' => $fileThumb,
							'maintain_ratio' => true,
							'width' => 528,
							'height' => 512
						 );
						
						$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
						
						$image_url=$this->config->item('banner_img_url');
						$image = $image_url.$_FILES['image']['name'];	
					}
				}
			}
			else
			{
				
				//$query=4;
				////$message=4;
				$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>The file size should be 528x512</strong></div>');	
			}
		}
		else
		{
			$image='';
		}
		
		//=============upload image=============//

		//=============upload icon=============//

		if($_FILES['image_icon']['name'] !="")
		{
			$file_icon = $_FILES['image_icon']['tmp_name'];
			$test_icon=getimagesize($file_icon);
			$height_icon=$test_icon[1];
			$width_icon=$test_icon[0];
			//echo 	$_FILES['image_icon']['name'];die;
			//if($height_icon==60 && $width_icon==430)
			//{
				if (($_FILES["image_icon"]["type"]== "image/jpeg") || ($_FILES["image_icon"]["type"]== "image/JPEG") || ($_FILES["image_icon"]["type"]== "image/jpg") || ($_FILES["image_icon"]["type"]== "image/JPG") || ($_FILES["image_icon"]["type"] == "image/gif") || ($_FILES["image_icon"]["type"]== "image/GIF") || ($_FILES["image_icon"]["type"]== "image/png") || ($_FILES["image_icon"]["type"]== "image/PNG"))
				{
					//echo LOGO_PATH;
					//die();
					
					$DIR_IMG_ICON_NORMAL = LOGO_PATH.'images/footerimage/icon/';
					$DIR_IMG_ICON_THUMB = LOGO_PATH.'images/footerimage/icon/thumbnail/';
					
					$arra1 = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','/','*','+','~','`','=');
					$arra2 = array('','','','','','','','','','','','','','','','','','','','','','','','','');
					
					$filename_icon = '';
					$filename_icon = str_replace($arra1, $arra2, $_FILES['image_icon']['name']);
					
		
					$s_icon=$filename_icon;
					$fileNormal_icon = $DIR_IMG_ICON_NORMAL.$s_icon;
					$fileThumb_icon = $DIR_IMG_ICON_THUMB.$s_icon;
					
					//echo $fileNormal_icon = $DIR_IMG_ICON_NORMAL.$s_icon;
					//die();
					
					$file_icon = $_FILES['image_icon']['tmp_name'];
						
					if(move_uploaded_file($file_icon, $fileNormal_icon))
					{
							
						$config_icon = array(
							'source_image' => $fileNormal_icon,
							'new_image' => $fileThumb_icon,
							'maintain_ratio' => true,
							'width' => 430,
							'height' => 60
						 );
						
						$this->image_lib->clear();
						$this->image_lib->initialize($config_icon);
						$this->image_lib->resize();
						
						$image_url_icon=$this->config->item('banner_img_url');
						$image_icon = $image_url_icon.'icon/thumbnail/'.$_FILES['image_icon']['name'];
					}
				}
			//}
		}
		else
		{
			$image_icon='';
			//$query=4;
			//$message=4;
			//$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>The file size should be 430x60</strong></div>');	
		}
		
		//=============upload icon=============//
		
		//=======select array to update========//
		//echo $image.'##'.$image_icon;
		if($image=='' && $image_icon=='')
		{
			//echo 1;
			$data_to_update=array(
				'details'=>$this->input->post('details')
				);
		}
		else if($image!='' && $image_icon=='')
		{
			//echo 2;
			$data_to_update=array(
				'image'=>$image,
				'details'=>$this->input->post('details')
				);
		}
		else if($image=='' && $image_icon!='')
		{
			//echo 3;
			$data_to_update=array(
				'icon'=>$image_icon,
				'details'=>$this->input->post('details')
				);
		}
		else if($image!='' && $image_icon!='')
		{
			//echo 4;
			$data_to_update=array(
				'image'=>$image,
				'icon'=>$image_icon,
				'details'=>$this->input->post('details')
				);
		}
		
		//print_r($data_to_update);
		
		//die();
		
		//=======select array to update========//
		
		$this->db->where('id',1);
		$query = $this->db->update('middle_banner',$data_to_update);	
		
		//echo $this->db->last_query();
		//die;
		
		if($query)
		{
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Data saved successfully</strong></div>');
		}
		else
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to save data. Please try again</strong></div>');
		}
		return $query;
	
	
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
	public function per_page()
	{
		$this->db->where('field_name','admin_resultsPerPage');	
		$query = $this->db->get('site_settings');
		$query2=$query->row();
		return $query2->field_value;	
	}
	//public function image()
	//{
	//	$this->db->where('id',100);	
	//	$query = $this->db->get('site_settings');
	//	$query2=$query->row();
	//	return $query2->field_value;	
	//}
	function count_all_slider($searchparams='')
	{
		$key='';
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

		if(isset($searchitems['heading']))
		{
			$answer = array('title'=>$searchitems['heading']);
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
		$this->db->from('middle_banner');
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

		if(isset($searchitems['heading']))
		{
			$answer = array('heading'=>$searchitems['heading']);
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
		$q = $this->db->get('middle_banner',$limit,$offset);
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
?>

