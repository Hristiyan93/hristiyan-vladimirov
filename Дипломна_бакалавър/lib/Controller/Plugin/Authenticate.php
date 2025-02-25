<?php

class Controller_Plugin_Authenticate extends Zend_Controller_Plugin_Abstract 
{
	function preDispatch(Zend_Controller_Request_Abstract $request)
	{
	    if($request->getModuleName()=='admin'){
	    	$auth = Zend_Auth::getInstance();
	        if($auth->hasIdentity() && $auth->getIdentity()->role==Models_Users::ROLE_ADMIN){
	            if($request->getControllerName() == 'index'
	                && $request->getActionName()!== 'logout'){
	                Zend_Controller_Action_HelperBroker::getStaticHelper('redirector')->direct('index', 'dashboard', 'admin');
	            }
	        }else{
	            if($request->getControllerName() != 'index'){
	                Zend_Controller_Action_HelperBroker::getStaticHelper('redirector')->direct('index', 'index', 'admin');
	            }
	        }
	    }
	}
}
