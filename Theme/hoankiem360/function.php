<?php
$menus= array();
$menus[0]['title']= 'Theme Settings';
$menus[0]['sub'][0]= array('name'=>'Cài đặt trang chủ','url'=>$urlPlugins.'theme/hoankiem360-admin-settings.php','permission'=>'ThemeSettings');

addMenuAdminMantan($menus);

global $themesettings;
$themesettings = $modelOption->getOption('ThemeSettings');

?>