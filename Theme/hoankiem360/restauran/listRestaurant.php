
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
                <li> Nhà Hàng Quán Ăn</li>
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
												<div class="item_destination" style="background-image: url(<?php echo $value['Restaurant']['image']?>);">
													<div class="title_destination">
														<a href="/chi_tiet_nha_hang/<?php echo $value['Restaurant']['urlSlug']?>.html">
															<p><?php echo $value['Restaurant']['name']?></p>
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
			
        </main>

<?php getFooter()?>