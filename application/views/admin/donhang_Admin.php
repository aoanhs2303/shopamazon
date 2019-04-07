
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
        ĐƠN HÀNG
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="thongbao">
          
     </div>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Danh sách đơn hàng đã đặt</h3>
        <h2 class="pull-right">Tổng cộng: <span class="badge badge-pill badge-primary" style="font-size: 24px;"><?php echo number_format($doanhthu) ?> ₫</span></h2>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-responsive danhsach">
          <tr>
            <th>#</th>
            <th>Tình trạng</th>
            <th>Tên KH</th>
            <th>Email KH</th>
            <th>Sản phẩm</th>
            <th>Ngày đặt</th>
            <th>Tổng</th>
            <th width="15%">Xóa</th>
          </tr>
          <?php $count = 0; foreach ($donhang as $value) { $count++; ?>
           <tr class="dichvu-<?php echo $value['id']; ?>">
              <td class="stt"><?php echo $count; ?>.</td>
              <td>
                <?php if($value['status'] == 'done') { ?>
                <a href=""><span class="label bg-purple">Xong</span></a>
                <?php } else { ?>
                <a href="<?php echo base_url() ?>Admin/chuyenxong/<?php echo $value['id'] ?>"><span class="label bg-yellow">Chưa xử lý</span></a>
                <?php } ?>
              </td>
              <td><?php echo $value['name'] ?></td>  
              <td><?php echo $value['email'] ?></td>
              <td><?php echo $value['product'] ?></td>           
              <td><?php echo date('d/m/Y', $value['datetime']) ?></td>
              <td><?php echo number_format($value['total']) ?></td>
              <td>
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
                        <h5>Bạn có muốn xóa đơn hàng: <?php echo $value['product'] ?></h5>
                        <h4>Ngày đặt: <?php echo date('d/m/Y',$value['datetime']) ?></h4>
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
        url: 'xoadonhang',
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