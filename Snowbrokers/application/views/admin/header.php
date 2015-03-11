<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>
	<?php /*echo $settings[0]['site_name'];*/ ?>
	<?php
	//if(isset($ptitle))
	//{
	//	echo ' - '.$ptitle;
	//}
	?>
	Basic Admin
</title>
<meta name="description" content="<?php echo $settings[0]['meta_description']; ?>">
<meta name="author" content="">
<meta name="keyword" content="<?php echo $settings[0]['meta_keywords']; ?>">

<link rel="icon" type="image/x-icon" href="<?php echo $this->config->base_url(); ?>assets/images/favicon.ico" />
<link rel="icon" type="image/png" href="<?php echo $this->config->base_url(); ?>assets/images/favicon.png" />


<link href="<?php echo $this->config->base_url(); ?>assets/css/fonts.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->config->base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->config->base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->config->base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo $this->config->base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo $this->config->base_url(); ?>assets/js/jquery.selectBoxIt.min.js"></script>
<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<script>
   $(function() {
     var selectBox = $(".select").selectBoxIt();
    });
</script>

<!--<script type="text/javascript" src="<?php //echo $this->config->base_url(); ?>assets/js/jquery-1.10.1.min.js"></script>-->

<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/jquery.fancybox-1.3.4.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assets/css/jquery.fancybox-1.3.4.css" media="screen" />

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "3ee19c80-e384-46a4-af57-f4021838a926", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<!--[if lt IE 9]>
    <script src="js/html5.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
    <link href="<?php echo $this->config->base_url(); ?>assets/css/ie9.css" rel="stylesheet" type="text/css">
<![endif]-->
<!--[if IE 9]>
    <link href="<?php echo $this->config->base_url(); ?>assets/css/ie9.css" rel="stylesheet" type="text/css">
<![endif]-->


 
    
    
    	<script type="text/javascript">
		$(document).ready(function() {
			$("#various1").fancybox({
				'autoScale': true,
				'transitionIn': 'elastic',
				'transitionOut': 'elastic',
				'speedIn': 500,
				'speedOut': 300
			});

		});
	</script>



</head>
<script>
function chksrch()
{
    
	if(document.getElementById('fundsearch').value.search(/\S/)==-1)
	{
		document.getElementById('errors_srch').innerHTML = 'Enter search key';
		document.getElementById('errors_srch').style.display ='';
		return false;
	}
	else
	{
		var val = document.getElementById('fundsearch').value;
		val=val.replace(/\s+/g,"-");
		location.href= '<?php echo base_url(); ?>search/'+val;
	}
}
</script>
<body>
<section class="bodypanel">
	<section class="headerouter">
    	<section class="headerinner">
            <section class="headertop">
                <div class="container">
                    <div class="fullarea">
                        <div class="socialarea">
                            <div class="socialtxt">Like us on:</div>
                            <div class="socialicon"><div class="facebook"><a href="<?php echo $settings[0]['facebook']; ?>" target="_blank"></a></div></div>
                            <div class="socialicon"><div class="twiter"><a href="<?php echo $settings[0]['twitter']; ?>" target="_blank"></a></div></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="headerlower">
            	<div class="container">
					<?php
						if(isset($home) && $home == 'only_home')
						{
							$navarea_class = 'navarea';
							$logoarea_class = 'logoarea';
						}
						else
						{
							/*$navarea_class = 'navareainner';
							$logoarea_class = 'logoareainner';*/
							$navarea_class = 'navarea';
							$logoarea_class = 'logoarea';
						}
					?>
                	<div class="<?php echo $navarea_class; ?>">
                    	<div class="<?php echo $logoarea_class; ?>">
							<a href="<?php echo $this->config->base_url(); ?>">
								<?php
								if(isset($home) && $home == 'only_home')
								{
								?>
									<img src="<?php echo $this->config->base_url(); ?>assets/images/logo.png" alt="logo">
								<?php
								}
								else
								{
								?>
									<!--<img src="<?php //echo $this->config->base_url(); ?>assets/images/logoinner.png" alt="">-->
									<img src="<?php echo $this->config->base_url(); ?>assets/images/logo.png" alt="logo">
								<?php
								}
								?>
							</a>
						</div>
                        <div class="navbgarea">
				
				
                        	<div class="nav-custom">
                            	<ul>
                                	<li><a href="#">Discover<span>Great Fundraisers</span></a></li>
                                    <li><a href="<?php echo base_url(); ?>start_project">Start<span>a Fundraiser</span></a></li>
                                    <li><a href="<?php echo base_url(); ?>pages/benefits">Learn<span>the Benefits</span></a></li>
                                </ul>
                            </div>
			
				<div class="searcharea">
					<div class="searchouter">
						<?php
							if($this->uri->segment(1) == "search")
							{
								$search_val = $this->uri->segment(2);
								if(!empty($search_val))
								{
									$search_val = str_replace("-"," ",$search_val);
								}
								else
								{
									$search_val = "";
								}
							}
							else
							{
								$search_val = "";
							}
						?>
						<input name="search" id="fundsearch" type="text" class="searchareabox" placeholder="Search Fundraisers" value="<?php echo $search_val; ?>" >
						<input name="" type="button" class="searchbut" value="search" onclick="return chksrch();">
					</div>
					<div id="errors_srch" style="display:none; color: red;"></div>
				</div>
			   
                        </div>
                        <div class="singn"><?php if ($this->session->userdata('id') !== FALSE) { ?>
			
			                        	<ul>
                            	<li><a href="<?php echo base_url(); ?>signup/dashboard">My Account</a></li>
                                <li><a href="<?php echo base_url(); ?>signup/logout">Logout</a></li>
                            </ul>
			<?php } else { ?>
                        	<ul>
                            	<li><a href="<?php echo base_url(); ?>signup">Sign Up</a></li>
                                <li><a href="<?php echo base_url(); ?>signup">Login</a></li>
                            </ul>
				<?php } ?>
                        </div>
                    </div>
					
					<?php
					if(isset($home) && $home == 'only_home')
					{
					?>
					
                    <div class="bannersection">
                    	<div class="bannerleft">
                        	<div class="bannerinner">
                            	<div><img src="<?php echo $this->config->base_url(); ?>assets/images/bannermain.jpg" alt=""></div>
                                <div class="bannertxt">
                                	Exclusive Crowdfunding
                                    <span>Fundraising for Charities</span>
                                </div>
                            </div>
                        </div>
                        <div class="bannerright"><img src="<?php echo $this->config->base_url(); ?>assets/images/TREE.png" alt=""></div>
                        <div class="buttonsection">
                        	<div class="bendarrow"></div>
                        	<div class="buttomtxttop">It's Super Easy to get Signed up</div>
                            <div class="buttonafter">Start raising money for your cause Today!</div>
                            <div class="buttonshadow">
                            	<div class="buttonarea_sec">
                                	<a href="<?php echo base_url(); ?>start_project">Start Your Campaign Now<span>It's 100% Free</span></a>
                                </div>                          	
                            </div>
                        </div>
                    </div>
					
					<?php
					}
					?>
					
                </div>
            </section>
        </section>
    </section>
