<?php
$menus= array();
$menus[0]['title']= 'Theme Settings';
$menus[0]['sub'][0]= array('name'=>'Cài đặt trang chủ','url'=>$urlPlugins.'theme/hoankiem360-admin-settings.php','permission'=>'ThemeSettings');

addMenuAdminMantan($menus);

global $themesettings;
$themesettings = $modelOption->getOption('ThemeSettings');

function sw_get_current_weekday() {
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$weekday = date("l");
	$weekday = strtolower($weekday);
	switch($weekday) {
		case 'monday':
			$weekday = 'Thứ hai';
			break;
		case 'tuesday':
			$weekday = 'Thứ ba';
			break;
		case 'wednesday':
			$weekday = 'Thứ tư';
			break;
		case 'thursday':
			$weekday = 'Thứ năm';
			break;
		case 'friday':
			$weekday = 'Thứ sáu';
			break;
		case 'saturday':
			$weekday = 'Thứ bảy';
			break;
		default:
			$weekday = 'Chủ nhật';
			break;
	}
	return $weekday.', '.date('d/m/Y');
}

?>