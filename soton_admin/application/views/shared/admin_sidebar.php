<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="<?php echo base_url(); ?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $name; ?></h5>
<?php
	if ($level >= 1) {
?>
                  <li class="mt">
                      <a class="active" href="<?php echo site_url('home/index'); ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
<?php
	}
	if ($level >= 1) {
?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-edit"></i>
                          <span>Articles</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo site_url('article/addarticle'); ?>">Add new article</a></li>
                          <li><a  href="<?php echo site_url('article/managearticle'); ?>">Manage articles</a></li>
                      </ul>
                  </li>
<?php
	}
	if ($level >= 3) {
?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo site_url('user/adduser'); ?>">Add new user</a></li>
                          <li><a  href="<?php echo site_url('user/manageuser'); ?>">Manage users</a></li>
                      </ul>
                  </li>
<?php
	}
?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->