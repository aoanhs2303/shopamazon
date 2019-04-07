
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
        BÀI VIẾT
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
    <form action="thembaiviet" method="post" enctype="multipart/form-data">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tổng quan</h3>
          <button type="submit" class="btn btn-warning btn-lg pull-right nutajax" style="font-size: 20px"><i class="fa fa-plus-square"></i> Thêm</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Tên bài viết</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="tenbaiviet" placeholder="Nhập tên bài viết">
                  <div class="form-control-feedback validateDM" style="display: none">
                    <small style="color: orangered">Không được để trống mục này.</small>
                  </div>
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
                  <input class="form-control" type="text" name="tomtatbaiviet" placeholder="Nhập tóm tắt của bài viết">
                </div>
              </div>        
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Nội dung</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <textarea name="noidungbaiviet" id="addnoidung">
                      Nội dung bài viết.
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

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Danh sách bài viết</h3>

      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-responsive danhsach">
          <tr>
            <th>#</th>
            <th>Tên bài viết</th>
            <th>Hình ảnh</th>
            <th width="30%">Nội dung</th>
            <th>Ngày tạo</th>
            <th width="9%">Hành động</th>
          </tr>
          <?php $count = 0; foreach ($baiviet as $value) { $count++; ?>
           <tr class="baiviet-<?php echo $value['id']; ?>">
              <td class="stt"><?php echo $count; ?>.</td>
              <th><?php echo $value['name'] ?></th>
              <td><img src="<?php echo $value['image'] ?>" alt="<?php echo $value['image'] ?>" style="width: 100px; height: 80px"></td>
              <td><?php echo $value['summary'] ?></td>
              <td><?php echo date('d/m/Y', $value['datetime']) ?></td>
              <td>
                <a href="<?php echo base_url(); ?>Admin/suabaiviet/<?php echo $value['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                <a href="" class="btn btn-danger xoaajax" data-toggle="modal" data-target="#myModalDel-<?php echo $value['id']; ?>"><i class="fa fa-times"></i></a>
                  <div class="modal fade" id="myModalDel-<?php echo $value['id']; ?>">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xóa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h5>Bạn có muốn xóa bài viết: <?php echo $value['name'] ?></h5>
                        <img src="<?php echo $value['image'] ?>" alt="" style="height: 150px">
                      </div>
                      <div class="modal-footer">
                        <a href="<?php echo $value['id']; ?>" type="button" class="btn btn-danger pull-right xoaajax">Xóa</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>            
          <?php } ?>
            
        </table>
      </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->

  <script src="<?php echo base_url(); ?>includeadmin/assets/vendor_components/jquery/dist/jquery.js"></script>
  <script>
    $('body').on('click', '.xoaajax', function(event) {
      var btnX = $(this).parent().prev().prev().children('button');    
      var idxoa = this.getAttribute('href');

      $.ajax({
        url: 'xoabaiviet',
        type: 'POST',
        dataType: 'json',
        data: {idxoa: idxoa},
      })
      .always(function() {
        $('tr.baiviet-' + idxoa).css("display", "none");
      });
        var thongbao = `<div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle"></i> Xóa thành công. 
        </div>`
        $('.thongbao').append(thongbao);



      btnX.click();
      event.preventDefault();
    });
  </script>
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