<?php require_once('vn_to_str.php') ?>

<!-- ============================================== SIDEBAR ============================================== -->
<div class="col-xs-12 col-sm-12 col-md-3 sidebar" ng-controller="SidebarCtrl"> 
  <!-- ================================== TOP NAVIGATION ================================== -->
  <div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Danh mục sản phẩm</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        <li ng-repeat="(department, dep_value) in categories" class="dropdown menu-item"> 
          <a class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon fa fa-cube" aria-hidden="true"></i>{{department}}
          </a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                <div ng-repeat="(category, category_value) in dep_value"  class="col-xs-12 col-sm-12 col-lg-3">
                  <b>{{category}}</b>
                  <ul >
                    {{subcategory.category_id}}
                    <li ng-repeat="subcategory in category_value">
                      <a href="<?php echo base_url() ?>{{to_slug(subcategory.product_subcategory)}}-{{subcategory.category_id}}.html">{{subcategory.product_subcategory}}</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
        </li>
      </ul>




        <!-- <tr ng-repeat="(department, value) in categories">
    <td> {{department}} </td> <td> {{ value }} </td>
  </tr> -->
        
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  
  <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">FACEBOOK</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </div>
    <!-- /.sidebar-widget --> 
  </div>

  <div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Sản phẩm HOT</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
        <div class="item">
          <div class="products special-product">
            <div class="product" ng-repeat="product in bestSellerProduct">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image"> <a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn"> <img src="https://via.placeholder.com/500" alt="{{product.name}}"> </a> </div>
                    </div>
                    <!-- /.product-image --> 
                  </div>
                  <!-- /.col -->
                  <div class="col col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn">{{product.name}}</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="product-price"> <span class="price"> ${{product.price}}  </span> </div>
                    </div>
                  </div>
                  <!-- /.col --> 
                </div>
                <!-- /.product-micro-row --> 
              </div>
              <!-- /.product-micro -->  
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>
  <!-- /.sidebar-widget --> 

  <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
    <h3 class="section-title">Đăng ký</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <p>Để nhận được thông tin sản phẩm và khuyến mãi</p>
      <form>
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail1">Địa chỉ Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập Email của bạn">
        </div>
        <button class="btn btn-primary">Đăng ký</button>
      </form>
    </div>
    <!-- /.sidebar-widget-body --> 

    <table>
  
</table>

  </div>
  <!-- /.sidebar-widget --> 
  <!-- ============================================== NEWSLETTER: END ============================================== --> 
  
  <!-- ============================================== Testimonials============================================== -->

  
</div>
<!-- /.sidemenu-holder --> 
<!-- ============================================== SIDEBAR : END ============================================== --> 

<script>

function groupBy(OurArray, property) {  
    return OurArray.reduce(function (accumulator, object) { 
      // get the value of our object(age in our case) to use for group    the array as the array key   
      const key = object[property]; 
      // if the current value is similar to the key(age) don't accumulate the transformed array and leave it empty  
      if (!accumulator[key]) {      
        accumulator[key] = [];    
      }    
  // add the value to the array
      // delete object[property];
      accumulator[key].push(object);
      // return the transformed array
    return accumulator;  
  // Also we also set the initial value of reduce() to an empty object
    }, {});
  }

var app = angular.module('myApp', [])
app.controller('SidebarCtrl',  function($scope, $http, $rootScope){
  $scope.appDomain = "http://localhost/luanvan/";
  $http.get($scope.appDomain + 'api/getCategory')
	.then(function(res){
    var department = groupBy(res.data, "product_department");
    for(var propt in department){
      department[propt] = groupBy(department[propt], "product_category");
    }
    $scope.categories = department;
  }, function(res){})

  $http({
    url: $scope.appDomain + 'api/getBestSellerProduct', 
    method: "GET",
    params: {offset: 10}
  }).then(function(res){
    $scope.bestSellerProduct = res.data
  }, function(res){});
  
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