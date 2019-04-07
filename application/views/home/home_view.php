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
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Địa chỉ</h4>
                    </div>
                  </div>
                  <h6 class="text"><?php echo $address[0]['value'] ?></h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Số điện thoại</h4>
                    </div>
                  </div>
                  <h6 class="text">
                  <?php foreach ($sdt as $key => $sdt_item) { 
                    if($key == 0) {
                      echo $sdt_item['value'] . ' - ';
                    } else {
                      echo $sdt_item['value'];
                    }      
                  } ?>
                  </h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Nhận cắt ván</h4>
                    </div>
                  </div>
                  <h6 class="text"><a style="color: rgba(255,255,255,0.8);" href="<?php echo base_url() ?>dich-vu.html">Theo quy cách & Trang trí thi công trần - vách ngăn </a></h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">Dink</h3>
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
                          <div class="image"> <a href="#"><img src="https://via.placeholder.com/500" alt="{{product.name}}"></a> </div>
                          <!-- /.image -->
                          <div class="tag sale"><span>Hot</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left" style="height: 70px">
                          <h3 class="name"><a href="#">{{product.name}}</a></h3>
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
                            <a href="#" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
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

        <!-- /***TẤM LÓT SÀN***/ -->

        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">Tấm lót sàn</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all_lot" data-toggle="tab">Tất cả</a></li>
              <?php foreach ($category_lot as $key => $lot) { ?>
                <li>
                  <a 
                    data-transition-type="backSlide" 
                    href="#lot-<?php echo $key ?>" 
                    data-toggle="tab"><?php echo $lot['name'] ?>
                  </a>
                </li>
              <?php } ?>
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all_lot">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                <?php foreach ($tamlot as $tam_lot) { ?>
                  <?php foreach ($tam_lot as $tam_lot_sp) { ?>
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <?php $img = json_decode($tam_lot_sp['image'])[0] ?>
                          <div class="image"> <a href="<?php echo base_url() . vn_to_str($tam_lot_sp['name']) .'-'. $tam_lot_sp['id']?>.chn"><img  src="<?php echo $img ?>" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag sale"><span><?php echo $tam_lot_sp['thick'] ?></span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?php echo base_url() . vn_to_str($tam_lot_sp['name']) .'-'. $tam_lot_sp['id']?>.chn"><?php echo $tam_lot_sp['name'] ?></a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> <?php echo number_format($tam_lot_sp['price']) ?> ₫  </span></div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="btn-group">
                            <button 
                              class="add_cart btn btn-warning" 
                              style="background-color: #fdd922; color: #444;"
                              data-productid="<?php echo $tam_lot_sp['id'] ?>"
                              data-productname="<?php echo $tam_lot_sp['name'] ?>"
                              data-price="<?php echo $tam_lot_sp['price'] ?>"
                              data-productimg="<?php echo $img ?>"
                              data-quantity="1"
                              data-size="<?php echo $tam_lot_sp['size'] ?>"
                              >
                              Thêm <i class="fa fa-shopping-cart"></i>
                            </button>
                            <a href="<?php echo base_url() . vn_to_str($tam_lot_sp['name']) .'-'. $tam_lot_sp['id']?>.chn" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <?php } ?>
                <?php } ?>
                  
                  <!-- /.item -->
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            
            <?php foreach ($tamlot as $key => $tl) { ?>
            <div class="tab-pane" id="lot-<?php echo $key ?>">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  <?php foreach ($tl as $tam_lot_item) { ?>
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <?php $img = json_decode($tam_lot_sp['image'])[0] ?>
                          <div class="image"> <a href="<?php echo base_url() . vn_to_str($tam_lot_item['name']) .'-'. $tam_lot_item['id']?>.chn"><img  src="<?php echo $img ?>" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag sale"><span><?php echo $tam_lot_item['thick'] ?></span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?php echo base_url() . vn_to_str($tam_lot_item['name']) .'-'. $tam_lot_item['id']?>.chn"><?php echo $tam_lot_item['name'] ?></a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> <?php echo number_format($tam_lot_item['price']) ?> ₫  </span></div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="btn-group">
                            <button 
                              class="add_cart btn btn-warning" 
                              style="background-color: #fdd922; color: #444;"
                              data-productid="<?php echo $tam_lot_item['id'] ?>"
                              data-productname="<?php echo $tam_lot_item['name'] ?>"
                              data-price="<?php echo $tam_lot_item['price'] ?>"
                              data-productimg="<?php echo $img ?>"
                              data-quantity="1"
                              data-size="<?php echo $tam_lot_item['size'] ?>"
                              >
                              Thêm <i class="fa fa-shopping-cart"></i>
                            </button>
                            <a href="<?php echo base_url() . vn_to_str($tam_lot_item['name']) .'-'. $tam_lot_item['id']?>.chn" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <?php } ?>
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <?php } ?>

            <!-- /.tab-pane -->
                    
          </div>
          <!-- /.tab-content --> 
        </div>

        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <?php foreach ($banner as $value) { ?>
              <div class="col-md-6 col-sm-6">
                <div class="wide-banner cnt-strip">
                  <a href="<?php echo $value['link'] ?>"><div class="image"> <img class="img-responsive" src="<?php echo $value['image'] ?>" alt=""> </div></a>
                </div>
                <!-- /.wide-banner --> 
              </div>
            <?php } ?>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners -->
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->

        <!-- ============================================== BEST SELLER ============================================== -->
        
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Sản phẩm bán chạy</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
              <?php foreach ($hot as $key => $hot_items) { ?>
              <div class="item">
                <div class="products best-product">
                  <?php foreach ($hot_items as $hot_item) { ?>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <?php $img = json_decode($hot_item['image'])[0] ?>
                            <div class="image"> <a href="<?php echo base_url() . vn_to_str($hot_item['name']) .'-'. $hot_item['id']?>.chn"> <img src="<?php echo $img ?>" alt="<?php echo $img ?>"> </a> </div>  
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url() . vn_to_str($hot_item['name']) .'-'. $hot_item['id']?>.chn"><?php echo $hot_item['name'] ?></a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> <?php echo number_format($hot_item['price']) ?> ₫  </span> </div>
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
              <?php } ?>
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== BEST SELLER : END ============================================== --> 
        
        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">Tin tức - Dịch vụ - Khuyến mãi</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
              <?php foreach ($dichvu as $value) { ?>
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="<?php echo base_url() ?>dichvu/<?php echo vn_to_str($value['name']) . '-' . $value['id'] ?>.html">
                        <img style="height: 200px;" src="<?php echo $value['image'] ?>" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="<?php echo base_url() ?>dichvu/<?php echo vn_to_str($value['name']) . '-' . $value['id'] ?>.html"><?php echo $value['name'] ?></a></h3>
                      <span class="info">Thành Công &nbsp;|&nbsp; <?php echo date('d/m/Y',$value['datetime']) ?> </span>
                      <p class="text"><?php echo $value['summary'] ?></p>
                      <a href="<?php echo base_url() ?>dichvu/<?php echo vn_to_str($value['name']) . '-' . $value['id'] ?>.html" class="lnk btn btn-primary">Chi tiết</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item -->
              <?php } ?> 
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <div id="test_c">

    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 
<!-- ============================================================= FOOTER ============================================================= -->

<script>
  $(document).ready(function() {
    $('.add_cart').click(function(){
      product_id       = $(this).data('productid');
      product_name     = $(this).data('productname');
      product_price    = $(this).data('price');
      product_quantity = $(this).data('quantity');
      product_img      = $(this).data('productimg');
      product_size     = $(this).data('size');

      $.ajax({
        url: "<?php echo base_url() ?>cart/add",
        type: 'POST',
        data: {
          product_id: product_id,
          product_name: product_name,
          product_price: product_price,
          product_quantity: product_quantity,
          product_img: product_img,
          product_size: product_size
        },
        success:function(data)
        {
          $('#show_cart').html(data);
        }
      })      
    });

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

    // $scope.initDepartmentProduct = function() {
    //   $scope.departmentProduct = {"Drink": [], "Food": [], "Non-Consumable": []}  
    //   $scope.getDepartmentProduct('Drink', 'Beverages')
    // }

    // $scope.initDepartmentProduct()

    
    
    console.log($scope.departmentProduct)

  })
</script>