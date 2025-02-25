<?php

class Logger_Db extends Zend_Log_Writer_Abstract{
    
    protected $model;
    
    function __construct(){
        $this->model = new Models_Translations();
    }
    
    protected function _write($event){
        //var_dump($event);exit;
        $this->model->addMissingKey($event['message']);
    }
    
    static public function factory($config){
    }
}