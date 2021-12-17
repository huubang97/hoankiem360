<?php

    $menus= array();
    $menus[0]['title'] = 'Hoàn Kiếm 360';

    $menus[0]['sub'][0] = array('name' => 'Sự kiện', 'url' => $urlPlugins . 'admin/hoankiem360-admin-event-listEventAdmin.php','permission'=>'listEventAdmin');
    $menus[0]['sub'][4] = array('name' => 'Ảnh 360', 'url' => $urlPlugins . 'admin/hoankiem360-admin-image360-listImage360Admin.php','permission'=>'listImage360Admin');
    $menus[0]['sub'][5] = array('name' => 'Banner quản cáo', 'url' => $urlPlugins . 'admin/hoankiem360-admin-advertisement-listAdvertisementAdmin.php','permission'=>'listAdvertisementAdmin');
    $menus[0]['sub'][6] = array('name' => 'Tài khoản người dùng', 'url' => $urlPlugins . 'admin/hoankiem360-admin-user-listUserAdmin.php','permission'=>'listUserAdmin');
    $menus[1]['title'] = 'Điểm Đến';
    $menus[0]['sub'][1] = array('name' => 'Chuyên mục Điểm Đến ', 'url' => $urlPlugins . 'admin/hoankiem360-admin-groupLocation-ListGroupLocationAdmin.php','permission'=>'ListGroupLocationAdmin');
    $menus[1]['sub'][0] = array('name' => 'Di tích lịch sử', 'url' => $urlPlugins . 'admin/hoankiem360-admin-historicalSites-listHistoricalSitesAdmin.php','permission'=>'listHistoricalSitesAdmin');
    $menus[1]['sub'][1] = array('name' => 'Nhà hàng ', 'url' => $urlPlugins . 'admin/hoankiem360-admin-restaurant-listRestaurantAdmin.php','permission'=>'listRestaurantAdmin');
    $menus[1]['sub'][2] = array('name' => 'Phố cổ ', 'url' => $urlPlugins . 'admin/hoankiem360-admin-oldQuarter-listOldQuarterAdmin.php','permission'=>'listOldQuarterAdmin');
    $menus[1]['sub'][3] = array('name' => 'Cơ quan hành chính', 'url' => $urlPlugins . 'admin/hoankiem360-admin-governanceAgency-listGovernanceAgencyAdmin.php','permission'=>'listGovernanceAgencyAdmin');
    $menus[1]['sub'][4] = array('name' => 'Tour', 'url' => $urlPlugins . 'admin/hoankiem360-admin-tour-listTourAdmin.php','permission'=>'listTourAdmin');
    //$menus[1]['sub'][5] = array('name' => 'Khách sạn', 'url' => $urlPlugins . 'admin/hoankiem360-admin-hotel-listHotelAdmin.php','permission'=>'listHotelAdmin');
    $menus[1]['sub'][6] = array('name' => 'Lễ hội', 'url' => $urlPlugins . 'admin/hoankiem360-admin-festival-listFestivalAdmin.php','permission'=>'listFestivalAdmin');
    $menus[1]['sub'][7] = array('name' => 'Hồ Hoàn Kiếm', 'url' => $urlPlugins . 'admin/hoankiem360-admin-hklake-listHklakeAdmin.php','permission'=>'listHklakeAdmin');
    $menus[1]['sub'][8] = array('name' => 'Giải trí', 'url' => $urlPlugins . 'admin/hoankiem360-admin-entertainment-listEntertainmentAdmin.php','permission'=>'listEntertainmentAdmin');
    

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
   
    function getListFurniture(){
        return array(   '1'=>array('id'=>1,'name'=>'Máy in','class'=>'fas fa-print','image'=>'/app/Plugin/mantanHotel/images/print.png','nameEN'=>'Printer'), 
            '2'=>array('id'=>2,'name'=>'Tivi','class'=>'fas fa-tv','image'=>'/app/Plugin/mantanHotel/images/tivi.png','nameEN'=>'Television'), 
            '3'=>array('id'=>3,'name'=>'Wifi','class'=>'fas fa-wifi','image'=>'/app/Plugin/mantanHotel/images/wifi.png','nameEN'=>'Wifi'),
            '4'=>array('id'=>4,'name'=>'Giặt là','class'=>'flaticon-hanger','image'=>'/app/Plugin/mantanHotel/images/bullseye.png','nameEN'=>'Laundry'),
            '5'=>array('id'=>5,'name'=>'Điều hòa','class'=>'flaticon-air-conditioner','image'=>'/app/Plugin/mantanHotel/images/podcast.png','nameEN'=>'Air conditional'),
            '6'=>array('id'=>6,'name'=>'Thang máy','class'=>'flaticon-elevator','image'=>'/app/Plugin/mantanHotel/images/building.png','nameEN'=>'Elevator'),
            '7'=>array('id'=>7,'name'=>'Chỗ để ôtô','class'=>'flaticon-parking-1','image'=>'/app/Plugin/mantanHotel/images/car.png','nameEN'=>'Parking'),
            '8'=>array('id'=>8,'name'=>'Nhà hàng','class'=>'flaticon-room-service-1','image'=>'/app/Plugin/mantanHotel/images/beer.png','nameEN'=>'Restaurant'),
            '9'=>array('id'=>9,'name'=>'Ăn sáng','class'=>'flaticon-restaurant','image'=>'/app/Plugin/mantanHotel/images/coffee.png','nameEN'=>'Breakfast'),
            '10'=>array('id'=>10,'name'=>'Điện thoại','class'=>'flaticon-telephone','image'=>'/app/Plugin/mantanHotel/images/phone.png','nameEN'=>'Phone'),
            '11'=>array('id'=>11,'name'=>'Tủ quần áo','class'=>'flaticon-bathrobe','image'=>'/app/Plugin/mantanHotel/images/street-view.png','nameEN'=>'Wardrobe'),
            '12'=>array('id'=>12,'name'=>'Bình cứu hỏa','class'=>'flaticon-fire-extinguisher','image'=>'/app/Plugin/mantanHotel/images/fire-extinguisher.png','nameEN'=>'Fire extinguisher'), 
            '13'=>array('id'=>13,'name'=>'Truyền hình cáp','class'=>'flaticon-monitor','image'=>'/app/Plugin/mantanHotel/images/cloud-download.png','nameEN'=>'Cable television'), 
            '14'=>array('id'=>14,'name'=>'Bàn làm việc','class'=>'flaticon-reception','image'=>'/app/Plugin/mantanHotel/images/archive.png','nameEN'=>'Desk'), 
            '15'=>array('id'=>15,'name'=>'Bồn tắm','class'=>'flaticon-bathtub','image'=>'/app/Plugin/mantanHotel/images/bath.png','nameEN'=>'Bathtub'), 
            '16'=>array('id'=>16,'name'=>'Bình nóng lạnh','class'=>'flaticon-safebox','image'=>'/app/Plugin/mantanHotel/images/shower.png','nameEN'=>'Heater'), 
            '17'=>array('id'=>17,'name'=>'Tủ lạnh','class'=>'fa-random','image'=>'/app/Plugin/mantanHotel/images/random.png','nameEN'=>'Fridge'), 
            '18'=>array('id'=>18,'name'=>'Bàn uống nước','class'=>'fa-archive','image'=>'/app/Plugin/mantanHotel/images/archive.png','nameEN'=>'Dining table and chairs'), 


            '19'=>array('id'=>19,'name'=>'Mini Bar','class'=>'fas fa-beer','image'=>'/app/Plugin/mantanHotel/images/archive.png','nameEN'=>'Mini Bar'), 
            '20'=>array('id'=>20,'name'=>'Thanh toán bằng thẻ tín dụng','class'=>'fab fa-cc-visa','image'=>'/app/Plugin/mantanHotel/images/archive.png','nameEN'=>'Payment by credit card'), 
            '21'=>array('id'=>21,'name'=>'Máy sấy tóc','class'=>'fas fa-crosshairs','image'=>'/app/Plugin/mantanHotel/images/archive.png','nameEN'=>'Hairdryer'), 
            '22'=>array('id'=>22,'name'=>'Cho thuê xe ô tô, xe máy','class'=>'fas fa-car','image'=>'/app/Plugin/mantanHotel/images/archive.png','nameEN'=>'Car and motorbike rental'), 
            '23'=>array('id'=>23,'name'=>'Hướng dẫn viên du lịch','class'=>'fas fa-male','image'=>'/app/Plugin/mantanHotel/images/archive.png','nameEN'=>'Tour guide'), 
            '24'=>array('id'=>24,'name'=>'Hội trường','class'=>'fas fa-chalkboard-teacher','image'=>'/app/Plugin/mantanHotel/images/archive.png','nameEN'=>'Hall'), 
        );
    }

    function destination(){
        global $urlHomes;
        $modelHistoricalSites = new HistoricalSites();

        $historicalSites= $modelHistoricalSites->find('count');

        $modelRestaurant = new Restaurant();

        $restaurant= $modelRestaurant->find('count');

        $modelOldQuarter = new OldQuarter();

        $oldQuarter= $modelOldQuarter->find('count');

        $modelGovernanceAgency = new GovernanceAgency();

        $governanceAgency= $modelGovernanceAgency->find('count');

        $modelTour = new Tour();

        $tour= $modelTour->find('count');

        $modelHotel = new Hotel();

        $hotel= $modelHotel->find('count');

        $modelFestival = new Festival();

        $festival= $modelFestival->find('count');

        $modelHklake = new Hklake();

        $hklake= $modelHklake->find('count');

         $modelEntertainment = new Entertainment();

        $entertainment= $modelEntertainment->find('count');


        return array(   '1'=>array('id'=>1,'name'=>'Khu vực Hồ Hoàn Kiếm','class'=>'fa-print','image'=>$urlHomes .'app/webroot/upload/admin/files/khu-vuc-hoan-kiem.png','urlSlug'=>$urlHomes .'ho_hoan_kiem', 'count'=>@$hklake),
            '2'=>array('id'=>2,'name'=>'Di tích và danh lam','class'=>'fa-print','image'=>$urlHomes .'app/webroot/upload/admin/files/di-tich-danh-lam.png','urlSlug'=>$urlHomes .'di_tich_lich_su', 'count'=>@$historicalSites),   
            '3'=>array('id'=>3,'name'=>'Phố cổ Hà Nội','class'=>'fa-print','image'=>$urlHomes .'app/webroot/upload/admin/files/pho-ha-noi.png','urlSlug'=>$urlHomes .'pho_co', 'count'=>@$oldQuarter),   
            '4'=>array('id'=>4,'name'=>'Dịch vụ hỗ trợ du lịch','class'=>'fa-print','image'=>$urlHomes .'app/webroot/upload/admin/files/dich-vu-ho-tro-du-lich.png','urlSlug'=>$urlHomes .'tour', 'count'=>@$tour),  
            '5'=>array('id'=>5,'name'=>'Cơ quan hành chính','class'=>'fa-print','image'=>$urlHomes .'app/webroot/upload/admin/files/co-quan-hanh-chinh.png','urlSlug'=>$urlHomes .'co_quan_hanh_chinh', 'count'=>@$governanceAgency),   
            '6'=>array('id'=>6,'name'=>'Lễ hội và sự kiện','class'=>'fa-print','image'=>$urlHomes .'app/webroot/upload/admin/files/su-kien.png','urlSlug'=>$urlHomes .'le_hoi', 'count'=>@$festival), 
            '7'=>array('id'=>7,'name'=>'Khách sạn và trung tâm hội nghị, sự kiện','class'=>'fa-print','image'=>$urlHomes .'app/webroot/upload/admin/files/khach-san-va-dich-vu-du-lich.png','urlSlug'=>$urlHomes .'khach_san', 'count'=>@$_SESSION['totalHotel']),   
            '8'=>array('id'=>8,'name'=>'Nhà hàng và quán ăn','class'=>'fa-print','image'=>$urlHomes .'app/webroot/upload/admin/files/nha-hang-va-quan-an.png','urlSlug'=>$urlHomes .'nha_hang', 'count'=>@$restaurant),   
            '9'=>array('id'=>9,'name'=>'Giải trí và thư giãn','class'=>'fa-print','image'=>$urlHomes .'app/webroot/upload/admin/files/giai-tri-va-thu-dan.png','urlSlug'=>$urlHomes .'giai_tri', 'count'=>@$entertainment),  
        );                                  
             
    }
?>
