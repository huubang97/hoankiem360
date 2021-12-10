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
            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['Event']['id']))));
            $otherData= $modelEvent->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);
            setVariable('data',$data);
            setVariable('otherData',$otherData);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }       
}
// di tich lịch sủ
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
            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['HistoricalSites']['id']))));
            $otherData= $modelHistoricalSites->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);
            setVariable('data',$data);
            setVariable('otherData',$otherData);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

// Nhà hàng
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
        $data= $modelRestaurant->getRestaurantSlug($input['request']->params['pass'][1]);

        if(!empty($data)){
            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['Restaurant']['id']))));
            $otherData= $modelRestaurant->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);
            setVariable('data',$data);
            setVariable('otherData',$otherData);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

//Phố cổ
function listOldQuarter($input){

    $modelOldQuarter = new OldQuarter();
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

        $listData= $modelOldQuarter->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

        $totalData= $modelOldQuarter->find('count',$conditions);

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

function detailOldQuarter($input){
    global $infoSite;
    global $urlHomes;
        
    $modelOption= new Option();
    $modelOldQuarter = new OldQuarter();

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelOldQuarter->getOldQuarterSlug($input['request']->params['pass'][1]);

        if(!empty($data)){
            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['OldQuarter']['id']))));
            $otherData= $modelOldQuarter->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);
            setVariable('data',$data);
            setVariable('otherData',$otherData);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

//Cơ quan hành chính
function listGovernanceAgency($input){

    $modelGovernanceAgency = new GovernanceAgency();
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

        $listData= $modelGovernanceAgency->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

        $totalData= $modelGovernanceAgency->find('count',$conditions);

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

function detailGovernanceAgency($input){
    global $infoSite;
    global $urlHomes;
        
    $modelOption= new Option();
    $modelGovernanceAgency = new GovernanceAgency();

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelGovernanceAgency->getGovernanceAgencySlug($input['request']->params['pass'][1]);

        if(!empty($data)){
            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['GovernanceAgency']['id']))));
            $otherData= $modelGovernanceAgency->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);
            setVariable('data',$data);
            setVariable('otherData',$otherData);

        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

//tour 
function listTour($input){

    $modelTour = new Tour();
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

        $listData= $modelTour->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

        $totalData= $modelTour->find('count',$conditions);

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

function detailTour($input){
    global $infoSite;
    global $urlHomes;
        
    $modelOption= new Option();
    $modelTour = new Tour();

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelTour->getTourSlug($input['request']->params['pass'][1]);

        if(!empty($data)){
            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['Tour']['id']))));
            $otherData= $modelTour->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);
            setVariable('data',$data);
            setVariable('otherData',$otherData);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

//Hotel 
function listHotel($input){

    $modelHotel = new Hotel();
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

        $listData= $modelHotel->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

        $totalData= $modelHotel->find('count',$conditions);

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
        debug($listData);
        die();
        setVariable('listData',$listData);
        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);

}

function detailHotel($input){
    global $infoSite;
    global $urlHomes;
        
    $modelOption= new Option();
    $modelHotel = new Hotel();
    $keyManMo = '5dc8f2652ac5db08348b4567';

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelHotel->getHotelSlug($input['request']->params['pass'][1]);

        if(!empty($data)){
            
            $dataPost= array('key'=>$keyManMo, 'idHotel'=>$data['Hotel']['codeManmo'], 'lat'=>'', 'long'=>'', 'idUser'=>'');
            $infoHotelMM= sendDataConnectMantan('http://api.quanlyluutru.com/getInfoHotelAPI', $dataPost);
            $infoHotelMM= str_replace('ï»¿', '', utf8_encode($infoHotelMM));
            $infoHotelMM= json_decode($infoHotelMM, true);



            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['Hotel']['id']))));
            $otherData= $modelHotel->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);

            $data['HotelManmo'] = $infoHotelMM; 

            setVariable('data',$data);
            setVariable('otherData',$otherData);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}


//Lễ hội
function listFestival($input){

    $modelFestival = new Festival();
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

        $listData= $modelFestival->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

        $totalData= $modelFestival->find('count',$conditions);

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
        debug($listData);
        die();
        setVariable('listData',$listData);
        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);

}

function detailFestival($input){
    global $infoSite;
    global $urlHomes;

    
        
    $modelOption= new Option();
    $modelFestival = new Festival();

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelFestival->getFestivalSlug($input['request']->params['pass'][1]);

        if(!empty($data)){
            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['Festival']['id']))));
            $otherData= $modelFestival->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);
            setVariable('data',$data);
            setVariable('otherData',$otherData);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

//Hô hoàn kiếm
function listHklake($input){

    $modelHklake = new Hklake();
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

        $listData= $modelHklake->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

        $totalData= $modelHklake->find('count',$conditions);

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
        debug($listData);
        die();
        setVariable('listData',$listData);
        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);

}

function detailHklake($input){
    global $infoSite;
    global $urlHomes;
        
    $modelOption= new Option();
    $modelHklake = new Hklake();

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelHklake->getHklakeSlug($input['request']->params['pass'][1]);

        if(!empty($data)){
            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['Hklake']['id']))));
            $otherData= $modelHklake->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);
            setVariable('data',$data);
            setVariable('otherData',$otherData);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

//Giải trí 
function listEntertainment($input){

    $modelEntertainment = new Entertainment();
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

        $listData= $modelEntertainment->getPage($page, $limit = 15, $conditions, $order =  $order, $fields=null);

        $totalData= $modelEntertainment->find('count',$conditions);

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
        debug($listData);
        die();
        setVariable('listData',$listData);
        setVariable('page',$page);
        setVariable('totalPage',$totalPage);
        setVariable('back',$back);
        setVariable('next',$next);
        setVariable('urlPage',$urlPage);

}

function detailEntertainment($input){
    global $infoSite;
    global $urlHomes;
        
    $modelOption= new Option();
    $modelEntertainment = new Entertainment();

    if(isset($input['request']->params['pass'][1])){
        $input['request']->params['pass'][1]= str_replace('.html', '', $input['request']->params['pass'][1]);
        $data= $modelEntertainment->getEntertainmentSlug($input['request']->params['pass'][1]);

        if(!empty($data)){
            $conditions['id']=array('$nin'=>explode(',', strtoupper(str_replace(' ', '', $data['Entertainment']['id']))));
            $otherData= $modelEntertainment->getPage($page = 1, $limit = 3, $conditions, $order = array(), $fields=null);
            setVariable('data',$data);
            setVariable('otherData',$otherData);
        }else{
            $modelOption->redirect($urlHomes);
        }
    }
    
       
}

 ?>