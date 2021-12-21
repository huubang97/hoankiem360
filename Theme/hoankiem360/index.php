		<?php getHeader(); 
		global $themesettings;
		global $modelOption;
		// debug($tmpVariable['newNoticeNetDep']);
		// global $urlNow;
    	// $_SESSION['urlCallBack']= $urlNow;
		?>
		<div class="wr-banner">
			<div class="mask"></div>
			<div class="box-chevor">
				<span class="item-chevor item1"></span>
				<span class="item-chevor item2"></span>
			</div>
			<iframe allowfullscreen="" width="100%" height="100%" title="main360" src="https://digitaltc.vn/listtour/hoankiem/hoankiem12/hoankiem/"></iframe>
		</div>
		<div class="wr-banner-footer">
			<img src="<?php echo @$urlThemeActive ?>assets/images/footer-banner.svg" alt="">
		</div>
		<div class="container wr-net-dep page-section" id="netdep">
			<div class="col-12">
				<div class="net-dep">
					<h2 class="text-center"><?php echo  @$themesettings['Option']['value']['title1'] ?></h2>
					<div class="text-center cap-net-dep"><?php echo  @$themesettings['Option']['value']['Content1'] ?></div>
				</div>
			</div>
		</div>
		<div class="container-fluid wr-gallery-net-dep">
			<div class="container set-pd-col text-center">
				<div class="grid-gallery">
					<?php if(!empty($tmpVariable['newNoticeNetDep'])) {
						foreach ($tmpVariable['newNoticeNetDep'] as $key => $value) { ?>
						<div class="image" style="background:url('<?php echo @$value['Notice']['image'] ?>')">
							<a href="<?php echo getUrlNotice($value['Notice']['id']) ?>">
								<h3><?php echo @$value['Notice']['title'] ?></h3>
								<p><?php echo @$value['Notice']['introductory'] ?></p>
							</a>
							
						</div>
						<?php
						}
					} ?>
				</div>
				<a href="net-dep.html">Xem tất cả</a>
			</div>
		</div>
		<div class="container-fluid wr-gallery-dia-diem page-section" id="diemden" >
			<?php 
				$destination = destination();
				
			?>
			<div class="row">
				<div class="col-md-3 bg-gallery-col bg-gallery-col-1" style="background-image: url('<?php echo $destination[1]['image']?>');">
					<a href="<?php echo $destination[1]['urlSlug']?>">
						<h3><?php echo $destination[1]['name']?></h3>
						<span><?php echo $destination[1]['count']?> Điểm đến</span>
					</a>
				</div>
				<div class="col-md-3 bg-gallery-col bg-gallery-col-2" style="background-image: url('<?php echo $destination[2]['image']?>');">
					<a href="<?php echo $destination[2]['urlSlug']?>">
						<h3><?php echo $destination[2]['name']?></h3>
						<span><?php echo $destination[2]['count']?> Điểm đến</span>
					</a>
				</div>
				<div class="col-md-3 bg-gallery-col bg-gallery-col-3" style="background-image: url('<?php echo $destination[3]['image']?>');">
					<a href="<?php echo $destination[3]['urlSlug']?>">
						<h3><?php echo $destination[3]['name']?></h3>
						<span><?php echo $destination[3]['count']?> Điểm đến</span>
					</a>
				</div>
				<div class="col-md-3 bg-gallery-col bg-gallery-col-4" style="background-image: url('<?php echo $destination[4]['image']?>');">
					<a href="<?php echo $destination[4]['urlSlug']?>">
						<h3><?php echo $destination[4]['name']?></h3>
						<span><?php echo $destination[4]['count']?> Điểm đến</span>
					</a>
				</div>
				<div class="col-md-4 bg-gallery-col bg-gallery-col-5" style="background-image: url('<?php echo $destination[5]['image']?>');">
					<a href="<?php echo $destination[5]['urlSlug']?>">
						<h3><?php echo $destination[5]['name']?></h3>
						<span><?php echo $destination[5]['count']?> Điểm đến</span>
					</a>
				</div>
				<div class="col-md-4 clsFlex-center-mid bg-gallery-col bg-gallery-col-6">
					<a href="<?php echo $destination[1]['urlSlug']?>">
						<h3 class="text-center"><?php echo  @$themesettings['Option']['value']['title2'] ?></h3>
						<div class="text-center">
							<?php echo  @$themesettings['Option']['value']['Content2'] ?>
						</div>
					</a>
				</div>
				<div class="col-md-4 bg-gallery-col bg-gallery-col-7" style="background-image: url('<?php echo $destination[6]['image']?>');">
					<a href="<?php echo $destination[6]['urlSlug']?>">
						<h3><?php echo $destination[6]['name']?></h3>
						<span><?php echo $destination[6]['count']?> Điểm đến</span>
					</a>
				</div>
				<div class="col-md-4 bg-gallery-col bg-gallery-col-8" style="background-image: url('<?php echo $destination[7]['image']?>');">
					<a href="<?php echo $destination[7]['urlSlug']?>">
						<h3><?php echo $destination[7]['name']?></h3>
						<span><?php echo $destination[7]['count']?> Điểm đến</span>
					</a>
				</div>
				<div class="col-md-4 bg-gallery-col bg-gallery-col-9" style="background-image: url('<?php echo $destination[8]['image']?>');">
					<a href="<?php echo $destination[8]['urlSlug']?>">
						<h3><?php echo $destination[8]['name']?></h3>
						<span><?php echo $destination[8]['count']?> Điểm đến</span>
					</a>
				</div>
				<div class="col-md-4 bg-gallery-col bg-gallery-col-10" style="background-image: url('<?php echo $destination[9]['image']?>');">
					<a href="<?php echo $destination[9]['urlSlug']?>">
						<h3><?php echo $destination[9]['name']?></h3>
						<span><?php echo $destination[9]['count']?> Điểm đến</span>
					</a>
				</div>
			</div>
		</div>
		<div class="container-fluid bg-event page-section" id="sukien">
			<div class="row wr-event">
				<div class="col-md-12">
					<div class="title-event">
						<h3 class="text-center"><?php echo  @$themesettings['Option']['value']['title3'] ?></h3>
						<p class="text-center"><?php echo  @$themesettings['Option']['value']['Content3'] ?></p>
					</div>
				</div>
				<div class="col-md-12 clsFlex set-pd-col">
					<div class="box-month">
						<div class="text-center"><button><i class="fa fa-chevron-right" aria-hidden="true"></i></button></div>
						<ul hidden="hidden" class="main-carousel navc carousel-nav" data-flickity='{"asNavFor": ".navc", "cellAlign": "center", "contain": true, "draggable": false, "pageDots": false }'>
							<li class="carousel-cell text-center">Tháng 12</li>
							<li class="carousel-cell text-center">Tháng 11</li>
							<li class="carousel-cell text-center">Tháng 10</li>
							<li class="carousel-cell text-center">Tháng 9</li>
							<li class="carousel-cell text-center">Tháng 8</li>
							<li class="carousel-cell text-center selected">Tháng 7</li>
							<li class="carousel-cell text-center">Tháng 6</li>
							<li class="carousel-cell text-center">Tháng 5</li>
							<li class="carousel-cell text-center">Tháng 4</li>
							<li class="carousel-cell text-center">Tháng 3</li>
							<li class="carousel-cell text-center">Tháng 2</li>
							<li class="carousel-cell text-center">Tháng 1</li>
						</ul>
						<ul class="carousel carousel-nav nav-nav"
						  data-flickity='{ "asNavFor": ".navc", "contain": true, "pageDots": false }'>
						  	<li class="carousel-cell text-center <?php echo getdate()['mon']==12?'is-selected':'' ?>" data-month="12" onclick="loadEvent(this)">Tháng 12</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==11?'is-selected':'' ?>" data-month="11" onclick="loadEvent(this)">Tháng 11</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==10?'is-selected':'' ?>" data-month="10" onclick="loadEvent(this)">Tháng 10</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==9?'is-selected':'' ?>" data-month="9" onclick="loadEvent(this)">Tháng 9</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==8?'is-selected':'' ?>" data-month="8" onclick="loadEvent(this)">Tháng 8</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==7?'is-selected':'' ?>" data-month="7" onclick="loadEvent(this)">Tháng 7</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==6?'is-selected':'' ?>" data-month="6" onclick="loadEvent(this)">Tháng 6</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==5?'is-selected':'' ?>" data-month="5" onclick="loadEvent(this)">Tháng 5</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==4?'is-selected':'' ?>" data-month="4" onclick="loadEvent(this)">Tháng 4</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==3?'is-selected':'' ?>" data-month="3" onclick="loadEvent(this)">Tháng 3</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==2?'is-selected':'' ?>" data-month="2" onclick="loadEvent(this)">Tháng 2</li>
							<li class="carousel-cell text-center <?php echo getdate()['mon']==1?'is-selected':'' ?>" data-month="1" onclick="loadEvent(this)">Tháng 1</li>
						</ul>
						<div class="text-center"><button><i class="fa fa-chevron-left" aria-hidden="true"></i></button></div>
					</div>
					<div class="box-month-event" <?php echo empty($tmpVariable['listDataEvent'])?'style="background:#efb138;"':''; ?>>
						<?php if(!empty($tmpVariable['listDataEvent'])) { ?>
							<div class="main-carousel main-month-event" data-flickity='{ "cellAlign": "left", "contain": true, "fade": true, "pageDots": false, "draggable": false }'>
								<?php foreach ($tmpVariable['listDataEvent'] as $key => $value) { ?>
								<div class="carousel-cell clsFlex">
									<div class="box-left">
										<a class="title-event-post" href="chi_tiet_su_kien/<?php echo @$value['Event']['urlSlug'] ?>.html"><?php echo @$value['Event']['title'] ?></a>
										<hr>
										<p class="text-hidden"><?php echo @$value['Event']['introductory'] ?></p>
										<p><img src="<?php echo @$urlThemeActive ?>assets/images/map.svg" alt=""> <?php echo @$value['Event']['address'] ?></p>
										<p><img src="<?php echo @$urlThemeActive ?>assets/images/date.svg" alt=""> <?php echo @$value['Event']['dateStart'] ?> - <?php echo @$value['Event']['dateEnd'] ?></p>
										<p><img src="<?php echo @$urlThemeActive ?>assets/images/city.svg" alt=""> <?php echo @$value['Event']['address'] ?></p>
									</div>
									<div class="box-right">
										<img src="<?php echo @$value['Event']['image'] ?>" alt="">
									</div>
								</div>
								<?php
								} ?>
							</div>
						<?php }else { ?>
							<div class="carousel-cell clsFlex">
                                    <div class="clsFlex-center-mid box-left">
                                        <span class="default-event-text">Chưa có sự kiện nào đang diễn ra.</span>
                                    </div>
                                    <div class="box-right">
                                        <img src="<?php echo @$urlThemeActive ?>assets/images/imageevent.svg" alt="">
                                    </div>
                                </div>
						<?php
						} ?>
					</div>

				</div>
				<div class="col-12 text-center">
					<a class="virew-more" href="su_kien">Xem tất cả</a>
				</div>
			</div>
		</div>
		<div class="container-fluid wr-blog page-section" id="blogdulich">
			<div class="row">
				<div class="col-md-12 title-blog">
					<h3 class="text-center"><?php echo  @$themesettings['Option']['value']['title4'] ?></h3>
					<p class="text-center"><?php echo  @$themesettings['Option']['value']['Content4'] ?></p>
				</div>
				<div class="col-md-12 clsFlex">
					<div class="blog-box blog-box1 selected" onmouseover="mouseover(this);">
						<a href="<?php echo @$tmpVariable['listCategoryBlog']['sub'][10]['slug'] ?>.html">
							<div class="mask">
								<div>
									<div>
										<img src="<?php echo @$urlThemeActive ?>assets/images/logobox1.svg" alt="">
										<h3><?php echo @$tmpVariable['listCategoryBlog']['sub'][10]['name'] ?></h3>
										<p class="text-center"><?php echo $tmpVariable['listCategoryBlog']['sub'][10]['description'] ?></p>
										<button>Khám phá ngay</button>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="blog-box blog-box2" onmouseover="mouseover(this);">
						<a href="<?php echo @$tmpVariable['listCategoryBlog']['sub'][11]['slug'] ?>.html">
							<div class="mask">
								<div>
									<div>
										<img src="<?php echo @$urlThemeActive ?>assets/images/logobox2.svg" alt="">
										<h3><?php echo @$tmpVariable['listCategoryBlog']['sub'][11]['name'] ?></h3>
										<p class="text-center"><?php echo $tmpVariable['listCategoryBlog']['sub'][11]['description'] ?></p>
										<button>Khám phá ngay</button>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="blog-box blog-box3" onmouseover="mouseover(this);">
						<a href="<?php echo @$tmpVariable['listCategoryBlog']['sub'][12]['slug'] ?>.html">
							<div class="mask">
								<div>
									<div>
										<img src="<?php echo @$urlThemeActive ?>assets/images/logobox3.svg" alt="">
										<h3><?php echo @$tmpVariable['listCategoryBlog']['sub'][12]['name'] ?></h3>
										<p class="text-center"><?php echo $tmpVariable['listCategoryBlog']['sub'][12]['description'] ?></p>
										<button>Khám phá ngay</button>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="blog-box blog-box4" onmouseover="mouseover(this);">
						<a href="<?php echo @$tmpVariable['listCategoryBlog']['sub'][13]['slug'] ?>.html">
							<div class="mask">
								<div>
									<div>
										<img src="<?php echo @$urlThemeActive ?>assets/images/logobox4.svg" alt="">
										<h3><?php echo @$tmpVariable['listCategoryBlog']['sub'][13]['name'] ?></h3>
										<p class="text-center"><?php echo $tmpVariable['listCategoryBlog']['sub'][13]['description'] ?></p>
										<button>Khám phá ngay</button>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid wr-company page-section" id="kenhdoanhnghiep">
			<div class="row">
				<div class="col-md-12 title-blog">
					<h3 class="text-center"><?php echo  @$themesettings['Option']['value']['title5'] ?></h3>
					<p class="text-center"><?php echo  @$themesettings['Option']['value']['Content5'] ?></p>
				</div>
			</div>
			<div class="row clsFlex-wrap">
				<div class="link-slide">
					<h3>Tin nổi bật</h3>
					<a href="/tin-noi-bat.html">Xem tất cả</a>
				</div>
				<div class="wr-slide-link">
					<div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "draggable": false, "pageDots": false }'>
						<?php 
							global $modelNotice;
                			$notice= $modelNotice->getOtherNotice(array((int)  $themesettings['Option']['value']['idCateNotice']),6);
                			
                			if(!empty($notice)){
                				foreach ($notice as $key => $value) { ?>
                				<div class="carousel-cell">
							  		<a href="/<?php echo $value['Notice']['slug']?>.html">
							  			<div class="image">
							  				<img src="<?php echo $value['Notice']['image']?>" alt="">
							  			</div>
							  			<div class="title-content">
							  				<h3><?php echo $value['Notice']['title']?></h3>
							  				<!-- <p><span><i class="fa fa-heart" aria-hidden="true"></i>0</span><span><i class="fa fa-comment" aria-hidden="true"></i>0</span><span><i class="fa fa-eye" aria-hidden="true"></i>0</span></p> -->
							  				<p class="des"><?php echo $value['Notice']['introductory']?></p>
							  			</div>
							  		</a>
							  	</div>
                		<?php }
                			}
						?>
					  	
					</div>
				</div>
			</div>
			<div class="row clsFlex-wrap">
				<div class="link-slide">
				</div>
				<div class="wr-slide-link">
					<hr>
				</div>
			</div>

			
			<div class="row clsFlex-wrap">
				<div class="link-slide">
					<h3>Khuyến mãi</h3>
					<a href="/uu-dai-khuyen-mai.html">Xem tất cả</a>
				</div>
				<div class="wr-slide-link wr-slide-link-card">
					<div class="navs-tab">
						<a class="selected" href="">Ẩm thực</a>
						<a href="">Giải trí</a>
						<a href="">Giáo dục</a>
						<a href="">Mua sắm</a>
						<a href="">Giao thông</a>
						<a href="">Y tế</a>
					</div>
					<div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "draggable": false, "pageDots": false }'>
						<?php 
							global $modelNotice;
							$notice= $modelNotice->getOtherNotice(array((int)  $themesettings['Option']['value']['idCateNotice1']),6);
							if(!empty($notice)){
								foreach ($notice as $key => $value) { ?>
										<div class="carousel-cell">
									  		<a href="/<?php echo $value['Notice']['slug']?>.html">
									  			<div class="image">
									  				<img src="<?php echo $value['Notice']['image']?>" alt="">
									  			</div>
									  			<div class="title-content">
									  				<h3><?php echo $value['Notice']['title']?></h3>
									  				<div class="line"></div>
									  				<p class="des"><?php echo date('d/m/y', $value['Notice']['time']) ?></p>
									  			</div>
									  		</a>
									  	</div>
							<?php }
							}
						?>
					  	
					</div>
				</div>
			</div>			
		</div>
		<div class="container-fluid wr-map page-section" id="bando">
			<div class="row">
				<div class="col-md-12 title-blog">
					<h3 class="text-center"><?php echo  @$themesettings['Option']['value']['title6'] ?></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 set-pd-col clsFlex-wrap" style="overflow: hidden;">
					<div class="menu-map">
						<div class="box-menu-map">
							<div><span class="cursor-pointer" onclick="btnMenu(this)"><i class="fa fa-bars" aria-hidden="true"></i></span>
								<span data-toggle="collapse" data-target="#box-check" class="cursor-pointer hidden-pc" onclick="btnMenu2(this)"><i class="fa fa-bars" aria-hidden="true"></i></span>
							</div>
							<ul id="box-check" class="collapse show">
								<li>
									<input id="check-all" type="checkbox">
									<label class="noselect" for="check-all">Chọn tất cả</label>
								</li>
								<li>
									<input id="check-all1" type="checkbox">
									<label class="noselect" for="check-all1">Khu vực hoàn kiếm</label>
								</li>
								<li>
									<input id="check-all2" type="checkbox">
									<label class="noselect" for="check-all2">Khu vực hai bà trưng</label>
								</li>
							</ul>
						</div>
					</div>
					<div class="iframe-map">
						<button onclick="btnMenu(this)"><i class="fa fa-bars" aria-hidden="true"></i></button>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12526.661815276344!2d105.84666190538307!3d21.024728503940896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac69f861af3f%3A0x331250d72cd2fa28!2zSOG7kyBHxrDGoW0!5e0!3m2!1svi!2s!4v1638263780573!5m2!1svi!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid page-section" id="vietnam360">
			<div class="row">
				<div class="col-md-12 title-blog">
					<h3 class="text-center"><?php echo  @$themesettings['Option']['value']['title7'] ?></h3>
					<p class="text-center"><?php echo  @$themesettings['Option']['value']['Content7'] ?></p>
				</div>
			</div>
			<div class="row wr-slide-tinh" >
				<div class="col-md-12">
					<div class="main-carousel" data-flickity='{"imagesLoaded": true, "cellAlign": "left", "contain": true, "pageDots": false, "draggable": false }'>
						<?php 
    						$modelImage360 = new Image360();
    						$img360 = $modelImage360->getPage();
    						if(!empty($img360)){
    							foreach ($img360 as $key => $value) { ?>
    								<div class="carousel-cell">
								  		<div class="image">
								  			<a target="_blank" href="<?php echo $value['Image360']['link']?>"><img src="<?php echo $value['Image360']['image']?>" alt=""></a>
								  		</div>
								  	</div>
    					<?php	}
    						}
						?>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('#idhome').attr('href','javascript:void(0)');
				$('#idnetdep').attr('href','#netdep');
				$('#iddiemdien').attr('href','#diemden');
				$('#idsukien').attr('href','#sukien');
				$('#idblog').attr('href','#blogdulich');
				$('#idkenhdoanhnghiep').attr('href','#kenhdoanhnghiep');
				$('#idbando').attr('href','#bando');
				$('#idvietnam360').attr('href','#vietnam360');
			});
		</script>
		<?php getFooter(); ?>
		