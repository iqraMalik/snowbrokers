<?php
$dataone_fetch=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));
//print_r($dataone_fetch);
$data=$dataone_fetch[0];
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.datetimepicker.css"/>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.datetimepicker.js"></script>

<section class="innerpage_page">
	<div class="container">
		<div class="row">
			<?php $this->load->view('sidebarblog/sidebar_blog_account.php')?>
			
			<div class="col-md-9 col-sm-8" >
				<div class="sgn_up_out myacnt_lft" >
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
					<div class="pics question"><h4>TASK-AROO QUESTIONNARIE</h4></div>
					<article class="art_txt">
						<p >The information provided in this form will be used to build and help set up your Task-Aroo user profile.Your profile will be your main platform that clients will see and assists them in choosing the right person for the right job. make sure your information is detailed as possible including a list of your skills.this will create more interest,requests and inquiries from potential clients. Remeber no one can sell yourself more effectively than you. With that said lets get started.</p>
					</article>
					<form class="spcing_otr" id="become_taskaroo_form" name="become_taskaroo_form" method="post" enctype="multipart/form-data" action="<?php echo site_url('signup/edit_become_task')?>" autocomplete="off">
					<input type="hidden" id="user_id" name="user_id" value="<?php echo $data->id;?>">
					<input type="hidden" id="email_hidden_error" name="email_hidden_error" value="">
					<input type="hidden" id="email_format" name="email_format" value=1>
					<input type="hidden" id="email_hidden" name="email_hidden" value="">
					<input type="hidden" id="facebook_id" name="facebook_id" value="<?php echo $data->facebook_id;?>">
					<input type="hidden" id="pre_image" name="pre_image" value="<?php echo $data->profile_image;?>">
						<div class="frst_nm_rw clearfix">
							<input type="text" class="frst_nm_txt_bx"  id="first_name" name="first_name" placeholder="First Name" value="<?php echo $data->first_name;?>"/>
						
							<input type="text" class="frst_nm_txt_bx"  id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $data->last_name;?>"/>
						</div>
						<div id="name_error" style="color: red;margin-bottom: 20px;"></div>
												<div class="frst_nm_rw clearfix">
							<input type="text" class="nm_crd_txt_b" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?php echo $data->phone_number;?>"/>
						</div>
						<div id="phone_number_error" style="color: red;margin-bottom: 20px;"></div>
						<div class="frst_nm_rw clearfix">
							<input readonly type="text" class="nm_crd_txt_b" id="email" name="email" placeholder="Email" value="<?php echo $data->email;?>"/>
						</div>
						<div id="email_error" style="color: red;margin-bottom: 20px;"></div>
						
						
						<div class="frst_nm_rw clearfix">
						<input type="text" class="nm_crd_txt_b" id="country" name="country" placeholder="country" value=""/>
						<div id="country_error" class="error_div" style="color:red;"></div>
                                                </div>
						<div class="frst_nm_rw clearfix">
						<input type="text" class="nm_crd_txt_b" id="state" name="state" placeholder="state" value=""/>
						<div id="state_error" class="error_div" style="color:red;"></div>
                                                </div>
						<div class="frst_nm_rw clearfix">
						<input type="text" class="nm_crd_txt_b" id="city" name="city" placeholder="city" value=""/>
						<div id="city_error" class="error_div" style="color:red;"></div>
                                                </div>
						<div class="frst_nm_rw clearfix">
						<input type="text" class="nm_crd_txt_b" id="zip" name="zip" placeholder="Zip" value=""/>
						<div id="zip_error" class="error_div" style="color:red;"></div>
                                                </div>
						<div class="frst_nm_rw clearfix">
						<input type="text" class="nm_crd_txt_b" id="apartment" name="apartment" placeholder="Apartment" value=""/>
						<div id="apartment_error" class="error_div" style="color:red;"></div>
                                                </div>
                                                <div id="address_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                <div class="frst_nm_rw clearfix">
							<input type="text" id="age" class="nm_crd_txt_b" name="age" placeholder="Date of Birth" value=""/>
						</div>
						<div id="age_error" style="color: red;margin-bottom: 20px;"></div>
						<!-- <span class="bcm_tsk">Become a Task-Aroo <a href="#">Sign Up Here</a></span> -->
						<script type="text/javascript">

								$('#age').datetimepicker({
							
							//yearOffset:222,
							timepicker:false,
							format:'Y-m-d',
							formatDate:'Y/m/d',
							
							//minDate:'-1970/01/02', // yesterday is minimum date
							maxDate:'today' // and tommorow is maximum date calendar
						});
							</script>
                                               <div class="card_outr clearfix">
                                               <div class="slct_outr slct">
						<label>
                                                    <select name="education" id="education">
                                                                <option value="">Select Education</option>
                                                                <option value="1">Secondary</option>
                                                                <option value="2">College</option>
                                                                <option value="3">University</option>
                                                                
                                                    </select>
						    </label>
                                                </div>
                                                <div id="education_error" style="color: red;margin-bottom: 20px;"></div>
					       </div>
                                                <div style="padding-bottom: 5px;">
                                        <textarea placeholder="Other diplomas" class="nm_crd_txt_b_txtarea" id="diplomas"  cols="43" rows="15" name="diplomas"></textarea>
                                                </div>
                                                <div id="diplomas_error" style="color: red;margin-bottom: 20px;"></div>
                                                <div class="frst_nm_rw clearfix">
                                                    <div style="padding-bottom: 5px">Upload Certificate</div>
                                                    <div class="brwse_img">
                                                    	<input id="certificate" name="certificate" class="" type="file">
                                                    </div>
                                                 </div>
                                                 <div id="certificate_error" style="color: red;margin-bottom: 20px;"></div>
                                                <div class="frst_nm_rw clearfix">
                                                    <div style="padding-bottom: 5px;">Are you licensed driver</div>
													<ul class="gf-radio">
														<li>
								                            <input name="licensed" id="licensed" value="1" type="radio" checked="checked"><label for="licensed">Yes</label>
														</li>
														<li>
								                            <input name="licensed" id="licensed1" value="0" type="radio"><label for="licensed1">No</label>
														</li>
													 </ul>
                                                 </div>
                                                <div id="licensed_error" style="color: red;margin-bottom: 20px;"></div>
                                                <div class="frst_nm_rw clearfix">
                                                    <div style="padding-bottom: 5px;">If yes do you Have Car</div>
												    <ul class="gf-radio">
														<li>
						                                   <input name="car"  id="car" value="1"  type="radio" checked="checked"><label for="car" >Yes</label>
						                                </li>
						                                <li>
						                                   <input name="car"  id="car1" value="0" type="radio"><label for="car">No</label>
														</li>
												    </ul>
                                                 </div>
                                                <div id="car_error" style="color: red;margin-bottom: 20px;"></div>

                                                                                               
                                                <div class="card_outr clearfix">
                                               		<div class="slct_outr slct">
														<label>
		                                                    <select name="transport" id="transport">
		                                                                <option value="">Select Mode of Transportation</option>
		                                                                <option value="1">City Transit</option>
		                                                                <option value="2">Car</option>
		                                                    </select>
														</label>
                                                	</div>
                                                	<div id="transport_error" style="color: red;margin-bottom: 20px;"></div>
						  						</div>
                                                <div class="frst_nm_rw clearfix">
                                                    <div style="padding-bottom: 5px;">Do you have a secure Background Check</div>
												    <ul class="gf-radio">
														<li>
							                                <input name="background" id="background1" value="1"  type="radio" checked="checked"><label for="background1">Yes</label>
														</li>
														<li>
							                                <input name="background" id="background2" value="0" type="radio"><label for="background2">No</label>
							                            </li>
						                            </ul>
						     						<p style="font-size: 12px;">(Note a background note is not necessary but it will make you more hireable)</p>
						 						</div>
                                                <div id="background_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                <div class="frst_nm_rw clearfix">
                                                    <div>Categories</div>
													    <ul class="gf-checkbox ">
														
							                                  <?php $categories = $this->modelsignup->allCategories();
							                                  //echo "<pre>";
							                                  //print_r($categories);
							                                  foreach($categories as $cat)
							                                    {
							                                    ?>
							                                    <li><input name="categories[]" value="<?php echo $cat->id;?>"  id="chk_<?php echo $cat->id;?>" type="checkbox" onClick="form_fill2(this.value);"><label for="chk_<?php echo $cat->id;?>" ><?php echo $cat->title;?></label></input></li>
							                                    <?php
							                                    }
							                                    ?>
													    </ul>
                                                 </div>
                                                <div id="categories_error" style="color: red;margin-bottom: 20px;"></div>
                                                  
												<div class="frst_nm_rw clearfix" style="display: none;" id="addothercaegory">
												    <div style="padding-bottom: 5px;">Other Category:</div>
													<input type="text" class="nm_crd_txt_b" name="othercategory" id="othercategory" value="" placeholder="Other Category">
													<div id="othercategory_error" class="error_div" style="color:red;"></div>
												</div>	
							
                                                
                                                <div class="frst_nm_rw clearfix">
                                                    <div>What is your prefered availablity?</div>
													<ul class="gf-radio">
														<li>
							                                <input name="availablity" id="a_1" value="1"  onClick="open_days(this.value);" type="radio" checked="checked"><label for="a_1">Anytime Weekdays</label>
														</li>
														<li>
							                                <input name="availablity"  id="a_2" value="2" onClick="open_days(this.value);" type="radio"><label for="a_2">Days of Week</label>
							                            </li>
							                        </ul>
												</div>
												
                                                <div id="all_days" style="display:none;">
                                                    <div>Days Availablity</div>
                                                     <div>
														<ul class="gf-checkbox ">
															<li>
								                                <input id="d_1" name="days[]" value="1"   type="checkbox" checked="cheaked"><label for="d_1">Monday</label>
															</li>
															<li>
								                                <input id="d_2" name="days[]" value="2"   type="checkbox"><label for="d_2">Tuesday</label>
															</li>
															<li>
								                                <input id="d_3" name="days[]" value="3"   type="checkbox"><label for="d_3">Wednesday</label>
															</li>
															<li>
								                                <input id="d_4" name="days[]" value="4"   type="checkbox"><label for="d_4">Thursday</label>
															</li>
															<li>
								                                <input id="d_5" name="days[]" value="5"   type="checkbox"><label for="d_5">Friday</label>
															</li>
															<li>
								                                <input id="d_6" name="days[]" value="6"   type="checkbox"><label for="d_6">Saturday</label>
															</li>
															<li>
								                                <input id="d_7" name="days[]" value="7"   type="checkbox"><label for="d_7">Sunday</label>
															</li>
														</ul>
                                                    </div>
                                                    <div>Time Availablity</div>
                                                   <div>
														<ul class="gf-checkbox ">
															<li>
								                                <input id="t_1" name="time[]" value="1"   type="checkbox" checked="cheaked"><label for="t_1">Morning</label>
															</li>
															<li>
								                                <input id="t_2" name="time[]" value="2"   type="checkbox"><label for="t_2">Afternoon</label>
															</li>
															<li>
								                                <input id="t_3" name="time[]" value="3"  type="checkbox"><label for="t_3">Evening</label>
															</li>
															<li>
								                                <input id="t_4" name="time[]" value="4"   type="checkbox"><label for="t_4">Night</label>
															</li>
														</ul>
                                                       
                                                    </div>
                                                </div>
                                                <div id="availablity_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                 <div class="frst_nm_rw clearfix">
                                                    <div>I prefer to work from</div>
													<ul class="gf-radio">
														<li>
							                                <input name="work_from"  id="work_from1" value="1"  type="radio" checked="cheaked"><label for="work_from1">Person</label>                                                    
														</li>
														<li>
													    	<input name="work_from"  id="work_from2"value="2" type="radio"><label for="work_from2">Home</label>                           </li><li>
													    	<input name="work_from"  id="work_from3"value="3" type="radio"><label for="work_from3">Both</label>
													    </li>
													 </ul>
                                                 </div>
                                                <div id="work_from_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                <div class="frst_nm_rw clearfix">
													<textarea placeholder="Work Experience" class="nm_crd_txt_b_txtarea" id="work_exp"  cols="43" rows="15" name="work_exp"></textarea>
                                                </div>
                                                <div id="work_exp_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                <div class="frst_nm_rw clearfix">
													<textarea placeholder="Profile Introduction" class="nm_crd_txt_b_txtarea" id="prof_intro"  cols="43" rows="15" name="prof_intro"></textarea>
                                                </div>
                                                <div id="prof_intro_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                
                                                <?php
													if($data->profile_image!='')
													{
														//$img_path=base_url().'admin/images/user_profile_image/thumbs/'.$data->profile_image;
														$pos=strpos($data->profile_image, 'http');
															
														if($pos===false)
														{
															$img_path=base_url().'profile_pic/thumbnail/'.$data->profile_image;
														}
														else
														{
															$img_path=$data->profile_image;
														}
													?>
													<div class="frst_nm_rw clearfix">
														<figure class="img_border">
															<img src="<?php echo $img_path;?>">
														</figure>
													</div>
													<?php
													}
												?>
												<div class="brwse_img">
													<label for="image">Image</label>
													<input type="file" id="image" name="image" class=""/>
												</div>
												<div id="image_error" style="color: red;margin-bottom: 20px;"></div>
												<span class="sgnup">
													<input type="button" class="sgn_btu" value="Submit" onclick="check_validation();"/>
												</span>
						
						
						
					</form>
						
				</div>
			</div>
			
		</div>
	</div>
</section>
<script>
	function check_validation()
	{
		$('#country_error').html('');
		$('#state_error').html('');
		$('#city_error').html('');
		$('#apartment_error').html('');
		$('#education_error').html('');
		$('#certificate_error').html('');
		$('#transport_error').html('');
		$('#work_exp_error').html('');
		$('#intro_error').html('');
		$('#image_error').html('');
		
		var has_error=0;
		var fileName1=document.getElementById("image").value;
		//alert(fileName1);	
		var ext2 = fileName1.substring(fileName1.lastIndexOf('.') + 1);
		//alert(ext2);
		var fileName=document.getElementById("certificate").value;
			
		var ext1 = fileName.substring(fileName.lastIndexOf('.') + 1)
		if($.trim($('#first_name').val())=='' || $.trim($('#first_name').val())==0)
		{
        		$('#first_name_error').html('First Name Please');
        		has_error=1;
        		return false;
        	}	
		
		if($.trim($('#last_name').val())=='' || $.trim($('#last_name').val())==0)
		{
        		$('#last_name_error').html('Last Name Please');
        		has_error=1;
        		return false;
        	}
		if($.trim($('#phone_number').val())=='' || $.trim($('#phone_number').val())==0)
		{
        		$('#phone_number_error').html('Contact No. Please');
        		has_error=1;
        		return false;
        	}
		
		if(isNaN($.trim($('#phone_number').val())) || $.trim($('#phone_number').val()) % 1 !=0 || parseFloat($.trim($('#phone_number').val())) != parseInt($.trim($('#phone_number').val())))
		{
        		$('#phone_number_error').html('VAlid Contact No. Please');
        		has_error=1;
        		return false;
        	}
		if($.trim($('#country').val())=='' || $.trim($('#country').val())==0)
		{
        		$('#country_error').html('Country Please');
        		has_error=1;
        		return false;
        	}
		if($.trim($('#state').val())=='' || $.trim($('#state').val())==0)
		{
        		$('#state_error').html('State Please');
        		has_error=1;
        		return false;
        	}
		if($.trim($('#city').val())=='' || $.trim($('#city').val())==0)
		{
        		$('#city_error').html('City Please');
        		has_error=1;
        		return false;
        	}
		if($.trim($('#zip').val())=='' || $.trim($('#zip').val())==0)
		{
        		$('#zip_error').html('Zip Please');
        		has_error=1;
        		return false;
        	}
		if($.trim($('#apartment').val())=='' || $.trim($('#apartment').val())==0)
		{
        		$('#apartment_error').html('Apartment Please');
        		has_error=1;
        		return false;
        	}
		if($.trim($('#education').val())=='' || $.trim($('#education').val())==0)
		{
        		$('#education_error').html('Education. Please');
        		has_error=1;
        		return false;
        	}
		if(ext1 == "doc" || ext1 == "pdf" || ext1 == "docx")
		{
		   
			document.getElementById("certificate_error").innerHTML='';
		}
		else if (fileName !='' || fileName != 0) 
		{
		     
			$('#certificate_error').html('Invalid file (only .pdf or .doc are allowed )');
        		has_error=1;
        		return false;
		}
		if($.trim($('#transport').val())=='' || $.trim($('#transport').val())==0)
		{
        		$('#transport_error').html('Transportation. Please');
        		has_error=1;
        		return false;
        	}
		$('#categories_error').html('');
						
		var chk = document.getElementsByName('categories[]');
       var len = chk.length;
           var checked = false;
       for(i=0;i<len;i++) {
            if(chk[i].checked) {
               checked=true;
                           break;
                     }
           }
       if (!checked) {
               document.getElementById('categories_error').innerHTML = "Please Select a category"; 
               return false;
             }
	     if($('#chk_'+16).attr('checked'))
	     {		
		if($.trim($('#othercategory').val())=='' || $.trim($('#othercategory').val())==0)
		{
        		$('#othercategory_error').html('Other Category Please');
        		
        		return false;
        	}
	     }	
	if($.trim($('#work_exp').val())=='')
		{
        		$('#work_exp_error').html('Work Experience. Please');
        		has_error=1;
        		return false;
        	}
		
		if($.trim($('#prof_intro').val())=='')
		{
        		$('#prof_intro_error').html('Profile Introduction. Please');
        		has_error=1;
        		return false;
        	}
		
		if(ext2 == "gif" || ext1 == "GIF" || ext2 == "JPEG" || ext2 == "jpeg" || ext2 == "jpg" || ext2 == "JPG" || ext2 == "png" || ext2 == "PNG")
		{
		   
			document.getElementById("image_error").innerHTML='';
		}
		else if (fileName1 !='' || fileName1 != 0) 
		{
		     
			$('#image_error').html('Invalid file (only gif, .jpg, .jpeg, .png are allowed )');
        		has_error=1;
        		return false;
		}
		if (has_error==0)
		{
			document.getElementById('become_taskaroo_form').submit();
		}
	   
 
	}
	
	
	function isValidEmailAddress(emailAddress)
	{
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	};
        
        function open_days(val)
        {
            if (val==1) {
               $("#all_days").hide();
            }
            else
            {
                $("#all_days").show();
            }
        }
function form_fill2(value)
{
   //alert(value);
    if (value == 16) {
	if($('#chk_'+value).attr('checked'))
	{
	$('#addothercaegory').show();
	}
	else{
	   $('#addothercaegory').hide(); 
	}
    }
    else {
	
	$('#addothercaegory').hide();
	
    }
    }
</script>