<section class="FooterTop">
        	<div class="container">
              <?php $footer=$this->modelhome->footerupper();
	       echo $foot=str_replace(array('<em>','</em>'),array('<i>','</i>'),$footer);
	      ?>
            	<!--<div class="featureblog">
                	<div class="row">
                        <div class="col-sm-4">
				
                            <div class="footer-box">
                                <i><img alt="feature" src="<?php echo base_url(); ?>images/icon-feature.png"></i>
                                <h4>feature your business</h4>
                                <a class="learn-more" href="javascript:void(0)">Learn More <span>&raquo;</span></a>
                            </div><!-- /.footer-box -->
                       <!-- </div><!-- /.col-sm-4 -->
                        <!--<div class="col-sm-4">
                            <div class="footer-box">
                                <i><img alt="feature" src="<?php echo base_url(); ?>images/icon-mobile.png"></i>
                                <h4>deals on your phone</h4>
                                <a class="learn-more" href="javascript:void(0)">Learn More <span>&raquo;</span></a>
                            </div><!-- /.footer-box -->
                        <!--</div>--><!-- /.col-sm-4 -->
                        <!--<div class="col-sm-4">
                            <div class="footer-box">
                            	<i><img alt="feature" src="<?php echo base_url(); ?>images/icon-chat.png"></i>
                            	<h4>help us improve</h4>
                            	<a class="learn-more" href="javascript:void(0)">Learn More <span>&raquo;</span></a>
                            </div><!-- /.footer-box -->
                        <!--</div><!-- /.col-sm-4 -->
                    <!--</div>--> <!-- /.row -->
                <!--</div>--> <!-- /.featureblog -->
                <div class="FooterLogo clearfix">
                	<div class="SportyPhnumber">
				<?php echo $email=$this->modelhome->contactemail();?>
                    	<br>
					<?php echo $phnumber=$this->modelhome->contactphnumber();?>
                    </div>
			<?php
				$site_settings=$this->modelhome->site_setting_details();
				
				foreach($site_settings as $setting)
				{
				if($setting->id==77)
				{
				$facebooklabel=$setting->field_name;		
				$facebook=$setting->field_value;		
				}
				if($setting->id==78)
				{
				$twitterlabel=$setting->field_name;				
				$twitter=$setting->field_value;		
				}
				if($setting->id==79)
				{
				$googlelable=$setting->field_name;	
				$google=$setting->field_value;		
				}
				if($setting->id==80)
				{
				$linkedinlable=$setting->field_name;		
				$linkedin=$setting->field_value;		
				}
				if($setting->id==94)
				{
				$youtubelable=$setting->field_name;		
				$youtube=$setting->field_value;		
				}
				if($setting->id==80)
				{
				$instagramlable=$setting->field_name;		
				$instagram=$setting->field_value;		
				}
				}
				?>
                    <div class="lowerlogo"><a href="#"><img src="<?php echo base_url(); ?>images/lowerlogo.png" alt=""></a></div>
                	<div class="pull-right sociallower">
                    	<div class="fluid-social clearfix">
                            <div class="socialfooter">
                                <a href="<?php echo $facebook;?>">
                                    <span class="facebook"><img style="padding-top: 8px;" src="<?php echo base_url(); ?>images/facebook.png" alt=""></span>
                                    <span><?php echo $facebooklabel?></span>
                                </a>
                            </div>
                            <div class="socialfooter">
                                <a href="<?php echo $instagram;?>">
                                    <span class="instagram"><img style="padding-top: 8px;" src="<?php echo base_url(); ?>images/instagram.png" alt=""></span>
                                    <span><?php echo $instagramlable;?></span>
                                </a>
                            </div>
                            <div class="socialfooter">
                                <a href="<?php echo $linkedin;?>">
                                    <span class="linkedin"><img style="padding-top: 8px;" src="<?php echo base_url(); ?>images/linkedin.png" alt=""></span>
                                    <span><?php echo $linkedinlable;?></span>
                                </a>
                            </div>
                        </div>
                        <div class="fluid-social clearfix">
                            <div class="socialfooter">
                                <a href="<?php echo $twitter; ?>">
                                    <span class="twitter"><img style="padding-top: 8px;" src="<?php echo base_url(); ?>images/twiter.png" alt=""></span>
                                    <span><?php echo $twitterlabel;?></span>
                                </a>
                            </div>
                            <div class="socialfooter">
                                <a href="<?php echo $youtube;?>">
                                    <span class="you"><img style="padding-top: 8px;" src="<?php echo base_url(); ?>images/you.png" alt=""></span>
                                    <span><?php echo $youtubelable;?></span>
                                </a>
                            </div>
                            <div class="socialfooter">
                                <a href="<?php echo $google;?>">
                                    <span class="googleplus"><img style="padding-top: 8px;" src="<?php echo base_url(); ?>images/googleplus.png" alt=""></span>
                                    <span><?php echo $googlelable;?></span>
                                </a>
                            </div>
                        </div>
                  	</div>
                </div> <!-- /.FooterLogo -->
            </div> <!-- /.container-->
        </section> <!-- /.container-->
        <footer class="footer">
        	<div class="container">
            	<ul class="footerlink">
                	<li><a href="<?php echo base_url()."index.php/home/about";?>" target="_blank">About</a></li>                                        
                    <li><a href="<?php echo base_url()."index.php/home/jobs";?>" target="_blank">Jobs</a></li>
                    <li><a href="<?php echo base_url()."index.php/home/press";?>" target="_blank">Press</a></li>
                    <li><a href="<?php echo base_url()."index.php/home/blog";?>" target="_blank">Blog</a></li>
                    <li><a href="<?php echo base_url()."index.php/home/help";?>" target="_blank">Help</a></li>
                    <li><a href="<?php echo base_url()."index.php/home/terms";?>" target="_blank">Terms & Privacy</a></li>
                </ul>
                <div class="Copylink">© 2014 All Rights Reserved. SportypEEs</div>
            </div>
        </footer>
    </section>  <!-- /.FooterTop -->
    <script language="javascript">
	var b=document.getElementById("text_area");
	
	 if (b !==null) {
       b.onclick=changeElement;
    }
    

      function changeElement() {

          var textarea = document.getElementById("text_area");
          textarea.style.height="120px";
      }
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-filestyle.js"></script>
<script type="text/javascript">
	$('#input03').jfilestyle({
		input : false
	});
</script>
</body>
</html>