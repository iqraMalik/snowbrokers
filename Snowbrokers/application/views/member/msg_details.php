
	<script>
	function show_msg_section()
	{
	$('#msg_post').slideToggle(1000);
	}
	function check_msg_validation()
	{
	   var has_error=0;
	   if ($.trim($('#message').val())=='')
	   {
	      $('#message_error').html('Please enter message');
	      $('#message').focus();
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
	
		<h4>Message Description</h4>
		<div class="frst_nm_rw clearfix" style="background-color: #FFFFFF; margin-left: auto; width: 87%; margin-right: auto;">
		<?php
		
		//$msg_details=$this->modelsignup->Get_Task_Deatils($this->uri->segment(3),$this->uri->segment(4));
		$i=1;
		
		if(count($msg_details)>0)
		{
			//print_r($msg_details);
		//exit;
			
			$msg_details_user=$this->modelsignup->Get_msg_user_Deatils($msg_details[0]->message_sender_id);
		
			  ?>
			  
			  <div style="margin-left: 21px;margin-right: 21px;margin-top: 16px;margin-bottom: 20px;padding-bottom: 20px;">
				<div style="line-height: 40px;">
					<?php
					if(count($msg_details_user)>0)
					{
						$post_details_user=$this->modelsignup->Get_posted_Deatils($msg_details[0]->task_id);
			?>
					<label style="float: left; margin-right: 10px;"><b><?php echo $msg_details_user[0]->first_name." ".$msg_details_user[0]->last_name;?>&nbsp;&nbsp;<?php if($post_details_user > 0){echo '(&nbsp;Task Code :&nbsp;'.$post_details_user[0]->task_code.'&nbsp;)'; } else {echo "";}?></b></label>
					<?php
					}
					 ?>
					 <label style="float: right;margin-right: 15px;"><?php echo date('M j,Y H:i:s',strtotime($msg_details[0]->message_date)); ?></label><br/>
					<label >
					  <?php
					  echo $msg_details[0]->message_details;
					  
					  //if($msg_details[0]->attach_file!='')
					///  {
					?>
					<!--<img src="<?php echo base_url().'images/attachment_icon.png'?>" style="float:right">-->
					<?php
					 // }
					//  else
					//  {
					//	echo ' ';
					 // }
					  ?>
					  
					</label>
				</div>
					<div class="clearfix bdr_dt_or">
						      
							<div class="bdr_dtl">
							       <?php
								$attach_file=PHYSICAL_PATH.'msg_attachment/'.$msg_details[0]->attach_file;
								if(file_exists($attach_file) && ($msg_details[0]->attach_file!=''))
								{
							       ?>
							       <span class="nme_txt">Download Attachment: <a href="<?php echo base_url().'index.php/task/download_file/'.$msg_details[0]->attach_file?>">Download</a>  </span>
							       <?php
								}
								else
								{
								      echo ' ';
								}
								?>
								
							</div>
						</div>
						<?php $display_message_section = "";?>
						<a href="javascript:void(0);" class="bg_rd_more" style="<?php echo $display_message_section;?>margin-bottom: 20px;margin-top: 20px;" onclick="show_msg_section();">Reply</a>
						<div class="sgn_up_outnew" id="msg_post" style="display:none;">
						<h4>ENTER YOUR MESSAGE</h4>
				
						<form style="padding: 18px 0% 0;" autocomplete="off" action="<?php echo site_url('signup/insert_message');?>" enctype="multipart/form-data" method="post" name="message_form" id="message_form" class="spcing_otr">
							<input type="hidden" value="<?php echo $msg_details[0]->id;?>" id="task_msg_id" name="task_msg_id">
							<?php
							$msg_details_user2=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));
							if(count($msg_details_user2)>0)
							{
						
							?>
							
							<input type="hidden" value="<?php echo $msg_details_user2[0]->first_name;?>" id="first_name" name="first_name">
							<input type="hidden" value="<?php echo $msg_details_user2[0]->last_name;?>" id="last_name" name="last_name">
							<?php
							}
							$msg_details_user1=$this->modelsignup->Get_msg_user_Deatils($msg_details[0]->message_sender_id);
							if(count($msg_details_user1)>0)
							{
							?>
							<input type="hidden" value="<?php echo $msg_details_user1[0]->email;?>" id="email" name="email">
							
							<?php } ?>
					<input type="hidden" value="<?php echo $msg_details[0]->message_sender_id;?>" id="message_receiver_id" name="message_receiver_id">
							<input type="hidden" value="<?php echo $this->session->userdata('user_id');?>" id="message_sender_id" name="message_sender_id">
							
							
							<div class="frst_nm_rw clearfix">
								<label style="margin-bottom:20px;">Message</label>
								<textarea name="message"  id="message" class="nm_crd_txt_b_txtarea wdth_fll" placeholder="Message"></textarea>
		                                        </div>
							<div style="color: red;margin-bottom: 20px;" id="message_error"></div>
							<div class="frst_nm_rw clearfix">
								<label style="margin-bottom:20px;">Attach File</label>
								<input type="file" name="attachment" id="attachment" value="">
		                                        </div>
							
							
							<span class="sgnup sgn_sml">
								<input type="button" onclick="check_msg_validation();" value="Submit" class="sgn_btu sb_mt_sml_btn">
							</span>
						</form>
					</div>

			  </div>
			  
			  <?php
			  
				$i++;	
		
			
		}
		else
		{
		?>
		<div style="margin-left: 21px;margin-right: 21px;margin-top: 16px;">
				<div style="line-height: 97px;">
				  <label>
				    No Massage Found
				  </label>
				</div>
		</div>
		<?php
		}
		?>
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
