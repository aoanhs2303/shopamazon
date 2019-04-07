<script src="<?php echo base_url(); ?>includeadmin/assets/vendor_components/jquery/dist/jquery.js"></script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>Admin" class="logo">
      <!-- <span class="logo-lg"><b>Fox</b>Admin</span> -->
      <img src="<?php echo base_url(); ?>includeadmin/images/logo.png" alt="" class="img-fluid" style="height: 50px; margin-top: -3px">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu pr-2">
        <a href="<?php echo base_url() ?>login/logout" class="btn btn-block btn-danger">Đăng xuất</a>
      </div>
    </nav>
  </header>

  <!-- /SIDE/ -->
  <?php echo $menu ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-blue">
            <span class="info-box-icon push-bottom"><i class="ion ion-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Số hóa đơn</span>
              <span class="info-box-number"><?php echo $sodh; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                  <a href="<?php echo base_url() ?>Admin/donhang" style="color: #f1f1f1">Xem chi tiết</a>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-green">
            <span class="info-box-icon push-bottom"><i class="ion ion-cash"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Doanh thu</span>
              <span class="info-box-number" style="font-size: 17px; padding-bottom: 6px"><?php echo number_format($doanhthu) ?> ₫</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                  <a href="<?php echo base_url() ?>Admin/donhang" style="color: #f1f1f1">Xem chi tiết</a>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-purple">
            <span class="info-box-icon push-bottom"><i class="ion ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Số khách</span>
              <span class="info-box-number">Processing</span>

              <div class="progress">
                <div class="progress-bar" style="width: 85%"></div>
              </div>
              <span class="progress-description">
                  <a href="" style="color: #f1f1f1">Xem chi tiết</a>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-red">
            <span class="info-box-icon push-bottom"><i class="ion ion-cube"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Số sản phẩm</span>
              <span class="info-box-number"><?php echo $sosp; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                  <a href="<?php echo base_url()?>Admin/sanpham" style="color: #f1f1f1">Xem chi tiết</a>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
                <div class="col-xl-6">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Đơn đặt hàng chưa xử lý</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-responsive no-margin">
                  <thead>
                  <tr>
                    <th>Tình trạng</th>
                    <th>SĐT KH</th>
                    <th>Email KH</th>
                    <th>Ngày đặt</th>
                    <th>Giá</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($dh_chuaxuly as $value) { ?>
                  <tr>
                    <td><span class="label bg-purple">Mới</span></td>
                    <td><?php echo $value['sdt'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo date('d/m/Y',$value['datetime']) ?></td>
                    <td><span class="label bg-red"><?php echo number_format($value['total']) ?> ₫ </span></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo base_url() ?>Admin/donhang" class="btn btn-sm btn-default pull-right">Xem toàn bộ đơn đặt hàng</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>

     <div class="col-xl-6">
          <!-- PRODUCT LIST -->
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Sản phẩm mới thêm</h3>

          <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul class="products-list product-list-in-box">
          <?php foreach ($sp_moi as $value) { ?>
          <li class="item">
            <div class="product-img">
              <?php 
                $img = json_decode($value['image']);
              ?>
              <img src="<?php echo $img[0]; ?>" alt="Product Image">
            </div>
            <div class="product-info">
            <a href="javascript:void(0)" class="product-title"><?php echo $value['name'] ?>
              <span class="label label-warning pull-right" style="font-size: 16px"><?php echo number_format($value['price']) ?> ₫</span></a>
              <span class="product-description">
                Kích thước: <?php echo $value['size'] ?>. Số lượng: <?php echo $value['quantity'] ?> 
              </span>
            </div>
          </li>
          <?php } ?>

          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="<?php echo base_url() ?>Admin/product" class="uppercase">Xem toàn bộ sản phẩm</a>
        </div>
        <!-- /.box-footer -->
        </div>
     </div>

      </div>

  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

