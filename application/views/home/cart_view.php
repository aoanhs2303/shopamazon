
<!-- ============================================== HEADER : END ============================================== -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
					<div class="table-responsive" id="cart_table">
					</div>
				</div><!-- /.shopping-cart-table -->
<form action="<?php echo base_url() ?>Home/themdonhang" method="post">
	<div class="col-md-6 col-sm-12 estimate-ship-tax">
		<table class="table">
			<thead>
				<tr>
					<th>
						<span class="estimate-title">Địa chỉ giao hàng</span>
						<p>Nhập địa chỉ của bạn..</p>
					</th>
				</tr>
			</thead><!-- /thead -->
			<tbody>
					<tr>
						<td>
							<div class="form-group">
								<label class="info-title control-label">Địa chỉ chi tiết</label>
								<br>
								<textarea class="form-control" name="diachi_dh" id="" rows="4"></textarea>
							</div>
							
							<div class="form-group">
								<textarea style="display: none" class="form-control" name="sanpham_dh" id="sanpham_order" rows="4"></textarea>
								<input type="hidden" name="price_dh" id="price_order">
							</div>
						</td>
					</tr>
			</tbody>
		</table>
	</div><!-- /.estimate-ship-tax -->

	<div class="col-md-6 col-sm-12 estimate-ship-tax">
		<table class="table">
			<thead>
				<tr>
					<th>
						<span class="estimate-title">Thông tin cá nhân</span>
						<p>Nhập thông tin cá nhân của bạn..</p>
					</th>
				</tr>
			</thead>
			<tbody>
					<tr>
						<td>
							<div class="form-group">
								<label class="info-title control-label">Tên <span>*</span></label>
								<input type="text" name="ten_dh" class="form-control" placeholder="Nhập tên">
							</div>
							<div class="form-group">
								<label class="info-title control-label">Số điện thoại <span>*</span></label>
								<input type="text" name="sdt_dh" class="form-control" placeholder="Nhập số điện thoại">
							</div>
							<div class="form-group">
								<label class="info-title control-label">Email <span>*</span></label>
								<input type="mail" name="email_dh" class="form-control" placeholder="Nhập Email">
							</div>
							<div class="cart-checkout-btn pull-right">
								<button type="submit" class="btn btn-primary checkout-btn" style="font-size: 30px; font-weight: bold; padding: 20px;">ĐẶT HÀNG</button>
							</div>
						</td>
					</tr>
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div><!-- /.estimate-ship-tax -->	
</form>							


</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

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
    $('#cart_table').load("<?php echo base_url(); ?>cart/load_cart");
    $('#sanpham_order').load("<?php echo base_url(); ?>cart/load_order");
    $.get('<?php echo base_url(); ?>cart/load_order_price', function(result) {
	    $('#price_order').val(result);
	});

    $(document).on('click', '.delete_cart', function(){
      var row_id = $(this).attr("id");
      $.ajax({
        url:"<?php echo base_url(); ?>cart/remove",
        method:"POST",
        data:{row_id:row_id},
        success:function(data)
        {
          $('#show_cart').html(data);
          $('#cart_table').load("<?php echo base_url(); ?>cart/load_cart");
        }
      });
    });
  });
</script>