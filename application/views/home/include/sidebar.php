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
                    <li ng-repeat="subcategory in category_value"><a href="<?php echo base_url() ?>/home/danhmuc/{{subcategory.category_id}}">{{subcategory.product_subcategory}}</a></li>
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
            <?php foreach ($side_hot as $sh) { ?>
            <div class="product">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <?php $img = json_decode($sh['image'])[0] ?>
                      <div class="image"> <a href="<?php echo base_url() . vn_to_str($sh['name']) .'-'. $sh['id']?>.chn"> <img src="<?php echo $img ?>" alt="<?php echo $img ?>"> </a> </div>
                      <!-- /.image --> 
                      
                    </div>
                    <!-- /.product-image --> 
                  </div>
                  <!-- /.col -->
                  <div class="col col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="<?php echo base_url() . vn_to_str($sh['name']) .'-'. $sh['id']?>.chn"><?php echo $sh['name'] ?></a></h3>
                      <div class="rating rateit-small"></div>
                      <!-- <div class="product-price"> <span class="price"> <?php echo number_format($sh['price']) ?> ₫  </span> </div> -->
                      <div class="product-price text-danger"><b>Giá Liên hệ</b></div>
                      <!-- /.product-price --> 
                      
                    </div>
                  </div>
                  <!-- /.col --> 
                </div>
                <!-- /.product-micro-row --> 
              </div>
              <!-- /.product-micro --> 
              
            </div>
            <?php } ?>

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
    // product_department
    var department = groupBy(res.data, "product_department");
    for(var propt in department){
      department[propt] = groupBy(department[propt], "product_category");
    }
    console.log("sidebar")
    $scope.categories = department;
	}, function(res){})
})

</script>