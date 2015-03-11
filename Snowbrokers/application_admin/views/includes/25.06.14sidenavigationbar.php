<?php
	
	$sitesetting = $this->modeladmin->access_avalible(3);
	if($sitesetting==0)
	{
		$style="display: none";
	}
	else{
	$style="display: block";	
	}
	$usermanagement = $this->modeladmin->access_avalible(1);
	if($usermanagement==0)
	{
		$style1="display: none";
	}
	else{
	$style1="display: block";	
	}
	$category_management = $this->modeladmin->access_avalible(2);
	if($category_management==0)
	{
		$style2="display: none";
	}
	else{
	$style2="display: block";	
	}
	$Article_management= $this->modeladmin->access_avalible(4);
	if($Article_management==0)
	{
		$style3="display: none";
	}
	else{
	$style3="display: block";	
	}
	$faq_management= $this->modeladmin->access_avalible(5);
	if($faq_management==0)
	{
		$style4="display: none";
	}
	else{
	$style4="display: block";	
	}
	$Email_management= $this->modeladmin->access_avalible(6);
	if($Email_management==0)
	{
		$style5="display: none";
	}
	else{
	$style5="display: block";	
	}
	$country_management= $this->modeladmin->access_avalible(7);
	if($country_management==0)
	{
		$style6="display: none";
	}
	else{
	$style6="display: block";	
	}
	$state_management= $this->modeladmin->access_avalible(8);
	if($state_management==0)
	{
		$style7="display: none";
	}
	else{
	$style7="display: block";	
	}
	?>

<ul id="dashboard-menu">
    <!-- <a class="btn-glow success" href="new-movies.html"> &nbsp;+ NEW MOVIES &nbsp;</a> -->
   
    <li class="<?php echo ($this->uri->segment(1)==='dashboard')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='dashboard')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="<?php echo base_url(); ?>index.php/dashboard/index">
            <span><img src="<?php echo base_url(); ?>images/home_icon.png" class="menu_icon"></span>
            <span>Home</span>
        </a>
    </li>
   
    <li class="<?php echo ($this->uri->segment(1)==='site_settings' || $this->uri->segment(1)==='changepassword')?'active':''; ?>" style="<?php echo $style; ?>">
        <?php
        if($this->uri->segment(1)==='site_settings')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/settings.png" style="height: 20px;" class="menu_icon"></span>
            <span>Settings</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='site_settings' || $this->uri->segment(1)==='changepassword')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='site_settings' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/site_settings/index">Site Settings</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='changepassword' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/changepassword/index">Change Password</a></li>
        </ul>
    </li>
    
 
    <li class="<?php echo ($this->uri->segment(1)==='user')?'active':''; ?>" style="<?php echo $style1; ?>">
        <?php
        if($this->uri->segment(1)==='user')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/1398858732_87.png" class="menu_icon"></span>
            <span>User Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='user')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='user' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/user/index">View User</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='user' && $this->uri->segment(2)==='adduser')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/user/adduser">Add New User</a></li>
        </ul>
    </li>
   
  <li class="<?php echo ($this->uri->segment(1)==='subadmin')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='subadmin')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/1403274038_519942-002_User.png" class="menu_icon"></span>
            <span>Subadmin Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='subadmin')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='subadmin' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/subadmin/index">View Subadmin</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='subadmin' && $this->uri->segment(2)==='addsubadmin')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/subadmin/addsubadmin">Add New Subadmin</a></li>
        </ul>
    </li>
   
    <li class="<?php echo ($this->uri->segment(1)==='category')?'active':''; ?>" style="<?php echo $style2; ?>">
        <?php
        if($this->uri->segment(1)==='category')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/1398857978_category.png" class="menu_icon"></span>
            <span>category Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='category')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='category' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/category/index">View category</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='category' && $this->uri->segment(2)==='addcategory')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/category/addcategory">Add New category</a></li>
        </ul>
    </li>

   
    <li class="<?php echo ($this->uri->segment(1)==='article')?'active':''; ?>" style="<?php echo $style3; ?>">
        <?php
        if($this->uri->segment(1)==='article')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/1392902479_article_square_black.png" class="menu_icon"></span>
            <span>Article Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='article')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='article' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/article/index">View Articles</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='article' && $this->uri->segment(2)==='adduser')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/article/addarticle">Add New Article</a></li>
        </ul>
    </li>
    
    <li class="<?php echo ($this->uri->segment(1)==='specialist')?'active':''; ?>" style="<?php echo $style4; ?>">
        <?php
        if($this->uri->segment(1)==='specialist')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>

        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/1398868344_69.png" class="menu_icon"></span>
            <span>FAQ Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='faq')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='faq' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/faq/index">View FAQ</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='faq' && $this->uri->segment(2)==='addfaqtype')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/faq/addfaqtype">Add FAQ</a></li>
        </ul>
    </li>
  
    <li class="<?php echo ($this->uri->segment(1)==='emailmanagement')?'active':''; ?>"  style="<?php echo $style5; ?>">
        <?php
        if($this->uri->segment(1)==='emailmanagement')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/1394651942_icon-ios7-email.png" class="menu_icon"></span>
            <span>Email Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='emailmanagement')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='emailmanagement' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/emailmanagement/index">View Email</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='emailmanagement' && $this->uri->segment(2)==='addemail')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/emailmanagement/addemail">Add New Email</a></li>
        </ul>
    </li>
    
    
     <li class="<?php echo ($this->uri->segment(1)==='country')?'active':''; ?>" style="<?php echo $style6; ?>">
        <?php
        if($this->uri->segment(1)==='country')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/1402305886_672380-compose.png" class="menu_icon"></span>
            <span>Country Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='country')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='country' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/country/index">View Country</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='country' && $this->uri->segment(2)==='addcountry')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/country/addcountry">Add New Country</a></li>
            
        </ul>
         
        <li class="<?php echo ($this->uri->segment(1)==='state')?'active':''; ?>" style="<?php echo $style7; ?>">
        <?php
        if($this->uri->segment(1)==='state')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/1398861238_33.png" class="menu_icon"></span>
            <span>State Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='state')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='state' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/state/index">View state</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='state' && $this->uri->segment(2)==='addstate')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/state/addstate">Add New state</a></li>
        </ul>
    </li>
    

    <li class="<?php echo ($this->uri->segment(1)==='slider')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='slider')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/slider-4-24.png" class="menu_icon"></span>
            <span>Slider Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='slider')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='slider' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/slider/index">View Slider</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='slider' && $this->uri->segment(2)==='addslider')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/slider/addslider">Add New Slider</a></li>
        </ul>
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='clientsay')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='clientsay')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
       
     
   <li class="<?php echo ($this->uri->segment(1)==='plan')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='plan')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/1401907556_64.png" class="menu_icon"></span>
            <span>plan Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='plan')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='plan' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/plan/index">View Plan</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='plan' && $this->uri->segment(2)==='addplan')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/plan/addplan">Add New Plan</a></li>
        </ul>
       
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='sports')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='sports')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/fitness-24.png" class="menu_icon"></span>
            <span>Sports Type Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='sports')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='sports' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/sports/index">View Sports</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='sports' && $this->uri->segment(2)==='addsports')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/sports/addsports">Add New Sports</a></li>
        </ul>
       
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='goal')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='goal')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/1402479216_finish_flag.png" class="menu_icon"></span>
            <span>Goal Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='goal')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='goal' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/goal/index">View Goal</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='goal' && $this->uri->segment(2)==='addgoal')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/goal/addgoal">Add New Goal</a></li>
        </ul>
       
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='skill')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='skill')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/31-24.png" class="menu_icon"></span>
            <span>Skill Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='skill')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='skill' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/skill/index">View Skill</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='skill' && $this->uri->segment(2)==='addskill')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/skill/addskill">Add New Skill</a></li>
        </ul>
       
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='lifestyle')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='lifestyle')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/1401907269_111.png" class="menu_icon"></span>
            <span>lifestyle Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='lifestyle')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='lifestyle' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/lifestyle/index">View lifestyle</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='lifestyle' && $this->uri->segment(2)==='addlifestyle')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/lifestyle/addlifestyle">Add New lifestyle</a></li>
        </ul>
       
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='bodytype')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='bodytype')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/1402479495_cmd-24.png" class="menu_icon"></span>
            <span>Bodytype Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='bodytype')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='bodytype' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/bodytype/index">View Bodytype</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='bodytype' && $this->uri->segment(2)==='addbodytype')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/bodytype/addbodytype">Add New Bodytype</a></li>
        </ul>
       
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='currency')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='currency')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/1402479391_aiga_currency_exchange.png" class="menu_icon"></span>
            <span>Currency Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='currency')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='currency' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/currency/index">View Currency</a></li>
            
        </ul>
       
    </li>
   <li class="<?php echo ($this->uri->segment(1)==='offer')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='offer')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/1402930372_672359-star-straight.png" class="menu_icon"></span>
            <span>offer Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='offer')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='offer' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/offer/index">View Offer</a></li>
             <li class="<?php echo ($this->uri->segment(1)==='offer' && $this->uri->segment(2)==='addoffer')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/offer/addoffer">Add New offer</a></li>
            
        </ul>
       
    </li>
    
     <li class="<?php echo ($this->uri->segment(1)==='event')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='event')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/event_small.png" class="menu_icon"></span>
            <span>Event Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='event')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='event' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/event/index">View Event</a></li>
             <li class="<?php echo ($this->uri->segment(1)==='event' && $this->uri->segment(2)==='addevent')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/event/addevent">Add New Event</a></li>
            
        </ul>
       
    </li>
    
     <li class="<?php echo ($this->uri->segment(1)==='sportscenter')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='sports')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>images/fitness-24.png" class="menu_icon"></span>
            <span>Sports Center Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='sportscenter')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='sportscenter' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/sportscenter/index">View SportsCenter</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='sportscenter' && $this->uri->segment(2)==='addsportscenter')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/sportscenter/addsportscenter">Add New SportsCenter</a></li>
        </ul>
       
    </li>
     <li class="<?php echo ($this->uri->segment(1)==='group')?'active':''; ?>" style="<?php echo $style1; ?>">
        <?php
        if($this->uri->segment(1)==='user')
        {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
        }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/1398858732_87.png" class="menu_icon"></span>
            <span>Group Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='group')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='group' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/group/index">View Groups</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='group' && $this->uri->segment(2)==='addgroup')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/group/addgroup">Add New Groups</a></li>
        </ul>
    </li>
       
    </li>
</ul>