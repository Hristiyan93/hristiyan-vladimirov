<?php

class SettingsController extends Zend_Controller_Action{
	
	function indexAction(){
	    if(!Zend_Auth::getInstance()->hasIdentity()){
	        $this->redirect('/');
	    }
	    
	    if($this->getRequest()->isPost()){
	        $model = new Models_Users();
	        $user = $model->find(Zend_Auth::getInstance()->getIdentity()->id)->current();
	        if($this->_getParam('update-user', false)){
	            $user->setFromArray($this->_getParam('user', array()));
	            $user->save();
	            if(isset($_FILES['photo']) && !$_FILES['photo']['error']){
	                $user->uploadPicture('photo');
	            }
	        }
	        if($this->_getParam('update-pass', false)){
	            $user->updatePassword($this->_getParam('oldPassword'), $this->_getParam('password'));
	        }
	        if($this->_getParam('delete-account', false)){
	            $user->delete();
	            Zend_Auth::getInstance()->clearIdentity();
	            $this->redirect('/settings/account-deleted');
	        }
	        Zend_Auth::getInstance()->authenticate(new Auth_Adapter($user));
	        
	    }
	    
	    $user = Zend_Auth::getInstance()->getIdentity();
	    
	    $modelBookings = new Models_Bookings();
	    $this->view->bookings = $modelBookings->getUserBookings($user->id); 
		$this->view->user = $user;
	}
	
	function cancelBookingAction(){
	    $modelBookings = new Models_Bookings();
	    $modelBookings->cancelBooking($this->_getParam('bookId', 0));
	    $this->redirect('account');
	}
	
	function accountDeletedAction(){
	    
	}
}