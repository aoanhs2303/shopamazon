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

                    <?php 
					if (isset($_SESSION['Username']) ){  ?> 
					<input type="hidden" id="customerId" value=<?php echo $_SESSION['UserId']  ?>>
                    <?php } ?>

                        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                        <section class="section featured-product wow fadeInUp">
                            <h3 class="section-title">Sản phẩm liên quan</h3>
                            <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                                    <div class="item item-carousel" ng-repeat="product in listProduct">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
													<a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn"><img src="https://via.placeholder.com/500" alt=""></a>
                                                    </div>
                                                    <!-- /.image -->
                                                    <div class="tag sale"><span>Hot</span></div>
                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn">{{product.name}}</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    <div class="product-price">
                                                        <span class="price">${{product.price}}</span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="btn-group">
                                                        <a ng-click="addToCart(product)" class="btn btn-warning" style="background-color: #fdd922; color: #444;">Thêm <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="<?php echo base_url() ?>{{to_slug(product.name)}}-{{product.id}}.chn" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
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
            $scope.rulePath = "http://localhost/luanvan/includehome/rule_product_only"
            $scope.rulePath2 = "http://localhost/luanvan/includehome/rule_buy_to_buy"
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

            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }
            if(!getCookie("view_product")){
                setCookie("view_product", product_id, 1);
            } else {
                listViewProduct = getCookie("view_product").split(',');
                if(listViewProduct.indexOf(product_id) == -1) {
                    setCookie("view_product", getCookie("view_product") + "," + product_id, 1);
                }
                
            }

            function UrlExists(url) {
                var http = new XMLHttpRequest();
                http.open('HEAD', url, false);
                http.send();
                return http.status!=404;
            }

            function compareConfidence(a,b) {
                if (a.confidence < b.confidence)
                    return 1;
                if (a.confidence > b.confidence)
                    return -1;
                return 0;
            }

            function slugify(text) {
                text = text.toLowerCase();
                text = text.replace(/[\W_]+/g, '-');
                return text;
            }

            function pathName(text) {
                text = text.split(')(');
                text[0] = text[0].slice(1)
                text[text.length - 1] = text[text.length - 1].slice(0, text[text.length - 1].length - 1)
                let path = []
                for (let i = 0; i < text.length; i++) {
                    text[i] = text[i].split('(')[0];
                    path.push(text[i])
                }
                return slugify(path.join('-'));
            }

            var recommend = [];
            function readTextFileAndHandle(file, antecedent) {
                if(UrlExists(file)) { 
                    var rawFile = new XMLHttpRequest();
                    rawFile.open("GET", file, false);
                    rawFile.onreadystatechange = function () {
                        if(rawFile.readyState === 4) {
                            if(rawFile.status === 200 || rawFile.status == 0) {
                                var allText = rawFile.responseText;
                                var lines = allText.split('\n');
                                for(var line = 0; line < lines.length - 1; line++){
                                    
                                    if (antecedent == lines[line].split(" , ")[0]) {
                                        let productId = lines[line].split(" , ")[1].split(" (")[0];
                                        let conf = lines[line].split(" , ")[1].split("conf=")[1].slice(0, -2);
                                        recommend.push({'productid':productId, 'confidence': conf});
                                    }
                                }
                            }
                        }
                    }
                    rawFile.send(null);
                } 
            }
            var recommendProduct = []
            function readTextFileAndHandle2(file) {
			
                if(UrlExists(file)) { 
                    var rawFile = new XMLHttpRequest();
                    rawFile.open("GET", file, false);
                    rawFile.onreadystatechange = function () {
                        if(rawFile.readyState === 4) {
                            if(rawFile.status === 200 || rawFile.status == 0) {
                                var allText = rawFile.responseText;
                                var lines = allText.split('\n');
                                var temp5 = []
                                for(var line = 0; line < lines.length - 1; line++){
                                    r = lines[line];
                                    try {
                                        r = r.split(' --> ')[1].split(',');
                                        let productid = r[0].match(/\d+/)[0];
                                        let confidence = r[1].split('=')[1];
                                        product = {'productid': productid, 'confidence': confidence}
                                        temp5.push(product);
                                    } catch (error) {
                                        console.log(file, line)
                                    }
                                    
                                }
                                temp5.sort(compareConfidence);
                                temp5.splice(5, temp5.length);
                                for (let i = 0; i < temp5.length; i++) {
                                    recommendProduct.push(temp5[i])	
                                }
                            }
                        }
                    }
                    rawFile.send(null);
                }
            }

            
		    if($('#customerId').val() != undefined) {
			    $http({
                    url: $scope.appDomain + 'api/getCustomerById', 
                    method: "GET",
                    params: {customer_id: $('#customerId').val()}
                }).then(function(res){
                    $scope.customer = res.data
                    var antecedent = []
                    for (var key in res.data) {
                        if(key == 'age') {
                            key = 'age_group';
                            let age = parseInt(res.data[key]); 
                            if(age < 20) {
                                res.data[key] = 'MiniAdults'
                            } else if (age < 35 && age >= 20) {
                                res.data[key] = 'YoungAdults'
                            } else {
                                res.data[key] = 'MiddleAdults'
                            }
                        } else if (key == 'gender') {
                            if(res.data[key] == 'M') {
                                res.data[key] = 'Male';
                            } else {
                                res.data[key] = 'Female'
                            }
                        } else if (key == 'username' || key == 'password' || key == 'customer_id') {
                            continue;
                        }
                        item = '(' + key + '(' + res.data[key] + '))'
                        antecedent.push(item)
                    }

                    var directory = [];
                    var temp= [];
                    var letLen = Math.pow(2, antecedent.length);


                    var listViewProduct = getCookie("view_product").split(',');
                    if(listViewProduct.length > 8) {
                        listViewProduct = listViewProduct.slice(Math.max(listViewProduct.length - 8, 1))
                    }
                    for(var i=0; i<listViewProduct.length;i++) listViewProduct[i] = +listViewProduct[i];
                    listViewProduct = listViewProduct.sort(function(a, b){return a-b})
                    var allAnt = [];
                    var temp= [];
                    var letLen = Math.pow(2, listViewProduct.length);
                    for (var i = 0; i < letLen ; i++){
                        temp= [];
                        for (var j=0;j<listViewProduct.length;j++) {
                            if ((i & Math.pow(2,j))) { 
                                temp.push(listViewProduct[j])
                            }
                        }
                        if(temp.length > 0 && temp.length <= 2) {
                            allAnt.push(temp);
                        }
                    }


                    for (var i = 0; i < letLen ; i++){
                        temp= [];
                        for (var j=0;j<antecedent.length;j++) {
                            if ((i & Math.pow(2,j))){ 
                                temp.push(antecedent[j])
                            }
                        }
                        if (temp.length == 3 || temp.length == 4) {
                            ant = temp.toString().replace(/,/g,'');
                            
                            pathname = pathName(ant) + '-buy';

                            for (let i = 0; i < allAnt.length; i++) {
                                filename = slugify(ant);
                                for (let j = 0; j < allAnt[i].length; j++) {
                                    let productId = allAnt[i][j];
                                    filename += 'buy-' + productId + '-'
                                }
                                dir = {'pathname': pathname, 'filename': filename}
                                directory.push(dir);
                            }
                        }
                    }

                    // Read each file
                    for (let i = 0; i < directory.length; i++) {
                        let path = $scope.rulePath2 + '/' + directory[i].pathname + '/' +  directory[i].filename + '.txt';
                        readTextFileAndHandle2(path);
                    }

                    var listProductId = []
                    for (let i = 0; i < recommendProduct.length; i++) {
                        listProductId.push(parseInt(recommendProduct[i].productid))
                    }

                    console.log(listProductId);
                })

            } else {
                var listViewProduct = getCookie("view_product").split(',');
                if(listViewProduct.length > 8) {
                    listViewProduct = listViewProduct.slice(Math.max(listViewProduct.length - 8, 1))
                }
                for(var i=0; i<listViewProduct.length;i++) listViewProduct[i] = +listViewProduct[i];
                listViewProduct = listViewProduct.sort(function(a, b){return a-b})
                var allAnt = [];
                var temp= [];
                var letLen = Math.pow(2, listViewProduct.length);
                for (var i = 0; i < letLen ; i++){
                    temp= [];
                    for (var j=0;j<listViewProduct.length;j++) {
                        if ((i & Math.pow(2,j))) { 
                            temp.push(listViewProduct[j])
                        }
                    }
                    if(temp.length > 0 && temp.length <= 6) {
                        allAnt.push(temp);
                    }
                }
                for (let i = 0; i < allAnt.length; i++) {
                    const ant = allAnt[i];
                    readTextFileAndHandle($scope.rulePath + '/rule_' +  ant.length + '.txt', ant.join(" "));
                }
            }



            recommend = recommend.sort(compareConfidence);
            
            var listProductId = []
            for (let i = 0; i < recommend.length; i++) {
                listProductId.push(parseInt(recommend[i].productid))
            }

            listProductId = [...new Set(listProductId)]
            console.log(listProductId);
            $scope.listProduct = [];
            $scope.getListProduct = function(listProductId) {          
                var data = $.param({
                    listProductId: listProductId
                })
                var config = {headers: {'content-type': 'application/x-www-form-urlencoded;charset=UTF-8'}}
                $http.post($scope.appDomain + 'api/getListProduct',data,config)
                .then(function(res) {
                    $scope.listProduct = res.data;
                    console.log($scope.listProduct)
                }, function(err){})
            }

            $scope.getListProduct(listProductId)
            
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