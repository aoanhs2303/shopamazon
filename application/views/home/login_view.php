<div class="body-content" ng-controller="LoginCtrl">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
                <div class="col-md-6 col-sm-6 col-md-push-3 sign-in">
                    <h4 class="">Đăng nhập</h4>

                    <form action="<?php echo base_url(); ?>login/authen" method="post" class="register-form outer-top-xs" role="form">
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Tên đăng nhập <span>*</span></label>
                            <input type="text" name="username" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1">
                        </div>
                        <!-- <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
                            </label>
                            <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                        </div> -->
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập</button>
                    </form>					
                </div>
                <!-- Sign-in -->
<!-- create a new account -->			
            </div><!-- /.row -->
		</div><!-- /.sigin-in-->
    </div>
</div>

<script>
    var app = angular.module('myApp', [])
    app.controller('LoginCtrl', function($scope, $http, $rootScope) {
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