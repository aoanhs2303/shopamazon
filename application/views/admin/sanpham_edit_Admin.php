<?php
    if (isset($_FILES['attachments'])) {
        $msg = "";
        $targetFile = "files/sanpham/" . basename($_FILES['attachments']['name'][0]);
        if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile))
            $msg = array("status" => 1, "msg" => "File Has Been Uploaded", "path" => $targetFile);
        exit(json_encode($msg));
    }
?>
<style>
  p.xa {
    position: relative;
  }
  span.xoaxa {
    position: absolute;
    top: 0px;
    right: 10px;
  }
  span.xoaxa:hover {
    cursor: pointer;
    background-color: orangered;
  }
</style>
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
<div class="content-wrapper" id="app">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SỬA SẢN PHẨM
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="general.html#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="general.html#">Forms</a></li>
        <li class="breadcrumb-item active">General Elements</li>
      </ol>
    </section>

    <div class="thongbao"></div>
    <!-- Main content -->
    <section class="content">
    <form action="<?php echo base_url(); ?>Admin/do_suasanpham" method="post" enctype="multipart/form-data">
      <?php foreach ($sanpham as $value) { ?>
      <input type="hidden" name="idsanpham" value="<?php echo $value['id']; ?>">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tổng quan</h3>
          <button type="submit" class="btn btn-sm btn-warning pull-right addsp" style="font-size: 20px"><b>Lưu</b> <i class="fa fa-save"></i>
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Tên sản phẩm</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="tensanpham" placeholder="Nhập tên sản phẩm" id="danhmuctin" value="<?php echo $value['name'] ?>">
                  <div class="form-control-feedback validateDM" style="display: none">
                    <small style="color: orangered">Không được để trống mục này.</small>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Danh mục sản phẩm</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <select class="form-control" id="addDanhMuc" name="danhmucsanpham">
                      <option value="0">---Chọn danh mục---</option>
                      <?php foreach ($danhmuc as $dm) { 
                        if($value['category'] == $dm['name']) { ?>
                          <option selected value="<?php echo $dm['name'] ?>"><?php echo $dm['name'] ?></option>
                      <?php} else {
                      ?>
                        <option value="<?php echo $dm['name'] ?>"><?php echo $dm['name'] ?></option>
                      <?php } } ?>
                  </select> 
                </div>
              </div>
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Mô tả sản phẩm</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <textarea name="noidungsanpham" id="addnoidung">
                       <?php echo $value['content'] ?>
                  </textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Từ khóa tìm kiếm</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="tukhoasanpham" placeholder="Nhập từ khóa" id="danhmuctin" value="<?php echo $value['keyword'] ?>">
                  <div class="form-control-feedback validateDM" style="display: none">
                    <small style="color: orangered">Không được để trống mục này.</small>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Dữ liệu sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Giá</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="giasanpham" placeholder="Ví dụ: 350.000 ₫" id="danhmuctin" value="<?php echo $value['price'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Số lượng</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="soluongsanpham" placeholder="Ví dụ: 21" id="danhmuctin" value="<?php echo $value['quantity'] ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Kích thước</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="kichthuocsanpham" placeholder="Ví dụ: 200 x 300 m" id="danhmuctin" value="<?php echo $value['size'] ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Bề dày</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="bedaysanpham" placeholder="Ví dụ: 30mm" id="danhmuctin" value="<?php echo $value['thick'] ?>">
                </div>
              </div>


              <div class="form-group row">
                <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Trạng thái</b> <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input @click="checked = !checked" type="checkbox" id="trangthai" name="trangthaisanpham" class="filled-in" checked/>
                  <label for="trangthai">
                    <span v-if="checked">Còn hàng</span>
                    <span v-else>Hết hàng</span>
                  <label>
                </div>
              </div>

              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        <!-- /.box-body -->
      </div>
      
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Hình ảnh</h3>
          <button type="submit" class="btn btn-sm btn-warning pull-right addsp" style="font-size: 20px"><b>Lưu</b> <i class="fa fa-save"></i>
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group row">
              <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Hình ảnh</b> <span class="text-danger">*</span></label>
              <div id="col-sm-10">
                <input type="file" id="fileupload" name="attachments[]" multiple>
              </div>
            </div>   
            <div class="form-group row">
              <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Xem hình</b></label>
                       
              <?php 
                $img = json_decode($value['image']); 
              ?>
              <div class="col-sm-10" id="files">
                <?php for ($i=0; $i < count($img); $i++) { ?>
                  <p class="pull-left xa" style="padding-right: 10px">
                    <span class="badge-danger xoaxa"><i class="fa fa-times" style="padding: 5px"></i></span>
                    <img class="img-fluid xemanh" style="height: 100px" src="<?php echo $img[$i] ?>" />
                    <input type="hidden" value="<?php echo $img[$i] ?>" name="anhsanpham[]">
                  </p>
                <?php } ?>
              </div>   
            </div> 
            <h3 class="text-danger text-center" id="error"></h3><br><br>
            <div class="form-group row">
              <label for="danhmuctin" class="col-sm-2 col-form-label"><b>Hình ảnh xóa</b> <span class="text-danger">*</span></label>
              <div class="col-sm-10" id="themanhxoa">
                
              </div>
            </div>               
        </div>
      </div>
      <?php } ?>


      </form>

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
      url: 'xoasanpham',
      type: 'POST',
      dataType: 'json',
      data: {idxoa: idxoa},
    })
    .always(function() {
      $row = document.querySelector('.sanpham-' + idxoa).remove();
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
<script src="<?php echo base_url(); ?>includeadmin/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>includeadmin/js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>includeadmin/js/jquery.fileupload.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function () {
         var files = $("#files");
         var images = [];
         $("#fileupload").fileupload({
             url: 'sanpham',
             dataType: 'json',
             autoUpload: false
         }).on('fileuploadadd', function (e, data) {
             var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
             var fileName = data.originalFiles[0]['name'];
             var fileSize = data.originalFiles[0]['size'];

             if (!fileTypeAllowed.test(fileName))
                  $("#error").html('Only images are allowed!');
             else if (fileSize > 5000000)
                 $("#error").html('Your file is too big! Max allowed size is: 500KB');
             else {
                 $("#error").html("");
                 data.submit();
             }
         }).on('fileuploaddone', function(e, data) {
              var status = data.jqXHR.responseJSON.status;
              var msg = data.jqXHR.responseJSON.msg;

              if (status == 1) {
                  var path = `<?php echo base_url(); ?>` + data.jqXHR.responseJSON.path;
                  $("#files").fadeIn().append('<p class="pull-left" style="padding-right: 10px"><img style="width: 100px; height: 100px;" src="'+path+'" /></p>');
                  $("#files").fadeIn().append('<input type="hidden" name="anhsanpham[]" value="'+path+'">');
              } else
                  $("#error").html(msg);
         })
      });
  </script>
<script>
  $('body').on('click', 'span.xoaxa', function(event) {
    var anh = $(this).next().attr('src');
    $('#themanhxoa').fadeIn().append('<input type="text" name="anhxoa[]" value="'+anh+'">');
    console.log($('#themanhxoa'));
    $(this).parent().remove();
    event.preventDefault();
  });
</script>

<script>
  new Vue({
    el: "#app",
    data: {
      addSanpham: true,
      addStep: 1,
      widthProgess: 33.33,
      checked: true
    },
    methods: {
      nextStep() {
        this.addStep++;
        this.widthProgess += 33.33;
      },
      prevStep() {
        this.addStep--,
        this.widthProgess -= 33.33
      }
    }
  })
</script>