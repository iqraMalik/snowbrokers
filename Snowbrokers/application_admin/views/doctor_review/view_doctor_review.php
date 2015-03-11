<?php
$this->load->view('includes/header');
$dataone_fetch = $this->modeldoctor_review->getdoctor_reviewDetails($this->input->post('ListingUserid'));

$doctor_details = $this->modeldoctor_review->user_name($dataone_fetch->doctor_id, 'specialist');
$user_details = $this->modeldoctor_review->user_name($dataone_fetch->user_id, 'people');


?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Specialist's Review Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>View Review</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('doctor_review/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <form class="new_user_form" enctype="multipart/form-data" action="" name="new_article" id="new_article" method="post" autocomplete="off">
						  <input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" />
						  <div class="span12 field-box" style="margin-bottom: 10px;">
							 <label>Specialist's Name :</label>
							 <input readonly="true" type="text" class="span9 required" value="<?php echo $doctor_details; ?>">
						  </div>
						  <div class="span12 field-box" style="margin-bottom: 10px;">
							 <label>User's Name :</label>
							 <input readonly="true" type="text" class="span9 required" value="<?php echo $user_details; ?>">
						  </div>
						  <div class="span12 field-box" style="margin-bottom: 10px;">
							 <label>Review :</label>
							 <textarea readonly="true" style="min-height: 300px;" class="span9 required" label="Article Description" name="a_desc" id="a_desc"><?php echo $dataone_fetch->review; ?></textarea>
							 <div id="a_desc_error" class="error_div" style="color:red;"></div>
						  </div>
						  <div class="span12 field-box" style="margin-bottom: 10px;">
							 <label>Rating :</label>
							 <span ><?php echo $this->modeldoctor_review->generate_rating($dataone_fetch->rating); ?></span>
						  </div>
						  <div class="span12 field-box" style="margin-bottom: 10px;">
							 <label>Posted Date :</label>
							 <span ><?php echo $dataone_fetch->added_date; ?></span>
						  </div>
						  <div class="span12 field-box" style="margin-bottom: 10px;">
							 <label>Status :</label>
							 <div class="ui-select">
								<select label="Status" disabled="disabled" name="status" id="status" style="width: 100%;">
								    <option value="1" <?php if($dataone_fetch->status==1){echo 'selected';} ?> >Active</option>
								    <option value="0" <?php if($dataone_fetch->status==0){echo 'selected';} ?> >Inactive</option>
								</select>
							 </div>
						  </div>
						  <div class="span11 field-box actions" style="margin-top: 20px;">
							 <a class="btn-flat new-product" href="<?php echo site_url('doctor_review/index'); ?>">Back</a>
						  </div>
					   </form>
				    </div>
				</div>
			 </div>
		  </div>
	   </div>
    </div>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>