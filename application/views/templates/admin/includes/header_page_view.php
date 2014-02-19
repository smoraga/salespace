<?php
$page = "/salespace/admin/dashboard";
$current_page = $_SERVER['REQUEST_URI'];
if($page === $current_page):
    
else:
?>
<div>
    <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
    </div>
   
    <!--logo start-->
    <a href="index.html" class="logo">Flat<span>lab</span></a>
    <!--logo end-->
    
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <?php $auth_user = $this->session->userdata('authenticated_user'); ?>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="<?php echo base_url('assets/admin/img/avatar1_small.jpg')?>">
                    <span class="username"><?php echo $auth_user['username']; ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="<?php echo base_url('admin/accounts/view')?>"><i class=" icon-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                    <li><a href="<?php echo base_url('admin/dashboard/logout')?>"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</div>
<?php endif?>