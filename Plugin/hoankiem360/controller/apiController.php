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

function listEventAPI($input){
    $modelEvent = new Event();
    global $urlNow;
    $_SESSION['urlCallBack']= $urlNow;
      
       
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

?>