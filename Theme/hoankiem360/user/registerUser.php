<?php getHeader();
	//debug($tmpVariable['mess']);
 ?>
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
	.gioi_tinh{
	    width: 77px;
    	float: left;
	}
	.gioi_tinh >input{
	    width: 12px;
    	float: left;
	}

	.gioi_tinh >label{
	    float: left;
    	width: 19px;
	}
</style>
<div class="container-fluid">
		<div class="row wr-form-res">
			<form  class="wrFormResgis" action="" method="post" name="">
				<div>
					<div class="box-resgis box-resgis-individual">
						<label class="label-title" for="regisName2"><span>* </span>Họ tên</label>
						<input type="text" value="" name="fullname" id="fullname" placeholder="Họ tên">
						<label class="label-title" for="regisName2"><span>* </span>Số điện thoại</label>
						<input type="text" value="" name="phone" id="phone" placeholder="Số điện thoại">
						<label class="label-title" for="regisEmail"><span>* </span>Email</label>
						<input type="email" value="" name="email" id="regisEmail" placeholder="Email">
						<label class="label-title" for="regisEmail"><span>* </span>Địa chỉ</label>
						<input type="text" value="" name="address" id="regisEmail" placeholder="Địa chỉ">
						<label class="label-title" for="regisEmail"><span>* </span>Tài khoản đăng nhập</label>
						<input type="text" value="" name="username" id="username" placeholder="Tài khoản đăng nhập">
						<label class="label-title" for="regisPass"><span>* </span>Mật khẩu</label>
						<label class="eye"><input type="password" value="" name="password" id="password" placeholder="Mật khẩu" onkeyup="keyCheck(this)"><span onclick="eyeShow(this)">
							<svg viewBox="64 64 896 896" focusable="false" data-icon="eye" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3a60.3 60.3 0 000 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zm-4-430c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z"></path></svg></span>
						</label>
						<label class="label-title" for="regisPassA"><span>* </span>Nhập lại mật khẩu</label>
						<label class="eye"><input type="password" value="" name="passwordAgain" id="passwordAgain" placeholder="Mật khẩu" onkeyup="keyCheck(this)"><span onclick="eyeShow(this)">
							<svg viewBox="64 64 896 896" focusable="false" data-icon="eye" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3a60.3 60.3 0 000 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zm-4-430c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z"></path></svg>
						</span>
						</label>
						<label class="label-title" for="regisPass"><span>* </span>Giới tính: </label>
                        <label class="eye">
                                <div class=" gioi_tinh">
                                    <input type="radio" name="sex" value="man" checked="" id="sex_man"> <label for="sex_man"> Nam </label>
                                </div>
                                <div class=" gioi_tinh">
                                    <input type="radio" name="sex" value="woman" id="sex_w"> <label for="sex_w"> Nữ </label>
                                </div>
                                <div class=" gioi_tinh">
                                    <input type="radio" name="sex" value="lgbt" id="sex_lgbt"> <label for="sex_lgbt"> LGBT </label>
                                </div>
                        </label>
						<button type="submit">Đăng kí</button>
						<hr>
						<div class="box-width-regis">
							<a href=""><img src="<?php echo @$urlThemeActive ?>assets/images/resfacebook.svg" alt=""></a>
							<a href=""><img src="<?php echo @$urlThemeActive ?>assets/images/resgoogle.svg" alt=""></a>
						</div>
					</div>
				</div>
				<div class="ft-form">
					Bạn đã có tài khoản? <a href="">Đăng nhập ngay</a>
				</div>
			</form>

			<!-- <form hidden="hidden" class="wrFormResgis" method="POST" action="">
				<div>
					<label class="label-title" for=""><span>* </span>Loại tài khoản</label>
					<label class="tab-check lbchecked" for="individual" onclick="tabLogRegis(this,'individual')">Cá nhân</label>
					<label class="tab-check" for="company" onclick="tabLogRegis(this,'company')">Doanh nghiệp</label>
					<div class="box-resgis box-resgis-company">
						<label class="label-title" for="regisName-cpn"><span>* </span>Tên doanh nghiệp</label>
						<input type="text" value="" name="typeBasis" id="regisName-cpn" placeholder="Tên doanh nghiệp">
						<label class="label-title" for="regisName2-cpn"><span>* </span>Mã số thuế</label>
						<input type="text" value="" name="typeBasis" id="regisName2-cpn" placeholder="Mã số thuế">
						<label class="label-title" for="regisAddress-cpn"><span>* </span>Địa chỉ doanh nghiệp</label>
						<input type="text" value="" name="typeBasis" id="regisAddress-cpn" placeholder="Địa chỉ doanh nghiệp">
						<label class="label-title" for="regisEmail-cpn"><span>* </span>Email</label>
						<input type="email" value="" name="typeBasis" id="regisEmail-cpn" placeholder="Email">
						<label class="label-title" for="regisPhone-cpn"><span>* </span>Điện thoại</label>
						<input type="email" value="" name="typeBasis" id="regisPhone-cpn" placeholder="Điện thoại">
						<label class="label-title" for="regisPass-cpn"><span>* </span>Mật khẩu</label>
						<label class="eye"><input type="password" value="" name="typeBasis" id="regisPass-cpn" placeholder="Mật khẩu"><span onclick="eyeShow(this)">
							<svg viewBox="64 64 896 896" focusable="false" data-icon="eye" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3a60.3 60.3 0 000 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zm-4-430c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z"></path></svg></span>
						</label>
						<label class="label-title" for="regisPassA-cpn"><span>* </span>Nhập lại mật khẩu</label>
						<label class="eye"><input type="password" value="" name="typeBasis" id="regisPassA-cpn" placeholder="Nhập lại mật khẩu"><span onclick="eyeShow(this)">
							<svg viewBox="64 64 896 896" focusable="false" data-icon="eye" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3a60.3 60.3 0 000 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zm-4-430c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z"></path></svg></span>
						</label>
						<button type="submit">Đăng kí</button>
						<hr>
						<div class="box-width-regis">
							<a href=""><img src="<?php echo @$urlThemeActive ?>assets/images/resfacebook.svg" alt=""></a>
							<a href=""><img src="<?php echo @$urlThemeActive ?>assets/images/resgoogle.svg" alt=""></a>
						</div>
					</div>
				</div>
				<div class="ft-form">
					Bạn đã có tài khoản? <a href="">Đăng nhập ngay</a>
				</div>
			</form> -->

			<form hidden='hidden' id="wrFormLogin" action="">
				<div>
					<div class="box-resgis">
						<label class="label-title" for="logName"><span>* </span>Tên đăng nhập hoặc Email</label>
						<input type="text" value="" name="typeBasis" id="logName" placeholder="Tên đăng nhập hoặc email">
						<label class="label-title" for="logName2"><span>* </span>Mật khẩu</label>
						<input type="password" value="" name="typeBasis" id="logName2" placeholder="Mật khẩu">
						<button type="submit">Đăng kí</button>
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