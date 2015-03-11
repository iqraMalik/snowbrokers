
	<script>
	function show_msg_section()
	{
	$('#msg-sec').show(1000);
	}
	function check_msg_validation()
	{
	   var has_error=0;
	   if ($.trim($('#task_code').val())=='')
	   {
	      $('#task_code_error').html('Please enter taskcode');
	      $('#task_code').focus();
	      has_error++;
	      return false;
	   }
                else
               {
                  
                  $('#message_error').html('');
                  $('#message_form').submit()
               }
               
	}
	</script>
        
<section class="innerpage_page">
	
	
	<div class="container">
		<div class="row">
			<?php $this->load->view('sidebarblog/sidebar_blog_account.php')?>
			
			<div class="col-md-9 col-sm-8">
				
				<div id="tabs">
  
 
  <div id="tabs-1">
	
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
	
		
	
			  <div style="margin-left: 21px;margin-right: 21px;margin-top: 16px;margin-bottom: 20px;padding-bottom: 20px;">
				
					
						<div class="sgn_up_outnew" id="msg_post" >
						<h4>ENTER YOUR MESSAGE</h4>
				
						<form style="padding: 18px 0% 0;" autocomplete="off" action="<?php echo site_url('signup/task_verify_message');?>" enctype="multipart/form-data" method="post" name="message_form" id="message_form" class="spcing_otr">
							
								<div class="nm_ro_w" style="float:left;">
									
									<input type="text" class="fl_nm_tx" id="task_code" name="task_code" placeholder="Enter Task Code" />
									<label id="task_code_error" style="color: red;margin-top: 10px;margin-left: 180px;"></label>
								</div>

                                               
				       <?php
				       if($this->session->userdata('check_form') == 1)
				       {
					  
				       
				       ?>
							<div class="sgn_up_outnew" id="msg_sec" >
                                                            
							<div class="frst_nm_rw clearfix">
								<label style="margin-bottom:20px;">Message</label>
								<textarea name="message"  id="message" class="nm_crd_txt_b_txtarea wdth_fll" placeholder="Message"></textarea>
		                                        </div>
							<div style="color: red;margin-bottom: 20px;" id="message_error"></div>
							<div class="frst_nm_rw clearfix">
								<label style="margin-bottom:20px;">Attach File</label>
								<input type="file" name="attachment" id="attachment" value="">
		                                        </div>
                                                        </div>
					  <?php
					  }
					  else
					  {
					     echo " ";
					  }
					  ?>
							
						</form>
					</div>

			  </div>
			
		
		</div>
		
	</div>
	<?php  // echo $pagination; ?>
  </div>
 						
	</div>
				
		</div>
			  </div>
				

			<div class="col-md-3"> </div>
		</div>
	
	</div>
</section>
