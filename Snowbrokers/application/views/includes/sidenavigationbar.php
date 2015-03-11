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
    <li class="<?php echo ($this->uri->segment(1)==='site_settings' || $this->uri->segment(1)==='changepassword')?'active':''; ?>">
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
    <li class="<?php echo ($this->uri->segment(1)==='user')?'active':''; ?>">
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
            <span><img src="<?php echo base_url(); ?>images/user_manage.png" class="menu_icon"></span>
            <span>User Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='user')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='user' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/user/index">View Users</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='user' && $this->uri->segment(2)==='adduser')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/user/adduser">Add New User</a></li>
        </ul>
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='article')?'active':''; ?>">
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
            <span><img src="<?php echo base_url(); ?>assets/img/admin/icons/article_icon.png" class="menu_icon"></span>
            <span>Article Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='article')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='article' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/article/index">View Articles</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='article' && $this->uri->segment(2)==='adduser')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/article/addarticle">Add New Article</a></li>
        </ul>
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='specialist')?'active':''; ?>">
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
            <span><img src="<?php echo base_url(); ?>images/user_manage.png" class="menu_icon"></span>
            <span>Specialist Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='specialist')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='specialist' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/specialist/index">View Specialist</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='specialist' && $this->uri->segment(2)==='addspecialist')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/specialist/addspecialist">Add New Specialist</a></li>
        </ul>
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='specialist_type')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='specialist_type')
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
            <span><img src="<?php echo base_url(); ?>images/user_manage.png" class="menu_icon"></span>
            <span>Specialist Type</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='specialist_type')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='specialist_type' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/specialist_type/index">View Specialist Type</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='specialist_type' && $this->uri->segment(2)==='addspecialist_type')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/specialist_type/addspecialist_type">Add Specialist Type</a></li>
        </ul>
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='doctor_review')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='doctor_review')
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
            <span><img src="<?php echo base_url(); ?>images/user_manage.png" class="menu_icon"></span>
            <span>Specialist's Review</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='doctor_review')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='doctor_review' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/doctor_review/index">View All Reviews</a></li>
        </ul>
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='appointment')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='appointment')
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
            <span><img src="<?php echo base_url(); ?>images/user_manage.png" class="menu_icon"></span>
            <span>Appointment Mnagement</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='appointment')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='appointment' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/appointment/index">View Appointment</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='appointment' && $this->uri->segment(2)==='addappointment')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/appointment/addappointment">Add Appointment</a></li>
        </ul>
    </li>
    <li class="<?php echo ($this->uri->segment(1)==='appointment')?'active':''; ?>">
        <?php
        if($this->uri->segment(1)==='faq')
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
            <span><img src="<?php echo base_url(); ?>images/user_manage.png" class="menu_icon"></span>
            <span>FAQ Management</span>
        </a>
        <ul class="submenu"<?php echo ($this->uri->segment(1)==='faq')?' style="display:block"':''; ?>>
            <li class="<?php echo ($this->uri->segment(1)==='faq' && $this->uri->segment(2)==='index')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/faq/index">View FAQ</a></li>
            <li class="<?php echo ($this->uri->segment(1)==='faq' && $this->uri->segment(2)==='addfaqtype')?'active':''; ?>"><a href="<?php echo base_url(); ?>index.php/faq/addfaqtype">Add FAQ</a></li>
        </ul>
    </li>
</ul>