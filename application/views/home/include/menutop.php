  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active"> <a href="<?php echo base_url() ?>">Home</a> </li>
                <li class="yamm mega-menu"> <a href="<?php echo base_url() ?>gioi-thieu.html">Giới thiệu</a>
                </li>
                <li class="dropdown mega-menu"> 
                  <a>Sản phẩm <span class="menu-label hot-menu hidden-xs">hot</span> </a>  
                </li>
                <li class="dropdown hidden-sm"> <a href="<?php echo base_url() ?>for-you.html">For you<span class="menu-label new-menu hidden-xs">new</span> </a> </li>
                <!-- <li class="dropdown hidden-sm"> <a href="category.html">Tin tức</a> </li> -->
                <li class="dropdown"> <a href="<?php echo base_url(); ?>ban-do.html">Bản đồ</a> </li>
                <li class="dropdown"> <a href="<?php echo base_url(); ?>huong-dan-mua-hang.html">Hướng dẫn mua hàng</a> </li>
               
                
                <style>
                  .dropdown.navbar-right.special-menu.user>a:hover{
                    background-color: #e5ca42!important;}
                  .logout_link a {
                    color: #000!important;
                    text-align: center!important;
                  }
                  .dropdown.navbar-right.special-menu.user>a {
                    font-weight: bold!important;
                    color: #333!important;
                    background-color: #FDD922!important;
                    padding-right: 15px!important;
                    border: 1px solid #333!important;
                    border-radius: 2px!important;
                    margin-left: 15px;
                  }
                </style>
                
               <?php 
                  if (isset($_SESSION['Customer_name']) )
                  { 
                    $nameUser = "<i class=\"icon fa fa-user\"></i> " . $_SESSION['Customer_name']; ?> 
                    <li class="dropdown navbar-right special-menu user"> 
                      <a data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url() . "home/login" ?>"> <?php echo $nameUser; ?></a> 
                        <ul class="dropdown-menu logout_link">
                          <li><a style="padding-left: 0px" href="<?php echo base_url() . "login/logoutUser" ?>">Đăng xuất</a></li> 
                        </ul>
                    </li>
                  <?php } else {
                    $nameUser = "<i class=\"icon fa fa-lock\"></i> Đăng nhập"; ?>
                    <li class="dropdown navbar-right special-menu user"> 
                      <a href="<?php echo base_url() . "home/login" ?>"> <?php echo $nameUser; ?></a> 
                    </li>
                  <?php } ?>
                <li class="dropdown navbar-right special-menu"> <a href="<?php echo base_url() ?>cart">Mua ngay</a> </li>
                
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>