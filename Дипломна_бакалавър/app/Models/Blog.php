<?php

class Models_Blog extends Models_Base{
    protected $_name='blog';
    protected $_rowClass = 'Models_Wrapper_Post';
    
    function saveItem($data){
        $data['date'] = date('Y-m-d');
        return parent::saveItem($data);
    }
}