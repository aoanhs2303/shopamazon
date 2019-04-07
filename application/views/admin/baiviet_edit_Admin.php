
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css">
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

  <!-- Left side column. contains the logo and sidebar -->
  <?php echo $menu; ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        SỬA BÀI VIẾT
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="general.html#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="general.html#">Forms</a></li>
        <li class="breadcrumb-item active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="thongbao">
          
     </div>

    <!-- /****sẽ chia ra 3 phần học vue js sẽ làm***/ -->
    <?php foreach ($baiviet as $value) { ?>
    <form action="<?php echo base_url() ?>Admin/do_suabaiviet" method="post" enctype="multipart/form-data">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tổng quan</h3>
          <button type="submit" class="btn btn-warning btn-lg pull-right nutajax" style="font-size: 20px"><i class="fa fa-save"></i> Lưu</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Tên bài viết</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="tenbaiviet" value="<?php echo $value['name'] ?>">
                  <div class="form-control-feedback validateDM" style="display: none">
                    <small style="color: orangered">Không được để trống mục này.</small>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Hình ảnh củ</b></label>
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" name="idbaiviet" value="<?php echo $value['id'] ?>">
                  <input type="hidden" class="form-control" name="hinhcubaiviet" value="<?php echo $value['image'] ?>">
                  <img src="<?php echo $value['image'] ?>" alt="<?php echo $value['image'] ?>" style="height: 150px">
                </div>
              </div> 
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Hình ảnh</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="hinhbaiviet">
                </div>
              </div>      
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Tóm tắt</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="tomtatbaiviet" value="<?php echo $value['summary'] ?>">
                </div>
              </div>        
              <div class="form-group row">
                <label for="addnoidung" class="col-sm-2 col-form-label"><b>Mô tả bài viết</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <textarea name="noidungbaiviet" id="addnoidung">
                      <?php echo $value['content'] ?>
                  </textarea>
                </div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
    </form>
    <?php } ?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  <script src="<?php echo base_url(); ?>includeadmin/assets/vendor_components/jquery/dist/jquery.js"></script>
  <script src="<?php echo base_url(); ?>includeadmin/js/summernote.js"></script>
  <script>
    $(document).ready(function() {
      $('#addnoidung').summernote({
        height: 200,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true,                  // set focus to editable area after initializing summernote
        popover: {
           image: [],
           link: [],
           air: []
        }
      });      
    });

  </script>