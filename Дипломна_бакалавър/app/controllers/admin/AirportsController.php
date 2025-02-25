<?php

class Admin_AirportsController extends Zend_Controller_Action{
    
    /**
     * @var Models_Airports
     */
    protected $model;
    
    function init(){
        $this->model = new Models_Airports();
    }
    
    function indexAction(){
        $this->view->items = $this->model->fetchAll();
    }
    
    function addAction(){
        $this->view->row = $this->model->findItem($this->_getParam('id'));
    }
    
    function saveAction(){
        if($this->getRequest()->isPost()){
            $this->model->saveItem($this->_getParam('item'));
        }
        $this->_helper->redirector('index');
    }
    
    function deleteAction(){
        $itemId = $this->_getParam('itemId');
        $item = $this->model->find($itemId)->current();
        if(!empty($item)){
            $item->delete();
        }
        $this->_helper->redirector('index');
    }
}