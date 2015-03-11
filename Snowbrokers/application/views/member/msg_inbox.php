
	
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
		<?php $display_message_section = "";?>
		<a href="<?php echo base_url();?>index.php/signup/msg_compose" class="bg_rd_more" style="<?php echo $display_message_section;?>margin-bottom: 20px;margin-top: 12px;float: right;margin-right: 60px;">Compose</a>
		<h4 style="margin-left: 90px;">Message</h4> 
						
						
		<div class="frst_nm_rw clearfix" style="background-color: #FFFFFF; margin-left: auto; width: 87%; margin-right: auto;">
		<?php
		$i=1;
		if(count($msg_details)>0)
		{
			
			foreach($msg_details as $msg)
			{

			    //$encrypt_id=urlencode(base64_encode($task->id));
			    if($i==count($msg_details))
			    {
				    $bottom_style="border-bottom:none !important";
			    }
			    else
			    {
				    $bottom_style="border-bottom:1px solid #C6C6C6";
			    }
			    if($msg->status==0)
			    {
				$msg_color="style='font-weight:bold;'";
			    }
			    else
			    {
				$msg_color="style='font-weight:normal;'";
			    }
			  ?>
			  
			  <div style="<?php echo $bottom_style;?>;margin-left: 21px;margin-right: 21px;margin-top: 16px;margin-bottom: 20px;padding-bottom: 20px;">
				<div style="line-height: 97px;">
			<?php
			
			$post_details_user=$this->modelsignup->Get_posted_Deatils($msg->task_id);
			
			?>
					<label <?php echo $msg_color;?>><a href="<?php echo base_url();?>index.php/signup/msg_details/<?php echo $msg->id;?>"><?php echo $i.".".$msg->first_name." ".$msg->last_name;?>&nbsp;&nbsp;<?php if($post_details_user > 0){echo '(&nbsp;Task Code :&nbsp;'.$post_details_user[0]->task_code.'&nbsp;)'; } else {echo "";}?></a></label>
				
					<label <?php echo $msg_color;?>>
					<a href="<?php echo base_url();?>index.php/signup/msg_details/<?php echo $msg->id;?>">
					  <?php
					  echo substr($msg->message_details,0,50);
					  if(strlen($msg->message_details)>50)
					  {
						echo "...";
					  }
					  else
					  {
						echo "";
					  }
					  if($msg->attach_file!='')
					  {
					?>
					<img src="<?php echo base_url().'images/attachment_icon.png'?>" style="float:right">
					<?php
					  }
					  else
					  {
						echo ' ';
					  }
					  ?>
					  </a>
					</label>
				</div>
				
				
			  </div>
			  
			  <?php
			  
			  
			
				$i++;	
			}
			
		}
		else
		{
		?>
		<div style="margin-left: 21px;margin-right: 21px;margin-top: 16px;">
				<div style="line-height: 97px;">
				  <label>
				    No Message Found
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
