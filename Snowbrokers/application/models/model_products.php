<?php
class Model_products extends CI_Model {
    
    function construct()
    {
        parent::_construct();
        
        
        
    }
    
    function getTypes()
    {
	$this->db->where('status',1);
	$this->db->order_by('rearrange', 'asc');
        $q = $this->db->get('product_type');
	if($q->num_rows() > 0)
	{
	    $fields = $q->result_array();
	    //$reason = $fields->a_desc;
	    return $fields;
	}
    }
    
    function getTypes_specific($id)
    {
	$this->db->where('id',$id);
        $q = $this->db->get('product_type');
	if($q->num_rows() > 0)
	{
	    $fields = $q->result_array();
	    //$reason = $fields->a_desc;
	    return $fields;
	}
    }    
    function getSubCategories($id)
    {
        $this->db->where('status',1);
	 $this->db->order_by('name','asc');
        $this->db->where('main_id',$id);
        $q = $this->db->get('product_category');
	if($q->num_rows() > 0)
	{
	    $fields = $q->result_array();
	    //$reason = $fields->a_desc;
	    return $fields;
	}
        else
        {
            return 0;
        }
    }
    function getSubCategories_specific($id)
    {
        $this->db->where('id',$id);
        $q = $this->db->get('product_category');
	if($q->num_rows() > 0)
	{
	    $fields = $q->result_array();
	    //$reason = $fields->a_desc;
	    return $fields;
	}
        else
        {
            return 0;
        }
    }
    //pagination start
    	public function count_all_pro($searchparams='',$prod_name='')
	{
		if($prod_name!='')
		{
		    $this->db->like('title', $prod_name);
		}
		else
		{
		    if($searchparams!='')
		    {
			$this->db->like('product_tag', $searchparams);
		    }
		    
		    $this->db->where('product_type_id', $this->uri->segment(3));
		    $this->db->where('product_cat_id', $this->uri->segment(4));
		}
		
		$this->db->where('status',1);
		$this->db->order_by("id", "desc");
                
		$this->db->from('product');
		//$this->db->get();
		//echo $this->db->last_query();exit;
		//echo "<br />";
		$q = $this->db->count_all_results();
		
		return $q;
		//die();
	}
	public function get_paged_list_cat($limit = 0, $offset = 0,$searchparams='')
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
		
		if(isset($searchitems['size_type']))
		{
			$size_type = array('size_type'=>$searchitems['size_type']);
			$this->db->like($size_type);
		}
		//if(isset($searchitems['name']))
		//{
		//	$title = array('name'=>$searchitems['name']);
		//	$this->db->like($title);
		//}
		if(isset($searchitems['sfield']) && isset($searchitems['stype']) && !empty($searchitems['sfield']) && !empty($searchitems['stype']))
		{
			if($searchitems['sfield'] == 'cat_name')
			{
				$searchitems['sfield'] ='name';
			}
			if($searchitems['sfield'] == 'parent_cat')
			{
				$searchitems['sfield'] ='id';
			}
			$this->db->order_by($searchitems['sfield'],$searchitems['stype']);
		}
		else
		{
			$this->db->order_by("id", "desc");
		}
                $this->db->where('product_type_id', $this->uri->segment(3));
                $this->db->where('product_cat_id', $this->uri->segment(4));
		$this->db->where('status',1);
		
		$q = $this->db->get('product',$limit,$offset);
		//echo $this->db->last_query();
		//die();
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row)
			{
				$data[] = $row;
			}
			
			return $data;
		}
	}
	public function get_paged_list_products($position=0,$group_number=0,$product_type_id=0,$product_cat_id=0,$tagname='',$allsearch='')
	{
	    if($tagname!='')
	    {
		$result = $this->db->query('SELECT * FROM product WHERE product_type_id="'.$product_type_id.'" AND status=1 AND product_cat_id="'.$product_cat_id.'" AND product_tag LIKE "%'.$tagname.'%" ORDER BY id DESC LIMIT '.$position.', '.$group_number);
	    }
	    else if($allsearch!='')
	    {
		$result = $this->db->query('SELECT * FROM product WHERE status=1 AND title LIKE "%'.$allsearch.'%" ORDER BY id DESC LIMIT '.$position.', '.$group_number);
	    }
	    else
	    {
		$result = $this->db->query('SELECT * FROM product WHERE product_type_id="'.$product_type_id.'" AND status=1 AND product_cat_id="'.$product_cat_id.'" ORDER BY id DESC LIMIT '.$position.', '.$group_number);
	    }
	    
	    $result_array = $result->result_array();
	    
	    return $result_array;
	}
	//......................pagination.......................//
	
	function get_user_by_pass($uid,$new_pass)
	{
	    //print_r($new_pass);
	    $this->db->select('*');
	    $this->db->from('people');
	    $this->db->where('id', $uid);
	   // $this->db->where('password', $old_pass);
	    $this->db->where('status',1);
	    $q=$this->db->get();
	    if($q->num_rows() > 0)
	    {
		$this->db->where('id',$uid);
		$this->db->update('people',$new_pass);
		return true;
		//$this->db->select('*');
		//$this->db->from('people');
		//$this->db->where('id', $uid);
		//$this->db->where('password', $old_pass);
		//$this->db->where('status',1);
		//$q=$this->db->get();
		//$data=$q->row();
		//return $data;
	    }
	}
	function get_password_by_uid($uid)
	{
	    $this->db->select('*');
	    $this->db->where('id',$uid);
	    $q = $this->db->get('people');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->row();
		//$reason = $fields->a_desc;
		$pass= $fields->password;
		return $pass;
	    }
	    else
	    {
		return 0;
	    }  
	}
	function advertisement()
	{
	  $this->db->select('*');
	  $this->db->from('advertisement');
	  $result=$this->db->get();
	 return $data=$result->result();
	    
	}
	
	//get the full product information
	function getFulldetailsProduct( $id )
	{
	    $this->db->JOIN('all_currency', 'product.choose_currency = all_currency.currency_code');
	    $this->db->where('product.id',$id);
	    $q = $this->db->get('product');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		return $fields;
	    }
	    else
	    {
		return 0;
	    }  
	}
	
	//get all the sizes
	function getallSizes($type, $cat)
	{
	    $this->db->where('product_type',$type);
	    $this->db->where('product_category',$cat);
	    $this->db->where('status',1);
	    $q = $this->db->get('product_size');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		return $fields;
	    }
	    else
	    {
		return 0;
	    }
	}
	function getactiveSizes($id)
	{
	    $arr = array();
	    $this->db->where('product_id',$id);
	    $q = $this->db->get('product_related_size_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		foreach($fields as $res)
		{
		    array_push($arr, $res['size_id']);
		}
		return $arr;
	    }
	    else
	    {
		return 0;
	    }
	}
	//get all the colors
	function getallColors($type, $cat)
	{
	    $this->db->where('product_type',$type);
	    $this->db->where('product_category',$cat);
	    $this->db->where('status',1);
	    $q = $this->db->get('product_color');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		return $fields;
	    }
	    else
	    {
		return 0;
	    }  
	}
	function getactiveColors($id)
	{
	    
	    $arr = array();
	    $this->db->where('product_id',$id);
	    $q = $this->db->get('product_related_size_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		foreach($fields as $res)
		{
		    array_push($arr, $res['size_id']);
		}
		return $arr;
	    }
	    else
	    {
		return 0;
	    }
	}
	function getTheseColors($sid, $pid)
	{
	    $this->db->where('product_id',$pid);
	    $this->db->where('size_id',$sid);
	    $q = $this->db->get('product_related_size_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		return $fields;
	    }
	    else
	    {
		return 0;
	    } 
	}
	function getColorcodes($col)
	{
	    $this->db->where('id',$col);
	    $q = $this->db->get('product_color');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		return $fields;
	    }
	    else
	    {
		return 0;
	    } 
	}
	function getColors($id)
	{
	    $this->db->join('product_color', 'product_related_details.color_id = product_color.id');
	    $this->db->where('product_related_size_id',$id);
	    $q = $this->db->get('product_related_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		return $fields;
		//foreach($fields as $res)
		//{
		//    $colors = $this->getColorcodes($res['color_id']);
		//    
		//}
	    }
	    else
	    {
		return 0;
	    }
	}
	function getImages($id, $pid)
	{
	    
	    $this->db->where('color_id',$id);
	    $this->db->where('product_id',$pid);
	    $q = $this->db->get('product_related_image');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		return $fields;
	    }
	    else
	    {
		return 0;
	    }
	}
	//returns the single image
	function getImages1($id, $pid)
	{
	    //echo $id;
	    //echo ','.$pid;
	    //die();
	    
	    $image = array();
	    
	    $this->db->where('color_id',$id);
	    $this->db->where('product_id',$pid);
	    $q = $this->db->get('product_related_image');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		//echo "<pre>";
		//print_r( $fields );
		//echo "</pre>";
		//die();
		$i=0;
		foreach( $fields as $f )
		{
		    if( $i==0 )
		    {
			array_push( $image, $f );			
		    }
		    $i++;
		}
		return $image;
	    }
	    else
	    {
		return 0;
	    }
	}
	//get the matching products
	function getMatchingProducts( $type, $cat, $pid )
	{
	    $matching_arr = array();
	    $pid_arr      = array();
	    $related_image_arr = array();
	    $this->db->where('product_type_id',$type);
	    $this->db->where('product_cat_id',$cat);
	    $this->db->where('status',1);
	    $this->db->where('id !=',$pid);
	    $q = $this->db->get('product');
	    if($q->num_rows() > 0)
	    {
		$fields1 = $q->result_array();
		//$reason = $fields->a_desc;
		//return $fields;
		$loop = 0;
		foreach( $fields1 as $fields )
		{
		    $i=0;
		    $all_size = $this->getallSizes($type, $cat);
		$act_size = array();
		    $act_size = $this->getactiveSizes($fields['id']);
		    //print_r($act_size);
		    //die();
		    if( !empty($all_size) )
		    {
		    foreach( $all_size as $s )
		    {
			//echo "<pre>";
			//print_r($act_size);
			//echo "</pre>";
			//die();
			if( is_array( $act_size ) )
			{
			    if( in_array($s['id'],$act_size))
			    {
				//die();
			      if( $i == 0 )
			      {
				//echo $sz1['id'];
				$sel = $s['id'];
				$get_first_colors = $this->getTheseColors($s['id'], $fields['id']);
				//echo "<pre>";
				//print_r( $get_first_colors );
				//echo "<pre>";
				$id = $get_first_colors[0]['id'];
				array_push($matching_arr,$id);
			      }
			    $i++;
			    }  
			}
			  
		    }
		     $loop++;
		    array_push($pid_arr, $fields['id']);
		    }

		    
		   
		    
		}
		$k=0;
		    $o_image = array();
		    foreach( $matching_arr as $val)
		    {
			print_r($val);
			//die();
			//echo $val[$k];
			//die();
			
			$v = $this->getColors($val[$k]);
			
			
			$j=0;
			
			//echo "<pre>";
			//print_r( $v );
			//echo "</pre>";
			//die();
			if( !empty($v) )
			{
			    foreach( $v as $colo1 )
			    {
			      if( $j == 0 )
			      {
				$related_image = $colo1['color_id'];
				array_push($related_image_arr,$related_image);
				//echo $related_image;
			      }
			      $j++;
			    }  
			}
			
		    $k++;
		    //$get_all_images = $this->getImages1($related_image, $fields['id']);
		    //echo "<pre>";
		    //print_r( $get_all_images );
		    //echo "</pre>";
		    //die();
		    //array_push($o_image,$get_all_images );
		    
		    }
		//die();
	    //return $matching_arr;
		    //return $loop;
		    for( $m=0; $m<$loop; $m++ )
		    {
			//echo $related_image_arr[$m];
			//echo '^^'.$pid_arr[$m];
			//echo count($related_image_arr);
			//echo count($pid_arr);
			//echo $m;
			//if( count($related_image_arr) <= $m && count($pid_arr) <=$m )
			//{
			array_key_exists($m,$related_image_arr);
			array_key_exists($m,$pid_arr);
			    //die();
			    if( array_key_exists($m,$related_image_arr) && array_key_exists($m,$pid_arr) ){
				 $get_all_images = $this->getImages1($related_image_arr[$m], $pid_arr[$m]);
		                array_push($o_image,$get_all_images ); 
			    }
			   
			//}
			
			    
			
		     
		    }
		    //echo "<pre>";
		    //print_r($related_image_arr);
		    //echo "</pre>";
		    //echo "<pre>";
		    //print_r($matching_arr);
		    //echo "</pre>";
		    //die();
		return $o_image;
	    //die();
	    }
	    else
	    {
		return 0;
	    }  
	}
	//to get the specific image for the product
	function getspecificimages($cid, $pid)
	{
 
	    $this->db->where('color_id',$cid);
	    $this->db->where('product_id',$pid);
	    $q = $this->db->get('product_related_image');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		//$reason = $fields->a_desc;
		return $fields;
	    }
	    else
	    {
		return 0;
	    }
	}
	//get the colors for product using product related size details
	function getAllColors1($id)
	{
	    $this->db->join('product_color', 'product_related_details.color_id = product_color.id');
	    $this->db->where('product_related_size_id',$id);
	    $q = $this->db->get('product_related_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		
		return $fields;
	    }
	    else
	    {
		return 0;
	    } 
	}
	function getsColors_ajax($sid, $pid)
	{
	    $this->db->where('size_id',$sid);
	    $this->db->where('product_id',$pid);
	    $q = $this->db->get('product_related_size_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		$id = $fields[0]['id'];
		
		$colors = $this->getAllColors1($id);
		//$reason = $fields->a_desc;
		return $colors;
	    }
	    else
	    {
		return 0;
	    }
	}
	
	//Redo all work starts here on 8 th sept 2014
	//function product related details
	function product_rel_details($id)
	{
	    $this->db->where('product_id',$id);
	    $this->db->where('product_related_size_id <>','0');
	    $q = $this->db->get('product_related_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		return $fields;
	    }
	    else
	    {
		return 0;
	    }
	}
	
	function getColors_size_redo($s, $pid)
	{
	    $this->db->join('product_color', 'product_related_details.color_id = product_color.id');
	    $this->db->where('product_id',$pid);
	    $this->db->where('product_related_size_id',$s);
	    $q = $this->db->get('product_related_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		return $fields;
	    }
	    else
	    {
		return 0;
	    } 
	}
	
	function getColors_redo($pid)
	{
	    $this->db->join('product_color', 'product_related_details.color_id = product_color.id');
	    $this->db->where('product_id',$pid);
	    $q = $this->db->get('product_related_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		return $fields;
	    }
	    else
	    {
		return 0;
	    } 
	}
	//get images related to colors
	function getImage_color_redo( $cid, $pid )
	{
	    $this->db->where('product_id',$pid);
	    $this->db->where('color_id',$cid);
	    $q = $this->db->get('product_related_image');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		return $fields;
	    }
	    else
	    {
		return 0;
	    } 
	}
	function getImage_redo( $pid )
	{
	    $this->db->where('product_id',$pid);
	    $q = $this->db->get('product_related_image');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		return $fields;
	    }
	    else
	    {
		return 0;
	    } 
	}
	//insert comments
	function insertComment( $comment,$rate,$uid, $pid )
	{
	    $data_insert = array('text'   =>$comment,
				 'rating' =>$rate,
				 'uid' =>$uid,
				 'pid' =>$pid,
				 );
	    
	    $this->db->insert('product_review',$data_insert);
	    
	}
	//count all coment and ratings
	function countComment($pid)
	{
	    $this->db->where('pid',$pid);
	    $q = $this->db->get('product_review');
	    if($q->num_rows() > 0)
	    {
		$count = $q->num_rows();
		
		$fields = $q->result_array();
		$rating = 0;
		foreach( $fields as $comment )
		{
		   $rating =  $rating+$comment['rating'];
		}
		
		$total  = $rating;
		$avg    = $total/$count;
		
		return $count.'^^'.$total.'^^'.ceil($avg);
	    }
	    else
	    {
		return 0;
	    } 
	}
	
	function check_comment($pid, $uid)
	{
	    $this->db->where('pid',$pid);
	    $this->db->where('uid',$uid);
	    $q = $this->db->get('product_review');
	    $count = $q->num_rows();
	    
	    return $count;
	}
	
	//##########################  ordering query #############################
	function order( $unit_price,$prodict_id,$size_id, $color_id, $uid, $quantity_g, $available, $stat )
	{
	    $this->session->set_userdata('prodict_id', $prodict_id);
	    
	    $this->db->where('status',0);
	    $this->db->where('userid',$uid);
	    $q = $this->db->get('order_main');
	    $count = $q->num_rows();
	    if( $count > 0 ) /*this signifies active order exist*/
	    {
		$fields = $q->result_array();
		$order_id = $fields[0]['id'];    /*existing main order id*/
		
		//check for this product existance
		$this->db->where('product_id',$prodict_id);
		$this->db->where('size_id',$size_id);
		$this->db->where('color_id',$color_id);
		$this->db->where('order_id',$order_id);
		$q1 = $this->db->get('order_details');
		//echo $this->db->last_query();
		$count1 = $q1->num_rows();
		if( $count1 > 0 ) /*this product already present in cart so update it*/
		{
		   
		    
		    $fields1 = $q1->result_array();
		    $this->db->where('id', $fields1[0]['id']);
		    if( $stat == 'update' )
		    {
			$quantity = $quantity_g;
		    }
		    else
		    {
			if( $available < $fields1[0]['quantity']+$quantity_g ) /*if maximum ordarable quantity is placed again*/
			{
			    $quantity = $available;
			}
			else
			{
			    $quantity = $fields1[0]['quantity']+$quantity_g;
			}
		    }
		    //$quantity = $fields1[0]['quantity']+$quantity_g;
		    $up_price = $quantity*$unit_price;
		    $data = array(
				'quantity'     => $quantity,
				'total_amount' => $up_price,
				  );
		    
		    $ch = $this->db->update('order_details',$data);
		    //echo $this->db->last_query();
		    if( $ch )
		    {
			
		    //--------########## updating product table for reduced quantity #########------------
			//$this->db->where('product_id',$prodict_id);
			//$this->db->where('product_related_size_id',$size_id);
			//$this->db->where('color_id',$color_id);
			//$p = $this->db->get('product_related_details');
			//$fields_p = $p->result_array();
			//
			//$new_quantity = $fields_p[0]['quantity'] - 1;
			//$update_id    = $fields_p[0]['id'];
			//
			// $data_update = array(
			//	'quantity'     => $new_quantity,
			//		  );
			// 
			// $this->db->where('id',$update_id);
			// $this->db->update('product_related_details',$data_update);
			 
			 $this->session->set_userdata('row_id', $fields1[0]['id']);
			 //echo $update_id;die;
			 //--------########## updating product table for reduced quantity #########------------
			 return 'success^*^'.$prodict_id;
			
		    }
		}
		else        /* new product insert this values*/
		{
		    $data = array(
				'order_id'     => $order_id,
				'product_id'   => $prodict_id,
				'size_id'      => $size_id,
				'color_id'     => $color_id,
				'quantity'     => $quantity_g,
				'total_amount' => ($unit_price*$quantity_g)
				  );
		    
		    $ch = $this->db->insert('order_details',$data);
		    //echo $this->db->last_query();
		    $order_details_id = $this->db->insert_id();
		    if( $ch )
		    {
			//--------########## updating product table for reduced quantity #########------------
			//$this->db->where('product_id',$prodict_id);
			//$this->db->where('product_related_size_id',$size_id);
			//$this->db->where('color_id',$color_id);
			//$p = $this->db->get('product_related_details');
			//$fields_p = $p->result_array();
			//
			//$new_quantity = $fields_p[0]['quantity'] - 1;
			//$update_id    = $fields_p[0]['id'];
			//
			// $data_update = array(
			//	'quantity'     => $new_quantity,
			//		  );
			// 
			// $this->db->where('id',$update_id);
			// $this->db->update('product_related_details',$data_update);
			 //--------########## updating product table for reduced quantity #########------------
			 $this->session->set_userdata('row_id', $order_details_id);
			return 'success^*^'.$prodict_id;
		    }
		}
		
		
	    }
	    else   /*insert new order*/
	    {
		$order_num = time().rand(0,999);
		$time      =  date('Y-m-d');
		$data_to_store = array(
				    'order_transaction_id'=> $order_num,
				    'userid'              => $uid,
				    'order_date'          => $time,
				    'total_amount'        => ($unit_price*$quantity_g)
				);
		
		$this->db->insert('order_main',$data_to_store);
		
		$last_id = $this->db->insert_id();
		
		//now update the order details
		//first time insert
		$data = array(
			    'order_id'     => $last_id,
			    'product_id'   => $prodict_id,
			    'size_id'      => $size_id,
			    'color_id'     => $color_id,
			    'quantity'     => $quantity_g,
			    'total_amount' => ($unit_price*$quantity_g),
			      );
		
		$ch = $this->db->insert('order_details',$data);
		$order_details_id = $this->db->insert_id();
		if( $ch )
		{
		    //--------########## updating product table for reduced quantity #########------------
		//    $this->db->where('product_id',$prodict_id);
		//    $this->db->where('product_related_size_id',$size_id);
		//    $this->db->where('color_id',$color_id);
		//    $p = $this->db->get('product_related_details');
		//    $fields_p = $p->result_array();
		//    
		//    $new_quantity = $fields_p[0]['quantity'] - 1;
		//    $update_id    = $fields_p[0]['id'];
		//    
		//     $data_update = array(
		//	    'quantity'     => $new_quantity,
		//		      );
		//     
		//     $this->db->where('id',$update_id);
		//     $this->db->update('product_related_details',$data_update);
		     
		    $this->session->set_userdata('row_id', $order_details_id);
		     //--------########## updating product table for reduced quantity #########------------
		     
		    return 'success^*^'.$prodict_id;
		}
		
	    }
	}
	//##########################  ordering query end #############################
	
	//Related product calculations
	function getRelatedproducts($type, $cat)
	{

	    $this->db->select('product.id, title, choose_currency, price, product.countries');
	    $this->db->where('product.status',1);
	    $this->db->where('product_type_id',$type);
	    $this->db->where('product_cat_id',$cat);
	    $q = $this->db->get('product');
	    $count = $q->num_rows();
	    if( $count > 0 ) /*this signifies active order exist*/
	    {
		$fields = $q->result_array();
		
		return $fields;
	    }
	    else
	    {
		return 0;
	    }
	}
	//get th product showing image
	function getImage($id)
	{
	    $this->db->where('product_id',$id);
	    $q = $this->db->get('product_related_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
		
		$all_pro_related_details = $fields;
		
		$act_size = array(); /*############### this array contains all active sizes ########*/
		foreach($all_pro_related_details as $sz)
		{
		  if( !in_array( $sz['product_related_size_id'],$act_size, true ))
		  {
		    array_push( $act_size, $sz['product_related_size_id']);
		  }
		}
		
		
		$a   = ''; /*it will determine which size is available*/
		$b=0;
		$c =0;
		if( !empty($all_sizes) )
		{
		foreach( $all_sizes as $size )
		{
		if( in_array($size['id'], $act_size ))
		   {
		    
		     $class = '';
		     if( $c == 0 )
		      {
			 $a   = $size['id'];
		      }
		     $c++;
		   }
		   else
		   {
		    $class = 'disable';  
		   }
		$b++;
		}  
		}
		else{
		  $class = '';
		}
		//echo "Available Size :".$a;
		
		//color calculation depending on the available size
		if( $a != '' )
		{
		  $color_arr = $this->getColors_size_redo( $a, $id );
		}
		else
		{
		  $color_arr = $this->getColors_redo( $id );
		}
	    }
	    
	    //now get the images for first load
	    if(!empty( $color_arr ))
	    {
	      //if color choosen
	      $i = 0;
	      foreach( $color_arr as $img_arr )
	      {
		if( $i == 0 )
		{
		  $img_array = $this->model_products->getImage_color_redo( $img_arr['color_id'], $id );
		}
	      $i++;  
	      }
	    }
	    else
	    {
	      //if no color chosen
	      $img_array = $this->model_products->getImage_redo( $id );
	    }
	   
	return $img_array;   
	}
	function quantity_re($col, $pid)
	{
	    $this->db->where('product_id',$pid);
	    $this->db->where('color_id',$col);
	    $q = $this->db->get('product_related_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
	    }
	    else
	    {
		$fields = array();
	    }
	    
	    return $fields;
	}
	//Related product calculations end
	
	//product currency option
	function getSymbolproduct($cur)
	{
	   
	    $this->db->select('currency_code');
	    $this->db->where('currency_code',$cur);
	    $q = $this->db->get('all_currency');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
	     return $fields;
	    }
	    
	   
	}
	//collect ordered product information 13 09 2014
	function getOrderproductinfo($id)
	{
	    $this->db->select('*');
	    $this->db->where('id',$id);
	    $q = $this->db->get('order_details');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result_array();
	    }
	    else
	    {
		$fields = 0;
	    }
	    return $fields; 
	}
	//======get all reviews of the particular product=========//
	function gereviewsProduct($pid, $num)
	{
	    $this->db->select('*');
	    $this->db->where('pid',$pid);
	    $this->db->order_by('id','desc');
	    $q = $this->db->get('product_review',$num,0);
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result();
		//$reason = $fields->a_desc;
		return $fields;
	    }
	    else
	    {
		return 0;
	    }  
	}
	//======get particular review of the product=========//
	function gereviewsProduct_particular($pid, $uid)
	{
	    $this->db->select('*');
	    $this->db->where('pid',$pid);
	    $this->db->where('uid',$uid);
	    $q = $this->db->get('product_review');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->result();
		//$reason = $fields->a_desc;
		return $fields;
	    }
	    else
	    {
		return 0;
	    }  
	}
	
	function get_user($uid)
	{
	    $this->db->select('*');
	    $this->db->where('id',$uid);
	    $q = $this->db->get('people');
	    if($q->num_rows() > 0)
	    {
		$fields = $q->row();
		//$reason = $fields->a_desc;
		$name=ucfirst($fields->first_name).' '.ucfirst($fields->last_name);
		return $name;
	    }
	    else
	    {
		return 0;
	    }  
	}
	
    //===========================Get country id=============
    
	function get_country_id($country_code){
	    
	    $this->db->select('id');
	    $this->db->from('country');
	    $this->db->where('iso_alpha2',$country_code);
	    $query = $this->db->get();
	    $q= $query->result_array();
	    return $q;
	}
	
	//function get_country_ids($country_code)
	//{
	//    $this->db->select('id');
	//    //$this->db->from('country');
	//    $this->db->where('iso_alpha2',$country_code);
	//    $query = $this->db->get('country');
	//    $q= $query->row();
	//    return $query;
	//}
    //======================================================
    
    function get_track_product($uid){
	    
	    $this->db->select('*');
	    $this->db->from('product');
	    $this->db->where('customer_type',$uid);
	    $query = $this->db->get();
	    return $query->result_array();
	}
    public function get_product_size_color_quantity($prod_id)
    {
	$this->db->where('product_id',$prod_id);
	$q = $this->db->get('product_related_details');
	
	if($q->num_rows>0)
	{
	    return $result = $q->result_array();
	}
	else
	{
	    return 0;
	}
    }
    public function get_SizeProduct($product_related_size_id)
    {
	$this->db->where('id',$product_related_size_id);
	$q = $this->db->get('product_size');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	    return $result->size_type;
	}
    }
    
    public function get_ColorProduct($color_id)
    {
	$this->db->where('id',$color_id);
	$q = $this->db->get('product_color');
	if($q->num_rows()>0)
	{
	    $result = $q->row();
	    return $result->color_code;
	}
    }
    public function get_quintity($product_id)
    {
	$this->db->select_sum('order_details.quantity');
	$this->db->join('order_main','order_details.order_id=order_main.id');
	$this->db->where('order_details.product_id',$product_id);
	$this->db->where('order_main.status',1);
	$result=$this->db->get('order_details');
	//echo $this->db->last_query();
	return $q = $result->row();
	
	//if($result->num_rows()>0)
	//{
	//    return $q->quantity;
	//}
	//else
	//{
	//    return 0;
	//}
    }
    public function edit_basic_features($prod_id)
    {
	$countries = array();
	$values=$this->input->post('visibility');
	
	if ($values)
	{
	    foreach ($values as $value)
	    {
		array_push($countries,$value);
	    }
	}
	
	//echo "working..."; echo "<pre>"; print_r($shiftarraycalc); echo "</pre>"; die();
	//$visibility = implode(",",$countries);
	//echo "working..."; echo "<pre>"; print_r($visibility); echo "</pre>"; die();
	
	if (in_array("all", $countries)) {
	    
	    $visibility='';
	}
	else {
	    
	    $visibility = implode(",",$countries);
	}
	
	$basic_product = array(
			       'product_type_id' => $this->input->post('product_type'),
			       'product_code' => $this->input->post('prod_cod'),
			       'product_cat_id' => $this->input->post('category'),
			       'title' => trim($this->input->post('product_title')),
			       'product_tag' => trim($this->input->post('tag')),
			       'choose_currency' => $this->input->post('currency'),
			       'price' => trim($this->input->post('price')),
			       'seller_price' => trim($this->input->post('seller_price')),
			       'product_details' => trim($this->input->post('details')),
			       'countries' => $visibility,
			       'shipping_terms' => trim($this->input->post('shipping_details')),
			       );
	$basic_product_size= array(
				'product_related_size_id' =>  $this->input->post('product_size')
				   
				   );
	$this->db->where('id',$prod_id);
	$inserted = $this->db->update('product',$basic_product);
	$this->db->where('id',$prod_id);
	$inserted_size = $this->db->update('product_related_details',$basic_product_size);
	//$last_id = $this->db->insert_id();
	
	if($inserted && $inserted_size)
	{
	    return 1;
	}
	else
	{
	    return 0;
	}
    }
    public function get_track_product_seller($user_id)
    {
	$this->db->select('*');
	$this->db->where('userid',$user_id);
	$this->db->where('status !=',0);
	$q = $this->db->get('order_main');
	if($q->num_rows()>0)
	{
	  return  $result = $q->result();
	   
	}
	
    }
    public function get_track_product_details_seller($id)
    {
	$this->db->select('*');
	$this->db->where('order_id',$id);
	$q = $this->db->get('order_details');
	if($q->num_rows()>0)
	{
	   return $result = $q->result();
	    
	   
	}
	
    }
    }
?>