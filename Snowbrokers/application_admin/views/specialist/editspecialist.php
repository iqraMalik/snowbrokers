<?php
$this->load->view('includes/header');
$dataone_fetch = $this->modeladmin->getDataSpecialist($this->input->post('ListingUserid'));

$dataone_fetch_address=$this->modeladmin->getDataSpecialistAddress($this->input->post('ListingUserid'));

?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Specialist Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Specialist</h4></div></div>
				<div class="row-fluid filter-block" style="margin-bottom: 0px;">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('specialist/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('specialist/edit_specialist');?>" name="new_specialist" id="new_specialist" method="post" autocomplete="off">
							<input type="hidden" name="ListingUserid" id="ListingUserid" value="<?php echo $this->input->post('ListingUserid'); ?>" />
							<input type="hidden" name="email_format" id="email_format" value="">
							<input type="hidden" name="email_hidden" id="email_hidden" value="">
							<input type="hidden" name="username_hidden" id="username_hidden" value="">
							<input type="hidden" name="image_prevalue" id="image_prevalue" value="<?php echo $dataone_fetch[0]->image?>">
							<input type="hidden" name="personal_email_format" id="personal_email_format" value="">
							<input type="hidden" name="business_email_format" id="business_email_format" value="">
							       
							       
							<input type="hidden" name="business_website_format" id="business_website_format" value="">
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Login Email :</label>
							       <input type="text" class="span5 required" label="Email" name="email" id="email" onblur="check_email_edit_specialist(this.value,'<?php echo $dataone_fetch[0]->id;?>');" value="<?php echo htmlentities($dataone_fetch[0]->email)?>">
							       <div id="email_error" class="error_div" style="color:red;"></div>
							</div> 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Password :</label>
							       <input type="password" class="span5" label="Password" name="password" id="password">
							       <div id="password_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Confirm Password :</label>
							       <input type="password" class="span5" label="Confirm Password" name="confirm_password" id="confirm_password">
							       <div id="confirm_password_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> First Name :</label>
							       <input type="text" class="span5 required" label="First Name" name="first_name" id="first_name" value="<?php echo htmlentities($dataone_fetch[0]->first_name)?>">
							       <div id="first_name_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Last Name :</label>
							       <input type="text" class="span5 required" label="Last Name" name="last_name" id="last_name" value="<?php echo htmlentities($dataone_fetch[0]->last_name)?>">
							       <div id="last_name_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Title :</label>
							       <?php $TypeTitle = $this->modeladmin->GetAllTitle();?>
							       <div class="ui-select">
								     <select label="Ttitle" name="title" id="title" class="span9 required" style="width:130%">
								      <option value="">SelectTitle</option>
								      <?php
								      foreach($TypeTitle as $title_name)
								      {
									  if($title_name->id==$dataone_fetch[0]->title)
									  {
									     $select_title="selected";
									  }
									  else
									  
									  {
									     $select_title="";
									  }
								      ?>
								      <option value="<?php echo $title_name->id?>"<?php echo $select_title;?>><?php echo $title_name->title_name;?></option>
								      <?php
								      }
								      ?>
								     </select>
							       </div>
							       <div id="title_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Gender :</label>
							       <input type="radio" name="gender" id="gender1" value="1" <?php if($dataone_fetch[0]->gender==1){echo "checked";}else{echo "";}?>>Male&nbsp;&nbsp;
							       <input type="radio" name="gender" id="gender2" value="2" <?php if($dataone_fetch[0]->gender==2){echo "checked";}else{echo "";}?>>Female
							       <div id="gender_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Date of Birth :</label>
							       <div class="ui-select" >
								      <select label="Day" name="day" id="day" class="span9 required" style="width:130%">
									       <option value="">Select Day</option>
									       <?php
									       for($day=01;$day<=31;$day++)
									       {
										    $fetch_day=date('d',strtotime($dataone_fetch[0]->date_of_birth));
										    if($day==$fetch_day)
										    {
											   $selected_day="selected";
										    }
										    else
										    {
											   $selected_day="";
										    }
									       ?>
									       <option value="<?php echo $day; ?>" <?php echo $selected_day;?>><?php echo $day; ?></option>
									       <?php
									       }
									       ?>
								      </select>
							       </div>
							       <div class="ui-select" >
								      <select label="Month" name="month" id="month" class="span9 required" style="width:130%">
									       <option value="">Select Month</option>
									       <?php
									       $month_array=array("01"=>"January","02"=>"Febuary","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
									       foreach($month_array as $month_key=>$month_value)
									       {
										    $fetch_month=date('m',strtotime($dataone_fetch[0]->date_of_birth));
										    if($month_key==$fetch_month)
										    {
											   $selected_month="selected";
										    }
										    else
										    {
											   $selected_month="";
										    }
									       ?>
									       <option value="<?php echo $month_key; ?>" <?php echo $selected_month;?>><?php echo $month_value; ?></option>
									       <?php
									       }
									       ?>
								      </select>
							       </div>
							       <div class="ui-select" >
								      <select label="Year" name="year" id="year" class="span9 required" style="width:130%">
									       <option value="">Select Year</option>
									       <?php
									       $previous_year=1930;
									       $next_year=date('Y');
									       for($year=$previous_year;$year<=$next_year;$year++)
									       {
										    $fetch_year=date('Y',strtotime($dataone_fetch[0]->date_of_birth));
										    if($year==$fetch_year)
										    {
											   $selected_year="selected";
										    }
										    else
										    {
											   $selected_year="";
										    }
									       ?>
									       <option value="<?php echo $year; ?>" <?php echo $selected_year;?>><?php echo $year; ?></option>
									       <?php
									       }
									       ?>
								      </select>
							       </div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;">
							       
							       <div id="day_error" class="error_div" style="color:red;float:left;padding-right: 60px;"></div>
							       <div id="month_error" class="error_div" style="color:red;float:left;padding-right: 60px;"></div>
							       <div id="year_error" class="error_div" style="color:red;float:left;padding-right: 60px;"></div>
							 </div>
							<?php
							 if($dataone_fetch[0]->image!="")
							 {
							       $image_path=base_url()."images/specialist_profile_image/thumbs/".$dataone_fetch[0]->image;
							  ?>
							  <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Existing Image :</label>
							       <img src="<?php echo $image_path;?>">
							  </div>
							  <?php
							 }
							 ?>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Image :</label>
							       <input type="file" class="span9" name="image" id="image" label="Profile Image">
							       <div id="image_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Speciality :</label>
								<?php $TypeData = $this->modeladmin->GetSpecialistType();?>
								<div class="ui-select">
								    <select label="Speciality" name="type" id="type" onchange="change_type(this.value);">
									     <option value="">Select Type</option>
									     <?php
									     foreach($TypeData as $type_done)
									     {
										    if($type_done->id==$dataone_fetch[0]->type)
										    {
											   $select="selected";
										    }
										    else
										    {
											   $select="";
										    }
									     ?>
									     <option value="<?php echo $type_done->id; ?>" <?php echo $select;?>><?php echo $type_done->name ?></option>
									     <?php
									     }
									     ?>
								    </select>
								</div>
								<div id="type_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div id="sub_type_content">
							       <?php
							       if($dataone_fetch[0]->sub_type!=0)
							       {
							       ?>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								      <label>Sub Specialty :</label>
								      <div class="ui-select" >
									     <?php $TypeSubData = $this->modeladmin->GetSpecialistSubType($dataone_fetch[0]->type);?>
									     <select name="sub_type" id="sub_type" class="span6" label="Sub Type" style="width:180px;">
									     <option value="">Select Type</option>
									     <?php
									     foreach($TypeSubData as $type_done)
									     {
										    if($type_done->id==$dataone_fetch[0]->sub_type)
										    {
											   $subtype_select="selected";
										    }
										    else
										    {
											   $subtype_select="";
										    }
									     ?>
									     <option value="<?php echo $type_done->id; ?>"<?php echo $subtype_select;?>><?php echo $type_done->name ?></option>
									     <?php
									     }
									     ?>
									     </select>
								      </div>
							       </div>
							       <?php
							       }
							       ?>
							       
							 </div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Board Certified :</label>
							       <input type="radio" name="board_certified" id="board_certified1" value="1" <?php if($dataone_fetch[0]->board_certified==1){echo "checked";}else{echo "";}?>>Yes&nbsp;&nbsp;
							       <input type="radio" name="board_certified" id="board_certified2" value="2" <?php if($dataone_fetch[0]->board_certified==2){echo "checked";}else{echo "";}?>>No
							       <div id="board_certified_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Personal Lisence :</label>
							       <input type="text" name="personal_lisence" id="personal_lisence" class="span5 required" label="Personal Lisence" value="<?php echo htmlentities($dataone_fetch[0]->personal_lisence)?>">
							       <div id="personal_lisence_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Lisence State:</label>
							       <div class="ui-select">
								      <?php $TypeState = $this->modeladmin->GetAllState();?>
								      <select name="lisence_state" id="lisence_state" class="span9" style="width:130%">
									     <option value="">Select State</option>
									     <?php foreach($TypeState as $state_details)
									     {
										    if($state_details->id==$dataone_fetch[0]->lisence_state)
										    {
											   $select_lisence="selected";
										    }
										    else
										    {
											   $select_lisence="";
										    }
									     ?>
									     <option value="<?php echo $state_details->id;?>"<?php echo $select_lisence;?>><?php echo $state_details->state_name;?></option>
									     <?php
									     }
									     ?>
								      </select>
								      <div id="lisence_state_error" class="error_div" style="color:red;"></div>
							       </div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Cell Number :</label>
							       <input type="text" class="span5" label="Cell Number" name="phone_number" id="phone_number" value="<?php echo htmlentities($dataone_fetch[0]->phone_number)?>">
							       <div id="phone_number_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Personal Email :</label>
							       <input type="text" class="span5" label="Personal Email" name="personal_email" id="personal_email" onblur="check_personal_email(this.value);" value="<?php echo htmlentities($dataone_fetch[0]->personal_email)?>">
							       <div id="personal_email_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>How did you hear about us  :</label>
							       
							       <input type="radio" name="hear_about" id="hear_about1" value="1" <?php if($dataone_fetch[0]->hear_about==1){echo "checked";}else{echo "";}?>>Google&nbsp;&nbsp;
							       <input type="radio" name="hear_about" id="hear_about2" value="2" <?php if($dataone_fetch[0]->hear_about==2){echo "checked";}else{echo "";}?>>Colleague&nbsp;&nbsp;
							       <input type="radio" name="hear_about" id="hear_about3" value="3" <?php if($dataone_fetch[0]->hear_about==3){echo "checked";}else{echo "";}?>>Calender Doc users&nbsp;&nbsp;
							       <input type="radio" name="hear_about" id="hear_about4" value="4" <?php if($dataone_fetch[0]->hear_about==4){echo "checked";}else{echo "";}?>>News&nbsp;&nbsp;
							       <input type="radio" name="hear_about" id="hear_about5" value="5" <?php if($dataone_fetch[0]->hear_about==5){echo "checked";}else{echo "";}?>>Ads
							       <div id="hear_job_error" class="error_div" style="color:red;"></div>
							</div>
							
							
							
							
							
							<?php
							 if(count($dataone_fetch_address)>0)
							 {
							       foreach($dataone_fetch_address as $data_done_address)
							       {
							?>
							<div id="edit_div<?php echo $data_done_address->id?>">
							       <input type="hidden" name="edit_whole_address[]" id="edit_whole_address<?php echo $data_done_address->id;?>" value="<?php echo $data_done_address->id;?>">
							       
							       
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Business Name :</label>
							       <input type="text" class="span5" label="Business Name" name="edit_business_name[]" id="edit_business_name<?php echo $data_done_address->id;?>" value="<?php echo htmlentities($data_done_address->name)?>">
							       <div id="edit_business_name_error<?php echo $data_done_address->id;?>" class="error_div" style="color:red;"></div>
							       </div>
							       
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								      <label>Business Website Url :</label>
								      <input type="text" class="span5" label="Business Website Url" name="edit_business_website[]" id="edit_business_website<?php echo $data_done_address->id;?>" value="<?php echo htmlentities($data_done_address->website_url)?>" onblur="check_business_url_edit(<?php echo $data_done_address->id;?>);">
								      <div id="edit_business_website_error<?php echo $data_done_address->id;?>" class="error_div" style="color:red;"></div>
							       </div>
							       
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								      <label>Business Email :</label>
								      <input type="text" class="span5" label="Business Email" name="edit_business_email[]" id="edit_business_email<?php echo $data_done_address->id;?>" value="<?php echo htmlentities($data_done_address->email)?>" onblur="check_business_email_edit(<?php echo $data_done_address->id;?>);">
								      <div id="edit_business_email_error<?php echo $data_done_address->id;?>" class="error_div" style="color:red;"></div>
							       </div>
							       
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Business Address :</label>
							       
							       </div>

							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Country Name:</label>
								<?php $CountryData = $this->modeladmin->GetAllCountry();?>
								<select name="edit_country[]" id="edit_country<?php echo $data_done_address->id;?>" class="span5" onchange="GetStateFromCountryEdit(this.value,'<?php echo $data_done_address->id;?>');" label="Country">
									<option value="">Select Country</option>
									<?php foreach ($CountryData as $dataone): ?>
										<option value="<?php echo $dataone->id; ?>" <?php if($dataone->id==$data_done_address->country){echo "selected";}else{echo "";}?>><?php echo $dataone->country_name ?></option>
									<?php endforeach; ?>
								</select>
								
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>State Name:</label>
								<label id="edit_statecontent<?php echo $data_done_address->id;?>">
								<?php
								if(!is_numeric($data_done_address->state))
								{
							       ?>
							       <input type="text" name="edit_state[]" id="edit_state<?php echo $data_done_address->id;?>" class="span5" value="<?php echo htmlentities($data_done_address->state)?>">
							       <?php
								}
								else
								{
								?>
								
								      <?php
								      $CountryData_State = $this->modeladmin->Get_StateDetailsModel($data_done_address->country);
								      ?>
								      <select name="edit_state[]" id="edit_state<?php echo $data_done_address->id;?>" class="span5">
									     <option value="">Select State</option>
									     <?php foreach ($CountryData_State as $dataone_State): ?>
									     <option value="<?php echo $dataone_State->id; ?>" <?php if($dataone_State->id == $data_done_address->state){ echo 'selected'; } ?>><?php echo $dataone_State->state_name ?></option>
									     <?php endforeach; ?>
								      </select>
								
								<?php
								}
								?>
								</label>
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>City Name:</label>
								<label id="citycontent">
									<input type="text" class="span5" value="<?php echo htmlentities($data_done_address->city);?>" label="City" name="edit_city[]" id="edit_city<?php echo $data_done_address->id;?>">
								</label>
								
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Street :</label>
							       <label id="citycontent">
								       <input type="text" class="span5" value="<?php echo htmlentities($data_done_address->street);?>" label="Street" name="edit_street[]" id="edit_street<?php echo $data_done_address->id;?>">
							       </label>
							       <div id="edit_street_error" class="error_div" style="color:red;"></div>
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								       <label>Zipcode :</label>
								       <label id="citycontent">
									       <input type="text" class="span5" value="<?php echo htmlentities($data_done_address->zipcode);?>" label="Zipcode" name="edit_zipcode[]" id="edit_zipcode<?php echo $data_done_address->id;?>">
								       </label>
								       <div id="edit_zipcode_error" class="error_div" style="color:red;"></div>
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Address :</label>
								<textarea class="span5" label="Address" name="edit_address[]" id="edit_address<?php echo $data_done_address->id;?>"><?php echo htmlentities($data_done_address->address);?></textarea>
								
							       </div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Business Phone :</label>
							       <label id="citycontent">
								       <input type="text" class="span5" value="<?php echo htmlentities($data_done_address->phone_number) ?>" label="Business Phone" name="edit_business_phone[]" id="edit_business_phone<?php echo $data_done_address->id;?>">
							       </label>
							       <div id="edit_business_phone_error<?php echo $data_done_address->id;?>" class="error_div" style="color:red;"></div>
							       </div>
								
								<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								       <label>Business Fax :</label>
								       <label id="citycontent">
									       <input type="text" class="span5" value="<?php echo htmlentities($data_done_address->fax) ?>" label="Business Fax" name="edit_business_fax[]" id="edit_business_fax<?php echo $data_done_address->id;?>" >
								       </label>
								       <div id="edit_business_fax_error<?php echo $data_done_address->id;?>" class="error_div" style="color:red;"></div>
								</div>
							       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								      <a href="javascript:void()" onclick="delete_form(<?php echo $data_done_address->id?>)">Delete</a>
							       </div>
							</div>
							<?php
							       }
							 }
							 ?>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Business Name :</label>
							       <input type="text" class="span5" label="Business Name" name="business_name[]" id="business_name">
							       <div id="business_name_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Business Website Url :</label>
							       <input type="text" class="span5" label="Business Website Url" name="business_website[]" id="business_website0" onblur="check_business_url(0);">
							       <div id="business_website_error0" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Business Email :</label>
							       <input type="text" class="span5" label="Business Email" name="business_email[]" id="business_email0" onblur="check_business_email(0);">
							       <div id="business_email_error0" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Business Address :</label>
							       
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Country Name:</label>
							       <?php $CountryData = $this->modeladmin->GetAllCountry();?>
							       <select name="country[]" id="country0" class="span5" onchange="GetStateFromCountry(this.value);" label="Country">
								       <option value="">Select Country</option>
								       <?php foreach ($CountryData as $dataone): ?>
									       <option value="<?php echo $dataone->id; ?>"><?php echo $dataone->country_name ?></option>
								       <?php endforeach; ?>
							       </select>
							       <div id="country_error" class="error_div" style="color:red;"></div>
						       </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>State Name:</label>
							       <label id="statecontent">
								       <input type="text" class="span5" readonly="readonly" value="Select Country First">
							       </label>
							       <div id="state_error" class="error_div" style="color:red;"></div>
						       </div>
						       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>City Name:</label>
							       <label id="citycontent">
								       <input type="text" class="span5" value="" label="City0" name="city[]" id="city">
							       </label>
							       <div id="city_error" class="error_div" style="color:red;"></div>
						       </div>
						       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Street :</label>
							       <label id="citycontent">
								       <input type="text" class="span5" value="" label="Street" name="street[]" id="street0">
							       </label>
							       <div id="street_error" class="error_div" style="color:red;"></div>
						       </div>
						       <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Zipcode :</label>
							       <label id="citycontent">
								       <input type="text" class="span5" value="" label="Zipcode" name="zipcode[]" id="zipcode0">
							       </label>
							       <div id="zipcode_error" class="error_div" style="color:red;"></div>
						       </div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Address :</label>
							       <textarea class="span5" label="Address" name="address[]" id="address0"></textarea>
							       <div id="address_error" class="error_div" style="color:red;"></div>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Business Phone :</label>
							       <label id="citycontent">
								       <input type="text" class="span5" value="" label="Business Phone" name="business_phone[]" id="business_phone0">
							       </label>
							       <div id="business_phone_error" class="error_div" style="color:red;"></div>
						       </div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Business Fax :</label>
							       <label id="citycontent">
								       <input type="text" class="span5" value="" label="Business Fax" name="business_fax[]" id="business_fax0">
							       </label>
							       <div id="business_fax_error" class="error_div" style="color:red;"></div>
							</div>
							<div id="additional_address"></div>
 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							      <a href="javascript:void(0)" onclick="add_more_address()" style="color:red">Add More</a>
							</div>
							
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label>Name of practice management system :</label>
							       <label id="citycontent">
								       <input type="text" class="span5" value="<?php echo htmlentities($dataone_fetch[0]->management_system) ?>" label="Practice Management System" name="management_system" id="management_system" >
							       </label>
							       <div id="management_system_error" class="error_div" style="color:red;"></div>
							</div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Status :</label>
								<div class="ui-select">
								    <select label="Status" name="status" id="status" >
									   <option value="1" <?php if($dataone_fetch[0]->status==1){echo 'selected';} ?>>Active</option>
									   <option value="0" <?php if($dataone_fetch[0]->status==0){echo 'selected';} ?>>Inactive</option>
								    </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Submit" class="btn-glow primary" id="createUser">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('specialist/index'); ?>">Cancel</a>
							 </div>
						  </form>
					   </div>
				    </div>
				</div>
			 </div>
		  </div>
	   </div>
    </div>
       <form class="new_user_form" action="" id="frmValidation" method="post">
	<input type="hidden" name="ListingUserAddress" id="ListingUserAddress" value="">
       </form>
    <?php
    $country_details="";
    $CountryData = $this->modeladmin->GetAllCountry();
    foreach ($CountryData as $dataone):
    $value=str_replace("'","",$dataone->country_name);
    $country_details.="<option value=".$dataone->id.">".$value."</option>";
    endforeach;
    $total_country=$country_details;
    //echo $total_country;
    ?>
    <script type="text/javascript">
	   $(document).ready(function () {
		  $('#createUser').click(function (e) {
			 e.preventDefault();
			 $('.span9').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var type=document.getElementById('type').value;
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required')
			 var has_error = 0;
			 required_elements.each(function(){
				element_id = $(this).attr('id');
				element_value = $(this).val();
				element_label = $(this).attr('label');
				element_validation_type = $(this).attr('validation_type');
				error_div = $("#"+element_id+"_error")
				
				if (element_value.search(/\S/)==-1) {
				    error_div.html(element_label+' is required.');
				    $("#"+element_id).focus();
				    has_error++;
				    return false;
				}
			 })
			 if (has_error==0)
			 {
			 if (type=="")
		     {
			document.getElementById('type_error').innerHTML="Speciality is required";
			has_error++;
			return false;
		     }
		     if (document.getElementById("email_format").value==1)
		     {
			    document.getElementById('email_error').innerHTML="Please write email in proper format";
			    document.getElementById('email').focus();
			    has_error++;
			    return false;
		     }
		     if (document.getElementById("email_hidden").value==1)
		     {
			    document.getElementById('email_error').innerHTML="Email is not available";
			    document.getElementById('email').focus();
			    has_error++;
			    return false;
		     }
		     if (document.getElementById("password").value.search(/\S/)!=-1)
		     {
			    var password=document.getElementById("password").value;
			    if (password.length<6)
			    {
				   document.getElementById('password_error').innerHTML="Password should not be less than 6 charecters";
				   document.getElementById('password').focus();
				   has_error++;
				   return false;
			    }
		     }
		     if ((document.getElementById("password").value.search(/\S/)!=-1) && (document.getElementById("password").value)!=(document.getElementById("confirm_password").value))
		     {
			    document.getElementById('confirm_password_error').innerHTML="Confirm password and password must be same";
			    document.getElementById('confirm_password').focus();
			    has_error++;
			    return false;
		     }
		     
		     if (document.getElementById("business_website_format").value==1)
		     {
			    document.getElementById('business_website_error').innerHTML="Please write url in  proper format";
			    document.getElementById('business_website').focus();
			    has_error++;
			    return false;
		     }
		
		     if (document.getElementById("personal_email_format").value==1)
		     {
			    document.getElementById('personal_email_error').innerHTML="Please write email in proper format";
			    document.getElementById('personal_email').focus();
			    has_error++;
			    return false;
		     }
		     if (document.getElementById("business_email_format").value==1)
		     {
			    document.getElementById('business_email_error').innerHTML="Please write email in proper format";
			    document.getElementById('business_email').focus();
			    has_error++;
			    return false;
		     }
		
		     if((!document.getElementById('gender1').checked) && (!document.getElementById('gender2').checked))
		     {
				 document.getElementById("gender_error").innerHTML='Select any one gender.';
				
				has_error++;
				return false;
		     }
		     
		     if((!document.getElementById('board_certified1').checked) && (!document.getElementById('board_certified2').checked))
		     {
				 document.getElementById("board_certified_error").innerHTML='Select any one option.';
				
				has_error++;
				return false;
		     }
		     if (document.getElementById('image').value.search(/\S/)!=-1)
		     {
			var image_type=document.getElementById('image').value;
			var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
			if(!re.exec(image_type))
			{
			document.getElementById("image_error").innerHTML="File extension not supported";
			has_error++;
			return false;
			}		
		     }
		     if (document.getElementById("image_prevalue").value=="")
		     {
		       if (document.getElementById("image").value=="")
		       {
			document.getElementById("image_error").innerHTML="Please upload image";
			has_error++;
			return false;
		       }
		     }
			 
			 
				$('#new_specialist').submit();
			 }
		  });
	   });
	   	   function GetStateFromCountry(Countryid) {
		     var CountryId = $.trim(Countryid);
		     if(CountryId!=0) {
			     $.ajax({
				     url: "<?php echo base_url(); ?>index.php/specialist/Get_StateDetails",
				     data: {CountryId:CountryId},
				     success: function(response) {
					     $('#statecontent').html(response);
				     }
			     });
		     }
	     }
	     
	      var auto_val=0;
	      function add_more_address()
	      {
		     //alert(auto_val);
		     var country_details='<?php echo $total_country;?>';
		     var innerHTML="<div id='table_id"+auto_val+"'><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Business Name :</label><input type='text' class='span5' label='Business Name' name='business_name[]' id='business_name"+auto_val+"'><div id='business_name_error"+auto_val+"' class='error_div' style='color:red;'></div></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Business Website Url :</label><input type='text' class='span5' label='Business Website Url' name='business_website[]' id='business_website"+auto_val+"' onblur='check_business_url("+auto_val+");'><div id='business_website_error"+auto_val+"' class='error_div' style='color:red;'></div></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Business Email :</label><input type='text' class='span5' label='Business Email' name='business_email[]' id='business_email"+auto_val+"' onblur='check_business_email("+auto_val+");'><div id='business_email_error"+auto_val+"' class='error_div' style='color:red;'></div></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Business Address :</label></div><div class=span12 field-box style='margin-left: 30px;margin-bottom: 10px;'><label>Country Name:</label><select name='country[]' id='country"+auto_val+"' class='span5' onchange='GetStateFromCountryMore(this.value,"+auto_val+");' label='Country'><option value=''>Select Country</option>"+country_details+"</select></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>State Name:</label><label id='statecontent"+auto_val+"'><input type='text' class='span5' readonly='readonly' value='Select Country First'></label></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>City Name:</label><input type='text' class='span5' value='' label='City' name='city[]' id='city"+auto_val+"'></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Street :</label><input type='text' class='span5' value='' label='Street' name='street[]' id='street"+auto_val+"'><div id='street_error"+auto_val+"' class='error_div' style='color:red;'></div></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Zipcode :</label><input type='text' class='span5' label='Zipcode' name='zipcode[]' id='zipcode"+auto_val+"'><div id='zipcode_error"+auto_val+"' class='error_div' style='color:red;'></div></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Address :</label><textarea class='span5' label='Address' name='address[]' id='address"+auto_val+"'></textarea></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Business Phone :</label><input type='text' class='span5' label='Business Phone' name='business_phone[]' id='business_phone"+auto_val+"'><div id='business_phone_error"+auto_val+"' class='error_div' style='color:red;'></div></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><label>Business Fax :</label><input type='text' class='span5' label='Business Fax' name='business_fax[]' id='business_fax"+auto_val+"'><div id='business_fax_error"+auto_val+"' class='error_div' style='color:red;'></div></div><div class='span12 field-box' style='margin-left: 30px;margin-bottom: 10px;'><a href='javascript:void(0)' onclick='delete_more_address("+auto_val+")'>Delete</a></div></div>";
		     $("#additional_address").append(innerHTML);
		     auto_val++;
	      }
	      
	      function delete_more_address(val)
	      {
		     $("#table_id"+val).remove();
	      }
	      function GetStateFromCountryMore(Countryid,val) {
		     //alert(val);
		     var CountryId = $.trim(Countryid);
		     if(CountryId!=0) {
			     $.ajax({
				     url: "<?php echo base_url(); ?>index.php/specialist/Get_StateDetailsMore",
				     data: "CountryId="+CountryId+"&val="+val,
				     success: function(response) {
					     $('#statecontent'+val).html(response);
				     }
			     });
		     }
	     }
	     function check_email_edit_specialist(val,userid)
	     {
	      
	      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	      if (!filter.test(val))
	      {
		     
		     
		     document.getElementById('email_error').innerHTML="Please write email in proper format";
		     document.getElementById('email_format').value="1";
		     
		     return false;
	      }
	      else
	      {
		     
		     //document.getElementById('email_error').innerHTML="";
		     document.getElementById('email_format').value="0";
		     $.ajax({
			url: "<?php echo base_url(); ?>index.php/specialist/check_email_edit_specialist",
			data: {email:val,userid:userid},
			success: function(response) {
			    
				var response_array = response.split('[SEPARETOR]');
				if (response_array[1]==0) {
					$("#email_error").html('')
					$("#email_hidden").val('0')
				}
				else
				{
					$("#email_error").html('Email is not available.')
					$("#email_hidden").val('1')
				}
			}
		     })
	      }
	     }
	     
	     function check_username_edit_specialist(username,userid) {
		     if (username.search(/\S/)!=-1) {
				     $.ajax({
				     url: "<?php echo base_url(); ?>index.php/specialist/check_username_edit_specialist",
				     data: {username:username,userid:userid},
				     success: function(response) {
					     var response_array = response.split('[SEPARETOR]');
					     if (response_array[1]==0) {
						     $("#username_error").html('')
						     $("#username_hidden").val('0')
					     }
					     else
					     {
						     $("#username_error").html('Username is not available.')
						     $("#username_hidden").val('1')
					     }
				     }
			     })
		     }
	     }
	     function GetStateFromCountryEdit(Countryid,val) {
		     var CountryId = $.trim(Countryid);
		     if(CountryId!=0) {
			     $.ajax({
				     url: "<?php echo base_url(); ?>index.php/specialist/GetStateFromCountryEdit",
				     data: {CountryId:CountryId,val:val},
				     success: function(response) {
					     $('#edit_statecontent'+val).html(response);
				     }
			     });
		     }
	     }
	     function delete_form(val)
	     {
	      var r=confirm("Are you sure to delete this address?");
	      if (r==true)
	      {
		     //$('#ListingUserAddress').val($.trim(val));
		     //$("#frmValidation").attr("action", "<?php echo site_url('specialist/delete_specialist_address');?>");
		     //$("#frmValidation").submit();
		     //return true;
		     $.ajax({
			      url: "<?php echo base_url(); ?>index.php/specialist/delete_specialist_address",
			      data: "val="+val,
			      success: function(response) {
				      $('#edit_div'+val).remove();
			      }
		      });
	      }
	     }
	     function change_type(type_id)
	     {
	      var TypeId = $.trim(type_id);
	      if(TypeId!=0) {
		      $.ajax({
			      url: "<?php echo base_url(); ?>index.php/specialist/Get_Type",
			      data: "TypeId="+TypeId,
			      success: function(response) {
				      $('#sub_type_content').html(response);
			      }
		      });
	      }
	     }
	     function check_personal_email(val)
	     {
	      if (val!="")
	      {
		     var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	      if (!filter.test(val))
	      {
		     
		     
		     document.getElementById('personal_email_error').innerHTML="Please write email in proper format";
		     document.getElementById('personal_email_format').value="1";
		     
		     return false;
	      }
	      else
	      {
		     document.getElementById('personal_email_error').innerHTML="";
		     document.getElementById('personal_email_format').value="0";
	      }
	      }
	      
	     }
	     function check_business_email(val)
	     {
	      business_email=document.getElementById("business_email"+val).value;
	      if (business_email!="")
	      {
		     var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		     if (!filter.test(business_email))
		     {
			    
			    
			    document.getElementById('business_email_error'+val).innerHTML="Please write email in proper format";
			    document.getElementById('business_email_format').value="1";
			    
			    return false;
		     }
		     else
		     {
			    document.getElementById('business_email_error'+val).innerHTML="";
			    document.getElementById('business_email_format').value="0";
		     }	
	      }
	      
	     }
	     function check_business_url(val)
	     {
	      var business_email=document.getElementById("business_website"+val).value;
	      if (business_email!="")
	      {
		     var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;
		     if (!re.test(business_email))
		     {
			    document.getElementById('business_website_error'+val).innerHTML="Please write proper url";
			    document.getElementById('business_website_format').value="1";
			    
			    return false;
		     }
		     else
		     {
			    document.getElementById('business_website_error'+val).innerHTML="";
			    document.getElementById('business_website_format').value="0";
		     }	
	      }
	      
	     }
	     function check_business_url_edit(val)
	     {
	      var website_url=document.getElementById("edit_business_website"+val).value;
	      if (website_url!="")
	      {
		     var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;
		     if (!re.test(website_url))
		     {
			    document.getElementById('edit_business_website_error'+val).innerHTML="Please write proper url";
			    
			    
			    return false;
		     }
		     else
		     {
			    document.getElementById('edit_business_website_error'+val).innerHTML="";
			    
		     }	
	      }
	     }
	     function check_business_email_edit(val)
	     {
	      var business_email_edit=document.getElementById("edit_business_email"+val).value;
	      if (business_email_edit!="")
	      {
		     var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		     if (!filter.test(business_email_edit))
		     {
			    
			    
			    document.getElementById('edit_business_email_error'+val).innerHTML="Please write email in proper format";
			    
			    
			    return false;
		     }
		     else
		     {
			    document.getElementById('edit_business_email_error'+val).innerHTML="";
			    
		     }	
	      }
	      
	     }
    </script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>