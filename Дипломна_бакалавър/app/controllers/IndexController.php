<?php

class IndexController extends Zend_Controller_Action
{

    protected $locale;

    public function init()
    {
        $this->locale = Zend_Registry::get('Zend_Translate')->getLocale();
    }

    function indexAction()
    {
        $routes = Models_Routes::listAllRoutes();
        shuffle($routes);
        $this->view->routes = $routes;
    }
    
    function setLocaleAction(){
        $locale = $this->_getParam('locale', $this->locale);
        Zend_Registry::get('session')->locale = $locale;
        $this->_helper->redirector->gotoUrl($this->getRequest()->getHeader('referer'));
    }
    
    function setCurrencyAction(){
        $rate = Models_Rates::getRate($this->_getParam('currency'));
        if($rate){
            Models_Rates::setCurrency($rate);
        }
        $this->_helper->redirector->gotoUrl($this->getRequest()->getHeader('referer'));
    }
    
    function signupAction(){
        $model = new Models_Users();
        $userInfo = $this->_getParam('user', array());
        
        if($model->checkUserExists($userInfo['email'])){
            $result = array('status' => 'failed', 'error' => 'Email already reqistered');
        }else{
            $user = $model->createUser($userInfo);
            
            $request = Zend_Controller_Front::getInstance()->getRequest();
            $this->view->serverUrl = $request->getScheme() . '://' . $request->getHttpHost();
            $this->view->user = $user;
            $content = $this->view->render('common/user-activation.php');
            
            $mailer = new Zend_Mail();
            $mailer->setFrom("info@flights.com")
                ->addTo($user->email, $user->getFullname())
                ->setSubject($this->view->translate('Activation Email'))
                ->setBodyHtml($content)
                ->send();
            $result = array('status' => 'success', 'error' => '');
        }
        $this->_helper->json($result);
    }
    
    function activateAction(){
        $model = new Models_Users();
        $user = $model->findByActivationCode($this->_getParam('code'));
        if($user){
            $user->activate();
        }
        $this->view->userActivated = isset($user);
    }
    
    function loginAction(){
    	
    	$login = $this->_getParam('login', array('username' => '', 'password' => ''));
    	$model = new Models_Users();
    	$user = $model->login($login['username'], $login['password']);
    	
    	$adpter = new Auth_Adapter($user);
    	$authResult = Zend_Auth::getInstance()->authenticate($adpter);
    	
    	if($authResult->getCode()===Zend_Auth_Result::SUCCESS){
    	    if($authResult->getIdentity()->role==Models_Users::ROLE_ADMIN){
    	        $result = array('status' => 'failed', 'error' => 'Administrators not allowed to login here');
    	    }else{
    	        $result = array('status' => 'success');
    	    }
    	}else{
    	    $result = array('status' => 'failed', 'error' => join(', ', $authResult->getMessages()));
    	}
    	$this->_helper->json($result);
    }
    
    function logoutAction(){
    	Zend_Auth::getInstance()->clearIdentity();
    	$this->redirect('/');
    }
    
    function contactAction(){
        $model = new Models_Contacts();
        $model->createContact($this->_getParam('contact', array()));
        $this->_helper->json(array());
    }
}
