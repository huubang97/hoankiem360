
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
                <li> Di tích và danh lam</li>
            </ul>
            <div class="row">
                <div class="col-md-6">

                </div>
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
						<div class="list_New" >
							<div class="row">
								<?php
									if(!empty($tmpVariable['listData'])){
										foreach ($tmpVariable['listData'] as $key => $value) {
									 ?>
											<div class="col-md-6  col-12 ">
												<div class="item_destination" style="background-image: url(<?php echo $value['Restaurant']['image']?>);">
													<div class="title_destination">
														<a href="/chi_tiet_di_tich_lich_su/<?php echo $value['Restaurant']['urlSlug']?>.html">
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
					<div class="col-md-3 col-12">
						<div class="advertisement">
							<div class="item_advertisement">
								<img src="assets/images/hoa_binh.jpg" alt="">
							</div>
						</div>	
					</div>
				</div>
			</div>
			
        </main>

<?php getFooter()?>