<?php

class Test_MailController extends Zend_Controller_Action{
    
    function init(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
    }
    
    function indexAction(){
        $mailer = new Zend_Mail();
        $mailer->setFrom("info@flights.com")
            ->addTo('info@diplomni.eu', "Yo ho ho")
            ->setSubject('And the subject')
            ->setBodyHtml('The content')
            ->send();
        echo 'Sending mail from here';
    }
}