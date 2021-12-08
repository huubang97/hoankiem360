<?php

    $menus= array();
    $menus[0]['title'] = 'Hoàn Kiếm 360';

    $menus[0]['sub'][0] = array('name' => 'Sự kiện', 'url' => $urlPlugins . 'admin/hoankiem360-admin-event-listEventAdmin.php','permission'=>'listEventAdmin');
    $menus[1]['title'] = 'Điểm Đến';
    $menus[0]['sub'][1] = array('name' => 'Chuyên mục địa điểm ', 'url' => $urlPlugins . 'admin/hoankiem360-admin-groupLocation-ListGroupLocationAdmin.php','permission'=>'ListGroupLocationAdmin');
    $menus[1]['sub'][0] = array('name' => 'Di tích lịch sử', 'url' => $urlPlugins . 'admin/hoankiem360-admin-historicalSites-listHistoricalSitesAdmin.php','permission'=>'listHistoricalSitesAdmin');
    $menus[1]['sub'][1] = array('name' => 'Nhà Hàng ', 'url' => $urlPlugins . 'admin/hoankiem360-admin-restaurant-listRestaurantAdmin.php','permission'=>'listRestaurantAdmin');
    $menus[0]['sub'][4] = array('name' => 'Ảnh 360', 'url' => $urlPlugins . 'admin/hoankiem360-admin-image360-listImage360Admin.php','permission'=>'listImage360Admin');
    $menus[0]['sub'][5] = array('name' => 'Banner quản cáo', 'url' => $urlPlugins . 'admin/hoankiem360-admin-advertisement-listAdvertisementAdmin.php','permission'=>'listAdvertisementAdmin');
    $menus[0]['sub'][6] = array('name' => 'Tài khoản người dùng', 'url' => $urlPlugins . 'admin/hoankiem360-admin-user-listUserAdmin.php','permission'=>'listUserAdmin');


addMenuAdminMantan($menus);
    if(empty($_SESSION['language'])){
        $_SESSION['language']= 'vi';
        //$_SESSION['language']= 'en';
    }


    function getmonth(){ 
    return array(
        '1'=>array('id'=>'1','name'=>'Tháng 1'),
        '2'=>array('id'=>'2','name'=>'Tháng 2'),
        '3'=>array('id'=>'3','name'=>'Tháng 3'),
        '4'=>array('id'=>'4','name'=>'Tháng 4'),
        '5'=>array('id'=>'5','name'=>'Tháng 5'),
        '6'=>array('id'=>'6','name'=>'Tháng 6'),
        '7'=>array('id'=>'7','name'=>'Tháng 7'),
        '8'=>array('id'=>'8','name'=>'Tháng 8'),
        '9'=>array('id'=>'9','name'=>'Tháng 9'),
        '10'=>array('id'=>'10','name'=>'Tháng 10'),
        '11'=>array('id'=>'11','name'=>'Tháng 11'),
        '12'=>array('id'=>'12','name'=>'Tháng 12'),
        
    );
}
?>
