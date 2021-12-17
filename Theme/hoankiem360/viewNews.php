<?php getHeader();
global $urlHomes;
	$modelAdvertisement = new Advertisement();
   	$qc=$modelAdvertisement->getPage();
	if(!empty($chuyenmuc['Option']['value']['category']) && !empty($infoNotice['Notice']['category'])){
		foreach ($chuyenmuc['Option']['value']['category'] as $key => $value) {
			if($value['id']==$infoNotice['Notice']['category'][0]) {
				$nameCateNotice = $value['name'];
				$slugCateNotice = $value['slug'];
			}
		}
	}
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
					<p class="wr-breadcrumb"><a href="javascript:void(0)">Kênh doanh nghiệp</a><a href="<?php echo $urlHomes.$slugCateNotice ?>.html"><?php echo $nameCateNotice ?></a> / <a href=""><?php echo @$infoNotice['Notice']['title'] ?></a></p>
					<h1 class="title-notice"><?php echo @$infoNotice['Notice']['title'] ?></h1>
	
					<div class="intro"><?php echo @$infoNotice['Notice']['introductory'] ?></div>
					<div class="content-notice">
						<?php echo @$infoNotice['Notice']['content'] ?>
					</div>
					<div class="wr-relationship">
						<p class="title-comment">Bài viết liên quan</p>
						<div class="clsFlex-wrap wr-item-cate wr-item-cate-detail">
							<?php if(!empty($otherNotices)) {
								foreach ($otherNotices as $key => $value) { ?>
								<div class="item">
									<a href="<?php echo getUrlNotice($value['Notice']['id']) ?>">
										<div class="image">
											<img src="<?php echo @$value['Notice']['image'] ?>" alt="">
										</div>
										<div class="title-content">
											<h3><?php echo @$value['Notice']['title'] ?></h3>
											<div class="line"></div>
											<p class="des"><?php echo date('d-m-Y',$value['Notice']['time']) ?></p>
										</div>
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
						<?php if(!empty($qc)) { 
							foreach ($qc as $key => $value) { ?>
							<div class="image">
								<a href="<?php echo @$value['Advertisement']['link'] ?>"><img src="<?php echo @$value['Advertisement']['image'] ?>" alt=""></a>
							</div>
							<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
<?php getFooter() ?>