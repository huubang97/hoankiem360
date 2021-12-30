
<?php 
	getHeader();
	// debug($tmpVariable['listData']);
?>
<style>
	.wr-header-bot{
		opacity: 1 !important;
	}
</style>	
	  <main class="destination container">
            <ul>
                <li>Điểm Đến / </li>
                <li> Cơ Quan Hành Chính</li>
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
					
					<div class="col-md-8 col-12" >
						<div class="list_New" >
							<div class="row">
								<?php
									if(!empty($tmpVariable['listData'])){
										foreach ($tmpVariable['listData'] as $key => $value) {
									 ?>
											<div class="col-md-6  col-12 ">
												<div class="item_destination" style="background-image: url(<?php echo $value['GovernanceAgency']['image']?>);">
													<div class="title_destination">
														<a href="/chi_tiet_co_quan_hanh_chinh/<?php echo $value['GovernanceAgency']['urlSlug']?>.html">
															<p><?php echo $value['GovernanceAgency']['name']?></p>
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
					<div class="col-md-4 col-12">
						<div class="advertisement">
							<?php
							 	$modelOption= new Option();
   								$modelAdvertisement = new Advertisement();
   								$qc=$modelAdvertisement->getPage();
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
				<?php
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
			<?php }?> 
        </main>

<?php getFooter()?>