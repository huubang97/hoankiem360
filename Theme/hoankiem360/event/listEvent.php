<?php
	getHeader();
	//debug($tmpVariable['listData']);
	
	//debug($tmpVariable['getmonth']);
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
			<div class="col-12">
				<p class="wr-breadcrumb"><a href="">Sự kiện</a></p>
				<div class="wr-month">
					<span>Tháng</span>
					<select name="" id="month" onchange="reload(this,'<?php echo @$_GET['month'] ?>')">
						<option value="">Trong năm</option>
						<?php
						if(!empty($tmpVariable['getmonth'])) {
								foreach ($tmpVariable['getmonth'] as $key => $value) { ?>
									<option <?php echo !empty($_GET['month']) && $_GET['month'] == $value['id'] ? 'selected':'' ?> value="<?php echo @$value['id'] ?>"><?php echo @$value['name'] ?></option>
								<?php
								}
						}
						?>
					</select>
				</div>
			</div>
			<?php if(!empty($tmpVariable['listData'])) { 
				foreach ($tmpVariable['listData'] as $key => $value) { ?>
					<div class="col-12 col-md-4 wr-list-event">
						<a href="chi_tiet_su_kien/<?php echo @$value['Event']['urlSlug'] ?>.html">
							<div class="image">
							<img src="<?php echo @$value['Event']['image'] ?>" alt="">
						</div>
						<div class="content">
							<p class="title"><?php echo @$value['Event']['title'] ?></p>
							<p class="des"><?php echo @$value['Event']['introductory'] ?></p>
							<div class="time">
								<p><img src="assets/images/logolich.svg" alt=""><?php echo @$value['Event']['dateStart'] ?> - <?php echo @$value['Event']['dateEnd'] ?></p>
								<p><img src="assets/images/logoaddress.svg" alt=""><?php echo @$value['Event']['address'] ?></p>
							</div>
						</div>
						</a>
					</div>
				<?php
				}
			}?>
		</div>
	</div>
 <?php getFooter() ?>