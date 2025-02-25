<?php

class Admin_FeaturesController extends Zend_Controller_Action{
    
    /**
     * @var Models_Features
     */
    protected $model;
    
    function init(){
        $this->model = new Models_Features();
    }
    
    function indexAction(){
        $this->view->items = $this->model->listItems(Models_Locale::getCurrentLocale());
    }
    
    function addAction(){
        $this->view->row = $this->model->findItem($this->_getParam('id'));
    }
    
    function deleteTranslationAction(){
        $model = new Models_FeaturesTranslations();
        $item = $model->find($this->_getParam('translation'))->current();
        if(!empty($item)){
            $item->delete();
        }
        $this->_helper->json(array('status' => true));
    }
    
    function saveAction(){
        if($this->getRequest()->isPost()){
            $item = $this->model->saveItem($this->_getParam('item'));
            $modelTranslations = new Models_FeaturesTranslations();
            foreach($this->_getParam('translation') as $translation){
                $translation['featureId'] = $item->id;
                $modelTranslations->saveItem($translation);
            }
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