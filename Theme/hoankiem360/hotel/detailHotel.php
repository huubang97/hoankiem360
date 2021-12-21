
 <?php getHeader()?>

<style>
	.wr-header-bot{
		opacity: 1 !important;
	}
</style>	
 	<main class="detail_hotel container">
			<ul class="">
				<li><a href="">Điểm Đến / </a></li>
				<li><a href="">Khách sạn và trung tâm hội nghị, sự kiện / </a></li>
				<li><a href=""><?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['name'];?></a></li>
			</ul>
			 <?php 
	
	//debug($tmpVariable['data']);
	//debug($_SESSION['userInfo']);
 ?>
 <style type="text/css">
 	.infor_hotel a:hover {
    text-decoration: none;
    color: #ffffff;
}


 </style>
			<h1><?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['name'];?></h1>
			<p><i class="fas fa-map-marker-alt"></i> <?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['address'];?></p>
			<div class="infor_hotel">
				<div class="row">
					<div class="col-md-8 col-12">
						<div class="row imglist">
							<div class="col-md-6 col-6">
								<div class="img-hotel">
									<a href="<?php echo $tmpVariable['data']['HotelManmo']['data']['Hotel']['image'][0]; ?>" data-fancybox="images" >
									    <img src="<?php echo $tmpVariable['data']['HotelManmo']['data']['Hotel']['image'][0]; ?>" />
									 </a>
								</div>
								
								<div class="img-hotel">
									<a href="<?php echo $tmpVariable['data']['HotelManmo']['data']['Hotel']['image'][1]; ?>" data-fancybox="images" >
									    <img src="<?php echo $tmpVariable['data']['HotelManmo']['data']['Hotel']['image'][1]; ?>" />
									 </a>
								</div>
							</div>
							<div class="col-md-6 col-6">
								<div class="img-hotel1">
										<a href="<?php echo $tmpVariable['data']['HotelManmo']['data']['Hotel']['image'][2]; ?>" data-fancybox="images" >
									    <img src="<?php echo $tmpVariable['data']['HotelManmo']['data']['Hotel']['image'][2]; ?>" />
									 </a>
								</div>
							</div>
							<div class="img" style="display: none;">
								<?php 
									if(!empty($tmpVariable['data']['HotelManmo']['data']['Hotel']['image'])){
										$countImg= count($tmpVariable['data']['HotelManmo']['data']['Hotel']['image']);
										for ($i=3; $i < $countImg ; $i++) { ?>
										<a href="<?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['image'][$i]?>" data-fancybox="images" >
										    <img src="<?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['image'][$i]?>" />
										 </a>
									<?php }
									}
								?>
								
							</div>
						</div>
						<button>Xem chỉ đường</button>
					</div>
					<div class="col-md-4 col-12">
					<?php 
                    if(!empty($tmpVariable['data']['HotelManmo']['data']['Hotel']['furniture'])){?>
						<div class="service_hotel">
							<p>Tiện nghi dịch vụ</p>
							<div class="row list_service">
							<?php foreach ($tmpVariable['data']['HotelManmo']['data']['Hotel']['furniture'] as $furniture) { ?>	
								<div class="col-6 col-md-6 ">
									<p><i class="far fa-check-circle"></i>  <?php echo $tmpVariable['listFurniture'][$furniture]['name']  ?> </p>
								</div>
							<?php } ?>
							</div>

						</div>
					<?php   }?>
					</div>
				</div>
				<?php if(!empty($_SESSION['userInfo'])){  ?>
					<button class="btn_booking btn_pop_book">Đặt Phòng</button>
				<?php }else{ ?>	
					<a class="btn_booking" href="/dang_nhap">Đặt Phòng</a>
				<?php } ?>
				
			</div>
		</main>
		<div class="booking" style="background-image: url(<?php echo @$urlThemeActive ?>assets/images/bg-pho-net-dep.svg); background-repeat: no-repeat; background-size: cover;">
			<form action="" method="post"  >
				<button class="click_form click_forms clear_btn">
					<i class="fas fa-times "></i>
				</button>
				<p>Đặt phòng</p>
				<div class="row">
					<div class="col-md-6">
						<p>Họ Tên</p>
						<input type="text"  name="name"  required="" id="name" value="<?php echo @$_SESSION['userInfo']['fullname']; ?>">
					</div>
					<div class="col-md-6">
						<p>Số điện thoại</p>
						<input type="text" name="phone" required="" id="phone" value="<?php echo @$_SESSION['userInfo']['phone']; ?>">
					</div>
					<div class="col-md-6">
						<p>Email</p>
						<input type="text" required="" name="email" id="email" value="<?php echo @$_SESSION['userInfo']['email']; ?>">
					</div>
					<div class="col-md-6">
						<p>Ngày vào dự kiến</p>
						<!-- <input type="text" id="date_start" required="" autocomplete="off"	> -->
						<input type="text" value="" name="date_start" id="date_start" class="input_date form-control" required="" onclick="tinhthoigian();" onchange="tinhthoigian();" autocomplete="off">
					</div>
					<div class="col-md-6">
						<p>Ngày ra dự kiến</p>
						<!-- <input type="text" id="date_end"> -->
						<input type="text" value="" name="date_end" id="date_end" class="input_date form-control" required="" onclick="tinhthoigian();" onchange="tinhthoigian();" autocomplete="off">
					</div>
					<div class="col-md-6">
						<p>Hình thức nghỉ</p>
						<select name="type_register" id="type_register" onchange="tinhphi();">
							<option value="" data-imagesrc="">Hình thức nghỉ </option>
                            <option value="gia_theo_gio" data-imagesrc="">Nghỉ giờ</option>
                            <option value="gia_theo_dem" data-imagesrc="">Nghỉ đêm</option>
                            <option value="gia_theo_ngay" data-imagesrc="">Nghỉ ngày</option>
						</select>
					</div>
					<div class="col-md-6">
						<p>Loại phòng</p>
						<select name="typeRoom" id="typeRoom" onchange="tinhphi();">
							<option value="">Chọn loại phòng</option>
							<?php if (!empty($tmpVariable['data']['HotelManmo']['listTypeRoom'])){
									foreach($tmpVariable['data']['HotelManmo']['listTypeRoom'] as $keytype => $typeRoom){?>
										<option value="<?php echo $typeRoom['TypeRoom']['id'] ?>"><?php echo $typeRoom['TypeRoom']['roomtype'] ?></option>

							<?php }} ?>
								
						</select>
					</div>
					<div class="col-md-6">
						<p>Số người</p>
						<input type="number" name="number_people" id="number_people"  required=""  value="" min="1" >
					</div>
					<div class="col-md-6">
						<p>Số phòng</p>
						<input type="number" name="number_room" id="number_room" required="" value="" min="1" onchange="tinhphi();">
					</div>
					<div class="col-md-6">
						<p>Thời gian dự kiến</p>
						<input type="text" name="timePay" id="timePay" value="" required="" disabled="" placeholder="Thời gian ở">
					</div>
					<div class="col-md-6">
						<p>Chi phí dự kiến</p>
						<input type="text" name="pricePay" id="pricePay" value="" required=""  disabled="" placeholder="Chi phí dự kiến">
					</div>
					<div class="col-md-12" style=" margin-top: 55px;">
						<button type="button" class="btn_booking btn_dp" onclick="resetTinh();">Đặt Phòng</button>
					</div>
				</div>
			</form>
			<div class="click_forms remover_form"></div>
		</div>
		<div class="container">
			<div class="information_hotel">
				<h2>Thông Tin Liên Hệ <?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['name'];?></h2>
				<ul>
					<li>Điện thoại: <span><?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['phone'];?></span></li>
					<li>Điạ chỉ: <span><?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['address'];?></span></li>
					<li>Email: <span><?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['email'];?></span></li>
				</ul>
			</div>

			<div class="information_hotel">
				<h2>Giới Thiệu <?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['name'];?></h2>
				 <?php
                        if(empty($tmpVariable['data']['HotelManmo']['data']['Hotel']['info'])){
                            $numberRoomText= (!empty($tmpVariable['data']['HotelManmo']['data']['Hotel']['numberRoom']))?$tmpVariable['data']['HotelManmo']['data']['Hotel']['name'].' có quy mô '.$tmpVariable['data']['HotelManmo']['data']['Hotel']['numberRoom'].' phòng, ':'';
                            $pointText= (!empty($tmpVariable['data']['HotelManmo']['data']['Hotel']['point']))?' và họ đã cho '.$tmpVariable['data']['HotelManmo']['data']['Hotel']['point'].' điểm sau khi nghỉ tại đây':'';

                            $tmpVariable['data']['HotelManmo']['data']['Hotel']['info']= $tmpVariable['data']['Hotel']['name'].' là một '.$tmpVariable['data']['HotelManmo']['typeHotel'].' đẹp có địa chỉ ngay tại '.$tmpVariable['data']['HotelManmo']['data']['Hotel']['address'].', đường đi rất thuận tiện và dễ tìm. '.$tmpVariable['data']['HotelManmo']['data']['Hotel']['name'].' có đội ngũ nhân viên chuyên nghiệp, luôn cố gắng phục vụ mọi nhu cầu của khách hàng, vui lòng khách đến, vừa lòng khách đi, '.$numberRoomText.'phòng ốc của '.$tmpVariable['data']['HotelManmo']['data']['Hotel']['name'].' sạch đẹp, đầy đủ tiện ích trong phòng, có đầy đủ nóng lạnh, internet. Các cặp đôi đặc biệt thích địa điểm '.$tmpVariable['data']['HotelManmo']['data']['Hotel']['name'].$pointText.'. Chỗ nghỉ này cũng được đánh giá là đáng giá tiền nhất ở quanh khu vực, bạn sẽ tiết kiệm được nhiều hơn so với các chỗ nghỉ khác. ';
                        }

                        echo $tmpVariable['data']['HotelManmo']['data']['Hotel']['info'];
                    ?>
			</div>

			<?php
				if(!empty($tmpVariable['data']['HotelManmo']['listTypeRoom'])){ ?>
						<div class="infomation_detail">
	            <div class="container information_hotel">
	                <p class="title_p">Loại Phòng</p>
	                <div class="list_room">
	                    <?php
	                        if(!empty($tmpVariable['data']['HotelManmo']['listTypeRoom'])){
	                            foreach ($tmpVariable['data']['HotelManmo']['listTypeRoom'] as $value) { ?>
	                            	<div class="room">
	                            		 <div class="row ">
	                                    <div class="col-md-2 col-12">
	                                        <div class="img_room">
	                                            <img src="<?php echo $value['TypeRoom']['image']?>" alt="">
	                                        </div>
	                                    </div>
	                                    <div class="col-md-10">
	                                        <div class="title_room">
	                                            <div class="name_rooms">
	                                                <p><?php echo @$value['TypeRoom']['roomtype']?></p>
	                                                <div class="div_btn" style="position: relative;">
	                                                	  <?php if(!empty($_SESSION['userInfo'])){  ?>
																<button class="btn-p btn_pop_book">Đặt Phòng</button>
															<?php }else{ ?>	
																<a class="btn-p" href="/dang_nhap">Đặt Phòng</a>
															<?php } ?>
	                                                </div>
	                                              
	                                            </div>
	                                            <div class="rooms">
	                                                <p><i class="fas fa-bed"></i> <?php echo @$value['TypeRoom']['so_giuong']?> giường</p>
	                                                <p><i class="fas fa-user-alt"></i> <?php echo @$value['TypeRoom']['so_nguoi']?> người</p>
	                                            </div>
	                                            <div class="detail_room row">
	                                                <?php
	                                                    if(!empty($value['TypeRoom']['ngay_thuong']['gia_theo_gio'])){ 
	                                                        if($value['TypeRoom']['ngay_thuong']['gia_theo_gio']['0-23'][1] <= 0){
	                                                            echo '';
	                                                        }
	                                                        else{
	                                                            echo'
	                                                                <div class="col-md-3">
	                                                                    <p>'.number_format($value['TypeRoom']['ngay_thuong']['gia_theo_gio']['0-23'][1]).'đ / <span>giờ</span></p>
	                                                                    <span>Quá 15 phút làm tròn thành 1h</span>
	                                                                </div>
	                                                            ';
	                                                        }
	                                                    }
	                                                 ?>
	                                                <?php
	                                                    if(!empty($value['TypeRoom']['ngay_thuong']['gia_ngay'])){ ?>
	                                                            <div class="col-md-3">
	                                                                <p><?php echo number_format($value['TypeRoom']['ngay_thuong']['gia_ngay']) ?>đ / <span>đêm</span></p>
	                                                                <span>Từ 21h hôm trước đến 10h hôm sau</span>
	                                                            </div>
	                                                 <?php }
	                                                ?>
	                                                <?php
	                                                    if(!empty($value['TypeRoom']['ngay_thuong']['gia_ngay'])){ ?>
	                                                            <div class="col-md-3">
	                                                                <p><?php echo number_format($value['TypeRoom']['ngay_thuong']['gia_ngay']) ?>đ / <span>ngày</span></p>
	                                                                <span>Từ 14h hôm trước đến 12h hôm sau</span>
	                                                            </div>
	                                                 <?php }
	                                                ?>
	                                                <?php
	                                                    if(!empty($value['TypeRoom']['ngay_thuong']['gia_thang'])){ ?>
	                                                            <div class="col-md-3">
	                                                                <p><?php echo number_format($value['TypeRoom']['ngay_thuong']['gia_thang']) ?>đ / <span>tháng</span></p>  
	                                                            </div>
	                                                 <?php }else{ ?>
	                                                             <div class="col-md-3">
	                                                                <p>Liên hệ / <span>tháng</span></p>  
	                                                            </div>
	                                                <?php }
	                                                ?>
	                                            </div>

	                                        </div>
	                                    </div>
	                                </div>
	                            	</div>
	                               
	                    <?php   }
	                        }
	                    ?>
	                </div>
	            </div>
	        </div>

			<?php	}
			?>

		
		<?php 
			if(!empty($tmpVariable['data']['HotelManmo']['listComment'])){ ?>
				<div class="information_hotel">
				<h2>Đánh Giá <?php echo @$tmpVariable['data']['HotelManmo']['data']['Hotel']['name'];?></h2>

				<div class="row">
					<div class="col-lg-9 col-md-9  col-12">
						<?php
							if(!empty($tmpVariable['data']['HotelManmo']['listComment'])){
								foreach ($tmpVariable['data']['HotelManmo']['listComment'] as $key => $value) {

									if($value['Comment']['star'] == 0 ){ ?>
										<div class="item_review">
											<p>1<i class="fas fa-star"></i></p>
											<div class="scroll_star scroll_star_active"></div>
											<p class="precent_star">100%</p>
										</div>
										<div class="item_review">
											<p>2<i class="fas fa-star"></i></p>
											<div class="scroll_star"></div>
											<p class="precent_star">0%</p>
										</div>
										<div class="item_review">
											<p>3<i class="fas fa-star"></i></p>
											<div class="scroll_star"></div>
											<p class="precent_star">0%</p>
										</div>
										<div class="item_review">
											<p>4<i class="fas fa-star"></i></p>
											<div class="scroll_star "></div>
											<p class="precent_star">0%</p>
										</div>
										<div class="item_review">
											<p>5<i class="fas fa-star"></i></p>
											<div class="scroll_star"></div>
											<p class="precent_star">0%</p>
										</div>
								<?php }
									elseif ($value['Comment']['star'] == 1) { ?>
										<div class="item_review">
											<p>1<i class="fas fa-star"></i></p>
											<div class="scroll_star scroll_star_active"></div>
											<p class="precent_star">100%</p>
										</div>
										<div class="item_review">
											<p>2<i class="fas fa-star"></i></p>
											<div class="scroll_star "></div>
											<p class="precent_star">0%</p>
										</div>
										<div class="item_review">
											<p>3<i class="fas fa-star"></i></p>
											<div class="scroll_star"></div>
											<p class="precent_star">0%</p>
										</div>
										<div class="item_review">
											<p>4<i class="fas fa-star"></i></p>
											<div class="scroll_star "></div>
											<p class="precent_star">0%</p>
										</div>
										<div class="item_review">
											<p>5<i class="fas fa-star"></i></p>
											<div class="scroll_star"></div>
											<p class="precent_star">0%</p>
								<?php	}
									elseif ($value['Comment']['star'] == 2) { ?>
											<div class="item_review">
												<p>1<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>2<i class="fas fa-star"></i></p>
												<div class="scroll_star scroll_star_active"></div>
												<p class="precent_star">100%</p>
											</div>
											<div class="item_review">
												<p>3<i class="fas fa-star"></i></p>
												<div class="scroll_star"></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>4<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>5<i class="fas fa-star"></i></p>
												<div class="scroll_star"></div>
												<p class="precent_star">0%</p>
									<?php	}
									elseif ($value['Comment']['star'] == 3) { ?>
											<div class="item_review">
												<p>1<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>2<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>3<i class="fas fa-star"></i></p>
												<div class="scroll_star scroll_star_active"></div>
												<p class="precent_star">100%</p>
											</div>
											<div class="item_review">
												<p>4<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>5<i class="fas fa-star"></i></p>
												<div class="scroll_star"></div>
												<p class="precent_star">0%</p>
									<?php	}
									elseif ($value['Comment']['star'] == 4) { ?>
											<div class="item_review">
												<p>1<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>2<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>3<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>4<i class="fas fa-star"></i></p>
												<div class="scroll_star scroll_star_active"></div>
												<p class="precent_star">100%</p>
											</div>
											<div class="item_review">
												<p>5<i class="fas fa-star"></i></p>
												<div class="scroll_star"></div>
												<p class="precent_star">0%</p>
									<?php	}
									else{ ?>
											<div class="item_review">
												<p>1<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>2<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>3<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>4<i class="fas fa-star"></i></p>
												<div class="scroll_star "></div>
												<p class="precent_star">0%</p>
											</div>
											<div class="item_review">
												<p>5<i class="fas fa-star"></i></p>
												<div class="scroll_star scroll_star_active"></div>
												<p class="precent_star">100%</p>
									<?php	}

								}
							}
						?>
						
					</div>
					</div>
					<div class="col-lg-3 col-md-3  col-12">
						<div class="review">
							<span>
								<?php 
									foreach ($tmpVariable['data']['HotelManmo']['listComment'] as $key => $value) {
										echo ''.$value['Comment']['star'].'';
									}
								?>
							</span>

							<ul>
								<li>
									<?php 
										foreach ($tmpVariable['data']['HotelManmo']['listComment'] as $key => $value) {
											if($value['Comment']['star'] <= 2){ ?>
													kém
											<?php } 
											elseif ($value['Comment']['star'] == 3) { ?>
													trung bình
											<?php }
											elseif ($value['Comment']['star'] == 4) { ?>
													khá
											<?php }
											else{ ?>
													tốt
											<?php	}
										}
									?>
								</li>
								<li>
									<?php 
										foreach ($tmpVariable['data']['HotelManmo']['listComment'] as $key => $value) {
											if($value['Comment']['star'] == 1){ ?>
													<i class="fas fa-star"></i>
											<?php } 
											elseif ($value['Comment']['star'] == 2) { ?>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
											<?php }
											elseif ($value['Comment']['star'] == 3) { ?>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
											<?php }
											elseif ($value['Comment']['star'] == 4) { ?>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
											<?php }
											elseif ($value['Comment']['star'] == 5) { ?>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
											<?php }
											else{ ?>
													<i class="fas fa-star"></i>
											<?php	}
										}
									?>
								</li>
								<li>
									<?php 
										echo count($tmpVariable['data']['HotelManmo']['listComment']);
									?>
									 đánh giá
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="comment">
					<p>Bình Luận </p>
					<?php
						if(!empty($tmpVariable['data']['HotelManmo']['listComment'])){
						
							foreach ($tmpVariable['data']['HotelManmo']['listComment'] as $key => $value) { ?>
								<div class="item_comment">
									<div class="item_comment_top">
										<div class="comment_top_right">
											<img src="<?php echo $value['Comment']['avatar']?>" alt="">
											<div class="user_comment">
												<p><?php echo $value['Comment']['fullname']?></p>
												<label><?php echo date('d/m/y',$value['Comment']['time']) ?></label>
											</div>
										</div>
										<div class="comment_top_left">
											<button class="btn-clearcmt "><i class="fas fa-ellipsis-v"></i></button>
											<p class="repost_cmt">Tố Cáo Bình Luận</p>
										</div>
									</div>
									<div class="item_comment_bottom">
										<p><?php echo $value['Comment']['cmmt']?></p>
									</div>
								</div>
						<?php }
						}
					?>
				</div>
				<!-- <div class="write_cmt">
					<textarea name="" id="" style="width: 100%; height: 104px;" placeholder="Viết bình luận"></textarea>
					<button>Bình Luận</button>
				</div> -->
			</div>
		<?php }
		?>
			
			<div class="list_hotel_other container">
				<p>Các khách sạn liên quan </p>
				<div class="row">
					<??>
					<?php if (!empty($tmpVariable['data']['HotelManmo']['otherData'])){ 
						foreach($tmpVariable['data']['HotelManmo']['otherData'] as $key => $otherData){
						?>
					<div class="col-md-4 col-12">
						<div class="item_destination" style="background-image: url(<?php echo $otherData['Hotel']['imageDefault'] ?>);">
							<div class="title_destination">
								<a href="/chi_tiet_khach_san/<?php echo $otherData['Hotel']['slug'] ?>.html">
									<p><?php echo $otherData['Hotel']['name'] ?></p>
									<span><i class="fas fa-map-marker-alt"></i> <?php echo $otherData['Hotel']['address'] ?></span>
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
				<?php } }?>
				</div>
			</div>
			
		</div>

</div>

<div class="modal" id="modalQR">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thông tin đặt phòng</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <center><p>Mã đặt phòng của bạn là: <strong id="textCodeOrder"></strong></p></center>
        <center><p>Quý khách vui lòng tải ảnh QR về máy để thực hiện checkin tự động tại khách sạn</p></center>
        <center><img id="qrOrder" width="150" src=""></center>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


		<script type="text/javascript">
    jQuery('#date_start, #date_end').datetimepicker({
    	format:'d/m/Y H:i'
   	}).on('dp.change', function (e) { tinhthoigian(); });
</script> 

 <?php getfooter()?>


<script>
	$('.btn_pop_book').click(function(){
		$('.booking').css('display','block');
		$('.remover_form').css({ 'visibility': 'visible', 'opacity': '1' })
	})

$('.click_forms').click(function() {
    $('.booking').css('display', 'none');
    $('.remover_form').css({ 'visibility': 'hidden', 'opacity': '0' })
})
</script>

<!-- booking -->
<script>
    var keyManMo= '5dc8f2652ac5db08348b4567';
    var priceRoom= [];
    var numberDay= 0;
    var numberHours= 0;

    priceRoom["gia_theo_gio"]= [];
    priceRoom["gia_theo_ngay"]= [];
    priceRoom["gia_qua_dem"]= [];
</script>

<script type="text/javascript">
    date = 0;
    time = 0;
    function resetTinh()
    {
    $('.btn_dp').text('Xin chờ...');
    $('.btn_dp').attr('disable','disable');
       var date_starts= $('#date_start').val();
       var date_ends= $('#date_end').val();

       var resStarts = date_starts.split(" ");
       var resEnds = date_ends.split(" ");

       var date_startse= resStarts[0];
       var  date_endse= resEnds[0];


       var time_s = resStarts[1];
       var time_e = resEnds[1];





       var number_people= $('#number_people').val();
       var number_room= $('#number_room').val();
       var email= $('#email').val();
       var phone= $('#phone').val();
       var typeRoom= $('#typeRoom').val();
       var name= $('#name').val();
       var type_register= $('#type_register').val();
       var textNumberDate = $('#timePay').val();
       var pricePay = $('#pricePay').val();

       // console.log('----------------');
       // console.log(date_startse);
       // console.log(date_endse);
       // console.log(typeRoom);
       // console.log(email);
       // console.log(name);
       // console.log(number_room);
       // console.log(pricePay);
       // console.log(number_people);
       // console.log(type_register);
       // console.log(time_s);
       // console.log(time_e);
       if(number_people!='' && number_room!='' && email!='' && phone!='' && typeRoom!='' && name!='' && type_register!='' && textNumberDate!='' && pricePay != '') {
        $.ajax({
            method: "POST",
            url: "http://api.quanlyluutru.com/saveBookingAPI",
            data: {
                idHotel:'<?php echo @$tmpVariable['data']['Hotel']['codeManmo']; ?>',
                date_start:date_startse,
                date_end:date_endse,
                typeRoom:typeRoom,
                email:email,
                phone:phone,
                name:name,
                number_room: number_room,
                number_people: number_people,
                deposits:pricePay,
                type_register:type_register,
                key:'60d410dc2ac5db3f758b4567', 
                timeStart: time_s,
                timeEnd: time_e,
                textNumberDate:textNumberDate,
                codeDiscount:'',
                wed: '0',
            }
            }).done(function( msg ) {
                console.log('123abc');
                 console.log(msg);
                $('.w3_main_grid_right > button[type="button"]').text('ĐẶT NGAY');
                $('.w3_main_grid_right > button[type="button"]').removeAttr('disable');
              
              //  var infoUser= JSON.parse(msg);
                //console.log(infoUser);
                //infoUser= msg;
                var QRimg = 'https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=https://quanlydichvu.net/managerProcessOrderCheckin?id='+msg.idOrder;
                $('#textCodeOrder').text(msg.codeOrder);
                $('#qrOrder').attr('src',QRimg);
                $('#modalQR').modal('show');


            }).fail(function(e) {
                console.log(e);
              });
           }else {
            alert('Bạn cần nhập đủ các thông tin.');
           }
       }

   function tinhthoigian()
   {
    var date_start= $('#date_start').val();
    var date_end= $('#date_end').val();



    if(date_start!='' && date_end!=''){
        var resStart = date_start.split(" ");
        var resEnd = date_end.split(" ");
        var today = new Date();

        date_start= resStart[0];
        date_end= resEnd[0];

        time_starts = resStart[1]
        time_ends = resEnd[1]


        var time_start = resStart[1].split(":");
        var time_end = resEnd[1].split(":");



        //console.log(date_start);

        var date_start_splitted = date_start.split("/", 3);
        var date_end_splitted = date_end.split("/", 3);

        //console.log(date_start_splitted);

        var time1 = new Date(date_start_splitted[2], date_start_splitted[1]-1, date_start_splitted[0], time_start[0], time_start[1]);
        var time2 = new Date(date_end_splitted[2], date_end_splitted[1]-1, date_end_splitted[0], time_end[0], time_end[1]);

        var date1 = new Date(date_start_splitted[2], date_start_splitted[1]-1, date_start_splitted[0], 0,0);
        var date2 = new Date(date_end_splitted[2], date_end_splitted[1]-1, date_end_splitted[0], 0, 0);


        var ngay= Math.ceil((date2.getTime() - date1.getTime())/86400000);

        var timePay= ngay+ ' ngày';
        date =ngay;

        //console.log('a'+timePay);

        if(ngay==0){
            numberHours= Math.ceil((time2.getTime() - time1.getTime())/3600000);
            timePay= numberHours+' giờ';
            time = numberHours;
        }

        $('#timePay').val(timePay);





        if(ngay>1){
            $('#type_register').html('<select class="required ddslick form-control" id="type_register" name="type_register"  onchange="tinhphi();"><option value="gia_theo_ngay">Nghỉ theo ngày</option></select>'); 
            numberDay= ngay;
            numberHours= 0;
            //console.log('ngày: '+numberDay);
        }else if(ngay==1){
            $('#type_register').html('<select class="required ddslick form-control" id="type_register" name="type_register"  onchange="tinhphi();"><option value="gia_theo_ngay">Nghỉ theo ngày</option><option value="gia_qua_dem">Nghỉ qua đêm</option></select>');
            numberDay= 1;
            numberHours= 0;
            //console.log('ngày: '+numberDay);
        }else if(ngay < 1){
        	alert('Ngày check Out không hợp lệ vui lòng nhập lại');
        }else{
            $('#type_register').html('<select class="required ddslick form-control" id="type_register" name="type_register"  onchange="tinhphi();"><option value="gia_theo_gio">Nghỉ theo giờ</option></select>');
            numberHours= Math.ceil((time2.getTime() - time1.getTime())/3600000);
            numberDay= 0;
            //console.log('giờ: '+numberHours);
        }

        $('#textNumberDate').val(ngay);


    }else{
        $('#timePay').val('Chưa xác định');
        $('#textNumberDate').val('Chưa xác định');
    }
}

/*function cancel(){
    $('#number_people').val('');
    $('#number_room').val('');
    $('#email').val('');
    $('#phone').val('');
    $('#typeRoom').val('');
    $('#name').val('');
    $('#date_start').val('');
    $('#date_end').val('');
    $('#type_register').val('');
    $('#timePay').val('');
    $('#pricePay').val('');

}*/


function tinhphi()
{

    var typePay= $('#type_register').val();
    var number_room= parseInt($('#number_room').val());
    var showPriceDate= 'Chưa xác định';
    var typeRoom= $('#typeRoom').val();
    var priceDate= 0;
    var price= 0;
    var giagio = 0;
    var giadem= 0;
    var giangay = 0;
    var discount= parseInt($('#discount').val());
    var number_rooms= $('#number_room').val();
    var allprice = [];
    // console.log(typePay);  
    // console.log("-------------");  

   
    <?php  
    if(!empty($tmpVariable['data']['HotelManmo']['listTypeRoom'])) {
        foreach($tmpVariable['data']['HotelManmo']['listTypeRoom'] as $ros) { ?>
        allprice['<?php echo $ros['TypeRoom']['id']; ?>']=['<?php echo $ros['TypeRoom']['id']; ?>',<?php echo $ros['TypeRoom']['ngay_thuong']['gia_ngay']; ?>,<?php echo $ros['TypeRoom']['ngay_thuong']['gia_qua_dem']; ?>,<?php echo $ros['TypeRoom']['ngay_thuong']['gia_ngay']; ?>,<?php echo $ros['TypeRoom']['ngay_thuong']['phu_troi_them_khach']; ?>];

    <?php }
    }
    ?>

   	 console.log(allprice[typeRoom]);  
   	 console.log(time);
   	 console.log((time-2)*allprice[typeRoom][4]);

   if(allprice[typeRoom][0]==typeRoom){

    if(typePay=='gia_theo_gio'){
        if(time<3){
           showPriceDate = allprice[typeRoom][1];
       }else{
        showPriceDate = ((allprice[typeRoom][1]) + ((time-2)*allprice[typeRoom][4]))*number_rooms;
    }

}else if(typePay=='gia_qua_dem'){
   showPriceDate =  allprice[typeRoom][2]*number_rooms;

}else if(typePay=='gia_theo_ngay'){
   showPriceDate = (allprice[typeRoom][3]* date)*number_rooms;

}
}

$('#pricePay').val(showPriceDate);
$('#textDeposits').val(showPriceDate);
$('#deposits').val(priceDate);
$('#price').val(price);
}

</script>

<script type="text/javascript">
		$('[data-fancybox="images"]').fancybox({
			  buttons : [ 
			    'slideShow',
			    'share',
			    'zoom',
			    'fullScreen',
			    'close'
			  ],
			  thumbs : {
			    autoStart : true
			  }
			});
	</script>
