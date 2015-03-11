<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
	<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
	
<section class="innerpage_page">
	
	
	<div class="container">
		<div class="row">
			<?php $this->load->view('sidebarblog/sidebar_blog_account.php')?>
			
			<div class="col-md-9 col-sm-8">
				
				<div id="tabs">
  <ul>
    <li><a href="javascript:void(0)" onclick="location.href='<?php echo site_url('signup/view_task');?>'">Active Task</a></li>
    <li><a href="javascript:void(0)" onclick="location.href='<?php echo site_url('signup/complete_task');?>'">Completed Task</a></li>
    <li><a href="#tabs-3" >Past Task</a></li>
    <li><a href="javascript:void(0)" >Awarded Task</a></li>
  </ul>
  
  <div id="tabs-3">
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
		<h4>My Past Task</h4>
		<div class="frst_nm_rw clearfix" style="background-color: #FFFFFF; margin-left: auto; width: 87%; margin-right: auto;">
		<?php
		if(count($task_details)>0)
		{
			$i=1;
			foreach($task_details as $task)
			{

			    $encrypt_id=urlencode(base64_encode($task->id));
			    if($i==count($task_details))
			    {
				    $bottom_style="border-bottom:none !important";
			    }
			    else
			    {
				    $bottom_style="border-bottom:1px solid #C6C6C6";
			    }
			  ?>
			  
			  <div style="<?php echo $bottom_style;?>;margin-left: 21px;margin-right: 21px;margin-top: 16px;">
				<div style="line-height: 97px;">
					<label style="font-weight:bold"><?php echo $i.".".$task->task_title;?></label>
					<label>
					  <?php
					  $replace_description=str_replace("\n","<br>",$task->task_description);
					  echo substr($replace_description,0,100);
					  if(strlen($replace_description)>100)
					  {
					    echo "...";
					  }
					  else
					  {
					    echo "";
					  }
					  ?>
					</label>
					<?php
					$bid_no=$this->modelsignup->total_bids($task->id);
					?>
					<label>
					  Total no of bids : <?php echo $bid_no;?>
					</label>
				</div>
				<?php
				if($task->task_complete_status==0)
				{
				?>
				<div style="width: 30%; margin-bottom: 29px;" class="post_title categories"><a href="<?php echo base_url().'index.php/post_task/review/'.$encrypt_id;?>" style="color:#ffffff;">Update Task</a></div>
				<?php
				}
				?>
				<div style="width: 25%; margin-bottom: 29px;text-align: center;" class="post_title categories"><a href="<?php echo base_url().'index.php/task/task_details/'.$encrypt_id;?>" style="color:#ffffff;">View Details</a></div>
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
				    No Past Task Found
				  </label>
				</div>
		</div>
		  <?php
		}
		?>
		</div>
	</div>				

  </div>
  
</div>
				
				
			</div>
			<div class="col-md-3"> </div>
		</div>
	</div>
</section>
