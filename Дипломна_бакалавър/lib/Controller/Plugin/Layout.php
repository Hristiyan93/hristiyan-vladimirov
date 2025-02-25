<?php

class Controller_Plugin_Layout extends Zend_Controller_Plugin_Abstract 
{
    public function routeShutdown(Zend_Controller_Request_Abstract $request){
        if($request->getModuleName() == 'admin'){
            $layout = Zend_Layout::getMvcInstance();
            $layout->setLayout('admin');
        }
    }
}
