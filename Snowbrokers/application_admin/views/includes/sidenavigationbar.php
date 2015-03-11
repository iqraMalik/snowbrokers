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
	/*$categorymanagement = $this->modeladmin->access_avalible(2);
	if($categorymanagement==0)
	{
		$style2="display: none";
	}
	else{
	$style2="display: block";	
	}*/
	$Article_management= $this->modeladmin->access_avalible(4);
	if($Article_management==0)
	{
		$style3="display: none";
	}
	else{
	$style3="display: block";	
	}
	/*$faq_management= $this->modeladmin->access_avalible(5);
	if($faq_management==0)
	{
		$style4="display: none";
	}
	else{
	$style4="display: block";	
	}*/
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
	//$state_management= $this->modeladmin->access_avalible(8);
	$state_management= 0;
	if($state_management==0)
	{
		$style7="display: none";
	}
	else{
	$style7="display: block";	
	}
	$product_type= $this->modeladmin->access_avalible(9);
	if($product_type==0)
	{
		$style8="display: none";
	}
	else{
	$style8="display: block";	
	}
	$plan_management= $this->modeladmin->access_avalible(10);
	if($plan_management==0)
	{
		$style9="display: none";
	}
	else{
	$style9="display: block";	
	}
	$goal_management= $this->modeladmin->access_avalible(12);
	if($goal_management==0)
	{
		$style10="display: none";
	}
	else{
	$style10="display: block";	
	}
	$skill_management= $this->modeladmin->access_avalible(13);
	if($skill_management==0)
	{
		$style11="display: none";
	}
	else{
	$style11="display: block";	
	}
	$sports_management= $this->modeladmin->access_avalible(11);
	if($sports_management==0)
	{
		$style12="display: none";
	}
	else{
	$style12="display: block";	
	}
	$lifestyle_management= $this->modeladmin->access_avalible(14);
	if($lifestyle_management==0)
	{
		$style13="display: none";
	}
	else{
	$style13="display: block";	
	}
	$bodytype_management= $this->modeladmin->access_avalible(15);
	if($bodytype_management==0)
	{
		$style14="display: none";
	}
	else{
	$style14="display: block";	
	}
	$currency_management= $this->modeladmin->access_avalible(16);
	if($currency_management==0)
	{
		$style14="display: none";
	}
	else{
	$style14="display: block";	
	}
	$event_management= $this->modeladmin->access_avalible(17);
	if($event_management==0)
	{
		$style15="display: none";
	}
	else{
	$style15="display: block";	
	}
	$offer_management= $this->modeladmin->access_avalible(18);
	if($offer_management==0)
	{
		$style16="display: none";
	}
	else{
	$style16="display: block";	
	}
	$sportscenter_management= $this->modeladmin->access_avalible(19);
	if($sportscenter_management==0)
	{
		$style17="display: none";
	}
	else{
	$style17="display: block";	
	}
	$group_management= $this->modeladmin->access_avalible(20);
	if($group_management==0)
	{
		$style18="display: none";
	}
	else{
	$style18="display: block";	
	}
	$usersection_management= $this->modeladmin->access_avalible(21);
	if($usersection_management==0)
	{
		$style19="display: none";
	}
	else{
	$style19="display: block";	
	}
	$certificate_management= $this->modeladmin->access_avalible(21);
	if($certificate_management==0)
	{
		$style20="display: none";
	}
	else{
	$style20="display: block";	
	}
	$product_management= $this->modeladmin->access_avalible(23);
	if($product_management==0)
	{
		$style21="display: none";
	}
	else{
	$style21="display: block";	
	}
	$top_management= $this->modeladmin->access_avalible(24);
	if($top_management==0)
	{
		$style22="display: none";
	}
	else{
	$style22="display: block";	
	}
	$offer_management= $this->modeladmin->access_avalible(25);
	if($offer_management==0)
	{
		$style23="display: none";
	}
	else{
	$style23="display: block";	
	}
	$mid_management= $this->modeladmin->access_avalible(26);
	if($mid_management==0)
	{
		$style24="display: none";
	}
	else{
	$style24="display: block";	
	}
	$advertisement_management= $this->modeladmin->access_avalible(27);
	if($advertisement_management==0)
	{
		$style25="display: none";
	}
	else{
	$style25="display: block";	
	}
	$footerBanner_management=$this->modeladmin->access_avalible(28);
	if($footerBanner_management==0)
	{
		$style26="display: none";
	}
	else{
	$style26="display: block";	
	}
	$newsletter_management=$this->modeladmin->access_avalible(29);
	if($newsletter_management==0)
	{
		$style27="display: none";
	}
	else{
	$style27="display: block";	
	}
	$order_management=$this->modeladmin->access_avalible(30);
	if($order_management==0)
	{
		$style28="display: none";
	}
	else{
	$style28="display: block";	
	}
	$whishlist_management=$this->modeladmin->access_avalible(31);
	if($whishlist_management==0)
	{
		$style29="display: none";
	}
	else{
	$style29="display: block";	
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
   
  <!--<li class="<?php// echo ($this->uri->segment(1)==='subadmin')?'active':''; ?>">
        <?php
       // if($this->uri->segment(1)==='subadmin')
       // {
            ?>
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php
       // }
        ?>
        <a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php //echo base_url(); ?>assets/img/admin/icons/1403274038_519942-002_User.png" class="menu_icon"></span>
            <span>Subadmin Management</span>
        </a>
        <ul class="submenu"<?php //echo ($this->uri->segment(1)==='subadmin')?' style="display:block"':''; ?>>
            <li class="<?php //echo ($this->uri->segment(1)==='subadmin' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php //echo base_url(); ?>index.php/subadmin/index">View Subadmin</a></li>
            <li class="<?php //echo ($this->uri->segment(1)==='subadmin' && $this->uri->segment(2)==='addsubadmin')?'active':''; ?>"><a href="<?php //echo base_url(); ?>index.php/subadmin/addsubadmin">Add New Subadmin</a></li>
        </ul>
    </li>-->
  
<!--<li class="<?php echo ($this->uri->segment(1)==='category_article')?'active':''; ?>" style="<?php echo $style20; ?>">-->
        <?php
        if($this->uri->segment(1)==='category_article')
        {
            ?>
            <!--<div class="pointer">-->
            <!--    <div class="arrow"></div>-->
            <!--    <div class="arrow_border"></div>-->
            <!--</div>-->
            <?php
        }
        ?>
        <!--<a href="javascript:void(0)" class="dropdown-toggle">-->
        <!--    <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/1398858732_87.png" class="menu_icon"></span>-->
        <!--    <span> Articale category</span>-->
        <!--</a>-->
    <!--    <ul class="submenu"<?php echo ($this->uri->segment(1)==='category_article')?' style="display:block"':''; ?>>-->
    <!--        <li class="<?php echo ($this->uri->segment(1)==='category_article' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/category_article/index">View Articale category</a></li>-->
    <!--        <li class="<?php echo ($this->uri->segment(1)==='category_article' && $this->uri->segment(2)==='addcategory')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/category_article/addcategory">Add New Articale category</a></li>-->
    <!--    </ul>-->
    <!--</li>-->
	
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
            <span>Email Template</span>
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
            <span><img src="<?php  echo base_url(); ?>assets/img/admin/icons/1398861238_33.png" class="menu_icon"></span>
            <span>State Management</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='state')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='state' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/state/index">View state</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='state' && $this->uri->segment(2)==='addstate')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/state/addstate">Add New state</a></li>
        </ul>
    </li>
    
    <li class="<?php echo ($this->uri->segment(1)==='product')?'active':''; ?>" style="<?php echo $style21; ?>">
        <?php
        if($this->uri->segment(1)==='product')
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
            <span><img src="<?php  echo base_url(); ?>images/product.png" class="menu_icon"></span>
            <span>Product Management</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='product')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='product' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product/index">View Products</a></li>
            <!--<li class="<?php echo ($this->uri->segment(1)==='product' && $this->uri->segment(2)==='addproducttype')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product/addproduct">Add New One</a></li>-->
        </ul>
    </li>

     <li class="<?php echo ($this->uri->segment(1)==='product_type')?'active':''; ?>" style="<?php echo $style8; ?>">
        <?php
        if($this->uri->segment(1)==='product_type')
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
            <span><img src="<?php  echo base_url(); ?>images/package-x-generic.png" class="menu_icon"></span>
            <span>Product Type</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='product_type')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='product_type' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_type/index">View Product Type</a></li>
            <!--<li class="<?php echo ($this->uri->segment(1)==='product_type' && $this->uri->segment(2)==='addproducttype')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_type/addproducttype">Add New One</a></li>-->
        </ul>
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='product_category')?'active':''; ?>" style="<?php echo $style8; ?>">
        <?php
        if($this->uri->segment(1)==='product_category')
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
            <span><img src="<?php  echo base_url(); ?>images/category_edit-128.png" class="menu_icon"></span>
            <span>Product Category</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='product_category')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='product_category' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_category/index"> Product Category</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='product_category' && $this->uri->segment(2)==='addproductcategory')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_category/addproductcategory">Add New One</a></li>
        </ul>
    </li>
    <!--<li class="<?php echo ($this->uri->segment(1)==='product_subcat')?'active':''; ?>" style="<?php echo $style8; ?>">-->
        <?php
        if($this->uri->segment(1)==='product_subcat')
        {
            ?>
		<!--<div class="pointer">-->
		<!--	<div class="arrow"></div>-->
		<!--	<div class="arrow_border"></div>-->
		<!--</div>-->
            <?php
        }
        ?>
    <!--    <a href="javascript:void(0)" class="dropdown-toggle">-->
    <!--        <span><img src="<?php  echo base_url(); ?>images/1392902479_article_square_black.png" class="menu_icon"></span>-->
    <!--        <span>Product SubCategory</span>-->
    <!--    </a>-->
    <!--    <ul class="submenu"<?php  echo ($this->uri->segment(1)==='product_subcat')?' style="display:block"':''; ?>>-->
    <!--        <li class="<?php echo ($this->uri->segment(1)==='product_subcat' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_subcat/index"> Product SubCategory</a></li>-->
    <!--        <li class="<?php echo ($this->uri->segment(1)==='product_subcat' && $this->uri->segment(2)==='addproductsubcat')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_subcat/addproductsubcat">Add New One</a></li>-->
    <!--    </ul>-->
    <!--</li>-->

 <!--<li class="<?php echo ($this->uri->segment(1)==='product_subsubcat')?'active':''; ?>" style="<?php echo $style8; ?>">-->
        <?php
        if($this->uri->segment(1)==='product_subsubcat')
        {
            ?>
		<!--<div class="pointer">-->
		<!--	<div class="arrow"></div>-->
		<!--	<div class="arrow_border"></div>-->
		<!--</div>-->
            <?php
        }
        ?>
    <!--    <a href="javascript:void(0)" class="dropdown-toggle">-->
    <!--        <span><img src="<?php  echo base_url(); ?>images/1392902479_article_square_black.png" class="menu_icon"></span>-->
    <!--        <span>Product Sub SubCategory</span>-->
    <!--    </a>-->
    <!--    <ul class="submenu"<?php  echo ($this->uri->segment(1)==='product_subsubcat')?' style="display:block"':''; ?>>-->
    <!--        <li class="<?php echo ($this->uri->segment(1)==='product_subsubcat' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_subsubcat/index"> Sub SubCategory</a></li>-->
    <!--        <li class="<?php echo ($this->uri->segment(1)==='product_subsubcat' && $this->uri->segment(2)==='addproductsubsubcat')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_subsubcat/addproductsubsubcat">Add New One</a></li>-->
    <!--    </ul>-->
    <!--</li>-->
         <li class="<?php echo ($this->uri->segment(1)==='product_color')?'active':''; ?>" style="display: none;">
        <?php
        if($this->uri->segment(1)==='product_color')
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
            <span><img src="<?php  echo base_url(); ?>images/color-mode-128.png" class="menu_icon"></span>
            <span>Product Color</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='product_color')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='product_color' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_color/index"> Product Color</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='product_color' && $this->uri->segment(2)==='addproductsubcat')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_color/addcolor">Add New One</a></li>
        </ul>
    </li>
        <li class="<?php echo ($this->uri->segment(1)==='product_size')?'active':''; ?>" style="display: none;">
        <?php
        if($this->uri->segment(1)==='product_size')
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
            <span><img src="<?php  echo base_url(); ?>images/size_both-128.png" class="menu_icon"></span>
            <span>Product Size</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='product_size')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='product_size' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_size/index"> Product Size</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='product_size' && $this->uri->segment(2)==='addproductsubcat')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/product_size/addsize">Add New One</a></li>
        </ul>
    </li>
<!--<li class="<?php echo ($this->uri->segment(1)==='brand')?'active':''; ?>" style="<?php echo $style8; ?>">-->
        <?php
        if($this->uri->segment(1)==='brand')
        {
            ?>
		<!--<div class="pointer">
			<div class="arrow"></div>
			<div class="arrow_border"></div>
		</div>-->
            <?php
        }
        ?>
        <!--<a href="javascript:void(0)" class="dropdown-toggle">
            <span><img src="<?php  echo base_url(); ?>images/1392902479_article_square_black.png" class="menu_icon"></span>
            <span>Brand</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='brand')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='brand' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/brand/index">Brand</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='brand' && $this->uri->segment(2)==='addbrand')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/brand/addbrand">Add New One</a></li>
        </ul>-->
    <!--</li>-->
    
    <li class="<?php echo ($this->uri->segment(1)==='top_banner')?'active':''; ?>" style="<?php echo $style22; ?>">
        <?php
        if($this->uri->segment(1)==='top_banner')
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
            <span><img src="<?php  echo base_url(); ?>assets/img/admin/icons/1398861234_33.png" class="menu_icon"></span>
            <span>Top Banner Section</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='top_banner')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='top_banner' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/top_banner/index">View</a></li>
        </ul>
    </li>
    
    <li class="<?php echo ($this->uri->segment(1)==='offer_banner')?'active':''; ?>" style="<?php echo $style23; ?>">
        <?php
        if($this->uri->segment(1)==='offer_banner')
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
            <span><img src="<?php  echo base_url(); ?>images/Paypal.png" class="menu_icon"></span>
            <span>Offer Section </span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='offer_banner')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='offer_banner' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/offer_banner/index">View</a></li>
        </ul>
    </li>
    
    <li class="<?php echo ($this->uri->segment(1)==='middle_banner')?'active':''; ?>" style="<?php echo $style24; ?>">
        <?php
        if($this->uri->segment(1)==='middle_banner')
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
            <span><img src="<?php  echo base_url(); ?>images/shells_section.png" class="menu_icon"></span>
            <span>Middle Section </span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='middle_banner')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='middle_banner' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/middle_banner/index">View</a></li>
        </ul>
    </li>
        <li class="<?php echo ($this->uri->segment(1)==='avertisement')?'active':''; ?>" style="<?php echo $style25; ?>">
        <?php
        if($this->uri->segment(1)==='avertisement')
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
            <span><img src="<?php  echo base_url(); ?>images/Advertising.png" class="menu_icon"></span>
            <span>Advertisement</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='avertisement')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='avertisement' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/avertisement/index">View</a></li>
        </ul>
    </li>
        <li class="<?php echo ($this->uri->segment(1)==='banner_home_footer')?'active':''; ?>" style="<?php echo $style26; ?>">
        <?php
        if($this->uri->segment(1)==='banner_home_footer')
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
            <span><img src="<?php  echo base_url(); ?>images/sections-128.png" class="menu_icon"></span>
            <span>Banner Footer</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='banner_home_footer')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='banner_home_footer' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/banner_home_footer/index">View</a></li>
        </ul>
    </li>
 <li class="<?php echo ($this->uri->segment(1)==='newsleter_subscription_management')?'active':''; ?>" style="<?php echo $style27; ?>">
        <?php
        if($this->uri->segment(1)==='newsleter_subscription_management')
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
            <span><img src="<?php  echo base_url(); ?>images/news.png" class="menu_icon"></span>
            <span>News letter</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='newsleter_subscription_management')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='newsleter_subscription_management' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/newsleter_subscription_management/index">View</a></li>
        </ul>
    </li>
 <li class="<?php echo ($this->uri->segment(1)==='order')?'active':''; ?>" style="<?php echo $style28; ?>">
        <?php
        if($this->uri->segment(1)==='order')
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
            <span><img src="<?php  echo base_url(); ?>images/order.png" class="menu_icon"></span>
            <span>Order Management</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='order')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='order' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/order/index">View</a></li>
        </ul>
    </li>
<li class="<?php echo ($this->uri->segment(1)==='wishlist')?'active':''; ?>" style="<?php echo $style29; ?>">
        <?php
        if($this->uri->segment(1)==='wishlist')
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
            <span><img src="<?php  echo base_url(); ?>images/present-1-128.png" class="menu_icon"></span>
            <span>Wishlist Management</span>
        </a>
        <ul class="submenu"<?php  echo ($this->uri->segment(1)==='wishlist')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='wishlist' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/wishlist/index">View</a></li>
        </ul>
    </li>
    

</ul>