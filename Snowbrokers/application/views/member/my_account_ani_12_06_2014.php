<?php
//echo $this->session->userdata('user_id')."$$$$";
$dataone_fetch=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));
//print_r($dataone_fetch);
$data=$dataone_fetch[0];
?>
<script type="text/javascript">
function edit_account()
{
	document.getElementById("location").removeAttribute("readonly",0);
	document.getElementById("length").removeAttribute("readonly",0);
	document.getElementById("weight").removeAttribute("readonly",0);
	document.getElementById("body_fat").removeAttribute("readonly",0);
	document.getElementById("date_date").removeAttribute("disabled");
	document.getElementById("country").removeAttribute("disabled");
	document.getElementById("state").removeAttribute("disabled");
	document.getElementById("date_month").removeAttribute("disabled");
	document.getElementById("date_year").removeAttribute("disabled");
	document.getElementById("sports1").removeAttribute("disabled");
	document.getElementById("sports2").removeAttribute("disabled");
	document.getElementById("sports3").removeAttribute("disabled");
	document.getElementById("goal1").removeAttribute("disabled");
	document.getElementById("goal2").removeAttribute("disabled");
	document.getElementById("goal3").removeAttribute("disabled");
	document.getElementById("body_type").removeAttribute("disabled");
	document.getElementById("life_style").removeAttribute("disabled");

	document.getElementById("show_save").src="<?php echo base_url();?>images/save_image.jpeg";
	document.getElementById( "show_save" ).setAttribute( "onClick", "javascript: save_account();" );



}

function choose_picture()
{
	
}

</script>
<a  style="float:right;padding-right: 100px;color: green;" href="<?php echo site_url('signup/logout');?>"><h4><?php echo "Logout";?></h4></a>
<section class="innerpage_page">
	
	<div class="container">
		<div class="row">
			<?php //$this->load->view('sidebarblog/sidebar_blog_account.php')?>
			
			<div class="col-md-9 col-sm-8" style="">
				<div class="sgn_up_out myacnt_lft">
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
					<h4>MY ACCOUNT</h4>
					<div id="top">
						<form class="spcing_otr" id="registration_form" name="registration_form" method="post" enctype="multipart/form-data" action="<?php echo site_url('signup/edit_memeber')?>" autocomplete="off">
						
						<div class="banner" id="banner_id">
							<div><img src="<?php echo base_url();?>images/edit_icon.png" id="show_save_banner" style="float:right" onclick="choose_picture();"></div>

						</div>	
							
						</form>
					</div>
					<div id="left" style="float:left;" class="sgn_up_out myacnt_lft">
						      
						<div>
							<div><img src="<?php echo base_url();?>images/edit_icon.png" id="show_save" style="float:right" onclick="edit_account();"></div>
							<div>
							<label>Country</label>
							 <?php $getcountry = $this->modelgoals->GetCountry();?>
							    
							    <select disabled name="country" id="country" label="Country" style="width: 50%;" onChange="Select_state(this.value)">
							    <option value="">Select Country</option>
							   <?php                          
								if(count($getcountry)>0 || $getcountry !=0)
								{
								    foreach($getcountry as $key=>$val)
								    {
								?>
								<option value="<?php echo $val->id;?>" <?php if($data->country_id==$val->id){echo "selected";} ?>><?php echo $val->country_name;?></option>
								<?php
								    }
								}
								?>
							</select>
				
							<div id="country_error" class="error_div" style="color:red;"></div>
						</div>
						 <div>
							<label>State</label>
							 <?php $getstate = $this->modelgoals->GetState($data->country_id);?>
							    
							    <select disabled name="state" id="state" label="State" style="width: 50%;">
								 <?php                          
								if(count($getstate)>0 || $getstate !=0)
								{
								    foreach($getstate as $key=>$val)
								    {
								?>
								<option value="<?php echo $val->id;?>" <?php if($data->state_id==$val->id){echo "selected";} ?>><?php echo $val->state_name;?></option>
								<?php
								    }
								}
								?>                     
							     </select>
				
							<div id="country_error" class="error_div" style="color:red;"></div>
						</div>  
							<label>Location</label>
							<input type="text" name="location" readonly id="location" value="<?php echo $data->location;?>"/>
						</div>
						
						<div>
							<label>Age</label>
							<select name="date_date" id="date_date" disabled>
								<option value="">Select Date</option>
								<?php
								$dob = $data->date_of_birth;
								if($dob !='')
								{
									$dob1 = explode('-',$dob);
								}
								for($i=0; $i<=31; $i++) {
								    ?>
								       <option value="<?php if($i<10){echo $a = '0'.$i;}else{echo $a = $i;}?>" <?php if($dob1[2]==$a){echo "selected";}?>><?php if($i<10){echo '0'.$i;}else{echo $i;}?></option>;
									<?php
								}
								?>
							</select>
							<select name="date_month" id="date_month" disabled>
								<option value="">Select Month</option>
								<?php
								    $months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
								    for ($month = 1; $month <= 12; $month++)
								    {
								?>
									<option value="<?php if($month<10){echo $b ='0'.$month;}else{echo $b = $month;}?>" <?php if($dob1[1]==$b){echo "selected";}?>><?php echo $months[$month];?></option>;
							   <?php
								    }
								       
							       
								?>
							</select>
							<select name="date_year" id="date_year" disabled>
								<option value="">Select Year</option>
								<?php
								for ($year = 1950; $year <= date("Y"); $year++) {
								    ?>
									<option value="<?php echo $year;?>" <?php if($dob1[0]==$year){echo "selected";}?>><?php echo $year;?></option>;
				    
								    <?php
							   
								}
								?>
							</select>

						</div>
								
						<div>
							<label>Sport1</label>
							<?php $SportsyData = $this->modelsports->GetAllSports();?>
							<select name="sports1" id="sports1" class="span9 required" label="Sports1" disabled>
							    <option value="">Select Sports</option>
							    <?php
							  
							    if(count($SportsyData)>0 || $SportsyData !=0)
							    {
								foreach($SportsyData as $key=>$val)
								{
							    ?>
							    <option value="<?php echo $val->id;?>" <?php if($data->sports1==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
							    <?php
								}
							    }
							    ?>
							</select>
						</div>
						<div>
							<label>Sport2</label>
							<?php $SportsyData2 = $this->modelsports->GetAllSports();?>
							<select name="sports2" id="sports2" disabled>
							     <option value="">Select Sports</option>
							     <?php                          
								if(count($SportsyData2)>0 || $SportsyData2 !=0)
								{
								    foreach($SportsyData2 as $key=>$val)
								    {
								?>
								<option value="<?php echo $val->id;?>" <?php if($data->sports2==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
								<?php
								    }
								}
								?>
							</select>
						</div>
						<div>
							<label>Sport3</label>
							<select name="sports3" id="sports3" disabled>
							     <option value="">Select Sports</option>
							   <?php                          
								if(count($SportsyData3)>0 || $SportsyData3 !=0)
								{
								    foreach($SportsyData3 as $key=>$val)
								    {
								?>
								<option value="<?php echo $val->id;?>" <?php if($data->sports3==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
								<?php
								    }
								}
								?>
							</select>
						</div>
						<div>
							<label>Goal1</label>
							<?php $GoalsData = $this->modelgoals->GetAllGoals();?>
							<select name="goal1" id="goal1" class="span9 required" label="Goal1" disabled>
							     <option value="">Select Goals</option>
							     <?php                          
								if(count($GoalsData)>0 || $GoalsData !=0)
								{
								    foreach($GoalsData as $key=>$val)
								    {
								?>
								<option value="<?php echo $val->id;?>" <?php if($data->goal1==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
								<?php
								    }
								}
								?>
							</select>
						</div>
						<div>
							<label>Goal2</label>
							<?php $GoalsData2 = $this->modelgoals->GetAllGoals();?>
							<select name="goal2" id="goal2" disabled>
							    <option value="">Select Goals</option>
							   <?php                          
								if(count($GoalsData2)>0 || $GoalsData2 !=0)
								{
								    foreach($GoalsData2 as $key=>$val)
								    {
								?>
								<option value="<?php echo $val->id;?>" <?php if($data->goal2==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
								<?php
								    }
								}
								?>
							</select>
						</div>
						<div>
							<label>Goal3</label>
							<?php $GoalsData3 = $this->modelgoals->GetAllGoals();?>
							<select name="goal3" id="goal3" disabled>
							    <option value="">Select Goals</option>
							   <?php                          
								if(count($GoalsData3)>0 || $GoalsData3 !=0)
								{
								    foreach($GoalsData3 as $key=>$val)
								    {
								?>
								<option value="<?php echo $val->id;?>" <?php if($data->goal3==$val->id){echo "selected";}?>><?php echo $val->title;?></option>
								<?php
								    }
								}
								?>
							</select>
						</div>
						<div>
							<label>length</label>
							<input type="text" name="length" readonly id="length" value="<?php echo $data->tall;?>"/>

						</div>
						<div>
							<label>Weight</label>
							<input type="text" name="weight" readonly id="weight" value="<?php echo $data->weigh;?>"/>

						</div>
						<div>
							<label>Body type</label>
							<?php $bodytype = $this->modelgoals->GetAllBodytype();?>
							<select name="body_type" id="body_type" disabled>
							    <option value="">Select Bodytype</option>
							    <?php                          
								if(count($bodytype)>0 || $bodytype !=0)
								{
								    foreach($bodytype as $key=>$val)
								    {
								?>
								<option value="<?php echo $val->id;?>" <?php if($data->bodytype==$val->id){echo "selected";}?>><?php echo $val->body_type;?></option>
								<?php
								    }
								}
								?>
							</select>
						</div>
						<div>
							<label>Body fat</label>
							<input type="text" name="body_fat" readonly id="body_fat" value="<?php echo $data->fat;?>"/>

						</div>
						<div>
							<label>Lifestyle</label>
							<?php $lifestyle = $this->modelgoals->GetAllLifestyle();?>
							<select name="life_style" id="life_style" disabled>                            
							    <option value="">Select Lifestyle</option>
							    <?php                          
								if(count($lifestyle)>0 || $lifestyle !=0)
								{
								    foreach($lifestyle as $key=>$val)
								    {
								?>
								<option value="<?php echo $val->id;?>" <?php if($data->lifestyle==$val->id){echo "selected";}?>><?php echo $val->name;?></option>
								<?php
								    }
								}
								?>
							</select>
						</div>

					</div>
					<div id="middle" style="float:left;"></div>
					<div id="right" style="float:left;"></div>
					
						
				</div>
			</div>
			
		</div>
	</div>
</section>
<script type="text/javascript">
	function save_account() {
	
	//alert(document.getElementById("location").val());
	var location = document.getElementById("location").value;
	var length = document.getElementById("length").value;
	var weight = document.getElementById("weight").value;
	var body_fat = document.getElementById("body_fat").value;
	var country = document.getElementById("country").value;
	var state = document.getElementById("state").value;
	var date_date = document.getElementById("date_date").value;
	var date_month = document.getElementById("date_month").value;
	var date_year = document.getElementById("date_year").value;
	var sports1 = document.getElementById("sports1").value;
	var sports2 = document.getElementById("sports2").value;
	var sports3 = document.getElementById("sports3").value;
	var goal1 = document.getElementById("goal1").value;
	var goal2 = document.getElementById("goal2").value;
	var goal3 = document.getElementById("goal3").value;
	var body_type = document.getElementById("body_type").value;
	var life_style = document.getElementById("life_style").value;
	
	$.ajax({
	       url: "<?php echo base_url(); ?>index.php/signup/save_account_detail",
	       async:false,
	       data: {
		country:country,
		state:state,
		location:location,
		length:length,
		weight:weight,
		body_fat:body_fat,
		date_date:date_date,
		date_month:date_month,
		date_year:date_year,
		sports1:sports1,
		sports2:sports2,
		sports3:sports3,
		goal1:goal1,
		goal2:goal2,
		goal3:goal3,
		body_type:body_type,		
		life_style:life_style
	       
	       },
	       success: function(response) {
			
			document.getElementById("country").value=country;
			document.getElementById("state").value=state;
		        document.getElementById("location").value=location;
		        document.getElementById("length").value=length;
			document.getElementById("weight").value=weight;
			document.getElementById("body_fat").value=body_fat;
			document.getElementById("date_date").value=date_date;
			document.getElementById("date_month").value=date_month;
			document.getElementById("date_year").value=date_year;
			document.getElementById("sports1").value=sports1;
			document.getElementById("sports2").value=sports2;
			document.getElementById("sports3").value=sports3;
			document.getElementById("goal1").value=goal1;
			document.getElementById("goal2").value=goal2;
			document.getElementById("goal3").value=goal3;
			document.getElementById("body_type").value=body_type;
			document.getElementById("life_style").value=life_style;
			
			
			document.getElementById("location").removeAttribute("readonly",1);
			document.getElementById("length").removeAttribute("readonly",1);
			document.getElementById("weight").removeAttribute("readonly",1);
			document.getElementById("body_fat").removeAttribute("readonly",1);
			document.getElementById("country").disabled=true;
			document.getElementById("state").disabled=true;
			document.getElementById("date_date").disabled=true;			
			document.getElementById("date_month").disabled=true;
			document.getElementById("date_year").disabled=true;
			document.getElementById("sports1").disabled=true;
			document.getElementById("sports2").disabled=true;
			document.getElementById("sports3").disabled=true;
			document.getElementById("goal1").disabled=true;
			document.getElementById("goal2").disabled=true;
			document.getElementById("goal3").disabled=true;
			document.getElementById("body_type").disabled=true;
			document.getElementById("life_style").disabled=true;
		
			document.getElementById("show_save").src="<?php echo base_url();?>images/edit_icon.png";
			document.getElementById( "show_save" ).setAttribute( "onClick", "javascript: edit_account();" );
		       
		      }
		     
		     
	       
	   })
}

function Select_state(country_id)
{
     $.ajax({
                    url: "<?php echo base_url(); ?>index.php/signup/Select_state",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
                      
                           $('#state').html(response);
                            
                           }
                          
                          
                    
                })
}
</script>