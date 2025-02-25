<?php

class Admin_BookingsController extends Zend_Controller_Action{
    
    function indexAction(){
        $model = new Models_Bookings();
        $this->view->items = $model->fetchAll();
    }
}