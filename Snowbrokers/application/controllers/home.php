<?php
class Home extends CI_Controller{


    function __construct()
    {
        parent::__construct();
        $this->load->model('modelhome');
	$this->load->model('model_offer_banner');
	$this->load->model('model_top_banner');
	$this->load->model('model_middle_banner');
	$this->load->model('modelbanner_home_footer');
        $this->load->model('site_settingsmodel');
		$this->load->model('registration_model');
		$this->load->model('modelsports');
		$this->load->model('modelgroup');
		$this->load->model('modellogin');
		$this->load->model('modelgoals');
		$this->load->model('modelhome');
		$this->load->model('modelevent');
		$this->load->model('modelsignup');
		$this->load->model('modelsettings');
		$this->load->model('modelfooter');
		$this->load->library('pagination');
		$this->load->helper(array('form','url'));//=================ADDED BY PRITAM (29/7/14)====//
		$this->load->library('form_validation');//=================ADDED BY PRITAM (29/7/14)====//
		$this->modelsettings->site_settings();
		$this->limit = $this->modelsignup->per_page();
    }
    
    public function index()
    {
		$this->load->view('header/header');
        $this->load->view('home/home');
        $this->load->view('footer/footer');
    }
	public function offline()
    {
        $this->load->view('header/headeroffline');
        $this->load->view('home/offline');
    }
  
public function Select_state()
	{
	     $this->load->model('registration_model');
	    $result=$this->registration_model->Select_state($_REQUEST['country_id']);
	    if($result !=0)
	    {
		foreach($result as $key=>$val)
		{
		    ?>
		    <option value="<?php echo $val->id;?>"><?php echo $val->state_name;?></option>
		    <?php
		}
	    }
	    else
	    {
		?>
		    <option value="0">Not Available</option>
		<?php
	    }
	}
	function email()
    {
        $email = $this->input->post('emailvalid');
		
		$getresponse=$this->modelhome->mail_idcheck($email);
		
		if($getresponse==0)
		{
				$data=$this->modelhome->insert_subscribe($email);
		
				if(!empty($data))
				{
					$data=$this->modelhome->get_subscribe($email);
					
					
					/*$randmix=$data->id;
					$key=base64_encode($randmix);
					
				
					$link=base_url().'home/account/'.$key;
					$message="Thankyou for subscription with us in your account"." ".$email."please click on the link to activate subscription".$link;
					$this->site_settingsmodel->send_mail($this->input->post('email'),'Your Subscribe information',$message);
					$this->session->set_userdata('success_msg','Please check your mail id for activation of subcription');*/
				   
				}
				 
				redirect('home');
		}
		else
		{
			$msg['data']=1;
			
			$this->load->view('footer/email_ajax',$msg);
		}
		
    }
   

function account()
{
    $key=$this->uri->segment(3);
    $id=base64_decode($key); 
    $data=$this->modelhome->activate_subscribe($id);
    if(!empty($data))
	{
	     $this->session->set_userdata('success_msg','Thanku for subcription');
	     
	    
	}
    redirect('home');  
}

 public function about_us()
    {
	    //$categories = $this->model_products->getTypes(); //to get the navigation categories/
	    //$data['categories'] = $categories;
	    $data['aboutus_content']=$this->model_top_banner->aboutus();
	    $this->load->view('header/header');
	    $this->load->view('about/about',$data);
	    $this->load->view('footer/footer');
	   

    }

}

?>