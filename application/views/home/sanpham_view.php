<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="app">
	<div class='container'>
	<div class='row single-product'>
      <?php echo $sidebar ?>
	<div class='col-md-9'>
        <div class="detail-block">
			<div class="row  wow fadeInUp">
				<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    				<div class="product-item-holder size-big single-product-gallery small-gallery">
        <div id="owl-single-product">
        	<?php foreach ($sanpham as $sp) { $img_product = json_decode($sp['image']); ?>
	    	<?php for ($i=0; $i < count($img_product); $i++) { ?>
            <div class="single-product-gallery-item" id="slide<?php echo $i+1 ?>">
                <a data-lightbox="image-1" data-title="Gallery" href="<?php echo $img_product[$i] ?>">
                    <img class="img-responsive m-auto" 
                    	 alt="" 
                    	 src="<?php echo base_url() ?>includehome/images/blank.gif" 
                    	 data-echo="<?php echo $img_product[$i] ?>" 
						 style="width: 100%; height: 100%"
                    />	
                </a>
            </div><!-- /.single-product-gallery-item -->
	    	<?php } ?>
	    	<?php } ?>		
        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
        	<?php foreach ($sanpham as $sp) { $img_product = json_decode($sp['image']); ?>
	    	<?php for ($i=0; $i < count($img_product); $i++) { ?>
	            <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?php echo $i+1 ?>" href="#slide<?php echo $i+1 ?>">
                        <img class="img-responsive" width="85" alt="" src="<?php echo base_url() ?>includehome/images/blank.gif" data-echo="<?php echo $img_product[$i]; ?>" />
                    </a>
                </div>
	    	<?php } ?>
	    	<?php } ?>	
            </div><!-- /#owl-single-product-thumbnails -->
        </div><!-- /.gallery-thumbs -->
    				


    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
					<?php foreach ($sanpham as $sp_info) { ?>
						<div class="product-info">
							<h1 class="name"><?php echo $sp_info['name'] ?></h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Tình trạng :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value" v-if="<?php echo $sp_info['status'] ?>">Còn hàng</span>
											<span class="value" v-else>Hết hàng</span>	
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Kích thước :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value"><?php echo $sp_info['size'] ?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->
							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Bề dày :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value"><?php echo $sp_info['thick'] ?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->


							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Danh mục :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value"><?php echo $sp_info['category'] ?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									<div class="col-sm-6">
										<div class="price-box">
											<!-- <span class="price"><?php echo number_format($sp_info['price']) ?> ₫</span> -->
											<span class="price">Giá liên hệ</span>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

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
								</div><!-- /.row -->
								<div class="row mt-2">
									<div class="col-sm-12">
										<div class="btn-group">
											<button 
				                              class="add_cart btn btn-primary" 
				                              data-productid="<?php echo $sp_info['id'] ?>"
				                              data-productname="<?php echo $sp_info['name'] ?>"
				                              data-price="<?php echo $sp_info['price'] ?>"
				                              data-productimg="<?php echo json_decode($sp_info['image'])[0] ?>"
				                              data-quantity="1"
				                              data-size="<?php echo $sp_info['size'] ?>"
				                              >
				                              <i class="fa fa-shopping-cart inner-right-vs"></i>
				                              THÊM VÀO GIỎ</i>
				                            </button>
											<a href="#" class="btn btn-warning"><i class="fa fa-money inner-right-vs"></i> MUA NGAY</a>	
										</div>
									</div>
								</div>
							</div><!-- /.quantity-container -->

						</div><!-- /.product-info -->
					


					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">MÔ TẢ</a></li>
								<li><a data-toggle="tab" href="#review">Đánh giá</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">
											<?php echo $sp_info['content'] ?>
										</p>
									</div>	
								</div><!-- /.tab-pane -->
						<?php } ?>
								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Đánh giá của khách hàng</h4>

										</div><!-- /.product-reviews -->
										

										
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 <i class="fa fa-star"></i></th>
																<th>2 <i class="fa fa-star"></i></th>
																<th>3 <i class="fa fa-star"></i></th>
																<th>4 <i class="fa fa-star"></i></th>
																<th>5 <i class="fa fa-star"></i></th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Chất lượng</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Giá cả</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Uy tín</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											<div class="review-form">
												<div class="form-container">
													<form role="form" class="cnt-form">
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Tên của bạn <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Email <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Đánh giá <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->


							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Sản phẩm liên quan</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	<?php foreach ($lienquan as $key => $lien_quan) { ?>
		<div class="item item-carousel">
			<div class="products">	
				<div class="product">		
				<div class="product-image">
					<div class="image">
						<?php $img = json_decode($lien_quan['image'])[0] ?>
						<a href="<?php echo base_url() ?>Home/sanpham/<?php echo $lien_quan['id'] ?>"><img  src="<?php echo $img ?>" alt=""></a>
					</div><!-- /.image -->			
					<div class="tag sale"><span><?php echo $lien_quan['thick'] ?></span></div>            		   
				</div><!-- /.product-image -->
				<div class="product-info text-left">
					<h3 class="name"><a href="<?php echo base_url() ?>Home/sanpham/<?php echo $lien_quan['id'] ?>"><?php echo $lien_quan['name'] ?></a></h3>
					<div class="rating rateit-small"></div>
					<div class="description"></div>

					<div class="product-price">	
						<span class="price"><?php echo number_format($lien_quan['price']) ?></span>		
					</div><!-- /.product-price -->
					
				</div><!-- /.product-info -->
		        <div class="cart clearfix animate-effect">
		          <div class="btn-group">
		            <a href="" class="btn btn-warning" style="background-color: #fdd922; color: #444;">Thêm <i class="fa fa-shopping-cart"></i></a>
		            <a href="<?php echo base_url() ?>Home/sanpham/<?php echo $lien_quan['id'] ?>" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
		          </div>
		          <!-- /.action --> 
		        </div>
				</div><!-- /.product -->
			</div><!-- /.products -->
		</div><!-- /.item -->
	<?php } ?>


</section><!-- /.section -->


<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Bình luận</h3>
	<?php $idsp = $sanpham[0]['id'] ?>
	<div class="fb-comments" data-href="http://localhost/shop3tr/Home/sanpham/<?php echo $idsp; ?>" data-width="850" data-numposts="5"></div>
</section><!-- /.section -->

			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

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
</script>
<script>
	new Vue({
	
		el: "#app"
	
	})
</script>