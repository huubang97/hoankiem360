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
        $listData= $modelEvent->getPage($page, $limit = 15, $conditions = array(), $order =  $order, $fields=null);

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


function ListLocationAdmin($input){
        $modelLocation = new Location();

    global $urlNow;
    if (checkAdminLogin()) {
        # code...
        $page= (isset($_GET['page']))? (int) $_GET['page']:1;
        if($page<=0) $page=1;
        $limit= 15;
        $order = array('created'=>'desc');
        $listData= $modelLocation->getPage($page, $limit = 15, $conditions = array(), $order =  $order, $fields=null);

        $totalData= $modelLocation->find('count');

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


function addLocationAdmin($input){
    $modelLocation = new Location();
    $modelServiceType = new ServiceType();
    $modelGroupLocation = new GroupLocation();
    global $urlPlugins;
    global $urlPlugins;
    global $isRequestPost;

    $dataGroupLocation = $modelGroupLocation->find('all', array());
    $dataServiceType = $modelServiceType->find('all', array());
    
    if (checkAdminLogin()) {
        if (!empty($_GET['id'])) {
            $save=$modelLocation->getLocation($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;

            $save['Location']['name']= $dataSend['name'];
            $save['Location']['address']= @$dataSend['address'];
            $save['Location']['phone']= @$dataSend['phone'];
            $save['Location']['email']= @$dataSend['email'];
            $save['Location']['serviceType']= @$dataSend['serviceType'];
            $save['Location']['groupLocation']= @$dataSend['groupLocation'];
            $save['Location']['image']= @$dataSend['image'];
            $save['Location']['idHotel']= @$dataSend['idHotel'];
            $save['Location']['introductory']= @$dataSend['introductory'];
            $save['Location']['location']= @$dataSend['location'];
            $save['Location']['urlSlug']= createSlugMantan(trim($dataSend['name']));
        
            if ($modelLocation->save($save)) {
                   
                 $modelGroupLocation->redirect($urlPlugins.'admin/hoankiem360-admin-location-listLocationAdmin.php?code=1');
            }else{
                 $modelGroupLocation->redirect($urlPlugins.'admin/hoankiem360-admin-location-listLocationAdmin.php?code=2');
                   
            }
        }
    }else{
        $modelLocation->redirect($urlHomes);
    }
    setVariable('dataGroupLocation',$dataGroupLocation);
    setVariable('dataServiceType',$dataServiceType);

}

function deleteLocationAdmin($input){
    $modelLocation = new Location();
    global $urlPlugins;
    if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
        $idDelete = new MongoId($_GET['id']);
        $modelLocation->delete($idDelete);
        $modelLocation->redirect($urlPlugins.'admin/hoankiem360-admin-Location-ListLocationAdmin.php?code=1');
     }
}


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
?>