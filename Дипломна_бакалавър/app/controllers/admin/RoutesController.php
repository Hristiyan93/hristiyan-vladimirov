<?php

class Admin_RoutesController extends Zend_Controller_Action{

    function indexAction(){
        $this->view->items = Models_Routes::listAllRoutes();
    }
}