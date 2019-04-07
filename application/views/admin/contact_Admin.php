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
        SỐ ĐIỆN THOẠI, EMAIL, ĐỊA CHỈ
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="general.html#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="general.html#">Forms</a></li>
        <li class="breadcrumb-item active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="thongbao"></div>
      
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Số điện thoại</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-responsive danhsach">
                <tr class="table-success">
                  <th>#</th>
                  <th>Số điện thoại</th>
                  <th class="pull-right">Chỉnh sửa</th>
                </tr>
                <?php $count = 0; foreach ($all_sdt as $sdt) { $count ++;?>
                 <tr class="sdt-<?php echo $sdt['id'] ?>">
                  <td class="stt"><?php echo $count; ?>.</td>
                  <td class="v_sdt"><?php echo $sdt['value'] ?></td>
                  <td align="right">
                    <a href="" class="btn btn-warning suaajax" data-toggle="modal" data-target="#suasdt-<?php echo $sdt['id'] ?>"><i class="fa fa-pencil"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="suasdt-<?php echo $sdt['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa số điện thoại</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" class="DMID" value="<?php echo $sdt['id'] ?>">
                            <input type="text" class="form-control DMT" value="<?php echo $sdt['value'] ?>">
                          </div>
                          <div class="modal-footer">
                            <a href="" type="button" class="btn btn-info pull-right luusdt">Lưu thay đổi</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr> 
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->            
          </div>
          <div class="col-sm-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Email và Địa chỉ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-responsive danhsach">
                <tr class="table-warning">
                  <th>#</th>
                  <th>Email</th>
                  <th class="pull-right">Chỉnh sửa</th>
                </tr>
                <?php $count = 0; foreach ($email as $value) { $count ++;?>
                 <tr class="email-<?php echo $value['id']; ?>">
                  <td class="stt"><?php echo $count; ?>.</td>
                  <td class="ten"><?php echo $value['value'] ?></td>
                  <td align="right">
                    <a href="" class="btn btn-warning suaajax" data-toggle="modal" data-target="#suaemail-<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i></a>
                    <!-- Modal -->
                    <div align="left" class="modal fade" id="suaemail-<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa địa chỉ Email</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" class="DMID" value="<?php echo $value['id']; ?>">
                            <input type="text" class="form-control DMT" value="<?php echo $value['value']; ?>">
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo $value['id']; ?>" type="button" class="btn btn-info pull-right luuajax">Lưu thay đổi</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <?php } ?>
                <tr class="table-info">
                  <th>#</th>
                  <th>Địa chỉ</th>
                  <th width="30%">Chỉnh sửa</th>
                </tr>
                <?php $count = 0; foreach ($address as $value) { $count ++;?>
                 <tr class="address-<?php echo $value['id']; ?>">
                  <td class="stt"><?php echo $count; ?>.</td>
                  <td class="ten"><?php echo $value['value'] ?></td>
                  <td align="right">
                    <a href="" class="btn btn-warning suaajax" data-toggle="modal" data-target="#suadanhmuc-<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="suadanhmuc-<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa địa chỉ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" class="DMID" value="<?php echo $value['id']; ?>">
                            <input type="text" class="form-control DMT" value="<?php echo $value['value']; ?>">
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo $value['id']; ?>" type="button" class="btn btn-info pull-right luudiachi">Lưu thay đổi</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <?php } ?>
              </table>

            

            </div>
            <!-- /.box-body -->
          </div>
          </div>
        </div>
      </div>


<script src="<?php echo base_url(); ?>includeadmin/assets/vendor_components/jquery/dist/jquery.js"></script>

<script>
  $('body').on('click', '.luuajax', function(event) {
    var btnX = $(this).parent().prev().prev().children('button');
    var id = $(this).parent().prev().children('input.DMID').val();
    var email = $(this).parent().prev().children('input.DMT').val();

    $.ajax({
      url: 'suacontact_email',
      type: 'POST',
      dataType: 'json',
      data: {
        id: id,
        email: email,
      },
    })
    .always(function() {
      var danhmucSTT = document.querySelector('.email-' + id + ' td.stt').innerHTML = `<span class="badge bg-warning">UPDATED</span>`;
      var danhmucNAME = document.querySelector('.email-' + id + ' td.ten').innerHTML = email; 

    });
    var thongbao = `<div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle"></i> Cập nhật thành công. 
      </div>`
    $('.thongbao').append(thongbao);
    btnX.click(); // Cái này mới
    event.preventDefault();
  });

  $('body').on('click', '.luudiachi', function(event) {
    var btnX = $(this).parent().prev().prev().children('button');
    var id = $(this).parent().prev().children('input.DMID').val();
    var address = $(this).parent().prev().children('input.DMT').val();

    $.ajax({
      url: 'suacontact_address',
      type: 'POST',
      dataType: 'json',
      data: {
        id: id,
        address: address,
      },
    })
    .always(function() {
      var danhmucSTT = document.querySelector('.address-' + id + ' td.stt').innerHTML = `<span class="badge bg-warning">UPDATED</span>`;
      var danhmucNAME = document.querySelector('.address-' + id + ' td.ten').innerHTML = address; 

    });
    var thongbao = `<div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle"></i> Cập nhật thành công. 
      </div>`
    $('.thongbao').append(thongbao);
    btnX.click(); // Cái này mới
    event.preventDefault();
  });

  $('body').on('click', '.luusdt', function(event) {
    var btnX = $(this).parent().prev().prev().children('button');
    var id = $(this).parent().prev().children('input.DMID').val();
    var sdt = $(this).parent().prev().children('input.DMT').val();
    console.log(id);
    console.log(sdt);

    $.ajax({
      url: 'suacontact_sdt',
      type: 'POST',
      dataType: 'json',
      data: {
        id: id,
        sdt: sdt,
      },
    })
    .always(function() {
      var danhmucSTT = document.querySelector('.sdt-' + id + ' td.stt').innerHTML = `<span class="badge bg-warning">UPDATED</span>`;
      var danhmucNAME = document.querySelector('.sdt-' + id + ' td.v_sdt').innerHTML = sdt; 

    });
    var thongbao = `<div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle"></i> Cập nhật thành công. 
      </div>`
    $('.thongbao').append(thongbao);
    btnX.click(); // Cái này mới
    event.preventDefault();
  });


</script>

  </section>
</div>

