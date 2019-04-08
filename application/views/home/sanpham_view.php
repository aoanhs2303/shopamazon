<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="app" ng-controller="ProductCtrl">
    <div class='container'>
        <div class='row single-product'>
            <?php echo $sidebar ?>
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
																			<div class="single-product-gallery-item">
																					<a data-lightbox="image-1" data-title="Gallery">
																							<img class="img-responsive m-auto" 
																								alt="{{product.name}}" 
																								src="https://via.placeholder.com/500" 
																								style="width: 100%; height: 100%"
																							/>	
																					</a>
																			</div>
                                    </div>
                                </div>
                                <!-- /.single-product-gallery -->
                            </div>
                            <!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
															<div class="product-info">
																	<h1 class="name">{{product.name}}</h1>

																	<div class="rating-reviews m-t-20">
																			<div class="row">
																					<div class="col-sm-3">
																							<div class="rating rateit-small"></div>
																					</div>
																			</div>
																			<!-- /.row -->
																	</div>
																	<!-- /.rating-reviews -->

																	<div class="stock-container info-container m-t-10">
																			<div class="row">
																					<div class="col-sm-2">
																							<div class="stock-box">
																									<span class="label">Tình trạng :</span>
																							</div>
																					</div>
																					<div class="col-sm-9">
																							<div class="stock-box">
																									<span class="value">Còn hàng</span>
																							</div>
																					</div>
																			</div>
																			<!-- /.row -->
																	</div>
																	<!-- /.stock-container -->

																	<div class="stock-container info-container m-t-10">
																			<div class="row">
																					<div class="col-sm-2">
																							<div class="stock-box">
																									<span class="label">Danh mục :</span>
																							</div>
																					</div>
																					<div class="col-sm-9">
																							<div class="stock-box">
																									<span class="value">{{product.category_id}}</span>
																							</div>
																					</div>
																			</div>
																			<!-- /.row -->
																	</div>
																	<!-- /.stock-container -->

																	<div class="price-container info-container m-t-20">
																			<div class="row">
																					<div class="col-sm-6">
																							<div class="price-box">
																									<span class="price">${{product.price}}</span>
																							</div>
																					</div>

																			</div>
																			<!-- /.row -->
																	</div>
																	<!-- /.price-container -->

																	<div class="quantity-container info-container">
																			<div class="row">
																					<div class="col-sm-2">
																							<span class="label">Số lượng :</span>
																					</div>
																					<div class="col-sm-3">
																							<div class="cart-quantity">
																									<div class="quant-input">
																											<div class="arrows">
																													<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
																													<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
																											</div>
																											<input type="text" value="1">
																									</div>
																							</div>
																					</div>
																			</div>
																			<!-- /.row -->
																			<div class="row mt-2">
																					<div class="col-sm-12">
																							<div class="btn-group">
																									<button class="add_cart btn btn-primary" ng-click="addToCart(product)">
																											<i class="fa fa-shopping-cart inner-right-vs"></i> THÊM VÀO GIỎ</i>
																									</button>
																									<a href="#" class="btn btn-warning"><i class="fa fa-money inner-right-vs"></i> MUA NGAY</a>
																							</div>
																					</div>
																			</div>
																	</div>
																	<!-- /.quantity-container -->

															</div>
															<!-- /.product-info -->

                            </div>
                            <!-- /.col-sm-7 -->
                        </div>
                        <!-- /.row -->
                    </div>

                        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                        <section class="section featured-product wow fadeInUp">
                            <h3 class="section-title">Sản phẩm liên quan</h3>
                            <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
																											<a href="#"><img src="https://via.placeholder.com/500" alt=""></a>
                                                    </div>
                                                    <!-- /.image -->
                                                    <div class="tag sale"><span>Hot</span></div>
                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="#">XXXX</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    <div class="product-price">
                                                        <span class="price">XXX</span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="btn-group">
                                                        <a href="" class="btn btn-warning" style="background-color: #fdd922; color: #444;">Thêm <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                            </div>
                                            <!-- /.product -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->

                        </section>
                        <!-- /.section -->

                        <section class="section featured-product wow fadeInUp">
                            <h3 class="section-title">Bình luận</h3>
                                <div class="fb-comments" data-href="http://localhost/shop3tr/Home/sanpham/{{product.id}}" data-width="850" data-numposts="5"></div>
                        </section>
                        <!-- /.section -->

                        </div>
                        <!-- /.col -->
                        <div class="clearfix"></div>
                </div>
                <!-- /.row -->

                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.body-content -->

    <!-- ============================================================= FOOTER ============================================================= -->
    <script>
        $(document).ready(function() {
            

            $('#show_cart').load("<?php echo base_url(); ?>cart/load");

            $(document).on('click', '.delete_cart', function() {
                var row_id = $(this).attr("id");
                $.ajax({
                    url: "<?php echo base_url(); ?>cart/remove",
                    method: "POST",
                    data: {
                        row_id: row_id
                    },
                    success: function(data) {
                        $('#show_cart').html(data);
                    }
                });
            });
        });

        app.controller('ProductCtrl', function($scope, $http, $rootScope) {
            $scope.appDomain = "http://localhost/luanvan/";
            var loc_array = window.location.pathname.split("/");
						var uri = loc_array[loc_array.length - 1].split("-");
						var product_id = uri[uri.length - 1].split(".")[0]
            $http({
                url: $scope.appDomain + 'api/getProductById',
                method: "GET",
                params: {
                    product_id: product_id
                }
            }).then(function(res) {
                $scope.product = res.data
                console.log($scope.product)
            }, function(res) {});

            $scope.addToCart = function(product) {
                var data = $.param({
                    product_id: product.id,
                    product_name: product.name,
                    product_price: product.price,
                    product_quantity: 1,
                    product_img: "https://via.placeholder.com/500",
                    product_size: "1m"
                })
                var config = {
                    headers: {
                        'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'
                    }
                }
                $http.post($scope.appDomain + 'cart/add', data, config)
                    .then(function(res) {
                        $('#show_cart').html(res.data);
                    }, function(err) {})
            }

        })
    </script>