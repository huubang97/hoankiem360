<?php 
function listHotelAPI($input){
	 header('Access-Control-Allow-Methods: *');
    $modelHotel = new Hotel();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $totalData= $modelHotel->find('all',$conditions);

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);

}

function detailHotelAPI($input){
    global $infoSite;
    global $urlHomes;
    $modelOption= new Option();
    $modelHotel = new Hotel();
    $keyManMo = '5dc8f2652ac5db08348b4567';
    $listFurniture = getListFurniture();
    header('Access-Control-Allow-Methods: *');
    $dataSend = arrayMap($input['request']->data);

    if(!empty($dataSend['id'])){
        $data= $modelHotel->getHotel($dataSend['id']);
        if(!empty($data)){
            
            $dataPost= array('key'=>$keyManMo, 'idHotel'=>$data['Hotel']['codeManmo'], 'lat'=>'', 'long'=>'', 'idUser'=>'');
            $infoHotelMM= sendDataConnectMantan('http://api.quanlyluutru.com/getInfoHotelAPI', $dataPost);
            $infoHotelMM= str_replace('ï»¿', '', utf8_encode($infoHotelMM));
            $infoHotelMM= json_decode($infoHotelMM, true);



            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['Hotel']['id']))));
            $otherData= $modelHotel->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);

            $data['HotelManmo'] = $infoHotelMM;

             $totalData= $modelHotel->find('all',$conditions);

            setVariable('listFurniture', $listFurniture); 

             $return= array('code'=>1,'listData'=>$data, 'otherData' =>$otherData);
        }else{
            $return= array('code'=>0);
        }
    }
    echo json_encode($return);
}

/*sự khiện */

function listEventAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelEvent = new Event();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        if(!empty($dataSend['month'])){
            $conditions['month']= $dataSend['month'];

        }
        if(!empty($dataSend['year'])){
            $conditions['year']= $dataSend['year'];

        }
          $order= array('created'=>'desc');

        $totalData= $modelEvent->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailEventAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelEvent = new Event();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelEvent->getEvent($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }


    echo json_encode($return);
}

/*di tich lich sử */
function lisHistoricalSitestAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelHistoricalSites = new HistoricalSites();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelHistoricalSites->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailHistoricalSitesAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelHistoricalSites = new HistoricalSites();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelHistoricalSites->getHistoricalSites($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }


    echo json_encode($return);
}

/*Nhà hàng  */
function listRestaurantAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelRestaurant = new Restaurant();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelRestaurant->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailRestaurantAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelRestaurant = new Restaurant();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelRestaurant->getRestaurant($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }


    echo json_encode($return);
}

/*phố cổ*/
function listOldQuarterAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelOldQuarter = new OldQuarter();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelOldQuarter->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailOldQuarterAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelOldQuarter = new OldQuarter();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelOldQuarter->getOldQuarter($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }


    echo json_encode($return);
}

/*Cơ quan hành chính*/
function listGovernanceAgencyAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelGovernanceAgency = new GovernanceAgency();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelGovernanceAgency->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailGovernanceAgencyAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelGovernanceAgency = new GovernanceAgency();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelGovernanceAgency->getGovernanceAgency($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }


    echo json_encode($return);
}

/*Tour*/
function listTourAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelTour = new Tour();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelTour->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailTourAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelTour = new Tour();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelTour->getTour($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }


    echo json_encode($return);
}

/*Lễ hội*/
function listFestivalAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelFestival = new Festival();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelFestival->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailFestivalAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelFestival = new Festival();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelFestival->getFestival($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }


    echo json_encode($return);
}

/*Hồ Hoàn Kiếm*/
function listHklakeAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelHklake = new Hklake();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelHklake->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailHklakeAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelHklake = new Hklake();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelHklake->getHklake($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }

    echo json_encode($return);
}

/*Giải trí*/
function listEntertainmentAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelEntertainment = new Entertainment();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelEntertainment->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailEntertainmentAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelEntertainment = new Entertainment();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelEntertainment->getEntertainment($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }

     echo json_encode($return);
}

// ảnh 360 
function listImage360API($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelImage360 = new Image360();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelImage360->find('all',array('conditions'=>$conditions,'order'=>$order));

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailImage360API($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelImage360 = new Image360();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelImage360->getImage360($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }

     echo json_encode($return);
}

// Tin tức
/*function listNoticeAPI($input){
    
     header('Access-Control-Allow-Methods: *');
    $modelNotice = new Notice();
    $dataSend = arrayMap($input['request']->data);
        
        $conditions = array();
          if(!empty($dataSend['name'])){
             $key=createSlugMantan($dataSend['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        $order= array('created'=>'desc');

        $totalData= $modelNotice->find('all',array('conditions'=>$conditions,'order'=>$order));

        debug($totalData);
        die();

        $return= array('code'=>1,'listData'=>$totalData);

    echo json_encode($return);
}

function detailNoticeAPI($input){
    
    header('Access-Control-Allow-Methods: *');
    $return= array('code'=>0);
    $modelNotice = new Notice();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelNotice->getNotice($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }

     echo json_encode($return);
}*/

function getListCategoryAPI($input){
    global $modelOption;

    $return= $modelOption->getOption('categoryNotice');
        
    $return= (!empty($return['Option']['value']['category']))?$return['Option']['value']['category']:array();

    echo json_encode($return);
}

function getNoticeInCategoryAPI($input){
    global $modelNotice;
    global $modelOption;
    global $urlHomes;

    $category= $modelOption->getOption('categoryNotice');

    $dataSend= $input['request']->data;
    $page = (!empty($dataSend['page']))?(int)$dataSend['page']:1;
    if($page<1) $page=1;
    $limit= 15;
    $conditions= array();
    $fields= array('title','image','author','introductory','time');

    $return= $modelNotice->getOtherNotice(array((int)$dataSend['category']),$limit,$conditions,$page,$fields);

    if($return){
        foreach ($return as $key => $value) {
            $return[$key]['Notice']['url']= $urlHomes.'viewNoticeAPI?id='.$value['Notice']['id'];
        }
    }

    echo json_encode($return);
}

function viewNoticeAPI($input)
{
    if(!empty($_GET['id'])){
        global $modelNotice;
        $data= $modelNotice->getNotice($_GET['id']);
        setVariable('data',$data);
    }
}

function getNoticeHotAPI($input){
    global $modelNotice;
    global $urlHomes;

    $dataSend= $input['request']->data;
        
    $page = (!empty($dataSend['page']))?(int)$dataSend['page']:1;
    if($page<1) $page=1;
    $limit= 15;
    $conditions= array();
    $fields= array();

    $return= $modelNotice->getTopEventNotice($limit,$fields,$page);

    if($return){
        foreach ($return as $key => $value) {
            $return[$key]['Notice']['url']= $urlHomes.'viewNoticeAPI?id='.$value['Notice']['id'];
        }
    }
    echo json_encode($return);
}

function getNoticeNewAPI($input){
    global $modelNotice;
    global $urlHomes;
        
    $dataSend= $input['request']->data;
        
    $page = (!empty($dataSend['page']))?(int)$dataSend['page']:1;
    if($page<1) $page=1;
    $limit= 15;
    $conditions= array();
    $fields= array('title','image','author','introductory','time');

    $return= $modelNotice->getNewNotice($limit,$fields,$page);

    if($return){
        foreach ($return as $key => $value) {
            $return[$key]['Notice']['url']= $urlHomes.'viewNoticeAPI?id='.$value['Notice']['id'];
        }
    }
    echo json_encode($return);
}

function saveNotificationUserAPI($input)
{
    global $contactSite;
    global $smtpSite;

    $modelUser= new Userhotel();
    $modelNotification = new Notification();
    $modelHotel= new Hotel();

    $dataSend = $input['request']->data;
    $dataUser = $modelUser->checkLoginByToken($dataSend['accessToken']);
    if(!empty($dataUser['User']['accessToken'])){
        $today= getdate();

        $save['Notification']['idHotel']= $dataSend['idHotel'];
        $save['Notification']['idRoom']= $dataSend['idRoom'];
        $save['Notification']['content']= $dataSend['content'];
        $save['Notification']['time']= $today[0];
        $save['Notification']['idUser']= $dataUser['User']['id'];
        $save['Notification']['user']= $dataUser['User']['user'];
        $save['Notification']['phone']= $dataSend['phone'];
        $save['Notification']['to']= 'manager';
        $save['Notification']['status']= 'new';

        if($modelNotification->save($save)){
            $return = array('code'=>0);
            $hotel= $modelHotel->getHotel($dataSend['idHotel'],array('email') );
            if(!empty($hotel['Hotel']['email'])){
                // send email for user and admin
                $from = array($contactSite['Option']['value']['email'] => $smtpSite['Option']['value']['show']);
                $to = array(trim($hotel['Hotel']['email']) );
                $cc = array();
                $bcc = array();
                $subject = '[' . $smtpSite['Option']['value']['show'] . '] Thông báo mới từ khách hàng';

                // create content email

                $content = 'Bạn nhận được thông báo mới từ khách hàng, nội dung như sau:<br/><br/>'.$dataSend['content'];
                
                $modelNotification->sendMail($from, $to, $cc, $bcc, $subject, $content);
            }
        }else{
            $return = array('code'=>1);
        }
    }else{
        $return = array('code'=>-1);
    }
    
    echo json_encode($return);
}

function getListRequestUserAPI($input)
{
    $modelUser= new Userhotel();
    $modelNotification = new Notification();

    $dataSend = $input['request']->data;
    $dataUser = $modelUser->checkLoginByToken($dataSend['accessToken']);
    $return = array('code'=>0);

    if(!empty($dataUser['User']['accessToken'])){
        $page = (!empty($dataSend['page']))?(int)$dataSend['page']:1;
        if($page<1) $page=1;
        $limit= 15;
        $conditions = array('idUser'=>$dataUser['User']['id'],'idHotel'=>$dataSend['idHotel'],'to'=>'manager');
        $order = array('created' => 'desc');
        $fields= array();

        $data= $modelNotification->getPage($page, $limit , $conditions, $order, $fields );

        $return = array('code'=>1,'data'=>$data);
    }else{
        $return = array('code'=>-1);
    }
    
    echo json_encode($return);
}

function getListNotificationUserAPI($input)
{
    $modelUser= new Userhotel();
    $modelNotification = new Notification();

    $dataSend = $input['request']->data;
    if(!empty($dataSend['accessToken'])){
        $dataUser = $modelUser->checkLoginByToken($dataSend['accessToken']);
    }
    $return = array('code'=>0);

    $page = (!empty($dataSend['page']))?(int)$dataSend['page']:1;
    if($page<1) $page=1;
    $limit= 15;

    $conditions = array('to'=>'customer');
    
    if(!empty($dataUser['User']['accessToken'])){
        $conditions['$or'][0]['idUser']= $dataUser['User']['id'];
        $conditions['$or'][1]['idUser']= array('$exists'=> false);
    }else{
        $conditions['idUser']= array('$exists'=> false);
    }

    $order = array('created' => 'desc');
    $fields= array();

    $data= $modelNotification->getPage($page, $limit , $conditions, $order, $fields );

    $return = array('code'=>1,'data'=>$data);
    
    echo json_encode($return);
}
?>