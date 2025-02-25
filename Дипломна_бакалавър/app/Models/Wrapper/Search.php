<?php

class Models_Wrapper_Search
{
    protected $searchKey;
    protected $data;
    
    function __construct($data){
        $this->data = $data;
        $this->searchKey = $this->calculateKey($this->data);
    }
    
    protected function calculateKey($data){
        $result = array();
        foreach($data as $key => $value){
            $result[] = "{$key}:{$value}";
        }
        $plain = implode(";", $result);
        return md5($plain);
    }
}