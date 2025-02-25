<?php

class Zend_View_Helper_Price extends Zend_View_Helper_Abstract{

    function price($price){
        $currency = Models_Rates::getCurrentCurrency();
        return $currency['symbol'] . number_format($price*$currency['rate']);
    }
}