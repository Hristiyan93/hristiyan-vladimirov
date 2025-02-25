<?php

class Test_RoutesController extends Zend_Controller_Action
{
    function init(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
    }
    
    function indexAction(){
        $model = new Models_Routes();
        $model->updateAllRoutes();
    }
    
}
