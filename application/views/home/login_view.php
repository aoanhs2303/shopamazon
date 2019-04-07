<div class="body-content">
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