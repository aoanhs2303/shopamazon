
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
        SLIDE ẢNH CHẠY TRÊN TRANG CHỦ
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="thongbao">
          
     </div>

    <!-- /****sẽ chia ra 3 phần học vue js sẽ làm***/ -->
    <form action="themslideanh" method="post" enctype="multipart/form-data">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tổng quan</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Ảnh</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" name="anhslide">
                  <div class="form-control-feedback validateDM">
                    <small style="color: orangered">Nên chọn ảnh có độ phân giải 848 x 370px.</small>
                  </div>
                </div>
              </div> 
            </div>
            <div class="col-12">
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Đường dẫn</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="linkslide">
                  <div class="form-control-feedback validateDM">
                    <small style="color: orangered">Khi click vào ảnh sẽ truy cập đường dẫn này.</small>
                  </div>
                </div>
              </div> 
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-warning btn-lg pull-right nutajax" style="font-size: 20px  "><i class="fa fa-plus-square"></i> Thêm</button>
        </div>
        <!-- /.box-body -->
      </div>
    </form>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Danh sách slide ảnh</h3>

      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-responsive danhsach">
          <tr>
            <th>#</th>
            <th>Đường dẫn</th>
            <th width="60%">Hình ảnh</th>
            <th>Ngày tạo</th>
            <th width="15%">Hành động</th>
          </tr>
          <?php $count = 0; foreach ($slideanh as $value) { $count++; ?>
           <tr class="dichvu-<?php echo $value['id']; ?>">
              <td class="stt"><?php echo $count; ?>.</td>
              <th><?php echo $value['link'] ?></th>
              <th><img class="img-fluid rounded" src="<?php echo $value['image'] ?>" alt="<?php echo $value['image'] ?>"></th>         
              <td><?php echo date('d/m/Y', $value['datetime']) ?></td>
              <td>
                <a href="<?php echo base_url(); ?>Home/" target="_blank" class="btn btn-primary"><i class="fa fa-angle-double-right"></i></a>
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
                        <h5>Bạn có muốn xóa Slide: 
                          <img src="<?php echo $value['image'] ?>" alt="<?php echo $value['image'] ?>" style="height: 150px;">
                        </h5>
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
        url: 'xoaslideanh',
        type: 'POST',
        dataType: 'json',
        data: {idxoa: idxoa},
      })
      .always(function() {
        $('tr.dichvu-' + idxoa).css("display", "none");
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