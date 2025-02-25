<?php

use Payment\PaymentFactory;

class Test_PaypalController extends Zend_Controller_Action{
    function init(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
    }
    
    private function getPayment(){
        $config = Zend_Registry::get('configuration');
        return PaymentFactory::getPayment($config->payment, $config);
    }
    
    function indexAction(){
        $payment = $this->getPayment();
        try{
            $payment->setCreditCard('visa', '4669424246660779', 11, 2019, '012', 'Zoe', 'Sandana')
                ->setAmount(100, 'USD');
            var_dump($payment->doPayment());
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
    
    function refundAction(){
        $payment = $this->getPayment();
        $payment->setAmount(100, 'USD');
        try{
            var_dump($payment->doRefund($this->_getParam('saleId')));
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
    
    function infoAction(){
        phpinfo();
    }
}