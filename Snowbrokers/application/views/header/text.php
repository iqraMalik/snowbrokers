<?php
//echo $this->session->userdata('user_id')."$$$$";
$dataone_fetch=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));
//print_r($dataone_fetch);
$data=$dataone_fetch[0];

?>
<script type="text/javascript">

$(document).ready(function(){
	$("#uploadTrigger").click(function(){
		
		$("#upload_image").click();
	  });
	});
 
</script>
<script type="text/javascript">	
$("#modal-update").live("click", function(){
	
	$('#myModal-update-account').modal('show');
	$('#update_prof_comp').show();
});

</script>

<link href="<?php echo base_url(); ?>css/jQcrop.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>js/upload_banner.js"></script>
<script src="<?php echo base_url(); ?>js/jQcrop.js"></script>

        <section class="MainBodyinner">
        	<div class="container">
            	<div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
        	<div class="row">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="dudh-bar"></span>
              <span class="dudh-bar"></span>
              <span class="dudh-bar"></span>
            </button>
            </div>
          <div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#">Profile</a></li>
              <li><a href="#">Instructors</a></li>
              <li><a href="#">Activities</a></li>
              <li><a href="#">Sports Centers</a></li>
              <li><a href="#">Groups</a></li>
              <li><a href="#">events</a></li>
              <li><a href="#">apps</a></li>   
              <li><a href="#">Supplements</a></li>
              <li><a href="#">videos</a></li>                                     
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div> <!-- /.navbar-->
      			<div class="row">
                	<div class="col-xs-12">
				
                    	<div class="profilebanner">
				<input type="hidden" name="base_url_name1" id="base_url_name1" value="<?php echo base_url(); ?>">
				<input type="hidden" name="user_id_name" id="user_id_name" value="<?php echo $data->id; ?>">


                        	<div class="bannerimg">
					<div id="profile_image_area">

						<?php $result = $this->modelsignup->check_user_banner($data->id);
						if($result==0)
						{
							?>
							<img src="<?php echo base_url(); ?>images/profile-banner.jpg" alt="" class="img-responsive">

							<?php
						}
						else
						{
							$result_banner = $this->modelsignup->pick_user_banner($data->id);
							
							$style=$result_banner[0]->banner_image_style;
							?>
							<div id="crop_outer_div" class="cropFrame" style="width: 1140px; height: 354px;">
								<img src="<?php echo base_url(); ?>images/profile_cover_image/<?php echo $result_banner[0]->file_name;?>" style="<?php echo $style ?>" alt="" class="img-responsive cropImage">
							</div>
							<?php
						}
						?>
						
					</div>
				</div>
                            <div class="BannerLower">
                            	<div class="profilepic">
					<?php $result1 = $this->modelsignup->check_user_profile_pic($data->id);
					@$profile_image_pic = $result1[0]->profile_image ;
					@$profile_image_small_pic = $result1[0]->profile_image_small ;
						if(@$profile_image_pic=='' AND @$profile_image_small_pic=='')
						{
						?>
					<img src="<?php echo base_url(); ?>images/no_image.jpeg" alt="">
					<?php
						}
						else if(@$profile_image_small_pic !='')
						{
							?>
							<img src="<?php echo base_url(); ?>images/profile_pic/<?php echo @$profile_image_small_pic; ?>" alt="">
							<?php
						}
						else{
							?>
							<img src="<?php echo base_url(); ?>images/profile_pic/thumb/<?php echo @$profile_image_pic; ?>" alt="">
							<?php
						}
					?>
				<a id="modal_profile_pic_update" href="#"><img alt="" src="http://www.esolz.co.in/lab3/sports/images/edit.png"></a>
				</div>
                                <div class="profiletxt">
                                	<div class="profiletxttop">
					<div class="righticon">
						<div class="coverimageloader"></div>
						<form id="banner_image_form" enctype="multipart/form-data" method="post" action="<?php echo site_url('signup/upload_image_banner');?>">
							<div class="changecoverouter">
								<div class="changetrigger" id="profile_banner_change">Change
									<ul class="changeul">
										<li>
											<input type="file" name="upload_image" class="hidden" id="upload_image"/>
											<div class="button2" id="uploadTrigger">Upload File</div>
										</li>
										<li><a href="javascript:void(0);" id="resize_cover">Resize Cover</a></li>
										<!--<li><a href="#">Delete Cover</a></li>-->
									</ul>
								</div>
								<div class="changetrigger" id="profile_banner_save" style="display: none;margin-bottom: 204px;float:left;">Save</div>
								<div class="changetrigger" id="profile_banner_cancel" style="display: none;margin-bottom: 204px;float:right;">Cancel</div>
								<input type="hidden" name="banner_user_id" id="banner_user_id" value="<?php echo $data->id; ?>">
								<input type="hidden" name="base_url_name" id="base_url_name" value="<?php echo base_url(); ?>">
								
							</div>
						</form>
                                            
                                        </div>
                                    	<div class="righticon">
                                        	<div class="iconright"><a id="modal_description_edit" href="#"><img src="<?php echo base_url(); ?>images/edit.png" alt=""></a></div>
                                            <div class="iconright"><a href="#"><img src="<?php echo base_url(); ?>images/setting.png" alt=""></a></div>
                                        </div>
                                        <div class="Profilname"><?php echo $data->first_name."&nbsp&nbsp".$data->last_name; ?> </div>
                                    </div>
                                    <div class="profiletxt_des">
				    <?php if($data->about_myself=='')
				    {
					echo 'Please Write something About you';
				    }
				    else
				    {
					echo $data->about_myself;
				    }?>
                                    </div>
                                </div>
                            </div>
                        </div>