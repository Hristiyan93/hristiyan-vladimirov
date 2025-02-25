<?php

class SearchController extends Zend_Controller_Action{
    
    function indexAction(){
        $prefsModel = new Models_SearchPrefs();
        $model = new Models_Routes();

        if($this->getRequest()->isPost()){
            $prefsModel->saveSearch($this->_getParam('search', array()));
            if($prefsModel->hasBeenChanged()){
                $prefsModel->saveFilters($model->initFilters(Models_Locale::getCurrentLocale(), $prefsModel->getSearch()));
            }
            $this->redirect('search');
        }
        
        $this->view->search = $prefsModel->getSearch();
        $this->view->filters = $prefsModel->getFilters();
        $this->view->prefs = $prefsModel->getPrefs();
        $this->view->items = $model->getResults($prefsModel->getSearch());
    }
    
    function setPrefsAction(){
        $prefsModel = new Models_SearchPrefs();
        if($this->getRequest()->isXmlHttpRequest()){
            $this->_helper->layout()->disableLayout();
            foreach($this->_getParam('filter', array()) as $prefId => $value){
                $prefsModel->setPrefs($prefId, $value);
            }
            foreach($this->_getParam('toggle', array()) as $prefId => $value){
                $prefsModel->togglePrefs($prefId, $value);
            }
        }
        $this->forward('list', 'flights');
    }
}