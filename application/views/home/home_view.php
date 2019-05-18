<?php require_once('include/vn_to_str.php') ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu" ng-controller="HomeCtrl">
  <div class="container">
    <div class="row"> 

      <?php echo $sidebar ?>
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
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
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">ĐỒ UỐNG</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li ng-repeat="(depName, dep_value) in drinkFamily">
                <a ng-click="getDepartmentProduct('Drink',depName)">{{depName}}</a>
              </li>
            </ul>
            <!-- /.nav-tabs --> 
          </div>

          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                <div ng-repeat="product in departmentProduct['Drink']" class="col-sm-4 col-md-3 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image" style="height: 180px"> <a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn"><img style="height: 100%;" src="{{imageDomain + product.image}}" alt="{{product.name}}"></a> </div>
                          <div class="tag sale"><span>Hot</span></div>
                        </div>
                        <div class="product-info text-left" style="height: 70px">
                          <h3 class="name"><a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn">{{product.name}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price text-danger"><b>${{product.price}}</b></div>
                        </div>
                        <div class="cart clearfix animate-effect">
                          <div class="btn-group">
                            <button ng-click="addToCart(product)"
                              class="add_cart btn btn-warning" 
                              style="background-color: #fdd922; color: #444;">
                              Thêm <i class="fa fa-shopping-cart"></i>
                            </button>
                            <a href="#" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.tab-pane -->
          </div>
        </div>

        <!-- /***FOOD***/ -->

        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">THỨC ĂN</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li ng-repeat="(depName, dep_value) in foodFamily" ng-if ="$index < 7">
                <a ng-click="getDepartmentProduct('Food',depName)">{{depName}}</a>
              </li>
            </ul>
            <!-- /.nav-tabs --> 
          </div>

          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                <div ng-repeat="product in departmentProduct['Food']" class="col-sm-4 col-md-3 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image" style="height: 180px"> <a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn"><img style="height: 100%;" src="{{imageDomain + product.image}}" alt="{{product.name}}"></a> </div>
                          <div class="tag sale"><span>Hot</span></div>
                        </div>
                        <div class="product-info text-left" style="height: 70px">
                          <h3 class="name"><a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn">{{product.name}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price text-danger"><b>${{product.price}}</b></div>
                        </div>
                        <div class="cart clearfix animate-effect">
                          <div class="btn-group">
                            <button ng-click="addToCart(product)"
                              class="add_cart btn btn-warning" 
                              style="background-color: #fdd922; color: #444;">
                              Thêm <i class="fa fa-shopping-cart"></i>
                            </button>
                            <a href="#" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.tab-pane -->
          </div>
        </div>


        <!-- /***Non-Consumable***/ -->

        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">ĐỒ GIA DỤNG</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li ng-repeat="(depName, dep_value) in nonFamily" ng-if ="$index < 7">
                <a ng-click="getDepartmentProduct('Non-Consumable',depName)">{{depName}}</a>
              </li>
            </ul>
            <!-- /.nav-tabs --> 
          </div>

          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                <div ng-repeat="product in departmentProduct['Non-Consumable']" class="col-sm-4 col-md-3 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                        <div class="image" style="height: 180px"> <a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn"><img style="height: 100%;" src="{{imageDomain + product.image}}" alt="{{product.name}}"></a> </div>
                          <div class="tag sale"><span>Hot</span></div>
                        </div>
                        <div class="product-info text-left" style="height: 70px">
                          <h3 class="name"><a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn">{{product.name}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price text-danger"><b>${{product.price}}</b></div>
                        </div>
                        <div class="cart clearfix animate-effect">
                          <div class="btn-group">
                            <button ng-click="addToCart(product)"
                              class="add_cart btn btn-warning" 
                              style="background-color: #fdd922; color: #444;">
                              Thêm <i class="fa fa-shopping-cart"></i>
                            </button>
                            <a href="#" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.tab-pane -->
          </div>
        </div>



        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
          <div class="info-boxes wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">MONEY BACK</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">FREE SHIPPING  </h4>
                    </div>
                  </div>
                  <h6 class="text">
                  Shipping on orders over $99                  </h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">SPECIAL SALE</h4>
                    </div>
                  </div>
                  <h6 class="text"><a style="color: rgba(255,255,255,0.8);">Extra $5 off on all items</a></h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners -->        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    

    <div id="brands-carousel" class="logo-slider">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
        
          <div class="item" ng-repeat="brand in listBrand" style="width: 190px; display: inline-block"> 
            <a href="<?php echo base_url() ?>brand-{{to_slug(brand.brand_name)}}" class="image"> 
              <img src="https://via.placeholder.com/180x100?text={{brand.brand_name}}" alt=""> 
              <h3 class="section-title" style="text-align: center; padding-top: 5px">{{brand.brand_name}}</h2>
            </a> 
          </div>
          <!-- <div class="item"> 
            <a href="#" class="image"> 
              <img src="https://via.placeholder.com/180x100" alt=""> 
              <h3 class="section-title" style="text-align: center; padding-top: 5px">Another Brand</h2>
            </a> 
          </div> -->
        </div>
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>


  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 
<!-- ============================================================= FOOTER ============================================================= -->

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

  app.controller('HomeCtrl',  function($scope, $http, $rootScope){
    $scope.appDomain = "http://localhost/luanvan/";
    $scope.imageDomain = "http://localhost/luanvan/files/product_image/";

    $http.get($scope.appDomain + 'api/getCategory')
    .then(function(res){
      // product_department
      var family = groupBy(res.data, "product_family");
      for(var propt in family){
        family[propt] = groupBy(family[propt], "product_department");
      }
      $scope.familyProduct = family;
      $scope.drinkFamily = family["Drink"];
      $scope.foodFamily = family["Food"];
      $scope.nonFamily = family["Non-Consumable"];

      $scope.getDepartmentProduct('Drink', 'Beverages')
      $scope.getDepartmentProduct('Food', 'Produce')
      $scope.getDepartmentProduct('Non-Consumable', 'Household')
    }, function(res){})
    
    $scope.departmentProduct = {"Drink": [], "Food": [], "Non-Consumable": []}
    $scope.getDepartmentProduct = function(familyname, depname) {
      let listCategory = []
      for (let i = 0; i < $scope.familyProduct[familyname][depname].length; i++) {
        const category = $scope.familyProduct[familyname][depname][i];
        listCategory.push(parseInt(category.category_id));
      }
      var data = $.param({
        listCategory: listCategory,
      })
      var config = {headers: {'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'}}
      $http.post($scope.appDomain + 'api/getDepartmentProduct',data,config)
      .then(function(res) {
        $scope.departmentProduct[familyname] = res.data;
      }, function(err){})
    }

    $http({
      url: $scope.appDomain + 'api/getBestSellerProduct', 
      method: "GET"
    }).then(function(res){
      $scope.bestSellerProduct = res.data
    }, function(res){});

    $http({
      url: $scope.appDomain + 'api/getSliceBrand', 
      method: "GET"
    }).then(function(res){
      $scope.listBrand = res.data
      console.log($scope.listBrand)
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
      console.log(data);
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