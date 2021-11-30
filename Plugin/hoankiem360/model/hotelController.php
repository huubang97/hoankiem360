<?php 
function getHotel360API($input)
{
    global $modelOption;

    $dataSend = arrayMap($input['request']->data);
    $modelHotel = new Hotel();
    $modelTypeRoom = new TypeRoom();
    $modelComment = new Comment();
    $modelKey = new Key();
    
    $return= array('code'=>0,'data'=>array());

    $checkKey= false;
    if(!empty($dataSend['key'])){
        $keyApp= $modelKey->getKey($dataSend['key']);

        if($keyApp){
            $checkKey= true;
        }
    }
    
    if($checkKey){
        $page = (!empty($dataSend['page']))?(int) $dataSend['page']: 1;
        $limit = (!empty($dataSend['limit']))?(int) $dataSend['limit']: 200;

        $conditions = array('showOnline'=>1);
        $conditions['link360']= array('$ne'=>'','$exists'=>true);
        //$conditions['contractNumber']= array('$ne'=>'','$exists'=>true);

        $order= array();
        // tìm theo bán kính
        if(!empty($dataSend['lat'])){
            $lat= (double) $dataSend['lat'];
        }

        if(!empty($dataSend['long'])){
            $long= (double) $dataSend['long'];
        }

        if(!empty($dataSend['orderBy'])){
            switch($dataSend['orderBy']){
                case 'cheap': $order= array('priceHour'=>'asc','price'=>'asc','created'=>'desc','name' => 'asc');break;
                case 'vote': $order['point'] = 'desc';break;
            }
        }

        //$fields= array('priceHour','price','priceNight','imageDefault','name','point','coordinates_x','coordinates_y','address','furniture','discount','slug');
        $fields= $keyApp['Key']['getHotelAroundAPI'];
        
        $listHotel = $modelHotel->find('all',array('conditions'=>$conditions,'order'=>$order,'fields'=>$fields,'page'=>$page,'limit'=>$limit));
        
        $today= getdate();
        $listHotelDiscount= array();
        $listHotelOrder= array();

        if($listHotel){
            foreach($listHotel as $key=>$hotel){
                $hotel['Hotel']['typeHotel']= (int) $hotel['Hotel']['typeHotel'];

                if(empty($hotel['Hotel']['contractNumber'])){
                    $hotel['Hotel']['manmoValidate']= 0;
                }else{
                    $hotel['Hotel']['manmoValidate']= 1;
                }

                if(isset($hotel['Hotel']['contractNumber'])) unset($hotel['Hotel']['contractNumber']);

                // lấy danh sách loại phòng
                $page = 1;
                $limit = null;
                $conditions= array('idHotel'=>$hotel['Hotel']['id'],'sellOnline'=>'open');
                $fields= array('roomtype','so_nguoi','ngay_thuong','ngay_cuoi_tuan','ngay_le');
                $order= array();
                $hotel['Hotel']['listTypeRoom'] = $modelTypeRoom->getPage($page, $limit, $conditions, $order, $fields);
                // check giảm giá
                if(empty($hotel['Hotel']['discount'])) $hotel['Hotel']['discount']= 0;
                
                // tính số comment
                $conditionsComment = array('idHotel'=>$hotel['Hotel']['id']);
                $hotel['Hotel']['numberComment']= $modelComment->find('count',array('conditions'=>$conditionsComment));

                // xử lý ảnh
                if(!empty($hotel['Hotel']['imageDefault'])){
                    $linkImage= (strpos($hotel['Hotel']['imageDefault'], 'http') !== false)?$hotel['Hotel']['imageDefault']:'https://manmo'.$data['Hotel']['imageDefault'];
                    $linkImage= str_replace('//', '/', $linkImage);
                    $linkImage= str_replace(':/', '://', $linkImage);
                    $hotel['Hotel']['imageDefault']= $linkImage;
                }

                // tính khoảng cách
                $khoangCach= 0;
                $hotel['Hotel']['linkWeb']= 'https://manmo.vn/detail/'.$hotel['Hotel']['slug'].'.html';
                if(!empty($lat) && !empty($long) && !empty($hotel['Hotel']['coordinates_x']) && !empty($hotel['Hotel']['coordinates_y'])){
                    $khoangCach= tinhKhoangCach($lat,$long,$hotel['Hotel']['coordinates_x'],$hotel['Hotel']['coordinates_y'],false);
                    $hotel['Hotel']['realDistance']= $khoangCach;
                }else{
                    $hotel['Hotel']['realDistance']= '';
                }
                
                
                $khoangCach= $khoangCach*1000;
                if(!empty($khoangCach) && empty($listHotelOrder[$khoangCach])){
                    $listHotelOrder[$khoangCach]= $hotel;
                }else{
                    
                    for($i=1;$i<=999;$i++){
                        $j=$khoangCach+$i;
                        
                        if(empty($listHotelOrder[$j])){
                            $listHotelOrder[$j]= $hotel;
                            break;
                        }
                    }
                }
            }

            ksort($listHotelOrder);
            $listHotelOrder= array_values($listHotelOrder);

            $listHotel= $listHotelDiscount+$listHotelOrder;
        }

        $return= array('code'=>0,'data'=>$listHotel);
    }
    echo json_encode($return);
}

function getTopHotelBestAPI($input)
{
    global $modelOption;

    $dataSend = arrayMap($input['request']->data);
    $modelHotel = new Hotel();
    $modelTypeRoom = new TypeRoom();
    $modelComment = new Comment();
    $modelKey = new Key();
    
    $return= array('code'=>0,'data'=>array());

    $checkKey= false;
    if(!empty($dataSend['key'])){
        $keyApp= $modelKey->getKey($dataSend['key']);

        if($keyApp){
            $checkKey= true;
        }
    }
    
    if($checkKey){
        $page = (!empty($dataSend['page']))?(int) $dataSend['page']: 1;
        $limit = (!empty($dataSend['limit']))?(int) $dataSend['limit']: 20;

        $conditions = array('showOnline'=>1,'best'=>1);
        
        $order= array();
        // tìm theo bán kính
        if(!empty($dataSend['lat'])){
            $lat= (double) $dataSend['lat'];
        }

        if(!empty($dataSend['long'])){
            $long= (double) $dataSend['long'];
        }

        // tinh bán kính
        if(!empty($lat) && !empty($long)){
            if(empty($dataSend['distance'])) $dataSend['distance']= 0.081; // 10km
            $latMin= $lat-$dataSend['distance'];
            $latMax= $lat+$dataSend['distance'];

            $longMin= $long-$dataSend['distance'];
            $longMax= $long+$dataSend['distance'];

            $conditions['coordinates_x']= array('$gte' => $latMin,'$lte' => $latMax);
            $conditions['coordinates_y']= array('$gte' => $longMin,'$lte' => $longMax);
        }

        if(!empty($dataSend['orderBy'])){
            switch($dataSend['orderBy']){
                case 'cheap': $order= array('priceHour'=>'asc','price'=>'asc','created'=>'desc','name' => 'asc');break;
                case 'vote': $order['point'] = 'desc';break;
            }
        }

        $fields= $keyApp['Key']['getHotelAroundAPI'];
        
        $listHotel = $modelHotel->find('all',array('conditions'=>$conditions,'order'=>$order,'fields'=>$fields,'page'=>$page,'limit'=>$limit));
        
        $today= getdate();
        $listHotelDiscount= array();
        $listHotelOrder= array();

        if($listHotel){
            foreach($listHotel as $key=>$hotel){
                $hotel['Hotel']['typeHotel']= (int) $hotel['Hotel']['typeHotel'];

                if(empty($hotel['Hotel']['contractNumber'])){
                    $hotel['Hotel']['manmoValidate']= 0;
                }else{
                    $hotel['Hotel']['manmoValidate']= 1;
                }

                if(isset($hotel['Hotel']['contractNumber'])) unset($hotel['Hotel']['contractNumber']);

                // lấy danh sách loại phòng
                $page = 1;
                $limit = null;
                $conditions= array('idHotel'=>$hotel['Hotel']['id'],'sellOnline'=>'open');
                $fields= array('roomtype','so_nguoi','ngay_thuong','ngay_cuoi_tuan','ngay_le');
                $order= array();
                $hotel['Hotel']['listTypeRoom'] = $modelTypeRoom->getPage($page, $limit, $conditions, $order, $fields);
                // check giảm giá
                if(empty($hotel['Hotel']['discount'])) $hotel['Hotel']['discount']= 0;
                
                // tính số comment
                $conditionsComment = array('idHotel'=>$hotel['Hotel']['id']);
                $hotel['Hotel']['numberComment']= $modelComment->find('count',array('conditions'=>$conditionsComment));

                // xử lý ảnh
                if(!empty($hotel['Hotel']['imageDefault'])){
                    $linkImage= (strpos($hotel['Hotel']['imageDefault'], 'http') !== false)?$hotel['Hotel']['imageDefault']:'https://manmo.vn'.$data['Hotel']['imageDefault'];
                    $linkImage= str_replace('//', '/', $linkImage);
                    $linkImage= str_replace(':/', '://', $linkImage);
                    $hotel['Hotel']['imageDefault']= $linkImage;
                }

                // tính khoảng cách
                $khoangCach= 0;
                $hotel['Hotel']['linkWeb']= 'https://manmo.vn/detail/'.$hotel['Hotel']['slug'].'.html';
                if(!empty($lat) && !empty($long) && !empty($hotel['Hotel']['coordinates_x']) && !empty($hotel['Hotel']['coordinates_y'])){
                    $khoangCach= tinhKhoangCach($lat,$long,$hotel['Hotel']['coordinates_x'],$hotel['Hotel']['coordinates_y'],false);
                    $hotel['Hotel']['realDistance']= $khoangCach;
                }else{
                    $hotel['Hotel']['realDistance']= '';
                }
                
                
                $khoangCach= $khoangCach*1000;
                if(!empty($khoangCach) && empty($listHotelOrder[$khoangCach])){
                    $listHotelOrder[$khoangCach]= $hotel;
                }else{
                    
                    for($i=1;$i<=999;$i++){
                        $j=$khoangCach+$i;
                        
                        if(empty($listHotelOrder[$j])){
                            $listHotelOrder[$j]= $hotel;
                            break;
                        }
                    }
                }
            }

            ksort($listHotelOrder);
            $listHotelOrder= array_values($listHotelOrder);

            $listHotel= $listHotelDiscount+$listHotelOrder;
        }

        $return= array('code'=>0,'data'=>$listHotel);
    }
    echo json_encode($return);
}

function getHotelEmotelAPI($input)
{
    global $modelOption;

    $dataSend = arrayMap($input['request']->data);
    $modelHotel = new Hotel();
    $modelTypeRoom = new TypeRoom();
    $modelComment = new Comment();
    $modelKey = new Key();
    
    $return= array('code'=>0,'data'=>array());

    $checkKey= false;
    if(!empty($dataSend['key'])){
        $keyApp= $modelKey->getKey($dataSend['key']);

        if($keyApp){
            $checkKey= true;
        }
    }
    
    if($checkKey){
        $page = (!empty($dataSend['page']))?(int) $dataSend['page']: 1;
        $limit = (!empty($dataSend['limit']))?(int) $dataSend['limit']: 20;

        $conditions = array('showOnline'=>1,'manager'=>'5f2ba4062ac5dbb1358b4568');
        
        $order= array();
        // tìm theo bán kính
        if(!empty($dataSend['lat'])){
            $lat= (double) $dataSend['lat'];
        }

        if(!empty($dataSend['long'])){
            $long= (double) $dataSend['long'];
        }

        $fields= $keyApp['Key']['getHotelAroundAPI'];
        
        $listHotel = $modelHotel->find('all',array('conditions'=>$conditions,'order'=>$order,'fields'=>$fields,'page'=>$page,'limit'=>$limit));
        
        $today= getdate();
        $listHotelDiscount= array();
        $listHotelOrder= array();

        if($listHotel){
            foreach($listHotel as $key=>$hotel){
                $hotel['Hotel']['typeHotel']= (int) $hotel['Hotel']['typeHotel'];

                if(empty($hotel['Hotel']['contractNumber'])){
                    $hotel['Hotel']['manmoValidate']= 0;
                }else{
                    $hotel['Hotel']['manmoValidate']= 1;
                }

                if(isset($hotel['Hotel']['contractNumber'])) unset($hotel['Hotel']['contractNumber']);

                // lấy danh sách loại phòng
                $page = 1;
                $limit = null;
                $conditions= array('idHotel'=>$hotel['Hotel']['id'],'sellOnline'=>'open');
                $fields= array('roomtype','so_nguoi','ngay_thuong','ngay_cuoi_tuan','ngay_le');
                $order= array();
                $hotel['Hotel']['listTypeRoom'] = $modelTypeRoom->getPage($page, $limit, $conditions, $order, $fields);
                // check giảm giá
                if(empty($hotel['Hotel']['discount'])) $hotel['Hotel']['discount']= 0;
                
                // tính số comment
                $conditionsComment = array('idHotel'=>$hotel['Hotel']['id']);
                $hotel['Hotel']['numberComment']= $modelComment->find('count',array('conditions'=>$conditionsComment));

                // xử lý ảnh
                if(!empty($hotel['Hotel']['imageDefault'])){
                    $linkImage= (strpos($hotel['Hotel']['imageDefault'], 'http') !== false)?$hotel['Hotel']['imageDefault']:'https://manmo.vn'.$data['Hotel']['imageDefault'];
                    $linkImage= str_replace('//', '/', $linkImage);
                    $linkImage= str_replace(':/', '://', $linkImage);
                    $hotel['Hotel']['imageDefault']= $linkImage;
                }

                // tính khoảng cách
                $khoangCach= 0;
                $hotel['Hotel']['linkWeb']= 'https://manmo.vn/detail/'.$hotel['Hotel']['slug'].'.html';
                if(!empty($lat) && !empty($long) && !empty($hotel['Hotel']['coordinates_x']) && !empty($hotel['Hotel']['coordinates_y'])){
                    $khoangCach= tinhKhoangCach($lat,$long,$hotel['Hotel']['coordinates_x'],$hotel['Hotel']['coordinates_y'],false);
                    $hotel['Hotel']['realDistance']= $khoangCach;
                }else{
                    $hotel['Hotel']['realDistance']= '';
                }
                
                
                $khoangCach= $khoangCach*1000;
                if(!empty($khoangCach) && empty($listHotelOrder[$khoangCach])){
                    $listHotelOrder[$khoangCach]= $hotel;
                }else{
                    
                    for($i=1;$i<=999;$i++){
                        $j=$khoangCach+$i;
                        
                        if(empty($listHotelOrder[$j])){
                            $listHotelOrder[$j]= $hotel;
                            break;
                        }
                    }
                }
            }

            ksort($listHotelOrder);
            $listHotelOrder= array_values($listHotelOrder);

            $listHotel= $listHotelDiscount+$listHotelOrder;
        }

        $return= array('code'=>0,'data'=>$listHotel);
    }
    echo json_encode($return);
}

function getHotelDiscountAPI($input)
{
    global $modelOption;

    $dataSend = arrayMap($input['request']->data);
    $modelHotel = new Hotel();
    $modelTypeRoom = new TypeRoom();
    $modelComment = new Comment();
    $modelKey = new Key();
    
    $return= array('code'=>0,'data'=>array());

    $checkKey= false;
    if(!empty($dataSend['key'])){
        $keyApp= $modelKey->getKey($dataSend['key']);

        if($keyApp){
            $checkKey= true;
        }
    }
    
    if($checkKey){
        $page = (!empty($dataSend['page']))?(int) $dataSend['page']: 1;
        $limit = (!empty($dataSend['limit']))?(int) $dataSend['limit']: 200;

        $conditions = array('showOnline'=>1);
        $conditions['discount'] =array('$gt'=>0);
        //$conditions['contractNumber']= array('$ne'=>'','$exists'=>true);
        $order= array('discount'=>'desc');

        if(!empty($dataSend['orderBy'])){
        	if($dataSend['orderBy']=='discount'){
        		$order= array('discount'=>'desc');
        	}elseif($dataSend['orderBy']=='new'){
        		$order= array('created'=>'desc');
        	}elseif($dataSend['orderBy']=='around'){
        		// tìm theo bán kính
		        if(!empty($dataSend['lat'])){
		            $lat= (double) $dataSend['lat'];
		        }

		        if(!empty($dataSend['long'])){
		            $long= (double) $dataSend['long'];
		        }

		        // tinh bán kính
		        if(!empty($lat) && !empty($long)){
		            if(empty($dataSend['distance'])) $dataSend['distance']= 0.081; // 10km
		            $latMin= $lat-$dataSend['distance'];
		            $latMax= $lat+$dataSend['distance'];

		            $longMin= $long-$dataSend['distance'];
		            $longMax= $long+$dataSend['distance'];

		            $conditions['coordinates_x']= array('$gte' => $latMin,'$lte' => $latMax);
		            $conditions['coordinates_y']= array('$gte' => $longMin,'$lte' => $longMax);

		            $order= array('discount'=>'desc');
		        }
        	}
        }

        //$fields= array('priceHour','price','priceNight','imageDefault','name','point','coordinates_x','coordinates_y','address','furniture','discount','slug');
        $fields= $keyApp['Key']['getHotelAroundAPI'];
        
        $listHotel = $modelHotel->find('all',array('conditions'=>$conditions,'order'=>$order,'fields'=>$fields,'page'=>$page,'limit'=>$limit));
        
        $today= getdate();
        $listHotelDiscount= array();
        $listHotelOrder= array();

        if($listHotel){
            foreach($listHotel as $key=>$hotel){
                $hotel['Hotel']['typeHotel']= (int) $hotel['Hotel']['typeHotel'];
                
                if(empty($hotel['Hotel']['contractNumber'])){
                    $hotel['Hotel']['manmoValidate']= 0;
                }else{
                    $hotel['Hotel']['manmoValidate']= 1;
                }

                if(isset($hotel['Hotel']['contractNumber'])) unset($hotel['Hotel']['contractNumber']);

                // lấy danh sách loại phòng
                $page = 1;
                $limit = null;
                $conditions= array('idHotel'=>$hotel['Hotel']['id'],'sellOnline'=>'open');
                $fields= array('roomtype','so_nguoi','ngay_thuong','ngay_cuoi_tuan','ngay_le');
                $order= array();
                $hotel['Hotel']['listTypeRoom'] = $modelTypeRoom->getPage($page, $limit, $conditions, $order, $fields);

                // tính số comment
                $conditionsComment = array('idHotel'=>$hotel['Hotel']['id']);
                $hotel['Hotel']['numberComment']= $modelComment->find('count',array('conditions'=>$conditionsComment));

                // xử lý ảnh
                if(!empty($hotel['Hotel']['imageDefault'])){
                    $linkImage= (strpos($hotel['Hotel']['imageDefault'], 'http') !== false)?$hotel['Hotel']['imageDefault']:'https://manmo'.$data['Hotel']['imageDefault'];
                    $linkImage= str_replace('//', '/', $linkImage);
                    $linkImage= str_replace(':/', '://', $linkImage);
                    $hotel['Hotel']['imageDefault']= $linkImage;
                }

                // tính khoảng cách
                $khoangCach= 0;
                $hotel['Hotel']['linkWeb']= 'https://manmo.vn/detail/'.$hotel['Hotel']['slug'].'.html';
                if(!empty($lat) && !empty($long) && !empty($hotel['Hotel']['coordinates_x']) && !empty($hotel['Hotel']['coordinates_y'])){
                    $khoangCach= tinhKhoangCach($lat,$long,$hotel['Hotel']['coordinates_x'],$hotel['Hotel']['coordinates_y'],false);
                    $hotel['Hotel']['realDistance']= $khoangCach;
                }else{
                    $hotel['Hotel']['realDistance']= '';
                }
                
                
                $khoangCach= $khoangCach*1000;
                if(!empty($khoangCach) && empty($listHotelOrder[$khoangCach])){
                    $listHotelOrder[$khoangCach]= $hotel;
                }else{
                    
                    for($i=1;$i<=999;$i++){
                        $j=$khoangCach+$i;
                        
                        if(empty($listHotelOrder[$j])){
                            $listHotelOrder[$j]= $hotel;
                            break;
                        }
                    }
                }
            }

            ksort($listHotelOrder);
            $listHotelOrder= array_values($listHotelOrder);

            $listHotel= $listHotelDiscount+$listHotelOrder;
        }

        $return= array('code'=>0,'data'=>$listHotel);
    }

    echo json_encode($return);
}

function getInfoHotelAPI($input)
{
	//Configure::write('debug', 2);
    global $modelOption;
    global $typeHotelManmo;
    global $keyManMoChat;

    $modelHotel = new Hotel();
    $modelPromotion = new Promotion();
    $modelKey = new Key();
    $modelUser= new Userhotel();
    $modelMerchandiseGroup = new MerchandiseGroup();
    $modelMerchandise = new Merchandise();
    $modelComment= new Comment;
    $modelEvent= new Event();
    $modelDiscount= new Discount();

    $return= array('code'=>1,'data'=>array());
    $dataSend = arrayMap($input['request']->data);

    $checkKey= false;
    if(!empty($dataSend['key'])){
        $keyApp= $modelKey->getKey($dataSend['key']);

        if($keyApp){
            $checkKey= true;
        }
    }
    
    if($checkKey){
        //if(empty($dataSend['idHotel'])) $dataSend['idHotel']= $_GET['idHotel'];

        if(!empty($dataSend['idHotel'])){
        	$fields= array('name','address','discount','otherPhone','numberRoom','website','typeHotel','local','image','info','coordinates_x','coordinates_y','facebook','price','imageDefault','priceHour','priceNight','link360','priceMonth','priceYear','wifi','furniture','view','point','slug','imagePrice','city','district','phone','email','contractNumber','rules','video','listVote','manager');
    	    $data = $modelHotel->getHotel($dataSend['idHotel'],$fields);

    	    if (empty($data)) {
    	        $return['code']= 2;
    	    } else {
                // lưu hành động xem của người dùng
                if(!empty($dataSend['idUser'])){
                    $saveUser['$inc']['staticSearch.typeHotel.'.$data['Hotel']['typeHotel']]= 1;
                    if(!empty($data['Hotel']['price'])){
                        $saveUser['$push']['staticSearch.priceHotel']= (int) $data['Hotel']['price'];
                    }
                    $conditionsUser= array('_id'=>new MongoId($dataSend['idUser']));
                    $modelUser->updateAll($saveUser,$conditionsUser);
                }

                if(empty($data['Hotel']['contractNumber'])){
                    $data['Hotel']['manmoValidate']= 0;
                }else{
                    $data['Hotel']['manmoValidate']= 1;
                }

                if(empty($data['Hotel']['rules'])){
                    $data['Hotel']['rules']= '';
                }

                if(empty($data['Hotel']['video'])){
                    $data['Hotel']['video']= '';
                }

                // lấy danh sách hàng hóa dịch vụ
                $data['Hotel']['service']= array();

                $conditionsMerchandiseGroup['idHotel'] = $dataSend['idHotel'];
        		$listDataMerchandiseGroup= $modelMerchandiseGroup->find('all',array('conditions'=>$conditionsMerchandiseGroup));
        		if(!empty($listDataMerchandiseGroup)){
        			foreach($listDataMerchandiseGroup as $merchandiseGroup){
        				$conditionsMerchandise['idHotel'] = $dataSend['idHotel'];
				        $conditionsMerchandise['type_merchandise']= $merchandiseGroup['MerchandiseGroup']['id'];
				        $conditionsMerchandise['quantity']= array('$gt'=> 0);

				        $listDataMerchandise= $modelMerchandise->find('all', array('conditions'=>$conditionsMerchandise, 'fields'=>array('name','code','price','image')));

				        $data['Hotel']['service'][]= array(	'idMerchandiseGroup'=>$merchandiseGroup['MerchandiseGroup']['id'],
				        									'nameMerchandiseGroup'=>$merchandiseGroup['MerchandiseGroup']['name'],
				        									'listMerchandise'=>$listDataMerchandise
				    									);
        			}
        		}

                if(isset($data['Hotel']['contractNumber'])) unset($data['Hotel']['contractNumber']);

    	        if(!empty($data['Hotel']['imageDefault'])) $data['Hotel']['image'][]= $data['Hotel']['imageDefault'];
    	        if(!empty($data['Hotel']['imagePrice'])) $data['Hotel']['image'][]= $data['Hotel']['imagePrice'];
    	        unset($data['Hotel']['imageDefault']);
    	        unset($data['Hotel']['imagePrice']);

                if(!empty($data['Hotel']['image'])){
                    foreach($data['Hotel']['image'] as $keyImage=>$valueImage){
                        if(!empty($valueImage)){
                            $linkImage= (strpos($valueImage, 'http') !== false)?$valueImage:'https://manmo'.$valueImage;
                            $linkImage= str_replace('//', '/', $linkImage);
                            $linkImage= str_replace(':/', '://', $linkImage);
                            $data['Hotel']['image'][$keyImage]= $linkImage;
                        }else{
                            unset($data['Hotel']['image'][$keyImage]);
                        }
                    }
                }

                $data['Hotel']['image']= array_values($data['Hotel']['image']);

    	        if(!empty($data['Hotel']['imageDefault'])){
    	            $data['Hotel']['imageDefault'] = (getimagesize($data['Hotel']['imageDefault'])!=false)?$data['Hotel']['imageDefault']:'https://manmo.vn/'.$data['Hotel']['imageDefault'];
    	        }

                if(empty($data['Hotel']['info'])){
                    $typeHotel = $typeHotelManmo[$data['Hotel']['typeHotel']]['name'];

                    if($data['Hotel']['point']>0){
                        $textPoint= 'Các cặp đôi đặc biệt thích '.$data['Hotel']['name'].' và họ đã cho '.$data['Hotel']['point'].' điểm sau khi nghỉ tại đây';
                    }else{
                        $textPoint= 'Địa điểm này chưa nhận được đánh giá nào của người dùng';
                    }

                    $data['Hotel']['info']= $data['Hotel']['name'].' là một '.$typeHotel.' đẹp có địa chỉ ngay tại '.$data['Hotel']['address'].', đường đi rất thuận tiện và dễ tìm. '.$data['Hotel']['name'].' có đội ngũ nhân viên chuyên nghiệp, luôn cố gắng phục vụ mọi nhu cầu của khách hàng, vui lòng khách đến, vừa lòng khách đi. '.$data['Hotel']['name'].' có quy mô '.(int)@$data['Hotel']['numberRoom'].' phòng, phòng ốc của '.$data['Hotel']['name'].' sạch đẹp, đầy đủ tiện ích trong phòng, có đầy đủ nóng lạnh, internet. '.$textPoint.'. Chỗ nghỉ này cũng được đánh giá là đáng giá tiền nhất ở quanh khu vực, bạn sẽ tiết kiệm được nhiều hơn so với các chỗ nghỉ khác. Mọi chi tiết xin liên hệ: '.$data['Hotel']['name'].'. Điện thoại: '.$data['Hotel']['phone'].'. Email: '.$data['Hotel']['email'].'. Địa chỉ: '.$data['Hotel']['address'];
                }

    	        $modelHotel->updateView($data['Hotel']['id']);

    	        $data['Hotel']['linkWeb'] = 'https://manmo.vn/detail/' . $data['Hotel']['slug'] . '.html';
    	        // lấy gợi ý các cơ sở xung quanh
    	        $radius= 0.09; // 10km
    	        $conditions = array('_id'=>array('$ne'=>new MongoId($data['Hotel']['id']) ));
    	        $conditions['showOnline'] = 1;
    	        $fields= array('priceHour','price','priceNight','imageDefault','name','point','coordinates_x','coordinates_y','address','phone','furniture','email','discount','slug','city');
    	       
    	        $limit= 8;
    	        $order= array();
    	        $otherData = $modelHotel->getAround($data['Hotel']['coordinates_x'],$data['Hotel']['coordinates_y'],$radius,$fields,$conditions, $order, $limit );
    	        
    	        // lấy danh sách loại phòng
    	        $modelTypeRoom = new TypeRoom();
    	        $page = 1;
    	        $limit = null;
    	        $conditions= array('idHotel'=>$data['Hotel']['id'],'sellOnline'=>'open');
    	        $fields= array('roomtype','so_nguoi','ngay_thuong','so_giuong','image');
    	        $order= array();
    	        $listTypeRoom = $modelTypeRoom->getPage($page, $limit, $conditions, $order, $fields);

    	        // lấy danh sách khuyến mãi của cơ sở
    	        $today = getdate();
                $conditions= array('idHotel'=>$data['Hotel']['id']);
                $conditions['time_start'] = array('$gte' => $today[0]);
    	        $conditions['time_end'] = array('$lte' => $today[0]);
    	        $listPromotion = $modelPromotion->getPage(1, null, $conditions);

    	        // lấy danh sách mã giảm giá của ManMo
    	        $conditions= array('listManagerID'=>$data['Hotel']['manager']);
                //$conditions= array('listManagerID'=>$data['Hotel']['id']);
                $conditions['dateStart.time']['$lte'] = $today[0];
                $conditions['dateEnd.time']['$gte'] = $today[0];
                
    	        $listDiscount = $modelDiscount->getPage(1, null, $conditions);

    	        $khoangCach= '';
    	        if(!empty($dataSend['lat']) && !empty($dataSend['long']) && !empty($data['Hotel']['coordinates_x']) && !empty($data['Hotel']['coordinates_y'])){
    	            $khoangCach= tinhKhoangCach($dataSend['lat'],$dataSend['long'],$data['Hotel']['coordinates_x'],$data['Hotel']['coordinates_y']);
    	        }
    	        $data['Hotel']['realDistance']= $khoangCach;

                $infoUserChat= sendDataConnectMantan('https://chat.manmo.vn/getInfoManMoSearchAPI', array('userId'=>$data['Hotel']['manager'],'key'=>$keyManMoChat));
                //debug($infoUserChat);
                $infoUserChat= json_decode($infoUserChat, true);

                // lấy comment
                $conditionsComment = array('idHotel'=>$data['Hotel']['id']);
	            $orderComment = array('created' => 'desc');

	            $listComment= $modelComment->getPage(1, 3, $conditionsComment, $orderComment);

    	        $return['code']= 0;
    	        $return['data']= $data;
    	        $return['listPromotion']= $listPromotion; // mã giảm giá của cơ sở
    	        $return['listDiscount']= $listDiscount; // mã giảm giá của ManMo mà cơ sở tham gia
    	        $return['listTypeRoom']= $listTypeRoom;
    	        $return['listComment']= $listComment;
    	        $return['otherData']= $otherData;
                $return['infoUserChat']= $infoUserChat;


    	    }
    	    
    	}
    }

	echo json_encode($return);
}

function getListHotelManagerAPI($input)
{
    global $modelOption;

    $dataSend = arrayMap($input['request']->data);
    $modelHotel = new Hotel();
    $modelTypeRoom = new TypeRoom();
    $modelComment = new Comment();
    $modelKey = new Key();
    
    $return= array('code'=>0,'listData'=>array());

    $checkKey= false;
    if(!empty($dataSend['key'])){
        $keyApp= $modelKey->getKey($dataSend['key']);

        if($keyApp){
            $checkKey= true;
        }
    }
    
    if($checkKey){
        if(!empty($dataSend['idManager'])){
            $listHotel= $modelHotel->find('all', array('conditions'=> array('showOnline'=>1,'manager'=>$dataSend['idManager'])));

            $return= array('code'=>1,'listData'=>$listHotel);
        }
    }
    echo json_encode($return);
}


function getListIdHotelAPI($input)
{
   /* header('Access-Control-Allow-Origin: *');*/
    /* header('Access-Control-Allow-Methods: OPTIONS, POST, GET, PUT');*/
     header('Access-Control-Allow-Methods: *');
    
    global $modelOption;
    $dataSend = arrayMap($input['request']->data);
    $modelHotel = new Hotel();
    $modelTypeRoom = new TypeRoom();
    $modelComment = new Comment();
    $modelKey = new Key();
    
    $return= array('code'=>0,'listData'=>array());

    $checkKey= false;
    if(!empty($dataSend['key'])){
        $keyApp= $modelKey->getKey($dataSend['key']);

        if($keyApp){
            $checkKey= true;
        }
    }
    if($checkKey){
        if(!empty($dataSend['idHotel'])){
            $idHotel = str_replace('&quot;', '"', utf8_encode($dataSend['idHotel']));
            $idHotel = json_decode($idHotel, true);
            $conditions = array();
            $conditions['id']= array('$in'=>$idHotel);
            $conditions['showOnline']= 1;

            $listHotel= $modelHotel->find('all', array('conditions'=> $conditions));

            $return= array('code'=>1,'listData'=>$listHotel);
        }
    }
    echo json_encode($return);
}

?>