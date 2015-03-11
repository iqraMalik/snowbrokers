<?php
$this->load->view('includes/header');
$dataone_fetchone = $this->modeladmin->GetReviewDetailsFromId($this->input->post('ListingReviewid'));
$dataone_fetch = $dataone_fetchone[0];
?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Review Management</h4>
        </div>
    </div>
    <div class="row-fluid">
		<div id="main-stats">
			<div class="table-products">
				<div class="row-fluid head">
					<div class="span12">
						<h4>View Review</h4>
					</div>
				</div>
				<div class="row-fluid filter-block">
					<div class="pull-right">
						<a class="btn-flat new-product" href="<?php echo site_url('review_management/index'); ?>">< View List</a>
					</div>
				</div>
				<div class="row-fluid form-wrapper">
				<!-- left column -->
				<div class="span9 with-sidebar" style="margin-bottom: 30px;">
					<div class="container">
						<form class="new_city_form" enctype="multipart/form-data" action="<?php echo site_url('review_management/edit_terminal');?>" name="new_city" id="new_city" method="post" autocomplete="off">

							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Username:</label>

								    <?php
								    $userdata=$this->modeladmin->getdataPoeples($dataone_fetch->uid);
								    
								    ?>
								    <input type="text" class="span9" readonly=true style="width: 50%;"  value="<?php echo $userdata->username;?>" id="CitySelect">

							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Restaurant Name:</label>

								    <?php
								    $userdata=$this->modeladmin->getdataRestaurants($dataone_fetch->restaurant_id);
								    ?>
								    <input type="text" class="span9" readonly=true style="width: 50%;"  value="<?php echo $userdata->restaurant_name;?>" id="CitySelect">

							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Rating:</label>
								


								    <input type="text" class="span9" readonly=true style="width: 50%;"  value="<?php echo $dataone_fetch->rating;?>" id="CitySelect">

							</div>
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Review:</label>

								    <textarea class=span9 readonly=true><?php
								   echo $dataone_fetch->review ;
								    ?></textarea>
								   
							</div>
							<div class="span11 field-box actions" style="margin-top: 20px;">
								
								<!--<a class="btn-flat new-product" href="<?php echo site_url('review_management/index'); ?>">Cancel</a>-->
							</div>
							<input type="hidden" name="terminal_Id"  id="terminal_Id" value="<?php echo $dataone_fetch->id; ?>">
						</form>
					</div>
				</div>
			</div>
			</div>
		</div>
    </div>
</div>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>