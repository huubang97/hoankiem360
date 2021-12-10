<?php 
// sự kiệt
function listEvent($input){

    $modelEvent = new Event();
    global $urlNow;
      
        $page= (isset($_GET['page']))? (int) $_GET['page']:1;
        if($page<=0) $page=1;
        $limit= 15;
         $getmonth   = getmonth();
        
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

        $totalData= $modelEvent->find('count',$conditions);

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
        setVariable('getmonth',$getmonth);

        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);

}

function detailEvent($input){
    global $metaTitleMantan;
    global $metaKeywordsMantan;
    global $metaDescriptionMantan;
    global $metaImageMantan;
    global $infoSite;
    global $urlHomes;
        
    $modelOption= new Option();
    $modelEvent = new Event();
    $getmonth   = getmonth();

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelEvent->getEventSlug($input['request']->params['pass'][1]);
         //   $folderHotel= $urlHomes.'/app/Plugin/Hotel/';
        if(!empty($data)){
            setVariable('data',$data);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

function listHistoricalSites($input){

    $modelHistoricalSites = new HistoricalSites();
    global $urlNow;
      
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

        $totalData= $modelHistoricalSites->find('count',$conditions);

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

}

function detailHistoricalSites($input){
    global $infoSite;
    global $urlHomes;
        
    $modelOption= new Option();
    $modelHistoricalSites = new HistoricalSites();

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelHistoricalSites->getHistoricalSitesSlug($input['request']->params['pass'][1]);
           // $folderHotel= $urlHomes.'/app/Plugin/Hotel/';

        if(!empty($data)){
            setVariable('data',$data);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}


function listRestaurant($input){

    $modelRestaurant = new Restaurant();
    global $urlNow;
      
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

        $totalData= $modelRestaurant->find('count',$conditions);

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

}

function detailRestaurant($input){
    global $infoSite;
    global $urlHomes;
        
    $modelOption= new Option();
    $modelRestaurant = new Restaurant();

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelHistoricalSites->getRestaurantSlug($input['request']->params['pass'][1]);

        if(!empty($data)){
            setVariable('data',$data);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

 ?>