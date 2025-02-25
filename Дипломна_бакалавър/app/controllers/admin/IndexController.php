<?php

class Admin_IndexController extends Zend_Controller_Action {
    
    function init(){
        $this->_helper->layout()->disableLayout();
    }
    
    function indexAction() {
    }
    
    function loginAction(){
        
        $model = new Models_Users();
        $user = $model->login($this->_getParam('username'), $this->_getParam('password'));
        
        $adpter = new Auth_Adapter($user);
        $result = Zend_Auth::getInstance()->authenticate($adpter);
        
        $this->_helper->json(array(
            'login_status' => $result->getCode()==Zend_Auth_Result::SUCCESS ? 'success' : 'invalid',
            'message' => join(',', $result->getMessages())
        ), true);
    }
    
    function logoutAction(){
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Session::destroy();
        Zend_Controller_Action_HelperBroker::getStaticHelper('redirector')->direct('index', 'index', 'admin');
    }
}