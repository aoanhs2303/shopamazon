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
        Thêm mới danh mục sản phẩm
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
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Nhập danh mục sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Danh mục</b></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="tendanhmuc" placeholder="Nhập tên danh mục mới" id="danhmuctin">
                  <div class="form-control-feedback validateDM" style="display: none">
                    <small style="color: orangered">Không được để trống mục này.</small>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Nhóm danh mục</b></label>
                <div class="col-sm-10">
                  <select class="form-control" id="nhomdanhmuc" name="nhomdanhmuc">
                      <option value="#">---Chọn danh mục---</option>
                      <option value="1">Ván Ép</option>
                      <option value="2">Tấm lót sàn</option>
                      <option value="#">Khác</option>
                  </select> 
                </div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right nutajax">Thêm</button>
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
    console.log($('#danhmuctin').val());
    $.ajax({
      url: 'themdanhmuc',
      type: 'POST',
      dataType: 'json',
      data: {
        tendanhmuc: $('#danhmuctin').val(),
        nhomdanhmuc: $('#nhomdanhmuc').val()
      },
    })
    .always(function(res) {
      if($('#danhmuctin').val() == "") {
        document.querySelector('.validateDM').style.display = 'block';
        return;
      }
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      if(dd<10){
          dd='0'+dd;
      } 
      if(mm<10){
          mm='0'+mm;
      }
      var today = dd+'/'+mm+'/'+yyyy;
      var noidung = `
                <tr class="dm-`+res+`">
                  <td class="stt"><span class="badge bg-red">NEW</span></td>
                  <td class="ten">`+$('#danhmuctin').val()+`</td>
                  <td>10</td>
                  <td>`+$('#nhomdanhmuc').val()+`</td>
                  <td>`+today+`</td>
                  <td>
                    <a href="" class="btn btn-warning suaajax" data-toggle="modal" data-target="#suadanhmuc-`+res+`"><i class="fa fa-pencil"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="suadanhmuc-`+res+`" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin danh mục</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" class="DMID" value="`+res+`">
                            <input type="text" class="form-control DMT" value="`+$('#danhmuctin').val()+`">
                            <br>
                            <select class="form-control DMN" name="nhomdm">
                                <option value="#">---Chọn danh mục---</option>
                                <option value="1">Ván Ép</option>
                                <option value="2">Tấm lót sàn</option>
                                <option value="#">Khác</option>
                            </select> 
                          </div>
                          <div class="modal-footer">
                            <a href="`+res+`" type="button" class="btn btn-info pull-right luuajax">Lưu thay đổi</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModalDel-`+res+`"><i class="fa fa-times"></i></a>
                    <div class="modal fade" id="myModalDel-`+res+`">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h5>Bạn có muốn xóa: `+$('#danhmuctin').val()+`</h5>
                          </div>
                          <div class="modal-footer">
                            <a href="`+res+`" type="button" class="btn btn-danger pull-right xoaajax">Xóa</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>  `;




      $('table.danhsach tbody').append(noidung);
      $('#danhmuctin').val("");

      var thongbao = `<div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle"></i> Thêm thành công. 
      </div>`
      $('.thongbao').append(thongbao);
      event.preventDefault();
    });
    
  })
</script>

<script>
  $('body').on('click', '.xoaajax', function(event) {
    var btnX = $(this).parent().prev().prev().children('button');    
    var idxoa = this.getAttribute('href');

    $.ajax({
      url: 'xoadanhmuc',
      type: 'POST',
      dataType: 'json',
      data: {idxoa: idxoa},
    })
    .always(function() {
      $('tr.dm-' + idxoa).css("display", "none");
    });
      var thongbao = `<div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle"></i> Xóa thành công. 
      </div>`
      $('.thongbao').append(thongbao);



    btnX.click();
    event.preventDefault();
  });
</script>


<script>
  $('body').on('click', '.luuajax', function(event) {
    var btnX = $(this).parent().prev().prev().children('button');
    var iddm = $(this).parent().prev().children('input.DMID').val();
    var ten = $(this).parent().prev().children('input.DMT').val();
    var nhom = $(this).parent().prev().children('select.DMN').val();

    $.ajax({
      url: 'suadanhmuc',
      type: 'POST',
      dataType: 'json',
      data: {
        iddm: iddm,
        tendm: ten,
        nhomdm: nhom
      },
    })
    .always(function() {
      var danhmucSTT = document.querySelector('.dm-' + iddm + ' td.stt').innerHTML = `<span class="badge bg-warning">UPDATED</span>`;
      var danhmucNAME = document.querySelector('.dm-' + iddm + ' td.ten').innerHTML = ten; 
      var danhmucNHOM = document.querySelector('.dm-' + iddm + ' td.nhom').innerHTML = nhom;
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

