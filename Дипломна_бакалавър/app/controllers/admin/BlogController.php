<?php

class Admin_BlogController extends Zend_Controller_Action{
    
    /**
     * @var Models_Blog
     */
    protected $model;
    
    function init(){
        $this->model = new Models_Blog();
    }
    
    function indexAction(){
        $this->view->items = $this->model->fetchAll();
    }
    
    function addAction(){
        $this->view->row = $this->model->findItem($this->_getParam('id'));
        $this->view->userId = Zend_Auth::getInstance()->getIdentity()->id;
    }
    
    function saveAction(){
        if($this->getRequest()->isPost()){
            $item = $this->model->saveItem($this->_getParam('item'));
            $item->uploadPicture('photo');
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