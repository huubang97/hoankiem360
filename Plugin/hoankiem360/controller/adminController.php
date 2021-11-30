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
            $save=$modelLocation->getGroupLocation($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;

           

            $save['GroupLocation']['name']= $dataSend['name'];
            $save['GroupLocation']['not']= $dataSend['not'];
            $save['GroupLocation']['urlSlug']= createSlugMantan(trim($dataSend['name']));
            

            if ($modelGroupLocation->save($save)) {
                 $modelGroupLocation->redirect($urlPlugins.'admin/hoankiem360-admin-groupLocation-ListGroupLocationAdmin.php?code=1');
            }else{
                 $modelGroupLocation->redirect($urlPlugins.'admin/hoankiem360-admin-groupLocation-ListGroupLocationAdmin.php?code=-1');
            }
        }
    }else{
        $modelGroupLocation->redirect($urlHomes);
    }

}



function addLocationAdmin($input){
    $modelLocation = new location();
    global $urlPlugins;
    global $isRequestPost;
    
    if (checkAdminLogin()) {
        if (!empty($_GET['id'])) {
            $save=$modelLocation->getlocation($_GET['id']);
            setVariable('save',$save);
        }

        if ($isRequestPost) {
            $dataSend=$input['request']->data;

           

            $save['location']['title']= $dataSend['title'];
            $save['location']['urlSlug']= createSlugMantan(trim($dataSend['title']));
            

            if ($modelEvent->save($save)) {
                 $modelEvent->redirect($urlPlugins.'admin/hoankiem360-admin-event-listlocationAdmin.php?code=1');
            }else{
                 $modelEvent->redirect($urlPlugins.'admin/hoankiem360-admin-event-listlocationAdmin.php?code=-1');
            }
        }
    }else{
        $modelEvent->redirect($urlHomes);
    }

}

function deleteLocationAdmin($input){
    $modelEvent = new Event();
    global $urlPlugins;
    if (!empty($_GET['id']) && MongoId::isValid($_GET['id'])) {
            # code...
         $idDelete = new MongoId($_GET['id']);
         $modelEvent->delete($idDelete);
         $modelEvent->redirect($urlPlugins.'admin/hoankiem360-admin-event-listEventAdmin.php?code=1');
     }
}

?>
