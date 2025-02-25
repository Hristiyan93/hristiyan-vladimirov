<?php

class Admin_DashboardController extends Zend_Controller_Action{
    
    function indexAction(){
    	if($this->hasParam('locale')){
    		Models_Locale::setCurrentLocale($this->_getParam('locale', 'bg'));
    	}    	
    	$this->view->comments = 100;
    	$this->view->sites = 200;
    	$this->view->flightsCount = 300;
    	$this->view->packages = 400;
    	$this->view->reservations = 500;
    }
}