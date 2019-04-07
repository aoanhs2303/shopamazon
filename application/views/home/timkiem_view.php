<!-- ============================================== HEADER : END ============================================== -->

<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <?php echo $sidebar ?>
      <!-- /.sidebar -->
      <div class='col-md-9'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <h1 class="section-title" style="font-size: 20px"><span class="text-primary">Kết quả tìm kiếm từ khóa</span> "<?php echo $tukhoa ?>"</h1>
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
                <h4 class="section-title" style="padding-left: 30px"><?php echo $koketqua ?></h4>
                <?php foreach ($products as $product) { ?>
                  <div class="col-sm-6 col-md-4 wow fadeInUp">

                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <?php $img = json_decode($product['image'])[0] ?>
                          <div class="image"> <a href="<?php echo base_url() ?>Home/sanpham/<?php echo $product['id'] ?>"><img  src="<?php echo $img ?>" alt="<?php echo $img ?>"></a> </div>
                          <!-- /.image -->
                          <div class="tag sale"><span><?php echo $product['thick'] ?></span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?php echo base_url() ?>Home/sanpham/<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> <?php echo number_format($product['price']) ?> ₫</span></div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="btn-group">
                            <button 
                              class="add_cart btn btn-warning" 
                              style="background-color: #fdd922; color: #444;"
                              data-productid="<?php echo $product['id'] ?>"
                              data-productname="<?php echo $product['name'] ?>"
                              data-price="<?php echo $product['price'] ?>"
                              data-productimg="<?php echo $img ?>"
                              data-quantity="1"
                              data-size="<?php echo $product['size'] ?>"
                              >
                              Thêm <i class="fa fa-shopping-cart"></i>
                            </button>
                            <a href="<?php echo base_url() ?>Home/sanpham/<?php echo $product['id'] ?>" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-info"><i class="fa fa-search"></i></a>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product -->  
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item --> 
                <?php } ?>
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
          </div>
          <!-- /.tab-content -->
<!--           <div class="clearfix filters-container">
            <div class="text-right">
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
            </div>
          </div> -->
          <!-- /.filters-container --> 
          
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