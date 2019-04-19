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
        MRAR Tool
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="general.html#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="general.html#">MRAR Tool</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="thongbao">
          
      </div>
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Thiết lập các sản phẩm phù hợp với từng loại khách hàng</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
                <input type="text" style="width: 100px; float:left" class="form-control" name="startIndex" id="startIndex" placeholder="Start">
                <span style="float:left; margin: 8px 10px"> to </span>
                <input type="text" style="width: 100px; float:left" class="form-control" name="endIndex" id="endIndex" placeholder="End">

                <i style="float:left; display: none" id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            </div>
            
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary nutajax">Bắt đầu</button>
          <a href="init_mrar" class="btn btn-danger">Debug</a>
        </div>
      </div>
      <!-- /.box -->
      
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tất cả danh mục sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-responsive danhsach">
                <tr>
                  <th style="width: 10%">#</th>
                  <th style="width: 20%">Tên danh mục</th>
                  <th style="width: 15%">Số sản phẩm</th>
                  <th style="width: 15%">Nhóm sản phẩm</th>
                  <th style="width: 10%">Ngày tạo</th>
                  <th style="width: 15%">Hành động</th>
                </tr>
                <?php $count = 0; foreach ($category as $value) { $count ++;?>
                 <tr class="dm-<?php echo $value['id']; ?>">
                  <td class="stt"><?php echo $count; ?>.</td>
                  <td class="ten"><?php echo $value['name'] ?></td>
                  <td>10</td>
                  <td class="nhom">
                    <?php switch ($value['main']) {
                      case '1':
                        $main = 'Ván Ép';
                        break;
                      case '2':
                        $main = 'Tám lót sàn';
                        break;
                      case 'all_van':
                        $main = '*';
                        break;      
                      case 'all_lot':
                        $main = '*';
                        break;                   
                      default:
                        $main = 'Khác';
                        break;
                    } ?>
                    <?php echo $main ?>
                      
                  </td>
                  <td><?php echo date('d/m/Y', $value['datetime']); ?></td>
                  <td>
                    <a href="" class="btn btn-warning suaajax" data-toggle="modal" data-target="#suadanhmuc-<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="suadanhmuc-<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin danh mục</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" class="DMID" value="<?php echo $value['id']; ?>">
                            <input type="text" class="form-control DMT" value="<?php echo $value['name']; ?>">
                            <br>
                            <select class="form-control DMN" id="nhomdanhmuc" name="nhomdanhmuc">
                                <option value="#">---Chọn danh mục---</option>
                                <option value="1">Ván Ép</option>
                                <option value="2">Tấm lót sàn</option>
                                <option value="#">Khác</option>
                            </select> 
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo $value['id']; ?>" type="button" class="btn btn-info pull-right luuajax">Lưu thay đổi</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModalDel-<?php echo $value['id']; ?>"><i class="fa fa-times"></i></a>

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
                            <h5>Bạn có muốn xóa: <?php echo $value['name'] ?></h5>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

<script src="<?php echo base_url(); ?>includeadmin/assets/vendor_components/jquery/dist/jquery.js"></script>

<script>
  document.querySelector('.nutajax').addEventListener('click', function() {
    console.log("bat dau")
    $("#loading").css("display","")
    $.ajax({
      url: 'init_mrar',
      type: 'GET',
      dataType: 'json',
      data: {
        start: $('#startIndex').val(),
        end: $('#endIndex').val()
      }
    })
    .always(function(res) {
      $("#loading").css("display","none")
    });
    
  })
</script>



  </section>
</div>

