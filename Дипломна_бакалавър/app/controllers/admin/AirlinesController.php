<?php

class Admin_AirlinesController extends Zend_Controller_Action{
    
    function import(){
        $file = ROOT_PATH . '/etc/tmp/' . 'airlines.dat.txt';
        $fp = fopen($file, 'r');
        $model = new Models_Airlines();
        $model->delete('');
        while(($row = fgetcsv($fp, 1024))!==false){
            $model->insert(array(
                'name' => $row[1],
                'iata' => $row[3],
                'icao' => $row[4],
                'country' => $row[6]
            ));
        }
    }

    /**
     * @var Models_Airlines
     */
    protected $model;
    
    function init(){
        $this->model = new Models_Airlines();
    }
    
    function indexAction(){
        $this->view->items = $this->model->fetchAll();
    }
    
    function addAction(){
        $this->view->row = $this->model->findItem($this->_getParam('id'));
    }
    
    function saveAction(){
        if($this->getRequest()->isPost()){
            $item = $this->model->saveItem($this->_getParam('item'));
            $item->uploadPicture('logo');
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