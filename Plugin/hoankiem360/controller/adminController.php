<?php 
function listEventAdmin($input){
	 //Configure::write('debug', 2);
    $modelEvent = new Event();
    global $urlNow;
    if (checkAdminLogin()) {
        # code...
        $page= (isset($_GET['page']))? (int) $_GET['page']:1;
        if($page<=0) $page=1;
        $limit= 15;
        $order = array('created'=>'desc');

         $conditions = array();

        if(!empty($_GET['name'])){
             $key=createSlugMantan($_GET['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }

        if(!empty($_GET['month'])){
                $conditions['month']= $_GET['month'];
        }

        $listData= $modelEvent->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

        //debug($listData);
        //die();

        $totalData= $modelEvent->find('count');

        $balance= $totalData%$limit;
        $totalPage= ($totalData-$balance)/$limit;
        if($balance>0)$totalPage+=1;
        if($totalPage<1) $totalPage=1;

        $back=$page-1;$next=$page+1;
        if($back<=0) $back=1;
        if($next>=$totalPage) $next=$totalPage;

        if(isset($_GET['page'])){
            $urlPage= str_replace('&page='.$_GET['page'], '', $urlNow);
            $urlPage= str_replace('page='.$_GET['page'], '', $urlPage);
        }else{
            $urlPage= $urlNow;
        }

        if(strpos($urlPage,'?')!== false){
            if(count($_GET)>1){
                $urlPage= $urlPage.'&page=';
            }else{
                $urlPage= $urlPage.'page=';
            }
        }else{
            $urlPage= $urlPage.'?page=';
        }

        setVariable('listData',$listData);

        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);
    }else{
        $modelCard->redirect($urlHomes);
    }

}
function addEventAdmin($input){
    $modelEvent = new Event();
    global $urlPlugins;
    global $isRequestPost;
    
    if (checkAdminLogin()) {
        if (!empty($_GET['id'])) {
            $save=$modelEvent->getEvent($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;

           

            $save['Event']['title']= $dataSend['title'];
            $save['Event']['address']= $dataSend['address'];
            $save['Event']['dateStart']= $dataSend['dateStart'];
            $save['Event']['dateEnd']= $dataSend['dateEnd'];
            $save['Event']['image']= $dataSend['image'];
            $save['Event']['month']= $dataSend['month'];
            $save['Event']['urlSlug']= createSlugMantan(trim($dataSend['title']));
            $save['Event']['takesplace']= $dataSend['takesplace'];
            $save['Event']['takesplace']= $dataSend['takesplace'];
            $save['Event']['introductory']= $dataSend['introductory'];
            $save['Event']['content']= $dataSend['content'];

            if ($modelEvent->save($save)) {
                 $modelEvent->redirect($urlPlugins.'admin/hoankiem360-admin-event-listEventAdmin.php?code=1');
            }else{
                 $modelEvent->redirect($urlPlugins.'admin/hoankiem360-admin-event-listEventAdmin.php?code=-1');
            }
        }
    }else{
        $modelEvent->redirect($urlHomes);
    }

}

function deleteEventAdmin($input){
    $modelEvent = new Event();
    global $urlPlugins;
    if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
            # code...
         $idDelete = new MongoId($_GET['id']);
         $modelEvent->delete($idDelete);
         $modelEvent->redirect($urlPlugins.'admin/hoankiem360-admin-event-listEventAdmin.php?code=1');
     }
}

function ListGroupLocationAdmin($input){
        $modelGroupLocation = new GroupLocation();
    global $urlNow;
    if (checkAdminLogin()) {
        # code...
        $page= (isset($_GET['page']))? (int) $_GET['page']:1;
        if($page<=0) $page=1;
        $limit= 15;
        $order = array('created'=>'desc');
        $listData= $modelGroupLocation->getPage($page, $limit = 15, $conditions = array(), $order =  $order, $fields=null);

        $totalData= $modelGroupLocation->find('count');

        $balance= $totalData%$limit;
        $totalPage= ($totalData-$balance)/$limit;
        if($balance>0)$totalPage+=1;
        if($totalPage<1) $totalPage=1;

        $back=$page-1;$next=$page+1;
        if($back<=0) $back=1;
        if($next>=$totalPage) $next=$totalPage;

        if(isset($_GET['page'])){
            $urlPage= str_replace('&page='.$_GET['page'], '', $urlNow);
            $urlPage= str_replace('page='.$_GET['page'], '', $urlPage);
        }else{
            $urlPage= $urlNow;
        }

        if(strpos($urlPage,'?')!== false){
            if(count($_GET)>1){
                $urlPage= $urlPage.'&page=';
            }else{
                $urlPage= $urlPage.'page=';
            }
        }else{
            $urlPage= $urlPage.'?page=';
        }

        setVariable('listData',$listData);

        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);
    }else{
        $modelCard->redirect($urlHomes);
    }
}


function addGroupLocationAdmin($input){
    $modelGroupLocation = new GroupLocation();
    global $urlPlugins;
    global $isRequestPost;
    
    if (checkAdminLogin()) {
        if (!empty($_GET['id'])) {
            $save=$modelGroupLocation->getGroupLocation($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;
            $save['GroupLocation']['name']= $dataSend['name'];
            $save['GroupLocation']['not']= @$dataSend['not'];
            $save['GroupLocation']['image']= @$dataSend['image'];
            $save['GroupLocation']['urlSlug']= createSlugMantan(trim($dataSend['name']));
        
            if ($modelGroupLocation->save($save)) {
                   
                 $modelGroupLocation->redirect($urlPlugins.'admin/hoankiem360-admin-groupLocation-ListGroupLocationAdmin.php?code=1');
            }else{
                 $modelGroupLocation->redirect($urlPlugins.'admin/hoankiem360-admin-groupLocation-ListGroupLocationAdmin.php?code=2');
                   
            }
        }
    }else{
        $modelGroupLocation->redirect($urlHomes);
    }

}

function deleteGroupLocationAdmin($input){
    $modelGroupLocation = new GroupLocation();
    global $urlPlugins;
    if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
        $idDelete = new MongoId($_GET['id']);
        $modelGroupLocation->delete($idDelete);
        $modelGroupLocation->redirect($urlPlugins.'admin/hoankiem360-admin-groupLocation-ListGroupLocationAdmin.php?code=1');
     }
}


function ListServiceTypeAdmin($input){


    $modelServiceType = new ServiceType();
    global $urlNow;
    if (checkAdminLogin()) {
        # code...
        $page= (isset($_GET['page']))? (int) $_GET['page']:1;
        if($page<=0) $page=1;
        $limit= 15;
        $order = array('created'=>'desc');
        $listData= $modelServiceType->getPage($page, $limit = 15, $conditions = array(), $order =  $order, $fields=null);

        $totalData= $modelServiceType->find('count');

        $balance= $totalData%$limit;
        $totalPage= ($totalData-$balance)/$limit;
        if($balance>0)$totalPage+=1;
        if($totalPage<1) $totalPage=1;

        $back=$page-1;$next=$page+1;
        if($back<=0) $back=1;
        if($next>=$totalPage) $next=$totalPage;

        if(isset($_GET['page'])){
            $urlPage= str_replace('&page='.$_GET['page'], '', $urlNow);
            $urlPage= str_replace('page='.$_GET['page'], '', $urlPage);
        }else{
            $urlPage= $urlNow;
        }

        if(strpos($urlPage,'?')!== false){
            if(count($_GET)>1){
                $urlPage= $urlPage.'&page=';
            }else{
                $urlPage= $urlPage.'page=';
            }
        }else{
            $urlPage= $urlPage.'?page=';
        }

        setVariable('listData',$listData);

        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);
    }else{
        $modelCard->redirect($urlHomes);
    }
}


function addServiceTypeAdmin($input){
    $modelServiceType = new ServiceType();
    global $urlPlugins;
    global $isRequestPost;
    
    if (checkAdminLogin()) {
        if (!empty($_GET['id'])) {
            $save=$modelServiceType->getServiceType($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;
            $save['ServiceType']['name']= $dataSend['name'];
            $save['ServiceType']['not']= @$dataSend['not'];
            $save['ServiceType']['image']= @$dataSend['image'];
            $save['ServiceType']['urlSlug']= createSlugMantan(trim($dataSend['name']));
        
            if ($modelServiceType->save($save)) {
                   
                 $modelServiceType->redirect($urlPlugins.'admin/hoankiem360-admin-serviceType-ListServiceTypeAdmin.php?code=1');
            }else{
                 $modelServiceType->redirect($urlPlugins.'admin/hoankiem360-admin-serviceType-ListServiceTypeAdmin.php?code=2');
                   
            }
        }
    }else{
        $modelServiceType->redirect($urlHomes);
    }

}

function deleteServiceTypeAdmin($input){
    $modelServiceType = new ServiceType();
    global $urlPlugins;
    if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
        $idDelete = new MongoId($_GET['id']);
        $modelServiceType->delete($idDelete);
        $modelServiceType->redirect($urlPlugins.'admin/hoankiem360-admin-serviceType-ListServiceTypeAdmin.php?code=1');
     }
}

/*di tich lich sử */
function listHistoricalSitesAdmin($input){
        $modelHistoricalSites = new HistoricalSites();
    
    global $urlNow;
    if (checkAdminLogin()) {
       // $dataGroupLocation = $modelGroupLocation->find('all', array());
   // $dataServiceType = $modelServiceType->find('all', array());
    
        # code...
        $page= (isset($_GET['page']))? (int) $_GET['page']:1;
        if($page<=0) $page=1;
        $limit= 15;
        $order = array('created'=>'desc');

         $conditions = array();

        if(!empty($_GET['name'])){
             $key=createSlugMantan($_GET['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }
        $listData= $modelHistoricalSites->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

         

        $totalData= $modelHistoricalSites->find('count');

        $balance= $totalData%$limit;
        $totalPage= ($totalData-$balance)/$limit;
        if($balance>0)$totalPage+=1;
        if($totalPage<1) $totalPage=1;

        $back=$page-1;$next=$page+1;
        if($back<=0) $back=1;
        if($next>=$totalPage) $next=$totalPage;

        if(isset($_GET['page'])){
            $urlPage= str_replace('&page='.$_GET['page'], '', $urlNow);
            $urlPage= str_replace('page='.$_GET['page'], '', $urlPage);
        }else{
            $urlPage= $urlNow;
        }

        if(strpos($urlPage,'?')!== false){
            if(count($_GET)>1){
                $urlPage= $urlPage.'&page=';
            }else{
                $urlPage= $urlPage.'page=';
            }
        }else{
            $urlPage= $urlPage.'?page=';
        }

        setVariable('listData',$listData);
       // setVariable('dataGroupLocation',$dataGroupLocation);
   // setVariable('dataServiceType',$dataServiceType);
        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);
    }else{
        $modelCard->redirect($urlHomes);
    }
}


function addHistoricalSitesAdmin($input){
    $modelHistoricalSites = new HistoricalSites();
    $modelServiceType = new ServiceType();
    $modelGroupLocation = new GroupLocation();
    global $urlPlugins;
    global $urlPlugins;
    global $isRequestPost;

    $dataGroupLocation = $modelGroupLocation->find('all', array());
    $dataServiceType = $modelServiceType->find('all', array());
    
    if (checkAdminLogin()) {
        if (!empty($_GET['id'])) {
            $save=$modelHistoricalSites->getHistoricalSites($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;      

            $save['HistoricalSites']['name']= $dataSend['name'];
            $save['HistoricalSites']['address']= @$dataSend['address'];
            $save['HistoricalSites']['phone']= @$dataSend['phone'];
            $save['HistoricalSites']['email']= @$dataSend['email'];
            $save['HistoricalSites']['image']= @$dataSend['image'];
            $save['HistoricalSites']['seo']= @$dataSend['seo'];
            $save['HistoricalSites']['introductory']= @$dataSend['introductory'];
            $save['HistoricalSites']['keyMetadata']= @$dataSend['keyMetadata'];
            $save['HistoricalSites']['notmetadata']= @$dataSend['notmetadata'];
            $save['HistoricalSites']['latitude']= @$dataSend['latitude'];
            $save['HistoricalSites']['longitude']= @$dataSend['longitude'];
            $save['HistoricalSites']['image360']= @$dataSend['image360'];
            $save['HistoricalSites']['cassavaorder']= @$dataSend['cassavaorder'];
            $save['HistoricalSites']['content']= @$dataSend['content'];
            $save['HistoricalSites']['urlSlug']= createSlugMantan(trim($dataSend['name']));
        
            if ($modelHistoricalSites->save($save)) {
                   
                 $modelHistoricalSites->redirect($urlPlugins.'admin/hoankiem360-admin-historicalSites-listHistoricalSitesAdmin.php?code=1');
            }else{
                 $modelHistoricalSites->redirect($urlPlugins.'admin/hoankiem360-admin-historicalSites-listHistoricalSitesAdmin.php?code=2');
                   
            }
        }
    }else{
        $modelLocation->redirect($urlHomes);
    }
    setVariable('dataGroupLocation',$dataGroupLocation);
    setVariable('dataServiceType',$dataServiceType);

}

function deleteHistoricalSitesAdmin($input){
    $modelHistoricalSites = new HistoricalSites();
    global $urlPlugins;
    if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
        $idDelete = new MongoId($_GET['id']);
        $modelHistoricalSites->delete($idDelete);
        $modelHistoricalSites->redirect($urlPlugins.'admin/hoankiem360-admin-historicalSites-listHistoricalSitesAdmin.php?code=1');
     }
}

/*Nhà nhà  */
function listRestaurantAdmin($input){
        $modelRestaurant = new Restaurant();
    
    global $urlNow;
    if (checkAdminLogin()) {
        # code...
        $page= (isset($_GET['page']))? (int) $_GET['page']:1;
        if($page<=0) $page=1;
        $limit= 15;
        $order = array('created'=>'desc');

         $conditions = array();

        if(!empty($_GET['name'])){
             $key=createSlugMantan($_GET['name']);
            $conditions['urlSlug']= array('$regex' => $key);
        }
        $listData= $modelRestaurant->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

         

        $totalData= $modelRestaurant->find('count');

        $balance= $totalData%$limit;
        $totalPage= ($totalData-$balance)/$limit;
        if($balance>0)$totalPage+=1;
        if($totalPage<1) $totalPage=1;

        $back=$page-1;$next=$page+1;
        if($back<=0) $back=1;
        if($next>=$totalPage) $next=$totalPage;

        if(isset($_GET['page'])){
            $urlPage= str_replace('&page='.$_GET['page'], '', $urlNow);
            $urlPage= str_replace('page='.$_GET['page'], '', $urlPage);
        }else{
            $urlPage= $urlNow;
        }

        if(strpos($urlPage,'?')!== false){
            if(count($_GET)>1){
                $urlPage= $urlPage.'&page=';
            }else{
                $urlPage= $urlPage.'page=';
            }
        }else{
            $urlPage= $urlPage.'?page=';
        }

        setVariable('listData',$listData);
        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);
    }else{
        $modelCard->redirect($urlHomes);
    }
}


function addRestaurantAdmin($input){
    $modelRestaurant = new Restaurant();
    global $urlPlugins;
    global $urlPlugins;
    global $isRequestPost;

   
    if (checkAdminLogin()) {
        if (!empty($_GET['id'])) {
            $save=$modelRestaurant->getRestaurant($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;      

            $save['Restaurant']['name']= $dataSend['name'];
            $save['Restaurant']['address']= @$dataSend['address'];
            $save['Restaurant']['phone']= @$dataSend['phone'];
            $save['Restaurant']['email']= @$dataSend['email'];
            $save['Restaurant']['image']= @$dataSend['image'];
            $save['Restaurant']['seo']= @$dataSend['seo'];
            $save['Restaurant']['introductory']= @$dataSend['introductory'];
            $save['Restaurant']['keyMetadata']= @$dataSend['keyMetadata'];
            $save['Restaurant']['notmetadata']= @$dataSend['notmetadata'];
            $save['Restaurant']['latitude']= @$dataSend['latitude'];
            $save['Restaurant']['longitude']= @$dataSend['longitude'];
            $save['Restaurant']['image360']= @$dataSend['image360'];
            $save['Restaurant']['cassavaorder']= @$dataSend['cassavaorder'];
            $save['Restaurant']['content']= @$dataSend['content'];
            $save['Restaurant']['timeStart']= @$dataSend['timeStart'];
            $save['Restaurant']['timeEnd']= @$dataSend['timeEnd'];
            $save['Restaurant']['codeManmo']= @$dataSend['codeManmo'];
            $save['Restaurant']['urlSlug']= createSlugMantan(trim($dataSend['name']));
        
            if ($modelRestaurant->save($save)) {
                   
                 $modelRestaurant->redirect($urlPlugins.'admin/hoankiem360-admin-restaurant-listRestaurantAdmin.php?code=1');
            }else{
                 $modelRestaurant->redirect($urlPlugins.'admin/hoankiem360-admin-restaurant-listRestaurantAdmin.php?code=2');
                   
            }
        }
    }else{
        $modelLocation->redirect($urlHomes);
    }

}

function deleteRestaurantAdmin($input){
    $modelRestaurant = new Restaurant();
    global $urlPlugins;
    if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
        $idDelete = new MongoId($_GET['id']);
        $modelRestaurant->delete($idDelete);
        $modelRestaurant->redirect($urlPlugins.'admin/hoankiem360-admin-restaurant-listRestaurantAdmin.php?code=1');
     }
}
// ảnh 360 
function listImage360Admin($input){


    $modelImage360 = new Image360();
    global $urlNow;
    if (checkAdminLogin()) {
        # code...
        $page= (isset($_GET['page']))? (int) $_GET['page']:1;
        if($page<=0) $page=1;
        $limit= 15;
        $order = array('created'=>'desc');
        $listData= $modelImage360->getPage($page, $limit = 15, $conditions = array(), $order =  $order, $fields=null);

        $totalData= $modelImage360->find('count');

        $balance= $totalData%$limit;
        $totalPage= ($totalData-$balance)/$limit;
        if($balance>0)$totalPage+=1;
        if($totalPage<1) $totalPage=1;

        $back=$page-1;$next=$page+1;
        if($back<=0) $back=1;
        if($next>=$totalPage) $next=$totalPage;

        if(isset($_GET['page'])){
            $urlPage= str_replace('&page='.$_GET['page'], '', $urlNow);
            $urlPage= str_replace('page='.$_GET['page'], '', $urlPage);
        }else{
            $urlPage= $urlNow;
        }

        if(strpos($urlPage,'?')!== false){
            if(count($_GET)>1){
                $urlPage= $urlPage.'&page=';
            }else{
                $urlPage= $urlPage.'page=';
            }
        }else{
            $urlPage= $urlPage.'?page=';
        }

        setVariable('listData',$listData);

        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);
    }else{
        $modelCard->redirect($urlHomes);
    }
}


function addImage360Admin($input){
    $modelImage360 = new Image360();
    global $urlPlugins;
    global $isRequestPost;
    
    if (checkAdminLogin()) {
        if (!empty($_GET['id'])) {
            $save=$modelImage360->getImage360($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;
            $save['Image360']['name']= $dataSend['name'];
            $save['Image360']['not']= @$dataSend['not'];
            $save['Image360']['image']= @$dataSend['image'];
            $save['Image360']['link']= @$dataSend['link'];
            $save['Image360']['urlSlug']= createSlugMantan(trim($dataSend['name']));
        
            if ($modelImage360->save($save)) {
                   
                 $modelImage360->redirect($urlPlugins.'admin/hoankiem360-admin-image360-listImage360Admin.php?code=1');
            }else{
                 $modelImage360->redirect($urlPlugins.'admin/hoankiem360-admin-image360-listImage360Admin.php?code=2');
                   
            }
        }
    }else{
        $modelImage360->redirect($urlHomes);
    }

}

function deleteImage360Admin($input){
    $modelImage360 = new Image360();
    global $urlPlugins;
    if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
        $idDelete = new MongoId($_GET['id']);
        $modelImage360->delete($idDelete);
        $modelImage360->redirect($urlPlugins.'admin/hoankiem360-admin-image360-listImage360Admin.php?code=1');
     }
}

function listAdvertisementAdmin($input){


    $modelAdvertisement = new Advertisement();
    global $urlNow;
    if (checkAdminLogin()) {
        # code...
        $page= (isset($_GET['page']))? (int) $_GET['page']:1;
        if($page<=0) $page=1;
        $limit= 15;
        $order = array('created'=>'desc');
        $listData= $modelAdvertisement->getPage($page, $limit = 15, $conditions = array(), $order =  $order, $fields=null);

        $totalData= $modelAdvertisement->find('count');

        $balance= $totalData%$limit;
        $totalPage= ($totalData-$balance)/$limit;
        if($balance>0)$totalPage+=1;
        if($totalPage<1) $totalPage=1;

        $back=$page-1;$next=$page+1;
        if($back<=0) $back=1;
        if($next>=$totalPage) $next=$totalPage;

        if(isset($_GET['page'])){
            $urlPage= str_replace('&page='.$_GET['page'], '', $urlNow);
            $urlPage= str_replace('page='.$_GET['page'], '', $urlPage);
        }else{
            $urlPage= $urlNow;
        }

        if(strpos($urlPage,'?')!== false){
            if(count($_GET)>1){
                $urlPage= $urlPage.'&page=';
            }else{
                $urlPage= $urlPage.'page=';
            }
        }else{
            $urlPage= $urlPage.'?page=';
        }

        setVariable('listData',$listData);

        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);
    }else{
        $modelCard->redirect($urlHomes);
    }
}


function addAdvertisementAdmin($input){
    $modelAdvertisement = new Advertisement();
    global $urlPlugins;
    global $isRequestPost;
    
    if (checkAdminLogin()) {
        if (!empty($_GET['id'])) {
            $save=$modelAdvertisement->getAdvertisement($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;
            $save['Advertisement']['name']= $dataSend['name'];
            $save['Advertisement']['not']= @$dataSend['not'];
            $save['Advertisement']['image']= @$dataSend['image'];
            $save['Advertisement']['link']= @$dataSend['link'];
            $save['Advertisement']['urlSlug']= createSlugMantan(trim($dataSend['name']));
        
            if ($modelAdvertisement->save($save)) {
                   
                 $modelAdvertisement->redirect($urlPlugins.'admin/hoankiem360-admin-advertisement-listAdvertisementAdmin.php?code=1');
            }else{
                 $modelAdvertisement->redirect($urlPlugins.'admin/hoankiem360-admin-advertisement-listAdvertisementAdmin.php?code=2');
                   
            }
        }
    }else{
        $modelAdvertisement->redirect($urlHomes);
    }

}

function deleteAdvertisementAdmin($input){
    $modelAdvertisement = new Advertisement();
    global $urlPlugins;
    if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
        $idDelete = new MongoId($_GET['id']);
        $modelAdvertisement->delete($idDelete);
        $modelAdvertisement->redirect($urlPlugins.'admin/hoankiem360-admin-advertisement-listAdvertisementAdmin.php?code=1');
     }
}


function listUserAdmin($input) {
    Configure::write('debug', 2);
    global $modelOption;
    global $modelUser;
    global $urlHomes;
    global $urlNow;

    if (checkAdminLogin()) {

        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        if ($page <= 0)
            $page = 1;
        $limit = 15;
        $conditions = array();

        if(!empty($_GET['fullname'])){
            $conditions['fullname']= array('$regex' => $_GET['fullname']);
        }

        if(!empty($_GET['email'])){
            $conditions['email']= $_GET['email'];
        }
        if(!empty($_GET['phone'])){
            $conditions['phone']= $_GET['phone'];
        }
        if(!empty($_GET['user'])){
            $conditions['user']= $_GET['user'];
        }

        $listData = $modelUser->getPage($page, $limit, $conditions);

        $totalData = $modelUser->find('count', array('conditions' => $conditions));

        $balance = $totalData % $limit;
        $totalPage = ($totalData - $balance) / $limit;
        if ($balance > 0)
            $totalPage+=1;

        $back = $page - 1;
        $next = $page + 1;
        if ($back <= 0)
            $back = 1;
        if ($next >= $totalPage)
            $next = $totalPage;

        if (isset($_GET['page'])) {
            $urlPage = str_replace('&page=' . $_GET['page'], '', $urlNow);
            $urlPage = str_replace('page=' . $_GET['page'], '', $urlPage);
        } else {
            $urlPage = $urlNow;
        }
        if (strpos($urlPage, '?') !== false) {
            if (count($_GET) > 1) {
                $urlPage = $urlPage . '&page=';
            } else {
                $urlPage = $urlPage . 'page=';
            }
        } else {
            $urlPage = $urlPage . '?page=';
        }

        setVariable('listData', $listData);

        setVariable('page', $page);
        setVariable('totalPage', $totalPage);
        setVariable('back', $back);
        setVariable('next', $next);
        setVariable('urlPage', $urlPage);

        if(!empty($_GET['excel'])){
            $limit= 5000;
            $listData = $modelUser->find('all', array('conditions'=>$conditions,'page'=>$page,'limit'=>$limit));
            
            $table = array(
                array('label' => __('Ngày tạo'), 'width' => 10),
                array('label' => __('Tài khoản'),'width' => 25, 'filter' => true, 'wrap' => true),
                array('label' => __('Họ và tên'),'width' => 25, 'filter' => true, 'wrap' => true),
                array('label' => __('Loại TK'),'width' => 17, 'filter' => true, 'wrap' => true),
                array('label' => __('Email'),'width' => 34, 'filter' => true, 'wrap' => true),
                array('label' => __('Điện thoại'),'width' => 17, 'wrap' => true),
                
            );
            
            $data= array();
            if (!empty($listData)) {
                foreach ($listData as $key => $tin) {
                    if(!empty($tin['User']['idGoogle'])){
                        $typeReg= 'Google';
                    }elseif(!empty($tin['User']['idFacebook'])){
                        $typeReg= 'Facebook';
                    }else{
                        $typeReg= 'Tự ĐK';
                    }

                    $data[]= array( date('d/m/Y', $tin['User']['created']->sec),
                                    @$tin['User']['user'],
                                    @$tin['User']['fullname'],
                                    $typeReg,
                                    @$tin['User']['email'],
                                    @$tin['User']['phone']
                                );
                }
                
            }
            
            $exportsController = new ExportsController;

            $exportsController->requestAction('/exports/excel', array('pass' => array($table,$data,'listUserManMo')));
        }
    } else {
        $modelOption->redirect($urlHomes);
    }
}


function addUserAdmin($input) {
    global $modelOption;
    global $modelUser;
    global $isRequestPost;
    global $urlHomes;
    global $urlPlugins;

    if (checkAdminLogin()) {
        if ($isRequestPost) {

            $dataSend = arrayMap($input['request']->data);
            if ($modelUser->isExist($dataSend['user'], $dataSend['email'], $dataSend['cmnd']) == true) {
                $mess = 'Người dùng đã tồn tại!';
                setVariable('mess', $mess);
            } else {
                $save['User']['user'] = $dataSend['user'];
                $save['User']['cmnd'] = $dataSend['cmnd'];
                $save['User']['fullname'] = $dataSend['fullname'];
                $save['User']['avatar'] = $dataSend['avatar'];
                $save['User']['email'] = $dataSend['email'];
                $save['User']['phone'] = $dataSend['phone'];
                $save['User']['address'] = $dataSend['address'];
                $save['User']['password'] = md5($dataSend['password']);
                $save['User']['actived'] = (int) $dataSend['actived'];
                if (!empty($dataSend['desc'])) {
                    $save['User']['desc'] = $dataSend['desc'];
                }
               
                if ($modelUser->save($save)) {
                    $modelUser->redirect($urlPlugins . 'admin/hoankiem360-admin-user-listUserAdmin.php?status=1');
                } else {
                    $modelUser->redirect($urlPlugins . 'admin/hoankiem360-admin-user-addUserAdmin.php?status=-1');
                }
            }
        }
    } else {
        $modelOption->redirect($urlHomes);
    }
}


function editUserAdmin($input) {
    global $modelOption;
    global $modelUser;
    global $isRequestPost;
    global $urlHomes;
    global $urlPlugins;

    if (checkAdminLogin()) {
        $modelUser = new User();
        if(!empty($_GET['id']) && MongoId::isValid($_GET['id'])){
            $data = $modelUser->getUser($_GET['id']);
            if ($isRequestPost) {

                $dataSend = arrayMap($input['request']->data);

                if(!empty($dataSend['password'])){
                    $save['User']['password'] = md5($dataSend['password']);
                }

                $save['User']['user'] = $data['User']['user'];
                $save['User']['fullname'] = $dataSend['fullname'];
                $save['User']['avatar'] = $dataSend['avatar'];
                $save['User']['email'] = $dataSend['email'];
                $save['User']['phone'] = $dataSend['phone'];
                $save['User']['address'] = $dataSend['address'];
                
                $save['User']['actived'] = (int) $dataSend['actived'];
                if (!empty($dataSend['desc'])) {
                    $save['User']['desc'] = $dataSend['desc'];
                }

                $dk['_id'] = new MongoId($_GET['id']);

                if ($modelUser->updateAll($save['User'], $dk)) {
                    $modelUser->redirect($urlPlugins . 'admin/hoankiem360-admin-user-listUserAdmin.php?status=3');
                } else {
                    $modelUser->redirect($urlPlugins . 'admin/hoankiem360-admin-user-addUserAdmin.php?status=-3');
                }
            }

            setVariable('data', $data);
        }else{
            $modelOption->redirect($urlHomes);
        }
    } else {
        $modelOption->redirect($urlHomes);
    }
}


function deleteUserAdmin($input) {
    global $modelOption;
    global $urlHomes;
    global $urlPlugins;

    if (checkAdminLogin()) {
        $modelUser = new User();
        if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
            $idDelete = new MongoId($_GET['id']);
            $modelUser->delete($idDelete);
        }
        $modelUser->redirect($urlPlugins . 'admin/hoankiem360-admin-user-listUserAdmin.php?status=4');
    } else {
        $modelOption->redirect($urlHomes);
    }
}
?>