<?php
namespace Payment;

class NullPayment implements PaymentInterface
{

    public function setAmount($amount, $currency)
    {
        return $this;
    }
    
    public function setCreditCard($type, $number, $expireMonth, $expireYear, $ccv, $firstname, $lastname)
    {
        return $this;
    }

    public function doPayment()
    {
        return array(
            'paymentId' => sprintf('NULL-PAYMENT-%06u', rand()), 
            'saleId' => sprintf('NULL-SALE-%06u', rand())
        );
    }
    
    public function doRefund($saleId)
    {
        return sprintf('NULL-REFUND-%06u', rand());
    }
    
}