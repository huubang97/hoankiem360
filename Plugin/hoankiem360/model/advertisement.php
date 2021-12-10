<?php
class Advertisement extends AppModel {

    var $name = 'Advertisement';

    function getPage($page = 1, $limit = null, $conditions = array(), $order = array('created' => 'desc', 'name' => 'asc'), $field= array()) {
        $array = array(
            'limit' => $limit,
            'page' => $page,
            'order' => $order,
            'conditions' => $conditions,
            'fields' => $field
        );
        return $this->find('all', $array);
    }

    function getAdvertisement($id='') {
        if(MongoId::isValid($id)){
            $id = new MongoId($id);
            $dk = array('_id' => $id);
            $return = $this->find('first', array('conditions' => $dk));
            return $return;
        }
    }

    function getAdvertisementSlug($slug){
        $dk = array ('urlSlug' => $slug);
        $return = $this -> find('first', array('conditions' => $dk) );
        return $return;
         
   }
}

?>