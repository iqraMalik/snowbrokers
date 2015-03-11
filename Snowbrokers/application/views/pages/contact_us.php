
	<!-- /content part -->
    <section class="content">
    	<div class="container">
      		<div class="row">
      			<!-- left_panel -->
				<?php
				
				/* loading left panel menu */
				/* Location: ./application/views/left_panel.php */
				 $this->load->view('left_panel');
				 
				  ?>
      			<!-- left_panel -->
      			
      			<!-- right content -->
      			
      			<div class="col-md-9">
      				<!-- title -->
      				<div class="clearfix red_title_outer">
	      				<h2 class="red_title">Contact Us</h2>
      				</div>
      				<!-- title end -->
      				
      				<!-- main content -->
      				<div class="contact">
      					<div class="smal_sec4">
      						<h4>Customer Service Hours</h4>
      						<div class="icon_lft"><span><img alt="" src="<?php echo base_url(); ?>assets/images/clock_icon.png"></span></div>
      						<div class="cont"><?php echo $settings[0]['service_hours']; ?></div>
      					</div>
      					<div class="smal_sec4">
      						<h4>Phone Support</h4>
      						<div class="icon_lft"><span><img alt="" src="<?php echo base_url(); ?>assets/images/tele_icon.png"></span></div>
      						<div class="cont" style="width: 115px;"><?php echo $settings[0]['contact_number']; ?></div>
      					</div>
      					<div class="smal_sec4">
      						<h4>Get Help Now</h4>
      						<div class="icon_lft"><span><img alt="" src="<?php echo base_url(); ?>assets/images/chat_icon.png"></span></div>
      						<a class="cont" href="#">Live Chat</a>
      					</div>
      					<div class="smal_sec4">
      						<h4>Useful Links</h4>
      						<ul class="useful_link">
      							<li><a href="#">production Turnaround</a></li>
      							<li><a href="#">Check Job Status</a></li>
      							<li><a href="<?php echo base_url(); ?>home/load_page/return_policy/50">Return policy</a></li>
      						</ul>
      					</div>
      				</div>
      				<div class="contact_title"><img alt="" src="<?php echo base_url(); ?>assets/images/msg_icon.png">send your question or comments</div>
      				<div class="contact">
      					<!-- js validation section -->
      					
      					<!-- end js validation section -->
      					<script>
						  function chkFrm()
						  {
						  	// name validation 
								if(document.getElementById('u_name').value.search(/\S/)==-1)
								{
									document.getElementById('err').style.display = 'block';									
									document.getElementById('err').innerHTML = 'Please Enter The Name...';
									document.getElementById('err').focus();
									return false;
								}
								else
								{
									document.getElementById('err').style.display = 'none';
								}
							// end name validation 
							
							// mail validation 
								if(document.getElementById('u_mail').value.search(/\S/)==-1)
								{
									document.getElementById('err').style.display = 'block';
									document.getElementById('err').innerHTML = 'Please Enter The Email...';
									document.getElementById('err').focus();
									return false;
								}
								else
								{
									document.getElementById('err').style.display = 'none';
								}
								
								if(document.getElementById('u_mail').value.search(/\S/)!=-1)
								{
									var x=document.getElementById('u_mail').value;
									var filter=/^([a-z0-9A-Z_\.\-])+\@(([a-z0-9A-Z\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
									if(!filter.test(x))
									{
										document.getElementById('err').style.display = 'block';
										document.getElementById('err').innerHTML = 'Please Enter The Valid Email...';
										document.getElementById('err').focus();
										return false;
									}
								}
								else
								{
									document.getElementById('err').style.display = 'none';
								}
							// end mail validation 
							
							//Select box validation
								if($("#subject option:selected").text() == 'Subject')
								{
									document.getElementById('err').style.display = 'block';
									document.getElementById('err').innerHTML = 'Please Select The Subject...';
									document.getElementById('err').focus();
									return false;
								}
								else
								{
									document.getElementById('err').style.display = 'none';
								}
							// end Select box validation
							
							// select box2 validation
								if($("#s_cat option:selected").text() == 'Subject Category')
								{
									document.getElementById('err').style.display = 'block';
									document.getElementById('err').innerHTML = 'Please Select The Subject Category...';
									document.getElementById('err').focus();
									return false;
								}
								else
								{
									document.getElementById('err').style.display = 'none';
								}
							// end select box2 validation
							
							// massage validation
							if(document.getElementById('u_msg').value == '')
							{
								document.getElementById('err').style.display = 'block';
								document.getElementById('err').innerHTML = 'Please Write The Massage...';
								document.getElementById('err').focus();
								return false;
							}
							else
							{
								document.getElementById('err').style.display = 'none';
							}
							// massage validation
							
							    							
      						if($("#c1").is(':checked')){      							
								$("#c1").val("yes");								
							}else{								
								$("#c1").val("no");								
							}
      						
						  }
						  </script>
      					<!-- <form> -->
      						<!-- error & success message -->
      					<?php 
      						if(isset($flash_message)){
      							if($flash_message == TRUE)
								{
						?>
							<div class="success">message sending Successful</div>
						<?php } ?>
						
						<?php 
      						if($flash_message == FALSE)
							{
						?>
							<div class="error">Some error</div>
						<?php }} ?>
      					 
      					 <!-- use to blank validation -->
      					 <div class="error" id="err" style="display: none;">Some error</div>
      					 <!-- use to blank validation -->
      					 				
      					<?php 
      					$attributes = array('id' => 'contactUs', 'onSubmit' => 'return chkFrm();');
						//form validation
						echo validation_errors();
						
						//echo form_open('admin/pages/add', $attributes);
						echo form_open_multipart('common_controllers/send_mail',$attributes); 
						?>   						
      					<div class="contact_input clearfix">
      						<div class="part2">
		      					<span>Name</span>
		      					<input type="text" class="textbox" name="u_name" id="u_name">
		      					<!-- <span class="help-inline" id="u_nameerr"></span> -->
		      				</div>
      						<div class="part2">
	      						<span>Subject</span>
	      						<div class="select_outer">
									<select name="subject" id="subject" style="display: none;">
									    <option value="1">Subject</option>
									    <option value="2">Option 2</option>
									    <option value="3">Option 3</option>
									    <option value="4">Option 4</option>
									</select>
									<!-- <span class="help-inline" id="subjecterr"></span> -->
								</div>
							</div>
							<div class="part2">
		      					<span>Email</span>
		      					<input type="text" class="textbox" name="u_mail" id="u_mail" />
		      					<!-- <span class="help-inline" id="u_mailerr"></span> -->
		      					<input type="hidden" name="to_mail" id="to_mail" value="<?php echo $settings[0]['contact_email']; ?>"/>
		      				</div>
      						<div class="part2">
	      						<span>Subject Category</span>
	      						<div class="select_outer">
									<select name="s_cat" id="s_cat" style="display: none;">
									    <option value="1">Subject Category</option>
									    <option value="2">Option 2</option>
									    <option value="3">Option 3</option>
									    <option value="4">Option 4</option>
									</select>
									<!-- <span class="help-inline" id="s_caterr"></span> -->
								</div>
							</div>
      					</div>      					
      					<div class="contact_input">
      						<span>Message / Comments</span>
      						<!-- <span class="help-inline" id="u_msgerr"></span> -->
      						<textarea class="message_box" rows="" cols="" name="u_msg" id="u_msg"></textarea>
      					</div>
      					
      					<div class="contact_input">
      						<div class="check_outer">      							
	      						<input type="checkbox" name="cc" id="c1">
	            				<label for="c1"><span></span>Receive a copy of this message</label>     						
	  						</div>
      					</div>
      					<div class="input_outer btn_out">
      						<input type="checkbox" name="chkSelect" id="chkSelect">
	      					<input type="submit" class="red_btn" value="send now">
	      				</div>
	      				<?php echo form_close(); ?>
	      				<!-- </form> -->
      				</div>
      				<!-- main content end -->
      			</div>
      			<!-- end right content -->
      		</div>
    	</div>
    </section> <!-- content part end -->
    
    <!-- footer -->
 