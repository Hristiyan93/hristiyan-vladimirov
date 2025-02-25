<?php

class Models_Contacts extends Zend_Db_Table{
    protected $_name = 'contacts';
    
    function createContact($info){
        $info = array_merge(array(
            'date' => date('Y-m-d H:i:s'),
            'firstname' => '',
            'lastname' => '',
            'email' => '',
            'phone' => '',
            'about' => ''
        ), $info);
        $item = $this->createRow($info);
        $item->save();
        return $item;
    }
}