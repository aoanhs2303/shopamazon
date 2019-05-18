<!-- ============================================== HEADER : END ============================================== -->

<div class="body-content" ng-controller="ForyouCtrl">
    <div class="container" style="margin-top: 15px">
        <div class="row">
            <div class="blog-pagem">
                <?php echo $sidebar ?>
				<div class="col-md-9">
					<div id="hero">
							<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
									<a>
										<div class="item" style="background-image: url(<?php echo base_url() ?>includehome/images/for_you.jpg);">
										</div>
									</a>
							</div>
					</div>
					
					<?php 
					if (isset($_SESSION['Customer_name']) ){  ?> 
					<input type="hidden" id="customerId" value=<?php echo $_SESSION['UserId'] ?>>
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

          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">

                <div ng-repeat="product in listProduct" class="col-sm-6 col-md-3 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn"><img src="https://via.placeholder.com/500" alt="{{product.name}}"></a> </div>
                          <!-- /.image -->
                          <div class="tag sale"><span>Hot</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name" style="height: 25px"><a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn">{{product.name}}</a></h3>
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
					<?php } else { ?>
						<div style="background-color: white; padding: 10px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.19);" class="x-page inner-bottom-sm">
							<div class="row">
								<div class="col-md-12 x-text text-center">
									<h1 style="font-size: 40px">Bạn chưa đăng nhập</h1>
									<p>Vui lòng đăng nhập để thấy các sản phẩm dành riêng cho bạn. </p>
									<a href="<?php echo base_url() . "home/login" ?>"><i class="fa fa-lock"></i> Đăng nhập</a>
								</div>
							</div><!-- /.row -->
						</div>
					<?php } ?>

				</div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
<script>
	app.controller('ForyouCtrl',  function($scope, $http, $rootScope){
		$scope.appDomain = "http://localhost/luanvan/";
		$scope.rulePath = "http://localhost/luanvan/includehome/rule/";

		
		$scope.getListProduct = function(listProductId) {          
			var data = $.param({
				listProductId: listProductId
			})
			var config = {headers: {'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'}}
			$http.post($scope.appDomain + 'api/getListProduct',data,config)
			.then(function(res) {
				console.log(res);
				$scope.listProduct = res.data;
      		}, function(err){})

        }

		if($('#customerId').val() != undefined) {
			$http({
				url: $scope.appDomain + 'api/getCustomerById', 
				method: "GET",
				params: {customer_id: $('#customerId').val()}
			}).then(function(res){
				$scope.customer = res.data
				rcm = res.data.product_rcm.replace(/,$/, '')
				listProductId = rcm.split(',');
				$scope.getListProduct(listProductId);
			}, function(res){});
		} else {
			console.log("dang nhap")
		}
		

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