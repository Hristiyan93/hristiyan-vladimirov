<?php

class Models_Base extends Zend_Db_Table{
    
    function findItem($id, $defaults = array()){
        $item = $this->find($id)->current();
        if(!$item){
            $item = $this->createRow($defaults);
        }
        return $item;
    }
    
    function saveItem($data){
        $id = isset($data['id'])?$data['id']:0;
        unset($data['id']);
    
        $item = $this->find($id)->current();
        if(!$item){
            $item = $this->createRow($data);
        }else{
            $item->setFromArray($data);
        }
        $item->save();
        return $item;
    }
    
}