<?php
namespace Payment;

interface PaymentInterface
{
    /**
     * @param double $amount
     * @param string $currency
     * @return PaymentInterface
     */
    function setAmount($amount, $currency);
    /**
     * @param string $type
     * @param string $number
     * @param integer $expireMonth
     * @param integer $expireYear
     * @param string $ccv
     * @param string $firstname
     * @param string $lastname
     * @return PaymentInterface
     */
    function setCreditCard($type, $number, $expireMonth, $expireYear, $ccv, $firstname, $lastname);
    
    function doPayment();
    function doRefund($saleId);
}