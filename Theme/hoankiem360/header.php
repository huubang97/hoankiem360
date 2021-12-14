<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo @$urlThemeActive ?>assets/lib/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/css/bootstrap.css" />
	<link rel="stylesheet" src="<?php echo @$urlThemeActive ?>assets/lib/fanciybox/package/dist/fancybox.css">
	<link rel="stylesheet" src="<?php echo @$urlThemeActive ?>assets/lib/fanciybox/package/dist/carousel.css">
	<link rel="stylesheet" src="<?php echo @$urlThemeActive ?>assets/lib/flickity-docs/flickity-fade.css">
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<link rel="stylesheet" src="<?php echo @$urlThemeActive ?>assets/lib/fontawesome-free-5.15.1-web/css/all.css">

	<link rel="stylesheet" href="<?php echo @$urlThemeActive ?>assets/css/reset.css">
	<link rel="stylesheet" href="<?php echo @$urlThemeActive ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo @$urlThemeActive ?>assets/css/style_1.css">
	<link rel="stylesheet" href="<?php echo @$urlThemeActive ?>assets/css/repoinsiver_1.css">
	<link rel="stylesheet" href="<?php echo @$urlThemeActive ?>assets/css/flaticon.css">
	<script type="text/javascript" src="<?php echo @$urlThemeActive ?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo @$urlThemeActive ?>assets/js/jquery.datetimepicker.full.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css'>
	<link rel="stylesheet" href="<?php echo @$urlThemeActive ?>assets/css/datetimepicker.css">
	
	<?php 
    mantan_header(); 

    if (function_exists('showSeoHome')) {
        showSeoHome();
    }

    if (function_exists('showContentShareFacebook')) {
        showContentShareFacebook();
    }

    ?>
</head>
<body>
	<div class="container-fluid set-pd-col">
		<div class="wr-header">
			<div class="col-12 wr-header-top">
				<div class="container set-pd-col">
					<div class="clsFlex-between-mid">
						<div class="time"><?php echo date('d/m/Y'); ?></div>
						<div class="clsFlex-mid">
							<div class="box-log">
								<?php if (!empty($_SESSION['userInfo'])){ ?>
									<a href="#"><?php echo $_SESSION['userInfo']['fullname'];  ?></a>
									<a href="/dang_xuat">Đăng xuất</a>
								<?php }else{ ?>	
									<a href="/dang_nhap">Đăng nhập</a>
									<a href="/dang_ky">Đăng ký</a>
								<?php } ?>
							</div>
							<div class="box-language">
								<span>Ngôn ngữ: </span><img src="<?php echo @$urlThemeActive ?>assets/images/vi_flag.png" alt=""> Tiếng Việt
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 wr-header-bot">
				<div class="container">
					<div class="row">
						<div class="col-12 clsFlex-between-mid ">
							<div class="">
								<div class="clsFlex-mid box-logo">
									<a href=""><img src="<?php echo @$urlThemeActive ?>assets/images/logo.svg" alt="">Hoan Kiem 360</a>
								</div>	
							</div>
							<div class="clsFlex-between box-menu">
								<a href="">Trang chủ</a>
								<a href="">Nét đẹp Hoàn Kiếm</a>
								<a href="">Điểm đến</a>
								<a href="">Sự kiện</a>
								<a href="">Blog du lịch</a>
								<a href="">Kênh doanh nghiệp</a>
								<a href="">Bản đồ</a>
								<a href="">Việt Nam 360</a>
								<a><i class="fa fa-search" aria-hidden="true"></i></a>
								<button class="hidden-pc" data-toggle="collapse" data-target="#menu-mb"><img src="<?php echo @$urlThemeActive ?>assets/images/menuBar.svg" alt=""></button>
							</div>
						</div>
						<div class="hidden-pc">
							<div id="menu-mb" class="collapse box-menu-mobile">
								<a href="">Trang chủ</a>
								<a href="">Nét đẹp Hoàn Kiếm</a>
								<a href="">Điểm đến</a>
								<a href="">Sự kiện</a>
								<a href="">Blog du lịch</a>
								<a href="">Kênh doanh nghiệp</a>
								<a href="">Bản đồ</a>
								<a href="">Việt Nam 360</a>
								<a><i class="fa fa-search" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>