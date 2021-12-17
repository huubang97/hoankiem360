<?php getHeader(); ?>
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
</style>
	<div class="container" style="margin-bottom: 35px">
		<div class="row">
			<div class="col-3 wr-usr">
				<div class="clsFlex-center-mid">
					<a href="">Bài viết chia sẻ</a>
				</div>
				<ul>
					<li class="selected"><a href="">Quản lý bài viết</a></li>
					<li><a href="">Thông tin tài khoản</a></li>
					<li><a href="">Người đang theo dõi</a></li>
					<li><a href="">Địa điểm đã lưu</a></li>
				</ul>
			</div>
			<div class="col-9 wr-content-usr">
				<h3 hidden="hidden">Quản lý bài viết</h3>
				<div hidden="hidden" class="box-filter">
					<label for=""><img src="assets/images/logosearch.svg" alt=""><input type="text" placeholder="Tìm kiếm"></label>
					<label for=""><span>Sắp xếp</span>
						<select name="" id="">
							<option selected value="">Thời gian gần nhất</option>
							<option value="">Nhiều lượt thích nhất</option>
							<option value="">Nhiều lượt bình luận nhất</option>
							<option value="">Nhiều lượt xem nhất</option>
						</select>
					</label>
					<div class="wr-reslut-filter">
						
					</div>
				</div>
				<h3>Thông tin cá nhân</h3>
				<form class="box-info-user" action="" method="post" name="">
					<!-- <p><span>Ảnh đại diện</span></p>
					<div class="clsFlex-center-mid avatar">
						<label for="anhdaidien">
							<input hidden="hidden" type="file" id="anhdaidien">
							<img src="assets/images/photo-camera.png" alt="">
						</label>
						<button><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="delete" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z"></path></svg></button>
					</div> -->
					<div class="wr-inp-ifo">
						<label for="#lastname"><div><span>*</span>Họ</div><input id="lastname" name="fullname" value="<?php echo @$_SESSION['userInfo']['fullname'] ?>" type="text"></label>
						<label for="#name"><div><span>*</span>Tài khoản</div><input name="user"  value="<?php echo @$_SESSION['userInfo']['user'] ?>" disabled="" type="text"></label>
						<label for="#sdt"><div><span>*</span>Số điện thoại</div><input id="sdt" name="phone" value="<?php echo @$_SESSION['userInfo']['phone'] ?>" type="text"></label>
						<label for="#email"><div><span>*</span>Email</div><input id="email" name="email" value="<?php echo @$_SESSION['userInfo']['email'] ?>" type="text"></label>
						<label for="#add"><div><span>*</span>Địa chỉ</div><textarea name="address" id="add"><?php echo @$_SESSION['userInfo']['address'] ?></textarea></label>
					</div>
					<button type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>

<?php getFooter() ?>