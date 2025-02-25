<?php
namespace Payment;

class PaymentFactory
{
    /**
     * @return PaymentInterface
     */
    static function getPayment($payment, $config){
        switch($payment){
            case 'paypal':{
                return new Paypal($config->paypal);
            }default:
                return new NullPayment();
        }
    }
}
