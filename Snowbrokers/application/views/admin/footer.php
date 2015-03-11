<section class="greenpart">
    	<div class="container">
			<?php
			if(isset($home) && $home == 'only_home')
			{
				$lowerlogo_class = 'lowerlogo';
			}
			else
			{
				//$lowerlogo_class = 'lowerlogoinner';
				$lowerlogo_class = 'lowerlogo';
			}
			?>
        	<div class="greeninner">
            	<div class="<?php echo $lowerlogo_class; ?>">
					<a href="#">
						<?php
						if(isset($home) && $home == 'only_home')
						{
						?>
							<img src="<?php echo $this->config->base_url(); ?>assets/images/lowerlogo.png" alt="lowerlogo">
						<?php
						}
						else
						{
						?>
							<!--<img src="<?php //echo $this->config->base_url(); ?>assets/images/logoinnerlower.png" alt="logoinnerlower">-->
							<img src="<?php echo $this->config->base_url(); ?>assets/images/lowerlogo.png" alt="lowerlogo">
						<?php
						}
						?>
					</a>
				</div>
                <div class="wanttxt">Want to Raise Money<br>

for a Good Cause?</div>
				<div class="buttonouter">
				<div class="signupouter">
					
					<input name="" type="button" class="sinnup" value="Sign Up"
					       onclick="signup()">
                </div>
                <div class="ortxt">or</div>
                <div class="signupouter">
                	<input name="" type="button" class="create" value="Donet" onclick="donet()">
                </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footerarea">
    	<div class="footerareatop">
    	<div class="container">
        	<div class="footertxtarea">
            	<div class="head">GoFundUs.org</div>
                <div class="txt">Joey Gratton loved kids and loved sports, so what better way to celebrate his life than to create a foundation that links the two together. The Joey Gratton Foundation will focus on creating opportunity for those who may not have the chance. </div>
            </div>
            <div class="footerlinksouter">
            	<ul class="footerlinks">
                    <li><a href="<?php echo $settings[0]['twitter']; ?>" target="_blank">Follow Me on Twitter</a></li>
                    <li><a href="<?php echo $settings[0]['facebook']; ?>" target="_blank">Find me on Facebook</a></li>
                    <li><a href="<?php echo $settings[0]['rss']; ?>" target="_blank">Join via RSS</a></li>
                </ul>
            </div>
            <div class="footerlinksouter">
            	<ul class="footerlinks">
                	<li <?php if($this->uri->segment(2) == 'services') { ?>class="select" <?php } ?>><a href="<?php echo base_url().'pages/services'; ?>">Services</a></li>
                    <li <?php if($this->uri->segment(2) == 'company-profile') { ?>class="select" <?php } ?>><a href="<?php echo base_url().'pages/company-profile'; ?>">Company Profile</a></li>
                    <li><a href="#">Meet the Team</a></li>
                </ul>
            </div>
            <div class="footerlinksouter">
            	<ul class="footerlinks">
                	<li><a href="#">Find us on a map</a></li>
                    <li <?php if($this->uri->segment(1) == 'contact') { ?>class="select" <?php } ?>><a href="<?php echo base_url().'contact'; ?>">Contact us</a></li>
                    <li><a href="#">Folio of work</a></li>
                </ul>
            </div>
            </div>
        </div>
        <section class="footerlower">
        	<div class="container">
           		<ul class="powerdtxt">
			<li><a href="<?php echo base_url(); ?>blog">Blog</a>  </li>
			<li>|</li>
                	<li><a href="#">Powered by Xplode Marketing</a>  </li>
                    <li>|</li>
                    <li><a href="#">Sarasota Web Design</a></li>
                </ul>
            	<div class="copyright">&copy; <?php echo date('Y'); ?> Go Fund Us<span>|</span>All rights reserved</div>
            </div>
        </section>
    </section>
</section>
<script>
function signup()
  {
  window.location.assign("<?php echo $this->config->base_url(); ?>signup")
  }
  </script>
<script>
  function donet()
  {
  window.location.assign("<?php echo $this->config->base_url(); ?>donation_page")
  }
</script>
</body>
</html>