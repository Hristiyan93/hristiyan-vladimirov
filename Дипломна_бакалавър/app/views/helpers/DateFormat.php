<?php

class Zend_View_Helper_DateFormat extends Zend_View_Helper_Abstract{
    
    function dateFormat($date, $format = 'd/m/Y'){
        return date($format, strtotime($date));
    }
}