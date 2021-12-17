<?php
	getHeader();
	//debug($tmpVariable['data']);
	//debug($tmpVariable['otherData']);
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
</style>
<div class="container">
			<div class="row">
				<div class="col-12 col-md-8">
					<p class="wr-breadcrumb"><a href="">Nét đẹp hoàn kiếm</a> / <a href=""><?php echo @$tmpVariable['data']['Event']['title'] ?></a></p>
					<h1 class="title-notice"><?php echo @$tmpVariable['data']['Event']['title'] ?></h1>
					<div class="clsFlex-between ifo-tacgia">
						<div class="clsFlex-mid">
							<img src="<?php echo @$urlThemeActive ?>assets/images/logo.svg" alt="">
							<p class="name">
								<span><?php echo @$tmpVariable['data']['Event']['author'] ?></span>
								<span class="time"><?php echo @$tmpVariable['data']['Event']['dateStart'] ?></span>
							</p>
							<div class="wr-flow">
								<a href="">Theo dõi</a>
								<a href="">Báo cáo</a>
							</div>
						</div>
						<div class="clsFlex-mid">
								<span><img src="<?php echo @$urlThemeActive ?>assets/images/share.svg" alt="">21</span>
								<span><img src="<?php echo @$urlThemeActive ?>assets/images/heart.svg" alt="">21</span>
						</div>
					</div>
					<div class="intro"><?php echo @$tmpVariable['data']['Event']['introductory'] ?></div>
					<div class="content-notice">
						<?php echo @$tmpVariable['data']['Event']['content'] ?>
					</div>
					<div class="wr-tuongtac">
						<span><img src="<?php echo @$urlThemeActive ?>assets/images/share.svg" alt="">20</span>
						<span><img src="<?php echo @$urlThemeActive ?>assets/images/heart.svg" alt="">20</span>
					</div>
					<div class="wr-comment">
						<p class="title-comment">Bình luận (0)</p>
						<textarea placeholder="Viết bình luận của bạn" name="" id=""  rows="5">
							
						</textarea>
						<a href="">Bình luận</a>
					</div>
					<div class="wr-relationship">
						<p class="title-comment">Bài viết liên quan</p>
						<div class="clsFlex content-relationship">
							<?php if(!empty($tmpVariable['otherData'])) { 
								foreach ($tmpVariable['otherData'] as $key => $value) { ?>
								<div class="item">
									<a href="chi_tiet_su_kien/<?php echo @$value['Event']['urlSlug'] ?>.html">
										<div class="image">
											<img src="<?php echo @$value['Event']['image'] ?>" alt="">
										</div>
										<p class="title"><?php echo @$value['Event']['title'] ?></p>
										<p class="name">Nguyễn Việt Dũng</p>
										<p class="time"><?php echo date('d-m-Y', $value['Event']['created']->sec) ?></p>
									</a>
								</div>
								<?php
								}
							} ?>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="wr-qc">
						<div class="image">
							<img src="<?php echo @$urlThemeActive ?>assets/images/banner-qc.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
 <?php getFooter(); ?>