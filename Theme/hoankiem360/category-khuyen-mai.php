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
</style>
	<div class="container-fluid">
		<div class="row">
			<div class="wr-slide-cate">
				<div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "pageDots": false, "wrapAround": true }'>
				  <div class="carousel-cell">
				  	<a href="">
				  		<div class="image"style="background-image: url('<?php echo @$urlThemeActive ?>assets/images/slide-cate-notice.png')">
				  		
				  		</div>
				  	</a>
				  </div>
				  <div class="carousel-cell">
				  	<a href="">
				  		<div class="image"style="background-image: url('<?php echo @$urlThemeActive ?>assets/images/slide-cate-notice2.png')">
				  		
				  		</div>
				  	</a>
				  </div>
				  <div class="carousel-cell">
				  	<a href="">
				  		<div class="image"style="background-image: url('<?php echo @$urlThemeActive ?>assets/images/slide-cate-notice3.png')">
				  		
				  		</div>
				  	</a>
				  </div>
				</div>
			</div>	

			<div class="wr-cate">
				<div class="col-sm-12 col-md-8">
					<p class="wr-breadcrumb"><a href="">Kênh doanh nghiệp tổng hợp</a> / <a href="">Tin nổi bật</a></p>
					<h3>Tổng hợp ưu đãi</h3>
					<div class="wr-box-cate-select">
						<span>Danh mục</span>
						<select name="" id="">
							<option value="">Tất cả</option>
							<option value="">Ẩm thực</option>
							<option value="">Giải trí</option>
							<option value="">Giáo dục</option>
							<option value="">Mua sắm</option>
							<option value="">Giao thông</option>
							<option value="">Y tế</option>
						</select>
					</div>
					<div class="clsFlex-wrap wr-item-cate">
						<div class="item">
							<a href="">
								<div class="image">
									<img src="<?php echo @$urlThemeActive ?>assets/images/hoi-nghi.png" alt="">
								</div>
								<div class="title-content">
									<h3>IPP hợp tác với Lotte mở cửa hàng miễn thuế ở Tràng Tiền Plaza: Thu hút khách du lịch trên thế giới đến mua sắm tại Việt Nam</h3>
									<div class="line"></div>
									<p class="des">30/11/2021 - 30/11/2021</p>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="">
								<div class="image">
									<img src="<?php echo @$urlThemeActive ?>assets/images/hoi-nghi.png" alt="">
								</div>
								<div class="title-content">
									<h3>IPP hợp tác với Lotte mở cửa hàng miễn thuế ở Tràng Tiền Plaza: Thu hút khách du lịch trên thế giới đến mua sắm tại Việt Nam</h3>
									<div class="line"></div>
									<p class="des">30/11/2021 - 30/11/2021</p>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="">
								<div class="image">
									<img src="<?php echo @$urlThemeActive ?>assets/images/hoi-nghi.png" alt="">
								</div>
								<div class="title-content">
									<h3>IPP hợp tác với Lotte mở cửa hàng miễn thuế ở Tràng Tiền Plaza: Thu hút khách du lịch trên thế giới đến mua sắm tại Việt Nam</h3>
									<div class="line"></div>
									<p class="des">30/11/2021 - 30/11/2021</p>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="">
								<div class="image">
									<img src="<?php echo @$urlThemeActive ?>assets/images/hoi-nghi.png" alt="">
								</div>
								<div class="title-content">
									<h3>IPP hợp tác với Lotte mở cửa hàng miễn thuế ở Tràng Tiền Plaza: Thu hút khách du lịch trên thế giới đến mua sắm tại Việt Nam</h3>
									<div class="line"></div>
									<p class="des">30/11/2021 - 30/11/2021</p>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="wr-qc wr-qc-cate-notice">
						<div class="image">
							<img src="<?php echo @$urlThemeActive ?>assets/images/banner-qc.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php getFooter() ?>