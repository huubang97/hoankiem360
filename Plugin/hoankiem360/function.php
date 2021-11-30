<?php

    $menus= array();
    $menus[0]['title'] = 'Hoàn Kiếm 360';

    $menus[0]['sub'][0] = array('name' => 'Danh sách sự kện ', 'url' => $urlPlugins . 'admin/hoankiem360-admin-event-listEventAdmin.php','permission'=>'listEventAdmin');

    $menus[0]['sub'][3] = array('name' => 'Danh sách tỉnh thành', 'url' => $urlPlugins . 'admin/mantanHotel-admin-city-listCityAdmin.php','permission'=>'listCityAdmin');
$menus[0]['sub'][4] = array('name' => 'Danh sách tiện nghi', 'url' => $urlPlugins . 'admin/mantanHotel-admin-furniture-listFurnitureAdmin.php','permission'=>'listFurnitureAdmin');

addMenuAdminMantan($menus);

    global $themeSettings;
    $themeSettings= $modelOption->getOption('ManMoVer3ThemeSettings');

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