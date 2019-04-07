
<!-- ============================================== HEADER : END ============================================== -->


<div class="body-content">
	<div class="container" style="margin-top: 15px">
		<div class="row">
			<div class="blog-pagem">
				<?php echo $sidebar ?>


				<div class="col-md-9">
<?php foreach ($dichvu as $value) { ?>
	<div class="blog-post wow fadeInUp" 
	style="background-color: white; padding: 10px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.19);">
		<h1 class="section-title" style="font-size: 30px; padding: 10px"><a href="<?php echo base_url() ?>dichvu/<?php echo vn_to_str($value['name']) . '-' . $value['id'] ?>.html"><?php echo $value['name'] ?></a></h1>
		<a href="<?php echo base_url() ?>dichvu/<?php echo vn_to_str($value['name']) . '-' . $value['id'] ?>.html"><img class="img-responsive img-fluid" style="width: 100%; padding: 10px 20px" src="<?php echo $value['image'] ?>" alt=""></a>
		<span class="date-time"><b><?php echo date('d/m/Y',$value['datetime']) ?></b></span>
		<p><?php echo $value['summary'] . ' [...]' ?></p>
		<a href="<?php echo base_url() ?>dichvu/<?php echo vn_to_str($value['name']) . '-' . $value['id'] ?>.html" class="btn btn-upper btn-primary read-more">Chi tiết</a>
	</div>
	<br>
<?php } ?>


</div>

			</div>
		</div>

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>
</div>
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
</script>