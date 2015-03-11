<?php
$dataone_fetch=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));
//print_r($dataone_fetch);
$data=$dataone_fetch[0];
$dataone_fetch1=$this->modelsignup->GetQuestionDetail($data->questionnarie_id);
$data_question=$dataone_fetch1[0];
//echo "<pre>";
//print_r($data_question);
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.datetimepicker.css"/>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.datetimepicker.js"></script>

<section class="innerpage_page">
	<div class="container">
		<div class="row">
			<?php $this->load->view('sidebarblog/sidebar_blog_account.php')?>
			
			<div class="col-md-6" style="margin-left:65px">
				<div class="sgn_up_out">
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
					<div class="pics"><h4>TASK-AROO QUESTIONNARIE EDIT</h4></div>
					<p>The information provided in this form will be used to build and help set up your Task-Aroo user profile.Your profile will be your main platform that clients will see and assists them in choosing the right person for the right job. make sure your information is detailed as possible including a list of your skills.this will create more interest,requests and inquiries from potential clients. Remeber no one can sell yourself more effectively than you. With that said lets get started.</p>
					<form class="spcing_otr" id="edit_become_taskaroo_form" name="edit_become_taskaroo_form" method="post" enctype="multipart/form-data" action="<?php echo site_url('signup/edit_become_taskaroo')?>" autocomplete="off">
					<input type="hidden" id="user_id" name="user_id" value="<?php echo $data->id;?>">
                                        <input type="hidden" id="questionnarie_id" name="questionnarie_id" value="<?php echo $data->questionnarie_id;?>">
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
						<textarea placeholder="Address" class="nm_crd_txt_b_txtarea" id="address" cols="43" rows="15" name="address"><?php echo $data_question->address; ?></textarea>
                                                </div>
                                                <div id="address_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                <div class="frst_nm_rw clearfix">
							<input class="nm_crd_txt_b" type="text" id="age" value="<?php echo $data_question->date_of_birth; ?>" name="age" placeholder="Date of Birth" value=""/>
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
                                                                <option value="1" <?php if($data_question->education == 1){echo "selected";} ?>>Secondary</option>
                                                                <option value="2" <?php if($data_question->education == 2){echo "selected";}?>>College</option>
                                                                <option value="3" <?php if($data_question->education == 3){echo "selected";}?>>University</option>
                                                                
                                                    </select>
						    </label>
                                               
                                                <div id="education_error" style="color: red;margin-bottom: 20px;"></div>
                                                 </div>
						</div>
                                                <div class="frst_nm_rw clearfix">
                                                    <textarea class="nm_crd_txt_b_txtarea" placeholder="Other diplomas" id="diplomas"  cols="43" rows="15" name="diplomas"><?php echo $data_question->other_diploma; ?></textarea>
                                                </div>
                                                <div id="diplomas_error" style="color: red;margin-bottom: 20px;"></div>
                                                <div class="frst_nm_rw clearfix">
							
                                                    <div>Upload Certificate</div>
						    <?php
							
							if(trim($data_question->certificate) =='' OR trim($data_question->certificate) == '0')
							{
							?>
						    <div></div>
						    <?php
						    }
						    else
						    {
							?>
							<div id="remove_div">
							
						    <div>Remove Previous Certificate?</div>
						    <?php echo $data_question->certificate?><a onclick="remove_certificate(<?php echo $data_question->id;?>)"><img style="margin-bottom:5px;margin-left:10px" width="11px" src="<?php echo base_url().'images/cross.png'?>"></img></a>
						    </div>
							<?php
							
						    }
						    ?>
                                                    <input id="certificate" name="certificate" class="" type="file">
                                                 </div>
                                                 <div id="certificate_error" style="color: red;margin-bottom: 20px;"></div>
                                                <div class="frst_nm_rw clearfix">
                                                    <div>Are you licensed driver</div>
                                                    <ul class="gf-radio">
							<li>
								<input type="radio" name="licensed" value="1" id="licensed" <?php if($data_question->licenced_driver == 1){echo "checked";}?>>
								<label for="licensed">Yes</label>
							</li>
							<li>
								<input type="radio" name="licensed" value="0" id="licensed1" <?php if($data_question->licenced_driver == 0){echo "checked";}?>>
								<label for="licensed1">No</label>
							</li>
						    </ul>
                                                 </div>
                                                <div id="licensed_error" style="color: red;margin-bottom: 20px;"></div>
                                                <div class="frst_nm_rw clearfix">
                                                    <div>If yes do you Have Car</div>
						     <ul class="gf-radio">
							<li>
                                                    <input name="car" id="car"value="1"  type="radio" <?php if($data_question->have_car == 1){echo "checked";}?>><label for="car">Yes</label>
							</li>
							<li>
                                                    <input name="car" id="car1" value="0" type="radio" <?php if($data_question->have_car == 0){echo "checked";}?>><label for="car1">No</label>
						    </li>
						     </ul>
                                                 </div>
							
                                                <div id="car_error" style="color: red;margin-bottom: 20px;"></div>

                                                                                               
                                                 <div class="card_outr clearfix">
                                               <div class="slct_outr slct">
						<label>
                                                    <select name="transport" id="transport">
                                                                <option value="">Select Mode of Transportation</option>
                                                                <option value="1" <?php if($data_question->mode_of_transportation == 1){echo "selected";} ?>>City Transit</option>
                                                                <option value="2" <?php if($data_question->mode_of_transportation == 2){echo "selected";} ?>>Car</option>
                                                               
                                                                
                                                    </select>
						</label>
                                                </div>
                                                <div id="transport_error" style="color: red;margin-bottom: 20px;"></div></div>

                                                
                                                 <div class="frst_nm_rw clearfix">
                                                    <div>Do you have a secure Background Check</div>
						    <p>Note a background note is not necessary but it will make you more hireable</p>
						      <ul class="gf-radio">
							<li>
                                                    <input name="background" id="background1" value="1"  type="radio" <?php if($data_question->background_check == 1){echo "checked";}?>><label for="background1">Yes</label>
							</li>
							<li>
                                                    <input id="background2" name="background" value="0" type="radio" <?php if($data_question->background_check == 0){echo "checked";}?>><label for="background2">No</label></li>
						      </ul>
                                                 </div>
                                                <div id="background_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                <div class="frst_nm_rw clearfix">
                                                    <div>Categories</div>
						    <ul class="gf-checkbox ">
																		<li>
                                                    <?php $categories = $this->modelsignup->allCategories();
                                                   
						    if($data_question->task_category != '')
						    {
							@$task_cat= explode(',', $data_question->task_category);
						    }
						    //echo "<pre>";
						   // print_r($task_cat);
                                                    foreach($categories as $cat)
                                                    {
							
								
								if(isset($task_cat) AND count($task_cat)>0)
								{
									if (in_array($cat->id, $task_cat))
									{
								    ?>
									<input name="categories[]" id="checkbox_.<?php echo $cat->id;?>" value="<?php echo $cat->id;?>"  <?php echo 'checked="checked"'?> type="checkbox"><label for="checkbox_.<?php echo $cat->id;?>"><?php echo $cat->title;?></label></input></li><li>
								    <?php
									}
									else
									{
										?>
										<input name="categories[]" id="" value="<?php echo $cat->id;?>" id="checkbox_.<?php echo $cat->id;?>" type="checkbox"><label for="checkbox_.<?php echo $cat->id;?>"><?php echo $cat->title;?></label></input></li><li>
	
										<?php
									}
								}
								else{
									?>
									<input name="categories[]" id="checkbox_.<?php echo $cat->id;?>" value="<?php echo $cat->id;?>"  type="checkbox"><label for="checkbox_.<?php echo $cat->id;?>"><?php echo $cat->title;?></label></input></li>

									<?php
								}
							
							
                                                    }
                                                    ?>
						    </ul>
                                                 </div>
                                                <div id="categories_error" style="color: red;margin-bottom: 20px;"></div>

                                                
                                                <div class="frst_nm_rw clearfix">
                                                    <div>What is your prefered availablity?</div>
						    <ul class="gf-radio">
							<li>
                                                    <input id="availablity1" name="availablity"  value="1"  onClick="open_days(this.value);"  <?php if($data_question->availability == 1){echo "checked";}?> type="radio"><label for="availablity1">Anytime Weekdays</label>
							</li><li>
                                                    <input id="availablity2" name="availablity" value="2" onClick="open_days(this.value);" <?php if($data_question->availability == 2){echo "checked";}?> type="radio"><label for="availablity2">Days of Week</label>
						    </li></ul>
                                                 </div>
						<?php
						if($data_question->availability == 2)
						{
						?>
                                                <div id="all_days" style="display:block;">
                                                    <div>Days Availablity</div>
						    <?php
						    if($data_question->days_availability != '')
						    {
							@$days_available= explode(',', $data_question->days_availability);
						    }
						    ?>
                                                    <div>
							<ul class="gf-checkbox ">
																		
																			<?php if(count(@$days_available)>0){ ?>
                                                        <li><input class="checks" name="days[]" value="1"  id="chk_1" <?php if(in_array(1,@$days_available)){echo "checked";}?> type="checkbox"><label for="chk_1">Monday</label></li><li>
                                                        <input class="checks" name="days[]" value="2"  id="chk_2" <?php if(in_array(2,@$days_available)){echo "checked";}?>  type="checkbox"><label for="chk_2">Tuesday</label></li><li>
                                                        <input class="checks" name="days[]" value="3"  id="chk_3" <?php if(in_array(3,@$days_available)){echo "checked";}?>  type="checkbox"><label for="chk_3">Wednesday</label></li><li>
                                                        <input class="checks" name="days[]" value="4" id="chk_4" <?php if(in_array(4,@$days_available)){echo "checked";}?>  type="checkbox"><label for="chk_4">Thursday</label></li><li>
                                                        <input class="checks" name="days[]" value="5" id="chk_5" <?php if(in_array(5,@$days_available)){echo "checked";}?>  type="checkbox"><label for="chk_5">Friday</label></li><li>
                                                        <input class="checks" name="days[]" value="6" id="chk_6" <?php if(in_array(6,@$days_available)){echo "checked";}?>  type="checkbox"><label for="chk_6">Saturday</label></li><li>
                                                        <input class="checks" name="days[]" value="7" id="chk_7" <?php if(in_array(7,@$days_available)){echo "checked";}?>  type="checkbox"><label for="chk_7">Sunday</label></li><li>
							<?php }
							else{
								?>
								<li>
                                                        <input id="d_1" name="days[]" value="1"   type="checkbox"><label for="d_1">Monday</label></li><li>
                                                        <input id="d_2" name="days[]" value="2"   type="checkbox"><label for="d_2">Tuesday</label></li><li>
                                                        <input id="d_3" name="days[]" value="3"   type="checkbox"><label for="d_3">Wednesday</label></li><li>
                                                        <input id="d_4" name="days[]" value="4"   type="checkbox"><label for="d_4">Thursday</label></li><li>
                                                        <input id="d_5" name="days[]" value="5"   type="checkbox"><label for="d_5">Friday</label></li><li>
                                                        <input id="d_6" name="days[]" value="6"   type="checkbox"><label for="d_6">Saturday</label></li><li>
                                                        <input id="d_7" name="days[]" value="7"   type="checkbox"><label for="d_7">Sunday</label></li><li>
								<?php
							}
							?>
							</ul>
                                                    </div>
                                                    <div>Time Availablity</div>
						     <?php
						    if($data_question->time_availability != '')
						    {
							@$time_available= explode(',', $data_question->time_availability);
						    }
						    ?>
                                                    <div>
							<ul class="gf-checkbox ">
						<?php if(count(@$time_available)> 0){ ?>
						<li>
                                                        <input  class="checks" name="time[]" value="1" id="c_1" <?php if(in_array(1,@$time_available)){echo "checked";}?> type="checkbox"><label for="c_1">Morning</label></li><li>
                                                        <input class="checks" name="time[]" value="2"  id="c_2" <?php if(in_array(2,@$time_available)){echo "checked";}?>  type="checkbox"><label for="c_2">Afternoon</label></li><li>
                                                        <input class="checks" name="time[]" value="3" id="c_3" <?php if(in_array(3,@$time_available)){echo "checked";}?> type="checkbox"><label for="c_3">Evening</label></li><li>
                                                        <input class="checks" name="time[]" value="4"  id="c_4" <?php if(in_array(4,@$time_available)){echo "checked";}?> type="checkbox"><label for="c_4">Night</label></li><li>
							<?php }
							else{
								?>
								<li>
                                                        <input id="t_1" name="time[]" value="1"   type="checkbox"><label for="t_1">Morning</label></li><li>
                                                        <input id="t_2" name="time[]" value="2"   type="checkbox"><label for="t_2">Afternoon</label></li><li>
                                                        <input id="t_3" name="time[]" value="3"  type="checkbox"><label for="t_3">Evening</label></li><li>
                                                        <input id="t_4" name="time[]" value="4"   type="checkbox"><label for="t_4">Night</label></li><li>
								<?php
							}
							?>
							</ul>
                                                       
                                                    </div>
                                                </div>
						<?php
						}
						else{
							?>
							<div id="all_days1" style="display:none;">
                                                    <div>Days Availablity</div>
                                                    <div>
							<ul class="gf-checkbox ">
																		<li>
                                                        <input id="d_1" name="days[]" value="1"   type="checkbox"><label for="d_1">Monday</label></li><li>
                                                        <input id="d_2" name="days[]" value="2"   type="checkbox"><label for="d_2">Tuesday</label></li><li>
                                                        <input id="d_3" name="days[]" value="3"   type="checkbox"><label for="d_3">Wednesday</label></li><li>
                                                        <input id="d_4" name="days[]" value="4"   type="checkbox"><label for="d_4">Thursday</label></li><li>
                                                        <input id="d_5" name="days[]" value="5"   type="checkbox"><label for="d_5">Friday</label></li><li>
                                                        <input id="d_6" name="days[]" value="6"   type="checkbox"><label for="d_6">Saturday</label></li><li>
                                                        <input id="d_7" name="days[]" value="7"   type="checkbox"><label for="d_7">Sunday</label></li><li>
                                                    </div>
                                                    <div>Time Availablity</div>
                                                    <div>
							<ul class="gf-checkbox ">
																		<li>
                                                        <input id="t_1" name="time[]" value="1"   type="checkbox"><label for="t_1">Morning</label></li><li>
                                                        <input id="t_2" name="time[]" value="2"   type="checkbox"><label for="t_2">Afternoon</label></li><li>
                                                        <input id="t_3" name="time[]" value="3"  type="checkbox"><label for="t_3">Evening</label></li><li>
                                                        <input id="t_4" name="time[]" value="4"   type="checkbox"><label for="t_4">Night</label></li><li></ul>
                                                       
                                                    </div>
                                                </div>
                                                <div id="availablity_error" style="color: red;margin-bottom: 20px;"></div>
							<?php
						}
						
						?>
                                                <div id="availablity_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                 <div class="frst_nm_rw clearfix">
                                                    <div>I prefer to work from</div>
						     <ul class="gf-radio">
							<li>
                                                    <input name="work_from"  id="work_from1" value="1"  <?php if($data_question->preference == 1){echo "checked";}?> type="radio"><label for="work_from1">Person</label>                                                    </li><li>
                                                    <input id="work_from2" name="work_from" value="2"   <?php if($data_question->preference == 2){echo "checked";}?> type="radio"><label for="work_from2">Home</label>
						    </li><li>
                                                    <input id="work_from3" name="work_from"  value="3"  <?php if($data_question->preference == 3){echo "checked";}?> type="radio"><label for="work_from3">Both</label>
</li></ul>
                                                 </div>
                                                <div id="work_from_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                <div class="frst_nm_rw clearfix">
						<textarea class="nm_crd_txt_b_txtarea" placeholder="Work Experiencs" id="work_exp"  cols="43" rows="15" name="work_exp"><?php echo $data_question->work_experiance;?></textarea>
                                                </div>
                                                <div id="work_exp_error" style="color: red;margin-bottom: 20px;"></div>
                                                
                                                <div class="frst_nm_rw clearfix">
						<textarea placeholder="Profile Intoduction" class="nm_crd_txt_b_txtarea" id="prof_intro"  cols="43" rows="15" name="prof_intro"><?php echo $data_question->tell_about_yourself;?></textarea>
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
							<img src="<?php echo $img_path;?>">
						</div>
						<?php
						}
						?>
						<div class="">
							<input type="file" id="image" name="image" class=""/>
						</div>
						<div id="image_error" style="color: red;margin-bottom: 20px;"></div>
						<span class="sgnup">
							<input type="button" class="sgn_btu" value="Submit" onclick="check_validation();"/>
						</span>
						
						
						
					</form>
						
				</div>
			</div>
			<div class="col-md-3"> </div>
		</div>
	</div>
</section>
<script>
	function check_validation()
	{
		/*var has_error=0;
		if ($.trim($('#first_name').val())=='')
		{
			$('#name_error').html('First name is required.');
			$('#first_name').focus();
			has_error=1;
			return false;
		}
		else if ($.trim($('#last_name').val())=='')
		{
			$('#name_error').html('Last name is required.');
			$('#last_name').focus();
			has_error=1;
			return false;
		}
		else
		{
			$('#name_error').html('');
		}
		
		if ($.trim($('#phone_number').val())=='')
		{
			$('#phone_number_error').html('Phone number is required.');
			$('#phone_number').focus();
			has_error=1;
			return false;
		}
		else
		{
			$('#phone_number_error').html('');
		}
		if ($.trim($('#email').val())=='')
		{
			$('#email_error').html('Email is required.');
			$('#email').focus();
			has_error=1;
			return false;
		}
		else if ($.trim($('#email').val())!='')
		{
			
			if (!isValidEmailAddress($('#email').val()))
			{
				$('#email_error').html('Please enter valid email');
				$('#email').focus();
				has_error=1;
				return false;	
			}
			else
			{
				$.ajax({
			url: "<?php echo base_url(); ?>index.php/signup/check_email_update",
			data: {email:$('#email').val(),user_id:$('#user_id').val()},
			async: false,
			success: function(response) {

				var response_array = response.split('[SEPARETOR]');
	
				if (response_array[1]==0) {
				    $("#email_error").html('');
				    $("#email_hidden").val('');
				    //email_status=1;
				    //var email_value=0;
					if (($('#password').val()!='') && ($('#facebook_id').val()==''))
					{
						if ($('#password').val().length<6)
						{
						    $('#password_error').html('Password should not be less than 6 charecters');
						    $('#password').focus();
						    has_error=1;
						    return false;
						}
						else
						{
							$('#password_error').html('');
						}
						if ($.trim($('#retype_password').val())=='')
						{
						    $('#retype_password_error').html('Confirm Password is required');
						    $('#retype_password').focus();
						    has_error=1;
						    return false;
						}
						else if (($.trim($('#retype_password').val())!='') && ($.trim($('#password').val())!=$.trim($('#retype_password').val())))
						{
						    $('#retype_password_error').html('Password and confirm password should be same');
						    $('#retype_password').focus();
						    has_error=1;
						    return false;
						}
						else
						{
						    $('#retype_password_error').html('');
						}
					}
					if ($('#image').val()!='')
					{
					   var image_type=$('#image').val();
					   var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
					   if(!re.exec(image_type))
					   {
						$("#image_error").html("Only .jpg, .png, .jpeg, .gif are allowed");
						has_error=1;
						return false;
					   }
					   else
					   {
						$("#image_error").html('');
					   }
					}
					
				}
				else
				{
				    $("#email_error").html('This email is already registered.');
				//var email_value=1;
				    $("#email_hidden").val('1');
				    has_error=1;
				    return false;
				}
				//return $("#email_hidden").val();
			}
		});
				
				//return false;
				
			}
		}
		else
		{
			$("#email_error").html('');
		}
		//if (email_status==1)
		//{
		//		
		//}
		if (has_error==0)
		{*/
			document.getElementById('edit_become_taskaroo_form').submit();
		//}
	   
 
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
	       $(".checks").attr("checked",false);
	        $("#all_days1").hide();
	      
            }
            else
            {
                $("#all_days").show();
		 $("#all_days1").show();
            }
        }
	function remove_certificate(q_id)
	{
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/signup/delete_certificate",
			data: {q_id:q_id},
			success: function(response) {
				$("#remove_div").remove();
			}
		})	
	}
</script>