<?php
$breadcrumb = array('name' => 'Thông báo',
    'url' => $urlPlugins . 'admin/mantanHotel-admin-notification-addNotificationCodeDiscountAdmin.php',
    'sub' => array('name' => 'Thông báo mã giảm giá')
    );
addBreadcrumbAdmin($breadcrumb);
?>
 
<p style="color: red;"><?php echo @$mess;?></p>
<form action="" method="POST">
		<div class="row">
			<div class="col-md-12">
				<label for="">Mã khuyến mại</label>
				<input type="text" class="form-control" name="codeDiscount" value="" placeholder="HOANKIEM50" required="">
			</div>
			<div class="col-md-12">
				<label for="">Nội dung thông báo</label>
				<textarea rows="5" class="form-control" name="content" placeholder="Giảm giá 50k khi đặt phòng qua đêm" required=""></textarea>
			</div>
		
			<div class="col-md-12">
				<br>
				<input type="submit" value="Gửi thông báo"  class="btn btn-info">
			</div>
		</div>
</form>