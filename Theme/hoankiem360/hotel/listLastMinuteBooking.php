<?php getHeader();
	//debug($tmpVariable);
	$lisf = getListFurniture();
	//debug($lisf);
?>
<style>
	.wr-header-bot{
		opacity: 1 !important;
	}
</style>	
        <main class="destination container">
            <ul>
                <li>Điểm Đến / </li>
                <li>  Đặt Phòng Cuối Ngày</li>
            </ul>
            <div class="row">
                <?php include __DIR__.'/../select.php' ;?>
                <div class="col-md-6 col-12 search">
                    <form action="">
                        <input type="text">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
			<div class="listDestination container">
				<div class="row">
					<div class="col-md-9 col-12" >
						
						<div class="list_hotel">
							<!-- <ul>
								<li><a href="">Tất Cả</a></li>
								<li><a href="">1 Sao</a></li>
								<li><a href="">2 Sao</a></li>
								<li><a href="">3 Sao</a></li>
								<li><a href="">4 Sao</a></li>
								<li><a href="">5 Sao</a></li>
								<li><a href="">Trung Tâm Sự Kiện, Hội Nghị</a></li>
							</ul> -->
							<div class="row">
								<?php 
									if(!empty($tmpVariable['listData'])){
										foreach ($tmpVariable['listData'] as $key => $value) { ?>
											<div class="col-md-12 col-12">
												<div class="hotel row">
													<div class="col-md-4 col-12 resetPd">
														<div class="img_listHotel">
															<img src="<?php echo $value['Hotel']['imageDefault']?>" alt="">
														</div>	
													</div>
													<div class="col-md-8 col-12">
														<div class="title_hotel">
															<a href="/chi_tiet_dat_phong_cuoi_ngay/<?php echo $value['Hotel']['slug']?>.html"><?php echo $value['Hotel']['name']?>
															<?php 
																if($value['Hotel']['point'] == 1){
																	echo'
																		<span>
																			<i class="fas fa-star"></i>
																		</span>
																	';
																}
																elseif ($value['Hotel']['point'] == 2) {
																		echo'
																		<span>
																			<i class="fas fa-star"></i>
																			<i class="fas fa-star"></i>
																		</span>
																	';
																}
																elseif ($value['Hotel']['point'] == 3) {
																		echo'
																		<span>
																			<i class="fas fa-star"></i>
																			<i class="fas fa-star"></i>
																			<i class="fas fa-star"></i>
																		</span>
																	';
																}
																elseif ($value['Hotel']['point'] == 4) {
																		echo'
																		<span>
																			<i class="fas fa-star"></i>
																			<i class="fas fa-star"></i>
																			<i class="fas fa-star"></i>
																		</span>
																	';
																}elseif ($value['Hotel']['point'] == 5) {
																		echo'
																		<span>
																			<i class="fas fa-star"></i>
																			<i class="fas fa-star"></i>
																			<i class="fas fa-star"></i>
																			<i class="fas fa-star"></i>
																		</span>
																	';
																}else{
																	echo'
																		<span>
																			<i class="fas fa-star"></i>
																		</span>
																	';
																}
															?>
															</a>
															<div class="row">
																<div class="col-md-8 col-6">
																	<p>
																		<i class="fas fa-map-marker-alt"></i>
																		<?php echo $value['Hotel']['address']?>
																	</p>
																	<ul class="list_service">
																		<?php 
																			if(!empty($value['Hotel']['furniture'])){
																				foreach ($value['Hotel']['furniture'] as $key => $furniture) {
																					foreach ($lisf as $key2 => $value2) {
																						if($furniture == $value2['id']){ ?>
																							<li><i class="fas <?php echo $value2['class']?>"></i></li>
																					<?php	}
																					}
																				}
																			}
																		?>
																	</ul> 
																	
																</div>
																<div class="col-md-4 col-6">
																	<p class="price_hotel">
																		<?php 
																			if(!empty($value['Hotel']['gia_ngay'])){
																				echo ''.number_format($value['Hotel']['gia_ngay']).'đ';
																			}else{
																				echo'Liên Hệ';
																			}
																		?>
																		
																	</p>
																	<p>Nghỉ Ngày Đêm</p>
																</div>
															</div>
															<ul class="list_bl">
																<li><i class="far fa-heart"></i> 0 Yêu Thích</li>
																<li><i class="far fa-heart"></i> 0 Bình Luận</li>
																<li><i class="far fa-heart"></i> 0 Đánh Giá</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
								<?php	}
									}
								?>
							</div>
							
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="advertisement">
							<?php
							 	$modelOption= new Option();
   								$modelAdvertisement = new Advertisement();

   								$qc=$modelAdvertisement->getPage();

   								 // debug($qc);
   								if(!empty($qc)){
   									foreach ($qc as $key => $value) { ?>
										<div class="item_advertisement">
											<a href="<?php echo $value['Advertisement']['link']?>">
												<img src="<?php echo $value['Advertisement']['image']?>" alt="">
											</a>
										</div>
   								<?php	}
   								}


	                      	?>
						</div>	
					</div>
				</div>
			</div>
			<!-- <?php
				if ($tmpVariable['page'] > 5) {
					$startPage = $tmpVariable['page'] - 5;
				} else {
					$startPage = 1;
				}

				if ($tmpVariable['totalPage'] > $tmpVariable['page'] + 5) {
					$endPage = $tmpVariable['page'] + 5;
				} else {
					$endPage = $tmpVariable['totalPage'];
				}

				if($tmpVariable['totalPage']>1){
				?>

				
				<div class="col-sm-12 wow fadeInUp  " data-wow-delay=".25s">
					<div class="direc " >
						<ul class="page-pagination__list">
							<li class="page-pagination__item"><a class="page-pagination__link" href="<?php echo $tmpVariable['urlPage'] . $tmpVariable['back'] ?>" class="prev"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
							<?php for ($i = $startPage; $i <= $endPage; $i++) { ?>
								<li class="page-pagination__item "><a  href="<?php echo $tmpVariable['urlPage'] . $i; ?>" class="page-pagination__link <?php
								if ($i == $tmpVariable['page']) {
									echo 'active';
								}
								?>"><?php echo $i; ?></a></li>
							<?php }
							?>

							<li class="page-pagination__item"><a class="page-pagination__link" href="<?php echo $tmpVariable['urlPage'] . $tmpVariable['next'] ?>" class="next"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			<?php }?>  -->
        </main>

<?php getfooter()?>