<?php
$this->load->view('includes/header');
$dataone_fetchone = $this->modeladmin->GetCityDetailsFromId($this->input->post('ListingCityid'));
$dataone_fetch = $dataone_fetchone[0];
?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4><?php echo $this->lang->line("City_Management");?></h4>
        </div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4><?php echo $this->lang->line("Edit_City");?></h4>
					</div>
				</div>
				<div class="row-fluid filter-block">
					<div class="pull-right">
						<a class="btn-flat new-product" href="<?php echo site_url('citymanagement/index'); ?>">< <?php echo $this->lang->line("view_list");?></a>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
				<!-- left column -->
				<div class="span9 with-sidebar" style="margin-bottom: 30px;">
					<div class="container">
						<form class="new_city_form" enctype="multipart/form-data" action="<?php echo site_url('citymanagement/edit_city');?>" name="new_city" id="new_city" method="post" autocomplete="off">
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
						   <label><?php echo $this->lang->line("City_Name");?>(<?php echo $this->lang->line("in_eng");?>):</label>
								<input type="text" class="span9 required" label="<?php echo $this->lang->line("City_Name");?>(<?php echo $this->lang->line("in_en");?>)" name="name" id="name" style="width: 50%;" onblur="CitynameAvailability(this.value);" value="<?php echo $dataone_fetch->CityName; ?>">
								<div id="name_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><?php echo $this->lang->line("City_Name");?>(<?php echo $this->lang->line("in_per");?>):</label>
								<input type="text" class="span9 required" label="<?php echo $this->lang->line("City_Name");?>(<?php echo $this->lang->line("in_per");?>)" name="name_pe" id="name_pe" style="width: 50%;" value="<?php echo $dataone_fetch->CityName_pe; ?>">
								<div id="name_pe_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><?php echo $this->lang->line("City_Name");?>(<?php echo $this->lang->line("in_pas");?>):</label>
								<input type="text" class="span9 required" label="<?php echo $this->lang->line("City_Name");?>(<?php echo $this->lang->line("in_pas");?>)" name="name_pa" id="name_pa" style="width: 50%;" value="<?php echo $dataone_fetch->CityName_pa; ?>">
								<div id="name_pa_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><?php echo $this->lang->line("Country_Name");?>:</label>
								<?php $CountryData = $this->modeladmin->GetAllCountry();?>
								<select name="CountrySelect" id="CountrySelect" class="span6 field-box" onchange="GetStateFromCountry(this.value);">
									<option value="0"><?php echo $this->lang->line("Select_Country");?></option>
									<?php foreach ($CountryData as $dataone): ?>
										<option value="<?php echo $dataone->id; ?>" <?php if($dataone->id == $dataone_fetch->Country_ID){ echo 'selected'; } ?>><?php echo $dataone->country_name ?></option>
									<?php endforeach; ?>
								</select>
								<div id="city_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><?php echo $this->lang->line("State_Name");?>:</label>
								<label id="statecontent">
									<?php $CountryData_State = $this->modeladmin->Get_StateDetailsModel($dataone_fetch->Country_ID);?>
									<select name="StateSelect" id="StateSelect" class="span6 field-box">
										<option value="0"><label><?php echo $this->lang->line("Select_State");?>:</label></option>
										<?php foreach ($CountryData_State as $dataone_State): ?>
											<option value="<?php echo $dataone_State->id; ?>" <?php if($dataone_State->id == $dataone_fetch->State_ID){ echo 'selected'; } ?>><?php echo $dataone_State->state_name ?></option>
										<?php endforeach; ?>
									</select>
								</label>
								<div id="state_error" class="error_div" style="color:red;"></div>
							</div>
							<div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="<?php echo $this->lang->line("Submit");?>" class="btn-glow primary" id="addcity">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('citymanagement/index'); ?>"><?php echo $this->lang->line("Cancel");?></a>
							</div>
							<input type="hidden" name="city_ID" value="<?php echo $dataone_fetch->city_ID; ?>">
						</form>
					</div>
				</div>
			</div>
			</div>
		</div>
    </div>
</div>
<script type="text/javascript">
//$(document).ready(function () {
//	$('#addcity').click(function (e) {
//		e.preventDefault();
//		$('.span9').css('border-color','#B2BFC7');
//		$('.error_div').html('');
//		
//		if($.trim($('#name').val())=='') {
//			$('#name_error').html('City Name Please');
//		} else if($.trim($('#CountrySelect').val())==0) {
//			$('#city_error').html('Select Country Please');
//		} else if($.trim($('#StateSelect').val())==0) {
//			$('#state_error').html('State Please');
//		} else {
//			document.getElementById("new_city").submit();
//		}
//	});
//});

$(document).ready(function () {
	$('#addcity').click(function (e) {
		e.preventDefault();
		$('.span9').css('border-color','#B2BFC7');
		$('.error_div').html('');
		
		if($.trim($('#name').val())=='') {
			$('#name_error').html('<?php echo $this->lang->line("City_Name_Please");?>');
		}
		else if($.trim($('#name_pe').val())=='') {
			$('#name_pe_error').html('<?php echo $this->lang->line("City_Name_Please");?>');
		}
		else if($.trim($('#name_pa').val())=='') {
			$('#name_pa_error').html('<?php echo $this->lang->line("City_Name_Please");?>');
		}
		else if($.trim($('#CountrySelect').val())==0) {
			$('#city_error').html('<?php echo $this->lang->line("Select_Country_Please");?>');
		} else {
			document.getElementById("new_city").submit();
		}
	});
});
function GetStateFromCountry(Countryid) {
	var CountryId = $.trim(Countryid);
	if(CountryId!=0) {
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/citymanagement/Get_StateDetails",
			data: {CountryId:CountryId},
			success: function(response) {
				$('#statecontent').html(response);
			}
		});
	}
}
function CitynameAvailability(CityName) {
	$('#name_error').html('');
	var city_ID = $.trim($('#city_ID').val());
	var CityName = $.trim(CityName);
	if(CityName!='') {
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/citymanagement/Check_CityName_Edit",
			data: {CityName:CityName,city_ID:city_ID},
			success: function(response) {
				if(response == 'Y') {
					$('#name').val('');
					$('#name_error').css('color','red');
					$('#name_error').html('<?php echo $this->lang->line("City_Name_Already_There");?>');
				} else {
					$('#name_error').html('<?php echo $this->lang->line("City_Name_Available");?>');
					$('#name_error').css('color','green');
				}
			}
		});
	}
}
function check_username(username) {
	if (username.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/user/check_username",
			data: {username:username},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				if (response_array[1]==0) {
					$("#username_error").html('')
					$("#username_hidden").val('1')
				}
				else
				{
					$("#username_error").html('Username is not available.')
					$("#username_hidden").val('0')
				}
			}
		})
	}
}
function check_email(email) {
	if (email.search(/\S/)!=-1) {
			$.ajax({
			url: "<?php echo base_url(); ?>index.php/user/check_email",
			data: {email:email},
			success: function(response) {
				var response_array = response.split('[SEPARETOR]');
				if (response_array[1]==0) {
					$("#email_error").html('')
					$("#email_hidden").val('1')
				}
				else
				{
					$("#email_error").html('Email is not available.')
					$("#email_hidden").val('0')
				}
			}
		})
	}
}
function isValidEmailAddress(emailAddress)
{
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	return pattern.test(emailAddress);
};
</script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>