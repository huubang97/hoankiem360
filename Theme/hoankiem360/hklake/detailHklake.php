<?php 
	getHeader();
 ?>

 <style>
	.wr-header-bot{
		opacity: 1 !important;
	}
</style>
  <main class="detailDestination" >
  	<?php 
  		if(!empty($tmpVariable['data']['Hklake']['image360'])){ ?>
  			<div class="ifram_destination">
				<?php echo $tmpVariable['data']['Hklake']['image360'] ?>
			</div>
  <?php	}
  	?>
			
			<ul class="container">
				<li><a href="">Điểm Đến / </a></li>
				<li><a href="">Hồ Hoàn Kiếm / </a></li>
				<li><a href=""><?php echo $tmpVariable['data']['Hklake']['name']?></a></li>
			</ul>
			<div class="detail_destination container">
				<div class="row">
					<div class="col-md-8 col-12">
						
						<h1><?php echo $tmpVariable['data']['Hklake']['name']?></h1>
						<div class="list_cmt">
							<p><i class="far fa-heart"></i> 10</p>
							<p><i class="fas fa-share-alt"></i> 10</p>
							<p><i class="far fa-star"></i> 10</p>
						</div>
						<?php echo $tmpVariable['data']['Hklake']['content']?>
						<div class="list_cmt" style="padding: 10px 0px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
							<p><i class="far fa-heart"></i> 10</p>
							<p><i class="fas fa-share-alt"></i> 10</p>
							<p><i class="far fa-star"></i> 10</p>
						</div>
						<div class="comment" style="display: none;">
							<p>Bình Luận (14)</p>
							<div class="item_comment">
								<div class="item_comment_top">
									<div class="comment_top_right">
										<img src="assets/images/ha_noi.jpg" alt="">
										<div class="user_comment">
											<p>Thái Anh Tuấn</p>
											<label>12/11/2021</label>
										</div>
									</div>
									<div class="comment_top_left">
										<button class="btn-clearcmt "><i class="fas fa-ellipsis-v"></i></button>
										<p class="repost_cmt">Tố Cáo Bình Luận</p>
									</div>
								</div>
								<div class="item_comment_bottom">
									<p>Quá Đẹp Trai</p>
								</div>
							</div>
							<div class="item_comment">
								<div class="item_comment_top">
									<div class="comment_top_right">
										<img src="assets/images/ha_noi.jpg" alt="">
										<div class="user_comment">
											<p>Thái Anh Tuấn</p>
											<label>12/11/2021</label>
										</div>
									</div>
									<div class="comment_top_left">
										<button type="button" class="btn-clearcmt " onclick="clear(this)"><i class="fas fa-ellipsis-v"></i></button>
										<p class="repost_cmt">Tố Cáo Bình Luận</p>
									</div>
								</div>
								<div class="item_comment_bottom">
									<p>Quá Đẹp Trai</p>
								</div>
							</div>
							<div class="item_comment">
								<div class="item_comment_top">
									<div class="comment_top_right">
										<img src="assets/images/ha_noi.jpg" alt="">
										<div class="user_comment">
											<p>Thái Anh Tuấn</p>
											<label>12/11/2021</label>
										</div>
									</div>
									<div class="comment_top_left">
										<button class="btn-clearcmt "><i class="fas fa-ellipsis-v"></i></button>
										<p class="repost_cmt">Tố Cáo Bình Luận</p>
									</div>
								</div>
								<div class="item_comment_bottom">
									<p>Quá Đẹp Trai</p>
								</div>
							</div>
							<div class="item_comment">
								<div class="item_comment_top">
									<div class="comment_top_right">
										<img src="assets/images/ha_noi.jpg" alt="">
										<div class="user_comment">
											<p>Thái Anh Tuấn</p>
											<label>12/11/2021</label>
										</div>
									</div>
									<div class="comment_top_left">
										<button class="btn-clearcmt "><i class="fas fa-ellipsis-v"></i></button>
										<p class="repost_cmt">Tố Cáo Bình Luận</p>
									</div>
								</div>
								<div class="item_comment_bottom">
									<p>Quá Đẹp Trai</p>
								</div>
							</div>
							<div class="item_comment">
								<div class="item_comment_top">
									<div class="comment_top_right">
										<img src="assets/images/ha_noi.jpg" alt="">
										<div class="user_comment">
											<p>Thái Anh Tuấn</p>
											<label>12/11/2021</label>
										</div>
									</div>
									<div class="comment_top_left">
										<button class="btn-clearcmt "><i class="fas fa-ellipsis-v"></i></button>
										<p class="repost_cmt">Tố Cáo Bình Luận</p>
									</div>
								</div>
								<div class="item_comment_bottom">
									<p>Quá Đẹp Trai</p>
								</div>
							</div>
						</div>
						<div class="write_cmt">
							<textarea name="" id="" style="width: 100%; height: 104px;" placeholder="Viết bình luận"></textarea>
							<br>
							<button>Bình Luận</button>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="info_placeDetail">
							<p><i class="fas fa-map-marker-alt"></i> <?php echo $tmpVariable['data']['Hklake']['address']?></p>
							<p><i class="fas fa-clock"></i> 0h - 24h</p>
						</div>
						<div class="list_New">
							<p style="padding: 10px 0px; font-weight: 400">CÁC ĐIỂM ĐẾN XEM NHIỀU</p>
							<div class="row">
								<?php 
									if(!empty($tmpVariable['otherData'])){
										foreach ($tmpVariable['otherData'] as $key => $value) { ?>
											<div class="col-md-12  col-12 " >
												<div class="item_destination" style="background-image: url(<?php echo $value['Hklake']['image']?>);">
													<div class="title_destination">
														<a href="/chi_tiet_di_tich_lich_su/<?php echo $value['Hklake']['urlSlug'] ?>.html">
															<p><?php echo $value['Hklake']['name'] ?></p>
															<ul>
																<li><i class="fas fa-heart"></i> 0</li>
																<li><i class="fas fa-comment"></i> 0</li>
																<li><i class="far fa-star"></i> 0</li>
																<li><i class="far fa-eye"></i> 0</li>	
															</ul>
														</a>
														
													</div>
												</div>
											</div>		
								<?php }
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
        </main>
 <?php getFooter()?>