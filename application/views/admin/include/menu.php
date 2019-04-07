 <?php 
  $uri = $_SERVER['REQUEST_URI'];
  $uri = explode('/', $uri);
  $uri = end($uri);
 ?>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
          <img src="<?php echo base_url(); ?>includeadmin/images/user2-160x160.jpg" class="rounded" alt="User Image">
        </div>
        <div class="info float-left">
          <p>Quản lý Web</p>
          <a href="index.html#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      <!-- search form -->
      <form action="index.html#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php if($uri == 'Admin') { ?>
        <li class="active">
        <?php } else { ?>
        <li>
        <?php }?>
          <a href="<?php echo base_url() ?>Admin">
            <i class="fa fa-dashboard"></i> <span>Tổng Quan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <?php if($uri == 'danhmuc' || $uri == 'sanpham' || $uri == 'dichvu' || $uri == 'baiviet') { ?>
        <li class="treeview active">
        <?php } else { ?>
        <li class="treeview">
        <?php }?>
          <a>
            <i class="fa fa-files-o"></i>
            <span>Catalog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <?php if($uri == 'danhmuc') { ?>
            <li class="active"><a href="<?php echo base_url() ?>Admin/danhmuc"><i class="fa fa-circle-o"></i> Danh mục</a></li>
            <?php } else { ?>
            <li><a href="<?php echo base_url() ?>Admin/danhmuc"><i class="fa fa-circle-o"></i> Danh mục</a></li>
            <?php }?>

            <?php if($uri == 'sanpham') { ?>
            <li class="active"><a href="<?php echo base_url() ?>Admin/sanpham"><i class="fa fa-circle-o"></i> Sản phẩm</a></li>
            <?php } else { ?>
            <li><a href="<?php echo base_url() ?>Admin/sanpham"><i class="fa fa-circle-o"></i> Sản phẩm</a></li>
            <?php }?>

            <?php if($uri == 'dichvu') { ?>
            <li class="active"><a href="<?php echo base_url() ?>Admin/dichvu"><i class="fa fa-circle-o"></i> Dịch vụ</a></li>
            <?php } else { ?>
            <li><a href="<?php echo base_url() ?>Admin/dichvu"><i class="fa fa-circle-o"></i> Dịch vụ</a></li>
            <?php }?>            
            
            <?php if($uri == 'baiviet') { ?>
            <li class="active"><a href="<?php echo base_url() ?>Admin/baiviet"><i class="fa fa-circle-o"></i> Bài viết</a></li>
            <?php } else { ?>
            <li><a href="<?php echo base_url() ?>Admin/baiviet"><i class="fa fa-circle-o"></i> Bài viết</a></li>
            <?php }?>             
            
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-th"></i>
            <span>Thông tin cửa hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>Admin/thongtin"><i class="fa fa-circle-o"></i> Thông tin chung</a></li>
            <li><a href="<?php echo base_url() ?>Admin/contact"><i class="fa fa-circle-o"></i> SĐT, Email, Địa chỉ</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="index.html#">
            <i class="fa fa-pie-chart"></i>
            <span>Marketing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>Admin/donhang"><i class="fa fa-circle-o"></i> Đơn hàng</a></li>
            <li><a href="<?php echo base_url() ?>Admin/slideanh"><i class="fa fa-circle-o"></i> Ảnh slide</a></li>
            <li><a href="<?php echo base_url() ?>Admin/banner"><i class="fa fa-circle-o"></i> Ảnh banner</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets/calendar.html">
            <i class="fa fa-calendar"></i> <span>Khách Hàng</span>
          </a>
        </li>
        <li class="treeview">
          <a href="index.html#">
            <i class="fa fa-laptop"></i>
            <span>Tạo báo cáo</span>
          </a>
        </li>
        <li class="treeview">
          <a href="index.html#">
            <i class="fa fa-edit"></i> <span>Hệ thống</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer">
    <!-- item-->
    <a href="index.html" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
    <!-- item-->
    <a href="index.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
    <!-- item-->
    <a href="<?php echo base_url() ?>login/logout" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
  </div>
  </aside>