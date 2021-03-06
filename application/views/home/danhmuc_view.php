<?php require_once('include/vn_to_str.php') ?>
<!-- ============================================== HEADER : END ============================================== -->

<div class="body-content outer-top-xs" ng-controller="CategoryCtrl">
  <div class='container'>
    <div class='row'>
      <?php echo $sidebar ?>
      <!-- /.sidebar -->
      <div class='col-md-9'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            <?php foreach ($slideanh as $value) { ?>
            <a href="<?php echo $value['link'] ?>">
              <div class="item" style="background-image: url(<?php echo $value['image'] ?>);">
              </div>
            </a>
            <?php } ?>
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-12 col-md-8">
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sắp xếp: </span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Độ phổ biến <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">Độ phổ biến</a></li>
                        <li role="presentation"><a href="#">Giá:Từ thấp đến cao</a></li>
                        <li role="presentation"><a href="#">Giá:Từ cao đến thấp</a></li>
                        <li role="presentation"><a href="#">Tên:Từ A - Z</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-3 col-md-4 no-padding">

              </div>
              <!-- /.col --> 
            </div>
            <!-- /.col -->
<!--             <div class="col col-sm-6 col-md-4 text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>

              </div>
            </div> -->
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">

                <div ng-repeat="product in listProduct" class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn"><img src="https://via.placeholder.com/500" alt="{{product.name}}"></a> </div>
                          <!-- /.image -->
                          <div class="tag sale"><span>Hot</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn">{{product.name}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price text-danger"><b>${{product.price}}</b></div>
                          
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="btn-group">
                            <button ng-click="addToCart(product)"
                              class="add_cart btn btn-warning" 
                              style="background-color: #fdd922; color: #444;"
                              data-productid="{{product.id}}"
                              data-productname="{{product.name}}"
                              data-price="{{product.price}}"
                              data-productimg="https://via.placeholder.com/500"
                              data-quantity="1"
                              data-size="0"
                              >
                              Thêm <i class="fa fa-shopping-cart"></i>
                            </button>
                            <a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product -->  
                    </div>
                    <!-- /.products --> 
                  </div>


                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
          </div>
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
 </div>
  <!-- /.container --> 
  
</div>

<script>
  $(document).ready(function() {

    $('#show_cart').load("<?php echo base_url(); ?>cart/load");

    $(document).on('click', '.delete_cart', function(){
      var row_id = $(this).attr("id");
      $.ajax({
        url:"<?php echo base_url(); ?>cart/remove",
        method:"POST",
        data:{row_id:row_id},
        success:function(data)
        {
          $('#show_cart').html(data);
        }
      });
    });
  });


  app.controller('CategoryCtrl',  function($scope, $http, $rootScope){
    $scope.appDomain = "http://localhost/luanvan/";
    var loc_array = window.location.pathname.split("/");
    var uri = loc_array[loc_array.length - 1].split("-");
    var category_id = uri[uri.length - 1].split(".")[0]
    $http({
      url: $scope.appDomain + 'api/getSliceProductByCategory', 
      method: "GET",
      params: {category_id: category_id}
    }).then(function(res){
      $scope.listProduct = res.data
    }, function(res){});
    $scope.addToCart = function(product) {
      var data = $.param({
        product_id: product.id,
        product_name: product.name,
        product_price: product.price,
        product_quantity: 1,
        product_img: "https://via.placeholder.com/500",
        product_size: "1m"
      })
      var config = {headers: {'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'}}
      $http.post($scope.appDomain + 'cart/add',data,config)
      .then(function(res) {
        $('#show_cart').html(res.data);
      }, function(err){})
    }   
    
    $scope.to_slug = function(str) {
        // Chuyển hết sang chữ thường
        str = str.toLowerCase();     
        // xóa dấu
        str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
        str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
        str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
        str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
        str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
        str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
        str = str.replace(/(đ)/g, 'd');
        str = str.replace(/([^0-9a-z-\s])/g, '');
        str = str.replace(/(\s+)/g, '-');
        str = str.replace(/^-+/g, '');
        str = str.replace(/-+$/g, '');
        return str;
    }

  })

</script>