<?php
$dataone_fetch=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));


$data=$dataone_fetch[0];
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


<script>
  $(function() {
    var tabs = $( "#tabs" ).tabs();
    tabs.find( ".ui-tabs-nav" ).sortable({
      axis: "x",
      stop: function() {
        tabs.tabs( "refresh" );
      }
    });
  });
  </script>
<script>
	function go_chk()
	{
	  
		var frm=document.registration_form;
		var regBlank = /[^\s]/;
		var typeelement;
		var valueelement;
		var labelvalue;
		var nameelement;
		var length = frm.elements.length;
		for(var i=0;i<length;i++)
		{
			
			typeelement = frm.elements[i].type;	
			if(typeelement!='hidden')
			{
				valueelement = frm.elements[i].value;	
				nameelement = frm.elements[i].name;	
				if(frm.elements[i].getAttribute('validate')=='required')
				{
					labelvalue = frm.elements[i].getAttribute('label');
					if(typeelement == 'select' && nameelement.selectedIndex==0)
					{
						document.getElementById(nameelement+"_error").innerHTML=labelvalue+' is required.';
						document.getElementById(nameelement).focus();
						return false;
					}
					else if(valueelement.search(/\S/)==-1)
					{
						document.getElementById(nameelement+"_error").innerHTML=labelvalue+' is required.';
						document.getElementById(nameelement).focus();
						return false;
					}
					else
					{
					
						document.getElementById(nameelement+"_error").innerHTML='';
					}
				}
			
			}
			
		}
		$('#show_loader').css('display','');
		document.registration_form.submit();
		
	}
</script>
<script>
function go_show(val)
{
	var read_more_text="read_more_text_"+val;
	var read_more_section="read_more_"+val;
	
	document.getElementById(read_more_text).style.display="none";
	
	document.getElementById(read_more_section).style.display="";
}
function go_hide(val)
{
	var read_more_text="read_more_text_"+val;
	var read_more_section="read_more_"+val;
	
	document.getElementById(read_more_text).style.display="";
	
	document.getElementById(read_more_section).style.display="none";
}
function Button(theButton) {
  var theForm = theButton.form;
  if (theButton.name=="Button1") {
    msg='Are You sure  you want to remove this credit card?';
    var r = confirm(msg);
		
		   if (r == true)
		   {
			// document.getElementById('select_my_option').value=val;
			 theForm.action = "<?php echo site_url('signup/delete_credit_payment');?>"
			 
			//frm.submit();
		   }
       
    //theForm.target = "iframe1";    
  }
  else {
    theForm.action = "<?php echo site_url('signup/make_default');?>"   
    //theForm.target = "iframe2";    
  }
}
</script>

<section class="innerpage_page">
	<div class="container">
		<div class="row">
			<?php $this->load->view('sidebarblog/sidebar_blog_account.php')?>
			
	
			<div class="col-md-9 col-sm-8 " >
				<!--<div align="center" style="font-size:26px;padding-bottom:20px;">Set up your credit card</div>-->
				
				<div id="tabs" class="myacnt_lft">
  <ul>
    <li><a href="#tabs-1">View Credit Card</a></li>
    <li><a href="#tabs-2">Add Credit Card</a></li>
    
  </ul>
  <div id="tabs-1" >
	  <div class="sgn_up_out pd_lft_rtg">
	  <div align="center" class="credit_cr_txt">Your credit card details</div>
			  <?php
				  if($this->session->userdata('success_msg')!='')
				  {
			  ?>
					<div class="alert_success">
			  <?php
					  echo $this->session->userdata('success_msg');
					  $this->session->unset_userdata('success_msg');
			  ?>
				  </div>
			  <?php
				  }
				  if($this->session->userdata('error_msg')!='')
				  {
			  ?>
					<div class="alert_error">
			  <?php
					  echo $this->session->userdata('error_msg');
					  $this->session->unset_userdata('error_msg');
			  ?>
					</div>
			  <?php
				  }
			  ?>
		
						  <div style="padding-bottom:30px;">
							  <div class="frst_nm_rw clearfix">
					
								  
											    
							<?php
			    
		$dataone_fetch=$this->modelsignup->GetcraditcardDetail($this->session->userdata('user_id'));
		//print_r($dataone_fetch);
		if(count($dataone_fetch)>0)
		{
		include("new_CIM_authnetfunction.php");
		$getdata=getCustomerProfileRequest($dataone_fetch[0]->customerProfileId);
		
		$card_numbers = array();
		$fname = array();
		$i=0;
		
		//print_r($getdata);

if(count($getdata)>0)
{		
  foreach($getdata->profile->paymentProfiles AS $profile)
  {
    
    foreach($profile->payment->creditCard AS $credit)
    {
      $card_numbers[$i]=(string) $credit->cardNumber;
    }
    foreach($profile->billTo AS $name)
    {
      $fname[$i]=(string) $name->firstName;
    }
     foreach($profile->customerPaymentProfileId AS $customerPaymentProfileId)
    {
      $payment_profile[$i]=(string) $customerPaymentProfileId;
    }
    $i++;
  }



function array_concat_recursive($array1, $array2){
    $result = array();
    foreach($array1 as $key => $value){
        if(isset($array2[$key])){
            if(is_array($value)){
                $result[$key] = array_concat_recursive($value, $array2[$key]);
            }else{
                $result[$key] = $value . '-' . $array2[$key];
            }
        }
    }
    return $result;
}
$a = array_concat_recursive($payment_profile,$fname);

function arr_comb($key, $val) {
   return array($key=>$val);
}
$arrResult = array_map('arr_comb', $card_numbers, $a);
?>
	  <form id="make_default_form" class="spcing_otr" autocomplete="off" action="" enctype="multipart/form-data" method="post" name="make_default_form">
<?php

				if(count($arrResult)>0)
				{
				  
				    foreach ($arrResult as $key=>$val)
				    {
				      foreach($val as $k=>$v)
				      {
					$res = explode('-',$v);
					$radio_id = $this->modelsignup->GetcraditcarddetailId($res['0']);
					
					$get_checked_radio = $this->modelsignup->GetcheckedRadio();
					
				  ?>
					  
				  
					  <div class="gf-radio" style="padding-top:10px">
					    <?php if(count($radio_id)>0) {?>
					    
					      <input name="card_number" id="card_number" value="<?php echo $radio_id[0]->id; ?>" type="radio" <?php if($get_checked_radio ==$radio_id[0]->id){echo "checked";}?> >
						<label for="licensed"><?php echo $k;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<?php echo $res['1'];?></label>
						<input type="hidden" name="customerProfileId" value="<?php echo $radio_id[0]->customerProfileId; ?>">
						<input type="hidden" name="customerPayment_profile_id" value="<?php echo$radio_id[0]->customerPayment_profile_id;?>">
						<!--<a href="" class="bg_rd_more" style="margin-bottom: 1px;margin-left:30px;padding: 0px 10px;border-radius: 8px;">Remove</a>-->
						<input type="submit" class="bg_rd_more" style="margin-bottom: 1px;margin-left:200px;padding: 0px 10px;border-radius: 8px; height : 24px; width: 14%;" name="Button1" onclick="Button(this);" value="Remove"/>
					</div>				
											   
											    
					   <?php
					    }
				      }
				    }		   
				  }
				  else
				  {
				    echo "No Credit Card Record Found";
				  }
						  
					?>
					<span class="edit_btn_outr clearfix">
 					
					<input type="submit" name="Button2" class="edt_bt ornge_bt btn_new" onclick="Button(this);" value="Submit" />
					
					</span>
						</form>
							  <?php
						  }
						
						}
						else
						{
						  echo "No Credit Card Record Found";
						}
						  
						  ?>
							  </div>
							</div>
					
						
							
							<!--<div style="padding-left: 20px;padding-bottom:30px;">We store your credit card to make posting Tasks easier.</div>-->
			
			
		  </div>

	</div>
  <div id="tabs-2">
	
	<div class="sgn_up_out pd_lft_rtg" >
	<div align="center" class="credit_cr_txt">Set up your credit card</div>
	<?php
	if($this->session->userdata('success_msg')!='')
	{
	?>
	<div class="alert_success">
	<?php
		echo $this->session->userdata('success_msg');
		$this->session->unset_userdata('success_msg');
	?>
	</div>
	<?php
	}
	if($this->session->userdata('error_msg')!='')
	{
	?>
	<div class="alert_error">
	<?php
		echo $this->session->userdata('error_msg');
		$this->session->unset_userdata('error_msg');
	?>
	</div>
	<?php
	}
	
	?>
		
	
	<form id="registration_form" name="registration_form" method="post" enctype="multipart/form-data" action="<?php echo site_url('signup/credit_payment');?>" autocomplete="off">
						<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id');?>">
						<input type="hidden" name="email" id="email" value="<?php echo $data->email;?>">
			<!--User Signup Details-->
						
						<span class="pymnt_txt" style="padding-left:20px;"> Add Secure Billing Information.</span>
							<div class="tsk_row clearfix">									<span class="tsk_nm" style="padding-left:20px;"> Payment Option  </span>
								<div class="bl_dposite">
									<img src="<?php echo base_url();?>images/visa_new.png" alt="" />											
								</div>
								
							</div>
							
							<span class="reqrd_fld" style="text-align:right;padding-top:10px;">* Required Fields</span>
							<div style="padding-bottom:30px;">We store your credit card to make posting Tasks easier.</div>
							<div class="row">
								<div class="col-md-8">	
									<div class="frm_fld_otr">
										<div class="card_outr clearfix">
											<div style="float:left;" class="rd_str1">*</div>
											<div style="float:left;">
											<input type="text" placeholder="Name on card" class="txt_bx_ptlcd1" name="bill_name" id="bill_name" label="Name on card" validate="required"/>
											</div>
									      </div>
										<div id="bill_name_error" style="color: red;margin-bottom: 20px;"></div>
										
										<div class="card_outr clearfix">
											<div style="float:left;" class="rd_str1">*</div>
											<div style="float:left;">
											<input type="text" placeholder="Card Number" class="txt_bx_ptlcd1"  id="cc1"  name="cc1" label="Card Number" validate="required"/>
											</div>
										</div>
										<div id="cc1_error" style="color: red;margin-bottom: 20px;padding-left: 20px;"></div>
										
										<div class="card_outr clearfix">
											<div class="rd_str1" style="float:left;">*</div>
											<div style="float:left;">
											<input type="text" placeholder="CVV Number" class="txt_bx_ptlcd1" id="cvvcode" name="cvvcode" label="CVV Number" validate="required"/>
										        </div>
										</div>
										<div id="cvvcode_error" style="color: red;margin-bottom: 20px;"></div>
	
									<div class="card_outr clearfix">
										<span class="rd_str">*</span>
										<div class="slct_outrr slct clearfix">
											<div class="mnth nw_wdt">
												<label>
												   <select id='expm' name="expm" validate="required" label="Month">
														<option value="">MM</option>
														<?php
	
															for($i=1;$i<=12;$i++)
															{
																if($i<10)
																{
																	$month="0".$i;
																}
																else
																{
																	$month=$i;
																}
															?>
																<option value="<?php echo $month; ?>"><?php echo $month; ?></option>
														<?php
															}
														?>
													</select>
												</label>
												<div style="color: red;margin-bottom: 20px;" id="expm_error"></div>
											</div>
											<div class="mnth nw_wdt">
												<label>
												    <select name="expyear" id="expyear" validate="required" label="Year">
														<option value="">YYYY</option>
														<?php
															for($i=date('Y');$i<=(date('Y')+15);$i++)
															{
														?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
														<?php
															}
														?>
													</select>
												</label>
												<div style="color: red;margin-bottom: 20px;" id="expyear_error"></div>
											</div>
											
											
										</div>
									</div>
								
									<div class="edit_btn_outr clearfix">
									
										<input type="button" class="edt_bt ornge_bt" value="Store" onclick="go_chk();"/>
									<div id="show_loader" style="display: none"><img src="<?php echo base_url();?>images/ajax-loader.gif"/></div>
									</div>
								</div>
								</div>
							</div>
						</form>
			
	</div>

  </div>

</div>
			</div>
			<div class="col-md-3"> </div>
		</div>
	</div>
</section>
