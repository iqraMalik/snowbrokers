<!-- content -->
<section class="content-area">
	<!--   This is for after login header menu bar start -->
    
	<?php echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
        <?php
        //print_r($member_details);
        $country = $this->registration_model->get_country(); // Get all country details
        $res = $this->registration_model->get_product_type(); // fetching product type from the database 
        //print_r($country);
        //print_r($country[$member_details->country]);
        ?>
	<div class="container">
		<div class="shipping-content clearfix">
			<?php
			if($this->session->flashdata('flash_message')=='pass_updt')
			{
				echo "<p style='color:green;'>Success! Password is updated successfully!</p>";
			}
			//else if($this->session->flashdata('flash_message')=='')
			//{
			//	echo "<p style='color:red;'>Oops! Someting went wrong. Password is not updated.</p>";
			//}
			?>
				<div class="form-hedding">
					<h2>My Account</h2>
				</div>
				<div class="row besic-form-row">
					<div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>First Name <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php echo $member_details->first_name; ?>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>Last Name <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php echo $member_details->last_name; ?>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>Email <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php echo $member_details->email; ?>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>Phone <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php echo $member_details->phone_number; ?>
							</div>	
						</div>
					</div>
                                        <div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>Address <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php echo $member_details->address; ?>
							</div>	
						</div>
					</div>
                                        <div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>Country <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php
                                                                $country_id = $this->registration_model->get_country($member_details->country);
                                                                //print_r($country_id);
                                                                echo $country_id[0]['country_name'];
                                                            ?>
							</div>	
						</div>
					</div>
                                        <div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>Company Name <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php echo $member_details->company; ?>
							</div>	
						</div>
					</div>
                                        <div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>Company Position <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php echo $member_details->company_position; ?>
							</div>	
						</div>
					</div>
                                        <div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>Website <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php echo $member_details->website; ?>
							</div>	
						</div>
					</div>
                                        <div class="col-md-6">
						<div class="post-address besic-form details-show">
							<label>Choose Products <span class="star-color"></span></label>
							<div class="post-address-cell">
                                                            <?php
                                                            $product_details = $this->registration_model->get_product_type($member_details->product_type);
                                                            echo $product_details[0]['title'];
                                                            ?>
							</div>	
						</div>
					</div>
				</div>
				<div class="form-hedding">
					<h2>Edit</h2>
				</div>
				<div class="advance-feture">
                                    <form action="<?php echo site_url('myaccount/update_user');?>" name="edit_form" id="edit_form" method="post" onsubmit="return update_accountvalidation();">
					<div class="product-size clearfix">
                                            <div class="col-md-6">
						<div class="post-address besic-form">
							<label>First Name <span class="star-color">*</span></label>
							<div class="post-address-cell">
								<input type="text" id="f_name" class="requireded" name="f_name" value="<?php echo $member_details->first_name; ?>" label="First name">
                                                                <span class="star-color error_div" id="f_name_error"></span>
                                                        </div>	
						</div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="post-address besic-form">
                                                            <label>Last Name <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <input type="text" id="l_name" class="requireded" name="l_name" value="<?php echo $member_details->last_name; ?>" label="Last name">
                                                                    <span class="star-color error_div" id="l_name_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="post-address besic-form">
                                                            <label>Email <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <input type="email" id="email" name="email" class="requireded" value="<?php echo $member_details->email; ?>" label="Email">
                                                                    <span class="star-color error_div" id="email_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="post-address besic-form">
                                                            <label>Phone <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <input type="text" id="phone" class="requireded" name="phone" value="<?php echo $member_details->phone_number; ?>" label="Phone">
                                                                    <span class="star-color error_div" id="phone_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="post-address besic-form">
                                                            <label>Address <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <input type="text" id="address" class="requireded" name="address" value="<?php echo $member_details->address; ?>" label="Address">
                                                                    <span class="star-color error_div" id="address_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="post-address besic-form">
                                                            <label>Country <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <select id="country" name="country" label="Country">
                                                                    <?php
                                                                    foreach($country as $row)
                                                                    {
                                                                    ?>
                                                                            <option value="<?php echo $row['id'];?>" <?php echo (($member_details->country==$row['id'])?'selected':'');?>><?php echo $row['country_name'];?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                    <span class="star-color error_div" id="country_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="post-address besic-form">
                                                            <label>Company Name <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <input type="text" id="company_name" class="requireded" name="company_name" value="<?php echo $member_details->company; ?>" placeholder="" label="Company name">
                                                                    <span class="star-color error_div" id="company_name_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="post-address besic-form">
                                                            <label>Company Position <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <input type="text" id="company_position" class="requireded" name="company_position" value="<?php echo $member_details->company_position; ?>" placeholder="" label="Company position">
                                                                    <span class="star-color error_div" id="company_position_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="post-address besic-form">
                                                            <label>Website <span class="star-color">*</span></label>
                                                            <div class="post-address-cell">
                                                                    <input type="text" id="website" class="requireded" name="website" value="<?php echo $member_details->website; ?>" placeholder="" label="Website">
                                                                    <span class="star-color error_div" id="website_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="post-address besic-form">
                                                            <label>Choose Products <span class="star-color">*</span></label>
                                                            <div class="post-address-cell multi_select_outer">
								<?php
								$product_type_array = explode(",",$member_details->product_type);
                                                                //print_r($product_type_array);die();
								$product_names = array();
								?>
                                                                    <select id="products" name="products[]" label="Product type" multiple="multiple">
                                                                    <?php
								    foreach($res as $row)
                                                                    {
									$selected = '';
									if(in_array($row['id'],$product_type_array))
									{
										$product_names[] = $row['title'];
										$selected = 'selected="selected"';
									}
                                                                    ?>
                                                                        <option value="<?php echo $row['id'];?>" <?php echo $selected; ?>><?php echo $row['title'];?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                    <span class="star-color error_div" id="products_error"></span>
                                                            </div>	
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="post-address-cell basic-submit">
                                            <button class="btn btn-default" type="submit">
                                                    Update Account
                                            </button>
                                        </div>
                                        </form>
				</div>
		</div>
	</div>
</section>
<!-- content End -->
<script type="text/javascript">
    
    function update_accountvalidation()
    {
        $('.error_div').html('');
        
        var element_id,element_value,element_label,error_div,element_validation_type;
        var required_elements = $('.requireded');
        var has_error = 0;
        required_elements.each(function(){
               element_id = $(this).attr('id');
	       element_value = $(this).val();
               element_label = $(this).attr('label');
               //element_validation_type = $(this).attr('validation_type');
               error_div = $("#"+element_id+"_error");
               //alert(element_id);
	       //alert(element_value);
	       //alert(element_label);
	       //alert(error_div);
               if (element_value.search(/\S/)==-1) {
                   error_div.html(element_label+' is required.')
                   has_error++
               }
        });
        
        //alert(has_error);
        if (has_error==0)
        {
            //alert(has_error);
            return true;
        }
        else
        {
            return false;
        }
    }
</script>