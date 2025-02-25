<?php 

class Admin_UsersController extends Zend_Controller_Action
{
	
	function indexAction(){
	    $model = new Models_Users();
		$this->view->items = $model->fetchAll();
	}
	
	function listAction(){
		$this->_helper->redirector('index');
	}
	
	function addAction(){
	    $model = new Models_Users();
	    $this->view->row = $model->findItem($this->_getParam('id'));
	}
	
	function saveAction(){
	    $model = new Models_Users();
	    if($this->getRequest()->isPost()){
	        $item = $model->saveItem($this->_getParam('user'));
	        $item->uploadPicture('picture');
	    }
	    $this->_helper->redirector('index');
	}
	
	function deleteAction(){
	    $model = new Models_Users();
	    $itemId = $this->_getParam('itemId');
	    $item = $model->find($itemId)->current();
	    if(!empty($item) && Zend_Auth::getInstance()->getIdentity()->id!=$item->id){
	        $item->delete();
	    }
	    $this->_helper->redirector('index');
	}
}