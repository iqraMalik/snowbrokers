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
		$site_settings=$this->input->post('site_settings');
		echo "<pre>";
		print_r($site_settings);
		
		$allbox=count($site_settings);
		
		if($allbox>0)
		{
			foreach($site_settings as $key=>$value)
			{
				$new_insert_data['field_value'] = $value;
				
				$this->db->where('field_name', $key);
				$query = $this->db->update('site_settings',$new_insert_data);
				echo $this->db->last_query();
				echo "<br />";
			}
		}
		else
		{
			$query=0;
		}
		if($query)
		{
			$this->session->set_userdata('success_msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>Data are saved successfully</strong></div>');
		}
		else
		{
			$this->session->set_userdata('error_msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>Failed to save data. Please try again</strong></div>');
			
		}
		//return $query;
	}
	
	public function per_page()
	{
		$this->db->where('field_name','admin_resultsPerPage');	
		$query = $this->db->get('site_settings');
		$query2=$query->row();
		return $query2->field_value;	
	}
	
	public function admin_email()
	{
		$this->db->where('field_name','admin_email');	
		$query = $this->db->get('site_settings');
		$query2=$query->row();
		return $query2->field_value;	
	}
	public function siet_name()
	{
			
		$this->db->where('id',1);	
		$query = $this->db->get('site_settings');
		$query2=$query->row();
		return $query2->field_value;	
	}
	public function get_size($size_id)
	{
			
		$this->db->where('id',$size_id);	
		$query = $this->db->get('product_size');
		// $query->num_rows();
		if($query->num_rows()>0)
		{
		$query2=$query->row();
		return $query2->size_type;
		}
		
	}
	public function get_color($color_id)
	{
			
		$this->db->where('id',$color_id);	
		$query = $this->db->get('product_color');
		$query2=$query->row();
		return $query2->color_code;	
	}
	
	
	public function get_allProduct_Details($product_id)
	{
		$this->db->select('*');
		$this->db->where('product_id',$product_id);
		$this->db->group_by('color_id');
		$query = $this->db->get('product_related_details');
		return $query->result();
	}
	public function get_allProduct_Details_total($product_id,$color_id)
	{
		$this->db->select('*');
		$this->db->where('product_id',$product_id);
		$this->db->where('color_id',$color_id);
		$query = $this->db->get('product_related_details');
		return $query->result();
	}
	public function check_availavel_product($product_id,$color_id)
	{
		$this->db->select('*');
		$this->db->where('product_id',$product_id);
		$this->db->where('color_id',$color_id);
		$query = $this->db->get('product_related_details');
		$flag= $query->num_rows();
		if($flag>0)
		{
		return 1;
		}
		else
		return 0;
		
	}
	
	public function productrelatedDataInsert($data)
    {
        //print_r($data);die();
        $this->db->where('color_id',$data['color_id']);
        $this->db->where('product_id',$data['product_id']);
        $this->db->where('product_related_size_id',$data['product_related_size_id']);
        $q = $this->db->get('product_related_details');
        if($q->num_rows()>0)
        {
            $quantity_rs = $q->row();
            $quantity = ($quantity_rs->quantity + $data['quantity']);
            $this->db->set('quantity',$quantity,FALSE);
            $this->db->where('color_id',$data['color_id']);
            $this->db->where('product_id',$data['product_id']);
            $this->db->where('product_related_size_id',$data['product_related_size_id']);
            $this->db->update('product_related_details');
        }
        else
        {
            $this->db->insert('product_related_details',$data);
        }
    }
function send_mail($email,$subject,$body)
{
	//$path_temp = $this->config->item('path_temp');
    /*    $fromemail = 'admin@snowbrokers.asia';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        curl_setopt($ch, CURLOPT_USERPWD, 'api:key-42b6c767e0f10c724ca5bf1eb6320847');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

        curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/sandboxe1a380fe5f66493f96bb1d31fccdbc6c.mailgun.org');

        curl_setopt($ch, CURLOPT_POSTFIELDS, array('from' => $fromemail,'to' => $email,'subject' => $subject,'html' => $body));

        $result = curl_exec($ch);
        curl_close($ch);
    echo $result;die();*/
    
    
    require_once PHYSICAL_PATH.'smtpmail/PHPMailerAutoload.php';
    $mail = new PHPMailer();
   
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.snowbrokers.asia';  // Specify main and backup SMTP servers
    $mail->Port = 587;
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'admin@snowbrokers.asia';                 // SMTP username
    $mail->Password = 'bek297';                           // SMTP password
    $mail->SMTPSecure = '';// Enable encryption, 'ssl' also accepted
    $mail->SMTPDebug =1;
    $mail->Priority =1;
    $Mail->CharSet     = 'UTF-8';
    $Mail->Encoding    = '8bit';
    $mail->From = 'admin@snowbrokers.asia';

    //$mail->Port=26;    // Enable encryption, 'ssl' also accepted
    //$mail->From = ADMIN_EMAIL;
    //$mail->FromName = SITE_NAME;
    $mail->FromName = 'Snowbrokers';
    $mail->addAddress($email);     // Add a recipient
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    //$mail->send();
    if(!$mail->send())
    {
            $return=1;
            //echo 'Mail couldnot send again!';
    }
    else
    {
           //echo 'Message has been sent';
           $return=0;
    }
    return $return;
}
function  get_all_currency()
 {
	$this->db->select('*');
	$this->db->where('status',1);
	$query = $this->db->get('all_currency');
	return $query->result();
 }
 public function insert_color($color_code,$product_type,$product_category)
 {
	$this->db->select('id');
	$this->db->where('color_code',$color_code);
     $this->db->where('product_type',$product_type);
     $this->db->where('product_category',$product_category);
	$query = $this->db->get('product_color');
	$num_color=$query->num_rows();
	if($num_color>0)
	{
	 $result= $query->row();
	 $resultss=$result->id;
	}
	else{
	$this->db->insert('product_color',array('color_code'=>$color_code,'product_category'=>$product_category,'product_type'=>$product_type,'status'=>1));
	$resultss=$this->db->insert_id();
	}
	return $resultss;
 }
 
  public function insert_size($size,$product_type,$product_category)
 {
      
	$this->db->select('id');
	$this->db->where('size_type',$size);
      $this->db->where('product_type',$product_type);
      $this->db->where('product_category',$product_category);
	$query = $this->db->get('product_size');
	$num_color=$query->num_rows();
	if($num_color>0)
	{
	 $result= $query->row();
	 $resultss=$result->id;
	}
	else{
	$this->db->insert('product_size',array('size_type'=>$size,'product_category'=>$product_category,'product_type'=>$product_type,'status'=>1));
	$resultss=$this->db->insert_id();
	}
	return $resultss;
 }
    public function image_UpdateModel($imag_update,$image_session,$product_id)
    {
        $this->db->where('img_session',$image_session);
	    $this->db->where('product_id',$product_id);
	    $this->db->update('product_related_image',$imag_update);
    }
}
?>