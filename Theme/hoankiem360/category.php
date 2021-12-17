<?php getHeader();
	global $modelOption;
	global $urlHomes;
	$modelAdvertisement = new Advertisement();
   	$qc=$modelAdvertisement->getPage();

	$listCategory = $modelOption->getOption('categoryNotice');

	$listCategory2['list']= $modelOption->getcat($listCategory['Option']['value']['category'],2,'id');
	//debug($listCategory2);
	if(!empty($listNotices)) {
		foreach ($listNotices as $key => $value) {
			if(!empty($value)) {
				foreach ($value['Notice']['category'] as $key2 => $value2) {
					$nameCate= $modelOption->getcat($listCategory['Option']['value']['category'],$value2,'id');
					$listNotices[$key]['Notice']['parentCateName']=$nameCate['name'];
				}
			}
			
		}
	}
	$nameCate= $modelOption->getcat($listCategory['Option']['value']['category'],9,'id');
	//debug($listNotices);
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
</style>
<?php if($category['id']==1 || $category['parent']==1) { ?>
		<div class="wr-slide-cate">
		<?php if(!empty($qc)) { ?>
			<div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "pageDots": false, "wrapAround": true }'>
			<?php foreach ($qc as $key => $value) { ?>
			  <div class="carousel-cell">
			  	<a href="<?php  echo @$value['Advertisement']['link'] ?>">
			  		<div class="image" style="background-image: url('<?php echo @$value['Advertisement']['image'] ?>')">

			  		</div>
			  	</a>
			  </div>
			<?php
			} ?>
			</div>
		<?php 
		} ?>
		</div>	

		<div class="wr-cate">
			<div class="col-sm-12 col-md-8">
				<p class="wr-breadcrumb"><a href="">Kênh doanh nghiệp tổng hợp</a> / <a href="javascript:void(0)"><?php echo @$category['name'] ?></a></p>
				<h3>Tổng hợp tin nổi bật</h3>
				<div class="clsFlex-wrap wr-item-cate">
					<?php if(!empty($listNotices)) { 
						foreach ($listNotices as $key => $value) { ?>
						<div class="item">
							<a href="<?php echo getUrlNotice($value['Notice']['id']) ?>">
								<div class="image">
									<img src="<?php echo @$value['Notice']['image'] ?>" alt="">
								</div>
								<div class="title-content">
									<h3><?php echo @$value['Notice']['title'] ?></h3>
									<p><span><i class="fa fa-heart" aria-hidden="true"></i>0</span><span><i class="fa fa-comment" aria-hidden="true"></i>0</span><span><i class="fa fa-eye" aria-hidden="true"></i>0</span></p>
									<p class="des"><?php echo @$value['Notice']['introductory'] ?></p>
								</div>
							</a>
						</div>
						<?php 
						}
					} ?>
				</div>
			</div>
			<div class="col-sm-12 col-md-4">
				<div class="wr-qc wr-qc-cate-notice">
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
<?php }elseif($category['id']==2 || $category['parent']==2) { ?>
	<div class="container-fluid">
		<div class="wr-slide-cate">
			<?php if(!empty($qc)) { ?>
			<div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "pageDots": false, "wrapAround": true }'>
				<?php foreach ($qc as $key => $value) { ?>
				<div class="carousel-cell">
				  	<a href="<?php echo @$value['Advertisement']['link'] ?>">
				  		<div class="image"style="background-image: url('<?php echo @$value['Advertisement']['image'] ?>')">
				  		
				  		</div>
				  	</a>
				  </div>
				<?php	
				} ?>
			</div>
			<?php
			} ?>
		</div>	

		<div class="wr-cate">
			<div class="col-sm-12 col-md-8">
				<p class="wr-breadcrumb"><a href="">Kênh doanh nghiệp tổng hợp</a> / <a href="javascript:void(0)"><?php echo @$category['name'] ?></a></p>
				<h3>Tổng hợp ưu đãi</h3>
				<div class="wr-box-cate-select">
					<span>Danh mục</span>
					<select name="" id="">
						<option value="">Tất cả</option>
						<?php if(!empty($listCategory2['list'])) {
							foreach ($listCategory2['list']['sub'] as $key => $value) { ?>
								<option value="<?php echo @$value['id'] ?>"><?php echo @$value['name'] ?></option>
							<?php 
							}
						} ?>
					</select>
				</div>
				<div class="clsFlex-wrap wr-item-cate">
					<?php if(!empty($listNotices)) {
						foreach ($listNotices as $key => $value) { ?>
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
			<div class="col-sm-12 col-md-4">
				<div class="wr-qc wr-qc-cate-notice">
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
<?php }elseif($category['id']==9 || $category['parent']==9) { ?>
	<div class="container-fluid">
		<div class="row wr-slide-net-dep">
			<div class="col-12">
				<?php if(!empty($listNotices)) { ?>
				<div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "autoPlay": 5000, "pageDots": false }'>
					<?php foreach ($listNotices as $key => $value) { ?>
					<div class="carousel-cell">
				  		<div class="clsFlex-between wr-cell">
				  			<div class="content">
					  			<h3><a href="<?php echo getUrlNotice($value['Notice']['id']) ?>"><?php echo @$value['Notice']['title'] ?></a></h3>
					  			<p><?php echo @$value['Notice']['introductory'] ?></p>
					  		</div>
					  		<div class="image">
					  			<a href="<?php echo getUrlNotice($value['Notice']['id']) ?>"><img src="<?php echo @$value['Notice']['image'] ?>" alt=""></a>
					  			<div class="title"><?php echo @$value['Notice']['title'] ?></div>
					  		</div>
				  		</div>
				  	</div>
					<?php
					} ?>
				</div>
				<?php
				} ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row wr-list-net-dep-notice">
			<div class="col-12 col-md-8">
				<?php 
				if(!empty($listNotices)) {
					foreach ($listNotices as $key => $value) { ?>
					<div class="clsFlex-between item">
						<div class="image">
							<img src="<?php echo @$value['Notice']['image'] ?>" alt="">
						</div>
						<div class="content">
							<a href="<?php echo getUrlNotice($value['Notice']['id']) ?>" class="title"><?php echo @$value['Notice']['title'] ?></a>
							<p class="author"><span><?php echo @$value['Notice']['author'] ?></span><span><?php echo date('d-m-Y',$value['Notice']['time']) ?></span></p>
							<p class="des"><?php echo @$value['Notice']['introductory'] ?></p>
							<div class="clsFlex-mid more"><a href="<?php echo getUrlNotice($value['Notice']['id']) ?>">Đọc tiếp</a><span><img src="<?php echo @$urlThemeActive ?>assets/images/tinyshare.svg" alt="">0</span><span><img src="<?php echo @$urlThemeActive ?>assets/images/tinyheart.svg" alt="">0</span></div>
						</div>
					</div>
					<?php
					}
				} ?>
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
<?php }elseif($category['id']==14 || $category['parent']==14) { ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="wr-breadcrumb">
					<a href="javascript:void(0)">Kênh doanh nghiệp</a> / <a href=""><?php echo $category['name'] ?></a>
				</p>
				<p class="wr-all-cate">
					<a href="">Tất cả</a>
					<?php if(!empty($category['sub'])) { 
						foreach ($category['sub'] as $key => $value) { ?>
							<a href="<?php echo @$value['slug'] ?>.html"><?php echo @$value['name'] ?></a>
						<?php
						}
					} ?>
				</p>
			</div>
			<hr>
			<div class="col-12">
				<div class="wr-slide-all-cate">
					<div class="main-carousel" data-flickity='{"fade": true, "draggable": false, "cellAlign": "left", "contain": true, "pageDots": false }'>
						<?php if(!empty($listNotices)) {
							for ($i=0; $i <= 4; $i++) { 
								if(isset($listNotices[$i])) { ?>
								<div class="carousel-cell clsFlex-wrap item-all-cate">
							  		<div>
							  			<a href="/<?php echo $listNotices[$i]['Notice']['slug'] ?>.html" class="image">
							  				<img src="<?php echo @$listNotices[$i]['Notice']['image'] ?>" alt="">
							  			</a>
							  		</div>
							  		<div class="wr-slide-info-all-cate">
							  			<p class="name-cate"><?php echo @$listNotices[$i]['Notice']['parentCateName'] ?></p>
							  			<div class="title">
							  				<?php echo @$listNotices[$i]['Notice']['title'] ?>
							  			</div>
							  			<span class="time"><?php echo date('d-m-Y',@$listNotices[$i]['Notice']['time']) ?></span>
							  			<p class="des"><?php echo @$listNotices[$i]['Notice']['introductory'] ?></p>
							  		</div>
							  	</div>
								<?php
								}
							}
						} ?>
					  		
					</div>
				</div>	
			</div>
		</div>
		<div class="row wr-box-all-notice">
			<?php if(!empty($listNotices)) {
				foreach ($listNotices as $key => $value) { ?>
				<div class="col-12 col-md-4">
					<div class="item2-all-cate">
						<a href="<?php echo getUrlNotice($value['Notice']['id']); ?>">
							<div class="image">
								<img src="<?php echo @$value['Notice']['image'] ?>" alt="">
							</div>
							<div class="wr-slide-info-all-cate item2">
								<p class="name-cate"><?php echo @$value['Notice']['parentCateName'] ?></p>
								<span class="time"><?php echo date('d-m-Y',$value['Notice']['time']) ?></span>
								<div class="title">
									<?php echo @$value['Notice']['title'] ?>
								</div>
								<p class="des"><?php echo @$value['Notice']['introductory'] ?></p>
							</div>
						</a>
					</div>
				</div>
			<?php }
			} ?>
		</div>
		<div class="row">
			<div class="col-12">
				<?php
				if ($page > 5) {
					$startPage = $page - 5;
				} else {
					$startPage = 1;
				}

				if ($totalPage > $page + 5) {
					$endPage = $page + 5;
				} else {
					$endPage = $totalPage;
				}

				if($totalPage>=1){
					?>

					<!-- post pagination --> 
					<div class="page-pagination">
						<ul class="page-pagination__list">
							<li class="page-pagination__item"><a class="page-pagination__link"  href="<?php echo $urlPage . $back ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
							</li>
							<?php for ($i = $startPage; $i <= $endPage; $i++) { ?>
								<li class="page-pagination__item"><a class="page-pagination__link <?php echo $i==$page?'active" ':'" href="'.$urlPage.$i.'"' ?>"><?php echo $i; ?></a></li>
								<?php 
							} ?>

							<li class="page-pagination__item"><a class="page-pagination__link"  href="<?php echo $urlPage . $next ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
							</li>
						</ul>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php getFooter() ?>