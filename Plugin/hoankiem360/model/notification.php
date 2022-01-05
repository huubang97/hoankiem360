<?php

class Notification extends AppModel {

    var $name = 'Notification';

    function getPage($page = 1, $limit = 15, $conditions = array(), $order = array('created' => 'desc')) {
        $array = array(
            'limit' => $limit,
            'page' => $page,
            'order' => $order,
            'conditions' => $conditions
        );
        return $this->find('all', $array);
    }

    function getNotification($id='') {
        if(MongoId::isValid($id)){
            $id = new MongoId($id);
            $dk = array('_id' => $id);
            $return = $this->find('first', array('conditions' => $dk));
            return $return;
        }
    }

    function getCountNotification($idHotel='')
    {
        $dk = array('idHotel'=>$idHotel,'to'=>'manager','status'=>'new');
        $return = $this->find('count', array('conditions' => $dk));
        return $return;
    }
}

?>