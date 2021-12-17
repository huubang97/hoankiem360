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
    $modelHistoricalSites = new HistoricalSites();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelHistoricalSites->getHistoricalSites($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }


    echo json_encode($return);
}

/*Nhà hàng  */
function lisHRestaurantAPI($input){
    
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
    $modelRestaurant = new Restaurant();
    $dataSend = arrayMap($input['request']->data);       
    if (!empty($dataSend['id'])) {
            $data=$modelRestaurant->getRestaurant($dataSend['id']);
             $return= array('code'=>1,'data'=>$data);
        }


    echo json_encode($return);
}
?>