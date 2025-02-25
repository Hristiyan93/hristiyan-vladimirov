<?php

class Admin_ContactsController extends Zend_Controller_Action{
    
    function indexAction(){
        $model = new Models_Contacts();
        $this->view->items = $model->fetchAll();
    }
}