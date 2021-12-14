<?php getHeader() ?>
<style>
	.wr-header {
		position: unset;
		margin-bottom: 20px;
	}
	.wr-header-top {
		background: #000;
	}
	.wr-header-bot {
		opacity: 1;
	}

	.wr-item-cate .title-content > .des {
		font-size: 1.2rem;
		height: 20px;
	}
	.line:before, .line:after {
		background: #e6e6e6;
		width: 12px;
		height: 12px;
	}
	.line:before {
		left: -10px;
	}

	.line:after {
		right: -10px;
	}

	.wr-form-res {
		padding-top: 60px;
	}
</style>
	<div class="container-fluid">
		<div class="row wr-form-res">
			<form  class="wrFormResgis" action="" method="post" name="">
				<div>
					<div class="box-resgis">
						<label class="label-title" for="logName"><span>* </span>Tên đăng nhập hoặc Email</label>
						<input type="text" value="" name="username" id="username" placeholder="Tên đăng nhập hoặc email">
						<label class="label-title" for="logName2"><span>* </span>Mật khẩu</label>
						<label class="eye"><input type="password" value="" name="password" id="password" placeholder="Mật khẩu"><span onclick="eyeShow(this)">
							<svg viewBox="64 64 896 896" focusable="false" data-icon="eye" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3a60.3 60.3 0 000 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zm-4-430c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z"></path></svg></span>
						</label>
						<button type="submit">Đăng nhập</button>
						<hr>
						<div class="box-width-regis">
							<a href=""><img src="<?php echo @$urlThemeActive ?>assets/images/resfacebook.svg" alt=""></a>
							<a href=""><img src="<?php echo @$urlThemeActive ?>assets/images/resgoogle.svg" alt=""></a>
						</div>
					</div>
				</div>
				<div class="ft-form">
					Bạn chưa có tài khoản? <a href="">Đăng ký ngay</a>
				</div>
			</form>
		</div>
	</div>
<?php getFooter() ?>