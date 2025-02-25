<?php

class BlogController extends Zend_Controller_Action{
    
    function listItemsAction(){
        $model = new Models_Blog();
        $this->view->title = $this->_getParam('title');
        $this->view->items = $model->fetchAll($model->select()->limit(4));
    }
    
    function viewAction(){
        $model = new Models_Blog();
        $this->view->item = $model->findItem($this->_getParam('item'));
    }
}