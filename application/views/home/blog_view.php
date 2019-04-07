<!-- ============================================== HEADER : END ============================================== -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="body-content">
	<div class="container" style="margin-top: 15px">
		<div class="row">
      <?php echo $sidebar ?>
			<div class="blog-pagem">
	<div class="col-md-9">
	<div class="blog-post wow fadeInUp" style="background-color: #FFF; padding: 10px">
	<h1 class="section-title" style="font-size: 30px"><?php echo $gioithieu[0]["name"] ?></h1>
	<p><?php echo $gioithieu[0]["content"] ?></p>
  <span class="date-time pull-right"><b>Ngày đăng: <?php echo date('d/m/Y', $gioithieu[0]["datetime"]) ?></b></span>
	<div class="social-media">
    <div class="fb-like" data-href="http://localhost/shop3tr/Home/gioithieu" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
	</div>
</div>
<br>
<div style="background-color: white; padding: 10px">
  <h3 class="section-title">Bình luận</h3>
  <div class="fb-comments" data-href="http://localhost/shop3tr/Home/gioithieu" data-width="100%" data-numposts="5"></div>
</div>

			</div>
      <!-- COL-9 -->
		</div>
	</div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->

