<?php

class Entertainment extends AppModel {

    var $name = 'Entertainment';

    function getPage($page = 1, $limit = null, $conditions = array(), $order = array('created' => 'desc', 'title' => 'asc'), $field= array()) {
        $array = array(
            'limit' => $limit,
            'page' => $page,
            'order' => $order,
            'conditions' => $conditions,
            'fields' => $field
        );
        return $this->find('all', $array);
    }

    function getEntertainment($id='') {
        if(MongoId::isValid($id)){
            $id = new MongoId($id);
            $dk = array('_id' => $id);
            $return = $this->find('first', array('conditions' => $dk));
            return $return;
        }
    }

}

?>